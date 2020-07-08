<?php
include('include/sessionCheck.php');
    session_start();
    $total_amount=0;
    if(!isset($_SESSION["cart"])):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodducts to sell</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    

<p>Nothing added</p>
    <?php else: $products=$_SESSION['cart']; ?>
        <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $key=>$product): ?>
                <tr>
                    <?php foreach($product as $k=>$val): ?>
                        <?php if($k==="price"){$total_amount+=floatval($val);} ?>
                        <td><?php echo $val; ?></td>
                    <?php endforeach; ?>
                    <td><input type="button" value="+" onclick="updateQuantity(1,<?php echo $key.','.$product['quantity']; ?>)"><input type="button" value="-" onclick="updateQuantity(0,<?php echo $key.','.$product['quantity']; ?>)"></td>
                    <td><input type="button" value="remove" onclick="updateQuantity(0,<?php echo $key; ?>,1)"></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>Total Amount</th>
                <td></td>
                <td><?php echo $total_amount; ?></td>
            </tr>
        </tbody>
        </table>
        <form action="confirmSale.php" method="POST">
        <input type="hidden" name="total" value="<?php echo $total_amount; ?>">
            <input type="submit" value="Confirm Sale" name="confirm">
        </form>
    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script>
        function updateQuantity(op,id,quant){
            if(op==1){
                quant++;
            }
            else{
                quant--;
            }
            $.ajax({
            type: 'GET',
            url: 'addToCart.php',
            data: {
                'add':1,
                "id":id,
                "quantity":quant
            },
            success: function (data) {
                console.log(data);
                var response = JSON.parse(data)
                if(response["status"]==="1"){
                    location.reload();
                }
                else{
                    swal({
                        title: "Oops",
                        text: response["msg"],
                        icon: "warning",
                    });
                    // .then((value) => {
                    //     location.reload();
                    // });
                }
                
            }

        });
        }
    </script>
    </body>
</html>