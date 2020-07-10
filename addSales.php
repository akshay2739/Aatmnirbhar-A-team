<?php
require('include/database.php');
include('include/sessionCheck.php');
session_start();
// $res =$conn->query("SELECT * FROM `products` INNER JOIN `categories` ON products.category_id=categories.category_id ORDER BY product_name");
$res =$conn->query("SELECT * FROM `categories`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sale</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include('include/bootstrap.php'); ?>

</head>
<body>
    <?php include_once('include/header.php'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-uppercase">add sales</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col text-center">
                                <select name="categories" class="form-control" id="categories" onchange="getProducts(this.value)">
                                <option selected disabled>Select Category</option>
                                <?php while($category = $res->fetch_assoc()): ?>
                                    <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                <?php endwhile; ?>
                                </select>
                                <div id="products">
                                </div>
                                <div id="productDetail">
                                </div>
                                <p class="form-control my-3 font-weight-bold text-success">Total: <span id="total"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script>
        function getProducts(category_id){
            $.ajax({
                type:"GET",
                url: "confirmSale.php",
                data:{
                    "getProducts":1,
                    "category_id":category_id,
                },
                success:function(data){
                    document.getElementById("products").innerHTML=data;
                }
            });
        }
        function getProductDetails(pid){
            $.ajax({
                type:"GET",
                url: "confirmSale.php",
                data:{
                    "getProductDetail":1,
                    "product_id":pid,
                },
                success:function(data){
                    document.getElementById("productDetail").innerHTML=data;
                    displayTotal(1);
                }
            });
        }
        function displayTotal(quant){
            price =document.getElementById("price").innerHTML;
            if(quant>0)
                document.getElementById("total").innerHTML=price*parseFloat(quant);
            else{
                document.getElementById("total").innerHTML="";
            }
            

        }
        function confirmSale(id){
            var quantity = document.getElementById("quantity").value;
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
                    });
                }
                
            }

        });
        }
    </script>
</body>
</html>