<style type="text/css">
    .mystyle{
        width: 37%;
        height: 34px;
        padding: 6px 6px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;


    }
    .mystyle3{
        width: 9%;
        height: 34px;
        padding: 6px 6px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;


    }


    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #09704e;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #09704e;
        display: inline-block;
        float: right;
        width: 100%;
        color: #fff;
        padding: 5px;
    }
    .piece-body {
        padding: 10px;
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
    .piece-body h5{
        margin: 5px 0;
    }
    .piece-box table{
        /*  margin-bottom: 0*/
    }
    .piece-box table th,
    .piece-box table td
    {
        /*  padding: 2px 8px !important;*/
    }
    table.table_tb tbody td {
        padding:0;
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

    .piece-box .table-bordered>thead>tr>th,.piece-box  .table-bordered>tbody>tr>th,
    .piece-box .table-bordered>tfoot>tr>th,.piece-box  .table-bordered>thead>tr>td,
    .piece-box .table-bordered>tbody>tr>td,.piece-box  .table-bordered>tfoot>tr>td {
        border: 1px solid #09704e  !important;
        background-color: #fff;
        border-radius: 0 !important;
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
    .under-line .col-sm-2 ,
    .under-line .col-sm-3 ,
    .under-line .col-sm-4,
    .under-line .col-sm-5,
    .under-line .col-sm-6 ,
    .under-line .col-sm-8
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


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }
    .green-bg{
        background-color: #09704e !important;
        color: #fff !important;
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
    $emp_code =$result->emp_code;
    $job_title =$result->job_title;
   // $emp_code_fk = $result->emp_code_fk;
    $edara_id_fk = $result->edara_id_fk;
    $emp_name  = $result->emp_name;
    $edara_n = $result->edara_name;
    $qsm_id_fk = $result->qsm_id_fk;
    $qsm_n = $result->qsm_name;
   // $marad_name = $item->marad_name;



}else{

    $emp_id_fk='';
    $emp_code='';
    $emp_name = '';
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
    $volunteer_date =date('Y-m-d');
    $to_time ='';
    $from_time ='';
    $num_hours ='';
    $place ='';
    $activities ='';
    $volunteer_description ='';
    $emp_code='';
    $emp_id_fk = '';
    $emp_code_fk = '';
    $edara_id_fk = '';
    $edara_n = '';
    $qsm_id_fk = '';
    $qsm_n = '';
    $job_title='';
}
?>

<?php $role=$_SESSION['role_id_fk'];  $emp_id=$_SESSION['emp_code'];  ?>
<!--------------------------------------------------------modal------------------------------------>

<div class="col-sm-12 no-padding " >

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

                  <div class="col-xs-12 no-padding">
                                    
                    <!-- <div class="col-xs-4">
                        <h6>رقم الهوية<span class="valu" id=""></span></h6>
                        <input type="text" id="national_id"  readonly class="form-control" value="<?=$card_num?>">
                    </div> -->
                    <input type="hidden" id="emp_id_fk" name="emp_id_fk"
                       value="<?php if (!empty($emp_data->id)) {
                           echo $emp_data->id;
                       } else {
                           echo $emp_id_fk;
                       } ?> ">
                            <input type="hidden" id="edara_id_fk" name="edara_id_fk"
                                   value="<?php if (!empty($emp_data->administration)) {
                                       echo $emp_data->administration;
                                   } else {
                                       echo $edara_id_fk;
                                   } ?>  ">

                            <input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
                                   value="<?php if (!empty($emp_data->department)) {
                                       echo $emp_data->department;
                                   } else {
                                       echo $qsm_id_fk;
                                   } ?>  ">
                        <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">اسم الموظف</label>
                                    <input data-validation="required" name="" id="emp_name" class="form-control" style="width:84%; float: right;"
                                           readonly
                                           
                                           value="<?php if (!empty($emp_data->employee)) {
                                               echo $emp_data->employee;
                                           } else {
                                               echo $emp_name;
                                           } ?>">
                                    <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                            class="btn btn-success btn-next" style="float: right;"
                                            onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                        echo 'disabled';
                                    } ?>>
                                        <i class="fa fa-plus"></i></button>

                                </div>
                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> الرقم الوظيفي</label>
                                    <input data-validation="required" name="emp_code_fk" id="emp_code" class="form-control"
                                           value="<?php if (!empty($emp_data->emp_code)) {
                                               echo $emp_data->emp_code;
                                           } else {
                                               echo $emp_code;
                                           } ?>" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> المسمى الوظيفي</label>
                                    <input data-validation="required" name="job_title" id="job_title" class="form-control"
                                           value=" <?php
                                            echo $job_title;
                                           ?>" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> الأدارة </label>
                                    <input data-validation="required" name="edara_n" id="edara_n" class="form-control"
                                           value="<?php if (!empty($emp_data->administration_name)) {
                                               echo $emp_data->administration_name;
                                           } else {
                                               echo $edara_n;
                                           } ?>" readonly>
                                </div>
                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> القسم</label>
                                    <input name="qsm_n" id="qsm_n" class="form-control"
                                           value="<?php if (!empty($emp_data->departments_name)) {
                                               echo $emp_data->departments_name;
                                           } else {
                                               echo $qsm_n;
                                           } ?>" readonly>
                                </div>

                                <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document" style="width: 70%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="myDiv_emp"></div>
                                            </div>
                                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                                <button type="button" class="btn btn-danger"
                                                        style="float: left;" data-dismiss="modal">إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">    رقم الهويه</label>
                                    <input name="card_num" id="card_num" class="form-control"
                                           value="<?php if (!empty($emp_data->card_num)) {
                                               echo $emp_data->card_num;
                                           } else {
                                               echo $card_num;
                                           } ?>" readonly>
                                </div>
                                <!--  <div class="col-xs-4">
                                                        <h6>رقم الهوية<span class="valu" id=""></span></h6>
                                                        <input type="text" id="national_id"  readonly class="form-control" value="<?=$card_num?>">
                                                    </div> -->

                            
                            <!-- <div class="col-xs-4">
                                <h6>عدد مرات انتداب الموظف:<span class="valu"></span></h6>
                                <input type="text" disabled  name="times" id="times" value="<?php echo $times;?>"   data-validation="required" class="form-control">
                            </div> -->
                        
                    
                    
                                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                                    
                                                        <label class="label ">المستفيد من خدمة التطوع </label>
                                                
                                                    <?php $mostafed_type_arr =array(0=>'داخلى',1=>'خارجى');?>
                                                       <?php for ($a=0;$a<sizeof($mostafed_type_arr);$a++){ ?>
                                                         <div class="radio-content">
                                                               <input type="radio" id="mostafed_type_fk<?php echo$a;?>" name="mostafed_type_fk"
                                                                    onclick="GetMostafed_type(<?php echo$a;?>)"  value="<?php echo$a;?>"
                                                                      <?php if($mostafed_type_fk ==$a){  ?>  checked <?php } ?>
                                                                       >
                                                               <label class="radio-label" for="mostafed_type_fk<?php echo$a;?>"><?php echo$mostafed_type_arr[$a];?></label>
                                                         </div>

                                                          
                                                    <?php  }  ?>
                                                </div>
                                              
                                                    <div class="col-md-3 managment-div-select form-group padding-4" >
                                                        <label class="label ">الجهة/الإدارة</label>
                                                        <div id="edara_direction">
                                                            <?php if($mostafed_type_fk ==0){  ?>
                                                                <select name="mostafed_edara_id" id=""
                                                                        class="form-control  selectpicker"
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
                                                                                value="<?php echo $record->id; ?>" <?=$select?>>
                                                                                <?php echo $record->name; ?></option>
                                                                            <?php
                                                                        endforeach;
                                                                    endif;
                                                                    ?>
                                                                </select>


                                                            <?php }elseif($mostafed_type_fk ==1){ ?>
                                                                <select name="mostafed_direction_id" id="destination" 
                                                                        class="form-control  selectpicker"
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
                                                                <button type="button" id="button_append" class="btn btn-success  " title="إضافة جهه أخرى" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button>


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
                                                    <div class="col-md-3 form-group padding-4">
                                                        <label class="label ">المسئول </label>
                                                        <input type="text" id="responsible" name="responsible" value="<?=$responsible?>"   data-validation="required"  class="form-control">
                                                    </div>
                                                    <div class="col-md-3 form-group padding-4">
                                                        <label class="label ">الوظيفة </label>
                                                        <input type="text" id="job" name="job"  value="<?=$job?>"  data-validation="required"  class="form-control">
                                                    </div>

                                               
                                           
                                                    <div class="col-md-2 form-group padding-4">
                                                        <label class="label ">الهاتف<span class="valu"
                                                                        style="background-color: #fff;color: #ff0000;padding: 0 6px;border-radius: 7px;">  ( 10 ارقام فقط)</span></label>

                                                        <input type="text" id="tele" name="tele"  maxlength="10"  onkeyup="check_len($(this).val());"
                                                               data-validation="required" value="<?=$tele?>" onkeypress="validate_number(event)" class="form-control">

                                                    </div>
                                                    <div class="col-md-2 form-group padding-4">
                                                        <label class="label ">الجوال <span class="valu" style="background-color: #fff;color: #ff0000;padding: 0 6px;border-radius: 7px;"
                                                            >  ( 10 ارقام فقط)</span></label>

                                                        <input type="text" id="mob" name="mob" maxlength="10"  onkeyup="check_len($(this).val());"
                                                               data-validation="required"  value="<?=$mob?>" onkeypress="validate_number(event)"  class="form-control">
                                                    </div>
                                                    <div class="col-md-2 form-group padding-4">
                                                        <label class="label ">البريد الألكتروني </label>
                                                        <input type="email" id="email" name="email"   value="<?=$email?>"  data-validation="required"    class="form-control">
                                                    </div>
                                                    
                                                    <div class="col-md-3 form-group padding-4">
                                                        <label class="label ">&nbsp  طبيعة العمل التطوعي</label>
                                                        <textarea name="volunteer_description" class=" form-control"  data-validation="required" id="volunteer_description" 
                                                              cols="30" rows="1"><?=$volunteer_description?></textarea>
                                                    </div>

                                          

                                            <div class="col-xs-12  no-padding ">
                                                <label class="label ">&nbsp  الوصف</label>

                                                <table class="table table-bordered tb_table"  >
                                                    <thead>
                                                    <tr class="greentd">
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
                                                        <td><input type="date"  class="form-control"  value="<?=$volunteer_date?>"  name="volunteer_date" id="volunteer_date" data-validation="required"></td>
                                                        <td><input type="time"  class="form-control"  data-validation="required" name="from_time"   id="from_time"
                                                            value="<?=$from_time?>"        onchange="count($('#volunteer_date').val())"></td>
                                                        <td><input type="time"  data-validation="required"  name="to_time" id="to_time"  class="form-control"
                                                                   value="<?=$to_time?>"     onchange="count($('#volunteer_date').val())" ></td>
                                                        <td><input type="text"    class="form-control"   value="<?=$num_hours?>"    name="num_hours" id="num_hours" readonly ></td>
                                                        <td><input type="text"  class="form-control" value="<?=$place?>" data-validation="required"  name="place"   ></td>
                                                        <td>
                                                            <textarea data-validation="required"  class="form-control" name="activities" cols="30" rows="1"><?=$place?></textarea></td>
    
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            
                                               </div>

                                          
                                                
                                        






                                </div>
                        <!-- <div class="col-md-12">
                            <div class="col-md-5"></div>
                            <div class="col-md-4">     <input type="submit" id="buttons"  value="حفظ" class="btn btn-add"  name="add"></div>
                            <div class="col-md-3"></div>
                        </div> -->
                        <div class="col-xs-12 text-center" style="margin-top: 0px">
                                <input type="hidden" name="add" value="add">
                                <button type="submit" 
                                        class="btn btn-labeled btn-success " id="buttons" name="add" value="حفظ"
                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                                <button type="button" class="btn btn-labeled btn-danger ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                                </button>

                                <button type="button" class="btn btn-labeled btn-purple ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                                </button>


                                <button type="button" class="btn btn-labeled btn-inverse " id="attach_button"
                                        data-target="#myModal_search" data-toggle="modal">
                                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                                </button>


                            </div>
                    </form>
            </div>
        </div>


   
</div>
<?php
if(isset($records)&&!empty($records)){?>
<div class="col-sm-12 no-padding " >

        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> ساعات التطوع</h3>
            </div>
            <div class="panel-body">

<!-----------------------------------------table------------------------------------->

        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="greentd visible-md visible-lg">
                <th>مسلسل</th>
                <th>الرقم الوظيفي</th>
                <th>إسم الموظف</th>
                <th>نوع المستفيد</th>
                <th>الجهة/الإدارة</th>
                
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
                        <td>
                            <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $row->id?>);">
                                <i class="fa fa-list "></i> </a>


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




            </div>
</div>

</div>
<?php } ?>

<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;" >التفاصيل </h4>
            </div>
            <div  class="modal-body" style="padding: 10px" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                        type="button" onclick="Print_details(document.getElementById('volunter_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->


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
              //  $('#job_title').val(obj.degree_id);
                $('#national_id').val(obj.card_num);
                $('#employ_code').val(obj.emp_code);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                //$('#manger').val(obj.manger);
                $("#job_title").attr('disabled',true);
               // $('#job_title_hidden').val(obj.degree_id);

               // $("#manger").attr('disabled',true)
             //   $('#job_title_hidden').val(obj.degree_id);
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


<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/Volunteer_hours/getConnection_emp/',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }

   
    function Get_emp_Name(obj) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        var adress = obj.dataset.adress;
        var emp_phone = obj.dataset.phone;
        var card_num=obj.dataset.card_num;
        

        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('card_num').value = card_num;
        
        
        

        $("#myModal_emps .close").click();

    }

</script>


<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>

<script>
    function Print_details(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url().'human_resources/employee_forms/Volunteer_hours/Print_details'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>


