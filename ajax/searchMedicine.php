<?php

require_once "../inc/config.php";

$strMedicineName = $_GET["medicine_name"];




$sql1 = "select * from medicine_master where medicine_name like '".$strMedicineName."%' 
        and MEDICINE_STATUS = 'ACTIVE' ";
$result1 = mysql_query($sql1)or die(mysql_error());
$no = mysql_num_rows($result1);

if($no > 0){
        
        echo "<table class='table table-striped'><thead>
        <th>Medicine Name</td>
       
        <th>ACTION</td>
        </thead><tbody>";
        
        
        while($d1 = mysql_fetch_array($result1)){
           echo "<tr>
                <td>".$d1['MEDICINE_NAME']."</td>
                
                <td><button class='btn btn-info' onclick='editMedicine(".$d1['MEDICINE_ID'].");' >EDIT</button>
                    <button class='btn btn-warning' onclick='deleteMedicine(".$d1['MEDICINE_ID'].");' >DELETE</button>
                </td>
            </tr>";
            
        }
        echo "</tbody></table>";
    } else {
    	
    }

?>
