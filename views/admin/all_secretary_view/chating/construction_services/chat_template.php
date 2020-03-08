<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<style>
	.fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
/*
 * Component: Direct Chat
 * ----------------------
 */
.direct-chat .box-body {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  position: relative;
  overflow-x: hidden;
  padding: 0;
}
.direct-chat.chat-pane-open .direct-chat-contacts {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
}
.direct-chat-messages {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
  padding: 10px;
  height: 320px;
  overflow: auto;
      border: 1px solid #b5b5b5;
    border-radius: 5px;
}
.direct-chat-msg,
.direct-chat-text {
  display: block;
}
.direct-chat-msg {
  margin-bottom: 10px;
}
.direct-chat-msg:before,
.direct-chat-msg:after {
  content: " ";
  display: table;
}
.direct-chat-msg:after {
  clear: both;
}
.direct-chat-msg:before,
.direct-chat-msg:after {
  content: " ";
  display: table;
}
.direct-chat-msg:after {
  clear: both;
}
.direct-chat-messages,
.direct-chat-contacts {
  -webkit-transition: -webkit-transform 0.5s ease-in-out;
  -moz-transition: -moz-transform 0.5s ease-in-out;
  -o-transition: -o-transform 0.5s ease-in-out;
  transition: transform 0.5s ease-in-out;
}
.direct-chat-text {
  border-radius: 5px;
  position: relative;
  padding: 5px 10px;
  background: #d2d6de;
  border: 1px solid #d2d6de;
  margin: 5px 0 0 50px;
  color: #444444;
}
.direct-chat-text:after,
.direct-chat-text:before {
  position: absolute;
  right: 100%;
  top: 15px;
  border: solid transparent;
  border-right-color: #d2d6de;
  content: ' ';
  height: 0;
  width: 0;
  pointer-events: none;
}
.direct-chat-text:after {
  border-width: 5px;
  margin-top: -5px;
}
.direct-chat-text:before {
  border-width: 6px;
  margin-top: -6px;
}
.right .direct-chat-text {
  margin-right: 50px;
  margin-left: 0;
}
.right .direct-chat-text:after,
.right .direct-chat-text:before {
  right: auto;
  left: 100%;
  border-right-color: transparent;
  border-left-color: #d2d6de;
}
.direct-chat-img {
  border-radius: 50%;
  float: left;
  width: 40px;
  height: 40px;
}
.right .direct-chat-img {
  float: right;
}
.direct-chat-info {
  display: block;
  margin-bottom: 2px;
  font-size: 12px;
}
.direct-chat-name {
  font-weight: 600;
}
.direct-chat-timestamp {
  color: #999;
}
.direct-chat-contacts-open .direct-chat-contacts {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
}
.direct-chat-contacts {
  -webkit-transform: translate(101%, 0);
  -ms-transform: translate(101%, 0);
  -o-transform: translate(101%, 0);
  transform: translate(101%, 0);
  position: absolute;
  top: 0;
  bottom: 0;
  height: 250px;
  width: 100%;
  background: #222d32;
  color: #fff;
  overflow: auto;
}
.contacts-list > li {
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  padding: 10px;
  margin: 0;
}
.contacts-list > li:before,
.contacts-list > li:after {
  content: " ";
  display: table;
}
.contacts-list > li:after {
  clear: both;
}
.contacts-list > li:before,
.contacts-list > li:after {
  content: " ";
  display: table;
}
.contacts-list > li:after {
  clear: both;
}
.contacts-list > li:last-of-type {
  border-bottom: none;
}
.contacts-list-img {
  border-radius: 50%;
  width: 40px;
  float: left;
}
.contacts-list-info {
  margin-left: 45px;
  color: #fff;
}
.contacts-list-name,
.contacts-list-status {
  display: block;
}
.contacts-list-name {
  font-weight: 600;
}
.contacts-list-status {
  font-size: 12px;
}
.contacts-list-date {
  color: #aaa;
  font-weight: normal;
}
.contacts-list-msg {
  color: #999;
}
.direct-chat-danger .right > .direct-chat-text {
  background: #dd4b39;
  border-color: #dd4b39;
  color: #ffffff;
}
.direct-chat-danger .right > .direct-chat-text:after,
.direct-chat-danger .right > .direct-chat-text:before {
  border-left-color: #dd4b39;
}
.direct-chat-primary .right > .direct-chat-text {
  background: #3c8dbc;
  border-color: #3c8dbc;
  color: #ffffff;
}
.direct-chat-primary .right > .direct-chat-text:after,
.direct-chat-primary .right > .direct-chat-text:before {
  border-left-color: #3c8dbc;
}
.direct-chat-warning .right > .direct-chat-text {
  background: #f39c12;
  border-color: #f39c12;
  color: #ffffff;
}
.direct-chat-warning .right > .direct-chat-text:after,
.direct-chat-warning .right > .direct-chat-text:before {
  border-left-color: #f39c12;
}
.direct-chat-info .right > .direct-chat-text {
  background: #00c0ef;
  border-color: #00c0ef;
  color: #ffffff;
}
.direct-chat-info .right > .direct-chat-text:after,
.direct-chat-info .right > .direct-chat-text:before {
  border-left-color: #00c0ef;
}
.direct-chat-success .right > .direct-chat-text {
  background: #00a65a;
  border-color: #00a65a;
  color: #ffffff;
}
.direct-chat-success .right > .direct-chat-text:after,
.direct-chat-success .right > .direct-chat-text:before {
  border-left-color: #00a65a;
}
/*
 * Component: Users List
 * ---------------------
 */
