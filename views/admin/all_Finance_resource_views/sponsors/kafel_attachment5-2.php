<?php    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/add_attach');

//$records=$record->Images;
?>

<div class="modal-body ">

    <button  type="button" class="btn btn-success btn-next" onclick="add_row()"> <i class="fa fa-plus"></i> إضافة  </button>
    <br><br>
    <table class="table table-striped table-bordered"id="mytable">
        <thead>
        <tr class="info">
            <th>م</th>
            <th>إسم المرفق</th>
            <th>الصورة</th>
            <th>الإجراء</th>
        </tr>
        </thead>
        <tbody id="resultTable">
        <?php if(!empty($records)){ $a=1;foreach ($records as $one_img){ ?>
            <tr id="<?php echo$one_img->id; ?>">
                <td><?php echo$a; ?></td>
                <td><?php echo$one_img->title_setting; ?></td>
                <td><img src="<?php echo base_url(); ?>uploads/images/<?php echo$one_img->img; ?>"  style="width: 150px" alt=""></td>
                <td><a  onclick="DeleteImage(<?php echo$one_img->id; ?>);"
                    <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
            </tr>
            <?php $a++;} } ?>
        </tbody>
    </table>

</div>
<div class="modal-footer" style="display: inline-!block;width: 100%">
    <input type="hidden" id="person" style="display: none;" name="person_id" value="<?php echo $kael_id ; ?>">
    <button type="submit"   id="saves"  name="add" value="add" class="btn btn-success"
            style="float: left;display: !block;padding: 6px 12px;" >حفظ</button>
</div>
<?php echo form_close();?>
