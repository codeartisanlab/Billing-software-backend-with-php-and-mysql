<?php include('../includes/header.php'); ?> 

<?php

	$imgres="";
	$addres="";
	$updateres="";
	

	


	if (isset($_POST['submit'])) {
		if ($_FILES['light_logo']['name']!='') {
		
			$image_one=time().'_'.$_FILES['light_logo']['name'];
			$tmp_name_one=$_FILES['light_logo']['tmp_name'];

			if (move_uploaded_file($tmp_name_one,'../logo/'.$image_one)) {

				$imgres='Image Uploaded!!';
			}else{
				$imgres='Image Not Uploaded!!';
			}
		}else{
			$image_one=$_POST['light_prev_image'];
		}


		if ($_FILES['dark_logo']['name']!='') {
			$image_two=time().'_'.$_FILES['dark_logo']['name'];
			$tmp_name_two=$_FILES['dark_logo']['tmp_name'];

			if (move_uploaded_file($tmp_name_two,'../logo/'.$image_two)) {

				$imgres='Image Uploaded!!';
			}
			else{
				$imgres='Image Not Uploaded!!';
			}
			}else{
				$image_two=$_POST['dark_prev_image'];
			}

			$id='';
			if (isset($_GET['id'])) {

				$id=$_GET['id'];
				$updateres=edit_settings($conn,$_POST,$image_one,$image_two,$id);
				
			}else{
				$addres=add_settings($conn,$_POST,$image_one,$image_two);
			}
		}


		$data['bool']=false;

		if (isset($_GET['id'])) {

			$id=$_GET['id'];
			$data=fetch_single_settings($conn,$id);

		}
	

	?>
	
	<div class="container">
		<div class="row">

			<?php include('../includes/sidebar.php'); ?>
			
			<div class="col-md-9 mt-5">
				
				<div class="card">
				<div class="card-header bg-dark text-light">
					
					<h4 class="text-center">Settings</h4>
				</div>
					<?php
						echo $imgres."</br>";
						echo $addres."</br>";
						echo $updateres;

					?>
				<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							  <table class="table table-bordered">
							  	<tr>
							  		<th>Logo Light</th>

							  		<?php
							  			$light_logo='';
							  			if ($data['bool']==true) {
							  				$light_logo=$data['alldata']['light_logo'];
							  			}
							  		?>

							  		<td>
							  			<?php
							  				if ($light_logo!='') {
							  					
							  			?>
							  			<img class="img-fluid" width="100" src="../logo/<?php echo $light_logo; ?>">

							  			<?php
							  				}
							  			?>


							  			<input  type="file" name="light_logo" class="form-control">
							  			<input  type="hidden" name="light_prev_image" value="/<?php echo $light_logo; ?>" class="form-control">
							  			

							  		</td>
							  	</tr>

							  	<tr>
							  		<th>Logo Dark</th>

							  		<?php

							  			$dark_logo='';
							  			if ($data['bool']==true) {
							  				$dark_logo=$data['alldata']['dark_logo'];
							  			}
							  		?>
							  		<td>
							  			<?php
							  				if ($dark_logo!='') {
							  					
							  			?>
							  			<img class="img-fluid" width="100" src="../logo/<?php echo $dark_logo; ?>">
							  			
							  			<?php
							  				}
							  			?>

							  			
							  			<input type="file" name="dark_logo" class="form-control">
							  			<input  type="hidden" name="dark_prev_image" value="/<?php echo $dark_logo; ?>" class="form-control">
							  			
							  			

							  		</td>
							  	</tr>
							  	<tr>
							  		<th>Company Name</th>

							  		<?php

							  			$name='';
							  			if ($data['bool']==true) {
							  				$name=$data['alldata']['company_name'];
							  			}
							  		?>
							  		<td><input type="text" placeholder="Company Name" name="company_name" value="<?php echo $name; ?>"  class="form-control"></td>
							  	</tr>

							  	<tr>
							  		<th>Phone</th>

							  		<?php

							  			$phone='';
							  			if ($data['bool']==true) {
							  				$phone=$data['alldata']['phone'];
							  			}
							  		?>
							  		<td ><input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $phone; ?>"></td>
							  	</tr>

							  	<tr>
							  		<th>Address</th>

							  		<?php

							  			$address='';
							  			if ($data['bool']==true) {
							  				$address=$data['alldata']['address'];
							  			}
							  		?>
							  		<td><textarea name="address" class="form-control"><?php echo $address; ?></textarea></td>
							  	</tr>

							  	
							  </table>
							 
							  <button type="submit" name="submit" class="btn btn-dark form-control">Submit Data</button>
							</form>
				</div>
				
			</div>
			</div>
			
		</div>
		
	</div>

<?php include('../includes/footer.php'); ?> 