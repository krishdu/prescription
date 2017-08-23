<?php

include_once "../inc/datacon.php";
if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])  ){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
$MEDICINE_ID = $_GET['MEDICINE_ID'];
$PRESCRIPTION_ID = $_GET['PRES_ID'];
mysql_query("delete from precribed_medicine where MEDICINE_ID = '$MEDICINE_ID' and PRESCRIPTION_ID ='$PRESCRIPTION_ID'") or die(mysql_error());

$result = mysql_query("select * from precribed_medicine where PRESCRIPTION_ID ='$PRESCRIPTION_ID' AND a.chamber_id='$chamber_name' AND a.doc_id='$doc_name'" );
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
echo "</table>";
}
?>