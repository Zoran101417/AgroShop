<?php 

session_start();
include_once("functions/functions.php"); 


if(@$_SESSION['customer_email']){

        echo "<script>alert('Веќе се имате најавено!')</script>";

        echo"<script>window.open('account.php','_self')</script>";

}else{
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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Логирај се</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
  
  <div class="wrapper">
            <div class="container" style="margin-top:50px;">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#" onClick="$('#loginbox').hide(); $('#signupbox').hide(); $('#Forgotpassword').show()">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form method="post" action="" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="pass" placeholder="password">
                                    </div>
                                    


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit"  name="login" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Login</button> 
                                    </div>
                                </div>

                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Не сте регистрирани?
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>


        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info" style="overflow-x: hidden;">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#Forgotpassword').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form method="post" action="" id="signupform" class="form-horizontal" role="form" enctype="multipart/form-data">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Вашето име</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_name"  placeholder="Enter your Name" required="true" />
                </div>
              </div>
            </div>

             <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Вашето презиме</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_lname"  placeholder="Enter your Last Name" required="true" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Е-маил адреса</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_email" placeholder="Enter your Email" required="true"/>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Вашата лозинка</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="c_pass" placeholder="Enter your Password" required="true"/>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Потврдете ја лозинката</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="c_again"   placeholder="Confirm your Password" required="true"/>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Слика</label>
              <div class="cols-sm-10">
                 <input id="fileUpload" multiple="multiple" type="file" name="c_image" /> 
                <div id="image-holder" ></div>
              </div>
            </div>
            
            

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Држава</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-flag" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_country"   placeholder="Enter your Country" required="true" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Град</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_city"   placeholder="Enter your City" required="true" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Контакт</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_contact"  placeholder="Enter your Contact" required="true" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Адреса</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_address"   placeholder="Enter your Address" required="true" />
                </div>
              </div>
            </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit"  name="register" class="btn btn-info"><i class="icon-hand-right"></i> Регистрирај се</button> 
                                    </div>
                                </div>

                                </div>

                            </form>
                         </div>
                    </div>

               
               
                
         </div> 

  <div id="Forgotpassword" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Retrieve your password</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show(); $('#Forgotpassword').hide()">Sign In</a></div>
                        </div>  
                         <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="Forgotpassword-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="Forgotpassword" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Enter your username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa"></i></span>
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email">
                                    </div>
                                    


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <a id="btn-login" href="#" class="btn btn-success">Send </a>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Не сте регистрирани?
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                 
                    </div>


       </div>
    
    </div>

  </div>

    <!-- /#wrapper -->

    
 <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
       <!-- Modal content-->
     <div class="modal-content">
          <div class="form-horizontal" role="form">
          <div class="modal-header">
            <h4>Contact</h4>
          </div>
          <div class="modal-body">

          <div class="form-group" style="margin-right:15px; margin-left: 15px;">
              <label for="name" class="cols-sm-2 control-label">Вашето име</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="First Name"/>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label for="name" class="cols-sm-2 control-label">Вашето презиме</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Last Name"/>
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label for="email" class="cols-sm-2 control-label">Е-маил адреса</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                </div>
              </div>
            </div>

             <div class="form-group" style="margin:15px;">
              <label for="email" class="cols-sm-2 control-label">Порака</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                </div>
              </div>
            </div>


          <div class="modal-footer">
            <a class="btn btn-primary" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary">Sent</button>
          </div>
         
        </div>
    </div>
  </div><!--/Modal -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/imageupload.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

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

<?php


 if(isset($_POST['login'])){

    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];

    $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

    $run_c = mysqli_query($con, $sel_c);

    $check_customer = mysqli_num_rows($run_c);

    if($check_customer==0){

      echo "<script>alert('Password or email is incorrect, plz try again')</script>";
      
      exit();
    }
      else {

        $ip = getIp();

        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('You logged in succesfuly, Thanks!')</script>";

        echo"<script>window.open('account.php','_self')</script>";
      }

  }

?>

<?php
    if(isset($_POST['register'])){

      $ip = getIp();

      $c_name = $_POST['c_name'];
      $c_lname = $_POST['c_lname'];
      $c_email = $_POST['c_email'];
      $c_pass = $_POST['c_pass'];
      $c_again = $_POST['c_again'];
      $c_image = $_FILES['c_image']['name'];
      $c_image_tmp = $_FILES['c_image']['tmp_name'];
      $c_country = $_POST['c_country'];
      $c_city = $_POST['c_city'];
      $c_contact = $_POST['c_contact'];
      $c_address = $_POST['c_address'];

      move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

       if($c_pass!=$c_again){

        echo "<script>alert('Лозинките не се совпаѓаат!')</script>";
        echo"<script>window.open('login.php','_self')</script>";
      }else {
        $_SESSION['customer_email']=$c_email;

      $insert_c = "insert into customers (customer_ip,customer_name,customer_lname,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

      $run_c = mysqli_query($con, $insert_c);

        echo "<script>alert('Account has been created successful')</script>";

        echo"<script>window.open('account.php','_self')</script>";
      }
    }
  ?>

<?php
}
?>