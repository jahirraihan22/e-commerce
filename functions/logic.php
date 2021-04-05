<?php

include('functions.php');
session_start();
function getEmailToUserId($email)
{
	$webApps = new webApps;
	$sql = "SELECT id,email from users where email='$email'";
	$resource = $webApps->Select($sql);
	while ($emails = $resource->fetch_object()) {
		$user_id = $emails->id;
	}
	return $user_id;
}

function validation($data)
{
	$data = htmlentities(strip_tags(trim($data)));
	return $data;
}

function isEmailExist($email)
{
	$webApps = new webApps;
	$sql = "SELECT email from users where email='$email'";
	$isEmailExist = $webApps->Select($sql);
		if (mysqli_num_rows($isEmailExist) == 0) {
			$isEmail = true;
		} else
			$isEmail = false;
	return $isEmail;
}

if(isset($_POST['order_status_update'])){
	$order_id = $_POST['order_id'];
	$status = $_POST['status'];
	$sql = "UPDATE orders SET status = '$status' WHERE order_id='$order_id'";
	$webApps->insert($sql);
	$_SESSION["pro_update_message"] = "Status Updated Successfully";
	header('location:../admin panel/order.php');
}


if (isset($_POST['category_insert_btn'])) {
	$category_name = validation($_POST['category_name']);
	$error = 0;
	$message = "";
	if ($category_name == "") {
		$error++;
		$message .= "Category required <br>";
	}
	if ($error == 0) {
		try {
			$sql = "INSERT INTO categories VALUES('','$category_name','')";
			$webApps->insert($sql);
			$_SESSION["category_insert_message"] = "Category Inserted Successfully";
			header('location:../admin panel/addproduct.php');
		} catch (exception $e) {
			echo "Not inserted";
		}
	} else {
		$_SESSION["category_errors"] = $message;
		header('location:../admin panel/addproduct.php');
	}
}

if (isset($_POST['save_subcat_btn'])) {
	// echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// die();
	$subcategory_name = validation($_POST['subcategory_name']);
	$select_cat_in_subcat = validation($_POST['select_cat_in_subcat']); //ekhane ki kono problem hobe jodi select category name eki hoi???
	$error = 0;
	$message = "";

	if ($subcategory_name == "") {
		$error++;
		$message .= "Insert Subcategory name <br>";
	}

	if ($select_cat_in_subcat == 0) {
		$error++;
		$message .=  "Select Category <br>";
	}

	if ($error == 0) {
		try {
			$sql = "INSERT 	INTO sub_categories VALUES('','$subcategory_name','$select_cat_in_subcat','')";
			$webApps->insert($sql);
			$_SESSION["subcat_insert_message"] = "Sub Category Inserted Successfully";
			header('location:../admin panel/addproduct.php');
		} catch (exception $e) {
			echo "not inserted";
		}
	} else {
		$_SESSION["subcat_error_message"] = $message;
		header('location:../admin panel/addproduct.php');
	}
}

if (isset($_POST['brand_insert_btn'])) {
	// echo "<pre>";
	// print_r($_POST);
	// die();
	$category_in_brand = validation($_POST['category_in_brand']);
	$subcategory_in_brand = validation($_POST['subcategory_in_brand']);
	$brand_name = validation($_POST['brand_name']);
	$error = 0;
	$message = "";
	if ($brand_name == "") {
		$error++;
		$message .= "brand name required <br>";
	}
	if ($category_in_brand == 0) {
		$error++;
		$message .= "Category required <br>";
	}
	if ($subcategory_in_brand == 0) {
		$error++;
		$message .= "Subcategory required <br>";
	}
	if ($error == 0) {
		try {
			$sql = "INSERT INTO brands VALUES('','$brand_name','$category_in_brand','$subcategory_in_brand','')";
			$webApps->insert($sql);
			$_SESSION["brand_insert_message"] = "Brand Inserted Successfully";
			header('location:../admin panel/addproduct.php');
		} catch (exception $e) {
			echo "Not inserted";
		}
	} else {
		$_SESSION["brand_error_message"] = $message;
		header('location:../admin panel/addproduct.php');
	}
}

