<?php include('../includes/header.php'); ?> 

<?php


$addres="";

if (isset($_POST['submit'])) {

	$addres=add_category($conn,$_POST);
}
?>

	
	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Add Category</h4>
				</div>

				<?php
					echo $addres;

				?>


				<div class="card-body">
						<form action="" method="post">
							  <table class="table table-bordered">
							  	
							  	<tr>
							  		<th>Name</th>
							  		<td ><input type="text" placeholder="Name" name="name" class="form-control"></td>
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