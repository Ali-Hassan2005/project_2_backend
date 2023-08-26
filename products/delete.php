<?php
// connect to DB
require_once "../config/db_connection.php";;

$id=$_GET['id'];

$deleteQuery = "DELETE FROM products WHERE id=$id";

$result = mysqli_query($connection, $deleteQuery);

if($result) {
    header("location: index.php");
}
