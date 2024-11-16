<?php include('../includes/header.php'); ?> 

<?php

	$id=$_GET['id'];

	$updateres="";
	if (isset($_POST['submit'])) {
		$updateres=edit_category($conn,$_POST,$id);
		
	}


	$category=fetch_single_category($conn,$id);

?>

	

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Edit Category</h4>
				</div>
				<?php

					echo $updateres;
				?>
				

				<div class="card-body">
						<form action="" method="post">
							  <table class="table table-bordered">
							  	
							  	<tr>
							  		<th>Name</th>
							  		<td ><input type="text"  name="name" class="form-control" value="<?php echo $category['alldata']['name']; ?>"></td>
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