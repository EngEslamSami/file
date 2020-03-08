<style>
  .nonactive {
    pointer-events: none;
    cursor: not-allowed;
  }
</style>

<div class="modal-body">
  <div class="col-sm-9 padding-4">


    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 1) { ?>
    <form enctype="multipart/form-data" method="post" id="form1" action="<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/saveTransformBadel">

      <input type="hidden" name="solaf_rkm_fk" id="solaf_rkm_fk" value="<?= $solaf_data->t_rkm ?>">
      <input type="hidden" name="solaf_id_fk" id="solaf_id_fk" value="<?= $solaf_data->id ?>">
      <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
      <input type="hidden" name="to_user" id="to_user" value="<?= $solaf_data->direct_manager_id_fk ?>">
      <input type="hidden" name="to_user_n" id="to_user_n" value="<?= $solaf_data->direct_manager_n ?>">
      <input type="hidden" name="level" id="level" value="2">
      <input type="hidden" name="approved" id="approved">


      <!--------------------->
<!--<pre>-->
<!--    --><?php //print_r($modeer_mobasher) ?>
<!--</pre>-->
      <input type="hidden" name="link_mobasher" id="link_mobasher" value="<?php echo $modeer_mobasher->personal_photo;?>">
      <input type="hidden" name="name_mobasher" id="name_mobasher" value="<?php echo $modeer_mobasher->employee;?>">
      <input type="hidden" name="job_mobasher" id="job_mobasher" value="<?php echo $modeer_mobasher->job_title;?>">



      <input type="hidden" name="link_emp" id="link_emp" value="<?php echo $personal_data->personal_photo;?>">
      <input type="hidden" name="name_emp" id="name_emp" value="<?php echo $personal_data->employee;?>">
      <input type="hidden" name="job_emp" id="job_emp" value="<?php echo $personal_data->job_title;?>">
      <input type="hidden" name="user_id_emp" id="job_emp" value="<?php echo $personal_data->user_id;?>">
      <!--------------------->



      <div class="col-sm-12 padding-4" id="html">
        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
          <tbody>

            <tr>
              <td>الإسم/<?= $solaf_data->emp_name ?></td>
              <td>التوقيع/</td>
              <td>التاريخ/<?= date('d-m-Y') ?></td>
            </tr>

            <tr>
              <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                <div class="radio-content">
                  <input type="radio" onclick="change_photo(1);$('#reason_action1').attr('disabled','TRUE');
                            $('#reason_action1').val('................');" id="tahod-1" data-validation="required" name="action" value="1">
                  <label class="radio-label" for="tahod-1">موافق</label>

                </div>
              </td>
            </tr>

            <tr>
              <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                <div class="radio-content">
                  <input type="radio" name="action" onclick="change_photo(2);$('#reason_action1').removeAttr('disabled');" id="tahod-2" data-validation="required" value="2">


                  <label class="radio-label" for="tahod-2">لا أوافق بسبب

                    <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">
                  </label>
                </div>





              </td>
            </tr>

          </tbody>
        </table>


        <script>
          function change_photo(value) {

            if (value == 1) {

              var link = $('#link_mobasher').val();
              var name = $('#name_mobasher').val();
              var job = $('#job_mobasher').val();
              $('#empImg_1').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);
              $('#name-emp_1').text(name);
              $('#job-title_1').text(job);

            } else {

              var link = $('#link_emp').val();
              var name = $('#name_emp').val();
              var job = $('#job_emp').val();
              $('#empImg_1').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);
              $('#name-emp_1').text(name);
              $('#job-title_1').text(job);

            }

          }
        </script>

      </div>
    </form>

  </div>
  <div class="col-sm-3">
    <table class="table table-bordered" style="">
      <thead>
        <tr>
          <td colspan="2">
            <img id="empImg_1" src="<?php echo base_url(); ?>/asisst/fav/apple-icon-120x120.png" class="center-block img-responsive" style="width: 180px; height: 150px">
          </td>
        </tr>
      </thead>
      <tbody>
        <tr class="greentd">
          <td class="text-center">الإسم</td>
        </tr>
        <tr>
          <td id="name-emp_1" class="text-center"></td>
        </tr>
        <tr class="greentd">
          <td class="text-center">الوظيفة</td>
        </tr>
        <tr>
          <td id="job-title_1" class="text-center"></td>
        </tr>
      </tbody>
    </table>
  </div>

  <?php } ?>


  <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 2) { ?>

  <form enctype="multipart/form-data" method="post" id="form2" action="<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/saveTransformDirectManger">
    <input type="hidden" name="solaf_rkm_fk" id="solaf_rkm_fk" value="<?= $solaf_data->t_rkm ?>">
    <input type="hidden" name="solaf_id_fk" id="solaf_id_fk" value="<?= $solaf_data->id ?>">
    <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
    <input type="hidden" name="level" id="level" value="3">
    <input type="hidden" name="approved" id="approved">

    <input type="hidden" name="link_emp" id="link_emp" value="<?php echo $personal_data->user_photo;?>">
    <input type="hidden" name="name_emp" id="name_emp" value="<?php echo $personal_data->employee;?>">
    <input type="hidden" name="job_emp" id="job_emp" value="<?php echo $personal_data->employee;?>">
    <input type="hidden" name="user_id_emp" id="job_emp" value="<?php echo $personal_data->user_id;?>">
    <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $personal_data->emp_id;?>">
    <!--------------------->
    <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
      <tbody>
        <tr>
          <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
            <div class="radio-content">
              <input type="radio" id="accept-1" data-validation="required" name="action" onclick="change_photo_DirectManger(1);
                    $('#reason_action2').val('...........');
                     $('#reason_action2').attr('disabled',true);" value="1">


              <label class="radio-label" for="accept-1"> أوافق على سلفه الموظف المذكور أعلاه
               </label>

            </div>
          </td>
        </tr>

        <tr>
          <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

            <div class="radio-content">
              <input type="radio" name="action" data-validation="required" id="accept-2" onclick="change_photo_DirectManger(2);$('#reason_action2').removeAttr('disabled'); " value="2">

              <label class="radio-label" for="accept-2"> لا أوافق بسبب </label>
            </div>


            <input size="60" type="text" disabled name="reason_action" id="reason_action2" value=" ...................">



          </td>
        </tr>
        <tr>
          <td>الإسم/<?= $modeer_mobasher->employee ?></td>
          <td>التوقيع/</td>
          <td>التاريخ/<?= date('d-m-Y') ?></td>
        </tr>
      </tbody>
    </table>
    <script>
      function change_photo_DirectManger(value) {
        if (value == 1) {
          $('#DirectMangerDiv').show();
          $('#empImg').attr('src', '<?php echo base_url() . "asisst/fav/apple-icon-120x120.png"; ?>');
          $('#name-emp').text('غير محدد');
          $('#job-title').text('غير محدد');

        } else if (2) {
          $('#DirectMangerDiv').hide();
          var link = $('#link_emp').val();
          var name = $('#name_emp').val();
          var job = $('#job_emp').val();
          var emp_id = $('#emp_id').val();
          $('#empImg').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);
          $('#name-emp').text(name);
          $('#job-title').text(job);
        }
      }
    </script>

    <div class="col-sm-12 no-padding" id="DirectMangerDiv">
      <div class="form-group col-md-6 col-sm-6 padding-4">
        <label class="label">الإدارة</label>
        <select data-validation="required" aria-required="true" aria-required="true" name="admins" id="admins" onchange="getDepartmentMembersDirectManger($(this).val())" class="form-control">
          <?php if(!empty($department_jobs_all)){ foreach($department_jobs_all as $row){ ?>
          <option value="<?php echo$row->id;?>"> <?php echo$row->name;?></option>

          <?php } } ?>
        </select>
      </div>


      <script>
        function getDepartmentMembersDirectManger(value) {

          $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/getDepartmentMembers',
            data: {
              department_id: value
            },
            cache: false,
            success: function(json_data) {
              var JSONObject = JSON.parse(json_data);

              $("#current_to_id_DirectManger").html('<option value="">إختر </option>');
              for (i = 0; i < JSONObject.length; i++) {
                var name = JSONObject[i].employee;
                var img = JSONObject[i].personal_photo;
                var job = JSONObject[i].job_title;
                $("#current_to_id_DirectManger").append('<option  value="' + JSONObject[i].id + '" data-name="' + name + '" data-img="' + img + '" data-job="' + job + '"> ' + JSONObject[i].employee + '</option>');
              }


            }
          });





        }
      </script>
      <div class="form-group col-md-6 col-sm-6 padding-4">
        <label class="label">الموظف</label>
        <select data-validation="required" name="current_to_id" id="current_to_id_DirectManger" class="form-control" data-validation="required" aria-required="true" onchange="
                        var link =$('#current_to_id_DirectManger :selected').attr('data-img');
                        var name =$('#current_to_id_DirectManger :selected').attr('data-name');
                        var job =$('#current_to_id_DirectManger :selected').attr('data-job');
                        $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                        $('#name-emp').text(name);
                        $('#name-emp').text(name);
                        $('#job-title').text(job);
                        ">
          <option value="">إختر</option>
          <?php if (!empty($department_emps)) {
                        foreach ($department_emps as $row) { ?>
          <option value="<?= $row->id ?>" data-img="<?= $row->personal_photo ?>" data-name="<?= $row->employee ?>" data-job="<?= $row->job_title ?>"><?= $row->employee ?></option>
          <?php }
                    } ?>
        </select>

      </div>
    </div>

  </form>
