<?php
require_once "../inc/config.php";
$q = strtolower($_GET["term"]);
if (!$q) return;

$sql = "select * from dose_details_master where DOSE_DETAILS LIKE '$q%'";
/* $rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['DOSE_DETAILS'];
	echo "$cname\n";
} */
$result = mysql_query($sql)or die(mysql_error());

$return_arr= array();

while ($row = mysql_fetch_array($result))
{
	$row_array['label'] = $row['DOSE_DETAILS'];
	$row_array['value'] = $row['DOSE_DETAILS'];
	
	array_push($return_arr,$row_array);
	
}
echo json_encode($return_arr);
?>
