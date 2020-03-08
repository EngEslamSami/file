
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
    
    
  /*  
table {
    white-space: nowrap;
}
td {
    max-width: 300px;
    min-width: 50px;
    overflow: hidden;
    text-overflow: ellipsis;
    vertical-align: top;
    white-space: nowrap;
}
td:hover {
    text-overflow: clip;
    white-space: normal;
    word-break: break-all;
}
*/

div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>


<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($get_sarf )&& !empty($get_sarf)){
                echo form_open_multipart('st/settings/Edafa_sarf_setting/update_setting/'.$get_sarf->id);
            } else{
                echo form_open_multipart('st/settings/Edafa_sarf_setting/add_sarf_setting');

            }
            ?>
           <div class="col-x-12">
           
           
    

               <table class="table table-bordered" id="empTable">
                   <thead>
                   <tr class="info">
                       <th> الادارة</th>
                       <th> القسم</th>
                       <th> الموظف</th>
                       <th> المستودع</th>
                       <th> العملية</th>
                       <th> كود الحساب</th>
                       <th> اسم الحساب</th>
                       <th> كود حساب المشتريات</th>
                       <th> اسم حساب المشتريات</th>

                       <?php
                       if (isset($get_sarf)&& !empty($get_sarf)){
                           ?>
                           <?php
                       } else{
                           ?>
                           <th>الإجراء</th>
                           <?php
                       }
                       ?>

                   </tr>
                   </thead>

                   <tbody  id="result">
                   <?php if(isset($get_sarf) && !empty($get_sarf)){ ?>

                       <tr>
                           <td>
                               <select class="form-control " id="edara_id_fk<?= $get_sarf->id ?>"   name="edara_name"  onchange="get_qsm(this.value,<?= $get_sarf->id ?>);"  class="form-control"   data-validation="required">

                                   <option value="">اختر</option>

                                   <?php
                                   if(isset($adminstations) && !empty($adminstations)){
                                       foreach ($adminstations as $row){
                                           ?>
                                           <option value="<?php echo $row->id;?>"
                                               <?php
                                               if ($get_sarf->edara_name==$row->name){
                                                   echo 'selected';
                                               }
                                               ?>><?php echo $row->name;?></option>

                                       <?php }} else { ?>
                                       <option value="">لايوجد ادارات مضافة</option>
                                   <?php } ?>
                               </select>
                           </td>
                           <td>
                               <select class="form-control " id="qsm_id_fk<?= $get_sarf->id ?>"     name="qsm_name"  onchange="get_emp(this.value,<?= $get_sarf->id ?>);"    data-validation="required" style="width: 100px;">

                                   <option value="<?= $get_sarf->qsm_id?>"><?= $get_sarf->qsm_name?></option>

                               </select>

                           </td>

                           <td>
                               <select class="form-control " id="emp_id<?= $get_sarf->id ?>"     name="emp_id"  >

                                   <option value="<?= $get_sarf->emp_id?>"><?= $get_sarf->emp_name?></option>

                               </select>

                           </td>
                           <td>

                               <select class="form-control " id="storage_fk<?= $get_sarf->id ?>"   name="storage_fk"    class="form-control"   data-validation="required">

                                   <option value="">اختر</option>

                                   <?php
                                   if(isset($storage) && !empty($storage)){
                                       foreach ($storage as $row){
                                           ?>
                                           <option value="<?php echo $row->id_setting;?>"
                                               <?php
                                               if ($get_sarf->storage_fk==$row->id_setting){
                                                   echo 'selected';
                                               }
                                               ?>

                                           ><?php echo $row->title_setting;?></option>

                                       <?php }} ?>
                               </select>

                           </td>

                           <td>
                               <select class="form-control " id="process<?= $get_sarf->id ?>"   name="process"    class="form-control"   data-validation="required">

                                   <option value="">اختر</option>

                                   <?php
                                   $process = array(1=>'إضافة',2=>'صرف');

                                   foreach ($process as $key=>$value){
                                       ?>
                                       <option value="<?= $key;?>"
                                           <?php
                                           if ($get_sarf->process==$key){
                                               echo 'selected';
                                           }
                                           ?>

                                       ><?= $value;?></option>

                                   <?php } ?>
                               </select>
                           </td>
                           <td>
                               <input type="hidden" name="modalID" id="modalID">
                               <input type="text" class="form-control testButton inputclass" name="rkm_hesab"
                                      id="rkm_hesab<?=$get_sarf->id?>"
                                      readonly=""
                                      onclick="$('#modalID').val(<?=1 ?>); $(this).removeAttr('readonly');"
                                      ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
                                      style="cursor:pointer;" autocomplete="off"
                                      onkeypress="return isNumberKey(event);"
                                      onblur="$(this).attr('readonly','readonly')"
                                      onkeyup="getAccountName($(this).val(),<?= 1 ?>);"
                                      value="<?= $get_sarf->rkm_hesab?>">
                           </td>
                           <td>
                               <input type="text" class="form-control inputclass" name="hesab_name"
                                      data-validation="required"
                                      aria-required="true" readonly=""
                                      id="hesab_name<?=$get_sarf->id?>"
                                      style="width: 100% !important;"
                                      value="<?= $get_sarf->hesab_name?>"
                               >

                           </td>
                           <td>
                               <input type="hidden" name="modalID_m" id="modalID_m">
                               <input type="text" class="form-control testButton inputclass" name="rkm_hesab_moshtriat"
                                      id="rkm_hesab_moshtriat<?=$get_sarf->id?>"
                                      readonly=""
                                      onclick="$('#modalID_m').val(<?=1 ?>); $(this).removeAttr('readonly');"
                                      ondblclick="$(this).attr('readonly','readonly'); $('#myModal_M').modal('show');"
                                      style="cursor:pointer;" autocomplete="off"
                                      onkeypress="return isNumberKey(event);"
                                      onblur="$(this).attr('readonly','readonly')"
                                      onkeyup="getAccountName($(this).val(),<?= 1 ?>);"
                                      value="<?= $get_sarf->rkm_hesab_moshtriat?>">
                           </td>
                           <td>
                               <input type="text" class="form-control inputclass" name="hesab_moshtriat_name"
                                      data-validation="required"
                                      aria-required="true" readonly=""
                                      id="hesab_moshtriat_name<?=$get_sarf->id?>"
                                      style="width: 100% !important;"
                                      value="<?= $get_sarf->hesab_moshtriat_name?>"
                               >

                           </td>


                       </tr>


                       <?php
                   } else {
                       ?>
                       <tr >
                           <td id="1">


                               <select class="form-control " id="edara_id_fk1"   name="edara_name[]"  onchange="get_qsm(this.value,<?= 1?>);"  class="form-control"   data-validation="required">

                                   <option value="">اختر</option>

                                   <?php
                                   if(isset($adminstations) && !empty($adminstations)){
                                       foreach ($adminstations as $row){
                                           ?>
                                           <option value="<?php echo $row->id;?>"

                                           ><?php echo $row->name;?></option>

                                       <?php }} else { ?>
                                       <option value="">لايوجد ادارات مضافة</option>
                                   <?php } ?>
                               </select>
                           </td>

                           <td>
                               <select class="form-control " id="qsm_id_fk1"     name="qsm_name[]"  onchange="get_emp(this.value,1);"    data-validation="required" style="width: 100px;">

                                   <option value="">اختر</option>


                               </select>

                           </td>

                           <td>
                               <select class="form-control " id="emp_id<?= 1?>"     name="emp_id[]"  data-validation="required">

                                   <option value="">اختر</option>

                               </select>

                           </td>
                           <td>
                               <select class="form-control " id="storage_fk1"   name="storage_fk[]"    class="form-control"   data-validation="required">

                                   <option value="">اختر</option>

                                   <?php
                                   if(isset($storage) && !empty($storage)){
                                       foreach ($storage as $row){
                                           ?>
                                           <option value="<?php echo $row->id_setting;?>"

                                           ><?php echo $row->title_setting;?></option>

                                       <?php }} ?>
                               </select>
                           </td>
                           <td>
                               <select class="form-control " id="process1"   name="process[]"    class="form-control"   data-validation="required">

                                   <option value="">اختر</option>

                                   <?php
                                   $process = array(1=>'إضافة',2=>'صرف');

                                       foreach ($process as $key=>$value){
                                           ?>
                                           <option value="<?= $key;?>"

                                           ><?= $value;?></option>

                                       <?php } ?>
                               </select>
                           </td>
                           <td>
                               <input type="hidden" name="modalID" id="modalID">
                               <input type="text" class="form-control testButton inputclass" name="rkm_hesab[]"
                                      id="rkm_hesab1"
                                      readonly=""
                                      onclick="$('#modalID').val(<?=1 ?>); $(this).removeAttr('readonly');"
                                      ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
                                      style="cursor:pointer;" autocomplete="off"
                                      onkeypress="return isNumberKey(event);"
                                      onblur="$(this).attr('readonly','readonly')"
                                      onkeyup="getAccountName($(this).val(),<?= 1 ?>);"
                                      value="">
                           </td>
                           <td>
                               <input type="text" class="form-control inputclass" name="hesab_name[]"
                                      data-validation="required"
                                      aria-required="true" readonly=""
                                      id="hesab_name1"
                                      style="width: 100% !important;"
                                      value=""
                               >

                           </td>
                           <td>
                               <input type="hidden" name="modalID_m" id="modalID_m">
                               <input type="text" class="form-control testButton inputclass" name="rkm_hesab_moshtriat[]"
                                      id="rkm_hesab_moshtriat1"
                                      readonly=""
                                      onclick="$('#modalID_m').val(<?=1 ?>); $(this).removeAttr('readonly');"
                                      ondblclick="$(this).attr('readonly','readonly'); $('#myModal_M').modal('show');"
                                      style="cursor:pointer;" autocomplete="off"
                                      onkeypress="return isNumberKey(event);"
                                      onblur="$(this).attr('readonly','readonly')"
                                      onkeyup="getAccountName($(this).val(),<?= 1 ?>);"
                                      value="">
                           </td>
                           <td>
                               <input type="text" class="form-control inputclass" name="hesab_moshtriat_name[]"
                                      data-validation="required"
                                      aria-required="true" readonly=""
                                      id="hesab_moshtriat_name1"
                                      style="width: 100% !important;"
                                      value=""
                               >

                           </td>
                           <td>
                               <a readonly href="#" id="delempTable"  onclick="deleteRow(this,'empTable')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                               <a href="#" onclick="add_row();" class="plus-btn"><i class="fa fa-plus"></i>
                               </a>
                           </td>
                       </tr>

                       <?php
                   }  ?>
                   </tbody>




               </table>

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

