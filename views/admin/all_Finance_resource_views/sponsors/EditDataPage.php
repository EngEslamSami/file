<style>
.label{
    font-size: 15px !important;
}
</style>
<?php
/*
echo '<pre>';
print_r($members);
*/
 ?>
 

                <div id="">
                    <div class="col-md-12">
                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ">نوع الكفالة </label>
                        </div>
                        <?php
                        if(isset($kfalat_types)&&!empty($kfalat_types)) {
                            foreach($kfalat_types as $value){
                                ?>
                                <input  type="radio" name="kafala_type_fk" style="margin-right: 15px" onclick="check_kafal(<?=$value->id ?>,<?php echo $result_Kfala_data['person_id_fk'] ;?>)" value="<?=$value->id ?>"
                                    <?php if(!empty($result_Kfala_data)){
                                        if($result_Kfala_data['kafala_type_fk'] == $value->id){echo 'checked'; } } ?>  disabled data-validation="required">

                                <label
                                 <?php if(!empty($result_Kfala_data)){
                                        if($result_Kfala_data['kafala_type_fk'] == $value->id){
                                               echo 'checked';?>
                                               style="color: red !important;"
                                           <?php     } } ?>
                                
                                 for="square-radio-1"><?=$value->title?></label>
                                <?php
                            }
                        }
                        ?>
                    </div>





                    <?php $date_from='';  $date_to=''; $value=''; $status=''; $reason = ''; 
                    if(!empty($result_Kfala_data)){





                        if( $result_Kfala_data['person_type'] ==2){
                            if( empty( $result_Kfala_data['second_date_from_ar']) &&
                                empty( $result_Kfala_data['second_date_to_ar'])
                            ){
                                $date_from =$result_Kfala_data['first_date_from_ar'];
                                $date_to =$result_Kfala_data['first_date_to_ar'];
                                $value =$result_Kfala_data['first_value'];
                                $status =$result_Kfala_data['first_status'];
                                $reason =$result_Kfala_data['first_kafala_reason'];
                                $suspension_type =$result_Kfala_data['first_suspension_type'];
                            }else{
                                $date_from =$result_Kfala_data['second_date_from_ar'];
                                $date_to =$result_Kfala_data['second_date_to_ar'];
                                $value =$result_Kfala_data['second_value'];
                                $status =$result_Kfala_data['second_status'];
                                $suspension_type =$result_Kfala_data['second_suspension_type'];
                            }

                        }else{

                            $date_from =$result_Kfala_data['first_date_from_ar'];
                            $date_to =$result_Kfala_data['first_date_to_ar'];
                            $value =$result_Kfala_data['first_value'];
                            $status =$result_Kfala_data['first_status'];
                            $reason =$result_Kfala_data['first_kafala_reason'];
                            $suspension_type =$result_Kfala_data['first_suspension_type'];
                        }


                        $date_from_h =$result_Kfala_data['from_date_h'];
                        $date_to_h =$result_Kfala_data['to_date_h'];

                        ?>
                        <!--------------------------------------------------------------------->
                        <div class="">
                            <?php

                            if( $result_Kfala_data['kafala_type_fk'] ==4) {


                                $gender = 'ذكر';
                                if ( $armal['m_gender'] == 2) {
                                    $gender = 'أنثى';
                                }

                                $category = 'أرمل';
                                if( $armal['m_birth_date_hijri'] !=''){

                                    $armal['m_birth_date_hijri'] =$armal['m_birth_date_hijri'];

                                }else{

                                    $armal['m_birth_date_hijri'] ='غير محدد';
                                }

                                if( $armal['m_birth_date_hijri_year'] !=''){

                                    $age = $current_hijry_year - $armal['m_birth_date_hijri_year'];

                                }else{

                                    $age =0;
                                }
                                $arr2 =
                                    '<td>'.$armal['file_num'].'</td>
                                  <td>'.$armal['father_name'].'</td>
                                  <td>'.$armal['full_name'].'</td>
                                  <td>'.$category.'</td>
                                  <td>'.$gender.'</td>
                                  <td>'.$armal['m_birth_date_hijri'].'</td>
                                  <td>'.$age.'</td>
                                  <td></td>
                                 <td style="background-color: '.$armal['halt_elmostafid_color'].'; padding:.2em .6em .3em;">'.$armal['halt_elmostafid_title'].'
                                 </td>';




                            }else{
                                /*
                               echo '<pre>';
                                print_r($members);*/

                                $type = 'ذكر';
                                if ($members['member_gender'] == 2) {
                                    $type = 'أنثى';
                                }
                                $category = 'يتيم';
                                if ($members['categoriey_member'] == 3) {
                                    $category = 'مستفيد بالغ';
                                }

                                if( $members['member_birth_date_hijri'] !=''){

                                    $members['member_birth_date_hijri'] =$members['member_birth_date_hijri'];

                                }else{

                                    $members['member_birth_date_hijri'] ='غير محدد';
                                }

                                if( $members['member_birth_date_hijri_year'] !=''){

                                    $age = $current_hijry_year - $members['member_birth_date_hijri_year'];

                                }else{

                                    $age =0;
                                }

                                $arr2 =
                                    '<td>'.$members['file_num'].'</td>
                                  <td>'.$members['father_name'].'</td>
                                  <td>'.$members['member_full_name'].'</td>
                                  <td>'.$category.'</td>
                                  <td>'.$type.'</td>
                                  <td>'.$members['member_birth_date_hijri'].'</td>
                                  <td>'.$age.'</td>
                                  <td></td>
                                   <td style="background-color: '.$members['halt_elmostafid_color'].'; padding:.2em .6em .3em;">
                         '.$members['halt_elmostafid_title'].'
                                 </td>';




                            }
                            ?>

                            <table  class="table table-striped table-bordered dt-responsive nowrap ">
                                <thead>
                                <tr class="info">
                                    <th style="width: 80px;">ملف الأسرة </th>
                                    <th style="width: 170px;" >إسم العائلة</th>
                                    <th style="width: 170px;" >إسم المستفيد</th>
                                    <th style="width: 90px;">فئة المستفيد</th>
                                    <th style="width: 90px;">الجنس</th>
                                    <th style="width: 90px;">تاريخ الميلاد</th>
                                    <th style="width: 60px;">العمر</th>
                                    <th style="width: 60px;">الفئة</th>
                                    <th style="width: 60px;">الحالة</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php echo $arr2;?>
                                </tr>
                                </tbody>
                            </table>


                            <br>

                            <div class="">

                                <div class="col-md-12 no-padding">
                                    <div class="form-group col-md-2  col-sm-6 padding-4">

                                        <label style="text-align: center !important;" class="label ">
                                         <img style="width: 17px;float: right; " src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                                        	تاريخ بداية الكفالة
                                             <img style="width: 17px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
                                            </label>


    <div id="cal-1" style="width: 50%;float: left;">
        <input id="date-Miladi" name="from_date" class="form-control bottom-input  "
               value="<?php echo $date_from;?>" type="text" onfocus="showCal1();"  style=" width: 100%;float: right"  />
      <!--  <button class="icon-button" onclick="showCal1();" type="button" style="width: 25px;height: 34px">م</button>
      -->
    </div>
    <div id="cal-2" style="width: 50%;float: right;">
        <input id="date-Hijri" name="from_date_h" class="form-control bottom-input "  value="<?=$date_from_h?>"
               type="text"  onfocus="showCal2();" value="" style=" width: 100%;float: right"/>
        <!--<button class="icon-button" onclick="showCal2();" type="button" style="width: 25px;height: 34px">هـ</button>
   -->
    </div>


                                    </div>
                                    
   <!--get_date()-->                                 
<div class="form-group col-md-1  col-sm-6 padding-4">
    <label class="label ">   مده الكفاله  </label>

    <select id="kafala_period"  class="form-control bottom-input "data-validation="required"
            name="kafala_period"  onchange="">
        <option value="">إختر</option>
        <?php
        $kafala_period = array(
            '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
            '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => '12 أشهر',

        );
        if(isset($kafala_period)&&!empty($kafala_period)) {
            for($a=1;$a<=sizeof($kafala_period);$a++){
                ?>
                <option value="<?php echo $a;?>"
                    <?php if(!empty($kafala_period)){
                        if($a == $result_Kfala_data['kafala_period']){ echo 'selected'; }
                    } ?>> <?php echo $kafala_period[$a];?></option >
                <?php
            }
        }
        ?>
    </select>
</div>                                  
                                    
                                    
                                    
                                    
                                    
<div class="form-group col-md-2  col-sm-6 padding-4">
    <label class="label "  style="text-align: center !important;">
       <img style="width: 17px;float: right;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
    تاريخ نهاية الكفالة 
       <img style="width: 17px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />
      </label>


    <div id="cal-end-1" style="width: 50%;float: left;">
        <input id="date-Miladi-end"  name="to_date" 
        class="form-control bottom-input "  value="<?php echo $date_to;?>"  
        name="to_date" type="text" onfocus="showCalEnd1();"  
         style=" width: 100%;float: right" />
      <!--  <button class="icon-button" onclick="showCalEnd1();" type="button" style="width: 25px;height: 34px">م</button>
   -->
    </div>
    <div id="cal-end-2" style="width: 50%;float: right;">
        <input id="date-Hijri-end"  name="to_date_h" class="form-control bottom-input " 
             type="text" value="<?=$date_to_h?>"

               onfocus="showCalEnd2();" value="" style=" width: 100%;float: right"/>
      <!--  <button class="icon-button" onclick="showCalEnd2();" type="button" style="width: 25px;height: 34px">هـ</button>
   -->
    </div>

    <!--<input type="date" name="to_date" data-validation="required"
           id="to_date" value="<?php echo $date_to;?>"
           class="form-control bottom-input  "
           data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
           onchange="checkYear($(this).val());">-->
</div>

            <div class="form-group col-md-1  col-sm-6 padding-4">
                <label class="label ">   تنبيه الإنتهاء </label>

                <select id="alert_type"  class="form-control bottom-input "data-validation="required"
                        name="alert_type"  onchange="GetDays($(this).val())">
                    <option value="">إختر</option>
                    <?php
                    $alert_type_arr =array('إختر','يوم','أسبوع','أسبوعين','شهر');
                    if(isset($alert_type_arr)&&!empty($alert_type_arr)) {
                        for($a=1;$a<sizeof($alert_type_arr);$a++){
                            ?>
                            <option value="<?php echo $a;?>"
                                <?php if(!empty($result_Kfala_data['alert_type'])){
                                    if($a == $result_Kfala_data['alert_type']){ echo 'selected'; }
                                } ?>> <?php echo $alert_type_arr[$a];?></option >
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
                  

            <div class="form-group col-md-1  col-sm-6 padding-4">

                <label class="label ">    مقدار الكفالة </label>
                <input type="text" name="k_value" id="k_value" data-validation="required"
                       onkeypress="validate_number(event);" value="<?=$value?>" class="form-control bottom-input">
            </div>
        <div class="form-group col-md-1  col-sm-6 padding-4">

            <label class="label ">    حالة الكفالة </label>
            <select name="kafala_status" id="kafala_status" data-validation="required"
                    onchange="get_reasons($(this).val())"   class="form-control bottom-input " aria-required="true">
                <option value="">إختر</option>
                <option value="1"
                    <?php if(!empty($status)){
                        if($status  ==1){
                            echo 'selected';
                        }
                    } ?>>منتظم</option>
                <option value="2"
                    <?php if(!empty($status)){
                        if($status  ==2){
                            echo 'selected';
                        }
                    } ?>
                >موقوف</option>


      <!--          <?php
/*                if(isset($kafala_status) && !empty($kafala_status)) {
                    foreach ($kafala_status as $row){
                        */?>
                        <option value="<?php /*echo$row->id;*/?>"
                            <?php /*if(!empty($status)){
                                if($row->id == $status){ echo 'selected'; }
                            } */?>>
                            <?php /*echo$row->title;*/?></option >
                        --><?php
/*                    }
                }
                */?>
            </select>
        </div>






    <div class="form-group col-md-1  col-sm-6 padding-4">

        <label class="label ">طبيعة الإيقاف</label>
        <select name="suspension_type" id="suspension_type" data-validation="required"

            <?php if(!empty($status)){
                if($status ==2){
                    echo"";
                }elseif($status ==1){
                    echo"disabled='disabled'";
                }

            }?>

                class="form-control bottom-input " aria-required="true"  onchange="getReasonsByType($(this).val())">
            <option value="">إختر</option>
            <?php
            $suspension_arr =array(1=>'الملف',2=>'الكافل');

            foreach ($suspension_arr as $key =>$value){
                ?>
                <option value="<?php echo$key;?>"

                    <?php if(!empty($suspension_type)){

                                if($suspension_type  == $key ){
                                    echo 'selected';

                                }

                            } ?>
                >
                    <?php echo$value;?></option >
                <?php
            }

            ?>
        </select>
    </div>
    
    
    
    
        <div class="form-group col-md-3  col-sm-6 padding-4">

        <label class="label ">   الأسباب </label>
        <select name="kafala_reason" id="kafala_reason" data-validation="required"
                class="form-control bottom-input " aria-required="true"

        <?php if(!empty($status)){ 
                if($status ==2){ 
                        $dis="";
                         }elseif($status ==1){ 
                             $dis="disabled='disabled'"; } 
                             
                             }?>
                <?php echo $dis;?>>
            <option value="">إختر</option>
            <?php
            if(isset($halet_kafalaat_reasons) && !empty($halet_kafalaat_reasons)) {
                foreach ($halet_kafalaat_reasons as $row){
                    ?>
                    <option value="<?php echo$row->id;?>"

                        <?php if(!empty($reason)){

                            if($reason  ==$row->id ){
                                echo 'selected';

                            }

                        } ?>
                    >
                        <?php echo$row->reason;?></option >
                    <?php
                }
            }
            ?>
        </select>
    </div>
</div>


<div class="col-md-12 no-padding">






    <div class="form-group col-md-2  col-sm-6 padding-4">
        <label class="label ">  طريقة التوريد </label>
        <select id="pay_method" name="pay_method" class="form-control bottom-input "
                onchange="GetPayType($(this).val())"	 data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php
            $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
            if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                for($a=1;$a<sizeof($pay_method_arr);$a++){
                    ?>
                    <option value="<?php echo$a;?>"
                        <?php if(!empty($result_Kfala_data['pay_method'])){
                            if($a == $result_Kfala_data['pay_method']){ echo 'selected'; }
                        } ?>> <?php echo $pay_method_arr[$a];?></option >
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <?php if(!empty($result_Kfala_data['pay_method'])){ ?> <?php } ?>
    <div class="form-group col-md-2  col-sm-6 padding-4">
        <label class="label ">   إسم البنك </label>
        <select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input empty"
            <?php if($result_Kfala_data['pay_method'] !=5 && $result_Kfala_data['pay_method'] !=7 ){ ?>    disabled="disabled"  <?php } ?>    aria-required="true" >
                <option value="">إختر</option>
            <?php if (!empty($banks)) {
                foreach ($banks as $bank) { ?>
                    <option value="<?php echo $bank->id; ?>"
                        <?php if(!empty($result_Kfala_data['bank_id_fk'])){
                            if($bank->id == $result_Kfala_data['bank_id_fk']){ echo 'selected'; }
                        } ?>><?php echo $bank->ar_name; ?></option>
                <?php }
            } ?>
        </select>
    </div>


    <div class="form-group col-md-3  col-sm-6 padding-4">

        <label class="label ">   رقم حساب الكافل
         <small style="color: red; font-size: 14px !important;">( رقم الحساب لابد أن يكون24رقم )</small>
         </label>
        <input type="text" name="bank_account_num" id="bank_account_num"
            <?php if($result_Kfala_data['pay_method'] !=5 && $result_Kfala_data['pay_method'] !=7 ){ ?>    disabled="disabled"  <?php } ?>    onkeyup="length_hesab_om($(this).val());"
               value="<?php if(!empty($result_Kfala_data['bank_account_num'])){
                   echo $result_Kfala_data['bank_account_num'];}?>"
               class="form-control bottom-input empty" data-validation-has-keyup-event="true">
       
    </div>



 <div class="form-group col-md-2  col-sm-6 padding-4">
						
                 <label class="label "  style="text-align: center !important;">
                    <img style="width: 17px;float: right;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
                    	 بداية الأمر المستديم
                   <img style="width: 17px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />         
                            </label>
        	  <div id="cal-22" style="width: 50%;float: right;">
					  <input id="mostadem-date-Hijri" name="mostdem_from_date_h"
                       class="form-control bottom-input "  
                          type="text"  onfocus="showCal22();" 
                            <?php if( $result_Kfala_data['pay_method'] !=7 ){ ?>   
                       disabled="disabled"  <?php } ?>
               value="<?php if(!empty($result_Kfala_data['mostdem_from_date_h'])){
                   echo $result_Kfala_data['mostdem_from_date_h'];}?>"
                             style=" width: 100%;float: right"/>

				  </div>
                                   
                                  
				  <div id="cal-11" style="width: 50%;float: left;">
					  <input id="mostadem-date-Miladi" name="mostdem_from_date_m"
                        class="form-control bottom-input  "
                             <?php  if( $result_Kfala_data['pay_method'] !=7 ){ ?>
                       disabled="disabled"  <?php } ?>
               value="<?php if(!empty($result_Kfala_data['mostdem_from_date_m'])){
                   echo $result_Kfala_data['mostdem_from_date_m'];}?>"
                           type="text" onfocus="showCal11();"  style=" width: 100%;float: right"  />

				  </div>
	  </div>



    <div class="form-group col-md-2  col-sm-6 padding-4">

        <label class="label"  style="text-align: center !important;">
            <img style="width: 17px;float: right;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png" />
            نهاية الأمر المستديم
            <img style="width: 17px;float: left;" src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png" />

        </label>


        <div id="cal-end-22"  style="width: 50%;float: right;">
            <input id="mostadem-date-Hijri-end"  name="mostdem_to_date_h"
                   class="form-control bottom-input " type="text"
                <?php if( $result_Kfala_data['pay_method'] !=7 ){ ?>
                    disabled="disabled"  <?php } ?>
                   value="<?php if(!empty($result_Kfala_data['mostdem_to_date_h'])){
                       echo $result_Kfala_data['mostdem_to_date_h'];}?>"
                   onfocus="showCalEnd22();"  style=" width: 100%;float: right"/>

        </div>
        <div id="cal-end-11" style="width: 50%;float: left;">
            <input id="mostadem-date-Miladi-end"  name="mostdem_to_date_m"
                <?php  if( $result_Kfala_data['pay_method'] !=7 ){ ?>
                    disabled="disabled"  <?php } ?>
                   value="<?php if(!empty($result_Kfala_data['mostdem_to_date_m'])){
                       echo $result_Kfala_data['mostdem_to_date_m'];}?>"
                   class="form-control bottom-input "
                   name="to_date" type="text" onfocus="showCalEnd11();"
                   style=" width: 100%;float: right" />

        </div>


    </div>


    

    




