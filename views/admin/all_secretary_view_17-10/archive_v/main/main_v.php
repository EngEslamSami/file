<style>
.latest_notification .nav-tabs>li>a {
    margin-left: 10px;
}
.latest_notification .badge {
    position: absolute;
    top: 3px;
    left: -7px;
}
.latest_notification .btn-group>.btn {

    height: 22px;
    line-height: 10px;
}
.active .badge {
    color: #ffffff !important;
}
.panel-footer{
    display: inline-block;
    width: 100%;
}
.detailswork span.label{

    width: 100px;

}
.detailswork a{
    font-size: 16px;
}
.detailswork p{
     font-size: 16px;  
}
.work-touchpoint-date .month {
      font-size: 10px;
    background-color: #fcb632;
    }
.panel-body {
    border: 1px solid #eee;
}

/*****************************/


.app p { margin: 0; }

.app ul {
	list-style: none;
	margin: 0;
	padding: 0;
}


/* ---------- APP ---------- */

.app {
	text-align: center;
}

.app-title {
	font-size: 24px;
	font-weight: bold;

}

.newclock {
	background: #1a1d24;
	border-radius: 35px;
	-webkit-box-shadow: 0 8px 0 #15181f;
	box-shadow: 0 8px 0 #15181f;
	height: 200px;
	margin-bottom: 24px;
	position: relative;
	width: 200px;
    margin: auto;
}

.newclock-inner {
	background: #f9f9f9;
	border-radius: 50%;
	height: 160px;
	left: 50%;
	margin: -80px 0 0 -80px;
	position: absolute;
	top: 50%;
	width: 160px;
}

.newclock-center,
#newclock-seconds,
#newclock-minutes,
#newclock-hours {
	left: 50%;
	position: absolute;
	top: 50%;
}

.newclock-center {
	background: #1a1d24;
	border-radius: 50%;
	height: 12px;
	margin: -6px 0 0 -6px;
	width: 12px;
	z-index: 4;
}

#newclock-seconds {
	background: #c40206;
	border-radius: 2px;
	height: 60px;
	margin: -60px 0 0 -1px;
	-webkit-transform-origin: 1px 60px;
	-moz-transform-origin: 1px 60px;
	-ms-transform-origin: 1px 60px;
	-o-transform-origin: 1px 60px;
	transform-origin: 1px 60px;
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	width: 2px;
  z-index: 3;
}

#newclock-minutes {
	background: #aaa;
	border-radius: 4px;
	height: 50px;
	margin: -50px 0 0 -2px;
	-webkit-transform-origin: 2px 50px;
	-moz-transform-origin: 2px 50px;
	-ms-transform-origin: 2px 50px;
	-o-transform-origin: 2px 50px;
	transform-origin: 2px 50px;
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	width: 4px;
  z-index: 2;
}

#newclock-hours {
	background: #1a1d24;
	border-radius: 4px;
	height: 40px;
	margin: -40px 0 0 -2px;
	-webkit-transform-origin: 2px 40px;
	-moz-transform-origin: 2px 40px;
	-ms-transform-origin: 2px 40px;
	-o-transform-origin: 2px 40px;
	transform-origin: 2px 40px;
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	width: 4px;
  z-index: 1;
}

.newclock-numbers {
	color: #888;
	display: block;
	font-size: 16px;
	font-weight: bold;
	height: 120px;
	margin: -60px 0 0 -60px;
	left: 13%;
	position: absolute;
	top: 13%;
	width: 120px;
}

.newclock-numbers li {
	height: 20px;
	line-height: 20px;
	margin: -10px;
	position: absolute;
	text-align: center;
	width: 20px;
}

.newclock-numbers li:nth-child(1) {
	left: 50%;
	top: 0;
}

.newclock-numbers li:nth-child(2) {
	right: 0;
	top: 50%;
}

.newclock-numbers li:nth-child(3) {
	bottom: 0;
	left: 50%;
}

.newclock-numbers li:nth-child(4) {
	left: 0;
	top: 50%;
}


