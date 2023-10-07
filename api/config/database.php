<?php
try {
    $conn = new PDO("mysql:host=localhost; dbname=user_manager;" ,'root','', array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));    
} catch (\PDOException $e) {  
    echo 'Falha na conexão com o banco de dados'; 
}