if (isset($_POST['product_submit'])) {
	// echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// die();
	$name = validation($_POST['name']);
	$select_brand_in_pro = validation($_POST['select_brand_in_pro']);
	$select_unit_in_pro = validation($_POST['select_unit_in_pro']);
	$quantity = validation($_POST['quantity']);
	$description = validation($_POST['description']);
	$price = validation($_POST['price']);

	$sql = "SELECT * from brands where id = '$select_brand_in_pro'";
	$brands_resources = $webApps->Select($sql);
	$brands_obj = $brands_resources->fetch_object();

	$sql = "SELECT * from categories where id = '$brands_obj->cat_id '";
	$select_cat_in_pro_resources = $webApps->Select($sql);

	$sql = "SELECT * from sub_categories where id = '$brands_obj->subcat_id '";
	$select_subcat_in_pro_resources = $webApps->Select($sql);

	$select_cat_in_pro_obj = $select_cat_in_pro_resources->fetch_object();
	$select_subcat_in_pro_obj = $select_subcat_in_pro_resources->fetch_object();

	$error = 0;
	$message = "";
	if ($name == "") {
		$error++;
		$message .= "name required<br>";
	}

	if ($select_brand_in_pro == 0) {
		$error++;
		$message .= "brand required<br>";
	}
	if ($quantity == "") {
		$error++;
		$message .= "quantity required<br>";
	}
	if ($select_unit_in_pro == "") {
		$error++;
		$message .= "Unit required<br>";
	}
	if ($description == "") {
		$error++;
		$message .= "description required<br>";
	}
	if ($price == "") {
		$error++;
		$message .= "price required<br>";
	}
	if ($_FILES['image1']['name'] == "" || $_FILES['image2']['name'] == "" || $_FILES['image3']['name'] == "") {
		$error++;
		$message .= "All image required<br>";
	}
	if (($_FILES['image1']['type'] != "image/jpeg" && $_FILES['image1']['type'] != "image/png") || ($_FILES['image2']['type'] != "image/jpeg" && $_FILES['image2']['type'] != "image/png") || ($_FILES['image3']['type'] != "image/jpeg" && $_FILES['image3']['type'] != "image/png")) {
		$error++;
		$message .= "Image format required<br>";
	}
	if ($error == 0) {
		move_uploaded_file($_FILES['image1']['tmp_name'], "../pro_image/" . $_FILES['image1']['name']);
		move_uploaded_file($_FILES['image2']['tmp_name'], "../pro_image/" . $_FILES['image2']['name']);
		move_uploaded_file($_FILES['image3']['tmp_name'], "../pro_image/" . $_FILES['image3']['name']);
		try {

			$default_image = $_FILES['image1']['name'];
			$sub_image1 = $_FILES['image2']['name'];
			$sub_image2 = $_FILES['image3']['name'];


			$sql = "INSERT INTO products VALUES ('','$select_cat_in_pro_obj->id','$select_subcat_in_pro_obj->id','$select_brand_in_pro','$name','$quantity','$select_unit_in_pro','$description','$price',1,'')";
			$last_id = $webApps->insert($sql);
			$sql = "INSERT INTO product_images VALUES ('','$default_image','$last_id',1,'')";
			$webApps->insert($sql);

			$sql = "INSERT INTO product_images VALUES ('','$sub_image1','$last_id',0,'')";
			$webApps->insert($sql);

			$sql = "INSERT INTO product_images VALUES ('','$sub_image2','$last_id',0,'')";
			$webApps->insert($sql);

			$_SESSION["product_insert_message"] = "Product Inserted Successfully";
			header('location:../supplier panel/dashboard.php');
		} catch (exception $e) {
			echo "Not inserted";
		}
	} else {
		$_SESSION["product_errors"] = $message;
		header('location:../supplier panel/dashboard.php');
	}
}
//supplier add
if (isset($_POST['save_supplier_btn'])) {
	//echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// die();
	$isEmail = false;	
	$f_name = validation($_POST['f_name']);
	$l_name = validation($_POST['l_name']);
	$name = $f_name . " " . $l_name;
	$email = validation($_POST['email']);
	//$checkEmailExist = isEmailExist($email);
	$phone = validation($_POST['phone']);
	$passwords = md5(validation($_POST['passwords']));
	$street_address = validation($_POST['street_address']);
	$select_country_in_adsupp = validation($_POST['select_country_in_adsupp']);




	$error = 0;
	$message = "";

	if ($f_name == "") {
		$error++;
		$message .= "First name required<br>";
	}
	if ($l_name == "") {
		$error++;
		$message .= "Last name required<br>";
	}
	if ($email == "") {
		$error++;
		$message .= "Email required<br>";
	}
	if (!isEmailExist($email)) {
		$error++;
		$message .= "Email already exists<br>";
	}
	if ($phone == 0) {
		$error++;
		$message .= "Phone number required<br>";
	}
	if ($passwords == "") {
		$error++;
		$message .= "Password required<br>";
	}
	if ($street_address == "") {
		$error++;
		$message .= "Street address required<br>";
	}
	if ($select_country_in_adsupp == 0) {
		$error++;
		$message .= "Country required<br>";
	}

	if ($error == 0) {
		try {
			$sql = "INSERT INTO users VALUES ('','$name','$email','$phone','$passwords','','','')";
			$user_id =  $webApps->insert($sql);

			$sql = "INSERT INTO users_address VALUES('','$user_id', '$street_address', '$select_country_in_adsupp','2','1', '')";
			$webApps->insert($sql);

			$sql = "INSERT INTO user_roll VALUES ('','$user_id',3,'')";
			$webApps->insert($sql);

			$_SESSION['add_supplier_insert'] = "Supplier added successfully";
			header('location:../admin panel/addsupplier.php');
		} catch (Exception $e) {
			echo "not inserted";
		}
	} else {
		$_SESSION['add_supplier_error'] = $message;
		header('location:../admin panel/addsupplier.php');
	}
}
//--------------------------------------------------------------------- update
// product update
if (isset($_POST['product_update'])) {
	// echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// die();
	$name = validation($_POST['updated_name']);
	$select_brand_in_pro = validation($_POST['updated_select_brand_in_pro']);
	$select_unit_in_pro = validation($_POST['updated_select_unit_in_pro']);
	$quantity = validation($_POST['updated_quantity']);
	$description = validation($_POST['updated_description']);
	$price = validation($_POST['updated_price']);
	$pro_id = $_POST['updated_pro_id'];

	
	$sql = "SELECT * from brands where id = '$select_brand_in_pro'";
	$brands_resources = $webApps->Select($sql);
	$brands_obj = $brands_resources->fetch_object();

	$sql = "SELECT * from categories where id = '$brands_obj->cat_id '";
	$select_cat_in_pro_resources = $webApps->Select($sql);

	$sql = "SELECT * from sub_categories where id = '$brands_obj->subcat_id '";
	$select_subcat_in_pro_resources = $webApps->Select($sql);

	$select_cat_in_pro_obj = $select_cat_in_pro_resources->fetch_object();
	$select_subcat_in_pro_obj = $select_subcat_in_pro_resources->fetch_object();

	$error = 0;
	$message = "";
	if ($name == "") {
		$error++;
		$message .= "Name required<br>";
	}
	if ($select_cat_in_pro == 0) {
		$error++;
		$message .= "Category required<br>";
	}
	if ($select_subcat_in_pro == 0) {
		$error++;
		$message .= "Subcat required<br>";
	}
	if ($select_brand_in_pro == 0) {
		$error++;
		$message .= "Brand required<br>";
	}
	if ($quantity == "") {
		$error++;
		$message .= "Quantity required<br>";
	}
	if ($select_unit_in_pro == "") {
		$error++;
		$message .= "Unit required<br>";
	}
	if ($description == "") {
		$error++;
		$message .= "Description required<br>";
	}
	if ($price == "") {
		$error++;
		$message .= "price required<br>";
	}
	if ($_FILES['image1']['name'] == "" || $_FILES['image2']['name'] == "" || $_FILES['image3']['name'] == "") {
		$error++;
		$message .= "All image required<br>";
	}
	if (($_FILES['image1']['type'] != "image/jpeg" && $_FILES['image1']['type'] != "image/png") || ($_FILES['image2']['type'] != "image/jpeg" && $_FILES['image2']['type'] != "image/png") || ($_FILES['image3']['type'] != "image/jpeg" && $_FILES['image3']['type'] != "image/png")) {
		$error++;
		$message .= "Image format required<br>";
	}
	if ($error == 0) {

		unlink("../pro_image/" . $_POST['img1']);
		unlink("../pro_image/" . $_POST['img2']);
		unlink("../pro_image/" . $_POST['img3']);

		move_uploaded_file($_FILES['image1']['tmp_name'], "../pro_image/" . $_FILES['image1']['name']);
		move_uploaded_file($_FILES['image2']['tmp_name'], "../pro_image/" . $_FILES['image2']['name']);
		move_uploaded_file($_FILES['image3']['tmp_name'], "../pro_image/" . $_FILES['image3']['name']);

		try {
			$sql = "UPDATE products SET category_id='$select_cat_in_pro_obj->id',subcat_id='$select_cat_in_pro_obj->id',brand_id='$select_brand_in_pro',name='$name',quantity='$quantity',units='$select_unit_in_pro',description ='$description',price='$price' WHERE id='$pro_id'";
			$webApps->insert($sql);
			$_SESSION["pro_update_message"] = "Product Updated Successfully";
			header('location:../supplier panel/dashboard.php');
		} catch (exception $e) {
			echo "Not inserted";
		}
	} else {
		$_SESSION["product_errors"] = $message;
		header('location:../supplier panel/dashboard.php');
	}
}
// category update
if (isset($_POST['category_update'])) {
	$edited_cat_id = $_POST['edited_cat_id'];
	$updated_cat_name = validation($_POST['updated_cat_name']);
	$error = 0;
	$message = "";
	if ($updated_cat_name == "") {
		$error++;
		$message .= "Category required <br>";
	}
	if ($error == 0) {
		try {
			$sql = "UPDATE categories SET name='$updated_cat_name' where id = $edited_cat_id";
			$webApps->insert($sql);
			$_SESSION["category_insert_message"] = "Category Updated Successfully";
			header('location:../admin panel/addproduct.php');
		} catch (exception $e) {
			echo "Not inserted";
		}
	} else {
		$_SESSION["category_errors"] = $message;
		header('location:../admin panel/addproduct.php');
	}
}
//edited_subcat_id
if (isset($_POST['update_subcat_btn'])) {

	$edited_subcat_name = validation($_POST['edited_subcat_name']);
	$edited_cat_in_subcat = validation($_POST['edited_cat_in_subcat']);
	$edited_subcat_id = $_POST['edited_subcat_id'];
	$error = 0;
	$message = "";

	if ($edited_subcat_name == "") {
		$error++;
		$message .= "Insert Subcategory name <br>";
	}

	if ($edited_cat_in_subcat == 0) {
		$error++;
		$message .=  "Select Category <br>";
	}

	if ($error == 0) {
		try {
			$sql = "UPDATE sub_categories SET name='$edited_subcat_name', cat_id = '$edited_cat_in_subcat' where id = '$edited_subcat_id'";
			$webApps->insert($sql);
			$_SESSION["subcat_insert_message"] = "Sub Category Updated Successfully";
			header('location:../admin panel/addproduct.php');
		} catch (exception $e) {
			echo "not inserted";
		}
	} else {
		$_SESSION["subcat_error_message"] = $message;
		header('location:../admin panel/addproduct.php');
	}
}
//edited_brand_id
if (isset($_POST['brand_update_btn'])) {
	// echo "<pre>";
	// print_r($_POST);
	// die();
	$update_cat_in_brand = validation($_POST['update_cat_in_brand']);
	$update_subcat_in_brand = validation($_POST['update_subcat_in_brand']);
	$edited_brand_id = $_POST['edited_brand_id'];
	$update_brand_name = validation($_POST['update_brand_name']);
	$error = 0;
	$message = "";
	if ($update_brand_name == "") {
		$error++;
		$message .= "brand name required <br>";
	}
	if ($update_cat_in_brand == 0) {
		$error++;
		$message .= "Category required <br>";
	}
	if ($update_subcat_in_brand == 0) {
		$error++;
		$message .= "Subcategory required <br>";
	}
	if ($error == 0) {
		try {
			$sql = "UPDATE brands SET name='$update_brand_name', cat_id = '$update_cat_in_brand' , subcat_id = '$update_subcat_in_brand' where id = '$edited_brand_id'";
			$webApps->insert($sql);
			$_SESSION["brand_insert_message"] = "Brand Updated Successfully";
			header('location:../admin panel/addproduct.php');
		} catch (exception $e) {
			echo "Not inserted";
		}
	} else {
		$_SESSION["brand_error_message"] = $message;
		header('location:../admin panel/addproduct.php');
	}
}
//---------------------------------------------------------------------

