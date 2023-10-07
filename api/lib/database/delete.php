<?php
require_once 'queries.php';
function delete_line($table, $conn, $column, $value){
    $result = get('users', $conn, $column, $value);
    
    if(!count($result) > 0)
        return $result;

    $statement = $conn->prepare("DELETE FROM $table WHERE $column = :value");
    $statement->bindParam(':value', $value);
    $statement->execute();

    return $result;
}
