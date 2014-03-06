<?php
	require_once('config.php');
	//$dbc=mysqli_connect($config['dbHost'],$config['dbUser'],$config['dbPass'],$config['dbName']);
	$mysqli = new mysqli($config['dbHost'],$config['dbUser'],$config['dbPass'],$config['dbName']) or die("Error : Could not establish database connection");
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	function doSql($sql){
  		$sql = $mysqli->real_escape_string($sql); //escape string
  		try {
  			$doSql = mysqli_query($dbc,$sql) or throw new Exception('Could not Query');

  		}
  		catch {
  			echo 'Caught exception: ',  $e->getMessage(), "\n";
  			return false;
  		}
  		return true;
  	}

?>