// log in
if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	try {
		$sql = "SELECT email,passwords from users where email='$email' AND passwords='$pass'";
		$resource = $webApps->login($sql);
		echo "invalid";
	} catch (exception $e) {
		$user_id = getEmailToUserId($email);
		$sql = "SELECT user_id , roll_id from user_roll where user_id='$user_id'";
		$resource = $webApps->Select($sql);

		while ($roll_id = $resource->fetch_object()) {
			$rollID = $roll_id->roll_id;
		}

		$_SESSION['user_id'] = $user_id;
		$_SESSION['email'] = $email;
		$_SESSION['rollID'] = $rollID;

		if ($rollID == 3) {
			header('location:../supplier panel/dashboard.php');
		}
		if ($rollID == 2) {
			header('location:../admin panel/dashboard.php');
		}
		if ($rollID == 1) {
			header('location:../frontend/index.php');
		}
	}
}

if (isset($_GET['logout']) && $_GET['logout'] == true) {
	unset($_SESSION["email"]);
	unset($_SESSION["user_id"]);
	unset($_SESSION["rollID"]);
	header('location:../admin panel/dashboard.php');
}





if(isset($_POST['user_search']))
{

  // insert comment
    
  $user_search=$_POST['user_search'];
  
  $select="select name from products WHERE name LIKE '$user_search%';";
  $searchResource = $webApps->Select($select);
  
  while($searchObject= $searchResource->fetch_object()){
  	echo "<a href=''>".$searchObject->name."</a><br>";
  }
}



