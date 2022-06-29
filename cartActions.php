<?php
$connect = mysqli_connect("localhost","root","","shopping");
if(!empty($_GET["action"])) {
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

    if(isset($_SESSION["cart_item"]))
    {
        $total_quantity = 0;  
        $total_price = 0;
        $output = "";

        foreach($_SESSION["cart_item"] as $item)
        {
            $item_price = $item['quantity'] * $item['price'];

            $output .= "<h5 class='fs-4'>".$item['code']."</h5>
                        <h5 class='fs-4'>".$item['name']."
                        <h5 class='fs-4'>".$item['price']."
                        <h5><a href='index.php?action=remove&code=".$item['code'];."' class='btnRemoveAction'><img src='icon-delete.png' alt='Remove Item' />Remove</a></h5>";

        }

        echo $output;
    }
    else{
        echo "<div class='no-records'>Your Cart is Empty</div>";
    }
?>