<?php

require_once "DBOperations.php";

class Product extends DBOperations
{

    public function create($name, $size, $file_name, $color, $count_in_stock)
    {
        
      $query = "INSERT INTO products(name, size, image, color, count_in_stock) 
      VALUES('$name', '$size', '$file_name', '$color', '$count_in_stock')";


        return $this->connect($query);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________


    public function delete($id)
    {
        
      $deleteQuery = "DELETE FROM products WHERE id=$id";

        return $this->connect($deleteQuery);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function details($id)
    {
        
      $sql = "SELECT * FROM products WHERE id=$id";

        return $this->connect($sql);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function edit($name,$size,$color,$count_in_stock,$product_id)
    {
        
      $query = "UPDATE products
            SET name='$name',size='$size',color='$color',count_in_stock=$count_in_stock
            WHERE id=$product_id";

        return $this->connect($query);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

}
