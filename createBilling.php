<?php include_once "./inc/datacon.php";
include_once "./inc/header.php";
include_once "classes/admin_class.php";
?>
    
<body>
    
<!--BEGIN wrapper-->
<?php 
if(isset($_SESSION['user_type']) &&isset($_SESSION['chamber_name']) && isset($_SESSION['doc_name']) && isset($_GET['patient_id'])) {
/*if($_SESSION['user_type'] == 'DOCTOR'){
    header("location:visit_list.php");
} else if($_SESSION['user_type'] == 'RECEPTIONIST'){*/
?>

	<div class="container">
    <!--BEGIN header-->
    <?php include("banner.php"); ?>
    <!--END of header-->
    <form id="bill_create_form" class="form-horizontal" >
                      <input type="hidden" name="chamber_id" value="<?php echo $_SESSION['chamber_name']; ?>">
				      <input type="hidden" name="doc_id" value="<?php echo $_SESSION['doc_name']; ?>">
				      <input type="hidden" name="loged_in_user_id" value="<?php echo $_SESSION['user_name']; ?>">
				      <input type="hidden" name="patient_id" value="<?php echo $_GET['patient_id']; ?>">
                      <div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
                      
				        
				      </div>
					  <div class="form-group">
					    <label for="Procedure Name" class="col-sm-2 control-label">Procedure Name:</label>
					    <div class="col-sm-2">
					      <select class="form-control" name="proc_name" id="proc_name">
                            <option value="0">--SELECT--</option>
                            <option value="Consultation">Consultation</option>
                            <option value="OT-Surgery">OT-Surgery</option>
                            <option value="Surgery">Surgery</option>
                        </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="Procedure details" class="col-sm-2 control-label">Procedure Details:</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control" name="proc_details" id="proc_details" placeholder="Procedure details">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="Charge" class="col-sm-2 control-label">Procedure Charge:</label>
					    <div class="col-sm-6">
					      <input type="number" class="form-control" name="Charge" id="Charge" placeholder="Charge">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="Discount" class="col-sm-2 control-label">Discount:</label>
					    <div class="col-sm-6">
					      <input type="number" class="form-control" name="Discount" id="Discount" placeholder="Discount">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="button" id="add_bill" class="btn btn-default"  value="Add Bill" name="add_bill" >
					    </div>
					  </div>
					</form>
					 <div id="create_r_result">
    
   <?php include "footer_pg.php"; ?>
    
	</div><!-- End container-->

<?php } /*}*/ else {
    /*  header("location:index_login.php"); */
    echo "<script>location.href='index_login.php'</script>";
}
include_once './inc/footer.php';
?>
</body>
</html>
<?php ob_flush() ?>