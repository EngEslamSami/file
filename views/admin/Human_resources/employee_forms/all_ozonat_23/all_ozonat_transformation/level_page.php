
<input type="hidden" id="current_from_id" value="<?php
echo $row->current_to_id;
?>">
<input type="hidden" id="emp_user_id_fk" value="<?php
echo $row->emp_id_fk;
?>">
<input type="hidden" id="current_from_user_name" value="<?php echo $row->current_to_user_name;?>">
<input type="hidden" id="last_from_id" value="<?php echo $row->emp_user_id;?>">
<input type="hidden" id="last_to_id" value="0">
<input type="hidden" id="last_from_user_name" value="0">
<input type="hidden" id="last_to_user_name" value="0">
<input type="hidden" id="last_procedure" value="0">
<input type="hidden" id="last_procedure_title" value="0">
<input type="hidden" id="level" value="<?php echo $row->level;?>">
<input type="hidden" id="ezn_id" value="<?php echo $row->id;?>">
<input type="hidden" id="ezn_rkm" value="<?php echo $row->ezn_rkm;?>">
<input type="hidden" id="message_accept" value="<?php echo $mess->msg_accept;?>">
<input type="hidden" id="message_refuse" value="<?php echo $mess->msg_refuse;?>">

<?php $manager=$row->direct_manager ;?>

<?php

