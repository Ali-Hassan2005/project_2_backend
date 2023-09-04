<?php

require_once "DBOperations.php";

class Client extends DBOperations
{

    public function register($full_name, $email, $username, $password, $phone_number, $address)
    {
        
        $query = "INSERT INTO `clients`
            (`full_name`, `email`, `username`, `password`, `phone_number`, `address`)
            VALUES
            ('$full_name', '$email', '$username', '$password', '$phone_number', '$address');";

        return $this->connect($query);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function login($username, $password)
    {
        
        $sql = "SELECT * FROM clients WHERE username='$username' AND password='$password'";

    return $this->connect($sql);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function edit($full_name, $email,$phone_number,$address,$id)
    {
        
        $query = "UPDATE clients
            SET full_name='$full_name', email='$email', phone_number='$phone_number', address='$address'
            WHERE id=$id";

    return $this->connect($query);
    }
}
