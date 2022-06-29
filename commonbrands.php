<?php
  $query = "Select * From tblbrand LIMIT 9";
  $result = mysqli_query($connect,$query);

  $output = "
  <h4 class='text-center mt-5 mb-4'>Common Brands</h4>
  <form action='home.php' method='POST'>
              <div class='container'>
                <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3'>";

          if(mysqli_num_rows($result) < 1)
          {
              $output .= "<h2>No Brands Available</h2>";
          }
          while($row = mysqli_fetch_array($result))
          {
              $output .= "<div class='col'>
                            <div class = 'card shadow-sm my-2'>
                              <img src= 'images/".$row['logo']."' class='bd-placeholder-img card-img-top'>
                              <div class='card-body'>
                                <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <div class='d-flex justify-content-between align-items-center'>
                                  <div class='btn-group'>
                                    <button type='submit ' name='shopnow' class='btn btn-outline-primary'>Shop Now</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>";
          }
  $output .=  " </div>
              </div>
            </form>";
   echo $output;        
?>

