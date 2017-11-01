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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>


<?php
  
	$con = mysqli_connect("localhost","root","","diplomska");
  mysqli_set_charset($con,"UTF8");
  
if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

//getting the user ip addres
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
// produkti random

function getProducts() {

    global $con;

    $get_pro = "select * from products order by RAND() LIMIT 12";

    $run_pro= mysqli_query($con, $get_pro);

    while ($row_pro=mysqli_fetch_array($run_pro)) {
    $pro_id = $row_pro['products_id'];
    $pro_cat = $row_pro['products_cat'];
    $pro_title = $row_pro['products_title'];
    $pro_price = $row_pro['products_price'];
    $pro_image = $row_pro['products_image'];
    
 echo "

      <div id='single_product'>

        <h3>$pro_title</h3>
        <a href='details.php?pro_id=$pro_id'><img class='img-responsive thumbnail hvr-float-shadow' src='$pro_image' width='180' height='180' /></a>

        <p><b>Цена: $pro_price ден./кг.</b></p>

        <a href='details.php?pro_id=$pro_id'  data-toogle='tooltip' title='Информации' style='float:left;'><button type='button' class='hvr-float-shadow btn btn-default btn-sm'>
          <span class='glyphicon glyphicon-info-sign'></span> Info
        </button></a>
        
        <a href='index.php?add_cart=$pro_id'><button type='button' class='hvr-float-shadow btn btn-default btn-sm' data-toogle='tooltip' title='Додај во кошничка' style='float:right;'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button></a>
      </div>

    ";
  }

  }



//getting the categories ;) :/
  function getCats() {

  	global $con;

  	$get_cats = "select * from categories";

  	$run_cats = mysqli_query($con, $get_cats);

  	while ($row_cats = mysqli_fetch_array($run_cats)){

  		$cat_id = $row_cats['cat_id'];
  		$cat_title = $row_cats['cat_title'];

  		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
  	}

  }

//getting the Nuts
 
 function getNuts(){


  global $con;

  $get_cat_pro = "select * from products where products_cat=3 order by RAND()";

  $run_cat_pro = mysqli_query($con, $get_cat_pro);

  $count_cats = mysqli_num_rows($run_cat_pro);

  while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
    $pro_id = $row_cat_pro['products_id'];
    $pro_cat = $row_cat_pro['products_cat'];
    $pro_title = $row_cat_pro['products_title'];
    $pro_price = $row_cat_pro['products_price'];
    $pro_image = $row_cat_pro['products_image'];
    
 echo "

      <div id='single_product'>

        <h3>$pro_title</h3>
        <a href='details.php?pro_id=$pro_id'><img class='img-responsive thumbnail hvr-float-shadow' src='$pro_image' width='180' height='180' /></a>

        <p><b>Цена: $pro_price ден./кг.</b></p>

        <a href='details.php?pro_id=$pro_id'  data-toogle='tooltip' title='Информации' style='float:left;'><button type='button' class='hvr-float-shadow btn btn-default btn-sm'>
          <span class='glyphicon glyphicon-info-sign'></span> Info
        </button></a>
        
        <a href='cartAction.php?action=addToCart&id=<?php echo $pro_id; ?>'><button type='button' class='hvr-float-shadow btn btn-default btn-sm' data-toogle='tooltip' title='Додај во кошничка' style='float:right;'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button></a>
      </div>

    ";
  }

 }



//getting the Fruits
 
 function getFruits(){


  global $con;

  $get_cat_pro = "select * from products where products_cat=2 order by RAND()";

  $run_cat_pro = mysqli_query($con, $get_cat_pro);

  $count_cats = mysqli_num_rows($run_cat_pro);

  while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
    $pro_id = $row_cat_pro['products_id'];
    $pro_cat = $row_cat_pro['products_cat'];
    $pro_title = $row_cat_pro['products_title'];
    $pro_price = $row_cat_pro['products_price'];
    $pro_image = $row_cat_pro['products_image'];
    
 echo "

      <div id='single_product'>

        <h3>$pro_title</h3>
        <a href='details.php?pro_id=$pro_id'><img class='img-responsive thumbnail hvr-float-shadow' src='$pro_image' width='180' height='180' /></a>

        <p><b>Цена: $pro_price ден./кг.</b></p>

        <a href='details.php?pro_id=$pro_id'  data-toogle='tooltip' title='Информации' style='float:left;'><button type='button' class='hvr-float-shadow btn btn-default btn-sm'>
          <span class='glyphicon glyphicon-info-sign'></span> Info
        </button></a>
        
        <a href='index.php?add_cart=$pro_id'><button type='button' class='hvr-float-shadow btn btn-default btn-sm' data-toogle='tooltip' title='Додај во кошничка' style='float:right;'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button></a>
      </div>

    ";
  }

 }

//getting the Vegetables
 
 	
 function getVegetables(){


 	global $con;

 	$get_cat_pro = "select * from products where products_cat=1 order by RAND()";

 	$run_cat_pro = mysqli_query($con, $get_cat_pro);

 	$count_cats = mysqli_num_rows($run_cat_pro);

 	while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
 		$pro_id = $row_cat_pro['products_id'];
 		$pro_cat = $row_cat_pro['products_cat'];
 		$pro_title = $row_cat_pro['products_title'];
 		$pro_price = $row_cat_pro['products_price'];
 		$pro_image = $row_cat_pro['products_image'];
 		
 echo "

      <div id='single_product'>

        <h3>$pro_title</h3>
        <a href='details.php?pro_id=$pro_id'><img class='img-responsive thumbnail hvr-float-shadow' src='$pro_image' width='180' height='180' /></a>

        <p><b>Цена: $pro_price ден./кг.</b></p>

        <a href='details.php?pro_id=$pro_id'  data-toogle='tooltip' title='Информации' style='float:left;'><button type='button' class='hvr-float-shadow btn btn-default btn-sm'>
          <span class='glyphicon glyphicon-info-sign'></span> Info
        </button></a>
        
        <a href='index.php?add_cart=$pro_id'><button type='button' class='hvr-float-shadow btn btn-default btn-sm' data-toogle='tooltip' title='Додај во кошничка' style='float:right;'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button></a>
      </div>

    ";
 	}

 }

// produkti-products-sidebar

  function getProductsSidebar() {

    global $con;

    $get_prodz = "select * from products order by RAND() LIMIT 14";

    $run_prodz = mysqli_query($con, $get_prodz);

    while ($row_prodz = mysqli_fetch_array($run_prodz)){

      $prodz_id = $row_prodz['products_id'];
      $prodz_title = $row_prodz['products_title'];

      echo "<li><a href='details.php?pro_id=$prodz_id'</a>$prodz_title</li>";
    }

  }
 
 
?>
<script>$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});</script>
</body>
</html>