<?php
$withOutProtection = true;
require_once("../inc/req.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}

	if(!isset($_SESSION['_token']) OR !isset($_POST['token']) OR $_POST['token'] != $_SESSION['_token']){
		returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'حدث خطأ غير معروف من فضلك أعد تحميل هذه الصفحة','b' => true));
	}else if (isset($_SESSION['memberId:fort'])) {
		returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'أنت مسجل بالفعل','b' => true));
	} else if(isset($_POST['useroremail'],$_POST['password'])){
		if(antiSpam("login:login.php")){
			returnJSON(array('t'=>'خطأ','m'=>'من فضلك انتظر قليلا ثم حاول مجدداً', 's'=>'error', 'b'=>'موافق'));
		}

		if(empty($_POST['useroremail']) OR empty($_POST['password'])){
			returnJSON(array('t' => 'خطأ','m' => 'تاكد من المدخلات.','tp' => 'error', 'b' => 'موافق'));
		} else if(strlen($_POST['useroremail']) > 260){
			returnJSON(array('t' => 'خطأ','m' => 'تاكد من المدخلات.','s' => 'error', 'b' => true));
		} else {
        $conn = Database::getInstance();
        $check = $conn->prepare("SELECT UserID,email,password FROM users WHERE username=:username");
   			$check->bindValue(":username", $_POST['useroremail']);
   			$check->execute();
			if($check->rowCount() !== 0){
				$row = $check->fetch();
				$id = $row['UserID'];
				$nm = $row['username'];

				$password = $row['password'];
				$passwordd = password_verify($_POST['password'], $password);
				if($passwordd){
                 
						$_SESSION['memberId:fort'] = $id;
						$_SESSION['clientnickname'] = $nm;
						returnJSON(array('t' => 'حسناً','m' => 'تم تسجيل الدخول بنجاح.','tp' => 'success', 'b' => false));
				}else{
					returnJSON(array('t' => 'خطأ','m' => 'تفاصيل تسجيل الدخول الخاصة بك خاطئة ، حاول مرة أخرى.','tp' => 'error', 'b' => true));
				}
			}else{
				returnJSON(array('t' => 'خطأ','m' => 'تفاصيل تسجيل الدخول الخاصة بك خاطئة ، حاول مرة أخرى.','tp' => 'error', 'b' => true));
			}
		}
	}
}
?>
