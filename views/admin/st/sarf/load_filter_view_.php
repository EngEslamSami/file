<table class="table-bordered table table-responsive " id="example">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>رقم إذن الصرف</th>
        <th>تاريخ الصرف</th>
        <th>المستودع</th>
        <th>رقم الملف</th>
        <th>الإسم</th>

        <th>الإجراء</th>
        <th>تحديد</th>
    </tr>
    </thead>
    <tbody>
    <?php $x = 1;
    foreach ($all_sarf as $all) {
        ?>
        <tr>
            <td><?= $x++ ?></td>
            <td><?= $all->ezn_rkm ?></td>
            <td><?= $all->ezn_date_ar ?></td>
            <td><?= $all->storage_name ?></td>

            <td><?= $all->sarf_to_fk ?></td>
            <td><?= $all->sarf_to_name ?></td>
            <td>
                <a type="button" class="btn btn-primary btn-xs" title="التفاصيل"
                   data-toggle="modal" data-target="#detailsModal"
                   onclick="load_page(<?= $all->id ?>);"
                   style="padding: 1px 5px;"><i
                            class="fa fa-list"></i></a>


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

                        window.location="<?php echo base_url(); ?>st/sarf/Sarf_order/Update_sarf/<?php echo $all->id; ?>";
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
                        window.location="<?= base_url() . "st/sarf/Sarf_order/Delete_sarf/" . $all->id ?>";
                        });'>
                    <i class="fa fa-trash"> </i></a>
                <a href="#" title="طباعه"><i class="fa fa-print"></i></a>

            </td>

            <td>
                <div class="skin-square">

                    <div class="i-check">
                        <input tabindex="9" type="checkbox"
                               id="square-checkbox-<?= $all->id ?>"
                               value="<?= $all->id ?>" class="checkbox_ezen">
                        <label for="square-checkbox-<?= $all->id ?>"></label>
                    </div>


                </div>
            </td>


        </tr>
        <?php
    }
    ?>

    </tbody>
</table>


<script>

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );



</script>
