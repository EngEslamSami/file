<div class="col-md-12">

    <?php echo form_open_multipart(base_url() . 'st/esalat/Esalat_estlam/add_attach') ?>
    <div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr class="info">
                <th colspan="2" style="text-align: center;">مرفقات</th>

            </tr>

            </thead>
            <tbody id="morfq_table">
            <?php
            if ((isset($result)) && !empty($result)) {


                $esal_id = $result->id;

                if ((isset($result->attaches)) && !empty($result->attaches)) {
                    $z = 1;

                    foreach ($result->attaches as $attach) {
                        ?>
                        <tr id="row_<?= $z ?>">

                            <td style="width: 80%"  >
                                <?php
                                $ext = pathinfo($attach->morfaq, PATHINFO_EXTENSION);
                                $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                                if (in_array($ext, $image)) {
                                    ?>
                                    <a data-toggle="modal"
                                       onclick="$('#img_morfaq').attr('src','<?= base_url() . "uploads/st/esalat_estlam/" . $attach->morfaq ?>')"
                                       data-target="#myModal-view">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>

                                    <?php
                                } elseif (in_array($ext, $file)) {
                                    ?>
                                    <a target="_blank"
                                       href="<?= base_url() . "st/esalat/Esalat_estlam/read_file/" . $attach->morfaq ?>">
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
                                        delete_my_morfaq($("#row_<?= $z ?>"),<?= $attach->id ?>);
                                        });'>
                                    <i class="fa fa-trash"> </i></a>

                            </td>

                            <!--                                                                    window.location="<?= base_url() . "st/esalat/Esalat_estlam/delete_attach/" . $attach->id . '/' . $esal_id ?>";
-->
                        </tr>
                        <?php
                        $z++;
                    }
                }
            } else { ?>
                <tr id="row_1" style="width: 80%">

                    <td><input type="file" name="morfaq[]"
                               class="form-control testButton inputclass"
                               id="morfaq1" value=""

                        /></td>


                    <td  style="width: 10%"><a id="1" onclick=" $(this).closest('tr').remove();"><i
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
    </div>
    <input type="hidden" name="esal_id" id="esal_id_morfaq" value="<?= $result->id ?>">
    <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>

    <?php echo form_close() ?>
</div>


<!-- modal view -->
<!-- modal view -->
