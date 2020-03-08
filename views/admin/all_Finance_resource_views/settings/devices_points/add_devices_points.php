<style>
    .top-label {

        font-size: 13px;
    }
    .form-control{
        padding: 6px 0px;
    }
    .inner-heading-green{
        background-color: #5eab5e;
        padding: 10px;
        color: #fff;
    }
    .inner-heading-blue{
        background-color: #0a4446;
        padding: 10px;
        color: #fff;
    }
    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }

    table tr.green_background th,
    table tr.green_background td{
        background-color: #5eab5e;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr.red_background th,
    table tr.red_background td{
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr th,
    table tr td,
    table thead td,
    table thead th,
    table tfoot th,
    table tfoot td
    {
        padding: 3px 5px !important;
    }


</style>



<div class=" col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
            <div class="pull-left">

            </div>
        </div>

        <div class="panel-body">
            <div class="col-sm-12 no-padding">
                <h6 class="text-center inner-heading-green"><?php echo $title?></h6>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="<?php  if(isset($typee) && !empty($typee) && $typee==='devices')
                    {echo 'active'; }?>">
                    <a <?php if(isset($disabled)){}else{echo 'href="#devices"';} ?> aria-controls="devices"
                      role="tab" data-toggle="tab">إعدادات الأجهزة</a></li>
                    <li class="<?php  if(isset($typee) && !empty($typee) && $typee==='employees')
                        {echo 'active'; }?>">
                        <a <?php if(isset($disabled)){}else{echo 'href="#employees"';} ?> aria-controls="employees"
                        role="tab" data-toggle="tab">ربط الأجهزة بالموظفين</a></li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                        <div class="tab-pane  in <?php if(isset($typee) && !empty($typee)&& $typee === "devices") {echo  'active'; }  ?>" id="devices">
                            <div class="panel-body">
                            <div class="col-md-12 col-xs-12">
                                <?php echo form_open_multipart('all_Finance_resource/settings/DevicesPoints/addDevicesPoints/devices'); ?>


                                <button class="btn btn-add"  type="button" onclick="add_device_row()">اضافة </button>

                                <div id="divPOITable" style=" display: none;">

                                <table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0" width="100%" >
                                    <thead>
                                    <tr class="green_background">
                                        <th style=""> رقم الجهاز</th>
                                        <th style=""> البنك</th>
                                        <th style=""> الحساب</th>
                                        <th style=""> رقم الحساب </th>
                                        <th>حالة الجهاز</th>
                                        <th style="">الاجراء</th>

                                    </tr>
                                    <tbody id="result">
                                    </tbody>



                                </table>



                                <div class="col-xs-12">

                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">

                                        <input type="submit" id="submit_b" onclick="onsubmit22()" style="padding: 5px 14px;" name="add" class="btn btn-blue btn-close" value=" حفظ ">
                                    </div>
                                    <br>
                                </div>
                                </div>




                                <?php  echo form_close() ;
                                ?>
                                <div class="col-sm-12 no-padding">
                                    <h6 class="text-center inner-heading-blue no-margin">بيانات الأجهزة</h6>
                                </div>

                                <table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0"  style="table-layout: auto;">
                                    <thead>
                                    <tr class="green_background">

                                        <th style=""> البنك</th>
                                        <th style=""> الحساب</th>
                                        <th style=""> رقم الحساب </th>
                                        <th style="color: red;"> رقم الجهاز</th>
                                         <th style=""> حالة الجهاز </th>
                                        <th style="">الاجراء</th>

                                    </tr>
                                    <tbody id="result">
                                    </tbody>
                                    <tbody >
                                    <?php
                                    if(isset($allData)&&!empty($allData)) {
                                        foreach ($allData as $record) {

                                            ?>
                                            <tr>
                                            <td <?php if($record->count>1){ ?> rowspan="<?= $record->count ?>"  <?php } ?>><?php echo$record->bank_name;?> </td>
                                            <?php  if(isset($record->accounts)&&!empty($record->accounts)) {
                                                foreach ($record->accounts as $account ) { ?>
                                                    <td <?php if(count($account->account_num)>1){ ?> rowspan="<?= count($account->account_num) ?>"  <?php } ?>><?php echo $account->account_name;?> </td>
                                                    <?php  if(isset($account->account_num)&&!empty($account->account_num)) {
                                                        foreach ($account->account_num as $row ) { 
                                                            if($row->device_status ==1){
                                                                $value="نشط" ;
                                                            } elseif ($row->device_status == 2){
                                                                $value="غير نشط" ;
                                                            }
                                                            
                                                            ?>
                                                        
                                                        
                                                        
                                                            <td><?= $row->account_num ?>  </td>
                                                            <td style="background-color: #00aced"><?= $row->device_id_fk ?>  </td>
                                                           <td><?= $value ?></td>
                                                            <td><a href="<?=base_url().'all_Finance_resource/settings/DevicesPoints/deleteDevicesPoints/'.$row->id.'/devices'?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" id="delPOIbutton"  onclick="deleteRow(this)"><i class="fa fa-trash" aria-hidden="true"></i>
                                                                </a>

                                                                <a href="#"  data-toggle="modal" data-target="#exampleModal<?= $row->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            </td>
                                                            </tr>
                                                        <?php } } else { ?>
                                                        <td>--</td>
                                                        <td>--</td>
                                                        <td>--</td>
                                                        </tr>
                                                    <?php   } } } else { ?>
                                                <td>==</td>
                                                <td>==</td>
                                            <?php   } } }?>
                                    </tbody>


                                </table>




                            </div>
                           </div>

                        </div>
                        <div class="tab-pane in <?php if(isset($typee) && !empty($typee)&& $typee === "employees") {echo  'active'; }  ?>" id="employees">
                            <div class="panel-body">
                                <div class="col-md-12 col-xs-12 ">


                                <?php echo form_open_multipart('all_Finance_resource/settings/DevicesPoints/addDevicesPoints/employees'); ?>


                                <button class="btn btn-add"  type="button" onclick="add_emp_row()">اضافة </button>
                                <div id="devEmpTable"  style=" display: none;">


                                <table class="display table table-bordered responsive nowrap" id="empTable" cellspacing="0" width="100%" >
                                    <thead>
                                    <tr class="green_background">
                                        <th style=""> رقم الجهاز</th>
                                        <th style=""> الادارة</th>
                                        <th style=""> القسم</th>
                                        <th > اسم الموظف </th>
                                        <th style="">الاجراء</th>

                                    </tr>

                                    <tbody id="result1">

                                    </tbody>



                                </table>



                                <div class="col-xs-12">
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">

                                        <input type="submit" style="padding: 5px 14px;" name="add_emp" class="btn btn-blue btn-close" value=" حفظ ">
                                    </div>
                                </div>

                               </div>


                                <?php  echo form_close() ;
                                ?>
                                    <div class="col-sm-12 no-padding">
                                        <h6 class="text-center inner-heading-blue no-margin">بيانات الموظفين</h6>
                                    </div>

                                    <table class="display table table-bordered responsive nowrap" id="empTable" cellspacing="0" width="100%" style="table-layout: auto;">
                                        <thead>
                                        <tr class="green_background">
                                            <th style=""> الادارة</th>
                                            <th style=""> القسم</th>
                                            <th style="color: red;"> اسم الموظف </th>
                                            <th style=""> رقم الجهاز</th>
                                            <th style="">الاجراء</th>
                                        </tr>
                                        </thead>

                                        <tbody >

                                        <?php
                                        if(isset($allDataEmps)&&!empty($allDataEmps)) {
                                            foreach ($allDataEmps as $record) {

                                                ?>
                                                <td <?php if($record->count>1){ ?> rowspan="<?= $record->count ?>"  <?php } ?>><?php echo$record->edara_name;?> </td>
                                                <?php  if(isset($record->aqsm)&&!empty($record->aqsm)) {
                                                    foreach ($record->aqsm as $qsmm ) { ?>
                                                        <td <?php if(count($qsmm->employees)>1){ ?> rowspan="<?= count($qsmm->employees) ?>"  <?php } ?>><?php echo $qsmm->qsm_name;?> </td>
                                                        <?php  if(isset($qsmm->employees)&&!empty($qsmm->employees)) {
                                                            foreach ($qsmm->employees as $row ) { ?>
                                                                <td style="background-color: #00aced"><?= $row->emp_name ?>  </td>
                                                                <td ><?= $row->device_id_fk ?>  </td>
                                                                <td>
                                                                    <a href="<?=base_url().'all_Finance_resource/settings/DevicesPoints/deleteEmpDevicesPoints/'.$record->id.'/'.'employees'?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" id="delPOIbutton"  onclick="deleteRow(this)"><i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="#"  data-toggle="modal" data-target="#myModal<?=$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                </td>
                                                                </tr>
                                                            <?php } } else { ?>
                                                            <td>--</td>
                                                            <td>--</td>
                                                            <td>--</td>
                                                            </tr>
                                                        <?php   } } } else { ?>
                                                    <td>==</td>
                                                    <td>==</td>
                                                    <td>==</td>
                                                    <td>==</td>
                                                    </tr>
                                                <?php   } } }?>
                                        </tbody>


                                    </table>


                            </div>
                            </div>
                        </div>


                    </div>

            </div>






        </div>
    </div>
</div>



<!-- update modal -->
<?php
if(isset($dataEmps)&&!empty($dataEmps)) {
    foreach ($dataEmps as $record) {

        ?>
        <div id="myModal<?=$record->id?>" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 70%">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تعديل بيانات الاجهزة</h4>
                    </div>
                    <div class="modal-body">
                        <?php

                        echo form_open_multipart('all_Finance_resource/settings/DevicesPoints/updateEmpDevicesPoints/'.$record->id.'/employees');
                        ?>
                        <table class="display table table-bordered responsive nowrap">
                            <thead>
                            <tr class="green_background">
                                <th style=""> رقم الجهاز</th>
                                <th style=""> الادارة</th>
                                <th style=""> القسم</th>
                                <th style=""> اسم الموظف </th>

                            </tr>
                            </thead>
                            <tbody>


                            <tr>
                                <td>
                                    <select class="form-control " id="device_id_fk_fk<?=$record->id?>"  onchange="get_accounts(this.value,<?=$record->id?>)"   name="device_id_fk" class="form-control"  >

                                        <option value="">- أختر -</option>
                                        <?php
                                        if(isset($devices) && !empty($devices)){ ?>
                                            <?php  foreach ($devices as $row){
                                                ?>
                                                <option value="<?php echo $row->device_id_fk;?>" <?php if ($record->device_id_fk == $row->device_id_fk  ){ echo 'selected' ;} ?>><?php echo $row->device_id_fk;?></option>

                                            <?php }} else { ?>
                                            <option value="">لايوجد اجهزه مضافة</option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-control " id="edara_id_fk<?=$record->id?>"   name="edara_id_fk"  onchange="get_qsm(this.value,<?=$record->id?>);"  class="form-control">

                                        <option value="">اختر</option>

                                        <?php
                                        if(isset($adminstations) && !empty($adminstations)){
                                            foreach ($adminstations as $row){
                                                ?>
                                                <option value="<?php echo $row->id;?>" <?php if ($record->edara_id_fk == $row->id  ){ echo 'selected' ;} ?>><?php echo $row->name;?></option>

                                            <?php }} else { ?>
                                            <option value="">لايوجد ادارات مضافة</option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-control " id="qsm_id_fk<?=$record->id?>"     name="qsm_id_fk"  onchange="get_emp(this.value,<?=$record->id?>);" >

                                        <option value="<?= $record->qsm_id_fk?>"><?= $record->qsm_name?></option>

                                    </select>

                                </td>

                                <td>
                                    <select class="form-control " id="emp_id<?=$record->id?>"     name="emp_id"  >

                                        <option value="<?= $record->emp_id?>"> <?= $record->emp_name?></option>

                                    </select>

                                </td>






                            </tr>








                            </tbody>
                        </table>

                        <input type="submit" style="padding: 5px 14px;" name="add_new" class="btn btn-blue btn-close" value=" تعديل ">
                        <?php  echo form_close() ;
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>

            </div>
        </div>
    <?php   } } ?>

<!-- update modal -->

<?php
if ((isset($dataDevicse)) && (!empty($dataDevicse))) {
    foreach ($dataDevicse as $row) {

        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $row->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 70%" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الجهاز</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('all_Finance_resource/settings/DevicesPoints/updataDevicesPoints/' . $row->id.'/devices'); ?>

                        <table class="display table table-bordered responsive nowrap" cellspacing="0"
                               width="100%"
                               style="table-layout: auto;">
                            <thead>
                            <tr class="green_background">

                                <th style=""> رقم الجهاز</th>
                                <th style=""> البنك</th>
                                <th style=""> الحساب</th>
                                <th style=""> رقم الحساب</th>
                                 <th>حالة الجهاز</th>
                            </tr>

                            <tbody>


                            <tr>
                                <td>
                                    <input type="text" id="device_id_fk_h<?=$row->id ?>"
                                           onkeypress="validate_number(event)" name="device_id_fk[]"
                                           data-validation="required" value="<?=$row->device_id_fk?>"
                                           class="form-control device_num"
                                           onkeyup="checkUniqueNum(this,this.value,'device_id_fk_span_h<?=$row->id ?>')"
                                    >
                                <span id="device_id_fk_span_h<?= $row->id ?>"
                                      style="color: red;"></span>


                                </td>
                                <td>


                                    <select class="form-control " id="bank_id_fk_d<?= $row->id ?>"
                                            onchange="get_accounts(this.value,<?=$row->id ?>)"
                                            name="bank_id_fk[]" class="form-control"
                                            data-validation="required">


                                        <?php
                                        if (isset($banks) && !empty($banks)) { ?>
                                            <?php foreach ($banks as $row2) {
                                                ?>
                                                <option
                                                    <?php
                                                    if($row->bank_id_fk == $row2->bank_id_fk){
                                                        echo 'selected';
                                                    }
                                                    ?>
                                                    value="<?php echo $row2->bank_id_fk; ?>"><?php echo $row2->bank_name; ?></option>

                                            <?php }
                                        } else { ?>
                                            <option value="">لايوجد بنوك مضافة</option>
                                        <?php } ?>
                                    </select>


                                </td>
                                <td>

                                    <select class="form-control "
                                            id="account_id_fk_d<?= $row->id ?>"
                                            name="account_id_fk[]"
                                            onchange="get_accounts_nums(this.value,<?= $row->id ?>)"
                                            data-validation="required" style="width: 100px;">
                                        <option value="">إختر </option>
                                        <?php  if(isset($hesabt)){
                                            foreach ($hesabt as $account){
                                                if($row->bank_id_fk != $account->bank_id_fk){
                                                    continue;
                                                }
                                                $select2 = '';
                                                if($row->account_id_fk == $account->account_id_fk){
                                                    $select2 = 'selected';
                                                }
                                                ?>

                                                <option <?=$select2?> value="<?=$account->id?>"><?=$account->account_name?></option>
                                            <?php } } ?>



                                    </select>


                                </td>
                                <td>

                                    <select class="form-control "
                                            id="account_num_id_fk<?= $row->id ?>"
                                            name="account_num_id_fk[]" data-validation="required">


                                                <option  value="<?=$row->account_num_id_fk?>"><?=$row->account_num?></option>




                                    </select>
                                </td>



<td>
<select class="form-control " id="device_status <?= $row->id ?>" name="device_status[]">
    <option value="">اختر</option>
    <option value="1" <?php if($row->device_status ==1){ echo "selected";}?> >نشط  </option>
    <option value="2" <?php if($row->device_status ==2){ echo "selected";}?> >غير نشط</option>

</select>
</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                        </button>


                        <input type="submit" id="submit_b"  style="padding: 5px 14px;"
                               name="add" class="btn btn-blue btn-close" value=" حفظ ">

                    </div>


                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    <?php }


}
?>




<script>
    function add_device_row()
    {


        var div = document.getElementById('divPOITable');
        div.style.display = "block";


        var x = document.getElementById('POITable');

        var len_tab1 = x.rows.length;

        len=len_tab1;



        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/add_device_record",
            data:{len:len},
            success:function(d){
                $('#result').append(d);

            }

        });
    }

</script>




<script>
    function get_banks(device_id,thiss)
    {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/add_device_banks",
            data:{device_id:device_id},
            success:function(d){
                $('#bank_id_fk_d'+thiss).html(d);
            }

        });



    }

