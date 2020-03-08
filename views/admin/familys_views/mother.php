
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>

<style>
	/**************************/
	/* 27-1-2019 */
	label.label-green {
		height: auto;
		line-height: unset;
		font-size: 14px !important;
		font-weight: 600 !important;
		text-align: right !important;
		margin-bottom: 0;
		background-color: transparent;
		color: #002542;
		border: none;
		padding-bottom: 0;
		font-weight: bold;
	}
	.half {
		width: 100% !important;
		float: right !important;
	}
	.input-style {
		border-radius: 0px;
		border-right: 1px solid #eee;
	}
	.form-group {
		margin-bottom: 0px;
	}
	.bootstrap-select>.btn {
		width: 100%;
		padding-right: 5px;
	}
	.bootstrap-select.btn-group .dropdown-toggle .caret {
		right: auto !important; 
		left: 4px;
	}
	.bootstrap-select.btn-group .dropdown-toggle .filter-option {
		font-size: 15px;
	}
/*	.form-control{
		font-size: 15px;
		color: #000;
		border-radius: 4px;
		border: 2px solid #b6d089 !important;
	}*/
	.form-control:focus {
		border: 2px solid #b6d089;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: 2px 2px 2px 1px #beffc3;
	}
	.has-success .form-control {
		border: 2px solid #b6d089;

		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	}
	.has-success  .form-control:focus {
		border: 2px solid #b6d089;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: 2px 2px 2px 1px #beffc3;
	}

	.tab-content {
		margin-top: 15px;
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
       //$result['m_relationship']=$basic_data_family["person_relationship"];

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
$data_load["employees"] = $employees;
$this->load->view('admin/familys_views/drop_down_button', $data_load); ?>



<div class="col-xs-12 " >
	<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $title?>
				<?php $marital_status_id_fk_mother =$basic_data_family['marital_status_id_fk_mother'];

				?>
			</h3>
		</div>
        	<?php echo form_open_multipart('family_controllers/Family/mother/'.$this->uri->segment(4).'');?>

		<div class="panel-body" style="height: 400px;">
		

			<!-- ----------------------------------------------------------------------------- -->
			<div class="custom-tabs" >

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#main-detailsa" aria-controls="main-detailsa" role="tab" data-toggle="tab">البيانات الأساسية</a></li>
					<li role="presentation"><a href="#contact-details" aria-controls="contact-details" role="tab" data-toggle="tab">بيانات التواصل</a></li>
					<li role="presentation"><a href="#health-details" aria-controls="health-details" role="tab" data-toggle="tab">البيانات الصحية</a></li>
					<li role="presentation"><a href="#education-details" aria-controls="education-details" role="tab" data-toggle="tab">البيانات العلمية والعملية</a></li>
					
					<li role="presentation"><a href="#skills-details" aria-controls="skills-details" role="tab" data-toggle="tab">الدورات والمهارات</a></li>
					<li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">آخرى</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="main-detailsa">
						<div class="col-sm-12 col-xs-12">
							<div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
								<label class="label label-green  half"> الاسم رباعي  </label>
								<input type="text" name="fullname"   value="<?php echo $result['full_name'];?>" class="form-control half input-style"  data-validation="required" />
							</div>
							

							<div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
								<label class="label label-green  half">رقم الهوية<strong></strong> </label>
								<input type="text" name="mother_national_card_new" maxlength="10"
								id="mother_national_card_new" data-validation="required"
								onkeyup="check_length_num(this,10,'f_national_id_span');"
								value="<?php echo $result['mother_national_card_new']; ?>" onkeypress="validate_number(event)"
								class="form-control half input-style" />
								<span  id="f_national_id_span" class="span-validation"> </span>
							</div>
							<div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
								<label class="label label-green  half">نوع الهوية<strong></strong> </label>
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
						<div class="form-group col-md-1 col-sm-4 col-xs-12 padding-4">
							<label class="label label-green  half">مصدر الهوية<strong></strong> </label>
							<select  name="m_card_source" id="m_card_source"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true"   aria-required="true">
								<option value="">إختر</option>
								<?php if(!empty($id_source)){ foreach ($id_source as $record){
									$select=''; if($result['m_card_source']==$record->id_setting){$select='selected'; }
									?>
									<option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
									<?php  } } ?>
								</select>
							</div>

							<!--end here-->


							<div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
								<?php  $hijri_date=explode('/',$result['m_birth_date_hijri']); ?>
								<label class="label label-green  half">تاريخ الميلاد هجرى </label>
								<input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)"
								onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 33.33%;float: right;"/>
								<input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
								onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 33.33%;float: right;"/>
								<input class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
								onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 33.33%;float: right;"/>
							</div>
							<div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
								<?php
								$gregorian_date=explode('/',$result['m_birth_date']); 	 ?>
								<label class="label label-green  half">تاريخ الميلاد </label>
								<input class="textbox form-control" data-validation="required" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 33.33%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
								<input class="textbox form-control" data-validation="required" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 33.33%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
								<input class="textbox4 form-control" data-validation="required" type="text" name="CYear"  id="CYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"   placeholder="year"  id="CYear" size="20" maxlength="4"  style="width: 33.33%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
							</div>
							<div class="form-group col-md-1 col-sm-4 col-xs-12 padding-4">
								<label class="label label-green  half">العمر<strong></strong> </label>
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
                           <div class="col-xs-12 ">


                           	<div class="form-group col-md-1 padding-4 col-sm-4 col-xs-12">
                           		<label class="label label-green  half">الصلة<strong></strong> </label>
                           		<select name="m_relationship" id="m_relationship"  data-validation="required" aria-required="true" class="selectpicker no-padding form-control choose-date form-control half">
                           			<option value="">إختر</option>
                           			<?php if(!empty($relationships)){ foreach ($relationships as $record){
                           				$select='';

                           				if($result['m_relationship']==$record->id_setting){$select='selected';
                           			}elseif($marital_status_id_fk_mother == 1951){
                           				if($record->id_setting == 41){$select='selected'; } }
                           				?>
                           				<option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                           				<?php  } } ?>
                           			</select>
                           		</div>

                           		<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                           			<label class="label label-green  half">الحالة الإجتماعية<strong></strong> </label>
                           			<select  name="m_marital_status_id_fk"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
                           				<option value="">اختر</option>
                           				<?php foreach ($marital_status_array as $row6):
                           				$selected='';if($row6->id_setting==$result['m_marital_status_id_fk']){$selected='selected';
                           			}elseif($marital_status_id_fk_mother == 1951){
                           				if( $row6->id_setting == 1951){$selected='selected'; } }

                           				?>
                           				<option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                           			<?php  endforeach;?>
                           		</select>
                           	</div>

                           	<div class="form-group col-md-1 padding-4 col-sm-4">
                           		<label class="label label-green  half"> الجنس   </label>
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
                           		<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                           			<label class="label label-green  half">الجنسية<strong></strong> </label>
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
                           	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                           		<label class="label label-green  half">اضافه جنسيه اخري<strong></strong> </label>
                           		<input type="text" name="nationality_other" id="nationality_other"   value="<?php echo $result['nationality_other']?>"  class="form-control half input-style" <?php if($result['nationality_other']==""){?> disabled=""<?php }?>/>
                           	</div>







                           	<?php if($marital_status_id_fk_mother == 1951){?>

                           	<div class="col-sm-12 col-xs-12">

                           		<div class="form-group col-sm-4 col-xs-12">
                           			<label class="label label-green  half">تاريخ الوفاة هجري <strong
                           				class="astric">*</strong><strong></strong> </label>
                           				<input id="date0" name="m_death_date" type="text" size="10" maxlength="10" style="width: 80px;"
                           				class="form-control half input-style"
                           				value="<?php if(!empty( $result['m_death_date'])){ echo $result['m_death_date']; } ?>"
                           				data-validation="required"/>
                           			</div>
                           			<div class="form-group col-sm-4 col-xs-12">
                           				<label class="label label-green  half">سبب الوفاة<strong></strong></label>
                           				<textarea name="m_death_reason" style="margin: 0px; width: 306px; height: 49px;"  id="m_death_reason" cols="30" rows="10"><?php if(!empty( $result['m_death_reason'])){  echo $result['m_death_reason'];} ?></textarea>
                           			</div>
                           			<input type="hidden" name="halt_elmostafid_m" value="4">
                           		</div>


                           		<?php }else{ ?>


                           		<div class="form-group  col-md-2 padding-4 col-sm-4 col-xs-12">
                           			<label class="label label-green  half">السكن<strong></strong> </label>
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
                           <div class="form-group  col-md-2 padding-4 col-sm-4 col-xs-12">
                           	<label class="label label-green  half">اضافه محل سكن<strong></strong> </label>
                           	<input type="text" name="m_living_place"  id="m_living_place"  value="<?php echo $result['m_living_place']?>"  class="form-control half input-style" <?php if($result['m_living_place']==""){?> disabled=""<?php }?> />
                           </div>


                       </div>
                       <div class="col-xs-12 ">



                       	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                       		<label class="label label-green  half">طبيعة الفرد<strong></strong> </label>
                       		<select  name="person_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                       			<option value="">اختر</option>
                       			<?php
                       			foreach ($person_type as $row2):
                       				$selected = '';
                       			if ($row2->id_setting == $result['person_type']) {
                       				$selected = 'selected';
                       			} 

                       			if($marital_status_id_fk_mother == 1951){ 
                       				if( $row2->id_setting == 63){$selected='selected'; } }
                       				?>
                       				<option
                       				value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                       			<?php endforeach;?>63
                       		</select>
                       	</div>
                       	<?php if($marital_status_id_fk_mother != 1951){?>
                       	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                       		<label class="label label-green  half">حاله المستفيد<strong></strong> </label>
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
                       	<div class="form-group  col-md-2 padding-4 col-sm-4 col-xs-12">
                       		<label class="label label-green  half">التصنيف<strong></strong> </label>
                       		<select  name="categoriey_m" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                       			<?php $categories=array(1=>'أرملة',4=>"إخرى");?>
                       			<option value="">إختر</option>
                       			<?php foreach($categories as $key=>$value){  $select=''; if( $result['categoriey_m']==$key){$select='selected'; }?>
                       			<option value="<?php echo $key;?>" <?php echo $select;?>><?php echo $value;?></option>
                       			<?php } ?>
                       		</select>
                       	</div>
                       	<?php }else{?>


                       	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                       		<label class="label label-green  half">رقم الهوية<strong></strong> </label>
                       		<input type="text" name="mother_national_card_new" maxlength="10"
                       		id="mother_national_card_new" data-validation="required"
                       		onkeyup="check_length_num(this,10,'f_national_id_span');"
                       		value="<?php echo $result['mother_national_card_new']; ?>" onkeypress="validate_number(event)"
                       		class="form-control half input-style" />
                       		<span  id="f_national_id_span" class="span-validation"> </span>
                       	</div>
                       	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                       		<label class="label label-green  half">الجنسية<strong></strong> </label>
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

                       <?php } ?>


                    <!--   <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                       	<label class="label label-green  half">مكفول<strong></strong> </label>
                       	<select  name="guaranteed_m" class="selectpicker no-padding form-control choose-date form-control half"
                       	"  data-validation="required"  aria-required="true">
                       	<?php $yes_no=array('لا','نعم');?>
                       	<option value="">إختر</option>
                       	<?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['guaranteed_m']==$s){$select='selected'; }?>
                       	<option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                       	<?php } ?>
                       </select>
                   </div> -->
                   
                       <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                       	<label class="label label-green  half">مكفول<strong></strong> </label>
                       	<select  name="guaranteed_m"  disabled class="selectpicker no-padding form-control choose-date form-control half"
                       	"  data-validation="required"  aria-required="true">
                       	<?php /* $yes_no=array('لا','نعم');?>
                       	<option value="">إختر</option>
                       	<?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['guaranteed_m']==$s){$select='selected'; }?>
                       	<option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                       	<?php } */?>
                           <?php if(!empty($kafala_details)){ ?>
                               <option selected>نعم</option>
                           <?php }else{ ?>
                               <option  selected>لا</option>
                           <?php } ?>
                       </select>

                   </div>
                   
                     <?php if(!empty($kafala_details)){ ?>
                               <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">

                                   <button type="button" class="btn btn-info" style="margin-top: 30px;"
                                           onclick="LoadTable(<?php echo $result['id'];  ?>)" data-toggle="modal" data-target="#kafala_details_modal" >
                                       تفاصيل الكفالة
                                   </button>
                               </div>

                           <?php } ?>
						   







               </div>

           </div>
           <div role="tabpanel" class="tab-pane fade" id="contact-details">


           	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
           		<label class="label label-green  half">رقم الجوال <strong></strong> </label>
           		<input type="text"  onkeypress="validate_number(event)" maxlength="10" name="m_mob"
           		value="<?php echo $result['m_mob']?>"   id="m_mob"   
           		class="form-control half input-style" data-validation="required"
           		onkeyup="check_length_num(this,10,'m_mob_span');"  />
           		<span  id="m_mob_span" class="span-validation"> </span>
           	</div>
           	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
           		<label class="label label-green  half">رقم جوال أخر  </label>
           		<input type="text" onkeypress="validate_number(event)" name="m_another_mob" id="m_another_mob" 
           		onkeyup="check_length_num(this,10,'m_another_mob_span');" value="<?php echo $result['m_another_mob']?>" 
           		class="form-control half input-style" maxlength="10" />
           		<span  id="m_another_mob_span" class="span-validation"> </span>
           	</div>
           	<div class="form-group col-md-3 padding-4 col-sm-4 col-xs-12">
           		<label class="label label-green  half">البريد الإلكترونى  </label>
           		<input type="email" name="m_email" value="<?php echo $result['m_email']?>"  class="form-control half input-style"  />
           	</div>

           	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
           		<label class="label label-green  half">جوال أحد الأقارب </label>
           		<input type="text" onkeyup="check_length_num(this,10,'m_relative_mob_span');"
                       maxlength="10"  onkeypress="validate_number(event)" name="m_relative_mob" id="m_relative_mob"
                        value="<?php if(!empty($result['m_relative_mob'])){ echo$result['m_relative_mob']; }  ?>" class="form-control half input-style" />
                <span  id="m_relative_mob_span" class="span-validation"> </span>
           	</div>
           	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
           		<label class="label label-green  half">الصلة </label>
           		<select type="text" name="m_relative_relation" id="m_relative_relation"  class="form-control half input-style">
           			<option value="">اختر</option>
                    <?php if(!empty($relationships)){ foreach ($relationships as $record){
                        $select='';

                        if($result['m_relative_relation']==$record->id_setting){$select='selected';}

                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
           	</div>




           </div>
           <div role="tabpanel" class="tab-pane fade" id="health-details">
           	
           	<div class="form-group col-md-2 padding-4 col-sm-4">
           		<label class="label label-green  half">الحالة الصحية<strong></strong> </label>
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


       <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
       	<label class="label label-green  half">نوع المرض<strong></strong> </label>
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


   <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
   	<label class="label label-green  half">نوع الإعاقة<strong></strong> </label>
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



<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">سبب المرض/الإعاقة <strong></strong> </label>
	<input type="text" name="dis_reason" id="dis_reason"
	value="<?php echo $result['dis_reason']?>" class="form-control half input-style "
	data-validation="required" <?php if($result['m_health_status_id_fk'] =='good'){ echo 'disabled="disabled"'; } ?> />
</div>
<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">تاريخ المرض/الإعاقة <strong></strong> </label>
	<input type="text" name="date_death_disease" id="date_reason"
	value="<?php  if(isset($result['date_death_disease'])){ echo $result['date_death_disease'] ; } ?>" class="form-control half input-style docs-date"
	data-validation="required" <?php if($result['m_health_status_id_fk'] =='good'){ echo 'disabled="disabled"'; } ?> />
</div>
<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong></strong> </label>
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

<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong></strong> </label>
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

<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">مستفيد من التأهيل الشامل <strong></strong> </label>
	<select  name="m_comprehensive_rehabilitation" id="m_comprehensive_rehabilitation" class=" no-padding form-control choose-date form-control half"
	data-validation="required" aria-required="true" onchange="check_rehabilitation($(this).val())"
       >
        <?php  $comprehensive_rehabilitation_arr  =array(1=>'نعم',2=>'لا');?>
	<option value="">اختر</option>
        <?php foreach ($comprehensive_rehabilitation_arr as $key =>$value){ ?>
            <option value="<?php echo$key;?>"

            <?php if(!empty($result['m_comprehensive_rehabilitation'])){

                if($result['m_comprehensive_rehabilitation'] == $key){

                    echo 'selected';
                }
            } ?>
            ><?php echo $value;?></option>
        <?php }?>

	
</select>
</div>


<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">المبلغ </label>


	<input type="text"
        <?php if(!empty($result['m_comprehensive_rehabilitation'])){
            if(($result['m_comprehensive_rehabilitation'] ==1)){
            }elseif ($result['m_comprehensive_rehabilitation'] ==2){ echo'disabled="disabled"'; } }else{ echo'disabled="disabled"'; } ?>
           name="m_rehabilitation_value" id="m_rehabilitation_value" value="<?php if(!empty($result['m_rehabilitation_value'])){
               echo $result['m_rehabilitation_value'];}?>" class="form-control half input-style" data-validation="required"/>
</div>


</div>



<div role="tabpanel" class="tab-pane fade" id="education-details">
	
	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
		<label class="label label-green  half">الحالة الدراسية <strong></strong> </label>
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

					<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
						<label class="label label-green  half">المستوى التعليمى <strong></strong> </label>
						<select name="m_education_level_id_fk" id="educate"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true"  data-live-search="true" >
							<option value="">اختر</option>
							<?php
							foreach ($education_level_array as $row4):
								$selected='';if($row4->id_setting==$result['m_education_level_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
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
				<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
					<label class="label label-green  half">ملتحقة بدار نسائية<strong></strong> </label>
					<select  name="m_female_house_check" id="eldar" class=" no-padding form-control choose-date form-control half " data-validation="required" aria-required="true"  >
						<option value="">اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
							$selected='';if($r==$result['m_female_house_check']){$selected='selected';}
							?>
							<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
							<?php }?>
						</select>
					</div>
					<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
						<label class="label label-green  half">اسم الدار <strong></strong> </label>
						<select class=" no-padding form-control choose-date form-control half" name="m_female_house_id_fk"  id="m_female_house_id_fk" <?php if($result['m_female_house_id_fk']==""){?> disabled=""<?php }?>>
							<option value="">اختر</option>
							<?php
							foreach ($women_houses as $row4):
								$selected='';if($row4->id_setting==$result['m_female_house_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
						<?php  endforeach;?>
					</select>
				</div>

				<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
					<label class="label label-green  half">الحياة العملية <strong></strong> </label>
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
					<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
						<label class="label label-green  half">المهنة<strong></strong> </label>
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

			<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
				<label class="label label-green  half">الدخل الشهرى<strong></strong> </label>
				<input type="text" step="any" name="m_monthly_income" onkeypress="validate_number(event)"  data-validation="" value="<?php echo $result['m_monthly_income'];?>"  id="mo-income" class="form-control half input-style" <?php if($result['m_want_work'] ==1){?>  disabled="disabled" <?php }?>/>
			</div>
			<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
				<label class="label label-green  half">مكان العمل<strong></strong> </label>
				<input type="text"  name="m_place_work" id="m_place_work"  data-validation="" value="<?php echo $result['m_place_work'];?>"  class="form-control half input-style"  <?php if($result['m_want_work'] ==1){?>  disabled="disabled"  <?php }?>/>
			</div>
			<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
				<label class="label label-green  half">هاتف العمل<strong></strong> </label>
				<input type="text" step="any" name="m_place_mob"
				id="m_place_mob" onkeyup="chek_length('m_place_mob')"
				onkeypress="validate_number(event)" data-validation=""
				value="<?php echo $result['m_place_mob'];?>"
				class="form-control half input-style"
				<?php if($result['m_want_work'] ==1){?>  disabled="disabled"  <?php }?>/>
				<span  id="m_place_mob_span" class="span-validation"> </span>
			</div>

			<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
				<label class="label label-green  half">القدرة علي العمل<strong></strong> </label>
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


		<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
			<label class="label label-green  half"> نوع العمل<strong></strong> </label>
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


<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">هل تعمل فى مشروع تجارى(أسر منتجة) </label>
	<select  name="m_work_in_commercial_project" id="work_in_commercial_project"
             onchange="check_commercial_project($(this).val())"
             data-validation="required" aria-required="true"
             class="form-control half input-style">
		<?php
		$work_in_commercial_project_arr =array(1=>'نعم',2=>'لا'); ?>

        <option value="">اختر</option>
        <?php foreach ($work_in_commercial_project_arr as $key=>$value){ ?>
            <option value="<?php echo $key;?>"


            <?php if(!empty($result['m_work_in_commercial_project'])){

             if($result['m_work_in_commercial_project'] == $key){
                 echo'selected';
             }

            }?>

            ><?php echo $value;?></option>
        <?php } ?>

	</select>
</div>

<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">اسم المشروع </label>
	<select  name="m_project_name" id="m_project_name"


    <?php if(empty($result['m_work_in_commercial_project'])){
        echo'disabled="disabled"';

    }else{ if($result['m_work_in_commercial_project'] ==2){  echo'disabled="disabled"';}  }?>


             data-validation="required" aria-required="true"
             class="form-control half input-style">
		<option value="">اختر</option>
        <?php if(!empty($project_names)){  foreach ($project_names as $row){ ?>
            <option value="<?php echo $row->id_setting;?>"
            <?php
            if(!empty($result['m_project_name'])){
               if($result['m_project_name'] == $row->id_setting){ echo'selected';}
            }
            ?>

            ><?php echo $row->title_setting;?></option>
        <?php } } ?>
	</select>
</div>
<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label label-green  half">حالة المشروع </label>
	<select   name="m_project_status" id="m_project_status"
        <?php if(empty($result['m_work_in_commercial_project'])){
            echo'disabled="disabled"';

        }else{ if($result['m_work_in_commercial_project'] ==2){  echo'disabled="disabled"';}  }?>

               data-validation="required" aria-required="true" class="form-control half input-style">
		<option value="">اختر</option>
        <?php if(!empty($project_status)){  foreach ($project_status as $row){ ?>
            <option value="<?php echo $row->id_setting;?>"
                <?php
                if(!empty($result['m_project_status'])){
                    if($result['m_project_status'] == $row->id_setting){ echo'selected';}
                }
                ?>

            ><?php echo $row->title_setting;?></option>
        <?php } } ?>
	</select>
</div>






</div>

<div role="tabpanel" class="tab-pane fade" id="skills-details">


	<div class="col-xs-12 no-padding">
		<div class="col-md-6">
            <?php if(!empty($dwrat)){ ?>
			<table class="table table-bordered">
				<thead>
					<tr class="info">
						<th>م</th>
						<th>اختر</th>
						<th>الدورات التدريبية التى يحتاجها المستفيد</th>
						<th>الحالة</th>
					</thead>
				</tr>
				<tbody$result_courses
                <?php $x=1; foreach ($dwrat as $row){ ?>
					<tr>
						<td><?php echo $x;?></td>
						<td><input type="checkbox" <?php if(!empty($courses_arr)){ if(in_array($row->id_setting,$courses_arr)){?>  checked <?php } } ?> name="courses[]" value="<?php echo $row->id_setting;?>"></td>
                        <td><?php echo $row->title_setting;?></td>
						<td>

                            <?php if(!empty($result_courses[$row->id_setting])){

                                if($result_courses[$row->id_setting]->approved ==1){?>
                                    <button class="btn btn-success" onclick="change_approved(<?php echo $data_load["mother_num"]; ?>,<?php echo $row->id_setting;?>,1)">تم التنفيذ</button>
                                    <?php }else{ ?>

                                    <button class="btn btn-warning" onclick="change_approved(<?php echo $data_load["mother_num"]; ?>,<?php echo $row->id_setting;?>,0)">قيد التنفيذ</button>
                                    <?php } ?>

                            <?php }else{ ?>
                                <button class="btn btn-warning" >قيد التنفيذ</button>
                          <?php  } ?>


                         </td>
					</tr>
                    <?php  $x++;} ?>
				<!--	<tr>
						<td>1</td>
						<td><input type="checkbox" name=""></td>
						<td>حاسب ألى</td>
						<td><button class="btn btn-success">تم التنفيذ</button></td>
					</tr>-->
				</tbody>
			</table>
            <?php  }  ?>
		</div>
		<div class="col-md-6">

            <?php if(!empty($skills)){ ?>
			<table class="table table-bordered">
				<thead>
					<tr class="info">
						<th>م</th>
						<th>اختر</th>
						<th>المهارات والمواهب التى لدى المستفيد</th>
					</tr>
				</thead>
				<tbody>
                <?php $x=1; foreach ($skills as $row){ ?>
					<tr>
						<td><?php echo $x;?></td>
						<td><input type="checkbox" <?php if(!empty($result_skills)){ if( in_array($row->id_setting,$result_skills)){ ?> checked <?php } } ?> name="skills[]" value="<?php echo $row->id_setting;?>"></td>
						<td><?php echo $row->title_setting;?></td>

					</tr>
                <?php  $x++;} ?>
				</tbody>
			</table>
            <?php  }  ?>
		</div>
	</div>
    <div class="form-group col-sm-6 col-xs-12">
    </div>
    <!--
    <div class="form-group col-sm-4 col-xs-12">
        <input type="checkbox" <?php if(!empty($result['m_other_skill'])){  $click_state=0; echo'checked'; }else{ $click_state=1; }?>  data-click-state="<?php echo$click_state;?>" name="check_button" id="check_button" onclick="other_skill_function()">
        <label class="label label-green  ">مهارة أخري</label>

        <input type="text"   id="m_other_skill"   name="m_other_skill"  value="<?php if(!empty($result['m_other_skill'])){
            echo $result['m_other_skill']; }?>"  <?php if(empty($result['m_other_skill'])){ ?>disabled="disabled" <?php } ?> class="form-control half input-style" />
    </div>
-->

</div>

<div role="tabpanel" class="tab-pane fade" id="other">

    <?php  $dis='disabled="disabled"'; if(!empty($result['m_hijri'])){ if($result['m_hijri']==1){ $dis='';}} ?>
	<div class="form-group col-md-1 padding-4 col-sm-4 col-xs-12" >
		<label class="label label-green  half">أداء فريضة الحج<strong></strong> </label>
		<select name="m_hijri" class="selectpicker no-padding  choose-date form-control half"  data-show-subtext="true"
                onchange="GetHij_Status($(this).val())"
                data-live-search="true" data-validation="required" aria-required="true" >
			<option value="">اختر</option>
			<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
				$selected='';if($r==$result['m_hijri']){$selected='selected';}
				?>
				<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
				<?php }?>
			</select>
		</div>
		<div class="form-group col-md-3 padding-4 col-sm-4 col-xs-12" >
			<label class="label label-green  half">الجهه المقدمة<strong></strong> </label>
			<select name="m_haj_geha"    id="m_haj_geha" class=" no-padding form-control  form-control half"
            <?=$dis?>
                    data-show-subtext="true" data-live-search="true"  aria-required="true" >
				<option value="">اختر</option>
                <?php if(!empty($haj_omra_geha)){?>
                    <?php foreach ($haj_omra_geha as $row ){ ?>
                        <option value="<?php echo $row->id_setting;?>"


                        <?php if(!empty($result['m_haj_geha'])){
                            if($result['m_haj_geha'] == $row->id_setting){ echo'selected';} }?>
                        ><?php echo $row->title_setting;?></option>
                <?php } } ?>
			</select>
		</div>
        	
            <!--
            <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
			<label class="label label-green  half">تاريخ آخر حج<strong></strong> </label>
			<input type="date"
                   <?=$dis?> name="m_last_hij_date" id="m_last_hij_date" class="selectpicker no-padding  form-control half"  value="<?php if(!empty($result['m_last_hij_date'])){ echo$result['m_last_hij_date']; } ?>" >
		</div>
        -->

<?php


if (isset($result['last_haj_year']) && !empty($result['last_haj_year'])){

		$period = $current_year - $result['last_haj_year'];
	
}
else {
	$period = '';
}
?>

        
        	<div class="form-group col-md-1 padding-4 col-sm-4 col-xs-12" >
		<label class="label label-green  half">عام آخر حج<strong></strong> </label>
		<select name="last_haj_year" id="last_haj_year" class="no-padding form-control  form-control half"  data-show-subtext="true"
			<?php  echo  $dis ; ?>
				data-live-search="true" data-validation="required" aria-required="true"
		        onchange="getPeriod();">
			<option value="">اختر</option>
			<?php

			for($i=1400;$i<= $current_year;$i++){
				$selected='';if($i==$result['last_haj_year']){$selected='selected';}
				?>
				<option value="<?php echo $i ;?>"  <?php echo $selected?>  ><?php echo $i;?> </option>
			
			<?php }?>
		</select>
	
	</div>
    
    <div class="form-group col-md-1 padding-4 col-sm-4 col-xs-12" >
		<label class="label label-green  half">  المدة<strong></strong> </label>
		<input type="text"
			 name="period" id="period" class="selectpicker no-padding  form-control half"  value="<?= $period?>" readonly >
	</div>

        
        
        




		<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
			<label class="label label-green  half">أداء فريضة العمرة<strong></strong> </label>
			<select name="m_ommra" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true"  data-validation="required" data-live-search="true"
                    onchange="GetOmra_Status($(this).val())"
                    aria-required="true" >
				<option value="">اختر</option>
				<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
					$selected=''; if($r==$result['m_ommra']){$selected='selected';}
					?>
					<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
					<?php }?>
				</select>
			</div>
    <?php  $dis2='disabled="disabled"'; if(!empty($result['m_ommra'])){ if($result['m_ommra']==1){ $dis2='';}} ?>

			<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
				<label class="label label-green  half">الجهه المقدمة<strong></strong> </label>
				<select name="m_omra_geha" id="m_omra_geha" class=" no-padding form-control  form-control half"  data-show-subtext="true"
                        <?=$dis2?> data-live-search="true"  aria-required="true" >
					<option value="">اختر</option>
                    <?php if(!empty($haj_omra_geha)){?>
                        <?php foreach ($haj_omra_geha as $row ){ ?>
                            <option value="<?php echo $row->id_setting;?>"


                                <?php if(!empty($result['m_omra_geha'])){
                                    if($result['m_omra_geha'] == $row->id_setting){ echo'selected';} }?>

                            ><?php echo $row->title_setting;?></option>
                        <?php } } ?>
				</select>
			</div>
			<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
				<label class="label label-green  half">تاريخ آخر عمرة<strong></strong> </label>
				<input type="date" <?=$dis2?> name="m_last_omra_date" id="m_last_omra_date"   class=" no-padding  form-control half " value="<?php if(!empty($result['m_last_omra_date'])){ echo$result['m_last_omra_date']; } ?>"  >
			</div>


			<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
				<label class="label label-green  half">طبيعة الشخصية<strong></strong> </label>
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




		<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
			<label class="label label-green  half">العلاقة بالأسرة<strong></strong> </label>
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


	<div class="clearfix"></div>










	<?php  } ?>
