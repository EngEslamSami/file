<div class="col-sm-12 no-padding " >
    <div class="col-sm-9">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <?php
            if(isset($item)&&!empty($item)){
               $emp_id_fk=$item->emp_id_fk;
                $vacation_type_id_fk=$item->vacation_type_id_fk;
                $vacation_from_date=$item->vacation_from_date;
                $vacation_to_date=$item->vacation_to_date;
                $num_days=$item->num_days;
                $adress_since_vacation=$item->adress_since_vacation;
                $mob_since_vacation=$item->mob_since_vacation;
                $promise=$item->promise;
                $emp_badel_promise=$item->emp_badel_promise;
                $emp_badel_id_fk=$item->emp_badel_id_fk;
                $date_back=$item->date_back;

                
            }else{

                $emp_id_fk='';
                $vacation_type_id_fk='';
                $vacation_from_date='';
                $vacation_to_date='';
                $num_days='';
                $adress_since_vacation='';
                $mob_since_vacation='';
                $promise='';
                $emp_badel_id_fk='';
                $date_back='';
                $emp_badel_promise='';

            }
            ?>


            <div class="panel-body">
                <?php
                if(isset($item)&&!empty($item)){?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Vacation/edit_vacation/<?php echo $this->uri->segment(5);?>" method="post">

                <?php } else{?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Vacation/add_vacation" method="post">

                    <?php }?>

                    <input type="hidden" id="emp_id" name="emp_id_fk" value="<?php if(!empty($emp_data->id)){ echo $emp_data->id; }else{ echo 0 ; }?> ">
                    <input type="hidden" id="administration" name="edara_id_fk" value="<?php if(!empty($emp_data->administration)){ echo $emp_data->administration; }else{ echo 0 ; }?>  ">

                    <input type="hidden" id="department" name="qsm_id_fk" value="<?php if(!empty($emp_data->department)){ echo $emp_data->department; }else{ echo 0 ; }?>  ">

                    <input type="hidden" id="manger" name="direct_manager_id_fk" value="<?php if(!empty($emp_data->manger)){ echo $emp_data->manger; }else{ echo 0 ; }?>  ">


                    <?php $role=$_SESSION['role_id_fk'];?>

                <div class="col-md-12">
                    <div class="col-md-4">
                        <label class="label top-label">نوع الاجازه</label>

                        <select name="vacation_type_id_fk" id="type_vacation" onchange="get_option($(this).val());"
                                data-validation="required"   class="form-control bottom-input">


                            <option value=" " selected="">اختر</option>
                            <?php

                            foreach ($vacations as $row){
                                ?>
                                <option value="<?php echo $row->id;?>" <?php if($row->id==$vacation_type_id_fk){echo 'selected'; }?>><?php echo $row->name;?></option>
                            <?php } ?>
                            <option value="0" <?php if($vacation_type_id_fk==0){echo 'selected'; }?>>اضطراريه</option>
                        </select>

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
                                    <option value="<?php echo $row->id;?>" <?php if($role!=1){ echo $select; }?><?php if($row->id==$emp_id_fk){echo 'selected'; }?> > <?php echo $row->employee;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-4">
                        <label class="label top-label">تاريخ بدايه الاجازه</label>
                        <input type="date"   name="vacation_from_date" onchange="get_date();" id="start_date" value="<?php echo $vacation_from_date;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>



                </div>
                <div class="col-md-12">

                    <div class="col-md-4">
                        <label class="label top-label">تاريخ نهايه الاجازه</label>
                        <input type="date"  <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?> name="vacation_to_date" onchange="get_date();"  id="end_date" value="<?php echo $vacation_to_date;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">عدد ايام الاجازه</label>
                        <input type="text" <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?> readonly="readonly" name="num_days"  id="num_days" value="<?php echo $num_days;?>"
                               class="form-control bottom-input"
                               data-validation="required" onkeypress="validate_number(event);"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="col-md-4">
                        <label class="label top-label">تاريخ مباشره  العمل</label>
                        <input type="date" <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?> readonly="readonly" name="date_back" id="back_work" value="<?php echo $date_back;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>




                    </div>


                <div class="col-md-12">
                    <div class="col-md-4">
                        <label class="label top-label">العنوان اثناء الاجازه</label>
                       <textarea id="adress"  <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?>  data-validation="required" name="adress_since_vacation" class="form-control bottom-input"><?php echo $adress_since_vacation;?></textarea>
                    </div>



                    <div class="col-md-4">
                        <label class="label top-label">الجوال</label>
                        <input type="text" maxlength="10" onkeyup="get_length($(this).val());" <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?>  name="mob_since_vacation" id="mob" value="<?php echo $mob_since_vacation;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <span style="color: red;">رقم الجوال 10 ارقام فقط</span>
                    </div>


                </div>
                <div id="emp" <?php if($vacation_type_id_fk==0){?>  style="display: none;"<?php } ?>>
                <div class="col-md-12">
                    <div class="col-sm-12 no-padding">
                        <h6 class="text-center inner-heading">اقرار الموظف</h6>
                    </div>
                    </div>
                    <div class="col-md-12">
                     <input type="checkbox"  <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?> id="promise" <?php if($promise==1){ echo 'checked';}?>   value="1" data-validation="required" name="promise">
                        أتعهد بتسليم كل مهامي للموظف البديل والعودة من إجازتي في الموعد المحدد
                </div>
                    </div>

                <div id="other_emp" <?php if($vacation_type_id_fk==0){?>  style="display: none;"<?php } ?>>
                    <div class="col-md-12">
                        <div class="col-sm-12 no-padding">
                            <h6 class="text-center inner-heading">اختيار الموظف البديل</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="label top-label">اختيار الموظف  </label>
                            <select   name="emp_badel_id_fk" id="administrat"
                                    class="form-control bottom-input "

                                    onchange=""
                                     aria-required="true">
                                <option value="">إختر</option>
                                <?php
                                if (!empty($employies)):
                                    foreach ($employies as $record):

                                        ?>

                                        <option
                                            value="<? echo $record->id; ?>" <?php if($record->id==$emp_badel_id_fk){echo 'selected'; }?>><? echo $record->employee; ?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12" style="padding:15px ;">

                            <input type="checkbox" <?php if($vacation_type_id_fk==0){?>  disabled="disabled"<?php } ?> id="emp_badel_promise" value="1" <?php if($emp_badel_promise==1){ echo 'checked';}?>
                                   data-validation="required" name="emp_badel_promise">
                            أتعهد بأن أقوم باستلام جميع الأعمال الموكلة للموظف المذكورة أعلاه قبل موعد إجازته وتنفيذها في مواعيدها


                        </div>
                        </div>

                </div>
                <div class="col-md-12">
                    <input type="submit" id="reg"  value="حفظ" class="btn btn-add"  name="add">

                </div>
                </form>
                </div>




                </div>
        </div>

