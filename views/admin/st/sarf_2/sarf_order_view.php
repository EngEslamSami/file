<style type="text/css">
    ul.nav-tabs {
        background-color: #fff;
        border-bottom: 1px solid #eee;
        box-shadow: -2px 2px 3px 2px #999;
        margin-bottom: 5px;
    }
    .plus-btn{
        padding:6px 5px 5px 5px;
        background-color:green;
        color: #fff;
        border-radius: 50%;
    }
    .plus-btn:hover{
        color: #fff;
        border-radius: 0;
    }
    .bootstrap-select>.btn {
        width: 100%;
        padding-right: 8px;
    }
    a.details{
        padding: 4px;
        background-color: blue;
        color: #fff;
        cursor: pointer;
    }
    .modal-header{
        padding: 6px 5px;
    }
    .modal-header h4{
        color: #00310d;
    }
    .modal-header p{
        color: #555;
        margin-bottom: 0
    }
    .modal-body p{
        color: #555;
        font-size: 16px
    }
    .modal-body p span{
        color: #00310d;
        font-weight: 600
    }
</style>




<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title?></h3>
        </div>
        <div class="panel-body" style="min-height: 300px;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#sarf_orders" aria-controls="reservation_orders" role="tab" data-toggle="tab"> أوامر الصرف الواردة من اللجان</a></li>
                <li role="presentation"><a href="#ezn_sarf" aria-controls="outdoor_orders" role="tab" data-toggle="tab"> إذن الصرف </a></li>
            </ul>

            <?php
            if(isset($get_sarf) && $get_sarf!=null){
                $form = form_open_multipart("reservation/reservation_orders/Orders/Update_orders/".$get_order[0]->reserve_num_fk);
                $value = $get_sarf->ezn_rkm;
                $readonly = 'readonly';
                $submitEdit = 'submit';
                $submitAdd = 'button';
                $ezn_date = $get_sarf->ezn_date_ar;


            } else{

                $form =form_open_multipart("st/sarf/Sarf_order/add_sarf");
                $submitEdit = 'button';
                $submitAdd = 'submit';
                if (isset($ezn_rkm) && $ezn_rkm != 0) {
                    $readonly = 'readonly';
                    $value = $ezn_rkm + 1;
                } else {
                    $readonly = '';
                    $value = '';
                }
                $ezn_date = date('Y-m-d');

            }


            ?>
            <?php echo  $form;?>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="sarf_orders">

                </div>

                <div role="tabpanel" class="tab-pane fade" id="ezn_sarf">

                    <div class="col-x-12">

                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label> رقم إذن الصرف </label>
                            <input type="number" name="ezn_rkm" id="ezn_rkm" value="<?= $value?>"
                                   class="form-control "
                                   data-validation="required"
                                   data-validation-has-keyup-event="true" <?= $readonly?>>
                        </div>
                        <div class="form-group col-md-2 col-sm-6  padding-4">
                            <label>  تاريخ الصرف </label>
                            <input type="date" name="ezn_date" id="ezn_date" value="<?= $ezn_date?>"
                                   class="form-control "
                                   data-validation="required"
                                   data-validation-has-keyup-event="true" >
                        </div>

                        <div class="form-group col-md-3 col-sm-6  padding-4">
                            <label> المستودع</label>
                            <select name="storage_fk"   class="form-control "  data-validation="required" onchange="getCode(this.value)">
                                <option value="" selected>اختر</option>
                                <?php
                                if (isset($storage) && !empty($storage)) {
                                    foreach ($storage as $row) {
                                        ?>
                                        <option value="<?php echo $row->id_setting; ?>"
                                            <?php
                                           // if ($storage_fk==$row->id_setting){
                                           //     echo 'selected';
                                         //   }
                                            ?>
                                        ><?php echo $row->title_setting; ?></option>

                                    <?php }
                                } ?>

                            </select>
                        </div>
                        <div class="form-group col-md-2 col-sm-6  padding-4">
                            <label> رقم  الحساب </label>
                            <input type="number" name="rkm_hesab" id="rkm_hesab" value=""
                                   class="form-control "
                                 readonly>
                        </div>

                        <div class="form-group col-md-3 col-sm-6  padding-4">
                            <label>   اسم الحساب </label>
                            <input type="text" name="hesab_name" id="hesab_name" value=""
                                   class="form-control "
                                 readonly >
                        </div>

                        <div class="form-group col-md-3 col-sm-6">
                            <label>    رقم ملف الأسرة/الجهة </label>
                            <input type="number" name="sarf_to_fk" id="sarf_to_fk" value=""
                                   class="form-control testButton inputclass"
                                   style="cursor:pointer; width:245px;float: right;" autocomplete="off"
                                   ondblclick="$(this).attr('readonly','readonly'); $('#Modal_family').modal('show');"
                                   onblur="$(this).attr('readonly','readonly')"
                                   onkeypress="return isNumberKey(event);"
                                   readonly>
                            <input type="hidden" name="sarf_to_name" id="sarf_to_name" value="">

                            <button type="button" data-toggle="modal" data-target="#Modal_family"
                                    class="btn btn-success btn-next" style="float: right;" >
                                <i class="fa fa-plus"></i></button>
                        </div>

                        <div class="form-group col-md-2 col-sm-6  padding-4">
                            <label> رقم طلب الخدمة </label>
                            <input type="text" name="mostand_rkm" id="mostand_rkm" value=""
                                   class="form-control "
                                   onkeypress="validate_number(event)"
                                  >
                        </div>

                    </div>

                    <div class="col-md-12">

                        <table id="table_anf" class="table-bordered table table-responsive">
                            <thead>
                            <tr class="success">
                                <th>م</th>
                                <th>كود الصنف</th>
                                <th>باركود</th>
                                <th>اسم الصنف</th>
                                <th> الوحدة</th>
                                <th> الرصيد المتاح</th>
                                <th> الكمية</th>
                                <th> سعر الوحدة</th>
                                <th> القيمة الإجمالية</th>
                                <th> تاريخ الصلاحية</th>
                                <th> التشغيلة</th>
                                <th> الرصيد الحالي</th>
                                <th> الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="asnafe_table">
                            <?php
                            $total = 0;
                            if ((isset($get_rasid->details)) && (!empty($get_rasid->details)) && ($get_rasid->details != 0)) {
                                $z = 1;
                                foreach ($get_rasid->details as $sanfe) {
                                    ?>
                                    <tr id="row_<?= $z ?>">
                                        <td><?= $z ?></td>
                                        <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                                                   id="sanf_code<?= $z ?>"
                                                   value="<?= $sanfe->sanf_code ?>"
                                                   ondblclick="$('#myModal').modal('show'); GetDiv_sanfe('myDiv_sanfe',<?= $z ?>)"
                                                   readonly/></td>
                                        <td><input type="text" name="sanf_coade_br[]" class="form-control testButton inputclass"
                                                   id="sanf_coade_br<?= $z ?>"
                                                   value="<?= $sanfe->sanf_coade_br ?>" readonly/></td>
                                        <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                                   id="sanf_name<?= $z ?>"
                                                   value="<?= $sanfe->sanf_name ?>" readonly/></td>
                                        <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                                                   id="sanf_whda<?= $z ?>"
                                                   value="<?= $sanfe->sanf_whda ?>" readonly/></td>
                                        <td><input type="text" name="sanf_rased[]" class="form-control testButton inputclass"
                                                   id="sanf_rased<?= $z ?>"
                                                   value="<?= $sanfe->sanf_amount ?>" readonly/></td>
                                        <td><input type="text" name="sanf_amount[]" oninput="get_total(this,<?= $z ?>)"
                                                   class="form-control testButton inputclass"
                                                   id="sanf_amount<?= $z ?>"
                                                   value="<?= $sanfe->sanf_amount ?>"/></td>
                                        <td><input type="text" name="sanf_one_price[]"
                                                   class="form-control testButton inputclass" id="sanf_one_price<?= $z ?>"
                                                   value="<?= $sanfe->sanf_one_price ?>" readonly/></td>
                                        <td><input type="text" name="all_egmali[]" readonly
                                                   class="form-control testButton inputclass"
                                                   id="all_egmali<?= $z ?>"
                                                   value="<?= $sanfe->all_egmali ?>"/></td>
                                        <td><?php if(!empty($sanfe->sanf_salahia_date_ar)){
                                                $type='date';
                                                $read='';

                                            }else{
                                                $type='text';
                                                $read='readonly';
                                            }  ?>
                                            <input type="<?=$type?>" name="sanf_salahia_date[]"
                                                   class="form-control testButton inputclass" id="sanf_salahia_date<?= $z ?>"
                                                   value="<?= $sanfe->sanf_salahia_date_ar ?>" <?=$read?>/></td>
                                        <td><input type="text" name="lot[]" id="lot<?= $z ?>" value="<?= $sanfe->lot ?>"/></td>
                                        <td><input readonly type="text" name="rased_hali[]" class="form-control testButton inputclass"
                                                   id="rased_hali<?= $z ?>"
                                                   value="<?= $sanfe->rased_hali ?>"/></td>

                                        <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $total = $total + $sanfe->all_egmali;
                                    $z++;
                                }
                            } else { ?>
                                <tr id="row_1">
                                    <td>1</td>
                                    <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                                               id="sanf_code1" value=""
                                               ondblclick="$('#myModal').modal('show'); GetDiv_sanfe('myDiv_sanfe',1)"
                                               readonly/></td>
                                    <td><input type="text" name="sanf_coade_br[]" class="form-control testButton inputclass"
                                               id="sanf_coade_br1" value="" readonly/></td>
                                    <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                               id="sanf_name1" value="" readonly/></td>
                                    <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                                               id="sanf_whda1" value="" readonly/></td>
                                    <td><input type="text" name="sanf_rased[]" class="form-control testButton inputclass"
                                               id="sanf_rased1" value="" readonly/></td>
                                    <td><input type="text" name="sanf_amount[]" oninput="get_total(this,1)"
                                               class="form-control testButton inputclass"
                                               id="sanf_amount1" value=""/></td>
                                    <td><input type="text" name="sanf_one_price[]" class="form-control testButton inputclass"
                                               id="sanf_one_price1" value="" readonly/></td>
                                    <td><input type="text" name="all_egmali[]" readonly
                                               class="form-control testButton inputclass"
                                               id="all_egmali1" value=""/></td>
                                    <td><input type="text" name="sanf_salahia_date[]" class="form-control testButton inputclass"
                                               id="sanf_salahia_date1" value=""/></td>
                                    <td><input type="text" name="lot[]" class="form-control testButton inputclass" id="lot1"
                                               value=""/></td>
                                    <td><input readonly type="text" name="rased_hali[]" class="form-control testButton inputclass"
                                               id="rased_hali1" value=""/></td>

                                    <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="8" class="text-center"> <strong> الإجمالي </strong></th>
                                <th colspan="4" ><input class="form-control" id="total" name="all_value" value="<?= $total ?>" readonly></th>
                                <th>
                                    <button type="button" onclick="add_row_sanfe()" class="btn-success btn"><i
                                            class="fa fa-plus"></i>
                                    </button>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>



                    <div class="col-xs-12 text-center">

                        <button type="<?=$submitAdd?>"  class="btn btn-labeled btn-success " name="save" value="save"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                        <button type="<?= $submitEdit ?>"  class="btn btn-labeled btn-warning" style="background-color: #FFB61E;border-color:#FFB61E"
                                name="edit" value="edit">
                            <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                        </button>

                                <button type="button" class="btn btn-labeled btn-danger ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                                </button>

                            <button type="button" class="btn btn-labeled btn-purple">
                                <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                            </button>


                        <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#searchModal"  data-toggle="modal" >
                            <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                        </button>


                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="clearfix"></div>

                    <?php
                    if (isset($all_sarf) && !empty($all_sarf)){
                        $x=1;
                        ?>

                    <div class="col-xs-12">
                        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                            <div class="panel-heading">
                                <h3 class="panel-title">إذن الصرف</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">

                                    <table  class="table-bordered table table-responsive example">
                                        <thead>
                                        <th>م</th>
                                        <th>رقم إذن الصرف</th>
                                        <th>تاريخ الصرف</th>
                                        <th>المستودع</th>
                                        <th>الإسم</th>
                                        <th>التفاصيل</th>
                                        <th>الإجراء</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($all_sarf as $all){
                                            ?>
                                            <tr>
                                                <td><?= $x++?></td>
                                                <td><?= $all->ezn_rkm?></td>
                                                <td><?= $all->ezn_date_ar?></td>
                                                <td><?= $all->storage_name?></td>
                                                <td><?= $all->sarf_to_name?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal" onclick="load_page(<?= $all->id?>);">التفاصيل</button>

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

                                                        window.location="<?php echo base_url(); ?>st/sarf/Sarf_order/update_sarf/<?php echo $all->id; ?>";
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
                                                        window.location="<?= base_url()."st/sarf/Sarf_order/Delete_sarf/".$all->id ?>";
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


                </div>
            </div>


        </div>
    </div>
</div>

<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل   </h4>
            </div>
            <div class="modal-body" id="details_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php


                ?>
                <button
                    type="button"
                    onclick="print_sarf(document.getElementById('sarf_id').value)"
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
<!-- Details Modal -->
 <!--  Modal_Family -->
<div class="modal fade" id="Modal_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> رقم ملف الأسرة/الجهة </h4>
            </div>
            <div class="modal-body">
                <div >

                        <input type="radio" id="radio_one" name="sarf_type" style="margin-right: 15px" value="1" onclick="radio_check()">
                        <label for="radio_one"> أسر </label>

                         <input type="radio" id="radio_two" name="sarf_type" style="margin-right: 15px" value="2" onclick="radio_check()">
                        <label for="radio_two"> جهات </label>

                </div>
                <div id="family_show" style="display: none;">
                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">#</th>
                        <th style="font-size: 15px;" class="text-left">رقم الملف</th>
                        <th style="font-size: 15px;" class="text-left">إسم رب الأسرة</th>
                        <th style="font-size: 15px;" class="text-left">  عدد المستفيدين</th>
                        <th style="font-size: 15px;" class="text-left"> الفئة</th>
                        <th style="font-size: 15px;" class="text-left"> تاريخ آخر مساعدة</th>
                        <th style="font-size: 15px;" class="text-left">  رقم طلب الخدمة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($family)&& !empty($family)){

                        foreach ($family as $row){
                            ?>
                            <tr ondblclick="get_geha(<?= $row->file_num?>,'<?= $row->father_full_name?>')">
                                <td ondblclick="get_geha(<?= $row->file_num?>,'<?= $row->father_full_name?>')">
                                    <input name="f_rkm" type="radio" value=""  >
                                </td>
                                <td><?= $row->file_num?></td>
                                <td><?= $row->father_full_name?></td>
                                <td><?= $row->mosatfed_num?></td>
                                <td>
                                    <?php
                                    if(!empty($row->nasebElfard)){
                                        $color ='';
                                        if(!empty($row->nasebElfard['f2a']->color)){
                                            $color =$row->nasebElfard['f2a']->color;
                                        }

                                        $title ='';
                                        if(!empty($row->nasebElfard['f2a']->title)){
                                            $title =$row->nasebElfard['f2a']->title;
                                        }
                                        ?>
                                        <span title="نصيب الفرد = <?= round($row->nasebElfard['naseb'])?>"
                                              class="label label-pill"
                                              style="color:black ;border-radius: 4px;vertical-align: middle;padding-top: 5px;font-size: 14px;background-color: <?= $color?>">
                                        <?= $title?>
                                    </span>
                                        <?php

                                    } else{
                                        ?>
                                        <span title="ريال 0" class="label label-pill" style="color:black ;
                    border-radius: 4px;vertical-align: middle;padding-top: 5px; font-size: 14px;
                    background-color:#62bd0f">
                                           أ
                                        </span>
                                        <?php
                                    }
                                    ?>

                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        }  }
                    ?>

                    </tbody>
                </table>

                </div>

                <div  id="geha_show" style="display: none;">

                    <table id="" class="table table-bordered example" role="table">
                        <thead>
                        <tr class="info">
                            <th style="font-size: 15px; width:88px !important; ">م</th>
                            <th style="font-size: 15px;" class="text-left">اسم الجهة</th>
                            <th style="font-size: 15px;" class="text-left"> تاريخ آخر مساعدة</th>
                            <th style="font-size: 15px;" class="text-left">  رقم المستند / الخطاب </th>
                        </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<?php
form_close();
?>
 <!--  Modal_Family -->

<!--Asnaf Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> الأصناف </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_sanfe"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!--Asnaf Modal -->

<script>
    function radio_check() {
        $('input[name="sarf_type"]').change(function(){
            if($('#radio_one').prop('checked')){

                $('#geha_show').hide();
                $('#family_show').show();

            }else if ($('#radio_two').prop('checked')) {

                $('#family_show').hide();
                $('#geha_show').show();
            }
        });

    }
</script>

<script>

    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;
        document.getElementById('motbr3_jwal').value = mob;
        document.getElementById('motbr3_id_fk').value = id;

        $("#myModalInfo .close").click();

    }

    function Get_sanfe_Name(obj, id) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var code = obj.dataset.code;
        var code_br = obj.dataset.code_br;
        var whda = obj.dataset.whda;
        var price = obj.dataset.price;
        var slahia = obj.dataset.slahia;
        var sanf_rased = parseFloat(obj.dataset.all_rased);
        if (parseInt(slahia) == 1) {
            document.getElementById('sanf_salahia_date' + id).type = 'date';
        } else {
            document.getElementById('sanf_salahia_date' + id).type = 'text';
            $('#sanf_salahia_date' + id).attr('readonly','readonly');
            $('#sanf_salahia_date' + id).val('');

        }
        document.getElementById('sanf_name' + id).value = name;
        document.getElementById('sanf_code' + id).value = code;
        document.getElementById('sanf_coade_br' + id).value = code_br;
        document.getElementById('sanf_whda' + id).value = whda;
        document.getElementById('sanf_one_price' + id).value = price;
        document.getElementById('sanf_rased' + id).value = sanf_rased;

        $("#myModal .close").click();

    }

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_code[]" id="sanf_code' + (len + 1) + '" value=""  ondblclick="$(\'#myModal\').modal(\'show\'); GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ')" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_coade_br[]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_name[]" id="sanf_name' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_whda[]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_rased[]" id="sanf_rased' + (len + 1) + '" value="" readonly /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_amount[]" oninput="get_total(this,' + (len + 1) + ')" id="sanf_amount' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_one_price[]" id="sanf_one_price' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="lot[]" id="lot' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input readonly type="text" class="form-control testButton inputclass" name="rased_hali[]" id="rased_hali' + (len + 1) + '" value="" /></td>\n' +
            '\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }

    function get_details_sanf(id) {
        var request = $.ajax({
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/get_detailes'?>",
            type: "POST",
            data: {id: id}
        });
        request.done(function (msg) {
            //   alert(msg);
            var obj = JSON.parse(msg);
            if ( obj.tabr3.type_ezn==1) {
                var type="تبرعات عينية";

            }

            document.getElementById('ezn_rkm_pop').innerText = obj.tabr3.ezn_rkm;
            document.getElementById('type_ezn').innerHTML ='<strong>' + type + '</strong>';
            document.getElementById('ezn_rkm_pop_h').value = obj.tabr3.ezn_rkm;
            document.getElementById('ezn_date_ar_pop').innerText = obj.tabr3.ezn_date_ar;
            document.getElementById('all_value_pop').innerText = obj.tabr3.all_value;
            document.getElementById('ezn_date_ar_pop').innerText = obj.tabr3.ezn_date_ar;
            document.getElementById('fe2a_pop').innerText = obj.fe2a_title;
            document.getElementById('geha_jwal_pop').innerText = obj.tabr3.geha_jwal;
            document.getElementById('geha_name_pop').innerText = obj.tabr3.geha_name;
            document.getElementById('hesab_name_pop').innerText = obj.tabr3.hesab_name;
            document.getElementById('last_tabro3_date_ar_pop').innerText = obj.tabr3.last_tabro3_date_ar;
            document.getElementById('mostand_date_ar_pop').innerText = obj.tabr3.mostand_date_ar;
            document.getElementById('mostand_rkm_pop').innerText = obj.tabr3.mostand_rkm;
            document.getElementById('motbr3_jwal_pop').innerText = obj.tabr3.person_jwal;
            document.getElementById('motbr3_name_pop').innerText = obj.tabr3.person_name;
            document.getElementById('no3_tabro3_pop').innerText = obj.no3_tabro3_title;
            document.getElementById('band_pop').innerText = obj.band_title;
            document.getElementById('rkm_hesab_pop').innerText = obj.tabr3.rkm_hesab;
            document.getElementById('storage_name_pop').innerText = obj.tabr3.storage_name;

            if (obj.asnaf === 0) {
                document.getElementById('orders_details').style.display = 'none';
            } else {

                delete_table();
                document.getElementById('orders_details').style.display = 'inline-table';
                var total_pop = 0;
                for (var i = 0; i < obj.asnaf.length; i++) {
                    console.log('sanf_amount : ' + parseInt(obj.asnaf[i].sanf_amount));
                    total_pop = total_pop + parseFloat(obj.asnaf[i].all_egmali);
                    var row_html = ' <tr>\n' +
                        '                            <td >' + (i + 1) + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_code + ' </td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_coade_br + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_name + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_whda + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_rased) + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_amount) + ' </td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_one_price) + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].all_egmali) + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_salahia_date_ar + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].lot + '</td>\n' +
                        '                            <td >' + parseInt(obj.asnaf[i].rased_hali) + '</td>\n' +
                        '                        </tr>';
                    $('#orders_details_body').append(row_html);

                }

                $('#total_pop').text(total_pop);

            }


        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

    function delete_table() {
        var table = document.getElementById('orders_details_body');
        var len = table.rows.length;
        console.log('lenthg  table : ' + len);
        $("#orders_details_body").find("tr").remove();


    }