if(isset($_POST['user_paginate']))
{

  // insert comment
    
  $user_paginate=$_POST['user_paginate'];
  
  $select="select * from products limit $user_paginate,2";
  $paginateResource = $webApps->Select($select);
  
  while($paginateObject= $paginateResource->fetch_object()){
  	echo "<a href=''>".$paginateObject->name."</a><br>";
  }
}


if(isset($_GET['delete_pro_id'])){
	$id = $_GET['delete_pro_id'];
	$select="DELETE FROM product_images where product_id='$id'";
	$proResource = $webApps->Select($select);
	$select="DELETE FROM products where id='$id'";
	$proResource = $webApps->Select($select);
	$_SESSION['delete_message'] = "Product Deleted Successfully";
	header('location:../supplier panel/dashboard.php');
}

if(isset($_GET['cart'])){

	 // get pro id from url

	 $id = $_GET['cart'];
	
	  // get data from database

	 $select="select * from products where id='$id'";

	 $proResource = $webApps->Select($select);

  	 $proObject= $proResource->fetch_array();
  	 
  	 // declair add to cart	

  	 $add_to_cart = [];
	 
	 // assign product name in add to cart array

	 $add_to_cart['name'] = $proObject['name'];
	 $add_to_cart['price'] = $proObject['price'];
	 $add_to_cart['pro_id'] = $proObject['id'];
	 
	 // assign initial quantity

	 $add_to_cart['qty'] = 1;

	 // if data alreary in cart

	 if(isset($_SESSION['cart_item'])){

	 	// match alrady exits or nots

	 	foreach ($_SESSION['cart_item'] as $key => $value) {
	 		if($value['name'] == $add_to_cart['name']){
	 			echo "match found";
	 			
	 			// if exists increase quantity

	 			$_SESSION['cart_item'][$key]['qty']++;
	 			echo "<pre>";
	 			print_r($_SESSION['cart_item']);
		 		die();
	 		}else{
	 			$exists = true;	
	 		}
	 	}

	 	if(isset($exists)){
	 		echo "match not found";
 			$_SESSION['cart_item'][] = $add_to_cart;
 			echo "<pre>";
 			print_r($_SESSION['cart_item']);
	 		die();
	 	}
	 	
	 }else{
	 	$_SESSION['cart_item'][] = $add_to_cart;
	 	echo "<pre>";
		print_r($_SESSION['cart_item']);
	 }

 	
	 
}





