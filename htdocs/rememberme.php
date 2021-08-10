<?php
//if user is not logged in and cookie exists
if(!isset($_SESSION['user_id']) && !empty($_COOKIE['remember'])){
//Or
//if(array_key_exists('user_id',$_SESSION)
//f1: COOKIE: $a.",".bin2Hex($b)
//f2: hash('sha256',$a)
//extract authentificators 1&2 from the cookie
list($authentificator1, $authentificator2)=explode(',',$_COOKIE['remember']);
$authentificator2=hex2bin($authentificator2);
$f2authentificator2=hash('sha256',$authentificator2);

//look for authentificator1 in rememberme table
$sel_query="SELECT * FROM `rememberme` WHERE `authentificator1`='$authentificator1'";
$sel_res=mysqli_query($conn,$sel_query);
if(!$sel_res){ echo "ERROR in query";}
    $count=mysqli_num_rows($sel_res);
    if($count!=1){ echo "remeber me process failed!"; }
$row=mysqli_fetch_array($sel_res,MYSQLI_ASSOC);
if(!hash_equals($row['f2authentificator2'],$f2authentificator2)){
    echo "hash_equal returns false";
}else{

    //generate new authentificators
    $authentificator1=bin2Hex(openssl_random_pseudo_bytes(10));
    $authentificator2=bin2Hex(openssl_random_pseudo_bytes(20));

    //store them in a cookie
    function f1($a,$b){
        $c=$a.",".bin2Hex($b);
        return $c;
    }
    $cookieValue=f1($authentificator1,$authentificator2);
    setcookie("remember",$cookieValue,time()+15*24*60*60);//15days
    //Run query to store them in rememberme table
    function f2($a){
        $b=hash('sha256',$a);
        return $b;

    }
    $f2authentificator2=f2($authentificator1);
    $user_id=$_SESSION['user_id'];
    $expiration=date('Y-m-d_H:i:s',time()+15*24*60*60);
    echo $authentificator1." ".$f2authentificator2." ".$user_id." ".$expiration;
    $ins_query="INSERT INTO `rememberme`(`authentificator1`, `f2authentificator2`, `user_id`, `expires`) VALUES ('$authentificator1','$f2authentificator2','$user_id','$expiration')";
    $ins_res=mysqli_query($conn,$ins_query);
    if(!$ins_res){
        echo "Error in storing data to rememerme table";
    }
    //log the user in and redirect to notes page
    $_SESSION['user_id']=$row['user_id'];
    header("location:mainpageloggedin.php");
}

}
?>