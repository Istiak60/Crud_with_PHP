<?php
	
	include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
	use  Bitm\Contact;
	$_contact = new Contact();
	$_contact->update();

?>