<?php

require_once "../config/db_connection.php";


$sql = "SELECT id,name,count_in_stock FROM products";


$result = mysqli_query($connection, $sql);

$records = [];
for($i = 0; $i < mysqli_num_rows($result); $i++) {
    $records[] = mysqli_fetch_assoc($result);
}

echo "<h2>Products</h2>";
echo "<p><a href='create.php'>Create</a></p>";

foreach($records as $product) {
    $id = $product['id'];
    $name = $product['name'];
    echo "<p>$id) $name <a href='edit.php?id=$id'>edit</a> || <a href='delete.php?id=$id'>delete</a> || <a href='details.php?id=$id'>details</a> || <a href='../orders/create.php?id=$id'>Add to cart</a></p>";
}