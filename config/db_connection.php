<?php

$connection = mysqli_connect("127.0.0.1", "root", "", "project");

if(!$connection) {
    echo "Error in connection";
    die;
}