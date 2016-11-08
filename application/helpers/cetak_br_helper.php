<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('print_line'))
{
	function print_line($line)
	{
		$br = "";
		for($i=0 ; $i<$line ; $i++){
			$br.="<br>";
		}
		return $br;
	}
}
