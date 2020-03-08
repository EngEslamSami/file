<?php
/*
echo '<pre>';
print_r($items);*/
if (isset($items) && !empty($items)) {
    ?>

    <table id="example52" class=" display table table-bordered   responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr class="greentd">
                <th>م</th>
                <th>رقم الطلب</th>
                <th>نوع الاذن</th>
                <th>تاريخ الاذن</th>
                <th>بدايه الاذن</th>
                <th>نهاية الاذن</th>
                <?php if(!is_int($emp_id_fk)){ ?>
                <th>مقدم الطلب </th>
              <?php } ?>
                <th>عدد الساعات</th>
                <th>حاله الطلب</th>
                <th>الطلب الان عند </th>

            </tr>

            </thead>
            <tbody>

            <?php
            if (isset($items) && !empty($items)) {
                $x = 1;

                foreach ($items as $row) {
                  if ($row->no3_ezn==1){
                      $no3_ezn = 'استئذان شخصي';
                  } elseif ($row->no3_ezn==2){
                      $no3_ezn ='استئذان للعمل' ;
                  }

        if($row->suspend == 0){
        $halet_eltalab = 'جاري ';
        $halet_eltalab_class = 'warning';
        }elseif($row->suspend == 1){
         $halet_eltalab = 'تم قبول الطلب من '.$row->current_from_user_name;
        $halet_eltalab_class = 'success';
        }elseif($row->suspend == 2){
            $halet_eltalab = 'تم رفض الطلب  من '.$row->current_from_user_name;
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

          // $row->ezn_date_ar = explode('/', $row->ezn_date_ar)[2] . '/' . explode('/', $row->ezn_date_ar)[0] . '/' . explode('/', $row->ezn_date_ar)[1];
                    ?>
                    <tr>
                        <td><?php echo $x; ?></td>
                         <td><?php echo $row->ezn_rkm; ?></td>
                        <td><?php echo $no3_ezn; ?></td>
                        <td><?php echo $row->ezn_date_ar; ?></td>
                        <td>
                        <?php
                            $currentDateTime =$row->from_hour;
                            $newDateTime = date('h:i A', strtotime($currentDateTime));
                            
                            
                            echo  $newDateTime; ?>
                        
                        </td>
                        <td><?php
                            
                            $DateTime =$row->to_hour;
                            $to_DateTime = date('h:i A', strtotime($DateTime));
                            
                            echo $to_DateTime; ?></td>
                        <?php if(!is_int($emp_id_fk)){ ?>
                        <td><?php echo $row->emp_name; ?></td>
                      <?php } ?>
                        <td><?php echo $row->total_hours; ?></td>

                        </td>
                        <td>
                        <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                        <?php echo $halet_eltalab;  ?>
                         </span>
                        </td>
                        <td>
                        <span class="label label-info" style="min-width: 140px;">
                        <?php echo $row->current_to_user_name;;  ?>
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
  $('#example52').DataTable( {
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
