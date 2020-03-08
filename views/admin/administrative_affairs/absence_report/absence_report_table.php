<style type="text/css">
.padd {padding: 0 15px !important;}
.no-padding {padding: 0;}
h4 {margin-top: 0;}
</style>

<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول بيانات مساءلة غياب</h4>
                </div>
            </div>
            
            <div class="panel-body">
<?php if(isset($records) && $records != null) { ?>
				<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>تاريخ الإفادة</th>
							<th>إسم الموظف</th>
							<th>عدد الأيام</th>
							<th>من يوم</th>
							<th>إلى يوم</th>
							<th>طباعة</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($records as $record) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$record->statement1_date)?></td>
							<td><?=$record->employee?></td>
							<td><?=$record->absence_days_num?></td>
							<td><?=date("Y-m-d",$record->date_from)?></td>
							<td><?=date("Y-m-d",$record->date_to)?></td>
							<td>
								<a href="<?=base_url().'Administrative_affairs/printAbsence_report/'.$record->id.'/'.$this->uri->segment(2)?>"><i class="fa fa-print"></i></a>
							</td>
							<td>
								<?php //if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){ ?>
									<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal<?=$record->id?>"><span class="fa fa-info"></span> إفادة الموظف</button>
				                <? 
				            	//}
				            	//if($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){ ?>
									<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModals<?=$record->id?>"><span class="fa fa-question"></span> رأي شؤون الموظفين</button>
				            	<? 
				            	//}
				            	//else{
				            	?>
				            		<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModala<?=$record->id?>"><span class="fa fa-list"></span> رأي مدير الشؤون الإدارية</button>
				            	<? //} ?>
							</td>
						</tr>
						<div class="modal" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                  			<div class="modal-dialog" role="document" style="width: 90%">
                    			<div class="modal-content">
                    				<form action="<?=base_url().'Administrative_affairs/updateAbsence_reportemp/'.$record->id?>" method="post" enctype="multipart/form-data">
	                      				<div class="modal-header">
	                        				<button type="button" class="close" data-dismiss="modal">&times;</button>
	                        				<h4 class="modal-title">إفادة (2) للموظف(<?=$record->employee?>)</h4>
	                      				</div>

	                      				<div class="modal-body">
	                      					<h4 class="r-h4">أفيدكم أن غيابى كان للأسباب التالية : </h4>
	                        				<div class="form-group col-sm-6 col-xs-12">
		                            			<label class="label label-green half">أدخل السبب </label>
		                            			<textarea class="form-control half" name="statement2" data-validation="required"><?=$record->statement2?></textarea>
	                        				</div>

	                        				<div class="form-group col-sm-6 col-xs-12">
		                            			<label class="label label-green half">إرفق ملف </label>
		                            			<?php 
                                                if($record->file != null){
                                                    if(file_exists('uploads/files/'.$record->file)){ ?>
		                            			<a href="<?=base_url().'Administrative_affairs/downloads/'.$record->file?>"><span class="fa fa-download btn btn-warning text-center" style="height: 34px;"> تحميل الملف</span></a>
		                            			<? 
                                                    }  
                                                }
                                                else{
                                                ?>
                                                <input type="file" name="pdf" class="form-control half" accept="application/pdf" data-validation="required">
                                                <? } ?>
	                        				</div>
	                      				</div>
	                      				<div class="modal-footer" style="border-top:0">
	                      					<button type="submit" name="add" value="1" class="btn btn-success">حفظ</button>

	                        				<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
	                      				</div>
	                      			</form>
                    			</div>
                  			</div>
                		</div>

                		<div class="modal" id="myModals<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                  			<div class="modal-dialog" role="document" style="width: 90%">
                    			<div class="modal-content">
                    				<form action="<?=base_url().'Administrative_affairs/updateAbsence_reportopenion/'.$record->id?>" method="post">
	                      				<div class="modal-header">
	                        				<button type="button" class="close" data-dismiss="modal">&times;</button>
	                        				<h4 class="modal-title">رأى شؤون الموظفين</h4>
	                      				</div>

	                      				<div class="modal-body">
	                        				<div class="form-group col-sm-6 col-xs-12">
	                        					<label class="label label-green half">إسم الرئيس المباشر </label>
	                        					<input type="text" class="form-control half input-style" placeholder="إسم الرئيس المباشر" name="openion_name" data-validation="required" value="<?=$record->openion_name?>">
	                        				</div>

	                        				<div class="form-group col-sm-12 col-xs-12">
		                            			<label class="label label-green half">رأى شؤون الموظفين </label>
		                            		</div>
		                            		<div class="form-group col-sm-12 col-xs-12">
		                            			<?php 
		                            			$openion = array(1=>'نحتسب له أيام الغياب من الإجازة السنوية',2=>'نحتسب له إجازة مرضية بعد التأكد من نظامية التقرير',3=>'يحسم عليه لعدم قبول عذره');
		                            			foreach ($openion as $key => $value) {
		                            				$checked = '';
		                            				if($record->openion == $key) {
		                            					$checked = 'checked';
		                            				}
		                            			?>
		                            			<br>
		                            			<input type="radio" name="openion" value="<?=$key?>" data-validation="required" <?=$checked?>> <label><h6><?=$value?></h6></label>
		                            			<? } ?>
	                        				</div>
	                      				</div>
	                      				<div class="modal-footer" style="border-top:0">
	                      					<button type="submit" name="add" value="1" class="btn btn-success">حفظ</button>

	                        				<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
	                      				</div>
	                      			</form>
                    			</div>
                  			</div>
                		</div>

                		<div class="modal" id="myModala<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                  			<div class="modal-dialog" role="document" style="width: 90%">
                    			<div class="modal-content">
                    				<form action="<?=base_url().'Administrative_affairs/updateAbsence_reportmanager/'.$record->id?>" method="post">
	                      				<div class="modal-header">
	                        				<button type="button" class="close" data-dismiss="modal">&times;</button>
	                        				<h4 class="modal-title">رأى مدير الشؤون الإدارية</h4>
	                      				</div>

	                      				<div class="modal-body">
	                        				<div class="form-group col-sm-6 col-xs-12">
	                        					<label class="label label-green half">إسم مدير الشؤون الإدارية</label>
	                        					<input type="text" class="form-control half input-style" placeholder="إسم مدير الشؤون الإدارية" name="manager_name" data-validation="required" value="<?=$record->manager_name?>">
	                        				</div>

	                        				<div class="form-group col-sm-12 col-xs-12">
		                            			<label class="label label-green half">رأى شؤون الموظفين </label>
		                            		</div>
		                            		<div class="form-group col-sm-12 col-xs-12">
		                            			<?php 
		                            			$openion = array(1=>'نحتسب له أيام الغياب من الإجازة السنوية',2=>'نحتسب له إجازة مرضية بعد التأكد من نظامية التقرير',3=>'يحتسب غيابه من رصيده للإجازات الاضطرارية',4=>'يحسم عليه لعدم قبول عذره');
		                            			foreach ($openion as $key => $value) {
		                            				$checked = '';
		                            				if($record->manager_decision == $key) {
		                            					$checked = 'checked';
		                            				}
		                            			?>
		                            			<br>
		                            			<input type="radio" name="manager_decision" value="<?=$key?>" data-validation="required" <?=$checked?>> <label><h6><?=$value?></h6></label>
		                            			<? } ?>
	                        				</div>
	                      				</div>
	                      				<div class="modal-footer" style="border-top:0">
	                      					<button type="submit" name="add" value="1" class="btn btn-success">حفظ</button>

	                        				<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
	                      				</div>
	                      			</form>
                    			</div>
                  			</div>
                		</div>
					<?php } ?>
					</tbody>
				</table>
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