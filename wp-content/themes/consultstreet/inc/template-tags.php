<?php
/**
 * Functions which enhance the theme into WordPress
 *
 * @package consultstreet
 */

/**
 * Theme Custom Logo
*/
function consultstreet_header_logo() {

    $consultstreet_main_header_style = get_theme_mod('consultstreet_main_header_style', 'standard');
	$consultstreet_sticky_bar_logo = get_theme_mod('consultstreet_sticky_bar_logo');

	the_custom_logo(); ?>
					
	<?php if($consultstreet_sticky_bar_logo != null) : ?>	
			<a class="sticky-navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img src="<?php echo esc_url($consultstreet_sticky_bar_logo); ?>" class="custom-logo" alt="<?php esc_attr(bloginfo("name")); ?>"></a>
	<?php endif; ?>
	
    <?php if ( display_header_text() ) : ?>
	<?php if ( get_bloginfo( 'title' )  !== '' || get_bloginfo( 'description' )  !== '' ){ ?>
	<div class="site-branding-text">
	    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
	</div>
	<?php } endif;
} 

/**
 * Theme Logo Class
*/
function consultstreet_header_logo_class($html)
{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
}
add_filter('get_custom_logo','consultstreet_header_logo_class');
 
/**
 * Select sanitization callback
 *
 */
function consultstreet_sanitize_select( $value ){    
    if ( is_array( $value ) ) {
		foreach ( $value as $key => $subvalue ) {
			$value[ $key ] = sanitize_text_field( $subvalue );
		}
		return $value;
	}
	return sanitize_text_field( $value );    
}

function consultstreet_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Theme Comment Function
*/
if ( ! function_exists( 'consultstreet_comment' ) ) :
function consultstreet_comment( $comment, $args, $depth ) 
{
	?>
        <div <?php comment_class('media comment-box'); ?> id="comment-<?php comment_ID(); ?>">
			<a class="pull-left-comment">
            <?php echo get_avatar($comment); ?>
            </a>
            <div class="media-body">
			   <div class="comment-detail">
				<h5 class="comment-detail-title"><?php printf(('%s'), get_comment_author_link()) ?>
				<time class="comment-date">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) );?>">
				<?php comment_date('F j, Y');?>&nbsp;<?php esc_html_e('at','consultstreet');?>&nbsp;<?php comment_time('g:i a'); ?>
				</a>
				</time></h5>
				<?php comment_text() ;?>
				<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'consultstreet' ); ?></em>
				<br/>
				<?php endif; ?>
				</div>
			</div>
		</div>
<?php
}
endif;
add_filter('get_avatar','consultstreet_gravatar_class');
function consultstreet_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-fluid rounded-circle", $class);
    return $class;
}

function consultstreet_read_more_button_class($read_class)
	{  global $post;
		return '<p><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"more-link\">" .esc_html__('Read More','consultstreet')."</a></p>";
	}
add_filter( 'the_content_more_link', 'consultstreet_read_more_button_class' );

function consultstreet_post_thumbnail() {
    if(has_post_thumbnail()){
	    echo '<figure class="post-thumbnail"><a href="'.esc_url( get_the_permalink() ).'">';
		the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
		echo '</a></figure>';
	}
}

/**
 * Theme Page Header Title
*/
function consultstreet_theme_page_header_title(){
	if( is_archive() )
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">';
		if ( is_day() ) :
		/* translators: %1$s %2$s: date */	
		  printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('Archives','consultstreet'), get_the_date() );  
        elseif ( is_month() ) :
		/* translators: %1$s %2$s: month */	
		  printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('Archives','consultstreet'), get_the_date( 'F Y' ) );
        elseif ( is_year() ) :
		/* translators: %1$s %2$s: year */	
		  printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('Archives','consultstreet'), get_the_date( 'Y' ) );
		elseif( is_author() ):
		/* translators: %1$s %2$s: author */	
			printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('All posts by','consultstreet'), get_the_author() );
        elseif( is_category() ):
		/* translators: %1$s %2$s: category */	
			printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('Category','consultstreet'), single_cat_title( '', false ) );
		elseif( is_tag() ):
		/* translators: %1$s %2$s: tag */	
			printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('Tag','consultstreet'), single_tag_title( '', false ) );
		elseif( class_exists( 'WooCommerce' ) && is_shop() ):
		/* translators: %1$s %2$s: WooCommerce */	
			printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('Shop','consultstreet'), single_tag_title( '', false ));
        elseif( is_archive() ): 
		the_archive_title( '<h1 class="text-white">', '</h1>' ); 
		endif;
		echo '</h1></div>';
	}
	elseif( is_404() )
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">';
		/* translators: %1$s: 404 */	
		printf( esc_html__( '%1$s ', 'consultstreet' ) , esc_html__('404','consultstreet') );
		echo '</h1></div>';
	}
	elseif( is_search() )
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">';
		/* translators: %1$s %2$s: search */
		printf( esc_html__( '%1$s %2$s', 'consultstreet' ), esc_html__('Search results for','consultstreet'), get_search_query() );
		echo '</h1></div>';
	}
	else
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">'.esc_html( get_the_title() ).'</h1></div>';
	}
}

