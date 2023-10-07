<?php
require_once '../config/database.php';
require_once '../config/response.php';
require_once '../lib/validation.php';
require_once '../lib/database/edit.php';

switch ($_SERVER['REQUEST_METHOD']) { 
    case 'PUT': 
        $values = json_decode(file_get_contents('php://input'),true); 
        
        $id = $values['id'] ?? null;
        $name = $values['name']?? null;
        $email = $values['email'] ?? null;
        $password = $values['password'] ?? null;
        $hash =  $values['hash'] ?? null;        
        
        if(hasAtLeastOneEmpty(array($id, $name, $email, $password, $hash))){
            $data['erro'] = 'Preecha os campos corretamente';
            echo json_encode($data);
            exit;
        }
        
        $id = filter_var($id, FILTER_SANITIZE_ADD_SLASHES);
        $name = filter_var($name, FILTER_SANITIZE_ADD_SLASHES);
        $email = filter_var($email,  FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_ADD_SLASHES);
        $password = filter_var($password, FILTER_SANITIZE_ADD_SLASHES);
        $hash = filter_var($hash, FILTER_SANITIZE_ADD_SLASHES);
        
        $data['result'] = update("users", $conn, "id", array(":id"=> $id, ":name"=> $name, ":email" => $email, ":password"=> $password, ":hash"=> $hash));
        echo json_encode($data);        

        break;

    default:
        echo 'Metodo de requisição invalido';
        break;
}

require_once '../config/header.php';