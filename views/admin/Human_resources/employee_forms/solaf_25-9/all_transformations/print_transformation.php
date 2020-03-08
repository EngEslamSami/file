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
  						<h4 class="green-border"><span>طلب سلفه</span></h4>
  					</div>
  					<div class="col-xs-4 text-center">

  					</div>
  				</div>


  				<div class="piece-box" style="margin-top: 20px">
  					
  					<div class="piece-body">
  						<div class="col-xs-12 no-padding">
  							<div class="col-xs-12 no-padding under-line">
  								<div class="col-xs-4">
  									<h6>الرقم الوظيفي<span class="valu"><?php echo $solaf_data->emp_id_fk; ?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>اسم الموظف:<span class="valu"><?php echo $solaf_data->employee; ?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>المسمى الوظيفي<span class="valu"><?php echo $solaf_data->job_title; ?></span></h6>
  								</div>
  							</div>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-4">
  									<h6>الإدارة<span class="valu"> <?php echo $solaf_data->edara_n;?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>القسم<span class="valu"><?php echo $solaf_data->qsm_n;?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6>تاريخ الطلب<span class="valu"><?php echo $solaf_data->t_rkm_date_m;?></span></h6>
  								</div>
  							</div>
     
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-6">
  									<h6>تاريخ بداية الخصم من يوم  <?php echo $solaf_data->khsm_form_date_m;?>  </h6>
  								</div>
  								<div class="col-xs-6">
  									<h6>تاريخ نهاية الخصم من يوم  <?php echo $solaf_data->khsm_to_date_m;?> </h6>
  								</div>
  							</div>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-6">
  									<h6>قيمه السلفه : (  <?php echo $solaf_data->qemt_solaf;?> )  ريال<span class="valu"></span></h6>
  								</div>
								 
<div class="col-xs-6">
  									<h6>طريقة سداد السلفة : (  <?php if($solaf_data->sadad_solfa==1){echo 'دفع نقدا';}elseif($solaf_data->sadad_solfa==2){echo ' تقسم مره واحده علي الراتب';}
                    elseif($solaf_data->sadad_solfa==3){echo 'تقسم شهريا علي الراتب';}
                    ?> )  ريال<span class="valu"></span></h6>
  								</div>
  								
  							</div>
  							<div class="col-xs-12 no-padding under-line ">
  								<div class="col-xs-8">
  									<h6>  عدد الاقساط<span class="valu"><?php echo $solaf_data->qst_num;?></span></h6>
  								</div>
  								<div class="col-xs-4">
  									<h6> قيمه القسط<span class="valu"><?php if($solaf_data->qst_num>0){echo round( ($solaf_data->qemt_solaf/$solaf_data->qst_num)*100)/100; }?></span></h6>
  								</div>
  							</div>
  							
  						</div>
  					</div>

  				</div>


  				



  				<div class="piece-box">
  					<div class="piece-heading">
  						<h6> المدير المباشر</h6>
  					</div>
  					<div class="piece-body" >
                <?php if($solaf_data->action_direct_manager ==1){?>
  						<div class="col-xs-12 under-line">
                <input type="radio" id="accept-1" checked  name="action2" value="1">
        <label class="radio-inline"> أوافق على سلفه الموظف المذكور أعلاه
                    </label>

  						</div>
                <?php }elseif ($solaf_data->action_direct_manager ==2){ ?>
  						<div class="col-xs-12 under-line">

  							<label class="radio-inline">
  								<input type="radio" checked name="action2" id="inlineRadio7" value="option1">  لا أوافق بسبب   <?php echo$solaf_data->reason_action; ?>
  							</label>
  						</div>
                  <?php   } ?>

  					</div>
  					<div class="piece-footer">
  						<div class="col-xs-4">
  							<h6>الإسم : <span class="valu"><?= $solaf_data->direct_manager_n; ?></span></h6>
  						</div>
  						<div class="col-xs-4">
  							<h6>التوقيع : <span class="valu"></span></h6>
  						</div>
  						<div class="col-xs-4">
  							<h6>التاريخ : <span class="valu"><?= date('d-m-Y') ?></span></h6>
  						</div>
  					</div>
  				</div>


  				<div class="piece-box" >
  					<div class="piece-heading">
  						<h6 class="text-center"> إفادة شؤون الماليه</h6>
  					</div>
  					<div class="piece-body" >
  						<div class="col-xs-12 under-line ">
  							<div class="col-xs-3">
  								<h6>سبق له التمتع بـ : </h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>حد السلفه : </h6>
  							</div>
  						
  							
  						</div>
  						<div class="col-xs-12 under-line">
  							<div class="col-xs-3">
  								<h6>( <?php echo $solaf_data->num_previous_requests;?> )سلفه</h6>
  							</div>
  							<div class="col-xs-3">
  								<h6>(  <?php echo   $solaf_data->hd_solfa;?> )  ريال</h6>
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
  						<div class="col-xs-12 under-line">
  							<h6>&nbsp مدير الموارد البشرية</h6>
  						</div>
  						<div class="col-xs-12  ">
                    <?php if($solaf_data->action_moder_hr ==1){?>
  							<div class="col-xs-12 under-line">
  								<label class="radio-inline">
  									<input type="radio"  checked name="inlineRadioOptions6" id="inlineRadio7" value="option1"> تم التأكد من جميع البيانات والتواقيع أعلاه ولا مانع من تمتع الموظف بالسلفه
  								</label>
  							</div>
                    <?php }elseif ($solaf_data->action_moder_hr ==2){ ?>
  							<div class="col-xs-12 under-line">

  								<label class="radio-inline">
  									<input type="radio" checked  name="inlineRadioOptions1" id="inlineRadio7" value="option1"> لا أوافق بسب   <?php echo$solaf_data->reason_action; ?>
  								</label>
  							</div>
                  <?php   } ?>
  						</div>
  						<div class="col-xs-12 under-line">
  							<div class="col-xs-4">
  								<h6>مدير الجمعيه : <span class="valu"><?php  if(!empty($level_4data->to_user_n)){ echo$level_4data->to_user_n;} ?></span></h6>
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



  			</div>
  		</div>
  		<div class="footer-info">

  			<div class="col-xs-12 no-padding print-details-footer">
  				<div class="col-xs-6">
  					<p class=" text-center" style="margin-bottom: 0;">
  						<small> (بواسطة: نايف الحربي )</small>
  					</p>

  				</div>
  				<div class="col-xs-2">
  				</div>
  				<div class="col-xs-4">

  					<p class=" text-center" style="margin-bottom: 0;">
  						<small>تاريخ الطباعة : 20/5/2019</small>
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