<!--
    <div class="form-group col-md-2  col-sm-6 padding-4">
        <label class="label ">  تاريخ بداية الأمر المستديم </label>
        <input type="date" name="mostdem_from_date"
               id="mostdem_from_date"  <?php if( $result_Kfala_data['pay_method'] !=7 ){ ?>   
                       disabled="disabled"  <?php } ?>
               value="<?php if(!empty($result_Kfala_data['mostdem_from_date'])){
                   echo $result_Kfala_data['mostdem_from_date'];}?>"
               class="form-control bottom-input empty "
               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
               onchange="checkYear($(this).val());">
    </div>
    <div class="form-group col-md-2  col-sm-6 padding-4">
        <label class="label ">   تاريخ نهاية الأمر المستديم </label>
        <input type="date" name="mostdem_to_date"
               id="mostdem_to_date"  <?php if( $result_Kfala_data['pay_method'] !=7 ){ ?>  
                      disabled="disabled"  <?php } ?>
               value="<?php if(!empty($result_Kfala_data['mostdem_to_date'])){
                   echo $result_Kfala_data['mostdem_to_date'];}?>"
               class="form-control bottom-input empty"
               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
               onchange="checkYear($(this).val());">
    </div>
    -->

</div>


<div class="col-md-12 no-padding">

    <div class="form-group col-md-3  col-sm-6 padding-4">
        <label class="label ">   صورة الأمر المستديم </label>
        <input type="file" name="mostdem_img" id="mostdem_img" class="form-control bottom-input"  <?php if( $result_Kfala_data['pay_method'] !=7 ){ ?>    disabled="disabled"  <?php } ?>  >

    </div>


    <div class="form-group col-md-2  col-sm-6 padding-4">
        <label class="label ">   حساب الجمعية </label>

        <select name="gamia_account" id="gamia_account"
                class="form-control   bottom-input  empty"   onchange="GetAccounts(this.value)"
                aria-required="true"  <?php if($result_Kfala_data['pay_method'] !=5 && $result_Kfala_data['pay_method'] !=7 ){ ?>
            disabled="disabled"  <?php } ?> >
            <option value="">إختر</option>
            <?php
            if(!empty($banks_accounts)) {
                foreach($banks_accounts as $row){?>
                    <option value="<?=$row->id?>"
                        <?php if(!empty($result_Kfala_data['gamia_account'])){
                            if($result_Kfala_data['gamia_account'] == $row->id){  echo'selected'; } }?>><?=$row->title?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>



    <div class="form-group col-md-2  col-sm-6 padding-4">
        <label class="label ">   إسم البنك </label>
        <select name="gamia_bank_id_fk" id="gamia_bank_id_fk" class="form-control bottom-input empty"
                onchange="GetBankAccount(this.value,$('#gamia_account').val())"	 aria-required="true"
            <?php if($result_Kfala_data['pay_method'] !=5 && $result_Kfala_data['pay_method'] !=7 ){ ?>
            disabled="disabled"  <?php } ?>>
            <option value="">إختر</option>
            <?php if (!empty($gamia_banks)) {
                foreach ($gamia_banks as $bank) { ?>
                    <option value="<?php echo $bank->id; ?>"
                        <?php if(!empty($result_Kfala_data['gamia_bank_id_fk'])){
                            if($bank->id == $result_Kfala_data['gamia_bank_id_fk']){ echo 'selected'; }
                        } ?>><?php echo $bank->title; ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="form-group col-md-4  col-sm-6 padding-4">
        <label class="label ">   رقم الحساب الجمعية </label>
        <select name="gamia_account_num" id="gamia_account_num" class="form-control  bottom-input empty"
                aria-required="true"  <?php if($result_Kfala_data['pay_method'] !=5 && $result_Kfala_data['pay_method'] !=7 ){ ?>
            disabled="disabled"  <?php } ?> >
            <option value="">إختر</option>
            <?php if (!empty($gamia_account_numbers)) {
                foreach ($gamia_account_numbers as $row) { ?>
                    <option value="<?php echo $row->id; ?>"
                        <?php if(!empty($result_Kfala_data['gamia_account_num'])){
                            if($row->id == $result_Kfala_data['gamia_account_num']){ echo 'selected'; }
                        } ?>><?php echo $row->account_num; ?></option>
                <?php }
            } ?>
        </select>
    </div>

</div>
<div class="col-md-12 no-padding">
<?php

/*
echo '<pre>';
print_r($members);
*/
if($result_Kfala_data['kafala_type_fk'] != 4 ){
if($members['halt_elmostafid_member'] != 1){ ?>
   
    <div style="color: black !important;" class="alert alert-danger" role="alert">
  حالة المستفيد غير نشط كليا .... يرجي إيقاف الكفالة وربط الكافل بأخر !
</div> 
<?php }
}
 ?>
</div>






    </div>
</div>
<input type="hidden" name="mother_national_num_fk" value="<?=$result_Kfala_data['mother_national_num_fk']?>">
<input type="hidden" name="person_id_fk" value="<?=$result_Kfala_data['person_id_fk']?>">
<input type="hidden" name="kafel_id_fk" id="kafel_id_fk" value="<?=$result_Kfala_data['first_kafel_id']?>">
<input type="hidden" name="id" id="id" value="<?=$result_Kfala_data['id']?>">
<input type="hidden" name="person_type" id="person_type" value="<?=$result_Kfala_data['person_type']?>">
<input type="hidden" name="kafala_type_fk" id="kafala_type_fk" value="<?=$result_Kfala_data['kafala_type_fk']?>">
<!--------------------------------------------------------------------->
<?php } ?>
</div>


                <!------------------------------------------------------------------------>
                <script src='<?php echo base_url();?>asisst/admin_asset/js/hijri-date.js'></script>
                <script src='<?php echo base_url();?>asisst/admin_asset/js/calendar.js'></script>




<script type="text/javascript">
    function gmod(n, m) {
        return ((n % m) + m) % m;
    }

    function kuwaiticalendar(adjust) {
        var today = new Date(document.getElementById("date-Miladi-end").value);

        if (adjust) {
            adjustmili = 1000 * 60 * 60 * 24 * adjust;
            todaymili = today.getTime() + adjustmili;
            today = new Date(todaymili);
        }
        day = today.getDate();
        month = today.getMonth();
        year = today.getFullYear();
        m = month + 1;
        y = year;
        if (m < 3) {
            y -= 1;
            m += 12;
        }

        a = Math.floor(y / 100.);
        b = 2 - a + Math.floor(a / 4.);
        if (y < 1583) b = 0;
        if (y == 1582) {
            if (m > 10) b = -10;
            if (m == 10) {
                b = 0;
                if (day > 4) b = -10;
            }
        }

        jd = Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + day + b - 1524;

        b = 0;
        if (jd > 2299160) {
            a = Math.floor((jd - 1867216.25) / 36524.25);
            b = 1 + a - Math.floor(a / 4.);
        }
        bb = jd + b + 1524;
        cc = Math.floor((bb - 122.1) / 365.25);
        dd = Math.floor(365.25 * cc);
        ee = Math.floor((bb - dd) / 30.6001);
        day = (bb - dd) - Math.floor(30.6001 * ee);
        month = ee - 1;
        if (ee > 13) {
            cc += 1;
            month = ee - 13;
        }
        year = cc - 4716;


        wd = gmod(jd + 1, 7) + 1;

        iyear = 10631. / 30.;
        epochastro = 1948084;
        epochcivil = 1948085;

        shift1 = 8.01 / 60.;

        z = jd - epochastro;
        cyc = Math.floor(z / 10631.);
        z = z - 10631 * cyc;
        j = Math.floor((z - shift1) / iyear);
        iy = 30 * cyc + j;
        z = z - Math.floor(j * iyear + shift1);
        im = Math.floor((z + 28.5001) / 29.5);
        if (im == 13) im = 12;
        id = z - Math.floor(29.5001 * im - 29);

        var myRes = new Array(8);

        myRes[0] = day; //calculated day (CE)
        myRes[1] = month; //calculated month (CE)
        myRes[2] = year; //calculated year (CE)
        myRes[3] = jd - 1; //julian day number
        myRes[4] = wd - 1; //weekday number
        myRes[5] = id; //islamic date
        myRes[6] = im; //islamic month
        myRes[7] = iy; //islamic year

        return myRes;
    }

    function writeIslamicDate(adjustment) {
        var wdNames = new Array("Ahad", "Ithnin", "Thulatha", "Arbaa", "Khams", "Jumuah", "Sabt");
        var iMonthNames = new Array("Muharram", "Safar", "Rabi'ul Awwal", "Rabi'ul Akhir",
            "Jumadal Ula", "Jumadal Akhira", "Rajab", "Sha'ban",
            "Ramadan", "Shawwal", "Dhul Qa'ada", "Dhul Hijja");
        var iDate = kuwaiticalendar(adjustment);
        var outputIslamicDate = (iDate[5]) + '/' + (iDate[6]) + '/' + iDate[7];
        return outputIslamicDate;
    }
</script>



<script>

    function get_date() {

        var kafala_period = parseInt($('#kafala_period').val());

        console.warn("kafala_period ::"+kafala_period);
        if (isNaN(kafala_period)) {
            kafala_period=0;
        }
        var date = new Date(document.getElementById("date-Miladi").value);
        day = date.getDate();
        month = date.getMonth() + 1 + kafala_period;
        year = date.getFullYear();
        document.getElementById("date-Miladi-end").value = month + '/26' + '/' + year;

        document.getElementById("date-Hijri-end").value = writeIslamicDate();

        // document.getElementById("num_days").value = diffDays + 1;
        // return diffDays + 1;

    }
</script>


<!--
                <script>
                    function GetPayType(valu) {
                        $('.empty').val('');
                        $('#gamia_account_num').html('<option value="">إختر </option>');
                        if(valu == 5 || valu ==7){

                            document.getElementById("bank_id_fk").removeAttribute("disabled", "disabled");

               ////22              document.getElementById("bank_id_fk").setAttribute("data-validation", "required");

                            document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");

               ////22              document.getElementById("bank_account_num").setAttribute("data-validation", "required");

                            document.getElementById("gamia_account").removeAttribute("disabled", "disabled");
               ////22              document.getElementById("gamia_account").setAttribute("data-validation", "required");
                            document.getElementById("gamia_bank_id_fk").removeAttribute("disabled", "disabled");
                  ////22           document.getElementById("gamia_bank_id_fk").setAttribute("data-validation", "required");
                            document.getElementById("gamia_account_num").removeAttribute("disabled", "disabled");
                 ////22            document.getElementById("gamia_account_num").setAttribute("data-validation", "required");


                            if(valu ==7){

                                document.getElementById("mostdem_from_date").removeAttribute("disabled", "disabled");

                        ////22         document.getElementById("mostdem_from_date").setAttribute("data-validation", "required");

                                document.getElementById("mostdem_to_date").removeAttribute("disabled", "disabled");

                        ////22         document.getElementById("mostdem_to_date").setAttribute("data-validation", "required");

                                document.getElementById("mostdem_img").removeAttribute("disabled", "disabled");

                                //document.getElementById("mostdem_img").setAttribute("data-validation", "required");
                            }else{


                                document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


                                document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


                                document.getElementById("mostdem_img").setAttribute("disabled", "disabled");

                            }
                        }else{
                            document.getElementById("bank_id_fk").setAttribute("disabled", "disabled");

                     ////22        document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");

                            document.getElementById("bank_account_num").setAttribute("disabled", "disabled");

                     ////22        document.getElementById("bank_account_num").removeAttribute("data-validation", "required");


                            document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


                            document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


                            document.getElementById("mostdem_img").setAttribute("disabled", "disabled");



                            document.getElementById("gamia_account").setAttribute("disabled", "disabled");
                  ////22           document.getElementById("gamia_account").removeAttribute("data-validation", "required");
                            document.getElementById("gamia_bank_id_fk").setAttribute("disabled", "disabled");
                    ////22         document.getElementById("gamia_bank_id_fk").removeAttribute("data-validation", "required");
                            document.getElementById("gamia_account_num").setAttribute("disabled", "disabled");
                     ////22       document.getElementById("gamia_account_num").removeAttribute("data-validation", "required");

                        }

                    }
                </script>
-->

<script>
    function GetPayType(valu) {
        //alert(valu);
        if(valu == 5 || valu ==7){

            document.getElementById("bank_id_fk").removeAttribute("disabled", "disabled");

           // document.getElementById("bank_id_fk").setAttribute("data-validation", "required");

            document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");

           // document.getElementById("bank_account_num").setAttribute("data-validation", "required");

            document.getElementById("gamia_account").removeAttribute("disabled", "disabled");
          //  document.getElementById("gamia_account").setAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").removeAttribute("disabled", "disabled");
           // document.getElementById("gamia_bank_id_fk").setAttribute("data-validation", "required");
            document.getElementById("gamia_account_num").removeAttribute("disabled", "disabled");
          //  document.getElementById("gamia_account_num").setAttribute("data-validation", "required");


            if(valu ==7){

  ///******  document.getElementById("mostdem_from_date").removeAttribute("disabled", "disabled");

document.getElementById("mostadem-date-Hijri").removeAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi").removeAttribute("disabled", "disabled");






                //document.getElementById("mostdem_from_date").setAttribute("data-validation", "required");

//*******document.getElementById("mostdem_to_date").removeAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Hijri-end").removeAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi-end").removeAttribute("disabled", "disabled");







               // document.getElementById("mostdem_to_date").setAttribute("data-validation", "required");

                document.getElementById("mostdem_img").removeAttribute("disabled", "disabled");

                //document.getElementById("mostdem_img").setAttribute("data-validation", "required");
            }else{


  ///******                document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");

document.getElementById("mostadem-date-Hijri").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi").setAttribute("disabled", "disabled");



//******* document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");

document.getElementById("mostadem-date-Hijri-end").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi-end").setAttribute("disabled", "disabled");





                document.getElementById("mostdem_img").setAttribute("disabled", "disabled");

            }
        }else{
            document.getElementById("bank_id_fk").setAttribute("disabled", "disabled");

            //document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");

            document.getElementById("bank_account_num").setAttribute("disabled", "disabled");

           // document.getElementById("bank_account_num").removeAttribute("data-validation", "required");


  ///******            document.getElementById("mostdem_from_date").setAttribute("disabled", "disabled");


document.getElementById("mostadem-date-Hijri").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi").setAttribute("disabled", "disabled");




//******document.getElementById("mostdem_to_date").setAttribute("disabled", "disabled");


document.getElementById("mostadem-date-Hijri-end").setAttribute("disabled", "disabled");
document.getElementById("mostadem-date-Miladi-end").setAttribute("disabled", "disabled");




            document.getElementById("mostdem_img").setAttribute("disabled", "disabled");



            document.getElementById("gamia_account").setAttribute("disabled", "disabled");
           // document.getElementById("gamia_account").removeAttribute("data-validation", "required");
            document.getElementById("gamia_bank_id_fk").setAttribute("disabled", "disabled");
          //  document.getElementById("gamia_bank_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("gamia_account_num").setAttribute("disabled", "disabled");
            //document.getElementById("gamia_account_num").removeAttribute("data-validation", "required");

        }

    }
</script>


                <script>

                    function GetAccounts(valu) {
                        var dataString = 'account_id=' + valu ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/GetAccounts',
                            data:dataString,
                            cache:false,
                            success: function(json_data){
                                var JSONObject = JSON.parse(json_data);

                                var  html='<option>إختر </option>';

                                for(i=0; i<JSONObject.length ; i++){

                                    html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].title + '</option>';

                                }
                                $("#gamia_bank_id_fk").html(html);
                            }
                        });


                    }

                </script>





                <script>

                    function GetBankAccount(bank_id,gamia_id) {

                        var dataString = 'bank_id=' + bank_id +'&account_id_fk=' + gamia_id;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/GetBankAccount',
                            data:dataString,
                            cache:false,
                            success: function(json_data){
                                var JSONObject = JSON.parse(json_data);

                                if(JSONObject.length >1 ){
                                    var  html='<option>إختر </option>';
                                } else if(JSONObject.length ==0){
                                    var  html='<option>إختر </option>';
                                }
                                for(i=0; i<JSONObject.length ; i++){
                                      html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].account_num + '</option>';

                                }
                                $("#gamia_account_num").html(html);
                            }
                        });


                    }

                </script>




	<script>




	var cal1 = new Calendar(),
		cal2 = new Calendar(true, 0, true, true),
		date1 = document.getElementById('date-Miladi'),
		date2 = document.getElementById('date-Hijri'),
		cal1Mode = cal1.isHijriMode(),
		cal2Mode = cal2.isHijriMode();


