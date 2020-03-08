
<style>
.alert-danger {
    color: black !important;
    background-color: #E5343D !important;
    border-color: #BD000A !important;
}
    .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
    border: 1px solid #ffffff !important;
    background: #e8e8e8;
    border-radius: 7px !important;
    font-size: 11px !important;
    color: black;
       font-weight: bold;
}
.table>thead>tr>td.info, .table>tbody>tr>td.info, .table>tfoot>tr>td.info, .table>thead>tr>th.info, .table>tbody>tr>th.info, .table>tfoot>tr>th.info, .table>thead>tr.info>td, .table>tbody>tr.info>td, .table>tfoot>tr.info>td, .table>thead>tr.info>th, .table>tbody>tr.info>th, .table>tfoot>tr.info>th {
    background-color: #09704e !important;
    color: white !important;
    font-size: 11px !important;
    border-radius: 7px !important;
    font-weight: bold;
}
   
</style>
<?php
/*
echo '<pre>';
print_r($all_main_kafalat);*/

 if (isset($all_main_kafalat) && (!empty($all_main_kafalat))) { ?>
    <table id="" class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0"
           width="100%">
        <thead>
        <tr class="info">
            <th class="text-center tttha">م</th>
            <th class="tttha"> رقم الملف</th>
            <th class="tttha">إسم المستفيد</th>
             <th class="tttha">الجنس</th>
            <th class="tttha">العمر</th>
            <th class="tttha">حالة المستفيد</th>
            <th class="tttha">التصنيف</th>
            <th class="tttha"> حالة الملف</th>
            <th class="tttha">الفئة</th>


            <th class="tttha">نوع الكفالة</th>
            <th class="tttha">كود الكافل</th>
            <th class="tttha"> إسم الكافل</th>
            <th class="tttha"> فئة الكافل</th>
            <th class="tttha"> جوال الكافل</th>
            <th class="tttha"> حالة الكافل</th>

            <th class="tttha"> بداية الكفالة</th>
            <th class="tttha"> نهاية الكفالة</th>
            <th class="tttha"> انتهاء الكفالة</th>
            <th class="tttha"> حالة الكفالة</th>
              <th class="tttha"> طريقة التوريد</th>
               <th class="tttha">اسم البنك</th>
              <th class="tttha">رقم الحساب </th>


        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a = 1;

        if (isset($all_main_kafalat) && !empty($all_main_kafalat)) {
            foreach ($all_main_kafalat as $record) {
       $pay_method_arr = array('- الكل -', 1 => 'نقدي', 2 => 'شيك', 3 => 'شبكة', 4 => 'إيداع نقدي', 5 => 'إيداع شيك', 6 => 'تحويل', 7 => 'أمر مستديم');
         
  
                

                if ($record->kafala_type_fk == 1) {
                    $kafala_name = 'كفالة شاملة';
                } elseif ($record->kafala_type_fk == 2) {
                    $kafala_name = 'نصف كفالة';
                } elseif ($record->kafala_type_fk == 3) {
                    $kafala_name = 'كفالة مستفيد';
                } elseif ($record->kafala_type_fk == 4) {
                    $kafala_name = 'كفالة أرامل';
                } else {
                    $kafala_name = 'غير محدد ';
                }

                if ($record->person_type == 1) {
                    $person_type = ' أم';
                } elseif ($record->person_type == 2) {
                    $person_type = ' أبناء';
                }


                if ($record->kafel_status == 7) {
                    $kafel_status_name = 'نشـط';
                } elseif ($record->kafel_status == 9) {
                    $kafel_status_name = 'إنتظار';
                } elseif ($record->kafel_status == 10) {
                    $kafel_status_name = 'موقوف';
                } else {
                    $kafel_status_name = 'غير محدد';
                }


                if ($record->person_hala == 1) {
                    $person_hala_name = ' نشط كليا ';
                } elseif ($record->person_hala == 2) {
                    $person_hala_name = ' نشط جزئيا';
                } elseif ($record->person_hala == 3) {
                    $person_hala_name = ' موقوف مؤقتا';
                } elseif ($record->person_hala == 4) {
                    $person_hala_name = ' موقوف نهائيا';
                } elseif ($record->person_hala == 0) {
                    $person_hala_name = ' جاري';
                } else {
                    $person_hala_name = 'غير محدد';
                }


                if ($record->person_cat == 1) {
                    $person_cat_name = ' أرملة ';
                } elseif ($record->person_cat == 2) {
                    $person_cat_name = ' يتيم';
                } elseif ($record->person_cat == 3) {
                    $person_cat_name = ' مستفيد بالغ';
                } elseif ($record->person_cat == 4) {
                    $person_cat_name = ' أخري';
                } else {
                    $person_cat_name = 'غير محدد';
                }


                if ($record->first_status == 1) {
                    $first_status_name = ' منتظم ';
                } elseif ($record->first_status == 2) {
                    $first_status_name = ' موقوف';
                } else {
                    $first_status_name = 'غير محدد';
                }
                
                
                
                if(isset($record->kafel_mob) and $record->kafel_mob != null){
                 $kafel_mob = '966'.$record->kafel_mob.'+';
                }else{
                  $kafel_mob = '';  
                }


                ?>
                <tr>
                    <td><?php echo $record->id; ?></td>

                    <td><?php echo $record->file_num; ?></td>
                    <td><?php echo $record->person_name; ?></td>
                       <td><?php  if ($record->person_gender == 1) {
                                  echo "ذكر" ;
                                }elseif ($record->person_gender == 2) {
                                  echo "انثى" ;
                                }else{
                                    echo "غير محدد" ;
                                }
                            ?></td>
                    <td><?php echo $record->person_age; ?></td>
                    <td><?php echo $person_hala_name; ?></td>
                    <td><?php echo $person_cat_name; ?></td>
                    <td>
                     <span style="background-color:  <?php echo $record->files_status_color; ?>;">
                     
                        <?php echo $record->files_status_title; ?></span>
                    </td>
                    <td><?php echo $record->family_cat_name; ?></td>

                    <td><?php echo $kafala_name; ?></td>

                    <td><?php echo $record->kafel_rkm; ?></td>
                    <td><?php echo $record->kafel_name; ?></td>
                       <td><?php echo $record->kafel_fe2a_type; ?></td>
                    <td><?php echo $kafel_mob; ?></td>
                    <td><?php echo $kafel_status_name; ?></td>
                    <td><?php 
$arr = explode('/', $record->first_date_from_ar);
echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];                     
                    
                  //  echo $record->first_date_from_ar; ?></td>
                    <td><?php
                    
/*$arr = explode('/', $record->first_date_to_ar);
echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1]; 
ECHO '--';*/
echo date('Y-m-d',$record->first_date_to);
                    // echo $record->first_date_to_ar; ?></td>

<?PHP 

?>
<td>
<?php 

if($record->dddddd >= 0){
    $day_class = 'success';
     $day_spinner = 'spin';
}elseif($record->dddddd < 0){
     $day_class = 'danger';
     $day_spinner = 'spins';
}
?>

<button style="padding: 0px 10px !important;" type="button" class="btn btn-sm btn-<?=$day_class ?> btn-rounded">
<i style="color: white;" class="fa fa-cog fa-<?=$day_spinner ?>"></i>
<?php echo $record->dddddd; ?>
</button>

</td>
<td><?php echo $first_status_name; ?></td>

<td><?php echo $pay_method_arr[$record->pay_method]; ?></td>

           <?php   if (in_array($record->pay_method,array(5,7 )) ) {
                  $bank_name=$record->bank_name;
                  $acount_num=$record->bank_account_num;
                 
              }else {
                    $bank_name='لا يوجد';
                    $acount_num=   'لا يوجد';
                    } ?>
                    <td><?php echo $bank_name; ?></td>
                    <td><?php echo $acount_num; ?></td>





                </tr>
                <?php
                $a++;
            }
        }
        ?>
        </tbody>
    </table>
<?php } else {
    ?>
  
   <br /> 
<div class="alert alert-danger alert-dismissible" role="alert">

<strong>عذرا! ..... </strong> لا يوجد داتا مسجلة 
</div>
    
    
    
    <?php
} ?>


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
