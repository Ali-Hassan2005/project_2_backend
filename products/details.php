<?php

$id = $_GET['id'];


require_once "../controllers/Product.php";
$clientObject = new Product();
$result = $clientObject->details($id);

if( !$result){
  echo "no result";
  die ;
}

$product = mysqli_fetch_assoc($result);
$image_name = $product['image'];

echo "<p><a href='index.php'>All products</a> || <a href='create.php'>Create</a></p>";

echo "<p>ID: " . $product['id'] . "</p>";
echo "<p>Name: " . $product['name'] . "</p>";
echo "<p>Size: " . $product['size'] . "</p>";
echo "<p>image: " . "<img src='../Uploads/products/$image_name'" . "</p>";
echo "<p>Color: " . $product['color'] . "</p>";
echo "<p>Count in stock: " . $product['count_in_stock'] . "</p>";
echo "<p>Created At: " . $product['created_at'] . "</p>";
echo "<p>Updated At: " . $product['updated_at'] . "</p>";