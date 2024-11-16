<?php include('../includes/header.php'); ?> 

	

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">View Purcahse</h4>
				</div>

				<div class="card-body">
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Product</th>
						      <th scope="col">Vendor</th>
						      <th scope="col">Status</th>
						      <th scope="col">Price</th>
						      
						      <th scope="col">Qty</th>
						      <th scope="col">Total</th>
						      <th scope="col">Dis</th>
						      <th scope="col">Dis Price</th>
						      <th scope="col">Total Tax</th>
						      <th scope="col">With Tax </th>
						      <th scope="col">Invoice</th>
						      
						    </tr>
						  </thead>
						  <tbody>

						  	<?php
						  	$i=1;
						  		$purchases=fetch_all_purcahse($conn);
						  		if ($purchases['bool']==true) {
						  			foreach ($purchases['alldata'] as $purchase) {
						  				// print_r($vendor);

						  				      // _p($purchase);


						  				$product=fetch_single_product($conn,$purchase[1]);

						  				     // _p($product);


						  				$vendor=fetch_single_vendor($conn,$purchase[2]);

						  				      // _p($vendor);
						  			
					  		?>

						    <tr>
						      <th scope="row"><?php echo $i; $i++; ?></th>
						      <td><?php echo $product['alldata']['name']; ?></td>
						      <td><?php echo $vendor['alldata']['name']; ?></td>
						      <td><?php echo $purchase[3]; ?></td>
						      
						      <td><?php echo $purchase[4]; ?></td>
						      <td><?php echo $purchase[5]; ?></td>
						      <td><?php echo $purchase[6]; ?></td>
						      <td><?php echo $purchase[7]; ?></td>
						      <td><?php echo $purchase[8]; ?></td>
						      <td><?php echo $purchase[9]; ?></td>
						      <td><?php echo $purchase[10]; ?></td>
						      <td>
						      	<a href="invoice.php?id=<?php echo $purchase[0]; ?>" class="btn btn-warning"><i class="fa-solid fa-file-invoice"></i></a>
						      </td>
						      
						      
						    </tr>

						    <?php
						    	}
						    }
						  	?>
						    
						  </tbody>
						</table>
				</div>
				
			</div>
			</div>
			
		</div>
		
	</div>

<?php include('../includes/footer.php'); ?> 