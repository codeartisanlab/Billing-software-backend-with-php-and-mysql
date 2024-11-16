<?php include('../includes/header.php'); ?> 


	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">View Vendor</h4>
				</div>

				<div class="card-body">
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Image</th>
						      <th scope="col">Name</th>
						      <th scope="col">Phone</th>
						      
						      <th scope="col">Address</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>

						  	<?php
						  	$i=1;
						  		$vendors=fetch_all_vendor($conn);
						  		if ($vendors['bool']==true) {
						  			foreach ($vendors['alldata'] as $vendor) {
						  				// print_r($vendor);

						  				 // _p($vendor);
						  			
					  		?>
						    <tr>
						      <th scope="row"><?php echo  $i; $i++; ?></th>
						      <td><img src="../imgs/vendor/<?php echo $vendor[1]; ?>" width="50px" height="50px"></td>
						      <td><?php echo $vendor[2]; ?></td>
						      <td><?php echo $vendor[3]; ?></td>
						      <td><?php echo $vendor[4]; ?></td>

						      <td>
						      	<a href="edit-vendor.php?id=<?php echo $vendor[0]; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
						      	<a onclick="return confirm('Are You Sure Want To Delete This?')" href="delete-vendor.php?id=<?php echo $vendor[0]; ?>&&image=<?php echo $vendor[1]; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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