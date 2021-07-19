<?php
require_once("../inc/req.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}

	if(!isset($_SESSION['_token']) OR !isset($_POST['token']) OR $_POST['token'] != $_SESSION['_token'] OR !isset($_SESSION['memberId:fort'])){

		returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'حدث خطأ غير معروف من فضلك أعد تحميل هذه الصفحة','b' => true));


	} else if(isset($_POST['name'],$_POST['rank'],$_POST['email'],$_POST['rnum'],$_POST['times'])){
		if(antiSpam("Tadd:Tadd.php")){
			returnJSON(array('t'=>'خطأ','m'=>'من فضلك انتظر قليلا ثم حاول مجدداً', 'tp'=>'info', 'b'=>'موافق'));
		}

	if(empty($_POST['name']) OR empty($_POST['email']) OR empty($_POST['rnum']) OR empty($_POST['times'])){
		returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'تاكد من المدخلات','b' => true));
	}elseif(!ctype_digit($_POST['rnum']) or !ctype_digit($_POST['rank']) ){
			returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'تاكد من المدخلات.','b' => true));


	}else{

		$conn=Database::getInstance();
		$stmt=$conn->prepare("SELECT teacher_Id FROM teacher WHERE name=:user");
		$stmt->bindValue(":user", $_POST['name']);
		$stmt->execute();

		if($stmt->rowCount() == 0){


			$stmtz=$conn->prepare("INSERT INTO teacher (room_number,name,email,office_hour,ViceDean) VALUES (:rn,:name,:email,:office_hour,:ViceDean)");
      $stmtz->bindValue(":rn", $_POST['rnum']);
			$stmtz->bindValue(":name", $_POST['name']);
			$stmtz->bindValue(":email", $_POST['email']);
      $stmtz->bindValue(":office_hour", $_POST['times']);
			$stmtz->bindValue(":ViceDean", $_POST['rank']);

			$stmtz->execute();

			if($stmtz->rowCount() > 0){

returnJSON(array('tp' => 'success', 't' => 'حسناً', 'm' => 'تم الإضافة بنجاح !','b' => true));


    }else{
        returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'error recording teacher!','b' => true));
    }





}else{ returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'يوجد شخص بنفس الإسم  بالفعل !','b' => true)); }






	}

} else {}}
?>