</div>
<?php } ?>

<?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 3) { ?>

<form enctype="multipart/form-data" method="post" id="form3" action="<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/saveTransformDirectManger">
  <input type="hidden" name="solaf_rkm_fk" id="solaf_rkm_fk" value="<?= $solaf_data->t_rkm ?>">
  <input type="hidden" name="solaf_id_fk" id="solaf_id_fk" value="<?= $solaf_data->id ?>">
  <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">

  <input type="hidden" name="level" id="level" value="4">
  <input type="hidden" name="approved" id="approved">


  <input type="hidden" name="link_emp" id="link_emp" value="<?php echo $personal_data->user_photo;?>">
  <input type="hidden" name="name_emp" id="name_emp" value="<?php echo $personal_data->employee;?>">
  <input type="hidden" name="job_emp" id="job_emp" value="<?php echo $personal_data->employee;?>">
  <input type="hidden" name="user_id_emp" id="job_emp" value="<?php echo $personal_data->user_id;?>">
  <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $personal_data->emp_id;?>">
  <!--------------------->

  <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">

    <thead>
      <tr class="info">
        <th>سبق له التمتع ب </th>
        <th>حد السلفه</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>


      <tr>
        <td> (<?php echo $solaf_data->num_previous_requests;?>)سلفه</td>
        <td>(<?php echo   $solaf_data->hd_solfa;?>)</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">الموظف المختص/<?= $mokhtas_data->employee ?></td>
        <td>التوقيع/</td>
        <td>التاريخ/<?= date('d-m-Y') ?></td>
      </tr>

      <tr>
        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
          <div class="radio-content">
            <input type="radio" id="accept-1" data-validation="required" name="action" onclick="change_photo_DirectMange2r(1)
                    $('#reason_action3').val('...........');
                     $('#reason_action3').attr('disabled',true);" value="1">


            <label class="radio-label" for="accept-1">أوافق</label>

          </div>
        </td>
      </tr>

      <tr>
        <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

          <div class="radio-content">
            <input type="radio" name="action" data-validation="required" id="accept-2" onclick="change_photo_DirectMange2r(2)$('#reason_action3').removeAttr('disabled'); " value="2">

            <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange2r(1);
                     $('#reason_action3').removeAttr('disabled');"> لا أوافق بسبب </label>
          </div>

          <input size="60" type="text" disabled name="reason_action" id="reason_action3" value=" ...................">

        </td>
      </tr>

    </tbody>
  </table>
  <script>
    function change_photo_DirectMange2r(value) {
      if (value == 1) {
        $('#DirectMangerDiv2').show();
        $('#empImg').attr('src', '<?php echo base_url() . "asisst/fav/apple-icon-120x120.png"; ?>');
        $('#name-emp').text('');
        $('#job-title').text('');

      } else if (2) {
        $('#DirectMangerDiv2').hide();
        var link = $('#link_emp').val();
        var name = $('#name_emp').val();
        var job = $('#job_emp').val();
        var emp_id = $('#emp_id').val();
        $('#empImg').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);
        $('#name-emp').text(name);
        $('#job-title').text(job);
      }
    }
  </script>
  <div class="col-sm-12 no-padding" id="DirectMangerDiv2">

    <div class="form-group col-md-6 col-sm-6 padding-4">
      <label class="label">الإدارة</label>
      <select data-validation="required" aria-required="true" aria-required="true" name="admins" id="admins" onchange="getDepartmentMembersformDirectManger($(this).val())" class="form-control">
        <?php if(!empty($department_jobs_all)){ foreach($department_jobs_all as $row){ ?>
        <option value="<?php echo$row->id;?>"> <?php echo$row->name;?></option>

        <?php } } ?>
      </select>
    </div>

    <script>
      function getDepartmentMembersformDirectManger(value) {

        $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/getDepartmentMembers',
          data: {
            department_id: value
          },
          cache: false,
          success: function(json_data) {
            var JSONObject = JSON.parse(json_data);
            //  console.log(JSONObject);

            $("#current_to_id_formDirectManger").html('<option value="">إختر </option>');
            for (i = 0; i < JSONObject.length; i++) {
              var name = JSONObject[i].employee;
              var img = JSONObject[i].personal_photo;
              var job = JSONObject[i].job_title;
              $("#current_to_id_formDirectManger").append('<option  value="' + JSONObject[i].id + '" data-name="' + name + '" data-img="' + img + '" data-job="' + job + '"> ' + JSONObject[i].employee + '</option>');
            }

          }
        });






      }
    </script>
    <div class="form-group col-md-6 col-sm-6 padding-4">
      <label class="label">الموظف</label>
      <select data-validation="required" name="current_to_id" id="current_to_id_formDirectManger" class="form-control" data-validation="required" aria-required="true" onchange="
                                  var link =$('#current_to_id_formDirectManger :selected').attr('data-img');
                                  var name =$('#current_to_id_formDirectManger :selected').attr('data-name');
                                  var job =$('#current_to_id_formDirectManger :selected').attr('data-job');
                                  $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                                  $('#name-emp').text(name);
                                  $('#name-emp').text(name);
                                  $('#job-title').text(job);
                                  ">
        <option value="">إختر</option>
        <?php if (!empty($department_emps)) {
                                  foreach ($department_emps as $row) { ?>
        <option value="<?= $row->id ?>" data-img="<?= $row->personal_photo ?>" data-name="<?= $row->employee ?>" data-job="<?= $row->job_title ?>"><?= $row->employee ?></option>
        <?php }
                              } ?>
      </select>

    </div>

    <!------------------------------------------->

  </div>
