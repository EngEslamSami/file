<style type="text/css">
.nav.nav-tabs {
    border-bottom: 1px solid #eee;
}
	.table-blue thead th {
    background-color: #428bca;
    color: #f5f5f5;
}
.btn-pxs{
	padding: 2px 5px;
}
.cs-label {
    font-size: 14px;
    font-weight: normal;
}
.top_radio input[type=radio] {
    height: 24px;
    width: 24px;
    line-height: 0px;
    vertical-align: middle;
    margin-right: -33px;
    top: -5px;

}
.top_radio .radio,.top_radio .radio {
    vertical-align: middle;
    font-size:16px;

    padding: 10px;
    border-bottom: 2px solid #eee;
    border-radius: 8px;
    text-align: right;

}
.radio input[type="radio"] {
    opacity: 1;
}
</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $title?></h3>
	</div>
	<div class="panel-body">
		<div>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#in_cheque" aria-controls="in_cheque" role="tab" data-toggle="tab">الشيكات الواردة</a></li>
				<li role="presentation"><a href="#out_cheque" aria-controls="out_cheque" role="tab" data-toggle="tab">الشيكات الصادرة</a></li>

			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="in_cheque">
				<br>
                    <?php if(!empty($sheeks_qabd)){ ?>
					<table class="table table-hover table-bordered table-blue">
						<thead>
							<th>م</th>
							<th>نوع السند</th>
							<th>رقم السند</th>
							<th>تاريخ السند</th>
							<th>الإسم</th>
							<th>رقم الشيك</th>
							<th>البنك</th>
							<th>رقم الحساب</th>
							<th>تاريخ الشيك</th>
							<th>المبلغ</th>
							<th>البيان</th>
							<th>تواجد الشيك</th>
							<th>حالة الشيك</th>
							<th>نوع الشيك</th>
						</thead>
						<tbody>
                        <?php  $count=1; foreach ($sheeks_qabd as $row){ ?>
							<tr>
                                <td><?=$count?></td>
								<td>قبض شيك</td>
                                <td><?=$row->rqm_sanad_id_fk?></td>
                                <td><?=$row->details->date_sanad_ar?></td>
                                <td><?=$row->details->person_name?></td>
                                <td><?=$row->sheek_num?></td>
                                <td><?=$row->bank_name?></td>
								<td>236596523</td>
                                <td><?=$row->sheek_date_ar?></td>
                                <td><?=$row->details->total_value?></td>
                                <td><button type="button" data-text="<?=$row->details->about?>" class="btn btn-info btn-xs" onclick="$('.text_div').text($(this).attr('data-text'));" data-toggle="modal" data-target="#myModalbyan">البيان</button></td>
								<td><span class="label label-success cs-label">بالخزينة</span></td>
								<td><span class="label label-danger cs-label">تحت التحصيل</span></td>
								<td><button class="btn btn-success btn-pxs">نفس البنك</button></td>

							</tr>

                            <?php $count ++; } ?>

						</tbody>
					</table>
                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات واردة!</div>
                    <?php  } ?>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="out_cheque">
				<br>
                    <?php if(!empty($sheeks_sarf)){ ?>
                        <table class="table table-hover table-bordered table-blue">
                            <thead>
                            <th>م</th>
                            <th>نوع السند</th>
                            <th>رقم السند</th>
                            <th>تاريخ السند</th>
                            <th>إسم المستفيد</th>
                            <th>رقم الشيك</th>
                            <th>البنك</th>
                            <th>رقم الحساب</th>
                            <th>تاريخ إصدار الشيك</th>
                            <th>المبلغ</th>
                            <th>البيان</th>
                            <th>حالة التسليم</th>
                            <th>حالة الشيك</th>
                            </thead>
                            <tbody>
                            <?php  $count=1; foreach ($sheeks_sarf as $row){ ?>
                            <tr>
                                <td><?=$count?></td>
                                <td>صرف شيك</td>
                                <td><?=$row->rqm_sanad_id_fk?></td>
                                <td><?=$row->details->date_sanad_ar?></td>
                                <td><?=$row->details->person_name?></td>
                                <td><?=$row->sheek_num?></td>
                                <td><?=$row->bank_name?></td>
                                <td>236596523</td>
                                <td><?=$row->sheek_date_ar?></td>
                                <td><?=$row->details->total_value?></td>
                                <td><button type="button" data-text="<?=$row->details->about?>" class="btn btn-info btn-xs" onclick="$('.text_div').text($(this).attr('data-text'));" data-toggle="modal" data-target="#myModalbyan">البيان</button></td>
                                <td><?php if($row->taslem_sheek == NULL){ ?>
                                <button class="btn btn-danger btn-pxs" data-toggle="modal" data-target="#myModaltaslem<?=$row->id?>" >لم يتم التسليم </button> <?php }else{  ?>
                                  <button class="btn  btn-pxs"style="background-color: <?=$row->taslem_sheek_color?>" data-toggle="modal" data-target="#myModaltaslem<?=$row->id?>" ><?=$row->taslem_sheek_name?> </button>
                                <?php } ?>
                                </td>
                                <td><?php if($row->sheek_status == NULL){ ?>
                                    <button  data-toggle="modal" data-target="#myModalsarf<?=$row->id?>"class="btn btn-danger btn-pxs" >لم يتم الصرف</button><?php }else{ ?>

                                        <button class="btn  btn-pxs" style="background-color: <?=$row->sheek_status_color?>" data-toggle="modal" data-target="#myModalsarf<?=$row->id?>" ><?=$row->sheek_status_name?> </button>
                                    <?php } ?>
                                </td>
                            </tr>


                                <?php $count ++; }  ?>
                            </tbody>
                        </table>
                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات صادرة!</div>
                  <?php  } ?>

				</div>

			</div>

		</div>
        <div class="modal fade" id="myModalbyan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">البيان</h4>
                    </div>
                    <div class="modal-body">
                       <textarea name="" readonly class="form-control text_div"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>




	</div>

