<?php

ob_start();

session_start();

include("connect.php");

if(isset($_POST['sign_up'])){

    $username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);

    $emailid=filter_var($_POST['emailid'],FILTER_SANITIZE_EMAIL);

    $pass=filter_var($_POST['pwd'],FILTER_SANITIZE_STRING);

    $confirm_pass=filter_var($_POST['confirm_pwd'],FILTER_SANITIZE_STRING);

    if($pass!=$confirm_pass){

        echo "<script>alert('Password Mismatch!');

        location.href('/');

        </script>";

    }

    $pass=md5($pass);

    $sel_query="SELECT * FROM `users` WHERE `username`='$username' OR `email`='$emailid'";

    $sel_res=mysqli_query($conn, $sel_query);

    $sel_rows=mysqli_num_rows($sel_res);    

    if($sel_rows){

        echo "<script>alert('This entry already exists');
            location.href('/');</script>";

    }

    else{     

    //preparing variables for queries

    $username=mysqli_real_escape_string($conn,$username);   

    $emailid=mysqli_real_escape_string($conn,$emailid);   

    $pass=mysqli_real_escape_string($conn,$pass);   

    //creating unique activation code

    $activation_key=bin2Hex(openssl_random_pseudo_bytes(16));

    // echo $userid." ".$username." ".$emailid." ".$pass." ".$activation_key;

   
    $message='Please click on this link to activate your account:\n';

    $message='http://letsnoteit.epizy.com/activate.php?email='.urlencode($emailid)."&key=$activation_key";

    if(mail($emailid,'Confirm your Registration',$message,'From: '.'OzzDm')){

        $ins_query="INSERT INTO `users`(`username`, `email`, `password`, `activation`) VALUES ('$username', '$emailid', '$pass', '$activation_key')";

        $ins_res=mysqli_query($conn,$ins_query);
    
        if(!$ins_res){ echo "error while inserting data to DB";}
    

        echo "<script>alert('Mail sent');
        location.href('/');</script>";

    }
    else{
        echo "<script>alert('Some error occured');
        location.href('/');</script>";
    }

    }

}

 if(isset($_POST['login'])){

    // session_start();

    $username=filter_var($_POST['username'],FILTER_SANITIZE_EMAIL);

    $pass=filter_var($_POST['pwd'],FILTER_SANITIZE_STRING);

    $pass=md5($pass);

    $username=mysqli_real_escape_string($conn,$username);   

    $pass=mysqli_real_escape_string($conn,$pass);

    $sel_query="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$pass' AND `activation`='activated'";

    $sel_res=mysqli_query($conn,$sel_query);
   
    if(!$sel_res){ 
        echo "ERROR in query";       
    }

    $count=mysqli_num_rows($sel_res);
    if($count==0){
        echo"<script>
            alert('Please enter a valid username and password!');
        
        location.href='index.php';
        </script>";
        
    }
    if($count==1){

        $row=mysqli_fetch_array($sel_res,MYSQLI_ASSOC);

        $_SESSION['user_id']=$row['user_id'];

        $_SESSION['username']=$row['username'];

        $_SESSION['email']=$row['email'];

        //  echo $_POST['remember'];//on

        if(isset($_POST['remember'])){

        //     echo "success";

        // }

        // else{

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

            }else{

                echo "success";

            }



        

        }

        header("Location: dashboard.php");

    }




}



?>