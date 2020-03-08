
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">



    <style type="text/css">
        @import url(fonts/ht/HacenTunisia.css);
        @import url(fonts/hl/HacenLinerScreen.css);
        @import url(fonts/ge/ge.css);

        body {
            font-family: 'hl';

        }
        .main-body {
            /*
                        background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);
background-image: url(img/paper-bg.png);
background-position: 100% 100%;
background-size: 100% 100%;
background-repeat: no-repeat;*/
            -webkit-print-color-adjust: exact !important;


        }
        .print_forma {
            padding:  0;
            /*border:1px solid #73b300;*/

        }
        .piece-box {
            margin-bottom: 0px;
            /*border: 1px solid #000;*/
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
        .graytd th{
            background-color: #eee;
        }
        .graytd td{
            background-color: white; 
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
            size: 210mm 297mm;
            margin: 160px 10px 180px 10px;

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
            height: 192px;
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
            bottom: 0;
            width: 100%;
        }
        .header-info h4{
            margin-top: 150px;
        }
    </style>



<!--	<div class="first-part">
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
					<td class="report-content-cell">-->
<section class="main-body" id="printdiv">

    <div class="container-fluid">

        <div class="print_forma  col-xs-12">
            <div class="col-xs-12 no-padding" style="margin-top: 20px">
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center">
                    <h4 class="green-border"><span>طلب سداد </span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>


            <div class="piece-box" style="margin-top: 10px">

                <div class="col-xs-11 col-xs-offset-1">
                    <h3 style="font-weight: bold;    margin-top: 10px;"><?php echo $rows[0]->start_laqb_name;?>/<?php echo $rows[0]->to_geha_name;?><span style="float: left;"><?php echo $rows[0]->end_laqb_name;?> </span> </h3>
                </div>
                <div class="col-xs-12 padding-4"> 
                    <?php if(isset($rows[0]->salam) && !empty($rows[0]->salam)){?>
                    <h5><?=$rows[0]->salam ?></h5>
                    <?php } else{ 
                       echo '<h5> السلام عليكم ورحمة الله وبركاته ،،وبعد،،،</h5>'; 
                    }
                    ?>
                    <?php if(isset($rows[0]->debaga) && !empty($rows[0]->debaga)){?>
                    <h5><?=$rows[0]->debaga ?></h5>
                    <?php } else{
                        echo ' <h5>نرفع لسعادتكم الفواتير والمطالبات المستحقة الموضحة بالجدول أدناه و بيانها كالتالي :-   </h5>';
                    }
                    ?>

                </div>
                <div class="col-xs-12 padding-4">
                    <table class="table table-bordered">
                        <thead >
                        <tr class="graytd_">
                            <th class="text-center" style="text-align: center;">
                                م
                            </th>
                            <th class="text-center" style="text-align: center;">
                                التاريخ

                            </th>
                            <th class="text-center" style="text-align: center;">
                                اسم الجهة/المستفيد

                            </th>
                            <th class="text-center" style="text-align: center;">
                                رقم الفاتورة/الحساب
                            </th>
<!--
                            <th class="text-center" style="text-align: center;">
                                مركز التكلفه
                            </th>-->
                            <th class="text-center" style="text-align: center;">
                                البيــــــــــــــــــــــان

                            </th>

                            <th class="text-center" style="text-align: center;">
                                المبلغ

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($rows[0]->details) && !empty($rows[0]->details)){
                            $x=1;
                            foreach ($rows[0]->details as $row){  ?>

                                <tr>
                                    <td><?php echo $x;?></td>
                                    <td><?php echo $row->date_ar;?></td>
                                    <td><?php echo $row->f_geha_name;?></td>
                                    <td><?php echo $row->rkm_fatora;?></td>
                                  <!--  <td><?php echo $row->markz_name;?></td>-->
                                    <td><?php echo $row->byan;?></td>

                                    <td><?php echo $row->f_value;?></td>
                                </tr>

                                <?php $x++ ;  } } ?>


                        </tbody>
                        <tfoot>
                        <th colspan="5" class="gray_background" style="text-align: center;"><?php
                        
                        echo 'مبلغا وقدره :'. $total_ar ;
                        
                        
                        ?></th>
                        <th><?php echo $rows[0]->total_value;?></th>
                        </tfoot>
                    </table>
                </div>
                <div class="col-xs-12 padding-4">

                    <h5>	نأمل التكرم بالإيعاز لمن يلزمه الأمر بعمل اللازم</h5>


                </div>
            </div>
            <div class="piece-box" style="margin-top: 0px">

                <div class="col-xs-12  padding-4">
                    <div class="col-xs-12 no-padding gray_background " >
                        <div class="col-xs-6 padding-4">
                            <h5>	مسؤول الخدمات المساندة/ <?php echo $responsible_name;?> </h5>
                        </div>
                        <div class="col-xs-3 padding-4 text-center">
                            <h5 >	التوقيع/<?php echo $private_responsible_name ;?> </h5>
                        </div>
                        <div class="col-xs-3 padding-4 text-center">
                            <h5 >	التاريخ:<?php echo date("d-m-Y",$rows[0]->date)  ;?>م  </h5>
                        </div>

                    </div>
                </div>




                <div class="col-xs-12  padding-4" style="margin-top: 15px">
                    <div class="col-xs-12 no-padding gray_background text-center " >
                        <h5>	توجيه مدير الشئون المالية والإدارية </h5>

                    </div>
                    <div class="col-xs-12">
                        <h5>- الشئون المالية للمراجعة والتدقيق وعمل اللازم .</h5>
                    </div>


                </div>


                <div class="col-xs-12 padding-4">
                    <div class="col-xs-7 text-center">

                    </div>
                    <div class="col-xs-5 text-center">
                        <h5>  مدير الشئون المالية والإدارية</h5>
                        <h5><?php echo $manager ;?></h5>
                    </div>
                </div>


            </div>














        </div>
    </div>


    <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-6">
            <p class=" text-center" style="margin-bottom: 0;">
                <small> (بواسطة: <?php echo $rows[0]->publisher_name;?> )</small>
            </p>

        </div>
        <div class="col-xs-2">
        </div>
        <div class="col-xs-4">

            <p class=" text-center" style="margin-bottom: 0;">

                <small>تاريخ الطباعة : <?php
                    $str=strtotime(date("d-m-Y"));
                    echo date("d-m-Y",$str);?></small>
            </p>
        </div>


    </div>


</section>



<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>

<script>
/*
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora";
    }, 1000);
</script>
