
<?php  $this->load->view('web/profile/register_main')  ; ?>

<div class="tab-content col-md-10">

    <form action="<?php echo base_url();?>WebProfile/register_wakeel" method="post">
        <div class="col-md-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> رقم السجل <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 2px;
border-radius: 7px;"> 10 ارقام فقط</span>  <strong class="astric">*</strong> </label>
                <input type="text" minlength="10" maxlength="10" class="form-control half input-style"  name="mother_national_num"
                       value=""  data-validation="required"
                       id="mother_national_num2"  onkeyup="valid_segel_num(0,$(this).val()); chek_length_segel($(this).val())" onkeypress="validate_number(event)">
                <span  id="segel_valid_span" class="span-validation"> </span>
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">كلمة المرور <strong class="astric">*</strong> </label>
                <input type="password" data-validation="required" onkeyup="valid_pass($(this).val()); dublcat();" id="user_pass" class="form-control half input-style"

                       name="user_password"   />
                <span  id="validate_pass" class="span-validation"> </span>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">تاكيد كلمة المرور <strong class="astric">*</strong> </label>
                <input type="password" data-validation="required" id="user_pass_con" onkeyup="valid_pass_com($(this).val());dublcat();"  class="form-control half input-style"

                       name="user_password"  />
                <span  id="validate_pass_com" class="span-validation"> </span>
            </div>
        </div>

        <div class="col-md-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مقر التسجيل ( الفرع )<strong class="astric">*</strong></label>
                <select name="register_place" data-validation="required" class="form-control half"



                        data-show-subtext="true" data-live-search="true"aria-required="true">
                    <option value=""> اختر</option>
                    <?php
                    foreach ($socity_branch as $row2):
                        $selected='';if($row2->id == $register_place){$selected='selected';}	?>
                        <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                    <?php  endforeach;?>
                </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">إسم الوكيل<strong class="astric">*</strong><strong></strong> </label>
                <input type="text" data-validation="required" name="agent_name"
                       id="agent_name" class="form-control half input-style "
                       value=""
                />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رقم الهوية<strong class="astric">*</strong><strong></strong> <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 2px;
border-radius: 7px;"> 10 ارقام فقط</span></label>
                <input type="text" data-validation="required" name="agent_card" id="agent_card"
                       class="form-control half input-style "
                       onkeyup="chek_length_hawya($(this).val());"
                       onkeypress="validate_number(event)"
                       value=""/>

                <span  id="agent_card_span" class="span-validation"> </span>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رقم الجوال<strong class="astric">*</strong><strong></strong><span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 2px;
