<?php include('../includes/header.php'); ?> 



	<div class="container">
		<div class="row">
			
			<?php include('../includes/sidebar.php'); ?>

			<div class="col-md-9 mt-5">
				<div class="row">
					<div class="col-md-3">
						<a href="<?php echo $baseurl; ?>product/view-product.php" class="text-decoration-none">
						<div class="card">
							<div class="card-header bg-dark text-light">
								<h6 class="text-center m-0">Total Products</h6>
								
							</div>

							<?php

								$product=count_all_product($conn);
								 // _p($product);
							?>
							<div class="card-body bg-warning">
								<h4 class="text-center m-0"><?php echo $product; ?></h4>
								
							</div>
							
						</div>
						</a>
					
					</div>

					<div class="col-md-3">
						<a href="<?php echo $baseurl; ?>vendor/view-vendor.php" class="text-decoration-none">
						<div class="card">
							<div class="card-header bg-dark text-light">
								<h6 class="text-center m-0">Total Vendors</h6>
								
							</div>

							<?php

								$vendor=count_all_vendor($conn);
								// _p($vendor);
							?>
							
							<div class="card-body bg-info">
								<h4 class="text-center m-0"><?php echo $vendor; ?></h4>
								
							</div>
							
						</div>
					</a>
					</div>

					<div class="col-md-3">
						<a href="<?php echo $baseurl; ?>sale/view-sale.php" class="text-decoration-none">
						<div class="card">
							<div class="card-header bg-dark text-light">
								<h6 class="text-center m-0">Total Sale</h6>
								
							</div>
							<div class="card-body bg-danger">

								<?php

									$sale=fetch_total_sale($conn);

								?>
								<h4 class="text-center m-0">₹<?php echo $sale; ?></h4>
								
							</div>
							
						</div>
					</a>
					</div>


					<div class="col-md-3">
						<a href="<?php echo $baseurl; ?>purchase/view-purchase.php" class="text-decoration-none">
						<div class="card">
							<div class="card-header bg-dark text-light">
								<h6 class="text-center m-0">Total Purchase</h6>
								
							</div>

							<div class="card-body bg-primary">

								<?php

									$purchase=fetch_total_purchase($conn);

								?>

								<h4 class="text-center m-0">₹<?php echo $purchase; ?></h4>
								
							</div>
							
						</div>
					</a>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>

<?php include('../includes/footer.php'); ?> 