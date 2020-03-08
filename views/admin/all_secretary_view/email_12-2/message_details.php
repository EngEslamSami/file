
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
                                          <?php if(isset($message->email_from_n)&&!empty($message->email_from_n)){echo  $message->email_from_n;}?>
                                       </div>
                                       <div><small><strong>العنوان: </strong> <?php if(isset($message->title)&&!empty($message->title)){echo  $message->title;}?></small></div>
                                    </div>
                                    <div class="inbox-date text-right hidden-xs hidden-sm">
                                   
                                       <div><small><?php if(isset($message->date_ar)&&!empty($message->date_ar)){echo $message->date_ar; }?></small></div>
                                    </div>
                                 </div>
                                 <div class="inbox-mail-details p-20">
                                 <?php if(isset($message->content)&&!empty($message->content)){echo $message->content;} ?>
                                    <div><strong>تحياتي,</strong></div>
                                    <div><strong>  <?php if(isset($message->email_from_n)&&!empty($message->email_from_n)){echo $message->email_from_n;}?></strong></div>
                                    <hr>
                                    <h4> <i class="fa fa-paperclip"></i> المرفقات</h4>
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
                                    <?php if(isset($message->need_replay)&&!empty($message->need_replay)&&$message->need_replay==1){?>
                                       <p class="p-b-20">اضغط هنا <a href="<?=base_url()."all_secretary/email/Emails/reply_message/".$message->id?>">للرد</a> or <a href="<?=base_url()."all_secretary/email/Emails/forward_message/".$message->id?>">المشاركه</a></p>
                                       <?php }?>
                                    </div>
                                 </div>
                              </div>



          </div>
                              </div>
                             
                              </div>

                              </div>
                             
                             </div>