<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';
if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])  ){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
	
    $admin = new admin();
	$user_type = $_SESSION['user_type']  ;
	if($user_type == 'DOCTOR' || $user_type == 'RECEPTIONIST'){
		if($user_type == 'RECEPTIONIST'){
			//if(isset($_POST['CREATE_PATIENT_DATA'])){
				
				$gender = $_POST['gender'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$addr = $_POST['addr'];
				$city = $_POST['city'];
				//$dob =  $_POST['theDate'];
				
				$chamber_name = $_POST['chamber_id'];
				$doc_name= $_POST['doc_id'];
				$user_name= $_SESSION['logged_in_user_id'];
				
				$cellnum = $_POST['cellnum'];
				$altcellnum = $_POST['altcellnum'];
				$email = $_POST['email'];
				$dob = date("Y-m-d", strtotime($_POST['theDate']));
				$max_patient_id = $admin->getMaxPatientId($chamber_name, $doc_name);
				
				$sql1 = "insert into patient (patient_id, GENDER,patient_first_name,
				patient_last_name, patient_address, patient_city, patient_dob, patient_cell_num,
				patient_alt_cell_num, patient_email, data_entry_date, chamber_id, created_by_user_id, create_date, doc_id)
				values('$max_patient_id','$gender','$fname', '$lname', '$addr', '$city', '$dob' ,'$cellnum', '$altcellnum', 
                        '$email', NOW(),  '$chamber_name', '$user_name',  NOW() ,'$doc_name')";
				mysql_query($sql1) or die(mysql_error());
				
				
				//$id = mysql_insert_id();
				$id = $max_patient_id;
				//$sql2 = "insert into visit (PATIENT_ID, VISIT_DATE, APPOINTMENT_TO_DOC_NAME) values('$id', NOW(), '')";
				//mysql_query($sql2) or die(mysql_error());
				//$visit_id = mysql_insert_id();
				
				/*$sql3 = "insert into patient_health_details_by_receptionist (patient_id) values('$id')";
				 mysql_query($sql3) or die(mysql_error());*/
				
				echo "$fname $lname data saved successfully. <a class='btn btn-primary' href='processData.php?patient_id=".$id."&chamber_name=".$chamber_name."&doc_name=".$doc_name."'>Create Visit !!</a>";
			//}
		} else {
			$patient_name = $_GET['patient_name'];
			$sex = $_GET['sex'];
			$age = $_GET['age'];
			$cell = $_GET['cell'];
			
			$chamber_name = $_GET['chamber_id'];
			$doc_name= $_GET['doc_id'];
			$user_name= $_GET['logged_in_user_id'];
			$sql1 = "insert into patient (GENDER,patient_name, age,patient_cell_num,
			        data_entry_date, chamber_id, created_by_user_id, create_date, doc_id) 
			        values('$sex','$patient_name', '$age' ,'$cell', NOW(),  '$chamber_name', '$user_name',  NOW() ,'$doc_name')";
			mysql_query($sql1) or die(mysql_error());
			
			$patient_id = mysql_insert_id();
			
			echo "PATIENT : ".$patient_id . " has been created. ";
			
			$result = mysql_query("select * from visit where patient_id = '$patient_id' and visited = 'no'");
			
			if(mysql_num_rows($result) > 0){
			    //Visit exists. Get the visit id
			    while($rows = mysql_fetch_array($result)){
			        $existing_visit_id = $rows['VISIT_ID'];
			    }
			    
			    
			} else {
			    //No visit for the patient. So create a visit with respect to the patient id.    
			    mysql_query("insert into visit (patient_id,VISIT_DATE, chamber_id, created_by_user_id, create_date, doc_id ) values('".$patient_id."', NOW(), '$chamber_name', '$user_name',  NOW() ,'$doc_name')") or die(mysql_error());
			    $existing_visit_id = mysql_insert_id();
			}
			
			echo "VISIT : ". $existing_visit_id . " has been created. ";
			
			$result1 = mysql_query("select max(visit_id) as visit_id from visit where patient_id = '".$patient_id."' and visited = 'yes'" );
			
			if(mysql_num_rows($result1) > 0){
			    //Already visited. So fetch the visit id (visited_id) for the last visit
			    while($rows = mysql_fetch_array($result1)){
			        $visited_id = $rows['visit_id'];
			    }
			    
			    //Populate patient investigation for old record.
			    /** START INSERTING OLD PATIENT INVESTIGATION **/
			    //INsert into patient_investigation
			    
			    $result2 = mysql_query("select * from patient_investigation where patient_id  = '".$patient_id."'and visit_id='".$visited_id."'");
			    
			    while($existingRows = mysql_fetch_array($result2)){
			        $inv_id = $existingRows['investigation_id'];
			        $VALUE = $existingRows['value'];
			        
			        //Check if the record already exists or not
			        $checkQuery = "select * from patient_investigation where patient_id = '".$patient_id."'
			                        and visit_id = '".$existing_visit_id."' and investigation_id = '".$inv_id."'";
			        $result = mysql_query($checkQuery);
			        
			        if(mysql_num_rows($result) <= 0) {
			        
			            $query_insert_into_patient_investigation = "insert into patient_investigation (patient_id, visit_id, investigation_id, value) 
			                                                    values ('".$patient_id."','".$existing_visit_id."','".$inv_id."','".$VALUE."')";
			
			            mysql_query($query_insert_into_patient_investigation) or die(mysql_error());
			        }
			    echo "Investigation Populated (If Any)";
			        
			    }
			    
			    
			    /** END: INSERTING OLD PATIENT INVESTIGATION **/
			    
			    /** START INSERTING OLD PATIENT INVESTIGATION BY RECEPTIONIST **/
			    //INsert into patient_health_details_by_receptionist
			    
			    $result3 = mysql_query("select * from patient_health_details where visit_id='".$visited_id."'");
			    
			    while($existingRows1 = mysql_fetch_array($result3)){
			    
			        $id=$existingRows1['ID'] ;
			        $value=$existingRows1['VALUE'];
			        if($id == 1 || $id == 2){
			            
			            $checkQuery2 = "select * from patient_health_details where ID = '".$id."'
			                        and VISIT_ID = '".$existing_visit_id."' ";
			            $result4 = mysql_query($checkQuery);
			            if(mysql_num_rows($result4) <= 0) {
			                $query_insert_into_patient_health_details = "insert into patient_health_details 
			                            (ID, VALUE, VISIT_ID) values ('".$id."','".$value."','".$existing_visit_id."')";
			                mysql_query($query_insert_into_patient_health_details) or die(mysql_error());
			            }
			        }
			    echo "Health Details Populated (If Any)";           
			    }
			   
			    /** END INSERTING OLD PATIENT INVESTIGATION BY RECEPTIONIST **/
			    
			} else {
			   // There is no visited id. NO OPERATION TO BE PERFORMED
			}
			if($user_type == 'DOCTOR'){
				echo "<a class='btn btn-primary' href='create_prescription.php?patient_id=". $patient_id."&VISIT_ID=".$existing_visit_id."' role='button'>Go to Prescription !!</a>";
			} else if($user_type == 'RECEPTIONIST'){
				echo "<a class='btn btn-primary' href='visit_list.php' role='button'>Go to Visit List !!</a>";
			}
		}
		
	}else {
		echo "You are not permitted to go this operation.";
	}
} else {
	echo "Invalid session. Login again.";
}

?>
