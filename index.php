<?php

	include 'includes/mysqli_connect.php';

	foreach (glob("addons/*/index.php") as $filename){
    	@include $filename;
	}


