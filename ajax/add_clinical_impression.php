<?php
include "../datacon.php";
include '../classes/admin_class.php';
if(isset($_SESSION['user_type'])) {
	$user_type = $_SESSION['user_type']  ;
	if($user_type == 'DOCTOR' || $user_type == 'RECEPTIONIST'){
	$PRESCRIPTION_ID = $_GET['prescription_id'];
	$TYPE = $_GET['TYPE'];
	
	$admin = new admin();
	$admin->insertUpdateClinicalImpression($PRESCRIPTION_ID, $TYPE);
	
	$q15 = "SELECT b.type, b.ID FROM prescribed_cf a, clinical_impression b
	                WHERE a.clinical_impression_id = b.id
	                AND a.prescription_id = '$PRESCRIPTION_ID'";
	        $rsd1 = mysql_query($q15);
	
	       
	        while($rs = mysql_fetch_array($rsd1)) {
	            $type = $rs['type'];
	            $cf_d = $rs['ID'];
	            
	            echo "<div class='row'>
	            
	            <div class='col-md-10'>". $type. "</div>
				<div class='col-md-2' ><a href='#' class='minus'
						onclick='deleteClinicalImpression(". $cf_d .",
							". $PRESCRIPTION_ID.")'>[-]</a>
					</div> 
				</div>"; 
	
	        }
	}
}
?>
