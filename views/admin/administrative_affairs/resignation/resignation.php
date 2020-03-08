<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$status = array('لم يتم إتخاذ إجراء','تم الموافقة على النقل','تم رفض النقل');
$type = array(1=>'إستقالة',2=>'العدم الرغبة في التجديد',3=>'أسباب مرضيه',4=>'أخرى');
$id = $this->uri->segment(3);
if($id == '') {
	echo form_open_multipart('Administrative_affairs/addResignation');
}
else {
	echo form_open_multipart('Administrative_affairs/editResignation/'.$id.'');
}
?>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
            	<div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                    	<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ الطلب </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            
	                            			<input type="text" id="request_date" name="request_date" placeholder="تاريخ الطلب" value="<?php if(isset($resignation)) {echo date("d/m/Y",$resignation['request_date']);} ?>" class="form-control date_melady" data-validation="required" >
	                            
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> إسم الموظف </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control selectpicker" data-live-search="true" name="emp_id_fk" onchange="return loadData($(this).val())" data-validation="required" aria-required="true">
	                            		<?php if($_SESSION['head_dep_id_fk'] != 2){ ?>
										<option value="">إختر الموظف</option>
										<? } ?>
										<?php
										foreach ($employees as $employee) {
											$select = '';
											if((isset($resignation) && $resignation['emp_id_fk'] == $employee->emp_code) || ($_SESSION['role_id_fk'] == 3)) {
												$select = 'selected';
											}
										?>
										<option value="<?=$employee->emp_code?>" <?=$select?> ><?=$employee->employee?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> الإدارة / القسم </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="branch_name" name="branch_name" placeholder="الإدارة / القسم" class="r-inner-h4" value="<?php if(isset($employeeData)) echo $employeeData['main'].' -- '.$employeeData['sub'] ?>" data-validation="required" readonly>
									<input type="hidden" name="main_dep" id='main_dep' value="<?php if(isset($employeeData)) echo $employeeData['mainID'] ?>">
									<input type="hidden" name="sub_dep" id='sub_dep' value="<?php if(isset($employeeData)) echo $employeeData['subID'] ?>">
								</div>
							</div>
							<div class="col-md-12 padd"><hr></div>

							<div class="col-md-12 padd" style="padding-right: 0 !important; padding-left: 0 !important">
								<div class="col-xs-4">
	                            	<h4 class="r-h4"> أنا الموظف الموقع أدناه أتقدم بهذا الطلب </h4>
	                            </div>
	                            <div class="col-xs-4 r-input" style="padding-left: 0 !important">
	                            	<?php 
	                            	foreach ($type as $key => $value) { 
	                            		$check = '';
	                            		if(isset($resignation) && $resignation['type'] == $key){
	                            			$check = 'checked';
	                            		}
	                            	?>
	                            		<input type="radio" name="type" class="Radiotype" value="<?=$key?>" onclick="return check($(this).val())" data-validation="required" <?=$check?>> <?=$value?>
	                            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                            	<? } ?>
								</div>

								<div class="col-xs-2" style="padding-left: 0 !important">
	                            	<h4 class="r-h4">حدد </h4>
	                            </div>
	                            <div class="col-xs-2 r-input" style="padding-right: 0 !important">
	                            	<?php 
	                            	$require = '';
	                            	$readonly = 'readonly';
	                            	if(isset($resignation) && $resignation['type'] == 4){
	                            		$require = 'required';
	                            		$readonly = '';
	                            	} 
	                            	?>
	                            	<input class="r-inner-h4" type="text" name="other_type" id="other_type" placeholder="حدد" data-validation="<?=$require?>" <?=$readonly?> value="<?php if(isset($resignation)) echo $resignation['other_type']; ?>">
								</div>
							</div>

							<div class="col-md-12 padd" style="padding-right: 0 !important; padding-left: 0 !important">
								<div class="col-xs-4">
	                            	<h4 class="r-h4"> وبموجب هذا الإشعار يتم إنهاء خدماتي مع الشركة إعتبارًا من تاريخ </h4>
	                            </div>
	                            <div class="col-xs-4 r-input" style="padding-right: 0 !important">
	                            	
	                            			<input type="text" id="date_resignation" name="date_resignation" placeholder="تاريخ نهاية الخدمة" value="<?php if(isset($resignation)) {echo date("d/m/Y",$resignation['date_resignation']);} ?>" class="form-control date_melady" data-validation="required" >
	                            
								</div>

								<div class="col-xs-2" style="padding-left: 0 !important">
	                            	<h4 class="r-h4">الأسباب </h4>
	                            </div>
	                            <div class="col-xs-2 r-input" style="padding-right: 0 !important">
	                            	<textarea class="r-textarea" name="reason" data-validation="required"><?php if(isset($resignation)) echo $resignation['reason'] ?></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" ></i></span> حفظ</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
echo form_close(); 
if($id == '') {
?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول البيانات</h4>
                </div>
            </div>
            
            <div class="panel-body">
<?php if(isset($resignations) && $resignations != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>التاريخ</th>
							<th>إسم الموظف</th>
							<th>الإدارة / القسم</th>
							<th>نوع الطلب</th>
							<th>الحالة</th>
							<th>التفاصيل</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($resignations as $resignation) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$resignation->request_date)?></td>
							<td><?=$resignation->employee?></td>
							<td><?=$resignation->main.' / '.$resignation->sub?></td>
							<td><?=$type[$resignation->type]?></td>
							<td><?=$status[$resignation->approved]?></td>
							<td>
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$resignation->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
							</td>
							<td>
                         <!--   <a href="<?php echo base_url('Administrative_affairs/printResignation').'/'.$resignation->id ?>"> 
                            <i class="fa fa-print" aria-hidden="true"></i> </a> -->
							
                            	<?php if($resignation->approved == 0){ ?>
								<a href="<?php echo base_url('Administrative_affairs/editResignation').'/'.$resignation->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/deleteResignation/".$resignation->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
				                <? }else{ ?>
				                	<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تنفيذ أي إجراء حيث تم إعتماد طلب النقل</button>
				                <?php } ?>
							</td>
						</tr>

						<div class="modal" id="myModal<?=$resignation->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title">تفاصيل طلب الإشعار</h4>
					             	</div>
				       
				           			<div class="modal-body">
				       					<div class="row">
				       						<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>تاريخ الطلب :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=date("Y-m-d",$resignation->request_date)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>إسم الموظف :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$resignation->employee?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>الإدارة / القسم:</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$resignation->main.' / '.$resignation->sub?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>نوع الطلب :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<?php 
					               					if($resignation->type != 4){
					               						$val = $type[$resignation->type];
					               					}
					               					else {
					               						$val = $resignation->other_type;
					               					} 
					               					?>
					               					<h6><?=$val?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>تنفيذ الطلب إبتداًء من :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=date("Y-m-d",$resignation->date_resignation)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>السبب :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$resignation->reason?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>حالة طلب الإشعار :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$status[$resignation->approved]?></h6>
					               				</div>
				               				</div>
					               		</div>
					               	</div>
				 					<div class="modal-footer">
								      	<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
								    </div>
								</div>
							</div>
						</div>
						<?php } ?>
					</tbody>
				</table>

				<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
			                </div>
			                <div class="modal-body">
			                    <p id="text">هل أنت متأكد من الحذف؟</p>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
			                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
			                </div>
			            </div>
			        </div>
			    </div>
<?php 
	} 
	else {
		echo '<div class="alert alert-danger">لا توجد بيانات</div>';
	}
?>
			</div>
		</div>
	</div>
</div>
<? } ?>

<script>
    function loadData(id){
    	$('#branch_name').val('');
        if(id)
        {
            var dataString = 'emp_code=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/employeeData',
                data:dataString,
                cache:false,
                success: function(json_data){
                	var JSONObject = JSON.parse(json_data);
					console.log(JSONObject);      
					$('#branch_name').val(JSONObject["main"]+'--'+JSONObject["sub"]);
					$('#main_dep').val(JSONObject["mainID"]);
					$('#sub_dep').val(JSONObject["subID"]);
                }
            });
            return false;
        }
    }
</script>

<script type="text/javascript">
	function check(argument) 
	{
		if (argument == 4) {
	      	$('#other_type').attr('readonly',false);
	      	$('#other_type').attr('data-validation','required');
	    } 
	    else{
	    	$('#other_type').val('');
	    	$('#other_type').attr('readonly',true);
	      	$('#other_type').attr('data-validation','');
	    }
	}
</script>