<?php  $this->load->view('web/profile/mother_data')  ; ?>
<div class="tab-content col-md-10">

    <?php if(isset($check_data) && $check_data!=null && !empty($check_data)){
        $result=$check_data;

    }else{
        foreach($all_field as $keys=>$value){
            $result[$all_field[$keys]]='';
        }
        $result['h_rent_amount']=0;
    }
    $arr_yes_no=array('','نعم','لا');
    ?>
    <?php if(isset($check_data)&&!empty($check_data)){ ?>

        <div class="text-center  mother_form">

            <table width="50%">
                <tr>
                    <td> <h5> لتعديل بيانات السكن</h5></td>
                    <td class="text-center">  <button class="btn" id="link_mother" onclick="hide_sakn_form();" style="color: #11525d;background-color: #a5dcec;">اضغط هنا  </button>
                    </td>
                </tr>
            </table>
        </div>



    <?php } ?>


    <?php echo form_open('Mother_data/house/'.$mother_national_num,array('id'=>'form'))?>
    <div class="panel-body sakn_form"<?php if(isset($check_data)&&!empty($check_data)){?>style="display:none;"   <?php } ?> ><br>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4  col-xs-12 padding-4">
                <label class="label label-green main-label  half">إسم الام </label>
                <input type="text"  value="<?php  if($mother_data['full_name']==''){ echo "لم يتم اضافته" ; }else{ echo $mother_data['full_name']; }?>"  readonly="" class="form-control half input-style"   >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رقم السجل المدنى  </label>
                <input  type="text" value="<?php echo $this->uri->segment(3);?>"  readonly="" class="form-control half input-style"  data-validation="required" >
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رقم حساب فاتورة الكهرباء </label>
                <input  placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event)" class="form-control half input-style"  data-validation="required" name="h_electricity_account" value="<?php echo $result['h_electricity_account']?>" >
            </div>
            </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">رقم حساب عداد المياه </label>
                <input  placeholder="إدخل البيانات " type="text"  onkeypress="validate_number(event)"class="form-control half input-style"  data-validation="required" name="h_water_account" value="<?php echo $result['h_water_account']?>" >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الرقم الصحى </label>
                <input type="text" name="h_health_number"   onkeypress="validate_number(event)"value="<?php echo $result['h_health_number']?>" class="form-control half input-style"  data-validation="required" >
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">المنطقة </label>
                <select class="form-control half " onchange="plases('h_area_id_fk','h_city_id_fk');" name="h_area_id_fk" id="h_area_id_fk"  data-validation="required"  aria-required="true">
                    <option  value="">اختر</option>
                    <?php
                    foreach($area as $record){
                        $selected='';
                        if($record->id == $result['h_area_id_fk']){$selected='selected';}
                        echo '<option value="'.$record->id.'" '.$selected.' >'.$record->title.'</option>';
                    }
                    ?>
                </select>
            </div>
            </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> المحافظة   </label>
                <select class="form-control half " onchange="plases('h_city_id_fk','h_center_id_fk');" name="h_city_id_fk" id="h_city_id_fk"  data-validation="required"  aria-required="true">
                    <option  value="">اختر</option>
                    <?php if(isset($city) && !empty($city) && $city!=null) {
                        foreach ($city as $record) {
                            $selected = '';
                            if ($record->id == $result['h_city_id_fk']) {
                                $selected = 'selected';
                            }
                            echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                        }
                    }else{
                        echo '<option value="" >لا يوحد بيانات مضافة </option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> المركز   </label>
                <select class="form-control half " onchange="plases('h_center_id_fk','h_village_id_fk');" name="h_center_id_fk" id="h_center_id_fk"  data-validation="required"  aria-required="true">
                    <option  value="">اختر</option>
                    <?php if(isset($centers) && !empty($centers) && $centers!=null) {
                        foreach ($centers as $record) {
                            $selected = '';
                            if ($record->id == $result['h_center_id_fk']) {
                                $selected = 'selected';
                            }
                            echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                        }
                    }else{
                        echo '<option value="" >لا يوحد بيانات مضافة </option>';
                    }
                    ?>
                </select>
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> القرية   </label>
                <select class="form-control half "  name="h_village_id_fk" id="h_village_id_fk"  data-validation="required"  aria-required="true">
                    <option  value="">اختر</option>
                    <?php if(isset($village) && !empty($village) && $village!=null) {
                        foreach ($village as $record) {
                            $selected = '';
                            if ($record->id == $result['h_village_id_fk']) {
                                $selected = 'selected';
                            }
                            echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                        }
                    }else{
                        echo '<option value="" >لا يوحد بيانات مضافة </option>';
                    }
                    ?>
                </select>
            </div>
            </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> الحى  </label>
                <input placeholder="إدخل البيانات " type="text" class="  form-control half input-style" data-validation="required" name="hai_name" value="<?php echo  $result['hai_name']?>" >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الشارع </label>
                <input placeholder="إدخل البيانات " type="text" class="  form-control half input-style" data-validation="required" name="h_street" value="<?php echo $result['h_street']?>">
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">أقرب مدرسة </label>
                <input placeholder="إدخل البيانات " type="text" class="  form-control half input-style" data-validation="required" name="h_nearest_school" value="<?php echo $result['h_nearest_school']?>" >
            </div>
            </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> أقرب معلم  </label>
                <input placeholder="إدخل البيانات " type="text" class="  form-control half input-style" data-validation="required" name="h_nearest_teacher" value="<?php echo $result['h_nearest_teacher']?>"  >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">أقرب مسجد </label>
                <input placeholder="إدخل البيانات " type="text" class="  form-control half input-style" data-validation="required" name="h_mosque" value="<?php echo $result['h_mosque']?>">
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> نوع السكن  </label>
                <select class="form-control half" name="h_house_type_id_fk"  data-validation="required"  aria-required="true">
                    <option  value="">اختر</option>
                    <?php foreach($arr_type_house as $x):
                        $selected='';if($x->id_setting==$result['h_house_type_id_fk']){$selected='selected';}?>
                        <option value="<?php echo $x->id_setting ?>" <?php echo $selected?> ><?php echo $x->title_setting ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">لون المنزل </label>
                <input placeholder="إدخل البيانات " type="text" class="  form-control half input-style" data-validation="required" name="h_house_color" value="<?php echo $result['h_house_color']?>" >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">اتجاه المنزل  </label>
                <select class="form-control half"  name="h_house_direction"  data-validation="required"  aria-required="true">
                    <option  value="">اختر</option>
                    <?php foreach($arr_direct as $y):
                        $selected='';if($y->id_setting==$result['h_house_direction']){$selected='selected';}?>
                        <option value="<?php echo $y->id_setting ?>" <?php echo $selected?> ><?php echo $y->title_setting ?></option>
                    <?php endforeach ?>
                </select>
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الحالة </label>
                <select class="form-control half" name="h_house_status_id_fk"  data-validation="required"  aria-required="true">
                    <option  value="">اختر</option>
                    <?php foreach($house_state as $z):
                        $selected='';if($z->id_setting==$result['h_house_status_id_fk']){$selected='selected';}?>
                        <option value="<?php echo $z->id_setting ?>" <?php echo $selected?> ><?php echo $z->title_setting ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">عدد الغرف  </label>
                <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class="  form-control half input-style"data-validation="required"  name="h_rooms_account" value="<?php echo $result['h_rooms_account']?>" >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مساحة البناء </label>
                <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class="  form-control half input-style"data-validation="required" name="h_house_size"  value="<?php echo $result['h_house_size']?>" >
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">ملكية السكن  </label>
                <select class="form-control half"  id="building_type" name="h_house_owner_id_fk"   data-validation="required"  aria-required="true" onchange="getRent();">
                    <option  value="">اختر</option>
                    <option  value="rent" <?php if($result['h_house_owner_id_fk'] ==='rent' ){?> selected <?php }?>>إيجار</option>
                    <?php
                    foreach($house_own as $a):
                        $selected='';if($a->id_setting==$result['h_house_owner_id_fk']){$selected='selected';}?>
                        <option value="<?php echo $a->id_setting ?>" <?php echo $selected?> ><?php echo $a->title_setting ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">إسم المؤجر </label>
                <input placeholder="إدخل البيانات " type="text" class="  form-control half input-style"  name="h_renter_name" id="h_renter_name" value="<?php echo $result['h_renter_name']?>"   <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>  >
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4 col-xs-12">
                <label class="label label-green main-label  half">رقم الجوال <span class="pull-right" style="    background-color: #fff;color: #008996;padding: 0 6px;border-radius: 7px;"> 10 ارقام فقط</span> </label>
                <input type="text" maxlength="10" name="h_renter_mob"  id="h_renter_mob" onkeyup="check_len($(this).val(),'h_renter_mob_span');" placeholder="إدخل البيانات "    onkeypress="validate_number(event)"  class="form-control half input-style "  value="<?php echo $result['h_renter_mob'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
           <span id="h_renter_mob_span"></span>
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4 col-xs-12">
                <label class="label label-green main-label  half">تاريخ بداية العقد </label>
                <input type="text" name="contract_start_date"  id="contract_start_date"   placeholder="إدخل البيانات " class="form-control half input-style docs-date"  value="<?php echo $result['contract_start_date'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
            </div>
            </div>
        <div class="col-sm-12 ">

            <div class="form-group col-sm-4 col-xs-12 padding-4 col-xs-12">
                <label class="label label-green main-label  half">تاريخ نهاية العقد </label>
                <input type="text" name="contract_end_date"  id="contract_end_date"   placeholder="إدخل البيانات "  class="form-control half input-style docs-date"  value="<?php echo $result['contract_end_date'];?>"  <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>/>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مقدار الإيجار السنوى </label>
                <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class="  form-control half input-style" data-validation="required" id="h_rent_amount" name="h_rent_amount" value="<?php echo $result['h_rent_amount']?>"    >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> عدد دورات المياه  </label>
                <input placeholder="إدخل البيانات " type="text"  onkeypress="validate_number(event);"class="  form-control half input-style" data-validation="required" name="h_bath_rooms_account"  value="<?php echo $result['h_bath_rooms_account']?>" >
            </div>
            </div>
        <div class="col-sm-12 ">

            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مقترض من البنك العقارى </label>
                <select class=" form-control half"  name="h_borrow_from_bank" id="bank" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                        $selected='';if($r==$result['h_borrow_from_bank']){$selected='selected';}
                        ?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                    <?php }?>
                </select>


            </div>
            <?php $dis="disabled";if($result['h_borrow_from_bank'] == 1){
                $dis="";
            }?>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">القيمة المتبقية </label>
                <input type="text" <?=$dis?> name="h_borrow_remain" onkeypress="validate_number(event);" value="<?php echo $result['h_borrow_remain']?>" class=" form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="bank-cost" >
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">قرض ترميم من بنك التسليف </label>
                <select class="form-control half" onchange="getquerd($(this).val())" name="h_loan_restoration" id="fix" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                        $selected='';if($r==$result['h_loan_restoration']){$selected='selected';}
                        ?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                    <?php }?>
                </select>
            </div>
            </div>



        <div class="col-sm-12 ">

            <?php $dis="disabled";if($result['h_loan_restoration'] == 1){
                $dis="";
            }?>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">القيمة المتبقية للقرض </label>
                <input  placeholder="إدخل البيانات "  data-validation="required" type="text"  onkeypress="validate_number(event);" <?=$dis?> name="h_loan_restoration_remain" value="<?php echo $result['h_loan_restoration_remain']?>" class=" form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="fix-cost" >
            </div>
            </div>


        <!-----------------map--------------->

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">الموقع على الخريطة </label>
                <input type="hidden" name="house_google_lng" id="lng" value="<?php if(isset($result)) echo $result['house_google_lng'] ?>" />
                <input type="hidden" name="house_google_lat" id="lat" value="<?php if(isset($result)) echo $result['house_google_lat'] ?>" />
                <?php  echo $maps['html'];?>
            </div>
        </div>

        <!-----------------map--------------->


        <!--button-->

        <div class="form-group col-xs-12">
            <?php  if(isset($check_data) && $check_data!=null && !empty($check_data)){
                $xnput_name1='update';$xnput_name2='update_save';
            }else{
                $xnput_name1='add';$xnput_name2='add_save';
            } ?>

            <button type="submit" class="btn btn-default btn-sm btn-save mt-10" id="buttons" name="<?php echo $xnput_name1?>"  value="<?php echo $xnput_name1?>" >حفظ الأن</button>

        </div>

    </div>
    <?php echo form_close()?>


