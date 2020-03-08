<style>
    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }
</style>
<?php $arr_select_lable = array(2=>'الموظف المختص في الشئون الإدارية:',
3=>'مدير الموارد البشرية',
4=>'مدير العام'); ?>

<div class="modal-body">
    <div class="col-sm-9 padding-4">

        <form enctype="multipart/form-data" method="post" id="form1" action="<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/saveTransform">
          <?php if (isset($_POST['from_profile'])&&($_POST['from_profile'] == 1)) { ?>
          <input type="hidden" name="from_profile" id="from_profile" value="1">
          <?php } ?>
            <input type="hidden" name="agaza_rkm_fk" id="agaza_rkm_fk" value="<?= $agaza_data->agaza_rkm ?>">
            <input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">
            <input type="hidden" name="from_user" id="from_user" value="<?= $agaza_data->current_to_user_id ?>">
            <input type="hidden" name="emp_id_fk" id="emp_id_fk" value="<?= $agaza_data->emp_id_fk ?>">


            <input type="hidden" name="" id="accept_emp_name" value="<?= $agaza_data->current_to_user_name ?>">
            <input type="hidden" name="" id="accept_emp_jop" value="<?= $agaza_data->emp_to_job ?>">
            <input type="hidden" name="" id="accept_emp_photo" value="<?= $agaza_data->emp_to_photo ?>">

            <input type="hidden" name="" id="not_accept_emp_name" value="<?= $agaza_data->employee ?>">
            <input type="hidden" name="" id="not_accept_emp_jop" value="<?= $agaza_data->job_title ?>">
            <input type="hidden" name="" id="not_accept_emp_photo" value="<?= $agaza_data->personal_photo ?>">




            <div class="col-sm-12 padding-4" id="html">
                <?php if ($agaza_data->current_to_user_id == $_SESSION['user_id'] && $agaza_data->level == 1) { ?>
                        <input type="hidden" name="level" id="level" value="2">
                        <!-- current_to_id -->
                        <input type="hidden" name="current_to_id" id="current_to_id" value="<?= $agaza_data->direct_manager_id_fk ?>">

                        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                            <tbody>

                                <tr>
                                    <td>الإسم: <?= $agaza_data->emp_badel_n ?></td>
                                    <td>التوقيع: <?= $agaza_data->emp_badel_n ?></td>
                                    <td>التاريخ: <?= date('d-m-Y') ?></td>
                                </tr>

                                <tr>
                                    <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                                        <div class="radio-content">
                                            <input type="radio" onclick="change_photo(1);
                                            $('#reason_action1').attr('disabled','TRUE');
                                            $('#current_to_id').attr('data-validation','required');
                                    $('#reason_action1').val('................');" id="tahod-1" data-validation="required" name="action" value="1">
                                            <label class="radio-label" for="tahod-1">أتعهد
                                                بأن أقوم بإستلام جميع الأعمال الموكلة للموظف المذكور أعلاه قبل موعد أجازته وتنفيذها في
                                                مواعيدها</label>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                                        <div class="radio-content">
                                            <input type="radio" name="action" onclick="change_photo(2);
                                            $('#reason_action1').removeAttr('disabled');
                                            $('#current_to_id').removeAttr('data-validation');" id="tahod-2" data-validation="required" value="2">


                                            <label class="radio-label" for="tahod-2">لا أوافق بسبب

                                                <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">
                                            </label>
                                        </div>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

                <?php } ?>
                 <?php if ($agaza_data->current_to_user_id == $_SESSION['user_id'] && ($agaza_data->level == 2 )) { ?>
                <input type="hidden" name="level" id="level" value="<?=$agaza_data->level+1?>">
                    <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                        <tbody>
                            <tr>
                                <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                                    <div class="radio-content">
                                        <input type="radio" id="accept-1" data-validation="required"
                                         name="action" onclick="change_photo(1);
                                $('#reason_action2').val('...........');
                            $('#current_to_id').attr('data-validation','required');
                                $('#reason_action2').attr('disabled',true);" value="1">


                                        <label class="radio-label" for="accept-1"> أوافق على أجازة الموظف المذكور أعلاه وسيتم تسليم أعماله
                                            للموظف البديل </label>

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                                    <div class="radio-content">
                                        <input type="radio" name="action" data-validation="required" id="accept-2"
                                        onclick="change_photo(2);
                                        $('#current_to_id').removeAttr('data-validation');
                                        $('#reason_action2').removeAttr('disabled'); " value="2">

                                        <label class="radio-label" for="accept-2"> لا أوافق بسبب </label>
                                    </div>


                                    <input size="60" type="text" disabled name="reason_action" id="reason_action2" value=" ...................">



                                </td>
                            </tr>
                            <tr>
                                <td>الإسم:<?= $agaza_data->direct_manager_n ?></td>
                                <td>التوقيع:</td>
                                <td>التاريخ:<?= date('d-m-Y') ?></td>
                            </tr>
                        </tbody>
                    </table>
                 <?php } ?>
                 <?php if ($agaza_data->current_to_user_id == $_SESSION['user_id'] && ($agaza_data->level == 4 || $agaza_data->level == 3)) { ?>
                <input type="hidden" name="level" id="level" value="<?=$agaza_data->level+1?>">
                    <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">

                        <thead>
                            <tr class="info">
                                <th>سبق له التمتع ب </th>
                                <th>عدد أيام الأجازة المستحقة</th>
                                <th>عدد أيام الأجازة المطلوبة</th>
                                <th>الرصيد المتبقي من الأجازة</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> (<?php echo $agaza_data->past_vacations;?>)أيام/يوما</td>
                                <td>(<?php echo   $agaza_data->rseed_vacations;?>)أيام/يوما</td>
                                <td>(<?php echo   $agaza_data->num_days;?>)أيام/يوما</td>
                                <td>(<?php echo ($agaza_data->rseed_vacations - $agaza_data->num_days);?>)أيام/يوما</td>
                            </tr>
                            <?php if ($agaza_data->current_to_user_id == $_SESSION['user_id'] && ( $agaza_data->level == 3)) { ?>

                            <tr>
                                <td colspan="2">الموظف المختص/<?= $agaza_data->current_to_user_name ?></td>
                                <td>التوقيع:</td>
                                <td>التاريخ:<?= date('d-m-Y') ?></td>
                            </tr>
                               <tr>
                                <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                    <div class="radio-content">
                                        <input type="radio" id="accept-1" data-validation="required" name="action" 
                                        onclick="change_photo(1)
                                    $('#reason_action3').val('...........');
                                    $('#reason_action3').attr('disabled','disabled');
                                    $('#current_to_id').attr('data-validation','required');" value="1">


                                        <label class="radio-label" for="accept-1">أوافق</label>

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                                    <div class="radio-content">
                                        <input type="radio" name="action" data-validation="required" id="accept-2"
                                        onclick="change_photo(2);$('#reason_action3').removeAttr('disabled');$('#current_to_id').removeAttr('data-validation'); " value="2">

                                        <label class="radio-label" for="accept-2" > لا أوافق بسبب </label>
                                    </div>

                                    <input size="60" type="text" disabled name="reason_action" id="reason_action3" value=" ...................">

                                </td>
                            </tr>
                            <?php } ?>
                            <?php if ($agaza_data->current_to_user_id == $_SESSION['user_id'] && ( $agaza_data->level == 4)) { ?>
                                <tr>
                                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                        <div class="radio-content">
                                            <input type="radio" id="accept-1" data-validation="required" 
                                            name="action" onclick="change_photo(1)
                                        $('#reason_action4').val('...........');
                                        $('#reason_action4').attr('disabled',true);
                                        $('#current_to_id').attr('data-validation','required');" value="1">


                                            <label class="radio-label" for="accept-1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
                                                مانع من تمتع الموظف بالأجازة</label>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                                        <div class="radio-content">
                                            <input type="radio" name="action" data-validation="required" id="accept-2" onclick="change_photo(2);
                                            $('#reason_action4').removeAttr('disabled'); " value="2">

                                            <label class="radio-label" for="accept-2" onclick="change_photo(2);
                                        $('#reason_action4').removeAttr('disabled');
                                        $('#current_to_id').removeAttr('data-validation');"> لا أوافق بسبب </label>
                                        </div>

                                        <input size="60" type="text" disabled name="reason_action" id="reason_action4" value=" ...................">

                                    </td>
                                </tr>
                                <!---------------------------------------------->
                                <tr>
                                    <td>الإسم:<?= $agaza_data->current_to_user_name ?></td>
                                    <td>التوقيع:</td>
                                    <td>التاريخ:<?= date('d-m-Y') ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php } ?> 
                <?php if ($agaza_data->current_to_user_id == $_SESSION['user_id'] && ($agaza_data->level == 5 )) { ?>
                        <input type="hidden" name="level" id="level" value="<?=$agaza_data->level+1?>">
                        <input type="hidden" name="current_to_id" id="current_to_id" value="<?= $agaza_data->emp_id_fk ?>">


                    <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                        <tbody>

                            <tr>
                                <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                    <div class="radio-content">
                                        <input type="radio" id="accept-1"  name="action" 
                                        onclick="$('#reason_action5').val('...........'); 
                                                    $('#reason_action5').attr('disabled',true);
                                                    change_photo(1)
                                                    " value="1">
                                        <label class="radio-label" for="accept-1">أوافق</label>

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                                    <div class="radio-content">
                                        <input type="radio" name="action"  id="accept-2" 
                                        onclick="$('#reason_action5').removeAttr('disabled');  change_photo(2)" value="2">

                                        <label class="radio-label" for="accept-2" onclick="$('#reason_action5').removeAttr('disabled');
                                        "> لا أوافق بسبب </label>
                                    </div>

                                    <input size="60" type="text" disabled name="reason_action" id="reason_action5" value=" ...................">

                                </td>
                            </tr>
                            <!---------------------------------------------->



                            <tr>
                                <td>الإسم:<?= $agaza_data->current_to_user_name ?></td>
                                <td>التوقيع:</td>
                                <td>التاريخ:<?= date('d-m-Y') ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?> 

                <?php if(key_exists($agaza_data->level, $arr_select_lable)){ ?>
                        <div class="form-group col-md-6 col-sm-6 padding-4">
                            <label class="label"><?php  echo $arr_select_lable[$agaza_data->level];?></label>
                            <select data-validation="required" name="current_to_id" id="current_to_id" class="form-control" aria-required="true" onchange="
                                    var link =$('#current_to_id :selected').attr('data-img');
                                    var name =$('#current_to_id :selected').attr('data-name');
                                    var job =$('#current_to_id :selected').attr('data-job');
                                    $('#empImg').attr('src','<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>'+ link);
                                    $('#name-emp').text(name);
                                    $('#to_user_n').val(name);
                                    $('#job-title').text(job);
                                    ">
                                <option value="">إختر</option>
                                <?php if (isset($employees_data)&&!empty($employees_data)) {
                                    foreach ($employees_data as $row) { ?>
                                <option value="<?= $row->person_id ?>" data-img="<?= $row->person_img ?>" data-name="<?= $row->person_name ?>" data-job="<?= $row->job_title_n ?>"><?= $row->person_name ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>
                <?php } ?>
            </div>
        </form>

    </div>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg" src="<?php echo base_url(); ?>/asisst/fav/apple-icon-120x120.png" class="center-block img-responsive" style="width: 180px; height: 150px">
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class="greentd">
                    <td class="text-center">الإسم</td>
                </tr>
                <tr>
                    <td id="name-emp" class="text-center"></td>
                </tr>
                <tr class="greentd">
                    <td class="text-center">الوظيفة</td>
                </tr>
                <tr>
                    <td id="job-title" class="text-center"></td>
                </tr>
            </tbody>
        </table>
    </div>
<div class="modal-footer" style="display: inline-block;width: 100%;">
<?php if ($agaza_data->current_to_user_id == $_SESSION['user_id'] && (in_array($agaza_data->level, array(1,2,3,4,5))   )) { ?>
    <button type="button" style="float: right;" onclick="check_action()"  class="btn btn-success btn-labeled">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>
<?php } ?>
    <button type="button" class="btn btn-danger btn-labeled" onclick="$('#transform').modal('hide')"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق</button>
</div>


<!------------------------------------------js-------------------------------------------------------->
      <script>
            function change_photo(value) {
                if (value == 1) {
                    var link = $('#accept_emp_photo').val();
                    var name = $('#accept_emp_name').val();
                    var job = $('#accept_emp_jop').val();
                    // var emp_id = $('#emp_id').val();
                    $('#name-emp').text(name);
                    $('#job-title').text(job);
                    $('#empImg').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);


                } else if (value == 2) {
                    var link = $('#not_accept_emp_photo').val();
                    var name = $('#not_accept_emp_name').val();
                    var job = $('#not_accept_emp_jop').val();
                    // var emp_id = $('#emp_id').val();
                    $('#name-emp').text(name);
                    $('#job-title').text(job);
                    $('#empImg').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"; ?>' + link);

                }
            }
        </script>
 <script>
function check_action() {
    var selected = $("input[type='radio'][name='action']:checked");
    if (selected.length > 0) {
        $('#form1').submit(); 
   } else {
        swal({
            title: 'من فضلك  حدد ردك على الطلب  ',
            type: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'تم'
        });

    }

}
 </script>
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

