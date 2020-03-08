
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
<input type="hidden" id="employee_id" value="<?php echo $row->emp_id_fk;?>">
<input type="hidden" id="c" value="<?php echo $row->emp;?>">
<div class="col-md-12">
    <div class="col-md-12">
        <div class="col-md-2">  <input type="radio" value="1" onchange="" class="form-control decision"> موافق </div>

        <div class="col-md-2">  <input type="radio" value="2" onchange=""   class="form-control decision"> غير موافق </div>
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
            var current_to_user_name=$('#employee_id').val();
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
                        'تم قبول الطلب وتحويله الي الموظف مقدم الطلب',

                    )
                    $('#detailsModal').modal('hide');
                    $('#ezn_table').hide();





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