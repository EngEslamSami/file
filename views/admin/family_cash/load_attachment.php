<div class="col-sm-12">

    <?php echo form_open_multipart("FamilyCashing/SarfAttachments/" . $sarf_num_fk_attach); ?>
    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">إسم المرفق</th>
            <th class="text-center">المرفق</th>
            <th class="text-center"> الإجراء</th>
        </tr>
        </thead>
        <tbody class="text-center" id="body_attach">
        <?php if (isset($gals_attachments) && !empty($gals_attachments)) { ?>
            <tr>
                <td colspan="2" class="text-left">محضر الجلسة</td>
                <td>
                    <?php
                    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                    $ext = pathinfo($gals_attachments, PATHINFO_EXTENSION);
                    if (in_array($ext, $image)) {
                        ?>
                        <img src="<?= base_url() . "uploads/files/" . $gals_attachments ?>" class=""
                             width="100" height="100">
                        <?php
                    } else if (in_array($ext, $file)) {
                        ?>
                        <a target="_blank"
                           href="<?= base_url() . "family_controllers/LagnaSetting/my_read_file/" . $gals_attachments ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <?php
                    }
                    ?>
                    <a target="_blank"
                       href="<?= base_url() . "family_controllers/LagnaSetting/my_download/" . $gals_attachments ?>">
                        <i class="fa fa-download" title="تحميل"></i> </a>

                </td>
            </tr>

            <?php
        } ?>
        <?php if (isset($sarf_attachments) && !empty($sarf_attachments)) {
            foreach ($sarf_attachments as $row) { ?>
                <tr>
                    <td><?= $row->attachment_title ?></td>
                    <td>
                        <?php
                        $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                        $ext = pathinfo($row->attachment, PATHINFO_EXTENSION);
                        if (in_array($ext, $image)) {
                            ?>
                            <img src="<?= base_url() . "uploads/files/sarf_attaches/" . $row->attachment.'/'.$ext ?>" class=""
                                 width="100" height="100">
                            <?php
                        } else if (in_array($ext, $file)) {
                            ?>
                            <a target="_blank" href="<?= base_url() . "FamilyCashing/read_file/" . $row->attachment.'/'.$ext ?>">
                                <i class="fa fa-eye fa-2x" title=" قراءة"></i> </a>
                            <?php
                        }
                        ?>
                        <a href="<?= base_url() . "FamilyCashing/download_sarf/" . $row->attachment ?>">
                            <i class="fa fa-cloud-download fa-2x" title="تحميل" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>

                        <a onclick="delete_attach(this,'<?= $row->id ?>');">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                        <i class="fa fa-plus-square" aria-hidden="true" onclick="get_row_attach();"></i>
                    </td>
                </tr>
            <?php } ?>
        <?php } else {
            ?>
            <tr>
                <td><input type="text" name="attachment_title[]" class="form-control" data-validation="required"></td>
                <td><input onchange="dis()" type="file" name="attachment[]" class="form-control"
                           data-validation="required"></td>
                <td><a href="" onclick="$(this).parents(\'tr\').remove();"> <i class="fa fa-trash"
                                                                               aria-hidden="true"></i></a>
                    <i class="fa fa-plus-square" aria-hidden="true" onclick="get_row_attach();"></i>
                </td>
            </tr>
            <?php
        } ?>
        </tbody>
    </table>
    <button type="submit" name="Add_Attach" value="Add_Attach" id="Add_Attach" disabled="disabled"
            class="btn btn-success"> حفظ
    </button>
    <?php echo form_close() ?>
</div>
<script>
    function dis() {
        $('#Add_Attach').removeAttr("disabled");
    }
</script>

<script>
    function get_row_attach() {

        var html = '<tr>' +
            '<td> <input type="text" name="attachment_title[]" class="form-control" data-validation="required"></td>' +
            '<td><input onchange="dis()" type="file" name="attachment[]" class="form-control" data-validation="required"> </td>' +
            '<td> <a href="" onclick="$(this).parents(\'tr\').remove();"> <i class="fa fa-trash" aria-hidden="true"></i></a> ' +
            '<i class="fa fa-plus-square" aria-hidden="true" onclick="get_row_attach();"></i></td>' +
            '</tr> ';
        $("#body_attach").append(html);
        //  $('#Add_Attach').removeAttr("disabled");
    }

    function delete_attach(this_value, id_attach) {
        var out_confirm = confirm('هل انت متأكد من عملية الحذف ؟');
        // alert(out_confirm);
        if (out_confirm == true) {
            dataString = "id_delete_attach=" + id_attach;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>FamilyCashing/DeleteAttachments',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $(this_value).parents('tr').remove();
                }
            });
        }
    }
</script>