if($level==1){?>


    <div class="col-md-8">

        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
            <tr>
                <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                    <div class="radio-content">
                        <input type="radio" id="accept-1"  name="radio"   class="decision"
                        onchange="show_hide($(this).val());$('#reason_action1').attr('disabled','TRUE');$('#reason_action1').val('');" value="1">
                        <label class="radio-label" for="accept-1">موافق
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                    <div class="radio-content">
                        <input type="radio" id="accept-2"  name="radio"   class="decision" onchange="show_hide($(this).val());$('#reason_action1').removeAttr('disabled');" value="2">
                        <label class="radio-label" for="accept-2"> لا أوافق  </label>
                        <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">

                    </div>





                </td>
            </tr>
            <tr>
                <td>الإسم/ <?php echo $row->current_from_user_name;?></td>
                <td>التوقيع/ <?php echo $row->current_from_user_name;?></td>
                <td>التاريخ/<?php echo  $row->date_ar ;?></td>
            </tr>
            </tbody>
        </table>
        </br>







        <div class="form-group col-md-6 col-sm-6 padding-4 has-success accept">
            <label class="label">الموظف </label>
            <select name="gender" onchange="get_emp_data($(this).val());" id="employee_id"
                    data-validation="required"   class="form-control valid"
                    aria-required="true">
                <option value=""> اختر </option>

                <?php
                if(isset($employee)&&!empty($employee)) {
                    foreach($employee as $row){
                        ?>
                        <option value="<?php echo $row->person_id;?>"> <?php echo $row->person_name;?></option >
                        <?php
                    }
                }
                ?>
            </select>
        </div>

    </div>
    <div class="col-md-4 ">











        <div class="col-md-12 profile">
            <table class="table table-bordered s col-md-12" style="">
                <thead>
                <tr>
                    <td colspan="2">

                        <img id="empImg" src="<?php echo base_url();?>asisst/admin_asset/img/user.png" >
                    </td>

                </tr>
                </thead>
                <tbody>
                <tr class="greentd">
                    <td class="text-center">الإسم</td>
                </tr>

                <tr>
                    <td id="name-emp" class="text-center"> غير محدد</td>
                </tr>
                <tr class="greentd">
                    <td class="text-center">الوظيفة</td>
                </tr>
                <tr>
                    <td id="job-title" class="text-center"> غير محدد</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

<?php }if($level==2){ ?>
    <div class="col-md-8">

        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
            <tr>
                <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                    <div class="radio-content">
                        <input type="radio" id="accept-1"  name="radio"   class="decision"
                        onchange="show_hide($(this).val());
                        $('#reason_action1').attr('disabled','TRUE');$('#reason_action1').val('');" value="1">
                        <label class="radio-label" for="accept-1">موافق
                           </label>

                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                    <div class="radio-content">
                        <input type="radio" id="accept-2"  name="radio"   class="decision" onchange="show_hide($(this).val());
                          $('#reason_action1').removeAttr('disabled');" value="2">
                        <label class="radio-label" for="accept-2"> لا أوافق  </label>
                        <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">

                    </div>





                </td>
            </tr>
            <tr>
                <td>الإسم/ <?php echo $row->current_from_user_name;?></td>
                <td>التوقيع/ <?php echo $row->current_from_user_name;?></td>
                <td>التاريخ/<?php echo $row->ezn_date_ar;?></td>
            </tr>
            </tbody>
        </table>
        </br>






        <div class="form-group col-md-6 col-sm-6 padding-4 has-success accept">
            <label class="label">الموظف </label>
            <select name="gender" onchange="get_emp_data($(this).val());" id="employee_id"
                    data-validation="required"   class="form-control valid"
                    aria-required="true">
                <option value=""> اختر </option>

                <?php
                if(isset($employee)&&!empty($employee)) {
                    foreach($employee as $row){
                        ?>
                        <option value="<?php echo $row->person_id;?>"> <?php echo $row->person_name;?></option >
                        <?php
                    }
                }
                ?>
            </select>
        </div>

    </div>
        <div class="col-md-4 ">
            <div class="col-md-12 profile">
                <table class="table table-bordered s col-md-12" style="">
                    <thead>
                    <tr>
                        <td colspan="2">

                            <img id="empImg" src="<?php echo base_url();?>asisst/admin_asset/img/user.png" >
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
                        <td id="job-title" class="text-center"> غير محدد</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>


<?php }if($level==3){ ?>
    <div class="col-md-12">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="2" class="info">افاده شئون الموظفين </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>بلغت الاستئذانات الشخصيه للموظف:-</td>
                    <td>بلغت الاستئذانات العمل للموظف:-</td>
                </tr>
                <tr>
                    <td>عدد(<?php echo $row->num_personal_ezn;?>)لمده(<?php echo $row->peroid_personal_ezn;?>)</td>
                    <td>عدد(<?php echo $row->num_work_ezn;?>)لمده(<?php echo $row->peroid_work_ezn;?>)</td>
                </tr>
                <tr>
                    <td> الموظف المختص:- <?php echo $row->current_from_user_name;?> </td>
                    <td>التاريخ :- <?php echo $row->ezn_date_ar;?> </td>
                </tr>
                </tbody>

            </table>
        </div>
        <div class="col-md-8">

            <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
                <tbody>
                <tr>
                    <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                        <div class="radio-content">
                            <input type="radio" id="accept-1"  name="radio"   class="decision"
                            onchange="show_hide($(this).val());$('#reason_action1').attr('disabled','TRUE');$('#reason_action1').val('');" value="1">
                            <label class="radio-label" for="accept-1">موافق
                            </label>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                        <div class="radio-content">
                            <input type="radio" id="accept-2"  name="radio"   class="decision"
                            onchange="show_hide($(this).val());$('#reason_action1').removeAttr('disabled');" value="2">
                            <label class="radio-label" for="accept-2"> لا أوافق  </label>
                            <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">

                        </div>





                    </td>
                </tr>

                </tbody>
            </table>
            </br>



            <!-- <div class="form-group col-md-6 col-sm-6 padding-4 has-success accept">
                <label class="label">الاداره </label>
                <select name="gender" onchange="get_emps($(this).val())" id="edara"
                        data-validation="required"   class="form-control valid"
                        aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if(isset($admin)&&!empty($admin)) {
                        foreach($admin as $row){
                            ?>
                            <option value="<?php echo $row->id;?>"> <?php echo $row->name;?></option >
                            <?php
                        }
                    }
                    ?>
                </select>
            </div> -->



            <div class="form-group col-md-6 col-sm-6 padding-4 has-success accept">
                <label class="label">الموظف </label>
                <select name="gender" onchange="get_emp_data($(this).val());" id="employee_id"
                        data-validation="required"   class="form-control valid"
                        aria-required="true">
                    <option value=""> اختر </option>

                    <?php
                    if(isset($employee)&&!empty($employee)) {
                        foreach($employee as $row){
                            ?>
                            <option value="<?php echo $row->person_id;?>"> <?php echo $row->person_name;?></option >
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

        </div>
        <div class="col-md-4 ">
  <div class="col-md-12 profile">
                <table class="table table-bordered s col-md-12" style="">
                    <thead>
                    <tr>
                        <td colspan="2">

                            <img id="empImg" src="<?php echo base_url();?>asisst/admin_asset/img/user.png" >
                        </td>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="greentd">
                        <td class="text-center">الإسم</td>
                    </tr>

                    <tr>
                        <td id="name-emp" class="text-center"> غير محدد</td>
                    </tr>
                    <tr class="greentd">
                        <td class="text-center">الوظيفة</td>
                    </tr>
                    <tr>
                        <td id="job-title" class="text-center"> غير محدد</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<?php } if($level==4){ ?>
    <div class="col-md-12">
        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
            <tr>
                <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                    <div class="radio-content">
                        <input type="radio" id="accept-1"  name="radio"   class="decision" onchange="show_hide($(this).val());
                        $('#reason_action1').attr('disabled','TRUE');
                       $('#reason_action1').val('');" value="1">
                        <label class="radio-label" for="accept-1">موافق
                        </label>

                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">
                    <div class="radio-content">
                        <input type="radio" id="accept-2"  name="radio"  class="decision" onchange="show_hide($(this).val());
                        $('#reason_action1').removeAttr('disabled');" value="2">
                        <label class="radio-label" for="accept-2"> لا أوافق  </label>
                        <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">

                    </div>
                </td>
            </tr>

            </tbody>
        </table>


    </div>
<?php } ?>

<script>
    function make_suspend()
    {

        valu= $(".decision:radio:checked").val();

        if(valu!=1 && valu!=2)
        {
            Swal.fire(
                'تنبيه!',
                'من فضلك حدد قراراك سواء القبول او الرفض',

            )
            return;
        }
        if(valu==1){
            var level_check=parseInt($('#level').val());

            if(level_check==1 || level_check==2||level_check==3){
                if($('#employee_id').val()=='')
                {
                    Swal.fire(
                        'تنبيه!',
                        'من فضلك قم باختيار الموظف ',

                    )
                    return;
                }
            }


//موافق
            var current_from_id=$('#current_from_id').val();
            var current_from_user_name=$('#current_from_user_name').val();
            var current_to_id=$('#employee_id').val();
            var current_to_user_name=$('#employee_id').val()+'name';
            var current_procedure=valu;
            var current_process_title='موفق';
            var last_from_id=$('#last_from_id').val();
            var last_to_id=$('#last_to_id').val();
            var last_from_user_name=$('#last_from_user_name').val();
            var last_to_user_name=$('#last_to_user_name').val();
            var last_procedure=$('#last_procedure').val();
            var last_procedure_title=$('#last_procedure_title').val();
            var level=parseInt($('#level').val())+1;
            var ezn_id=$('#ezn_id').val();
            var ezn_rkm=$('#ezn_rkm').val();
            var message_accept=$('#message_accept').val();
            var message_refuse=$('#message_refuse').val();
            var reason_action=$('#reason_action').val();



            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/make_suspend_accept",
                data:{current_from_id:current_from_id,
                  current_from_user_name:current_from_user_name,
                  current_to_id:current_to_id,
                  current_to_user_name:current_to_user_name,
                  current_procedure:current_procedure,
                  current_process_title:current_process_title,
                  last_from_id:last_from_id,
                  last_to_id:last_to_id,
                  last_from_user_name:last_from_user_name,
                  last_to_user_name:last_to_user_name,
                  last_procedure:last_procedure,
                  last_procedure_title:last_procedure_title,
                  level:level,
                  ezn_id:ezn_id,
                  ezn_rkm:ezn_rkm,
                  valu:valu,
                  reason_action:reason_action
                },
                success:function(d){

                    Swal.fire( 'بنجاح!',message_accept);
                    $('#ezn_table').hide();
                    $('#detailsModal2').modal('hide');
                    location.reload();

                }

            });

        }
        if(valu==2){

//غير موافق

            var current_from_id=$('#current_from_id').val();
            var current_from_user_name=$('#current_from_user_name').val();
            var current_to_id=$('#last_from_id').val();
            var current_to_user_name=$('#last_from_user_name').val();
            var current_procedure=valu;
            var current_process_title='غير موافق';
            var last_from_id=$('#last_from_id').val();
            var last_to_id=$('#last_to_id').val();
            var last_from_user_name=$('#last_from_user_name').val();
            var last_to_user_name=$('#last_to_user_name').val();
            var last_procedure=$('#last_procedure').val();
            var last_procedure_title=$('#last_procedure_title').val();
            var level=parseInt($('#level').val())+1;
            var ezn_id=$('#ezn_id').val();
            var ezn_rkm=$('#ezn_rkm').val();
            var reason_action=$('#reason_action1').val();


              console.log("reason_action :: "+reason_action);
              console.log("current_from_user_name :: "+current_from_user_name);
            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/make_suspend_refused",
                data:{current_from_id:current_from_id,
                  current_from_user_name:current_from_user_name,
                  current_to_id:current_to_id,
                  current_to_user_name:current_to_user_name,
                  current_procedure:current_procedure,
                  current_process_title:current_process_title,
                    last_from_id:last_from_id,
                    last_to_id:last_to_id,
                    last_from_user_name:last_from_user_name,
                    last_to_user_name:last_to_user_name,
                    last_procedure:last_procedure,
                    last_procedure_title:last_procedure_title,
                    level:level,
                    ezn_id:ezn_id,
                    ezn_rkm:ezn_rkm,
                    valu:valu,
                    reason_action:reason_action},
                success:function(d){

                    Swal.fire(
                        'بنجاح!',
                        'تم رفض الطلب وتحويله الي الموظف مقدم الطلب'
                    );

                    $('#detailsModal2').modal('hide');
                    $('#ezn_table').hide();
                    location.reload();


                }

            });
        }


    }

</script>

<script>
    function get_emps(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_employee",
            data:{valu:valu},
            success:function(d){
              $('#employee_id').html(d);
          }

        });
    }

</script>

<script>
    function get_emp_data(emp_id)
    {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_emp_data",
            data:{emp_id:emp_id},
            success:function(d){
                $('.profile').html(d);
                }

        });
    }
</script>

<script>
    function show_hide(valu)
    {
       if(valu==2)
       {
           $('.accept').hide();
           var emp_id=$('#emp_user_id_fk').val();
           $.ajax({
               type:'post',
               url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_emp_data",
               data:{emp_id:emp_id},
               success:function(d){
                   $('.profile').html(d);
               }

           });
       }else{
           $('.accept').show();
       }


    }
</script>
