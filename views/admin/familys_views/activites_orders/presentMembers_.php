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
						<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding container" style="padding-bottom: 10px">
							<button type="button" class="btn btn-info col-sm-12" data-toggle="collapse" data-target="#demo<?=$activity->id?>"><?=$activity->name?></button>
							<div id="demo<?=$activity->id?>" class="collapse">
								<?php if($activity->members != null) { ?>
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
									foreach ($activity->members as $member) {
										$name = $member->full_name;
										if ($member->person == 1) {
											$name = $member->member_full_name;
										}
										$class = 'btn btn-danger';
										$status = 'لم يحضر';
										if($member->attend == 1) {
											$class = 'btn btn-success';
											$status = 'تم الحضور';  
										}
									?>
									<tr>
										<td><?=($x++)?></td>
										<td><?=$name?></td>
										<td>
											<button type="button" id="button_<?=$member->id?>" class="<?=$class?>" onclick="attendance(<?=$member->id?>)"><?=$status?></button>
										</td>
									</tr>
									<? } ?>
								</tbody>
							</table>
							<? 
							}
							else {
								echo '<div class="alert alert-danger">لا يوجد مسجلين</div>';
							}
							?>
							</div>
						</div>
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
	function attendance(id) {
		var color = $('#button_'+id).attr('class');
		if(color == 'btn btn-success') {
			color = 'btn btn-danger';
			text = 'لم يحضر';
			attend = 0;
		}
		else {
			color = 'btn btn-success';
			text = 'تم الحضور';
			attend = 1;
		}
		$('#button_'+id).attr('class',color);
		$('#button_'+id).html(text);
		var dataString = 'attend=' + attend + '&id=' + id ;
		$.ajax({
            type:'post',
            url:"<?=base_url()?>family_controllers/activites_orders/ActivitesOrders/attendance",
            data:dataString,
            success:function(){
            	
            }
        });
	}
</script>