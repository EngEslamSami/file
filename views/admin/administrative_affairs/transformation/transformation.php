<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$status = array('لم يتم إتخاذ إجراء','تم الموافقة على النقل','تم رفض النقل');
$script = '';
$script2 = '';
if(isset($branches) && $branches != null) {
    $script = 'onchange=\'return get_subBranch($(this).val(), '.json_encode($branches).')\'';
    $script2 = 'onchange=\'return loadData($(this).val(), '.json_encode($branches).')\'';
}
else {
	$script2 = 'onchange=\'return loadData($(this).val(),"")\'';
}
$id = $this->uri->segment(3);
if($id == '') {
	echo form_open_multipart('Administrative_affairs/addTransform');
}
else {
	echo form_open_multipart('Administrative_affairs/editTransform/'.$id.'');
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
	                            	
	                            			<input type="text" id="date_transfer" name="date_transfer" placeholder="تاريخ الطلب" value="<?php if(isset($transform)) {echo date("d/m/Y",$transform['date_transfer']);} else {echo date("d/m/Y");} ?>" class="form-control date_melady" data-validation="required" >
	                            	
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> إسم الموظف </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control selectpicker" data-live-search="true" name="emp_id_fk" <?=$script2?> data-validation="required" aria-required="true">
	                            		<?php if($_SESSION['head_dep_id_fk'] != 2){ ?>
										<option value="">إختر الموظف</option>
										<? } ?>
										<?php
										foreach ($employees as $employee) {
											$select = '';
											if((isset($transform) && $transform['emp_id_fk'] == $employee->emp_code) || ($_SESSION['role_id_fk'] == 3)) {
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
									<input type="hidden" name="current_main_dep" id='current_main_dep' value="<?php if(isset($employeeData)) echo $employeeData['mainID'] ?>">
									<input type="hidden" name="current_sub_dep" id='current_sub_dep' value="<?php if(isset($employeeData)) echo $employeeData['subID'] ?>">
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> الإدارة المنقول إليها </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control" name="to_main_dep" id="to_main_dep" data-validation="required" aria-required="true" <?=$script?>>
	                            		<option value="">إختر</option>
										<?php 
										if($_SESSION['head_dep_id_fk'] == 2 || $id != '') {
					                    	if(isset($branches) && $branches != null) {
					                        	foreach ($branches as $value) {
					                        		$select = '';
					                        		if($id != '' && $value->id == $transform['to_main_dep']) {
					                        			$select = 'selected';
					                        		}
					                    ?>
					                    <option value="<?=$value->id?>" <?=$select?>><?=$value->name?></option>
					                    <?php 
					                    		}
					                        }
					                    }
					                    ?>
									</select>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> القسم المنقول إليه </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
                                	<select class="form-control" name="to_sub_dep" id="to_sub_dep" data-validation="required" aria-required="true">
	                            		<option value="">إختر</option>
	                            		<?php 
										if($id != '') {
					                    	if(isset($branches) && $branches != null) {
					                        	foreach ($branches as $value) {
					                        		if($value->id != $transform['to_main_dep']) {
					                        			continue;
					                        		}
					                        		foreach ($value->subBranches as $sub) {
					                        			if($sub->id == $transform['current_sub_dep']){
					                        				continue;
					                        			}
					                        			$select = '';
						                        		if($sub->id == $transform['to_sub_dep']) {
						                        			$select = 'selected';
						                        		}
					                    ?>
					                    <option value="<?=$sub->id?>" <?=$select?>><?=$sub->name?></option>
					                    <?php 
					                    			}
					                    		}
					                        }
					                    }
					                    ?>
									</select>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> ملاحظات </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                                <textarea class="r-textarea" name="details" data-validation="required"><?php if(isset($transform)) echo $transform['details'] ?></textarea>
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
<?php if(isset($transforms) && $transforms != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>التاريخ</th>
							<th>إسم الموظف</th>
							<th>الإدارة / القسم المحول منه</th>
							<th>الإدارة / القسم المحول إليه</th>
							<th>الحالة</th>
							<th>التفاصيل</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($transforms as $transform) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$transform->date_transfer)?></td>
							<td><?=$transform->employee?></td>
							<td><?=$transform->current_main.' / '.$transform->current_sub?></td>
							<td><?=$transform->to_main.' / '.$transform->to_sub?></td>
							<td><?=$status[$transform->approved]?></td>
							<td>
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$transform->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
							</td>
							<td>
								<?php if($transform->approved == 0){ ?>
								<a href="<?php echo base_url('Administrative_affairs/editTransform').'/'.$transform->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/deleteTransform/".$transform->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
				                <? }else{ ?>
				                	<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تنفيذ أي إجراء حيث تم إعتماد طلب النقل</button>
				                <?php } ?>
							</td>
						</tr>

						<div class="modal" id="myModal<?=$transform->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title">تفاصيل طلب النقل</h4>
					             	</div>
				       
				           			<div class="modal-body">
				       					<div class="row">
				       						<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>تاريخ الطلب :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=date("Y-m-d",$transform->date_transfer)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>إسم الموظف :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$transform->employee?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>الإدارة / القسم المحول منه :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$transform->current_main.' / '.$transform->current_sub?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>الإدارة / القسم المحول إليه :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$transform->to_main.' / '.$transform->to_sub?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>التفاصيل :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$transform->details?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>حالة طلب النقل :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$status[$transform->approved]?></h6>
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
    function loadData(id,barnches){
    	$('#branch_name').val('');
    	if(barnches != "") {
	    	var select = document.getElementById('to_sub_dep');
			var select2 = document.getElementById('to_main_dep');
			removeOptions(select);
			removeOptions(select2);
			select.options[select.options.length] = new Option('إختر', '');
			select2.options[select2.options.length] = new Option('إختر', '');
			for (var i = 0; i < barnches.length; i++) {
	            select2.options[select2.options.length] = new Option(barnches[i].name, barnches[i].id);
	        }
	    }
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
					$('#current_main_dep').val(JSONObject["mainID"]);
					$('#current_sub_dep').val(JSONObject["subID"]);
                }
            });
            return false;
        }
    }

    function get_subBranch(val,barnches) {
        var select = document.getElementById('to_sub_dep');
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        for (var i = 0; i < barnches.length; i++) {
            var obj = barnches[i];
            if(obj.id == val){
                var subBranch = obj.subBranches;
                for (var x = 0; x < subBranch.length; x++) {
                	if(subBranch[x].id != $('#current_sub_dep').val()) {
	                    select.options[select.options.length] = new Option(subBranch[x].name, subBranch[x].id);
	                }
                }
                console.log(obj.subBranches);
            }
        }
    }

    function removeOptions(selectbox)
    {
        for(var i = selectbox.options.length - 1 ; i >= 0 ; i--) {
            selectbox.remove(i);
        }
    }
</script>