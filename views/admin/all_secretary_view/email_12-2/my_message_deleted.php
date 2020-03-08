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
 
 

    
    
$this->load->view('admin/all_secretary_view/email/main_tabs'); 


?>

<div class="col-md-10 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> رسائل محذوفه  </h3>
                </div>
				<div class="panel-body " style="background-color: #fff;">
				<div id="details">
				<div class="col-xs-12 col-sm-12 col-md-12 no-padding inbox-mail">
				
	 <div class="mailbox-content" id="mail_content">
		<!-- email content ajax-->
	 </div>
	 
	</div>
	</div>
             </div>   
         </div>
		 </div>
     </div>
</div>

   
 <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
		
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/my_email_data_js' ,
			data:{type:2},
            dataType: 'html',
            cache: false,
			beforeSend: function () {
				$('#mail_content').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');   
            },
            success: function (html) {
			    $('#mail_content').html(html);
			}
		
        });
    
    });
</script>

<script>
    function get_details(id) {
       
       
     
 

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/get_details' ,
            data: {id:id},
            dataType: 'html',
            cache: false,
            success: function (html) {
$('#details').html(html);
		
            }
		
        });
    }
</script>
<script>
    function delete_message(id) {
       
       
     
 

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/delete_message' ,
            data: {id:id},
            dataType: 'html',
            cache: false,
            success: function (html) {
				get_details(id);
				swal({
    title: " تمت الحذف بنجاح ",
    type: "success",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
            }
	
        });
    }
</script>

