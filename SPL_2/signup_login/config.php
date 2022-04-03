<?php
session_start();
$dbHost="localhost";
$dbName="system_database";
$dbUserName= "root";
$dbPassword="";

$db_conn= mysqli_connect($dbHost,$dbUserName,$dbPassword, $dbName);

?>