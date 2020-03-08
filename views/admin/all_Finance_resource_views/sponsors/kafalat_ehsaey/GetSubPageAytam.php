






    <table class="table table-striped table-bordered example " style="table-layout: fixed;" >
        <thead>
        <tr class="info">
            <th style="text-align:center;">م</th>
            <th style="text-align:center;">رقم الملف</th>
            <th style="text-align:center;">إسم رب الأسرة</th>
            <th  style="text-align:center;">إسم المستفيد</th>
            <th  style="text-align:center;">تاريخ الميلاد</th>
            <th  style="text-align:center;">العمر</th>
            <th  style="text-align:center;">نوع الكفالة</th>
            <th  style="text-align:center;">رقم الكافل الأول</th>
            <th  style="text-align:center;">إسم الكافل الأول</th>
            <th  style="text-align:center;">رقم الكافل الثاني</th>
            <th  style="text-align:center;">إسم الكافل الثاني</th>
        </tr>
        </thead>

        <tbody>
        <?php


        $counter =1; if(!empty($all_data)){
            foreach ($all_data as $row_detail){
                $arr_type =array(1=>'شاملة',2=>'نص',3=>'مستفيد',4=>'أرمل');
                $birth_date =$row_detail['member_birth_date_hijri'];
                $age =date('Y')-$row_detail['member_birth_date_year'];
                    ?>
                    <tr >
                        <td style="text-align:center;"><?php echo $counter?></td>
                        <td style="text-align:center;"><?php echo $row_detail['file_num'];?></td>
                        <td style="text-align:center;"><?php echo $row_detail['father_name'];?></td>
                        <td style="text-align:center;"><?php echo $row_detail['member_full_name'];?></td>
                        <td style="text-align:center;"><?php echo $birth_date;?></td>
                        <td style="text-align:center;"><?php echo $age;?></td>
                        <td><?php if(!empty($arr_type[$row_detail['first_kafala_type']])){ echo $arr_type[$row_detail['first_kafala_type']]; }else{ echo'غير محدد';}?></td>
                        <td><?php echo $row_detail['first_k_id'];?></td>
                        <td><?php echo $row_detail['first_kafel_name'];?></td>
                        <td><?php if(!empty($row_detail['second_k_id'])){ echo$row_detail['second_k_id']; }else{ echo'غير محدد';}?></td>
                        <td><?php echo $row_detail['second_kafel_name'];?></td>

                    </tr>
                    <?php $counter++; } } //}    die;   ?>

        </tbody>
    </table>







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