<!DOCTYPE html>
<?php
    $connect = mysqli_connect("localhost","root","","shopping");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-4.6.0-dist\css\bootstrap.min.css">
    <title>BRANDS</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/footers/">
    <script src="bootstrap-4.6.0-dist\js\bootstrap.bundle.js"></script>
    <script src="bootstrap-4.6.0-dist\js\bootstrap.js"></script>
    <link href="headers.css" rel="stylesheet">
    <link href="footers.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      body {
            text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
            box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);}
    </style>
</head>
<body>
<div class='container'>
      <header class='d-flex flex-wrap justify-content-center py-3 mb-3 border-bottom'>
        <div class='my-4'>
        <ul class='nav nav-pills'>
          <li class='nav-item'><a href='home.php' class='nav-link text-secondary' aria-current='page'>HOME</a></li>
          <li class='nav-item'><a href='brands.php' class='nav-link active'>BRANDS</a></li>
          <li class='nav-item'><a href='shopping.php' class='nav-link text-secondary'>SHOPPING</a></li>
          <li class='nav-item'><a href='#' class='nav-link text-secondary'>ACCOUNT</a></li>
        </ul>
        </div>
        <form action='shopping.php' method='post' class='ml-5 d-flex align-items-center text-dark text-decoration-none'>
            <input type='search' name='txtsearch' class='form-control mx-3 my-2' placeholder='Search Brand' required>
            <button name='btnSearch' class='btn btn-outline-secondary'>Search</button>
        </form>
      </header>
</div>
    <div class="container-fluid">
        <h2 align="center" class="mt-5 mb-5">Clothing SA Brands</h2>
        <div class="row" align="center">
            <div class="col-lg-12">
                <form action='' method='POST'>
                    <button name="btn_top_selling" class="btn btn-secondary my-2">Top Selling</button>
                    <button name="btn_recommended" class="btn btn-secondary mx-2 my2">Recommended</button>
                    <button name="btn_new_brands"  class="btn btn-secondary my2">New Brands</button><br>
                </form>  
                    <div class="top_selling">

                        <?php
                            if(isset($_POST['btn_top_selling']))
                            {
                                include'top_selling.php';
                            }
                            else if(isset($_POST['btn_recommended']))
                            {
                                include'recommended.php';
                            }
                            else if(isset($_POST['btn_new_brands']))
                            {
                                include'newbrands.php';
                            }
                            else{
                                include'commonbrands.php';
                            }
                            
                        ?>
                        
                    </div>
            </div>
        </div>
    </div>    
    <?php
        include'footer.php';
    ?>
</body>
</html>