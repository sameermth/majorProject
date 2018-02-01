<?php

define ("HOST","localhost");
define ("USER","root");
define ("PASSWORD", "");
define ("DATABASE","businessmanagement");

$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);


if($conn->connect_error)
	die( "connection error".$conn->connect_error);


?>