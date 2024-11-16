<?php include('../includes/header.php'); ?> 

	<?php

		$id=$_GET['id'];

		$imgres='';
		$updateres='';

		if (isset($_POST['submit'])) {
			
			if ($_FILES['image']['name']!='') {
				$image=time().'_'.$_FILES['image']['name'];
				$tmp_name=$_FILES['image']['tmp_name'];
				if (move_uploaded_file($tmp_name,'../imgs/product/'.$image)) {
					$imgres='Image has Been Updated';
				}else{
					$imgres='Image not Updated';
				}
			}else{
				$image=$_POST['prev_image'];
			}

			$updateres=edit_product($conn,$_POST,$image,$id);

			
		}

		

		// Fetch Single Product

		$product=fetch_single_product($conn,$id);

		// _p($product);


		// Fetch Single Category

		$category=fetch_single_category($conn,$id);
	   // _p($category);

	?>

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Edit Product</h4>
				</div>

				<?php
					echo $imgres.'</br>';
					echo $updateres;


				?>


				<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							  <table class="table table-bordered">
							  	<tr>
							  		<th>Image</th>
							  		<td >
							  			<img src="../imgs/product/<?php echo $product['alldata']['image']; ?>" width="50px" height="50px">
							  			<input type="file" name="image" class="form-control">

							  			<input type="hidden" name="prev_image" class="form-control" value="<?php echo $product['alldata']['image']; ?>">

							  			
							  		</td>
							  	</tr>
							  	<tr>
							  		<th>Name</th>
							  		<td ><input type="text"  name="name" class="form-control" value="<?php echo $product['alldata']['name']; ?>"></td>
							  	</tr>

							  	<tr>
							  		<th>Category</th>
							  		<td>
							  			<select class="form-select" aria-label="Default select example" name="category">
							  				
						  				<?php
										  	$i=1;
										  		$category=fetch_all_category($conn);
										  		if ($category['bool']==true) {
										  			foreach ($category['alldata'] as $cat) {
										  				// print_r($vendor);

										  				    // _p($cat);
										  			
									  	?>
										  <option <?php if ($cat[0]==$product['alldata']['cat_id']) {
										  	echo 'selected';
										  } ?> value="<?php echo $cat[0]; ?>"><?php echo $cat[1]; ?></option>

										  <?php
										    	}
										    }
										  	?>
										  
										</select>
							  		</td>
							  	</tr>

							  	

							  	
							  </table>
							 
							  <button type="submit" name="submit" class="btn btn-dark form-control">Edit Data</button>
							</form>
				</div>
				
			</div>
			</div>
			
		</div>
		
	</div>

<?php include('../includes/footer.php'); ?> 