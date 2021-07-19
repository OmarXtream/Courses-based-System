<?php
if(count(get_included_files()) == 1){
	header('HTTP/1.0 403 Forbidden');
	exit;
}

require 'req.php';

$conn = Database::getInstance();
$sql = $conn->query("SELECT username,email FROM users WHERE UserID='{$_SESSION['memberId:fort']}'");

if($sql->rowCount() > 0){

	$row = $sql->fetch();
		$clientnickname = htmlspecialchars($row['username']);
		$clientemail = htmlspecialchars($row['email']);


} else {
	exit(header("Refresh:0; url=logout.php"));
}



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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <title>Azizchatbot</title>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">مرحباً! <?=$clientnickname?></a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i></a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-12 col-md-2 navbar navbar-expand-md navbar-light mb-3 sidebar align-items-start">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mr-auto flex-column">
							<li class="nav-item">
								<a class="nav-link <?php if($pageName == "index"){ echo 'active'; } ?>" href="index.php">
								<i class="fas fa-home"></i>	الصفحة الرئيسية
								</a>
							</li>

							<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        <i class="fa fa-graduation-cap" aria-hidden="true"></i>  المعلمين
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item <?php if($pageName == "Tlist"){ echo 'active'; } ?>" href="Tlist.php"><i class="fas fa-bars"></i> قائمة المعلمين</a>
				          <a class="dropdown-item <?php if($pageName == "manage"){ echo 'active'; } ?>" href="manage.php"><i class="fas fa-edit"></i> التحكم بالمعلمين</a>
				        </div>
				      </li>
							<div class="dropdown-divider"></div>

							<li class="nav-item">
								<a class="nav-link" href="logout.php">
								<i class="fas fa-sign-out-alt" aria-hidden="true"></i> تسجيل الخروج 

								</a>
							</li>

            </ul>
          </div>
        </nav>
