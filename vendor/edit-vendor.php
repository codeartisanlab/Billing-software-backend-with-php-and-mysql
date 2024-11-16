<?php include('../includes/header.php'); ?> 


<?php
	$id=$_GET['id'];



	$imgres='';
	$updateres='';

	if (isset($_POST['submit'])) {
		if ($_FILES['image']['name']!='') {
			$image=time().'_'.$_FILES['image']['name'];
			$tmp_name=$_FILES['image']['tmp_name'];
			if (move_uploaded_file($tmp_name,'../imgs/vendor/'.$image)) {
				$imgres='Image has Been Updated';
			}else{
				$imgres='Image not Updated';
			}
		}else{
			$image=$_POST['prev_image'];
		}

		$updateres=edit_vendor($conn,$_POST,$image,$id);

		
	}


	$vendor=fetch_single_vendor($conn,$id);
	 // _p($vendor);

?>

	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Edit Vendor</h4>
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
							  			<img src="../imgs/vendor/<?php echo $vendor['alldata']['image']; ?>" width="50px" height="50px">
							  			<input type="file" name="image" class="form-control">
							  			<input type="hidden" name="prev_image" class="form-control" value="<?php echo $vendor['alldata']['image']; ?>">
							  		</td>
							  	</tr>
							  	<tr>
							  		<th>Name</th>
							  		<td ><input type="text"  name="name" class="form-control" value="<?php echo $vendor['alldata']['name']; ?>"></td>
							  	</tr>

							  	<tr>
							  		<th>Phone</th>
							  		<td ><input type="tel" class="form-control"  name="phone" value="<?php echo $vendor['alldata']['phone']; ?>"></td>
							  	</tr>

							  	

							  	<tr>
							  		<th>Address</th>
							  		<td ><textarea type="text" class="form-control" name="address"><?php echo $vendor['alldata']['address']; ?></textarea></td>
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