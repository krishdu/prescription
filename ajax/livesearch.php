<?php
include_once "../inc/datacon.php";
if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])  ){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
$medicine_name=ucfirst($_GET["medicine_name"]);
$dose = $_GET['dose'];
//$direction = $_GET['direction'];
//$timing = $_GET['timing'];
$patient_id = $_GET['patient_id'];
$PRESCRIPTION_ID = $_GET['PRESCRIPTION_ID'];
$VISIT_ID = $_GET['VISIT_ID'];

$dose1 = $_GET['dose1'];
$dose2 = $_GET['dose2'];
$dose3 = $_GET['dose3'];

if($dose1 != ""){
    insertintoDoseMasterTable($dose1);
}

if($dose2 != ""){
    insertintoDoseMasterTable($dose2);
}

if($dose3 != ""){
    insertintoDoseMasterTable($dose3);
}
//Inser dose in dose_details_master table






$sql0 = "select * from medicine_master where MEDICINE_NAME = '$medicine_name' AND a.chamber_id='$chamber_name' AND a.doc_id='$doc_name'";
$result0 = mysql_query($sql0) or die(mysql_error());
if(mysql_num_rows($result0) == 0){
mysql_query("insert into medicine_master(MEDICINE_NAME,  MEDICINE_ENTRY_DATE_TIME, , chamber_id, doc_id) 
			values('$medicine_name', NOW(), ,'$chamber_name','$doc_name')") or die(mysql_error());
}


$sql3 = "insert into precribed_medicine (PRESCRIPTION_ID, MEDICINE_NAME, MEDICINE_DOSE, , chamber_id, doc_id) 
								values('$PRESCRIPTION_ID','$medicine_name', '$dose', ,'$chamber_name','$doc_name')";
mysql_query($sql3) or die(mysql_error());


$sql2 = "select * from precribed_medicine where PRESCRIPTION_ID = '$PRESCRIPTION_ID' AND a.chamber_id='$chamber_name' AND a.doc_id='$doc_name'";
$result = mysql_query($sql2) or die(mysql_error());

echo "<table id='table-3'>";
while($d = mysql_fetch_object($result)){
	echo "<tr>
                <td>
                    <img src='images/stock_list_bullet.png'/>&nbsp;<strong>".$d->MEDICINE_NAME."</strong>&nbsp;<img src='images/arrow-right.png' />
                                        <i>".$d->MEDICINE_DOSE."</i></td>";
       
	//echo "<td class='odd_tb'  align='center'><a href=''>Edit</a></td>";
        
	echo "<td align='center' width='90'>
          <a id='minus7' href='#' onclick='del($d->MEDICINE_ID ,$PRESCRIPTION_ID )'>[-]</a> </td> ";
	echo "</tr>";
}

echo "</table'>";
/*
//echo $medicine_name."+".$dose."+".$direction."+".$timing."+".$patient_id;
if(mysql_affected_rows() > 0){
    echo "<medicine><flag>SUCCESS</flag><name>".$medicine_name."</name><dose>".$dose."</dose><direction>".$direction."</direction><timing>".$timing."</timing></medicine>";
} else{
    echo "<medicine><flag>FAIL</flag></medicine>";
}*/
    function insertintoDoseMasterTable ($dose){
        
        //search for the dose
        
        $query_search = "select * from dose_details_master where DOSE_DETAILS = '".$dose."' AND a.chamber_id='$chamber_name' AND a.doc_id='$doc_name'";
        $query_insert = "insert into dose_details_master(DOSE_DETAILS, chamber_id, doc_id) values ('".$dose."','".$chamber_name."','".$doc_name."')";
        
        $result = mysql_query($query_search);
	
        if (mysql_num_rows($result) <= 0){
            //Insert into dose_details_master
            mysql_query($query_insert);
        } 
        
    }
}else {
	echo "Session expired";
}
?>