</div>
</div>

</div>

<!--<div class="clearfix"></div>
<br><br>
<div class="col-xs-6 text-center">
	<?php if(isset($all_links['mother']) && $all_links['mother']!=null):$input_name1='update';$input_name2='update_save';else:  $input_name1='add';$input_name2='add_save'; endif; ?>
	<input type="submit"   id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ"/>
</div>-->


</div>

<div class="panel-footer">
    <div class="text-center">
    	<a class="btnPrevious btn btn-labeled btn-warning" style="font-size: 16px;"><span class="btn-label"><i class="fa fa-chevron-right"></i></span>السابق  </a>
	<a class="btnNext  btn btn-labeled btn-warning" style="font-size: 16px;">التالى <span class="btn-label" style="right: auto;left: -14px;"><i class="fa fa-chevron-left"></i></span> </a>
    
    
    <?php if(isset($all_links['mother']) && $all_links['mother']!=null):$input_name1='update';$input_name2='update_save';else:  $input_name1='add';$input_name2='add_save'; endif; ?>
       <button type="submit" id="buttons" class="btn btn-labeled btn-success " name="add" value="حفظ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
      </button>
      
    </div>
</div>
<?php  echo form_close()?>

</div>


      <div class="modal" id="kafala_details_modal" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                <div class="modal-dialog" role="document" style="width: 100%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">  التفاصيل</h4>
                                        </div>
                                        <div class="modal-body" id="load_kafala_div">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-defualt" data-dismiss="modal" aria-label="Close">إغلاق </button>
                                        </div>
                                    </div>
                                </div>
                            </div>



	<script>
		function getPeriod() {
			var last_haj_year = $('#last_haj_year').val();
			var current_year_hijri = '<?= $current_year?>';
			var period = current_year_hijri - last_haj_year ;
			$('#period').val(period);

		}
	</script>


