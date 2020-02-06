<?php 

$dbHostname = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'blog';

$conn = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die('Connection failed: '. mysqli_connect_error());
}