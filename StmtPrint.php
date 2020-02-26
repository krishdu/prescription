<?php include_once "./inc/datacon.php"; ?>
<?php
if( isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name'])){
	$chamber_name = $_SESSION['chamber_name'];
	$doc_name= $_SESSION['doc_name'];
if(isset($_SESSION['user_type']) ){
if(isset($_GET['patient_id'])){

?>

 
<?php
	include_once "./inc/header_print.php";
?>
<body>
            <div class="print_container" id="printArea">
        
            <!--BEGIN header-->
            <?php 
            
            include_once "classes/admin_class.php"; 
            include_once 'classes/prescription_header.php';
	            $update= new admin();
	            $patient_id = $_GET['patient_id'];
	            $d1 = $update->getPatientDetailsPatientId($patient_id, $chamber_name, $doc_name);
	            $chamber_id = $_SESSION['chamber_name'];
	            $obj = $update->getChamberDetails($chamber_id);
	            $doc_name = $_SESSION['doc_name'];
	            $header = new Header($doc_name,$chamber_id);
	            
            ?>
            
            
            <div class="content">

            	 <div class="col-md-8-print"> 
                    <div id='prescription_doc_name'><?php echo "<i><b>".$header->doctor_full_name."</b></i>"; ?></div>
                        <?php echo $header->doctor_degree;?></div>
                    <div class="col-md-4-print">
                    <img src="images/phone.png" align="absmiddle"/>&nbsp;&nbsp;&nbsp;<b><?php echo $header->doctor_mobile;?> (M)</b><br/>
                        <img src="images/email.png" align="absmiddle"/>&nbsp;&nbsp;&nbsp;<b><?php echo $header->doctor_email;?></b><br/><br/>
                        <u><b>Ananda Clinic</b></u><br/>
                        <?php echo $header->chamber_address;?><br/>
                        Phone : <?php echo $header->primary_phone_number;?> / <?php echo $header->secondary_phone_number;?><br/>
                        <u><b>Chamber(By Appointment)</b></u><br/>
                        <?php echo $header->doctor_address;?>
                    
                  </div>
           
			
			
	      </div>	
          <!--END of header-->
          <!-- Begin Patient Details -->
          <div class="content_patient_details" >
                        
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
 
             <!--BEGIN inv section-->
            
            <div class="invest_rx"><div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;Rx (Prescription)</div>    
                <div class="col-xs-12 .col-sm-6 .col-lg-8">      
                
                    <?php
                        $q11 = "SELECT patient_id, proc_name, proc_details, proc_charge, discount, null as amount, created"
." FROM patient_proc a WHERE a.patient_id = '$patient_id'"
	    ." union all select patient_id, concat('Payment:',payment_mode) as proc_name,payment_ref as proc_details, null proc_charge, null as discount, amount, pay_dt as created from patient_payment b"
	    ." WHERE b.patient_id = '$patient_id' order by 5 asc";
	    //echo $q11;
                
                            $result = mysql_query($q11) or die(mysql_error()); 
                            $tot=0;
                            $pay=0;
                            $disc=0; 
                    ?>
                    
                    
                        <table id="table-3" class="table"> 
                        <thead><td>Date</td><td>Procedure/Payment</td><td>Discount</td><td>Net Amount</td><td>Payment</td>
                        </thead>
                        
                        <?php while($rs = mysql_fetch_array($result)) { ?>

                            <tr>
                            <td><?php echo date("d-M-Y", strtotime($rs['created'])) ?></td>
                                <td class='medicine_desc'>
                                    <img src="images/stock_list_bullet.png"/>&nbsp<strong><?php echo $rs['proc_name'] ?></strong>
                                    
                                    <img src="images/arrow-right.png" />
                                        <i><?php echo $rs['proc_charge'] ?></i></td>
                                        <td><?php $disc = $disc + $rs['discount']; echo $rs['discount']; ?></td>
                                        <td><?php $x= $rs['proc_charge'] - $rs['discount']; $tot = $tot  + $x ; echo $x; ?></td>
                                        <td><?php $pay = $pay + $rs['amount'];   echo $rs['amount']; ?></td>
                               

                            </tr>

                        <?php } ?>
                        <tr><td>Total </td><td><?php echo "Bill: ".$tot?></td><td><?php echo "Discount: ".$disc;?></td><td><?php echo "Payment: ".$pay;?></td><td><?php $net=$tot - $disc -  $pay; echo "Due: ". $net?></td></tr>
                        </table>
                    
                </div>
            
            </div>
            <!--END of inv section-->
    
           
                       <!--BEGIN submit button-->
                <div class="btn_wrap">
                    
                    
                    &nbsp;</div>
            <!--END of submit button-->
                      
            <!--BEGIN footer-->
            
            <?php 
	
	$visit_date = $_SESSION['visit_date'];
	
	?>
	
<div class="row2">
        <div class="col-md-8-print"> Date : <?php echo $visit_date; ?><br>Ref # ( <?php echo $_GET['PRESCRIPTION_ID']; ?> / <?php echo $_GET['visit_id']; ?> / <?php echo $_GET['patient_id']?>) </div>
        <div class="col-reg-num" align="right"><b>(<?php echo $header->doctor_full_name;?>) </b><br>Reg. No. # <?php echo $header->doc_reg_num;?></div>
</div>	
<div class="row">
      
      <div class="alert alert-info" role="alert">
        <strong><?php echo $header->chamber_footer;?></strong>
      </div>
      
     
</div>
</div><!-- End container -->

            <div class="content" align="center">
        
		        <input class="btn btn-success" type="button" id="print_arch_pres" value="Print" onclick="return func_print('<?php echo $header->doctor_full_name;?>');">
		        <a class="btn btn-success" href="./CreateBill.php" >Go To Search</a>
		        <?php echo "<a class='btn btn-alert' href='./createBilling.php?patient_id=".$patient_id."'>Go To Billing</a>"?>
		        <?php echo "<a class='btn btn-warning' href='./receivePayment.php?patient_id=".$patient_id."'>Receive Payment</a>"?>
			</div>
           <?php 
}  

}else {
echo "Please logout and login again.";
}
} else {
echo "Session expired. Login again.";
}?> 
            
            
        	 

        <?php include_once './inc/footer.php';?>
    </body>
</html>