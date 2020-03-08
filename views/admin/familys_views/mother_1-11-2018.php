<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
		font-size: 12px !important;
		position: absolute !important;
		bottom: -23px !important ;
		right: 50% !important ;
	}
</style>
<?php
//print_r($all_links['father']);
if(isset($all_links['mother']) && $all_links['mother']!=null){
	$father_national_id = $all_links['father']['f_national_id'];
	foreach($all_links['mother'] as  $key=>$value){
		$result[$key]=$all_links['mother'][$key];
       
	}
}else{
	foreach($all_field as $keys=>$value){
		$result[$all_field[$keys]]='';
	}
	$result['m_birth_date_hijri']='';
	$result['m_living_place_id_fk']=-1;
        if(isset($basic_data_family["mother_national_num"])){
           $result['mother_national_card_new']=$basic_data_family["mother_national_num"]; 
        }
    $father_national_id = $all_links['father']['f_national_id'];
       if($basic_data_family["person_relationship"] == "41"){
        $result['full_name']=$basic_data_family["full_name_order"];
        $result['m_mob']=$basic_data_family["contact_mob"];
        $result['mother_national_card_new']=$basic_data_family["person_national_card"];
       }
       $result['m_relationship']=$basic_data_family["person_relationship"];
 }
   $disabled_edu="";
 
   if( $result['m_education_status_id_fk'] == "unlettered" ||
       $result['m_education_status_id_fk'] == "0"  ||
       $result['m_education_status_id_fk'] == "read_write"  ){
    $disabled_edu='disabled=""';
   }

$arr_yes_no=array('','نعم','لا');
?>
 <?php
            $this->load->model("familys_models/Register");
            $data_load["basic_data_family"] = $basic_data_family;
            $data_load["mother_num"] = $this->uri->segment(4);
            $data_load["person_account"] = $basic_data_family["person_account"];
            $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
            $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
            $data_load["file_num"] = $basic_data_family["file_num"];
            $this->load->view('admin/familys_views/drop_down_button', $data_load); ?>



<div class="col-xs-12 " >
	<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $title?>
			
			</h3>
		</div>
		<div class="panel-body">
			<?php echo form_open_multipart('family_controllers/Family/mother/'.$this->uri->segment(4).'');?>
			<div class="col-sm-12 col-xs-12">
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half"> الاسم الرباعي <strong class="astric">*</strong> </label>
					<input type="text" name="fullname"   value="<?php echo $result['full_name']?>" class="form-control half input-style"  data-validation="required" />
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong> </label>
					<select name="m_relationship" id="m_relationship"  data-validation="required" aria-required="true" class="selectpicker no-padding form-control choose-date form-control half"
					>
						<option value="">إختر</option>
						<?php if(!empty($relationships)){ foreach ($relationships as $record){
							$select=''; if($result['m_relationship']==$record->id_setting){$select='selected'; }
							?>
							<option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
						<?php  } } ?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">الحالة الإجتماعية<strong class="astric">*</strong><strong></strong> </label>
					<select  name="m_marital_status_id_fk"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
						<option value="">اختر</option>
						<?php foreach ($marital_status_array as $row6):
							$selected='';if($row6->id_setting==$result['m_marital_status_id_fk']){$selected='selected';}   ?>
							<option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12">
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">طبيعة الفرد<strong class="astric">*</strong><strong></strong> </label>
					<select  name="person_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
						<option value="">اختر</option>
						<?php
						foreach ($person_type as $row2):
							$selected = '';
							if ($row2->id_setting == $result['person_type']) {
								$selected = 'selected';
							} ?>
							<option
								value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
						<?php endforeach
						;?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">حاله المستفيد<strong class="astric">*</strong><strong></strong> </label>
					<select name="halt_elmostafid_m" id="halt_elmostafid_m"   class="form-control half">
						<option value=""> اختر </option>
						<?php if(isset($member_status)&&!empty($member_status)) {
							foreach ($member_status as $record) {?>
								<option value="<?php echo $record->id ;?>" <?php if($result['halt_elmostafid_m']==$record->id){
									?> selected="selected"<?php } ?>> <?php echo $record->title;?>
								</option>
							<?php }
						}?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">التصنيف<strong class="astric">*</strong><strong></strong> </label>
					<select  name="categoriey_m" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
						<?php $categories=array(1=>'أرملة',4=>"إخرى");?>
						<option value="">إختر</option>
						<?php foreach($categories as $key=>$value){  $select=''; if( $result['categoriey_m']==$key){$select='selected'; }?>
							<option value="<?php echo $key;?>" <?php echo $select;?>><?php echo $value;?></option>
						<?php } ?>
					</select>
				</div>

			</div>
			<div class="col-sm-12 col-xs-12">
				<!--	<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">رقم السجل المدني للأب</label>
					<input type="text" name=""  readonly=""  value="<?php echo $father_national_id;  ?>" class="form-control half input-style"  />
				</div>
                -->
				<!--
<div class="form-group col-sm-4 col-xs-12">
	<label class="label label-green  half"> هوية الأم  <strong class="astric">*</strong> </label>
	<input type="text" name="mother_national_card_new"   value="<?php echo $result['mother_national_card_new']?>"
     class="form-control half input-style"  data-validation="required" />
