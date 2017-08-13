<?php

require_once "../inc/config.php";

$q = strtolower($_GET["term"]);
if (!$q) return;

$sql = "select * from clinical_impression where TYPE LIKE '$q%'";
/* $rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['TYPE'];
	echo "$cname\n";
} */
$result = mysql_query($sql)or die(mysql_error());
$rowObject = mysql_fetch_assoc($result) ;

$return_arr= array();

while ($row = mysql_fetch_array($result))
{
	$row_array['label'] = $row['TYPE'];
	$row_array['value'] = $row['TYPE'];
	
	array_push($return_arr,$row_array);
	
}
echo json_encode($return_arr);
?>
