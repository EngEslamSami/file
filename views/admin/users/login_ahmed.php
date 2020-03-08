<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> <?php if(isset($title) && $title !=null && !empty($title)){
        echo $title ; }else { echo " نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء ";} ?> </title>
    <meta name="description" content="Examples for creative website header animations using Canvas and JavaScript" />
    <meta name="keywords" content="header, canvas, animated, creative, inspiration, javascript" />
    <meta name="author" content="Codrops" />

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/responsive.css">


   <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()."asisst/fav/"?>favicon-16x16.png">
    <style>
   .small {
    position: relative;
    bottom: auto;
    left: auto;
    font-size: 10px;
}
.alert-danger {
    color: white;
    background-color: #E5343D !important;
    border-color: #BD000A !important;
}
.alert {
      color: white;
    background-color: #E5343D !important;
    border-color: #BD000A !important;
    border-radius: 5px;
}
.alert-dismissible .close {
    font-size: 16px;
    top: -14px;
    right: -31px;
    text-shadow: none; 
    opacity: 1;
}



   </style>
</head>

<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">
    <!-- Content Wrapper -->
    <section id="login-page">
        <div class="login-wrapper">
           
            <div class="back-link">
                <div class="back-dash">
                    <a href="https://webmail1.hostinger.ae/?_task=mail&_mbox=INBOX" target="_blank" class="btn btn-warning">الدخول إلى البريد الإلكترونى</a>
                </div>
            </div> 
            

                <div class="clearfix"></div>




            <div class="container-center " >
  <!--          
 <div style="color: white !important;
                        background-color: #d02b3c !important;
                        border-color: #f5c6cb !important; padding: 3px;     text-align: center; " class="alerts alert-dangers" >
                        هناك بعض أعمال الصيانة علي النظام الأن ... <br />
                        
                        نشكركم علي حسن تعاونكم معنا <br />
                        مع تحيات إدارة الدعم الفني بشركة الأثير 
                        
 </div>-->
    
                <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <!--
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/login/arab-happy-saudi-man-displaying-banner-sign-isolated-white-background-44077908.jpg" class="holding-man" width="370">
                    -->
                  
                    <div class="login-area  " >
                        <div class="panel panel-bd panel-custom">
                        
                         <!--   <div class="panel-heading">
                                <div class="view-header">
                                    <div class="header-icon">
                                        <i class="pe-7s-unlock "></i>
                                    </div>
                                    <div class="header-title">
                                        <p>تسجيل الدخول </p>
                                    </div>
                                </div>
                            </div> -->
                            <div class="panel-body">
                            
                            <img src="<?php echo base_url()?>asisst/admin_asset/img/logo-abnaa.png" width="100%">
                            <h5 class="text-green text-center">تسجيل دخول الموظفين</h5>
                                <?php echo form_open('login/check_login',array('role'=>'form'))?>


                                    <div class="form-group">
                                        <?php if(isset($response)):?>
                                            <!--
                                            <h5 class="alert  text-center rtl" style="background:#D5402B; color: white;" >
                                                <i class="fa fa-lock fa-fw fa-spin icn-xs"></i><?php echo $response;?></h5>
                                                -->
                                        <div class="alert " role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>No!</strong> <?php echo $response;?>
                                        </div>


                                    
                                            <?php endif?>
                                            <div class="input-stylish">
                                            <i class="fa fa-user-circle"></i>
                                                 <input type="text" placeholder="برجاء إدخال إسم المستخدم الخاص بك " title="برجاء إدخال إسم المستخدم الخاص بك" required="" value="" name="user_name"  class="">
                                                 <div class="stylish"></div>
                                            </div>

                                         
                                           
                                          <!--  <span class="help-block small">برجاء إدخال إسم المستخدم الخاص بك</span> -->
                                        </div>
                                        <div class="form-group ">
                                             <div class="input-stylish ">
                                              
                                             <i class="fa fa-key"></i>
                                                      <input type="password" title="برجاء إدخال كلمة المرور الخاص بك " 
                                                  placeholder="برجاء إدخال كلمة المرور الخاص بك" required="" value="" name="user_pass" id="password" class="">
                                                     <div class="stylish"></div>
                                             </div>
                                          
                                            
                                           
                                            <!--<span class="help-block small">كلمة المرور قوية</span> -->
                                        </div>
                                        
                                        <div class="text-center">
                                            <button class="btn btn-add" name="login" type="submit" > الدخول &nbsp <i class="fa fa-sign-in" style="    transform: rotate(180deg);" aria-hidden="true"></i>
</button>
                                          <!--  <a class="btn btn-warning" href="register.html" style="float: left;">التسجيل</a> -->
                                        </div>
                                        <?php  echo form_close()?>
                                    </div>
                                    
                                 <!--   <div class="panel-footer">الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء</div>
                                    
                                    -->
                                    
                                </div>
                            </div>
                        </div>
                    <!--
                        <img src="<?php echo base_url()?>asisst/admin_asset/img/login/arab-man.png" class="bottom-man wow bounceInUp" >
                    -->
                    
                    </div>
                </div>
                

            </section>



            <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
            <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
            <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
            <script src="<?php echo base_url()?>asisst/admin_asset/js/owl.carousel.min.js"></script>
            
            <script language="javascript">
                    function autoResizeDiv()
                    {
                        document.getElementById('login-page').style.height = window.innerHeight +'px';
                    }
                    function autoResizeDivMobile()
                    {
                        document.getElementById('login-page').style.height ='auto';
                    }
                   
                    
                    
                    
                    
                     var mq = window.matchMedia( "(min-width: 767px)" );
                    
                    if(mq.matches) {
                        // the width of browser is more then 767px
                        
                      window.onresize = autoResizeDiv;
                      autoResizeDiv();
                    } else {
                        // the width of browser is less then 767px
                        
                      window.onresize = autoResizeDivMobile;
                      autoResizeDivMobile();
                      }
                </script>
                
                <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                }, 400);
                
                </script>
                <script>
                
                $(document).ready(function () {

                    "use strict";
                        
                    $(".input-stylish input").focus(function () {
                            
                     $(this).parent().find(".stylish").animate({width: "100%"}, 500);
                      $(this).parent().find("i").addClass("moveToRight");
                     
                             
                    });
                    $(".input-stylish input").blur(function () {
                            
                    $(this).parent().find(".stylish").css({width: "0%"});
                    $(this).parent().find("i").removeClass("moveToRight");
                            
                        });
                        
                        
                        
                      
                    
                    });
                    
                
                </script>
                
        </body>

        </html>