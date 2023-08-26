<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><a href='index.php'>All products</a>
    <form action="create.php" method="post">
        <table align="center">
            <tr>
                <th>Name:</th>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <th>Size:</th>
                <td><input type="text" name="size" /></td>
            </tr>
            <tr>
                <th>Color:</th>
                <td><input type="text" name="color" /></td>
            </tr>
            <tr>
                <th>Count in stock:</th>
                <td><input type="text" name="count_in_stock" /></td>
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

            // connect to DB
            require_once "../config/db_connection.php";

            // write query
            $query = "INSERT INTO products(name,size,color,count_in_stock) VALUES('$name', '$size', '$color', '$count_in_stock')";

            // send query
            mysqli_query($connection, $query);

            header("Location: index.php");
        }
    ?>
</body>
</html>