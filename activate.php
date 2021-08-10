<?php
session_start();
include("connect.php");
if(!isset($_GET['email'])||!isset($_GET['key'])){
    echo "<script>alert('Error. Please click on the activation link sent on the email ID.')</script>";
    exit;
}
else{
    $emailid=$_GET['email'];
    $key=$_GET['key'];
    $emailid=mysqli_real_escape_string($conn,$emailid);
    $key=mysqli_real_escape_string($conn,$key);
    // echo $emailid." ".$key;
    //query time
    $updt_query="UPDATE `users` SET `activation`='activated' WHERE (`email`='$emailid' AND `activation`='$key') LIMIT 1";
    $updt_res=mysqli_query($conn,$updt_query);
    // if(!$updt_res){ echo "ERROR";}
    if(mysqli_affected_rows($conn)==1){
        echo "Your account has been activated<a href='index.php'>Login</a>";
    }
    else{
        echo "Your account could not be activated. Please try again later!";
    }
}
?>