<?php include_once "./inc/datacon.php"; 
include_once "./inc/header.php";
include_once "classes/admin_class.php";
?>

<script type="text/javascript">
   function myFocus(element) {
     if (element.value == element.defaultValue) {
       element.value = '';
     }
   }
   function myBlur(element) {
     if (element.value == '') {
       element.value = element.defaultValue;
     }
   }
</script>


<script type="text/javascript">

</script>
</head>

<?php



if(isset($_SESSION['user_type']) ){
    
if(isset($_SESSION['NAVIGATION'])){
if( $_SESSION['NAVIGATION'] == 'visit_list'){
    
    if(isset($_GET['VISIT_ID'])  && isset($_GET['patient_id']) && isset($_GET['PRESCRIPTION_ID']) ) {
    
$user_type = $_SESSION['user_type'] == 'DOCTOR';

$patient_id = $_GET['patient_id'];
$visit_id = $_GET['VISIT_ID'];


$PRESCRIPTION_ID = $_GET['PRESCRIPTION_ID'];


?>

<body >
    
   
<?php


//$r1 = mysql_query("select * from patient where patient_id = '$patient_id'") or die(mysql_error());

$update= new admin(); 
$d1 = $update->getPatientInformationForPrescription($patient_id);
//$r2 = mysql_query("select * from visit where PATIENT_ID = '$patient_id'");
//$n2 = mysql_num_rows($r2);
?>

            <!-- Begin container -->
<div class="container">
        
            <!--BEGIN header-->
            <?php include("banner.php") ?>
            
            <!--END of header-->
                
                    
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
                    
           
            <!--END of patient details-->
            
            <form id="form1" name="form1" method="post" action="printprescription.php" onsubmit="return validate();" >
            <!--BEGIN content-->
            <div class="content">
            
               <!--BEGIN block FIVE-->
              
                
              <!--END of block FIVE-->

			    <!--BEGIN block FOUR-->
              
                
              <!--END of block FOUR -->
            
            </div>
            
           
            <!--END of content-->
            <div class="row">
  <div class="col-md-3"><?php include("makeprescription/clinical_impression.php");?></div>
  
  
  <div class="col-md-3"><?php include("makeprescription/investigation_done.php");?></div>
  <div class="col-md-3"><?php include("makeprescription/c_f.php");?></div>
  <div class="col-md-3"><?php include("makeprescription/addiction.php");?></div>
</div>
            
            <!--BEGIN doctor comment/advice section-->
            <div class="diet" style="margin-top: 5px;">    
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Comment / Advice</div>
                <textarea class="form-control" rows="3"></textarea>
            
            </div>
            <!--END doctor comment/advice section-->
            
            <!--BEGIN diet section-->
            <div class="diet" >    
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Diet & Lifestyle Recommendation</div>
                <textarea class="form-control" rows="3">Diet 1600 Kcal/day, Cholesterol < 200 gm /day , Saturated Fat < 7%, Walking at recommended speed for atleast 30 mins/day, Alerted to hypoglycaemia (CBG < 70 y/dl)</textarea>       
                
            </div>
            
            <!-- END diet section-->
            
           
              
                <div class="headings" ><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Rx (Prescription)</div>
                      
                    
                    <?php
                        
                    //Retrieve last prescription id
                    //$q11 = "select * from precribed_medicine where PRESCRIPTION_ID = '".$lastPrescription."'"; 
                    //echo $q11;
                    $q11 = "SELECT * FROM precribed_medicine WHERE PRESCRIPTION_ID = '".$PRESCRIPTION_ID."'";
                            //echo $q5;
                    
                            $result = mysql_query($q11) or die(mysql_error()); 
                    ?>
                   
                    <div  id="medicine" >
                       
                        <table id="table-3" class="table"> 
                        <?php while($rs = mysql_fetch_array($result)) { ?>

                            <tr>
                                <td>
                                    <img src="images/stock_list_bullet.png"/>&nbsp<strong><?php echo $rs['MEDICINE_NAME'] ?></strong>
                                    <input type="hidden" class="input_box" name="medicine_name" value="<?php echo $rs['MEDICINE_NAME'];?>"/>
                                    <img src="images/arrow-right.png" />
                                        <i><?php echo $rs['MEDICINE_DOSE'] ?></i><input type="hidden" class="input_box_small" name="dose" value="<?php echo $rs['MEDICINE_DOSE'];?>" /></td>
                                <td  align="center" width="90"    >

                                    <a id="minus7" href="#" onclick="del(<?php echo $rs['MEDICINE_ID'] ?>,<?php echo $PRESCRIPTION_ID ?>)">[-]</a> 


                                </td>

                            </tr>

                        <?php } ?>
                        </table>
                    </div>
                    
                    <div class="row">
						<div class="col-md-3">Medicine Names</div>
						<div class="col-md-2">Breakfast</div>
						<div class="col-md-2">Lunch</div>
						<div class="col-md-2">Dinner</div>
						<div class="col-md-2">Bedtime</div>
						<div class="col-md-1">Action</div>
					</div>
                    <div class="row">
						<div class="col-md-3"><input type="text" name="medicine_name" id="course" class="form-control" placeholder="Enter Medicine name" /></div>
						<div class="col-md-2"><input name="dose1" id="dose1" type="text"  class="form-control" placeholder="Breakfast"/><input type="radio" name="bfradio" value ="before"/> before <input type="radio" name="bfradio" value ="after"/> after</div>
						<div class="col-md-2"><input name="dose2" id="dose2" type="text" class="form-control" placeholder="Lunch"/><input type="radio" name="lradio" value ="before"/> before <input type="radio" name="lradio" value ="after"/> after</div>
						<div class="col-md-2"><input name="dose3" id="dose3" type="text" class="form-control" placeholder="Dinner"/><input type="radio" name="dradio" value ="before"/> before <input type="radio" name="dradio" value ="after"/> after</div>
						<div class="col-md-2"><input name="dose4" id="dose4" type="text" class="form-control" placeholder="Bedtime"/><input type="radio" name="dradio" value ="before"/> before <input type="radio" name="dradio" value ="after"/> after</div>
						<div class="col-md-1"><input type="hidden" name="PRESCRIPTION_ID" value="<?php echo $_GET['PRESCRIPTION_ID']; ?>" id="PRESCRIPTION_ID" />
								<input type="hidden" name="patient_id" value="<?php echo $_GET['patient_id']; ?>" id="patient_id" />
								<input type="hidden" name="VISIT_ID" value="<?php echo $_GET['VISIT_ID']; ?>" id="VISIT_ID" /><a id="plus7" href="#" onclick="return saveResult()">[+]</a> </div>
					</div>
                                 
                
            
            
            <!--END of rx section-->
            
            
             
            
            <!--BEGIN Prescribed Investigation section-->
            
            <div class="invest" >    
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Prescribed Investigation</div>
                <div id="tabs" ><?php include("makeprescription/invest.php");?></div>
                

            </div>
            
            <div class="diet">    
                <div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Patient's Next Visit</div>
                <div class="row">        
                    <div class="col-md-1">After</div><div class="col-md-1"><input name="nextvisit" type="text" class="form-control" value="2" onfocus="myFocus(this);" onblur="myBlur(this);"/> </div><div class="col-md-8">Weeks</div>
                
                </div>
            
            </div>
            
            
            
            <!--BEGIN submit button-->
            
            
                <div class="btn_wrap">
                    <?php if ($user_type == 'DOCTOR') {  ?>
                    <input type="submit" class="btn btn-primary" name="MAKE_PRESCIPTION" id="MAKE" value="MAKE PRESCIPTION" />
                     <?php } ?>
                    <input type="button" class="btn btn-default" name="BACK" id="MAKE" value="Back" onclick="backtoVisit()"/>
                </div>
                
            <!--END of submit button-->
            
           
            
            <!--END of diet section-->
            <!--END of rx special-->
            </form>
            <?php include "footer_pg.php"; 
			    
			    ?> 
            </div><!-- End container -->
        
     
        <?php }else {
            header("location:blank_prescription.php");
        }
        
        }}else{ 
    header("location:visit_list.php");
        }} else {
            header("location:index.php");
        }
include_once './inc/footer.php';
?>

</body>

</html>