.users-list > li {
  width: 25%;
  float: left;
  padding: 0px;
  text-align: center;
}
.users-list > li img {
  border-radius: 50%;
  max-width: 100%;
  height: auto;
}
.users-list > li > a:hover,
.users-list > li > a:hover .users-list-name {
  color: #999;
}
.users-list-name,
.users-list-date {
  display: block;
}
.users-list-name {
  font-weight: 600;
  color: #444;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
.users-list-date {
  color: #999;
  font-size: 12px;
}
/*
 * Component: Carousel
 * -------------------
 */
.carousel-control.left,
.carousel-control.right {
  background-image: none;
}
.carousel-control > .fa {
  font-size: 40px;
  position: absolute;
  top: 50%;
  z-index: 5;
  display: inline-block;
  margin-top: -20px;
}
/*
 * Component: modal
 * ----------------
 */
.modal {
  background: rgba(0, 0, 0, 0.3);
}
.modal-content {
  border-radius: 0;
  -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
  border: 0;
}
@media (min-width: 768px) {
  .modal-content {
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
  }
}
.modal-header {
  border-bottom-color: #f4f4f4;
}
.modal-footer {
  border-top-color: #f4f4f4;
}
.modal-primary .modal-header,
.modal-primary .modal-footer {
  border-color: #307095;
}
.modal-warning .modal-header,
.modal-warning .modal-footer {
  border-color: #c87f0a;
}
.modal-info .modal-header,
.modal-info .modal-footer {
  border-color: #0097bc;
}
.modal-success .modal-header,
.modal-success .modal-footer {
  border-color: #00733e;
}
.modal-danger .modal-header,
.modal-danger .modal-footer {
  border-color: #c23321;
}
/*
 * Component: Social Widgets
 * -------------------------
 */
.box-widget {
  border: none;
  position: relative;
}
.widget-user .widget-user-header {
  padding: 20px;
  height: 120px;
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}
.widget-user .widget-user-username {
  margin-top: 0;
  margin-bottom: 5px;
  font-size: 25px;
  font-weight: 300;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}
.widget-user .widget-user-desc {
  margin-top: 0;
}
.widget-user .widget-user-image {
  position: absolute;
  top: 65px;
  left: 50%;
  margin-left: -45px;
}
.widget-user .widget-user-image > img {
  width: 90px;
  height: auto;
  border: 3px solid #fff;
}
.widget-user .box-footer {
  padding-top: 30px;
}
.widget-user-2 .widget-user-header {
  padding: 20px;
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}
.widget-user-2 .widget-user-username {
  margin-top: 5px;
  margin-bottom: 5px;
  font-size: 25px;
  font-weight: 300;
}
.widget-user-2 .widget-user-desc {
  margin-top: 0;
}
.widget-user-2 .widget-user-username,
.widget-user-2 .widget-user-desc {
  margin-left: 75px;
}
.widget-user-2 .widget-user-image > img {
  width: 65px;
  height: auto;
  float: left;
}
.treeview-menu {
  display: none;
  list-style: none;
  padding: 0;
  margin: 0;
  padding-left: 5px;
}
.treeview-menu .treeview-menu {
  padding-left: 20px;
}
.treeview-menu > li {
  margin: 0;
}
.treeview-menu > li > a {
  padding: 5px 5px 5px 15px;
  display: block;
  font-size: 14px;
}
.treeview-menu > li > a > .fa,
.treeview-menu > li > a > .glyphicon,
.treeview-menu > li > a > .ion {
  width: 20px;
}
.treeview-menu > li > a > .pull-right-container > .fa-angle-left,
.treeview-menu > li > a > .pull-right-container > .fa-angle-down,
.treeview-menu > li > a > .fa-angle-left,
.treeview-menu > li > a > .fa-angle-down {
  width: auto;
}
/*
 * Page: Mailbox
 * -------------
 */
.mailbox-messages > .table {
  margin: 0;
}
.mailbox-controls {
  padding: 5px;
}
.mailbox-controls.with-border {
  border-bottom: 1px solid #f4f4f4;
}
.mailbox-read-info {
  border-bottom: 1px solid #f4f4f4;
  padding: 10px;
}
.mailbox-read-info h3 {
  font-size: 20px;
  margin: 0;
}
.mailbox-read-info h5 {
  margin: 0;
  padding: 5px 0 0 0;
}
.mailbox-read-time {
  color: #999;
  font-size: 13px;
}
.mailbox-read-message {
  padding: 10px;
}
.mailbox-attachments li {
  float: left;
  width: 200px;
  border: 1px solid #eee;
  margin-bottom: 10px;
  margin-right: 10px;
}
.mailbox-attachment-name {
  font-weight: bold;
  color: #666;
}
.mailbox-attachment-icon,
.mailbox-attachment-info,
.mailbox-attachment-size {
  display: block;
}
.mailbox-attachment-info {
  padding: 10px;
  background: #f4f4f4;
}
.mailbox-attachment-size {
  color: #999;
  font-size: 12px;
}
.mailbox-attachment-icon {
  text-align: center;
  font-size: 65px;
  color: #666;
  padding: 20px 10px;
}
.mailbox-attachment-icon.has-img {
  padding: 0;
}
.mailbox-attachment-icon.has-img > img {
  max-width: 100%;
  height: auto;
}
/*
 * Page: Lock Screen
 * -----------------
 */
/* ADD THIS CLASS TO THE <BODY> TAG */
.lockscreen {
  background: #d2d6de;
}
.lockscreen-logo {
  font-size: 35px;
  text-align: center;
  margin-bottom: 25px;
  font-weight: 300;
}
.lockscreen-logo a {
  color: #444;
}
.lockscreen-wrapper {
  max-width: 400px;
  margin: 0 auto;
  margin-top: 10%;
}
/* User name [optional] */
.lockscreen .lockscreen-name {
  text-align: center;
  font-weight: 600;
}
/* Will contain the image and the sign in form */
.lockscreen-item {
  border-radius: 4px;
  padding: 0;
  background: #fff;
  position: relative;
  margin: 10px auto 30px auto;
  width: 290px;
}
/* User image */
.lockscreen-image {
  border-radius: 50%;
  position: absolute;
  left: -10px;
  top: -25px;
  background: #fff;
  padding: 5px;
  z-index: 10;
}
.lockscreen-image > img {
  border-radius: 50%;
  width: 70px;
  height: 70px;
}
/* Contains the password input and the login button */
.lockscreen-credentials {
  margin-left: 70px;
}
.lockscreen-credentials .form-control {
  border: 0;
}
.lockscreen-credentials .btn {
  background-color: #fff;
  border: 0;
  padding: 0 10px;
}
.lockscreen-footer {
  margin-top: 10px;
}
/*
 * Page: Login & Register
 * ----------------------
 */
.login-logo,
.register-logo {
  font-size: 35px;
  text-align: center;
  margin-bottom: 25px;
  font-weight: 300;
}
.login-logo a,
.register-logo a {
  color: #444;
}
.login-page,
.register-page {
  background: #d2d6de;
}
.login-box,
.register-box {
  width: 360px;
  margin: 7% auto;
}
@media (max-width: 768px) {
  .login-box,
  .register-box {
    width: 90%;
    margin-top: 20px;
  }
}
.login-box-body,
.register-box-body {
  background: #fff;
  padding: 20px;
  border-top: 0;
  color: #666;
}
.login-box-body .form-control-feedback,
.register-box-body .form-control-feedback {
  color: #777;
}
.login-box-msg,
.register-box-msg {
  margin: 0;
  text-align: center;
  padding: 0 20px 20px 20px;
}
.social-auth-links {
  margin: 10px 0;
}
/*
 * Page: 400 and 500 error pages
 * ------------------------------
 */
.error-page {
  width: 600px;
  margin: 20px auto 0 auto;
}
@media (max-width: 991px) {
  .error-page {
    width: 100%;
  }
}
.error-page > .headline {
  float: left;
  font-size: 100px;
  font-weight: 300;
}
@media (max-width: 991px) {
  .error-page > .headline {
    float: none;
    text-align: center;
  }
}
.error-page > .error-content {
  margin-left: 190px;
  display: block;
}
@media (max-width: 991px) {
  .error-page > .error-content {
    margin-left: 0;
  }
}
.error-page > .error-content > h3 {
  font-weight: 300;
  font-size: 25px;
}
@media (max-width: 991px) {
  .error-page > .error-content > h3 {
    text-align: center;
  }
}


.content {
    width: 100%;
    display: inline-block;
    min-height: 250px;
    margin-right: auto;
    margin-left: auto;
    padding: 0 30px 10px;
    overflow: hidden;

}


    #mail{
        text-align:center;
        margin:auto;
        padding:10px;
        position: inherit;

    }
    #mail .attachment .attach {
        border:2px solid #3c8dbc;
        padding:10px;
        width:80%;
        height:60px;
        background-color: white;

    }
    #mail .attachment .attach  p{
        color: #3c8dbc;
    }
    #mail .attachment .attach  .fa{
        color: #3c8dbc;
        font-size: large;
    }
    #mail .attachment .attach  .fa-download{
        color: white;
    }
    #mail .attachment .attach  .btn-dwonload{
        float: left;
        border-radius: 40%;
    }