</form>
</div>
<?php } ?>



<?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 4) { ?>

<form enctype="multipart/form-data" method="post" id="form4" action="<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/saveTransformToManger">
  <input type="hidden" name="solaf_rkm_fk" id="solaf_rkm_fk" value="<?= $solaf_data->t_rkm ?>">
  <input type="hidden" name="solaf_id_fk" id="solaf_id_fk" value="<?= $solaf_data->id ?>">
  <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
  <!-- <input type="hidden" name="to_user" id="to_user" value="<?= $solaf_data->direct_manager_id_fk ?>">
        <input type="hidden" name="to_user_n" id="to_user_n" value="<?= $solaf_data->direct_manager_n ?>">-->
  <input type="hidden" name="level" id="level" value="5">
  <input type="hidden" name="approved" id="approved">
  <input type="hidden" name="link_emp" id="link_emp" value="<?php echo $personal_data->user_photo;?>">
  <input type="hidden" name="name_emp" id="name_emp" value="<?php echo $personal_data->employee;?>">
  <input type="hidden" name="job_emp" id="job_emp" value="<?php echo $personal_data->employee;?>">
  <input type="hidden" name="user_id_emp" id="job_emp" value="<?php echo $personal_data->user_id;?>">
  <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $personal_data->emp_id;?>">
  <!--------------------->
  <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
    <tbody>

      <tr>
        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
          <div class="radio-content">
            <input type="radio" id="accept-1" data-validation="required" name="action" onclick="change_photo_DirectMange3r(1)
                      $('#reason_action4').val('...........');
                       $('#reason_action4').attr('disabled',true);" value="1">


            <label class="radio-label" for="accept-1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
              مانع من تمتع الموظف بالسلفه</label>

          </div>
        </td>
      </tr>

      <tr>
        <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

          <div class="radio-content">
            <input type="radio" name="action" data-validation="required" id="accept-2" onclick="change_photo_DirectMange3r(2)$('#reason_action4').removeAttr('disabled'); " value="2">

            <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange3r(1);
                       $('#reason_action4').removeAttr('disabled');"> لا أوافق بسبب </label>
          </div>

          <input size="60" type="text" disabled name="reason_action" id="reason_action4" value=" ...................">

        </td>
      </tr>
      <!---------------------------------------------->



      <tr>
        <td>الإسم/<?= $mokhtas_data->employee ?></td>
        <td>التوقيع/</td>
        <td>التاريخ/<?= date('d-m-Y') ?></td>
      </tr>
    </tbody>
  </table>
  <script>
    function change_photo_DirectMange3r(value) {
      if (value == 1) {
        $('#DirectMangerDiv3').show();
        $('#empImg').attr('src', '<?php echo base_url() . "asisst/fav/apple-icon-120x120.png"; ?>');
        $('#name-emp').text('');
        $('#job-title').text('');

      } else if (2) {
        $('#DirectMangerDiv3').hide();
        var link = $('#link_emp').val();
        var name = $('#name_emp').val();
        var job = $('#job_emp').val();
        var emp_id = $('#emp_id').val();
        $('#empImg').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);
        $('#name-emp').text(name);
        $('#job-title').text(job);
      }
    }
  </script>
  <div class="col-sm-12 no-padding" id="DirectMangerDiv3">





    <!------------------------------------------------------------------>
    <div class="form-group col-md-6 col-sm-6 padding-4">
      <label class="label">الإدارة</label>
      <select data-validation="required" aria-required="true" name="admins" id="admins" onchange="getDepartmentMembersToManger($(this).val())" class="form-control">
        <?php if(!empty($department_jobs_all)){ foreach($department_jobs_all as $row){ ?>
        <option value="<?php echo$row->id;?>"> <?php echo$row->name;?></option>

        <?php } } ?>
      </select>
    </div>


    <script>
      function getDepartmentMembersToManger(value) {
        $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/getDepartmentMembers',
          data: {
            department_id: value
          },
          cache: false,
          success: function(json_data) {
            var JSONObject = JSON.parse(json_data);

            $("#current_to_id_ToManger").html('<option value="">إختر </option>');
            for (i = 0; i < JSONObject.length; i++) {
              var name = JSONObject[i].employee;
              var img = JSONObject[i].personal_photo;
              var job = JSONObject[i].job_title;
              $("#current_to_id_ToManger").append('<option  value="' + JSONObject[i].id + '" data-name="' + name + '" data-img="' + img + '" data-job="' + job + '"> ' + JSONObject[i].employee + '</option>');
            }

          }
        });


      }
    </script>

    <div class="form-group col-md-6 col-sm-6 padding-4">
      <label class="label">الموظف</label>
      <select data-validation="required" name="current_to_id" id="current_to_id_ToManger" class="form-control" data-validation="required" aria-required="true" onchange="
                                  var link =$('#current_to_id_ToManger :selected').attr('data-img');
                                  var name =$('#current_to_id_ToManger :selected').attr('data-name');
                                  var job =$('#current_to_id_ToManger :selected').attr('data-job');
                                  $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                                  $('#name-emp').text(name);
                                  $('#name-emp').text(name);
                                  $('#job-title').text(job);
                                  ">
        <option value="">إختر</option>
        <?php  if (!empty($department_emps)) {
                                  foreach ($department_emps as $row) { ?>
        <option value="<?= $row->id ?>" data-img="<?= $row->personal_photo ?>" data-name="<?= $row->employee ?>" data-job="<?= $row->job_title ?>"><?= $row->employee ?></option>
        <?php }
                              } ?>
      </select>

    </div>



  </div>
