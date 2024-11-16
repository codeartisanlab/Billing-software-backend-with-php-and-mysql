   <?php require('db_connect.php'); ?>
    <?php
      if(isset($_SESSION['loginstatus'])) {
        header("location: dashboard/index.php");
      }
    ?>
   <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Billing Software</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-dark">

    <div class="row">
      <div class="col-md-4 offset-md-4 mt-5">
        
        <div class="text-center mb-3">

          <?php
            $settingsData=fetch_settings_data($conn);

            // _p($settingsData);
            $image='';
            if ($settingsData['bool']==true) {
              $image=$settingsData['alldata']['light_logo'];

              // _p($image);
            }
          ?>

          <?php
            if ($image!='') {
              
          ?>

          <img src="logo/<?php echo $image; ?>" width="185" height="60px" >
          
          <?php
            }
          ?>


        </div>
        
        <div class="card ">
          <div class="card-header">
            <h3 class="text-center">Login For Access</h3>
          </div>
          <div class="card-body  ">

            <?php
              if (isset($_POST['submit'])) {
               $res=check_login($conn,$_POST);

               if ($res['bool']==true) {
                  header("location:dashboard/index.php");
               }else{
                echo '<p class="alert alert-danger">Username/Password is Not Valid</p>';
               }
              }

            ?>

            <form method="post" action="">
              <div class="mb-3">
                <label class="form-label"><i class="fa-solid fa-user"></i> Username</label>
                <input  type="text" class="form-control" name="username" required>
                
              </div>

              <div class="mb-3">
                <label class="form-label"><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" class="form-control" name="password" required>
                
              </div>
              
              <button type="submit" name="submit" class="btn btn-dark form-control">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

   

    


    