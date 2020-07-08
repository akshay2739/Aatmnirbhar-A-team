<?php
session_start();
require('include/database.php');
$res =$conn->query("SELECT * FROM `products` INNER JOIN `categories` ON products.category_id=categories.category_id ORDER BY product_name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sale</title>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function addToCart(id){
            var id = document.getElementById(id+"id").value;
            var quantity = document.getElementById(id+"quantity").value;
            $.ajax({
            type: 'GET',
            url: 'addToCart.php',
            data: {
                'add':1,
                "id":id,
                "quantity":quantity
            },
            success: function (data) {
                var response = JSON.parse(data)
                if(response["status"]==="1"){
                    swal({
                        title: response["head"],
                        text: response["msg"],
                        icon: "success",
                    }).then((value) => {
                        location.reload();

                    });
                }
                else{
                    swal({
                        title: "Oops",
                        text: response["msg"],
                        icon: "warning",
                    }).then((value) => {
                        location.reload();
                    });
                }
                
            }

        });
        }
    </script>
</head>
<body>
<a href="viewCart.php">Show Added Products</a>
<table>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Sales Price</th>
            <th>Quantity to add</th>
            <th>Action</th>
        </tr>
        <?php
            while($row = $res->fetch_assoc()): 
                $quantity=1;
                if(isset($_SESSION["cart"])){
                    if(array_key_exists($row["product_id"],$_SESSION["cart"])){
                        $quantity=$_SESSION["cart"][$row["product_id"]]["quantity"];
                    }
                }
            ?>
                <tr>
                    <input type="hidden" name="id" id="<?php echo $row['product_id']."id"; ?>" value="<?php echo $row['product_id']; ?>">
                    <td><?php echo $row['product_name'] ?></td>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['sales_price'] ?></td>
                    <td><input type="number" id="<?php echo $row['product_id'].'quantity'; ?>" name="quantity" value="<?php echo $quantity ?>" min="1" required></td>
                    <td><input type="button" id="<?php echo $row['product_id']; ?>" value="Add" name="add" onclick="addToCart(this.id)"></td>
                </tr>
        <?php endwhile; ?>
    
    </table>
</body>
</html>