
<?php
include_once "../inc/datacon.php";
if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])  ){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
$investigation_name =$_GET["investigation_name"];
$prescription_id = $_GET["PRESCRIPTION_ID"];
$type = $_GET["investigation_type"];

$sql = "insert into investigation_master(investigation_name,investigation_type, chamber_id, doc_id) values ('$investigation_name','$type','$chamber_name','$doc_name')";
mysql_query($sql) or die(mysql_error());
if(mysql_affected_rows() > 0){
    //echo "<input name='".$investigation_name."' type='checkbox' value='".$investigation_name."'/>&nbsp;".$investigation_name."&nbsp;";
    echo $investigation_name;
}
}else {
	echo "Session expired";
}
?>

 