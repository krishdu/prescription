<div class="others">
<div class="other_headings"><!--<img src="images/Briefcase-Medical.png" />-->Others </div>
    <div class="inner_addiction">

    <!-- Get In Touch Starts -->
    
    
<div class="form-group"> 
	<label for="exampleInputEmail1">Addictions</label>  
	<div class="checkbox">
	    <label><input type="checkbox" name="addictions" value="Nicotine"> Father</label><label><input type="checkbox" name="addictions" value="Alcohol"> Mother</label>
	 </div> 
	<label for="exampleInputEmail1">Diabetic history</label>  
	<div class="checkbox">
	    <label><input type="checkbox" name="family" value="Father"> Father</label><label><input type="checkbox" name="family" value="Mother"> Mother</label>
	    <label><input type="checkbox" name="family" value="Sibling"> Sibling</label>
	 </div>
</div>

<!-- Get In Touch Ends -->					
    </div>
</div>
<div class="others">
    <div class="other_headings"><!--<img src="images/Briefcase-Medical.png" />-->History </div>
    <div class="inner_history">

    <!-- Get In Touch Starts -->
    <?php
    $lastPrescription = 0;
    
    $query = "SELECT a.VISIT_ID, a.PATIENT_ID, a.VISIT_DATE, b.prescription_id, a.visit_id 
                FROM visit a, prescription b
                WHERE a.patient_id = '$patient_id'
                AND a.visited = 'YES'
                AND a.visit_id = b.visit_id
                AND b.STATUS = 'SAVE' order by VISIT_DATE desc LIMIT 0 , 5";


                        //echo $q5;
                        $r5 = mysql_query($query) or die(mysql_error());
                        if(mysql_num_rows($r5) > 0){
                            while($d5 = mysql_fetch_array($r5)) {
                                $lastPrescription = $d5['prescription_id'] ;
        ?>
   			
            <a class="btn btn-info" href="archievedprescription.php?PRESCRIPTION_ID=<?php echo $d5['prescription_id'] ?>&visit_id=<?php echo $d5['visit_id']; ?>&patient_id=<?php echo $d5['PATIENT_ID']; ?>" role="button"><?php echo date("d-m-y", strtotime($d5['VISIT_DATE'])); ?></a>
            
        
    <?php
                            }

                        }else {
                            echo"<p class='bg-success'>First Visit. No Stored prescription</p>";
                        }

    ?>



<!-- Get In Touch Ends -->					
    </div>

</div>