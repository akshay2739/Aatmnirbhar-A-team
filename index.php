<?php

    require_once('include/database.php');
    require_once('include/bootstrap.php');
    require_once('include/sessionCheck.php');
    require_once('include/header.php');

    
?>
<link href="style.css" rel="stylesheet" type="Text/css">
<?php
    
    $sql="SELECT * FROM `categories`";
    $result=$conn->query($sql);
    $categories = mysqli_num_rows($result);
    
    $sql="SELECT * FROM `products`";
    $result=$conn->query($sql);
    $products = mysqli_num_rows($result);
    
    $sql="SELECT * FROM `sales`";
    $result=$conn->query($sql);
    $sales = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once('include/header.php') ?>
    <div class="container">
        
        <div class="row justify-content-between align-items-center mt-5">
            <div class="col-lg-3 col-sm-12 bg-primary text-white text-center p-5 align-items-center">
                <i class="fas h1 fa-tasks"></i>
                <p class="">Categories: <?php echo $categories; ?> </p>
            </div>
            <div class="col-lg-3 col-sm-12 bg-danger text-white text-center p-5 align-items-center">
                <i class="fas h1 fa-shopping-cart"></i>
                <p>Products: <?php echo $products; ?> </p>
            </div>
            <div class="col-lg-3 col-sm-12 bg-success text-white text-center p-5 align-items-center">
                <i class="fa h1 fa-inr" aria-hidden="true"></i>
                <p> Sales: <?php echo $sales; ?> </p>
            </div>
        </div>

        <div class="row justi-content-between mt-5">
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="card">
                    <div class="card-header">Recently added Prducts</div>
                    <div class="card-body">
                        <?php

                            $sql= "select * from products order by product_id desc limit 5";
                            $result=$conn->query($sql);
                            while($r=$result->fetch_assoc()){
                                $category_id=$r['category_id'];
                                $sql1="select * from categories where category_id='$category_id'";
                                $result1=$conn->query($sql1);
                                while($r1=$result1->fetch_assoc()){
                                    $category=$r1['category_name'];
                                }
                        ?>
                            <a class="row" href="editProduct.php?id=<?php echo $r['product_id'];?>">
                                <p>
                                    <?php echo "name:- ".$r['product_name']?>
                                </p>
                            </a>

                            <?php        
                                }
                            ?>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="card">
                    <div class="card-header">Latest Sales</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Total Sale($)</th>
                                </tr>
                                <?php
                                    $index=0;

                                    $sql="select * from sales order by id desc limit 5";
                                    $result=$conn->query($sql);
                                    while($r=$result->fetch_assoc())
                                    {
                                        $index++;
                                        $time = $r['date'];
                                        $date= explode (" ", $time);
                                        // echo "<h2>".$date[0]."</h2>";
                                ?>

                                <tr>
                                    <td><?php echo $index; ?> </td>
                                    <td><?php echo $r['p_name']; ?> </td>
                                    <td><?php echo $date[0]; ?> </td>
                                    <td><?php echo $r['price']; ?> </td>
                                </tr>

                                <?php

                                    }

                                ?>
                            </table>    
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="card">
                    <div class="card-header">Highest Salling products</div>
                    <div class="card-body">
                        <div class="table-responsive">
                                    
                            <table class="table table-bordered">
                                <tr>
                                    <td>Product Name</td>
                                    <td>Total Sold</td>
                                    <td>Total Quantity</td>
                                </tr>

                                <?php

                                    $sql="select * , COUNT(*) FROM sales group by p_name order by COUNT(*) desc limit 3";
                                    $result=$conn->query($sql);
                                    while($r=$result->fetch_assoc()){
                                        $name=$r['p_name'];
                                        $sql1="select * from products where product_name='$name'";
                                        $result1=$conn->query($sql1);
                                        $qty=0;
                                        while($r1=$result1->fetch_assoc()){
                                            $qty+=$r1['quantity'];
                                        }
                                ?>

                                <tr>
                                    <td><?php echo $r['p_name'];  ?></td>
                                    <td><?php echo $r['COUNT(*)'];  ?></td>
                                    <td><?php echo $qty;  ?></td>
                                </tr>

                                <?php
                                    }

                                ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>



