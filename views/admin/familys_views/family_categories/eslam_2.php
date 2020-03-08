
<?php
$php_array = json_encode($all_cat);
echo '<pre>';
 print_r($php_array);
 echo '<pre>';
?>

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
               <div class="row">
               
               
               <?php
            //   print_r($all_cat);
              // $php_array = $all_cat;

 
 //die;
               ?>
               
                  <!-- Flot Ber Chart -->
                  <div class="col-sm-12 col-md-6">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Bar chart</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart1" class="flotChart-demo"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Flot Points Chart -->
                  <div class="col-sm-12 col-md-6">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Points chart</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart2" class="flotChart-demo"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Flot Line Chart -->
                  <div class="col-sm-12 col-md-6">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Line chart</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart3" class="flotChart-demo"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Flot Real Time Chart -->
                  <div class="col-sm-12 col-md-6">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Real time chart</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart4" class="flotChart-demo"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Flot Filled Area Chart -->
                  <div class="col-sm-12 col-md-6">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Filled Area chart </h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart5" class="flotChart-demo"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Flot Line Chart With Steps -->
                  <div class="col-sm-12 col-md-6">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Line chart with steps</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart6" class="flotChart-demo"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Flot Line With Points Chart -->
                  <div class="col-sm-12 col-md-8">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Line with points</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart7" class="flotChart-demo"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Flot Pie Chart -->
                  <div class="col-sm-12 col-md-4">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Pie chart </h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="flotChart">
                              <div id="flotChart8" class="flotChart-demo"></div>
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
      <!-- Flot Charts js -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/js/dashboard.js" type="text/javascript"></script>
         =====================================================================-->
               <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url()?>asisst/admin_asset/ali/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
      
      
      
      
      
         
         
         
         
        <script type="text/javascript">
         //Flot charts data and options
         
         var data = [[1, 4], [2, 5], [3, 7], [4, 4], [5, 8], [6, 9], [7, 11], [8, 10], [9, 8], [10, 5], [11, 4], [12, 3]];
         
         $.plot("#flotChart1", [data], {
             series: {
                 bars: {
                     show: true,
                     lineWidth: 2,
                     align: "center",
                     fill: false
                 }
             },
             legend: {
                 show: false
             },
             grid: {
                 tickColor: "#e4e5e7",
                 borderWidth: 1,
                 borderColor: '#ddd',
                 color: '#009688'
             },
             colors: ["#009688"]
         });
         
         var data1 = [[0, 3], [1, 6], [2, 8], [3, 9], [4, 12], [5, 14], [6, 15], [7, 12],
             [8, 14], [9, 12], [10, 11], [11, 10], [12, 14], [13, 16], [14, 15], [15, 15],
             [16, 16], [17, 12], [18, 13], [19, 15], [20, 16], [21, 18], [22, 20], [23, 23],
             [24, 22], [25, 21], [26, 20], [27, 17], [28, 15], [29, 14], [30, 13], [31, 10]];
         
         var chartUsersOptions2 = {
             points: {
                 show: true,
                 fill: true,
                 lineWidth: 1,
                 fillColor: "#009688"
             },
             grid: {
                 tickColor: "#e4e5e7",
                 borderWidth: 1,
                 borderColor: '#ddd',
                 color: '#009688'
             },
             colors: ["#009688"]
         };
         
         $.plot($("#flotChart2"), [data1], chartUsersOptions2);
         
         var chartUsersOptions3 = {
             lines: {
                 show: true,
                 fill: false,
                 lineWidth: 2,
                 fillColor: "#009688"
             },
             grid: {
                 tickColor: "#e4e5e7",
                 borderWidth: 1,
                 borderColor: '#ddd',
                 color: '#009688'
             },
             colors: ["#009688"]
         };
         
         $.plot($("#flotChart3"), [data1], chartUsersOptions3);
         
         var data = [],
                 totalPoints = 300;
         
         function getRandomData() {
         
             if (data.length > 0)
                 data = data.slice(1);
         
             // Do a random walk
         
             while (data.length < totalPoints) {
         
                 var prev = data.length > 0 ? data[data.length - 1] : 50,
                         y = prev + Math.random() * 10 - 5;
         
                 if (y < 0) {
                     y = 0;
                 } else if (y > 100) {
                     y = 100;
                 }
         
                 data.push(y);
             }
         
             // Zip the generated y values with the x values
         
             var res = [];
             for (var i = 0; i < data.length; ++i) {
                 res.push([i, data[i]]);
             }
         
             return res;
         }
         
         // Set up the control widget
         
         var updateInterval = 30;
         
         var plot = $.plot("#flotChart4", [getRandomData()], {
             series: {
                 shadowSize: 0  // Drawing is faster without shadows
             },
             yaxis: {
                 min: 0,
                 max: 100
             },
             xaxis: {
                 show: false
             },
             grid: {
                 tickColor: "#e4e5e7",
                 borderWidth: 1,
                 borderColor: '#ddd',
                 color: '#009688'
             },
             colors: ["#009688"]
         });
         
         function update() {
         
             plot.setData([getRandomData()]);
         
             // Since the axes don't change, we don't need to call plot.setupGrid()
         
             plot.draw();
             setTimeout(update, updateInterval);
         }
         
         update();
         
         var data5 = [
             {
                 data: [[1, 4], [2, 5], [3, 7], [4, 4], [5, 8], [6, 9], [7, 11], [8, 10], [9, 8], [10, 5], [11, 4], [12, 3]]
             }
         ];
         
         var chartUsersOptions5 = {
             lines: {
                 show: true,
                 fill: 0.1
             },
             grid: {
                 tickColor: "#e4e5e7",
                 borderWidth: 1,
                 borderColor: '#ddd',
                 color: '#009688'
             },
             colors: ["#009688"]
         };
         
         $.plot($("#flotChart5"), data5, chartUsersOptions5);
         
         var data6 = [
             {
                 label: "bar",
                 data: [[1, 12], [2, 14], [3, 18], [4, 24], [5, 28], [6, 22], [7, 20], [8, 18], [9, 17], [10, 13], [11, 15], [12, 17]]
             }
         ];
         
         var chartUsersOptions6 = {
             lines: {
                 show: true,
                 steps: true
             },
             grid: {
                 tickColor: "#e4e5e7",
                 borderWidth: 1,
                 borderColor: '#ddd',
                 color: '#009688'
             },
             colors: ["#009688"]
         };
         
         $.plot($("#flotChart6"), data6, chartUsersOptions6);
         
         var sin = [],
                 cos = [];
         for (var i = 0; i < 14; i += 0.5) {
             sin.push([i, Math.sin(i)]);
             cos.push([i, Math.cos(i)]);
         }
         
         var data7 = [
             {data: sin, label: "sin(x)"},
             {data: cos, label: "cos(x)"}
         ];
         
         var chartUsersOptions7 = {
             series: {
                 lines: {
                     show: true
                 },
                 points: {
                     show: true
                 }
             },
             grid: {
                 tickColor: "#e4e5e7",
                 borderWidth: 1,
                 borderColor: '#ddd',
                 color: '#009688'
             },
             yaxis: {
                 min: -1.2,
                 max: 1.2
             },
             colors: ["#009688", "#efefef"]
         }
         ;
         
         $.plot($("#flotChart7"), data7, chartUsersOptions7);
        var json = <?php echo $php_array;  ?>
        
        


