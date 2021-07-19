<?php

ini_set('session.cookie_httponly', true);
ini_set('session.cookie_secure', true);
session_name('__Secure-PHPSESSID');
session_start();
require_once("inc/db.php");


if(isset($_SESSION['memberId:fort'])){
	exit(header('Location: index.php'));
}


$_SESSION['_token']=bin2hex(openssl_random_pseudo_bytes(16));
?>
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="token" content="<?=$_SESSION['_token']?>">

    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Azizchatbot</title>
  </head>
  <body>
      <div class="login">
        <div class="container">
          <h2 class="text-center mb-5">حي الله!</h2>
          <form class="m-auto" onSubmit="return false">
            <div class="form-group">
              <label for="emailSignup"><i class="fa fa-user" aria-hidden="true"></i> إسم المستخدم</label>
              <input type="text" class="form-control" id="login-username" name="login-username" placeholder="username" required>
            </div>
            <div class="form-group">
              <label for="passwordSignup"><i class="fa fa-lock" aria-hidden="true"></i> كلمة المرور</label>
              <input type="password" class="form-control" id="login-password" name="login-password" placeholder="****">
            </div>
            <button type="submit" class="btn btn-primary float-right" onClick="login()">دخول</button>
          </form>
        </div>
      </div>
<script>
function login(){

  var useroremail=document.getElementById("login-username").value;
  var password=document.getElementById("login-password").value;
  if(useroremail == null || useroremail == "" || password == "" || password == null){
    new toast({
      icon: 'info',
      text: "قم بملأ الحقول المطلوبة"
    });
          throw new Error("Empty Inputs");

  }

  sendData("login.php", "useroremail="+useroremail+"&password="+password)
  .then(function(response){
    swal.fire({
      title: response.t,
      text: response.m,
      icon: response.tp,
      showConfirmButton: response.b,
      confirmButtonText: 'موافق'
    });
    if(response.tp == 'error'){
    //	grecaptcha.reset();
    }else if(response.tp == 'success'){
      setTimeout(function () { location.href = "./index.php";}, 3000);
    }
  });

}

</script>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/script.js"></script>
  </body>
</html>
