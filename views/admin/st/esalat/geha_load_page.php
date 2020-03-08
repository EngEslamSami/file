<?php if(!empty($gehat)){ 

    ?>

    <br><br>


    <table id="example" class=" table table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">م</th>
            <th class="text-center">الجهة</th>
            <th class="text-center">رقم الجوال </th>
            <th class="text-center">العنوان </th>
              <th class="text-center">الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($gehat  as  $value) {
            ?>
            <tr>

                <td> <input type="radio" name="radio" data-name="<?= $value->name ?>"   data-mob="<?= $value->mob ?>"  data-id="<?= $value->id ?>" style="width: 20px;height: 20px;"
                            data-type="5"
                            data-title="<?= $value->id ?>"
                            id="member<?= $value->id ?>" ondblclick="GetMemberName(<?= $value->id ?>)"></td>
                <td><?= $value->name ?></td>
                <td ><?=$value->mob ?></td>
                <td ><?=$value->address ?></td>
                    <td>


                        <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                        <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php }
 ?>

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
