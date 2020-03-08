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

            <?php
            $category  = array(
                '1'=>'أرملة',
                '2'=>'يتيم',
                '3'=>'مستفيد',

            );
            $gender  = array(
                '1'=>'ذكر',
                '2'=>'انثي',

            );
            ?>


            <?php echo form_open_multipart('family_controllers/benefit/BenefitAges/add_benefit'); ?>
<div class="col-sm-12 no-padding">
    <h6 class="text-center inner-heading-green">بيانات اعمار المستفيدين</h6>
</div>

 <button class="btn btn-add"  type="button" onclick="add_row(<?php echo 5;?>)">اضافه </button>

<a href="<?php echo base_url();?>family_controllers/benefit/BenefitAges/deleteAllBenefit" class="btn btn-info pull-right" onclick="return confirm('هل انت متاكد  من عمليه حذف الكل ؟');">
    تهيئة 
</a>


<table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0" width="100%" style="table-layout: auto;">
    <thead>
    <tr class="green_background">
        <th style="width: 15%;">التصنيف</th>
        <th style="width: 12%;"> الجنس</th>
        <th style="width: 8%;">من عمر</th>
        <th style="width: 7%;">إلي عمر</th>
        <?php if(isset($categories)&& !empty($categories)){
            foreach ($categories as $row){
                ?>

                <th> <?= $row->title?></th>
            <?php   }   } ?>