border-radius: 7px;"> 10 ارقام فقط</span> </label>
                <input type="text" name="agent_mob" data-validation="required"  onkeyup="valid_segel_num(1,$(this).val()); chek_length($(this).val());" id="agent_mob"

                       class="form-control half input-style "
                   
                       onkeypress="validate_number(event)"
                       value=""/>

                <span  id="lenth_mobphone" class="span-validation"> </span>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                <select name="agent_card_source" data-validation="required" id="agent_card_source"
                        class="form-control half">
                    <option value="">إختر</option>
                    <?php if(!empty($id_source)){
                        foreach ($id_source as $record){
                            $select=''; if($agent_card_source==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>>
                                <?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4">

                <label class="label label-green main-label  half">صلة القرابة<strong class="astric">*</strong><strong></strong> </label>

                <select name="agent_relationship" data-validation="required" id="agent_relationship"
                        class="form-control half">
                    <option value="">إختر</option>
                    <?php if(!empty($relationships)){ foreach ($relationships as $record){
                        $select=''; if($agent_relationship==$record->id_setting){$select='selected'; }
                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>

        <div class="col-md-12">

            <div class="form-group col-sm-4 col-xs-12 padding-4">


                <label class="label label-green main-label  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                <select name="person_account_wakeel" data-validation="required" id="person_account_wakeel"
                        onchange="checkPerson_account_wakeel();" class="form-control half">
                    <?php $yes_no=array('لا','نعم');?>
                    <option value="" selected="selected">إختر</option>
                    <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if(isset($person_account)){if( $person_account==$s){$select='selected'; }}?>
                        <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4">


                <label class="label label-green main-label  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
                <input type="hidden" name="bank_account_id" id="bank_account_id_post2">
                <select name="bank_account_id" data-validation="required" disabled="disabled" id="bank_account_id1_wkeel"
                        onchange="get_banck_code2();"
                        class="form-control half">


                    <option value="">إختر</option>
                    <?php
                    if(!empty($banks)){
                        foreach ($banks as $bank){  $select=''; if($agent_bank_account ==0 &&
                            $bank_account_id == $bank->id){$select='selected'; }?>
                            <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>"
                                <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                        <?php }
                    }



                    ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رمز البنك<strong class="astric">*</strong> </label>
                <input type="text"  class="form-control half input-style"
                       name="bank_ramz" value=""readonly="readonly"   id="om_bank_code2"   />

            </div>


        </div>

        <div  class="col-md-12 ">
            <div class="form-group col-sm-6 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رقم الحساب<strong class="astric">*</strong> </label>

                <input type="text" data-validation="required" maxlength="24" onkeyup="chek_length_hesab($(this).val());" class="form-control half input-style" disabled="disabled"  id="hesab_wakeel" name="wakeel_bank_num">
                <span  id="mother_hesab_span" class="span-validation"> </span>
            </div>

        </div>
        <div class="form-group col-xs-12">
            <button type="submit" onclick="check_register();" class="btn btn-default btn-sm btn-save mt-10" name="register" id="register" value="register_wakel">حفظ الأن</button>

        </div>
    </form>


</div>
</section>
<script>

    function check_register(){
        valid_pass($('#user_pass').val());
        valid_pass_com($('#user_pass_con').val());
        chek_length_hawya($('#agent_card').val());
        chek_length_segel($('#mother_national_num2').val());
        if($('#person_account_wakeel').val()==1){
            chek_length_hesab($('#hesab_wakeel').val());
        }
        chek_length($('#agent_mob').val());
        dublcat();
    }

    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>


<script>


    function chek_length_hesab(inp_id)
    {

        var inchek_id=inp_id;
        if(inp_id.length >= 24){
            var inchek_out= inp_id.substring(0,23);
            $('#hesab_wakeel5').val(inchek_out);
            document.getElementById('mother_hesab_span').style.color = 'green';
            document.getElementById('mother_hesab_span').innerHTML = 'رقم الحساب صالح';
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
        else if(inp_id.length <= 24){
            document.getElementById('mother_hesab_span').style.color = '#F00';
            document.getElementById('mother_hesab_span').innerHTML = 'رقم الحساب 24 رقم';

            document.getElementById('register').setAttribute("disabled", "disabled");
        }

    }

    function chek_length(inp_id)
    {

        var inchek_id=inp_id;
        if(inp_id.length >= 10){
            var inchek_out= inp_id.substring(0,10);
            $('#agent_mob').val(inchek_out);

            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
        else if(inp_id.length <= 10){
            document.getElementById('lenth_mobphone').style.color = '#F00';
            document.getElementById('lenth_mobphone').innerHTML = 'رقم الجوال مكون من عشر ارقام';

            document.getElementById('register').setAttribute("disabled", "disabled");
        }

    }
    function chek_length_hawya(inp_id)
    {

        var inchek_id=inp_id;
        if(inp_id.length >= 10){
            var inchek_out= inp_id.substring(0,10);
            $('#agent_card').val(inchek_out);
            document.getElementById('agent_card_span').style.color = 'green';
            document.getElementById('agent_card_span').innerHTML = 'رقم الهويه صالح';
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
        else if(inp_id.length <= 10){
            document.getElementById('agent_card_span').style.color = '#F00';
            document.getElementById('agent_card_span').innerHTML = 'رقم الهويه مكون من عشر ارقام';

            document.getElementById('register').setAttribute("disabled", "disabled");
        }

    }
    function chek_length_segel(inp_id)
    {

        var inchek_id=inp_id;
        if(inp_id.length >= 10){
            var inchek_out= inp_id.substring(0,10);
            $('#mother_national_num2').val(inchek_out);
            document.getElementById('segel_valid_span').style.color = 'green';
            document.getElementById('segel_valid_span').innerHTML = 'رقم السجل صالح';
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
        else if(inp_id.length <= 10){
            document.getElementById('segel_valid_span').style.color = '#F00';
            document.getElementById('segel_valid_span').innerHTML = 'رقم السجل مكون من عشر ارقام';

            document.getElementById('register').setAttribute("disabled", "disabled");
        }

    }
    </script>




<script>
    function valid_pass(len)
    {

        if(len.length > 10){
            document.getElementById('validate_pass').style.color = '#00FF00';
            document.getElementById('register').removeAttribute("disabled", "disabled");
            document.getElementById('validate_pass').removeAttribute("disabled", "disabled");
            document.getElementById('validate_pass').innerHTML = 'كلمة المرور قوية';
        }else if(len.length > 4 && len.length < 10){

            document.getElementById('validate_pass').style.color = '#F00';

            document.getElementById('register').setAttribute("disabled", "disabled");
            document.getElementById('validate_pass').setAttribute("disabled", "disabled");
            document.getElementById('validate_pass').innerHTML = 'كلمة المرور ضعيفة';
        } else if(len.length < 4){

            document.getElementById('validate_pass').style.color = '#F00';
            document.getElementById('validate_pass').innerHTML = 'كلمة المرور اكثر من اربع حروف';
            document.getElementById('register').setAttribute("disabled", "disabled");

        }

    }
    function valid_pass_com(len)
    {

        if(len.length > 10){
            document.getElementById('validate_pass_com').style.color = '#00FF00';
            document.getElementById('register').removeAttribute("disabled", "disabled");
            document.getElementById('validate_pass_com').removeAttribute("disabled", "disabled");
            document.getElementById('validate_pass_com').innerHTML = 'كلمة المرور قوية';
        }else if(len.length > 4 && len.length < 10){

            document.getElementById('validate_pass_com').style.color = '#F00';

            document.getElementById('register').setAttribute("disabled", "disabled");
            document.getElementById('validate_pass_com').setAttribute("disabled", "disabled");
            document.getElementById('validate_pass_com').innerHTML = 'كلمة المرور ضعيفة';
        } else if(len.length < 4){

            document.getElementById('validate_pass_com').style.color = '#F00';
            document.getElementById('validate_pass_com').innerHTML = 'كلمة المرور اكثر من اربع حروف';
            document.getElementById('register').setAttribute("disabled", "disabled");

        }

    }

    function dublcat(){
        var con_pass = $('#user_pass_con').val();
        var pass = $('#user_pass').val();

        if(con_pass != pass){

            document.getElementById('validate_pass_com').style.color = '#F00';

            document.getElementById('register').setAttribute("disabled", "disabled");

            document.getElementById('validate_pass_com').innerHTML = 'كلمة المرور غير متطابقة';
        }
       else if(con_pass === pass){

            document.getElementById('validate_pass_com').style.color = 'green';

            document.getElementById('validate_pass_com').innerHTML = 'كلمة المرور متطابقة';
            if(con_pass.length < 10){
                document.getElementById('register').setAttribute("disabled", "disabled");
            }
            else if(con_pass.length > 10){
                document.getElementById('register').removeAttribute("disabled", "disabled");
            }

        }
    }


</script>

<script>
    function chek_length_hesab(inp_id)
    {

        var inchek_id=inp_id;
        if(inp_id.length >= 24){
            var inchek_out= inp_id.substring(0,24);
            $('#hesab_wakeel').val(inchek_out);
            document.getElementById('mother_hesab_span').style.color = 'green';
            document.getElementById('mother_hesab_span').innerHTML = 'رقم الحساب صالح';
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
        else if(inp_id.length <= 24){
            document.getElementById('mother_hesab_span').style.color = '#F00';
            document.getElementById('mother_hesab_span').innerHTML = 'رقم الحساب 24 رقم';

            document.getElementById('register').setAttribute("disabled", "disabled");
        }

    }
</script>