
<?php
if(!empty($all_armls) || !empty($all_armls)){
    $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

    ?>

    <table id=""  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="">
            <th>مسلسل</th>
            <th>رقم الملف</th>
            <th>اسم رب الاسره</th>
            <th>اسم المستفيد</th>
            <th>الجنس </th>
            <th>اسم الكافل</th>
            <th>بدايه الكفاله</th>
            <th>نهايه الكفاله</th>
            <th>طريقه التوريد</th>
            <th>المبلغ</th>
        </tr>

        </thead>
        <tbody>
        <?php
        $x=0;
        if(isset($all_armls)&&!empty($all_armls)){
            $x=0;
            foreach ($all_armls as $row){


                $x++;?>
                <tr>

                    <td><?=$x?></td>
                    <td><?php echo $row->file_num;?></td>
                    <td><?php echo $row->father_name;?></td>
                    <td><?php echo $row->full_name;?></td>
                    <td><?php echo 'انثي';?></td>


                    <td><?php echo $row->first_k_name;?></td>
                    <td><?php echo $row->first_from;?></td>
                    <td><?php echo $row->first_to;?></td>
                    <td><?php if(!empty($row->khafala->pay_method)) echo $pay_method_arr[$row->khafala->pay_method] ;?></td>
                    <td><?php if(!empty($row->khafala->first_value)) echo $row->khafala->first_value;?></td>



                </tr>


            <?php }} ?>
        <?php
        if(isset($all_aytam)&&!empty($all_aytam)){

            $i = $x;



            foreach ($all_aytam as $row){
//            if($row->file_status!=4)
//            {
//                continue;
//            }
                $i++;?>
                <tr>

                    <td><?=$i?></td>
                    <td><?php echo $row->file_num;?></td>
                    <td><?php echo $row->father_name;?></td>
                    <td><?php echo $row->member_full_name;?></td>
                   <td><?php if($row->member_gender==1 ||$row->member_gender==52) echo 'ذكر';else 'أنثي';?></td>


                <td><?php echo $row->first_k_name;?></br>
                    <?php echo $row->second_k_name;?></td>
                    <td><?php echo date("Y-m-d" ,$row->first_from) ;?></td>
                    <td><?php echo date("Y-m-d" ,$row->first_to);?></td>
                    <td><?php if(!empty($row->khafala->pay_method)) echo $pay_method_arr[$row->khafala->pay_method] ;?></td>
                    <td><?php if(!empty($row->khafala->first_value)) echo $row->khafala->first_value;?></td>




                </tr>


            <?php }} ?>


        </tbody>
    </table>

<?php } else{?>
    <div class="alert alert-danger">عفوا لاتوجد نتائج</div>
<?php } ?>
