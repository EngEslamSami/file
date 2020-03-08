

<?php
if (!isset($_POST['from_profile'])) {
    ?>

    <?php
    $this->load->view('admin/requires/header');
    $this->load->view('admin/requires/tob_menu');
}
?>

<style type="text/css">
    div.dataTables_wrapper {
      width: 100%;
      margin: 0 auto;
    }
</style>

<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;

    }
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
        color: #fff;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
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
        vertical-align: middle;
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


    .nonactive{
        pointer-events: none;
        cursor: not-allowed;
    }


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block ;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<?php

    if ($_SESSION['role_id_fk']==1 || $_SESSION['role_id_fk']==3){
        ?>
        <div >

<div class="col-xs-12 no-padding" >

        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
             <div class="col-md-10  padding-4">
                <?php
                if (isset($get_ezn) && !empty($get_ezn)){
                    echo form_open_multipart('human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_ezn/'.$get_ezn->id);
                    $no3_ezn = $get_ezn->no3_ezn;
                    $emp_id_fk = $get_ezn->emp_id_fk;
                    $emp_code_fk = $get_ezn->emp_code_fk;
                    $emp_name = $get_ezn->emp_name;
                    $edara_id_fk = $get_ezn->edara_id_fk;
                    $edara_n = $get_ezn->edara_n;
                    $qsm_id_fk = $get_ezn->qsm_id_fk;
                    $qsm_n = $get_ezn->qsm_n;
                    $job_title = $get_ezn->job_title;
                    $ezn_date = $get_ezn->ezn_date_ar;
                    $fatra_fk = $get_ezn->fatra_fk;
                    $from_hour = $get_ezn->from_hour;
                    $to_hour = $get_ezn->to_hour;
                    $total_hours = $get_ezn->total_hours;
                    $reason = $get_ezn->reason;
                    $update=1;

                } else{
                    echo form_open_multipart('human_resources/employee_forms/all_ozonat/Ezn_order');
                    $no3_ezn = '';
                    $emp_id_fk = '';
                    $emp_code_fk = '';
                    $emp_name = '';
                    $edara_id_fk = '';
                    $edara_n = '';
                    $qsm_id_fk = '';
                    $qsm_n = '';
                    $job_title = '';
                    $ezn_date =date('Y-m-d');
                    $fatra_fk = '';
                    $from_hour = '';
                    $to_hour = '';
                    $total_hours ='';
                    $reason = '';
                    $update=0;
                }
                ?>
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
                        <?php
                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                    <input type="hidden" name="from_profile" value="1"/>
                <?php } ?>
            
                    <input type="hidden" name="update" id="update" value="<?=$update?>"/>
            

                <div class="col-xs-12 no-padding">
                    <div class="form-group col-md-2  padding-4">
                        <label class="label ">نوع الاذن</label>
                        <?php   $permits=array(1=>'استئذان شخصي',2=>'استئذان للعمل');
                        $work_types=array("1"=>"فترة","2"=>"فترتين");
                        ?>

                        <select name="no3_ezn" id="no3_ezn" onchange="get_option($(this).val());"
                                data-validation="required"   class="form-control  ">
                            <option value=" " selected="">اختر</option>
                            <?php foreach ($permits as $key=>$value){?>
                                <option value="<?php echo $key;?>" <?php  if($no3_ezn==$key){ echo 'selected'; }?> > <?php echo $value;?></option>
                            <?php } ?>
                        </select>

                    </div>


                    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                        <label class="label ">اسم الموظف</label>
                        <input name="emp_name" id="emp_name" class="form-control" style="width:84%; float: right;"
                               readonly
                               onchange="checkValidateVacationDayes();"
                               value="<?php if (!empty($emp_data->employee)) {
                                   echo $emp_data->employee;
                               } else {
                                   echo $emp_name;
                               } ?>">
                        <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                class="btn btn-success btn-next" id="but"
                                onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                            echo 'disabled';
                        } ?>
                        >
                            <i class="fa fa-plus"></i></button>

                    </div>
                    <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> الرقم الوظيفي</label>
                        <input name="emp_code_fk" id="emp_code" class="form-control"
                               oninput="checkValidateVacationDayes()"
                               value="<?php if (!empty($emp_data->emp_code)) {
                                   echo $emp_data->emp_code;
                               } else {
                                   echo $emp_code_fk;
                               } ?>" readonly>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> المسمى الوظيفي</label>
                        <input name="job_title" id="job_title" class="form-control"
                               value="<?php if (!empty($emp_data->job_title)) {
                                   echo $emp_data->job_title;
                               }else {
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
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> القسم</label>
                        <input name="qsm_n" id="qsm_n" class="form-control"
                               value="<?php if (!empty($emp_data->departments_name)) {
                                   echo $emp_data->departments_name;
                               } else {
                                   echo $qsm_n;
                               } ?>" readonly>
                    </div>

                    <div class="form-group col-md-2  padding-4">
                        <label class="label ">تاريخ  الاذن</label>
                        <input type="date"   name="ezn_date"  id="start_date" value="<?= $ezn_date;?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class=" form-group col-md-2  padding-4">
                        <label class="label ">الفتره</label>
                        <select name="fatra_fk" id="fatra_fk" onchange="get_option($(this).val());"
                                data-validation="required"   class="form-control  ">
                            <option value=" " selected="">اختر</option>
                            <?php foreach ($work_types as $key=>$value){?>
                                <option value="<?php echo $key;?>" <?php  if($fatra_fk==$key){ echo 'selected'; }?>><?php echo $value;?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group col-md-2  padding-4">
                        <label class="label ">بداية الإذن</label>
                        <input type="text"   name="from_hour" onchange="get_time();" id="from_time" value="<?= $from_hour?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-2  padding-4">
                        <label class="label ">نهاية الإذن</label>
                        <input type="text"   name="to_hour" onchange="get_time();" id="to_time" value="<?= $to_hour?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-1  padding-4">
                        <label class="label ">المده</label>
                        <input type="text" readonly   name="total_hours" id="num_hours" value="<?= $total_hours?>"
                               class="form-control  ">
                    </div>
                    <div class="form-group col-md-3  padding-4">
                        <label class="label ">السبب</label>
                        <input class="form-control" id="reason" name="reason" value="<?= $reason?>" />
                        <!--
                        <textarea id="reason" name="reason" class="form-control"></textarea>-->
                    </div>
                     <div class="form-group col-md-3 text-center">
                    <span style="color: red" id="span_id"></span><br>
                   
                    <button type="submit"  class="btn btn-labeled btn-success " name="add_ezn" value="add_ezn" id="add_ezn"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                  </div>
                </div>
                <?php
                echo form_close();
                ?>

                </div>


             <div class="col-sm-2 padding-4">
                        <div id="sidebar_emp"></div>
                    </div>
                    </div>

                  </div>
                </div>
            <?php
            if (isset($emp) && $emp ===0){
               } else{

                ?>

              <table id="js_table_ozonat"
                     style="margin-right: 116px;"
                     class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                  <thead>
                  <tr class="greentd">
                      <th style="width: 20px;">م </th>
                      <th style="width: 90px;">نوع الاذن</th>
                      <th style="width: 200px;">اسم الموظف</th>
                      <th style="width: 80px;">بدايه الاذن</th>
                      <th style="width: 80px;">نهايه الاذن</th>
                      <th style="width: 80px;">عدد الساعات</th>
                   
                      <!-- <th style="width: 120px;" >افاده شئون الموظفين</th> -->
                      <th style="width: 200px;"> الاجراء</th>
                     <!-- <th style="width: 120px;">  الطلب الأن عند </th> -->
                      <!-- <th style="width: 150px;"> حالة الطلب</th>  -->

                  </tr>
                  </thead>
              </table>
                <?php
            }
            ?>
          </div>
        <?php

        } else{
                ?>
                <div class="alert alert-danger">عفوا... لا تمتلك صلاحية لعرض هذه الصفحة !</div>
        <?php
            }
        ?>


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

