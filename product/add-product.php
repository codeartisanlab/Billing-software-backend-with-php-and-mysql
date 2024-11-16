<?php include('../includes/header.php'); ?> 


	<?php

	$imgres="";
	$addres="";

	if (isset($_POST['submit'])) {

		$image=time().'_'.$_FILES['image']['name'];
		$tmp_name=$_FILES['image']['tmp_name'];

		if (move_uploaded_file($tmp_name,'../imgs/product/'.$image)) {

			$imgres='Image Uploaded!!';
		}else{
			$imgres='Image Not Uploaded!!';
		}

		$addres=add_product($conn,$_POST,$image);
	}
	?>

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Add Product</h4>
				</div>

				<?php
					echo $imgres."</br>";
					echo $addres;

				?>

				<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							  <table class="table table-bordered">
							  	<tr>
							  		<th>Image</th>
							  		<td ><input type="file" name="image" class="form-control"></td>
							  	</tr>
							  	<tr>
							  		<th>Name</th>
							  		<td ><input type="text" placeholder="Name" name="name" class="form-control"></td>
							  	</tr>

							  	<tr>
							  		<th>Category</th>
							  		<td>
							  			<select class="form-select" aria-label="Default select example" name="category">
							  				<option selected>Open this Category menu</option>
						  				<?php
										  	$i=1;
										  		$category=fetch_all_category($conn);
										  		if ($category['bool']==true) {
										  			foreach ($category['alldata'] as $cat) {
										  				// print_r($vendor);

										  				    // _p($cat);
										  			
									  	?>
										  <option value="<?php echo $cat[0]; ?>"><?php echo $cat[1]; ?></option>

										  <?php
										    	}
										    }
										  	?>
										  
										</select>
							  		</td>
							  	</tr>

							  	<!-- <tr>
							  		<th>Price</th>
							  		<td ><input type="text" class="form-control" placeholder="Price" name="price"></td>
							  	</tr> -->

							  	<tr>
							  		<th>Opening Stock</th>
							  		<td ><input type="text" class="form-control" placeholder="Opening Stock" name="opening_stock"></td>
							  	</tr>

							  	<tr>
							  		<th>Current Stock</th>
							  		<td ><input type="text" class="form-control" placeholder="Current Stock" name="current_stock"></td>
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