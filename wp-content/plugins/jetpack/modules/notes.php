<?php // phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * Module Name: Notifications
 * Module Description: Receive instant notifications of site comments and likes.
 * Sort Order: 13
 * First Introduced: 1.9
 * Requires Connection: Yes
 * Requires User Connection: Yes
 * Auto Activate: Yes
 * Module Tags: Other
 * Feature: General
 * Additional Search Queries: notification, notifications, toolbar, adminbar, push, comments
 *
 * @package automattic/jetpack
 */

use Automattic\Jetpack\Connection\Manager as Connection_Manager;

if ( ! defined( 'JETPACK_NOTES__CACHE_BUSTER' ) ) {
	define( 'JETPACK_NOTES__CACHE_BUSTER', JETPACK__VERSION . '-' . gmdate( 'oW' ) );
}

/**
 * Notifications class.
 */
class Jetpack_Notifications {
	/**
	 * Jetpack object.
	 *
	 * @var bool|Jetpack Jetpack object.
	 */
	public $jetpack = false;

	/**
	 * Singleton
	 *
	 * @static
	 */
	public static function init() {
		static $instance = array();

		if ( ! $instance ) {
			$instance[0] = new Jetpack_Notifications();
		}

		return $instance[0];
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->jetpack = Jetpack::init();

		add_action( 'init', array( $this, 'action_init' ) );
	}

	/**
	 * Adds s0.wp.com to a file path.
	 *
	 * @param string $file File path.
	 *
	 * @return string
	 */
	public function wpcom_static_url( $file ) {
		return 'https://s0.wp.com' . $file;
	}

	/**
	 * Init the notifications admin bar.
	 *
	 * @return void
	 */
	public function action_init() {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		if ( ! has_filter( 'show_admin_bar', '__return_true' ) && ! is_user_logged_in() ) {
			return;
		}

		// Do not show notifications in the Site Editor, which is always in fullscreen mode.
		global $pagenow;

		// Pre 13.7 pages that still need to be supported if < 13.7 is
		// still installed.
		$allowed_old_pages       = array( 'admin.php', 'themes.php' );
		$is_old_site_editor_page = in_array( $pagenow, $allowed_old_pages, true ) && isset( $_GET['page'] ) && 'gutenberg-edit-site' === $_GET['page']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		// For Gutenberg > 13.7, the core `site-editor.php` route is used instead
		$is_site_editor_page = 'site-editor.php' === $pagenow;

		if ( $is_site_editor_page || $is_old_site_editor_page ) {
			return;
		}

		add_action( 'admin_bar_menu', array( $this, 'admin_bar_menu' ), 120 );
		add_action( 'wp_head', array( $this, 'styles_and_scripts' ), 120 );
		add_action( 'admin_head', array( $this, 'styles_and_scripts' ) );
	}

