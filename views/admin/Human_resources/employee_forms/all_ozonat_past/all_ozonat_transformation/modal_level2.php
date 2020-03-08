
<input type="hidden" id="current_from_id" value="<?php
echo $row->current_to_id;
?>">
<input type="hidden" id="current_from_user_name" value="<?php echo $row->current_to_user_name;?>">
<input type="hidden" id="last_from_id" value="0">
<input type="hidden" id="last_to_id" value=0">
<input type="hidden" id="last_from_user_name" value="0">
<input type="hidden" id="last_to_user_name" value="0">
<input type="hidden" id="last_procedure" value="0">
<input type="hidden" id="last_procedure_title" value="0">
<input type="text" id="level" value="<?php echo $row->level;?>">
<input type="hidden" id="ezn_id" value="<?php echo $row->id;?>">
<input type="hidden" id="ezn_rkm" value="<?php echo $row->ezn_rkm;?>">
<div class="col-md-12">
<?php
if($row->no3_ezn==1)
{
    $ezn="استئذان شخصي";
}else if($row->no3_ezn==2){
    $ezn="استئذان للعمل";
}else{
    $ezn="غير محدد";
} ?>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="3" class="info">نوع الاستئذان:<?=$ezn ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>الموظف:-<?php echo $row->emp  ;?></td>
                <td>الاداره :<?php echo $row->adminstration  ;?></td>
                <td>القسم:<?php echo $row->departs  ;?></td>

            </tr>
            <tr>
                <td>تاريخ الاذن:- <?php echo $row->ezn_date_ar  ;?></td>
                <td> <?php echo $row->from_hour  ;?> الفتره:-</td>
                <td> <?php echo $row->from_hour  ;?> وقت البدايه:-</td>


            </tr>
            <td>  <?php echo $row->from_hour  ;?> وقت النهايه:-</td>
            <td>   <?php echo $row->total_hours  ;?> المده:-</td>
</tr>
            <tr>
                <td colspan="3">السبب:-<?php echo $row->reason;?></td>
            </tr>

            </tbody>

        </table>
    </div>
<div class="col-md-12">
<div class="col-md-2">  <input type="radio" value="1" checked onchange="" name="radi" class="form-control decision"> موافق </div>

    <div class="col-md-2">  <input type="radio" value="2" onchange=""  name="radi"  class="form-control decision"> غير موافق </div>
</div>
<div class="col-md-12">

    <div class="col-md-8">

        <div class="col-md-12">
            <label class="label top-label">الاداره </label>
            <select name="gender" onchange="get_emps($(this).val())" id="edara"
                    data-validation="required"   class="form-control bottom-input"
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
        </div>
        </br></br>

        <div class="col-md-12">
            <label class="label top-label">الموظف </label>
            <select name="gender" id="employee_id"
                    data-validation="required"   class="form-control bottom-input"
                    aria-required="true">
                <?php
                if(isset($employee)&&!empty($employee)) {
                    foreach($employee as $row){
                        ?>
                        <option value="<?php echo $row->id;?>"> <?php echo $row->employee;?></option >
                        <?php
                    }
                }
                ?>
            </select>
        </div>





</div>

    <div class="col-md-4">
        الصوره والربوفايل
    </div>

</div>
</div>

<script>
    function make_suspend()
    {
       valu= $(".decision:radio:checked").val();
       if(valu!=1&& valu!=2)
       {
           Swal.fire(
               'تنبيه!',
            'من فضلك حدد قراراك سواء القبول او الرفض',

           )
           return;
       }
        if(valu==1){
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
            //alert(level);

            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>person_profile/all_ozonat/Transformation/make_suspend_accept",
                data:{current_from_id:current_from_id,current_from_user_name:current_from_user_name,current_to_id:current_to_id
                ,current_to_user_name:current_to_user_name,current_procedure:current_procedure,current_process_title:current_process_title,
                    last_from_id:last_from_id,last_to_id:last_to_id,last_from_user_name:last_from_user_name,
                    last_to_user_name:last_to_user_name,last_procedure:last_procedure,last_procedure_title:last_procedure_title,
                    level:level,ezn_id:ezn_id,ezn_rkm:ezn_rkm,valu:valu},
                success:function(d){

                    Swal.fire(
                        'بنجاح!',
                        'تم قبول الطلب وتحويله الي موظف الشئون الاداريه',

                    )
                    $('#ezn_table').hide();
                    $('#detailsModal').modal('hide');






                }

            });





        }
        if(valu==2){

//غير موافق

            var current_from_id=$('#last_to_id').val();
            var current_from_user_name=$('#last_to_user_name').val();
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
            var level=parseInt($('#level').val())-1;
            var ezn_id=$('#ezn_id').val();
            var ezn_rkm=$('#ezn_rkm').val();
            //alert(level);

            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>person_profile/all_ozonat/Transformation/make_suspend_refused",
                data:{current_from_id:current_from_id,current_from_user_name:current_from_user_name,current_to_id:current_to_id
                    ,current_to_user_name:current_to_user_name,current_procedure:current_procedure,current_process_title:current_process_title,
                    last_from_id:last_from_id,last_to_id:last_to_id,last_from_user_name:last_from_user_name,
                    last_to_user_name:last_to_user_name,last_procedure:last_procedure,last_procedure_title:last_procedure_title,
                    level:level,ezn_id:ezn_id,ezn_rkm:ezn_rkm,valu:valu},
                success:function(d){

                    Swal.fire(
                        'بنجاح!',
                     'تم رفض الطلب واعاده الطلب الي الموظف',

                    )

                    $('#detailsModal').modal('hide');
                    $('#ezn_table').hide();




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
            url:"<?php echo base_url();?>person_profile/all_ozonat/Transformation/get_employee",
            data:{valu:valu},
            success:function(d){

                

$('#employee_id').html(d);



            }

        });
    }
    
</script>