<?php

$id=$_GET['id'];

require_once "../controllers/Product.php";
$clientObject = new Product();
$result = $clientObject->delete($id);


if($result) {
    header("location: index.php");
}