<!-- detailsModal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="details_result" style="width: 75%;">

            </div>
            <div class="modal-body" id="ozonat_result"  style="width: 75%;">

            </div>
            <div class="modal-body"  id="profile_result" style="    width: 25%;
    float: left;
    
    margin-top: -272px;">
           
    
 </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                        type="button" onclick="print_ezn(document.getElementById('row_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعه الاذن
                </button>
                <button
                        type="button" onclick="print_ozonat(document.getElementById('emp_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span> طباعه افاده شئوون الموظفين
                </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->

<!-- Ozonat_details Modal -->
<div class="modal fade" id="Ozonat_detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="ozonat_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                        type="button" onclick="print_ozonat(document.getElementById('emp_id').value)"
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

<!-- Ozonat_details Modal -->

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/all_ozonat/Ezn_order/getConnection_emp/',

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

    //8-6-om
    function Get_emp_Name(obj) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        // var adress = obj.dataset.adress;
        // var emp_phone = obj.dataset.phone;

        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;

        $('#emp_id_fk').val(obj.value);
        check_ezn(obj.value);
        get_emp_sidebar();
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        // document.getElementById('adress').value = adress;
        // document.getElementById('mob').value = emp_phone;

        $("#myModal_emps .close").click();

    }

</script>

<script>
   function check_ezn(emp_id) {

     $.ajax({
         type: 'post',
         url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/check_ezn",
         data: {
         
           emp_id:emp_id
         },
         success: function (msg) {
           if (msg == 0) {
            console.warn("msg :: " + msg);
           
            swal({
                title: " لا يمكنك عمل طلب اذن ",
                text:"هنالك طلب اذن جاري ",
                type: 'warning',
                confirmButtonText: "تم",
            }, function(is_confirm) {
                var update=$('#update').val();
                console.log(update);
                if (update==0) {
                  $('#add_ezn').attr('disabled','disabled');
                }
                else if(update==1)
                {
                    $('#add_ezn').removeAttr('disabled');
                    $('#but').attr('disabled','disabled');
                }
            });
          }else if (msg == 1)  {
              console.warn("msg :: " + msg);
              $('#add_ezn').removeAttr('disabled');
          }else{
              console.warn("msg :: " + msg);
              var obj = JSON.parse(msg);
              $('#vacation_start').val(obj.agaza_from_date_m);
              $('#vacation_end').val(obj.agaza_to_date_m);
              $('#add_ezn').removeAttr('disabled');
            }
         }
     });


   }
