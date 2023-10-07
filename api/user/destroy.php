<?php
require_once '../config/database.php';
require_once '../config/response.php';
require_once '../lib/database/delete.php';
require_once '../lib/breaking_url.php';

switch ($_SERVER['REQUEST_METHOD']) { 
    case 'DELETE':   
        $UrlFragments = breakingURL('destroy.php');

        if(count($UrlFragments) > 0 ){            
            $data['result'] = delete_line('users', $conn, $UrlFragments[0], $UrlFragments[1]);
            echo json_encode($data);    

        }else{
            $data['erro'] = 'Preecha os campos corretamente';
            echo json_encode($data);            
        }        
        
        break;

    default:
        echo 'Metodo de requisição invalido';
        break;
}

require_once '../config/header.php';