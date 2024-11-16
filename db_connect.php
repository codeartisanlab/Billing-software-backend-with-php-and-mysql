<?php
// Turn on error reporting
// error_reporting(E_ALL);  // Report all PHP errors
// ini_set('display_errors', 1);  // Display errors in the browser
?>
<?php
	
	session_start();


	// Testing Function

	function _p($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	

	//Database Connection

	$conn=mysqli_connect('localhost','phpmyadmin','123456','core_php_billing_software');

	if (!$conn) {
		echo mysqli_connect_error();
	}

	// Login Function

	function check_login($conn,$data){

		$res= array();
		$user=$data['username'];
		$password=$data['password'];

		$query="SELECT * FROM admin_login WHERE username='$user' AND password='$password'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$_SESSION['loginstatus']=true;
		}else{
			$res['bool']=false;

		} return $res;
	}


	// Vendor Section Start Here


	function add_vendor($conn,$data,$image){
		$name=$data['name'];
		$phone=$data['phone'];
		$address=$data['address'];
		

		$query="INSERT INTO vendor(image,name,phone,address) VALUES('$image','$name','$phone','$address')";
		$result=mysqli_query($conn,$query);
		if (mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Inserted...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function fetch_all_vendor($conn){
		$res=array();
		$query="SELECT * FROM vendor ORDER BY id ASC";
		$result=mysqli_query($conn,$query);
		if (mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_all($result);
		}else{
			$res['bool']=false;
		}return $res;
	}


	function fetch_single_vendor($conn,$id){
		$res=array();
		$query="SELECT * FROM vendor WHERE id='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}return $res;
	}


	function edit_vendor($conn,$data,$image,$id){
		$name=$data['name'];
		$phone=$data['phone'];
		
		$address=$data['address'];
		

		$query="UPDATE vendor SET image='$image',name='$name',phone='$phone',address='$address' WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Updated...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function delete_vendor($conn,$image,$id){
		$name=$data['name'];
		$phone=$data['phone'];
		$product=$data['product'];
		$address=$data['address'];
		

		$query="DELETE FROM vendor WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Deleted...';
			unlink('../imgs/vendor/'.$image);
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}

	function count_all_vendor($conn){
		$query="SELECT * FROM vendor";
		$result=mysqli_query($conn,$query);
		$numrows=mysqli_num_rows($result);
		return $numrows;
	}

	// Vendor Section End Here


	// Category Section Start Here



	function add_category($conn,$data){
		$name=$data['name'];
	

		$query="INSERT INTO category(name) VALUES('$name')";
		$result=mysqli_query($conn,$query);
		if (mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Inserted...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}

	function fetch_all_category($conn){
		$res=array();
		$query="SELECT * FROM category ORDER BY id ASC";
		$result=mysqli_query($conn,$query);
		if (mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_all($result);
		}else{
			$res['bool']=false;
		}return $res;
	}

	function fetch_single_category($conn,$id){
		$res=array();
		$query="SELECT * FROM category WHERE id='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}return $res;
	}


	function edit_category($conn,$data,$id){
		$name=$data['name'];
		$query="UPDATE category SET name='$name' WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Updated...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function delete_category($conn,$id){
		$name=$data['name'];

		$query="DELETE FROM category WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Deleted...';
			// unlink('../imgs/vendor/'.$image);
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}

// Product Section Start Here


	function add_product($conn,$data,$image){
		$name=$data['name'];
		$category=$data['category'];
		
		
		$opening_stock=$data['opening_stock'];
		$current_stock=$data['current_stock'];
		

		$query="INSERT INTO product(image,name,cat_id,opening_stock,current_stock) VALUES('$image','$name','$category','$opening_stock','$current_stock')";
		$result=mysqli_query($conn,$query);
		if (mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Inserted...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function fetch_all_product($conn){
		$res=array();
		$query="SELECT * FROM product ORDER BY id ASC";
		$result=mysqli_query($conn,$query);
		if (mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_all($result);
		}else{
			$res['bool']=false;
		}return $res;
	}


	function fetch_single_product($conn,$id){
		$res=array();
		$query="SELECT * FROM product WHERE id='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}return $res;
	}



	function edit_product($conn,$data,$image,$id){
		$name=$data['name'];
		$category=$data['category'];
		

		$query="UPDATE product SET image='$image',name='$name',cat_id='$category' WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Updated...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;
	}


	function update_stock($conn,$newQty,$id){
		

		$query="UPDATE product SET current_stock='$newQty' WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Updated...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;
	}
	
	


	function delete_product($conn,$image,$id){
		$name=$data['name'];
		$category=$data['category'];
		$price=$data['price'];
		$opening_stock=$data['opening_stock'];
		$current_stock=$data['current_stock'];
		

		$query="DELETE FROM product WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Deleted...';
			unlink('../imgs/product/'.$image);
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function count_all_product($conn){
		$query="SELECT * FROM product";
		$result=mysqli_query($conn,$query);
		$numrows=mysqli_num_rows($result);
		return $numrows;
	}


	// Purchase Section Start


	function add_purchase($conn,$data){
		$product=$data['product'];
		$vendor=$data['vendor'];
		$status=$data['status'];
		$price=$data['price'];
		$qty=$data['qty'];
		$total=$data['total'];
		$discount=$data['discount'];
		$dis_price=$data['dis_price'];
		$tax_rate=$data['tax_rate'];
		$tax_price=$data['tax_price'];


		$productDetails=fetch_single_product($conn,$product);

		// _p($productDetails);
		// die();

		$current_stock=$productDetails['alldata']['current_stock'];
		$newStock=$current_stock+$qty;


		// _p($newStock);
		// die();

		$newTotal=$price*$qty;

		// _p($newTotal);
		// die();


		$query="INSERT INTO purchase(product,vendor,status,price,qty,total,discount,dis_price,tax_rate,tax_price) VALUES('$product','$vendor','$status','$price','$qty','$newTotal','$discount','$dis_price','$tax_rate','$tax_price')";
		$result=mysqli_query($conn,$query);
		if (mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Inserted...';

			update_stock($conn,$newStock,$product);
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function fetch_all_purcahse($conn){
		$res=array();
		$query="SELECT * FROM purchase ORDER BY id ASC";
		$result=mysqli_query($conn,$query);
		if (mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_all($result);
		}else{
			$res['bool']=false;
		}return $res;
	}

	function fetch_single_purchase($conn,$id){
		$res=array();
		$query="SELECT * FROM purchase WHERE id='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}return $res;
	}



	function fetch_total_purchase($conn){
		$query="SELECT SUM(total) AS total_amount FROM purchase";
		$result=mysqli_query($conn,$query);
		$res=mysqli_fetch_assoc($result);

		// _p($res);
		// die();
		return $res['total_amount'];
	}



	// Sale Section Start


	function add_sale($conn,$data){
		$product=$data['product'];
		$phone=$data['phone'];
		$status=$data['status'];
		$price=$data['price'];
		$qty=$data['qty'];
		$total=$data['total'];
		$discount=$data['discount'];
		$dis_price=$data['dis_price'];
		$tax_rate=$data['tax_rate'];
		$tax_price=$data['tax_price'];


		$productDetails=fetch_single_product($conn,$product);

		// _p($productDetails);
		// die();

		$current_stock=$productDetails['alldata']['current_stock'];
		$newStock=$current_stock-$qty;


		// _p($newStock);
		// die();

		$newTotal=$price*$qty;

		// _p($newTotal);
		// die();

		$query="INSERT INTO sale (product,phone,status,price,qty,total,discount,dis_price,tax_rate,tax_price) VALUES('$product','$phone','$status','$price','$qty','$newTotal','$discount','$dis_price','$tax_rate','$tax_price')";
		$result=mysqli_query($conn,$query);
		if (mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Inserted...';

			update_stock($conn,$newStock,$product);
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function fetch_all_sale($conn){
		$res=array();
		$query="SELECT * FROM sale ORDER BY id ASC";
		$result=mysqli_query($conn,$query);
		if (mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_all($result);
		}else{
			$res['bool']=false;
		}return $res;
	}


	function fetch_single_sale($conn,$id){
		$res=array();
		$query="SELECT * FROM sale WHERE id='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}return $res;
	}

	function fetch_total_sale($conn){
		$query="SELECT SUM(total) AS total_amount FROM sale";
		$result=mysqli_query($conn,$query);
		$res=mysqli_fetch_assoc($result);

		// _p($res);
		// die();
		return $res['total_amount'];
	}


	// Setting Section Start

	function add_settings($conn,$data,$image_one,$image_two){
		$company_name=$data['company_name'];
		$phone=$data['phone'];
		$address=$data['address'];
		

		$query="INSERT INTO settings(light_logo,dark_logo,company_name,phone,address) VALUES('$image_one','$image_two','$company_name','$phone','$address')";
		$result=mysqli_query($conn,$query);
		if (mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Inserted...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;

	}


	function fetch_settings_data($conn){
		$res=array();
		$query="SELECT * FROM settings limit 1";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}return $res;
	}


	function fetch_single_settings($conn,$id){
		$res=array();
		$query="SELECT * FROM settings WHERE id='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0) {
			$res['bool']=true;
			$res['alldata']=mysqli_fetch_assoc($result);
		}else{
			$res['bool']=false;
		}return $res;
	}


	function edit_settings($conn,$data,$image_one,$image_two,$id){
		$company_name=$data['company_name'];
		$phone=$data['phone'];
		$address=$data['address'];
		

		$query="UPDATE settings SET light_logo='$image_one',dark_logo='$image_two',company_name='$company_name',phone='$phone',address='$address' WHERE id='$id' ";
		$result=mysqli_query($conn,$query);
		if(mysqli_affected_rows($conn)>0) {
			$msg='Data has Been Updated...';
			
		}else{
			$msg=mysqli_error($conn);
		}return $msg;
	}




?>