</div>

<?php if(!empty($sheeks_qabd)){ ?>

      <?php  $count=1; foreach ($sheeks_sarf as $row){ ?>
<div class="modal fade" id="myModaltaslem<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الإجراء</h4>
            </div>
            <?php echo form_open_multipart('finance_accounting/box/sheek_tracks/Sheek_tracks/change_taslem_sheek');?>

            <div class="modal-body">


                <div class=" col-xs-12 text-center top_radio">
                    <?php if(!empty($taslem_settings)){  foreach ($taslem_settings as $rows){ ?>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="taslem_sheek"
                                           value="<?php echo$rows->id.'-'.$rows->title; ?>">
                                    <?=$rows->title?> <br>
                                </label>
                            </div>
                        </div>
                    <?php } } ?>




                </div>
                <div class=" col-xs-12">

                    <textarea name="reason" class="form-control" style="height: 100px;box-shadow: 2px 2px 8px;"></textarea>
                    <br>

                </div>


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <input type="hidden" name="rkm_sanad" value="<?=$row->rqm_sanad_id_fk?>">
                <input type="hidden" name="sheek_num" value="<?=$row->sheek_num?>">
                <input type="hidden" name="bank_name" value="<?=$row->bank_name?>">
                <input type="hidden" name="id" value="<?=$row->id?>">
                <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                <button type="submit"  name="save" value="save" style="float: left" class="btn btn-success" >حفظ</button>
            </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>




        <div class="modal fade" id="myModalsarf<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">الإجراء</h4>
                    </div>
                    <?php echo form_open_multipart('finance_accounting/box/sheek_tracks/Sheek_tracks/change_sheek_status');?>

                    <div class="modal-body">


                        <div class=" col-xs-12 text-center top_radio">
                            <?php if(!empty($sarf_settings)){  foreach ($sarf_settings as $rows){ ?>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sheek_status"
                                                   value="<?php echo$rows->id.'-'.$rows->title; ?>">
                                            <?=$rows->title?> <br>
                                        </label>
                                    </div>
                                </div>
                            <?php } } ?>




                        </div>
                        <div class=" col-xs-12">

                            <textarea name="reason" class="form-control" style="height: 100px;box-shadow: 2px 2px 8px;"></textarea>
                            <br>

                        </div>


                    </div>
                    <div class="modal-footer" style="display: inline-block;width: 100%">
                        <input type="hidden" name="rkm_sanad" value="<?=$row->rqm_sanad_id_fk?>">
                        <input type="hidden" name="sheek_num" value="<?=$row->sheek_num?>">
                        <input type="hidden" name="bank_name" value="<?=$row->bank_name?>">
                        <input type="hidden" name="id" value="<?=$row->id?>">
                        <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        <button type="submit"  name="save" value="save" style="float: left" class="btn btn-success" >حفظ</button>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>

<?php $count ++; } } ?>