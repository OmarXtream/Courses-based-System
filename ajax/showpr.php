<?php
require_once("../inc/req.php");
if($_SERVER['REQUEST_METHOD'] == "GET"){

	if(!isset($_SESSION['_token']) OR !isset($_GET['token']) OR $_GET['token'] != $_SESSION['_token']){
		returnJSON(array('t'=>'خطأ', 'm'=>'حدث خطأ غير متوقع ، رجاءً قم بتحديث الصفحة.', 'tp'=>'error'));
	}
	if(isset($_GET['q'],$_SESSION['memberId:fort'])){
					if(antiSpam('showpr:showpr.php')){
            echo' من فضلك إنتظر بين محاولاتك';
				die;


			} else	if(!ctype_digit($_GET['q']) OR strlen($_GET['q']) > 32){
			    			echo' محاولة جيده , لا تكررها ';

        die;
			}

    $prid = (int)$_GET['q'];
    $db = Database::getInstance();

    $response = $db->prepare('SELECT *
            FROM teacher
            WHERE teacher_Id = :nom
           ');
    $response->bindValue(':nom',$prid,PDO::PARAM_INT);
    $response->execute();
    $member = $response->fetch();
    $response->CloseCursor();
  if($member){
    $name = htmlspecialchars($member['name']);
    $email = htmlspecialchars($member['email']);
    $office_hour = htmlspecialchars($member['office_hour']);
    $room_number = htmlspecialchars($member['room_number']);
    $teacher_Id = (int)$member['teacher_Id'];
echo'
<form onsubmit="return false;" >
  <div class="form-group">
    <label for="pr_name">الإسم</label>
    <input type="text" class="form-control" id="pr_name2" value="'.$name.'">
  </div>

  <div class="form-group">
    <label for="pr_email">الإيميل</label>
    <input type="email" class="form-control" id="pr_email2" value="'.$email.'">
  </div>


  <div class="form-group">
    <label for="pr_num">الغرفة</label>
    <select class="form-control" id="pr_num2" data-placeholder="إختر الغرفة" >
';

    $db = Database::getInstance();

    $response = $db->prepare('SELECT room_number FROM room');
    $response->execute();
    $rooms = $response->fetchAll();
    $response->CloseCursor();

    if($response->rowCount() > 0 )
    {
    foreach($rooms as $room){
    $room_num = htmlspecialchars($room['room_number']);
    if($room_number === $room_num){
      $select = 'selected';
    }else{
			$select = '';

		}
    echo '<option value="'.$room_num.'" '.@$select.'>'.$room_num.'</option>';

    }
    }

echo'
       </select>

  </div>

  <div class="form-group">
    <select class="form-control" id="pr_rank2">
      <option value="0">معلمة</option>
      <option value="1">وكيلة</option>
    </select>
  </div>
  <div class="form-group">
    <div class="form-group">
      <label for="pr_times">المواعيد</label>
      <textarea class="form-control" id="pr_times2">'.$office_hour.'</textarea>
    </div>


  </div>

  <div class="form-group">
  <button type="submit" class="btn btn-secondary text-center" onClick="_predit('.$teacher_Id.')"><i class="fa fa-edit"></i> تعديل </button>

  <button type="submit" class="btn btn-danger text-center" onClick="_prdel('.$teacher_Id.')"> <i class="fa fa-trash"></i> حذف </button>

  </div>
</form>
';





}else{
echo 'لم يتم العثور على المعلمة';
}
}
}
 ?>
