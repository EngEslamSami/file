<?php
if($fatora[0]->paid_type == 1){
    $type='<span class="label label-sm label-success">نقدي</span>';
}
else{
    $type= '<span class="label label-sm label-primary">آجل</span>';
}
echo form_open_multipart('Storage/Purchases/hadPurchases/'.$this->uri->segment(4).'');
?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped" cellspacing="0">
                	<thead>
                		<tr>
                			<div class="alert alert-success text-center" style="margin: 0; padding: 0"><h4>بيانات الفاتورة</h4></div>
                		</tr>
                		<tr>
                			<th>كود الفاتورة	</th>
                			<th>تاريخ الفاتورة</th>
                			<th>إسم المورد</th>
                			<th>طريقة الدفع</th>
                		</tr>
                	</thead>
                	<tbody>
                		<tr>
                			<td><?=$fatora[0]->id?></td>
                			<td><?=date("Y-m-d",$fatora[0]->fatora_date)?></td>
                			<td><?=$fatora[0]->supplier_code_name?></td>
                			<td><?=$type?></td>
                		</tr>
                	</tbody>
                </table>
                <table class="table table-bordered table-hover table-striped" cellspacing="0">
                	<thead>
                		<tr>
                            <div class="alert alert-danger text-center" style="margin: 0; padding: 0"><h4>تفاصيل الفاتورة</h4></div>
                		</tr>
                		<tr>
                			<th>م</th>
                			<th>إسم الصنف</th>
                			<th>الكمية</th>
                			<th>الكمية المردودة</th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php 
                		$x = 1;
                		foreach ($fatora[0]->sub as $value) {
                		?>
                		<tr>
                			<td><?=($x++)?></td>
                			<td><?=$value->item_name?></td>
                			<td><?=$value->amount_buy?></td>
                			<td>
                				<input class="form-control" type="number" min="0" max="<?=$value->amount_buy?>" name="hadback_amount[]" value="<?=$value->hadback_amount?>" required>
                				<input type="hidden" name="product_code[]" value="<?=$value->product_code?>">
                			</td>
                		</tr>
                		<? } ?>
                	</tbody>
                </table>
                <input type="hidden" name="supplier_code" value="<?=$fatora[0]->supplier_code?>">
                <button type="submit" name="add" value="add" class="btn btn-purple w-md m-b-5"><i class="fa fa-floppy-o"></i> حفظ</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close()?>