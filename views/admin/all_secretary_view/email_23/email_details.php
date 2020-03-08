<div class="col-xs-12 col-sm-12 col-md-12 no-padding inbox-mail">
	 <div class="mailbox-content">
	 <?php
	 
	 if(isset($my_email)&&!empty($my_email)){
		 foreach($my_email as $row){
			 if($row->readed==0)
			{
				$unread='unread';
			}
			else{
				$unread='';
			}
			if($_SESSION['role_id_fk']==1)
			{
				 $x=$_SESSION['user_id'];
			}
			else
			{
				$x=$_SESSION['emp_code'];
			}
		 if($row->email_to_id==$x || $row->email_etlaa_id==$x || $row->email_motbaa_id==$x){
		
			?>
			
	
		<a href="<?=base_url()."all_secretary/email/Emails/message_details/". $row->id?>" class="inbox_item <?= $unread?>">
		   <div class="inbox-avatar">
			
			  <img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png" class="border-green hidden-xs hidden-sm" alt="">
			  <div class="inbox-avatar-text">
				 <div class="avatar-name"><?= 
				 
				 
				 $row->email_from_n ;?></div>
				 <div><small><span class="bg-green badge avatar-text"><?= $row->title ;?></span><span><span><?= $row->content ;?></span></span></small></div>
			  </div>
			  <div class="inbox-date hidden-sm hidden-xs hidden-md" style="color: #44433e;">
				 <div class="date"><?= $row->date_ar;?></div>
			
			  </div>
			 
		   </div>
		</a>
		<div class="btn-group" role="group" aria-label="..." style="float: left;
    margin-top: -124px;
    margin-left: 29px;
    ">
                                <button type="button" class="btn btn-default" style="margin-top: 61px;"  onclick='delete_message(<?= $row->id?>)'> <i class="fa fa-trash"> </i></button>
								<a href="<?=base_url()."all_secretary/email/Emails/reply_message/".$row->id?>" class="btn btn-default" style="margin-top: 61px;"   <i class="fa fa-reply"> الرد</i></a>
                                <a href="<?=base_url()."all_secretary/email/Emails/forward_message/".$row->id?>" class="btn btn-default" style="margin-top: 61px;"   <i class="fa fa-share" >المشاركه </i></a>
                                       </div>
		<?php	} }}?>
	
		
		
		
		
		
		
		
		
		
	 </div>
	</div>