
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
        </div>

        <div class="panel-body">

            <div class="col-md-12">
           	<div class="form-group col-md-2 padding-4 col-sm-4">
           		<label class="label "> الفئة <strong></strong> </label>
           		<select  name="type_member" id="type_member" 
           		data-validation="required" class=" no-padding form-control choose-date form-control " aria-required="true">
           		<option value="">اختر</option>
           		<option value="0">الكل</option>
           		<option value="1"  > الام </option>
           		<option value="2" >الابناء</option>
           </select>
       </div>  	
       <div class="form-group col-md-2 padding-4 col-sm-4">
           		<label class="label ">الحالة الصحية<strong></strong> </label>
           		<select  name="m_health_status_id_fk" id="health_state" onchange="check()"
           		data-validation="required" class=" no-padding form-control choose-date form-control "    aria-required="true">
           		<option value="">اختر</option>
           		<option value="disease"  > مريض </option>
           		<option value="disability" >معاق</option>
           		<option value="good"  >(سليم)</option>
           		<?php
           		foreach ($health_status_array as $row3):
           				?>
           		<option value="<?php  echo $row3->id_setting;?>"     ><?php  echo $row3->title_setting;?></option>
           	<?php  endforeach;?>
           </select>
       </div>


       <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
       	<label class="label ">نوع المرض<strong></strong> </label>
       	<select  name="disease_id_fk" id="disease_id_fk"
       	class=" no-padding form-control choose-date form-control "
       	aria-required="true"   >
       	<option value="">اختر</option>
       	<?php
       	foreach ($diseases as $row3):
       		?>
       	<option value="<?php  echo $row3->id_setting;?>"   >
       		<?php  echo $row3->title_setting;?></option>
       	<?php  endforeach;?>
       </select>
   </div>


   <!-- <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
   	<label class="label ">نوع الإعاقة<strong></strong> </label>
   	<select  name="disability_id_fk" id="disability_id_fk" class=" no-padding form-control choose-date form-control "     aria-required="true"
   	  >
   	<option value="">اختر</option>
   	<?php
   	foreach ($diseases as $row3):?>
   	<option value="<?php  echo $row3->id_setting;?>" ><?php  echo $row3->title_setting;?></option>
   <?php  endforeach;?>
</select>
</div> -->



<!-- <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label ">سبب المرض/الإعاقة <strong></strong> </label>
	<input type="text" name="dis_reason" id="dis_reason"
	value="" class="form-control  input-style "
	data-validation="required"  />
</div> -->
<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label ">تاريخ المرض/الإعاقة <strong></strong> </label>
	<input type="text" name="date_death_disease" id="date_reason"
	value="" class="form-control  input-style docs-date"
	data-validation="required"  />
</div>
<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label ">جهة المتابعة المرض/الإعاقة <strong></strong> </label>
	<select  name="dis_response_status" id="dis_response_status"
	class=" no-padding form-control choose-date form-control "
	data-validation="required" aria-required="true"
	>
	<option value="">اختر</option>
	<?php
	foreach ($responses as $row3):?>
	<option value="<?php  echo $row3->id_setting;?>" >
		<?php  echo $row3->title_setting;?></option>
	<?php  endforeach;?>
</select>
</div>

<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label ">وضع الحالة المرض/الإعاقة <strong></strong> </label>
	<select  name="dis_status" id="dis_status" class=" no-padding form-control choose-date form-control "
	data-validation="required" aria-required="true"
	
	>
	<option value="">اختر</option>
	<?php
	foreach ($diseases_status as $row3):
		?>
	<option value="<?php  echo $row3->id_setting;?>" ><?php  echo $row3->title_setting;?></option>
<?php  endforeach;?>
</select>
</div>

