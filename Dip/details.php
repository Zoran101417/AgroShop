<?php 

session_start();
include_once("functions/functions.php") 

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
    <link href="css/produkti.css" rel="stylesheet">
    <link href="css/fbnavbar.css" rel="stylesheet">
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
<header class="image-height">
        <img class="img-responsive" src="images/detban.jpg">
</header>

    <div id="wrapper">
 
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="produkti.php">
                        Производи
                    </a>
                </li>
                <?php  getProductsSidebar(); ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
      <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <a href="#menu-toggle" class="visible-xfs" id="menu-toggle"><span class="glyphicon glyphicon-chevron-left"> Производи</span></a>
                       
       
      <?php

      if(isset($_GET['pro_id'])){

        $products_id = $_GET['pro_id'];

      $get_pro = "select * from products where products_id='$products_id'";

      $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro=mysqli_fetch_array($run_pro)) {
      $pro_id = $row_pro['products_id'];
      $pro_title = $row_pro['products_title'];
      $pro_price = $row_pro['products_price'];
      $pro_image = $row_pro['products_image'];
      $pro_desc = $row_pro['products_desc'];
      

    echo "
<div class='container'>      
<div class='card'>
      <div class='container-fliud'>
        <div class='wrapper row'>
          <div class='preview col-md-6'>
            
            <div class='preview-pic tab-content'>
              <div class='tab-pane active' id='pic-1'><img src='$pro_image' class='img-responsive thumbnail'/></div>
              
            </div>  
          </div>
          <div class='details col-md-6'>
            <h3 class='product-title'>$pro_title</h3>
            <div class='rating'>
              <div class='stars'>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>
              </div>
              <span class='review-no'>41 reviews</span>
            </div>
            <p class='product-description'>$pro_desc</p>
            <h4 class='price'>Цена: $pro_price ден./кг. </h4>
            
            <div class='action'>
              <a href='index.php?pro_id=$pro_id'><button class='add-to-cart btn btn-default' type='button'>add to cart</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    ";
  }
 }
?>

                    </div>
                </div>
            </div>

<!-- Fixed footer -->


        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <!-- /#wrapper -->
      <div class="sticky-container">
    <ul class="sticky">
      <li>
        <img width="32" height="32" title="" alt="" src="img/fb1.png" />
        <p>Facebook</p>
      </li>
      <li>
        <img width="32" height="32" title="" alt="" src="img/tw1.png" />
        <p>Twitter</p>
      </li>
      <li>
        <img width="32" height="32" title="" alt="" src="img/pin1.png" />
        <p>Pinterest</p>
      </li>
      <li>
        <img width="32" height="32" title="" alt="" src="img/li1.png" />
        <p>Linkedin</p>
      </li>
      <li>
        <img width="32" height="32" title="" alt="" src="img/tm1.png" />
        <p>Tumblr</p>
      </li>
      <li>
        <img width="32" height="32" title="" alt="" src="img/wp1.png" />
        <p>WordPress</p>
      </li>
    </ul>
  </div>
    
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
