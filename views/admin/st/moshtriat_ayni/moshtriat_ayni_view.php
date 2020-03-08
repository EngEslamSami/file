<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;

    }

    .print_forma {
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

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
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

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }


    .nonactive {
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

<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($get_moshtriat) && !empty($get_moshtriat)) {
                echo form_open_multipart('st/moshtriat_ayni/Moshtriat_ayni/update_moshtriat/' . $get_moshtriat->id);
                $value = $get_moshtriat->rkm_ezn;
                $readonly = 'readonly';

            } else {
                echo form_open_multipart('st/moshtriat_ayni/Moshtriat_ayni/add_moshtriat');
                if (isset($ezen) && $ezen != 0) {
                    $readonly = 'readonly';
                    $value = $ezen + 1;
                } else {
                    $readonly = '';
                    $value = '';
                }

            }
            ?>
            <div class="col-x-12">

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">رقم الإذن</label>
                    <input type="number" name="ezn_rkm" id="ezn_rkm" value="<?= $value ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" <?= $readonly ?>>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> تاريخ الإذن</label>
                    <input type="date" name="ezn_date" id="ezn_date" value=""
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" >
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> المستودع</label>
                    <select class="form-control " id="storage_fk" name="storage_fk" class="form-control"
                            data-validation="required" onchange="getCode(this.value);">

                        <option value="">اختر</option>

                        <?php
                        if (isset($storage) && !empty($storage)) {
                            foreach ($storage as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"

                                ><?php echo $row->title_setting; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> كود الحساب</label>
                    <input type="text" name="rkm_hesab"  value="" id="rkm_hesab_moshtriat"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اسم الحساب</label>
                    <input type="text" name="hesab_name" id="hesab_moshtriat_name" value=""
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> طريقة الشراء</label>

                    <select class="form-control " id="pay_method" name="pay_method" class="form-control"
                            data-validation="required">

                        <option value="">اختر</option>

                        <?php
                        $process = array(1 => 'نقدي', 2 => 'آجل');

                        foreach ($process as $key => $value) {
                            ?>
                            <option value="<?= $key; ?>"

                            ><?= $value; ?></option>

                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اسم المورد</label>

                    <input type="text" class="form-control testButton inputclass" name="supplier_name"
                           id="name"
                           readonly=""

                           ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
                           style="cursor:pointer;" autocomplete="off"
                           onkeypress="return isNumberKey(event);"
                           onblur="$(this).attr('readonly','readonly')"
                           value="">
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> رقم الجوال</label>

                    <input type="text" class="form-control inputclass" name="jwal"
                           data-validation="required"
                           aria-required="true" readonly=""
                           id="jwal"
                           style="width: 100% !important;"
                           value=""
                    >
                    <input type="hidden" name="supplier_fk" id="supplier_fk" value="">
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">  رقم المستند</label>
                    <input type="text" name="mostand_rkm"  value=""
                           class="form-control "
                           onkeypress="validate_number(event);">

                </div>

            </div>

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />
                <button type="button" class="btn btn-success btn-next add_attchments"
                        onclick="add_row()"

                >    اضافة  الأصناف   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>

                <?php if(isset($details_result) && $details_result != null){ ?>
                    <table class="table table-bordered"   id="details_table">
                        <thead >
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">كود الصنف </th>
                            <th style="text-align: center">الباركود </th>
                            <th style="text-align: center">اسم الصنف </th>
                            <th style="text-align: center">الوحدة </th>
                            <th style="text-align: center"> سعر الوحدة </th>
                            <th style="text-align: center">الرصيد المتاح </th>
                            <th style="text-align: center"> الكمية </th>

                            <th style="text-align: center">  القيمة الإجمالية </th>
                            <th style="text-align: center">   تاريخ الصلاحية </th>
                            <th style="text-align: center">  التشغيلة </th>
                            <th style="text-align: center">  الرصيد الحالي </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <?php if(isset($details_result) && !empty($details_result)){ ?>
                        <tbody  id="result">
                        <?php
                        $x=1;
                        foreach ($details_result as $d){ ?>
                            <tr>
                                <td><?= $x++?></td>

                                <td>

                                    <input type="hidden" class="attached_files" value="<?=$d->id?>" >
                                    <input type="text" class="form-control " placeholder=" " name="title[]" id="title"
                                           value="<?= $d->title?>">

                                </td>
                                <td>
                                    <textarea type="text" class="form-control " placeholder=" " name="details[]" id="details"><?= $d->details?></textarea>

                                </td>

                                <td>
                                    <a href="<?php echo base_url().'products/Products/DeleteDetails/'.$d->id."/".$d->product_id_fk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                </td>



                            </tr>


                        <?php }
                        }  ?>
                        </tbody>

                    </table> <?php } else if (isset($details_result) && empty($details_result)) {
                    ?>
                    <table class="table table-bordered" id="details_table">
                        <thead>
                        <tr class="success">
                            <<th>م</th>

                            <th style="text-align: center">كود الصنف </th>
                            <th style="text-align: center">الباركود </th>
                            <th style="text-align: center">اسم الصنف </th>
                            <th style="text-align: center">الوحدة </th>
                            <th style="text-align: center"> سعر الوحدة </th>
                            <th style="text-align: center">الرصيد المتاح </th>
                            <th style="text-align: center"> الكمية </th>

                            <th style="text-align: center">  القيمة الإجمالية </th>
                            <th style="text-align: center">   تاريخ الصلاحية </th>
                            <th style="text-align: center">  التشغيلة </th>
                            <th style="text-align: center">  الرصيد الحالي </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="result">
                        <tr id="no_details">
                            <td colspan="4" style="text-align: center;color: red"> لا يوجد مواصفات  </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>



                <table class="table table-bordered"   id="details_table"  style="display: none">
                    <thead >
                    <tr class="success">
                        <th>م</th>

                        <th style="text-align: center">كود الصنف </th>
                        <th style="text-align: center">الباركود </th>
                        <th style="text-align: center">اسم الصنف </th>
                        <th style="text-align: center">الوحدة </th>
                        <th style="text-align: center"> سعر الوحدة </th>
                        <th style="text-align: center">الرصيد المتاح </th>
                        <th style="text-align: center"> الكمية </th>
                        <th style="text-align: center">  القيمة الإجمالية </th>
                        <th style="text-align: center">   تاريخ الصلاحية </th>
                        <th style="text-align: center">  التشغيلة </th>
                        <th style="text-align: center">  الرصيد الحالي </th>
                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="result">



                    </tbody>
                </table>

            </div>
            <div class="col-xs-12 text-center">

                <button type="submit"  class="btn btn-labeled btn-success " name="save" value="save"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <button type="button" class="btn btn-labeled btn-danger ">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                </button>

                <button type="button" class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#myModal_search"  data-toggle="modal" >
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                </button>


            </div>


        </div>
    </div>
</div>


<?php
if (isset($all_moshtriat)&& !empty($all_moshtriat)){
    $x=0;
    ?>
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 " >
                <table class="table example table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>رقم الإذن</th>
                        <th>تاريخ الإذن</th>
                        <th>المستودع</th>
                        <th>التوريد</th>

                        <th>تفاصيل</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_moshtriat as $all){
                      ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><?= $all->ezn_rkm?></td>
                            <td><?= $all->ezn_date_ar?></td>
                            <td><?= $all->storage_name?></td>
                            <td><?= $all->supplier_name?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal<?= $all->id?>">التفاصيل</button>

                            </td>
                            <td>
                                <a href="#" onclick='swal({
                                        title: "هل انت متأكد من التعديل ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-warning",
                                        confirmButtonText: "تعديل",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false
                                        },
                                        function(){

                                        window.location="<?php echo base_url(); ?>st/moshtriat_ayni/Moshtriat_ayni/update_moshtriat/<?php echo $all->id; ?>";
                                        });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


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
                                        window.location="<?= base_url()."st/moshtriat_ayni/Moshtriat_ayni/delete_moshtriat/" . $all->id ?>";
                                        });'>
                                    <i class="fa fa-trash"> </i></a>



                            </td>
                        </tr>
                    <?php

                    }
                    ?>
                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>
    <?php
}
?>



