
<?php

if (!empty($attaches)) { ?>

<table class="table table-striped table-bordered fixed-table mytable ">
    <thead>
    <tr class="info">
        <th class="text-center"> إسم المرفق</th>
        <th class="text-center">المرفق</th>
        <th class="text-center"> الإجراء</th>
    </tr>
    </thead>
    <tbody class="attachTable">

        <?php $x = 1;
        foreach ($attaches as $row_img) { ?>
            <tr class="<?= $x ?>">
                <td><input type="input" name="title[]" readonly id="title"
                           value="<?= $row_img->title ?>" class="form-control  "
                           data-validation="reuqired"></td>
                <td><img id="img_view<?= $x ?>"
                         src="<?php echo base_url() . 'uploads/images/finance_accounting/box/quods/' . $row_img->file_attached ?>"
                         width="150px" height="150px"/></td>
                <td>

                    <a onclick="$('#adele').attr('href', '<?php echo base_url() . 'finance_accounting/box/quods/Quods/deleteQuodImg2/' . $row_img->id . '/'.$_POST['type']  ?>');"
                       data-toggle="modal" data-target="#modal-deletes" title="حذف"><i
                            class="fa fa-trash"></i></a>

            </tr>
            <?php $x++;
        }
    ?>
    </tbody>
</table>

<?php }else{ ?>

    <div class="col-md-12 alert alert-danger"> لا توجد مرفقات !!</div>

 <?php } ?>


