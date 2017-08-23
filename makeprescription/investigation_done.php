<div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Investigation Done</div>
<div class="inner">
<?php if(isset($_SESSION['user_type']) &&   isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name']) && ($_SESSION['user_type'] == "DOCTOR") ){ 
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
	?>
    <div id="INV">

            <?php
                $result = mysql_query( "SELECT b.investigation_name, a.value, b.unit, investigation_id
                    FROM patient_investigation a, investigation_master b
                    WHERE a.patient_id = '$patient_id'
                    AND a.visit_id = '$visit_id'
                    AND a.investigation_id = b.ID and a.chamber_id='".$chamber_name."' AND a.doc_id='".$doc_name."'");
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
    	<?php } else { echo "You are not authorize to perform this operation"; } ?>
 </div>

   