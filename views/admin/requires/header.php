<!DOCTYPE html>
<html>

<head>
<meta name="google-site-verification" content="QbCxI_kwwybT2rIwhSKDbmmAc7mIsVYUth9IaZMZ4pc" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php if(isset($title) && $title !=null && !empty($title)){echo $title ; }else { 
        echo " نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء";} ?></title>
    <meta name="description" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />
    <meta name="keywords" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />
    <meta name="author" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />


    
     <?php if(isset($maps)) {  ?>
        <script type="text/javascript">
          var centreGot = false;
                   </script>
      <?php  echo $maps['js']; ?>
      <?php  } ?>
      
      <!----- nas --->
      <script src="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.js"></script>
      <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.css">
      <!-------------------->
      
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()."asisst/fav/"?>favicon-16x16.png">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-select.min.css">
     <link href="<?php echo base_url()?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.css"
      rel="stylesheet" type="text/css"/>
  
    <link href="<?php echo base_url()?>asisst/admin_asset/css/jquery-ui.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <!--
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome-animation.min.css">
-->
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/lobipanel.min.css">

<!---------------------------------------------------------->
<link href="<?=base_url().'asisst/admin_asset/'?>plugins/icheck/skins/all.css" rel="stylesheet" type="text/css"/>
<!----------------------------------------------------------->

   <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/plugins/fileinput/css/fileinput.css">

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/datepicker.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/ckeditor/samples/css/samples.css">

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/table.css">

    <link href="<?php echo base_url();?>asisst/admin_asset/datepicker/css/bootstrap-datetimepicker.min.css" media="all" rel="stylesheet" />

    <!--------------------------------------------- calander -------------------------------------------------------------->
    <?php if(isset($footer_calender)){?>
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>plugins/calendar/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>plugins/calendar/css/fullcalendar.min.css" />
    <?php }?>
    <!--------------------------------------------- calander -------------------------------------------------------------->
     <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/calendar.css">
    
    
     <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/modal.css">
    
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/animate.css">

<!--
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asisst/admin_asset/datepicker/css/jquery.calendars.picker.css" />
    -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/stylecrm.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/responsive.css">
    <link type="text/css" rel="stylesheet" media="all" href="..."  id="test-css"/>

    <link href="<?php echo base_url()?>asisst/admin_asset/css/mdtimepicker.css" rel="stylesheet" type="text/css">
    <style>
      .name_of_charity {
        color: #0060b3;
        font-size: 16px;
        text-align: center;
        /*line-height: 25px;*/
      
        padding: 0px 0px;
        margin-top: 0px;
        border-radius: 5px
      }

      .name_of_charity img {
        float: right;
            height: 70px;
      }
      .name_of_vision img {
            float: right;
            height: 60px;
            margin-top: 3px;
            margin-right: 20px;
            border-right: 1px solid #fff;
            padding-right: 20px;
        }
      .name_of_charity p{
        float: right;
        margin-bottom: 0;
        font-size: 16px;
      }
     .navbar .nav-tabs>li.active>a, 
     .navbar  .nav-tabs>li.active>a:hover, 
     .navbar  .nav-tabs>li.active>a:focus, 
     .navbar  .nav>li>a:hover,.navbar .nav>li>a:focus {
            background-color: transparent;
            color: #002542;
            border-bottom-color: transparent;
        }
        .navbar-nav.navbar-right button {
            background-color: transparent;
            border: 0;
            color: #002542;
            font-size: 16px;
        }
        .navbar-nav.navbar-right button a{
             font-size: 16px;
        }
        
        .navbar-nav > li > a.home-icon{
             margin-top: 16px;
            margin-left: 20px;
            width: 100px;
            overflow: hidden;
            padding: 0 !important;
            margin-right: 10px;
            
        }
        .navbar-nav > li > a.home-icon span {
            color: #fff;
            margin-right: -48px;
            transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
        }
        .navbar-nav > li > a.home-icon i{
            border-radius: 0;
            font-weight: 500; 
            color:#fff;
            background-color: #2d2b2b;
        }
        .navbar-nav > li > a.home-icon:hover span,
        .navbar-nav > li > a.home-icon:focus span{
            margin-right: 0px;
        }
        
        .dropdown-menu>li>a.sign-out-btn:hover,
        .dropdown-menu>li>a.sign-out-btn:focus{
            background-image: none;
            background-color: #e7575e;
             border-color: #BF2D35;
        }
        
        .main-header .full-screen {
            position: relative;
            /* left: 0px; */
            background-image: none;
            padding: 17px 2px;
            font-size: 26px;
            line-height: 10px;
            /* margin-right: 7px; */
            color: #002542;
            cursor: pointer;
        }
        .main-header .full-screen i{
            background-color: transparent;
            border-radius: 0;
            font-size: 24px;
             font-weight: 500;
             
        }


    </style>
    <style>
  
    .clock {
        display: inline-block;
        color: #fff;
        font-size: 20px;
        font-family: Orbitron;
        font-weight: bold;
        /* background-color: #59b447; */
        padding: 5px;
        margin: 12px 20px 0 0;
        border-radius: 5px;
        /* box-shadow: -2px 2px 3px #fff; */
        border: 1px solid;
    }
    #MyClockDisplay{
    letter-spacing: 7px;
        margin-left: 14px;
        float: right;
  }
  .pray {
 
      border-radius: 5px!important;
    padding: 4px 6px 0 6px!important;
    margin-left: 15px;
    position: absolute !important;
    top: -15px;
  }
  .pray a{
    color: #fff!important;
    font-weight: 500;
  }
  .pray a i{
    display: block;
    font-weight: 500 !important;
    margin: auto;
     background-color: transparent!important;
     color: #fff;
    
    
  }
  .w3-teal h3{
    font-size: 16px;
  }
  
  .btn-email {
    position: fixed;
    bottom: 45px;
    left: 54px;
    z-index: 999;
    background-color: #097580;
    color: #fff;
    padding: 5px 10px;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
}
    </style>