</script>

<script>

    function get_emp_sidebar() {
      var emp_id = $('#emp_id_fk').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/get_emp_data",
            data: {emp_id: emp_id},
            success: function (d) {

                $('#sidebar_emp').html(d);


            }


        });
    }

    $(document).ready(function () {
        console.log('document ready');
        get_emp_sidebar();
        console.log('document ready');
        check_ezn($('#emp_id_fk').val());

    });

</script>







<script>
function print_new_ezn(value) {
    var ezn_id = value;
    var request = $.ajax({
        // print_resrv -- print_contract
        url: "<?=base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/print_new_ezn'?>",
        type: "POST",
        data: {
            ezn_id: ezn_id
        },
    });
    request.done(function(msg) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(msg);
        WinPrint.document.close();
        WinPrint.focus();
        /*  WinPrint.print();
          WinPrint.close();*/
    });
    request.fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    });
}

</script>
<?php
if (!isset($_POST['from_profile'])) {?>

<!-- <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script> -->
<script>
    $(document).ready(function(){
        $('#from_time').mdtimepicker(); //Initializes the time picker
    });
</script>
<script>
    $(document).ready(function(){
        $('#to_time').mdtimepicker(); //Initializes the time picker
    });
</script>

<?php } ?>

<!-- <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script> -->


<?php
if (!isset($_POST['from_profile'])) {
   echo $ezn_js;

    ?>
    <?php $this->load->view('admin/requires/footer');
} ?>

<script>
    function get_time() {

        var start = $('#from_time').val();
        var end = $('#to_time').val();
    //  alert(start);
    //  return;

        if (start != '' && end != '') {

            s = start.split(':');
            e = end.split(':');
            var ss = s[s.length - 1].split(' ');
            var ee = e[e.length - 1].split(' ');

            if (ss[ss.length - 1] === 'PM') {
                if (parseInt(s[0]) === 12) {

                } else {
                    s[0] = parseInt(s[0]) + 12;
                }
            }
            if (ee[ee.length - 1] === 'PM') {
                if (parseInt(e[0]) === 12) {
                } else {
                    e[0] = parseInt(e[0]) + 12;
                }
            }
            min = parseInt(e[1]) - parseInt(s[1]);
            console.log('min :' + min + " e[1] :" + e[1] + " s[1] :" + s[1]);
            hour_carry = 0;
            if (min < 0) {
                min += 60;
                hour_carry += 1;
            }
            console.log('min :' + min);
            hour = e[0] - s[0] - hour_carry;
            diff = hour + "." + min;
            console.log('min :' + min + " hours :" + hour + " diff :" + diff);
            $('#num_hours').val(diff);
            if (diff <= 0) {
                $('#num_hours').val(0);
                document.getElementById("add_ezn").disabled = true;
                document.getElementById("span_id").style.display = 'block';
                document.getElementById("span_id").innerText = 'من فضلك ادخل فترة زمنية صحيحة';
            } else {
                document.getElementById("add_ezn").disabled = false;
                document.getElementById("span_id").style.display = 'none';

            }
        }
    }

</script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_details",
            data: {row_id:row_id},
            beforeSend: function () {
                $('#details_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>

<script>
    function load_person_data(emp_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_ozonat_details",
            data: {emp_id:emp_id},
            beforeSend: function () {
                $('#ozonat_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#ozonat_result').html(d);

            }

        });

    }
</script>

<script>
    function load_profile_data(emp_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_profile_details",
            data: {emp_id:emp_id},
            beforeSend: function () {
                $('#profile_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#profile_result').html(d);

            }

        });

    }
</script>

<script>
    function print_ezn(row_id) {

        var request = $.ajax({
            url: "<?=base_url().'human_resources/employee_forms/all_ozonat/Ezn_order/print_ezn'?>",
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

<script>
    function print_ozonat(emp_id) {

        var request = $.ajax({
            url: "<?=base_url().'human_resources/employee_forms/all_ozonat/Ezn_order/print_ozonat'?>",
            type: "POST",
            data: {emp_id: emp_id},
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
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
    <script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <script>
        $('.example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
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
            colReorder: true
        });
    </script>

    



<?php } ?>