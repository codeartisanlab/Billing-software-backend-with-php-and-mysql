<?php include('../includes/header.php'); ?> 

	

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">View Sale</h4>
				</div>

				<div class="card-body">
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Product</th>
						      <th scope="col">Phone</th>
						      <th scope="col">Status</th>
						      <th scope="col">Price</th>
						    
						      <th scope="col">Qty</th>
						      <th scope="col">Total</th>
						      <th scope="col">Discount</th>
						      <th scope="col">Dis Price</th>
						      <th scope="col">Tax Rate</th>
						      <th scope="col">With Tax</th>
						      <th scope="col">Invoice</th>
						     
						      
						    </tr>
						  </thead>
						  <tbody>


						  	<?php
						  	$i=1;
						  		$sales=fetch_all_sale($conn);
						  		if ($sales['bool']==true) {
						  			foreach ($sales['alldata'] as $sale) {
						  				// print_r($vendor);

						  				        // _p($sale);


						  				$product=fetch_single_product($conn,$sale[1]);

						  				     // _p($product);


						  			
					  		?>


						    <tr>
						      <th scope="row"><?php echo $i; $i++; ?></th>
						      <td><?php echo $product['alldata']['name']; ?></td>
						      <td><?php echo $sale[2]; ?></td>
						      <td><?php echo $sale[3]; ?></td>
						      <td><?php echo $sale[4]; ?></td>
						      <td><?php echo $sale[5]; ?></td>
						      <td><?php echo $sale[6]; ?></td>
						      <td><?php echo $sale[7]; ?></td>
						      <td><?php echo $sale[8]; ?></td>
						      <td><?php echo $sale[9]; ?></td>
						      <td><?php echo $sale[10]; ?></td>
						      <td>
						      	<a href="invoice.php?id=<?php echo $sale[0]; ?>" class="btn btn-warning"><i class="fa-solid fa-file-invoice"></i></a>
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