<?php
include 'datacon.php';
include 'classes/admin_class.php';
include_once 'classes/prescription_header.php';
$admin = new admin();
?>
<script src="ckeditor/ckeditor.js"></script>
<?php 
//echo $eg = $admin->calcEGFR("Male", 1.23, "30");
//echo $admin->deriveClinicalImpressionFromEGFR($eg);
/* $obj = $admin->getChamberList();
$arr = json_encode($obj);
echo $arr;
//$myObj = JSON.parse($obj);

foreach ($obj as $key => $value) {
    //echo $k, ' : ';
    foreach($value as $v)
    {
        echo $v['chamber_id']."  ". $v['chamber_name'];
    }
} */

/* $header = new Header('sroy','sos');
echo	$header->doctor_full_name;
echo	$header->doctor_degree;
echo	$header->doctor_affiliation;
echo	$header->doctor_email;
echo	$header->doctor_mobile;
echo	$header->doc_reg_num;
echo	$header->primary_phone_number;
echo	$header->chamber_footer;  */


/* echo $admin->calIdealBodyWeight('Male', 178);
echo "<br>";
echo $admin->calIdealBodyWeight('Female', 156);

echo $admin->getPatientDetailsFromVisit('10424')->GENDER;

$admin->insertUpdateCF('WEIGHT (KG)','100','10426'); */

/* echo $admin->getMaxVisitId('sos', 'sroy');
if ($admin->getMaxPrescriptionId('sos','sroy') == NULL){echo "Empty";}else {
	echo $admin->getMaxPrescriptionId('sos','sroy');
} */

$chamber_id='sos';


$post_data = array('Status' => "success",
		'message' => "Successfully added. Click here to Login ",
		'chamber_name' => $chamber_id);

$myJSON = json_encode($post_data);

echo $myJSON;
?>
//mysql_query($insert_doc_master) or die(mysql_error());

<body>
<form>
<textarea name="editor1" id="editor1" rows="10" cols="80">
This is my textarea to be replaced with CKEditor.
</textarea>
<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace( 'editor1' );
</script>

</form>

<?php

$result = $admin->preparepatientDatails("Biswarup Kumar Ghoshal");
//echo $result[0].fname;
//echo $result.fname;
echo $result->fname;

echo $admin->getMaxPatientId('rainbow', 'bghos');

/* class Foo {
	public $aMemberVar = 'aMemberVar Member Variable';
	public $aFuncName = 'aMemberFunc';
	
	
	function aMemberFunc() {
		print 'Inside `aMemberFunc()`';
	}
}

$foo = new Foo; 
$element = 'aMemberVar';
print $foo->$element; */

echo $admin->calcBMI(84, 178);
echo "ideal body weight ->".$admin->calIdealBodyWeight('Male', 178);

//$admin->insertUpdatePatientInvestigation('CREATININE', '', '', '1.2', '1', '1','rainbow','bghos');]

echo "<a href='./visit_list.php'>Link</a>";

?>

<?php include_once './inc/footer.php';?>
</body>
</html>

