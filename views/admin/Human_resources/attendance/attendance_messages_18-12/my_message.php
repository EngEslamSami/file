<style>
/*********** upload malti img ****/

.block {
    background-color: rgba(255, 255, 255, 0.5);
    margin: 0 auto;
    margin-bottom: 30px;
    text-align: center;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

label.button {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background-color: #c72530;
    border: 1px solid #eee;
    color: #fff;
    padding: 7px 15px;
    margin: 5px 0;
    display: inline-block;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}

label.button:hover {
    color: #c72530;
    background-color: #fff;
    border: 1px solid #ccc;
    cursor: pointer;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}

input#images {
    display: none;
}

#multiple-file-preview {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}

#files1 {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}

#sortable {
    list-style-type: none;
    margin: 0;
    padding: 0;
    min-height: 110px;
}

#sortable li {
    margin: 3px 3px 3px 0;
    float: left;
    width: 100px;
    height: 104px;
    text-align: center;
    position: relative;
    background-color: #FFFFFF;
}

#sortable li,
#sortable li img {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

#sortable img {
    height: 104px;
}

.closebtn {   
    color: #c72530;
    font-weight: bold;
    position: absolute;
    right: -1px;
    border-radius: 4px;
    padding: 0px 5px 0px 5px;
    background-color: #fff;
}
.closebtn h6{
    font-size: 20px;
    margin: 0;
    
}

.r-img-message h2 {
    padding-top: 4px;
}

.r-img-message img {
    width: 100%;
    height: 75px;
    border-radius: 5px;
    margin-top: 20px;
    margin-bottom: 20px;
}
.unread{
	background: #c7c7c7;
}

</style> 
<?php 
 
 

    
    
 $this->load->view('admin/Human_resources/attendance/attendance_messages/main_tabs'); 


?>

<div class="col-md-10 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> رسائل المرسله  </h3>
                </div>
				<div class="panel-body " style="background-color: #fff;">
				<div id="details_message">
				<div class="col-xs-12 col-sm-12 col-md-12 no-padding inbox-mail">
	 <div class="mailbox-content">
	 <?php
	 
	 if(isset($my_messages)&&!empty($my_messages)){
		 foreach($my_messages as $row){
			
			

		
			?>
			
	
		<a href="<?=base_url()."human_resources/attendance/attendance_messages/Attend_messages/message_details/". $row->id?>" class="inbox_item ">
		   <div class="inbox-avatar">
			
			  <img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png" class="border-green hidden-xs hidden-sm" alt="">
			  <div class="inbox-avatar-text">
				 <div class="avatar-name"><?php 
				 
                 if($row->msg_type==1)
                 {
                    echo $row->to_qsm_name;
                 }
                 else if($row->msg_type==2)
                 {
				echo $row->to_user_name ;} ?></div>
				 <div><small><span><span><?= $row->content ;?></span></span></small></div>
			  </div>
			  <div class="inbox-date hidden-sm hidden-xs hidden-md" style="color: #44433e;">
				 <div class="date"><?= $row->date_ar;?></div>
			
			  </div>
			 
		   </div>
		</a>
		<div class="btn-group" role="group" aria-label="..." style="float: left;
    margin-top: -100px;
    margin-left: 14px;
    ">
                                <button type="button" class="btn btn-default" style="margin-top: 61px;"  onclick='delete_message_sent(<?= $row->id?>)'> <i class="fa fa-trash"> </i></button>
								<a href="<?=base_url()."human_resources/attendance/attendance_messages/Attend_messages/edite_message/".$row->id ."/".$row->msg_type?>" class="btn btn-default" style="margin-top: 61px;"   <i class="fa fa-reply" aria-hidden="true">تعديل </i></a>
                                
                                       </div>
		<?php	 }}?>
	
		
		
		
		
		
		
		
		
		
	 </div>
	</div>
	</div>
             </div>   
         </div>
		 </div>
     </div>
</div>

<script>
    function delete_message_sent(id) {
       
       
     
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/attendance/attendance_messages/Attend_messages/delete_message' ,
            data: {id:id},
            dataType: 'html',
            cache: false,
            success: function (html) {
				//get_details_message(id);
                window.location.reload(); 
            }
	
        });
        }
    }
</script>


