<?php

require_once "../inc/config.php";
$q = $_GET["term"];
if (!$q) return;

$sql = "select distinct(NAME) from  patient_health_details_master where NAME LIKE '$q%' and STATUS = 'ACTIVE'";
/* $rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['investigation_type'];
	echo "$cname\n";
} */
$result = mysql_query($sql)or die(mysql_error());


$return_arr= array();

while ($row = mysql_fetch_array($result))
{
	$row_array['label'] = $row['NAME'];
	$row_array['value'] = $row['NAME'];
	
	array_push($return_arr,$row_array);
	
}
echo json_encode($return_arr);
?>
