
<?php 
 
 

    
    
 $this->load->view('admin/all_secretary_view/email/main_tabs'); 
 
 
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
                                       <div class="avatar-name"><strong>اسم المرسل: </strong>
                                          <?= $message->email_from_n?>
                                       </div>
                                       <div><small><strong>العنوان: </strong> <?= $message->title?></small></div>
                                    </div>
                                    <div class="inbox-date text-right hidden-xs hidden-sm">
                                       <div><span class="bg-custom badge"><small>OPPORTUNITIES</small></span></div>
                                       <div><small><?= $message->date_ar; ?></small></div>
                                    </div>
                                 </div>
                                 <div class="inbox-mail-details p-20">
                                 <?= $message->content; ?>
                                    <div><strong>Regards,</strong></div>
                                    <div><strong>  <?= $message->email_from_n?></strong></div>
                                    <hr>
                                    <h4> <i class="fa fa-paperclip"></i> Attachments</h4>
                                    <div class="row">
                                       <div class="col-sm-2 col-xs-4">

                                  
                                       
                                          <?php   foreach ($files as $files) {        ?>
                                          <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url() ?>/uploads/images/<?= $files->file;?>"> 
                                          <?php

if (!empty($files->file) || $files->file!= 0 ) {
    $ext = pathinfo($files->file, PATHINFO_EXTENSION);

    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt','gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
   if (in_array($ext,$file)){
        ?>
        <a target="_blank" href="<?=base_url()."all_secretary/email/Emails/read_file/".$files->file?>">
            <i class="fa fa-eye" title=" قراءة"></i> </a>
        <?php
    }
    ?>

    <a href="<?=base_url()."all_secretary/email/Emails/download_file/".$files->file?>" download>
        <i class="fa fa-download " aria-hidden="true"></i> </a>

    <?php

}}
?>
                                         
                                       </div>
                                       
                                     
                                    </div>
                                    <div class="m-t-20 border-all p-20">
                                       <p class="p-b-20">click here to <a href="<?=base_url()."all_secretary/email/Emails/reply_message/".$message->id?>">Reply</a> or <a href="<?=base_url()."all_secretary/email/Emails/forward_message/".$message->id?>">Forward</a></p>
                                    </div>
                                 </div>
                              </div>



          </div>
                              </div>
                             
                              </div>

                              </div>
                             
                             </div>