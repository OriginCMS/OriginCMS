<?php

	include 'includes/mysqli.php';

	foreach (glob("addons/*/index.php") as $filename){
		try {
			@include $filename;
		}
		catch {
			$log->log('Caught exception: ', date('l jS \of F Y h:i:s A'), $e->getMessage(), "\n");
		}

	}