<?php date_default_timezone_set('Asia/Riyadh'); ?>
</head>





    <body class="hold-transition sidebar-mini  sidebar-collapse sidebar-open pace-done">
     <div class="wrapper">
        <header class="main-header">
   <!--      <a href="<?php echo base_url()?>dash" class="logo">

     <span class="logo-mini">
  
                    	  <?php $img ='';if(isset($_SESSION['main_data_info']->logo)){$img = $_SESSION['main_data_info']->logo;} ?>
	<img src="<?php echo base_url()."uploads/images/".$img?>"
		 onerror="this.src='<?php echo base_url()."asisst/admin_asset/img/logo-atheer.png"?>'"
		 alt="" class="center-block" />
       </span>
     

       
   </a>
-->

   <nav class="navbar navbar-static-top" style="background-color:#2d2b2b !important ;">
    <!--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
     <span class="sr-only">Toggle navigation</span>
     <span class="pe-7s-angle-left-circle"></span>
    </a>-->

 <div class="navbar-custom-menu">
 
 
     <ul class="nav navbar-nav col-sm-8 "> 
     <li><a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
     <!--<span class="sr-only">Toggle navigation</span>--> 
     <span  class="fa fa-bars"></span>
        </a></li>
     <li><a onclick="requestFullScreen()" class="full-screen"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
     <li> <a href="<?php echo base_url()?>dash" class="home-icon">
            <i  class="fa fa-home" style=""></i>
                <span>الرئيسية</span></a>
           </li>
          
        <li class="name_of_charity"> 
         <img src="<?php echo base_url()?>asisst/admin_asset/img/sympol2.png" alt="">
         
        </li>
        <li class="name_of_vision"> 
         <img src="<?php echo base_url()?>asisst/admin_asset/header/Saudi_Vision_2030_logo.png" alt="">
         
        </li>
        <li>
        <div class="clock">
             <div id="MyClockDisplay"  onload="showTime()"> </div><span id="session-name"></span>
        </div>
        
        </li>
    </ul>
 
 
 
 
 
 
 
 
 
 
 <style>
 

#nav-container {
  position: relative;
  
}
#nav-container .bg {
  position: absolute;
  top: 70px;
  left: 0;
  width: 100%;
  height: calc(100% - 70px);
  visibility: hidden;
  opacity: 0;
  transition: .3s;
  background: #000;
}
#nav-container:focus-within .bg {
  visibility: visible;
  opacity: .6;
}
#nav-container * {
  visibility: visible;
}

