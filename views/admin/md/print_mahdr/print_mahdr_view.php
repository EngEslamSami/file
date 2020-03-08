


<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/style.css">



<?php 

/*echo '<pre>';
print_r($galsa_details);
*/
/*
$unixtime = 1560373200;
echo $time = date("d-m-Y ",$unixtime);

*/
?>

	<style type="text/css">
    html {
 
    height: 100%;              /* for the page to take full window height */
    box-sizing: border-box;    /* to have the footer displayed at the bottom of the page without scrolling */
}

*,
*:before,
*:after {
    box-sizing: inherit;       /* enable the "border-box effect" everywhere */
}
@media print{

        .report-container td, p {
            page-break-inside: avoid;
          }

  }
    
		.main-body{
			
		/*	background-image: url(<?php echo base_url();?>/asisst/admin_asset/img/pills/raoom_paper.png);
			background-position: 100% 100%;
			background-size: 100% 100%;
			background-repeat: no-repeat;
			-webkit-print-color-adjust: exact !important;*/
			

		}
        .main-body p{
            font-size: 18px;
            font-weight: bold;
            line-height: 30px;
        }

		.print_forma{
			padding: 0px 0px 0px 0px;
			/*border:1px solid #73b300;*/
			
		}
		.piece-box {
			/*margin-bottom: 12px;*/
			display: inline-block;
			width: 100%;
		}
		.piece-heading {
			background-color: #9bbb59;
			display: inline-block;
			float: right;
			width: 100%;
		}
		.piece-body {

			width: 100%;
			float: right;
		}
		.bordered-bottom{
			border-bottom: 4px solid #9bbb59;
		}
		.piece-footer{
			display: inline-block;
			float: right;
			width: 100%;
			border-top: 1px solid #73b300;
		}
		.piece-heading h5 {
			margin: 4px 0;
		}
		.piece-box table{
			margin-bottom: 0;
			font-size: 18px;
		}
		.piece-box table th,
		.piece-box table td
		{
			
			/*padding: 2px 8px !important;*/
		}
		.piece-box  .table>thead>tr>th,.piece-box  .table>tbody>tr>th, 
		.piece-box .table>tfoot>tr>th,.piece-box  .table>thead>tr>td, 
		.piece-box .table>tbody>tr>td,.piece-box  .table>tfoot>tr>td{
			/*text-align: center;*/
		}

		h6 {
			font-size: 20px;
			margin-bottom: 3px;
			margin-top: 3px;
		}
		.print_forma table th{
			text-align: right;
		}
		.print_forma table tr th{
			vertical-align: middle;	
		}
		.no-padding{
			padding: 0;
		}

		.main-title {
			display: table;
			text-align: center;
			position: relative;
			height: 120px;
			width: 100%;
		}
		.main-title h4 {
			display: table-cell;
			vertical-align: bottom;
			text-align: center;
			width: 100%;
		}

		.print_forma hr{
			border-top: 1px solid #73b300;
			margin-top: 7px;
			margin-bottom: 7px;
		}

		.no-border{
			border:0 !important;
		}

		.gray_background{
			background-color: #eee;

		}
		@media print{
			.table-bordered.double>thead>tr>th, .table-bordered.double>tbody>tr>th, 
			.table-bordered.double>tfoot>tr>th, .table-bordered.double>thead>tr>td, 
			.table-bordered.double>tbody>tr>td, .table-bordered.double>tfoot>tr>td {
				border: 2px solid #000 !important;
			}



			.table-bordered.white-border th,.table-bordered.white-border td{
				border:1px solid #fff!important

			}
		}



		@page {
                size: 210mm 297mm;
              margin: 10px 10px 0px 10px;
            }
		.open_green{
			background-color: #e6eed5;
		}
		.closed_green{
			background-color: #cdddac;
		}
		.table-bordered.double {
			border: 5px double #000;
		}
		.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, 
		.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
		.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
			border: 2px solid #000;
		}
		.under-line{
			border-top: 1px solid #abc572;
			padding-left: 0;
			padding-right: 0;
		}
		span.valu {
			padding-right: 10px;
			font-weight: 600;
			font-family: sans-serif;
		}

		.under-line .col-xs-3 ,
		.under-line .col-xs-4,
		.under-line .col-xs-6 ,
		.under-line .col-xs-8 
		{
			border-left: 1px solid #abc572;
		}

		.bond-header{
			height: 100px;
			margin-bottom: 30px;
		}
		.bond-header .right-img img,
		.bond-header .left-img img{
			width: 100%;
			height: 100px;
		}
		.main-bond-title{
			display: table;
			height: 100px;
			text-align: center;
			width: 100%;
		}
		.main-bond-title h3{
			display: table-cell;
			vertical-align: bottom;
			color: #d89529;
		}
		.main-bond-title h3 span{
			border-bottom: 2px solid #006a3a;
		}
		.green-border span {
			border: 6px double #000;
			padding: 8px 25px;
			border-radius: 10px;
			box-shadow: 2px 2px 5px 2px #000;
		}
		.table-bordered>tbody> tr.rosasy-bg td{
			background-color: #eee;
			border: 1px solid #fff ;
		}
		.hl{
			font-family: 'hl';
		}

	/*	.footer-info {
			position: absolute;
			width: 100%;
			bottom: 60px;
		}*/
		ol li{
			    list-style: arabic-indic;
                font-size: 18px;
}
table.no-border-td>tbody>tr> td{
	border-top:0 ;
	padding: 2px;
    font-size: 18px !important;
}









 table { page-break-after:auto }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
    
    
