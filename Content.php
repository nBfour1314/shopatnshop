  <?php
  include_once("conection.php");
  ?>

  <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Product</h2>
                        <div class="product-carousel">
                        
                        <!--Load Product DB -->
                           <?php
						  // 	include_once("database.php");
		  				   	$result = pg_query($conn, "SELECT * FROM public.product");
			
                   if (!$result) {
                    echo "An error occurred.\n";
                    exit;
                  }       
                  while ($row = pg_fetch_assoc($result)) {
                  ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="./tree/img/<?php echo $row['pro_image']?>" width="150" height="150">
                                    <div class="product-hover">
                                        <a href="?page=cart" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?page=quanly_chitietsanpham&ma=<?php echo  $row['product_id']?>"><?php echo  $row["product_name"]?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>Price:$<?php echo  $row['price']?></ins> 
                                </div> 
                            </div>
                
                <?php
                }
                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <div class="container-fluid" id="sessionproduct">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="h2">Propose products</h2>
          <div class="row row-cols-1 row-cols-md-3 g-4">
              <!--Load Product DB -->
              <?php
              // 	include_once("database.php");
              $result = pg_query($conn, "SELECT * FROM public.product");

              if (!$result) { //add this check.
                die('Invalid query: ' . pg_error($conn));
              }     
            while ($row = pg_fetch_assoc($result)) {
            ?>
            <div class="col">
              <div class="card h-100">
                <img src="./tree/img/<?php echo $row ['pro_image'] ?>" class="card-img-top" alt="..." width="50" height="50" >
                <div class="card-body">
                  <h5 class="card-title"><?php echo  $row['product_name']?></h5>
                  <p class="card-text">Price:$<?php echo  $row['price']?></p>
                  <p class="card-text"><?php echo  $row['detaildesc']?></p>
                  <a href="?page=cart" class="btn btn-primary">Buy</a>
                </div>
              </div>
            </div>
            <?php
				}
				?>

          </div>
        </div>
      </div>
    </div>
  </div>

 
  


  <!-- End product widget area -->