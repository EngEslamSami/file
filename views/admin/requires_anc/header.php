<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php if(isset($title) && $title !=null && !empty($title)){echo $title ; }else { 
        echo " برنامج الأثير لإدارة الجمعيات";} ?></title>
    <meta name="description" content="الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />
    <meta name="keywords" content="الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />
    <meta name="author" content="الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />


    
     <?php if(isset($maps)) {  ?>
        <script type="text/javascript">
          var centreGot = false;
                   </script>
      <?php  echo $maps['js']; ?>
      <?php  } ?>
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()."asisst/fav/"?>favicon-16x16.png">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-select.min.css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/lobipanel.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/ckeditor/css/samples.css">

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/table.css">

    <link href="<?php echo base_url();?>asisst/admin_asset/datepicker/css/bootstrap-datetimepicker.min.css" media="all" rel="stylesheet" />




    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asisst/admin_asset/datepicker/css/jquery.calendars.picker.css" />
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/stylecrm.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/responsive.css">
    <link type="text/css" rel="stylesheet" media="all" href="..."  id="test-css"/>


<style>
.name_of_charity {
color: #0060b3;
    font-size: 16px;
    text-align: center;
    line-height: 25px;
    background-color: #fff;
    padding: 2px 10px;
    margin-top: 3px;
    border-radius: 5px
}

.name_of_charity img {
float: right;
height: 50px;
}
.name_of_charity p{
    float: right;
    margin-bottom: 0;
        font-size: 16px;
}
</style>
</head>





    <body class="hold-transition sidebar-mini  sidebar-collapse sidebar-open pace-done">
     <div class="wrapper">
        <header class="main-header">
         <a href="<?php echo base_url()?>dash" class="logo">

     <span class="logo-mini">
           <!--     <img src="<?php echo base_url()?>asisst/fav/ms-icon-70x70.png" alt="">
       </span>
       <span class="logo-lg">
           <img src="<?php echo base_url()?>asisst/fav/ms-icon-70x70.png" alt="">
             -->
                    	  <?php $img ='';if(isset($_SESSION['main_data_info']->logo)){$img = $_SESSION['main_data_info']->logo;} ?>
	<img src="<?php echo base_url()."uploads/images/".$img?>"
		 onerror="this.src='<?php echo base_url()."asisst/admin_asset/img/logo-atheer.png"?>'"
		 alt="" class="center-block" />
       </span>
     

       
   </a>


   <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
     <span class="sr-only">Toggle navigation</span>
     <span class="pe-7s-angle-left-circle"></span>
 </a>

 <div class="navbar-custom-menu">
    <ul class="nav navbar-nav col-sm-4">
        <?php 
        $out_title="  برنامج الأثير لإدارة الجمعيات";
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
<li class="dropdown tasks-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
   <i class="pe-7s-note2"></i>
   <span class="label label-danger"><?php echo $this->count_basic_in; ?></span>
</a>
<ul class="dropdown-menu">
   <li>
   <?php

   ?>
   
    <ul class="menu">
    <?php   if(isset($this->files_basic_in) && !empty($this->files_basic_in) && $this->files_basic_in !=null){ ?>
    <?php foreach($this->files_basic_in as $one_record){ ?>
   

    <li>
      <a href="#" class="border-gray">
       <span class="label label-success pull-right">طلب أسرة جديد</span>
       <h3><i class="fa fa-check-circle"></i>طلب برقم هوية  <?php echo $one_record->mother_national_num;  ?></h3>
   </a>
</li>

     <?php } ?>
    <?php } ?>
    
    <?php  ?>
    

</ul>
</li>
</ul>
</li>
<li class="dropdown dropdown-help hidden-xs">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
   <i class="pe-7s-settings"></i></a>
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

</ul>
<ul class="nav navbar-nav col-sm-5 "> 
<li class="name_of_charity"> 
  <!--
  <img src="<?php echo base_url()?>asisst/fav/ms-icon-70x70.png" alt="">
  
  <p> الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء <br />
   مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463 
</p>
-->
 <img src="<?php echo base_url()?>asisst/fav/abnaa.png" alt="">
</li>
</ul>
<ul class="nav navbar-nav navbar-right col-sm-3">

    <li class="dropdown dropdown-user">
        <div class="header-login">
            <span><?php echo $_SESSION['user_username']?> </span>
            <p>اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></p>
        </div>
        <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown">
           <img src="<?php echo base_url()?>asisst/admin_asset/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>

           <ul class="dropdown-menu" >
          <li><a target="_blank" href="<?php echo base_url()?>Dash/family_data">
              <i class="fa fa-sign-out"></i> احصائيات عامة للبرنامج</a>
          </li>
          <li><a href="#"><i class="fa fa-inbox"></i> رسائلى</a></li>
          <li><a href="<?php echo base_url()?>Login/logout">
              <i class="fa fa-sign-out"></i> الخروج</a>
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
