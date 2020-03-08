<?php
if (isset($members) && !empty($members)){
    ?>
    <table id="example" class="table  table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">
            <th>#</th>
            <th>   اسم الابن</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($members as $member){
            ?>
            <tr>

                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                           id="f<?= $member->id ?>" ondblclick="GetName(<?= $member->id ?>,'<?= $member->member_full_name?>',<?= $member->member_card_num?>,<?= $member->member_gender?>,<?= $member->mother_national_num_fk?>)">
                </td>


                <td><?= $member->member_full_name?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}else{
    ?>
    <div class="col-xs-12 alert-danger alert">عفوا... لا يوجد بيانات !</div>
<?php
}
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
