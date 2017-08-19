<?php

require_once "../inc/config.php";

$invest_name = $_GET["invest_name"];




$sql1 = "select * from investigation_master where investigation_name like '".$invest_name."%' 
        and STATUS = 'ACTIVE' ";
$result1 = mysql_query($sql1)or die(mysql_error());
$no = mysql_num_rows($result1);

/* if($no > 0){
        
        echo "<table class='table'><thead><tr>
        <th class='head_tbl'>Investigation Name</td>
       
        <th class='head_tbl'>ACTION</td>
        </tr></thead><tbody>";
        
        
        while($d1 = mysql_fetch_array($result1)){
           echo "<tr>
                <td>".$d1['investigation_name']."</td>
                
                <td><button class='btn btn-info' onclick='editInvest(".$d1['ID'].") ' class='vlink'>EDIT</button>
                    <button class='btn btn-warning' onclick='deleteInvest(".$d1['ID'].") ' class='vlink'>DELETE</button>
                </td>
            </tr>";
            
        }
        echo "</tbody></table>";
    }else{
            echo "No Result found.";
    } */
    
echo "Functionality is not added.";

?>
