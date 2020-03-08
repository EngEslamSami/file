<?php
/*
echo '<pre>';
print_r($items);*/
if (isset($items) && !empty($items)) {
    ?>

        <table id="example25" class="  table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>رقم الطلب</th>
                    <?php if(!is_int($emp_id_fk)){ ?>
                    <th>مقدم الطلب </th>
                  <?php  } ?>
                    <th>نوع الاجازه</th>
                    <th>بدايه الاجازه</th>
                    <th>نهاية الاجازة </th>
                    <th>عدد الايام المطلوبه</th>
                    <th>حاله الطلب</th>
                    <th> الطلب الان عند </th>

                </tr>

                </thead>
                <tbody>

                <?php
                if (isset($items) && !empty($items)) {
                    $x = 1;

                    foreach ($items as $row) {

            if($row->suspend == 0){
            $halet_eltalab = 'جاري ';
            $halet_eltalab_class = 'warning';
            }elseif($row->suspend == 1){
             $halet_eltalab = 'تم قبول الطلب من '.$row->current_from_user_name;
            $halet_eltalab_class = 'success';
            }elseif($row->suspend == 2){
                $halet_eltalab = 'تم رفض الطلب من '.$row->current_from_user_name;
                $halet_eltalab_class = 'danger';
            }elseif($row->suspend == 4){
               $halet_eltalab = 'تم اعتماد الطلب بالموافقة  من '.$row->current_from_user_name;
               $halet_eltalab_class = 'success';
            }elseif($row->suspend == 5){
               $halet_eltalab = 'تم اعتماد الطلب بالرفض  من '.$row->current_from_user_name;
               $halet_eltalab_class = 'danger';
            }else{
                 $halet_eltalab = 'غير محدد ';
               $halet_eltalab_class = 'danger';
            }

              $row->agaza_from_date_m = explode('/', $row->agaza_from_date_m)[2] . '/' . explode('/', $row->agaza_from_date_m)[0] . '/' . explode('/', $row->agaza_from_date_m)[1];
              $row->agaza_to_date_m = explode('/', $row->agaza_to_date_m)[2] . '/' . explode('/', $row->agaza_to_date_m)[0] . '/' . explode('/', $row->agaza_to_date_m)[1];

                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                             <td><?php echo $row->agaza_rkm; ?></td>
                             <?php if(!is_int($emp_id_fk)){ ?>
                             <td><?php echo $row->employee; ?></td>
                           <?php } ?>
                            <td><?php echo $row->name->name; ?></td>
                            <td><?php echo $row->agaza_from_date_m; ?></td>
                            <td><?php echo $row->agaza_to_date_m; ?></td>
                            <td><?php echo $row->num_days; ?></td>

                            <td>
                            <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                            <?php echo $halet_eltalab;  ?>
                             </span>
                            </td>
                            <td>
                            <span class="label label-info" style="min-width: 140px;">
                            <?php echo $row->current_to_user_name;  ?>
                             </span>
                            </td>


                        </tr>
                        <?php
                        $x++;
                    }
                }
                ?>

                </tbody>
            </table>
        </div>

<?php }else {?>
  <div class="col-md-12 alert-danger">
    <h4>لا توجد بيانات .......</h4>
  </div>
  <?php
} ?>


<script>
  $('#example25').DataTable( {
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
