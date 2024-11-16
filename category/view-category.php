<?php include('../includes/header.php'); ?> 

	

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">View Category</h4>
				</div>

				<div class="card-body">
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      
						      <th scope="col">Name</th>
						      
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>

						  	<?php
						  	$i=1;
						  		$category=fetch_all_category($conn);
						  		if ($category['bool']==true) {
						  			foreach ($category['alldata'] as $cat) {
						  				// print_r($vendor);

						  				   // _p($cat);
						  			
					  		?>
						    <tr>
						      <th scope="row"><?php echo $i; $i++; ?></th>
						      
						      <td><?php echo $cat[1]; ?></td>
						      
						      <td>
						      	<a href="edit-category.php?id=<?php echo $cat[0]; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
						      	<a onclick="return confirm('Are You Sure Want To Delete This?')" href="delete-category.php?id=<?php echo $cat[0]; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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