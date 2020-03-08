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
        margin-bottom: 0
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
</style>
<?php
if(isset($result)&&!empty($result)){
    $emp_id_fk = $item->emp_id_fk;
                $emp_name = $item->emp_name;
    $emp_id_fk =$result->emp_id_fk;
    $emp_code=$result->emp_code;
    $card_num=$result->card_num;
    $job_title_id_fk=$result->job_title_id_fk;
    $edara_id_fk=$result->edara_id_fk;
    $qsm_id_fk=$result->qsm_id_fk;
    $date=$result->date_ar;
    $direct_manager_id_fk=$result->employee;
    $direct_manager_job_title_fk=$result->direct_manager_job_title_fk;
    $nazran=$result->nazran;
    $work_assigned=$result->work_assigned;
    $max_hours=$result->max_hours;
    $overtime_hours_details=$result->overtime_hours_details;
    $emp_code_fk = $item->emp_code_fk;
    $edara_id_fk = $item->edara_id_fk;
    $edara_n = $item->edara_n;
    $qsm_id_fk = $item->qsm_id_fk;
    $qsm_n = $item->qsm_n;
    $marad_name = $item->marad_name;
    $job_title=$item->job_title;



}else{

    $emp_id_fk='';
  
    $emp_name = '';
    $emp_code='';
    $card_num='';
    $job_title_id_fk='';
    $edara_id_fk='';
    $qsm_id_fk='';
    $date= date('Y-m-d');
    $direct_manager_id_fk ='';
    $direct_manager_job_title_fk ='';
    $nazran ='';
    $work_assigned ='';
    $max_hours ='';
    $overtime_hours_details ='';
    $emp_id_fk = '';
    $emp_code_fk = '';
    $edara_id_fk = '';
    $edara_n = '';
    $qsm_id_fk = '';
    $qsm_n = '';
    $job_title='';
}
?>

<!--------------------------------------------------------modal------------------------------------>

