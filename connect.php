<?php

$host='sql310.epizy.com';

$user='epiz_29189143';

$pass='ENR&4D%czk5&';

$db='epiz_29189143_onlinenotes';

$conn=mysqli_connect($host, $user, $pass, $db);

//print_r($conn);

if(mysqli_connect_error()){

    die("Connection failed!\n".mysqli_connect_error());

}

?>