.button-notify {
  position: relative;
 outline: none;
  z-index: 1;
  -webkit-appearance: none;
  border: 0;
  background: transparent;
  border-radius: 0;
  height: auto;
  width: 30px;
  cursor: pointer;
  pointer-events: auto;
  margin-left: 25px;
  touch-action: manipulation;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
}
.button-notify i{
    color: #fff;
    font-size: 25px;
}
.icon-bar {
  display: block;
  width: 100%;
  height: 3px;
  background: #aaa;
  transition: .3s;
}
.icon-bar + .icon-bar {
  margin-top: 5px;
}

/*#nav-container:focus-within .button-notify {
  pointer-events: none;
}*/
.openNotify{
    transform: translateX(0) !important;
}
#nav-content {
    margin-top: 55px;
    padding: 10px;
    width: 300px;
    max-width: 300px;
    /*height: 600px;*/
    min-height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    /* height: calc(100% - 70px); */
   background-color: rgba(19, 19, 19, 0.8);
    pointer-events: auto;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    transform: translateX(-100%);
    transition: transform .3s;
   /* will-change: transform;
    contain: paint;*/
}

#nav-content ul {
  height: 100%;
 
}
#nav-content li {
width: 33.3%;
float: right;
text-align: center;
}
#nav-content li a i{
    color: #fff;
    display: block;
    margin-bottom: 7px;
    font-size: 25px;
    
    -webkit-transition: 0.5s all ease-in;
    transition: 0.5s all ease-in;
}
#nav-content li a {
    position: relative;
    color: #fff;
    font-size: 12px;
    padding: 10px 5px;
    display: block;
    text-transform: uppercase;
    transition: color .1s;
    background-color: #222;
    margin: 2px;
}

#nav-content li a:hover {
  color: #fff;
  background-color: #0b5961;
}
#nav-content li a:hover i{
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
}
#nav-content li a .badge{
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 50%;
    background-color: #E5343D;
    font-weight: 500;
}
 
/*
#nav-container:focus-within #nav-content {
  transform: none;
}*/


#nav-container ul {
  padding: 0;
  list-style: none;
}
   .count_notify{

        position: absolute;
        left: 0;
        top: 0;
        border-radius: 50%;
        background-color: #E5343D;
        font-weight: 500
    }

 </style>

    
    
    
    
    
    
    
    
    
    
    
    
<ul class="nav navbar-nav navbar-right col-sm-4" style="    margin-top: 16px;">
<li><div id="nav-container">
<div class="bg"></div>
    <div class="button-notify" tabindex="0">
      <i class="fa fa-th"></i>
         <span id="count_notify" class="badge count_notify">0</span>
    </div>
    <div id="nav-content" tabindex="0">
      <ul>

            <li><a onclick="update_agaza_notification()" id="a_agazat_new" href="#">
                        <i class="fa fa-file-text-o"></i>
                        الإجازات <span id="agazat_new" class="badge ui-li-count">0</span></a>
                </li>
                <li><a onclick="update_ezn_notification()" id="a_ozonat_new" href="#">
                        <i class="fa fa-clock-o"></i>
                        الأذونات<span id="ozonat_new"
                                      class="badge ui-li-count">0</span></a></li>
                <li><a id="a_solaf_new" onclick="update_solaf_notification()" href="#">
                        <i class="fa fa-money"></i>
                        السلف<span class="badge ui-li-count" id="solaf_new">0</span></a>
                </li>


        <li><a href="#"><i class="fa fa-calendar-plus-o"></i> تكليف إضافى<span class="badge">3</span></a></li>
        <li><a href="#"><i class="fa fa-database"></i> المهمات</a></li>
        
        <li><a href="#"><i class="fa fa-bell-o"></i> إشعارات <span class="badge">3</span></a></li>
