






<table class="table table-striped table-bordered example" style="table-layout: fixed;" >
    <thead>
    <tr class="info">
        <th style="text-align:center;">م</th>
        <th style="text-align:center;">رقم الملف </th>
        <th style="text-align:center;">إسم رب الأسرة</th>
        <th  style="text-align:center;">إسم المستفيد</th>
        <th  style="text-align:center;">تاريخ الميلاد</th>
        <th  style="text-align:center;">العمر</th>
    </tr>
    </thead>

    <tbody>
    <?php
    /*
    echo '<pre>';
    print_r($all_data);*/
    $counter =1; if(!empty($all_data)){
        foreach ($all_data as $row_detail){


            if($this->input->post('type') ==='armal'){
                $name =$row_detail['full_name'];
                $birth_date =$row_detail['m_birth_date_hijri_year'];
            }else{
                $name =$row_detail['member_full_name'];
                $birth_date =$row_detail['member_birth_date_hijri'];
            }
            ?>
            <tr >
                <td style="text-align:center;"><?php echo $counter?></td>
                 <td style="text-align:center;"><?php echo $row_detail['file_num'];?></td>
                <td style="text-align:center;"><?php echo $row_detail['father_name'];?></td>
                <td style="text-align:center;"><?php echo $name;?></td>
                <td style="text-align:center;"><?php echo $birth_date;?></td>
                <td style="text-align:center;"><?php echo $row_detail['age'];?></td>
            </tr>
            <?php $counter++;  } }  ?>

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
        retrieve: true,
    } );
</script>