/*	date1.setAttribute("value",cal1.getDate().getDateString());
	date2.setAttribute("value",cal2.getDate().getDateString());*/

	document.getElementById('cal-1').appendChild(cal1.getElement());
	document.getElementById('cal-2').appendChild(cal2.getElement());


	cal1.show();
	cal2.show();
//	setDateFields1();


	cal1.callback = function () {
		if (cal1Mode !== cal1.isHijriMode()) {
			cal2.disableCallback(true);
			cal2.changeDateMode();
			cal2.disableCallback(false);
			cal1Mode = cal1.isHijriMode();
			cal2Mode = cal2.isHijriMode();
		} else

			cal2.setTime(cal1.getTime());
		setDateFields1();
	};

	cal2.callback = function () {
		if (cal2Mode !== cal2.isHijriMode()) {
			cal1.disableCallback(true);
			cal1.changeDateMode();
			cal1.disableCallback(false);
			cal1Mode = cal1.isHijriMode();
			cal2Mode = cal2.isHijriMode();
		} else

			cal1.setTime(cal2.getTime());
		setDateFields1();
	};


	cal1.onHide = function() {
		cal1.show(); // prevent the widget from being closed
	};

	cal2.onHide = function() {
		cal2.show(); // prevent the widget from being closed
	};
	function setDateFields1() {
	/*	date1.value = cal1.getDate().getDateString();
		date2.value = cal2.getDate().getDateString();*/

		date1.setAttribute("value",cal1.getDate().getDateString());
		date2.setAttribute("value",cal2.getDate().getDateString());
	}

	function showCal1() {
		if (cal1.isHidden())
			cal1.show();
		else
			cal1.hide();
	}

	function showCal2() {
		if (cal2.isHidden())
			cal2.show();
		else
			cal2.hide();
	}



	</script>

