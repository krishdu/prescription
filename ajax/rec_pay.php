<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';
if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])  ){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
	
		    $patient_id = $_POST['patient_id'];
		    $payment_mode = $_POST['payment_mode'];
		    $amount = $_POST['amount'];
		    $pay_dt = date("Y-m-d", strtotime($_POST['pay_dt']));
		    $payment_ref = $_POST['payment_ref'];
		    $desc = $_POST['desc'];
		    
			
				
				$sql1 = "insert into patient_payment (patient_id, payment_mode, amount, pay_dt, payment_ref, descr, created)
				values('$patient_id','$payment_mode','$amount','$pay_dt','$payment_ref', '$desc', NOW() )";
				$success = mysql_query($sql1) or die(mysql_error());
				if($success)
				{
				    $pay_id=mysql_insert_id();
				echo "<div>Payment received successfully.</div>";
				echo "<div>Print Money Receipt.<a href='printReceipt.php?inv_id=".$pay_id."' class='btn btn-warning' role='button'>Print Money Recipt(".$pay_id.")</a></div>";
				}
} else {
	echo "Invalid session. Login again.";
}

?>
