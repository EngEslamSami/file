<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
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
					<?php 
					if(isset($activities) && $activities != null) { 
						foreach ($activities as $activity) {	
					?>
					<form method="POST" action="programRun">
						<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding container" style="padding-bottom: 10px">
							<button type="button" class="btn btn-info col-sm-12" data-toggle="collapse" data-target="#demo<?=$activity->id?>"><?=$activity->name?></button>
							<div id="demo<?=$activity->id?>" class="collapse">
								<?php if($activity->attendedMembers != null) { ?>
								<div class="col-md-12 no-padding">
									<br>
									<div class="form-group col-sm-4 col-xs-12 no-padding">
					               		<label class="label label-green half"> تاريخ التنفيذ<strong class="astric">*</strong> </label>
					                	<input type="text" name="finished_date" class="form-control half input-style docs-date" data-validation="required" />
					               	</div>

					               	<div class="form-group col-sm-4 col-xs-12">
					               		<label class="label label-green half"> تكلفة البرنامج<strong class="astric">*</strong> </label>
					                	<input type="number" step=".5" class="form-control half input-style" data-validation="required" onkeyup="cal($(this).val(),<?=count($activity->attendedMembers)?>,<?=$activity->id?>);" />
					               	</div>

					               	<div class="form-group col-sm-4 col-xs-12">
					               		<input type="submit" id="buttons" name="save" class="btn btn-blue btn-next" value="حفظ  " />
					               	</div>
				               	</div>
				               	<div class="col-md-12 no-padding">
									<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
										<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">الإسم</th>
											<th class="text-center">الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($activity->attendedMembers as $member) {
											$name = $member->full_name;
											if ($member->person == 1) {
												$name = $member->member_full_name;
											}
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$name?></td>
											<td>
												<input type="text" name="value[<?=$member->id?>]" class="value<?=$activity->id?>" readonly>
											</td>
										</tr>
										<? } ?>
									</tbody>
								</table>
							</div>
							<? 
							}
							else {
								echo '<div class="alert alert-danger">لا يوجد مسجلين</div>';
							}
							?>
							</div>
						</div>
					</form>
					<? 
						} 
					}
					else {
						echo '<div class="alert alert-danger">لا توجد أنشطة</div>';
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function cal(total,count,id) {
		if(total) {
			val = parseFloat(total) / parseFloat(count);
			$('.value'+id).val(val);
		}
		else {
			$('.value'+id).val('');
		}
	}
</script>