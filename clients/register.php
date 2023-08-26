<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <table align="center">
            <tr>
                <th>Name:</th>
                <td><input type="text" name="full_name" /></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="text" name="password" /></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><input type="text" name="phone_number" /></td>
            </tr>
            <tr>
                <th>Full address</th>
                <td>
                    <textarea name="address" id="" cols="30" rows="3"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
            </tr>
        </table>
    </form>


    <?php

        if(isset($_POST['full_name'])) {
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];

            // connect to DB
            require_once "../config/db_connection.php";

            // write query
            $query = "INSERT INTO `clients` 
                (`full_name`, `email`, `username`, `password`, `phone_number`, `address`)
                VALUES 
                ('$full_name', '$email', '$username', '$password', '$phone_number', '$address');";

            // send query to SQL
            $result = mysqli_query($connection, $query);

            if($result) {
                header("Location: login.php");
            }
        }
    ?>
</body>
</html>