	/**
	 * Enqueues and registers styles/scripts for notifications.
	 *
	 * @return void
	 */
	public function styles_and_scripts() {
		$is_rtl = is_rtl();

		if ( Jetpack::is_module_active( 'masterbar' ) ) {
			/**
			 * Can be used to force Notifications to display in RTL style.
			 *
			 * @module notes
			 *
			 * @since 4.8.0
			 *
			 * @param bool true Should notifications be displayed in RTL style. Defaults to false.
			 */
			$is_rtl = apply_filters( 'a8c_wpcom_masterbar_enqueue_rtl_notification_styles', false );
		}

		if ( ! $is_rtl ) {
			wp_enqueue_style( 'wpcom-notes-admin-bar', $this->wpcom_static_url( '/wp-content/mu-plugins/notes/admin-bar-v2.css' ), array( 'admin-bar' ), JETPACK_NOTES__CACHE_BUSTER );
		} else {
			wp_enqueue_style( 'wpcom-notes-admin-bar', $this->wpcom_static_url( '/wp-content/mu-plugins/notes/rtl/admin-bar-v2-rtl.css' ), array( 'admin-bar' ), JETPACK_NOTES__CACHE_BUSTER );
		}

		wp_enqueue_style( 'noticons', $this->wpcom_static_url( '/i/noticons/noticons.css' ), array( 'wpcom-notes-admin-bar' ), JETPACK_NOTES__CACHE_BUSTER );

		$this->print_js();

		// attempt to use core or plugin libraries if registered.
		$script_handles = array();
		if ( ! wp_script_is( 'mustache', 'registered' ) ) {
			wp_register_script( 'mustache', $this->wpcom_static_url( '/wp-content/js/mustache.js' ), null, JETPACK_NOTES__CACHE_BUSTER, true );
		}
		$script_handles[] = 'mustache';
		if ( ! wp_script_is( 'underscore', 'registered' ) ) {
			wp_register_script( 'underscore', $this->wpcom_static_url( '/wp-includes/js/underscore.min.js' ), null, JETPACK_NOTES__CACHE_BUSTER, true );
		}
		$script_handles[] = 'underscore';
		if ( ! wp_script_is( 'backbone', 'registered' ) ) {
			wp_register_script( 'backbone', $this->wpcom_static_url( '/wp-includes/js/backbone.min.js' ), array( 'underscore' ), JETPACK_NOTES__CACHE_BUSTER, true );
		}
		$script_handles[] = 'backbone';

		wp_register_script( 'wpcom-notes-common', $this->wpcom_static_url( '/wp-content/mu-plugins/notes/notes-common-v2.js' ), array( 'jquery', 'underscore', 'backbone', 'mustache' ), JETPACK_NOTES__CACHE_BUSTER, true );
		$script_handles[] = 'wpcom-notes-common';
		$script_handles[] = 'jquery';
		$script_handles[] = 'jquery-migrate';
		$script_handles[] = 'jquery-core';
		wp_enqueue_script( 'wpcom-notes-admin-bar', $this->wpcom_static_url( '/wp-content/mu-plugins/notes/admin-bar-v2.js' ), array( 'wpcom-notes-common' ), JETPACK_NOTES__CACHE_BUSTER, true );
		$script_handles[] = 'wpcom-notes-admin-bar';

		if ( class_exists( 'Jetpack_AMP_Support' ) && Jetpack_AMP_Support::is_amp_request() ) {
			add_filter(
				'script_loader_tag',
				function ( $tag, $handle ) use ( $script_handles ) {
					if ( in_array( $handle, $script_handles, true ) ) {
						$tag = preg_replace( '/(?<=<script)(?=\s|>)/i', ' data-ampdevmode', $tag );
					}
					return $tag;
				},
				10,
				2
			);
		}
	}

	/**
	 * Adds notifications bubble to the admin bar.
	 *
	 * @return void
	 */
	public function admin_bar_menu() {
		global $wp_admin_bar;

		if ( ! is_object( $wp_admin_bar ) ) {
			return;
		}

		$wpcom_locale = get_locale();

		if ( ! class_exists( 'GP_Locales' ) ) {
			if ( defined( 'JETPACK__GLOTPRESS_LOCALES_PATH' ) && file_exists( JETPACK__GLOTPRESS_LOCALES_PATH ) ) {
				require JETPACK__GLOTPRESS_LOCALES_PATH;
			}
		}

		if ( class_exists( 'GP_Locales' ) ) {
			$wpcom_locale_object = GP_Locales::by_field( 'wp_locale', $wpcom_locale );
			if ( $wpcom_locale_object instanceof GP_Locale ) {
				$wpcom_locale = $wpcom_locale_object->slug;
			}
		}

		$classes = 'wpnt-loading wpn-read';
		$wp_admin_bar->add_menu(
			array(
				'id'     => 'notes',
				'title'  => '<span id="wpnt-notes-unread-count" class="' . esc_attr( $classes ) . '">
					<span class="noticon noticon-notification"></span>
					</span>',
				'meta'   => array(
					'html'  => '<div id="wpnt-notes-panel2" class="intrinsic-ignore" style="display:none" lang="' . esc_attr( $wpcom_locale ) . '" dir="' . ( is_rtl() ? 'rtl' : 'ltr' ) . '"><div class="wpnt-notes-panel-header"><span class="wpnt-notes-header">' . __( 'Notifications', 'jetpack' ) . '</span><span class="wpnt-notes-panel-link"></span></div></div>',
					'class' => 'menupop',
				),
				'parent' => 'top-secondary',
			)
		);
	}

	/**
	 * Echos the Notes JS.
	 *
	 * @return void
	 */
	public function print_js() {
		$link_accounts_url = is_user_logged_in() && ! ( new Connection_Manager( 'jetpack' ) )->is_user_connected() ? Jetpack::admin_url() : false;
		?>
<script data-ampdevmode type="text/javascript">
/* <![CDATA[ */
	var wpNotesIsJetpackClient = true;
	var wpNotesIsJetpackClientV2 = true;
		<?php if ( $link_accounts_url ) : ?>
	var wpNotesLinkAccountsURL = '<?php echo esc_url( $link_accounts_url ); ?>';
<?php endif; ?>
/* ]]> */
</script>
		<?php
	}

}

Jetpack_Notifications::init();
