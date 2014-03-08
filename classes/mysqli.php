<?php
  $cwd=getcwd();
  $rootDir=str_replace('install', '', $cwd);
  $rootDir=str_replace('classes', '', $rootDir);
  require_once($rootDir.'/classes/log.php');
  require_once($rootDir . '/includes/config.php');
  $mysqli=new mysqli($config['dbHost'],$config['dbUser'],$config['dbPass'],$config['dbName']) or die('Couldn\'t connect to MySQL. Error number '.mysql_errno().' : '.mysql_error());
  function doSql ($query) {
    global $mysqli;
    $queryrs = $query;
    $resultrs = $mysqli->query($queryrs) or $mysqli->error;
    return true;
  }

?>