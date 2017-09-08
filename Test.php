<?php
include 'datacon.php';
include 'classes/admin_class.php';
include_once 'inc/header.php';
include_once 'classes/prescription_header.php';
$admin = new admin();
?>
<script src="ckeditor/ckeditor.js"></script>

<style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>

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

/* $JSONObject= json_decode($admin->getListOfChambersbyOwners('sroy'));
foreach ($JSONObject as $value){
	echo $value.'chamber_name';
	foreach ($value as $key=>$value){
		echo $value;
	}
} */
$result = $admin->getListOfChambersbyOwners('sroy');
while($row = mysql_fetch_array($result)){
	echo $row['chamber_name'];
}
?>
<a class="link-edit-chamber" href="#">Click here</a>
<button id="create-user">Create new user</button>

<div id="dialog-form-edit-chamber" title="Create new user">
	  <p class="validateTips">All form fields are required.</p>
	 
	  <form>
	    <fieldset>
	      <label for="name">Name</label>
	      <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
	      <label for="email">Email</label>
	      <input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">
	      <label for="password">Password</label>
	      <input type="password" name="password" id="password" value="xxxxxxx" class="text ui-widget-content ui-corner-all">
	 
	      <!-- Allow form submission with keyboard without duplicating the dialog button -->
	      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
	    </fieldset>
	  </form>
	</div>
<?php include_once './inc/footer.php';?>
<script type="text/javascript">
$(document).ready(function(){
	var dialog;
	dialog = $( "#dialog-form-edit-chamber" ).dialog({
	      autoOpen: false,
	      height: 400,
	      width: 350,
	      modal: true
	      
	    });
	
	$( "#create-user" ).button().on( "click", function() {
	      dialog.dialog( "open" );
	    });
	  
});
</script>
</body>
</html>