</script>


<script>

    function GetDiv_sanfe(div, row_id) {
        html = '<div class="col-md-12"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الصنف </th><th style="width: 170px;" >أسم الصنف  </th><th style="width: 170px;" >الوحدة</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/rasid_ayni/Rasid_ayni/getConnection2/' + row_id,

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }

</script>

<script>
    function get_total(amount, id) {
        console.log('amount :' + amount.value + " all_egmali: " + parseFloat($('#sanf_one_price' + id).val()));
        var sanf_rased = (parseFloat($('#sanf_rased' + id).val()));
        // if (amount.value <= sanf_rased) {
        $('#all_egmali' + id).val((amount.value * parseFloat($('#sanf_one_price' + id).val())));
        $('#rased_hali' + id).val(parseFloat(sanf_rased) + parseFloat(amount.value));
        set_sum();
    }

    function set_sum() {
        var all_egmali = document.getElementsByName('all_egmali[]');
        var sum = 0;
        for (var i = 0; i < all_egmali.length; i++) {
            sum = sum + parseFloat(all_egmali[i].value);
        }
        console.log('sum :' + sum);
        if ( isNaN(sum)){

        } else{
            $('#total').val(sum);
        }

    }
</script>

<script>
    function getCode(id) {
        var dataString = 'id=' + id;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/sarf/Sarf_order/get_code',
            data: dataString,
            dataType: 'html',

            cache: false,
            success: function (html) {
              //  alert(html);
                if(html==0){
                    swal({
                        title: "من فضلك راجع بيانات المستودع",
                        type: "warning",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false
                    });
                } else{
                    arr = JSON.parse(html);

                    $('#rkm_hesab').val(arr.rkm_hesab);
                    $('#hesab_name').val(arr.hesab_name);
                }



            }
        });

    }
</script>

<script>
    function get_geha(sarf_to_fk,sarf_to_name) {

       $('#sarf_to_name').val(sarf_to_name);
       $('#sarf_to_fk').val(sarf_to_fk);
        $('#Modal_family').modal('hide');

    }


</script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/sarf/Sarf_order/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>


<script>
    function print_sarf(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url().'st/sarf/Sarf_order/Print_sarf'?>",
            type: "POST",
            data: {row_id: row_id},
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