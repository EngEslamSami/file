<style>
label.label-green {
    display: inline-block;
    width: 100%;
}
label.label-green {
    height: auto;
    line-height: unset;
    font-size: 16px !important;
    font-weight: 600 !important;
    text-align: right !important;
    margin-bottom: 0;
    background-color: transparent;
    color: #002542;
    border: none;
    padding-bottom: 0;
    font-weight: bold;
}
.half {
    width: 100% !important;
    float: right !important;
}


</style>
<link href="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.css"
      rel="stylesheet" type="text/css"/>

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
     
            <h3 class="panel-title"><?= $title ?></h3>
   
    </div>
    <div class="panel-body">

        <div class="form-group col-sm-12">
       
            <!--
            <div class="col-sm-6">
                <label class="label label-green  ">فئة الأضافة </label>
                <input tabindex="11" type="radio" id="square-radio-1" class="type" name="type"
                       data-validation="required" value="1" onclick="make_disable('1');">
                <label for="square-radio-1">نوع الايصال </label>
                <input tabindex="11" type="radio" id="square-radio-1" class="type" name="type"
                       data-validation="required" value="2" onclick="make_disable('2');">
                <label for="square-radio-1">نوع الايراد - التبرع </label>
                <input tabindex="11" type="radio" id="square-radio-1" class="type" name="type"
                       data-validation="required" value="3" onclick="make_disable('3');">
                <label for="square-radio-1">الفئه</label>
                <input tabindex="11" type="radio" id="square-radio-1" class="type" name="type"
                       data-validation="required" value="4" onclick="make_disable('4');">
                <label for="square-radio-1">البند</label>
                <span class="type22" style="color:red; display: none;"> هذا الحقل مطلوب</span>
            </div>
            -->
        </div>

        <div id="optiont">
            <div class="form-group col-sm-12 no-padding">

                <div class="col-sm-3 col-xs-12">
                    <label class="label label-green  half">نوع الايصال</label>
                    <select class="form-control "  id="select1"
                            onchange="get_option($(this).val(),2)">
                        <option value="">اختر</option>
                        <?php
                        if (isset($records) && !empty($records)) {

                            foreach ($records as $row) {

                                ?>


                                <option value="<?php echo $row->id ; ?>"
                                   <?php if ($row->CountChilds > 3) //echo 'disabled'; ?>
                                    ><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <span class="select1" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <label class="label label-green  half">نوع الايراد - التبرع</label>
                    <select class="form-control "  id="select2"
                            onchange="get_option($(this).val(),3);">
                        <option value="">اختر</option>
                        <?php
                        if (isset($records) && !empty($records)) {


                            foreach ($records as $row) {
                                ?>


                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <span class="select2" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>



                <div class="col-sm-3 col-xs-12">
                    <label class="label label-green  half">الفئه </label>
                    <select class="form-control "  id="select3"
                            onchange="get_option($(this).val(),4);">
                        <option value="">اختر</option>
                        <?php
                        if (isset($records) && !empty($records)) {

                            foreach ($records as $row) {

                                ?>


                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <span class="select3" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <label class="label label-green  half">البند </label>
                    <select class="form-control "  id="select4">
                        <option value="">اختر</option>
                        <?php
                        if (isset($records) && !empty($records)) {

                            foreach ($records as $row) {
                                ?>


                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <span class="select4" style="color:red; display: none;"> هذا الحقل مطلوب</span>
                </div>

            </div>
        </div>
   
        <div class="col-xs-12 text-center" style="margin-bottom: 10px;">

            <button type="button" onclick="save_db();" name="ADD" class="btn btn-success  btn-labeled btn-next" value="ADD">
                <span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ 
            </button>
        </div>



        <?php if (isset($rows) && !empty($rows) && $rows != null) {

//            echo "<pre>";
//            print_r($rows);
//            echo "</pre>";

            ?>

            <table id="" class=" display table table-bordered table-striped  responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="greentd visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>فئه الايصال</th>
                    <th>نوع الايراد - التبرع</th>

                    <th>الفئه</th>
                    <th>البنود</th>
                      <th>الحالة</th>
                    <th>الاجراء</th>
                </tr>

                </thead>
                <tbody>


                <?php
                $x = 0;
                foreach ($rows as $record) {
                    $x++;
                ?>

                <tr>
                    <td <?php if($record->count>1){ ?> rowspan="<?= $record->count ?>"  <?php }else { ?>rowspan="<?= count($record->erads) ?>" <?php }?>><?php echo $x; ?></td>
                    <td <?php if($record->count>1){ ?> rowspan="<?= $record->count ?>"<?php }else { ?>rowspan="<?= count($record->erads) ?>" <?php }?>><?php echo$record->title;?> </td>
                    <?php  if(isset($record->erads)&&!empty($record->erads)) {
                    foreach ($record->erads as $fea ) {
                    ?>
                    <td <?php if($fea->count >1){ ?> rowspan="<?= $fea->count ?>" <?php }?> ><?php echo $fea->title ;?> </td>
                    <?php  if(isset($fea->fe2at)&&!empty($fea->fe2at)) {
                    foreach ($fea->fe2at as $row ) {
                    ?>
                    <td <?php if(count($row->bond)>1){ ?> rowspan="<?= count($row->bond) ?>"  <?php } ?>><?= $row->title ?>  </td>
                    <?php  if(isset($row->bond)&&!empty($row->bond)) {
                    foreach ($row->bond as $row2 ) { ?>


                    <td>
                        <?php echo $row2->title; ?>
                    </td>
<td>
            <div class="toggle-example">
                 <input id="status_hidden<?= $row2->id ?>" type="hidden" value="<?= $row2->status ?>"/>
                <input id="checkbox_toggle" class="checkbox_toggle" data-size="mini"
                       type="checkbox" <?php if ($row2->status == 1) {
                    echo 'checked';
                } ?> data-toggle="toggle"
                       onchange="change_status($('#status_hidden').val(),<?= $row2->id ?>)"
                       data-onstyle="success" data-offstyle="danger">
            </div>

        </td>
                    
                    
                    <td>

                        <a href="<?php echo base_url(); ?>all_Finance_resource/bnod/Bnod/delete_record/<?php echo $row2->id; ?>"
                           onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                         aria-hidden="true"></i>
                        </a>
                    </td>

                    </tr>
                    <?php } } else { ?>

                    <td>++</td>

                    <td>
                        <a href="<?php echo base_url(); ?>all_Finance_resource/bnod/Bnod/delete_record/<?php echo $row->id; ?>"
                           onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                         aria-hidden="true"></i>
                        </a>
                    </td>
                    </tr>
                <?php } } } else { ?>
                <td>--</td>
                <td>--</td>

                <td>
                    <a href="<?php echo base_url(); ?>all_Finance_resource/bnod/Bnod/delete_record/<?php echo $fea->id; ?>"
                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                     aria-hidden="true"></i>
                    </a>
                </td>
                </tr>
                <?php   } } } else { ?>
                <td>==</td>
                <td>==</td>
                <td>==</td>

                <td>
                    <a href="<?php echo base_url(); ?>all_Finance_resource/bnod/Bnod/delete_record/<?php echo $record->id; ?>"
                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                     aria-hidden="true"></i>
                    </a>
                </td>

                <?php   } }   ?>




                </tbody>
            </table>


        <?php } ?>
    </div>
</div>



<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>


<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>

 <script>

    $('.checkbox_toggle').bootstrapToggle({
      on: 'نشط',
      off: 'غير نشط'
    });

</script>

<script>

  function change_status(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/bnod/Bnod/change_status",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden'+id).val(status);


            }

        });
    }
    /*function change_status(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/box/quods/Quods/change_status",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden').val(status);
                
                
            }

        });
    }*/

</script>




<!--------------------------------------->

<script>
    function get_bond(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/bnod/Bnod/get_bond",
            data: {valu: valu},
            success: function (d) {

                //  alert("تمت الاضافه بنجاح");
                $('#bond' + id).append(d);


            }

        });
    }


</script>


<script>
    function get_option(valu, type) {
var type2=type-1;
 txT=$("#select"+type2+" option:selected").text();


        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/bnod/Bnod/get_sub_branch",
            data: {valu: valu},
            success: function (d) {




                    $('#select' + type).html(d);
                if(d==0)
                {

               $('#select'+type).html("<option value="+valu+">"+txT+"</option>");
               if(type==3){
                   $('#select'+4).html("<option value="+valu+">"+txT+"</option>");
               }
                }



            }

        });
    }


</script>
<script>
    function plases(id_main, is_sub) {
        var value_id = $("#" + id_main).val();
        if (value_id) {
            var dataString = 'value_id=' + value_id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Setting/AreaSetting',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + is_sub).html(html);
                }
            });
            return false;
        }
    }
