<?php if (isset($folders) && (!empty($folders))) { ?>
    <table id="example_folder" class=" table table-responsive table-bordered">
        <thead>
        <tr>
            <th>م</th>
            <th> اسم المجلد</th>
        </tr>
        </thead>
        <tbody>


        <?php
        $x = 1;

        function get_array2($arr, $x)
        {
            foreach ($arr as $key => $row) {
                if ($row->type == 2) {

                    ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td style="cursor: pointer" data-title="<?= $row->id ?>"
                            onclick="GetfolderName(<?= $row->id ?>,'<?= $row->ar_title ?>','<?= $row->path ?>')">
                            <?= $row->ar_title ?>
                        </td>

                    </tr>
                    <?php
                }
                if (!empty($row->sub)) {
                    get_array2($row->sub, $x);
                }
            }
        }

        get_array2($folders, $x);

        ?>
        <?php /*
$x = 0;
            foreach ($folders as $row) {
                $x++;
                $from_id_fk = '';

                ?>

                <tr>
                    <td><?= $x ?></td>
                    <td style="cursor: pointer" data-title="<?= $row->id ?>"
                        onclick="GetfolderName(<?= $row->id ?>,'<?= $row->ar_title ?>','<?= $row->path ?>')">
                        <?= $row->ar_title ?>
                    </td>

                </tr>

                <?php
                if (!empty($row->sub)) {
                    get_array2($row->sub, '&nbsp &nbsp', $from_id_fk);
                }
                ?>

            <?php }
*/
        ?>

        <?php /*$x = 1;
            foreach ($folders as $row) {
                 if (in_array($row->id, array(1, 2, 3, 4, 5, 6))) {
                     continue;
                 }
                if (in_array($row->type, array(1,0))) {
                    continue;
                }
                ?>
                <tr>
                    <td><?= $x ?></td>
                    <td style="cursor: pointer" data-title="<?= $row->id ?>"
                        onclick="GetfolderName(<?= $row->id ?>,'<?= $row->ar_title ?>','<?= $row->path ?>')">
                        <?= $row->ar_title ?>
                    </td>

                </tr> <?php $x++;
            }*/ ?></tbody>
    </table>
<?php } else { ?>
    <div class="alert-danger col-md-12 text-center "><h4> لا توجد بيانات ......</h4></div>
<?php } ?>


<script>
    var table = $('#example_folder').DataTable({
        dom: 'Bfrtip',
        buttons: ['pageLength', 'excelHtml5', {extend: "pdfHtml5", orientation: 'landscape'}, {
            extend: 'print',
            exportOptions: {columns: ':visible'},
            orientation: 'landscape'
        }, 'colvis'],
        colReorder: true
    });</script>