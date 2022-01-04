<?php
  include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
  use  Bitm\Admin;
  $_admin = new Admin();
  $admin = $_admin->update();

?>