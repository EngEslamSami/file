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
                    <th style="">الاجراء</th>

                </tr>

                <tbody id="result">
                <?php
                if(isset($allData)&&!empty($allData)) {
                    $status  = array(
                        '0'=>'غير نشط',
                        '1'=>'نشط'
                    );
                    $len = 1;

                    foreach ($allData as $record) {


                        ?>


                        <tr>

                            <td>
                                <?php
                                if(isset($record->bank_id_fk) ){
                                    foreach ($banks as $bank){
                                        if($bank->id == $record->bank_id_fk){
                                            echo $bank->title;
                                        }
                                    }

                                }else {
                                    echo 'غير محدد';
                                }
                                ?>


                               
                                <input type="hidden" name="bank_id_fk[]" value="<?=$record->bank_id_fk?>">

                            </td>
                            
                            <td>
                                <?php 
                                if(isset($record->account_id_fk) && isset($accounts) ){
                                    foreach ($accounts as $account){
                                        if($account->id == $record->account_id_fk){
                                            echo $account->title;
                                        }
                                    }
                                }else {
                                    echo 'غير محدد';
                                }
                                ?>

                                <input type="hidden" name="account_id_fk[]" value="<?=$record->account_id_fk?>">
                                <input type="hidden" name="type[]" value="2" />
                            </td>
                           
                            <td>
                                <?php echo $record->account_num; ?>
                                <input type="hidden" name="account_num[]" value="<?=$record->account_num?>">

                            </td>
                           

                            <td>

                                <?php
                                $suspend = " غير نشط";
                                $btn = 'label label-danger';
                                if($record->status == 1){
                                    $suspend = "نشط";
                                    $btn = 'label label-success';
                                }
                                ?>
                                <label
                                   title=" <?=$suspend?>" class="<?=$btn?>">
                                    <?=$suspend?></label>
                                <input type="hidden" name="status[]" value="<?=$record->status?>">
                            </td>
                                    

                            <td>
                                <a type="button" class="" data-toggle="modal" data-target="#myModal<?=$record->id?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                <a href="<?= base_url() . "society_system/SocietySystem/delete/".$record->id.'/addSocietySystem' ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        <?php $len++; }} ?>



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

    foreach ($allData as $row2) {

        $status  = array(
            '0'=>'غير نشط',
            '1'=>'نشط',

        );
        ?>

        <div class="modal fade" id="myModal<?=$row2->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  style="position: absolute;left: 10px; top: 14px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo form_open_multipart('society_system/SocietySystem/updateAccounts/'.$row2->id); ?>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead class="green_background">
                            <th style="">البنك</th>
                            <th style=""> اسم الحساب</th>
                            <th style="">رقم الحساب</th>
                            <th style="">الحالة</th>
                            </thead>
                            <tr>
                                <td>


                                    <select id="benef<?php echo $len;?>" name="bank_id_fk" onchange=""   class="form-control half " data-validation="required" >
                                        <option value="">إختر البنك </option>
                                        <?php
                                        if(isset($banks)){
                                            foreach ($banks as $bank){
                                                $select2 = '';
                                                if($row2->bank_id_fk == $bank->id){
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
                                                if($row2->account_id_fk == $account->id){
                                                    $select2 = 'selected';
                                                }
                                                ?>

                                                <option <?=$select2?> value="<?=$account->id?>"><?=$account->title?></option>
                                            <?php } } ?>

                                    </select>
                                </td>

                                <td>
                                    <input type="text"  data-validation="required" maxlength="24" onkeyup="check_len_p($(this).val())"  value="<?=$row2->account_num?>" class="form-control " name="account_num">
                                    <input type="hidden" name="type" value="2" />
                                </td>


                                <td>

                                    <select  name="status"   class="form-control half " data-validation="required" >
                                        <option value="">إختر الحالة</option>
                                        <?php
                                        foreach ($status as  $key=>$row ){
                                            $select2 = '';
                                            if($row2->status == $key){
                                                $select2 = 'selected';
                                            }
                                            ?>

                                            <option <?=$select2?> value="<?=$key?>"><?=$row?></option>
                                        <?php  } ?>

                                    </select>
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


    <?php  } }  ?>



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










