<?php include('../includes/header.php'); ?> 


<?php


$addres="";

if (isset($_POST['submit'])) {

	$addres=add_purchase($conn,$_POST);
}
?>

	

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Add Purchase</h4>
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
							  		<th>Vendor</th>
							  		<td>
							  			<select class="form-select" aria-label="Default select example" name="vendor">
										  <option selected>Open this Vendor menu</option>
										  <?php
										  	$i=1;
										  		$vendors=fetch_all_vendor($conn);
										  		if ($vendors['bool']==true) {
										  			foreach ($vendors['alldata'] as $vendor) {
										  				

										  				      // _p($vendor);
										  			
									  	?>

										  <option value="<?php echo $vendor[0]; ?>"><?php echo $vendor[2]; ?></option>

										  <?php
										    	}
										    }
										  	?>
										  
										</select>
							  		</td>
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
							  		<td ><input type="text" class="form-control" name="price" placeholder="Price"></td>
							  	</tr>

							  	<tr>
							  		<th>Qty</th>
							  		<td ><input type="text" class="form-control" name="qty" placeholder="Qty"></td>
							  	</tr>

							  	<tr>
							  		<th>Total</th>
							  		<td ><input readonly type="text" class="form-control" name="total" placeholder="Total"></td>
							  	</tr>

							  	<tr>
							  		<th>Discount</th>
							  		<td ><input type="text" class="form-control" name="discount" placeholder="Discount"></td>
							  	</tr>

							  	<tr>
							  		<th>Dis Price</th>
							  		<td ><input type="text" class="form-control" name="dis_price" placeholder="Dis Price"></td>
							  	</tr>

							  	<tr>
							  		<th>Tax Rate (18%)</th>
							  		<td ><input type="text" class="form-control" name="tax_rate" placeholder="Tax Rate"></td>
							  	</tr>

							  	<tr>
							  		<th>With Tax Price</th>
							  		<td ><input type="text" class="form-control" name="tax_price" placeholder="With Tax Price"></td>
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