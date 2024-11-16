<?php include('../includes/header.php'); ?> 

<?php

$imgres="";
$addres="";

if (isset($_POST['submit'])) {

	$image=time().'_'.$_FILES['image']['name'];
	$tmp_name=$_FILES['image']['tmp_name'];

	if (move_uploaded_file($tmp_name,'../imgs/vendor/'.$image)) {

		$imgres='Image Uploaded!!';
	}else{
		$imgres='Image Not Uploaded!!';
	}

	$addres=add_vendor($conn,$_POST,$image);
}
?>

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Add Vendor</h4>
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
							  		<td><input type="file" name="image" class="form-control"></td>
							  	</tr>
							  	<tr>
							  		<th>Name</th>
							  		<td ><input type="text" placeholder="Name" name="name" class="form-control"></td>
							  	</tr>

							  	<tr>
							  		<th>Phone</th>
							  		<td ><input type="tel" class="form-control" placeholder="Phone" name="phone"></td>
							  	</tr>

							  	

							  	<tr>
							  		<th>Address</th>
							  		<td ><textarea type="text" class="form-control" name="address"></textarea></td>
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