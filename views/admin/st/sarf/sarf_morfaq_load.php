<div class="col-md-12">

    <?php echo form_open_multipart(base_url() . 'st/sarf/Sarf_order/add_attach') ?>
    <div>
        <input type="hidden" name="set" id="" value=<?= $id ?>/>
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr class="info">
                <th colspan="2" style="text-align: center;">مرفقات</th>

            </tr>

            </thead>
            <tbody id="morfq_table">

            <?php
           // echo '<pre>';
           // print_r($get_supplier);
            if (isset($get_supplier->morfqat) && !empty($get_supplier->morfqat)) {
                // $x=1;
                $z = 1;
                foreach ($get_supplier->morfqat as $m) 
                    {
                        ?>
                        <tr id="row_<?= $z ?>">

                            <td style="width: 80%"  >
                                <?php
                    //   $x++;
                    $ext = pathinfo($m->file, PATHINFO_EXTENSION);
                    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');

                    ?>
                    <!--  <input class="form-control"  type="file" name="morfaq[]"  value="" > -->

                    <?php
                    if (in_array($ext, $image)) {
                        ?>
                        <!-- <a data-toggle="modal" data-target="#myModal-view-<?= $m->id ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a> -->
                            <a data-toggle="modal"
                                       onclick="$('#img_morfaq').attr('src','<?= base_url() . "uploads/st/sarf/" . $m->file ?>')"
                                       data-target="#myModal-view">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <?php

                    } elseif (in_array($ext, $file)) {
                        ?>
                        <?php
                        ?>
                        <a target="_blank" href="<?= base_url() . "st/sarf/Sarf_order/read_file/" . $m->file ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <?php
                    }
                    ?>
                     </td>


<td style="width: 10%">
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
            delete_my_morfaq($("#row_<?= $z ?>"),<?= $m->id ?>);
            });'>
        <i class="fa fa-trash"> </i></a>

</td>

<!--                                                                    window.location="<?= base_url() . "st/esalat/Esalat_estlam/delete_attach/" . $attach->id . '/' . $esal_id ?>";
-->
</tr>
<?php
$z++;



 }
            } else {
                ?>
                <tr id="row_1">
                    <!-- <td><input type="input" name="title[]" id="title" class="form-control" data-validation="reuqired">
                    </td> -->
                    <td><input type="file" name="file[]"
                               class="form-control testButton inputclass"
                               id="file" value=""

                        /></td>


                    <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                                    class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr class="">
                <th colspan="1"></th>
                <th>
                    <button type="button" onclick="add_row()" class="btn-success btn"><i
                                class="fa fa-plus"></i>
                    </button>
                </th>
            </tr>
            </tfoot>
        </table>

        <button type="submit" class="btn btn-success" style="display: inline-block;padding: 6px 12px;"

                name="save" value="save" id="saves">حفظ
        </button>
    </div>
    <?php echo form_close() ?>

</div>

                