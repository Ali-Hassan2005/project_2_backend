<?php

session_start();


if(!isset($_SESSION['id']) || $_SESSION['id'] == ""){
    header("Location: login.php");
}



echo "ID:" . $_SESSION['id'] . "<br />";

echo "Full name:" . $_SESSION['full_name'] ."<br />";

echo "Username:" . $_SESSION['username'] . "<br />"; 

echo "Email:" . $_SESSION['email'] . "<br />";

echo "Phone number:" . $_SESSION['phone_number'] . "<br />";

echo "Address:" . $_SESSION['address'] . "<br />";

echo "Created At:" . $_SESSION['created_at'] . "<br />";

echo "Updated At:" .  $_SESSION['updated_at'] .  "<br />";

?>

<a href="edit.php">edit.php</a>||<a href="logout.php">logout</a>