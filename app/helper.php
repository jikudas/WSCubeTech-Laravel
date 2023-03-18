<?php

//important global functions

//print fomatted data
if(!function_exists('p')) {
    function p($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
}

//get formatted date
if (!function_exists('formatted_date')) {
    function formatted_date($date, $format)
    {
        $formattedDate = date($format, strtotime($date));
        return $formattedDate;
    }
}