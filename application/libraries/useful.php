<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Useful {

    public function date_to_mysql($date)
    {
    	$format = "d-m-Y";
    	
    	$date = date_parse_from_format($format, "$date");    

    		
    	return $date["year"]."-".$date["month"]."-".$date["day"];
    }
    
    public function date_from_mysql($date)
    {
		$format = 'Y-m-d';
    	$date = date_parse_from_format($format, $date);    	
    	return $date["day"]."-".$date["month"]."-".$date["year"];    
    }
    
    public function date_human_from_mysql($date)
    {
		$format = 'Y-m-d';
		$months = array("","января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
    	$date = date_parse_from_format($format, $date);    	
    	return $date["day"]." ".$months[$date["month"]]." ".$date["year"];    
    }
}

/* End of file Someclass.php */