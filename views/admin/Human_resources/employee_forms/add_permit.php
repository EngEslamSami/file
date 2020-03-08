<div class="col-sm-12 no-padding " >
    <div class="col-sm-9">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <?php
            if(isset($item)&&!empty($item)){
                $emp_id_fk=$item->emp_id_fk;
                $o3on_type_fk=$item->o3on_type_fk;
                $date_o3on=$item->date_o3on;
                $from_time=$item->from_time;
                $to_time=$item->to_time;
                $num_hours=$item->num_hours;
                $peroid_id_fk=$item->peroid_id_fk;
                $reason=$item->reason;




            }else{

                $emp_id_fk='';
                $o3on_type_fk='';
                $date_o3on='';
                $from_time='';
                $to_time='';
                $num_hours='';
                $peroid_id_fk='';
                $reason='';
            }
            ?>


            <div class="panel-body">
                <?php
                if(isset($item)&&!empty($item)){?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Permission_control/edit_permission/<?php echo $this->uri->segment(5);?>" method="post">

                    <?php } else{?>
                    <form action="<?php echo base_url();?>human_resources/employee_forms/Permission_control" method="post">

                        <?php }?>

                        <input type="hidden" id="emp_id" name="emp_id_fk" value="<?php if(!empty($emp_data->id)){ echo $emp_data->id; }else{ echo 0 ; }?> ">
                        <input type="hidden" id="administration" name="edara_id_fk" value="<?php if(!empty($emp_data->administration)){ echo $emp_data->administration; }else{ echo 0 ; }?>  ">

                        <input type="hidden" id="department" name="qsm_id_fk" value="<?php if(!empty($emp_data->department)){ echo $emp_data->department; }else{ echo 0 ; }?>  ">

                        <input type="hidden" id="manger" name="direct_manager_id_fk" value="<?php if(!empty($emp_data->manger)){ echo $emp_data->manger; }else{ echo 0 ; }?>  ">


                        <?php $role=$_SESSION['role_id_fk'];?>

                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="label top-label">نوع الاذن</label>
                                <?php   $permits=array(1=>'استئذان شخصي',2=>'استئذان للعمل');

                                $work_types=array("1"=>"فترة","2"=>"فترتين");
                                ?>


                                <select name="o3on_type_fk" id="o3on_type_fk" onchange="get_option($(this).val());"
                                        data-validation="required"   class="form-control bottom-input">


                                    <option value=" " selected="">اختر</option>
                              <?php foreach ($permits as $key=>$value){?>
                                  <option value="<?php echo $key;?>" <?php if($o3on_type_fk==$key){ echo 'selected'; }?>><?php echo $value;?></option>


                                    <?php } ?>


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
                                <label class="label top-label">تاريخ  الاذن</label>
                                <input type="date"   name="date_o3on" onchange="get_date();" id="start_date" value="<?php echo $date_o3on;?>"
                                       class="form-control bottom-input"
                                       data-validation="required"
                                       data-validation-has-keyup-event="true">
                            </div>



                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="label top-label">الفتره</label>


                                <select name="peroid_id_fk" id="peroid_id_fk" onchange="get_option($(this).val());"
                                        data-validation="required"   class="form-control bottom-input">


                                    <option value=" " selected="">اختر</option>
                                    <?php foreach ($work_types as $key=>$value){?>
                                        <option value="<?php echo $key;?>" <?php if($peroid_id_fk==$key){ echo 'selected'; }?>><?php echo $value;?></option>


                                    <?php } ?>


                                </select>

                            </div>
                            <div class="col-md-4">
                                <label class="label top-label">وقت البدايه</label>
                                <input type="time"   name="from_time" onchange="get_time();" id="from_time" value="<?php echo $from_time;?>"
                                       class="form-control bottom-input"
                                       data-validation="required"
                                       data-validation-has-keyup-event="true">
                            </div>

                            <div class="col-md-4">
                                <label class="label top-label">وقت النهايه</label>
                                <input type="time"   name="to_time" onchange="get_time();" id="to_time" value="<?php echo $to_time;?>"
                                       class="form-control bottom-input"
                                       data-validation="required"
                                       data-validation-has-keyup-event="true">
                            </div>







                        </div>

                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="label top-label">المده</label>
                                <input type="text" readonly   name="num_hours" id="num_hours" value="<?php echo $num_hours;?>"
                                       class="form-control bottom-input"
                                       data-validation="required"
                                       data-validation-has-keyup-event="true">
                            </div>
                            <div class="col-md-6">
                                <label class="label top-label">السبب</label>
                                <textarea id="reason"    data-validation="required" name="reason" class="form-control bottom-input"><?php echo $reason;?></textarea>
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
            <th>نوع الاذن</th>
            <th>اسم الموظف</th>
            <th>بدايه الاذن</th>
            <th>نهايه الاذن</th>
            <th>عدد الساعات المطلوبه</th>
            <th>التفاصيل</th>
            <th>افاده شئون الموظفين</th>
            <th> الاجراء</th>




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
                    <td><?php echo $permits[$row->o3on_type_fk]  ;?></td>
                    <td><?php echo $row->emp ;?></td>
                    <td><?php echo $row->from_time ;?></td>
                    <td><?php echo $row->to_time ;?></td>
                    <td><?php echo $row->num_hours ;?></td>
                    <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>">التفاصيل</button></td>
                    <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#evada_model<?php echo$row->id; ?>">افاده شئون الموظفين</button></td>

                    <td>


                        <a href="<?php echo base_url();?>human_resources/employee_forms/Permission_control/edit_permission/<?php echo $row->id; ?>"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                        <a href="<?php echo base_url(); ?>human_resources/employee_forms/Permission_control/delete_permit/<?php echo $row->id;?>"
                           onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                         aria-hidden="true"></i> </a>


                    </td>
                    


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
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->emp;?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr class="info">
                                <th colspan="4" class="bordered-bottom">تفاصيل الاذن</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th class="gray-background">نوع الاذن:</th>
                                <td width="15%"><?php echo $permits[$row->o3on_type_fk]  ;?></td>
                                <th class="gray-background">تاريخ الاذن:</th>
                                <th width="20%"><?php echo $row->date_o3on;?></th>

                            </tr>
                            <tr>
                                <th class="gray-background"> بدايه الاذن:</th>
                                <td><?php echo $row->from_time;?></td>
                                <th class="gray-background">نهايه الاذن:</th>
                                <td><?php echo $row->to_time;?></td>

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

