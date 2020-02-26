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
    <form id="rec_pay_form" class="form-horizontal" >
                   <input type="hidden" name="chamber_id" value="<?php echo $_SESSION['chamber_name']; ?>">
				      <input type="hidden" name="doc_id" value="<?php echo $_SESSION['doc_name']; ?>">
				      <input type="hidden" name="loged_in_user_id" value="<?php echo $_SESSION['user_name']; ?>">
				      <input type="hidden" name="patient_id" value="<?php echo $_GET['patient_id']; ?>">
                      <div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
				        
				      </div>
					  <div class="form-group">
					    <label for="Payment Mode" class="col-sm-2 control-label">Payment Mode:</label>
					    <div class="col-sm-2">
					      <select class="form-control" name="payment_mode" id="payment_mode">
                            <option value="0">--SELECT--</option>
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                            <option value="Cheque">Cheque</option>
                            <option value="E-Payment">E-Payment</option>
                        </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="amount" class="col-sm-2 control-label">Amount:</label>
					    <div class="col-sm-6">
					      <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="pay_dt" class="col-sm-2 control-label">Payment Date:</label>
					    <div class="col-sm-2">
					      <input type="date" class="form-control" name="pay_dt" id="pay_dt" placeholder="Pay Date">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="payment_ref" class="col-sm-2 control-label">Payment Ref:</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control" name="payment_ref" id="payment_ref" placeholder="payment ref">
					    </div>
					  </div>
					   <div class="form-group">
					    <label for="desc" class="col-sm-2 control-label">Description:</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control" name="desc" id="desc" placeholder="Description">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="button" id="rec_pay" class="btn btn-default"  value="Receive Payment" name="rec_pay" >
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