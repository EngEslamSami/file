






 <?php

 /*echo "<pre>";
 print_r($all_data);
 echo "</pre>";*/
 //die;

 if($this->input->post('personType')==='guaranteed'){ ?>

<table class="table table-striped table-bordered example " style="table-layout: fixed;" >
    <thead>
    <tr class="info">
        <th style="text-align:center;">م</th>
      <th style="text-align:center;">رقم الملف</th>
        <th style="text-align:center;">إسم رب الأسرة</th>
        <th  style="text-align:center;">إسم المستفيد</th>
        <th  style="text-align:center;">تاريخ الميلاد</th>
        <th  style="text-align:center;">العمر</th>
        <th  style="text-align:center;">إسم الكافل</th>
        <th  style="text-align:center;">نوع الكفالة</th>
        <th  style="text-align:center;">تاريخ إنتهاء الكفالة</th>
        <th  style="text-align:center;">قيمة الكفالة</th>
        <th  style="text-align:center;">طريقة التوريد</th>
    </tr>
    </thead>

    <tbody>
    <?php


    $counter =1; if(!empty($all_data)){
        foreach ($all_data as $row_detail){

            for($s=0;$s<sizeof($row_detail);$s++){

                if($this->input->post('type') ==='armal'){
                    $name =$row_detail[$s]['details']->full_name;
                    $birth_date =$row_detail[$s]['details']->m_birth_date_hijri_year;
                    $age =date('Y')-$row_detail[$s]['details']->m_birth_date_year;

                }else{
                    $name =$row_detail[$s]['details']->member_full_name;
                    $birth_date =$row_detail[$s]['details']->member_birth_date_hijri;
                    $age =date('Y')-$row_detail[$s]['details']->member_birth_date_year;
                }

                ?>
                <tr >
                    <td style="text-align:center;"><?php echo $counter?></td>
                    <td style="text-align:center;"><?php echo $row_detail[$s]['details']->family_file_num;?></td>
                    <td style="text-align:center;"><?php echo $row_detail[$s]['details']->father_name;?></td>
                    <td style="text-align:center;"><?php echo $name;?></td>
                    <td style="text-align:center;"><?php echo $birth_date;?></td>
                    <td style="text-align:center;"><?php echo $age;?></td>
                    <!------->

                    <td style="text-align:center;"><?php if(!empty($row_detail[$s]['kafel_name'])){ echo$row_detail[$s]['kafel_name']; } ?></td>
                    <td style="text-align:center;"><?php   if(!empty($row_detail[$s]['kafala_name'])){echo$row_detail[$s]['kafala_name']; }?></td>
                    <td style="text-align:center;"><?php   if(!empty($row_detail[$s]['first_date_to_ar'])){echo$row_detail[$s]['first_date_to_ar']; }?></td>
                    <td style="text-align:center;"><?php   if(!empty($row_detail[$s]['first_value'])){echo$row_detail[$s]['first_value']; }?></td>
                    <td style="text-align:center;"><?php   if(!empty($row_detail[$s]['tawred_type'])){echo$row_detail[$s]['tawred_type']; }?></td>

                </tr>
                <?php $counter++; } }     }  ?>

    </tbody>
</table>

 <?php



 }elseif($this->input->post('personType')==='not_guaranteed'){


   ?>

<table class="table table-striped table-bordered example" style="table-layout: fixed;" >
    <thead>
    <tr class="info">
        <th style="text-align:center;">م</th>
         <th style="text-align:center;">رقم الملف</th>
        <th style="text-align:center;">إسم رب الأسرة</th>
        <th  style="text-align:center;">إسم المستفيد</th>
        <th  style="text-align:center;">تاريخ الميلاد</th>
        <th  style="text-align:center;">العمر</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $counter =1; if(!empty($all_data)){

        foreach ($all_data as $row_detail){


           if($this->input->post('type') ==='armal'){
                $name =$row_detail['full_name'];
                $birth_date =$row_detail['m_birth_date_hijri_year'];
                $age =date('Y')-$row_detail['m_birth_date_year'];

            }else{
                $name =$row_detail['member_full_name'];
                $birth_date =$row_detail['member_birth_date_hijri'];
                $age =date('Y')-$row_detail['member_birth_date_year'];

            }
            ?>
            <tr >
                <td style="text-align:center;"><?php echo $counter?></td>
                      <td style="text-align:center;"><?php echo $row_detail['file_num'];?></td>
                <td style="text-align:center;"><?php echo $row_detail['father_name'];?></td>
                <td style="text-align:center;"><?php echo $name;?></td>
                <td style="text-align:center;"><?php echo $birth_date;?></td>
                <td style="text-align:center;"><?php echo $age;?></td>
            </tr>
            <?php $counter++;  } }  ?>

    </tbody>
</table>
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