<script>


	var calEnd1 = new Calendar(),
		calEnd2 = new Calendar(true, 0, true, true),
		dateEnd1 = document.getElementById('date-Miladi-end'),
		dateEnd2 = document.getElementById('date-Hijri-end'),
		calEnd1Mode = calEnd1.isHijriMode(),
		calEnd2Mode = calEnd2.isHijriMode();


/*	dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
	dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());*/

	document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
	document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



	calEnd1.show();
	calEnd2.show();
//	setDateFieldsEnd1(); 





	calEnd1.callback = function () {
		if (calEnd1Mode !== calEnd1.isHijriMode()) {
			calEnd2.disableCallback(true);
			calEnd2.changeDateMode();
			calEnd2.disableCallback(false);
			calEnd1Mode = calEnd1.isHijriMode();
			calEnd2Mode = calEnd2.isHijriMode();
		} else

			calEnd2.setTime(calEnd1.getTime());
		setDateFieldsEnd1();
         //get_date();
	};

	calEnd2.callback = function () {
		if (calEnd2Mode !== calEnd2.isHijriMode()) {
			calEnd1.disableCallback(true);
			calEnd1.changeDateMode();
			calEnd1.disableCallback(false);
			calEnd1Mode = calEnd1.isHijriMode();
			calEnd2Mode = calEnd2.isHijriMode();
		} else

			calEnd1.setTime(calEnd2.getTime());
		setDateFieldsEnd1();
         //get_date();
	};





	calEnd1.onHide = function() {
		calEnd1.show(); // prevent the widget from being closed
	};

	calEnd2.onHide = function() {
		calEnd2.show(); // prevent the widget from being closed
	};





	function setDateFieldsEnd1() {
	/*	dateEnd1.value = calEnd1.getDate().getDateString();
		dateEnd2.value = calEnd2.getDate().getDateString();*/

		dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
		dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
	}




	function showCalEnd1() {
		if (calEnd1.isHidden())
			calEnd1.show();
		else
			calEnd1.hide();
	}

	function showCalEnd2() {
		if (calEnd2.isHidden())
			calEnd2.show();
		else
			calEnd2.hide();
	}


	//# sourceURL=pen.js