#timedate {
    /* text-align: left; */
    width: 50%;
    margin: 10px auto;
    color: #000;
    padding: 10px;
    direction: ltr;
    width: 100%;
}
#timedate a{
    font-size: 16px;
}
#timedate #h,#timedate #m,#timedate #s,#timedate #mi{
    width: 20px;
    display: inline-block;
}
#timedate i{
    color: #f6be07;
}
#timedate .date-word  {
direction: rtl;
    /* float: right; */
    background-color: #f9a61a;
    padding: 0px 5px;
    border-radius: 3px;
    color: #fff;
    width: auto;
    display: inline-block;
}
#timedate .date-word a{
    color: #fff;
}
#timedate .date-word i{
    color: #fff;
}
</style>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padding-10">
    	<div class="panel panel-success">
    		<div class="panel-heading">
    			<h5 class="panel-title">التاريخ والوقت</h5>
    		</div>
    		<div class="panel-body" style="height: 280px;">
    			
               	<div class="app">

        			<div class="newclock">
        
        				<div class="newclock-inner">
        
        					<div class="newclock-center"></div>
        					<div id="newclock-seconds"></div>
        					<div id="newclock-minutes"></div>
        					<div id="newclock-hours"></div>
        
        					<ul class="newclock-numbers">
        
        						<li>12</li>
        						<li>3</li>
        						<li>6</li>
        						<li>9</li>
        
        					</ul>
        
        				</div> <!-- end newclock-inner -->
        
        			</div> <!-- end newclock -->
        
        			<p class="app-title">
                        <div id="timedate">
                            <div class="date-word" >
                                 <i class="fa fa-calendar-o"></i>
                            
                                <a id="d">1</a>&nbsp;
                                <a id="mon">January</a>,
                                <a id="y">0</a>
                            </div>
                            <div class="clock-word">
                             
                                
                                 &nbsp; <i class="fa fa-clock-o"></i>
                                <a id="h">12</a> :
                                <a id="m">00</a>:
                                <a id="s">00</a>:
                                <a id="mi">000</a> 
                            </div>
                          </div>
                    </p>
        
        		</div> <!-- end app -->
    			
    
    		</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 padding-10">
    	<div class="panel panel-warning">
    		<div class="panel-heading">
    			<h5 class="panel-title">إحصائيات عامة</h5>
    		</div>
    		<div class="panel-body" style="height: 280px;">
                 <canvas id="lineChart" height="140"></canvas>
    		</div>
    	</div>
    </div>
    
    <div class="clearfix"></div>
    
    

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">
    	<div class="panel panel-success">
    		<div class="panel-heading">
    			<h5 class="panel-title">روابط سريعة</h5>
    		</div>
    		<div class="panel-body" style="height: 290px;">
    			<div class="alert alert-sm alert-warning alert-dismissible" role="alert">
    				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    				
                    <p style="color: #efa200;"><i class="fa fa-exclamation-triangle"></i> <strong>تنبيه!</strong> رصيد الإجازة الخاص بك 20 يوم </p>
    			</div>
    
    			<div class="clerk-orders">
    				<ul class="list-unstyled" style="padding-right: 20px;">
    					<li><a href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared"><i class="fa fa-check" aria-hidden="true"></i> تسجيل وارد</a></li>
    					<li><a href="<?php echo base_url();?>/all_secretary/archive/sader/Add_sader/add_sader"><i class="fa fa-check" aria-hidden="true"></i> تسجيل صادر</a></li>
    					<li><a href="<?php echo base_url();?>/all_secretary/archive/main/Main/all_archive"><i class="fa fa-check" aria-hidden="true"></i> الأرشيف الإلكترونى</a></li>
    					<li><a href="<?php echo base_url();?>/all_secretary/archive/arch_setting/Setting/add_setting"><i class="fa fa-check" aria-hidden="true"></i> الاعدادات</a></li>
    					<li><a href="<?php echo base_url();?>/all_secretary/archive/gehat/Gehat"><i class="fa fa-check" aria-hidden="true"></i>  اضافه جهه </a></li>
                        <li><a href="<?php echo base_url();?>/all_secretary/email/Emails/my_emails"><i class="fa fa-check" aria-hidden="true"></i>  البريد الالكتروني</a></li>
                        
    				</ul>
    			</div>
    
    		</div>
    		<div class="panel-footer">
    
    			<button type="" class="btn btn-info btn-labeled " name="" id="button" value="" style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد</button>
    
    		</div>
    
    	</div>
    </div>
    
    <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-10">
         <div class="panel panel-warning">
            <div class="panel-heading">
               <div class="panel-title">
                  <h4>الأجندة الأسبوعية</h4>
               </div>
            </div>
            <div class="panel-body" style="height: 290px;overflow-y: auto;">
               <div class="work-touchpoint">
                  <div class="work-touchpoint-date">
                     <span class="day">20</span>
                     <span class="month">يوليو</span>
                  </div>
               </div>
               <div class="detailswork">
                  <span class=" label label-success pull-right">مهم</span>
                  <a href="#" title="headings">الرعاية الإجتماعية</a> <br>
                  <p>إنتهاء محضر لجنة الأسر وإرساله لوزارة العمل والتنمية الإجتماعية</p>
               </div>
               
               
              
               
               
               
               
               
               
               
            
            <div class="panel-footer">
    
    			<button type="" class="btn btn-info btn-labeled " name="" id="button" value="" style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد</button>
    
    		</div>
            
            
         </div>
    
    </div> -->
