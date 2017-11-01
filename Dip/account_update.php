

<?php
    include_once("functions/functions.php");

    if(@!$_SESSION['customer_email']){

        echo "<script>alert('Прво најавете се на вашиот профил!')</script>";

        echo"<script>window.open('login.php','_self')</script>";

}else{
    
    @$user = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$user'";

    $run_customer = mysqli_query($con, $get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $c_id = $row_customer['customer_id'];
    $name = $row_customer['customer_name'];
    $lname = $row_customer['customer_lname'];
    $email = $row_customer['customer_email'];
    $c_pas = $row_customer['customer_pass'];
    $country = $row_customer['customer_country'];
    $city = $row_customer['customer_city'];
    $contact = $row_customer['customer_contact'];
    $address = $row_customer['customer_address'];
    $image = $row_customer['customer_image']

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
</head>

<body>

  
  <div class="wrapper">
     <div class="container" style="margin-top:10px;">    
        <div id="loginbox" style="margin-top:20px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" style="overflow-x: hidden;">
                    <div class="panel-heading">
                        <div class="panel-title">Update Account</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <form method="post" action="" class="form-horizontal" role="form">

                              <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Вашето име</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_name"  placeholder="Enter your Name" value="<?php echo $name ?>" />
                </div>
              </div>
            </div>

             <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Вашето презиме</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_lname"  placeholder="Enter your Last Name" value="<?php echo $lname ?>" />
                </div>
              </div>
            </div>


             <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Е-маил адреса</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_email" placeholder="Enter your Email" value="<?php echo $email ?>"/>
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
                  <input type="text" class="form-control" name="c_country"   placeholder="Enter your Country" value="<?php echo $country ?>" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Град</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_city"   placeholder="Enter your City" value="<?php echo $city ?>" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label  class="cols-sm-2 control-label">Контакт</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_contact"  placeholder="Enter your Contact" value="<?php echo $contact ?>" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Адреса</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="c_address"   placeholder="Enter your Address" value="<?php echo $address ?>" />
                </div>
              </div>
            </div>


            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-7">
                                        <button type="submit"  name="update" class="btn btn-info btn-lg btn-block"><i class="icon-hand-right"></i> Зачувај </button> 
                                    </div>
                                </div>

                                </div>

                          </form>
                
                      </div>
            </div>
        </div>
      </div>
 </div>   <!-- /#wrapper -->
</body>

</html>
<?php
    if(isset($_POST['update'])){

      $ip = getIp();

      $customer_id = $c_id;

      $c_name = $_POST['c_name'];
      $c_lname = $_POST['c_lname'];
      $c_email = $_POST['c_email'];
      $c_image = $_FILES['c_image']['name'];
      $c_image_tmp = $_FILES['c_image']['tmp_name'];
      $c_country = $_POST['c_country'];
      $c_city = $_POST['c_city'];
      $c_contact = $_POST['c_contact'];
      $c_address = $_POST['c_address'];

      move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

      $update_c = "update customers set customer_name='$c_name',customer_lname='$c_lname',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$customer_id'";

      $run_update = mysqli_query($con, $update_c);

      if($run_update){

        echo "<script>alert('Вашиот профил беше успешно обновен')</script>";
        echo "<script>window.open('account.php','_self')</script>";
      }else{
        echo "Има некој проблем во пополнувањето!";
      }


    }
  ?>

  <?php } ?>