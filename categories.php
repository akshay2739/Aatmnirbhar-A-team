<?php
require_once('include/database.php');
require_once('include/bootstrap.php');
include('include/sessionCheck.php');
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}
$sql = "SELECT * FROM `categories` ORDER BY `category_id`";
$res = $conn -> query($sql);

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
        <div class="row">
            <div class="col-lg-3 col-sm-12 pt-5">
                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="include/addCategorie.inc.php" class="form-group" method="POST">
                            <input type="text" class="form-control" name="categorie" required>
                            <input type="submit" class="form-control bg-primary text-white mt-2" name="add" value="Add Categorie">
                        </form>
                    </div>
                </div>            
            </div>

            <div class="col-lg-9 col-sm-12  pt-5">
                <div class="card">
                    <div class="card-header">
                        All categories
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table text-center table-sm table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>    
                                    <th colspan=3>Actions</th>
                                </tr>
                                <?php while(($r = $res->fetch_assoc())){ ?>
                                    <tr>
                                        <td><?php echo $r['category_id'] ?></td>
                                        <td><?php echo $r['category_name']?></td>
                                        <td> 
                                            <a class="btn btn-sm bg-warning text-white" href='edit_category.php?id=<?php echo $r['category_id']; ?>'> Edit </a>
                                        </td>
                                        <td>
                                            <a class=" btn btn-sm bg-danger text-white" href='delete_category.php?id=<?php echo $r['category_id']; ?>'> Delete </a>
                                        </td>
                                            
                                        <td>
                                            <a class="   btn btn-sm bg-success text-white" href='manageProducts.php?id=<?php echo $r['category_id']; ?>'>View Products</a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?> 
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>                                

    

    
</body>
</html>


