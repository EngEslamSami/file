<div class="modal-body ">
    <?php if(!empty($records)){?>
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
        <?php  $a=1;foreach ($records as $one_img){ ?>
            <tr id="<?php echo$one_img->id; ?>">
                <td><?php echo$a; ?></td>
                <td><?php echo$one_img->title_setting; ?></td>
                <td><img src="<?php echo base_url(); ?>uploads/images/<?php echo$one_img->img; ?>"  style="width: 150px" alt=""></td>
                <td><a  onclick="DeleteImage(<?php echo$one_img->id; ?>);"
                    <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
            </tr>
            <?php $a++;}  ?>
        </tbody>
    </table>
        <?php } else { ?>
        <div class="alert alert-danger">عفوا !... لا توجد كفالات لهذا الكفيل</div>


    <?php } ?>
</div>
