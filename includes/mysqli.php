<?php
	require_once('config.php');
	$dbc=mysqli_connect($config['dbHost'],$config['dbUser'],$config['dbPass'],$config['dbName']);
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	function doSql($sql){
  		if (mysqli_query($dbc,$sql)){}
		else{
  			echo "MySQL error: " . mysqli_error();
 		}
  	}

?>