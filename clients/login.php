<?php 
session_start();

if(isset($_SESSION['id']) && $_SESSION['id']!= ""){
    header("Location: Profile.php");
}
?>

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
            
            $password = md5( $_POST['password']);

            
            require_once "../controllers/Client.php";
            $clientObject = new Client();
            $result = $clientObject->login($username, $password);


            if(mysqli_num_rows($result) > 0) {
                $clientDetails = mysqli_fetch_assoc($result);

                $_SESSION['id']=$clientDetails['id'];
                $_SESSION['full_name']=$clientDetails['full_name'];
                $_SESSION['email']=$clientDetails['email'];
                $_SESSION['username']=$clientDetails['username'];
                $_SESSION['password']=$clientDetails['password'];
                $_SESSION['phone_number']=$clientDetails['phone_number'];
                $_SESSION['address']=$clientDetails['address'];
                $_SESSION['created_at']=$clientDetails['created_at'];
                $_SESSION['updated_at']=$clientDetails['updated_at'];



                header("location: ../products/index.php");
            } else {
                echo "Check your username and password";
            }
        }
    ?>

</body>
</html>