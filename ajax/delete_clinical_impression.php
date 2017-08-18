<?php
include "../datacon.php";
include '../classes/admin_class.php';
$PRESCRIPTION_ID = $_GET['PRESCRIPTION_ID'];
$ci_id = $_GET['ID'];
$admin= new admin();
$result = $admin->deleteClinicalImpression($PRESCRIPTION_ID,$ci_id);

echo $result;

/*
if (mysql_affected_rows() > 0){
   echo "<tr><td colspan='2'>". mysql_affected_rows() ." item(s) deleted</td></tr>";
} */

$q15 = "SELECT b.type, b.ID FROM prescribed_cf a, clinical_impression b
                WHERE a.clinical_impression_id = b.id
                AND a.prescription_id = '$PRESCRIPTION_ID'";
        $rsd1 = mysql_query($q15);

        if(mysql_num_rows($rsd1) > 0){
        while($rs = mysql_fetch_array($rsd1)) {
            $type = $rs['type'];
            $cf_d = $rs['ID'];
            echo "<div class='row'>
            		
	            <div class='col-md-10'>". $type. "</div>
					<div class='col-md-2' ><a href='#' class='minus' onclick='deleteClinicalImpression(". $cf_d .",". $PRESCRIPTION_ID.")'>[-]</a>
				</div>
									
				</div>"; 

        }
            
        } 

?>
