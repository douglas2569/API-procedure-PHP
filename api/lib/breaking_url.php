<?php
function breakingURL($breakPoint){
    $url = $_SERVER['REQUEST_URI'];
    $array = explode($breakPoint, $url);

    if($array[count($array)-1] === ''){                
        
        return array();
    }

    $array = explode('/', $array[1]);     
    array_shift($array);    
    return $array;
    
}