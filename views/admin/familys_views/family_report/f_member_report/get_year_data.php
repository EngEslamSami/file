<?php
/*
echo '<pre>';
print_r($result);
*/

$tasnefat = array('','أرملة','يتيم','مستفيد بالغ','أخري'); ?>
<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">بيانات الابناء </h3>
        </div>
        <div class="panel-body">
<?php
if(isset($result) && $result !=null)
{
    ?>

                <table  id="example" class=" table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr >
                        <th>م</th>
                        <th>رقم الملف</th>
                        <th style="text-align: center"> إسم  رب الاسرة</th>
                        <th style="text-align: center">إسم المستفيد</th>
                        <th style="text-align: center">تاريخ الميلاد</th>
                        <th style="text-align: center" >العمر </th>
                        
                        
                        <th style="text-align: center"> التصنيف</th>
        
                        <th style="text-align: center" >الحالة </th>
                        <!--    <th style="text-align: center" >الفئة </th>-->
                        <th style="text-align: center" >رقم جوال التواصل </th>
                         <th style="text-align: center" >الفئة </th>
                        
                    </tr>
                    </thead>
                    <?php   $i=0; foreach ($result as $val){?>
                    <tbody>
                    <tr >
                        <td style="text-align: center"><?=++$i;?></td>
                        <td style="text-align: center"><?=$val->file_num_basic?></td>
                        <td style="text-align: center"><?=$val->father_name_basic?></td>
                           <td style="text-align: center"><?=$val->member_full_name?></td>
                               <td style="text-align: center"><?=$val->member_birth_date_hijri?></td>
                        <td style="text-align: center"><?=$val->ages_id?></td>
                           
                        <td style="text-align: center"><?php if(!empty($tasnefat[$val->categoriey_member])){
                                echo $tasnefat[$val->categoriey_member];
                            }else {
                                echo 'غيرمحدد';
                            }?></td>
                     
                    
                        <td style="text-align: center">
                            <?php

                            if(isset($member_family_status)&&!empty($member_family_status)) {
                                foreach ($member_family_status as $record_row) {
                                    if($val->halt_elmostafid_member==$record_row->id){
                                        echo $record_row->title;
                                    }
                                }}
                            ?>
                        </td>

                        <td style="text-align: center"><?=$val->mother_phone?></td>
                        
                         <td style="text-align: center"><?=$val->fe2aaaa['f2a']?></td>

                    </tr>

                    <?   }?>
                    </tbody>

                </table>

<?}else{
    echo '<div class="alert alert-danger col-xs-12" >
             عفوا لا يوجد بيانات 
    </div>';
}?>
            </div>
        </div>
    </div>






<!----------------------------------------------- end modal -------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

//    $(document).ready(function() {
//        var table= $('#example').DataTable( {
//            dom: 'Bfrtip',
//            buttons: [
//                'pageLength',
//                'copy',
//                'csv',
//                'excelHtml5',
//                {
//                    extend: "pdfHtml5",
//                    orientation: 'landscape'
//                },
//
//                {
//                    extend: 'print',
//                    exportOptions: { columns: ':visible'},
//                    orientation: 'landscape'
//                },
//                'colvis'
//            ],
//            colReorder: true
//        } );
//




    } );
</script>