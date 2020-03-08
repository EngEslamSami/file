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
    .inner-heading-red{
        background-color: #c73e45;
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

            <?php echo form_open_multipart('society_system/SocietySystem/addSocietySystem'); ?>
            <div class="col-sm-12 no-padding">
                <h6 class="text-center inner-heading-green">أرقام حسابات الجمعية</h6>
            </div>

            <button class="btn btn-add"  type="button" onclick="add_row()">اضافة </button>


            <table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0" width="100%" style="table-layout: auto;">
                <thead>
                <tr class="green_background">
                    <th style="">البنك</th>
                    <th style=""> اسم الحساب</th>
                    <th style="">رقم الحساب</th>
                    <th style="">الحالة</th>
                    <th style="">كود الحساب</th>
                    <th style="">إسم الحساب</th>
                    <th style="">الاجراء</th>

                </tr>

                <tbody id="result">
                <?php
                if(isset($allData)&&!empty($allData)) {
                    $status  = array(
                        '0'=>'غير نشط',
                        '1'=>'نشط'
                    );


                    foreach ($allData as $record) {
                        ?>

                        <tr>
                        <td <?php if($record->count>1){ ?> rowspan="<?= $record->count ?>"  <?php } ?>><?php echo$record->bank_name;?> </td>
                        <?php  if(isset($record->sub)&&!empty($record->sub)) {
                            foreach ($record->sub as $fea ) {
                               ?>
                                <td <?php if(count($fea->sub)>1){ ?> rowspan="<?= count($fea->sub) ?>"  <?php } ?>><?php echo $fea->account_name ;?> </td>
                                <?php  if(isset($fea->sub)&&!empty($fea->sub)) {
                                    foreach ($fea->sub as $row ) {
                                        ?>
                                        <td><?= $row->account_num ?>  </td>
                                        <td>

                                            <?php
                                            $suspend = " غير نشط";
                                            $btn = 'label label-danger';
                                            if($row->status == 1){
                                                $suspend = "نشط";
                                                $btn = 'label label-success';
                                            }
                                            ?>
                                            <label
                                                title=" <?=$suspend?>" class="<?=$btn?>">
                                                <?=$suspend?></label>
                                        </td>
                                        <td>
                                            <?php echo $row->rqm_hesab; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->name_hesab; ?>
                                        </td>
                                        <td>
                                            <a type="button" class="" data-toggle="modal" data-target="#myModal<?=$row->id?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>

                                            <a href="<?= base_url() . "society_system/SocietySystem/delete/".$row->id.'/addSocietySystem' ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                <i class="fa fa-trash" aria-hidden="true"></i></a>
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
                        <?php   } } }  ?>






                </tbody>


            </table>

            <div class="col-xs-12">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                </div>
                <div class="col-md-2">

                    <input type="submit" id="submit_b" style="padding: 5px 14px;" name="add" class="btn btn-blue btn-close" value=" حفظ ">
                </div>
            </div>

            <?php  echo form_close() ;
            ?>
        </div>
    </div>
</div>

<?php
if(isset($allData)&&!empty($allData)) {
$status  = array(
    '0'=>'غير نشط',
    '1'=>'نشط',

);

    foreach ($allData as $row_dee) {
      if(isset($row_dee->sub)&&!empty($row_dee->sub)) {
                 foreach ($row_dee->sub as $fea ) {
        if(isset($fea->sub)&&!empty($fea->sub)) {
             foreach ($fea->sub as $row_edit ) {


        ?>

        <div class="modal fade" id="myModal<?=$row_edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  style="position: absolute;left: 10px; top: 14px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo form_open_multipart('society_system/SocietySystem/updateAccounts/'.$row_edit->id); ?>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead class="green_background">
                            <th style="">البنك</th>
                            <th style=""> اسم الحساب</th>
                            <th style="">رقم الحساب</th>
                            <th style="">الحالة</th>
                            <th style="">كود الحساب</th>
                            <th style="">إسم الحساب</th>
                            </thead>
                            <tr>
                                <td>


                                    <select id="benef" name="bank_id_fk" onchange=""   class="form-control half " data-validation="required" >
                                        <option value="">إختر البنك </option>
                                        <?php
                                        if(isset($banks)){
                                            foreach ($banks as $bank){
                                                $select2 = '';
                                                if($row_edit->bank_id_fk == $bank->id){
                                                    $select2 = 'selected';
                                                }
                                                ?>


                                                <option <?=$select2?> value="<?=$bank->id?>"><?=$bank->title?></option>
                                            <?php } } ?>

                                    </select>

                                </td>
                                <td>
                                    <select id="" name="account_id_fk"   class="form-control half" data-validation="required" >
                                        <option value="">إختر الحساب</option>
                                        <?php  if(isset($accounts) ){
                                            foreach ($accounts as $account){
                                                $select2 = '';
                                                if($row_edit->account_id_fk == $account->id){
                                                    $select2 = 'selected';
                                                }
                                                ?>

                                                <option <?=$select2?> value="<?=$account->id?>"><?=$account->title?></option>
                                            <?php } } ?>

                                    </select>
                                </td>

                                <td>
                                    <input type="text"   data-validation="required" maxlength="24" onkeyup="check_len_p($(this).val())"  value="<?=$row_edit->account_num?>" class="form-control " name="account_num">
                                    <input type="hidden" name="type" value="2" />
                                </td>


                                <td>

                                    <select  name="status"   class="form-control half " data-validation="required" >
                                        <option value="">إختر الحالة</option>
                                        <?php
                                        foreach ($status as  $key=>$row ){
                                            $select2 = '';
                                            if($row_edit->status == $key){
                                                $select2 = 'selected';
                                            }
                                            ?>

                                            <option <?=$select2?> value="<?=$key?>"><?=$row?></option>
                                        <?php  } ?>

                                    </select>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $row_edit->rqm_hesab; ?>" class="form-control testButton" name="rqm_hesab" id="account_num<?=$row_edit->id?>" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(<?=$row_edit->id?>); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')"
                                           onkeyup="getVouchQbdAccountName($(this).val(),<?=$row_edit->id?>);  ">
                                </td>
                                <td>
                                    <input type="text" value=" <?php echo $row_edit->name_hesab; ?>" class="form-control" name="name_hesab" id="account<?=$row_edit->id?>" data-validation="required" aria-required="true" readonly="" >
                                </td>



                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="submit_p"   name="update_benfit" class="btn btn-blue btn-close" value="حفظ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                    </div>
                    <?php echo form_close() ; ?>
                </div>
            </div>
        </div>


    <?php  } } } } } }  ?>


<input type="hidden" name="modalID" id="modalID">

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body">
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
                    if (isset($tree) && $tree!=null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count=1)
                    {
                        $types = array(1=>'رئيسي',2=>'فرعي');
                        $nature = array('','مدين','دائن');
                        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
                        //  $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
                  //      $colorArray = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
 $colorArray = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#09b6bb', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');

                        foreach ($tree as $record) {
                            $onclick = "alert('ليس حساب فرعي');";
                            if ($record->hesab_no3 == 2) {
                                $onclick = "$('#account_num'+$('#modalID').val()).val(".$record->code."); 
                                 $('#rkm_hesab_span'+$('#modalID').val()).html(".$record->code.");
                                 $('#name_hesab_span'+$('#modalID').val()).html('".$record->name."');
                               
                                 $('#account'+$('#modalID').val()).val('".$record->name."');
                                 $('#myModal').modal('hide');";                            }
                            ?>
                            <tr style="background-color: <?=$colorArray[$record->level]?>; cursor: pointer;"
                                onclick="<?=$onclick?>">
                                <td class="forTd"><?=$count++?></td>
                                <td class="forTd"><?=$record->code?></td>
                                <td class="forTd"><?=$record->name?></td>
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
                <?php
                /*function buildTree($tree) {
                    $colorArray = array(1=>'btn-warning', 2=>'btn-success', 3=>'btn-purple', 4=>'btn-danger', 5=>'btn-inverse');
                ?>
                <ul id="tree3">
                    <?php
                    foreach ($tree as $record) {
                        $onclick = '';
                        if ($record->hesab_no3 == 2) {
                            $onclick = "$('#account_num'+$('#modalID').val()).val(".$record->code."); $('#account'+$('#modalID').val()).val('".$record->name."'); $('#myModal').modal('hide');";
                        }
                    ?>
                    <li>
                        <a href="#" onclick="<?=$onclick?>"> <span class="<?=$colorArray[$record->level]?>"> <?=$record->code?></span> <?=$record->name?></a>
                        <?php
                        if (isset($record->subs)) {
                            buildTree($record->subs);
                        }
                        ?>
                    </li>
                    <?php } ?>
                </ul>
                <?php
                }
                if (isset($tree) && $tree!=null) {
                    buildTree($tree);
                }*/
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>





<script>
    function add_row()
    {
        var x = document.getElementById('POITable');

        var len_tab1 = x.rows.length;

        len=len_tab1;



        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>society_system/SocietySystem/add_record",
            data:{len:len},
            success:function(d){
                $('#result').append(d);

            }

        });
    }

</script>

<script>

    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;

        document.getElementById('POITable').deleteRow(i);

    }

</script>



<script>

    function check_len(valu) {
        if(valu.length < 24){
            document.getElementById('submit_b').setAttribute('disabled','disabled');
        }else{
            document.getElementById('submit_b').removeAttribute('disabled','disabled');
        }

    }

 function check_len_p(valu) {
        if(valu.length < 24){
            document.getElementById('submit_p').setAttribute('disabled','disabled');
        }else{
            document.getElementById('submit_p').removeAttribute('disabled','disabled');
        }

    }

</script>










