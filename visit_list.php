<?php include_once "./inc/datacon.php"; ?>

<?php 
$_SESSION['NAVIGATION'] = 'visit_list';

?>
<?php include_once "./inc/header.php"; ?>
<body>

<?php 
if( (isset($_SESSION['user_type']) && isset($_GET['chamber_name'])) || (isset($_SESSION['user_type']) && isset($_SESSION['chamber_name'])) ) {
	if(isset($_GET['chamber_name'])){
		$_SESSION['chamber_name'] = $_GET['chamber_name'];
	}
	$chamber = $_SESSION['chamber_name'];

?>


    <div class="container"><!-- Begin container -->
       
    <!--BEGIN header-->
            <?php include("banner.php");?>
            
    <!--END of header-->
    
    <div class="col-xs-12 .col-sm-6 .col-lg-8">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Mobile</th>
                <th>Booking date</th>
                <th>Booking Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
<?php 

$result = mysql_query("SELECT a.visit_id, b.patient_id, a.visited, b.patient_first_name,
                        b.patient_last_name, b.patient_name, b.patient_cell_num, a.VISIT_DATE
                        FROM visit a, patient b
                        WHERE a.patient_id = b.patient_id
                        AND a.visited =  'no' AND a.visit_id
                        in ( SELECT max( visit_id )
                            FROM visit c
                            WHERE c.visited = 'no'
                            GROUP BY patient_id)
                            order by VISIT_DATE desc") ;
$count=1;
while ($row = mysql_fetch_array($result)) {

	?>
                <tr >
                    <td><?php echo $count;?></td>
                    <td><a href="create_prescription.php?patient_id=<?php echo $row['patient_id'] ?>&VISIT_ID=<?php echo $row['visit_id']; ?>">
                        <?php if($row['patient_name'] == null || $row['patient_name'] == ""){
                         echo $row['patient_first_name'] . " " . $row['patient_last_name']; } else { echo $row['patient_name']; }?></a></td>
                    <td><?php echo $row['patient_cell_num']; ?></td>
                    <td><?php echo date("d / m / Y", strtotime($row['VISIT_DATE'])); ?></td>
                    <td><?php echo date("h:i A", strtotime($row['VISIT_DATE'])); ?></td>
                    <td><button type="button" class="btn btn-warning" onclick="removeVisit('<?php echo $row['visit_id']; ?>')">Cancel Booking</button> </td>
                </tr>
    <?php
    $count = $count+1;
}
//mysql_close($con);
?>
              
            </tbody>
          </table>
        </div>
      
    
    
    <?php if( $_SESSION['user_type'] == "DOCTOR"){ ?>
           <div class="btn_wrap2">
            <!--<form id="form2" action="doc_add_patient.php" method="POST"> -->
            <form id="form2" action="index.php" method="POST">
            <input type="submit" id="ADD" value="Add Patient"  class="btn btn-success"/>
            </form>
                 
    </div>
     <?php  } else { ?>
           <div class="btn_wrap2">
               
            <form id="form2" action="index.php" method="POST">
            <input type="submit" id="ADD" value="Add Patient"  class="btn btn-success"/>
            </form>
            </div>
      <?php } ?> 
    <!--BEGIN footer-->
    <?php include "footer_pg.php"; 
    
    ?> 
    <!--END of footer-->
   </div> <!-- End container -->



<?php } else {
    header("location:index_login.php");
} ?>
<?php include_once './inc/footer.php';?>
</body>
</html>