</form>
</div>
<?php } ?>




<?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 5) { ?>

<form enctype="multipart/form-data" method="post" id="form5" action="<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/saveTransformManger">
  <input type="hidden" name="solaf_rkm_fk" id="solaf_rkm_fk" value="<?= $solaf_data->t_rkm ?>">
  <input type="hidden" name="solaf_id_fk" id="solaf_id_fk" value="<?= $solaf_data->id ?>">
  <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
  <!-- <input type="hidden" name="to_user" id="to_user" value="<?= $solaf_data->direct_manager_id_fk ?>">
        <input type="hidden" name="to_user_n" id="to_user_n" value="<?= $solaf_data->direct_manager_n ?>">-->
  <input type="hidden" name="level" id="level" value="6">
  <input type="hidden" name="approved" id="approved">
  <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
    <tbody>

      <tr>
        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
          <div class="radio-content">
            <input type="radio" id="accept-1" data-validation="required" name="action" onclick="$('#reason_action5').val('...........'); $('#approved').val(1);
                                     $('#reason_action5').attr('disabled',true);" value="1">
            <label class="radio-label" for="accept-1">أوافق</label>

          </div>
        </td>
      </tr>

      <tr>
        <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

          <div class="radio-content">
            <input type="radio" name="action" data-validation="required" id="accept-2" onclick="$('#reason_action5').removeAttr('disabled');  $('#approved').val(2);" value="2">

            <label class="radio-label" for="accept-2" onclick="$('#reason_action5').removeAttr('disabled');"> لا أوافق بسبب </label>
          </div>

          <input size="60" type="text" disabled name="reason_action" id="reason_action5" value=" ...................">

        </td>
      </tr>
      <!---------------------------------------------->



      <tr>
        <td>الإسم/<?= $level_5data->to_user_n ?></td>
        <td>التوقيع/</td>
        <td>التاريخ/<?= date('d-m-Y') ?></td>
      </tr>
    </tbody>
  </table>
  <div class="col-sm-12 no-padding">


    <div class="form-group col-md-6 col-sm-6 padding-4">

      <label class="label">الإدارة</label>
      <select data-validation="required" aria-required="true" name="admins" id="admins" disabled class="form-control">
        <?php if(!empty($department_jobs_all)){ foreach($department_jobs_all as $row){ ?>
        <option value="<?php echo$row->id;?>"> <?php echo$row->name;?></option>

        <?php } } ?>
      </select>
    </div>

    <div class="form-group col-md-6 col-sm-6 padding-4">
      <label class="label">الموظف</label>
      <select data-validation="required" name="current_to_id" id="current_to_id" class="form-control bottom-input  nonactive current_to_id" data-validation="required" aria-required="true" onchange="">
        <?php if (!empty($solaf_data->emp_id_fk)) { ?>
        <option value="<?= $solaf_data->emp_id_fk ?>" data-img="<?= $solaf_data->personal_photo ?>" data-name="<?= $solaf_data->employee ?>" data-job="<?= $solaf_data->job_title ?>"><?= $solaf_data->employee ?></option>
        <?php } ?>
      </select>

    </div>
  </div>
</form>
<script>
  var link = $('.current_to_id :selected').attr('data-img');
  var name = $('.current_to_id :selected').attr('data-name');
  var job = $('.current_to_id :selected').attr('data-job');
  $('#empImg').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);
  $('#name-emp').text(name);
  $('#name-emp').text(name);
  $('#job-title').text(job);
