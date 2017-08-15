<?php

require_once "../inc/config.php";
$patient_id = $_GET["patient_id"];
$strPatientName = $_GET["patient_name"];

$where = "";
if($patient_id != ""){
        
        $where .= "and patient_id = '$patient_id'";
} 
if($strPatientName != ""){
        
        $where .= "and patient_first_name like '$strPatientName%' OR patient_name like '$strPatientName%' ";
} 


$sql1 = "select * from patient where patient_id != ''".$where;
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
		<th>Street Address</th>
		<th>City / Town</th>
		<th>Email Address</th>
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
                
                <td>".$d1['patient_city']."</td>
                <td>".$d1['patient_email']."</td>
                <td><a href='editPatient.php?patient_id=".$d1['patient_id']."' class='vlink'>EDIT</a></td>
            </tr>";
            
        }
        echo "</tbody></table>";
    }else{
            echo "<div class='alert alert-warning' role='alert'> There is no record with specified query. !!</div>";
    }

?>
