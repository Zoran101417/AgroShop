<?php
mysqli_set_charset($con,"UTF8");
$hasError = false;
$sent = false;

require_once 'lib/PHPMailerAutoload.php';

if(isset($_POST['submitform'])) {
  $name = trim(htmlspecialchars($_POST['name'], ENT_QUOTES));
  $lname = trim(htmlspecialchars($_POST['lname'], ENT_QUOTES));
  $email = trim($_POST['email']);
  $message = trim(htmlspecialchars($_POST['message'], ENT_QUOTES));

  $fieldsArray = array(
    'name' => $name,
    'lname' => $lname,
    'email' => $email,
    'message' => $message
  );

  $errorArray = array();

  foreach ($fieldsArray as $key => $val) {
    switch ($key) {
      case 'name':
      case 'lname';
      case 'message':
        if (empty($val)) {
          $hasError = true;
          $errorArray[$key] = ucfirst($key) . "полето е празно.";
        }
        break;
      case 'email':
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $hasError = true;
          $errorArray[$key] = "Invalid Email Address entered";
        }else{
          $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        }
        break;
    }
  }

  if($hasError !== true) {
      $m = new PHPMailer();

      $m->IsSMTP();
      $m->SMTPDetug = 1;
      $m->SMTPAuth = true;

      $m->Host = 'smtp.gmail.com';
      $m->Username = 'krstovski64@gmail.com';
      $m->Password = 'gameplay55450';
      
      $m->SMTPSecure = 'ssl';
      $m->Port = 465;

      $m->IsHTML(true);

      $m->Subject = 'AgroShop';
      $m->Body= 'From: ' . $fieldsArray['name'] . $fieldsArray['lname'] . ' (' . $fieldsArray['email'] . ')<p>' . $fieldsArray['message'] . '</p>';

      $m->FromName = 'Contact';
      $m->AddAddress('krstovski64@gmail.com', 'Karneval Bamburci');

      if ($m->send()) {
          $sent = true;
          unset($name);
          unset($lname);
          unset($email);
          unset($message);
          
          }
  }
}

?>