</script>


<!------------------------------------------------------->
<!------------------------------------------------------>

	<script>

	var cal11 = new Calendar(),
		cal22 = new Calendar(true, 0, true, true),
		date11 = document.getElementById('mostadem-date-Miladi'),
		date22 = document.getElementById('mostadem-date-Hijri'),
		cal11Mode = cal11.isHijriMode(),
		cal22Mode = cal22.isHijriMode();


/*	date11.setAttribute("value",cal11.getDate().getDateString());
	date22.setAttribute("value",cal22.getDate().getDateString());*/

	document.getElementById('cal-11').appendChild(cal11.getElement());
	document.getElementById('cal-22').appendChild(cal22.getElement());


	cal11.show();
	cal22.show();
//	setDateFields();


	cal11.callback = function () {
		if (cal11Mode !== cal11.isHijriMode()) {
			cal22.disableCallback(true);
			cal22.changeDateMode();
			cal22.disableCallback(false);
			cal11Mode = cal11.isHijriMode();
			cal22Mode = cal22.isHijriMode();
		} else

			cal22.setTime(cal11.getTime());
		setDateFields();
	};

	cal22.callback = function () {
		if (cal22Mode !== cal22.isHijriMode()) {
			cal11.disableCallback(true);
			cal11.changeDateMode();
			cal11.disableCallback(false);
			cal11Mode = cal11.isHijriMode();
			cal22Mode = cal22.isHijriMode();
		} else

			cal11.setTime(cal22.getTime());
		setDateFields();
	};


	cal11.onHide = function() {
		cal11.show(); // prevent the widget from being closed
	};

	cal22.onHide = function() {
		cal22.show(); // prevent the widget from being closed
	};
	function setDateFields() {
	/*	date11.value = cal11.getDate().getDateString();
		date22.value = cal22.getDate().getDateString();*/

		date11.setAttribute("value",cal11.getDate().getDateString());
		date22.setAttribute("value",cal22.getDate().getDateString());
	}

	function showCal11() {
		if (cal11.isHidden())
			cal11.show();
		else
			cal11.hide();
	}

	function showCal22() {
		if (cal22.isHidden())
			cal22.show();
		else
			cal22.hide();
	}



	</script>




