
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <?php
            if (isset($get_aqar) && !empty($get_aqar)){
                echo form_open_multipart('aqr/akarat/Akarat/update_akar/'.$get_aqar->id);
                $aname = $get_aqar->aname;
                $ttype_fk = $get_aqar->ttype_fk;
                $notes = $get_aqar->notes;
            } else{
                echo form_open_multipart('aqr/akarat/Akarat/add_akar');
                $aname = '';
                $ttype_fk = '';
                $notes = '';
            }
            ?>
            <div class="col-xs-12 no-padding">
                <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                    <label class="label">اسم العقار </label>
                    <input type="text" name="aname"
                           value="<?= $aname?>"
                           class="form-control  "  data-validation="required">

                </div>
                <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                    <label class="label">نوع العقار (الوحدة)</label>
                    <select  name="ttype_fk"
                           class="form-control selectpicker " data-show-subtext="true" data-live-search="true" data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($aqart)&& !empty($aqart)){
                            foreach ($aqart as $aqr){
                                ?>
                                <option value="<?= $aqr->id_setting?>" <?php
                                if ($ttype_fk== $aqr->id_setting){
                                    echo 'selected';
                                }
                                ?>> <?= $aqr->title_setting?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-5 col-sm-6 col-xs-12 padding-4">
                    <label class="label"> ملاحظات</label>
                    <textarea  name="notes"
                           value="" style="height: 34px"
                              class="form-control  " ><?= $notes?></textarea>

                </div>

            <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   style="margin-top: 30px ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

            </div>
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
        <h4 class="panel-title"><?php echo "العقارات" ; ?></h4>

    </div>
    <div class="panel-body" style="min-height: 300px;">
        <div class="col-xs-12">
            <table id="example" class="table  table-bordered table-striped table-hover">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>اسم العقار</th>
                    <th>نوع العقار</th>
                    <th>تفاصيل</th>
                    <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($get_all as $all){
                    ?>
                    <tr>
                        <td><?= $x++?></td>
                        <td><?= $all->aname?></td>
                        <td style="background-color: <?= $all->color?>"><?= $all->ttype?></td>
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

                                window.location="<?php echo base_url().'aqr/akarat/Akarat/update_akar/'.$all->id  ?>";
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
                                window.location="<?= base_url()."aqr/akarat/Akarat/delete_akar/" . $all->id?>";
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
                        type="button" onclick="print_aqr(document.getElementById('aqr_id').value);"
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
            url: "<?php echo base_url();?>aqr/akarat/Akarat/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>

<script>
    function print_aqr(row_id) {

        var request = $.ajax({

            url: "<?=base_url().'aqr/akarat/Akarat/Print_aqr'?>",
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