</style>
 


<div class="wrapper">


<!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" > 
  
  <!-- Content Header (Page header) -->
  
   
  
  <!-- Main content -->
  
  <section class="" style="margin-top: -57px !important; ">
     <div class="row">
           

            
            <div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h6 class="box-title" id="ReciverName_txt" style="margin-right: 60px;color: black;
    font-weight: 600;">
                  <?=$chatTitle;?></h6>
<img src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="alatheer" title="alatheer" 
style="border-radius: 50%;height: 50px;width: 50px;margin-top: -70px;"/>
                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="content">
                     <!-- /.direct-chat-msg -->

                     <div id="dumppy"></div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
                    <div class="input-group">
                     <?php
						$obj=&get_instance();
						$obj->load->model('UserModel');
						$profile_url = $obj->UserModel->PictureUrl();
						$user=$obj->UserModel->GetUserData();
 					?>
                    	
                        <input type="hidden" id="Sender_Name" value="<?=$user['user_name'];?>">
                        <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">
                    	
                    	<input type="hidden" id="ReciverId_txt">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                      		<span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">ارسال</button>
                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                             <input type="file" name="file" class="upload_attachmentfile"/></div>
                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




            <div class="col-md-4" style="overflow-y: scroll; height: 450px;">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h6 class="box-title"><?=$strTitle;?></h6>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul style="list-style: none;" class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
						foreach($vendorslist as $v):
						?>
                        <li style="float: none;"  class="selectVendor" id="<?=$v['user_id'];?>"
                         value="<?=$v['picture_url'];?>" name="<?=$v['user_id_notifiy'];?>"  title="<?=$v['user_name'];?>">
                                        <!--users-list-name-->
                           <span id="tot-prod_chat<?=$v['user_id_notifiy'];?>" class="badge ui-li" style="color: white;
    background-color: #e60f45;
    font-size: 10px;
    border-radius: 5px;
    padding: 6px 7px;
    position: absolute;
    /* left: 0; */
    /* top: 0;"></span>
                         <p style="width: 215px;margin-right: 70px;text-align: right;color: black;
    font-weight: 600;" class="" href="#"><?=$v['user_name'];?></p>
                          <img src="<?=$v['picture_url'];?>" alt="<?=$v['user_name'];?>"
                          style="border-radius: 50%;height: 50px;width: 50px;margin-top: -50px;"
                           title="<?=$v['user_name'];?>"/>
                           

 
                      
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php endforeach;?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">لايوجد مستخدميت...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
    
    
    
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper --> 

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
<!-- Modal -->
 

  
  
    <!-- Control Sidebar -->
   <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->
  
  
  
  
  
  <!-- jQuery 3 -->
<script src="<?=base_url('public')?>/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('public')?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
 <?php if($this->uri->segment(1) != 'chat'){?>
<script src="<?=base_url('public')?>/components/PACE/pace.min.js"></script>
 <?php }?>
<!-- SlimScroll -->
<script src="<?=base_url('public')?>/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('public')?>/components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('public')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('public')?>/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  <?php if($this->uri->segment(1) != 'chat'){?>
  $(document).ajaxStart(function () {
    Pace.restart();
  });
  <?php }?>
</script>
<script src="<?=base_url('public/chat/chat.js');?>"></script> 
 
<script>

    $(document).ready(function () {
        // Looping through all image elements
        $("img").each(function () {
            var element = $(this);

            $.ajax({
                url: $(this).attr('src'),
                type: 'get',
                async: false,
                error: function (response) {

                    var replace_src = "<?=base_url()?>asisst/fav/apple-icon-120x120.png";
                    // Again check the default image
                    $.ajax({
                        url: replace_src,
                        type: 'get',
                        async: false,
                        success: function () {
                            $(element).attr('src', replace_src);
                        },
                        error: function (response) {
                            $(element).hide();
                        }
                    });
                }
            });
        });
    });
</script>