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
<?php if(isset($result) && $result !=null){
         
          $f_first_name=$result->f_first_name;
          $f_grandfather_name= $result->f_grandfather_name;
          $f_national_id= $result->f_national_id;
          $f_national_id_type= $result->f_national_id_type;//
          
          
          $f_birth_date = date("Y-m-d",$result->f_birth_date);
          $f_job        =  $result->f_job;//
          $f_death_id_fk=   $result->f_death_id_fk;//
          $f_child_num=     $result->f_child_num;
          $f_father_name=   $result->f_father_name;
          $f_family_name=   $result->f_family_name;
          $f_nationality_id_fk=  $result->f_nationality_id_fk;//
          $nationality_other  =   $result->nationality_other;
          
          
          $f_national_id_place=$result->f_national_id_place;
          $f_death_date=date("Y-m-d",$result->f_death_date);
          $f_job_place= $result->f_job_place;
          $f_death_reason_fk=$result->f_death_reason_fks;
          $f_wive_count=$result->f_wive_count;//
     }else{
          $f_first_name="";
          $f_grandfather_name='';
          $f_national_id_type='';//
          $f_national_id='';
          $f_birth_date='';
          $f_job="";//
          $f_death_id_fk='';//
          $f_child_num='';
          $f_father_name='';
          $f_family_name='';
          $f_nationality_id_fk='';//
          $nationality_other='';
          $f_national_id_place='';
          $f_death_date='';
          $f_job_place='';
          $f_death_reason_fk='';
          $f_wive_count='';//  
     }
?>
<div class="col-xs-12 fadeInUp wow" >

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
       <?php echo form_open_multipart("family_controllers/Family/father")?>
             
            <div class="basic-info active">
<div class="alert alert-danger">
  <strong>تنبيه !</strong> جميع الحقول التي باللون الأحمر هي حقول إلزامية حتي يكتمل التسجيل ..... 

<strong>مع تحيات جمعية أيتام الجبيل</strong>
</div>
  </div>          
            
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half"> الاسم الأول <strong class="astric">*</strong> </label>
                <input type="text" name="f_first_name"  data-validation="required" class="form-control half input-style" value="<?php echo $f_first_name;?>" />
                </div>
            
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم الأب <strong class="astric">*</strong> </label>
                    
              <input type="text"  data-validation="required"   class="form-control half input-style" value="<?php echo $f_father_name?>" name="f_father_name" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم الجد <strong class="astric">*</strong> </label>
                  <input type="text" name="f_grandfather_name"  data-validation="required"    value="<?= $f_grandfather_name;?>"  class="form-control half input-style" />               
                </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم العائلة<strong class="astric">*</strong><strong></strong> </label>
                  <input type="text" name="f_family_name"  data-validation="required" class="form-control half input-style" value="<?php echo $f_family_name?>" />            
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" name="f_national_id"  data-validation="number" value="<?= $f_national_id;?>" id="f_national_id" onkeyup="return valid();" class="form-control half input-style" />
            	    <span  id="validate1" class="help-block col-xs-6"> </span> 
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="f_national_id_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                    <?php $arr_natunal=array('اختر','الهوية الوطنية','إقامة','كارت عائلة','جواز سفر');?>
                    <?php for($r=0;$r<sizeof($arr_natunal);$r++):
                            $selected="";if($r== $f_national_id_type){$selected="selected";}  ?>		
                        <option value="<?php echo $r?>" <?php echo $selected;?> ><?php echo $arr_natunal[$r]?></option>
                    <?php endfor?>    
                	</select>
               </div>
               </div>
               <div class="col-sm-12 col-xs-12">
               <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>         
                    <input type="text" class="form-control half input-style" value="<?php echo $f_national_id_place;?>" name="f_national_id_place" data-validation="required" />
               </div>
               
               <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong><strong></strong> </label>         
               <input type="date" name="f_birth_date"  data-validation="required"  value="<?php echo $f_birth_date ;?>" class="form-control half input-style" data-validation="required" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>         
               <select  name="f_nationality_id_fk" id="f_nationality_id_fk" class="selectpicker col-xs-4 no-padding"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
	<option value="">اختر</option>

		<?php if(isset($nationality) && $nationality!=null): 
    foreach($nationality as $one_nationality):
      $selected=''; if($one_nationality->id == $f_nationality_id_fk){ $selected="selected";} ?>
    	<option value="<?php echo $one_nationality->id?>" <?php echo $selected?> ><?php echo $one_nationality->title;?></option>
     <?php endforeach;endif;?>	
</select>

<input type="text" name="nationality_other" value="<?php echo $nationality_other;  ?>" 
 class="form-control col-xs-5 no-padding"
 placeholder="أخري" style="width: 16%" id="nationality_other" disabled="" />
</div>
                
