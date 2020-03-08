<table id="example"  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="">
        <th>مسلسل</th>
        <th>رقم الملف</th>
        <th>اسم رب الاسره</th>
        <th>اسم المستفيد</th>
        <th style="width: 3%">الجنس</th>

        <th>تاريخ الميلاد</th>

        <th>العمر</th>

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
                <td><?php echo $row->full_name;?></td>
                <td><?php if($row->m_gender==1)echo 'ذكر'; else echo 'انثي' ;?></td>
                <td><?php echo $row->m_birth_date;?></td>
                <td><?php echo $current_year- $row->m_birth_date_hijri_year;?></td>


            </tr>


        <?php }} ?>
    <?php
    if(isset($all_aytam)&&!empty($all_aytam)){
        if($x) {
            $i = $x;
        }else{
            $i=0;
        }
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
                <td><?php echo $row->member_full_name;?></td>
                <td><?php if($row->member_gender==1)echo 'ذكر'; else echo 'انثي' ;?></td>

                <td><?php echo $row->member_birth_date;?></td>
                <td><?php echo $current_year - $row->member_birth_date_hijri_year;?></td>



            </tr>


        <?php }} ?>


    </tbody>
</table>