</div>




<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">
    <div class="latest_notification">
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dash_tab1" aria-controls="home" role="dash_tab1" data-toggle="tab"><i class="fa fa-bell-o"></i> تنبيهات جديدة</a></li>
      
        <li role="presentation"><a href="#dash_tab3" aria-controls="dash_tab3" role="tab" data-toggle="tab"><i class="fa fa-retweet"></i> تحويلات مستلمة <span class="badge badge-danger">5</span></a></li>
        <li role="presentation"><a href="#dash_tab4" aria-controls="dash_tab4" role="tab" data-toggle="tab"><i class="fa fa-reply"></i> تحويلات صادرة</a></li>
         <li role="presentation"><a href="#dash_tab5" aria-controls="dash_tab5" role="tab" data-toggle="tab"><i class="fa fa-tags"></i> أحدث المعاملات</a></li>
         
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dash_tab1">
        
      
        
        <?php if (isset($wared) && !empty($wared)&& isset($sader) && !empty($sader) ) {
           $data_load["wared"]= $wared;
           $data_load["sader"]=$sader;
       //  echo '<pre>'; print_r($data_load);
         
        
       $this->load->view('admin/all_secretary_view/archive_v/main/new_notifecation', $data_load);
         } ?>
        
        
        </div>
      
        <div role="tabpanel" class="tab-pane" id="dash_tab3">
            


        <?php if (isset($wared_mostalm) && !empty($wared_mostalm)&& isset($sader_mostalm) && !empty($sader_mostalm)) {
           $data_load["wared_mostalm"]= $wared_mostalm;
           $data_load["sader_mostalm"]=$sader_mostalm;
         //echo '<pre>'; print_r($data_load);
         
        
       $this->load->view('admin/all_secretary_view/archive_v/main/tahwelat_imports', $data_load);
         } ?>
        
        





        </div>
        <div role="tabpanel" class="tab-pane" id="dash_tab4">
                <div class="col-xs-12 no-padding">
                    <?php
                 $this->load->view('admin/all_secretary_view/archive_v/main/load_tahwel_sader');
                    ?>
					</div>

</div>
<div role="tabpanel" class="tab-pane" id="dash_tab5">
                <div class="col-xs-12 no-padding">
                    <?php
                  $this->load->view('admin/all_secretary_view/archive_v/main/load_new_updates');
                    ?>
					</div>
</div>
        
      </div>
    
    </div>
</div>



