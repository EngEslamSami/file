<?php 
$required = 'required';
$update = '';
if($this->uri->segment(4) == ""){
	echo form_open_multipart('Adds/Adds/new_add'); 
}
else{
	echo form_open_multipart('Adds/Adds/edit_add/'.$this->uri->segment(4)); 
	$required = '';
	$update = 'إذا لم ترغب بتغيير الصورة لا تختار شيء';
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">
	<div class="col-sm-2 col-md-2 col-xs-2">
		<button type="button" class="btn btn-success w-md m-b-5 " onclick="window.location.href = '<?=base_url()?>Adds/Adds';"><i class="fa fa-reply"></i> رجوع  </button>
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
				<br>
			    <div class="form-group col-sm-5 col-xs-12">
			      	<label class="label label-green half"> الإسم</label>
			      	<input type="text" name="name" value="<?php if(isset($record)) echo $record['name'] ?>" class="form-control half input-style" data-validation="required">
			    </div>

			    <div class="form-group col-sm-5 col-xs-12">
			      	<label class="label label-green half"> رفع صورة الإعلان</label>
			      	<input type="file" name="img" class="form-control half input-style" data-validation="<?=$required?>" onchange="readURL(this);" accept="image/*">
			      	<span style="color: #a94442"><?=$update?></span>
			    </div>

			    <div class="form-group col-sm-2 col-xs-12">
			      	<label class="label label-green col-xs-12"> صورة الإعلان</label>
			      	<img id="blah" class="img-rounded" src="<?php if(isset($record)  && file_exists('uploads/images/'.$record['img'])){ echo base_url().'uploads/images/'.$record['img'];}else {echo base_url().'asisst/web_asset/img/logo.png';} ?>" style="height: 100px; width: 156px;" >
			    </div>

			    <div class="form-group col-sm-12 col-xs-12">
		            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>