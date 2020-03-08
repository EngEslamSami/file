<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">



<style type="text/css">
  @import url(fonts/ht/HacenTunisia.css);
  @import url(fonts/hl/HacenLinerScreen.css);
  @import url(fonts/ge/ge.css);

  body {
    font-family: 'hl';

  }
  .main-body {

    background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);
background-image: url(img/paper-bg.png);
background-position: 100% 100%;
background-size: 100% 100%;
background-repeat: no-repeat;
-webkit-print-color-adjust: exact !important;
height: 295mm;

}
.print_forma {
padding: 100px 0 50px 0;
/*border:1px solid #73b300;*/

}
.piece-box {
margin-bottom: 8px;
border: 1px solid #000;
display: inline-block;
width: 100%;
}
.piece-heading {
background-color: #eee;
display: inline-block;
float: right;
width: 100%;
padding: 3px;
color: #000;
}
.piece-body {

width: 100%;
float: right;
}
.bordered-bottom{
border-bottom: 1px solid #000;
}
.piece-footer{
display: inline-block;
float: right;
width: 100%;
border-top: 1px solid #000;
}
.piece-heading h5 {
margin: 4px 0;
}
.piece-box table{
margin-bottom: 0
}
.piece-box table th,
.piece-box table td
{
padding: 2px 8px !important;
}

h6 {
font-size: 17px;
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
.header p{
margin: 0;
}
.header img{
height: 120px;
width: 100%
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
border-top: 1px solid #000;
margin-top: 7px;
margin-bottom: 7px;
}

.no-border{
border:0 !important;
}

.gray_background{
background-color: #eee;

}
.graytd th,.graytd td{
background-color: #eee;
}
@media print{
.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
}
}
.footer img{
width: 100%;
height: 120px;
}
@page {
size: A4;
margin: 20px 0 0;
}

