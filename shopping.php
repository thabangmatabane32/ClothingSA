<!DOCTYPE html>
<?php
    $connect = mysqli_connect("localhost","root","","shopping");
    error_reporting(0);
    session_start();
    if(!empty($_GET["action"])){
        switch($_GET["action"]) {
            //code for adding product in cart
            case "add":
                if(!empty($_POST["quantity"])) {
                    $pid=$_GET["pid"];
                    $myQuery="Select * FROM tblproduct WHERE id='$pid'";
                    $result=mysqli_query($connect,$myQuery);
                      while($productByCode=mysqli_fetch_array($result)){
                    $itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($productByCode["code"] == $k) {
                                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                                        }
                                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                    }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    }  else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            }
            break;
        
            // code for removing product from cart
            case "remove":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["code"] == $k)
                                unset($_SESSION["cart_item"][$k]);				
                            if(empty($_SESSION["cart_item"]))
                                unset($_SESSION["cart_item"]);
                    }
                }
            break;
            // code for if cart is empty
            case "empty":
                unset($_SESSION["cart_item"]);
            break;	
        }
    }
?>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-4.6.0-dist\css\bootstrap.min.css">
    <title>Shopping</title>
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
          <li class='nav-item'><a href='brands.php' class='nav-link text-secondary'>BRANDS</a></li>
          <li class='nav-item'><a href='shopping.php' class='nav-link active'>SHOPPING</a></li>
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
          <div class="row">

          </div>
          <div class="row">
              <div class="col-lg-4">

              </div>
              <div class="col-lg-4 text-center">
                  
              </div>
              <div class="col-lg-4 text-center">
                  <a href='cart.php' class='btn btn-secondary' data-target='#shopping-cart'>Cart</a>
              </div>
          </div>

         <?php include'products.php'; ?>

      </div>
      <?php include'footer.php';?>
    </body>
</html>