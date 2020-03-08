

<div class="modal-body row">
     <div>
       <!--eslam 
              <?php if($agaza_level == 1){ ?>
<label>الموظف البديل</label>
           <table border="1"  cellpadding="3" cellspacing="0"  style="width:100%">
                 <tbody>
                 <tr>
                     <td colspan="4"></td>
                 </tr>
                 <tr>
                     <td colspan="2">إسم الموظف/<?= $personal_data->employee ?></td>
                     <td>التوقيع/</td>
                     <td>التاريخ/<?= date('Y-m-d') ?></td>
                 </tr>
                 <tr>
                     <td colspan="4" style="background-color:#e6eed5; border-color:#73b300" >
                         <input type="radio"name="action1"  disabled <?php if($agaza_data->action_emp_badel ==1){  echo 'checked '; }?> value="1">أتعهد
                         بأن أقوم بإستلام جميع الأعمال الموكلة للموظف المذكور أعلاه قبل موعد أجازته وتنفيذها في
                         مواعيدها<br>
                         <input type="radio" name="action1" disabled <?php if($agaza_data->action_emp_badel ==2){  echo 'checked '; }?>
                                value="2"><input size="60" type="text" name="reason_action" disabled
                                                 value="<?php if($agaza_data->action_emp_badel ==2){
                                                     echo$agaza_data->reason_action; }?>"
                                                 style="border: none; background-color: rgba(0, 0, 0, 0);"></td>
                 </tr>

                 </tbody>
             </table>
             
         <?php } ?>
         <br>
         <?php if($agaza_level == 2){?>
             <label>المدير المباشر</label>
         <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
             <tbody>
             <tr>
                 <td colspan="4"></td>
             </tr>

             <tr>
                 <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                     <input type="radio" name="action2"  disabled
                         <?php if($agaza_data->action_direct_manager ==1){  echo 'checked '; }?>

                            value="1">أوافق على أجازة الموظف المذكور أعلاه وسيتم تسليم أعماله
                     للموظف البديل<br>
                     <input type="radio" name="action2" disabled

                         <?php if($agaza_data->action_direct_manager ==2){  echo 'checked '; }?>
                            value="2"> لا أوافق بسبب
                     <input size="60" type="text" name="reason_action" disabled value="

                             <?php if($agaza_data->action_direct_manager ==2){
                                 echo$agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?>"></td>
             </tr>
             <tr>
                 <td colspan="2">الإسم/<?= $agaza_data->direct_manager_n; ?></td>
                 <td>التوقيع/</td>
                 <td>التاريخ/<?= date('Y-m-d') ?></td>
             </tr>
             </tbody>
         </table>
         <?php } ?>

         <br> <br>
         <?php if($agaza_level == 3){?>
             <label>إفادة شئون الموظفين</label>
         <table border="1" cellpadding="3" cellspacing="0" style="width:100%">

             <thead>
             <tr class="info">
                 <th>سبق له التمتع ب</th>
                 <th>عدد أيام الأجازة المستحقة</th>
                 <th>عدد أيام الأجازة المطلوبة</th>
                 <th>الرصيد المتبقي من الأجازة</th>
             </tr>
             </thead>
             <tbody>


             <tr>
                 <td> ()أيام/يوما</td>
                 <td>()أيام/يوما</td>
                 <td>()أيام/يوما</td>
                 <td>()أيام/يوما</td>
             </tr>
             <tr>
                 <td colspan="2">الموظف المختص/<?= $level_2data->to_user_n ?></td>
                 <td>التوقيع/</td>
                 <td>التاريخ/<?= $level_2data->date_ar ?></td>
             </tr>
             <tr>
                 <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                     <input type="radio" name="action3"  disabled
                         <?php if($agaza_data->action_mowazf_moktas ==1){  echo 'checked '; }?>
                            value="1">أوافق<br>
                     <input type="radio" name="action3" disabled
                         <?php if($agaza_data->action_mowazf_moktas ==2){  echo 'checked '; }?>
                            value="2"> لا أوافق بسبب
                     <input size="60" type="text" name="reason_action" disabled value="
                       <?php if($agaza_data->action_mowazf_moktas ==2){  echo $agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?> "></td>
             </tr>
             </tbody>
         </table>

         <?php } ?>
         <br> <br>
         <?php if($agaza_level == 4){?>
             <label>مدير الموارد البشرية والشئون الإدارية</label>
         <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
             <tbody>
             <tr>
                 <td colspan="4"></td>
             </tr>

             <tr>
                 <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                     <input type="radio" name="action4" disabled

                         <?php if($agaza_data->action_moder_hr ==1){  echo 'checked '; }?>
                            value="1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
                     مانع من تمتع الموظف بالأجازة<br>
                     <input type="radio" name="action4" disabled

                         <?php if($agaza_data->action_moder_hr ==2){  echo 'checked '; }?>
                            value="2"> لا أوافق بسبب
                     <input size="60" type="text" name="reason_action" disabled value="
                        <?php if($agaza_data->action_moder_hr ==2){  echo $agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?>"></td>
             </tr>
             <tr>
                 <td colspan="2">الإسم/<?= $level_3data->to_user_n ?></td>
                 <td>التوقيع/</td>
                 <td>التاريخ/<?= $level_3data->date_ar ?></td>
             </tr>
             </tbody>
         </table>


         <?php } ?>
         <br> <br>
         <?php if($agaza_level ==6){?>

             <label>مدير عام الجمعية</label>
         <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
             <tbody>
             <tr>
                 <td colspan="4"></td>
             </tr>

             <tr>
                 <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                     <input type="radio" name="action5" disabled
                         <?php  if( $agaza_data->action_moder_final ==1 ){ echo 'checked'; } ?>
                            value="1">أوافق<br>
                     <input type="radio" name="action5" disabled
                            <?php if($agaza_data->action_moder_final ==2){
                                echo 'checked '; }?> value="2"> لا أوافق بسبب
                     <input size="60" type="text" name="reason_action" disabled value="
   <?php if($agaza_data->action_moder_final ==2){
      echo $agaza_data->reason_action; }else{ ?>
   ................... <?php } ?>"></td>
             </tr>
             <tr>
                 <td colspan="2">الإسم/<?= $level_4data->to_user_n ?></td>
                 <td>التوقيع/</td>
                 <td>التاريخ/<?= $level_4data->date_ar ?></td>
             </tr>
             </tbody>
         </table>

         <?php } ?>
     </div>


-->
<?php 
echo 'toUser = '. $_POST['level'] .'<br/>';
echo 'user_id = '. $_SESSION['user_id'] .'<br/>';
echo 'level = '. $_POST['level'] .'<br/>';

?>




    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 1) { ?>
        <form enctype="multipart/form-data" method="post" id="form1"
              action="<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/saveTransformBadel">

            <input type="hidden" name="agaza_rkm_fk" id="agaza_rkm_fk" value="<?= $agaza_data->agaza_rkm ?>">
            <input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">
            <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
            <input type="hidden" name="to_user" id="to_user" value="<?= $agaza_data->direct_manager_id_fk ?>">
            <input type="hidden" name="to_user_n" id="to_user_n" value="<?= $agaza_data->direct_manager_n ?>">
            <input type="hidden" name="level" id="level" value="1">
            <input type="hidden" name="approved" id="approved">
            <div class="col-sm-12" id="html">
                <table border="1" cellpadding="3" cellspacing="0"  style="width:100%">
                    <tbody>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td colspan="2">الإسم/<?= $personal_data->employee ?></td>
                        <td>التوقيع/</td>
                        <td>التاريخ/<?= date('Y-m-d') ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300"><input type="radio"
                                                                                                      name="action"
                                                                                                      value="1">أتعهد
                            بأن أقوم بإستلام جميع الأعمال الموكلة للموظف المذكور أعلاه قبل موعد أجازته وتنفيذها في
                            مواعيدها<br>
                            <input type="radio" name="action"
                                   value="2"><input size="60" type="text" name="reason_action"
                                                    value="........................................"
                                                    style="border: none; background-color: rgba(0, 0, 0, 0);"></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </form>
    <?php } ?>


    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 2) { ?>
    <br>
    <form enctype="multipart/form-data" method="post" id="form2"
          action="<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/saveTransformDirectManger">
        <input type="hidden" name="agaza_rkm_fk" id="agaza_rkm_fk" value="<?= $agaza_data->agaza_rkm ?>">
        <input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">
        <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
        <input type="hidden" name="level" id="level" value="2">
        <input type="hidden" name="approved" id="approved">
        <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
            <tr>
                <td colspan="4"></td>
            </tr>

            <tr>
                <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                    <input type="radio" name="action" value="1">أوافق على أجازة الموظف المذكور أعلاه وسيتم تسليم أعماله
                    للموظف البديل<br>
                    <input type="radio" name="action" value="2"> لا أوافق بسبب
                    <input size="60" type="text" name="reason_action" value=" ..................."></td>
            </tr>
            <tr>
                <td colspan="2">الإسم/<?= $personal_data->employee ?></td>
                <td>التوقيع/</td>
                <td>التاريخ/<?= date('Y-m-d') ?></td>
            </tr>
            </tbody>
        </table>
        <div class="col-sm-7">
            <div class="form-group col-md-12 col-sm-6 padding-4">
                <label class="label top-label">الإدارة</label>
                <select data-validation="required" name="admins" id="admins" class="form-control bottom-input">
                    <option value="1"> إدارة الشئون الإدارية</option>
                </select>
            </div>

            <div class="form-group col-md-12 col-sm-6 padding-4">
                <label class="label top-label">الموظف</label>
                <select data-validation="required" name="current_to_id" id="current_to_id"
                        class="form-control bottom-input " onchange="
                        var link =$('#current_to_id :selected').attr('data-img');
                        var name =$('#current_to_id :selected').attr('data-name');
                        var job =$('#current_to_id :selected').attr('data-job');
                        $('#empImg').attr('src','<?php echo base_url() . "uploads/images/"; ?>'+ link);
                        $('#name-emp').text(name);
                        $('#name-emp').text(name);
                        $('#job-title').text(job);
                        ">
                    <option value="">إختر</option>
                    <?php if (!empty($department_emps)) {
                        foreach ($department_emps as $row) { ?>
                            <option value="<?= $row->id ?>"
                                    data-img="<?= $row->personal_photo ?>"
                                    data-name="<?= $row->employee ?>"
                                    data-job="<?= $row->job_title ?>"
                            ><?= $row->employee ?></option>
                        <?php }
                    } ?>
                </select>

            </div>
        </div>
        <?php } ?>

        <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 3) { ?>
            <br>
            <form enctype="multipart/form-data" method="post" id="form3"
                  action="<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/saveTransformDirectManger">
                <input type="hidden" name="agaza_rkm_fk" id="agaza_rkm_fk" value="<?= $agaza_data->agaza_rkm ?>">
                <input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">
                <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">

                <input type="hidden" name="level" id="level" value="3">
                <input type="hidden" name="approved" id="approved">
                <table border="1" cellpadding="3" cellspacing="0" style="width:100%">

                    <thead>
                    <tr class="info">
                        <th>سبق له التمتع ب</th>
                        <th>عدد أيام الأجازة المستحقة</th>
                        <th>عدد أيام الأجازة المطلوبة</th>
                        <th>الرصيد المتبقي من الأجازة</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td> ()أيام/يوما</td>
                        <td>()أيام/يوما</td>
                        <td>()أيام/يوما</td>
                        <td>()أيام/يوما</td>
                    </tr>
                    <tr>
                        <td colspan="2">الموظف المختص/<?= $mokhtas_data->employee ?></td>
                        <td>التوقيع/</td>
                        <td>التاريخ/<?= date('Y-m-d') ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                            <input type="radio" name="action" value="1">أوافق<br>
                            <input type="radio" name="action" value="2"> لا أوافق بسبب
                            <input size="60" type="text" name="reason_action" value=" ..................."></td>
                    </tr>
                    </tbody>
                </table>

                <div class="col-sm-7">
                    <div class="form-group col-md-12 col-sm-6 padding-4">
                        <label class="label top-label">الإدارة</label>
                        <select data-validation="required" name="admins" id="admins" class="form-control bottom-input">
                            <option value="1"> إدارة الشئون الإدارية</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 col-sm-6 padding-4">
                        <label class="label top-label">الموظف</label>
                        <select data-validation="required" name="current_to_id" id="current_to_id"
                                class="form-control bottom-input " onchange="
                                var link =$('#current_to_id :selected').attr('data-img');
                                var name =$('#current_to_id :selected').attr('data-name');
                                var job =$('#current_to_id :selected').attr('data-job');
                                $('#empImg').attr('src','<?php echo base_url() . "uploads/images/"; ?>'+ link);
                                $('#name-emp').text(name);
                                $('#name-emp').text(name);
                                $('#job-title').text(job);
                                ">
                            <option value="">إختر</option>
                            <?php if (!empty($sho2on_edaria)) {
                                foreach ($sho2on_edaria as $row) { ?>
                                    <option value="<?= $row->id ?>"
                                            data-img="<?= $row->personal_photo ?>"
                                            data-name="<?= $row->employee ?>"
                                            data-job="<?= $row->job_title ?>"
                                    ><?= $row->employee ?></option>
                                <?php }
                            } ?>
                        </select>

                    </div>
                </div>
            </form>
        <?php } ?>



        <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 4) { ?>
            <br>
            <form enctype="multipart/form-data" method="post" id="form4"
                  action="<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/saveTransformToManger">
                <input type="hidden" name="agaza_rkm_fk" id="agaza_rkm_fk" value="<?= $agaza_data->agaza_rkm ?>">
                <input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">
                <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
                <!-- <input type="hidden" name="to_user" id="to_user" value="<?= $agaza_data->direct_manager_id_fk ?>">
        <input type="hidden" name="to_user_n" id="to_user_n" value="<?= $agaza_data->direct_manager_n ?>">-->
                <input type="hidden" name="level" id="level" value="4">
                <input type="hidden" name="approved" id="approved">
                <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
                    <tbody>
                    <tr>
                        <td colspan="4"></td>
                    </tr>

                    <tr>
                        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                            <input type="radio" name="action" value="1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
                            مانع من تمتع الموظف بالأجازة<br>
                            <input type="radio" name="action" value="2"> لا أوافق بسبب
                            <input size="60" type="text" name="reason_action" value=" ..................."></td>
                    </tr>
                    <tr>
                        <td colspan="2">الإسم/<?= $personal_data->employee ?></td>
                        <td>التوقيع/</td>
                        <td>التاريخ/<?= date('Y-m-d') ?></td>
                    </tr>
                    </tbody>
                </table>
                <div class="col-sm-7">
                    <div class="form-group col-md-12 col-sm-6 padding-4">
                        <label class="label top-label">الإدارة</label>
                        <select data-validation="required" name="admins" id="admins" class="form-control bottom-input">
                            <option value="1"> إدارة الشئون الإدارية</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 col-sm-6 padding-4">
                        <label class="label top-label">الموظف</label>
                        <select data-validation="required" name="current_to_id" id="current_to_id"
                                class="form-control bottom-input " onchange="
                                var link =$('#current_to_id :selected').attr('data-img');
                                var name =$('#current_to_id :selected').attr('data-name');
                                var job =$('#current_to_id :selected').attr('data-job');
                                $('#empImg').attr('src','<?php echo base_url() . "uploads/images/"; ?>'+ link);
                                $('#name-emp').text(name);
                                $('#name-emp').text(name);
                                $('#job-title').text(job);
                                ">
                            <option value="">إختر</option>
                            <?php if (!empty($modeer_3am)) {
                                foreach ($modeer_3am as $row) { ?>
                                    <option value="<?= $row->id ?>"
                                            data-img="<?= $row->personal_photo ?>"
                                            data-name="<?= $row->employee ?>"
                                            data-job="<?= $row->job_title ?>"
                                    ><?= $row->employee ?></option>
                                <?php }
                            } ?>
                        </select>

                    </div>
                </div>
            </form>
        <?php } ?>

        <br><br>


        <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 5) { ?>
            <br>
            <form enctype="multipart/form-data" method="post" id="form5"
                  action="<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/saveTransformManger">
                <input type="hidden" name="agaza_rkm_fk" id="agaza_rkm_fk" value="<?= $agaza_data->agaza_rkm ?>">
                <input type="hidden" name="agaza_id_fk" id="agaza_id_fk" value="<?= $agaza_data->id ?>">
                <input type="hidden" name="from_user" id="from_user" value="<?= $_POST['toUser'] ?>">
                <!-- <input type="hidden" name="to_user" id="to_user" value="<?= $agaza_data->direct_manager_id_fk ?>">
        <input type="hidden" name="to_user_n" id="to_user_n" value="<?= $agaza_data->direct_manager_n ?>">-->
                <input type="hidden" name="level" id="level" value="5">
                <input type="hidden" name="approved" id="approved">
                <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
                    <tbody>
                    <tr>
                        <td colspan="4"></td>
                    </tr>

                    <tr>
                        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                            <input type="radio" name="action" value="1">أوافق<br>
                            <input type="radio" name="action" value="2"> لا أوافق بسبب
                            <input size="60" type="text" name="reason_action" value=" ..................."></td>
                    </tr>
                    <tr>
                        <td colspan="2">الإسم/<?= $personal_data->employee ?></td>
                        <td>التوقيع/</td>
                        <td>التاريخ/<?= date('Y-m-d') ?></td>
                    </tr>
                    </tbody>
                </table>
                <div class="col-sm-7">
                    <div class="form-group col-md-12 col-sm-6 padding-4">
                        <label class="label top-label">الإدارة</label>
                        <select data-validation="required" name="admins" id="admins" class="form-control bottom-input">
                            <option value="1"> إدارة الشئون الإدارية</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 col-sm-6 padding-4">
                        <label class="label top-label">الموظف</label>
                        <select data-validation="required" name="current_to_id" id="current_to_id"
                                class="form-control bottom-input  current_to_id" onchange="">
                            <?php if (!empty($agaza_data->emp_id_fk)) { ?>
                                <option value="<?= $agaza_data->emp_id_fk ?>"

                                        data-img="<?= $agaza_data->personal_photo ?>"
                                        data-name="<?= $agaza_data->employee ?>"
                                        data-job="<?= $agaza_data->job_title ?>"
                                ><?= $agaza_data->employee ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
            </form>
            <script>

                var link = $('.current_to_id :selected').attr('data-img');
                var name = $('.current_to_id :selected').attr('data-name');
                var job = $('.current_to_id :selected').attr('data-job');
                $('#empImg').attr('src', '<?php echo base_url() . "uploads/images/"; ?>' + link);
                $('#name-emp').text(name);
                $('#name-emp').text(name);
                $('#job-title').text(job);

            </script>
        <?php } ?>


        <?php if ($_POST['level'] > 0 && $_POST['level'] != 5) { ?>
            <div class="col-sm-5">
                <table class="table table-bordered" style="">
                    <thead>
                    <tr>
                        <td colspan="2">
                            <img id="empImg" src="http://demo.abnaa-sa.org/asisst/fav/apple-icon-120x120.png"
                                 class="center-block img-responsive" style="width: 180px; height: 150px">
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="background-color: #eee;" class="text-center">الإسم</td>
                    </tr>
                    <tr>
                        <td id="name-emp" class="text-center"></td>
                    </tr>
                    <tr>
                        <td style="background-color: #eee;" class="text-center">الوظيفة</td>
                    </tr>
                    <tr>
                        <td id="job-title" class="text-center"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
</div>
<div class="modal-footer">
    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 1) { ?>
        <button type="button" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form1').submit();" class="btn btn-success">حفظ
        </button>

    <?php } ?>
    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 2) { ?>
        <button type="button" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form2').submit();" class="btn btn-success">حفظ
        </button>

    <?php } ?>

    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 3) { ?>
        <button type="button" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form3').submit();" class="btn btn-success">حفظ
        </button>

    <?php } ?>


    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 4) { ?>
        <button type="button" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form4').submit();" class="btn btn-success">حفظ
        </button>

    <?php } ?>

    <?php if ($_POST['toUser'] == $_SESSION['user_id'] && $_POST['level'] == 5) { ?>
        <button type="button" onclick="
        var status = $('input[name=action]:checked').val();

        $('#approved').val(status);$('#form5').submit();" class="btn btn-success">حفظ
        </button>

    <?php } ?>

    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
</div>


<!------------------------------------------js-------------------------------------------------------->


<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>


<!-------------------------------------------js------------------------------------------------------->