<div class="col-sm-12 no-padding " >
  
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($result)&&!empty($result)){ ?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/overtime_hours_orders/edit_overtime_hours_orders/<?php echo $this->uri->segment(5);?>" method="post">
                    <?php } else{?>
                    <form action="<?php echo base_url();?>human_resources/employee_forms/overtime_hours_orders/add_overtime_hours_orders" method="post">
                        <?php }?>
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

                        <div class="print_forma  col-xs-12 no-padding">
                            <!-------------------------------------------------------------------------------->

                            <div >
                                <div >
                                    <div class="col-xs-12 no-padding">
                                       
                                        <div class="col-xs-12 no-padding ">

                                        <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">اسم الموظف</label>
                                    <input name="" id="emp_name" class="form-control" style="width:84%; float: right;"
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
                                    <input name="emp_code_fk" id="emp_code" class="form-control"
                                           value="<?php if (!empty($emp_data->emp_code)) {
                                               echo $emp_data->emp_code;
                                           } else {
                                               echo $emp_code_fk;
                                           } ?>" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> المسمى الوظيفي</label>
                                    <input name="job_title" id="job_title" class="form-control"
                                           value="<?php if (!empty($emp_data->job_title)) {
                                               echo $emp_data->job_title;
                                           }else{
                                            echo $job_title;
                                           } ?>" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> الأدارة </label>
                                    <input name="edara_n" id="edara_n" class="form-control"
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
                                    <div class="modal-dialog" role="document" style="width: 80%">
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










                                    <!--  -->
                                       
                                           <div class="form-group col-md-3 col-sm-6 padding-4">
                                            <label class="label"> التاريخ</label>
                                                <input type="text" id="date"   name="date"  readonly class="form-control" value="<?php echo $date;?>" >
                                            </div>
                                        </div>
                                    </div>
                                

                            </div>


                            <div class="piece-box">
                                <div class="piece-heading">
                                    <h6>&nbsp  المدير المباشر</h6>
                                </div>
                                <div class="piece-body" >
                                    <div class="col-xs-12 under-line open_green">
                                        <h5 class="text-center">الأستاذ / <input type="text" readonly  class="mystyle" name="direct_manager_id_fk"  id="direct_manager_id_fk" value="<?=$direct_manager_id_fk?>"/>   المحترم</h5>

                                        <h5>  &nbsp &nbsp&nbsp&nbsp مسمى الوظيفة : <input type="text" readonly name="direct_manager_job_title_fk"  id="direct_manager_job_title_fk" value="<?=$direct_manager_job_title_fk?>" class="mystyle" /></h5>

                                        <h6>  &nbsp &nbsp&nbsp&nbsp  نظراً لـ<input  type="text"  class="mystyle" name="nazran" value="<?=$nazran?>" /> فقد تم تكليفكم بإنجاز العمل التالي :</h6><br>

                                        <h6 >&nbsp &nbsp&nbsp&nbsp  -	<textarea    style="margin: 0px; height: 49px; width: 347px;" name="work_assigned" ><?=$work_assigned?></textarea></h6>

                                        <h6 class="text-center">&nbsp   على أن يتم ذلك خلال اليوم/الأيام والأوقات المحددة أدناه </h6>
                                        <h6 class="text-center">وألا تتجاوز عدد الساعات (  <input  type="text" class="mystyle3" value="<?=$max_hours?>"  onkeyup="$('#mytable').hide(),$('#resultTable').html('')" onkeypress="validate_number(event)" name="max_hours" id="max_hours" />    ) ساعة / ساعات .     وجزاكم الله خيراً ،،،</h6><br>

                                    </div>
                                    <div class="col-xs-12 no-padding text-center" style="margin: 10px 0;">
                                      
                                        <button type="button" value="" id="" onclick="add_row()" class="btn btn-success btn-labeled"/>
                                        <span class="btn-label"><i class="fa fa-plus"></i></span> إضافةعمل </button>
                                    </div>
                                    <div class="col-xs-12 no-padding">
                                        <table class="table table-bordered table_tb"    id="mytable">
                                            <thead>
                                            <tr class="greentd">
                                                <th>التاريخ</th>
                                                <th>من الساعة</th>
                                                <th>إلى الساعة</th>
                                                <th>المدة</th>
                                                <th>البدل الأضافي</th>
                                                <th>العمل المكلف بإنجازه</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody id="resultTable">
                                              <!-- new -->
                                              <tr class="open_green" id="tr1">
                                                <td><input type="date" class="form-control" name="date[]" id="date" data-validation="required" value="<?php echo date("Y-m-d");?>"></td>
                                                <td><input type="time" class="form-control"   data-validation="required" name="from_time[]"   id="from_time1"
                                                           onchange="count(1)"></td>
                                                <td><input type="time" class="form-control"  data-validation="required"  name="to_time[]" id="to_time1"
                                                           onchange="count(1)" ></td>
                                                <td><input type="text"    class="num_hours form-control" name="num_hours[]" id="num_hours1" readonly style="width: 107px">
                                                    <input type="hidden"    class="minutes" name="" id="minutes1" readonly style="width: 107px">
                                                </td>
                                                <td><select name="bdal_type[]" id="bdal_type" class="form-control "  data-validation="required" aria-required="true">
                                                        <option value="">إختر</option>
                                                        <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>
                                                        <?php for ($a=0;$a<sizeof($bdal_type_arr);$a++){ ?>
                                                            <option value="<?=$a?>"><?=$bdal_type_arr[$a]?></option>
                                                        <?php } ?>
                                                    </select></td>
                                                <td><textarea name="work_assigned_arr[]"  class="form-control" cols="30" data-validation="required" rows="2"></textarea></td>
                                                <td>
                                            
                                                    <a href="#"
                                                       onclick=" RemoveMe('tr1' );"><i class="fa fa-trash"
                                                                                                                     aria-hidden="true"></i> </a>
                                                </td>
                                            </tr>

                                            <?php if(!empty($overtime_hours_details)){ ?>
                                            <?php $difference=0; $hours=0;  $z=1; foreach ($overtime_hours_details as $record){
                                            $class = '';
                                            if ($z % 2 == 0) {
                                                $class = 'open_green';
                                            }

                                            $difference = ( strtotime($record->to_time) -  strtotime($record->from_time));
                                            $hours = $difference / 3600;
                                            $minutes =$hours * 60;

                                            ?>
                                            <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>

                                            <tr class="<?=$class?>" id="tr<?=$z?>">
                                                <td><input type="hidden" name="date[]" id="date"  value="<?=$record->date ?>"><?=$record->date ?></td>
                                                <td><input type="hidden"   value="<?=$record->from_time?>" name="from_time[]"
                                                        ><?=$record->from_time?></td>
                                                <td><input type="hidden"   value="<?=$record->to_time?>" name="to_time[]"
                                                    ><?=$record->to_time?></td>
                                                <td><input type="hidden"   value="<?=$record->num_hours?>" name="num_hours[]"
                                                    ><?=$record->num_hours?></td>
                                                <input type="hidden"    class="minutes"   value="<?php echo $minutes;?>" id="minutes<?php echo$z;?>"  >
                                                <td>

                                                    <input type="hidden"   value="<?=$record->bdal_type?> " name="bdal_type[]">
                                                    <?php if($record->bdal_type ==1){ echo 'بدل أيام الراحة';}elseif($record->bdal_type ==0){ echo'بدل نقدي';}?></td>
                                                <td><textarea  name="work_assigned[]" style="margin: 0px; width: 193px; height: 69px;"  readonly cols="30" rows="10"><?=$record->work_assigned?></textarea></td>
                                                <td>
                                                    <a href="#"
                                                       onclick=" RemoveMe('tr<?=$z?>' );"><i class="fa fa-trash"
                                                                                                              aria-hidden="true"></i> </a>
                                                </td>
                                            </tr>

                                          

                                            </tbody>
                                            <?php $z++;} ?>
                                            <?php } ?>
                                        </table>


                                    </div>

                                </div>

                            </div>





                            <!-------------------------------------------------------------------------------->





                        </div>
                        <!-- <div class="col-md-12"> -->
                            <!-- <div class="col-md-5"></div>
                            <div class="col-md-4">     <input type="submit" id="buttons"  value="حفظ" class="btn btn-add"  name="add"></div>
                            <div class="col-md-3"></div> -->
                            <div class="col-xs-12 text-center" >
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
                            <br/>
                            <br/>
                        <!-- </div> -->
                    </form>
            </div>
        </div>
    </div>

   
