<?php
$type_n = array('', 'ضوابط الإستحقاق', 'ألية إسترداد القرض / السلف ', ' المستندات المطلوبة');

if (isset($solaf_dawabt) && (!empty($solaf_dawabt))) { ?>
    <table id="example" class="table table-bordered table-responsive">
        <thead>
        <tr class="greentd">
            <th>م</th>
            <th><?= $type_n[$type] ?></th>
            <th>الاجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0;
        foreach ($solaf_dawabt as $solfa) { ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $solfa->title ?></td>
                <td>
                    <a onclick='swal({
                            title: "هل انت متأكد من التعديل ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-warning",
                            confirmButtonText: "تعديل",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: true
                            },
                            function(){
                            window.location="<?= base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/update_dwabt/' . base64_encode($solfa->id) ?>";
                            });'>
                        <i class="fa fa-pencil"> </i> </a>

                    <a onclick='swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-warning",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: true
                            },
                            function(){

                            delete_dwabt(<?= $solfa->type ?>,<?= $solfa->id ?>);
                            });'>
                        <i class="fa fa-trash"> </i> </a>

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div class="col-md-12 alert-danger">
        <h4>لا توجد بيانات .....</h4>
    </div>
<?php } ?>
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