<script>


	var calEnd11 = new Calendar(),
		calEnd22 = new Calendar(true, 0, true, true),
		dateEnd11 = document.getElementById('mostadem-date-Miladi-end'),
		dateEnd22 = document.getElementById('mostadem-date-Hijri-end'),
		calEnd11Mode = calEnd11.isHijriMode(),
		calEnd22Mode = calEnd22.isHijriMode();


/*	dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
	dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());*/

	document.getElementById('cal-end-11').appendChild(calEnd11.getElement());
	document.getElementById('cal-end-22').appendChild(calEnd22.getElement());



	calEnd11.show();
	calEnd22.show();
//	setDateFieldsEnd();





	calEnd11.callback = function () {
		if (calEnd11Mode !== calEnd11.isHijriMode()) {
			calEnd22.disableCallback(true);
			calEnd22.changeDateMode();
			calEnd22.disableCallback(false);
			calEnd11Mode = calEnd11.isHijriMode();
			calEnd22Mode = calEnd22.isHijriMode();
		} else

			calEnd22.setTime(calEnd11.getTime());
		setDateFieldsEnd();
	};

	calEnd22.callback = function () {
		if (calEnd22Mode !== calEnd22.isHijriMode()) {
			calEnd11.disableCallback(true);
			calEnd11.changeDateMode();
			calEnd11.disableCallback(false);
			calEnd11Mode = calEnd11.isHijriMode();
			calEnd22Mode = calEnd22.isHijriMode();
		} else

			calEnd11.setTime(calEnd22.getTime());
		setDateFieldsEnd();
	};





	calEnd11.onHide = function() {
		calEnd11.show(); // prevent the widget from being closed
	};

	calEnd22.onHide = function() {
		calEnd22.show(); // prevent the widget from being closed
	};





	function setDateFieldsEnd() {
	/*	dateEnd11.value = calEnd11.getDate().getDateString();
		dateEnd22.value = calEnd22.getDate().getDateString();*/

		dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
		dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());
	}




	function showCalEnd11() {
		if (calEnd11.isHidden())
			calEnd11.show();
		else
			calEnd11.hide();
	}

	function showCalEnd22() {
		if (calEnd22.isHidden())
			calEnd22.show();
		else
			calEnd22.hide();
	}


	//# sourceURL=pen.js

