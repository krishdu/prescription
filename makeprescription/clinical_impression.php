<div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Clinical Impressions</div>
<div class="inner" >

        <div id="CI">

            <?php
                $q15 = "SELECT b.type, b.ID
                        FROM prescribed_cf a, clinical_impression b
                        WHERE a.clinical_impression_id = b.id
                        AND a.prescription_id = '$PRESCRIPTION_ID'";
                $rsd1 = mysql_query($q15);

                while($rs = mysql_fetch_array($rsd1)) {
                    $type = $rs['type'];
                    $cf_d = $rs['ID'];
            ?>
                <div class="row">      
                    
                        <div class="col-md-10"><?php echo $type; ?></div>
                    <div class="col-md-2" ><a class="minus" href='#' 
                            onclick="deleteClinicalImpression('<?php echo $cf_d ; ?>','<?php echo $PRESCRIPTION_ID ; ?>')">[-]</a>
                    </div> 
                    
                </div> 
            <?php    } ?>
            </div>
            <div class="row">
                <div class="col-md-10"><input type='text' class="form-control" id='txtCI' placeholder="Clinical Impression"/>

                </div>
                <div class="col-md-2" >
                    <a href='#' onclick="addClinicalImpression('<?php echo $PRESCRIPTION_ID ; ?>')">[+]</a>
                </div> 
            
		</div>
    </div>     