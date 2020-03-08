<?php if((isset($result))&&(!empty($result))) { ?>
  <table id="example25" class="  table table-bordered   responsive nowrap" cellspacing="0"
             width="100%">
             <thead>
               <th>م</th>
               <th>رقم الملف</th>
               <th>اسم  </th>
               <th> الفئة </th>
               <th>  حالة الصحية </th>
               <th>   نوع المرض/الاعاقة </th>
               <th>تاريخ المرض</th>
               <th>جهة المتابعة المرض/الإعاقة</th>
               <th>وضع الحالة المرض/الإعاقة</th>
               <th>مستفيد من التأهيل الشامل</th>
             </thead>
             <tbody>
               <?php  $i=1;
               foreach ($result as $key => $value) {?>
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
        colReorder: true
    } );
</script>
