
<?php


if(!empty($all_data)){ ?>

    <table class="table table-striped table-bordered  " style="table-layout: fixed;" >
        <thead>
        <tr class="info">
            <th style="text-align:center;">م</th>
            <th style="text-align:center;">كود الكافل</th>
            <th  style="text-align:center;">إسم الكافل</th>
            <th  style="text-align:center;">نوع الكفالة</th>
            <th  style="text-align:center;">قيمة الكفالة</th>
            <th  style="text-align:center;"> تاريخ بداية الكفالة</th>
            <th  style="text-align:center;"> تاريخ نهاية الكفالة</th>
            <th  style="text-align:center;">حالة الكفالة</th>
            <th  style="text-align:center;">طريقة التوريد</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $counter =1;
            foreach ($all_data as $row_detail){
                
                    if( $row_detail->first_status == 1){
                            $halet_kafala_first = 'منتظم' ;
                            $halet_kafala_color_first= '#00ff00' ;
                        }elseif( $row_detail->first_status == 2){
                          $halet_kafala_first = 'موقوف' ;   
                          $halet_kafala_color_first = '#ef2832' ;
                        }else{
                            $halet_kafala_first = 'غير محدد' ;  
                            $halet_kafala_color_first = '#e8e8e8' ; 
                        }
                
                
?>
                    <tr >
                        <td style="text-align:center;"><?php echo$counter?></td>
                        <td style="text-align:center;"><?php echo$row_detail->kafel_name->k_num;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->kafel_name->k_name;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->kafala_name;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->first_value;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->first_date_from_ar;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->first_date_to_ar;?></td>
                        <td style="text-align:center;background-color: <?php echo $halet_kafala_color_first;?>">
                        <?php echo $halet_kafala_first;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->tawred_type;?></td>

                    </tr>
                    <?php $counter++;  }
            if(isset($all_data_second) && !empty($all_data_second))
            {/*
                echo '<pre>';
             print_r($all_data_second);*/
                foreach ($all_data_second as $row_detail_2){
                    
                     if( $row_detail_2->first_status == 1){
                            $halet_kafala_second = 'منتظم' ;
                            $halet_kafala_color_second = '#00ff00' ;
                        }elseif( $row_detail_2->first_status == 2){
                          $halet_kafala_second = 'موقوف' ;   
                          $halet_kafala_color_second = '#ef2832' ;
                        }else{
                            $halet_kafala_second = 'غير محدد' ;  
                            $halet_kafala_color_second = '#e8e8e8' ; 
                        }
                        
                    
                    ?>
                    <tr >
                        <td style="text-align:center;"><?php echo$counter?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->kafel_name->k_num;?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->kafel_name->k_name;?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->kafala_name;?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->first_value;?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->first_date_from_ar;?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->first_date_to_ar;?></td>
                        <td style="text-align:center;background-color: <?php echo $halet_kafala_color_second;?>;">
                        <?php echo $halet_kafala_second;?>
                        </td>
                        <td style="text-align:center;"><?php  echo $row_detail_2->tawred_type;;?></td>

                    </tr>
                    <?php $counter++;  }
            }
            ?>

        </tbody>
    </table>

    <?php }else{ ?>
<div class="alert alert-danger"> لا توجد كفالات !!!!</div>

<?php } ?>




<script>

    var table2= $('.example').DataTable( {
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
        colReorder: true,
        retrieve: true
    } );
</script>