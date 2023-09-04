<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <p><a href='index.php'>All products</a></p>
    <form action="create.php" method="post" enctype="multipart/form-data">
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
                <th>Image:</th>
                <td><input type="file" name="image" /></td>
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

        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $destination = "../Uploads/products/" . $file_name;
        
        
        if(move_uploaded_file($tmp_name, $destination)) {
            
            require_once "../controllers/Product.php";
            $clientObject = new Product();
            $result = $clientObject->create($name, $size, $file_name, $color, $count_in_stock);

            if($result) {
                
                header("Location: index.php");
            }
        } else {
            echo "File upload failed.";
        }
    }
    ?>
</body>
</html>