<li><a id="a_sader_new" onclick="update_seen_sader()" href="#">
                                            <i class="fa fa-cloud-upload"></i>
                                             الصادر<span class="badge ui-li-count" id="tot-prod_sader">0</span></a>
                                    </li>
        <li><a id="a_wared_new" onclick="update_seen_wared()" href="#">
                                            <i class="fa fa-download"></i>
                                             الوارد<span class="badge ui-li-count" id="tot-prod_wared">0</span></a>
                                    </li>


   <li><a id="a_email_new" onclick="update_seen_email()" href="#">
                                            <i class="fa fa-money"></i>
                                            البريد الإلكتروني<span class="badge ui-li-count" id="tot-prod_email">0</span></a>
                                    </li>
  
   <li><a id="a_notes_new" onclick="update_seen_notes()" href="#">
                                            <i class="fa fa-comments-o"></i>
                                            الأحداث و الملاحظات<span class="badge ui-li-count" id="tot-prod_notes">0</span></a>
                                    </li>
                                    
                                    <li>
    <a id="a_sader_comments_new" onclick="update_seen_sader_comments()" href="#">
        <i class="fa fa-comment-o"></i>
        التوجيهات / التأشيرات صادر<span class="badge ui-li-count"
                                        id="tot-prod_sader_comments">0</span></a>
</li>
<li>
    <a id="a_wared_comments_new" onclick="update_seen_wared_comments()" href="#">
        <i class="fa fa-comment-o"></i>
        التوجيهات / التأشيرات وارد<span class="badge ui-li-count"
                                        id="tot-prod_wared_comments">0</span></a>
</li>
  
      </ul>
    </div>
</div>    
 </li>
 <!--
    <li class="dropdown dropdown-user" style="margin: -6px 30px 0 30px;">
        
            <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown">
               <img src="<?php if( isset($_SESSION['user_login_image']) && $_SESSION['user_login_image']!= null ){  
    							
                                    		echo base_url().'uploads/images/'.$_SESSION['user_login_image'];
    							}else {
    					
                                	echo base_url().'asisst/admin_asset/img/avatar5.png';
                                
                                 } 
                                
                                ?>" 
    			   class="img-circle" width="45" height="45" alt="user">
    		</a>

           <ul class="dropdown-menu" >
              <li>
                  <a target="_blank" href="#">
                     <img src="<?php if( isset($_SESSION['user_login_image']) && $_SESSION['user_login_image']!= null ){  
    							
                                    		echo base_url().'uploads/images/'.$_SESSION['user_login_image'];
    							}else {
    					
                                	echo base_url().'asisst/admin_asset/img/avatar5.png';
                                
                                 } 
                                
                                ?>" 
    			   class="img-circle" width="100%" height="120" alt="user" >
                  </a>
              </li>
              <li class="text-center"><span><?php if(isset($_SESSION['user_login_name']) && $_SESSION['user_login_name'] != null){ 
			echo $_SESSION['user_login_name']; 
            }else{
              echo $_SESSION['user_name']; 
                }?> </span></li>
                
                <li class="text-center"> اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></li>
             
              <li><a class="btn btn-danger sign-out-btn" href="<?php echo base_url()?>Login/logout" style="color: #fff;">
                  <span class=""><i class="fa fa-sign-out"></i></span> الخروج</a>
              </li>
              
          </ul>
  </li>
  -->
  <li class="dropdown dropdown-user" style="margin: -6px 30px 0 30px;">

        <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown">
           <img src="<?php if( isset($_SESSION['user_login_image']) && $_SESSION['user_login_image']!= null ){
              if ($_SESSION['role_id_fk'] == 3) {
                echo base_url().'uploads/human_resources/emp_photo/thumbs/'.$_SESSION['user_login_image'];

              }else {
                echo base_url().'uploads/images/'.$_SESSION['user_login_image'];

              }
              }else {

                              echo base_url().'asisst/admin_asset/img/avatar5.png';

                             }

                            ?>"
         class="img-circle" width="45" height="45" alt="user">
    </a>

       <ul class="dropdown-menu" >
          <li>
              <a target="_blank" href="#">
                 <img src="<?php if( isset($_SESSION['user_login_image']) && $_SESSION['user_login_image']!= null ){

                   if ($_SESSION['role_id_fk'] == 3) {
                     echo base_url().'uploads/human_resources/emp_photo/thumbs/'.$_SESSION['user_login_image'];

                   }else {
                     echo base_url().'uploads/images/'.$_SESSION['user_login_image'];

                   }
                        }else {

                              echo base_url().'asisst/admin_asset/img/avatar5.png';

                             }

                            ?>"
         class="img-circle" width="100%" height="120" alt="user" >
              </a>
          </li>
          <li class="text-center"><span><?php if(isset($_SESSION['user_login_name']) && $_SESSION['user_login_name'] != null){
         echo $_SESSION['user_login_name'];
         }else{
          echo $_SESSION['user_name'];
            }?> </span></li>

            <li class="text-center"> اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></li>

          <li><a class="btn btn-danger sign-out-btn" href="<?php echo base_url()?>Login/logout" style="color: #fff;">
              <span class=""><i class="fa fa-sign-out"></i></span> الخروج</a>
          </li>

      </ul>
