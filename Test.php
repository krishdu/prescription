<?php
include 'datacon.php';
include 'classes/admin_class.php';

$admin = new admin();
//echo $eg = $admin->calcEGFR("Male", 1.23, "30");
//echo $admin->deriveClinicalImpressionFromEGFR($eg);
$obj = $admin->getChamberList();
$arr = json_encode($obj);
echo $arr;
//$myObj = JSON.parse($obj);

foreach ($obj as $key => $value) {
    //echo $k, ' : ';
    foreach($value as $v)
    {
        echo $v['chamber_id']."  ". $v['chamber_name'];
    }
}
?>