<script type="text/javascript">
	$('.btnNext').click(function(){
		$('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

	$('.btnPrevious').click(function(){
		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
</script>




<script type="text/javascript">
	jQuery(function ($) {
		$("#date0").mask("99/99/9999");
		$("#date1").mask("99/99/9999", {placeholder: 'dd/mm/yyyy'});
	});
</script>
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


		    /***************************ahmed_start*/

            document.getElementById("m_comprehensive_rehabilitation").removeAttribute("disabled", "disabled");


		    /***************************ahmed_start*/

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
    
    
    
    
    <script>
        
        
        
        function check_rehabilitation(valu) {

            if(valu ==1){
               document.getElementById("m_rehabilitation_value").removeAttribute("disabled", "disabled");

            } else {
                $('#m_rehabilitation_value').val('');
                document.getElementById("m_rehabilitation_value").setAttribute("disabled", "disabled");

            }

            
        }
        
    </script>




    <script>



        function check_commercial_project(valu) {

            if(valu ==1){
                document.getElementById("m_project_name").removeAttribute("disabled", "disabled");
                document.getElementById("m_project_status").removeAttribute("disabled", "disabled");

            } else {

                document.getElementById("m_project_name").setAttribute("disabled", "disabled");
                document.getElementById("m_project_status").setAttribute("disabled", "disabled");
                $('#m_project_name').val('');
                $('#m_project_status').val('');

            }


        }

    </script>


    <script>


        function GetHij_Status(valu) {



            if(valu ==1){
                document.getElementById("m_haj_geha").removeAttribute("disabled", "disabled");
          //      document.getElementById("m_last_hij_date").removeAttribute("disabled", "disabled");
                document.getElementById("m_haj_geha").setAttribute("data-validation", "required");
           //     document.getElementById("m_last_hij_date").setAttribute("data-validation", "required");
                
               	 document.getElementById("last_haj_year").removeAttribute("disabled", "disabled");
				document.getElementById("last_haj_year").setAttribute("data-validation", "required");
                


            } else {

                document.getElementById("m_haj_geha").setAttribute("disabled", "disabled");
             //   document.getElementById("m_last_hij_date").setAttribute("disabled", "disabled");
                 document.getElementById("last_haj_year").setAttribute("disabled", "disabled");
				$('#last_haj_year').val('');
				$('#period').val('');
                
                
                $('#m_haj_geha').val('');
             //   $('#m_last_hij_date').val('');


            }



        }



        function GetOmra_Status(valu) {


            if(valu ==1){
                document.getElementById("m_omra_geha").removeAttribute("disabled", "disabled");
                document.getElementById("m_last_omra_date").removeAttribute("disabled", "disabled");
                document.getElementById("m_omra_geha").setAttribute("data-validation", "required");
                document.getElementById("m_last_omra_date").setAttribute("data-validation", "required");


            } else {

                document.getElementById("m_omra_geha").setAttribute("disabled", "disabled");
                document.getElementById("m_last_omra_date").setAttribute("disabled", "disabled");
                $('#m_omra_geha').val('');
                $('#m_last_omra_date').val('');


            }



        }


        function other_skill_function() {



            if($('#check_button').attr('data-click-state')==1){
                $('#check_button').attr('data-click-state', 0);

                document.getElementById("m_other_skill").removeAttribute("disabled", "disabled");


            }else if($('#check_button').attr('data-click-state')==0){
                $('#check_button').attr('data-click-state', 1);

                document.getElementById("m_other_skill").setAttribute("disabled", "disabled");
                $('#m_other_skill').val('');
            }

        }

        function change_approved(mothernum,id,valu) {

            if ( mothernum > 0 ) {
                var dataString = 'mother_num=' + mothernum + '&id=' + id +'&approved='+ valu ;
           // alert(dataString);
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>family_controllers/Family/change_course_approved',
                    data: dataString,
                    cache: false,
                    success: function (json_data) {
                        var JSONObject = JSON.parse(json_data);

                        //console.log(JSONObject);

                        if(JSONObject['approved'] ==0){

                            $msg ='تم التنفيذ بنجاح';
                        } else if (JSONObject['approved'] ==1){

                            $msg ='قيد التنفيذ';
                        }
                        alert($msg);
                        location.reload();

                    }
                });


            }

        }
    </script>
    
    
    						       <script>

        function LoadTable(value) {

            var id =value;

            if (id!='') {
                var dataString = 'id=' + id ;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>family_controllers/Family/get_kafala_details_modal',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $("#load_kafala_div").html(html);
                    }
                });

            }

        }
    </script>