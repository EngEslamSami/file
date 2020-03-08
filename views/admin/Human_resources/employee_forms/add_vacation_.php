<div class="col-sm-12 no-padding " >
    <div class="col-sm-9">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>


            <div class="panel-body">
                <?php $role=$_SESSION['role_id_fk'];?>
                <?php $arr=array(1=>'اجازه سنويه',2=>'اجازه استثنائيه',3=>'اجازه اضطراريه',4=>'اجازه مرضيه',5=>'اخري')    ?>

                <div class="col-md-12">
                    <div class="col-md-4">
                        <label class="label top-label">الرقم الوظيفي</label>
                        <input type="text" readonly=""  name="" onchange="" id="" value="<?php 
                        if(isset($emp_data->emp_code) && $emp_data->emp_code != null){
                            echo $emp_data->emp_code;  
                        }
                      ?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        </div>
                    <div class="col-md-4">
                        <label class="label top-label">اسم الموظف</label>
                        <select name=""  id="employee_name"
                                data-validation="required" class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true" onchange="get_emp_data($(this).val());">
                            <option value="">إختر</option>
                            <?php
                            if(isset($all_emps)&&!empty($all_emps)) {
                                foreach($all_emps as $row){
                                    $select='';
                                    if(!empty($emp_data->id == $row->id)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id;?>" <?php if($role==1){ echo $select; }?>> <?php echo $row->employee;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>


                    <div class="col-md-4">
                        <label class="label top-label">نوع الاجازه</label>

                        <select name="" id="type_vacation" onchange="get_option($(this).val());"
                                data-validation="required"   class="form-control bottom-input">


                            <option value=" ">اختر</option>
                            <?php

                            foreach ($arr as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>

                    </div>



                </div>
                <div class="col-md-12">



                    <div class="col-md-4">
                        <label class="label top-label">مسمي الوظيفة</label>
                        <select name="job_title_id_fk" id="job_title_id_fk"
                                data-validation="required"   class="form-control bottom-input "
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($jobtitles)&&!empty($jobtitles)) {
                                foreach($jobtitles as $row){
                                    $select='';
                                    if(!empty($emp_data->degree_id == $row->defined_id)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->defined_id;?>" <?php if($role==1){ echo $select; }?>> <?php echo $row->defined_title;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">الاداره </label>
                        <select name="administration" id="administration3"
                                class="form-control bottom-input"
                                onchange=""
                                data-validation="required" aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if (!empty($admin)):
                                foreach ($admin as $record):
                                    $select='';
                                    if(!empty($emp_data->administration == $record->id)){
                                        $select='selected';
                                    }
                                    ?>

                                    <option
                                        value="<? echo $record->id; ?>" <?php if($role==1){ echo $select; }?>><? echo $record->name; ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">القسم </label>
                        <select name="department" class="form-control bottom-input" id="department3"
                                data-validation="required" aria-required="true"  >
                            <option value="">إختر</option>
                            <?php
                            if(isset($departs[$administration]) && !empty($departs[$administration])) {
                                foreach ($departs[$administration] as $row) {

                                    $select='';
                                    if(!empty($emp_data->department == $row->id)){
                                        $select='selected';
                                    }

                                    ?>
                                    <option value="<?php echo $row->id; ?>"<?php if($role==1){ echo $select; }?>>


                                        <?php echo $row->name; ?></option>
                                    <?php
                                }
                            }else { ?>
                                <option value="">لا يوجد اقسام مضافة</option>
                            <?php   }
                            ?>

                        </select>
                    </div>
                    </div>
                <div class="col-md-12">

                    <div class="col-md-4">
                        <label class="label top-label">تاريخ طلب الاجازه</label>
                        <input type="date" name="demand_date" id="demand_date" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">تاريخ بدايه الاجازه</label>
                        <input type="date"  name="start_date" onchange="get_date();" id="start_date" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">الموافق</label>
                        <input type="text" readonly="readonly"  name="end_day" onchange="" id="start_day" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>


                    </div>
                <div class="col-md-12">

                    <div class="col-md-4">
                        <label class="label top-label">تاريخ نهايه الاجازه</label>
                        <input type="date" name="end_date" onchange="get_date();"  id="end_date" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">الموافق</label>
                        <input type="text"  readonly="readonly" name="end_day" onchange="" id="end_day" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">عدد ايام الاجازه</label>
                        <input type="text" readonly="readonly" name="num_days"  id="num_days" value=""
                               class="form-control bottom-input"
                               data-validation="required" onkeypress="validate_number(event);"
                               data-validation-has-keyup-event="true">
                    </div>


                   </div>
                <div class="col-md-12">


                    <div class="col-md-4">
                        <label class="label top-label">تاريخ مباشره  العمل</label>
                        <input type="date" readonly="readonly" name="back_work" id="back_work" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">الجوال</label>
                        <input type="text" maxlength="10" onkeyup="get_length($(this).val());"  name="mob" id="mob" value=""
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <span style="color: red;">رقم الجوال 10 ارقام فقط</span>
                    </div>


                </div>
                <div class="emp">
                <div class="col-md-12">
                    <div class="col-sm-12 no-padding">
                        <h6 class="text-center inner-heading">اقرار الموظف</h6>
                    </div>
                    </div>
                    <div class="col-md-12">
                     <input type="checkbox"  data-validation="required" name="check"> اتعهد بان اقوم بجميع كل مهامي للموظف البديل

                </div>
                    </div>

                <div class="other_emp">
                    <div class="col-md-12">
                        <div class="col-sm-12 no-padding">
                            <h6 class="text-center inner-heading">اختيار الموظف البديل</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="label top-label">اختيار الموظف  </label>
                            <select name="administration" id="administration3"
                                    class="form-control bottom-input selectpicker"
                                    data-show-subtext="true" data-live-search="true"
                                    onchange=""
                                    data-validation="required" aria-required="true">
                                <option value="">إختر</option>
                                <?php
                                if (!empty($employies)):
                                    foreach ($employies as $record):

                                        ?>

                                        <option
                                            value="<? echo $record->id; ?>" ><? echo $record->employee; ?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-8" style="padding:15px ;">
                            <input type="checkbox"  data-validation="required" name="check"> اتعهد بان اقوم بجميع المهام المسامي الي من زميلي

                        </div>
                        </div>

                </div>
                <div class="col-md-12">
                    <input type="submit" id="reg"  value="حفظ" class="btn btn-add"  name="add">

                </div>
                </div>




                </div>
        </div>

<div id="load3">

    <?php $data_load["personal_data"]=$personal_data;
    $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);?>

</div>



</div>

<script>
    function get_date()
    {
        var end_date=$('#end_date').val();
        var start_date=$('#start_date').val();
        var weekday = ["الاحد","الاتنين","الثلاتاء","الاربعاء","الخميس","الجمعه","السبت"];

        var a = new Date(end_date);
        var x=new Date(start_date);

        $('#end_day').val(weekday[a.getDay()]);
        $('#start_day').val(weekday[x.getDay()]);
        if($('#end_date').val()=='')
        {
            return;
        }
        if($('#start_date').val()=='')
        {
            return;
        }

       // var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];







        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_date",
            data:{start_date:start_date,end_date:end_date},
            success:function(d) {

              var obj=JSON.parse(d);

               $('#back_work').val(obj.back_date);
                $('#num_days').val(obj.day);
            }






        });
    }
</script>
<script>

  function get_option(valu)
   {
      if(valu==3)
      {
          $('#num_days').val('');
          $('#end_date').val('');
          $('#back_work').val('');
          $('#end_day').val('');
          $('#start_day').val('');
          document.getElementById("num_days").setAttribute("disabled", "disabled");
          document.getElementById("end_date").setAttribute("disabled", "disabled");
          document.getElementById("back_work").setAttribute("disabled", "disabled");
          document.getElementById("end_day").setAttribute("disabled", "disabled");
          document.getElementById("start_day").setAttribute("disabled", "disabled");
          $('.other_emp').hide();
      }else{
          document.getElementById("num_days").removeAttribute("disabled", "disabled");
          document.getElementById("end_date").removeAttribute("disabled", "disabled");
          document.getElementById("back_work").removeAttribute("disabled", "disabled")
          document.getElementById("end_day").removeAttribute("disabled", "disabled");
          document.getElementById("start_day").removeAttribute("disabled", "disabled");
          $('.other_emp').show();
      }
   }

</script>

<script>

   function get_length(valu)
   {

       if(valu.length>10){
           document.getElementById("reg").setAttribute("disabled", "disabled");

       }
       if(valu.length<10){
       document.getElementById("reg").setAttribute("disabled", "disabled");

   }
       if(valu.length==10){
           document.getElementById("reg").removeAttribute("disabled", "disabled");

       }
   }

</script>


<script>
   function get_emp_data(valu)
   {
       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_emp_data",
           data:{valu:valu},
           success:function(d) {


              var obj=JSON.parse(d);


               $('#job_title_id_fk').val(obj.degree_id);
               $('#administration3').val(obj.administration);
               $('#department3').val(obj.department);

           }






       });


       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_load_page",
           data:{valu:valu},
           success:function(d) {

           $('#load3').html(d);


           }






       });
   }


</script>

<script>




</script>