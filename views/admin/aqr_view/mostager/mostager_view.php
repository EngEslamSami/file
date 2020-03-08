
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body">
            <?php
            if (isset($get_mostager) && !empty($get_mostager)){
                echo form_open_multipart('aqr/mostager/Mostager/update_mostager/'.$get_mostager->id);
                $rkm = $get_mostager->rkm;
                $aname = $get_mostager->aname;
                $gensia_fk = $get_mostager->gensia_fk;
                $national_card = $get_mostager->national_card;
                $national_card_date_m = $get_mostager->national_card_date_m;
                $national_card_date_h = $get_mostager->national_card_date_h;
                $masdar_national_card = $get_mostager->masdar_national_card;
                $jwal = $get_mostager->jwal;
                $another_jwal = $get_mostager->another_jwal;
                $wazefa = $get_mostager->wazefa;
                $maqr_amal = $get_mostager->maqr_amal;
            } else{
                echo form_open_multipart('aqr/mostager/Mostager/add_mostager');
                $rkm = $rkm_m +1;
                $aname = '';
                $gensia_fk = '';
                $national_card ='';
                $national_card_date_m = '';
                $national_card_date_h = '';
                $masdar_national_card = '';
                $jwal = '';
                $another_jwal = '';
                $wazefa = '';
                $maqr_amal = '';
            }
            ?>
            <div class="col-xs-12 no-padding">
                <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> رقم المستأجر </label>
                    <input type="text" name="rkm"
                           value="<?= $rkm ?>"
                           class="form-control  " readonly  >

                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                    <label class="label">  اسم المستأجر</label>
                    <input type="text" name="aname"
                           value="<?= $aname ?>"
                           class="form-control  "    data-validation="required">


                </div>
                <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                    <label class="label">   الجنسية</label>
                    <select  name="gensia_fk"
                             class="form-control selectpicker " data-show-subtext="true" data-live-search="true" >
                        <?php
                        $gnsia_arr = array('1'=>'ذكر','2'=>'أنثي')
                        ?>
                        <option value="">اختر</option>
                        <?php
                        foreach ($gnsia_arr as $key=>$value){
                            ?>
                            <option value="<?= $key?>" <?php
                            if ($gensia_fk== $key){
                                echo 'selected';
                            }
                            ?>><?= $value?></option>
                        <?php
                        }
                        ?>

                    </select>

                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">  رقم الهوية</label>
                    <input type="text" name="national_card"
                           onkeyup=" check_card($(this).val(),'hint');"
                           maxlength="10"
                           value="<?= $national_card ?>"
                           onkeypress="validate_number(event);"
                           class="form-control "   data-validation="required">
                    <small id="hint" class="myspan" style="color: red;"></small>

                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">

                    <label class="label text-center">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                        تاريخ الهوية
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    </label>

                    <div id="cal-2" style="width: 50%;float: right;">
                        <input id="date-Hijri" name="national_card_date_h" class="form-control bottom-input "
                               type="text" onfocus="showCal2();" value="<?php echo $national_card_date_h; ?>"
                               style=" width: 100%;float: right"/>

                    </div>


                    <div id="cal-1" style="width: 50%;float: left;">
                        <input id="date-Miladi" name="national_card_date_m" class="form-control bottom-input  "
                               value="<?php echo $national_card_date_m; ?>"
                               type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>

                    </div>
                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">  مصدر الهوية</label>
                    <select  name="masdar_national_card"
                             class="form-control selectpicker " data-show-subtext="true" data-live-search="true"  >
                        <option value="">اختر</option>
                        <?php
                        if (isset($national_source)&& !empty($national_source)){
                        foreach ($national_source as $value){
                            ?>
                            <option value="<?= $value->id_setting?>"
                                <?php
                                if ($masdar_national_card== $value->id_setting){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value->title_setting?></option>
                            <?php
                        } }
                        ?>

                    </select>


                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">  رقم الجوال</label>
                    <input type="text" name="jwal" maxlength="10"
                           data-validation="required"  value="<?php echo $jwal; ?>"
                           class="form-control "
                     onkeypress="validate_number(event);">

                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">   رقم جوال اخر</label>
                    <input type="text" name="another_jwal" maxlength="10"
                        value="<?php echo $another_jwal; ?>"
                           class="form-control "
                         onkeypress="validate_number(event);">
                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">   الوظيفة</label>
                    <input type="text" name="wazefa"
                           value="<?= $wazefa ?>"
                           class="form-control  "  >


                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">   مقر العمل</label>
                    <input type="text" name="maqr_amal"
                           value="<?= $maqr_amal ?>"
                           class="form-control  "  >


                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                    <label class="label">    صورة</label>
                    <input type="file" name="img"
                           class="form-control"  >
                    <?php
                    if (isset($get_mostager->img)&& !empty($get_mostager->img)){
                        ?>
                        <a data-toggle="modal" data-target="#myModal-view-<?= $get_mostager->id ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <!-- modal view -->
                        <div class="modal fade" id="myModal-view-<?= $get_mostager->id ?>" tabindex="-1"
                             role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?= base_url()."uploads/aqr/".$get_mostager->img ?>"
                                             width="100%">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal view -->
                    <?php
                    }
                    ?>


                </div>
            </div>
            <div class="col-cs-12 text-center">
                <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add" id="add"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
<?php
if (isset($get_all)&& !empty($get_all)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title"><?php echo $title ; ?></h4>

            </div>
            <div class="panel-body" style="min-height: 300px;">
                <div class="col-xs-12">
                    <table id="example" class="table  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th> رقم المستأجر</th>
                            <th>اسم المستأجر</th>
                            <th>رقم الهوية</th>
                            <th>رقم الجوال</th>
                            <th>التفاصيل </th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($get_all as $all){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $all->rkm?></td>
                                <td ><?= $all->aname?></td>
                                <td ><?php if (!empty($all->national_card)){ echo $all->national_card;}else{ echo 'غير محدد' ;}?></td>
                                <td ><?php if (!empty($all->jwal)){ echo $all->jwal;}else{ echo 'غير محدد' ;}?></td>

                                <td>
                                  <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $all->id?>);">
                                        <i class="fa fa-list "></i></a>
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

                                        window.location="<?php echo base_url().'aqr/mostager/Mostager/update_mostager/'.$all->id  ?>";
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
                                        window.location="<?= base_url()."aqr/mostager/Mostager/delete_mostager/".$all->id?>";
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
<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                    type="button" onclick="print_mostager(document.getElementById('mostager_id').value);"
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

<!-- detailsModal -->

<script>
    function check_card(value,span_id) {
        var value = value;
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>aqr/mostager/Mostager/check_national_card",
            data: {value:value},
            success: function (d) {
                if (d !=0){
                    document.getElementById("add").setAttribute("disabled", "disabled");
                    document.getElementById("" + span_id).innerHTML = 'عفوا.. رقم الهوية موجود بالفعل !';

                }
                else{
                    document.getElementById("add").removeAttribute("disabled", "disabled");
                    document.getElementById("" + span_id).innerHTML = '';


                }


            }

        });





    }
</script>
<!--  -->
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop1 = 0;
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value", cal1.getDate().getDateString());
    date2.setAttribute("value", cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        if (loop1 === 0) {
            <?php if (isset($get_mostager) && !empty($get_mostager)) {  ?>
            loop1++;
            date1.value = '<?=$get_mostager->national_card_date_m?>';
            date2.value = '<?=$get_mostager->national_card_date_h?>';
            <?php }else{ ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();

            <?php  } ?>
        } else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();

        }
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
    }


    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }


</script>
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>aqr/mostager/Mostager/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>

<script>
    function print_mostager(row_id) {

        var request = $.ajax({

            url: "<?=base_url().'aqr/mostager/Mostager/print_mostager'?>",
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

