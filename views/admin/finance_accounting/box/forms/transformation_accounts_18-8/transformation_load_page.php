<style>
  .nonactive {
    pointer-events: none;
    cursor: not-allowed;
  }
</style>

<div class="modal-body">



  <div class="col-sm-9 padding-4">


    <!---->



<!--$_POST['toUser'] == $_SESSION['user_id'] &&---->
    <?php if (  $transformation_data->level == 0) { ?>
      <form enctype="multipart/form-data" method="post" id="form" action="<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/saveToMohaseb">
      <input type="hidden" name="process_rkm" id="process_rkm" value="<?= $transformation_data->process_rkm ?>">
        <input type="hidden" name="from_user" id="from_user" value="<?= $transformation_data->user_id ?>">
        <input type="hidden" name="level" id="level" value="1">
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
                         $('#reason_action2').attr('disabled',true);
                         $('#current_to_mohaseb').attr('data-validation','required');" value="1">


                  <label class="radio-label" for="accept-1">أوافق</label>

                </div>
              </td>
            </tr>

            <tr>
              <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                <div class="radio-content">
                  <input type="radio" name="action" data-validation="required" id="accept-2" onclick="change_photo_Mohaseb(2);
                  $('#reason_action2').removeAttr('disabled');
                  $('#current_to_mohaseb').removeAttr('data-validation');" value="2">

                  <label class="radio-label" for="accept-2"> لا أوافق بسبب </label>
                </div>


                <input size="60" type="text" disabled name="reason_action" id="reason_action2" value=" ...................">



              </td>
            </tr>
            <!----<tr>
              <td>الإسم/</td>
              <td>التوقيع/</td>
              <td>التاريخ/<?= date('d-m-Y') ?></td>
            </tr>---->
          </tbody>
        </table>
        <script>
          function change_photo_Mohaseb(value) {
            if (value == 1) {
              $('#MohasebDiv').show();
              $('#empImg').attr('src', '<?php echo base_url() . "asisst/fav/apple-icon-120x120.png"; ?>');
              $('#name-emp').text('غير محدد');
              $('#job-title').text('غير محدد');

            } else if (2) {
              $('#MohasebDiv').hide();
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

        <div class="col-sm-12 no-padding" id="MohasebDiv">

          <div class="form-group col-md-6 col-sm-6 padding-4">
            <label class="label">الموظف</label>
            <select data-validation="required" name="current_to_id" id="current_to_mohaseb" class="form-control" data-validation="required" aria-required="true" onchange="
                            var link =$('#current_to_mohaseb :selected').attr('data-img');
                            var name =$('#current_to_mohaseb :selected').attr('data-name');
                            var job =$('#current_to_mohaseb :selected').attr('data-job');
                            $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                            $('#name-emp').text(name);
                            $('#name-emp').text(name);
                            $('#job-title').text(job);
                            ">
              <option value="">إختر</option>
              <?php if (!empty($mohaseb)) {
                            foreach ($mohaseb as $row) { ?>
              <option value="<?= $row->emp_id ?>" data-img="<?= $row->person_img ?>" data-name="<?= $row->person_name ?>" data-job="<?= $row->job_title ?>"><?= $row->person_name ?></option>
              <?php }
                        } ?>
            </select>

          </div>
        </div>

      </form>

  </div>


  <?php } ?>






  <?php if ( $_POST['toUser'] == $_SESSION['user_id'] && $transformation_data->level == 1) { ?>
    <form enctype="multipart/form-data" method="post" id="form2" action="<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/saveToModer_malia">
    <input type="hidden" name="process_rkm" id="process_rkm" value="<?= $transformation_data->process_rkm ?>">
        <!--<input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">---->
      <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
      <input type="hidden" name="level" id="level" value="2">
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
                <input type="radio" id="accept-1" data-validation="required" name="action" onclick="change_photo_Moder_malia(1);
                      $('#reason_action2').val('...........');
                       $('#reason_action2').attr('disabled',true);
                        $('#current_to_Moder_malia').attr('data-validation','required');" value="1">


                <label class="radio-label" for="accept-1">أوافق</label>

              </div>
            </td>
          </tr>

          <tr>
            <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

              <div class="radio-content">
                <input type="radio" name="action" data-validation="required" id="accept-2" onclick="change_photo_Moder_malia(2);
                $('#reason_action2').removeAttr('disabled');
                  $('#current_to_Moder_malia').removeAttr('data-validation'); " value="2">

                <label class="radio-label" for="accept-2"> لا أوافق بسبب </label>
              </div>


              <input size="60" type="text" disabled name="reason_action" id="reason_action2" value=" ...................">



            </td>
          </tr>
          <!----<tr>
            <td>الإسم/</td>
            <td>التوقيع/</td>
            <td>التاريخ/<?= date('d-m-Y') ?></td>
          </tr>---->
        </tbody>
      </table>
      <script>
        function change_photo_Moder_malia(value) {
          if (value == 1) {
            $('#Moder_maliaDiv').show();
            $('#empImg').attr('src', '<?php echo base_url() . "asisst/fav/apple-icon-120x120.png"; ?>');
            $('#name-emp').text('غير محدد');
            $('#job-title').text('غير محدد');

          } else if (2) {
            $('#Moder_maliaDiv').hide();
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

      <div class="col-sm-12 no-padding" id="Moder_maliaDiv">

        <div class="form-group col-md-6 col-sm-6 padding-4">
          <label class="label">الموظف</label>
          <select data-validation="required" name="current_to_id" id="current_to_Moder_malia" class="form-control" data-validation="required" aria-required="true" onchange="
                          var link =$('#current_to_Moder_malia :selected').attr('data-img');
                          var name =$('#current_to_Moder_malia :selected').attr('data-name');
                          var job =$('#current_to_Moder_malia :selected').attr('data-job');
                          $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                          $('#name-emp').text(name);
                          $('#name-emp').text(name);
                          $('#job-title').text(job);
                          ">
            <option value="">إختر</option>
            <?php if (!empty($moder_malia)) {
                          foreach ($moder_malia as $row) { ?>
            <option value="<?= $row->emp_id ?>" data-img="<?= $row->person_img ?>" data-name="<?= $row->person_name ?>" data-job="<?= $row->job_title ?>"><?= $row->person_name ?></option>
            <?php }
                      } ?>
          </select>

        </div>
      </div>

    </form>

</div>


<?php } ?>






  <?php if ( $_POST['toUser'] == $_SESSION['user_id'] && $transformation_data->level == 2) { ?>
    <form enctype="multipart/form-data" method="post" id="form3" action="<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/saveToModer_3am">
    <input type="hidden" name="process_rkm" id="process_rkm" value="<?= $transformation_data->process_rkm ?>">
        <!--<input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">---->
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
                <input type="radio" id="accept-1" data-validation="required" name="action" onclick="change_photo_Moder_3am(1);
                      $('#reason_action2').val('...........');
                       $('#reason_action2').attr('disabled',true);
                       $('#current_to_id_Moder_3am').attr('data-validation','required');" value="1">


                <label class="radio-label" for="accept-1">أوافق</label>

              </div>
            </td>
          </tr>

          <tr>
            <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

              <div class="radio-content">
                <input type="radio" name="action" data-validation="required" id="accept-2" onclick="
                change_photo_Moder_3am(2);
                $('#reason_action2').removeAttr('disabled');
                  $('#current_to_id_Moder_3am').removeAttr('data-validation'); " value="2">

                <label class="radio-label" for="accept-2"> لا أوافق بسبب </label>
              </div>


              <input size="60" type="text" disabled name="reason_action" id="reason_action2" value=" ...................">



            </td>
          </tr>
          <!----<tr>
            <td>الإسم/</td>
            <td>التوقيع/</td>
            <td>التاريخ/<?= date('d-m-Y') ?></td>
          </tr>---->
        </tbody>
      </table>
      <script>
        function change_photo_Moder_3am(value) {
          if (value == 1) {
            $('#Moder_3amDiv').show();
            $('#empImg').attr('src', '<?php echo base_url() . "asisst/fav/apple-icon-120x120.png"; ?>');
            $('#name-emp').text('غير محدد');
            $('#job-title').text('غير محدد');

          } else if (2) {
            $('#Moder_3amDiv').hide();
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

      <div class="col-sm-12 no-padding" id="Moder_3amDiv">

        <div class="form-group col-md-6 col-sm-6 padding-4">
          <label class="label">الموظف</label>
          <select data-validation="required" name="current_to_id" id="current_to_id_Moder_3am" class="form-control" data-validation="required" aria-required="true" onchange="
                          var link =$('#current_to_id_Moder_3am :selected').attr('data-img');
                          var name =$('#current_to_id_Moder_3am :selected').attr('data-name');
                          var job =$('#current_to_id_Moder_3am :selected').attr('data-job');
                          $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                          $('#name-emp').text(name);
                          $('#name-emp').text(name);
                          $('#job-title').text(job);
                          ">
            <option value="">إختر</option>
            <?php if (!empty($moder_3am)) {
                          foreach ($moder_3am as $row) { ?>
            <option value="<?= $row->emp_id ?>" data-img="<?= $row->person_img ?>" data-name="<?= $row->person_name ?>" data-job="<?= $row->job_title ?>"><?= $row->person_name ?></option>
            <?php }
                      } ?>
          </select>

        </div>
      </div>

    </form>

</div>


<?php } ?>










<?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 3) { ?>

<form enctype="multipart/form-data" method="post" id="form4" action="<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/saveToEmp">
    <input type="hidden" name="process_rkm" id="process_rkm" value="<?= $transformation_data->process_rkm ?>">
  <!-- <input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>"> -->
  <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
  <!-- <input type="hidden" name="to_user" id="to_user" value="<?= $agaza_data->direct_manager_id_fk ?>">
        <input type="hidden" name="to_user_n" id="to_user_n" value="<?= $agaza_data->direct_manager_n ?>">-->
  <input type="hidden" name="level" id="level" value="0">
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

<!--

      <tr>
        <td>الإسم/<?= $level_5data->to_user_n ?></td>
        <td>التوقيع/</td>
        <td>التاريخ/<?= date('d-m-Y') ?></td>
      </tr> -->
    </tbody>
  </table>
  <div class="col-sm-12 no-padding">



    <div class="form-group col-md-6 col-sm-6 padding-4">
      <label class="label">الموظف</label>
      <select data-validation="required" name="current_to_id" id="current_to_id" class="form-control bottom-input  nonactive current_to_id" data-validation="required" aria-required="true" onchange="">
        <?php if (!empty($transformation_data->employees_id)) { ?>
        <option value="<?= $transformation_data->employees_id ?>" data-img="<?= $transformation_data->personal_photo ?>" data-name="<?= $transformation_data->employee ?>" data-job="<?= $transformation_data->job_title ?>"><?= $transformation_data->employee ?></option>
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



</div>
<div class="modal-footer" style="display: inline-block;width: 100%;">
    <?php if (  $transformation_data->level == 0) { ?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>
<?php }elseif ($transformation_data->level == 1) {?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form2').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>
<?php }elseif ($transformation_data->level == 2) {?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form3').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>
<?php }elseif ($transformation_data->level == 3) {?>
  <button type="button" style="float: right;" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form4').submit();" class="btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
  </button>
<?php } ?>
  <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal" ><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق</button>
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
