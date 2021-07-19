<?php
require_once("../inc/req.php");

if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['pid']) and ctype_digit($_GET['pid'])){

	if(!isset($_SESSION['_token']) OR !isset($_GET['token']) OR $_GET['token'] != $_SESSION['_token'] OR !isset($_SESSION['memberId:fort'])){
		returnJSON(array('t'=>'خطأ', 'm'=>'حدث خطأ غير متوقع ، رجاءً قم بتحديث الصفحة.', 'tp'=>'error'));
	}

		if(isset($_GET['pid'],$_SESSION['memberId:fort'])){

			if(antiSpam('tedit:tedit.php')){
				returnJSON(array('t' => 'خطأ','m' => 'من فضلك أنتظر قليلا بين محاولاتك','tp' => 'error','b' => 'موافق'));
			} else	if(!ctype_digit($_GET['pid']) OR strlen($_GET['pid']) > 32){
				returnJSON(array('t' => 'خطأ','m' => 'محاولة جيدة، نرجو عدم تكرارها','tp' => 'error','b' => 'موافق'));
			}
					$conn = Database::getInstance();
		$stmt=$conn->prepare("SELECT name FROM teacher WHERE teacher_Id=:user");
		$stmt->bindValue(":user", (int)$_GET['pid']);
		$stmt->execute();

		if($stmt->rowCount() != 0){

	  $stmt = $conn->prepare('DELETE FROM teacher WHERE teacher_Id = :id');
    $stmt->bindValue(':id',(int)$_GET['pid'],PDO::PARAM_INT);
    $stmt->execute();
    $stmt->CloseCursor();

	if($stmt->rowCount() > 0){

        returnJSON(array('tp' => 'success', 't' => 'حسناً', 'm' => 'تمت عملية الحذف بنجاح','b' => true));
	}else{
				returnJSON(array('t'=>'خطأ', 'm'=>'فشلت العملية.', 'tp'=>'error'));


	}
		}else{

				returnJSON(array('t'=>'خطأ', 'm'=>'لم يتم العثور على المعلمة', 'tp'=>'error'));

		}
}
}
if($_SERVER['REQUEST_METHOD'] == "POST"){

	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}

	if(!isset($_SESSION['_token']) OR !isset($_POST['token']) OR $_POST['token'] != $_SESSION['_token'] OR !isset($_SESSION['memberId:fort'])){

		returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'حدث خطأ غير معروف من فضلك أعد تحميل هذه الصفحة','b' => true));


  } else if(isset($_POST['name'],$_POST['rank'],$_POST['email'],$_POST['rnum'],$_POST['times'],$_POST['id'])){
		if(antiSpam("tedit:tedit.php")){
			returnJSON(array('t'=>'خطأ','m'=>'من فضلك انتظر قليلا ثم حاول مجدداً', 'tp'=>'info', 'b'=>'موافق'));
		}

	if(empty($_POST['name']) OR empty($_POST['email']) OR empty($_POST['rnum']) OR empty($_POST['times'])){
		returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'تاكد من المدخلات','b' => true));
	}elseif(!ctype_digit($_POST['rnum']) or !ctype_digit($_POST['rank']) or !ctype_digit($_POST['id']) ){
			returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'تاكد من المدخلات.','b' => true));



	}else{

		$conn=Database::getInstance();
		$stmt=$conn->prepare("SELECT name FROM teacher WHERE teacher_Id=:user");
		$stmt->bindValue(":user", (int)$_POST['id']);
		$stmt->execute();

		$stmt2=$conn->prepare("SELECT teacher_Id FROM teacher WHERE name=:name AND teacher_Id != :theid");
		$stmt2->bindValue(":name", $_POST['name']);
		$stmt2->bindValue(":theid", (int)$_POST['id']);

		$stmt2->execute();

		if($stmt->rowCount() != 0 and $stmt2->rowCount() == 0){


$data = [
    'name' => $_POST['name'],
    'room_number' => $_POST['rnum'],
    'email' => $_POST['email'],
	  'office_hour' => $_POST['times'],
	  'ViceDean' => $_POST['rank'],
    'id' => (int)$_POST['id']
];
$sql = "UPDATE teacher SET name=:name,room_number=:room_number,email=:email,office_hour=:office_hour,ViceDean=:ViceDean WHERE teacher_Id=:id";
$stmtz= $conn->prepare($sql);
$stmtz->execute($data);



			if($stmtz->rowCount() > 0){

returnJSON(array('tp' => 'success', 't' => 'حسناً', 'm' => 'تم التعديل بنجاح','b' => true));


    }else{
                returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'error recorded teacher','b' => true));

    }





}else{ returnJSON(array('tp' => 'error', 't' => 'خطأ', 'm' => 'لم يتم العثور على المعلم او يوجد معلم بنفس الاسم','b' => true)); }





	}

} else {}}
?>