function getSupplierIdFromProID($proid){
	$webApps = new webApps;
	$sql = "SELECT user_id from products where id='$proid'";
	$resource = $webApps->Select($sql);
	$users = $resource->fetch_object();
	return $users->user_id;
}


function getOrderListAdmin(){
	$webApps = new webApps;
	$sql = "SELECT * from Orders";
	$resource = $webApps->Select($sql);
	return $resource;
}


function getOrderListSupplier(){
	$webApps = new webApps;
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * from Orders Where 	suplier_id='$user_id'";
	$resource = $webApps->Select($sql);
	return $resource;
}


function getOrderListClient(){
	$webApps = new webApps;
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * from Orders Where client_id='$user_id'";
	$resource = $webApps->Select($sql);
	return $resource;
}

if(isset($_GET['checkout']) && $_GET['checkout'] == true){
	
	$proid = $_SESSION['cart_item'];
	$proid = $proid[0]['pro_id'];

	$rand = rand(0,9999);
	$oid = md5($rand);
	$client_user_id = $_SESSION['user_id'];	
	$supplier_user_id = getSupplierIdFromProID($proid);


	$sql = "INSERT INTO orders VALUES('','$oid','$client_user_id','$supplier_user_id',CURRENT_TIMESTAMP)";
	$webApps->insert($sql);


	foreach ($_SESSION['cart_item'] as $key => $value) {
		

		$total_price = $value['price'] * $value['qty'];
		$qty = $value['qty'];
		$proid = $value['pro_id'];
		
		$sql = "INSERT INTO order_details VALUES('','$total_price','$oid','$proid','$qty',CURRENT_TIMESTAMP)";
		$result = $webApps->insert($sql);

	}

	session_unset($_SESSION['cart_item']);
	$_SESSION["ORDER_INSERTED"] = "Order Created Successfully";
	header('location:../frontend/index.php');
}

?>
