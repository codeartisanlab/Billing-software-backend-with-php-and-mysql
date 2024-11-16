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
        <a class="btn btn-dark float-end d-print-none" href="view-sale.php"><i class="fa-solid fa-xmark"></i></a>
        <div class="card">
          <div class="card-body">

             <?php

                  $id=$_GET['id'];
                  $sale=fetch_single_sale($conn,$id);

                       // _p($sale);


                  $product=fetch_single_product($conn,$sale['alldata']['product']);

                        // _p($product);
                
            ?>

            <div class="row">
              <div class="col-md-6">
                <p>
                  <strong>Bill To:</strong></br>
                  Customer</br>
                  Mob.: <?php echo $sale['alldata']['phone']; ?>
                </p>
              </div>
              <div class="col-md-6 text-md-end">
                <h1>INVOICE</h1>
                <p>Invoice No.: INVNO-<?php echo $sale['alldata']['id']; ?></br>
                  Date/Time: <?php echo $sale['alldata']['date_time']; ?><br>
                  
                <?php
                    if ($sale['alldata']['status']=='Paid') {
                     $color='success';
                    }elseif($sale['alldata']['status']=='Cancel'){
                        $color='danger';
                    }else{
                      $color='warning';
                    }
                  ?>


                 <p class="badge text-bg-<?php echo $color; ?>">
                  <?php echo $sale['alldata']['status']; ?> 
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
                  <td><?php echo $sale['alldata']['qty']; ?></td>
                  <td><?php echo $sale['alldata']['price']; ?></td>
                  <td><?php echo $sale['alldata']['total']; ?></td>
                </tr>

                
                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <th>Discount(-)</th>
                  <td><?php echo $sale['alldata']['discount']; ?></td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <th>Tax(18%)</th>
                  <td><?php echo $sale['alldata']['tax_rate']; ?></td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <th>Total</th>
                  <th><?php echo $sale['alldata']['tax_price']; ?></th>
                  
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
                   $settingsData=fetch_settings_data($conn);

                   // _p($settingsData);

                   $image='';
                      if ($settingsData['bool']==true) {
                        $image=$settingsData['alldata']['dark_logo'];

                       // _p($image);
                      }
                ?>

                <?php
                  if ($image!='') {
                    
                ?>
                  <img src="../logo/<?php echo $image; ?>" width="185px" height="60px" >

                 <?php
                  }
                ?>

                <p>
                  <strong>Company: <?php echo $settingsData['alldata']['company_name']; ?></strong><br>
                  <b>Mob:</b> <?php echo $settingsData['alldata']['phone']; ?><br>
                  <b>Address:</b> <?php echo $settingsData['alldata']['address']; ?>
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

   

    


    