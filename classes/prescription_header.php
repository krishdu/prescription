<?php 
/*Makes the complete Header */
class Header {
	function Header($doc_username, $chmaber_id) {
		
		$_QUERY= "select * from doctor_master where user_name ='".$doc_username."'";
		$result = mysql_query($_QUERY) or die(mysql_error());
		$obj = mysql_fetch_object($result);
		$this->doctor_full_name=$obj->doctor_full_name;
		$this->doctor_degree=$obj->doctor_degree;
		$this->doctor_affiliation=$obj->doctor_affiliation;
		$this->doctor_email=$obj->doctor_email;
		$this->doctor_mobile=$obj->doctor_mobile;
		$this->doc_reg_num=$obj->doc_reg_num;
		
		$_QUERY= "select * from chamber_master where chamber_id ='".$chmaber_id."'";
		$result1 = mysql_query($_QUERY) or die(mysql_error());
		$obj1 = mysql_fetch_object($result1);
		$this->primary_phone_number=$obj1->primary_phone_number;
		$this->chamber_footer=$obj1->chamber_footer;
		
	}
}

?>