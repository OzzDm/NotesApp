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

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="assets/css/landing.css" rel="stylesheet">
        
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg bg-transparent  navbar-light">
            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbarTogglerDemo02">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-white" href="javascript:void(0);" onclick="scrollToLogin();">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contact us</a>
                </li>                
            </ul>
            </div>
        </nav>
        <!--Navbar ends-->
        <!-- Home section -->
        <div class="jumbotron home_section" id="home_section">
            <div class="row">
                <div class="col-md-3 notebook">
                    <img src="assets/img/notes.svg" width=80% height=80%>
                </div>
                <div class="col-md-5 col-sm-12 text-center">
                    <h1 class="display-4">Online Notes App</h1>
                    <p class="lead">Your notes with you wherever you go.<br>Easy to use. So grab now!</p>
                    <button class="btn text-white btn-lg" onclick="scrollTosignUp()">Sign up for free</button>
                </div>
                <div class="col-md-4 ideas">
                <img src="assets/img/random_thoughts.svg" width="100%" height="100%">
                </div>
            </div>
        </div>
        <!-- Home section ends-->
        
        <!-- Login section -->
        <div id="login_section" class="login_section">
            <div class="container">
            <div class="col-md-5 offset-md-6">
            <form method="POST" class="text-center" action='index_back.php'>
                <div class="form-group">
                <input type='text' name='username' placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type='password' name='pwd' placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type='checkbox' name='remember' id='remember'>
                <label for="remember">Remember me</label>
            </div>
            
                <button type='submit' name='login'>Login</button>
                <!-- <input type='submit' value='login'> -->
                <br>
                <!-- <a>Register</a> -->
                <a>Forgot password?</a>
            </form>
            </div>
        </div>
        </div>
        <!-- Login section ends-->
        <!-- signUp section -->        
            <div id="signUp_section" class="signUp_section">
                <div class="container d-flex justify-content-center">
            <div class="card" data-aos="flip-left">
                <div class="card-body text-center">
                    <h1 class="card-title text-white">Register now!</h1>
                    <br>
                <form method="POST" action='index_back.php' id='signupform'>
                    <div class="form-group">
                    <input type='text' name='username' id='username' placeholder="Username" required>
                    </div>
                    <div class="form-group">
                    <input type='email' name='emailid' id='emailid' placeholder="Email ID" required>
                    </div>
                    <div class="form-group">
                    <input type='password' name='pwd' id='pwd' placeholder="Password" required>
                    </div>
                    <div class="form-group">
                    <input type='password' name='confirm_pwd' id='confirm_pwd' placeholder="Confirm Password" required>
                    </div>
                    <!-- <input type='submit' name='sign_up' id='sign_up'> -->
                    <button type="submit" name='sign_up'>Sign up</button>
                    <!-- Sign up</button> -->
                </form>
                </div>
            </div>
            </div>
        </div>
        <!-- signUp section ends-->
    </body>
    <script>
        function scrollToLogin(){
            window.scrollTo(0,document.getElementById('home_section').scrollHeight);
        }
        function scrollTosignUp(){
            document.getElementById('signUp_section').style.display="block";
            window.scrollTo(0,2*document.getElementById('login_section').scrollHeight);
        }
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>