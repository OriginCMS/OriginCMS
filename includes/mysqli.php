<?php
	require_once('config.php');
        require_once('../classes/log.php');
	//$dbc=mysqli_connect($config['dbHost'],$config['dbUser'],$config['dbPass'],$config['dbName']);
	$mysqli = new mysqli($config['dbHost'],$config['dbUser'],$config['dbPass'],$config['dbName']) or die("Error : Could not establish database connection");
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	function doSql($sql){
            global $mysqli;
  		$sql = $mysqli->real_escape_string($sql); //escape string
  		try {
  			$doSql = $mysqli->query($sql);
                        if (!$dosql) {
                            throw new Exception('Mysql Query Error');
                        }

  		}
  		catch (Exception $e){
                    $log = new log;
  			$log->log('Caught exception: ',  $e->getMessage(), "\n");
  			return false;
  		}
  		return true;
  	}