</div>
<?php
if(isset($records)&&!empty($records)){?>
    <div class="col-sm-12 no-padding " >
        
            <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"> بيانات التكليف الإضافى</h3>
                </div>
                <div class="panel-body">

                    <!-----------------------------------------table------------------------------------->

                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd visible-md visible-lg">
                            <th>مسلسل</th>
                            <th>الرقم الوظيفي</th>
                            <th>إسم الموظف</th>
                          
                            <th> الاجراء</th>
                            <th>الحالة </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $row) {
                 
                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->emp_code ;?></td>
                                <td><?php echo $row->employee ;?></td>
                                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>"><i class="fa fa-list"></i></button>
                                
                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Overtime_hours_orders/edit_overtime_hours_orders/<?php echo $row->id;?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Overtime_hours_orders/delete_overtime_hours_orders/<?php echo $row->id;?>"
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
                                                                <h6>&nbsp </h6>
                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line open_green">
                                                                <div class="col-xs-4">
                                                                    <h6>اسم الموظف<span class="valu">/<?php echo $row->employee ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>الرقم الوظيفي<span class="valu">/<?php echo $row->emp_code ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>المسمى الوظيفي<span class="valu">/<?php echo $row->job_title ;?></span></h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line ">
                                                                <div class="col-xs-4">
                                                                    <h6>الإدارة<span class="valu">/<?php echo $row->admin_title ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>القسم<span class="valu">/<?php echo $row->department_title ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>التاريخ<span class="valu">/<?php echo date('Y-m-d',$row->date_s);?></span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="piece-box">
                                                    <div class="piece-heading">
                                                        <h6>&nbsp  المدير المباشر</h6>
                                                    </div>
                                                    <div class="piece-body" >
                                                        <div class="col-xs-12 under-line open_green">
                                                            <h5 class="text-center">الأستاذ / <?=$row->employee?>   المحترم</h5>

                                                            <h5>  &nbsp &nbsp&nbsp&nbsp مسمى الوظيفة : <?=$row->direct_manager_job_title_fk?></h5>

                                                            <h6>  &nbsp &nbsp&nbsp&nbsp نظراً لـ <?=$row->nazran?> فقد تم تكليفكم بإنجاز العمل التالي :</h6><br>

                                                            <h6>&nbsp &nbsp&nbsp&nbsp  -	<?=$row->work_assigned?></h6>

                                                            <h6 class="text-center">&nbsp   على أن يتم ذلك خلال اليوم/الأيام والأوقات المحددة أدناه </h6><br>
                                                            <h6 class="text-center">وألا تتجاوز عدد الساعات (  <?=$row->max_hours?>   ) ساعة / ساعات .     وجزاكم الله خيراً ،،،</h6><br>


                                                        </div>
                                                        <div class="col-xs-12 no-padding">
                                                            <?php if(!empty($row->overtime_hours_details)){ ?>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>التاريخ</th>
                                                                    <th>من الساعة</th>
                                                                    <th>إلى الساعة</th>
                                                                    <th>المدة</th>
                                                                    <th>البدل الأضافي</th>
                                                                    <th>العمل المكلف بإنجازه</th>
                                                                </tr>
                                                                </thead>
                                                        <?php $z=1; foreach ($row->overtime_hours_details as $record){
                                                            $class = '';
                                                            if ($z % 2 == 0) {
                                                                $class = 'open_green';
                                                            }

                                                            ?>
                                                            <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>
                                                                <tbody >
                                                                <tr class="<?=$class?>">
                                                                    <td><?=$record->date ?></td>
                                                                    <td><?=$record->from_time?></td>
                                                                    <td><?=$record->to_time?></td>
                                                                    <td><?=$record->num_hours?></td>
                                                                    <td>   <?php if($record->bdal_type ==1){ echo 'بدل أيام الراحة';}elseif($record->bdal_type ==0){ echo'بدل نقدي';}?></td>
                                                                    <td><textarea style="margin: 0px; width: 193px; height: 69px;"  readonly cols="30" rows="10"><?=$record->work_assigned?></textarea></td>
                                                                </tr>

                                                                </tbody>
                                                                <?php $z++;} ?>
                                                            </table>
                                                            <?php } ?>
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
<?php } ?>


