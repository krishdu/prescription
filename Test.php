<?php
include 'datacon.php';
include 'classes/admin_class.php';
include_once 'classes/prescription_header.php';
$admin = new admin();

//echo $eg = $admin->calcEGFR("Male", 1.23, "30");
//echo $admin->deriveClinicalImpressionFromEGFR($eg);
/* $obj = $admin->getChamberList();
$arr = json_encode($obj);
echo $arr;
//$myObj = JSON.parse($obj);

foreach ($obj as $key => $value) {
    //echo $k, ' : ';
    foreach($value as $v)
    {
        echo $v['chamber_id']."  ". $v['chamber_name'];
    }
} */

/* $header = new Header('sroy',1);
echo	$header->doctor_full_name;
echo	$header->doctor_degree;
echo	$header->doctor_affiliation;
echo	$header->doctor_email;
echo	$header->doctor_mobile;
echo	$header->doc_reg_num;
echo	$header->primary_phone_number;
echo	$header->chamber_footer; */


/* echo $admin->calIdealBodyWeight('Male', 178);
echo "<br>";
echo $admin->calIdealBodyWeight('Female', 156);

echo $admin->getPatientDetailsFromVisit('10424')->GENDER;

$admin->insertUpdateCF('WEIGHT (KG)','100','10426'); */

echo $admin->getMaxVisitId('sos', 'sroy');


?>
