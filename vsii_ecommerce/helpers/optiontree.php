<?php
if(!function_exists('vsii_get_option'))
{
    function vsii_get_option($key,$default=NULL)
    {
        if(function_exists('ot_get_option'))
        {
            return ot_get_option($key,$default);
        }

        return $default;
    }
}