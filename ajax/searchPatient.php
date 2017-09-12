<?php

include_once "../inc/datacon.php";

if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])  ){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
$patient_id = $_GET["patient_id"];
$strPatientName = $_GET["patient_name"];

    
    
$where = "";
if($patient_id != ""){
        
        $where .= "and patient_id = '$patient_id' ";
} 
if($strPatientName != ""){
        
        $where .= "and patient_first_name like '$strPatientName%'  ";
} 

$where .= "and chamber_id = '$chamber_name' and doc_id = '$doc_name' ";
$sql1 = "select * from patient where patient_id != ''".$where. "order by patient_id asc";
//echo $sql1;
$result1 = mysql_query($sql1)or die(mysql_error());
$no = mysql_num_rows($result1);
 
if($no > 0){
        
	echo "<table class='table table-hover'>
	<thead>
	<tr>
        <th>Sex</th>
		<th>Patient ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Date of Birth</th>
		<th>Mobile No</th>
		
		<th>City / Town</th>
		<th>ACTION</th>
     </tr></thead>
	  <tbody>";
        
        
        while($d1 = mysql_fetch_array($result1)){
           echo "<tr>
                <td>".$d1['GENDER']."</td>
                <td><a href='processData.php?patient_id=".$d1['patient_id']."' class='vlink'>".$d1['patient_id']."</a></td>
                <td>".$d1['patient_first_name']."</td>
                <td>".$d1['patient_last_name']."</td>
                <td>".date('d / m / Y', strtotime($d1['patient_dob']))."</td>
                <td>".$d1['patient_cell_num']."</td>
                <td>".$d1['patient_address']."</td>
                
                
                <td><a href='editPatient.php?patient_id=".$d1['patient_id']."' class='btn btn-primary' role='button' >EDIT</a></td>
            </tr>";
            
        }
        echo "</tbody></table>";
    }else{
            echo "<div class='alert alert-warning' role='alert'> There is no record with specified query. !!</div>";
    }
} else {
    echo "You are not allowed to perform this operation";
}
?>
