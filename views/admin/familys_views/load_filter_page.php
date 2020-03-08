

<table class="table table-striped table-bordered dt-responsive nowrap" id="example">
    <thead>
    <tr class="greentd">
        <th>م </th>
        <th >رقم الملف </th>
        <th >إسم رب الأسرة</th>
        <th>رقم الهوية</th>
        <th>إسم الام</th>
        <th >رقم الهوية</th>
        <th >إجراءات</th>
        <th >حالة الملف</th>
        <th>الفئة</th>
        <th >تحديث الملف</th>
        <th > فتح الملف</th>


    </tr>
    </thead>
    <tbody >

    <?php
    if (isset($records) && !empty($records)) {
        $x = 1;
        foreach ($records as $row) {
            if($row['file_update_date'] == 0 ){
                if($row['file_status'] == 3 || $row['file_status'] == 4 ){
                    $file_update_date = 'الملف موقوف';
                    $file_update_date_class = 'danger';
                }else{
                    $file_update_date = 'تحديث الملف';
                    $file_update_date_class = 'info';
                }
            }else{
                $file_update_date = $row['file_update_date'];
                $file_update_date_class = 'add';
            }


            if($row['file_status'] == 1 ){
                $file_status = 'نشط كليا';
                // $file_colors = '#00ff00';
                $file_colors = '#15bf00';
            }elseif($row['file_status'] == 2 ){
                $file_status = 'نشط جزئيا';
                $file_colors = '#00d9d9';
            }elseif($row['file_status'] == 3 ){
                $file_status = 'موقوف مؤقتا';
                $file_colors = '#ffff00';
            }elseif($row['file_status'] == 4 ){
                $file_status = 'موقوف نهائيا';
                $file_colors = '#ff0000';
            }elseif($row['file_status'] == 0){
                $file_status = 'جـــــــــاري';
                $file_colors = '#62d0f1';
            }



            if($row['mother_name'] != '' and $row['mother_name'] != null){

                $mother_name = $row['mother_name'];
            }elseif($row['mother_name'] == ''){
                $mother_name = $row['full_name_order'];

            }else{
                $mother_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }



            if(!empty($row['nasebElfard'])){
                $color ='';
                if(!empty($row['nasebElfard']['f2a']->color)){
                    $color =$row['nasebElfard']['f2a']->color;
                }

                $title ='';
                if(!empty($row['nasebElfard']['f2a']->title)){
                    $title =$row['nasebElfard']['f2a']->title;
                }


                $Fe2z_name =
                    '<span title="نصيب الفرد = '.round($row['nasebElfard']['naseb']).'ريال" class="label label-pill
                         "  style="color:black ;border-radius: 4px;vertical-align: middle;padding-top: 5px;
                           font-size: 14px; background-color:'.$color.'" >
                      '.$title.'</span>';
                $naseb_elfard =  '<span class="label label-pill label-info " style="color: black"  >'.round($row['nasebElfard']['naseb']).'</span>';
            }else{
                $Fe2z_name = '<span title=" ريال 0 " class="label label-pill " style="color:black ; 
                    border-radius: 4px;vertical-align: middle;padding-top: 5px; font-size: 14px;
                    background-color:#62bd0f">أ</span>';
            }


            if($row['mother_new_card'] != '' and $row['mother_new_card'] != null){
                $mother_new_card = $row['mother_new_card'];
            }elseif($row['mother_new_card'] == '' and $row['id'] >= 852 ){
                $mother_new_card = $row['mother_national_num'];

            }else{
                $mother_new_card= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }




            if($row['father_full_name'] != '' and $row['father_full_name'] != null){
                $father_full_name = $row['father_full_name'];
            }else{
                $father_full_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }

            if($row['father_national_num'] != '' and $row['father_national_num'] != null){
                $father_national_num = $row['father_national_num'];
            }else{
                $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }
?>
            <tr>

                <td><?= $x++ ?></td>
                <td><?=  $row['file_num'] ?></td>
                <td><?= $father_full_name ?></td>
                <td><?= $father_national_num   ?></td>
                <td><?= $mother_name  ?></td>
                <td><?= $mother_new_card  ?></td>

                <td> <a target="_blank" href="<?=base_url().'family_controllers/Family/father/'.$row['mother_national_num']?>"
                        class="btn btn-sm btn-warning"> <i class="fa fa-pencil-square " aria-hidden="true"></i> تعديل</a>



                    <a target="_blank" href="<?= base_url().'family_controllers/Family_details/details/'.$row['mother_national_num']?>" class="btn btn-sm btn-success"> <i class="hvr-buzz-out fa fa-recycle" aria-hidden="true">
                        </i> إجراءات</a>


                    <a href="<?= base_url().'family_controllers/Family_details/print_family/'.$row['mother_national_num']?>" target="_blank">
                        <i class="fa fa-print" aria-hidden="true"></i> </a>

                    <a href="<?= base_url().'family_controllers/Family_details/print_card/'.$row['mother_national_num']?>" target="_blank">
                        <i style="background-color: #0a568c" class="fa fa-print" aria-hidden="true"></i> </a>



                </td>
                <td><button style="color:#fff ;width:80px; background-color:<?= $file_colors?> "
                            data-toggle="modal" data-target="#modal-info" class="btn btn-sm" >
                        <?= $file_status?></button></td>
                <td><?= $Fe2z_name  ?></td>
                <td><button data-toggle="modal" data-target="#modal-update690" class="btn btn-sm btn-<?=$file_update_date_class?>">


                        <?=$file_update_date?>


                    </button></td>
                <td><?= 'waiting';   ?></td>

            </tr>
            <?php
        }
    } ?>

    </tbody>
</table>


<script>

    $('#example').DataTable( {
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
