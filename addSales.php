<?php
require('include/database.php');
include('include/sessionCheck.php');
session_start();
$res =$conn->query("SELECT * FROM `products` INNER JOIN `categories` ON products.category_id=categories.category_id ORDER BY product_name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sale</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <?php include_once('include/header.php') ?>
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
                while($row = $res->fetch_assoc()): ?>
                    <tr>
                        <input type="hidden" name="id" id="<?php echo $row['product_id']."id"; ?>" value="<?php echo $row['product_id']; ?>">
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['sales_price'] ?></td>
                        <td><input type="number" id="<?php echo $row['product_id'].'quantity'; ?>" name="quantity" value="1" min="1" required></td>
                        <td><input type="button" id="<?php echo $row['product_id']; ?>" value="Add" name="add" onclick="confirmSale(this.id)"></td>
                    </tr>
            <?php endwhile; ?>
        
        </table>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script>
        function confirmSale(id){
            var id = document.getElementById(id+"id").value;
            var quantity = document.getElementById(id+"quantity").value;
            $.ajax({
            type: 'POST',
            url: 'confirmSale.php',
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
</body>
</html>