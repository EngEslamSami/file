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
          $service_name = 'مساعدة زواج';
          $files = array('بطاقة العائلة '=>'family_card','عقد النكاح  '=>'identity_img','صورة الهوية  '=>'marriage_contract','الصورة الشخصية  '=>'personal_picture','عقد القاعة '=>'hall_contract','تعريف بالراتب '=>'salary_definition','تزكية الامام  '=>'imam_recommendation');
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
                
                <td><a target="_blank" href="<?php echo base_url();?>services_orders/Print_orders/index/<?php echo $value->id;?>"><i class="fa fa-print" aria-hidden="true"></a></td>

                
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
                  <div class="form-group col-sm-9 col-xs-12">
                      <table class="table table-bordered table-devices">
                        <tbody>
                          <tr>
                            <th class="gray_background" style="width: 25%;" >رقم الأسرة</th>
                            <td><?=$value->mother_national_id_fk?></td>
                            <th class="gray_background" style="width: 25%;" >فئة الخدمة</th>
                            <td><?=$service_name?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;" >الإسم</th>
                            <td><?=$value->member_full_name?></td>
                            <th class="gray_background" style="width: 25%;" >المدينة</th>
                            <td><?=$value->area?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">مكان الزواج</th>
                            <td><?=$value->place?></td>
                            <th class="gray_background" style="width: 25%;">تاريخ الزواج</th>
                            <td><?=$value->marriage_date?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">رقم العقد</th>
                            <td><?=$value->contract_number?></td>
                            <th class="gray_background" style="width: 25%;">تاريخ العقد</th>
                            <td><?=$value->contract_date?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">جهة اصدار العقد</th>
                            <td><?=$value->contract_source?></td>
                            <th class="gray_background" style="width: 25%;">قيمة المهر</th>
                            <td><?=$value->dowry_cost?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">جنسية الزوجة</th>
                            <td><?=$value->nationality?></td>
                            <th class="gray_background" style="width: 25%;">رقم هوية الزوجة</th>
                            <td><?=$value->national_id?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">نوع هوية الزوجة</th>
                            <td><?=$type[$value->national_type]?></td>
                            <th class="gray_background" style="width: 25%;">الزواج لاول مرة</th>
                            <td><?=$answer[$value->first_marriage]?></td>
                          </tr>
                          <tr>
                            <th class="gray_background" style="width: 25%;">رقم الجوال</th>
                            <td><?=$value->mobile?></td>
                            <th class="gray_background" style="width: 25%;"></th>
                            <td></td>
                          </tr>
                          <?php 
                          $x = 1;
                          foreach ($files as $key => $value2) { 
                            if($x % 2 != 0) { 
                              echo '</tr>';
                            }
                          ?>
                            <th class="gray_background" style="width: 25%;"><?=$key?></th>
                            <td>
                              <?php if($value->$value2) { ?>
                              <a href="<?=base_url().'services_orders/Services_orders/download/'.$value->$value2?>"><span><i class="fa fa-download"></i></span></a>
                              <? } ?>
                            </td>
                          <?php
                            if($x % 2 == 0) { 
                              echo '</tr>';
                            }
                            $x++;
                          } 
                          ?>
                        </tbody>
                      </table>
                  </div>

                  <div class="form-group col-sm-3 col-xs-12">
                    <div class="col-md-12 padd" style="height: 88px !important">
                      <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                      <label class="label label-green col-xs-12 no-margin">الإسم</label>
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
                </div>
                <div class="modal-footer" style="border-top: 0;">
                  <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
              </div>
            </div>
          </div>
				<?
          }
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