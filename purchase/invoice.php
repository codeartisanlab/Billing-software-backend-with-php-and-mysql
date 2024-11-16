   <?php require('../db_connect.php'); ?>
    
   <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Billing Software</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>

    <div class="row">
      <div class="col-md-8 offset-md-2 mt-5">
        <button class="btn btn-info d-print-none mb-2" onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        <a class="btn btn-dark float-end d-print-none" href="view-purchase.php"><i class="fa-solid fa-xmark"></i></a>
        <div class="card">
          <div class="card-body">

             

            <div class="row">
              <div class="col-md-6">

                <?php
                   $settingsData=fetch_settings_data($conn);

                    // _p($settingsData);

                   $id=$_GET['id'];
                  $purchase=fetch_single_purchase($conn,$id);

                  // _p($purchase);


                   $product=fetch_single_product($conn,$purchase['alldata']['product']);

                         // _p($product);
                

                   
                ?>
                <p>
                  <strong>Bill To:</strong></br>
                  
                  <?php echo $settingsData['alldata']['company_name']; ?></br>
                  Mob.: <?php echo $settingsData['alldata']['phone']; ?>
                </p>
              </div>
              <div class="col-md-6 text-md-end">
                <h1>INVOICE</h1>
                <p>Invoice No.: INVNO-<?php echo $settingsData['alldata']['id']; ?></br>
                  Date/Time: <?php echo $purchase['alldata']['date_time']; ?><br>

                  <?php
                    if ($purchase['alldata']['status']=='Paid') {
                     $color='success';
                    }elseif($purchase['alldata']['status']=='Cancel'){
                        $color='danger';
                    }else{
                      $color='warning';
                    }
                  ?>


                 <p class="badge text-bg-<?php echo $color; ?>">
                  <?php echo $purchase['alldata']['status']; ?> 
                </p> 


              </div>
            </div>
            <hr>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Item</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>

               

                <tr>
                  <th scope="row">1</th>
                  <td><?php echo $product['alldata']['name']; ?></td>
                  <td><?php echo $purchase['alldata']['qty']; ?></td>
                  <td><?php echo $purchase['alldata']['price']; ?></td>
                  <td><?php echo $purchase['alldata']['total']; ?></td>
                 
                </tr>

                
                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <th>Discount(-)</th>
                  <td><?php echo $purchase['alldata']['discount']; ?></td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <th>Tax(18%)</th>
                  <td><?php echo $purchase['alldata']['tax_rate']; ?></td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <th>Total</th>
                  <th><?php echo $purchase['alldata']['tax_price']; ?></th>
                  
                </tr>
                
              </tbody>
            </table>

            <div class="row mt-5">
              <div class="col-md-6">
                <p class="text-secondary" style="margin-top:85px;">
                  <strong>ThankYou!</strong><br>
                  Designed by Code Artisan Lab
                </p>
              </div>
              <div class="col-md-6 text-md-end">
                <?php

                $vendor=fetch_single_vendor($conn,$purchase['alldata']['vendor']);


                // _p($vendor);

               $image='';
                      if ($vendor['bool']==true) {
                        $image=$vendor['alldata']['image'];

                        // _p($image);
                      }
                ?>

                <?php
                  if ($image!='') {
                    
                ?>
                
                  <img src="../imgs/vendor/<?php echo $vendor['alldata']['image']; ?>" width="75" >

                   <?php
                       }
                    ?>
                 
                <p>
                  <strong>Vendor:</strong> <?php echo $vendor['alldata']['name']; ?><br>
                  <b>Mob:</b> <?php echo $vendor['alldata']['phone']; ?><br>
                  <b>Address:</b> <?php echo $vendor['alldata']['address']; ?>
                </p>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

   

    


    