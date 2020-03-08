<?php
            if (isset($message) && !empty($message)) {
                $to_edara_id=$message->to_edara_id;
               // $to_edara_name=$message->to_edara_name;
               // $geha_type_name=$result->gha_type_fk;
                $to_qsm_id=$message->to_qsm_id;
               // $to_qsm_name=$message->to_qsm_name;
                $content=$message->content;
                $start_time=$message->start_time;
                $moda=$message->moda;
              
              
              
              } else {
                $to_edara_id='';
               // $to_edara_name='';
               // $geha_type_name=$result->gha_type_fk;
                $to_qsm_id='';
               // $to_qsm_name='';
                $content='';
                $start_time='';
                $moda='';
                }
            
            if($this->uri->segment(6)){
             echo form_open_multipart('human_resources/attendance/attendance_messages/Attend_messages/update_public_message/'.$this->uri->segment(6).'');
            }else{
                echo form_open_multipart('human_resources/attendance/attendance_messages/Attend_messages/send_public_message');
            }
                     ?>

<?php 
   
$this->load->view('admin/Human_resources/attendance/attendance_messages/main_tabs'); 


?>


<div class="col-md-10 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i>  <?= $title?> </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">
                    <div class="col-sm-12 padding-4">
                       <div class="form-group col-sm-4 no-padding">
                         <label class="label">الاداره</label>
                        
                         <input type="text" class="form-control"
                         placeholder=" حدد المرسل اليه" type="text" style="width: 88%;float: right;"
                                   name="to_edara_name" id="to_edara_name"  
                                   readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "
                                   onclick="load_tahwel()"
                                 

                                   value="" data-validation="required"  >
                        
                            <input type="hidden" name="msg_type" id="msg_type" value="1">
                            <input type="hidden" name="to_edara_id" id="to_edara_id" value="<?= $to_edara_id ?>">

                            <button type="button" 
                                    onclick="$('#tahwelModal').modal('show'); load_tahwel();"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>
                        
                        
                       </div>
                       <div class="form-group col-sm-4 padding-4">
                         <label class="label">القسم</label>
                         <input  class="form-control"
                          type="text"    readonly="readonly"
                                   name="to_qsm_name" id="to_qsm_name"  
    
                                   value="" data-validation="required"  >
                       
                                   <input type="hidden" name="to_qsm_id" id="to_qsm_id" value="<?= $to_qsm_id ?>">
                       
                       
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
                         <input type="number" class="form-control"   name="moda" id="moda" data-validation="required"   value="<?= $moda ?>"> 
                       
                       </div>

                     
                       <div class="form-group col-sm-12 padding-4">
                         <label class="label">محتوي الرساله</label>
                         <textarea class="form-control" placeholder=""  data-validation="required"   name="content"
                        
                         ><?= $content ?></textarea>
                       </div>

                       
                       
                       
                       
                      
                       
                    </div>
                    
                    
                   
                    
                            <div class="col-xs-2">
                              
                                <button type="submit" name="add" style="float: right;"   class="btn btn-success" ><li class="fa fa-envelope-o"> ارسال</li></button>
                           
                            </div>
                </div>
             </div>   
         
     </div>
</div>
</form>
<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">   الاداره-القسم</h4>
            </div>
            <div class="modal-body">
              

                <div class="col-xs-12" id="tawel_result" style="display: none;">



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
        $('#tawel_result').show();
        var type = $('#msg_type').val();
      //  alert(type);
        $('#tahwel_type').val(type);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/attendance/attendance_messages/Attend_messages/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#tawel_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {

                $("#tawel_result").html(html);
            }
        });
    }
</script>

<script>

       
    
    function GettahwelName(emp_name,emp_id,emp_code,edara_name,edara_id,qsm_name,qsm_id) {


     
        
        $('#to_edara_name').val(edara_name);
        $('#to_edara_id').val(edara_id);
        $('#to_qsm_name').val(qsm_name);
        $('#to_qsm_id').val(qsm_id);
        $('#msg_type').val(1);
        
        $('#tahwelModal').modal('hide');
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