.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
border: 1px solid #000;
font-size: 17px;
}
.under-line{
border-top: 1px solid #000;
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
.under-line .col-xs-5 ,
.under-line .col-xs-6 ,
.under-line .col-xs-8
{
border-left: 1px solid #000;
}

.green-border span {
border: 6px double #000;
padding: 4px 25px;
border-radius: 10px;
box-shadow: 2px 2px 5px 2px #000;
}
label.radio-inline{
font-size: 17px;
}

.footer-info {
position: absolute;
width: 100%;
bottom: 65px;
}


@media print {

.table-bordered  th, .table-bordered  td {
  border: 1px solid #000 !important

}

}


@page {
size: 210mm 297mm  ;
margin: 0;

}


</style>


<body onload="printDiv('printDiv')" id="printDiv">


  <div class="container-fluid">

  			<div class="print_forma  col-xs-12">
  			<div class="col-xs-12 no-padding">
  					<div class="col-xs-3 text-center">

  					</div>
  					<div class="col-xs-5 text-center">
  						<h4 class="green-border"><span>طلب إجازة</span></h4>
  					</div>
  					<div class="col-xs-4 text-center">

  					</div>
  				</div>


  				<div class="piece-box" style="margin-top: 20px">
  					<div class="piece-heading">
  						<div class="col-xs-2">
  							<h5>نوع الإجازة : </h5>
  						</div>
  						<div class="col-xs-2">
  							<label class="radio-inline">
  							 <?php echo $agaza_data->no3_title; ?>
  							</label>
  						</div>
  					</div>
  					<div class="piece-body">
  						<div class="col-xs-12 no-padding">
  							<div class="col-xs-12 no-padding under-line">
  								<div class="col-xs-4">
  									<h6>الرقم الوظيفي<span class="valu"><?php echo $agaza_data->emp_id_fk; ?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>اسم الموظف:<span class="valu"><?php echo $agaza_data->employee; ?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>المسمى الوظيفي<span class="valu"><?php echo $agaza_data->job_title; ?></span></h6>
  								</div>
  							</div>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-4">
  									<h6>الإدارة<span class="valu"> <?php echo $agaza_data->edara_n;?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>القسم<span class="valu"><?php echo $agaza_data->qsm_n;?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>تاريخ الطلب<span class="valu"><?php echo date('d-m-Y',$agaza_data->agaza_date);?></span></h6>
  								</div>
  							</div>
                <?php $from =explode('/',$agaza_data->agaza_from_date_m);
                $from =$from[2].'/'.$from[0].'/'.$from[1];
                $to =explode('/',$agaza_data->agaza_to_date_m);
                $to =$to[2].'/'.$to[0].'/'.$to[1];

                  ?>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-6">
  									<h6>تاريخ بداية الإجارة من يوم &nbsp&nbsp&nbsp    <?php echo $agaza_data->agaza_from_day_n;?>  الموافق<span class="valu"><?php echo $from;?></span></h6>
  								</div>
  								<div class="col-xs-6">
  									<h6>تاريخ نهاية الأجازة من يوم &nbsp&nbsp&nbsp <?php echo $agaza_data->agaza_to_day_n;?> الموافق<span class="valu"><?php echo $to;?></span></h6>
  								</div>
  							</div>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-6">
  									<h6>عدد أيام الإجازة المطلوبة : (  <?php echo $agaza_data->num_days;?> )  أيام/يوماً<span class="valu"></span></h6>
  								</div>
                  <?php

                  $mobashret =explode('/',$agaza_data->mobashret_amal_date_m);
                  $mobashret =$mobashret[2].'/'.$mobashret[0].'/'.$mobashret[1];

                    ?>

  								<div class="col-xs-6">
                    <h6> تاريخ المباشرة للعمل : يوم <?php echo$agaza_data->mobashret_amal_day_n;?> الموافق <span class="valu"><?php echo $mobashret;?></span></h6>
  								</div>
  							</div>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-8">
  									<h6>العنوان أثناء الإجازة<span class="valu"><?php echo $agaza_data->address_since_agaza;?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>رقم الجوال<span class="valu"><?php echo $agaza_data->emp_jwal;?></span></h6>
  								</div>
  							</div>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-8">
  									<label class="radio-inline">
  										نعم  أتعهد بتسليم كل مهامي للموظف البديل والعودة من إجازتي في الموعد المحدد
  									</label>

  								</div>
  								<div class="col-xs-4">
  									<h6>التوقيع<span class="valu"></span></h6>
  								</div>
  							</div>
  						</div>
  					</div>

  				</div>

          <?php  if ($agaza_data->level > 1   ) {
            if (!empty($agaza_data->emp_badel_n)) {
                             ?>

  				<div class="piece-box">
  					<div class="piece-heading">
  						<h6>الموظف البديل</h6>
  					</div>
  					<div class="piece-body">
  						<div class="col-xs-12 under-line ">
  							<div class="col-xs-6">
  								<h6>اسم الموظف : <span class="valu"><?= $agaza_data->emp_badel_n ?></span></h6>
  							</div>
  							<div class="col-xs-6">
  								<h6>التاريخ : <span class="valu"><?= date('d-m-Y') ?></span></h6>
  							</div>
  						</div>

  						<div class="col-xs-12 under-line ">
  							<div class="col-xs-8">
                    <?php if($agaza_data->action_emp_badel ==1){?>
                      <label class="radio-inline">
                          نعم أتعهد بأن أقوم باستلام جميع الأعمال الموكلة للموظف المذكورة أعلاه قبل موعد إجازته وتنفيذها في مواعيدها
                        </label>
                      <?php }elseif ($agaza_data->action_emp_badel ==2){ ?>

                        <label class="radio-inline">لا أوافق بسبب
                          <?php echo$agaza_data->reason_action; ?>
                        </label>

                        <?php } ?>
  							</div>
  							<div class="col-xs-4">
  								<h6>التاريخ : <span class="valu"></span></h6>
  							</div>
  						</div>
  					</div>
  				</div>

        <?php } }?>
            <?php  if ($agaza_data->level > 2  ) {   ?>
  				<div class="piece-box">
  					<div class="piece-heading">
  						<h6> المدير المباشر</h6>
  					</div>
  					<div class="piece-body" >
                <?php if($agaza_data->action_direct_manager ==1){?>
  						<div class="col-xs-12 under-line">

              <label class="radio-inline"> أوافق على أجازة الموظف المذكور أعلاه وسيتم تسليم أعماله
                        للموظف البديل </label>

        						</div>
                      <?php }elseif ($agaza_data->action_direct_manager ==2){ ?>
        						<div class="col-xs-12 under-line">

  							<label class="radio-inline">
  								:  لا أوافق بسبب   <?php echo$agaza_data->reason_action; ?>
  							</label>
  						</div>
                  <?php   } ?>

  					</div>
  					<div class="piece-footer">
  						<div class="col-xs-4">
  							<h6>الإسم : <span class="valu"><?= $agaza_data->direct_manager_n; ?></span></h6>
  						</div>
  						<div class="col-xs-4">
  							<h6>التوقيع : <span class="valu"></span></h6>
  						</div>
  						<div class="col-xs-4">
  							<h6>التاريخ : <span class="valu"><?= date('d-m-Y') ?></span></h6>
  						</div>
  					</div>
  				</div>
        <?php } ?>

        <?php  if ($agaza_data->level > 3  ) {   ?>

  				<div class="piece-box" >
  					<div class="piece-heading">
  						<h6 class="text-center"> إفادة شؤون الموظفين</h6>
  					</div>
  					<div class="piece-body" >
  						<div class="col-xs-12 under-line ">
  							<div class="col-xs-3">
  								<h6>سبق له التمتع بـ : </h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>عدد أيام الإجازة المستحقة : </h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>عدد أيام الإجازة المطلوبة : </h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>الرصيد المتبقي من الإجازة : </h6>
  							</div>
  						</div>
  						<div class="col-xs-12 under-line">
  							<div class="col-xs-3">
  								<h6>( <?php echo $agaza_data->past_vacations;?>  )  أيام/يوماً</h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>(  <?php echo   $agaza_data->rseed_vacations;?> )  أيام/يوماً</h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>( <?php echo   $agaza_data->num_days;?>  )  أيام/يوماً</h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>(  <?php echo ($agaza_data->rseed_vacations - $agaza_data->num_days);?> )  أيام/يوماً</h6>
  							</div>
  						</div>

  						<div class="col-xs-12 under-line ">
  							<div class="col-xs-4">
  								<h6>الموظف المختص : <span class="valu"><?php  if(!empty($level_3data->to_user_n)){ echo$level_3data->to_user_n;} ?></span></h6>
  							</div>
  							<div class="col-xs-4">
  								<h6>التوقيع : <span class="valu"></span></h6>
  							</div>
  							<div class="col-xs-4">
  								<h6>التاريخ : <span class="valu"><?php  if(!empty($level_2data->date)){  echo date('d-m-Y',$level_2data->date); } ?></span></h6>
  							</div>
  						</div>
              <?php  if ($agaza_data->level > 4  ) {   ?>

  						<div class="col-xs-12 under-line">
  							<h6>&nbsp مدير الموارد البشرية والشؤون الإدارية</h6>
  						</div>
  						<div class="col-xs-12  ">
                    <?php if($agaza_data->action_moder_hr ==1){?>
  							<div class="col-xs-12 under-line">
  								<label class="radio-inline">
  									 تم التأكد من جميع البيانات والتواقيع أعلاه ولا مانع من تمتع الموظف بالإجازة
  								</label>
  							</div>
                    <?php }elseif ($agaza_data->action_moder_hr ==2){ ?>
  							<div class="col-xs-12 under-line">

  								<label class="radio-inline">
  									: لا أوافق بسب   <?php echo$agaza_data->reason_action; ?>
  								</label>
  							</div>
                  <?php   } ?>
  						</div>
  						<div class="col-xs-12 under-line">
  							<div class="col-xs-4">
  								<h6>الإسم : <span class="valu"><?php  if(!empty($level_4data->to_user_n)){ echo$level_4data->to_user_n;} ?></span></h6>
  							</div>
  							<div class="col-xs-4">
  								<h6>التوقيع : <span class="valu"></span></h6>
  							</div>
  							<div class="col-xs-4">
  								<h6>التاريخ : <span class="valu"><?php  if(!empty($level_3data->date)){  echo date('d-m-Y',$level_3data->date); } ?></span></h6>
  							</div>
  						</div>
              <?php } ?>


  					</div>
  					<div class="piece-footer">

  					</div>
  				</div>
            <?php } ?>
              <?php  if ($agaza_data->level > 5  ) {   ?>

  				<div class="piece-box" >
  					<div class="piece-heading">
  						<h6 class="text-center">مدير عام الجمعية </h6>
  					</div>
  					<div class="piece-body" >
  					
  						<div class="col-xs-12  ">
                    <?php if($agaza_data->action_moder_final ==1){?>
  							<div class="col-xs-12 under-line">
  								<label class="radio-inline">
  									نعم اوافق
  								</label>
  							</div>
                    <?php }elseif ($agaza_data->action_moder_final ==2){ ?>
  							<div class="col-xs-12 under-line">

  								<label class="radio-inline">
  									: لا أوافق بسب   <?php echo$agaza_data->reason_action; ?>
  								</label>
  							</div>
                  <?php   } ?>
  						</div>
  						<div class="col-xs-12 under-line">
  							<div class="col-xs-4">
  								<h6>الإسم : <span class="valu"><?php  if(!empty($level_5data->to_user_n)){ echo$level_4data->to_user_n;} ?></span></h6>
  							</div>
  							<div class="col-xs-4">
  								<h6>التوقيع : <span class="valu"></span></h6>
  							</div>
  							<div class="col-xs-4">
  								<h6>التاريخ : <span class="valu"><?php  if(!empty($level_3data->date)){  echo date('d-m-Y',$level_3data->date); } ?></span></h6>
  							</div>
  						</div>
              


  					</div>
  					<div class="piece-footer">

  					</div>
  				</div>
            <?php } ?>


  			</div>
  		</div>
  		<div class="footer-info">

        <div class="col-xs-12 no-padding print-details-footer">
  				<div class="col-xs-6">
  					<p class=" text-center" style="margin-bottom: 0;">
              <small>(اسم الموظف القائم بالإدخال أو
                      الطباعة) /
                      <?php echo $UserName ?> </small>
  					</p>

  				</div>
  				<div class="col-xs-2">
  				</div>
  				<div class="col-xs-4">

  					<p class=" text-center" style="margin-bottom: 0;">
              <small>تاريخ الطباعة :
                      <?= date('d-m-Y h:i a ') ?></small>
  					</p>
  				</div>


  			</div>


  		</div>





  <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
  <script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
  <script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>

  <script language="javascript" type="text/javascript">
    function printDiv(divID) {
      //Get the HTML of div
      var divElements = document.getElementById(divID).innerHTML;
      //Get the HTML of whole page
      var oldPage = document.body.innerHTML;

      //Reset the page's HTML with div's HTML only
      document.body.innerHTML =
        "<html><head><title></title></head><body>" +
        divElements + "</body>";

      //Print Page
      window.print();
      window.close();
      //Restore orignal HTML
      document.body.innerHTML = oldPage;


    }
  </script>
