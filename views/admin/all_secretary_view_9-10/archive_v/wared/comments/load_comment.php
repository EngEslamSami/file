<div class="comments-sec">
		<div class="col-xs-12 no-padding">
			<h5>التعليقات</h5>
			<div class="well col-xs-12 no-padding">
				<div class="col-md-9 padding-4">
                <?php
      //  echo '<pre>'; print_r($result);
        if(isset($result)&&!empty($result)){

           
            foreach ($result as $row){

                ?>
					<article class="reply-comment">
						<div class="reply-img">
							<img src="<?php echo base_url()?>asisst/admin_asset/img/profile-icon.png" class="img-circle">
						</div>
						<div class="reply-comment ">
							<h5 class="name"><span class="label label-inverse"><?= $row->publisher_name;?> </span> <?= $row->date_ar;?> 
                            <!-- <a type="button" class="btn btn-danger btn-xs"  href="<?= base_url() . "technical_support/tazkra/tazkra_comments/Tazaker_comments/delete_comment/" . $row->id ."/".$row->wared_id_fk  ?>" style="float:left;"><i class="fa fa-trash"> </i></a>  -->
                           
                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                                  
                            <?php if($row->publisher==$_SESSION['user_id']){?>
                                <div class="btn-group" role="group" aria-label="..." style="float:left;">
                                <button type="button" class="btn btn-default"  onclick='delete_comment(<?php echo  $row->id ?>,<?= $row->wared_id_fk ?>)'> <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  data-toggle="modal"
                                      
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                
                                       </div>
                           <?php } ?>


                            <?php if($row->publisher==$_SESSION['emp_code']){?>
                                <div class="btn-group" role="group" aria-label="..." style="float:left;">
                                <button type="button" class="btn btn-default"  onclick='delete_comment(<?php echo  $row->id ?>,<?= $row->wared_id_fk ?>)'> <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  data-toggle="modal"
                                      
                                       data-target="#detailsModal" onclick="load_page(<?= $row->id ?>);"><i class="fa fa-pencil"> </i></button>
                                
                                       </div>
                           <?php } ?>
                           
                           
                           
                           
                         
                             </h5>
							<p><?= $row->comment;?></p>
						</div>
					</article>
                    <?php } } ?>
				
				</div>
				<div class="col-md-3 padding-4">
					<div class="bubble-div text-center">
						<img src="<?php echo base_url()?>asisst/admin_asset/img/comment-bubble.png">
					</div>
				</div>
			</div>
		</div>