function consultstreet_bootstrap_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
}
add_filter( 'wp_nav_menu', 'consultstreet_bootstrap_menu_notitle' );

/**
 * Theme Breadcrumbs Url
*/
function consultstreet_page_url() {
	$page_url = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$page_url .= "s";
	}
	$page_url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $page_url;
}

/**
 * Theme Breadcrumbs
*/
if( !function_exists('consultstreet_page_header_breadcrumbs') ):
	function consultstreet_page_header_breadcrumbs() { 	
		global $post;
		$homeLink = home_url();
		$consultstreet_page_header_layout = get_theme_mod('consultstreet_page_header_layout', 'consultstreet_page_header_layout1');
		if($consultstreet_page_header_layout == 'consultstreet_page_header_layout1'):
			$breadcrumb_class = 'text-center';	
		else: $breadcrumb_class = 'text-right'; 
		endif;
		
		echo '<ul id="content" class="page-breadcrumb '.esc_attr( $breadcrumb_class ).'">';			
			if (is_home() || is_front_page()) :
					echo '<li><a href="'.esc_url($homeLink).'">'.esc_html__('Home','consultstreet').'</a></li>';
					    echo '<li class="active">'; echo single_post_title(); echo '</li>';
						else:
						echo '<li><a href="'.esc_url($homeLink).'">'.esc_html__('Home','consultstreet').'</a></li>';
						if ( is_category() ) {
							echo '<li class="active"><a href="'. esc_url( consultstreet_page_url() ) .'">' . esc_html__('Archive by category','consultstreet').' "' . single_cat_title('', false) . '"</a></li>';
						} elseif ( is_day() ) {
							echo '<li class="active"><a href="'. esc_url(get_year_link(esc_attr(get_the_time('Y')))) . '">'. esc_html(get_the_time('Y')) .'</a>';
							echo '<li class="active"><a href="'. esc_url(get_month_link(esc_attr(get_the_time('Y')),esc_attr(get_the_time('m')))) .'">'. esc_html(get_the_time('F')) .'</a>';
							echo '<li class="active"><a href="'. esc_url( consultstreet_page_url() ) .'">'. esc_html(get_the_time('d')) .'</a></li>';
						} elseif ( is_month() ) {
							echo '<li class="active"><a href="' . esc_url( get_year_link(esc_attr(get_the_time('Y'))) ) . '">' . esc_html(get_the_time('Y')) . '</a>';
							echo '<li class="active"><a href="'. esc_url( consultstreet_page_url() ) .'">'. esc_html(get_the_time('F')) .'</a></li>';
						} elseif ( is_year() ) {
							echo '<li class="active"><a href="'. esc_url( consultstreet_page_url() ) .'">'. esc_html(get_the_time('Y')) .'</a></li>';
                        } elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
						if ( get_post_type() != 'post' ) {
							$cat = get_the_category(); 
							$cat = $cat[0];
							echo '<li>';
								echo esc_html( get_category_parents($cat, TRUE, '') );
							echo '</li>';
							echo '<li class="active"><a href="' . esc_url( consultstreet_page_url() ) . '">'. get_the_title() .'</a></li>';
						} }  
						elseif ( is_page() && $post->post_parent ) {
							$parent_id  = $post->post_parent;
							$breadcrumbs = array();
							while ($parent_id) {
							$page = get_page($parent_id);
							$breadcrumbs[] = '<li class="active"><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
							$parent_id  = $page->post_parent;
                            }
							$breadcrumbs = array_reverse($breadcrumbs);
							foreach ($breadcrumbs as $crumb) echo $crumb;
							echo '<li class="active"><a href="' . consultstreet_page_url() . '">'. get_the_title().'</a></li>';
                        }
						elseif( is_search() )
						{
							echo '<li class="active"><a href="' . esc_url( consultstreet_page_url() ) . '">'. get_search_query() .'</a></li>';
						}
						elseif( is_404() )
						{
							echo '<li class="active"><a href="' . esc_url( consultstreet_page_url() ) . '">'.esc_html__('Error 404','consultstreet').'</a></li>';
						}
						else { 
						    echo '<li class="active"><a href="' . esc_url( consultstreet_page_url() ) . '">'. esc_html( get_the_title() ) .'</a></li>';
						}
					endif;
			echo '</ul>';
        }
