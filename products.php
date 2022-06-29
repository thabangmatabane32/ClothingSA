<?php
  $query = "Select * From tblproduct ORDER BY id ASC LIMIT 9";
  $result = mysqli_query($connect,$query);
  
  $output = "
  <h4 class='text-center mt-5 mb-4'>Shop</h4>
              <div class='container'>
                <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3'>";

          if(mysqli_num_rows($result) < 1)
          {
              $output .= "<h2>No Brands Available</h2>";
          }
          while($row = mysqli_fetch_array($result))
          {
              $output .= "<div class='col'>
              <form action='shopping.php?action=add&pid=".$row['id']."' method='POST'>
                            <div class = 'card shadow-sm my-2'>
                              <img src= 'images/".$row['image']."' class='bd-placeholder-img card-img-top'>
                              <div class='card-body'>
                                <p class='card-text'>".$row['name']."<br>R ".$row['price']."</p>
                                <div class='d-flex justify-content-between align-items-center'>
                                  <div class='btn-group'>
                                    <input type='text' class='form-control product-quantity mx-1' name='quantity' value='1' size='2'/>
                                    <input type='submit' value='Add to Cart' class='btn btn-primary btnAddAction'/>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
              </form>";
          }
  $output .=  " </div>
              </div>
            ";
   echo $output;        
?>

