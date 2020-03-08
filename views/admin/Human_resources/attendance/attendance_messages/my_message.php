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

     <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
    <thead>
    <tr class="greentd">
        <th style="text-align: center !important;">م</th>
        <th style="text-align: center !important;"> وقت البدء</th>
        <th style="text-align: center !important;">  مده عرض الرساله(دقيقه)</th>
        <th style="text-align: center !important;">محتوي الرساله</th>
        <th style="text-align: center !important;"> الرقم الشخصي</th>
        <th style="text-align: center !important;">العمليات</th>
        <th style="text-align: center !important;">عرض الرساله</th>




    </tr>
    </thead>
    <tbody >
	 <?php
	 
	 if(isset($my_messages)&&!empty($my_messages)){
        $x = 1;
		 foreach($my_messages as $row){
          
			
			

		
			?>
			
            <tr>
	
		
		  
			  <td>
              <?= $x;?>
              </td>
              
              
              <td>
			
		<?= $row->start_time;?>
			
			  
              </td>
              <td>
		
				 <?= $row->moda;?>
			
			  
              </td>
              
              <td>
            
			
				<?= $row->content ;?>
			 
              </td>
              
                
              <td>
            
			
				<?= $row->to_user_emp_code ;?>
			 
              </td>
			 
		   
	
        <td>

        <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'human_resources/attendance/attendance_messages/Attend_messages/edite_message/' . $row->id?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
<a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/attendance/attendance_messages/Attend_messages/delete_message/' . $row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
    </td>
    <td>
             <a onclick=' swal({
        title: "جاري فتح الرساله",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "نعم",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'human_resources/attendance/attendance_messages/Attend_messages/message_details/' . $row->id?>";
        });'>
    <i class="fa fa-eye"> </i></a>             
                                <!-- <button type="button" class="btn btn-default" style="margin-top: 61px;"  onclick='delete_message_sent(<?= $row->id?>)'> <i class="fa fa-trash"> </i></button>
								<a href="<?=base_url()."human_resources/attendance/attendance_messages/Attend_messages/edite_message/".$row->id ?>" style="margin-top: 61px;"   <i class="fa fa-edite" aria-hidden="true">تعديل </i></a>
                                <a href="<?=base_url()."human_resources/attendance/attendance_messages/Attend_messages/message_details/". $row->id?>" style="margin-top: 61px;" <i class="fa fa-archive" aria-hidden="true">قراءه </i>	</a> -->
                          
                            </td>

                            </tr>
		<?php $x++;	 }}?>
	
		
		
        </tbody>
</table>
		
		
		
		
		
		
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


