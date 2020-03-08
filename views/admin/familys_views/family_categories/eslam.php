<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from crm.thememinister.com/crmAdmin/charts_sparkline.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jun 2017 08:06:21 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRM Admin panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/css/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
 
   <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
       
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
        
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="col-sm-12 col-md-12 col-xs-12 ">
         
      
           
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-line-chart"></i>
               </div>
               <div class="header-title">
                  <h1>Sparkline Charts</h1>
                  <small>Preview sample. Documentation here: <a href="http://omnipotent.net/jquery.sparkline/#s-about" target="_blank">http://omnipotent.net/jquery.sparkline/#s-about</a></small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
      
               <!-- Sparklines Charts -->
               <div class="row">
                  <div class="col-sm-6 col-md-3">
                     <div class="panel panel-bd">
                        <div class="panel-body">
                           <div class="statistic-box">
                              <h2><span class="count-number">206</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +28%</span></h2>
                              <div class="small">% New Sessions</div>
                              <div class="sparkline1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="panel panel-bd">
                        <div class="panel-body">
                           <div class="statistic-box">
                              <h2><span class="count-number">321</span> <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +10%</span> </h2>
                              <div class="small">Total visitors</div>
                              <div class="sparkline2"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="panel panel-bd">
                        <div class="panel-body">
                           <div class="statistic-box">
                              <h2><span class="count-number">789</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +29%</span></h2>
                              <div class="small">Total users</div>
                              <div class="sparkline3"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="panel panel-bd">
                        <div class="panel-body">
                           <div class="statistic-box">
                              <h2><span class="count-number">171</span><span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +24%</span></h2>
                              <div class="small">Bounce Rate</div>
                              <div class="sparkline4"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Sparklines Example chart</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>Graph</th>
                                       <th>Type</th>
                                       <th>Code</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td><span id="sparkline5"></span></td>
                                       <td>Inline line chart</td>
                                       <td>{ type: 'line', lineColor: '#009688', fillColor: '#009688', width: '150', height: '20' }</td>
                                    </tr>
                                    <tr>
                                       <td><span id="sparkline6"></span></td>
                                       <td>Bar chart</td>
                                       <td>{ type: 'bar', barColor: '#009688', negBarColor: '#c6c6c6', width: '150', height: '20' }</td>
                                    </tr>
                                    <tr>
                                       <td><span id="sparkline7"></span></td>
                                       <td>Pie chart</td>
                                       <td>{ type: 'pie', sliceColors: ['#009688', '#ffffff'], width: '150', height: '20' }</td>
                                    </tr>
                                    <tr>
                                       <td><span id="sparkline8"></span></td>
                                       <td>Long inline chart</td>
                                       <td>{ type: 'line', lineColor: '#009688', fillColor: '#009688', width: '150', height: '20' }</td>
                                    </tr>
                                    <tr>
                                       <td><span id="sparkline9"></span> </td>
                                       <td>Tristate chart</td>
                                       <td>{ type: 'tristate', posBarColor: '#009688', negBarColor: '#ffffff', width: '150', height: '20'}</td>
                                    </tr>
                                    <tr>
                                       <td><span id="sparkline10"></span></td>
                                       <td>Discrete chart</td>
                                       <td>{ type: 'discrete', lineColor: '#009688', width: '150', height: '20'}); }</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- Counter js --> 
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/counterup/waypoints.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
      <!-- Sparklines js -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/sparkline/sparkline.min.js" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
      <script>
         $(document).ready(function () {
         function sparklin() {
             "use strict"; // Start of use strict
             //counter
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
         
             //Sparklines Charts
             $('.sparkline1').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1], {
                 type: 'bar',
                 barColor: '#009688',
                 height: '30',
                 barWidth: '6',
                 barSpacing: 1
             });
             $(".sparkline2").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {
                 type: 'line',
                 height: '30',
                 width: '100%',
                 lineColor: '#009688',
                 fillColor: '#fff'
             });
             $(".sparkline3").sparkline([2, 5, 3, 7, 5, 10, 3, 6, 5, 7], {
                 type: 'line',
                 height: '30',
                 width: '100%',
                 lineColor: '#009688',
                 fillColor: '#fff'
             });
             $(".sparkline4").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
                 type: 'line',
                 height: '30',
                 width: '100%',
                 lineColor: 'rgba(0, 150, 136, 0.65)',
                 fillColor: 'rgba(0, 150, 136, 0.65)'
             });
             $("#sparkline5").sparkline([34, 43, 43, 35, 44, 32, 44, 52, 25], {
                 type: 'line',
                 lineColor: '#009688',
                 fillColor: '#009688',
                 width: '150',
                 height: '20'
             });
             $("#sparkline6").sparkline([5, 6, 7, 2, 0, -4, -2, 4], {
                 type: 'bar',
                 barColor: '009688',
                 negBarColor: '#c6c6c6',
                 width: '150',
                 height: '20'
             });
             $("#sparkline7").sparkline([10, 2], {
                 type: 'pie',
                 sliceColors: ['#009688', '#ffffff'],
                 width: '150',
                 height: '20'
             });
             $("#sparkline8").sparkline([34, 43, 43, 35, 44, 32, 15, 22, 46, 33, 86, 54, 73, 53, 12, 53, 23, 65, 23, 63, 53, 42, 34, 56, 76, 15, 54, 23, 44], {
                 type: 'line',
                 lineColor: '#009688',
                 fillColor: '#009688',
                 width: '150',
                 height: '20'
             });
             $("#sparkline9").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1], {
                 type: 'tristate',
                 posBarColor: '#009688',
                 negBarColor: '#ffffff',
                 width: '150',
                 height: '20'
             });
             $("#sparkline10").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 3, 4, 5, 8, 7, 6, 9, 3, 2, 4, 1, 5, 6, 4, 3, 7], {
                 type: 'discrete',
                 lineColor: '#009688',
                 width: '150',
                 height: '20'
             });
         }
         sparklin();
         });
      </script>
   </body>

<!-- Mirrored from crm.thememinister.com/crmAdmin/charts_sparkline.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jun 2017 08:06:23 GMT -->
</html>

