<?php
if($valu==0){
if(isset($records)&&!empty($records)){
    $x=0;
    foreach ($records as $row){
        $x++;
        ?>
<tr>
   <td><?php echo $x;?></td>
    <td><?php echo $row->file_num;?></td>
    <td><?php echo $row->person_name;?></td>
    <td><?php if( isset ($row->person_data['member_gender'])&&$row->person_data['member_gender']==1)echo 'ذكر'; else echo 'انثي';?></td>

    <td><?php echo $row->k_num;?></td>

    <td><?php echo $row->k_name;?></td>

    <td><?php echo $row->k_mob;?></td>

    <td><?php echo $row->fe2a;?></td>
    <td><?php echo $row->from_date_h;?></td>
    <td><?php echo $row->to_date_h;?></td>
    <td><?php echo $row->first_value;?></td>
    <td><?php echo $row->days_num;?></td>
</tr>
<?php } }else{?>
<tr>

    <td colspan="8"> <div style="color:red; font-size: 20px;" > عفوا !.. ..لاتوجد نتائج</div> </td>
</tr>


<?php }}else{?>
    <table id=""  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="">

            <th>كود الكافل</th>

            <th>اسم الكافل</th>
            <th> رقم الجوال</th>
            <th>حاله الكافل</th>
            <th> فئه الكافل </th>

        </tr>

        </thead>
        <tbody id="">
        <?php
        if(isset($records)&&!empty($records)){
            $x=0;
            foreach ($records as $row){
                $x++;
                ?>
                <tr>

                    <td><?php echo $row->k_num;?></td>

                    <td><?php echo $row->k_name;?></td>

                    <td><?php echo $row->k_mob;?></td>
                    <td><?php echo $row->halat_kafel_name;?></td>

                    <td><?php echo $row->fe2a;?></td>

                </tr>
            <?php } }?>



        </tbody>
    </table>
    <p style="font-size: 30px; color: red;">اسماء المستفيدين</p>

    <table id=""  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="">
            <th>مسلسل</th>
            <th>رقم الملف</th>
            <th>اسم المستفيد</th>
            <th>الجنس</th>


            <th>  بدايه الكفاله </th>
            <th>  نهايه الكفاله </th>
            <th>  قيمه الكفاله </th>
            <th>  مده الكفاله </th>
        </tr>

        </thead>
        <tbody id="">
        <?php
        if(isset($records)&&!empty($records)){
        $x=0;
        foreach ($records as $row){
        $x++;
        ?>
        <tr class="">
            <td><?php echo $x;?></td>
            <td><?php echo $row->file_num;?></td>
            <td><?php echo $row->person_name;?></td>
            <td><?php if( isset ($row->person_data['member_gender'])&&$row->person_data['member_gender']==1)echo 'ذكر'; else echo 'انثي';?></td>


            <td><?php echo $row->from_date_h;?></td>
            <td><?php echo $row->to_date_h;?></td>
            <td><?php echo $row->first_value;?></td>
            <td><?php echo $row->days_num;?></td>



        </tr>
        <?php } }?>



        </tbody>
    </table>

<?php } ?>

