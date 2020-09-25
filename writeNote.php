<?php 
    include("connect.php");
    session_start();
    $user_id=$_SESSION['user_id'];
    if(isset($_POST['edit'])){
        $card_id=$_POST['card_id'];
        $_SESSION['note_id']=$card_id;
        $edit=$_POST['edit'];
        // echo $edit;
        // echo $card_id;
        $sel_query="SELECT * FROM `notes` WHERE `note_id`='$card_id' AND `user_id`='$user_id'";
        $sel_res=mysqli_query($conn,$sel_query);
        $row=mysqli_fetch_array($sel_res);
    }
?>
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
    </head>
    <body>
        <div class="jumbotron-fluid myjumbotron">
            <div class="d-flex align-items-center">
                <div class="col-sm-12">
        <div class="card">
            <h5 class="card-header">Add a note here!</h5>
            <div class="card-body">
        <form action="writeNote_back.php" method="POST">
            <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php if(isset($row["title"])){ echo $row['title']; } else{ echo ""; }?>" required>
            </div>
            <div class="form-group" id="mytextarea">
            <textarea rows="15" cols="150" name="content" id="note-textarea" placeholder="Add the content here..." required><?php if(isset($row["content"])){ echo $row['content']; } else{ echo ""; } ?></textarea>
            </div>
            <br>
            <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="imp" name="imp">            
            <label for="imp">Mark as important</label>
            </div>
            <!-- <input type="text" name="time" value="<?php ?>" hidden> -->
            <button type="submit" name="<?php echo $button_role=(isset($_POST['edit']))?'edit':'add'?>">Add Note</button>
            <!--Voice recognition-->
            <button type="button" id="start-record-btn" title="Start Recording">Start Recognition</button>
            <button type="button" id="pause-record-btn" title="Pause Recording">Pause Recognition</button>
            <!-- <button id="save-note-btn" title="Save Note">Save Note</button>    -->
            <p id="recording-instructions">Press the <strong>Start Recognition</strong> button and allow access.</p>
            <!--Voice recognition-->
        </form>
            </div>
        </div>
        </div>
</div>
</div>
<script src="assets/js/script.js"></script>
<script>
    // $('#textarea').on('change keyup keydown paste cut', 'textarea', function () {
    //     $(this).height(0).height(this.scrollHeight);
    //     // console.log(this.scrollHeight);
    // }).find('textarea').change();

//     window.setTimeout( function() {
//     $("#textarea").height( $("textarea")[0].scrollHeight );
// }, 1);

// $(function () {
//     $("textarea").each(function () {
//         this.style.height = (this.scrollHeight+10)+'px';
//     });
// });
</script>
    </body>
</html>