var json = [{
    "id" : "1", 
    "color"   : "red",
    "tid" : "2013-05-05 23:35",
    "fromWho": "hello1@email.se"
},
{
    "id" : "2", 
    "color"   : "blue",
    "tid" : "2013-05-05 23:45",
    "fromWho": "hello2@email.se"
}];




for (var key in json) {
       if (json.hasOwnProperty(key)) {
          alert(json[key].id);
        //  alert(json[key].msg);
        var data8 = [{label:json[key].id , data: json[key].id, color: json[key].id}];
      
       }
    }

/*
for (var key in json) {
if (json.hasOwnProperty(key)) {
 // alert(json[key].id);
 alert(json[key].title);
      var data8 = [  {label:json[key].title , data: json[key].id, color: json[key].color}, ];
      

}
}*/



      /*   var data8 = [
         for (var key in json) {

             {label: "Data 1", data: 6, color: "#009688"},
             {label: "Data 2", data: 6, color: "#405f72"},
             {label: "Data 3", data: 22, color: "#82adc8"},
             {label: "Data 4", data: 32, color: "#139ff8"}
             }
         ];*/
         
         var chartUsersOptions8 = {
             series: {
                 pie: {
                     show: true
                 }
             },
             grid: {
                 hoverable: true
             },
             tooltip: true,
             tooltipOpts: {
                 content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                 shifts: {
                     x: 20,
                     y: 0
                 },
                 defaultTheme: false
             }
         };
         
         $.plot($("#flotChart8"), data8, chartUsersOptions8);
         
      </script>
