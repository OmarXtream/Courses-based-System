<?php
$pageName = "Tlist";

require_once("inc/header.php");

$conn = Database::getInstance();
$allmems = $conn->query("SELECT * FROM teacher ")->fetchAll();
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h1 class="h2 pt-3 pb-3 mb-3 border-bottom">لوحة التحكم - المعلمين</h1>






          <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
          <table class="table table-bordered table-striped table-vcenter js-dataTable-full" data-order='[[ 1, "desc" ]]' dir="ltr">
              <thead>
                  <tr>
                    <th class="d-none d-sm-table-cell text-center">-</th>
                    <th class="text-center">المواعيد</th>
                    <th class="text-center">الإيميل</th>
                    <th class="text-center">رقم الغرفة</th>
                    <th class="text-center">الإسم</th>
                    <th class="d-none d-sm-table-cell" style="width: 100px;" >#</th>
                  </tr>
              </thead>
              <tbody>
<?php foreach($allmems as $row){
          $name = htmlspecialchars($row['name']);
          $email = htmlspecialchars($row['email']);
          $office_hour = htmlspecialchars($row['office_hour']);
          $room_number = (int)$row['room_number'];
          $teacher_Id = (int)$row['teacher_Id'];
          if($row['ViceDean'] == 1){ $ViceDean = 'وكيلة';$bdgcolor= 'primary'; }else{ $ViceDean = 'معلمة'; $bdgcolor= 'info';}




?>
              <tr>
                <td class="text-center">
                      <a class="text-gray-dark" href="javascript:void(0)"><span class='badge badge-<?=$bdgcolor?>'><?=$ViceDean?></span></a>
                  </td>
                <td class="text-center">
                      <a class="text-gray-dark" href="javascript:void(0)"><?=$office_hour?></a>
                  </td>
                <td class="text-center">
                      <a class="text-gray-dark" href="javascript:void(0)"><?=$email?></a>
                  </td>

                <td class="text-center">
                      <a class="text-gray-dark" href="javascript:void(0)"><?=$room_number?></a>
                  </td>

                <td class="text-center">
                      <a class="text-gray-dark" href="javascript:void(0)"><?=$name?></a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                      <a class="text-gray-dark" href="javascript:void(0)"><?=$teacher_Id?></a>
                  </td>

              </tr>
<?php } ?>
              </tbody>
          </table>




        </main>

<?php require_once("inc/footer.php"); ?>
