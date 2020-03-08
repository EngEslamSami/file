
<?php if(isset($all) &&!empty($all)){
   

    ?>



    <table id="tahwel" class=" table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">#</th>
            <th class="text-center">الاداره</th>
            <th class="text-center">القسم</th>
           
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($all as $row) {
        
            ?>
            <tr>
 
              

  <td><input type="radio" name="radio" data-title="<?= $row->id ?>"
                                                   id="radio"
                ondblclick="GettahwelName('<?= $row->edara ?>','<?= $row->from_id_fk ?>','<?= $row->name?>','<?= $row->id ?>')"></td>
                <td><?= $row->edara; ?></td>
                <td><?= $row->name ?></td>
             

  

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php } else{
    ?>
    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>

    <?php
}
?>


<script>

    $('#tahwel').DataTable( {
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
