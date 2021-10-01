<?php

function revertCharacters($string) {
	
	$arrUpChar = [];
	$reversString = '';
	$word = '';

	preg_match_all('/./us', $string, $arrChar);

	foreach ($arrChar[0] as $index => $char) {	

		$lowerChar = mb_strtolower($char);

		if($lowerChar != $char) 
			array_push($arrUpChar, $index);

		if (preg_match('/(\w)/ui', $char)) {
			$word = $lowerChar . $word;
		} else {
			$reversString .= $word . $lowerChar;
			$word = '';
		}
	}

	foreach ($arrUpChar as $value) {	
		$reversString = mb_substr($reversString, 0, $value) 
						. mb_strtoupper(mb_substr($reversString, $value, 1)) 
						. mb_substr($reversString, ++$value);
	}
	
	return $reversString;
}
