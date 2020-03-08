<?php if((isset($tree))&&!empty($tree)) {
?>
<table id="example" class="table table-bordered " role="table">
    <thead>
    <tr class="info">
        <th style="font-size: 15px; width:88px !important; ">م</th>
        <th style="font-size: 15px;" class="text-left">رقم الحساب</th>
        <th style="font-size: 15px;" class="text-left">إسم الحساب</th>

    </tr>

    </thead>

    <tbody>

    <?php

    function buildTreeTable($tree, $count = 1)

    {
        foreach ($tree as $record) {
            ?>

        
<tr style=" cursor: pointer;" onclick="Get_account_Name(this)" id="member<?= $record->id ?>"
    data-code="<?= $record->code ?>" data-name="<?= $record->name ?>"
    data-ttype="<?= $record->ttype ?>" data-level="<?= $record->level ?>"
    data-id="<?= $record->id ?>">

                <td class="forTd">
                <?=$count++?>
                   <!-- <input type="radio" name="choosed" value="<?= $record->id?>"
                                                         ondblclick="Get_account_Name(this)"
                                                         id="member<?=$record->id ?>"
                                                         data-code="<?=$record->code ?>"
                                                         data-name="<?=$record->name ?>"
                                                         data-ttype="<?=$record->ttype ?>"
                                                         data-level="<?=$record->level ?>"
                                                         data-id="<?=$record->id ?>"/>
                                                         -->
                                                         
                                                         </td>

                <td class="forTd"><?= $record->code ?></td>

                <td class="forTd"><?= $record->name ?></td>

            </tr>

            <?php
            if (isset($record->subs)) {
                $count = buildTreeTable($record->subs, $count++);
            }
        }
        return $count;
    }

    if (isset($tree) && $tree != null) {

        buildTreeTable($tree);

    }
    ?>

    </tbody>

</table>
    <script>
        $('#example').DataTable({
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
                    exportOptions: {
                        columns: ':visible'
                    },
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true
        });
    </script>
<?php  } ?>