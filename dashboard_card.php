<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible">
    <title>NotesApp</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="assets/css/landing.css" rel="stylesheet">
    <style>
        .custom_btn{
            position:fixed;
            right: 20px;
            bottom:20px;
            z-index: 10;
            background-color: #3445B4;
            cursor: pointer;
        }
        .fa-pen,.fa-trash-alt{
            font-size: large;
        }
        .fa-pen{
            color:blue;
        }
        .fa-trash-alt:hover{
            color:red;
            font-size: large;
        }
    </style>
</head>

<body>
    <?php 
        include("connect.php");
        session_start();
        $user_id=$_SESSION['user_id'];
        $sel_query="SELECT * FROM `notes` WHERE `user_id`='$user_id'";
        $sel_res=mysqli_query($conn,$sel_query);
        
        $row=mysqli_num_rows($sel_res);
       
    ?>

    <button type="button" class="btn btn-lg text-white rounded-circle custom_btn" name="add_note" title="Add a new note" data-target="writeNote" id="add_note"><i class="fas fa-plus"></i></button>
    
    <div class="jumbotron-fluid">
        <!-- <div class="row row-cols-1 row-cols-md-3"> -->
            <div class="card-columns">
            <?php 
                if($row>0){
                    while($notes_arr=mysqli_fetch_assoc($sel_res)){
            ?>
            <div class="col mb-4" id="add_card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <div class="mb-1 text-muted"><?php echo date('M j, Y H:i',strtotime($notes_arr['time'])); ?></div>
                        <!-- <i class="fas fa-xs fa-circle"></i> -->
                        <?php if($notes_arr['important']==1){?>
                        <i class="fas fa-star text-warning"></i>
                        <?php } ?>
                        </div>
                        <h5 class="card-title"><?php echo $notes_arr['title'];?></h5>
                        <!-- <strong class="d-inline-block mb-2 text-success">NSS</strong> -->
                        <p class="card-text"><?php echo $notes_arr['content'];?></p>
                        <div class="d-flex justify-content-between">
                            <!-- <form action="writenote.php" id="edit_form" class="edit_form" method="POST"> -->
                                <!-- <input type="hidden" name="card_id" id="card_id" value="<?php //echo $notes_arr['note_id']; ?>"> -->
                                <button type="submit" class="text-muted bg-transparent border-0 edit" name="edit" id="edit.<?php echo $notes_arr['note_id'];?>" title="edit"><i class="fas fa-pen"></i></button>
                            <!-- </form> -->
                            <form action='writeNote_back.php' method="POST" onsubmit="return confirm_deletion()">
                                <input type="hidden" name="card_id" value="<?php echo $notes_arr['note_id']; ?>">
                                <button type="submit" class="text-muted bg-transparent border-0" title="delete" id="del" name="del">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                    <?php
                     }
                        }else{
                            echo 'No notes added';
                        }
                    ?>
        </div>
    </div>
    <script>
        // $(document).ready(function(){
            var trigger3=$('#add_note');
            // var trigger2=$('form.edit_form').removeAttr('action');
            var trigger2=$('.edit');
            // alert(trigger2.attr('action'));

            trigger3.on('click', function(){
                var $this =$(this)
                target=$this.data('target');
                container.load(target+'.php');               
                return false;
            });  
            trigger2.on('click',function(){
                // var $this =$(this)
                // target=$this.data('target');
                // str1=$('#card_id').val();
                // alert(str1);
                // str2=$('#edit').val();
                var str1= $(this).attr('id');
                var str2=str1.split('.');
                var str3=str2[1];
                // alert(str3);
                container.load('writeNote.php',{'card_id':str3,'edit':'edit'});               
                return false;       
        });
        // });
    </script>
    <script>
        function confirm_deletion(){
            if(confirm("Are you sure you want to delete the note?")===true)
            {
                return true;
            }
            else{ return false; }
            
        }
    </script>
</body>

</html>