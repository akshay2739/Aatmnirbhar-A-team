<?php 
    require_once('bootstrap.php');
?>
<style>

/* @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap'); */
*{
  /* font-family: 'Bebas neue', sans-serif; */
  letter-spacing:.05rem
}

.navbar ul li a
{
  letter-spacing: .2rem !important;
  /* font-weight:bold; */
}
</style>

<nav class="navbar shadow fixed-top navbar-expand-lg navbar-dark bg-dark py-3">
  <a class="navbar-brand" href="index.php">WMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav m-auto">
      <li class="nav-item px-3">
        <a class="nav-link" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
      <li class="nav-item dropdown px-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="addProduct.php">Add Product</a>
          <a class="dropdown-item" href="manageProducts.php">Manage Product</a>
        </div>
      </li>
      <li class="nav-item dropdown px-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sales
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="addSales.php">Add Sales</a>
          <a class="dropdown-item" href="manageSales.php">View Sales</a>
          <a href="salesReport.php" class="dropdown-item">Sales Report</a>
        </div>
      </li>
      
    </ul>
  </div>
</nav>

<div class="top-offset" style="height:100px"></div>