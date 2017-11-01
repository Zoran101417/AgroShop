<?php 

include_once("functions/functions.php"); 

if(@!$_SESSION['customer_email']){

        echo "<script>alert('Прво најавете се на вашиот профил!')</script>";

        echo"<script>window.open('login.php','_self')</script>";

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
 
</head>

<body>

  
   <div class="wrapper">
     <div class="container" style="margin-top:10px;">    
        <div id="changepass" style="margin-top:20px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Change Password</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <form method="post" action="" class="form-horizontal" role="form">

                              <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Сегашна лозинка</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="current_pass" placeholder="Enter Current Password" required="true" />
                </div>
              </div>
            </div>


            <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Нова лозинка</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="new_pass" placeholder="Enter New Password" required="true" />
                </div>
              </div>
            </div>

            <div class="form-group" style="margin:15px;">
              <label class="cols-sm-2 control-label">Потврди нова Лозинка</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="new_again"  placeholder="Enter New Password Again" required="true" />
                </div>
              </div>
            </div>


            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-7">
                                        <button type="submit"  name="change_pass" class="btn btn-info btn-lg btn-block"><i class="icon-hand-right"></i> Промени Лозинка </button> 
                                    </div>
                                </div>

                                </div>

                          </form>
                
                      </div>
            </div>
        </div>
      </div>
 </div>     <!-- /#wrapper -->


</body>

</html>
<?php
    
    $user = $_SESSION['customer_email'];
    
    if(isset($_POST['change_pass'])){

      $c_pass = $_POST['current_pass'];
      $n_pass = $_POST['new_pass'];
      $n_again = $_POST['new_again'];

      $sel_pass = "select * from customers where customer_pass='$c_pass' AND customer_email='$user'";

      $run_pass = mysqli_query($con, $sel_pass);

      $check_pass = mysqli_num_rows($run_pass);

      if($check_pass==0){

        echo "<script>alert('Вашата сегашна лозинка е грешка!')</script>";
        exit();
      }
      if($n_pass!=$n_again){

        echo "<script>alert('Лозинките не се совпаѓаат!')</script>";
        exit();
      }
      else {

        $update_pass = "update customers set customer_pass='$n_pass' where customer_email='$user'";

        $run_update = mysqli_query($con, $update_pass);

        echo "<script>alert('Вашата лозинка беше успешно променета')</script>";
        echo "<script>window.open('account.php','_self')</script>";
      }

    }
?>
<?php }
?>