</li>
  
    <?php 
            $out_title="  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء";
            $out_link="Dash/home";
            $out_font_awesome='fa fa-home';
            if(isset($this->groups_title) && !empty($this->groups_title)){
                $out_title=$this->groups_title['title']; 
              $out_link=$this->groups_title['link']; //font_awesome
            //   $out_font_awesome=$this->groups_title['font_awesome']; 
          }elseif(isset($title_name) && !empty($title_name)){
            $out_title=$title_name['title'];
            $out_link=$title_name['link']; 
             // $out_font_awesome=$title_name['font_awesome'];   
        }?>
    
        <?php  ?>
        
 <?php 
 
 $CI =& get_instance();
 $CI->load->model('human_resources_model/attendance/attendance_messages/Attend_messages_model');

 $notifi=$CI->Attend_messages_model->total_rows();
 $message=$CI->Attend_messages_model->get_new_messages();

//$notifi ='';
//$message ='';
 //$notifi=$this->Attend_messages_model->total_rows();
 //$message=$this->Attend_messages_model->get_new_messages();
?>

<!--
<li class="dropdown tasks-menu">
            <a href="#" onclick="update_seen()"  class="dropdown-toggle" data-toggle="dropdown">
                <i class="pe-7s-bell" style="background-color: #ff8d6f;"></i>
             
                <span id="tot-prod" class="label label-danger" >
                   <?= $notifi?>
                </span>
                
                
            </a>
            <ul class="dropdown-menu">
                <li>
                         <ul class="menu" id="tot">
                            <?php 
                            if(isset($message)){
                            foreach($message as $mesg){ ?>

                                <li >
                                    <a  href="<?php echo base_url() ?>human_resources/attendance/attendance_messages/Attend_messages/message_details/<?= $mesg->id ?>" class="border-gray">

                                        <h3  id="tot-msg"><i  class="fa fa-check-circle" ></i><?=$mesg->content ?>   </h3>
                                       
                                    </a>
                                    
                                </li>

                                <?php }}else{ ?>
                                    <li >
                                    <a  href="" class="border-gray">
                                        <h3  id="tot-msg"><i  class="fa fa-check-circle" ></i>  </h3>
                                       
                                    </a>
                                    
                                </li>

                                <?php }?>
                        </ul>   
                        
                  
                </li>
            </ul>
</li>       
        




        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="pe-7s-bell" style="background-color: #0bc1ab;"></i>
                <span id="test" class="label label-danger" >
                    <?php if(isset($this->notification_agazat) && !empty($this->notification_agazat)){ echo count($this->notification_agazat); } else { echo 0 ; } ?>
                </span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <?php

                    ?>

                    <ul class="menu">
                        <?php   if(isset($this->notification_agazat) && !empty($this->notification_agazat) && $this->notification_agazat !=null){ ?>
                            <?php foreach($this->notification_agazat as $one_record){ ?>


                                <li>
                                    <a href="<?php echo base_url();?>Notification_controller/get_my_notification" class="border-gray">

                                        <h3><i class="fa fa-check-circle"></i>  <?php echo $one_record->message;  ?></h3>
                                    </a>
                                </li>

                            <?php } ?>
                        <?php } ?>




                    </ul>
                </li>
            </ul>
        </li>


