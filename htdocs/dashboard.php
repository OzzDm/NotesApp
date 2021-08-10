<?php 

  session_start();

  $user_id=$_SESSION['user_id'];  

  // echo $user_id;
  if(empty($user_id)){
    echo "<script>alert('Login to continue...');
    location.href='logout.php';</script>";
  }

?>

  <!doctype html>

<html lang="en">

  <head>

  	<title>NotesApp</title>

    <meta charset="utf-8">

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="assets/css/style.css">

        

        <!-- CSS only -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      <style>

        #content .card textarea{

          height:50vh;

          width: 100%;

          border: 1px solid #ced4da;

          border-radius: 0.35rem;

          padding: .375rem .75rem;

          line-height: 1.5;

        }

        #content .card textarea:focus{

          outline:none;

          border: 1px solid #43B6ED;          

        }

      </style>

        

  </head>

  <body>

		

		<div class="wrapper d-flex align-items-stretch">

			<nav id="sidebar">

				<div class="custom-menu">

					<button type="button" id="sidebarCollapse" class="btn btn-primary">

	          <i class="fa fa-bars"></i>

	          <span class="sr-only">Toggle Menu</span>

	        </button>

        </div>

				<div class="p-4">

		  		<h1><a href="index.html" class="logo">Notes App<span>Create and Innovate</span></a></h1>

	        <ul class="list-unstyled components mb-5">

	          <li class="active">

	            <a href="" data-target="dashboard_card" class="try"><span class="fa fa-home mr-3"></span> Home</a>

	          </li>
            <br>
	          <li>

	              <a href="" data-target="writeNote" class="new_note"><span class="fa fa-user mr-3"></span> New note</a>

	          </li>
        <br>
	          <!-- <li>

              <a href="" data-target=""><span class="fa fa-briefcase mr-3"></span> Important</a>

	          </li>

	          <li>

              <a href="" data-target="index"><span class="fa fa-sticky-note mr-3"></span> Profile</a>

	          </li>

	          <li>

              <a href=""><span class="fa fa-suitcase mr-3"></span> Tasks</a>

	          </li>

	          <li>

              <a href=""><span class="fa fa-cogs mr-3"></span> Services</a>

	          </li> -->

	          <li>

              <a href="" id="logout"><span class="fa fa-paper-plane mr-3"></span> Log Out</a>

	          </li>

	        </ul>   

	      



	      </div>

    	</nav>



        <!-- Page Content  -->

      <div id="content" class="p-4 p-md-5 pt-5"></div>



		</div>



    <!-- JS, Popper.js, and jQuery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- <script>

        $(function(){

            $('.try').click(function(){

                $('#content').load('index.php');

            });

            

        });

        $(function(){

            $('.new_note').click(function(){

                $('#content').load('writeNote.php');

            });

        });

    </script> -->

    <!-- <script>

        function load_try(){

            document.getElementById("content").innerHTML='<object type="text/html" data="index.php" width="100%" height="100%"></object>';

        }

    </script> -->

    <script>
        
        $(document).ready(function(){

          $(window).on("load", function() {

            container.load('dashboard_card.php');

          });

        });

          var x='nav ul li a';

            var trigger=$(x),

            container=$('#content');

            trigger.on('click', function(){

                var $this =$(this)

                target=$this.data('target');

                container.load(target+'.php');               

                return false;

            }); 

            logging_out=$("#logout").on('click', function(){
              $(location).attr('href', 'logout.php');
            });
            

        // });

    </script>

    <script>

      $('#sidebarCollapse').on('click', function () {

      $('#sidebar').toggleClass('active');

  });

    </script>

  </body>

</html>