<div id="load3">

    <?php $data_load["personal_data"]=$personal_data;
    $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);?>

</div>



</div>
<?php
if(isset($items)&&!empty($items)){
?>
<table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="visible-md visible-lg">
        <th>مسلسل</th>
        <th>نوع الاجازه</th>
        <th>بدايه الاجازه</th>
        <th>نهايه الاجازه</th>
        <th>عدد الايام المطلوبه</th>
        <th>التفاصيل</th>
        <th> الاجراء</th>
        <th>حاله الطلب </th>



    </tr>

    </thead>
    <tbody>

    <?php
    if (isset($items) && !empty($items)) {
        $x = 1;

    foreach ($items as $row) {



        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $row->name ;?></td>
            <td><?php echo $row->vacation_from_date ;?></td>
            <td><?php echo $row->vacation_to_date ;?></td>
            <td><?php echo $row->num_days ;?></td>
            <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>">التفاصيل</button></td>

            <td>


                <a href="<?php echo base_url(); ?>human_resources/employee_forms/Vacation/edit_vacation/<?php echo $row->id;?>"><i
                        class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                <a href="<?php echo base_url(); ?>human_resources/employee_forms/Vacation/delete_vacation/<?php echo $row->id;?>"
                   onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                 aria-hidden="true"></i> </a>


            </td>
            <td></td>


        </tr>
        <?php
        $x++;
    }
    }
    ?>

    </tbody>
</table>


<?php } ?>
<!--------------------------------------------------------modal------------------------------------>


