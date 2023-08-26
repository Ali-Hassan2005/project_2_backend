<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    // connect to DB
    require_once "../config/db_connection.php";

    $id=$_GET['id'];

    $selectProductQuery = "SELECT * FROM products WHERE id=$id";
    
    $resultProduct = mysqli_query($connection, $selectProductQuery);

    $productDetails = mysqli_fetch_assoc($resultProduct);

    ?>

    <p><a href='index.php'>All products</a>
    <form action="edit.php?id=<?php echo $_GET["id"];?>" method="post">
        <table align="center">
            <tr>
                <th>Name:</th>
                <td><input type="text" name="name" value="<?=$productDetails['name'];?>" /></td>
            </tr>
            <tr>
                <th>Size:</th>
                <td><input type="text" name="size" value="<?=$productDetails['size'];?>" /></td>
            </tr>
            <tr>
                <th>Color:</th>
                <td><input type="text" name="color" value="<?=$productDetails['color'];?>" /></td>
            </tr>
            <tr>
                <th>Count in stock:</th>
                <td><input type="text" name="count_in_stock" value="<?=$productDetails['count_in_stock'];?>" /></td>
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
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $count_in_stock = $_POST['count_in_stock'];
            $product_id = $_GET['id'];

            // write query
            $query = "UPDATE products SET name='$name',size='$size',color='$color',count_in_stock=$count_in_stock WHERE id=$product_id";

            // send query
            mysqli_query($connection, $query);

            header("Location: index.php");
        }
    ?>
</body>
</html>