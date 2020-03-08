<?php

 ?>
<table class="table table-striped table-bordered dt-responsive nowrap" id="examplee">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>التاريخ</th>
        <th>وقت وصول الزائر</th>
        <th>اسم الزائر </th>
        <th>رقم الجوال </th>
        <th>الفئه </th>
        <th>الغرض من الزيارة </th>
        <th>يرغب بالتواصل </th>
        <th>وقت انتهاء الزيارة</th>
        <th>الوقت المستغرق</th>
        <th>الاجراء</th>
        <th>مستقبل الزيارة</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $x=1;
    if (isset($records) && !empty($records)){
    foreach($records as $row){
        if($row->twasol==1)
        {
            $color="green";
        }else{
            $color="red";
        }
        $timeIn = strtotime($row->visit_time_start);
        $timeOUT = strtotime($row->visit_time_end);
        $defrent =  $timeOUT - $timeIn;
        $hours = floor($defrent / 3600);
        $minutes = floor(($defrent / 60) % 60);
        $time_def ='اقل من دقيقة';
        if($minutes > 0){
            $time_def =$minutes.' دقيقة  ';
            if($hours > 0){
                $time_def .= $hours.' و ساعة ' ;
            }
        }




        if(isset($f2at_arr[$row->fe2a]) and $f2at_arr[$row->fe2a] != null ){
            $f2at =  $f2at_arr[$row->fe2a];
        }else{ $f2at =  'غير محدد ';}


        if(isset($row->name) and $row->name != null ){
            $visitor_name =  $row->name;
        }else{ $visitor_name =  'غير محدد ';}

        if(isset( $yes_no[$row->twasol]) and  $yes_no[$row->twasol] != null ){
            $twasol =   $yes_no[$row->twasol];
        }else{ $twasol =  'غير محدد ';}






        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo date("Y-m-d",$row->visit_date);?></td>
            <td><?php echo $row->visit_time_start ;?></td>
            <td style="padding: 0;"><?php echo $visitor_name;
                ?></td>
            <td><?php echo $row->mob ;?></td>
            <td><?php echo  $f2at ;?></td>
            <td><?php echo word_limiter($row->purpose, 4) ;?>
                <!-- <button type="button" class="btn btn-sm btn-primary"
                                        data-text="<?=$row->purpose?>" onclick="get_details($(this).attr('data-text'))" data-toggle="modal" data-target="#purpose_detail">
                                        المزيد
                                    </button>-->
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        onclick="get_text('<?= $row->purpose ?>','<?= $row->natega_visit ?>')"
                        data-target="#purpose_detail">
                    تفاصيل
                </button>
            </td>
            <td style="background-color: <?php echo $color;?>">
                <?php echo $twasol ;?> </td>
            <td><?php echo $row->visit_time_end ;?></td>
            <td><?php echo $time_def ;?></td>

            <td>
                <!--***********/////////////////////////////********* 11 *****************//////////////-->
                <?php
                if($_SESSION['role_id_fk'] ==3) {
                    if ((isset($roles)) && (!empty($roles))) {
                        if ($roles->edit == 1) {
                            ?>
                            <a href="<?php echo base_url(); ?>Public_relation/addGam3iaVisitors/<?php echo $row->id; ?>"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <?php }if ($roles->delet == 1) {
                            ?>
                            <a href="<?php echo base_url(); ?>Public_relation/deleteGam3iaVisitors/<?php echo $row->id; ?>"
                               onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                                    class="fa fa-trash" aria-hidden="true"></i> </a>
                        <?php }
                        ?>


                    <?php } }else {
                    ?>
                    <a href="<?php echo base_url(); ?>Public_relation/addGam3iaVisitors/<?php echo $row->id; ?>"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                    <a href="<?php echo base_url(); ?>Public_relation/deleteGam3iaVisitors/<?php echo $row->id; ?>"
                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                            class="fa fa-trash" aria-hidden="true"></i> </a>
                    <?php
                }
                ?>
                <!--///////////////////////***************************//////////////////////////////////****************-->
            </td>





            <td><?php if(!empty($row->degree_name)){
                    echo $row->degree_name;}else{
                    echo 'غير محدد';
                }?></td>


        </tr>
        <?php
        $x++;
    } }
    ?>
    </tbody>
</table>


    <script>

        $('#examplee').DataTable( {
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