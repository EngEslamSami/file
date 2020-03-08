
<?php
            if (isset($message) && !empty($message)) {
                $to_user_id=$message->to_user_id;
                //$to_user_name=$message->to_user_name;
                $to_edara_id=$message->to_edara_id;
               // $to_edara_name=$message->to_edara_name;
                $msg_type=$message->msg_type;
                $to_qsm_id=$message->to_qsm_id;
              //  $to_qsm_name=$message->to_qsm_name;
                $content=$message->content;
                $start_time=$message->start_time;
                $moda=$message->moda;
                $disabled='';
                $disableled_btn='disabled';
              
              
              } else {
                  $disabled='disabled';
                  $disableled_btn='';
                $to_user_id='';
               // $to_user_name='';
                $to_edara_id='';
               // $to_edara_name='';
                $msg_type='';
               
                $to_qsm_id='';
               // $to_qsm_name='';
                $content='';
                $start_time='';
                $moda='';
                }
            
            if($this->uri->segment(6)){
             echo form_open_multipart('human_resources/attendance/attendance_messages/Attend_messages/update_private_message/'.$this->uri->segment(6).'');
            }else{
                echo form_open_multipart('human_resources/attendance/attendance_messages/Attend_messages/send_privte_message');
            }
                     ?>
<?php 
   
$this->load->view('admin/Human_resources/attendance/attendance_messages/main_tabs'); 


?>


<div class="col-md-10 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> <?= $title?> </h3>
                </div>
              
                <div class="panel-body " style="background-color: #fff;">
                    <div class="col-sm-9 padding-4">


 




                       <div class="form-group col-sm-8 no-padding">
                         <label class="label">الموظف</label>
                        
                         <input type="text" class="form-control"
                         placeholder=" حدد المستخدم " type="text" style="width: 88%;float: right;"
                                   name="to_user_n" id="to_user_n"  
                                   readonly="readonly"
                                  

                                 

                                   value="<?php if(isset($to_user_name)&&!empty($to_user_name)) {
                                       echo $to_user_name; }?>">
                                 
            
                                   <input type="hidden" name="msg_type" id="msg_type" value="<?= $msg_type?>">
                                  
          
                        

                            <button type="button" <?= $disableled_btn?>
                                    onclick="$('#tahwelModal_emp').modal('show');  load_tahwel();"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>
                        
                        
                       </div>
                       
                       <div class="form-group col-sm-2 padding-4">
                         <label class="label"> وقت البدء</label>
                         <input placeholder="من" id="m13h" class="form-control" type="text"
                                           required="required" name="start_time" 
                                           
                                           value="<?php if (isset($start_time)) {
                                               echo $start_time;
                                           } else {
                                               echo "من";
                                           } ?>"
                                           data-validation="required"
                                          >
                         <!-- <input type="time" class="form-control"   name="start_time" data-validation="required"   id="start_time" value="<?= $start_time?>"> -->
                       
                       </div>

                       <div class="form-group col-sm-2 padding-4">
                         <label class="label">  مده عرض الرساله</label>
                         <input type="number" class="form-control"   name="moda" id="moda" data-validation="required"   value="<?= $moda?>"> 
                       
                       </div>
                       


                     
                       <div class="form-group col-sm-12 padding-4">
                         <label class="label">محتوي الرساله</label>
                         <textarea class="form-control" placeholder=""  data-validation="required"   name="content"
                        
                         ><?= $content?></textarea>
                       </div>

                       
                     
                       
                       <div class="col-xs-2">
                              
                              <button type="submit"  style="float: right;"  <?=$disabled?> class="btn btn-purple btn-info" ><li class="fa fa-envelope-o"> ارسال</li></button>
                         
                          </div>
                       
                    </div>
              
                    <div class="col-sm-3 padding-4">
                    
                       <h5>قائمة المستلمين</h5>
                       <?php
            if (!isset($message)&&empty($message)) {?>
                       <div class="alert alert-danger"  id="text111" style="display:none; color: #BD000A; display:block;"
                       >
                     
                       قم بإضافة شخص لإستلام رسالتك <br /> يمكنك إضافة أكثر من شخص  
                      
                       </div>
                       <?php }?>
                      
                       <div  class="recived-names">
                         <ol >
                         <?php
            if (isset($to_user_name)&&!empty($to_user_name)) {?>
                         <li><?=$to_user_name?>   </li> <?php }?>
                           
                           
                     
                            
                         </ol>
                     </div>
                    </div>
         
                    
                    
                   
                    
                            
                </div>


             </div>   
         
     </div>
</div>
</form>
<div class="modal fade"  id="tahwelModal_emp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">   الموظف</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-xs-12" id="tawel_result_emp" style="display: none;">



                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    function load_tahwel() {
       // $("li").remove();
        $('#tawel_result_emp').show();
        var type = 2;
      //  alert(type);
       

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/attendance/attendance_messages/Attend_messages/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#tawel_result_emp').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {

                $("#tawel_result_emp").html(html);
            }
        });
    }
</script>

<script>

       
    
    function GettahwelName(emp_name,emp_id,emp_code,edara_name,edara_id,qsm_name,qsm_id) {

 
        var checkBox = document.getElementById("myCheck"+emp_id);
       // var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
  if (checkBox.checked == true){
    $('#text111').hide();
    $('#msg_type').val(2);
    $('.btn-purple').removeAttr('disabled');
   $("ol").append("<li name='li' id='"+emp_id+"'>"+emp_name+"</li>");
 $('#to_user_n').append("<input type='hidden' id='id"+emp_id+"'  name='to_user_id[]' value='"+emp_id+"'/>"+
 "<input type='hidden'   id='n"+emp_id+"' name='to_user_name[]' value='"+emp_name+"'/><input type='hidden'   id='to_edara_id"+emp_id+"' name='to_edara_id[]' value='"+edara_id+"'/>"+
 "<input type='hidden'   id='to_edara_name"+emp_id+"' name='to_edara_name[]' value='"+edara_name+"'/><input type='hidden'   id='to_qsm_id"+emp_id+"' name='to_qsm_id[]' value='"+qsm_id+"'/>"+
 "<input type='hidden'   id='to_qsm_name"+emp_id+"' name='to_qsm_name[]' value='"+qsm_name+"'/><input type='hidden'   id='emp_code"+emp_id+"' name='emp_code[]' value='"+emp_code+"'/>");
    //$('#to_user_fk').val(id);
   //  $('#to_user_n').append(name);
   
  } else {
    $("#"+emp_id).remove();
    $("#id"+emp_id).remove();
    $("#n"+emp_id).remove();
    $("#emp_code"+emp_id).remove();
    $("#to_edara_id"+emp_id).remove();

    $("#to_edara_name"+emp_id).remove();
    $("#to_qsm_id"+emp_id).remove();
    $("#to_qsm_name"+emp_id).remove();
    
    if(checkBox=='')
    {
    $('#text111').show();}
  
  }
     
       
    }


    

    
</script>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/analogue-time-picker.js"></script>

<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
</script>

