<?php
$host='localhost';
$user='root';
$pass='';
$db='onlinenotes';
$conn=mysqli_connect($host, $user, $pass, $db);
//print_r($conn);
if(mysqli_connect_error()){
    die("Connection failed!\n".mysqli_connect_error());
}
?>
