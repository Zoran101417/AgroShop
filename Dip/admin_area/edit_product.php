<?php include_once("../functions/functions.php");
  

if(isset($_GET['edit_product'])){

    $get_id = $_GET['edit_product'];

    $get_pro ="select * from products where products_id='$get_id'";

    $run_pro = mysqli_query($con, $get_pro);
    
    $i=0;
    
        $row_pro = mysqli_fetch_array($run_pro);
        $pro_id = $row_pro['products_id'];
        $pro_title = $row_pro['products_title'];
        $pro_image = $row_pro['products_image'];
        $pro_price = $row_pro['products_price'];
        $pro_desc = $row_pro['products_desc'];
        $pro_keywords = $row_pro['products_keywords'];
        $pro_cat = $row_pro['products_cat'];

        $get_cat = "select * from categories where cat_id='$pro_cat'";

        $run_cat = mysqli_query($con, $get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $category_title = $row_cat['cat_title'];
}
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
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Почетна</a>
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
                        <h2 class="page-header">Достапни производи</h2>
                    </div>
                </div>

                <div class="col-lg-8">
                        
                       <form action="" method="post" enctype="multipart/form-data" style="background-color: pink;">
    
    <table align="center" width="795" border="2" bgcolor="#274E34">
        
        <tr align="center">
            <td colspan="7" ><h2>Edit & Update Product</h2></td>
        </tr>

        <tr>
            <td align="right"><b>Product Title:</b></td>
            <td><input type="text" name="product_title" size="60" value="<?php echo $pro_title; ?>" /></td>
        </tr>
        <tr>
            <td align="right" ><b>Product Category:</b></td>
            <td>
                <select name="product_cat">
                    <option><?php echo $category_title; ?></option>
                        <?php
                            $get_cats = "select * from categories";

                            $run_cats = mysqli_query($con, $get_cats);

                            while ($row_cats = mysqli_fetch_array($run_cats)){

                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];

                        echo "<option value='$cat_id'>$cat_title</option>";
                            }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right" ><b>Product Image:</b></td>
            <td><input type="file" name="product_image" style="color:white;"/><img src="<?php echo $pro_image; ?>" width="60" height="60"></td>
        </tr>
        <tr>
            <td align="right" ><b>Product Price:</b></td>
            <td><input type="text" name="product_price"  value="<?php echo $pro_price; ?>" /></td>
        </tr>
        <tr>
            <td align="right" ><b>Product Description:</b></td>
            <td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc; ?></textarea></td>
        </tr>
        <tr>
            <td align="right" ><b>Product Keywords:</b></td>
            <td><input type="text" name="product_keywords" size="50"  value="<?php echo $pro_keywords; ?>" /></td>
        </tr>
        <tr align="center">
            <td colspan="7"><input type="submit" name="update_product" value="Update Product" /></td>
        </tr>
    </table>

    </form>
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
<?php

    if(isset($_POST['update_product'])){

        //getting the text data from the fields

        $update_id = $pro_id;

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        //getting the text data from the fields
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp,"images/products/$product_image");

        $update_product = "update products set product_cat='$product_cat',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id'";;

        $run_product = mysqli_query($con, $update_product);

        if($run_product){

            echo "<script>alert('Product has been updated!')</script>";

            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
?>