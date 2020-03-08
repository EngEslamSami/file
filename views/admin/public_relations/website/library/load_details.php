
<div class="col-xs-12 no-padding">
        <?php   echo form_open_multipart('public_relations/website/library/Live_videos_library/update_vedio/'.$get_vedio->id );?> 
			<div class="col-xs-12 form-group">
				<label class="label ">تعديل</label>

				<input class="form-control" type="text" name="video_link"  value="https://www.youtube.com/watch?v=<?=$get_vedio->video_link;?>"><small class="" style="bottom:-13px;"  >
			
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