<?php
require_once '../config/database.php';
require_once '../config/response.php';
require_once '../lib/breaking_url.php';
require_once '../lib/database/queries.php';

switch ($_SERVER['REQUEST_METHOD']) { 
    case 'GET':
        $UrlFragments = breakingURL('show.php');

        if(count($UrlFragments) <= 0 ){            
            $data['result'] = getAll('users', $conn);
            echo json_encode($data);
            
        }else{     
            if(in_array('all', $UrlFragments)){                
                $data['result'] = getAll('users', $conn, $UrlFragments[1], $UrlFragments[2]);
                echo json_encode($data);  
            }else{
                $data['result'] = get('users', $conn, $UrlFragments[0], $UrlFragments[1]);
                echo json_encode($data);                     
            }              
        }             
        
        break;

    default:
        echo 'Metodo de requisição invalido';
        break;
}

require_once '../config/header.php';