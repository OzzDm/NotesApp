<?php

    session_start();

    include ("connect.php");

    $user_id=$_SESSION['user_id'];
    if(empty($user_id)){
        echo "<script>alert('Login to continue...');
        location.href='logout.php';</script>";
      }

    $note_id=$_SESSION['note_id'];

    if(isset($_POST['add'])){

        $title=filter_var($_POST['title'],FILTER_SANITIZE_STRING);

        $content=filter_var($_POST['content'],FILTER_SANITIZE_STRING);

        date_default_timezone_set('Asia/Kolkata');

        // $time=date("F d, Y H:i:s A");

        $time=date("Y-m-d H:i:s");

        $imp=0;

        if(isset($_POST['imp'])){

            $imp=1;

        }

        //echo $user_id."".$title."".$content."".$time."".$imp;

        $ins_query="INSERT INTO `notes`(`user_id`, `title`, `content`, `time`,`important`) VALUES ($user_id,'$title', '$content', '$time',$imp)";

        $ins_res=mysqli_query($conn,$ins_query);

        header('Location: dashboard.php');

    }

    if(isset($_POST['edit'])){

        //updating the note

        $title=filter_var($_POST['title'],FILTER_SANITIZE_STRING);

        $content=filter_var($_POST['content'],FILTER_SANITIZE_STRING);

        date_default_timezone_set('Asia/Kolkata');

        // $time=date("F d, Y H:i:s A");

        $time=date("y-m-d H:i:s");

        $imp=0;

        if(isset($_POST['imp'])){

            $imp=1;

        }

        // echo $title."".$content."".$time."".$imp;

        $updt_query="UPDATE `notes` SET `title`='$title',`content`='$content',`time`='$time',`important`='$imp' WHERE `user_id`='$user_id' AND `note_id`=$note_id";

        $updt_res=mysqli_query($conn,$updt_query);

        header('Location: dashboard.php');

    }

    if(isset($_POST['del'])){

        // if(isset($_POST['card_id'])){

        //     $note_id=$_POST['card_id'];

        // }

        $note_id=(isset($_POST['card_id']))?$_POST['card_id']:'';

        // $confirm= "<script type='text/javascript'>confirm('Are you sure you want to delete the note?');</script>";

        // echo $confirm;

        // if($confirm){

            $del_query="DELETE FROM `notes` WHERE `note_id`=$note_id";

            $del_res=mysqli_query($conn,$del_query);

            header("Location: dashboard.php");

    //     }

    //     else{



    //     }

    }

?>