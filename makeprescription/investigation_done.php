<div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Investigation Done</div>
    <div class="inner">
    <table>    

        <tr><td id="INV" width="100%" colspan="3">

            <?php
                $result = mysql_query( "SELECT b.investigation_name, a.value, b.unit, investigation_id
                    FROM patient_investigation a, investigation_master b
                    WHERE a.patient_id = '$patient_id'
                    AND a.visit_id = '$visit_id'
                    AND a.investigation_id = b.ID");
                //$rsd1 = mysql_query($q15);

                while($rows = mysql_fetch_array($result) ){
                    
            ?>
                <table>      
                    <tr>
                    
					<td width='120'><?php echo $rows['investigation_name']; ?></td>
                    <td width='60'><?php echo $rows['value']; ?>&nbsp;<?php echo $rows['unit']; ?></td>   
                     <td><a  href='#' onclick="deletePatientInvestigation('<?php echo $visit_id ; ?>',
                                '<?php echo $rows['investigation_id'] ; ?>')">[-]</a>
                    </td>
                    </tr> 
                </table> 
            <?php    } ?>
            </td>
        </tr> 
      
        <tr>
            <td width="100%"><input style="width: 120px;" type='text' id='investigation'/>
                <td ><input style="width: 60px;" type='text' id='txtPatientInvval'/>
                
                <td>
                    <a id='plus7' href='#' onclick="addPatientInvestigation('<?php echo $patient_id ; ?>','<?php echo $visit_id ; ?>')">[+]</a>
                </td> 
       </tr>

    </table>

    </div>   