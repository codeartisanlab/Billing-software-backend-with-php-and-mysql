<?php include('../includes/header.php'); ?> 

	<?php


		$addres="";

		if (isset($_POST['submit'])) {

			$addres=add_sale($conn,$_POST);
		}
		?>

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Add Sale</h4>
				</div>

				<?php
					echo $addres;

				?>

				<div class="card-body">
						<form action="" method="post">
							  <table class="table table-bordered">
							  	
							  	

							  	<tr>
							  		<th>Product</th>
							  		<td>
							  			<select class="form-select" aria-label="Default select example" name="product">
										  <option selected>Open this Product menu</option>

										  	<?php
										  	$i=1;
										  		$products=fetch_all_product($conn);
										  		if ($products['bool']==true) {
										  			foreach ($products['alldata'] as $product) {
										  				

										  				      // _p($product);
										  			
									  	?>

										  <option value="<?php echo $product[0]; ?>"><?php echo $product[2]; ?></option>

										   <?php
										    	}
										    }
										  	?>
										  

										</select>
							  		</td>
							  	</tr>

							  	
							  	<tr>
							  		<th>Phone</th>
							  		<td ><input type="text" class="form-control" placeholder="Phone Number" name="phone"></td>
							  	</tr>
							  	<tr>
							  		<th>Status</th>
							  		<td>
							  			<select class="form-select" aria-label="Default select example" name="status">
										  <option selected>Open this Status menu</option>

										  <option value="Paid">Paid</option>
										  <option value="Due">Due</option>
										  <option value="Cancel">Cancel</option>
										</select>
							  		</td>
							  	</tr>

							  	<tr>
							  		<th>Price</th>
							  		<td ><input type="text" class="form-control" placeholder="Price" name="price"></td>
							  	</tr>

							  	<tr>
							  		<th>Qty</th>
							  		<td ><input type="text" class="form-control" placeholder="Qty" name="qty"></td>
							  	</tr>

							  	<tr>
							  		<th>Total</th>
							  		<td ><input readonly type="text" class="form-control" placeholder="Total" name="total"></td>
							  	</tr>

							  	<tr>
							  		<th>Discount</th>
							  		<td ><input type="text" class="form-control" placeholder="Discount" name="discount"></td>
							  	</tr>

							  	<tr>
							  		<th>Dis Price</th>
							  		<td ><input type="text" class="form-control" placeholder="Discount Price" name="dis_price"></td>
							  	</tr>

							  	<tr>
							  		<th>Tax Rate (18%)</th>
							  		<td ><input type="text" class="form-control" placeholder="Tax Rate" name="tax_rate"></td>
							  	</tr>

							  	<tr>
							  		<th>With Tax Price</th>
							  		<td ><input type="text" class="form-control" placeholder="With Tax Price" name="tax_price"></td>
							  	</tr>

							  

							  	
							  </table>
							 
							  <button type="submit" name="submit" class="btn btn-dark form-control">Add Data</button>
							</form>
				</div>
				
			</div>
			</div>
			
		</div>
		
	</div>

<?php include('../includes/footer.php'); ?> 