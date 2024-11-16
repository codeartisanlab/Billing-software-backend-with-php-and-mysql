<?php $baseurl="http://localhost/core-php/Billing-Software/" ?>

<?php include('../db_connect.php'); ?>

<?php


if(!isset($_SESSION['loginstatus'])) {
  header("location: ../login.php");
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
    <body>
      <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1"><a href="<?php echo "$baseurl"; ?>dashboard/./" ><img src="../logo/logo.png"></a></span>
      <a href="<?php echo "$baseurl"; ?>logout.php" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
  </nav>







      
