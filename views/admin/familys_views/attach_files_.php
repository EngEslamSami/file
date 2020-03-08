
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
	.small{



	}
</style>





<div class="col-sm-12  " >
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title">رفع الوثائق
            <?php if($basic_data_family["suspend"] == 4 ) { ?>
<button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
<span class="">رقم ملف الأسرة</span>
</button>
<button  class="btn btn-success  btn-sm progress-button ">
 <span class="">
 <?php 
              echo $basic_data_family["file_num"];    
            ?>
 </span>
 </button>
 <?php } ?>
            
            <?php /* if($basic_data_family["suspend"] == 4){
                   echo  "/"."رقم الملف :".$basic_data_family["file_num"] ;
                   }*/ ?>
            </h3>
              <div class="pull-left">
                  <?php $data_load["mother_num"]=$mother_national_num ;
                        $data_load["person_account"]=$basic_data_family["person_account"] ;
                        $data_load["agent_bank_account"]=$basic_data_family["agent_bank_account"] ;
                        $this->load->view('admin/familys_views/drop_down_button', $data_load);?>
               </div>
		</div>
		<?php
		if (isset($result) && !empty($result)) {


			$death_certificate=$result[0]->death_certificate;
			$family_card=$result[0]->family_card;
			$plowing_inheritance=$result[0]->plowing_inheritance;
			$instrument_agency_with_orphans =$result[0]->instrument_agency_with_orphans;
			$birth_certificate =$result[0]->birth_certificate;
			$ownership_housing =$result[0]->ownership_housing;
			$definition_school =$result[0]->definition_school;
			$social_security_card =$result[0]->social_security_card;
			$bank_statement =$result[0]->bank_statement;
			$collected_files =$result[0]->collected_files;
			$id=$result[0]->id;
			echo form_open_multipart('family_controllers/Family/update_attach_files/'.$mother_national_num);
			$button='update';


		}else{


			$death_certificate='';
			$family_card='';
			$plowing_inheritance='';
			$instrument_agency_with_orphans ='';
			$birth_certificate ='';
			$ownership_housing ='';
			$definition_school ='';
			$social_security_card ='';
			$bank_statement ='';
			$collected_files ='';
			$id='';
			echo form_open_multipart('family_controllers/Family/attach_files/'.$mother_national_num);

			$button='add';



		}?>
		<div class="panel-body">
<div class="col-md-12">
         
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للأب <strong class="astric">*</strong> </label>
                    <input type="number" class="form-control half input-style" 
                    value="<?php if(!empty($father_national_card))
                        { echo $father_national_card;}?>" readonly="readonly" />
                </div>
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half"> إسم الأب <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style" 
                    value="<?php  if(!empty($father_name))
                          {echo $father_name;} ?>
                    " readonly="readonly" />
                </div>

          
       </div>
			<table class="table table-bordered" >
				<tr>
					<th>م </th>
					<th>إسم الملف </th>
					<th>إرفاق </th>
				</tr>
				<tr >
					<td> 1 </td>
					<td> شهادة الوفاة <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($death_certificate)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$death_certificate ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$death_certificate ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
						<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/death_certificate/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="death_certificate"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf </small>
						<?php } ?>
					</td>
				</tr>
				<tr >
					<td>2  </td>
					<td> كارت العائلة  <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($family_card)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$family_card ?>" download> <i class="fa fa-download"  title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$family_card ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/family_card/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="family_card"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>

					</td>
				</tr>
				<tr >
					<td>3  </td>
					<td> صك حرث الارث  <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($plowing_inheritance)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$plowing_inheritance ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$plowing_inheritance ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/plowing_inheritance/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="plowing_inheritance"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>

					</td>
				</tr>
				<tr >
					<td> 4 </td>
					<td> صك الولاية <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($instrument_agency_with_orphans)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$instrument_agency_with_orphans ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$instrument_agency_with_orphans ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/instrument_agency_with_orphans/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="instrument_agency_with_orphans"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>
					</td>
				</tr>
				<tr >
					<td> 5 </td>
					<td> شهادات الميلاد <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($birth_certificate)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$birth_certificate ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$birth_certificate ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/birth_certificate/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="birth_certificate"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>
					</td>
				</tr>
				<tr >
					<td> 6 </td>
					<td> صك ملكية السكن أو عقد الايجار  <strong class="astric">*</strong></td>

					<td>

						<?php if (!empty($ownership_housing)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$ownership_housing ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$ownership_housing ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/ownership_housing/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="ownership_housing"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>
					</td>
				</tr>
				<tr >
					<td> 7 </td>
					<td> تعريف من المدرسة بجميع الأبناء و البنات <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($definition_school)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$definition_school ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$definition_school ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/definition_school/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="definition_school"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>

					</td>
				</tr>
				<tr >
					<td> 8 </td>
					<td>بطاقة الضمان  الاجتماعى  <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($social_security_card)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$social_security_card ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$social_security_card ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/social_security_card/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="social_security_card"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>

					</td>
				</tr>
				<tr >
					<td> 9 </td>
					<td> الحساب البنكي ( رقم الأيبان ) <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($bank_statement)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$bank_statement ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$bank_statement ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/bank_statement/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="bank_statement"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>

					</td>
				</tr>
				<tr >
					<td> 10 </td>
					<td>رفع جميع المستندات <strong class="astric">*</strong></td>
					<td>

						<?php if (!empty($collected_files)){?>

							<a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$collected_files ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>

							<a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$collected_files ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
							<a href="<?php echo base_url().'family_controllers/Family/DeleteFile/collected_files/'.$mother_national_num ?>" >
							<i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
						<?php }else{ ?>
							<input type="file" name="collected_files"   />
							<small class="" style="bottom:-13px;">
								برجاء إرفاق ملف pdf
							</small>
						<?php } ?>

					</td>
				</tr>
			</table>
			<div class="col-md-12">
				<div class="form-group col-sm-4">
					<input type="submit"  name="<?php echo$button;?>" class="btn btn-blue btn-next"  value="حفظ " />
				</div>

			</div>
		</div>
		<?php echo form_close()?>
	</div>
</div>

<script>
	function HandleBrowseClick()
	{
		var fileinput = document.getElementById("browse");
		fileinput.click();
	}

	function Handlechange()
	{
		var fileinput = document.getElementById("browse");
		var textinput = document.getElementById("filename");
		textinput.value = fileinput.value;
	}

</script>
