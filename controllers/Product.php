<?php

require_once "Database.php";

class Product extends Database
{

    public function create($name, $size, $file_name, $color, $count_in_stock)
    {
      $tableName='products';
        $fields =[
            "name" => $name, "size" => $size, "file_name" => $file_name,
            "color" => $color, "count_in_stock" => $count_in_stock
        ];

        return $this ->INSERT($tableName,$fields);
      
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________


    public function delete($id)
    {
      $tableName="products"
        return $this ->DELETE($id);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function details($id)
    {
      $tableName='products';
      $fields = "id = $id";

      return $this ->SELECT($tableName,$fields);
        
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function edit($name,$size,$color,$count_in_stock,$product_id)
    {
      $tableName='products';
      $fields =[
          "name" => $name, "size" => $size,
          "color" => $color, "count_in_stock" => $count_in_stock
      ];
      
      return $this ->UPDATE($tableName,$fields,$product_id);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

}
