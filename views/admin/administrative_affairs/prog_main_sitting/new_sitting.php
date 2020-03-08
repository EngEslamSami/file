<?php 
if($this->uri->segment(4) == ""){
	echo form_open_multipart('Administrative_affairs/new_sitting/'.$this->uri->segment(3)); 
}
else{
	echo form_open_multipart('Administrative_affairs/edit_sitting/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); 
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">
	<div class="col-sm-2 col-md-2 col-xs-2">
		<button type="button" class="btn btn-success w-md m-b-5 " onclick="window.location.href = '<?=base_url()?>Administrative_affairs/Sitting';"><i class="fa fa-reply"></i> رجوع  </button>
	</div>
</div>

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
			    <div class="form-group col-sm-6 col-xs-12">
			      	<label class="label label-green half"> الإسم</label>
			      	<input type="text" name="title" value="<?php if(isset($record)) echo $record['title'] ?>" class="form-control half input-style" autofocus data-validation="required">
			    </div>

			    <?php 
			    if($this->uri->segment(3) == 3 || $this->uri->segment(3) == 6){ 
			    	$val1 = $val2 = '';
			    	if(isset($record)){
			    		$val1 = 'checked';
			    		$val2 = '';
			    		if($record['cash'] == 2) {
			    			$val1 = '';
			    			$val2 = 'checked';
			    		}
			    	}
			    ?>
			    <div class="form-group col-sm-6 col-xs-12" style="margin-top: 10px;">
			      	<input type="radio" name="cash" <?=$val1?> value="1" data-validation="required"> مادي
			      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			      	<input type="radio" name="cash" <?=$val2?> value="2" data-validation="required"> غير مادي
			    </div>
			    <? } ?>

			    <div class="form-group col-sm-12 col-xs-12">
		            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
				</div>
			</div>
		</div>
	</div>
</div>