<table id="js_table_settings"
      
       class="table table-striped table-bordered  nowrap  no-footer display" style="width:100%">
    <thead>
    <tr class="greentd">
        <th style="width: 20px;">م </th>
        <th style="width: 20px;"> الإدارة </th>
        <th style="width: 92px;"> القسم</th>
        <th style="width: 30px;"> الموظف</th>
        <th style="width: 50px;">المستودع</th>
        <th style="width: 30px;" > العملية</th>
        <th style="width: 30px;" > كود الحساب</th>
        <th style="width: 30px;" > اسم الحساب</th>
        <th style="width: 30px;" >كود حساب المشتريات </th>
        <th style="width: 30px;" >اسم  حساب المشتريات </th>
        <th style="width: 30px;" >التاريخ  </th>

        <th style="width: 32px;" >الإجراءات </th>



    </tr>
    </thead>
</table>
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
                                $onclick = "$('#rkm_hesab'+$('#modalID').val()).val(" . $record->code . "); $('#hesab_name'+$('#modalID').val()).val('" . $record->name . "'); $('#myModal').modal('hide');";
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

<div class="modal fade" id="myModal_M" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        buildTreeTable_M($tree);
                    }
                    function buildTreeTable_M($tree, $count = 1)
                    {
                        $types = array(1 => 'رئيسي', 2 => 'فرعي');
                        $nature = array('', 'مدين', 'دائن');
                        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
                        //   $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
                        $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');


                        foreach ($tree as $record) {
                            $onclick = "alert('ليس حساب فرعي');";
                            if ($record->hesab_no3 == 2) {
                                $onclick = "$('#rkm_hesab_moshtriat'+$('#modalID_m').val()).val(" . $record->code . "); $('#hesab_moshtriat_name'+$('#modalID_m').val()).val('" . $record->name . "'); $('#myModal_M').modal('hide');";
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
                                $count = buildTreeTable_M($record->subs, $count++);
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


echo $setting_js;
?>

<?php      $this->load->view('admin/requires/footer'); ?>


<script>

    function get_emp(id_qsm,id_pop) {

        //  alert(id_qsm);
        if (id_qsm != 0 && id_qsm != "") {
            var dataString = "id_qsm=" + id_qsm;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/settings/Edafa_sarf_setting/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $("#emp_id"+id_pop).html(html);
                }
            });
        }
    }
</script>


<script>

    function get_qsm(id_depart,id_pop) {
        // alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            var dataString = "id_depart=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/settings/Edafa_sarf_setting/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#qsm_id_fk"+id_pop).html(html);

                }
            });
        }
    }
</script>
<script>

    function deleteRow(row,tableId) {
        var i = row.parentNode.parentNode.rowIndex;

        document.getElementById(tableId).deleteRow(i);

    }

</script>


<script>
    function add_row(){


        var x = document.getElementById('result');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
      //  $('#modalID').val(len);

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>st/settings/Edafa_sarf_setting/add_emp_row',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result").append(html);

            }
        });
    }


</script>