</script>


<script>
    function get_accounts(bank_id,thiss)
    {

        var device_id = $('#device_id_fk'+thiss).val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/add_bank_accounts",
            data:{bank_id:bank_id,device_id:device_id},
            success:function(d){
                $('#account_id_fk_d'+thiss).html(d);
            }

        });



    }

</script>

<script>
    function get_accounts_nums(account_id,thiss)
    {

        var device_id = $('#device_id_fk'+thiss).val();
        var bank_id = $('#bank_id_fk_d'+thiss).val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/get_accounts_nums",
            data:{bank_id:bank_id,device_id:device_id,account_id:account_id},
            success:function(d){
                $('#account_num_id_fk'+thiss).html(d);
            }

        });



    }

</script>


<script>

    function deleteRow(row,tableId) {
        var i = row.parentNode.parentNode.rowIndex;

        document.getElementById(tableId).deleteRow(i);

    }

</script>





<script>
    function checkUniqueAllNum() {


      var devices = [];
        $(".device_num").each(function () {
            if($(this).val()!='')
            {
                var valuee = $(this).val();

                $.ajax({
                    type:'post',
                    url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/checkUniqueNum",
                    data:{valuee:valuee},
                    success:function(d){
                        if(d == 1){
                            devices.push(d);
                        }


                        if(devices.length > 0){
                            $('input[type="submit"]').attr("disabled","disabled");
                        }else {

                            $('input[type="submit"]').removeAttribute("disabled","disabled");
                        }
                    }


                });


            }
        })




    }
    function checkUniqueNum(this_input,valuee,span_id) {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/checkUniqueNum",
            data:{valuee:valuee},
            success:function(d){

                if(d == 0) {
                    $(this_input).css("border-color" , "green");
                    $("#"+span_id).html("");
                    $('input[type="submit"]').removeAttr("disabled");
                }
                if(d == 1){
                    $(this_input).css("border-color" , "red");
                    $("#"+span_id).html('تم ادخالة من قبل');
                    $('input[type="submit"]').attr("disabled","disabled");
                }
//                checkUniqueAllNum();
            }

        });


    }
</script>


<!--      employee operation                 -->

<script>
    function add_emp_row()
    {
        var div = document.getElementById('devEmpTable');
        div.style.display = "block";


        var x = document.getElementById('empTable');

        var len_tab1 = x.rows.length;

        len=len_tab1;



        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/add_emp_record",
            data:{len:len},
            success:function(d){
                $('#result1').append(d);

            }

        });
    }

</script>


<script>

    function get_qsm(id_depart,id_pop) {
        // alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            var dataString = "id_depart=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/DevicesPoints/GetDepart',
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

    function get_emp(id_qsm,id_pop) {
        // alert(id_depart);
        if (id_qsm != 0 && id_qsm != "") {
            var dataString = "id_qsm=" + id_qsm;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/DevicesPoints/GetDepart',
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










