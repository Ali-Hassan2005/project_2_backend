<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <table align="center">
            <tr>
                <th>Username:</th>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="text" name="password" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
            </tr>
        </table>
    </form>


    <?php

        if(isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            
            require_once "../config/db_connection.php";

            
            $sql = "SELECT * FROM clients WHERE username='$username' AND password='$password'";

            $result = mysqli_query($connection, $sql);

            if(mysqli_num_rows($result) > 0) {
                header("location: ../products/index.php");
            } else {
                echo "Check your username and password";
            }
        }
    ?>
</body>
</html>