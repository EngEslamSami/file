
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <?php
            if (isset($get_whda) && !empty($get_whda)){
                echo form_open_multipart('aqr/whdat/Whdat/update_whda/'.$get_whda->id);
                $whda_rkm = $get_whda->whda_rkm;
                $whda_type_fk = $get_whda->whda_type_fk;
                $to_akar_fk = $get_whda->to_akar_fk;
                $halt_whda_fk = $get_whda->halt_whda_fk;
                $note = $get_whda->note;
                $maugod = $get_whda->maugod;
            } else{
                echo form_open_multipart('aqr/whdat/Whdat/add_whda');
                $whda_rkm = $rkm_whda +1;
                $whda_type_fk = '';
                $to_akar_fk = '';
                $halt_whda_fk = '';
                $note = '';
                $maugod = '';
            }
            ?>
            <div class="col-xs-12 no-padding">
                <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                    <label class="label"> رقم الوحدة </label>
                    <input type="text" name="whda_rkm"
                           value="<?= $whda_rkm?>"
                           class="form-control  " readonly   data-validation="required">

                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">نوع  الوحدة</label>
                    <select  name="whda_type_fk"
                             class="form-control selectpicker " data-show-subtext="true" data-live-search="true" data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($whdat_type)&& !empty($whdat_type)){
                            foreach ($whdat_type as $whda){
                                ?>
                                <option value="<?= $whda->id_setting?>" <?php
                                if ($whda_type_fk== $whda->id_setting){
                                    echo 'selected';
                                }
                                ?>> <?= $whda->title_setting?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">  تابع لعقار</label>
                    <select  name="to_akar_fk"
                             class="form-control selectpicker " data-show-subtext="true" data-live-search="true" data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($aqart)&& !empty($aqart)){
                            foreach ($aqart as $aqr){
                                ?>
                                <option value="<?= $aqr->id?>" <?php
                                if ($to_akar_fk== $aqr->id){
                                    echo 'selected';
                                }
                                ?>> <?= $aqr->aname?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">  حالة الوحدة</label>
                    <select  name="halt_whda_fk"
                             class="form-control selectpicker " data-show-subtext="true" data-live-search="true" data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($whdat_7ala)&& !empty($whdat_7ala)){
                            foreach ($whdat_7ala as $hala){
                                ?>
                                <option value="<?= $hala->id_setting?>" <?php
                                if ($halt_whda_fk== $hala->id_setting){
                                    echo 'selected';
                                }
                                ?>> <?= $hala->title_setting?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> مواصفات الوحدة</label>
                    <textarea  name="note"
                               value="" style="height: 34px"
                               class="form-control  " ><?= $note?></textarea>

                </div>
                <div class="form-group col-md-5 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> محتويات الوحدة</label>
                    <textarea  name="maugod"
                               value="" style="height: 34px"
                               class="form-control  " ><?= $maugod?></textarea>

                </div>
            </div>
            <div class="col-cs-12 text-center">
                <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
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
                            <th> رقم الوحدة</th>
                            <th>نوع الوحدة</th>
                            <th> تابع لعقار</th>
                            <th>حالة الوحدة</th>
                            <th>تفاصيل الوحدة</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($get_all as $all){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $all->whda_rkm?></td>
                                <td style="background-color: <?= $all->no3_color?>"><?= $all->whda_type_n?></td>
                                <td ><?= $all->to_akar_n?></td>
                                <td style="background-color: <?= $all->color_7ala?>"><?= $all->halt_whda_n?></td>
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

                                        window.location="<?php echo base_url().'aqr/whdat/Whdat/update_whda/'.$all->id  ?>";
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
                                        window.location="<?= base_url()."aqr/whdat/Whdat/delete_whda/" . $all->id?>";
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
                    type="button" onclick="print_whda(document.getElementById('whda_id').value);"
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
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>aqr/whdat/Whdat/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>

<script>
    function print_whda(row_id) {

        var request = $.ajax({

            url: "<?=base_url().'aqr/whdat/Whdat/Print_whda'?>",
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

