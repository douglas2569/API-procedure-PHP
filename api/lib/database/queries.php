<?php
function getAll($table, $conn, $column=null, $value=null){
    $query = '';
    $statement = null;

    if( is_null($column) && is_null($value)){
        $query = "SELECT * FROM $table";
        $statement = $conn->prepare($query);
        
    }else{
        $query = "SELECT * FROM $table WHERE $column = :value";
        $statement = $conn->prepare($query);
        $statement->bindParam(":value", $value);        
    }

    $statement->execute();    
    $data = $statement->fetchAll();

    return $data;

}

function get($table, $conn, $column, $value){
    $statement = $conn->prepare("SELECT * FROM $table WHERE $column = :value");
    $statement->bindParam(":value", $value);
    $statement->execute();      
    $data = $statement->fetchAll();
    return $data;
}
