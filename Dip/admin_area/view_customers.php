<?php include_once("../functions/functions.php") ?>

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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="wrapper">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"> AgroShop</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Администратор <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
             <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Почетна</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#kategorija"><i class="glyphicon glyphicon-th-list"></i> Категории<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="kategorija" class="collapse">
                          <li>
                            <a href="view_categori.php">Види категории</a>
                          </li>
                          <li>
                            <a href="insert_categori.php">Додај нова категорија</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:'" data-toggle="collapse" data-target="#proizvodi"><i class="glyphicon glyphicon-apple"></i> Производи<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="proizvodi" class="collapse">
                          <li>
                            <a href="view_products.php">Види производи</a>
                          </li>
                          <li>
                            <a href="insert_product.php">Додај нов производ</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Корисници</a>
                    </li>      
                </ul>
            </div>
  </nav>

  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-xs-4 col-lg-12">
                        <h2 class="page-header" align="centerr">Достапни категории</h2>
                    </div>
                </div>

                <div class="col-lg-8">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Бр.</th>
                                        <th>Име</th>
                                        <th>Презиме</th>
                                        <th>Слика</th>
                                        <th>Избришај</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
    

    $get_cus ="select * from customers";

    $run_cus = mysqli_query($con, $get_cus);

    $i=0;

    while($row_cus=mysqli_fetch_array($run_cus)){

        $cus_id = $row_cus['customer_id'];
        $cus_name = $row_cus['customer_name'];
        $cus_lname = $row_cus['customer_lname'];
        $cus_image = $row_cus['customer_image'];
        $i++;

        ?>
    <tr align="center">
        <td style="padding-top: 35px;"><?php echo $i; ?></td>
        <td style="padding-top: 35px;"><?php echo $cus_name; ?></td>
        <td style="padding-top: 35px;"><?php echo $cus_lname; ?></td>
        <td><img src="../customer/customer_images/<?php echo $cus_image; ?>" width="80" height="80" /></td>
        <td style="padding-top: 35px;"><a href="delete_customer.php?delete_customer=<?php echo $cus_id; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
    <?php 
    }
     ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

    </div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    
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
