

<style>
    td .fa-trash {
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        background-color: #ff0000;
        color: #fff;
        border-radius: 2px;
    }
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

<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 no-padding">
                    <h6 class="text-center inner-heading-green">بيانات توقيعات الموظفين</h6>
                </div>

                <?php echo form_open_multipart('Dashboard/userSignatures'); ?>
                <button class="btn btn-add"  type="button" onclick="add_row(<?php echo count($users);?>)">اضافه توقيع</button>
                <table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0" width="100%" style="table-layout: auto;">
                    <thead>
                    <tr class="green_background">

                        <th > اسم المستخدم</th>
                        <th>صورة التوقيع</th>
                        <th >الحالة</th>
                        <th >الاجراء</th>

                    </tr>

                    <tbody id="result">
                    <?php
                    if(isset($allUsers)&&!empty($allUsers)) {


                        foreach ($allUsers as $record) {
                            if (in_array($record->user_id_fk, $users_in)) {
                                ?>


                                <tr>

                                <td>
                            <select disabled="disabled" class="badl_setting form-control"
                                    data-validation="required"
                                    id="db_band_name<?php echo $record->badalat->badl_discount_id_fk; ?>">

                                <option value="0">اختر</option>

                                <?php
                                if (isset($users) && !empty($users)) {
                                    foreach ($users as $row) {
                                        $name = 'غير محدد';
                                        foreach ($users as $row) {
                                            if ($row->role_id_fk == 1) {
                                                $name = $row->user_username;
                                            } elseif ($row->role_id_fk == 2) {
                                                $name = $row->member_name;
                                            } else if ($row->role_id_fk == 3) {
                                                $name = $row->emp_name;
                                            } elseif ($row->role_id_fk == 4) {
                                                $name = $row->member_public_name;
                                            } elseif ($row->role_id_fk == 5) {
                                                $name = $row->user_user;
                                            }
                                            ?>
                                            <option
                                                value="<?php echo $row->user_id; ?>"<?php if ($row->user_id == $record->user_id_fk) {
                                                echo 'selected';
                                            } ?>><?php echo $name; ?></option>


                                        <?php }
                                    } ?>

                                    </select>
                                    </td>
                                    <?php if (!empty($record->img)) {
                                        $img_url = "uploads/images/" . $record->img;
                                    } else {
                                        $img_url = "non";
                                    } ?>
                                    <td><?php if ($img_url!='non'){ ?> 
                                    <a data-toggle="modal" type="button" style="cursor: pointer"
                                           data-target="#modal-img"
                                           onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');">
                                            <i class="fa fa-eye"></i>
                                     
                                        
                                        </a> <? }else { echo 'لم يتم رفع صورة';  ?>
                                            <input type="file"    id=""  class="form-control" name="img_old[]"   >
                                            <input type="hidden" value="<?=$record->user_id_fk?>" name="user_id_old[]" >
                                       <?  } ?>

                                    </td>


                                    <?php
                                    $active=array(1=>'مفعل',2=>'غير مفعل');
                                    ?>
                                    <td>
                                        <select class="form-control" disabled  name="active[]" class="form-control" data-validation="required">

                                            <option value="">اختر</option>

                                            <?php

                                            foreach ($active as $key=>$value){
                                                $select = '';
                                                if($key== $record->active){
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option <?=$select?> value="<?php echo $key;?>"><?php echo $value;?></option>


                                            <?php } ?>

                                        </select>
                                    </td>


<!--
<td><a href="<?=base_url().'Dashboard/deleteUserSignatures/'.$record->id?>" id="delPOIbutton"  onclick="deleteRow(this)"><i class="fa fa-trash" aria-hidden="true"></i>
    </a></td>
    -->
    
 <td><a href="<?=base_url().'Dashboard/deleteUserSignatures/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" id="delPOIbutton"  onclick="deleteRow(this)"><i class="fa fa-trash" aria-hidden="true"></i>
 </td>

                                        
                                        

                                    </tr>


                                    <?php
                                }

                            }
                        }
                    }

                    ?>




                    </tbody>


                </table>
              <div class="modal fade" id="modal-img" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <img id="my_image" src="" width="100%" height="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" style="float: left"
                                    data-dismiss="modal">إغلاق
                            </button>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-xs-12">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-2">

                        <input type="submit" id=""  name="add_signature" class="btn btn-blue btn-close" value=" حفظ ">
                    </div>
                </div>

                <?php  echo form_close() ;
                ?>
            </div>
        </div>
    </div>
</div>


<script>

    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;
            document.getElementById('POITable').deleteRow(i)
    }


    function get_role(value,len) {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Dashboard/get_role",
            data:{value:value},
            success:function(d){

                $('#role_id_fk'+len).val(d);
            }

        });
    }


</script>


<script>
    function add_row(count2)
    {

        var x = document.getElementById('POITable');
        var len_tab1 = x.rows.length;
        len=len_tab1;

        if(len_tab1>count2+1)
        {
            alert("عفوا تمت اضافه جميع المستخدمين");
            return;
        }




        var valu=[];
        $(".badl_setting").each(function () {
            if($(this).val()!='')
            {
                valu.push($(this).val());
            }

        })







        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Dashboard/add_record",
            data:{valu:valu,len:len},
            success:function(d){


                   $('#result').append(d);
            }

        });
    }

    function get_option(valu,len)
    {

        var valu=[];
        $(".badl_setting").each(function () {
            if($(this).val()!='')
            {
                valu.push($(this).val());
            }
        })



        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Dashboard/add_option_select",
            data:{valu:valu},
            success:function(d){
                
                $(".badl_setting").each(function () {
                    if($(this).val()=="") {
                        $(this).html(d);
                    }
                })



            }

        });
    }

</script>