</script>



                <script>
                    function check_kafal(type_kafa,person_id_fk) {

                        // alert(row_id+person_id_fk);
                        if (type_kafa == 1) {
                            $.ajax({
                                type: 'post',
                                url: "<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/check_kafal",
                                data: {type_kafa: type_kafa, person_id_fk: person_id_fk},


                                success: function (d) {

                                   if(d>0)
                                   {
                                       alert("من فضلك قم بحذف الكفاله الشامله الاولي قبل اضافه الثانيه لهذا اليتيم");
                                       $('.edit_modal_but').hide();


                                   }
                                }

                            });


                        }

                    }


                </script>








                <script>
                    function get_reasons(value) {
                        // alert(value);
                        if(value == 2){
                            $("#suspension_type").removeAttr('disabled');

                        }else{
                            $("#suspension_type").val(' ');

                            $("#suspension_type").attr('disabled','disabled');
                            $("#kafala_reason").val(' ');
                            $("#kafala_reason").attr('disabled','disabled');


                        }

                    }

                </script>
                <script>

                    function getReasonsByType(value) {

                        if(value != ' '){
                            $("#kafala_reason").removeAttr('disabled');
                        }else{
                            $("#kafala_reason").val(' ');
                            $("#kafala_reason").attr('disabled','disabled');

                        }

                        var dataString = 'suspension_type=' + value ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/getReasons',
                            data:dataString,
                            cache:false,
                            success: function(json_data){
                                var JSONObject = JSON.parse(json_data);
                                console.log(JSONObject);
                                /*document.getElementById("value").setAttribute("readonly","readonly");
                                $('#value').val(JSONObject);*/


                                if(JSONObject.length >0 ){
                                    var  html='<option>إختر </option>';


                                    for(i=0; i<JSONObject.length ; i++){
                                        html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].reason + '</option>';

                                    }
                                    $("#kafala_reason").html(html);
                                }
                            }

                        });

                    }

                </script>