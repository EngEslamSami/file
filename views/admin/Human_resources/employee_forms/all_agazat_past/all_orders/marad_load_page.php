<?php if(!empty($table)){ ?>

    <br><br>


    <table id="" class=" example table table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">م</th>
            <th class="text-center">المرض</th>
          
              <th class="text-center">الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($table  as  $value) {
            ?>
            <tr>

                <td> <input type="radio" name="radio" data-name="<?= $value->marad_name ?>"     data-id="<?= $value->id ?>"
                            data-type="5"
                            data-title="<?= $value->id ?>"
                            id="member<?= $value->id ?>" ondblclick="getTitle($(this).attr('data-title'),'<?php echo $value->marad_name;?>'),GetMemberName(<?= $value->id ?>)"></td>
                <td><?= $value->marad_name ?></td>
               
                    <td>

          <!--
                    <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                    <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
-->
                        <a href="#" onclick="delte_marad(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                        <a href="#" onclick="update_marad(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php }else{ ?>

 <div class="alert alert-danger">لاتوجد  بيانات !!</div>
<?php } ?>


<script>
    function getTitle(value,name2) {


      //  $('#sarf_to_fk').val(value);
        $('#marad_name').val(name2);

        $('#Modal_family').modal('hide');
    }
</script>

<script>

    function get_id() {

        alert("ddd");

    }
</script>

<script>

    $('.example').DataTable( {
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