<?php
if (isset($items) && !empty($items)) {
    $x = 1;

    foreach ($items as $row) { ?>


        <div class="modal fade" id="myModal<?php echo$row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " style="width: 80%" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->name;?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr class="info">
                                <th colspan="4" class="bordered-bottom">تفاصيل الاجازه</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th class="gray-background">نوع الاجازه:</th>
                                <td width="15%"><?php echo $row->name;?></td>
                                <th class="gray-background">تاريخ بدايه الاجازه:</th>
                                <th width="20%"><?php echo $row->vacation_from_date;?></th>

                            </tr>
                            <tr>
                                <th class="gray-background">تاريخ نهايه الاجازه:</th>
                                <td><?php echo $row->vacation_to_date;?></td>
                                <th class="gray-background">عددايام الاجازه:</th>
                                <td><?php echo $row->num_days;?></td>

                            </tr>

                            <tr>
                                <th class="gray-background">تاريخ مباشره  العمل:</th>
                                <td><?php echo $row->date_back;?></td>
                                <th class="gray-background">الموظف البديل:</th>
                                <td><?php echo $row->badl_emp->employee;?></td>

                            </tr>
                            <tr>
                                <th class="gray-background">العنوان اثناء الاجازه:</th>
                                <td><?php echo $row->adress_since_vacation;?></td>
                                <th class="gray-background">االجوال اثناء الاجازه:</th>
                                <td><?php echo $row->mob_since_vacation;?></td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>



    <?php }
} ?>


<!--------------------------------------------------------------->



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

      if(valu==0)
      {
          $('#other_emp').hide();
          $('#emp').hide();



          document.getElementById("emp_badel_promise").setAttribute("disabled", "disabled");
          document.getElementById("promise").setAttribute("disabled", "disabled");

          document.getElementById("adress").setAttribute("disabled", "disabled");
          document.getElementById("mob").setAttribute("disabled", "disabled");


          document.getElementById("num_days").setAttribute("disabled", "disabled");
          document.getElementById("end_date").setAttribute("disabled", "disabled");
          document.getElementById("back_work").setAttribute("disabled", "disabled");
          document.getElementById("end_day").setAttribute("disabled", "disabled");
          document.getElementById("start_day").setAttribute("disabled", "disabled");
         // document.getElementById("other_emp").style.display = "none";


      }else{
          $('#other_emp').show();
          $('#emp').show();
          document.getElementById("adress").removeAttribute("disabled", "disabled");
          document.getElementById("mob").removeAttribute("disabled", "disabled");

          document.getElementById("emp_badel_promise").removeAttribute("disabled", "disabled");
          document.getElementById("promise").removeAttribute("disabled", "disabled")
          document.getElementById("num_days").removeAttribute("disabled", "disabled");
          document.getElementById("end_date").removeAttribute("disabled", "disabled");
          document.getElementById("back_work").removeAttribute("disabled", "disabled")
          document.getElementById("end_day").removeAttribute("disabled", "disabled");
          document.getElementById("start_day").removeAttribute("disabled", "disabled");


        //  document.getElementById("other_emp").style.display = "none";

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
               $('#emp_id').val(obj.id);
               $('#administration').val(obj.administration);
               $('#department').val(obj.department);
               $('#manger').val(obj.manger);

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



