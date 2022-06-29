<!DOCTYPE html>
<?php
    $connect = mysqli_connect("localhost","root","","shopping");

    require_once'header.php';
?>
<html>
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
        user-select: none;}
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
                <li class='nav-item'><a href='home.php' class='nav-link active' aria-current='page'>HOME</a></li>
                <li class='nav-item'><a href='brands.php' class='nav-link text-secondary'>BRANDS</a></li>
                <li class='nav-item'><a href='shopping.php' class='nav-link text-secondary'>SHOPPING</a></li>
                <li class='nav-item'><a href='#' class='nav-link text-secondary'>ACCOUNT</a></li>
              </ul>
              </div>
              <form action='shopping.php' method='POST' class='ml-5 d-flex align-items-center text-dark text-decoration-none'>
                  <input type='search' name='txtsearch' class='form-control mx-3 my-2' placeholder='Search Brand' required>
                  <button name='btnSearch' class='btn btn-outline-secondary'>Search</button>
              </form>
            </header>
          </div>
         <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h3 class="fw-light">Clothing SA</h3>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                    <p>
                    <a href="#" class="btn btn-primary my-2">All Brands</a>
                    <a href="#" class="btn btn-secondary my-2">Shop Now</a>
                    </p>
                </div>
             </div>
        </section>
        
          
        <?php
         include'homecontent.php';
         include'feature.php';
         include'footer.php'; 
         ?>
    </body>
</html>