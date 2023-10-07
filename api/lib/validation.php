<?php
function hasAtLeastOneEmpty($array=array()){    
    if(in_array(null, $array)) return true;

    return false;    
}