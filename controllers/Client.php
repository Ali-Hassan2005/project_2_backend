<?php

require_once "Database.php";

class Client extends Database
{

    public function register($full_name, $email, $username, $password, $phone_number, $address)
    {
        $tableName='clients';
        $fields =[
            "full_name" => $full_name, "email" => $email, "username" => $username,
            "password" => $password, "phone_number" => $phone_number, "address" => $address
        ];

        return $this ->INSERT($tableName,$fields);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function login($username, $password)
    {
        $tableName='clients';
        $fields = "username='$username' AND password='$password'";

        return $this ->SELECT($tableName,$fields);
    }

    //____________________________________________________________________________________________
    //____________________________________________________________________________________________

    public function edit($full_name, $email,$phone_number,$address,$id)
    {
        $tableName='clients';
        $fields =[
            "full_name" => $full_name, "email" => $email,
            "phone_number" => $phone_number, "address" => $address
        ];
        
        return $this ->UPDATE($tableName,$fields,$id);
    }
}
