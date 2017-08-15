<?php include "./inc/datacon.php"; ?>

<?php 
$_SESSION['NAVIGATION'] = 'visit_list';
?>

<body>

<?php 
if(isset($_SESSION['user_type'])) {
	include_once './inc/header.php';
    $user_name = $_SESSION['user_name']  ;
    $user_type = $_SESSION['user_type']  ;
    $user_id = $_SESSION['user_id'];

?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Select Chamber Name</h1>
    </div>
    <?php 
	    include_once 'classes/admin_class.php';
	    $adminObj = new admin();
	    $resultObj = $adminObj->getUserDetails($user_id);
    	$_QUERY = "select chamber_id, chamber_name, chamber_address, chamber_header from chamber_master";
        $arr = array();
        $result = mysql_query($_QUERY) or die(mysql_error());   
        
        ?>  
    
    <div class="dropdown">
	  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Chamber
	  <span class="caret"></span></button>
	  <ul class="dropdown-menu">
	     <?php 
          if($user_type == 'DOCTOR'){
          		
	          while($rows = mysql_fetch_array($result)) {
	          	echo "<li><a href='visit_list.php?chamber_name=".$rows['chamber_id']."'>". $rows['chamber_name']."</a></li>";  
	          }
          } else if ($user_type == 'RECEPTIONIST'){
	          	while($rows = mysql_fetch_array($result)) {
	          		echo "<li><a href='visit_list.php?chamber_name=".$rows['chamber_id']."'>". $rows['chamber_name']."</a></li>";
	          	}
		  }?>
	  </ul>
	</div>
</div>


<?php 
include_once './inc/footer.php';
} else {
    header("location:index_login.php");
} ?>

</body>
</html>