<?php include "datacon.php"; ?>

<?php 
$_SESSION['NAVIGATION'] = 'visit_list';
?>
<?php include "header.html"; ?>
<body>

<?php 
if(isset($_SESSION['user_type'])) {

    $user_name = $_SESSION['user_name']  ;
    $user_type = $_SESSION['user_type']  ;
    $user_id = $_SESSION['user_id'];
    
    
    if(isset($_REQUEST['action'])){
        $action=$_REQUEST['action'];
        if($action=='login'){
            
            
            $chambername =stripslashes(trim($_POST['chamberlist']));
            
            $_SESSION['chamber_name'] = $chambername;
            
            
            if($user_type == 'DOCTOR'){
                echo "<script>location.href='visit_list.php'</script>";
            } else if ($user_type == 'RECEPTIONIST'){
                echo "<script>location.href='create_visit.php'</script>";
            }
        } else{
            $print="<font color='red'>Invalid User Name or Password</font>";
            
        }
    } 

?>

<!--BEGIN wrapper-->
<div id="wrapper">
    <div class="container">
       
    <!--BEGIN header-->
            <?php include("banner.php"); 
                include_once 'classes/admin_class.php'; 
                $adminObj = new admin();
                $resultObj = $adminObj->getUserDetails($user_id);
                
                ?>
            
    <!--END of header-->
    
  	<div class="login">
         <?php $_QUERY = "select chamber_id, chamber_name, chamber_address, chamber_header from chamber_master";
        $arr = array();
        $result = mysql_query($_QUERY) or die(mysql_error());   
        
        ?>   
		<form action="select_chamber.php?action=login" method="post" id="selectchamberform">
		 Welcome back <?php echo $resultObj->user_full_name; ?> &nbsp; &nbsp; &nbsp;
			<table width="350" border="0" cellspacing="4" cellpadding="5" align="center">
			  <tr>
				<td>Select Chamber name :</td>
				<td><select name="chamberlist" form="selectchamberform">
				<?php while($rows = mysql_fetch_array($result)) {
				    echo "<option value=". $rows['chamber_id']. ">".$rows['chamber_name']."</option>" ; 
                }?>
                  </select>
              </td>
			  
			  
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit"  
                                           style="border:solid 1px #CCCCCC; padding:3px; cursor:pointer;"/></td>
			  </tr>
			</table>
		</form>
		</div>    
    <!--BEGIN footer-->
    <?php include "footer_pg.html"; ?> 
    <!--END of footer-->
    </div></div>

<?php } else {
    header("location:index_login.php");
} ?>
</body>
</html>