</script>
</div>
<?php } ?>


<?php if ($_POST['level'] > 1 && $_POST['level'] <6) { ?>
<div class="col-sm-3 padding-4">
  <table class="table table-bordered s" style="">
    <thead>
      <tr>
        <td colspan="2">
          <img id="empImg" src="<?php echo base_url(); ?>/asisst/fav/apple-icon-120x120.png"
          class="center-block img-responsive" style="width: 180px; height: 150px"/>
        </td>
      </tr>
    </thead>
    <tbody>
      <tr class="greentd">
        <td class="text-center">الإسم</td>
      </tr>

      <tr>
        <td id="name-emp" class="text-center">غير محدد</td>
      </tr>
      <tr class="greentd">
        <td class="text-center">الوظيفة</td>
      </tr>
      <tr>
        <td id="job-title" class="text-center">غير محدد</td>
      </tr>
    </tbody>
  </table>
</div>
<?php } ?>
</div>
<div class="modal-footer" style="display: inline-block;width: 100%;">
  <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 1) { ?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form1').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>

  <?php } ?>
  <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 2) { ?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form2').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>

  <?php } ?>

  <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 3) { ?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form3').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>

  <?php } ?>


  <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 4) { ?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form4').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>

  <?php } ?>

  <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 5) { ?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form5').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>

  <?php } ?>

  <button type="button" class="btn btn-danger btn-labeled" onclick="$('#transform').modal('hide')"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق</button>
</div>


<!------------------------------------------js-------------------------------------------------------->



<!-------------------------------------------js------------------------------------------------------->


<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
  $(function() {
    // setup validate
    $.validate({
      validateHiddenInputs: true // for live search required
    });

  });
</script>









<!-----------------------------js---------------------------->
