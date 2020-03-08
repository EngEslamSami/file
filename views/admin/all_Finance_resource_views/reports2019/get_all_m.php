<table id=""  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="">
        <th>مسلسل</th>
        <th>رقم الملف</th>
        <th>اسم رب الاسره</th>
        <th>اسم المستفيد</th>
        <th style="width: 3%">الجنس</th>

        <th>تاريخ الميلاد</th>

        <th>اسم الكافل</th>
       <th>بدايه الكفاله</th>
        <th>نهايه الكفاله</th>
        <th>المبلغ</th>

    </tr>

    </thead>
    <tbody>
    <?php
    $x=0;
    if(isset($all_armls)&&!empty($all_armls)){
        $x=0;
        foreach ($all_armls as $row){

            if($row->file_status!=4)
            {
                continue;
            }
            $x++;?>
            <tr>

                <td><?=$x?></td>
                <td><?php echo $row->file_num;?></td>
                <td><?php echo $row->father_name;?></td>
                <td><?php echo $row->person_name;?></td>
                <td><?php if( isset ($row->person_data['member_gender'])&&$row->person_data['member_gender']==1)echo 'ذكر'; else echo 'انثي';?></td>

                <td><?php

                    echo ($row->person_data['m_birth_date_hijri']);?></td>
                <td><?php echo $row->sponsor;?></td>
                <td><?php echo $row->first_date_from_ar;?></td>
                <td><?php echo $row->first_date_to_ar;?></td>
                <td><?php echo $row->first_value;?></td>


            </tr>


        <?php }} ?>
    <?php
    if(isset($all_aytam)&&!empty($all_aytam)){

            $i = $x;



        foreach ($all_aytam as $row){
            if($row->file_status!=4)
            {
                continue;
            }
            $i++;?>
            <tr>

                <td><?=$x?></td>
                <td><?php echo $row->file_num;?></td>
                <td><?php echo $row->father_name;?></td>
                <td><?php echo $row->person_name;?></td>
                <td><?php if( isset ($row->person_data['member_gender'])&&$row->person_data['member_gender']==1)echo 'ذكر'; else echo 'انثي';?></td>


                <td><?php

                    echo ($row->person_data['m_birth_date_hijri']);?></td>
                   <td><?php echo $row->sponsor;?></td>
                <td><?php echo $row->first_date_from_ar;?></td>
                <td><?php echo $row->first_date_to_ar;?></td>
                <td><?php echo $row->first_value;?></td>



            </tr>


        <?php }} ?>


    </tbody>
</table>


