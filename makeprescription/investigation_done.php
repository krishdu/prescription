<div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Investigation Done</div>
<div class="inner">
    <div id="INV">

            <?php
                $result = mysql_query( "SELECT b.investigation_name, a.value, b.unit, investigation_id
                    FROM patient_investigation a, investigation_master b
                    WHERE a.patient_id = '$patient_id'
                    AND a.visit_id = '$visit_id'
                    AND a.investigation_id = b.ID");
                //$rsd1 = mysql_query($q15);

                while($rows = mysql_fetch_array($result) ){
                    
            ?>
                <div class="row">
                    
					<div class="col-md-7"><?php echo $rows['investigation_name']; ?></div>
                    <div class="col-md-3"><?php echo $rows['value']; ?>&nbsp;<?php echo $rows['unit']; ?></div>
                    <div class="col-md-2" ><a  href='#' onclick="deletePatientInvestigation('<?php echo $visit_id ; ?>',
                                '<?php echo $rows['investigation_id'] ; ?>')">[-]</a></div>
                </div> 
            <?php    } ?>
            
      </div>
        <div class="row">
            <div class="col-md-7"><input type='text' class="form-control" id='investigation' placeholder="Investigation name"/></div>
                <div class="col-md-3"><input type='text' class="form-control" id='txtPatientInvval' placeholder="Value"/></div>
                <div class="col-md-2" ><a href='#' onclick="addPatientInvestigation('<?php echo $patient_id ; ?>','<?php echo $visit_id ; ?>')">[+]</a></div> 

    	</div>   
 </div>

   