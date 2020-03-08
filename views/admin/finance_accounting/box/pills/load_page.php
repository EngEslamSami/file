<div class="panel-body">


    <?php
    $x=0;
    $all_value=0;
    if(isset($all_pills_inbox) &&!empty($all_pills_inbox)){
    foreach($all_pills_inbox as $row){

        $all_value=$all_value+$row->value;

        $x++;   } }
    ?>

<!--
    <div class="col-xs-12">
        <div class="col-xs-6 text-center">
            <h5 style="padding: 10px; border: 2px solid #437500;"> عدد الإيصالات : <span><?= $x?></span>	</h5>

        </div>
        <div class="col-xs-6 text-center">
            <h5 style="padding: 10px; border: 2px solid #750000;"> المجموع :  <span><?= $all_value?></span></h5>


        </div>


    </div>
-->
    <div class="col-xs-12">
        <div class="col-xs-6 text-center">
            <h5 style="padding: 10px; border: 2px solid #437500;"> عدد الإيصالات : <span id="x" ><?= $x?></span>	</h5>
<input type="text" value="<?php echo $x;?>" id="x">
<input type="text" value="<?php echo $last_quod;?>" id="last_quod">
        </div>
        <div class="col-xs-6 text-center">
            <h5 style="padding: 10px; border: 2px solid #750000;"> المجموع :  <span id="t_total"><?= $all_value?></span></h5>


        </div>


    </div>
    
    
    <?php
    $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');?>


    <form id="myform2" action="<?php echo base_url();?>finance_accounting/box/pills/Pill/convert_esal/<?php echo $pay_method;?>" method="post">
        <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
            <thead>
            <tr class="info">
                <th style="text-align: center !important;">م</th>
                <th style="text-align: center !important;">رقم الإيصال</th>
                <th style="text-align: center !important;">تاريخ الايصال</th>
                <th style="text-align: center !important;">المحصل</th>
                <th style="text-align: center !important;">البند </th>



                <th style="text-align: center !important;">طريقة التوريد</th>
                <th style="text-align: center !important;">المبلغ </th>



            </tr>
            </thead>
            <tbody>
            <?php 
          
            ?>
            <input type="hidden" value="<?php echo $publisher_text;?>" name="publisher_text">
            <input type="hidden" value="<?php echo $all_value;?>" name="total_value">
            <input type="hidden" name="rkm_quod" value="<?php echo $rkm_quod;?>" >
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
                    <tr style="display: none"> <input type="hidden" name="value_sand[]" value="<?=$row->value1?> ">
                        <input type="hidden" name="code_el_dayen[]" value="<?=$row->bank_account_code?> ">
                        <input type="hidden" name="pay_method[]" value="<?=$row->pay_method?> ">
                        <input type="hidden" name="date_esal[]" value="<?=$row->pill_date?> ">
                        <input type="hidden" name="rkm_hesab[]" value="<?=$row->bank_account_code?> ">



                        <td><?=$x+1?></td> <input type="hidden" name="about[]" value="<?=$row->about?> ">
                        <td><?=$row->pill_num?></td> <input type="hidden" name="rkm_esal[]" value="<?=$row->pill_num?> ">
                        <td><?=$row->pill_date?></td>
                        <td><?=$row->publisher_name?></td> <input type="hidden" name="publisher_name[]" value="<?=$row->person_name?> ">
                        <td><?=$row->band_title1?></td><input type="hidden" name="band_id[]" value="<?=$row->bnd_type1?> ">

                        <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo $pay_method_arr[$row->pay_method]; } ?></td>
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
                    <tr style="display: none;">
                        <input type="hidden" name="value_sand[]" value="<?=$row->value2?> ">
                        <input type="hidden" name="code_el_dayen[]" value="<?=$row->bank_account_code?> ">
                        <input type="hidden" name="pay_method[]" value="<?=$row->pay_method?> ">
                        <input type="hidden" name="date_esal[]" value="<?=$row->pill_date?> ">
                        <input type="hidden" name="rkm_hesab[]" value="<?=$row->bank_account_code?> ">
                        <td><?=$x+1?></td>
                        <td><?=$row->pill_num?></td> <input type="hidden" name="rkm_esal[]" value="<?=$row->pill_num?> ">
                        <td><?=$row->pill_date?></td> <input type="hidden" name="about[]" value="<?=$row->about?> ">
                        <td><?=$row->publisher_name?></td> <input type="hidden" name="publisher_name[]" value="<?=$row->person_name?> ">
                        <td><?=$row->band_title2?></td><input type="hidden" name="band_id[]" value="<?=$row->bnd_type2?> ">

                        <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                        <td><?=$row->value2?></td> <input type="hidden" name="value[]" value="<?=$row->value2?> ">




                    </tr>

                    <?php  $x++; }  } ?>
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
                    <tr >
                        <input type="hidden" name="device[]" value="<?=$row->device_num?> ">
                        <input type="hidden" name="bank_account_code[]" value="<?=$row->bank_account_code?> ">
                        <input type="hidden" name="maden[]" value="<?=$row->value?> ">
                        <input type="hidden" name="pill_num[]" value="<?=$row->pill_num?> ">
                        <input type="hidden" name="method[]" value="<?=$row->pay_method?> ">
                        <input type="hidden" name="person[]" value="<?=$row->person_name?> ">
                        <input type="hidden" name="bank_aaccount_num[]" value="<?=$row->bank_account_num?> ">
                        <input type="hidden" name="pill_date[]" value="<?=$row->pill_date?> ">
                        <input type="hidden" name="marg3_num[]" value="<?=$row->marg3_num?> ">
                        
                        <td><?=$x+1?></td>
                        <td><?=$row->pill_num?></td>
                        <td><?=$row->pill_date?></td>
                        <td><?=$row->publisher_name?></td>
                       <!-- <td><?=$row->band_title1?><br><?=$row->band_title2?>  </td>-->
                       
                       <td><?php if(!empty($row->band_title1)){ echo$row->band_title1; } ?>
                        <?php if(!empty($row->band_title2)){ echo '<br>' .$row->band_title2; } ?>  </td>


                        <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo $pay_method_arr[$row->pay_method]; } ?></td>
                        <td><?=$row->value?></td>




                    </tr>

                    <?php  $x++;   } }?>

            </tbody>
        </table>
        <?php if($x!=0){?>
        <!--
            <input style="    margin-bottom: -131px;" type="submit" class="btn-add btn" value="ترحيل">-->
             <input style="margin-bottom: -131px;" <?php if($pay_method==3){?> type="button" onclick="t3amel();" <?php }else{ ?> type="submit" <?php } ?> class="btn-add btn" value="ترحيل">
			
			
            
        <?php } ?>
    </form>






</div>
