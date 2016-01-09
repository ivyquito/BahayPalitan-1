<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/***
 * Class Random
 */
class Random {
    
    /***
     * Generate code
     * @param integer
     * @return string
    */
    function generateCode ($length){
    $code = "";
    $possible = "abcdifghijklmnop12346789ABCDFGHJKLMNPQRTVWXYZ";
	$maxlength = strlen($possible);
		if ($length > $maxlength) {
			$length = $maxlength;
        }
		$i = 0; 
		while ($i < $length) { 
			$char = substr($possible, mt_rand(0, $maxlength-1), 1);
			if (!strstr($code, $char)) { 
                $code .= $char;
                $i++;
            }
		}
	return $code;
	}
}