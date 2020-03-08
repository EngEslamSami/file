	<style type="text/css">
	.print_forma{
		border:1px solid ;
		padding: 15px;
	}
	.print_forma table th{
		text-align: right;
	}
	.print_forma table tr th{
		vertical-align: middle;	
	}
	.body_forma{
		margin-top: 40px;
	}
	.no-padding{
		padding: 0;
	}
	.heading{
		font-weight: bold;
		text-decoration: underline;
	}
	.print_forma hr{
		border-top: 1px solid #000;
		margin-top: 7px;
		margin-bottom: 7px;
	}

	.myinput.large{
		height:22px;
		width: 22px;
	}

	.myinput.large[type="checkbox"]:before{
		width: 20px;
		height: 20px;
	}
	.myinput.large[type="checkbox"]:after{
		top: -20px;
		width: 16px;
		height: 16px;
	}
	.checkbox-statement span{
		margin-right: 3px;
		position: absolute;
		margin-top: 5px;
	}
	.header p{
		margin: 0;
	}
	.header img{
		height: 90px;
	}
	.no-border{
		border:0 !important;
	}
	.table-devices tr td{
		width: 50%;
		min-height: 20px
	}
	.gray_background{
		background-color: #eee;

	}
	table.th-no-border th,
table.th-no-border td
	{
border-top: 0 !important;
	}
</style>
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>جدول البيانات</h4>
            </div>
        </div>

        <div class="panel-body">
			<div class="form-group col-sm-12 col-xs-12 no-padding">
				<?php 
				if (isset($records) && $records != null) {
					$answer = array(1=>'نعم',2=>'لا');
					$type = array(1=>'هوية وطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر'); 
          $card_service_type = array(1 => 'تالف', 2 => 'مفقود', 3 => 'تجديد', 4 => 'تغيير رقم سري', 5 => 'إصدار');
          $member_gender = array(0=>'الأم', 1=>'إبن', 2=>'إبنة');
				?>
				<table id="example" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>الإسم </th>
							<th>الإسم الخدمة</th>
							<th>التفاصيل</th>
							<th>الإجراء</th>
                            	<th>الطباعه</th>
						</tr>
					</thead>
					</tr>
					<tbody>
						<?php 
						$x = 1;
                        
                        
            if($mainServices == 2) {
              $service_name = 'مساعدة زواج';
            }
            if($mainServices == 3) {
              $service_name = 'التحويل لمركز طبي';
            }
            if($mainServices == 4) {
              $service_name = 'معالجة بطاقة الكترونية';
            }
                     if($mainServices == 1) {
              $service_name = 'خدمات عامة';
              if( $service_id_fk ==6){
                $mainServices=$service_id_fk;
              }
              if( $service_id_fk == 7){
                $mainServices=$service_id_fk;
              }
               if( $service_id_fk == 8){
                $mainServices=$service_id_fk;
              }
               if( $service_id_fk == 9){
                $mainServices=$service_id_fk;
              }
              if( $service_id_fk == 10){
                $mainServices=$service_id_fk;
              }
              if($service_id_fk == 15){
                $mainServices=$service_id_fk;
              }
              if($service_id_fk == 13){
                $mainServices=$service_id_fk;
              }
             if($service_id_fk == 14){
                $mainServices=$service_id_fk;
              } 
              
        
              
              /******************************************/
            }
            	foreach ($records as $value) {
						?>
							<tr>
								<td><?=($x++)?></td>
								<td><?=$value->full_name?></td>
								<td><?=$service_name?></td>
								<td>
									<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
								</td>
								<td>
                  <a href="<?php echo base_url('services_orders/Services_orders/editServicesOrders').'/'.$mainServices.'/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    
                  <a onclick="$('#adele').attr('href', '<?=base_url()."services_orders/Services_orders/delete/".$mainServices.'/'.$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>         
                </td>
                
                <td><a href = "<?php echo base_url('services_orders/Print_orders/print_Maintenance_electrical_appliances').'/'.$value->id ?>" target = "_blank" > <i class="fa fa-print" aria - hidden = "true" ></i > </a ></td>

                
                
				</tr>

						
						<? } ?>
					</tbody>
				</table>
                <?php foreach ($records as $value) { ?>
                    
                    	<div class="modal" id="myModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
								<div class="modal-dialog" role="document" style="width: 90%">
                    				<div class="modal-content">
                      					<div class="modal-header">
                        					<button type="button" class="close" data-dismiss="modal">&times;</button>
                        					<h4 class="modal-title">تفاصيل الخدمة</h4>
                      					</div>
                      					<br>
                      					<div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                        	
                                            <?php if($mainServices == 7 ) {?>
                                  <div class="form-group col-sm-9 col-xs-12">
                                  <table class="table table-bordered table-devices">
							<tbody>
								<tr>
									<th class="gray_background" style="width: 25%;" >رقم الأسرة</th>
									<td> <?=$value->mother_national_id_fk?></td>
								</tr>
								<tr>
									<th class="gray_background" style="width: 25%;">فئة الخدمة</th>
									<td><?=$service_name?> </td>
								</tr>
								
								<tr>
									<th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
									<td> <?='صيانة الأجهزة الكهربائية'?></td>
								</tr>
								<tr>
									<th class="gray_background" style="width: 25%;">نوع الجهاز</th>
									<td> <?=$value->device_name?></td>
								</tr>
                                <tr>
									<th class="gray_background" style="width: 25%;">العدد</th>
									<td><?=$value->number?></td>
								</tr>
                               <tr>
									<th class="gray_background" style="width: 25%;">ملاحظات</th>
									<td><?=$value->notes?></td>
								</tr>
							
						   <tr>
									<th class="gray_background" style="width: 25%;">صورة الجهاز</th>
									<td>
                                    <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->img?>">
                                    <img id="blah" src="<?=base_url('uploads/images/'.$value->img)?>" class="img-rounded" style="width: 17%;">
                                    </a>
                                    </td>
								</tr>	
								
							</tbody>
						</table>
                                  </div>

     <div class="form-group col-sm-3 col-xs-12">
                    <div class="col-md-12 padd" style="height: 88px !important">
                      <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                      <label class="label label-green col-xs-12 no-margin"> الإسم</label>
                      <h4 class="form-control"><?=$value->full_name?></h4>
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                      <label class="label label-green col-xs-12 no-margin">تاريخ الميلاد</label>
                      <h4 class="form-control"><?=$value->m_birth_date_hijri?></h4>
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                      <label class="label label-green col-xs-12 no-margin">رقم الجوال</label>
                      <h4 class="form-control"><?=$value->m_mob?></h4>
                    </div>
                  </div>
                                 
                                  <?php } ?>
                                            
                                            	</div>
                      					<div class="modal-footer" style="border-top: 0;">
                        					<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                      					</div>
                      				</div>
                      			</div>
                      		</div>
                    
                    
                <?php }?>
                
                
                
				<?
				}
				else {
					echo '<div class="alert alert-danger">لا توجد بيانات</div>';
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php echo die; ?>