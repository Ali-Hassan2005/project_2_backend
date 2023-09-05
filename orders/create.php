<?php 
session_start();

if(!isset($_SESSION['id']) && $_SESSION['id'] == ""){
    header("Location: ../clients/login.php");
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
    <form action="create.php?id=<?php echo $_GET['id'];?>" method="post">
        <table align="center">
            <tr>
                <th>Count:</th>
                <td><input type="text" name="count_in_stock" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
            </tr>
        </table>
    </form>


    <?php
    

        if(isset($_SESSION['id'] )&& isset($_POST['count_in_stock'])) {
            $client_id = $_SESSION['id'];
            $count = $_POST['count_in_stock'];
            $product_id = $_GET['id'];

            
            require_once "../config/db_connection.php";

            
            $selectProductCountQuery = "SELECT count_in_stock FROM products WHERE id = $product_id";

            $productCountResult = mysqli_query($connection, $selectProductCountQuery);

            $productCount = mysqli_fetch_assoc($productCountResult);

            $productCountInStock = $productCount['count_in_stock'];  

            if($productCountInStock < $count) {
                echo "There no enough stock";
                die;
            }

            
            $orderQuery = "INSERT INTO orders (client_id,count) VALUES ($client_id,$count)";

            $orderResult = mysqli_query($connection, $orderQuery);

            
            $lastOrderQuery = "SELECT id FROM orders WHERE client_id=$client_id ORDER BY id DESC LIMIT 1";

            $lastOrderResult = mysqli_query($connection, $lastOrderQuery);

            $lastOrderDetails = mysqli_fetch_assoc($lastOrderResult);

            $lastOrderId = $lastOrderDetails['id'];

            $orderProductQuery = "INSERT INTO order_product(order_id,product_id) VALUES($lastOrderId,$product_id)";

            $orderProductResult = mysqli_query($connection, $orderProductQuery);

            $updatedCount = $productCountInStock - $count;

            $updateProductQuery = "UPDATE products SET count_in_stock=$updatedCount WHERE id=$product_id";

            $updatedProductResult = mysqli_query($connection, $updateProductQuery);

            if($orderProductResult) {
                header("location: index.php");
            }
        }
    ?>
</body>
</html>