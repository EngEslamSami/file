
<div class="col-xs-12 no-padding">
        <?php   echo form_open_multipart('technical_support/tazkra/tazkra_comments/Tazaker_comments/update_comment/'.$get_tazkra->id."/".$get_tazkra->tazkra_id_fk );?> 
			<div class="col-xs-12 form-group">
				<label class="label ">تعديل</label>
				<textarea class="form-control" rows="3" name="tazkra_comment" id="tazkra_comment"  data-validation="required" ><?=$get_tazkra->comment;?></textarea>
			</div>
			
			<div class="col-md-6 form-group">

			</div>
			<div class="col-md-3 form-group">
                <button class="btn btn-success btn-labeled" type="submit" name="add" value="add"
                ><span class="btn-label"><i class="fa fa-reply"></i></span>تعديل</button>
			
                
            
            </div>
		</div>
        <?php
            echo form_close();
            ?>