</div><!-- end of container -->
</section>
<script>

    function getquerd(value) {

        if(value == 2){
            document.getElementById("fix-cost").setAttribute("disabled", "disabled");
        }else {
            document.getElementById("fix-cost").removeAttribute("disabled", "disabled");
        }
    }


    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){

            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);

        }

        if(inchek.length > 10){

            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }

        if(inchek.length == 10){
            document.getElementById("buttons").removeAttribute("disabled", "disabled");

        }
    }

</script>

<script>
    document.getElementById("bank").onchange = function () {

        if (this.value == 1)
            document.getElementById("bank-cost").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("bank-cost").setAttribute("disabled", "disabled");
            $("#bank-cost").val('');
        }
    };
    document.getElementById("buliding").onchange = function () {

        if (this.value == 2)
            document.getElementById("buliding-cost").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("buliding-cost").setAttribute("disabled", "disabled");
            $("#buliding-cost").val('');
        }
    };
    document.getElementById("fix").onchange = function () {

        if (this.value == 1)
            document.getElementById("fix-cost").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("fix-cost").setAttribute("disabled", "disabled");
            $("#fix-cost").val('');
        }
    };




</script>
<!--------------------------------------->
<script>
    function plases(id_main,is_sub) {
        var value_id=$("#"+id_main).val();
        //  alert(value_id);
        if(value_id) {
            var dataString = 'value_id=' + value_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Mother_data/house/<?=$mother_national_num?>',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    //  alert(html);
                    $('#'+is_sub).html(html);
                }
            });
            return false;
        }
    }
