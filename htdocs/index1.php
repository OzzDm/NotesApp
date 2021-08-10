<?php
session_start();
include('connect.php');

//rememberme
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8' name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible">
        <title>Notes App</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </head>
    <body>
        <div>
            <button>Sign in</button>
            <!-- <form method="POST">
                <button type="submit" name="signup">Sign up for free</button>
            </form> -->
        </div>
        <!-- <script type="text/javascript" src="index.js"></script> -->
        <div>
            <form method="POST" action='index_back.php' id='signupform'>
                <input type='text' name='username' id='username' placeholder="Username">
                <input type='email' name='emailid' id='emailid' placeholder="Email ID">
                <input type='password' name='pwd' id='pwd' placeholder="Password">
                <input type='password' name='confirm_pwd' id='confirm_pwd' placeholder="Confirm Password">
                <!-- <input type='submit' name='sign_up' id='sign_up'> -->
                <button type="submit" name='sign_up'>Sign up</button>
                <!-- Sign up</button> -->
            </form>


        </div>

        <div>
            <form method="POST" action='index_back.php'>
                <input type='text' name='username' placeholder="Username">
                <input type='password' name='pwd' placeholder="Password">
                <input type='checkbox' name='remember'>
                <button type='submit' name='login'>Login</button>
                <!-- <input type='submit' value='login'> -->
                <a>Register</a>
                <a>Forgot password?</a>
            </form>
        </div>
        <!-- <script src="index.js"></script> -->
    </body>
</html>