<div class="form-group col-sm-4 col-xs-12">
<label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong> </label>         
   <select id="f_job" name="f_job" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <?php $arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
	  <?php for($i=0;$i<sizeof($arr_gob);$i++):
      $selected="";if($i== $f_job){$selected="selected";} ?>
    	<option value="<?php echo $i?>" <?php echo $selected?> ><?php echo $arr_gob[$i];?></option>
      <?php endfor;?>  
	</select>
    </div>
                  
 </div>
 
 <div class="col-sm-12 col-xs-12">
 
 <div class="form-group col-sm-4 col-xs-12 red box" style="display: none">
 <label class="label label-green  half ">مكان العمل<strong class="astric">*</strong><strong></strong> </label>         
<input type="text" class="form-control half input-style" value="<?php echo $f_job_place ?>" name="f_job_place" />
	
 </div>
 
  <div class="form-group col-sm-4 col-xs-12" >
 <label class="label label-green  half">سبب الوفاة<strong class="astric">*</strong><strong></strong> </label>         
<select  onchange="admSelectCheck(this);" name="f_death_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
    <?php $arr_deth=array('اختر','طبيعية','حادثة','مرض');?>
	  <?php for($i=0;$i<sizeof($arr_deth);$i++):
      $selected="";if($i== $f_death_id_fk){$selected="selected";} ?>
    	<option value="<?php echo $i?>" <?php echo $selected?> ><?php echo $arr_deth[$i];?></option>
      <?php endfor;?>  
		<option value="5" id="admOption">اخرى</option>
	</select>	
 </div>
 <div class="form-group col-sm-4 col-xs-12"  id="admDivCheck" style="display:none;">
	
		<label class="label label-green  half">السبب<strong class="astric">*</strong><strong></strong> </label>
		<input type="text"  class="form-control half input-style" value="<?php echo $f_death_reason_fk?>" name="f_death_reason_fk" />
	
</div>
 <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ الوفاة<strong class="astric">*</strong><strong></strong> </label>         
                <input type="date" name="f_death_date" data-validation="required"  class="form-control half input-style" value="<?php echo $f_death_date ?>"  />
 </div>
 <div class="form-group col-sm-4 col-xs-12">
     <label class="label label-green  half">عدد الأبناء<strong class="astric">*</strong><strong></strong> </label>
	<input type="number"  name="f_child_num"   data-validation="number" value="<?php echo $f_child_num ?>" class="form-control half input-style" />
</div>
 <div class="form-group col-sm-4 col-xs-12">
     <label class="label label-green  half">عدد الزوجات<strong class="astric">*</strong><strong></strong> </label>
	<select  name="f_wive_count"class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
	 <option value="">اختر</option>
     <?php for($i=1;$i<5;$i++):
      $selected="";if($i== $f_wive_count){$selected="selected";} ?>
    	<option value="<?php echo $i?>" <?php echo $selected?> ><?php echo $i;?></option>
      <?php endfor;?>  
	</select>
</div>

  </div>
 
       <!------------------------------------>
        <div class="col-xs-12">
        	
        <a href="<?php echo base_url().'family_controllers/Family/basic' ?>"> <button type="button" class="btn btn-blue btn-previous" >السابق </button> </a>
           
<?php if(isset($all_links['father']) && $all_links['father']!=null){
      $input_name1='update';$input_name2='update_save';
      }else{  $input_name1='add';$input_name2='add_save';}
 ?>

	<input type="submit" class="btn btn-blue btn-next"  name="<?php echo $input_name1?>" value="حفظ و إستمرار" />
	<input type="submit" class="btn btn-blue btn-close" name="<?php echo $input_name2?>"  value="حفظ و إغلاق "/>

               
            
            </div>
            <?php  echo form_close()?>
        <br/>
        <br/>
          
</div>
</div>
</div>
<script>

	$(document).ready(function() {
		$("#f_job").change(function() {
			var color = $(this).val();
			if (color == "1") {
				$(".box").not(".1").hide();
				$(".red").show();
			} else if (color == "2") {
				$(".box").not(".2").hide();
				$(".red").show();
			} else {
				$(".box").hide();
			}
		});


	});
</script>

<script>
	function admSelectCheck(nameSelect)
	{
		console.log(nameSelect);
		if(nameSelect){
			admOptionValue = document.getElementById("admOption").value;
			if(admOptionValue == nameSelect.value){
				document.getElementById("admDivCheck").style.display = "block";
			}
			else{
				document.getElementById("admDivCheck").style.display = "none";
			}
		}
		else{
			document.getElementById("admDivCheck").style.display = "none";
		}

	}
    
  
  
  	document.getElementById("f_nationality_id_fk").onchange = function () {



		if (this.value == 20)
			document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("nationality_other").setAttribute("disabled", "disabled");
              $("#nationality_other").val("");
		}
	};
  
    
    
</script>
<script>
  function valid()
    {
        if($("#f_national_id").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = '';
        }else{
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم الهوية من عشر أرقام';
        }
    }



</script>