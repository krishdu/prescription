<?php include_once "./inc/datacon.php"; ?>
<?php
if(isset($_SESSION['user_type']) ){
if(isset($_GET['PRESCRIPTION_ID'])){

?>

 
<?php include_once "./inc/header_print.php";?>


<body>
            <div class="container" id="printArea">
        
            <!--BEGIN header-->
            <?php 
            
            include_once "classes/admin_class.php"; 
	            $update= new admin();
	            $prescription_id = $_GET['PRESCRIPTION_ID'];
	            $d1 = $update->getPatientInformationforArchievePrescription($prescription_id);
	            $_SESSION['visit_date'] = $d1->VISIT_DATE;
	            $chamber_id = $_SESSION['chamber_name'];
	            
	            $admin_obj = new admin();
	            
	            $obj = $admin_obj->getChamberDetails($chamber_id);
            ?>
            
            
            <div class="content">
	        <div class="col-md-8-print"> 
	        	<div id='prescription_doc_name'>Dr. Soumyabrata Roy Chowdhuri</div>
	            MBBS, * Masters in Diabetology<br>
				*Post Graduate Diplomate in Geriatric Medicine<br>
				*Post Graduate Certification in Diabetes & Endocrinology<br>
				 (Univ. of New Castle, Australia)<br>
				PHYSICIAN - Diabetes, Endocrine & Metabolic Disorders<br>
				Department of Endocrinology KPC Medical College & Hospitals<br>
			</div>
	        <div class="col-md-4-print"><b>Membership & Affiliations</b>:<br> ADA- American Diabetes Association <br>
				EASD- European Association for Study of Diabetes<br/>
	            *RCPS &* RCGP [UK](INTL AFFILATE)<br>
				Endocrine Society (US)<br>
	            
	            <img src="images/phone.png" align="absmiddle"/>&nbsp;&nbsp;&nbsp;<b>+91.9830047300 (M)</b><br/>
				<img src="images/phone.png" align="absmiddle"/>&nbsp;&nbsp;&nbsp;<b>033-40704046 (Chamber)</b><br/>
	            <img src="images/email.png" align="absmiddle"/>&nbsp;&nbsp;&nbsp;<b>soumya.askme@gmail.com</b><br/>
	            
	        </div>
	      </div>
          <!--END of header-->
          <!-- Begin Patient Details -->
          <div class="inner_name" >
                        
                        #  <?php echo $d1->patient_id; ?>, <?php if($d1->patient_name == null || $d1->patient_name == ""){
                            echo $d1->patient_first_name." ".$d1->patient_last_name; } else { echo $d1->patient_name ; }?>, <?php echo $d1->GENDER ?>, <?php 
                        
                        if($d1->age == 0){
                            print $update->calcAge1($d1->patient_dob, $d1->VISIT_DATE) ;
                        }else {
                            echo $d1->age;
                        } ?>
					(<?php echo $d1->patient_address . ", " . $d1->patient_city; ?>, Ph: <?php echo $d1->patient_cell_num; ?>)
          </div>
            
           <!-- End Patient Details -->
           
           
           <div class="row">
            
                <!--BEGIN block one-->
                <div class="block"> 
                    <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Clinical Impressions</div>
                    <div class="inner">
                        <?php
                            $q15 = "SELECT b.type
                                    FROM prescribed_cf a, clinical_impression b
                                    WHERE a.clinical_impression_id = b.id
                                    AND a.prescription_id = '".$_GET['PRESCRIPTION_ID']."'";
                            $rsd1 = mysql_query($q15)  or die(mysql_error()); 
                            while($rs = mysql_fetch_array($rsd1) ) {
                                $result = $rs['type'];
                                
                                echo $result ;
                                echo " , ";
                            }
                        ?>
                    </div>        
                </div>
                
                <!--BEGIN block two-->
                <div class="block" style="margin-right:12px; margin-left:12px;">
                    <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Investigation Done</div>
                    <div class="inner">
                        <table>
                            
                        <?php
    $result = mysql_query("SELECT b.investigation_name, a.value, b.unit
                            FROM patient_investigation a, investigation_master b
                            WHERE a.patient_id = '".$_GET['patient_id']."'
                            AND a.visit_id = '".$_GET['visit_id']."'
                            AND a.investigation_id = b.ID ");
    
    while($rows = mysql_fetch_array($result) ){
    
?>
                           
                      <tr>
                        <td ><?php echo $rows['investigation_name']; ?></td>
                        <td ><?php echo $rows['value']; ?></td>
                        <td ><?php echo $rows['unit']; ?></td>
                        
                      </tr>
                          
                       
                        <?php } ?>
                          
                        </table>
                    </div>   
                
                </div>
                <!--END of block two-->
                
                <!--BEGIN block three-->
                <div class="block">
                    <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;C/F </div>
                    <div class="inner">
                        
                    <!-- Get In Touch Starts -->
                    <?php
					
                    $visit_id = $_GET['visit_id'];
                    
                    $q15 = "select a.VALUE, b.NAME, a.ID from
                                patient_health_details a , patient_health_details_master b
                                where
                                a.ID = b.ID
                                and a.VISIT_ID = '".$_GET['visit_id']."' ";
					 $rsd1 = mysql_query($q15);

                            while($rs = mysql_fetch_array($rsd1)) {
                                    $name = $rs['NAME'];
                                    $value = $rs['VALUE'];
                                    $id = $rs['ID'];
                    ?>
                    <table>      
                        
                        <tr>
                            <td width="100%" ><?php echo $name; ?></td>
                            <td width="100%" ><?php echo $value; ?></td> 
                        </tr> 
                       
                    </table> 
                    <?php    } ?>
                <!-- Get In Touch Ends -->					
                </div>
           
                
              </div>
              <!--END of block three-->

              
            
            </div>
            <!--END of content-->
            
            
            <!--BEGIN rx section-->
            
            <div class="invest_rx"><div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Rx (Prescription)</div>    
                <div class="col-xs-12 .col-sm-6 .col-lg-8">      
                
                    <?php
                        $q11 = "SELECT * FROM precribed_medicine WHERE PRESCRIPTION_ID = '".$_GET['PRESCRIPTION_ID']."'";
                            //echo $q5;
                
                            $result = mysql_query($q11) or die(mysql_error()); 
                    ?>
                    
                    <table class="table table-striped">
                          <thead>
				              <tr>
				                <th>#</th>
				                <th>Medicine's Names</th>
				                
				                <th>Direction</th>
				                
				              </tr>
				            </thead>
                          	<tbody>
                          	
                          	
                            <?php $count=1;
                            while($rs = mysql_fetch_array($result)) { 
                            ?>
                          <tr>
                          <td><?php echo $count; ?></td>
                            <td><?php echo $rs['MEDICINE_NAME'] ?></td>
                            
                            <td><?php echo $rs['MEDICINE_DOSE'] ?></td>
                           
                          <td>
                           
                            
                          </tr>
                            <?php $count = $count+1; } ?>
                          	</tbody>
                          
                        </table> 
                    
                </div>
            
            </div>
            <!--END of rx section-->
            
            <!--BEGIN doctor comment section-->
            <div class="diet">    
                <?php 
                    $prescriptionid = $_GET['PRESCRIPTION_ID'] ;
                    
                    $query = "select * from prescription where PRESCRIPTION_ID = 
                        '".$prescriptionid."' and VISIT_ID = '".$visit_id."'";
                    $result = mysql_query($query);
                    $diet1 = "";
                    $nextvisit1 = "";
                    while($rs = mysql_fetch_array($result)){
                        $diet1 = $rs['DIET'];
                        $nextvisit1 = $rs['NEXT_VISIT'];
                        $other_comment = $rs['ANY_OTHER_DETAILS'];
                    }
                ?>
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Other Advice (if any)</div>
                <div class="invest_inner"> <?php echo $other_comment; ?>  </textarea>
                </div>
            
            </div>
           
            
            <!--BEGIN special section-->
            <div class="invest">    
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Prescribed Investigation</div>
                <div class="invest_inner">        
                
                    <div id="tabvanilla" class="widget">            
                        
                    
                        <!--BEGIN tab1-->
                        <div id="tab1" class="tabdiv">
                            <div class="check_fields" >
                                <?php
                                $query = "SELECT b.investigation_name
                                        FROM prescribed_investigation a, investigation_master b
                                        WHERE a.investigation_id = b.ID
                                        AND prescription_id = '".$_GET['PRESCRIPTION_ID']."'";
                                $result = mysql_query($query);
                                    while($rs = mysql_fetch_array($result)) {
                                            $cname = $rs['investigation_name'];
                                            //$inv_id =$rs['ID'];
                                            echo $cname. ", ";
                                    }
                                ?>
                            </div>      
                                       
                        </div>
                        <!--END of tab1-->
                        
                    </div>   
                </div>
                
                
            
            </div>
            
            <!--BEGIN diet section-->
            
            
            <!--BEGIN diet section-->
           
            <div class="diet">    
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Diet & Lifestyle Recommendation</div>
                <div class="invest_inner">        
                <?php echo $diet1; ?>
                </div>
            
            </div>
            
            <div class="diet">    
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Patient's Next Visit</div>
                <div class="invest_inner">        
                <?php echo $nextvisit1; ?>
                </div>
            
            </div>
            
            
            <!--END of rx special-->
            
            <!--BEGIN submit button-->
                <div class="btn_wrap">
                    
                    
                    &nbsp;</div>
            <!--END of submit button-->
                      
            <!--BEGIN footer-->
            
            <?php 
	$chamber_id = $_SESSION['chamber_name'];
	$user_id = $_SESSION['chamber_name'];
	
	$admin_obj = new admin();
	
	$obj = $admin_obj->getChamberDetails($chamber_id);
	$objDoc = $admin_obj->getDoctorDetails($user_id);
	//fetch the header information
	$docname = $objDoc->doctor_full_name;
	$reg_num = $objDoc->doc_reg_num;
	$footer = $obj->chamber_footer;
	$visit_date = $_SESSION['visit_date'];
	
	?>
	
<div class="row2">
        <div class="col-md-8-print"> Date : <?php echo $visit_date; ?></div>
        <div class="col-md-4-print" align="right"><b>(<?php echo $docname; ?>) </b><br>Reg. No. # <?php echo $reg_num; ?></div>
</div>	
<div class="row">
      
      <div class="alert alert-info" role="alert">
        <strong><?php echo $footer;?></strong>
      </div>
      
     
</div><!--END of footer-->
</div><!-- End container -->

            <div class="content" align="center">
        
		        <input class="btn btn-success" type="button" id="print_arch_pres" value="Print" onclick="return func_print('<?php echo $docname; ?>');">
			</div>
           <?php 
}  

}else {
echo "Please logout and login again.";
}?> 
            
            
        	 

        <?php include_once './inc/footer.php';?>
    </body>
</html>