<!--        <th style="">الفئات التابع لها</th>-->
        <th style="">الاجراء</th>

    </tr>

    <tbody id="result">
    <?php
    if(isset($allData)&&!empty($allData)) {

        $len = 1;

        foreach ($allData as $record) {


                ?>


                <tr>

                    <td>
                            <?php
                              if(isset($record->tasnef) && isset($category[$record->tasnef])){
                                    echo $category[$record->tasnef];
                                }else {
                                    echo 'غير محدد';
                                }
                                ?>


                        </select>
                        <input type="hidden" name="tasnef[]" value="<?=$record->tasnef?>">

                    </td>
                    <td>
                            <?php
                                if(isset($record->gender_fk) && isset($gender[$record->gender_fk])){
                                  echo $gender[$record->gender_fk];
                                }else {
                                    echo 'غير محدد';
                                }
                                ?>


                        </select>
                        <input type="hidden" name="gender_fk[]" value="<?=$record->gender_fk?>">
                    </td>
                    <td>
                        <?php echo $record->from_age; ?>
                        <input type="hidden" name="from_age[]" value="<?=$record->from_age?>">

                    </td>
                    <td>
                        <?php echo $record->to_age; ?>
                        <input type="hidden" name="to_age[]" value="<?=$record->to_age?>">

                    </td>
                    <?php if(isset($categories)&& !empty($categories)){
                        $i = 0;
                        foreach ($categories as $row1){

                            ?>

                            <td>

                                <?php
                                $halaTure = 'check';
                                $halafalse = 'times';
                                $true = '';
                                $color = '';
                                if(isset($record->cat_details) && !empty($record->cat_details) && $record->cat_details != "null" ){

                                if(in_array($row1->id, json_decode($record->cat_details)) ){
                                    $true = $halaTure;
                                    $color = 'green'; ?>
                                    <i style="color:<?=$color?>" class="fa fa-<?=$true?>" aria-hidden="true"></i>
                                    <input type="hidden" name="cat_details<?=$len?>[]" value="<?=$row1->id?>">

                                 <?php }else {
                                    $true = $halafalse;
                                    $color = 'red';
                                    ?>
                                    <i style="color:<?=$color?>" class="fa fa-<?=$true?>" aria-hidden="true"></i>
                                    <input type="hidden" name="cat_details<?=$len?>[]" value="">
                                    <?php } } else {
                                    $true = $halafalse;
                                    $color = 'red';
                                    ?>
                                    <i style="color:<?=$color?>" class="fa fa-<?=$true?>" aria-hidden="true"></i>
                                    <input type="hidden" name="cat_details<?=$len?>[]" value="">
                                <?php } ?>
                            </td>
                            <?php $i++;  }   } ?>

                    <td>
                        <a type="button" class="" data-toggle="modal" data-target="#myModal<?=$record->id?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>

                        <a href="<?php echo base_url();?>family_controllers/benefit/BenefitAges/delete_benefit/<?php echo $record->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>

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

        <input type="submit" id="" style="padding: 5px 14px;" name="add" class="btn btn-blue btn-close" value=" حفظ ">
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
                    <?php echo form_open_multipart('family_controllers/benefit/BenefitAges/update_benefit/'.$row2->id); ?>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead class="green_background">
                            <th style="width: 15%;">التصنيف</th>
                            <th style="width: 12%;"> الجنس</th>
                            <th style="width: 8%;">من عمر</th>
                            <th style="width: 7%;">إلي عمر</th>
                            <?php if(isset($categories)&& !empty($categories)){
                                foreach ($categories as $row){
                                    ?>

                                    <th> <?= $row->title?></th>
                                <?php   }   } ?>
                            </thead>
                            <tr>

                                <td>


                                    <select  name="tasnef"    class="form-control half benfit" data-validation="required" >
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($category as $key=>$value){
                                            $select1 = '';
                                            if($row2->tasnef == $key){
                                                $select1 = 'selected';
                                            }


                                            ?>
                                            <option <?=$select1?>  value="<?=$key ?>"><?=$value ?></option>
                                        <?php }  ?>
                                    </select>

                                </td>
                                <td>



                                    <select  name="gender_fk"   class="form-control half " data-validation="required" >
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($gender as $key=>$row){
                                            $select2 = '';
                                            if($row2->gender_fk == $key){
                                                $select2 = 'selected';
                                            }
                                            ?>
                                            <option <?=$select2?>  value="<?=$key ?>"><?=$row ?></option>
                                        <?php  } ?>
                                    </select>
                                </td>

                                <td>
                                    <input type="text"  data-validation="required"
                                           value="<?php if(isset($row2->from_age)){ echo $row2->from_age;} ?>" class="form-control valu" name="from_age">
                                </td>


                                <td>

                                    <input type="text"   data-validation="required"
                                           value="<?php if(isset($row2->to_age)){ echo $row2->to_age;} ?> "
                                           class="form-control valu" name="to_age">

                                </td>

                                <?php if(isset($categories)&& !empty($categories)){
                                $i = 0;
                                foreach ($categories as $row){

                                ?>

                                <td>

                                    <input type="checkbox"  value="<?=$row->id?>"
                                           <?php if(isset($row2->cat_details)&& $row2->cat_details != "null"){
                                                if(in_array($row->id, json_decode($row2->cat_details)) ){
                                                    echo "checked";
                                                }
                                           } ?>
                                           class="center-block valu" style="width: 18px;height: 18px" name="cat_details[]">

                                </td>
                            <? }} ?>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"   name="update_benfit" class="btn btn-blue btn-close" value="حفظ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                    </div>
                    <?php echo form_close() ; ?>
                </div>
            </div>
        </div>


    <?php  } }  ?>



<script>
    function add_row(count2)
    {
        var x = document.getElementById('POITable');

        var len_tab1 = x.rows.length;
        
        len=len_tab1;
      

        if(len_tab1>count2)
        {
            alert("عفوا تمت اضافه جميع التصنيفات");
            return;
        }



        var valu=[];
        $(".badl_setting").each(function () {
            valu.push($(this).val());
        })
      
        


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/benefit/BenefitAges/add_record",
            data:{valu:valu,len:len},
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

    function check_type(value) {
//    var yateem=[];
//        if(value==1)
//        {
//            $(".benfit").each(function () {
//                if($(this).val()!='') {
//                    yateem.push($(this).val());
//                }
//            })
//            if(yateem.length==2)
//            {
//                var variable=1;
//                $(".benfit option:contains('Value " + variable + "')").attr("disabled","disabled");
//                $(".benfit").prop("selectedIndex",-1)
//                return;
//
//            }
//        }


        var x = document.getElementById('POITable');
        var len_tab1 = x.rows.length;
        len=len_tab1-1;

        if(value == 1){
            $('#gender'+len).html('<option   value="2">انثي</option>');
        }else{
            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>family_controllers/benefit/BenefitAges/check_type_select",
                data:{value:value},
                success:function(d){
                    $('#gender'+len).html(d);

                }

            });
        }




    }

</script>







