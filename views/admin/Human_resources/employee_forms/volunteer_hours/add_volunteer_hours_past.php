<style type="text/css">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {

        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border{
        border:0 !important;
    }

    .gray_background{
        background-color: #eee;

    }
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    .under-line{
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3 ,
    .under-line .col-xs-4,
    .under-line .col-xs-6 ,
    .under-line .col-xs-8
    {
        border-left: 1px solid #abc572;
    }
.managment-div-select .btn-group.bootstrap-select{
    width: 85%;
}
    .help-block.form-error {
        position: absolute;
        top: 27px;
        left: 13%;
    }
   table .help-block.form-error{
        position: relative;
       top: auto;
       left: auto;

    }
</style>
<?php
if(isset($result)&&!empty($result)){
    $emp_id_fk =$result->emp_id_fk;
    $emp_code=$result->emp_code;
    $card_num=$result->card_num;
    $job_title_id_fk=$result->job_title_id_fk;
    $edara_id_fk=$result->edara_id_fk;
    $qsm_id_fk=$result->qsm_id_fk;
    $mostafed_type_fk=$result->mostafed_type_fk;
    $mostafed_edara_id=$result->mostafed_edara_id;
    $mostafed_direction_id =$result->mostafed_direction_id;
    $responsible =$result->responsible;
    $job =$result->job;
    $tele =$result->tele;
    $mob =$result->mob;
    $email =$result->email;
    $volunteer_date =date('Y-m-d',$result->volunteer_date);
    $to_time =$result->to_time;
    $from_time =$result->from_time;
    $num_hours =$result->num_hours;
    $place =$result->place;
    $activities =$result->activities;
    $volunteer_description =$result->volunteer_description;



}else{

    $emp_id_fk='';
    $emp_code='';
    $card_num='';
    $job_title_id_fk='';
    $edara_id_fk='';
    $qsm_id_fk='';
    $mostafed_type_fk='';
    $mostafed_edara_id='';
    $mostafed_direction_id='';
    $responsible='';
    $job= '';
    $tele ='';
    $mob ='';
    $email ='';
    $volunteer_date ='';
    $to_time ='';
    $from_time ='';
    $num_hours ='';
    $place ='';
    $activities ='';
    $volunteer_description ='';

}
?>

<?php $role=$_SESSION['role_id_fk'];  $emp_id=$_SESSION['emp_code'];  ?>
<!--------------------------------------------------------modal------------------------------------>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-9">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($result)&&!empty($result)){ ?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours/<?php echo $this->uri->segment(5);?>" method="post">
                    <?php } else{?>
                    <form action="<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/add_volunteer_hours" method="post">
                        <?php }?>

                  <div class="print_forma  col-xs-12 no-padding">
                                    <div class="piece-box">
                                        <div class="piece-body">
                                            <div class="col-xs-12 no-padding">
                                                <div class="col-xs-12  under-line bordered-bottom ">
                                                    <h6>&nbsp بيانات الموظف</h6>
                                                </div>
                                                <div class="col-xs-12 no-padding under-line open_green">
                                                    <div class="col-xs-4">
                                                        <h6> الموظف:</h6>
                                                        <select name="emp_id_fk"  id="emp_id_fk"
                                                                data-validation="required" class="form-control bottom-input edara_direction
                                                                aria-required="true" onchange="get_emp_data($(this).val());">
                                                            <option value="">إختر</option>
                                                            <?php
                                                            if(!empty($all_emps)) {
                                                                foreach($all_emps as $row){
                                                                    $select='';
                                                                    if(!empty($emp_id_fk)){
                                                                        if($emp_id_fk == $row->id){
                                                                            $select='selected';
                                                                        }


                                                                    }else{
                                                                        if($role ==3){
                                                                            if($emp_id == $row->id){
                                                                                $select='selected';
                                                                            }

                                                                        }
                                                                    }

                                                                    ?>
                                                                    <option value="<?php echo $row->id;?>"  <?php echo$select;?> > <?php echo $row->employee;?></option >
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>

                                                        <?php       if($role ==3){ ?>

                                                            <input type="hidden" name="emp_id_fk" value="<?php echo$emp_id;?>">


                                                     <?php   } ?>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h6>الرقم الوظيفي<span class="valu" ></span></h6>
                                                        <input type="text" id="employ_code"  readonly class="form-control" value="<?=$emp_code?>">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h6>رقم الهوية<span class="valu" id=""></span></h6>
                                                        <input type="text" id="national_id"  readonly class="form-control" value="<?=$card_num?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 no-padding under-line ">
                                                    <div class="col-xs-4">
                                                        <h6>المسمى الوظيفي<span class="valu" id=""></span></h6>
                                                        <select name="job_title_id_fk" id="job_title"
                                                                class="form-control bottom-input" data-validation="required"  aria-required="true" >
                                                            <option value="">إختر</option>
                                                            <?php foreach($jobtitles as $one_job_role){

                                                                $select='';
                                                                if($job_title_id_fk == $one_job_role->defined_id){
                                                                    $select ='selected';
                                                                }
                                                                ?>
                                                                <option value="<?php echo $one_job_role->defined_id ; ?>" <?=$select?>>
                                                                    <?php echo $one_job_role->defined_title ; ?></option>';
                                                            <?php } ?>
                                                        </select>
                                                        <input type="hidden" name="job_title_id_fk" id="job_title_hidden" >

                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h6>الإدارة<span class="valu" ></span></h6>
                                                        <select name="edara_id_fk" id="edara_name"
                                                                class="form-control bottom-input"
                                                                onchange="return lood(this.value);"
                                                                data-validation="required" aria-required="true">
                                                            <option value="">إختر</option>
                                                            <?php
                                                            if (!empty($admin)):
                                                                foreach ($admin as $record):
                                                                    $select='';
                                                                    if($edara_id_fk == $record->id){
                                                                    $select ='selected';
                                                                }
                                                                    ?>
                                                                    <option
                                                                        value="<? echo $record->id; ?>"  <?=$select?>>
                                                                        <? echo $record->name; ?></option>
                                                                    <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </select>
                                                        <input type="hidden" name="edara_id_fk" id="edara_name_hidden" >

                                                    </div>

                                                    <div class="col-xs-4">
                                                        <h6>القسم<span class="valu" ></span></h6>

                                                        <select name="qsm_id_fk" id="qsm_name"
                                                                class="form-control bottom-input"
                                                                onchange="return lood(this.value);"
                                                                data-validation="required" aria-required="true">
                                                            <option value="">إختر</option>
                                                            <?php
                                                            if (!empty($departs)):
                                                                foreach ($departs as $record):
                                                                    $select='';
                                                                    if($qsm_id_fk == $record->id){
                                                                        $select ='selected';
                                                                    }?>
                                                                    <option
                                                                        value="<? echo $record->id; ?>"   <?=$select?> >
                                                                        <? echo $record->name; ?></option>
                                                                    <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </select>
                                                        <input type="hidden" name="qsm_id_fk" id="qsm_name_hidden" >

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="piece-box">
                                        <div class="piece-body">
                                            <div class="col-xs-12 no-padding">
                                                <div class="col-xs-12  under-line bordered-bottom ">
                                                    <div class="col-xs-3">
                                                        <h6>المستفيد من خدمة التطوع </h6>
                                                    </div>
                                                    <?php $mostafed_type_arr =array(0=>'داخلى',1=>'خارجى');?>
                                                       <?php for ($a=0;$a<sizeof($mostafed_type_arr);$a++){ ?>
                                                           <div class="col-xs-3">
                                                               <input type="radio" id="mostafed_type_fk" name="mostafed_type_fk"
                                                                    onclick="GetMostafed_type(<?php echo$a;?>)"  value="<?php echo$a;?>"
                                                                      <?php if($mostafed_type_fk ==$a){  ?>  checked <?php } ?>
                                                                       >
                                                               <label><?php echo$mostafed_type_arr[$a];?></label>

                                                           </div>
                                                    <?php  }  ?>
                                                </div>
                                                <div class="col-xs-12 no-padding under-line open_green ">
                                                    <div class="col-xs-4 managment-div-select" >
                                                        <h6>الجهة/الإدارة<span class="valu"> </span></h6>
                                                        <div id="edara_direction">
                                                            <?php if($mostafed_type_fk ==0){  ?>
                                                                <select name="mostafed_edara_id" id=""
                                                                        class="form-control bottom-input selectpicker"
                                                                        data-show-subtext="true" data-live-search="true"
                                                                        data-validation="required" aria-required="true">
                                                                    <option value="">إختر</option>
                                                                    <?php
                                                                    if (!empty($admin)):
                                                                        foreach ($admin as $record):
                                                                              $select='';
                                                                    if($mostafed_edara_id == $record->id){
                                                                        $select ='selected';
                                                                    } ?>
                                                                            <option
                                                                                value="<? echo $record->id; ?>" <?=$select?>>
                                                                                <? echo $record->name; ?></option>
                                                                            <?php
                                                                        endforeach;
                                                                    endif;
                                                                    ?>
                                                                </select>


                                                            <?php }elseif($mostafed_type_fk ==1){ ?>
                                                                <select name="mostafed_direction_id" id="destination" style="width: 80%;float: right"
                                                                        class="form-control bottom-input selectpicker"
                                                                        data-show-subtext="true" data-live-search="true"
                                                                        data-validation="required" aria-required="true">
                                                                    <option value="">إختر</option>
                                                                    <?php
                                                                    if (!empty($ghat)):
                                                                        foreach ($ghat as $record):
                                                                            $select='';
                                                                            if($mostafed_direction_id == $record->id_setting){
                                                                                $select ='selected';
                                                                            }
                                                                            ?>
                                                                            <option
                                                                                value="<? echo $record->id_setting; ?>"  <?=$select?>>
                                                                                <? echo $record->title_setting; ?></option>
                                                                            <?php
                                                                        endforeach;
                                                                    endif;
                                                                    ?>
                                                                </select>
                                                                <button type="button" id="button_append" class="btn btn-info btn-sm" title="إضافة جهه أخرى" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button>


                                                                <!------------------------------------------------------------------------------------------------------------>
                                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                    <div class="modal-dialog "  role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title" id="myModalLabel">اضافه جهه انتداب</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="col-md-12">
                                                                                    <div class="col-xs-7 col-xs-offset-2">
                                                                                        <div class="form-group">
                                                                                            <h6>اسم الجهه:<span class=""></span></h6>
                                                                                            <input type="text" id="destin" name="dest" class="form-control" style="width: 80%;float: right">
                                                                                            <button type="button" id="save" onclick="add_option($('#destin').val());" class="btn btn-danger"  style="float: left" data-dismiss="modal">حفظ</button>

                                                                                        </div>
                                                                                        <div class="clearfix"></div>
                                                                                        <br>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer" style="display: inline-block;width:100%;">
                                                                                <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <!------------------------------------------------------------------------------------------------------------------------------>


                                                            <?php }?>


                                                        </div>

                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h6>المسئول <span class="valu"> </span></h6>
                                                        <input type="text" id="responsible" name="responsible" value="<?=$responsible?>"   data-validation="required"  class="form-control">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h6>الوظيفة <span class="valu"> </span></h6>
                                                        <input type="text" id="job" name="job"  value="<?=$job?>"  data-validation="required"  class="form-control">
                                                    </div>

                                                </div>
                                                <div class="col-xs-12 no-padding under-line  ">
                                                    <div class="col-xs-4">
                                                        <h6>الهاتف<span class="valu"
                                                                        style="background-color: #fff;color: #ff0000;padding: 0 6px;border-radius: 7px;">  ( 10 ارقام فقط)</span></h6>

                                                        <input type="text" id="tele" name="tele"  maxlength="10"  onkeyup="check_len($(this).val());"
                                                               data-validation="required" value="<?=$tele?>" onkeypress="validate_number(event)" class="form-control">

                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h6>الجوال <span class="valu" style="background-color: #fff;color: #ff0000;padding: 0 6px;border-radius: 7px;"
                                                            >  ( 10 ارقام فقط)</span></h6>

                                                        <input type="text" id="mob" name="mob" maxlength="10"  onkeyup="check_len($(this).val());"
                                                               data-validation="required"  value="<?=$mob?>" onkeypress="validate_number(event)"  class="form-control">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h6>البريد الألكتروني <span class="valu"> </span></h6>
                                                        <input type="email" id="email" name="email"   value="<?=$email?>"  data-validation="required"    class="form-control">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="piece-box">

                                        <div class="piece-body" >
                                            <div class="col-xs-12  under-line bordered-bottom ">
                                                <h6>&nbsp  الوصف</h6>
                                            </div>
                                            <table class="table table-bordered"  >
                                                <thead>
                                                <tr class="open_green">
                                                    <th>التاريخ</th>
                                                    <th>من الساعة</th>
                                                    <th>إلى الساعة</th>
                                                    <th>المدة</th>
                                                    <th>المكان</th>
                                                    <th>النشاط/البرنامج/الفعاليات</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                <tr>
                                                    <td><input type="date"    value="<?=$volunteer_date?>"  name="volunteer_date" id="volunteer_date" data-validation="required"></td>
                                                    <td><input type="time"   data-validation="required" name="from_time"   id="from_time"
                                                        value="<?=$from_time?>"        onchange="count($('#volunteer_date').val())"></td>
                                                    <td><input type="time"  data-validation="required"  name="to_time" id="to_time"
                                                               value="<?=$to_time?>"     onchange="count($('#volunteer_date').val())" ></td>
                                                    <td><input type="text"          value="<?=$num_hours?>"    name="num_hours" id="num_hours" readonly style="width: 107px" ></td>
                                                    <td><input type="text"   value="<?=$place?>" data-validation="required"  name="place"  style="width: 107px" ></td>
                                                    <td>
                                                        <textarea data-validation="required" style="margin: 0px; width: 193px; height: 69px;" name="activities" cols="30" rows="10"><?=$place?></textarea></td>

                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="col-xs-12  under-line open_green">
                                                <div class="col-sm-6">
                                                <h6>&nbsp  طبيعة العمل التطوعي</h6>
                                                <textarea name="volunteer_description" class=" form-control"  data-validation="required" id="volunteer_description" style="margin: 0px;  height: 68px;"
                                                      cols="30" rows="10"><?=$volunteer_description?></textarea>
                                                </div>
                                            </div>


                                        </div>

                                    </div>




                                </div>
                        <div class="col-md-12">
                            <div class="col-md-5"></div>
                            <div class="col-md-4">     <input type="submit" id="buttons"  value="حفظ" class="btn btn-add"  name="add"></div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <div   id="load3">

        <?php $data_load["personal_data"]=$personal_data;
        $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);?>

    </div>
</div>
<?php
if(isset($records)&&!empty($records)){?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-12">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> ساعات التطوع</h3>
            </div>
            <div class="panel-body">

<!-----------------------------------------table------------------------------------->

        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="visible-md visible-lg">
                <th>مسلسل</th>
                <th>الرقم الوظيفي</th>
                <th>إسم الموظف</th>
                <th>نوع المستفيد</th>
                <th>الجهة/الإدارة</th>
                <th>التفاصيل</th>
                <th> الاجراء</th>
                <th>الحالة </th>
            </tr>
            </thead>
            <tbody>
            <?php $mostafed_type_arr =array(0=>'داخلى',1=>'خارجى');?>

            <?php
                $x = 1;
                foreach ($records as $row) {
                    if($row->mostafed_type_fk ==1){
                    $edara_geha=$row->title_setting;
                    }elseif($row->mostafed_type_fk ==0){
                    $edara_geha=$row->department_name;
                    }
                    ?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->emp_code ;?></td>
                        <td><?php echo $row->employee ;?></td>
                        <td><?php echo $mostafed_type_arr[$row->mostafed_type_fk] ;?></td>
                        <td><?php echo $edara_geha;?></td>
                        <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>">التفاصيل</button></td>
                        <td>
                            <a href="<?php echo base_url(); ?>human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours/<?php echo $row->id;?>"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                            <a href="<?php echo base_url(); ?>human_resources/employee_forms/Volunteer_hours/delete_volunteer_hours/<?php echo $row->id;?>"
                               onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                             aria-hidden="true"></i> </a>
                        </td>
                        <td></td>
                    </tr>
                    <?php $x++; } ?>
            </tbody>
        </table>



    <!--------------------------------------------table---------------------------------->



    <!--------------------------------------------------------modal------------------------------------>


                <?php
                if (isset($records) && !empty($records)) {
                    $x = 1;
                    foreach ($records as $row) { ?>
                        <div class="modal fade" id="myModal<?php echo$row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog " style="width: 80%" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                    </div>
                                    <div class="modal-body">
                                            <div class="print_forma  col-xs-12 no-padding">
                                                <div class="piece-box">
                                                    <div class="piece-body">
                                                        <div class="col-xs-12 no-padding">
                                                            <div class="col-xs-12  under-line bordered-bottom ">
                                                                <h6>&nbsp بيانات الموظف</h6>
                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line open_green">

                                                                <div class="col-xs-4">
                                                                    <h6>اسم الموظف:<span class="valu">/<?php echo $row->employee ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>الرقم الوظيفي<span class="valu">/<?php echo $row->emp_code ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>رقم الهوية<span class="valu">/<?php echo $row->card_num ;?></span></h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line ">
                                                                <div class="col-xs-4">
                                                                    <h6>المسمى الوظيفي<span class="valu">/<?php echo $row->job_title ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>الإدارة<span class="valu">/<?php echo $row->admin_title ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>القسم<span class="valu">/<?php echo $row->department_title ;?></span></h6>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="piece-box">
                                                    <div class="piece-body">
                                                        <div class="col-xs-12 no-padding">
                                                            <div class="col-xs-12  under-line bordered-bottom ">
                                                                <div class="col-xs-3">
                                                                    <h6>المستفيد من خدمة التطوع </h6>
                                                                </div>
                                                                <?php
                                                                $mostafed_type_arr =array(0=>'داخلى',1=>'خارجى');?>
                                                                <?php for ($a=0;$a<sizeof($mostafed_type_arr);$a++){  ?>
                                                                    <div class="col-xs-3">
                                                                        <input type="radio" id="mostafed_type_fk" name="mostafed_type_fk"
                                                                                value="<?php echo$a;?>"
                                                                            <?php if($a == $row->mostafed_type_fk ){ ?>
                                                                            checked   <?php } ?>  disabled>
                                                                        <label><?php echo$mostafed_type_arr[$a];?></label>

                                                                    </div>
                                                                <?php  }  ?>
                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line open_green ">
                                                               <?php        if($row->mostafed_type_fk ==1){
                                                                   $edara_geha=$row->title_setting;
                                                               }elseif($row->mostafed_type_fk ==0){
                                                                   $edara_geha=$row->department_name;
                                                               }
                                                                   ?>
                                                                <div class="col-xs-4">
                                                                    <h6>الجهة/الإدارة<span class="valu">/<?php echo $edara_geha ;?> </span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>المسئول <span class="valu">/ <?php echo $row->responsible ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>الوظيفة <span class="valu">/ <?php echo $row->job ;?></span></h6>
                                                                </div>

                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line  ">
                                                                <div class="col-xs-4">
                                                                    <h6>الهاتف<span class="valu">/<?php echo $row->tele ;?> </span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>الجوال <span class="valu">/ <?php echo $row->mob ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>البريد الألكتروني <span class="valu">/<?php echo $row->email ;?> </span></h6>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="piece-box">

                                                    <div class="piece-body" >
                                                        <div class="col-xs-12  under-line bordered-bottom ">
                                                            <h6>&nbsp  الوصف</h6>
                                                        </div>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr class="open_green">
                                                                <th>التاريخ</th>
                                                                <th>من الساعة</th>
                                                                <th>إلى الساعة</th>
                                                                <th>المدة</th>
                                                                <th>المكان</th>
                                                                <th>النشاط/البرنامج/الفعاليات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $from_time = strtotime($row->from_time);
                                                            $to_time = strtotime($row->to_time);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row->volunteer_date_ar ;?></td>
                                                                <td><?php  if(!empty($from_time)){ echo date('h:ia',$from_time) ;}?></td>
                                                                <td><?php if(!empty($to_time)){  echo date('h:ia',$to_time); }?></td>
                                                                <td><?php echo $row->num_hours ;?></td>
                                                                <td><?php echo $row->place ;?></td>
                                                                <td> <textarea readonly><?php echo $row->activities ;?></textarea></td>
                                                            </tr>
                                                            </tbody>

                                                        </table>
                                                        <div class="col-xs-12  under-line open_green">
                                                            <h6>&nbsp  طبيعة العمل التطوعي</h6>
                                                            <textarea readonly><?php echo $row->volunteer_description ;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php } }  ?>


                <!--------------------------------------------------------modal------------------------------------>

            </div>
</div>
</div>
</div>
<?php } ?>


<!--------------------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        var roles =<?php echo$role;?>;
        var emp_id =<?php echo$emp_id;?>;
        var emp_id_fk =<?php echo$emp_id_fk;?>;
        if(roles ==3){
            get_emp_data(emp_id);
            $("#emp_id_fk").attr('disabled',true);
        }else {
            $("#emp_id_fk").attr('disabled',false);
        }
        if( emp_id_fk !=''  ){
            get_emp_data(emp_id_fk);

        }
    });

