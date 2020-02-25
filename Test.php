<?php
include './inc/datacon.php';
include './classes/admin_class.php';
include_once './inc/header.php';
include_once './classes/prescription_header.php';
$admin = new admin();


$resultObj = $adminObj->getUserDetails('2');

echo "user full name is ->".$resultObj->user_full_name;

?>
<?php  include_once './inc/footer.php';
?>
</body>
</html>

