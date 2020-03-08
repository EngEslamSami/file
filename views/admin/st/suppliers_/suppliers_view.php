<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');

?>

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
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-12" >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php
                if (isset($get_supplier) && !empty($get_supplier)){
                    echo form_open_multipart('');
                    $code = $get_supplier->code;
                    $name = $get_supplier->name;
                    $nshat = $get_supplier->nshat;
                    $tele = $get_supplier->tele;
                    $fax= $get_supplier->fax;
                    $resp_name= $get_supplier->resp_name;
                    $resp_jwal= $get_supplier->resp_jwal;
                    $rkm_hesab= $get_supplier->rkm_hesab;
                    $hesab_name= $get_supplier->hesab_name;
                    $method_shera= $get_supplier->method_shera;
                    $value = $get_supplier->code;
                    $readonly = 'readonly';
                } else{
                    echo form_open_multipart('st/suppliers/Suppliers/add_supplier');
                    if (isset($code) && $code !=0){
                        $readonly = 'readonly';
                        $value = $code +1 ;
                    } else{
                        $readonly ='';
                        $value ='';
                    }
                    $code ='';
                    $name = '';
                    $nshat = '';
                    $tele = '';
                    $fax= '';
                    $resp_name= '';
                    $resp_jwal= '';
                    $method_shera= '';
                    $rkm_hesab='';
                    $hesab_name='';
                }
                ?>
                <div class="col-md-12">

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label">كود المورد</label>
                        <input type="number" name="code" id="code" value="<?= $value?>"
                               class="form-control "

                               <?= $readonly?> >
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label">اسم المورد</label>
                        <input type="text" name="name" id="name" value="<?= $name?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true" >
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> النشاط</label>
                        <select type="text" name="nshat" id="nshat" value=""
                                class="form-control "
                                data-validation="required"
                                data-validation-has-keyup-event="true"
                                >
                            <option value="">--اختر--</option>
                            <?php
                            if (isset($activity) && !empty($activity)){
                                foreach ($activity as $activity){
                                    ?>
                                    <option value="<?= $activity->id_setting?>"
                                        <?php
                                        if ($nshat ==$activity->id_setting){
                                            echo 'selected';
                                        }
                                        ?>

                                    ><?= $activity->title_setting?></option>
                                    <?php
                                }
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> رقم التيليفون</label>
                        <input type="text" name="tele" id="tele" value="<?= $tele?>"
                               class="form-control "

                               onkeypress="validate_number(event);"
                        >
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> فاكس رقم</label>
                        <input type="text" name="fax" id="fax" value="<?= $fax?>"
                               class="form-control "

                               onkeypress="validate_number(event);">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> اسم المسؤل</label>
                        <input type="text" name="resp_name" id="resp_name" value="<?= $resp_name?>"
                               class="form-control "
                               >
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> رقم جوال المسؤل</label>
                        <input type="text" name="resp_jwal" id="resp_jwal" value="<?= $resp_jwal?>"
                               class="form-control "
                               onkeypress="validate_number(event);">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label">  طريقة الشراء</label>
                        <select type="text" name="method_shera" id="method_shera" value=""
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true" >
                            <option value="">--اختر--</option>
                            <?php
                            $method_arr=array('نقدي','آجل','الكل');
                            foreach ($method_arr as $key=>$value){
                                ?>
                                <option value="<?= $key?>"
                                    <?php
                                    if (isset($get_supplier)&& $get_supplier->method_shera==$key){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $value?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th>  مرفقات</th>
                                <th><a  onclick="apen('morfq_option','morfaq','file','');" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>

                            </tr>
                            </thead>

                            <tbody id="morfq_option">
                            <?php

                            if(isset($get_supplier->morfqat) && !empty($get_supplier->morfqat)){
                               // $x=1;
                                foreach ($get_supplier->morfqat as $m ){
                                 //   $x++;
                                $ext = pathinfo($m->morfq_name, PATHINFO_EXTENSION);
                                $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                                $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');

                                ?>
                                <tr>
                                    <td>
                                 <!--  <input class="form-control"  type="file" name="morfaq[]"  value="" > -->

                                    <?php
                                        if (in_array($ext,$image)){
                                            ?>
                                            <a data-toggle="modal" data-target="#myModal-view-<?= $m->id ?>">
                                                <i class="fa fa-eye" title=" قراءة"></i> </a>
                                            <?php

                                        } elseif (in_array($ext,$file)){
                                            ?>
                                            <?php
                                            ?>
                                            <a target="_blank" href="<?=base_url()."st/suppliers/Suppliers/read_file/".$m->morfq_name?>">
                                                <i class="fa fa-eye" title=" قراءة"></i> </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="#" onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: false
                                                },
                                                function(){
                                                swal("تم الحذف!", "", "success");
                                                window.location="<?= base_url()."/st/suppliers/Suppliers/delete_morfq/".$m->id."/".$get_supplier->id?>";
                                                });'>
                                            <i class="fa fa-trash"> </i></a>


                                        <!-- <a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i> </a>-->
                                    </td>
                                </tr>

                                <!-- modal view -->
                                <div class="modal fade" id="myModal-view-<?= $m->id?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?= base_url()."uploads/st/suppliers/".$m->morfq_name ?>"
                                                     width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal view -->
                            <?php } }
                            ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th>ارقام تواصل أخري</th>
                                <th><a  onclick="apen('phone_option','tele_other','text','validate_number(event)');" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>

                            </tr>
                            </thead>

                            <tbody id="phone_option">
                            <?php
                            if(isset($tele_other) && !empty($tele_other)){ foreach ($tele_other as $tele ){ ?>
                                <tr>
                                    <td> <input class="form-control" onkeypress="validate_number(event)" maxlength="10" type="text" name="tele_other[]" onkeyup="chek_length(this,$(this).val(),10)" value="<?=$tele?>" ></td>
                                    <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php } }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label">  رقم الحساب</label>

                        <input type="text" class="form-control testButton inputclass" name="rkm_hesab"
                               id="rkm_hesab"
                               readonly=""
                               onclick="$('#modalID').val(<?=1 ?>); $(this).removeAttr('readonly');"
                               ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
                               style="cursor:pointer;" autocomplete="off"
                               onkeypress="return isNumberKey(event);"
                               onblur="$(this).attr('readonly','readonly')"
                               onkeyup="getAccountName($(this).val(),<?= 1 ?>);"
                               value="<?= $rkm_hesab?>">

                      <!--  <input type="hidden" name="modalID" id="modalID">-->
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> اسم الحساب</label>
                        <input type="text" class="form-control inputclass" name="hesab_name"
                                data-validation="required"
                               aria-required="true" readonly=""
                               id="hesab_name"
                               style="width: 100% !important;"
                               value="<?= $hesab_name?>"
                        >


                    </div>

                </div>
                <div class="col-xs-12 text-center">

                    <button type="submit"  class="btn btn-labeled btn-success " name="save" value="save"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>

                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>


<table id="js_table_supplier"
       style="table-layout: fixed;"
       class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
    <thead>
    <tr class="greentd">
        <th style="width: 20px;">م </th>
        <th style="width: 20px;">كود المورد </th>
        <th style="width: 92px;">إسم المورد</th>
        <th style="width: 30px;"> النشاط</th>
        <th style="width: 50px;">رقم التيليفون</th>
        <th style="width: 30px;" > طريقة الشراء</th>
        <th style="width: 8px;">التفاصيل</th>
        <th style="width: 32px;" >الإجراءات </th>



    </tr>
    </thead>
</table>
<!-- detailsModal -->

<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;" > التفاصيل</h4>
            </div>
            <div class="modal-body" id="result">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                    إغلاق
                </button>

            </div>

        </div>
    </div>
</div>
<!-- detailsModal -->

<!------ modals --------------------------------------------->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body">
                <?php //if(!empty($tree)) {

                ?>
                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">م</th>
                        <th style="font-size: 15px;" class="text-left">رقم الحساب</th>
                        <th style="font-size: 15px;" class="text-left">إسم الحساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree != null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count = 1)
                    {
                        $types = array(1 => 'رئيسي', 2 => 'فرعي');
                        $nature = array('', 'مدين', 'دائن');
                        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
                        //   $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
                        $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');


                        foreach ($tree as $record) {
                            $onclick = "alert('ليس حساب فرعي');";
                            if ($record->hesab_no3 == 2) {
                                $onclick = "$('#rkm_hesab').val(" . $record->code . "); $('#hesab_name').val('" . $record->name . "'); $('#myModal').modal('hide');";
                            }
                            ?>
                            <tr style="background-color: <?= $colorArray[$record->level] ?>; cursor: pointer;"
                                onclick="<?= $onclick ?>">
                                <td class="forTd"><?= $count++ ?></td>
                                <td class="forTd"><?= $record->code ?></td>
                                <td class="forTd"><?= $record->name ?></td>
                            </tr>
                            <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTable($record->subs, $count++);
                            }
                        }
                        return $count;
                    }

                    ?>
                    </tbody>
                </table>
                <?php // } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>


<?php


echo $suppliers_js;
?>

<?php      $this->load->view('admin/requires/footer'); ?>


<script>

    function apen(id,name_input,type,valid) {

        var html = '<tr>' + '<td> <input class="form-control" type="'+type+'" name="'+name_input+'[]"  onkeypress="'+valid+'" ></td> <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';

        $('#'+id).append(html);
    }
    function remove(name) {
        $(name).parents('tr').remove();
    }


</script>
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>