<!------ modals --------------------------------------------->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الموردين </h4>
            </div>
            <div class="modal-body">

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">م</th>
                        <th style="font-size: 15px;" class="text-left"> كود المورد</th>
                        <th style="font-size: 15px;" class="text-left">إسم المورد</th>
                        <th style="font-size: 15px;" class="text-left"> رقم الجوال</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($suppliers) && !empty($suppliers)) {
                        $x = 1;
                        foreach ($suppliers as $supplier) {
                            //  $onclick = "$('#name').val(" .$supplier->name. "); $('#myModal').modal('hide');";


                            ?>
                            <tr ondblclick="get_supplier('<?= $supplier->name ?>',<?= $supplier->resp_jwal ?>,<?= $supplier->id ?>);">
                                <td><?= $x++ ?></td>
                                <td><?= $supplier->code ?></td>
                                <td><?= $supplier->name ?></td>
                                <td><?= $supplier->resp_jwal ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="asnafModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الأصناف </h4>
            </div>
            <div class="modal-body">

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">م</th>
                        <th style="font-size: 15px;" class="text-left"> كود الصنف</th>
                        <th style="font-size: 15px;" class="text-left">إسم الصنف</th>
                        <th style="font-size: 15px;" class="text-left">  الوحدة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($asnaf) && !empty($asnaf)) {
                        $x = 1;
                        foreach ($asnaf as $asnaf) {
                            //  $onclick = "$('#name').val(" .$supplier->name. "); $('#myModal').modal('hide');";


                            ?>
                            <tr ondblclick="get_asnaf(<?= $asnaf->code ?>,<?= $asnaf->code_br ?>,'<?= $asnaf->name ?>','<?= $asnaf->wehda_name ?>',<?= $asnaf->price ?>,<?= $asnaf->slahia ?>);">
                                <td><?= $x++ ?></td>
                                <td><?= $asnaf->code ?></td>
                                <td><?= $asnaf->name ?></td>
                                <td><?= $asnaf->wehda_name ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getCode(id) {
        var dataString = 'id=' + id;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/moshtriat_ayni/Moshtriat_ayni/get_code',
            data: dataString,
            dataType: 'html',

            cache: false,
            success: function (html) {
                // alert(html);

               arr = JSON.parse(html);
             // if ( arr == '') {
             //     alert('hh');
             // }
               $('#rkm_hesab_moshtriat').val(arr.rkm_hesab_moshtriat);
               $('#hesab_moshtriat_name').val(arr.hesab_moshtriat_name);

            }
        });

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

<script>
    function add_row(){
        $("#details_table").show();
        $("#no_details").remove();
        //  alert('show');

        var x = document.getElementById('result');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>st/moshtriat_ayni/Moshtriat_ayni/get_asnaf',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result").append(html);

            }
        });
    }
    //--------
    //-----------------------------------------------
</script>

<script>
    function get_supplier(name2,jwal,id) {

        $('#name').val(name2);
        $('#jwal').val(jwal);
        $('#supplier_fk').val(id);
        $('#myModal').modal('hide');

    }


</script>
<script>
    function get_asnaf(code,br_code,name,we7da,price,salhia) {

        var modalID = $('#modalID').val();

        $('#sanf_code'+modalID).val(code);
        $('#sanf_coade_br'+modalID).val(br_code);
        $('#sanf_name'+modalID).val(name);
        $('#sanf_whda'+modalID).val(we7da);
        $('#sanf_one_price'+modalID).val(price);
      //  sanf_salahia_date
        if (salhia==0){
            $('#sanf_salahia_date'+modalID).attr('disabled','disabled');
        } else if(salhia==1){
            $('#sanf_salahia_date'+modalID).removeAttr('disabled');
        }


        $('#asnafModal').modal('hide');



    }
</script>