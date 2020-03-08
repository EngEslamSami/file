



                <div id="">
                    <?php $date_from='';  $date_to=''; $value=''; $status=''; if(!empty($result_Kfala_data)){

                        if( $result_Kfala_data['person_type'] ==2){
                            if( empty( $result_Kfala_data['second_date_from_ar']) &&
                                empty( $result_Kfala_data['second_date_to_ar'])
                            ){
                                $date_from =$result_Kfala_data['first_date_from_ar'];
                                $date_to =$result_Kfala_data['first_date_to_ar'];
                                $value =$result_Kfala_data['first_value'];
                                $status =$result_Kfala_data['first_status'];
                            }else{
                                $date_from =$result_Kfala_data['second_date_from_ar'];
                                $date_to =$result_Kfala_data['second_date_to_ar'];
                                $value =$result_Kfala_data['second_value'];
                                $status =$result_Kfala_data['second_status'];
                            }

                        }else{

                            $date_from =$result_Kfala_data['first_date_from_ar'];
                            $date_to =$result_Kfala_data['first_date_to_ar'];
                            $value =$result_Kfala_data['first_value'];
                            $status =$result_Kfala_data['first_status'];

                        }


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

                                        <label class="label top-label">		تاريخ بداية الكفالة</label>
                                        <input type="date" name="from_date" data-validation="required"
                                               id="from_date" value="<?php echo $date_from;?>"
                                               class="form-control bottom-input  "
                                               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                                               onchange="checkYear($(this).val());">
                                    </div>
                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">تاريخ نهاية الكفالة</label>

                                        <input type="date" name="to_date" data-validation="required"
                                               id="to_date" value="<?php echo $date_to;?>"
                                               class="form-control bottom-input  "
                                               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                                               onchange="checkYear($(this).val());">
                                    </div>

                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">   تنبيه الإنتهاء </label>

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

                                    <div class="form-group col-md-2  col-sm-6 padding-4">

                                        <label class="label top-label">    مقدار الكفالة </label>
                                        <input type="text" name="k_value" id="k_value" data-validation="required"
                                               onkeypress="validate_number(event);" value="<?=$value?>" class="form-control bottom-input">
                                    </div>

                                    <div class="form-group col-md-2  col-sm-6 padding-4">

                                        <label class="label top-label">    حالة الكفالة </label>
                                        <select name="kafala_status" id="kafala_status" data-validation="required"
                                                class="form-control bottom-input " aria-required="true">
                                            <option value="">إختر</option>
                                            <?php
                                            if(isset($kafala_status) && !empty($kafala_status)) {
                                                foreach ($kafala_status as $row){
                                                    ?>
                                                    <option value="<?php echo$row->id;?>"
                                                        <?php if(!empty($status)){
                                                            if($row->id == $status){ echo 'selected'; }
                                                        } ?>>
                                                        <?php echo$row->title;?></option >
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">  طريقة التوريد </label>
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
                                </div>


                                <div class="col-md-12 no-padding">
                                    <?php if(!empty($result_Kfala_data['pay_method'])){ ?> <?php } ?>
                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">   إسم البنك </label>
                                        <select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input empty"
                                                disabled="disabled"     aria-required="true" >
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


                                    <div class="form-group col-md-4  col-sm-6 padding-4">

                                        <label class="label top-label">   رقم حساب الكافل </label>
                                        <input type="text" name="bank_account_num" id="bank_account_num"
                                               disabled="disabled"    onkeyup="length_hesab_om($(this).val());"
                                               value="<?php if(!empty($result_Kfala_data['bank_account_num'])){
                                                   echo $result_Kfala_data['bank_account_num'];}?>"
                                               class="form-control bottom-input empty" data-validation-has-keyup-event="true">
                                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                                    </div>



                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">  تاريخ بداية الأمر المستديم </label>
                                        <input type="date" name="mostdem_from_date"
                                               id="mostdem_from_date" disabled="disabled"
                                               value="<?php if(!empty($result_Kfala_data['mostdem_from_date'])){
                                                   echo $result_Kfala_data['mostdem_from_date'];}?>"
                                               class="form-control bottom-input empty "
                                               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                                               onchange="checkYear($(this).val());">
                                    </div>
                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">   تاريخ نهاية الأمر المستديم </label>
                                        <input type="date" name="mostdem_to_date"
                                               id="mostdem_to_date" disabled="disabled"
                                               value="<?php if(!empty($result_Kfala_data['mostdem_to_date'])){
                                                   echo $result_Kfala_data['mostdem_to_date'];}?>"
                                               class="form-control bottom-input empty"
                                               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                                               onchange="checkYear($(this).val());">
                                    </div>
                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">   صورة الأمر المستديم </label>
                                        <input type="file" name="mostdem_img" id="mostdem_img" class="form-control bottom-input" disabled="disabled"  >
                                    </div>
                                </div>


                                <div class="col-md-12 no-padding">



                                    <div class="form-group col-md-2  col-sm-6 padding-4">
                                        <label class="label top-label">   حساب الجمعية </label>

                                        <select name="gamia_account" id="gamia_account"
                                                class="form-control   bottom-input  empty"   onchange="GetAccounts(this.value)"
                                                aria-required="true" disabled="disabled" >
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
                                        <label class="label top-label">   إسم البنك </label>
                                        <select name="gamia_bank_id_fk" id="gamia_bank_id_fk" class="form-control bottom-input empty"
                                                onchange="GetBankAccount(this.value,$('#gamia_account').val())"	 aria-required="true" disabled="disabled" >
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
                                        <label class="label top-label">   رقم الحساب الجمعية </label>
                                        <select name="gamia_account_num" id="gamia_account_num" class="form-control  bottom-input empty"
                                                aria-required="true" disabled="disabled"  >
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

                <script>
                    function GetPayType(valu) {
                        $('.empty').val('');
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
                                var  html='<option>إختر </option>';
                                for(i=0; i<JSONObject.length ; i++){
                                    html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].account_num + '</option>';

                                }
                                $("#bank_account_num").html(html);
                            }
                        });


                    }

                </script>