</script>


<!----------------ahmed-->
<script>

    function getRent() {
        var building_type=$("#building_type").val();
        if(building_type === 'rent'){
            document.getElementById("h_renter_name").removeAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").removeAttribute("disabled", "disabled");
            document.getElementById("h_renter_mob").removeAttribute("disabled", "disabled");
            document.getElementById("contract_start_date").removeAttribute("disabled", "disabled");
            document.getElementById("contract_end_date").removeAttribute("disabled", "disabled");
            document.getElementById("h_renter_name").setAttribute("data-validation", "required");
            document.getElementById("h_renter_mob").setAttribute("data-validation", "required");
            document.getElementById("contract_start_date").setAttribute("data-validation", "required");
            document.getElementById("contract_end_date").setAttribute("data-validation", "required");

        }else{

            document.getElementById("h_renter_name").value="";
            document.getElementById("h_renter_mob").value="";
            document.getElementById("contract_start_date").value="";
            document.getElementById("contract_end_date").value="";
            document.getElementById("h_rent_amount").value="";
            document.getElementById("h_renter_name").setAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").setAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").setAttribute("disabled", "disabled");
            document.getElementById("h_renter_mob").setAttribute("disabled", "disabled");
            document.getElementById("contract_start_date").setAttribute("disabled", "disabled");
            document.getElementById("contract_end_date").setAttribute("disabled", "disabled");


        }
    }




</script>

<script>
    function hide_sakn_form() {

        $('.mother_form').hide();
        $('.sakn_form').show();



    }




</script>
<script>
    function check_len(valu,span_id2)
    {
        if(valu.length>10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");

            document.getElementById(span_id2).style.color = '#F00';
            document.getElementById(span_id2).innerHTML = ' الجوال لا يزيد عن 10 ارقام';


        }
        if(valu.length<10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            document.getElementById(span_id2).style.color = '#F00';
            document.getElementById(span_id2).innerHTML = ' الجوال لا يقل عن 10 ارقام';

        }
        if(valu.length==10) {
            document.getElementById(span_id2).style.color = '#11d63b';

            document.getElementById("buttons").removeAttribute("disabled", "disabled");
            document.getElementById(span_id2).innerHTML = ' الجوال متاح';

        }

    }
</script>