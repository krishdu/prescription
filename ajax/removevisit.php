<?php
include "../datacon.php";
include '../classes/admin_class.php';

if(isset($_SESSION['user_type'])) {
	$user_type = $_SESSION['user_type']  ;
	if($user_type == 'DOCTOR' || $user_type == 'RECEPTIONIST'){
	$visit_id = $_GET['VISIT_ID'];
	
	$query = "UPDATE visit SET VISITED = 'cancel' WHERE VISIT_ID = '$visit_id'";
	
	mysql_query($query) or die(mysql_error());
	}
}
header("location:../visit_list.php");
	
?>