<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';
if(isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
	
	if($_SESSION['user_type'] == "DOCTOR"){
		
		$chamber_id=trim($_POST['chamber_id']);
		$chamber_name=trim($_POST['chamber_name']);
		$related_doc_name=$_SESSION['user_name'];
		
		$chamber_address=mysql_real_escape_string(trim($_POST['chamber_address']));
		$primary_phone_number=$_POST['primary_phone_number'];
		$secondary_phone_number=$_POST['secondary_phone_number'];
		$chamber_header=mysql_real_escape_string(trim($_POST['chamber_header']));
		$chamber_footer=mysql_real_escape_string(trim($_POST['chamber_footer']));
		
		
		
		if(($chamber_id== '') || ($chamber_name== '') || ($related_doc_name== '') || ($chamber_address== '') || ($primary_phone_number== '') || 
				($chamber_footer== '') ){
					$myObj->status = "fail";
					$myObj->message = "All fileds are mandatory.";
		} else {
			//insert into Chamber Master
			
			$inert_query = "insert into chamber_master(chamber_id,	chamber_name,	related_doc_name,	chamber_address, primary_phone_number, secondary_phone_number, chamber_header, chamber_footer) values(
			'$chamber_id','$chamber_name','$related_doc_name','$chamber_address','$primary_phone_number','$secondary_phone_number','$chamber_header','$chamber_footer')";
			mysql_query($inert_query) or die(mysql_error());
			
			$post_data = array('status' => "success",
			'message' => "Successfully added. Click here to Login ",
			'chamber_name' => $chamber_id);
			
			
			
			$myJSON = json_encode($post_data);
		}
		
	} else {
	
	$post_data = array('status' => "fail",
			'message' => "You are not authorize to perform this operation",
			'chamber_name' => $chamber_id);
	$myJSON = json_encode($post_data);
	}
} else {
	
	$post_data = array('status' => "success",
			'message' => "Session expired kindly re-login again.",
			'chamber_name' => $chamber_id);
	$myJSON = json_encode($post_data);
}


echo $myJSON;

?>