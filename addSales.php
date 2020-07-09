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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-uppercase">add sales</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-center text-center">
                            
                            <tr class=" ">
                                <th class="">Name</th>
                                <th class="">Category</th>
                                <th class="">Stock</th>
                                <th class="">Sales Price</th>
                                <th class="">Quantity</th>
                                <th class="">Action</th>
                            </tr>
                            <!-- <hr class="m-0 p-0"> -->
                            <?php
                                while($row = $res->fetch_assoc()): ?>
                                    <tr class="">
                                        <input type="hidden" name="id" id="<?php echo $row['product_id']."id"; ?>" value="<?php echo $row['product_id']; ?>">
                                        <td class=""><?php echo $row['product_name'] ?></td>
                                        <td class=""><?php echo $row['category_name'] ?></td>
                                        <td class=""><?php echo $row['quantity'] ?></td>
                                        <td class=""><?php echo $row['sales_price'] ?></td>
                                        <td class=""><input type="number" class="form-control" id="<?php echo $row['product_id'].'quantity'; ?>" name="quantity" value="1" min="1" required></td>
                                        <td class=""><input type="button" id="<?php echo $row['product_id']; ?>" class="btn btn-primary" value="Add" name="add" onclick="confirmSale(this.id)"></td>
                                    </tr>
                            <?php endwhile; ?>
                        
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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