-->
        <!----------------------------------------------------------------------------->
       <li class="dropdown dropdown-help prays hidden-xs">
        

        <span style="color: white !important; text-align: center !important;"> مرحبا بك </span>
      <br />
                <span style="color: #d92222 !important;"><?php if(isset($_SESSION['user_login_name']) && $_SESSION['user_login_name'] != null){
         echo $_SESSION['user_login_name'];
         }else{
          echo $_SESSION['user_name'];
            }?> </span>
            
        </li>
              
        <!--
        <li class="dropdown dropdown-help hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           <i class="pe-7s-settings" style="background-color: #f6be07;"></i></a>
           <ul class="dropdown-menu" >
        
            <li><a herf="#" id="change-css" rel="" >
              <i class="fa fa-check-circle"></i> المظهر الأساسى</a>
          </li>
          <li><a id="change-css1" rel="<?php echo base_url()?>asisst/admin_asset/css/themes/theme1.css" >
              <i class="fa fa-check-circle"></i> المظهر الهادى</a>
          </li>
        
          <li>
             <a id="change-css2" rel="<?php echo base_url()?>asisst/admin_asset/css/themes/theme2.css">
              <i class="fa fa-check-circle"></i> المظهر القياسى</a>
          </li>
          <li><a id="change-css3" rel="<?php echo base_url()?>asisst/admin_asset/css/themes/theme3.css"><i class="fa fa-check-circle"></i> المظهر الدافئ</a></li>
          <li><a id="change-css4" rel="<?php echo base_url()?>asisst/admin_asset/css/themes/theme4.css"><i class="fa fa-check-circle"></i> المظهر البارد</a></li>
        
        </ul>
        </li>
        -->
            <div>
       <!-- <span id="email_message" style="margin-right: -111px;
    color: red;">
     
        </span>-->

    <a id="a_email_new_message" onclick="update_seen_email()" href="#">
                                     
                                            <span id="email_message" style="margin-right: -111px;
    color: red;"></span></a>


        </div>
        
         <li class="dropdown dropdown-help pray hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-clock-o"></i>
          مواقيت الصلاة</a>
               <ul class="dropdown-menu" style="width:300px" >
            
                <li> 
                  <!--
                  <iframe id="iframe2" style="background: rgb(255, 255, 255); border: 0px solid rgb(238, 238, 238); width: 100%; overflow: hidden; height: 442px;" src="https://timesprayer.today/widget_frame.php?frame=2&amp;theme=w3-teal&amp;id=13&amp;sound=true"></iframe>
                  -->
                  
                  <iframe src="https://timesprayer.com/widgets.php?frame=1&amp;lang=ar&amp;name=buraydah&amp;sound=true&amp;avachang=true" style="border: none; overflow: hidden; width: 100%; height: 200px;"></iframe>
                  </li>
             
            
            </ul>
        </li>
        


</ul>



</div>
</nav>
</header>


          <?php  $this->load->view('admin/requires/sidebar');?>    

<!--
<aside class="main-sidebar">
  <div class="sidebar">
   <ul class="sidebar-menu">

    <li class="active">
     <a href="<?php  // echo  base_url()."Dash"?>"><i class="fa fa-tachometer"></i><span>الرئيسية</span>
      <span class="pull-right-container">
      </span>
      </a>
    </li>
    <?php /* if(isset($this->main_groups) && $this->main_groups !=null  && !empty($this->main_groups)){
           foreach ($this->main_groups as $row){?>

               <?php if($row->count_level > 0){
                   $link_to="Dash/mian_group/".$row->sub[0]->page_id ;
               }else{
                   $link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
               } */?>

        <li class="treeview">
            <a href="<?php // echo base_url().$link_to ?>">
              <i class="<?php //echo $row->sub[0]->page_icon_code?>"></i><span><?php // echo $row->sub[0]->page_title?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <?php // if(!empty($row->sub_pages)){ ?>
        <ul class="treeview-menu">
       <?php 
           // foreach ($row->sub_pages as $one_page ) { ?>
          <li><a href="<?php // echo base_url().$link_to ?>"><?php // echo $one_page->page_title?></a></li>
       <?php // }   ?>

        </ul>
         <?php // }   ?>
        </li>  

<?php // }   }?>
</ul>
</div>
</aside>   -->



<div class="content-wrapper">
<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
          </div>
          <div class="modal-body">
              <p id="text">هل أنت متأكد من الحذف؟</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
              <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
          </div>
      </div>
  </div>
</div>

