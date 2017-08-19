<?php
require_once "../inc/config.php";
$q = strtolower($_GET["term"]);
if (!$q) return;

$sql = "select * from medicine_master where MEDICINE_NAME LIKE '$q%' and MEDICINE_STATUS = 'ACTIVE'";
/* $rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['MEDICINE_NAME'];
	echo "$cname\n"; */

	$result = mysql_query($sql)or die(mysql_error());

	
	$return_arr= array();
	
	while ($row = mysql_fetch_array($result))
	{
		$row_array['label'] = $row['MEDICINE_NAME'];
		$row_array['value'] = $row['MEDICINE_NAME'];
		
		array_push($return_arr,$row_array);
		
	}
	echo json_encode($return_arr);
?>