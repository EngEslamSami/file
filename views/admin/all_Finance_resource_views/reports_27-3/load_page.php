<?php
$pay_method_arr =array('اختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');


$kafala_period = array(
    '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
    '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => 'سنة',

);

if($valu==0) { ?>


    <div style="" >
<div class="col-md-12">
    <div class="col-xs-12">
        <div class="col-xs-6 text-center">
            <h5 style="padding: 10px; border: 2px solid #437500;"> عدد الايتام : <span><?php if(!empty($aytam)) echo  $aytam ;?></span>	</h5>

        </div>
        <div class="col-xs-6 text-center">
            <h5 style="padding: 10px; border: 2px solid #437500;"> عدد الارامل : <span><?php if(!empty($arml)) echo  $arml;?></span>	</h5>


        </div>


    </div>
    </div>

        <table id="example"  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="">
                <th>مسلسل</th>
                <th>رقم الملف</th>
                <th>اسم المستفيد</th>
                <th style="width: 3%">الجنس</th>
                <th style="width: 3%">العمر</th>

                <th>كود الكافل</th>

                <th>اسم الكافل</th>
                <th> رقم الجوال</th>
                <th> نوع الكفاله</th>
                <th> فئه الكامل </th>
                <th> طريقه التوريد </th>
                <th>  نهايه الكفاله </th>
                <th> المبلغ </th>
                <th>  مده الكفاله </th>
            </tr>

            </thead>
            <tbody>
            <?php
            if(isset($records)&&!empty($records)){
            $x=0;

            foreach ($records as $row){
            $x++;
            ?>
            <tr>
                <td><?php echo $x;?></td>
                <td><?php echo $row->file_num;?></td>
                <td><?php echo $row->person_name;?></td>
                <td><?php if(isset($row->person_data['gender'])&&$row->person_data['gender']==1)echo 'ذكر'; else echo 'انثي';?></td>
                <td><?php
                    if($row->person_type==2 || $row->person_type==3) {
                        echo $current_year - $row->person_data['member_birth_date_hijri_year'];
                    }else{
                        echo $current_year - $row->person_data['m_birth_date_hijri_year'];

                    }


                    ?></td>

                <td><?php echo $row->k_num;?></td>

                <td><?php echo $row->k_name;?></td>

                <td><?php echo $row->k_mob;?></td>
                <td><?php echo $row->khafala_name;?></td>
                <td><?php echo $row->fe2a;?></td>
                <td><?php if(!empty($row->pay_method) &&$row->pay_method!=0) echo $pay_method_arr[$row->pay_method] ;?></td>
                <td><?php echo $row->to_date_h;?></td>
                <td><?php echo $row->first_value;?></td>
                <td><?php if(!empty($row->kafala_period) &&$row->kafala_period!=0) echo $kafala_period[$row->kafala_period] ; else echo 'لم تحدد' ;?></td>
            </tr>
            <?php } }else{?>


            </tbody>
        </table>

    </div>






<?php }}else{

if(isset($records)&&!empty($records)){?>
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

            <th>العمر</th>
            <th> نوع الكفاله</th>
            <th> طريقه التوريد </th>
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
            <td><?php if( isset ($row->person_data['gender'])&&$row->person_data['gender']==1 )echo 'ذكر'; else echo 'انثي';?></td>

            <td><?php
                if($row->person_type==2 || $row->person_type==3) {
                    echo $current_year - $row->person_data['member_birth_date_hijri_year'];
                }else{
                    echo $current_year - $row->person_data['m_birth_date_hijri_year'];

                }


                ?></td>
            <td><?php echo $row->khafala_name;?></td>
            <td><?php if(!empty($row->pay_method) &&$row->pay_method!=0) echo $pay_method_arr[$row->pay_method] ;?></td>

            <td><?php echo $row->first_date_to_ar;?></td>
            <td><?php echo $row->first_value;?></td>
            <td><?php if(!empty($row->kafala_period) &&$row->kafala_period!=0) echo $kafala_period[$row->kafala_period] ; else echo 'لم تحدد' ;?></td>




        </tr>
        <?php } }?>



        </tbody>
    </table>

<?php } else{?>
<div class="alert alert-danger">عفوا !.....لا يوجد نتائج</div>


<?php } }  ?>