<!------------------------------------------------------------------------------------------------------------------------------>
        <div class="modal fade" id="evada_model<?php echo$row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " style="width: 80%" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->emp;?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr class="info">
                                <th colspan="4" class="bordered-bottom">تفاصيل الاذن</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th class="gray-background"> عدد الاذونات الشخصيه:</th>
                                <td width="15%"><?php echo $row->personal_permit  ;?></td>
                                <th class="gray-background">عدد الساعات:</th>
                                <th width="20%"><?php if(!empty($row->peroid_personal)) { echo $row->peroid_personal; }
                                    else{ echo 0;} ?></th>

                            </tr>
                            <tr>
                                <th class="gray-background">عدد إستئذانات العمل :</th>
                                <td width="15%"><?php echo $row->personal_work  ;?></td>
                                <th class="gray-background">عدد الساعات:</th>
                                <th width="20%"><?php if(!empty($row->peroid_work)) { echo $row->peroid_work; }
                                    else{ echo 0;} ?></th>

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

<script>
function get_time()
{
   var from_time=$('#from_time').val();
    var to_time=$('#to_time').val();


    //var hours = parseFloat($("#to_time").val().split(':')[0], 10) - parseFloat($("#from_time").val().split(':')[0], 10);


    var start = $('#from_time').val();
    var end = $('#to_time').val();
    s = start.split(':');
    e = end.split(':');
    min = e[1]-s[1];
    hour_carry = 0;
    if(min < 0){
        min += 60;
        hour_carry += 1;
    }
    hour = e[0]-s[0]-hour_carry;
    min = ((min/60)*100).toString();
    diff = hour + "." + min.substring(0,2);

    $('#num_hours').val(diff);



}


</script>