<!--------------------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        var emp_id_fk =<?php echo$emp_id_fk;?>;
        if( emp_id_fk !=''  ){
            get_emp_data(emp_id_fk);

        }
    });

</script>







<script>

     var a=1;
     function add_row(){
         var hours =$('#max_hours').val();
   if(hours >0 && hours !=''){
     $("#mytable").show();
     var x = document.getElementById('resultTable');
     var y = document.getElementById('mytable');
     var len = a++;
     var table_max = y.rows.length;
     var dataString   ='lenth=' + len +'& table_max='+ table_max;

     $.ajax({
     type:'post',
     url: '<?php echo base_url() ?>human_resources/employee_forms/Overtime_hours_orders/add_overtime_hours_work',
     data:dataString,
     dataType: 'html',
     cache:false,
     success: function(html){
     $("#resultTable").append(html);
     // $('#saves').show();
     }
     });
         } else {

            alert(' إختر  عدد ساعات العمل !!');
            //  swal({
            //                 title: " إختر  عدد ساعات العمل !!",
            //                 type: "warning",
            //                 confirmButtonClass: "btn-warning",
            //                 closeOnConfirm: false
            //             });
         }
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
    function RemoveMe(valu) {
        $('#' + valu).remove();
    }

</script>




<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/Overtime_hours_orders/getConnection_emp/',

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
        var direct_manager_id_fk = obj.dataset.direct_manager_id_fk;
        var  direct_manager_job_title_fk =obj.dataset. direct_manager_job_title_fk;

        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('direct_manager_id_fk').value = direct_manager_id_fk;
        document.getElementById('direct_manager_job_title_fk').value = direct_manager_job_title_fk;
        

        $("#myModal_emps .close").click();

    }

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>


<script>
    function get_emp_data(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Overtime_hours_orders/get_emp_data",
            data: {valu: valu},
            success: function (d) {


                var obj = JSON.parse(d);


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
            type: 'post',
          
            url: "<?php echo base_url();?>human_resources/employee_forms/Overtime_hours_orders/get_load_page",
            data: {valu: valu},
            success: function (d) {

                $('#load3').html(d);


            }


        });
    }


</script>