</div>
-->

				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
					<input type="text" name="mother_national_card_new" maxlength="10"
						   id="mother_national_card_new" data-validation="required"
						   onkeyup="check_length_num(this,10,'f_national_id_span');"
						   value="<?php echo $result['mother_national_card_new']; ?>" onkeypress="validate_number(event)"
						   class="form-control half input-style" />
					<span  id="f_national_id_span" class="span-validation"> </span>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
					<select  name="m_national_id_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"    data-validation="required" aria-required="true">
						<option value="">اختر</option>
						<?php
						foreach ($national_id_array as $row2):
							$selected = '';
							if ($row2->id_setting == $result['m_national_id_type']) {
								$selected = 'selected';
							} ?>
							<option
								value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
						<?php endforeach
						;?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
					<select  name="m_card_source" id="m_card_source"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true">
						<option value="">إختر</option>
						<?php if(!empty($id_source)){ foreach ($id_source as $record){
							$select=''; if($result['m_card_source']==$record->id_setting){$select='selected'; }
							?>
							<option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
						<?php  } } ?>
					</select>
				</div>

				<!--end here-->
			</div>
			<div class="col-md-12">
				<div class="form-group col-sm-4 col-xs-12">
					<?php  $hijri_date=explode('/',$result['m_birth_date_hijri']); ?>
					<label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
					<input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)"
						   onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
					<input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
						   onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
					<input class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
						   onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<?php
					$gregorian_date=explode('/',$result['m_birth_date']); 	 ?>
					<label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
					<input class="textbox form-control" data-validation="required" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
					<input class="textbox form-control" data-validation="required" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
					<input class="textbox4 form-control" data-validation="required" type="text" name="CYear"  id="CYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"   placeholder="year"  id="CYear" size="20" maxlength="4"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
					<input class="textbox2 form-control half " type="text" name="age" id="myage"
						   readonly
						   value="<?php
						   if(isset($result['m_birth_date_hijri_year']) &&  !empty($current_year) && !empty($result['m_birth_date_hijri_year']) ){
							   echo $current_year  - $result['m_birth_date_hijri_year'];
						   }
						   /* if(!empty($gregorian_date[2])){
                                       echo (date('Y-m-d')-$gregorian_date[2]);
                                        }*/  ?>"
					/>
					<input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
					<input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
				</div>
			</div>
			<div class="col-sm-12 col-xs-12">

				<div class="form-group col-sm-4">
					<label class="label label-green  half"> الجنس  <strong class="astric">*</strong> </label>
					<select name="gender" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">
						<?php $gender_arr=array('','ذكر','أنثى');?>
						<option value="">اختر</option>
						<?php for ($a=1;$a<sizeof($gender_arr);$a++){
							$select='';
							if($a== $result['m_gender']){$select='selected';}?>
							<option value="<?php echo$a; ?>" <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
						<?php }?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>
					<select  name="m_nationality" id="m_nationality" data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
						<?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
							<option value="">اختر</option>
							<?php  foreach ($nationality as $record):
								$selected='';if($record->id_setting==$result['m_nationality']){$selected='selected';}?>
								<option value="<?php  echo $record->id_setting;?>" <?php echo $selected?>  ><?php  echo $record->title_setting;?></option>
							<?php  endforeach;?>
							<option value="0"<?php if($result['m_nationality']==0) echo "selected";?> >اخري</option>
						<?php }else {
							?>
							<option value="" selected>اختر</option>
							<option value="0"<?php if($result['m_nationality']==0) echo "selected";?> >اخري</option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">اضافه جنسيه اخري<strong class="astric">*</strong><strong></strong> </label>
					<input type="text" name="nationality_other" id="nationality_other"   value="<?php echo $result['nationality_other']?>"  class="form-control half input-style" <?php if($result['nationality_other']==""){?> disabled=""<?php }?>/>
				</div>

				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">السكن<strong class="astric">*</strong><strong></strong> </label>
					<select name="m_living_place_id_fk" id="living_place_id" data-validation="required"  class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="" data-live-search=""   aria-required="true" >
						<?php if(isset($living_place_array) && $living_place_array!=null &&!empty($living_place_array)) { ?>
							<option value="">اختر</option>
							<?php
							foreach ($living_place_array as $row):
								$selectedx = '';
								if ($row->id_setting == $result['m_living_place_id_fk']) {
									$selectedx = 'selected';
								} ?>
								<option
									value="<?php echo $row->id_setting; ?>"<?php echo $selectedx ?> ><?php echo $row->title_setting; ?></option>
							<?php endforeach; ?>
							<option value="0"<?php if ($result['m_living_place_id_fk'] == 0) echo "selected"; ?> >اخري</option>
							<?php
						}else {
							?>
							<option value="" selected>اختر</option>
							<option value="0"<?php if ($result['m_living_place_id_fk'] == 0) echo "selected"; ?> >اخري</option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">اضافه محل سكن<strong class="astric">*</strong><strong></strong> </label>
					<input type="text" name="m_living_place"  id="m_living_place"  value="<?php echo $result['m_living_place']?>"  class="form-control half input-style" <?php if($result['m_living_place']==""){?> disabled=""<?php }?> />
				</div>
				<div class="form-group col-sm-4 col-xs-12" >
					<label class="label label-green  half">الحالة الدراسية <strong class="astric">*</strong><strong></strong> </label>
					<select name="m_education_status_id_fk"  data-validation="required" 
                         onchange="get_spestil(this.value);"
                    class="selectpicker no-padding form-control choose-date form-control half" 
                     data-show-subtext="true" aria-required="true"  data-live-search="true" >
						<option value="">اختر</option>
                        <option value="0"  <?php if($result['m_education_status_id_fk'] == "0"){echo 'selected'; }?>>
                                      ( دون سن الدراسة )</option>
                        <option value="unlettered" <?php if($result['m_education_status_id_fk'] == "unlettered"){echo 'selected'; }?>>
                                      ( امى )</option>
                        <option value="graduate" <?php if($result['m_education_status_id_fk'] ==   "graduate"){echo 'selected'; }?>>
                                      ( متخرج )</option>
                       <option value="read_write" <?php if($result['m_education_status_id_fk'] ==   "read_write"){echo 'selected'; }?>>
                                      ( يقرأو يكتب )</option>
                    
                    	<?php
						foreach($arr_ed_state as $row5){
							$selected='';
							if($row5->id_setting==$result['m_education_status_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row5->id_setting;?>"  <?php echo $selected?> ><?php  echo $row5->title_setting;?></option>
						<?php  }?>
					</select>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12">
				<div class="form-group col-sm-4 col-xs-12" >
					<label class="label label-green  half">المستوى التعليمى <strong class="astric">*</strong><strong></strong> </label>
					<select name="m_education_level_id_fk" id="educate"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true"  data-live-search="true" >
						<option value="">اختر</option>
						<?php
						foreach ($education_level_array as $row4):
							$selected='';if($row4->id_setting==$result['m_education_level_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">التخصص  </label>
					<select  name="m_specialization" id="special" class="no-padding form-control half" 
                        <?php  echo $disabled_edu; ?> > 
						<option value="">اختر</option>
						<?php foreach ($specialties as $specialty){
							$selected='';if($specialty->id_setting == $result['m_specialization']){$selected='selected';}
							?>
							<option value="<?php echo $specialty->id_setting;?>"  <?php echo $selected?>  ><?php echo $specialty->title_setting;?> </option>
						<?php }?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12"  >
					<label class="label label-green  half">ملتحقة بدار نسائية<strong class="astric">*</strong><strong></strong> </label>
					<select  name="m_female_house_check" id="eldar" class=" no-padding form-control choose-date form-control half " data-validation="required" aria-required="true"  >
						<option value="">اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
							$selected='';if($r==$result['m_female_house_check']){$selected='selected';}
							?>
							<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">اسم الدار <strong class="astric">*</strong><strong></strong> </label>
					<select class=" no-padding form-control choose-date form-control half" name="m_female_house_id_fk"  id="m_female_house_id_fk" <?php if($result['m_female_house_id_fk']==""){?> disabled=""<?php }?>>
						<option value="">اختر</option>
						<?php
						foreach ($women_houses as $row4):
							$selected='';if($row4->id_setting==$result['m_female_house_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<!--ahmed-->
				<div class="form-group col-sm-4">
					<label class="label label-green  half">الحالة الصحية<strong class="astric">*</strong><strong></strong> </label>
					<select  name="m_health_status_id_fk" id="health_state" onchange="check()"
							 data-validation="required" class=" no-padding form-control choose-date form-control half"    aria-required="true">
						<option value="">اختر</option>
						<option value="disease" <?php if($result['m_health_status_id_fk'] =='disease'){?>selected <?php } ?> > مريض </option>
						<option value="disability" <?php if($result['m_health_status_id_fk'] =='disability'){?>selected <?php } ?>>معاق</option>
						<option value="good" <?php if($result['m_health_status_id_fk'] =='good'){?>selected <?php } ?> >(سليم)</option>
						<?php
						foreach ($health_status_array as $row3):
							$selected='';if($row3->id_setting==$result['m_health_status_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">نوع المرض<strong class="astric">*</strong><strong></strong> </label>
					<select  name="disease_id_fk" id="disease_id_fk"
							 class=" no-padding form-control choose-date form-control half"
							 aria-required="true"  <?php if($result['m_health_status_id_fk'] !='disease'){ echo 'disabled=""'; } ?> >
						<option value="">اختر</option>
						<?php
						foreach ($diseases as $row3):
							$selected='';if($row3->id_setting==$result['disease_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
								<?php  echo $row3->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong> </label>
					<select  name="disability_id_fk" id="disability_id_fk" class=" no-padding form-control choose-date form-control half"     aria-required="true"
						<?php if($result['m_health_status_id_fk'] !='disability'){ echo 'disabled="disabled"'; } ?>  >
						<option value="">اختر</option>
						<?php
						foreach ($diseases as $row3):
							$selected='';if($row3->id_setting==$result['disability_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>

				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
					<input type="text" name="dis_reason" id="dis_reason"
						   value="<?php echo $result['dis_reason']?>" class="form-control half input-style "
						   data-validation="required" <?php if($result['m_health_status_id_fk'] =='good'){ echo 'disabled="disabled"'; } ?> />
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">تاريخ المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
					<input type="text" name="date_death_disease" id="date_reason"
						   value="<?php  if(isset($result['date_death_disease'])){ echo $result['date_death_disease'] ; } ?>" class="form-control half input-style docs-date"
						   data-validation="required" <?php if($result['m_health_status_id_fk'] =='good'){ echo 'disabled="disabled"'; } ?> />
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
					<select  name="dis_response_status" id="dis_response_status"
							 class=" no-padding form-control choose-date form-control half"
							 data-validation="required" aria-required="true"
						<?php if($result['m_health_status_id_fk'] =='good'){ echo 'disabled="disabled"'; } ?>>
						<option value="">اختر</option>
						<?php
						foreach ($responses as $row3):
							$selected='';if($row3->id_setting==$result['dis_response_status']){$selected='selected';}	?>
							<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
								<?php  echo $row3->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>

				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
					<select  name="dis_status" id="dis_status" class=" no-padding form-control choose-date form-control half"
							 data-validation="required" aria-required="true"
						<?php if($result['m_health_status_id_fk'] =='good'){ echo 'disabled="disabled"'; } ?>
					>
						<option value="">اختر</option>
						<?php
						foreach ($diseases_status as $row3):
							$selected='';if($row3->id_setting==$result['dis_status']){$selected='selected';}	?>
							<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<!--
<div class="form-group col-sm-4 col-xs-12">
	<label class="label label-green  half">الحالة الصحية<strong class="astric">*</strong><strong></strong> </label>
	<select  name="m_health_status_id_fk" id="m_health_status_id_fk" onchange="check()"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true">
		<option value="">اختر</option>
		<option value="disease" <?php if($result['m_health_status_id_fk'] ==='disease'){?>selected <?php } ?>>مريض</option>
		<option value="disability" <?php if($result['m_health_status_id_fk'] ==='disability'){?>selected <?php } ?>>معاق</option>
  <option value="salem" <?php if($result['m_health_status_id_fk'] ==='salem'){?>selected <?php } ?>> (سليم) </option>
        <?php
				foreach ($health_status_array as $row3):
					$selected='';if($row3->id_setting==$result['m_health_status_id_fk']){$selected='selected';}	?>
			<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
		<?php  endforeach;?>
	</select>
</div>
					<div class="form-group col-sm-4 col-xs-12">
						<label class="label label-green  half">نوع المرض<strong class="astric">*</strong><strong></strong> </label>
						<select  name="disease_id_fk" id="disease_id_fk"  class=" no-padding form-control choose-date form-control half"     aria-required="true"     <?php if( $result['m_health_status_id_fk'] !='disease'){ echo 'disabled="disabled"';}?>  >
							<option value="">اختر</option>
							<?php
				foreach ($diseases as $row3):
					$selected='';if($row3->id_setting==$result['disease_id_fk']){$selected='selected';}	?>
								<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
							<?php  endforeach;?>
						</select>
					</div>
					<div class="form-group col-sm-4 col-xs-12">
						<label class="label label-green  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong> </label>
						<select  name="disability_id_fk" id="disability_id_fk" class=" no-padding form-control choose-date form-control half"     aria-required="true" <?php if( $result['m_health_status_id_fk'] !='disability'){ echo 'disabled="disabled"';}?> >
							<option value="">اختر</option>
							<?php
				foreach ($diseases as $row3):
					$selected='';if($row3->id_setting==$result['disability_id_fk']){$selected='selected';}	?>
								<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
							<?php  endforeach;?>
						</select>
					</div>
					<div class="form-group col-sm-4 col-xs-12">
						<label class="label label-green  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
						<input type="text" name="dis_reason" id="dis_reason"
                         value="<?php echo $result['dis_reason']?>"
                         class="form-control half input-style "
                      <?php if($result['m_health_status_id_fk'] =='salem'){ echo 'disabled="disabled"'; } ?>
                          data-validation="required" />
					</div>
					<div class="form-group col-sm-4 col-xs-12">
						<label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
						<select  name="dis_response_status" id="dis_response_status"
                        class=" no-padding form-control choose-date form-control half"
                           data-validation="required" aria-required="true"
                             <?php if($result['m_health_status_id_fk'] =='salem'){ echo 'disabled="disabled"'; } ?>
                           >
							<option value="">اختر</option>
							<?php
				foreach ($responses as $row3):
					$selected='';if($row3->id_setting==$result['dis_response_status']){$selected='selected';}	?>
								<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
							<?php  endforeach;?>
						</select>
					</div>
					<div class="form-group col-sm-4 col-xs-12">
						<label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
						<select  name="dis_status" id="dis_status"
                         class=" no-padding form-control choose-date form-control half"
                          data-validation="required" aria-required="true"
                            <?php if($result['m_health_status_id_fk'] =='salem'){ echo 'disabled="disabled"'; } ?>
                          >
							<option value="">اختر</option>
							<?php
				foreach ($diseases_status as $row3):
					$selected='';if($row3->id_setting==$result['dis_status']){$selected='selected';}	?>
								<option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
							<?php  endforeach;?>
						</select>
					</div>
-->
				<div class="form-group col-sm-4 col-xs-12" >
					<label class="label label-green  half">أداء فريضة الحج<strong class="astric">*</strong><strong></strong> </label>
					<select name="m_hijri" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
						<option value="">اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
							$selected='';if($r==$result['m_hijri']){$selected='selected';}
							?>
							<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12" >
					<label class="label label-green  half">أداء فريضة العمرة<strong class="astric">*</strong><strong></strong> </label>
					<select name="m_ommra" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
						<option value="">اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
							$selected='';if($r==$result['m_ommra']){$selected='selected';}
							?>
							<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
					</select>
				</div>

				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">رقم الجوال <strong class="astric">*</strong><strong></strong> </label>
					<input type="text"  onkeypress="validate_number(event)" maxlength="10" name="m_mob"
                           value="<?php echo $result['m_mob']?>"   id="m_mob"   
                           class="form-control half input-style" data-validation="required"
                            onkeyup="check_length_num(this,10,'m_mob_span');"  />
					<span  id="m_mob_span" class="span-validation"> </span>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">رقم جوال أخر  </label>
					<input type="text" onkeypress="validate_number(event)" name="m_another_mob" id="m_another_mob" 
                    onkeyup="check_length_num(this,10,'m_another_mob_span');" value="<?php echo $result['m_another_mob']?>" 
                      class="form-control half input-style" maxlength="10" />
					<span  id="m_another_mob_span" class="span-validation"> </span>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">البريد الإلكترونى  </label>
					<input type="email" name="m_email" value="<?php echo $result['m_email']?>"  class="form-control half input-style"  />
				</div>

				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">المهارة </label>
					<input type="text" name="m_skill_name"  value="<?php echo $result['m_skill_name']?>"  class="form-control half input-style" />
				</div>
				<div class="form-group col-sm-4 col-xs-12" >
					<label class="label label-green  half">الحياة العملية <strong class="astric">*</strong><strong></strong> </label>
					<select name="m_want_work"    id="m_want_work"   onchange="getWork();" class=" no-padding form-control choose-date form-control half"  data-validation="required" aria-required="true" >
						<option value="">اختر</option>
						<?php
						$arr_work =array('','لا يعمل','يعمل');
						for($r=1;$r<sizeof($arr_work);$r++){
							$selected=''; if($r==$result['m_want_work']){$selected='selected';}
							?>
							<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_work[$r];?> </option>
						<?php }?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12"  >
					<label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong> </label>
					<select  name="m_job_id_fk" id="m_job_id_fk"
							 class=" no-padding form-control choose-date form-control half "
							 aria-required="true"  <?php if($result['m_want_work'] ==1){?> disabled="disabled" <?php }?> >
						<option value="">اختر</option>
						<?php
						foreach ($job_titles as $job):
							$selected='';if($job->id_setting==$result['m_job_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $job->id_setting; ?>"  <?php echo $selected?> ><?php  echo $job->title_setting;?></option>
						<?php  endforeach;?>
						<option value="0">أخري</option>
					</select>
				</div>

				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">الدخل الشهرى<strong class="astric">*</strong><strong></strong> </label>
					<input type="text" step="any" name="m_monthly_income" onkeypress="validate_number(event)"  data-validation="" value="<?php echo $result['m_monthly_income'];?>"  id="mo-income" class="form-control half input-style" <?php if($result['m_want_work'] ==1){?>  disabled="disabled" <?php }?>/>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">مكان العمل<strong class="astric">*</strong><strong></strong> </label>
					<input type="text"  name="m_place_work" id="m_place_work"  data-validation="" value="<?php echo $result['m_place_work'];?>"  class="form-control half input-style"  <?php if($result['m_want_work'] ==1){?>  disabled="disabled"  <?php }?>/>
				</div>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">هاتف العمل<strong class="astric">*</strong><strong></strong> </label>
					<input type="text" step="any" name="m_place_mob"
						   id="m_place_mob" onkeyup="chek_length('m_place_mob')"
						   onkeypress="validate_number(event)" data-validation=""
						   value="<?php echo $result['m_place_mob'];?>"
						   class="form-control half input-style"
						<?php if($result['m_want_work'] ==1){?>  disabled="disabled"  <?php }?>/>
					<span  id="m_place_mob_span" class="span-validation"> </span>
				</div>
				<!----------------------------------------->
				<!--      <div class="form-group col-sm-4 col-xs-12">
	<label class="label label-green  half">القدرة علي العمل<strong class="astric">*</strong><strong></strong> </label>
	<select  name="ability_work" id="ability_work" class="no-padding form-control choose-date form-control half"
             data-validation="" onchange="get_work($(this).val())"
                 aria-required="true" <?php if(isset($result['m_want_work'])){ if($result['m_want_work'] ==2){?>
                     disabled="disabled"  <?php }}?> >
		<?php $yes_no=array('لا','نعم');?>
		<option value="">إختر</option>
		<?php for ($w=0;$w<sizeof($yes_no);$w++){  $select='';if(isset($result['ability_work']))
				{ if( $result['ability_work']==$w){$select='selected'; }}?>
			<option value="<?php echo $w;?>" <?php echo $select;?>><?php echo $yes_no[$w];?></option>
		<?php } ?>
	</select>
</div>
-->
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">القدرة علي العمل<strong class="astric">*</strong><strong></strong> </label>
					<select  name="ability_work" id="ability_work" class="no-padding form-control choose-date form-control half"
							 data-validation="" onchange="get_work($(this).val())"
							 aria-required="true"
						<?php if(isset($result['m_want_work']))
						{ if($result['m_want_work'] == 1){?>  disabled="disabled"  <?php }}?>
					>
						<?php $yes_no=array('لا','نعم');?>
						<option value="">إختر</option>
						<?php for ($w=0;$w<sizeof($yes_no);$w++){  $select='';if(isset($result['ability_work'])){ if( $result['ability_work']==$w){$select='selected'; }}?>
							<option value="<?php echo $w;?>" <?php echo $select;?>><?php echo $yes_no[$w];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12"  >
					<label class="label label-green  half"> نوع العمل<strong class="astric">*</strong><strong></strong> </label>
					<select  name="work_type_id_fk" id="work_type_id_fk"
							 class=" no-padding form-control choose-date form-control half "
							 aria-required="true"
						<?php if(isset($result['m_want_work']))
						{ if($result['m_want_work'] == 1){?>  disabled="disabled"  <?php }}?>
					>
						<option value="">اختر</option>
						<?php
						foreach ($works_type as $work):
							$selected='';if($work->id_setting==$result['work_type_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $work->id_setting; ?>"  <?php echo $selected?> ><?php  echo $work->title_setting;?></option>
						<?php  endforeach;?>
						<option value="0">أخري</option>
					</select>
				</div>
				<div class="form-group col-sm-4 col-xs-12"  >
					<label class="label label-green  half">طبيعة الشخصية<strong class="astric">*</strong><strong></strong> </label>
					<select  name="personal_character_id_fk" id="personal_character_id_fk" class=" no-padding form-control choose-date form-control half "   aria-required="true"  >
						<option value="">اختر</option>
						<?php
						foreach ($personal_characters as $character):
							$selected='';if($character->id_setting==$result['personal_character_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $character->id_setting; ?>"  <?php echo $selected?> ><?php  echo $character->title_setting;?></option>
						<?php  endforeach;?>
						<option value="0">أخري</option>
					</select>
				</div>

				<div class="form-group col-sm-4 col-xs-12"  >
					<label class="label label-green  half">العلاقة بالأسرة<strong class="astric">*</strong><strong></strong> </label>
					<select  name="relation_with_family" id="relation_with_family" class=" no-padding form-control choose-date form-control half "   aria-required="true"  >
						<option value="">اختر</option>
						<?php
						foreach ($relations_with_family as $relation):
							$selected='';if($relation->id_setting==$result['relation_with_family']){$selected='selected';}	?>
							<option value="<?php  echo $relation->id_setting; ?>"  <?php echo $selected?> ><?php  echo $relation->title_setting;?></option>
						<?php  endforeach;?>
						<option value="0">أخري</option>
					</select>
				</div>
				<?php /* ?>
          <?php
		  if( $person_account ==0  &&  $agent_bank_account ==0 &&   $mother_last_account ==0  ){?>
          <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
              <select name="m_account" id="m_account_d"  onchange="checkaccount();" class="form-control half">
                  <?php $yes_no=array('لا','نعم');?>
                  <option value="">إختر</option>
                  <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['m_account']==$s){$select='selected'; }?>
                      <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
              <select name="m_account_id" id="m_account_id" <?php if(isset($result['m_account'])&&$result['m_account']==0){ echo 'disabled' ; } ?> class="form-control half   "   onchange="get_code2()";   >
                  <?php $yes_no=array('لا','نعم');?>
                  <option value="">إختر</option>
                  <?php  if(!empty($banks)){
                      foreach ($banks as $bank){  $select=''; if($result['m_account_id']>0 &&  $result['m_account_id'] == $bank->id.'-'.$bank->bank_code){$select='selected'; }?>
                          <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>" <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                      <?php }
                  } ?>
              </select>
          </div>
			  <div class="form-group col-sm-4 col-xs-12" >
				  <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
				  <input type="text" class="form-control half input-style"
						 name="bank_ramz" readonly="readonly"   id="ramz_code"    />
			  </div>
			  <div class="form-group col-sm-4 col-xs-12" >
				  <label class="label label-green  half">رقم الحساب <strong class="astric">*</strong> </label>
				  <input type="text" <?php if(isset($result['m_account'])&&$result['m_account']==0){ echo 'disabled' ; } ?> class="form-control half input-style"maxlength="24" minlength="24"
						 value="<?php if(isset($result['bank_account_num'])){ echo $result['bank_account_num'] ; } ?>"
						 name="bank_account"  id="hesab_bank_2" onkeyup="length_hesab_om($(this).val());"
				  />
				  <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
			  </div>
         <!-- <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
              <select name="m_account" id="m_account"  onchange="checkMember_account();" class="form-control half">
                  <?php $yes_no=array('لا','نعم');?>
                  <option value="">إختر</option>
                  <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['m_account']==$s){$select='selected'; }?>
                      <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong> </label>
              <select name="m_account_id" id="m_account_id" class="form-control half   "  disabled="disabled" >
                  <?php $yes_no=array('لا','نعم');?>
                  <option value="">إختر</option>
                  <?php  if(!empty($banks)){
                      foreach ($banks as $bank){  $select=''; if($result['m_account_id']>0 &&  $result['m_account_id'] == $bank->id){$select='selected'; }?>
                          <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                      <?php }
                  } ?>
              </select>
          </div>
          -->
          <?php }elseif($result['m_account'] ==1){ ?>
			  <div class="form-group col-sm-4 col-xs-12">
				  <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
				  <select name="m_account" id="m_account"  onchange="checkMember_account();" class="form-control half">
					  <?php $yes_no=array('لا','نعم');?>
					  <option value="">إختر</option>
					  <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['m_account']==$s){$select='selected'; }?>
						  <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
					  <?php } ?>
				  </select>
			  </div>
			  <div class="form-group col-sm-4 col-xs-12">
				  <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong> </label>
				  <select name="m_account_id" id="m_account_id" class="form-control half   "  disabled="disabled" >
					  <?php $yes_no=array('لا','نعم');?>
					  <option value="">إختر</option>
					  <?php  if(!empty($banks)){
						  foreach ($banks as $bank){  $select=''; if(  $result['m_account_id'] == $bank->id){$select='selected'; }?>
							  <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
						  <?php }
					  } ?>
				  </select>
			  </div>
					<?php } ?>
<?php */ ?>
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">مكفول<strong class="astric">*</strong><strong></strong> </label>
					<select  name="guaranteed_m" class="selectpicker no-padding form-control choose-date form-control half"
					"  data-validation="required"  aria-required="true">
					<?php $yes_no=array('لا','نعم');?>
					<option value="">إختر</option>
					<?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['guaranteed_m']==$s){$select='selected'; }?>
						<option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
					<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<!------------------------------------>
		<div class="col-xs-12">
			<?php if(isset($all_links['mother']) && $all_links['mother']!=null):$input_name1='update';$input_name2='update_save';else:  $input_name1='add';$input_name2='add_save'; endif; ?>
			<input type="submit"   id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ"/>
		</div>
		<?php  echo form_close()?>
		<br/>
		<br/>
	</div>
</div>
<script>
	function chek_length(inp_id)
	{
		var inchek_id="#"+inp_id;
		var inchek =$(inchek_id).val();
		if(inchek.length < 10){
			document.getElementById(""+ inp_id +"_span").style.color = '#F00';
			document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
			document.getElementById("buttons").setAttribute("disabled", "disabled");
			//   var inchek_out= inchek.substring(0,10);
			//  $(inchek_id).val(inchek_out);
			//  document.getElementById("buttons").removeAttribute("disabled", "disabled");
		}
		if(inchek.length > 10){
			document.getElementById(""+ inp_id +"_span").style.color = '#F00';
			document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
			document.getElementById("buttons").setAttribute("disabled", "disabled");
			//  var inchek_out= inchek.substring(0,10);
			// $(inchek_id).val(inchek_out);
		}
		if(inchek.length == 10){
			document.getElementById("buttons").removeAttribute("disabled", "disabled");
		}
	}
</script>
<script>
	document.getElementById("m_nationality").onchange = function () {
		if (this.value == 20)
			document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("nationality_other").setAttribute("disabled", "disabled");
			$("#nationality_other").val("");
		}
	};
</script>
<script>
	document.getElementById("educate").onchange = function () {
		if (this.value >= 5 )
			document.getElementById("special").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("special").setAttribute("disabled", "disabled");
			$("#special").val("");
		}
	};
</script>
  <script>
    function get_spestil(val_pass){  // m_education_level_id_fk
 
        	if (val_pass == "unlettered" || val_pass == "0"  || val_pass =="read_write" ){
            document.getElementById("special").setAttribute("disabled", "disabled");
            document.getElementById("special").removeAttribute("data-validation", "required");
            document.getElementById("educate").setAttribute("disabled", "disabled");
            document.getElementById("educate").removeAttribute("data-validation", "required");
            }else{
			document.getElementById("special").removeAttribute("disabled", "disabled");
            document.getElementById("special").setAttribute("data-validation", "required");
            document.getElementById("educate").removeAttribute("disabled", "disabled");
            document.getElementById("educate").setAttribute("data-validation", "required");
            $('#educate').selectpicker("refresh");
		}
    }
  
  
  </script>


<script>
	document.getElementById("eldar").onchange = function () {
		if (this.value == 1 )
			document.getElementById("m_female_house_id_fk").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("m_female_house_id_fk").setAttribute("disabled", "disabled");
			$("#dar-name").val("");
		}
	};
</script>
<script>
	document.getElementById("living_place_id").onchange = function () {
		if (this.value == 0)
			document.getElementById("living-place").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("living-place").setAttribute("disabled", "disabled");
			$("#living-place").val("");
		}
	};
</script>
<script>
	document.getElementById("job").onchange = function () {
		if (this.value == 0 )
			document.getElementById("jobb-input").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("jobb-input").setAttribute("disabled", "disabled");
			$("#jobb-input").val("");
		}
		if (this.value == 3)
			document.getElementById("mo-income").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("mo-income").setAttribute("disabled", "disabled");
			$("#mo-income").val("");
		}
	};
</script>
<!--------------------------------------------------------------------->
<script>
	/*
	 function check() {
	 var type =$('#m_health_status_id_fk').val();
	 if(type === 'disease') {
	 document.getElementById("disease_id_fk").removeAttribute("disabled", "disabled");
	 document.getElementById("disease_id_fk").setAttribute("data-validation", "required");
	 document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
	 document.getElementById("disability_id_fk").removeAttribute("data-validation", "required");
	 }else if(type === 'disability'){
	 document.getElementById("disability_id_fk").removeAttribute("disabled", "disabled");
	 document.getElementById("disability_id_fk").setAttribute("data-validation", "required");
	 document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
	 document.getElementById("disease_id_fk").removeAttribute("data-validation", "required");
	 }
	 }
	 */
	/*  function check() {
	 var type = $('#m_health_status_id_fk').val();
	 if (type=='salem') {
	 document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
	 document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
	 document.getElementById("dis_date_ar").setAttribute("disabled", "disabled");
	 document.getElementById("dis_reason").setAttribute("disabled", "disabled");
	 document.getElementById("dis_response_status").setAttribute("disabled", "disabled");
	 document.getElementById("dis_status").setAttribute("disabled", "disabled");
	 }else{
	 document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
	 document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
	 document.getElementById("dis_date_ar").removeAttribute("disabled", "disabled");
	 document.getElementById("dis_reason").removeAttribute("disabled", "disabled");
	 document.getElementById("dis_response_status").removeAttribute("disabled", "disabled");
	 document.getElementById("dis_status").removeAttribute("disabled", "disabled");
	 }
	 if(type=='disease') {
	 document.getElementById("disease_id_fk").removeAttribute("disabled","disabled");
	 } else{
	 document.getElementById("disease_id_fk").setAttribute("disabled","disabled");
	 }
	 if (type=='disability') {
	 document.getElementById("disability_id_fk").removeAttribute("disabled", "disabled");
	 }else{
	 document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
	 }
	 }
	 */
	function check() {
		var type =$('#health_state').val();
		//  alert(type);
		if(type === 'disease') {   //  removeAttribute      setAttribute
			/*  document.getElementById("dis_date_ar").removeAttribute("disabled", "disabled");
			 */
			document.getElementById("dis_status").removeAttribute("disabled", "disabled");
			document.getElementById("dis_response_status").removeAttribute("disabled", "disabled");
			document.getElementById("dis_reason").removeAttribute("disabled", "disabled");
			document.getElementById("disease_id_fk").removeAttribute("disabled", "disabled");
			document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
			/*   document.getElementById("dis_date_ar").setAttribute("data-validation", "required");
			 */
			document.getElementById("date_reason").removeAttribute("disabled", "disabled");
			document.getElementById("dis_status").setAttribute("data-validation", "required");
			document.getElementById("dis_response_status").setAttribute("data-validation", "required");
			document.getElementById("dis_reason").setAttribute("data-validation", "required");
			document.getElementById("disease_id_fk").setAttribute("data-validation", "required");
			document.getElementById("disability_id_fk").removeAttribute("data-validation", "required");
		}else if(type === 'disability'){ //  removeAttribute      setAttribute
			/*  document.getElementById("dis_date_ar").removeAttribute("disabled", "disabled");
			 */
			document.getElementById("date_reason").removeAttribute("disabled", "disabled");
			document.getElementById("dis_status").removeAttribute("disabled", "disabled");
			document.getElementById("dis_response_status").removeAttribute("disabled", "disabled");
			document.getElementById("dis_reason").removeAttribute("disabled", "disabled");
			document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("disability_id_fk").removeAttribute("disabled", "disabled");
			/*  document.getElementById("dis_date_ar").setAttribute("data-validation", "required");
			 */
			document.getElementById("dis_status").setAttribute("data-validation", "required");
			document.getElementById("dis_response_status").setAttribute("data-validation", "required");
			document.getElementById("dis_reason").setAttribute("data-validation", "required");
			document.getElementById("disease_id_fk").removeAttribute("data-validation", "required");
			document.getElementById("disability_id_fk").setAttribute("data-validation", "required");
		}else if(type === 'good'){
			/* document.getElementById("dis_date_ar").setAttribute("disabled", "disabled");
			 */
			document.getElementById("dis_status").setAttribute("disabled", "disabled");
			document.getElementById("dis_response_status").setAttribute("disabled", "disabled");
			document.getElementById("dis_reason").setAttribute("disabled", "disabled");
			document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("date_reason").setAttribute("disabled", "disabled");
			/*   document.getElementById("dis_date_ar").removeAttribute("data-validation", "required");
			 */
			document.getElementById("dis_status").removeAttribute("data-validation", "required");
			document.getElementById("dis_response_status").removeAttribute("data-validation", "required");
			document.getElementById("dis_reason").removeAttribute("data-validation", "required");
			document.getElementById("disease_id_fk").removeAttribute("data-validation", "required");
			document.getElementById("disability_id_fk").removeAttribute("data-validation", "required");
		} else if(type == 0){
			document.getElementById("health_other").removeAttribute("disabled", "disabled");
			document.getElementById("health_other").setAttribute("data-validation", "required");
		}
	}
</script>
<script>
	document.getElementById('m_nationality').onchange=function() {
		var x = $(this).val();
		if (x == 0) {
			document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
			document.getElementById("nationality_other").setAttribute("data-validation", "required");
		}else{
			document.getElementById("nationality_other").setAttribute("disabled", "disabled");
			document.getElementById("nationality_other").removeAttribute("data-validation", "required");
		}
	}
</script>
<script>
	document.getElementById('living_place_id').onchange=function() {
		var x = $(this).val();
		if (x == 0) {
			document.getElementById("m_living_place").removeAttribute("disabled", "disabled");
			document.getElementById("m_living_place").setAttribute("data-validation", "required");
		}else{
			document.getElementById("m_living_place").setAttribute("disabled", "disabled");
			document.getElementById("m_living_place").removeAttribute("data-validation", "required");
		}
	}
</script>
<script>
	document.getElementById('eldar').onchange=function() {
		var x = $(this).val();
		if (x == 1) {
			document.getElementById("m_female_house_id_fk").removeAttribute("disabled", "disabled");
			document.getElementById("m_female_house_id_fk").setAttribute("data-validation", "required");;
		}else{
			document.getElementById("m_female_house_id_fk").value='';
			document.getElementById("m_female_house_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("m_female_house_id_fk").removeAttribute("data-validation", "required");;
		}
	}
</script>
<script>
	document.getElementById('f_national_id').onkeyup=function() {
		var x = $(this).val();
		if(x.length>10){
			document.getElementById('validate1').style.color = '#F00';
			document.getElementById('validate1').innerHTML = 'رقم الهويةمكون  من عشر أرقام فقط ';
			$('#f_national_id').val("");
		}if(x.length==10){
			document.getElementById('validate1').style.color = '#F00';
			document.getElementById('validate1').innerHTML = 'رقم هويه صحيح';
		}
		if(x.length<10) {
			document.getElementById('validate1').style.color = '#F00';
			document.getElementById('validate1').innerHTML = 'رقم الهويه لابد ان يكون عشر ارقام';
		}
	}
</script>
<!--ahmed-->
<script>
	function getWork() {
		var work =$('#m_want_work').val();
	//	alert(work);
		if(work ==1){
			document.getElementById("ability_work").removeAttribute("disabled", "disabled");
			document.getElementById("work_type_id_fk").removeAttribute("disabled", "disabled");
			document.getElementById("m_job_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("mo-income").setAttribute("disabled", "disabled");
			document.getElementById("m_place_work").setAttribute("disabled", "disabled");
			document.getElementById("m_place_mob").setAttribute("disabled", "disabled");
			document.getElementById("m_job_id_fk").value="";
			document.getElementById("income").value="";
			document.getElementById("m_place_work").value="";
			document.getElementById("m_place_mob").value="";
			document.getElementById("ability_work").value="";
			document.getElementById("work_type_id_fk").value="";
		}
		if(work ==2){
			document.getElementById("m_job_id_fk").removeAttribute("disabled", "disabled");
			document.getElementById("mo-income").removeAttribute("disabled", "disabled");
			document.getElementById("m_place_work").removeAttribute("disabled", "disabled");
			document.getElementById("m_place_mob").removeAttribute("disabled", "disabled");
			document.getElementById("ability_work").setAttribute("disabled", "disabled");
			document.getElementById("work_type_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("m_job_id_fk").setAttribute("data-validation", "required");
			document.getElementById("mo-income").setAttribute("data-validation", "required");
			document.getElementById("m_place_work").setAttribute("data-validation", "required");
			document.getElementById("m_place_mob").setAttribute("data-validation", "required");
			document.getElementById("ability_work").value="";
			document.getElementById("work_type_id_fk").value="";
		}
	}
</script>
<script>
	function getAge() {
		var nowYear =(new Date()).getFullYear();
		var myAge = ( nowYear- $('#CYear').val() );
		$('#myage').val(myAge)
	}
</script>
<script>
	function checkMember_account() {
		var member_account = $('#m_account').val();
		if (member_account == 0) {
			document.getElementById("m_account_id").setAttribute("disabled", "disabled");
			document.getElementById("m_account_id").value = "";
		} else {
			document.getElementById("m_account_id").removeAttribute("disabled", "disabled");
		}
	}
</script>
<!--ahmed-->
<script>
	function get_code()
	{
		var valu=$('#hesab_name').val();
		var valu=valu.split("-");
		$('#bank_code').val(valu[1]);
	}
</script>
<script>
	function get_code2()
	{
		var valu=$('#m_account_id').val();
		var valu=valu.split("-");
		$('#ramz_code').val(valu[1]);
	}
</script>
<script>
	function checkMember()
	{
		var valu=$('#m_account').val();
		if(valu==0)
		{
			document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
			document.getElementById("hesab_name").setAttribute("disabled", "disabled");
		}if(valu==1)
	{
		document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");
		document.getElementById("hesab_name").removeAttribute("disabled", "disabled");
	}
	}
</script>
<script>
	function checkaccount()
	{
		var valu=$('#m_account_d').val();
		if(valu==0)
		{
			document.getElementById("m_account_id").setAttribute("disabled", "disabled");
			document.getElementById("hesab_bank_2").setAttribute("disabled", "disabled");
		}if(valu==1)
	{
		document.getElementById("hesab_bank_2").removeAttribute("disabled", "disabled");
		document.getElementById("m_account_id").removeAttribute("disabled", "disabled");
	}
	}
</script>
<script>
	function length_hesab_om(length) {
		var len=length.length;
		if(len<24){
			document.getElementById("buttons").setAttribute("disabled", "disabled");
		}
		if(len>24){
			document.getElementById("buttons").setAttribute("disabled", "disabled");
		}
		if(len==24){
			document.getElementById("buttons").removeAttribute("disabled", "disabled");
		}
	}
</script>
<script>
	function get_work(value) {
		if(value == 0){
			document.getElementById("work_type_id_fk").setAttribute("disabled", "disabled");
		}else if(value == 1){
			document.getElementById("work_type_id_fk").removeAttribute("disabled", "disabled");
			document.getElementById("work_type_id_fk").setAttribute("data-validation", "required");
			document.getElementById("work_type_id_fk").value="";
		}
	}
</script>
<script>
function check_length_num(this_input,max_lenth,span_id) {
         if($(this_input).val().length != max_lenth   ){
             $(this_input).css("border-color" , "red");
             $("#"+span_id).html("الرقم مكون من"  +max_lenth+"أرقام" );
             $('input[type="submit"]').attr("disabled","disabled");
        }else{
             $(this_input).css("border-color" , "green");
             $("#"+span_id).html("");
             $('input[type="submit"]').removeAttr("disabled");
        }
    }


</script>