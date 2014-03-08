<?php
	if(!file_exists('includes/config.php')){
		header('location:install');
	}
	include 'includes/mysqli.php';
        require_once 'classes/loader.php';
	foreach (glob("addons/*/index.php") as $filename){
		try {
			@include $filename;
		} 
                catch (Exception $e) {
			$log->log('Caught exception: ', date('l jS \of F Y h:i:s A'), $e->getMessage(), "\n");
		}

	}