</script>

<script>
    function make_disable(valu) {

        switch (valu) {
            case '1':
                $('#select1').attr('disabled', false);
                $('#select2').attr('disabled', true);
                $('#select3').attr('disabled', true);
                $('#select4').attr('disabled', true);
                break;
            case '2':
                $('#select1').attr('disabled', false);
                $('#select2').attr('disabled', false);
                $('#select3').attr('disabled', true);
                $('#select4').attr('disabled', true);
                break;
            case '3':
                $('#select1').attr('disabled', false);
                $('#select2').attr('disabled', false);
                $('#select3').attr('disabled', false);
                $('#select4').attr('disabled', true);
                break;
            case '4':
                $('#select1').attr('disabled', false);
                $('#select2').attr('disabled', false);
                $('#select3').attr('disabled', false);
                $('#select4').attr('disabled', false);
                break;
            default:
                alert("اختيار خاطيء");
        }


    }


</script>

<script>
    function save_db(valu, type) {
       // var type = $(".type:radio:checked").val();

            var select1 = $('#select1').val();


            var select2 = $('#select2').val();
            var select3 = $('#select3').val();
            var select4 = $('#select4').val();
            var select1_text = $("#select1 option:selected").text();
            var select2_text = $("#select2 option:selected").text();
            var select3_text = $("#select3 option:selected").text();
            var select4_text = $("#select4 option:selected").text();


            if (select1 == '') {
                $('.select1').show();
                return;
            }

            if (select2 == '' && $('#select2').prop('disabled') == false) {
                $('.select2').show();
                return;
            }
            if (select3 == '' && $('#select3').prop('disabled') == false) {
                $('.select3').show();
                return;
            }
           

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_Finance_resource/bnod/Bnod/add_data",
                data: {
                    select1: select1,
                    select2: select2,
                    select3: select3,
                    select4: select4,

                    select1_text: select1_text,
                    select2_text: select2_text,
                    select3_text: select3_text,
                    select4_text: select4_text
                },
                success: function (d) {

                    alert("تمت الاضافه بنجاح");
                    location.reload();


                }

            });





    }


</script>