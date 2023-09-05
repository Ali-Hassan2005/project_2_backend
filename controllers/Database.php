<?php
require_once "DBOperations.php";

class Database  extends DBOperations
{

    protected function INSERT ($tableName, $fields)
    {
        $sqlQuery = "INSERT INTO $tableName (";
        foreach($fields as $key => $value) {
            $sqlQuery .= "`$key`,";
        }
        $sqlQuery = trim($sqlQuery, ",");
        $sqlQuery .= ") VALUES (";
        foreach($fields as $value) {
            $sqlQuery .= "'$value',";
        }
        $sqlQuery = trim($sqlQuery, ",");
        $sqlQuery .= ")";

        return $this->connect($sqlQuery);
    }

//_____________________________________________________________________________________________    
//_____________________________________________________________________________________________ 

    protected function SELECT ($tableName, $fields)
    {
      $sqlQuery ="SELECT * FROM $tableName WHERE $fields";
        return $this->connect($sqlQuery);
    }

//_____________________________________________________________________________________________    
//_____________________________________________________________________________________________    

protected function UPDATE($tableName, $fields, $id)
{
    $sqlQuery = "UPDATE $tableName SET ";
    foreach ($fields as $key => $value) {
        $sqlQuery .= "$key='$value', ";
    }
    $sqlQuery = trim($sqlQuery, ", ");
    $sqlQuery .= " WHERE id=$id";
    
    return $this->connect($sqlQuery);
}


//_____________________________________________________________________________________________    
//_____________________________________________________________________________________________  

protected function DELETE($tableName, $id)
{
    $sqlQuery =  "DELETE FROM $tableName WHERE id=$id";

    return $this->connect($sqlQuery);
}

}