</script>
<script>
    function GetMostafed_type(valu) {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/GetMostafed_type",
            data:{valu:valu},
            success:function(d) {

                $('#edara_direction').html(d);


            }
        });
        
    }
</script>




<script>
    function get_emp_data(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/get_emp_data",
            data:{valu:valu},
            success:function(d) {


                var obj=JSON.parse(d);


                $('#job_title_id_fk').val(obj.degree_id);
                $('#job_title').val(obj.degree_id);
                $('#national_id').val(obj.card_num);
                $('#employ_code').val(obj.emp_code);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                //$('#manger').val(obj.manger);
                $("#job_title").attr('disabled',true);
                $('#job_title_hidden').val(obj.degree_id);

               // $("#manger").attr('disabled',true)
                $('#job_title_hidden').val(obj.degree_id);
                $('#edara_name').val(obj.administration);
                $('#edara_name_hidden').val(obj.administration);
                $("#edara_name").attr('disabled',true);
                $('#qsm_name').val(obj.department);
                $('#qsm_name_hidden').val(obj.department);
                $("#qsm_name").attr('disabled',true);
            }




        });


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/get_load_page",
            data:{valu:valu},
            success:function(d) {

                $('#load3').html(d);


            }






        });
    }


</script>


<script>
    /*
    var a=1;
    function add_row(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = a++;
        // var len = x.rows.length;
        var dataString   ='lenth=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Volunteer_hours/add_volunteer_table',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
               // $('#saves').show();
            }
        });

    }
*/

</script>



<script>

    function count( mydate) {

        var from_time=$("#from_time").val();
        var to_time=$("#to_time").val();

        myfrom_time = mydate + ' ' +from_time;
        myto_time = mydate + ' ' +to_time;

        var dataString = 'from_time=' + myfrom_time  +'&to_time=' + myto_time;
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/GetNum_hours",
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);

              $('#num_hours').val(JSONObject['hours']+ ':' + JSONObject['minutes']);
            }
        });


    }
</script>


<script>
    function check_len(length)
    {

        var len=length.length;
        if(len<10){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len>10){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len==10){
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }


    }



</script>

<script>
    function add_option(valu)
    {

        var id='<?php echo $last_id +1;?>';

        var x=$('#destination').val();
        $('#destination').append('<option value='+id+' selected>'+valu+'</option>');
        $('.selectpicker').selectpicker('refresh');
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/add_option",
            data:{valu:valu},
            success:function(d) {
                document.getElementById("button_append").setAttribute("disabled", "disabled");
            }

        });
    }


</script>





