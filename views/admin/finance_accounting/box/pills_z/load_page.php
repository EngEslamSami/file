<div class="panel-body">


    <?php
    $x=0;
    $all_value=0;
    foreach($all_pills_inbox as $row){

    $all_value=$all_value+$row->value;

        $x++;   }
    ?>


<div class="col-xs-12">
    <div class="col-xs-6 text-center">
        <h5 style="padding: 10px; border: 2px solid #437500;"> عدد الإيصالات : <span><?= $x?></span>	</h5>

    </div>
    <div class="col-xs-6 text-center">
        <h5 style="padding: 10px; border: 2px solid #750000;"> المجموع :  <span><?= $all_value?></span></h5>

    </div>


</div>

    <?php
    $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');?>


        <form action="<?php echo base_url();?>finance_accounting/box/pills/Pill/convert_esal/<?php echo $pay_method;?>" method="post">
        <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
            <thead>
            <tr class="info">
                <th style="text-align: center !important;">م</th>
                <th style="text-align: center !important;">رقم الإيصال</th>
                <th style="text-align: center !important;">تاريخ الايصال</th>
                <th style="text-align: center !important;">المحصل</th>
                <th style="text-align: center !important;">البند </th>
                <th style="text-align: center !important;">نوع الإيصال</th>
                <th style="text-align: center !important;">طريقة التوريد</th>
                <th style="text-align: center !important;">المبلغ </th>



            </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            $all_value=0;
        if(!empty($all_pills_inbox )){
            foreach($all_pills_inbox as $row){

                $all_value=$all_value+$row->value;

                if($row->person_type == 1){
                    if($row->person_type ==1){
                        $name = $row->MemberDetails['k_name'];
                    }elseif ($row->person_type ==2){
                        $name = $row->MemberDetails['d_name'];
                    }elseif ($row->person_type ==3){
                        $name =$row->MemberDetails['name'];
                    }

                }elseif($row->person_type == 0){
                    $name =$row->person_name;
                }
                ?>
                <tr>
                    <td><?=$x+1?></td>
                    <td><?=$row->pill_num?></td> <input type="hidden" name="rkm_esal[]" value="<?=$row->pill_num?> ">
                    <td><?=$row->pill_date?></td>
                    <td><?=$row->publisher_name?></td> <input type="hidden" name="publisher_name[]" value="<?=$row->person_name?> ">
                    <td><?=$row->band_title?></td><input type="hidden" name="band_id[]" value="<?=$row->bnd_type1?> ">
                    <td><?=$row->pill_type_title?></td>
                    <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                    <td><?=$row->value1?></td> <input type="hidden" name="value[]" value="<?=$row->value1?> ">




                </tr>

                <?php  $x++;   } }?>
            <?php
            if(isset($all_pills_inbox2)&&!empty($all_pills_inbox2)){
            foreach($all_pills_inbox2 as $row){

                $all_value=$all_value+$row->value;

                if($row->person_type == 1){
                    if($row->person_type ==1){
                        $name = $row->MemberDetails['k_name'];
                    }elseif ($row->person_type ==2){
                        $name = $row->MemberDetails['d_name'];
                    }elseif ($row->person_type ==3){
                        $name =$row->MemberDetails['name'];
                    }

                }elseif($row->person_type == 0){
                    $name =$row->person_name;
                }
                ?>
                <tr>
                    <td><?=$x+1?></td>
                    <td><?=$row->pill_num?></td> <input type="hidden" name="rkm_esal[]" value="<?=$row->pill_num?> ">
                    <td><?=$row->pill_date?></td>
                    <td><?=$row->publisher_name?></td> <input type="hidden" name="publisher_name[]" value="<?=$row->person_name?> ">
                    <td><?=$row->band_title?></td><input type="hidden" name="band_id[]" value="<?=$row->bnd_type1?> ">
                    <td><?=$row->pill_type_title?></td>
                    <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                    <td><?=$row->value2?></td> <input type="hidden" name="value[]" value="<?=$row->value2?> ">




                </tr>

                <?php  $x++; }  } ?>

            </tbody>
        </table>
            <?php if($pay_method ==1||$pay_method ==2){?>
            <input type="submit" class="btn-add btn" value="ترحيل">
            <?php } ?>
        </form>






</div>