<!-- Flot Charts js -->
<script src="<?php echo base_url(); ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>asisst/admin_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script> 
<script>
         $(document).ready(function () {
             function chartlist() {
             "use strict"; // Start of use strict
         
             //bar chart
             var ctx = document.getElementById("barChart");
             var myChart = new Chart(ctx, {
                 type: 'bar',
                 data: {
                     labels: ["January", "February", "March", "April", "May", "June", "July"],
                     datasets: [
                         {
                             label: "My First dataset",
                             data: [65, 59, 80, 81, 56, 55, 40],
                             borderColor: "rgba(0, 150, 136, 0.76)",
                             borderWidth: "0",
                             backgroundColor: "rgba(0, 150, 136, 0.76)"
                         },
                         {
                             label: "My Second dataset",
                             data: [28, 48, 40, 19, 86, 27, 90],
                             borderColor: "rgba(0, 150, 136, 0.76)",
                             borderWidth: "0",
                             backgroundColor: "rgba(0, 150, 136, 0.76)"
                         }
                     ]
                 },
                 options: {
                     scales: {
                         yAxes: [{
                                 ticks: {
                                     beginAtZero: true
                                 }
                             }]
                     }
                 }
             });
         
             //radar chart
             var ctx = document.getElementById("radarChart");
             var myChart = new Chart(ctx, {
                 type: 'radar',
                 data: {
                     labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
                     datasets: [
                         {
                             label: "My First dataset",
                             data: [65, 59, 66, 45, 56, 55, 40],
                             borderColor: "rgba(0, 150, 136, 0.76)",
                             borderWidth: "1",
                             backgroundColor: "rgba(0, 150, 136, 0.76)"
                         },
                         {
                             label: "My Second dataset",
                             data: [28, 12, 40, 19, 63, 27, 87],
                             borderColor: "rgba(55, 160, 0, 0.7",
                             borderWidth: "1",
                             backgroundColor: "rgba(0, 150, 136, 0.98)"
                         }
                     ]
                 },
                 options: {
                     legend: {
                         position: 'top'
                     },
                     scale: {
                         ticks: {
                             beginAtZero: true
                         }
                     }
                 }
             });
         
             //line chart
             var ctx = document.getElementById("lineChart");
             var myChart = new Chart(ctx, {
                 type: 'line',
                 data: {
                     labels: ["January", "February", "March", "April", "May", "June", "July"],
                     datasets: [
                         {
                             label: "My First dataset",
                             borderColor: "rgba(0,0,0,.09)",
                             borderWidth: "1",
                             backgroundColor: "rgba(0,0,0,.07)",
                             data: [22, 44, 67, 43, 76, 45, 12]
                         },
                         {
                             label: "My Second dataset",
                             borderColor: "rgba(0, 150, 136, 0.76)",
                             borderWidth: "1",
                             backgroundColor: "rgba(0, 150, 136, 0.76)",
                             pointHighlightStroke: "rgba(26,179,148,1)",
                             data: [16, 32, 18, 26, 42, 33, 44]
                         }
                     ]
                 },
                 options: {
                     responsive: true,
                     tooltips: {
                         mode: 'index',
                         intersect: false
                     },
                     hover: {
                         mode: 'nearest',
                         intersect: true
                     }
         
                 }
             });
         
             //pie chart
             var ctx = document.getElementById("pieChart");
             var myChart = new Chart(ctx, {
                 type: 'pie',
                 data: {
                     datasets: [{
                             data: [45, 25, 20, 10],
                             backgroundColor: [
                                 "#084368cc",
                                 "#169398",
                                 "#b2c917cc",
                                 "#c98217cc"
                             ],
                             hoverBackgroundColor: [
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0,0,0,0.07)"
                             ]
         
                         }],
                     labels: [
                         "#009688",
                         "#009688",
                         "#009688"
                     ]
                 },
                 options: {
                     responsive: true
                 }
             });
         
             //doughut chart
             var ctx = document.getElementById("doughutChart");
             var myChart = new Chart(ctx, {
                 type: 'doughnut',
                 data: {
                     datasets: [{
                             data: [45, 25, 20, 10],
                             backgroundColor: [
                                 "rgba(0, 150, 136, 0.76)",
                                 "#30a44ae6",
                                 "#290d69e6",
                                 "#169398"
                             ],
                             hoverBackgroundColor: [
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0,0,0,0.07)"
                             ]
         
                         }],
                     labels: [
                         "#009688",
                         "#009688",
                         "#009688",
                         "#009688"
                     ]
                 },
                 options: {
                     responsive: true
                 }
             });
         
             //polar chart
             var ctx = document.getElementById("polarChart");
             var myChart = new Chart(ctx, {
                 type: 'polarArea',
                 data: {
                     datasets: [{
                             data: [15, 18, 9, 6, 19],
                             backgroundColor: [
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0, 150, 136, 0.76)",
                                 "rgba(0,0,0,0.2)",
                                 "rgba(0, 150, 136, 0.76)"
                             ]
         
                         }],
                     labels: [
                         "#009688",
                         "#009688",
                         "#009688",
                         "#009688"
                     ]
                 },
                 options: {
                     responsive: true
                 }
             });
         
             // single bar chart
             var ctx = document.getElementById("singelBarChart");
             var myChart = new Chart(ctx, {
                 type: 'bar',
                 data: {
                     labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
                     datasets: [
                         {
                             label: "My First dataset",
                             data: [40, 55, 75, 81, 56, 55, 40],
                             borderColor: "#009688",
                             borderWidth: "0",
                             backgroundColor: "rgba(0, 150, 136, 0.76)"
                         }
                     ]
                 },
                 options: {
                     scales: {
                         yAxes: [{
                                 ticks: {
                                     beginAtZero: true
                                 }
                             }]
                     }
                 }
             });
          }
          chartlist();
         });
 
      </script>
      
 <script>
 (function() {

	var newclockSeconds = document.getElementById('newclock-seconds'),
	newclockMinutes = document.getElementById('newclock-minutes'),
	newclockHours = document.getElementById('newclock-hours');

	function getTime() {

		var date = new Date(),
		seconds = date.getSeconds(),
		minutes = date.getMinutes(),
		hours = date.getHours(),

		degSeconds = seconds * 360 / 60,
		degMinutes = (minutes + seconds / 60) * 360 / 60,
		degHours = (hours + minutes / 60 + seconds / 60 / 60) * 360 / 12;

		newclockSeconds.setAttribute('style', '-webkit-transform: rotate(' + degSeconds + 'deg); -moz-transform: rotate(' + degSeconds + 'deg); -ms-transform: rotate(' + degSeconds + 'deg); -o-transform: rotate(' + degSeconds + 'deg); transform: rotate(' + degSeconds + 'deg);');
		newclockMinutes.setAttribute('style', '-webkit-transform: rotate(' + degMinutes + 'deg); -moz-transform: rotate(' + degMinutes + 'deg); -ms-transform: rotate(' + degMinutes + 'deg); -o-transform: rotate(' + degMinutes + 'deg); transform: rotate(' + degMinutes + 'deg);');
		newclockHours.setAttribute('style', '-webkit-transform: rotate(' + degHours + 'deg); -moz-transform: rotate(' + degHours + 'deg); -ms-transform: rotate(' + degHours + 'deg); -o-transform: rotate(' + degHours + 'deg); transform: rotate(' + degHours + 'deg);');
	}

	setInterval(getTime, 1000);
	getTime();

} ());


// START CLOCK SCRIPT

Number.prototype.pad = function(n) {
  for (var r = this.toString(); r.length < n; r = 0 + r);
  return r;
};

function updateClock() {
  var now = new Date();
  var milli = now.getMilliseconds(),
    sec = now.getSeconds(),
    min = now.getMinutes(),
    hou = now.getHours(),
    mo = now.getMonth(),
    dy = now.getDate(),
    yr = now.getFullYear();
  var months = ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"];
  var tags = ["y", "mon", "d",  "h", "m", "s", "mi"],
    corr = [yr, months[mo], dy,  hou.pad(2), min.pad(2), sec.pad(2), milli];
  for (var i = 0; i < tags.length; i++)
    document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
}

function initClock() {
  updateClock();
  window.setInterval("updateClock()", 1);
}

// END CLOCK SCRIPT
initClock();
 </script>