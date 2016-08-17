<?php

/**
* 	Data Format Conversion
*/
class DataConversion {
	
	protected $text;

	public function textToBinary($text) {

	    if(!is_string($text)) {

	        return false;

	    } else {
	    	
	    	$output = '';
	    	$string = unpack('H*', $text); 		# Unpack Text
		    $split 	= str_split($string[1], 2); # Sting Split
		   
		    foreach ($split as $data) {

		        $baseConvert = base_convert($data, 16, 2); # Base conversion
		        $output 	.= str_repeat("0", 8 - strlen($baseConvert)) . $baseConvert; # Concat each 8 bit
		        
		    }
		    var_dump($output);
		    return $output;

	    }

	}

	public function binaryToText($text) {

	    if(!is_string($text)) {

	        return false;

	    } else {

	    	$output = '';
	    	$split 	= str_split($text, 8); # Split each 8 bit binary data
		    
		    foreach ($split as $data) {

		        $output .= chr( bindec($data) ); # Binary to Decimal & Decimal to Character
		    }

		    return $output;
	    }

	}

	public function binaryToDecimal($input) {

		if(!is_string($input)) {

	        return false;

	    } else {

	    	$output = '';
	    	$split 	= str_split($input, 8); # Split each 8 bit binary data
		    
		    foreach ($split as $data) {

		        $output .= bindec($data); # Binary to Decimal
		    }

		    return $output;
	    }
	}

	public function asciiToAlphabet($input) {

		if(!isset($input)) {

	        return false;

	    } else {

		    return chr($input);
	    }
	}

	public function characterToAscii($input) {

		if(!is_string($input)) {

	        return false;

	    } else {

	    	$output = '';
	    	$split 	= str_split($input, 1); # Split each 1 bit alphabet data
		    
		    foreach ($split as $data) {

		        $output .= ord($data); # Character to Ascii
		    }

		    return $output;
	    }
	}

}

$object = new DataConversion();

//echo $binary = $object->textToBinary("Hi Rasel. How are you?");
//echo $object->binaryToText($binary);
//echo $object->binaryToDecimal($binary);
//echo $object->characterToAscii('Bc+');


?>