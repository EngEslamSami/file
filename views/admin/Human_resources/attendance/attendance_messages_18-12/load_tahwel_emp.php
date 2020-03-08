
<?php if(isset($all) &&!empty($all)){
  
        $title = 'اسم الموظف';
        $code=' كود الموظف';
        $edra=' الاداره';
        $qsm=' القسم';
        
        
        $name = 'employee';
        $code_emp='emp_code';
        $id_card='edara';
        $email='qsm';
       
    

    ?>



    <table id="tahwel" class=" table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">#</th>
            <th class="text-center"><?= $title?></th>
            <th class="text-center"><?= $code?></th>
            <th class="text-center"><?= $edra?></th>
            <th class="text-center"><?= $qsm?></th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($all as $row) {
          
            $row_n = $row->$name;
            $code_n=$row->$code_emp;
            $id_card_n=$row->$id_card;
            $email_n=$row->$email;

            ?>
            <tr>
            <!-- <input type="checkbox" id="myCheck"  onclick="myFunction()"> -->
                <td><input style="width: 90px;height: 20px;" type="checkbox" name="radio" id="myCheck<?= $row->id ?>"  data-id="<?= $row->id ?>"
                           onclick="GettahwelName('<?= $row_n?>',<?= $row->id ?>,'<?=$id_card_n ?>','<?=$row->administration ?>','<?= $email_n?>','<?=$row->department ?>')"></td>

                <td><?= $row_n ?></td>
                <td><?= $code_n?></td>
                <td><?=$id_card_n ?></td>
                <td><?= $email_n?></td>

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