table.report-content {
  page-break-after:always;
}
thead.report-header {
  display:table-header-group;
}
tfoot.report-footer {
  display:table-footer-group;
} 


.header-info, .header-space{
    height: 205px;
}
.footer-info, .footer-space {
  height: 170px;
}

.header-info {
  position: fixed;
  top: 0;
  width: 100%;
}
.footer-info {
  position: fixed;
  bottom: -50px;
  width: 100%;
}

	</style>



 <?php if(isset($galsa_details)&&!empty($galsa_details)) {
      foreach ($galsa_details as $row) {  ?>
<div id="printdiv" data-spy="scroll" >
      <div class="first-part" >
  <table class="report-container">
   <thead class="report-header">
     <tr>
      <th class="report-header-cell">
       <div class="header-space">&nbsp;</div>
    </th>
    </tr>
    </thead>

<tbody class="report-content">
  <tr>
   <td class="report-content-cell">
   
   
    
  <section class="main-body">
	<div class="print_forma  col-xs-12 ">
	
		<div class="piece-box" >
			<div class="piece-body hl">
				<div class="col-xs-12">
					<p>الحمد لله رب العالمين والصلاة والسلام على من لا نبي بعده ,, وبعد</p>
					<p>
                 
                 تقرير إجتماع أعضاء مجلس إدارة الجمعيه الخيريه لرعايه الايتام ببريده -ابناء
   
   <?php
                        $date = date('d-m-Y',$row->glsa_date );
                        $dayOfWeek = date("l", strtotime($date));
                        ?>
                    <?php  switch ($dayOfWeek) {
                            case "Saturday":
                                echo  ' يوم السبت بتاريخ ' .' '.$date." م ";
                                break;
                            case "Sunday":
                                echo  ' يوم الاحد بتاريخ' .' '.$date." م ";
                                break;
                            case "Monday":
                                echo  ' يوم الاثنين بتاريخ' .' '.$date." م ";
                                break;
                            case "Tuesday":
                                echo  ' يوم الثلاثاء بتاريخ' .' '.$date." م ";
                                break;
                            case "Wednesday":
                                echo  ' يوم الاربعاء بتاريخ' .' '.$date." م";
                                break;
                            case "Thursday":
                                echo  ' يوم الخميس بتاريخ' .' '.$date." م ";
                                break;
                            case "Thursday":
                                echo  ' يوم الخميس بتاريخ' .' '.$date." م ";
                                break;
                            default:
                                echo  ' يوم' .' '.$date." م ";
                        }


   
    ?>
   الموافق <?php echo $row->glsa_date_h ?> هـ
   في تمام الساعة <?php echo $row->time_start ?>
    فى مقر الجمعية وذلك لمناقشة القرارات والموضوعات المدرجة فى جدول الإجتماع التالي : 
   
                  </p>
                  
            
                  
                  
					<br>
					<ol>
                         <?php
                         if(isset($row->all_bnod)&&!empty($row->all_bnod)){ 
                           foreach ($row->all_bnod as $mehwar) {  ?>            
                  <li><?php echo $mehwar->mehwar_title ?></li>
                  
                   <?php } } ?> 
                    
                    
						
					</ol>
					<br>
					<h5 class="text-center">وعليه فقد قرر المجلس مايلي : </h5>

					<ol>
                <?php 
                    if(isset($row->all_bnod)&&!empty($row->all_bnod)){ 
                           foreach ($row->all_bnod as $mehwar) {  ?>            
                  <li><?php echo $mehwar->elqrar ?></li>
                  
                   <?php } } ?> 
					</ol>
					<br>
					<h5 class="text-center">توقيع أعضاء مجلس الإدارة للجلسة رقم  <?php echo '('. $row->glsa_rkm .')';  ?>  </h5>

					<table class="table no-border-td">
						<tbody>
						
                               <?php 
                    if(isset($row->members)&&!empty($row->members)){ 
                        $xx=0;
                           foreach ($row->members as $member) { 
                             $xx++;
                             ?>    
                           	<tr> 
                               
                     <td><?php echo $xx.' - ' ?></td>
                       <td><?php echo $member->mem_name ?></td>
               
                    	<td>التوقيع : ......................</td>
                        	</tr>
                   <?php } } ?> 
                            
						
                            
                  
					

						</tbody>
					</table>
                    
                  
                     
				</div>	
			</div>
		</div>
	</div>
</section>
</td>
</tr>
</tbody>


<tfoot class="report-footer">
  <tr>
   <td class="report-footer-cell">
       <div class="footer-space">&nbsp;</div>
     
  </td>
</tr>
</tfoot>
</table>
</div>



<div class="header-info">
<img src="<?php echo base_url();?>/asisst/admin_asset/img/pills/raoom_paper_header.png" width="100%"   />
	<div class="col-xs-12 no-padding">
		
			
				<h4 class="green-border  text-center"><span>محضر إجتماع مجلس إدارة الجمعية رقم ( <?php echo $row->glsa_rkm ?>  )     </span></h4>
		
			
		</div>
</div>


<div class="footer-info" >
<div class="col-xs-12 no-padding ">
<img src="<?php echo base_url();?>/asisst/admin_asset/img/pills/raoom_paper_footer.png" width="100%"   />
</div>
</div>
  
    
    
 </div>   
    
    
<?php } ?>  
 <?php } ?>

<script type="text/javascript" src="<?php echo base_url();?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url();?>/asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url();?>/asisst/admin_asset/js/custom.js"></script>


<script>

    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url(); ?>md/all_glasat/all_glasat/all_mahadrs";
    }, 3000);
</script>




