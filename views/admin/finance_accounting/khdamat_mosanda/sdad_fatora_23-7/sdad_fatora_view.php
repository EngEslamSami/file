<?php

//echo "<pre>";
//print_r($rows);
//return;

?>


<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(isset($rows)&& !empty($rows)){
                $action=base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/update_db/'.$rows[0]->rkm ;
              //  $rkm=$rows[0]->rkm ;
                $total=$rows[0]->total;
                $total_ar=$total_ar;


            }else{
                $action=base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora_db';
               // $rkm=$last_rkm ;
                $total=0;
                $total_ar='';

            }
            ?>
            <form action="<?php echo $action ; ?>" method="post">
   <!--         <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">

                <input type="hidden"   name="rkm" id=""
                       value="<?=$rkm?>" data-validation="required"
                       class="form-control bottom-input"
                       onkeypress="validate_number(event);"
                       data-validation-has-keyup-event="true">
            </div>
-->

            <div class="col-md-12">
               <br>
                <table class="table table-striped table-bordered"   style="" id="mytable">
                    <thead>
                    <tr class="info">
                        <th style="width: 100px;">المبلغ </th>
                        <th style="width: 100px;">التاريخ </th>
                        <th style="width: 120px;">بدايه اللقب</th>
                        <th style="width: 350px;"> الجهه</th>
                        <th style="width: 120px;">نهايه اللقب </th>
                        <th style="width: 120px;">رقم الفاتوره</th>
                        <th>البيان</th>
                        <th>مركز التكلفه</th>
                        <th>الاجراء </th>
                    </tr>
                    </thead>
                    <tbody id="resultTable">
                    <?php if(isset($rows) && !empty($rows)){
                        foreach ($rows as $row){
                            $x=1;
                        ?>
                            <tr id="<?=$x?>">
                                <td><input type="text" data-validation="required" onkeyup="put_total();" style="width: 80px;"  onkeyup="validate_number(event);" value="<?php echo $row->f_value;?>" class="form-control valu"  name="value[]"></td>
                                <td><input type="date" data-validation="required" name="date[]" style="width: 150px;" class="form-control" value="<?php echo $row->f_date_ar;?>"/> </td>
                                <td>         <select name="start_laqb[]" id="start_laqb"
                                                     class="form-control"
                                                     data-show-subtext="true" data-live-search="true" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php if (!empty($titles)) {
                                            foreach ($titles as $title) { ?>
                                                <option data-title="<?= $title->title_setting ?>" value="<?= $title->id_setting ?>"
                                                        <?php if(isset($row->start_laqb) && !empty($row->start_laqb)){
                                                    if($title->id_setting==$row->start_laqb)
                                                    {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>

                                                > <?= $title->title_setting ?> </option>
                                            <?php }
                                        } ?>
                                    </select></td>

                                <td>
                                    <input type="hidden" value="<?php echo $row->geha_id_fk;?>" name="geha_id_fk[]" id="geha_id_fk1"/>

                                    <input type="text" value=" <?php echo $row->geha_name ;?>" data-validation="required" name="geha_name[]" id="geha_name1" readonly value=""
                                           class="form-control input-style" style="width: 78%;float: right">
                                    <button type="button" onclick="get_len();" data-toggle="modal"
                                            data-target="#myModalInfo" class="btn btn-success btn-next"
                                            style="float: right;">
                                        <i class="fa fa-plus"></i></button></td>
                                <td>        <select name="end_laqb[]" id="end_laqb"
                                                    class=" form-control   "
                                                    data-show-subtext="true" data-live-search="true" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php if (!empty($greetings)) {
                                            foreach ($greetings as $greeting) { ?>
                                                <option data-title="<?= $greeting->title_setting ?>"
                                                        value="<?= $greeting->id_setting ?>"
                                                    <?php if(isset($row->end_laqb) && !empty($row->end_laqb)){
                                                        if($greeting->id_setting==$row->end_laqb)
                                                        {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>


                                                > <?= $greeting->title_setting ?> </option>
                                            <?php }
                                        } ?>
                                    </select> </td>
                                <td> <input type="text" value="<?php echo $row->f_fatora_num;?>" name="pill_num[]" style="width: 100px;" class="form-control"/> </td>
                                <td><input type="text " value="<?php echo $row->f_byan;?>" class="form-control" name="byan[]"></td>
                                <td>
                                    <select name="markz[]" id="markz"
                                            class="form-control"
                                            data-show-subtext="true" data-validation="required" data-live-search="true" aria-required="true">
                                        <option value="" <?php if(isset($row->f_markz_taklfa_id_fk) && !empty($row->f_markz_taklfa_id_fk)){
                                            if($row->f_markz_taklfa_id_fk==$row->f_markz_taklfa_id_fk)
                                            {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>اختر</option>
                                        <option value="1"> مركز1</option>
                                        <option value="2"> مركز2</option>
                                    </select>

                                </td>

                                <td>        <a href="#" <?php if($x!=1){?> onclick="$('#<?php echo $x ;?>').remove();

                        put_total();" <?php } ?> >
                                        <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>

                    <?php $x++;  } } else { ?>
                    <tr id="1">
                        <td><input type="text" data-validation="required" onkeyup="put_total();" style="width: 80px;"  onkeyup="validate_number(event);" class="form-control valu" value="" name="value[]"></td>
                        <td><input type="date" data-validation="required" name="date[]" style="width: 150px;" class="form-control" value="<?php echo date("Y-m-d");?>"/> </td>
                        <td>         <select name="start_laqb[]" id="start_laqb"
                                             class="form-control"
                                             data-show-subtext="true" data-live-search="true" aria-required="true">
                                <option value="">اختر</option>
                                <?php if (!empty($titles)) {
                                    foreach ($titles as $title) { ?>
                                        <option data-title="<?= $title->title_setting ?>" value="<?= $title->id_setting ?>"

                                        > <?= $title->title_setting ?> </option>
                                    <?php }
                                } ?>
                            </select></td>

                        <td>
                            <input type="hidden" name="geha_id_fk[]" id="geha_id_fk1"/>

                            <input type="text" data-validation="required" name="geha_name[]" id="geha_name1" readonly value=""
                                           class="form-control input-style" style="width: 78%;float: right">
                            <button type="button" onclick="get_len();" data-toggle="modal"
                                    data-target="#myModalInfo" class="btn btn-success btn-next"
                                    style="float: right;">
                                <i class="fa fa-plus"></i></button></td>
                        <td>        <select name="end_laqb[]" id="end_laqb"
                                            class=" form-control   "
                                            data-show-subtext="true" data-live-search="true" aria-required="true">
                                <option value="">اختر</option>
                                <?php if (!empty($greetings)) {
                                    foreach ($greetings as $greeting) { ?>
                                        <option data-title="<?= $greeting->title_setting ?>"
                                                value="<?= $greeting->id_setting ?>"



                                        > <?= $greeting->title_setting ?> </option>
                                    <?php }
                                } ?>
                            </select> </td>
                        <td> <input type="text" name="pill_num[]" style="width: 100px;" class="form-control"/> </td>
                        <td><input type="text" name="byan[]" class="form-control"/></td>
                        <td>
                            <select name="markz[]" id="markz"
                                    class="form-control"
                                    data-show-subtext="true" data-validation="required" data-live-search="true" aria-required="true">
                                <option value="">اختر</option>
                               <option> مركز1</option>
                               <option> مركز2</option>
                            </select>

                           </td>

                        <td>        <a href="#" onclick="">


                                <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td> <span style="color:red;" id="total"><?php echo $total;?></span> </td>
                        <td colspan="7">مبلغ وقدره:-<span id="total_arabic" style="color:red;"><?php echo $total_ar;?></span></td>
                        <td> <button type="button" onclick="add_row()"
                                     class="btn btn-success btn-next"/><i class="fa fa-plus"></i>  </button></td>

                    </tr>
                    </tfoot>
                </table>
            </div>
<div class="col-md-12 text-center">
    <button type="submit" name="insert"  class="btn btn-labeled btn-success "> <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
</div>

            </form>






            <!------------------------------------------------------------------------->
            <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">الجهة</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="len" value=""/>

                            <div class="col-sm-12 form-group">
                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-3  col-md-3 padding-4 ">
                                        <!-- <button type="button" class="btn btn-labeled btn-success " onclick="$('#geha_input').show()"
                                                 style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                             <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة جهة
                                         </button>-->
                                        <button type="button" class="btn btn-labeled btn-success " onclick="$('#geha_input').show(); show_add()"
                                                style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                            <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة جهة
                                        </button>

                                    </div>
                                </div>
                                <div class="col-sm-12 no-padding form-group">

                                    <div id="geha_input" style="display: none">
                                        <div class="col-sm-3  col-md-5 padding-2 ">
                                            <label class="label label-green  ">إسم الجهة </label>
                                            <input type="text" name="geha_title" id="geha_title"
                                                   value=""
                                                   class="form-control input-style">
                                            <input type="hidden" class="form-control" id="s_id" value="">
                                        </div>
                                        <div class="col-sm-3  col-md-2 padding-4 ">
                                            <label class="label label-green  ">رقم الجوال </label>
                                            <input type="text" name="mob" id="mob"
                                                   value=""
                                                   class="form-control input-style">
                                        </div>
                                        <div class="col-sm-3  col-md-3  ">
                                            <label class="label label-green  ">العنوان </label>
                                            <input type="text" name="address" id="address"
                                                   value=""
                                                   class="form-control input-style">
                                        </div>

                                        <!--<div class="col-sm-3  col-md-2 padding-4">
                                           <label class="label label-green  ">  </label>
                                            <button type="button" onclick="add_geha($('#geha_title').val())"
                                                    class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>-->

                                        <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: none;">
                                            <button type="button" onclick="add_geha($('#geha_title').val())" style="    margin-top: 27px;"
                                                    class="btn btn-labeled btn-success" name="save" value="save">
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>
                                        <div class="col-sm-3  col-md-3 padding-4" id="div_update" style="display: none;">
                                            <button type="button"
                                                    class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <br>  <br>  <br>
                            <div id="myDiv_geha"><br><br>
                                <?php if (!empty($geha_table)) { ?>
                                    <table id="" class=" example table table-bordered table-striped" role="table">
                                        <thead>
                                        <tr class="greentd">
                                            <th width="2%">#</th>
                                            <th class="text-center">الجهة</th>
                                            <th class="text-center">رقم الجوال</th>
                                            <th class="text-center">العنوان</th>
                                            <th class="text-center">الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $x = 1;
                                        foreach ($geha_table as $value) {
                                            ?>
                                            <tr>
                                                <td><input type="radio" name="radio" data-id="<?= $value->id ?>" data-title="<?= $value->title ?>"
                                                           id="radio" ondblclick="getTitle($(this).attr('data-title'),$(this).attr('data-id'))"></td>
                                                <td><?= $value->title ?></td>
                                                <td><?= $value->mob ?></td>
                                                <td><?= $value->address ?></td>
                                                <td>
                                                    <!--
                                          <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
-->
                                                    <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                                                    <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>





                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                <?php } else { ?>

                                    <div class="alert alert-danger">لاتوجد بيانات !!</div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="modal-footer" style="display: inline-block;width: 100%">
                            <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
<!----------------------------------------------------->
<?php if(isset($records)&& !empty($records)){?>

            <table class="table-bordered table table-responsive example">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>رقم الطلب </th>
                    <th>اجمالي المبلغ</th>
                    <th> عدد الفواتير</th>
                    <th>  القائم بالاضافه</th>


                    <th>الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $key=1;
                foreach ($records as $row) {
                    ?>
                    <tr>
                        <td  scope="row" > <?= $key ?></td>
                        <td><?=$row->rkm ?></td>
                        <td><?=$row->total ?></td>
                        <td><?=$row->num_fators ?></td>

                        <td><?=$row->publisher_name ?></td>

                        <td>
                            <a href="#modal_details"  data-toggle="modal"  onclick="get_fatora_details(<?php echo $row->rkm;?>)"> <i class="fa fa-eye"> </i></a>


                            <a onclick="alert('هل انت متأكد من حذف ؟!!')"
                               href="<?php echo base_url() . 'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/delete_by_rkm/' . base64_encode($row->rkm) ?>">
                                <i class="fa fa-trash"></i></a>
                            <a href="<?php echo base_url() . 'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/update_fatora/' . base64_encode($row->rkm) ?>">
                                <i class="fa fa-pencil"></i></a>


                        </td>
                    </tr>
                <?php $key++ ;  } ?>
                </tbody>
            </table>
            <?php } ?>



        </div>
        </div>

    </div>


<!------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل طلب السداد</h4>
            </div>
            <div class="modal-body" id="details"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button
                    type="button" onclick="print_order(document.getElementById('row_id').value)"
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

<!------------------------------------------------------------------------------------------------------------->

<script>
    function add_row(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var length = x.rows.length + 1;

        var dataString   ='length=' + length   ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_data',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
                $('#saves').show();
                // get_new_option(2);
            }
        });

    }
    //-----------------------------------------------

</script>

<script>
    function get_len()
    {
        var x = document.getElementById('resultTable');
        var length = x.rows.length;
       // alert(length);
        $('#len').val(length);
    }

</script>

<script>
    function add_geha(value) {
        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

        var mob = $('#mob').val();
        var address = $('#address').val();
        if (value != 0 && value != '' && mob != ' ' && address != ' ') {
            var dataString = 'title=' + value + '&mob=' + mob + '&address=' + address;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/namazegs/Namazeg/insert_geha_ajax',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);
                }
            });
        }

    }

    /*
     function add_geha(value) {
     var mob = $('#mob').val();
     var address = $('#address').val();
     if (value != 0 && value != '' && mob != ' ' && address != ' ') {
     var dataString = 'title=' + value + '&mob=' + mob + '&address=' + address;
     $.ajax({
     type: 'post',
     url: '<?php echo base_url() ?>family_controllers/namazegs/Namazeg/insert_geha_ajax',
     data: dataString,
     dataType: 'html',
     cache: false,
     success: function (html) {
     $("#myDiv_geha").html(html);
     }
     });
     }

     }
     */
</script>


<script>
    function getTitle(value,val_id) {
        if (value != '') {
            var valu=$('#len').val();
            $('#geha_name'+valu).val(value);
            $('#geha_id_fk'+valu).val(val_id);
            $('#geha_name'+valu).removeAttr('readonly');
            $('#myModalInfo').modal('hide');
        }
    }
</script>
<script>
    function show_add() {
        $('#div_update').hide();
        $('#div_add').show();

    }
</script>
<script>

    function update_geha(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url :"<?php echo base_url() ?>family_controllers/namazegs/Namazeg/getById",
            type : "Post",
            dataType : "html",
            data: {id:id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#geha_title').val(obj.title);
                $('#mob').val(obj.mob);
                $('#address').val(obj.address);
                $('#s_id').val(obj.id);


            }

        });

        $('#update').on('click',function() {
            var geha_title = $('#geha_title').val();
            var address = $('#address').val();
            var mob = $('#mob').val();
            var s_id = $('#s_id').val();

            $.ajax({
                url :"<?php echo base_url() ?>family_controllers/namazegs/Namazeg/update_geha",
                type : "Post",
                dataType : "html",
                data: {geha_title:geha_title,address:address,mob:mob,id:s_id},
                success: function (html) {
                    //  alert('hh');
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);

                    $('#geha_input').hide();

                }

            });

        });

    }
    </script>
<script>
    function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r =  confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/namazegs/Namazeg/delete_geha',
                data:{ id:id},
                dataType: 'html',
                cache:false,
                success: function(html){
                    //   alert(html);
                    $("#myDiv_geha").html(html);

                }
            });
        }

    }
</script>


<script>
    function put_total()
    {
        var sum = 0;
        $('.valu').each(function(){
            if($(this).val()!='') {
                sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
            }
        });
        $('#total').text(sum);
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/GetTotalValueArabic",
            data:{number:sum},
            success:function(d){

         var obj=JSON.parse(d);
               // alert(obj.title);

                    $('#total_arabic').html(obj.title);



            }

        });

    }

</script>

<script>
    function get_fatora_details(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_fatora_details",
            data:{rkm:valu},
            success:function(d){


$('#details').html(d);


            }

        });
    }
</script>
<script>
    function print_order(row_id) {

        var request = $.ajax({
// print_resrv -- print_contract
            url: "<?=base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_fatora_print'?>",
            type: "POST",
            data: {rkm: row_id},
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