<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error{
        color: #a94442  !important;
        font-size: 15px !important;
        position: absolute !important;
        bottom: -23px !important ;
        right: 50% !important ;
    }
</style>



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



<div class="col-sm-12  " >
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title">محتويات السكن</h3>
		</div>
        <?php echo form_open('family_controllers/Family/house/'.$mother_national_num,array('id'=>'form'))?>
		<div class="panel-body"><br>
            <div class="col-md-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">إسم الام <strong class="astric">*</strong> </label>
                    <input type="text"  value="<?php echo $mother_data['full_name']?>"  readonly="" class="form-control half input-style"   >
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">رقم السجل المدنى  <strong class="astric">*</strong> </label>
                    <input  type="text" value="<?php echo $mother_national_num ?>"  readonly="" class="form-control half input-style"  data-validation="required" >
                </div>
            </div>
            <div class="col-md-12">
				<div class="form-group col-sm-4">
					<label class="label label-green  half">رقم حساب فاتورة الكهرباء <strong class="astric">*</strong> </label>
					<input  placeholder="إدخل البيانات " type="number" class="form-control half input-style"  data-validation="required" name="h_electricity_account" value="<?php echo $result['h_electricity_account']?>" >
				</div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم حساب عداد المياه <strong class="astric">*</strong> </label>
                    <input  placeholder="إدخل البيانات " type="number" class="form-control half input-style"  data-validation="required" name="h_water_account" value="<?php echo $result['h_water_account']?>" >
                </div>
				<div class="form-group col-sm-4">
					<label class="label label-green  half">الرقم الصحى <strong class="astric">*</strong> </label>
                    <input type="number" name="h_health_number"  value="<?php echo $result['h_health_number']?>" class="form-control half input-style"  data-validation="required" >
				</div>
			</div>
			<div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المنطقة <strong class="astric">*</strong> </label>
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
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المحافظة   <strong class="astric">*</strong> </label>
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
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المركز   <strong class="astric">*</strong> </label>
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
            </div>
			<div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> القرية   <strong class="astric">*</strong> </label>
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
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> الحى  <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="hai_name" value="<?php echo  $result['hai_name']?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الشارع <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_street" value="<?php echo $result['h_street']?>">
                </div>
			</div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">أقرب مدرسة <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_nearest_school" value="<?php echo $result['h_nearest_school']?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> أقرب معلم  <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_nearest_teacher" value="<?php echo $result['h_nearest_teacher']?>"  >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">أقرب مسجد <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_mosque" value="<?php echo $result['h_mosque']?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> نوع السكن  <strong class="astric">*</strong> </label>
                    <select class="form-control half" name="h_house_type_id_fk"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php foreach($arr_type_house as $x):
                            $selected='';if($x->id_setting==$result['h_house_type_id_fk']){$selected='selected';}?>
                            <option value="<?php echo $x->id_setting ?>" <?php echo $selected?> ><?php echo $x->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">لون المنزل <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_house_color" value="<?php echo $result['h_house_color']?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">اتجاه المنزل  <strong class="astric">*</strong> </label>
                    <select class="form-control half"  name="h_house_direction"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php foreach($arr_direct as $y):
                            $selected='';if($y->id_setting==$result['h_house_direction']){$selected='selected';}?>
                            <option value="<?php echo $y->id_setting ?>" <?php echo $selected?> ><?php echo $y->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الحالة <strong class="astric">*</strong> </label>
                    <select class="form-control half" name="h_house_status_id_fk"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php foreach($house_state as $z):
                            $selected='';if($z->id_setting==$result['h_house_status_id_fk']){$selected='selected';}?>
                            <option value="<?php echo $z->id_setting ?>" <?php echo $selected?> ><?php echo $z->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">عدد الغرف  <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style"data-validation="required"  name="h_rooms_account" value="<?php echo $result['h_rooms_account']?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">مساحة البناء <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style"data-validation="required" name="h_house_size"  value="<?php echo $result['h_house_size']?>" >
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">ملكية السكن  <strong class="astric">*</strong> </label>
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
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم المؤجر <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style"  name="h_renter_name" id="h_renter_name" value="<?php echo $result['h_renter_name']?>"   <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الجوال<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="h_renter_mob"  id="h_renter_mob" onkeyup="chek_length('h_renter_mob');" placeholder="إدخل البيانات "  onkeypress="validate_number(event)"  class="form-control half input-style "  value="<?php echo $result['h_renter_mob'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
                    <span  id="lenth_mob" class="span-validation"> </span>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ بداية العقد<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="contract_start_date"  id="contract_start_date"   placeholder="إدخل البيانات " class="form-control half input-style docs-date"  value="<?php echo $result['contract_start_date'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ نهاية العقد<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="contract_end_date"  id="contract_end_date"   placeholder="إدخل البيانات "  class="form-control half input-style docs-date"  value="<?php echo $result['contract_end_date'];?>"  <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">مقدار الإيجار السنوى <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style" data-validation="required" name="h_rent_amount" value="<?php echo $result['h_rent_amount']?>"    >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> عدد دورات المياه  <strong class="astric">*</strong> </label>
                    <input placeholder="إدخل البيانات " type="text"  onkeypress="validate_number(event);"class=" some_class form-control half input-style" data-validation="required" name="h_bath_rooms_account"  value="<?php echo $result['h_bath_rooms_account']?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  col-xs-6 no-padding">مقترض من البنك العقارى <strong class="astric">*</strong> </label>
                    <select class=" col-xs-6 no-padding "  name="h_borrow_from_bank" id="bank" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
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
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">القيمة المتبقية <strong class="astric">*</strong> </label>
                    <input type="text" <?=$dis?> name="h_borrow_remain" onkeypress="validate_number(event);" value="<?php echo $result['h_borrow_remain']?>" class="some_class form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="bank-cost" >
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green col-xs-6 no-padding">قرض ترميم من بنك التسليف <strong class="astric">*</strong> </label>
                    <select class="col-xs-6 no-padding " name="h_loan_restoration" id="fix" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                            $selected='';if($r==$result['h_loan_restoration']){$selected='selected';}
                            ?>
                            <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                        <?php }?>
                    </select>
                </div>
                  <?php $dis="disabled";if($result['h_loan_restoration'] == 1){
                      $dis="";
                  }?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">القيمة المتبقية <strong class="astric">*</strong> </label>
                    <input  placeholder="إدخل البيانات "  type="text"  onkeypress="validate_number(event);" <?=$dis?> name="h_loan_restoration_remain" value="<?php echo $result['h_loan_restoration_remain']?>" class="some_class form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="fix-cost" >
                </div>

            </div>
               <!-----------------map--------------->

            <h4 class=" sub-title col-xs-12">خريطة المنزل</h4>
            <label class="right main-label col-xs-6 no-padding">تضمين الخريطة  ( قم بتضمين خريطة جوجل هنا  ) <strong class="astric">*</strong> </label>
            <div class="col-sm-12">
                <input type="text" name="map" value='<?php echo $result['map']  ?>'
                       class="form-control col-xs-6 no-padding"/>
                <?php if($result['map'] == '' ) {

                    echo ' <div class="clearfix"></div>
                        <div class="alert alert-danger">    لا يوجد خريطة محفوظة  </div>' ;
                }else{
                    echo $result['map'];
                }?>
              </div>

               <!-----------------map--------------->


            <!--button-->
            <div class="col-md-12">
                <?php  if(isset($check_data) && $check_data!=null && !empty($check_data)){
                    $xnput_name1='update';$xnput_name2='update_save';
                }else{
                      $xnput_name1='add';$xnput_name2='add_save';
                } ?>

                <div class="form-group col-sm-4">
                    <input type="submit"  name="<?php echo $xnput_name1?>" class="btn btn-blue btn-next"  value="حفظ  " />
                </div>

            </div>
		</div>
        <?php echo form_close()?>
	</div>
</div>


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
                url: '<?php echo base_url() ?>family_controllers/Family/house/<?=$mother_national_num?>',
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
            document.getElementById("h_renter_mob").removeAttribute("disabled", "disabled");
            document.getElementById("contract_start_date").removeAttribute("disabled", "disabled");
            document.getElementById("contract_end_date").removeAttribute("disabled", "disabled");
            document.getElementById("h_renter_name").setAttribute("data-validation", "required");
            document.getElementById("h_renter_mob").setAttribute("data-validation", "required");
            document.getElementById("contract_start_date").setAttribute("data-validation", "required");
            document.getElementById("contract_end_date").setAttribute("data-validation", "required");

        }else{
            alert('check type');
            document.getElementById("h_renter_name").value="";
            document.getElementById("h_renter_mob").value="";
            document.getElementById("contract_start_date").value="";
            document.getElementById("contract_end_date").value="";
            document.getElementById("h_renter_name").setAttribute("disabled", "disabled");
            document.getElementById("h_renter_mob").setAttribute("disabled", "disabled");
            document.getElementById("contract_start_date").setAttribute("disabled", "disabled");
            document.getElementById("contract_end_date").setAttribute("disabled", "disabled");


        }
    }




</script>
<!----------------ahmed-->












