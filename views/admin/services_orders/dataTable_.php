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
						foreach ($records as $value) {
						?>
							<tr>
								<td><?=($x++)?></td>
								<td><?=$value->member_name?></td>
								<td><?=$service_name?></td>
								<td>
									<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$value->id?>"><span class="fa fa-list"></span> التفاصيل</button>
								</td>
								<td>
                  <a href="<?php echo base_url('services_orders/Services_orders/editServicesOrders').'/'.$mainServices.'/'.$value->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    
                  <a onclick="$('#adele').attr('href', '<?=base_url()."services_orders/Services_orders/delete/".$mainServices.'/'.$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>         
                </td>
							</tr>

							<div class="modal" id="myModal<?=$value->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
								<div class="modal-dialog" role="document" style="width: 90%">
                    				<div class="modal-content">
                      					<div class="modal-header">
                        					<button type="button" class="close" data-dismiss="modal">&times;</button>
                        					<h4 class="modal-title">تفاصيل الخدمة</h4>
                      					</div>
                      					<br>
                      					<div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                  <?php if($mainServices == 2) { ?>
                      						<div class="form-group col-sm-9 col-xs-12">
                      							<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">رقم الأسرة</label>
                            						<h4 class="form-control half input-style"><?=$value->mother_national_id_fk?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">فئة الخدمة</label>
                            						<h4 class="form-control half input-style"><?=$service_name?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">نوع الخدمة</label>
                            						<h4 class="form-control half input-style"></h4>
                          						</div>

                          						<div class="col-md-12 padd"><hr style="margin-bottom: 7px;"></div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">الاسم</label>
                            						<h4 class="form-control half input-style"><?=$value->member_name?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">المدينة</label>
                            						<h4 class="form-control half input-style"><?=$value->area?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">مكان الزواج</label>
                            						<h4 class="form-control half input-style"><?=$value->place?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">تاريخ الزواج</label>
                            						<h4 class="form-control half input-style"><?=$value->marriage_date?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">رقم العقد</label>
                            						<h4 class="form-control half input-style"><?=$value->contract_number?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">تاريخ العقد</label>
                            						<h4 class="form-control half input-style"><?=$value->contract_date?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">جهة اصدار العقد</label>
                            						<h4 class="form-control half input-style"><?=$value->contract_source?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">قيمة المهر</label>
                            						<h4 class="form-control half input-style"><?=$value->dowry_cost?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">جنسية الزوجة</label>
                            						<h4 class="form-control half input-style"><?=$value->nationality?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">رقم هوية الزوجة</label>
                            						<h4 class="form-control half input-style"><?=$value->national_id?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">نوع هوية الزوجة</label>
                            						<h4 class="form-control half input-style"><?=$type[$value->national_type]?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">الزواج لاول مرة</label>
                            						<h4 class="form-control half input-style"><?=$answer[$value->first_marriage]?></h4>
                          						</div>

                          						<div class="form-group col-sm-4 col-xs-12">
                            						<label class="label label-green half">رقم الجوال</label>
                            						<h4 class="form-control half input-style"><?=$value->mobile?></h4>
                          						</div>
                      						</div>

                      						<div class="form-group col-sm-3 col-xs-12">
                      							<div class="col-md-12 padd" style="height: 88px !important">
									                    <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
								    			          </div>

								    			          <div class="form-group col-sm-12 col-xs-12">
                            					<label class="label label-green half">الإسم</label>
                            					<h4 class="form-control half input-style"><?=$value->m_first_name.' '.$value->m_father_name.' '.$value->m_family_name?></h4>
                          					</div>

                          					<div class="form-group col-sm-12 col-xs-12">
                            					<label class="label label-green half">تاريخ الميلاد</label>
                            					<h4 class="form-control half input-style"><?=$value->m_birth_date_hijri?></h4>
                          					</div>

                          					<div class="form-group col-sm-12 col-xs-12">
                            					<label class="label label-green half">رقم الجوال</label>
                            					<h4 class="form-control half input-style"><?=$value->m_mob?></h4>
                          					</div>
                      						</div>
                                  <? 
                                  } 
                                  if($mainServices == 3) {
                                  ?>
                                  <div class="form-group col-sm-9 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">رقم الأسرة</label>
                                        <h4 class="form-control half input-style"><?=$value->mother_national_id_fk?></h4>
                                      </div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">فئة الخدمة</label>
                                        <h4 class="form-control half input-style"><?=$service_name?></h4>
                                      </div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">نوع الخدمة</label>
                                        <h4 class="form-control half input-style"></h4>
                                      </div>

                                      <div class="col-md-12 padd"><hr style="margin-bottom: 7px;"></div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">الاسم</label>
                                        <h4 class="form-control half input-style"><?=$value->member_name?></h4>
                                      </div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">نوع المرض</label>
                                        <h4 class="form-control half input-style"><?=$value->disease_type?></h4>
                                      </div>
                                  </div>

                                  <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                      <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                      <label class="label label-green half">الإسم</label>
                                      <h4 class="form-control half input-style"><?=$value->m_first_name.' '.$value->m_father_name.' '.$value->m_family_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                      <label class="label label-green half">تاريخ الميلاد</label>
                                      <h4 class="form-control half input-style"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                      <label class="label label-green half">رقم الجوال</label>
                                      <h4 class="form-control half input-style"><?=$value->m_mob?></h4>
                                    </div>
                                  </div>
                                  <?
                                  }
                                  if($mainServices == 4) {
                                  ?>
                                  <div class="form-group col-sm-9 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">رقم الأسرة</label>
                                        <h4 class="form-control half input-style"><?=$value->mother_national_id_fk?></h4>
                                      </div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">فئة الخدمة</label>
                                        <h4 class="form-control half input-style"><?=$service_name?></h4>
                                      </div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">نوع الخدمة</label>
                                        <h4 class="form-control half input-style"></h4>
                                      </div>

                                      <div class="col-md-12 padd"><hr style="margin-bottom: 7px;"></div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">الاسم</label>
                                        <h4 class="form-control half input-style"><?=$value->member_name?></h4>
                                      </div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">رقم الهوية</label>
                                        <h4 class="form-control half input-style"><?=$value->national_id?></h4>
                                      </div>

                                      <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">نوع خدمة البطاقة</label>
                                        <h4 class="form-control half input-style"><?=$card_service_type[$value->card_service_type]?></h4>
                                      </div>
                                  </div>

                                  <div class="form-group col-sm-3 col-xs-12">
                                    <div class="col-md-12 padd" style="height: 88px !important">
                                      <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                      <label class="label label-green half">الإسم</label>
                                      <h4 class="form-control half input-style"><?=$value->m_first_name.' '.$value->m_father_name.' '.$value->m_family_name?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                      <label class="label label-green half">تاريخ الميلاد</label>
                                      <h4 class="form-control half input-style"><?=$value->m_birth_date_hijri?></h4>
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12">
                                      <label class="label label-green half">رقم الجوال</label>
                                      <h4 class="form-control half input-style"><?=$value->m_mob?></h4>
                                    </div>
                                  </div>
                                  <? } ?>
                      					</div>
                      					<div class="modal-footer" style="border-top: 0;">
                        					<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                      					</div>
                      				</div>
                      			</div>
                      		</div>
						<? } ?>
					</tbody>
				</table>
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