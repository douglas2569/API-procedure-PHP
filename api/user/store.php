<?php
require_once '../config/database.php';
require_once '../config/response.php';
require_once '../lib/database/insert.php';

switch ($_SERVER['REQUEST_METHOD']) { 
    case 'POST':       
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if(!$name && !$email && !$password){
            $data['erro'] = 'Preecha os campos corretamente';
            echo json_encode($data);
            exit;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $hash = password_hash(date('Y-m-d H:i:s').rand(0,999), PASSWORD_DEFAULT);
        $data = insert("users", array(":name"=> $name, ":email" => $email, ":password"=> $password, ":hash"=> $hash), $conn);
        echo json_encode($data);
        
        break;

    default:
        echo 'Metodo de requisição invalido';
        break;
}

require_once '../config/header.php';
