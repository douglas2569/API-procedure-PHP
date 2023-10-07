<?php
function insert($table, $values, $conn){
    $sql = "INSERT INTO $table VALUES (default,";    
    
    for ($i=0; $i < count($values); $i++) { 
        $sql .= key($values).",";
        next($values);
    }

    $sql = substr($sql,0, -1);     
    $sql .= ");";   

    $statement = $conn->prepare($sql);
    $statement->execute($values);    
    return $values;
}