endif;

if( ! function_exists( 'consultstreet_custom_customizer_options' ) ):
    function consultstreet_custom_customizer_options() {
		
		$consultstreet_sticky_bar_logo = get_theme_mod('consultstreet_sticky_bar_logo');
		$consultstreet_main_slider_content_color = get_theme_mod('consultstreet_main_slider_content_color', '#fff');
		$consultstreet_custom_logo_size = get_theme_mod('consultstreet_custom_logo_size', array('slider' => 257,'suffix' => 'px',));
        
        $output_css = '';

		if ( has_header_image() ) :
			$output_css .=".theme-page-header-area {
				background: #17212c url(" .esc_url( get_header_image() ). ");
				background-attachment: scroll;
				background-position: top center;
				background-repeat: no-repeat;
				background-size: cover;
			}\n";
		endif; 
		
		if($consultstreet_custom_logo_size['slider'] != null) :
            $output_css .=".navbar img.custom-logo, .theme-header-magazine img.custom-logo{
			max-width: ".$consultstreet_custom_logo_size['slider']."px;
			height: auto;
			}\n";
        endif;
		
		if($consultstreet_main_slider_content_color != null) :
            $output_css .=".theme-slider-content .title-large {
				color: ".$consultstreet_main_slider_content_color.";
			}
            .theme-slider-content .description {
				color: ".$consultstreet_main_slider_content_color.";
			}\n";
        endif;

        if($consultstreet_sticky_bar_logo != null) :
            $output_css .=".header-fixed-top .navbar-brand {
				display: none !important;
			}
            .not-sticky .sticky-navbar-brand {
				display: none !important;
			}\n";
        endif;
		
		if ( is_user_logged_in() && is_admin_bar_showing() ) {
            $output_css .="@media (min-width: 600px){
                .navbar.header-fixed-top{top:32px;}
            }\n";
        }

        wp_add_inline_style( 'consultstreet-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'consultstreet_custom_customizer_options' );

/**
* Get started notice
*/

add_action( 'wp_ajax_consultstreet_dismissed_notice_handler', 'consultstreet_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function consultstreet_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function consultstreet_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="consultstreet-getting-started-notice clearfix">
                    <div class="consultstreet-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'consultstreet' ); ?>" />
                    </div><!-- /.consultstreet-theme-screenshot -->
                    <div class="consultstreet-theme-notice-content">
                        <h2 class="consultstreet-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'consultstreet' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('To take full advantage of all the features of this theme, please install and activate the <strong>Arile Extra</strong> plugin, then enjoy this theme.', 'consultstreet')) ?></p>

                        <a class="consultstreet-btn-get-started button button-primary button-hero consultstreet-button-padding" href="#" data-name="" data-slug="">
						<?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Get started with %1$s', 'consultstreet' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
						
						</a><span class="consultstreet-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.consultstreet-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'consultstreet_deprecated_hook_admin_notice' );

/**
* Plugin installer
*/

add_action( 'wp_ajax_install_act_plugin', 'consultstreet_admin_install_plugin' );

function consultstreet_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/arile-extra' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'arile-extra' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'arile-extra/arile-extra.php' );
    }
}


/**
 * Menu 
*/
function consultstreet_custom_menu_script()
{
	$custom_logo = get_theme_mod( 'custom_logo' );
	if(display_header_text()== true && $custom_logo != null && get_bloginfo( 'title' )  !== '' ){
		$toggle_value = 2; 
	}else{
		$toggle_value = 1; 
	}
?>
<script>
	// This JS added for the Toggle button to work with the focus element.
		if (window.innerWidth < 992) {
			
			document.addEventListener('keydown', function(e) {
			let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
				if (!isTabPressed) {
					return;
				}
				
			const  focusableElements =
				'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
			const modal = document.querySelector('.navbar.navbar-expand-lg'); // select the modal by it's id

			const firstFocusableElement = modal.querySelectorAll(focusableElements)[<?php echo $toggle_value; ?>]; // get first element to be focused inside modal
			const focusableContent = modal.querySelectorAll(focusableElements);
			const lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal

			  if (e.shiftKey) { // if shift key pressed for shift + tab combination
				if (document.activeElement === firstFocusableElement) {
				  lastFocusableElement.focus(); // add focus for the last focusable element
				  e.preventDefault();
				}
			  } else { // if tab key is pressed
				if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
				  firstFocusableElement.focus(); // add focus for the first focusable element
				  e.preventDefault();			  
				}
			  }

			});
		}
</script>
<?php	
}
add_action('wp_footer','consultstreet_custom_menu_script');