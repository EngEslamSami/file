
<?php 
 
 

    
    
 $this->load->view('admin/Human_resources/attendance/attendance_messages/main_tabs'); 
 
 
 ?>
 
 <div class="col-md-10 padding-4">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                 <div class="panel-heading">
                     <h3 class="panel-title"><i class="fa fa-plus-square"></i> تفاصيل الرساله </h3>
                 </div>
            <div class="panel-body " style="background-color: #fff;">
                              <div class="col-xs-12 col-sm-10 col-md-10 no-padding inbox-mail">
                                 <div class="inbox-avatar p-20 border-btm">
                                    <img src="img/avatar5.png" class="border-green hidden-xs hidden-sm" alt="">
                                    <div class="inbox-avatar-text">
                                       <div class="avatar-name"><strong>اسم الراسل: </strong>
                                          <?= $message->from_user_name?>
                                       </div>
                                       <div class="avatar-name"><strong>اسم المرسل اليه: </strong>
                                          <?= $message->to_user_name?>
                                       </div>
                                      
                                    </div>
                                    <div class="inbox-date text-right hidden-xs hidden-sm">
                                       <div><span class="bg-custom badge"><?= $message->date_ar; ?></span></div>
                                    
                                    </div>
                                 </div>
                                 <div class="inbox-mail-details p-20">
                                 <?= $message->content; ?>
                                    <div><strong>تحياتي,</strong></div>
                                    <div><strong>  <?= $message->from_user_name?></strong></div>
                                    <hr>
                                   
                                    
                                   
                                 </div>
                              </div>



          </div>
                              </div>
                             
                              </div>

                              </div>
                             
                             </div>