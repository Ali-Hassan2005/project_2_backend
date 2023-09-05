<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <?php session_start(); ?>

    <form action="edit.php" method="post">
        <table align="center">
            <tr>
                <th>Full name:</th>
                <td><input type="text" name="full_name" value="<?= $_SESSION['full_name']; ?>" /></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input type="email" name="email" value="<?= $_SESSION['email']; ?>" /></td>
            </tr>
            <tr>
                <th>Phone number:</th>
                <td><input type="text" name="phone_number" value="<?= $_SESSION['phone_number']; ?>" /></td>
            </tr>
            <tr>
                <th>Address:</th>
                <td><input type="text" name="address" value="<?= $_SESSION['address']; ?>" /></td>
            </tr>
            <tr>
                <td></td>
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
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $id = $_SESSION['id'];
            
            require_once "../controllers/Client.php";
            $clientObject = new Client();
            $result = $clientObject->edit($full_name, $email,$phone_number,$address,$id);

            if($result){
            $_SESSION['full_name'] = $_POST['full_name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phone_number'] = $_POST['phone_number'];
            $_SESSION['address'] = $_POST['address'];
            
            header("location: ./Profile.php");
            }
        }
    ?>
</body>
</html>
