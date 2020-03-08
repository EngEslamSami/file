
<?php  $this->load->view('web/profile/register_main')  ; ?>

<div class="tab-content col-md-10">

    <form action="<?php echo base_url();?>WebProfile/register" method="post">
        <?php $arr_response =array('أم','وكيل');?>

        <div class="col-md-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">

                <label class="label label-green main-label  half"> رقم السجل <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 6px;
border-radius: 7px;"> 10 ارقام فقط</span>  <strong class="astric">*</strong> </label>
                <input type="text" class="form-control half input-style"  name="mother_national_num"
                       value=""  data-validation="required"
                       id="mother_national_num" onkeyup="valid_segel_num(0,$(this).val()); chek_length_segel($(this).val()); pass_name()" onkeypress="validate_number(event)">
                <span  id="segel_valid_span" class="span-validation"> </span>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">

                <label class="label label-green main-label  half">إسم المستخدم <strong class="astric">*</strong> </label>

                <input  type="text" id="user_name" value=""class="form-control half input-style" data-validation="required" placeholder="إسم المستخدم" name="user_name" readonly="readonly"/>
                <span  id="" class="span-validation"> </span>
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">كلمة المرور <strong class="astric">*</strong> </label>
                <input type="password" data-validation="required" onkeyup="valid_pass($(this).val()); dublcat();" id="user_pass" class="form-control half input-style"

                       name="user_password"   />
                <span  id="validate_pass" class="span-validation"> </span>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">تاكيد كلمة المرور <strong class="astric">*</strong> </label>
                <input type="password" data-validation="required" id="user_pass_con" onkeyup="valid_pass_com($(this).val());dublcat();"  class="form-control half input-style"

                       name="user_password"  />
                <span  id="validate_pass_com" class="span-validation"> </span>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رقم الجوال<span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 6px;
border-radius: 7px;"> 10 ارقام فقط</span> <strong class="astric">*</strong> </label>
                <input type="text" id="mother_mob1" data-validation="required"  name="mother_mob" onfocus="chek_length($(this).val())"  class="form-control half input-style"

                        onkeyup="valid_segel_num(1,$(this).val()); chek_length($(this).val());"  />
                <span  id="mother_mob_span" class="span-validation"> </span>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مقر التسجيل ( الفرع )<strong class="astric">*</strong></label>
                <select name="register_place" class="form-control half"



                        data-show-subtext="true" data-live-search="true"aria-required="true">
                    <option value=""> اختر</option>
                    <?php
                    foreach ($socity_branch as $row2):
                        $selected='';if($row2->id == $register_place){$selected='selected';}	?>
                        <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-md-12">

            <div class="form-group col-sm-4 col-xs-12 padding-4">


                <label class="label label-green main-label  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                <select name="person_account" id="person_account_wakeel"
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
                <button type="submit" onclick="check_register();" class="btn btn-default btn-sm btn-save mt-10" name="register" id="register" value="register">حفظ الأن</button>

            </div>


    </form>

</div>
</section>


<script>

    function check_register(){
        chek_length_segel($('#mother_national_num').val());
        valid_pass($('#user_pass').val());
        valid_pass_com($('#user_pass_con').val());


        if($('#person_account_wakeel').val()==1){
            chek_length_hesab($('#hesab_wakeel').val());
        }
        chek_length($('#mother_mob1').val());
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

    function  checkPerson_account_wakeel()
    {
        var person_account= $('#person_account_wakeel').val();
        if(person_account ==1){

            document.getElementById("hesab_wakeel").removeAttribute("disabled", "disabled");

            document.getElementById("bank_account_id1_wkeel").removeAttribute("disabled", "disabled");
            // document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");





            //  document.getElementById("om_bank_num").value="";
        }else{
            document.getElementById("hesab_wakeel").setAttribute("disabled", "disabled");

            document.getElementById("bank_account_id1_wkeel").setAttribute("disabled", "disabled");
            document.getElementById("hesab_wakeel").value="";
            document.getElementById("mother_hesab_span").innerHTML="";
            document.getElementById("register").removeAttribute("disabled", "disabled");


            // document.getElementById("om_bank_num").setAttribute("disabled", "disabled");



        }


    }




</script>

<script>
    
    function pass_name(){

        //-----------------------------------------------------
        var num =$("#mother_national_num").val();
        $("#user_name").val(num);
        if($("#mother_national_num").val().length < 10){
            document.getElementById('lenth').style.color = '#F00';
            document.getElementById('lenth').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num").val().length > 10){
            var mother_new=num.substring(0,10);
            $("#mother_national_num").val(mother_new);
            $("#user_name").val(mother_new);
            document.getElementById('lenth').innerHTML = '';
        }
        //-------------------------------------------------------
        var user_username=$('#mother_national_num').val();

    }// end function


    function chek_length(inp_id)
    {

        var inchek_id=inp_id;
        if(inp_id.length >= 10){
            var inchek_out= inp_id.substring(0,10);
            $('#mother_mob1').val(inchek_out);
            document.getElementById('mother_mob_span').innerHTML = '';
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
        else if(inp_id.length <= 10){
            document.getElementById('mother_mob_span').style.color = '#F00';
            document.getElementById('mother_mob_span').innerHTML = 'رقم الجوال مكون من عشر ارقام';

            document.getElementById('register').setAttribute("disabled", "disabled");
        }

    }

    function chek_length_segel(inp_id)
    {


        var inchek_id=inp_id;
        if(inp_id.length >= 10){
            var inchek_out= inp_id.substring(0,10);
            $('#mother_national_num').val(inchek_out);
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
