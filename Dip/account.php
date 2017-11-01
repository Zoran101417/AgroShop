<?php 
session_start();

include_once("functions/functions.php"); 

include_once("contact.php");
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AgroShop - Продавница за земјоделски производи</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">AgroShop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Почетна</a></li>
        <li class="dropdown">
          <a href="produkti.php" class="dropdown-toggle" data-toggle="dropdown">Продукти <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="zelencuk.php">Зеленчук</a></li>
            <li class="divider"></li>
            <li><a href="ovosje.php">Овошје</a></li>
            <li class="divider"></li>
            <li><a href="jatkasti.php">Јаткасти плодови</a></li>
          </ul>
        </li>
        <li><a href="#" data-toggle="modal" data-target="#myModal">Контакт</a>
        </li>
      </ul>
      <form class="navbar-form navbar-right">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Пребарај">
      </div>
      <button type="submit" class="btn btn-default">Пребарај</button>
    </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> <?php 
    if(isset($_SESSION['customer_email'])){
      echo  $_SESSION['customer_email'] ;
    }
    else{
      echo "Вашиот профил";
    }
    ?></a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Најави се</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
  
     <div id="wrapper">
 
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="margin-top: 50px;">
                    <a href="account.php">
                       <?php 
                       @$user = $_SESSION['customer_email'];

                $get_img = "select * from customers where customer_email='$user'";

                $run_img = mysqli_query($con, $get_img);

                $row_img = mysqli_fetch_array($run_img);  

                $c_name = $row_img['customer_name'];

                       echo $c_name;
                       ?>
                    </a>
                </li>
                <li>
                <?php

                @$user = $_SESSION['customer_email'];

                $get_img = "select * from customers where customer_email='$user'";

                $run_img = mysqli_query($con, $get_img);

                $row_img = mysqli_fetch_array($run_img);

                $c_image = $row_img['customer_image'];

                $c_name = $row_img['customer_name'];

                echo "
                       <img src='customer/customer_images/$c_image' style='width: 190px; height: 200px; margin-bottom: 15px; borders: ''>";

                     
                
               ?>
               </li>
               <li>
                 <a href="">Мои Нарачки</a>
               </li>
               <li>
                 <a href="account.php?account_update">Измени профил</a>
               </li>
               <li>
                 <a href="account.php?change_pass">Промени лозинка</a>
               </li>
               <li>
                 <a href="logout.php">Одјави се</a>
               </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-lg-12">
                    <a href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-chevron-left"> </span></a>
                       
                       <?php 
        if(isset($_GET['account_update'])){
          include("account_update.php");

        }
        if(isset($_GET['change_pass'])){
          include("change_pass.php");

        }

            
      ?>
              

                    </div>
                </div>
            </div>

<!-- Fixed footer -->


        </div>
        <!-- /#page-content-wrapper -->

    </div>  <!-- /#wrapper -->

    
 <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
       <!-- Modal content-->
     <div class="modal-content">
          <div class="form-horizontal" role="form">
          <div class="modal-header">
            <h4>Contact</h4>
          </div>
             <form id="contactform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
      <?php
        if($sent == true) {
          echo "<h2 class='success'>Ви благодариме за пораката, ќе ве контактираме во најскоро време</h2>";
        }elseif(@hassError === true) {
          echo '<ul class="errorlist">';
          foreach($errorArray as $key => $val) {
            echo "<li>" . ucfirst($key) . " field error - $val</li>";
          }
          echo '</ul>';
        }
    ?> 
          <div class="modal-body">

          <div class="form-group" style="margin-right:15px; margin-left: 15px;">
              <label class="cols-sm-2 control-label">Вашето име</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name"  value="<?php echo (isset($name) ? $name : ""); ?>" placeholder="First Name"/>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Вашето презиме</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="lname"  value="<?php echo (isset($lname) ? $lname : ""); ?>" placeholder="Last Name"/>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Е-маил адреса</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email"  value="<?php echo (isset($email) ? $email : ""); ?>" placeholder="Enter your Email"/>
                </div>
              </div>
            </div>

             <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Порака</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-comment" aria-hidden="true"></i></span>
                  <textarea name="message" class="form-control" rows="4" placeholder="Message"><?php echo (isset($message) ? $message : ""); ?></textarea>
                </div>
              </div>
            </div>


          <div class="modal-footer">
            <a class="btn btn-primary" data-dismiss="modal">Close</a>
            <button type="submit" name="submitform" class="btn btn-primary">Sent</button>
          </div>
         </form>
        </div>
    </div>
  </div>
    <!--/Modal -->
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/contactform.js"></script>
    <script src="js/imageupload.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

       $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });

    </script>

</body>

</html>
