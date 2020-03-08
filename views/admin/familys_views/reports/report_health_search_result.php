
<?php

$total_disease = array();

if((isset($count_2))&&(!empty($count_2))) {
 
foreach ($count_2 as $key => $value) {
     if ($value->disease_id == 0) {
        continue;
     }
     if (key_exists($key,$total_disease)) {
        $total_disease[$key]['member']+=$value->count;
        $total_disease[$key]['mother']+=0;
     }else{
         $total_disease[$key]=array();
        $total_disease[$key]['member']=$value->count;
        $total_disease[$key]['mother']=0;
        $total_disease[$key]['title']=$value->health_state_type_title;
     }
        
    }

}
if((isset($count_1))&&(!empty($count_1))) {
    
    foreach ($count_1 as $key => $value) {
     if ($value->disease_id == 0) {
        continue;
     }
     if (key_exists($key,$total_disease)) {
        $total_disease[$key]['mother']+=$value->count;
        $total_disease[$key]['member']+=0;
     }else{
         $total_disease[$key]=array();
        $total_disease[$key]['mother']=$value->count;
        $total_disease[$key]['member']=0;
        $total_disease[$key]['title']=$value->health_state_type_title;
     }
        
    }
    
}

    ?>

<?php
/*
echo '<pre>';
print_r($result);*/

 if((isset($result))&&(!empty($result))) { ?>
  <table id="example25" class="  table table-bordered my_table  responsive nowrap" cellspacing="0"
             width="100%">
             <thead>
               <th>م</th>
               <th>رقم الملف</th>
               <th>اسم  </th>
                <th>السجل المدني  </th>
                <th>رقم التواصل  </th>
                <!--  <th>الحي </th>
                 <th> حالة الدراسية</th>-->
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

                 <td></td>
                 <td><?php echo $value->file_num; ?></td>
                 <td><?php echo $value->name; ?></td>
                 <td><?php echo $value->fard_card; ?></td>
                 <td><?php echo $value->contact_mob; ?></td>
                 <!--<td><?php echo $value->hai_name; ?></td>
                       <td><?php echo $value->education_status_title; ?></td>-->
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

<?php  if (isset($total_disease)&&(!empty($total_disease))) {
 ?>
 <div class=" col-xs-12 " style="width: 30%;">
                   <div class="clearfix"></div>
      <div class="page-break"></div>
                                    <br><br>
<table class="table table-bordered responsive">
    <thead>
     <tr>
        <th>المرض</th>
        <th>الايتام</th>
        <th>الارامل</th>
        <th>الاجمالي</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($total_disease as $key => $value) {
        ?>
        <tr>
            <td><?=$value['title']?></td>
            <td><?=$value['member']?></td>
            <td><?=$value['mother']?></td>
            <td><?=$value['mother'] + $value['member'] ?></td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
</div>
<?php }?>
  <?php
}else {
  ?>
  <div class="col-12 alert-danger">
    <h5>لا توجد بيانات ..................</h5>
  </div>
  <?Php
} ?>

<script>

$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

</script>

<script>
 var t= $('#example25').DataTable( {
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
                <?php  if (isset($total_disease)&&(!empty($total_disease))) {
                    ?>
                customize: function (win) {
                     $(win.document.body).append("<style> body{direction:rtl;background-color: #fff;} @page{size:  350mm 255mm;margin:10px 15px 40px 15px;}</style>");
                   

                   $(win.document.body).find('.my_table').after('<style> @media all {'+
            '.page-break {'+
                'display: none;'+
                'display: none;'+
            '}}'+

        '@media print {'+
            '.page-break {'+
                'display: block;'+
                'page-break-before: always;'+
            '}}</style>  <div class=" col-xs-12" style="width: 30%;">'+
                    ' <div class="clearfix"></div>'+
             '  <div class="page-break"></div>'+
                                        '<br><br>'+
                            
                            '<table class="table table-bordered ">'+
                                    '<thead>'+
                                    '<tr><th>المرض</th>'+
                                    '<th>الايتام</th>'+
                                    '<th>الارامل</th>'+
                                    '<th>الاجمالي</th></tr>'+
                                    '</thead>'+
                                    '<tbody>'+
                                    <?php foreach ($total_disease as $key => $value) {
                                        ?>
                                    '<tr>'+
                                    '<td><?=$value['title']?></td>'+
                                    '<td><?=$value['member']?></td>'+
                                    '<td><?=$value['mother']?></td>'+
                                    '<td><?=$value['mother'] + $value['member'] ?></td>'+
                                    '</tr>'+
                                    <?php }
                                    ?>                       
                                    '</tbody></table>'+
                        
                    
                                        '<br><br>'+
                            
                                    '</div>' );
                },
                <?php }?>
                 
                autoPrint: true,

                // orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        "order": [[ 1, "asc" ]],
        "scrollX": true,
        

    } );

       t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
</script>
