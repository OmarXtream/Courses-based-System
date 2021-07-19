<?php
$pageName = "manage";
require_once("inc/header.php");

 ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h1 class="h2 pt-3 pb-3 mb-3 border-bottom">لوحة التحكم - المعلمين</h1>

          <div class="row">
            <div class="col-md-6 my-4">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> إضافة

                </div>
                <div class="card-body">
                  <form onsubmit="return false;" >
                    <div class="form-group">
                      <label for="pr_name">الإسم</label>
                      <input type="text" class="form-control" id="pr_name">
                    </div>

                    <div class="form-group">
                      <label for="pr_email">الإيميل</label>
                      <input type="email" class="form-control" id="pr_email">
                    </div>


                    <div class="form-group">
                      <label for="pr_num">الغرفة</label>
                      <select class="form-control" id="pr_num" data-placeholder="إختر الغرفة" >

                      <?php

                      $db = Database::getInstance();

                      $response = $db->prepare('SELECT room_number FROM room');
                      $response->execute();
                      $rooms = $response->fetchAll();
                      $response->CloseCursor();

                      if($response->rowCount() > 0 )
                      {
                      foreach($rooms as $room){
                      $room_num = htmlspecialchars($room['room_number']);

                      echo '<option value="'.$room_num.'">'.$room_num.'</option>';

                      }
                      }

                      ?>

                         </select>

                    </div>

                    <div class="form-group">
                      <select class="form-control" id="pr_rank">
                        <option value="0">معلمة</option>
                        <option value="1">وكيلة</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label for="pr_times">المواعيد</label>
                        <textarea class="form-control" id="pr_times"></textarea>
                      </div>


                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary float-right" onClick="_prlunch()"><i class="fa fa-rocket"></i> إضافة </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-6 my-4">
              <div class="card">
                <div class="card-header">
                <i class="fa fa-edit"></i>  حذف وتعديل
                </div>
                <div class="card-body">
                  <form  method="post" onsubmit="return false;">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">إختر المعلم</label>
                    <form id="membersform" method="post" onsubmit="return false;" autocomplete="off">
                    <select class="form-control" name="pr_edit" onchange="showProduct(this.value)" data-placeholder="إختر المعلم" ><option value="">إسم المعلم </option>

                    <?php

                    $db = Database::getInstance();

                    $response = $db->prepare('SELECT teacher_Id,name FROM teacher');
                    $response->execute();
                    $pr = $response->fetchAll();
                    $response->CloseCursor();

                    if($response->rowCount() > 0 )
                    {
                    foreach($pr as $product){
                    $pr_id = (int)$product['teacher_Id'];
                    $pr_name = htmlspecialchars($product['name']);

                    echo '<option value="'.$pr_id.'">'.$pr_name.'</option>';

                    }
                    }

                    ?>

                     </select>


                     <br>
                     <div id="txtHint"></div>

                    </form>
                    </div>
                    </form>








                </div>
              </div>
            </div>


          </div>
        </main>

      <script>
        function _prlunch(){


            var pname=document.getElementById("pr_name").value;
            var prules=document.getElementById("pr_email").value;
            var pimg=document.getElementById("pr_num").value;
            var pid=document.getElementById("pr_rank").value;
            var ptimes=document.getElementById("pr_times").value;

             if(pname == null || pname == "" || ptimes == null || ptimes == "" || prules == "" || prules == null || pimg== "" || pimg== null || pid == '' || typeof pid == 'undefined'){
              new toast({
                icon: 'info',
                title: 'من فضلك تأكد من المدخلات'
              });




            }else{
              sendData("Tadd.php", "rank="+pid+"&name="+pname+"&email="+prules+"&rnum="+pimg+"&times="+ptimes)
              .then(function(response){
                swal.fire({
                  title: response.t,
                  text: response.m,
                  icon: response.tp,
                  showConfirmButton: response.b,
                  confirmButtonText: 'موافق'
                });
                if(response.tp == 'error'){

                }else if(response.tp == 'success'){
                  document.getElementById("pr_name").value = '';
                  document.getElementById("pr_email").value = '';
                  document.getElementById("pr_num").value = '';
                  document.getElementById("pr_rank").value = '';
                  document.getElementById("pr_times").value = '';

                }
              });
            }
        }

        function showProduct(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","ajax/showpr.php?q=" + str + "&token=" + document.getElementsByName('token')[0].getAttribute('content'),true);
                xmlhttp.send();
            }
        }




        function _predit(id){


          var pname=document.getElementById("pr_name2").value;
          var prules=document.getElementById("pr_email2").value;
          var pimg=document.getElementById("pr_num2").value;
          var pid=document.getElementById("pr_rank2").value;
          var ptimes=document.getElementById("pr_times2").value;

           if(pname == null || pname == "" || ptimes == null || ptimes == "" || prules == "" || prules == null || pimg== "" || pimg== null || pid == '' || typeof pid == 'undefined'){
            new toast({
              icon: 'info',
              title: 'من فضلك تأكد من المدخلات'
            });




            }else{
              sendData("Tedit.php", "id="+id+"&rank="+pid+"&name="+pname+"&email="+prules+"&rnum="+pimg+"&times="+ptimes)
              .then(function(response){
                swal.fire({
                  title: response.t,
                  text: response.m,
                  icon: response.tp,
                  showConfirmButton: response.b,
                  confirmButtonText: 'موافق'
                });
                if(response.tp == 'error'){
                  document.getElementById("txtHint").innerHTML = "";

                }else if(response.tp == 'success'){
                  document.getElementById("txtHint").innerHTML = "";
                }
              });
            }
        }
        function _prdel(id) {
    			if(typeof id !== 'undefined') {
    				sendData("Tedit", "pid="+id,'GET')
    					.then(function(response){
    						swal.fire({
    							title: response.t,
    							text: response.m,
    							icon: response.tp,
    							showConfirmButton: response.b,
    							confirmButtonText: 'موافق'
    						});
    					 if(response.tp == 'success'){
            document.getElementById("txtHint").innerHTML = "";
    						}
    					});
    			}
    		}


      </script>


<?php require_once("inc/footer.php"); ?>
