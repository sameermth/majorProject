<?php

	if(isset($_POST['count'])){
		
		$count    = $_POST['count'];
		$business = $_POST['business'];
		
		$serial   = array();
		$category = array();
		$brand    = array();
		$model    = array();
		$mp       = array();
		$tax      = array();
		$availability   = array();
		
		for($i = 1 ; $i <= $count ; $i++)
		{
			array_push($serial,     $_GET['serial'.$i]);
			array_push($category,	$_GET['category'.$i]);
			array_push($brand, 		$_GET['brand'.$i]);
			array_push($model, 		$_GET['model'.$i]);
			array_push($mp, 		$_GET['mp'.$i]);
			array_push($tax, 		$_GET['tax'.$i]);
			array_push($availability,     $_GET['status'.$i]);
		}



?>