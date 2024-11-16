<?php include('../includes/header.php'); ?> 

	

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">View Product</h4>
				</div>

				<div class="card-body">
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Image</th>
						      <th scope="col">Name</th>
						      <th scope="col">Category</th>
						      <!-- <th scope="col">Price</th> -->
						      
						      <th scope="col">Op. Stock</th>
						      <th scope="col">Cr. Stock</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>

						  	<?php
						  	$i=1;
						  		$products=fetch_all_product($conn);
						  		if ($products['bool']==true) {
						  			foreach ($products['alldata'] as $product) {

						  				   // _p($product);


						  				  $category=fetch_single_category($conn,$product[3]);

						  				    // _p($category);


						  				 
						  			
					  		?>
						    <tr>
						      <th scope="row"><?php echo  $i; $i++; ?></th>
						      <td><img src="../imgs/product/<?php echo $product[1]; ?>" width="50px" height="50px"></td>
						      <td><?php echo $product[2]; ?></td>
						      <td><?php echo $category['alldata']['name']; ?></td>
						    
						      
						      <td><?php echo $product[4]; ?></td>
						      <td><?php echo $product[5]; ?></td>
						      <td>
						      	<a href="edit-product.php?id=<?php echo $product[0]; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
						      	<a onclick="return confirm('Are you Sure Want To Delete This?');" href="delete-product.php?id=<?php echo $product[0]; ?>&&image=<?php echo $product[1]; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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