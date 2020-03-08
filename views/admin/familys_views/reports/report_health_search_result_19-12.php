<?php if((isset($result))&&(!empty($result))) { ?>
  <table id="example25" class="  table table-bordered   responsive nowrap" cellspacing="0"
             width="100%">
             <thead>
               <th>م</th>
               <th>رقم الملف</th>
               <th>اسم  </th>
               <th> الفئة </th>
               <th>حالة الصحية </th>
               <th>نوع المرض/الاعاقة </th>
               <th>تاريخ المرض</th>
               <th>جهة المتابعة المرض/الإعاقة</th>
               <th>وضع الحالة المرض/الإعاقة</th>
               <th>مستفيد من التأهيل الشامل</th>
                <th>حالة الملف </th>
                <th> فئة الاسرة </th>
                <th>  حالة المستفيد </th>
                <th>   العمر </th>
                <th>   الجنس </th>
             </thead>
             <tbody>
               <?php  $i=1;
               foreach ($result as $key => $value) {
                  if($value->file_status == 1 ){
                   $file_status = 'نشط كليا';
                  // $file_colors = '#00ff00';
                    $file_colors = '#15bf00';
                }elseif($value->file_status == 2 ){
                    $file_status = 'نشط جزئيا';
                      $file_colors = '#00d9d9';
                }elseif($value->file_status == 3 ){
                    $file_status = 'موقوف مؤقتا';  
                      $file_colors = '#ffff00';
                }elseif($value->file_status == 4 ){
                    $file_status = 'موقوف نهائيا'; 
                      $file_colors = '#ff0000'; 
                }elseif($value->file_status == 0){
                      $file_status = 'جـــــــــاري'; 
                      $file_colors = '#62d0f1'; 
                }
                 
                 ?>
                 <tr>

                 <td><?php echo $i; ?></td>
                 <td><?php echo $value->file_num; ?></td>
                 <td><?php echo $value->name; ?></td>
                 <td><?php echo $value->cat; ?></td>
                 <td><?php if (!empty($value->health_state_title)) {
                            echo $value->health_state_title; 
                        }else{
                            echo 'غير محدد';
                        }?></td>
                 <td><?php
                 if (!empty($value->health_state_type_title)) {
                            echo $value->health_state_type_title; 
                        }else{
                            echo 'غير محدد';
                        } 
                  ?></td>
                 <td><?php 
                 if (!empty($value->date)) {
                            echo $value->date; 
                        }else{
                            echo 'غير محدد';
                        }
                  ?></td>
                 <td><?php 
                 if (!empty($value->dis_response_status_title)) {
                            echo $value->dis_response_status_title; 
                        }else{
                            echo 'غير محدد';
                        }
                  ?></td>
                <td><?php 
                 if (!empty($value->dis_status_title)) {
                            echo $value->dis_status_title; 
                        }else{
                            echo 'غير محدد';
                        }
                 ?></td>
                 <td><?php echo $value->comprehensive_rehabilitation_title; ?></td>
                 
                  <td> <button style="color:#fff ;width:80px; background-color:<?php echo $file_colors  ?>" 
                   class="btn btn-sm" >
                  <?php echo $file_status ?></button></td>
               
                 <td><?php 
                 if (!empty($value->family_cat_name)) {
                            echo $value->family_cat_name; 
                        }else{
                            echo 'أ ';
                        }
                 ?></td> 
                  <td><?php 
                 if (!empty($value->persons_status_title)) {
                            echo $value->persons_status_title; 
                        }else{
                            echo 'غير محدد';
                        }
                 ?></td>
                <td><?php echo $value->age; ?></td>
                <td><?php echo $value->gender_title; ?></td>

               </tr>
               <?php $i++ ;
             } ?>
             </tbody>
</table>
  <?php
}else {
  ?>
  <div class="col-12 alert-danger">
    <h5>لا توجد بيانات ..................</h5>
  </div>
  <?Php
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
        colReorder: true,
        "order": [[ 1, "asc" ]],
        "scrollX": true

    } );
</script>