<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
	<label class="label ">مستفيد من التأهيل الشامل <strong></strong> </label>
	<select  name="m_comprehensive_rehabilitation" id="m_comprehensive_rehabilitation" class=" no-padding form-control choose-date form-control "
	data-validation="required" aria-required="true" 
       >
        <?php  $comprehensive_rehabilitation_arr  =array(1=>'نعم',2=>'لا');?>
	<option value="">اختر</option>
        <?php foreach ($comprehensive_rehabilitation_arr as $key =>$value){ ?>
            <option value="<?php echo$key;?>"
            ><?php echo $value;?></option>
        <?php }?>

	
</select>
</div>
 <div class="form-group col-sm-2 col-xs-12 padding-4 text-center">
                        <label class="label"> </label>

                    <button type="button" class="btn btn-labeled btn-warning" id="save" 
                    name="note_save" value="save"  onclick="make_search()">
                        <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-sm-12 no-padding " id="main_panal" style="display:none">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نتائج البحث</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12" id="my_search">
            </div>
        </div>
    </div>
</div>
<script>

 function make_search() {
    var health_state =$('#health_state').val();
    var type_member =$('#type_member').val();
    var disease_id_fk=$('#disease_id_fk').val();
    // var dis_reason=$('#dis_reason').val();
    var date_reason=$('#date_reason').val();
    var dis_response_status=$('#dis_response_status').val();
    var dis_status=$('#dis_status').val();
    var m_comprehensive_rehabilitation=$('#m_comprehensive_rehabilitation').val();
      
   

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/reports/Family_reports/report_health_search',
            data: {health_state: health_state,
                type_member:type_member,
                disease_id_fk:disease_id_fk,
                date_reason:date_reason,
                dis_response_status:dis_response_status,
                dis_status:dis_status,
                m_comprehensive_rehabilitation:m_comprehensive_rehabilitation
                },
            dataType: 'html',
            cache: false,
            beforeSend: function () {
              $('#main_panal').show();
               $('#my_search').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
           },

            success: function (html) {
                $('#main_panal').show();
                $("#my_search").html(html);

            }
        });

      
      }

    
</script>
<script>

function check() {
		var type =$('#health_state').val();
		//  alert(type);
		if(type === 'disease' || (type === 'disability')) {   //  removeAttribute      setAttribute
			
			document.getElementById("dis_status").removeAttribute("disabled", "disabled");
			document.getElementById("dis_response_status").removeAttribute("disabled", "disabled");
			document.getElementById("dis_reason").removeAttribute("disabled", "disabled");
			document.getElementById("disease_id_fk").removeAttribute("disabled", "disabled");
			// document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
			
			document.getElementById("date_reason").removeAttribute("disabled", "disabled");
			document.getElementById("dis_status").setAttribute("data-validation", "required");
			document.getElementById("dis_response_status").setAttribute("data-validation", "required");
			document.getElementById("dis_reason").setAttribute("data-validation", "required");
			document.getElementById("disease_id_fk").setAttribute("data-validation", "required");
			// document.getElementById("disability_id_fk").removeAttribute("data-validation", "required");
		}else  if(type === 'good'){
			
			document.getElementById("dis_status").setAttribute("disabled", "disabled");
			document.getElementById("dis_response_status").setAttribute("disabled", "disabled");
			document.getElementById("dis_reason").setAttribute("disabled", "disabled");
			document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
			// document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
			document.getElementById("date_reason").setAttribute("disabled", "disabled");
			
			document.getElementById("dis_status").removeAttribute("data-validation", "required");
			document.getElementById("dis_response_status").removeAttribute("data-validation", "required");
			document.getElementById("dis_reason").removeAttribute("data-validation", "required");
			document.getElementById("disease_id_fk").removeAttribute("data-validation", "required");
			// document.getElementById("disability_id_fk").removeAttribute("data-validation", "required");
		} else if(type == 0){
			document.getElementById("health_other").removeAttribute("disabled", "disabled");
			document.getElementById("health_other").setAttribute("data-validation", "required");
		}
	}
</script>