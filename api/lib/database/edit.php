<?php
require_once 'queries.php';
function update($table, $conn, $column, $values){
    $result = get($table, $conn, $column, $values[":id"]);
    
    if(!count($result) > 0)
        return $result;

    $sql = "UPDATE $table SET ";  
    
    for ($i=0; $i < count($values); $i++) { 
        $sql .= str_replace(':','', key($values))." = ".key($values).",";
        next($values);
    }
     
    $sql = substr($sql,0, -1);
    $sql .= " WHERE id = ".$values[':id'];      

    $statement = $conn->prepare($sql);
    $statement->execute($values);

    return $values;
}
