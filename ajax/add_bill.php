<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';
if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])  ){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
	
    $admin = new admin();
	$user_type = $_SESSION['user_type']  ;
	
			//if(isset($_POST['CREATE_PATIENT_DATA'])){
				
		    $patient_id = $_POST['patient_id'];
		    $proc_name = $_POST['proc_name'];
		    $proc_details = $_POST['proc_details'];
		    $proc_charge = $_POST['Charge'];
		    $discount = $_POST['Discount'];
			  
				$user_name= $_SESSION['logged_in_user_id'];
				
				
				$sql1 = "insert into patient_proc (patient_id, proc_name,proc_details, proc_charge, discount,created)
				values('$patient_id','$proc_name','$proc_details','$proc_charge', '$discount',  now())";
				$success=mysql_query($sql1) or die(mysql_error());
				if($success)
				{
				$inv_id=mysql_insert_id();
				echo "<div>Bill Created successfully.<a href='receivePayment.php?patient_id=".$patient_id."' class='btn btn-warning' role='button'>Receive Payment(".$patient_id.")</a></div>";
				echo "<div>Print invoice.<a href='printInvoice.php?inv_id=".$inv_id."' class='btn btn-warning' role='button'>Print Invoice(".$inv_id.")</a></div>";
				}
		} else {
	echo "Invalid session. Login again.";
}

?>
