
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

        .fatora_table.table-bordered > tbody > tr > th, .fatora_table.table-bordered > tbody > tr > td {
            border: 1px solid #000 !important;
            background: #fff !important;;
            border-radius: 0px !important;
            font-size: 17px !important;
            color: black;
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
                    <h4 class="green-border"><span>طلب سلفه </span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>


            <div class="piece-box" style="margin-top: 10px">

              
                <div class="col-xs-12 padding-4">
                <?php
    if (isset($rows) && !empty($rows)) {
        $x = 1;

        foreach ($rows as $row) { ?>

                            
      



<table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>رقم الطلب: </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->t_rkm; ?></td>
            <td style="width: 135px;"><strong> تاريخ الطلب</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->t_rkm_date_m; ?></td>
            <td style="width: 150px;"><strong>اسم الموظف</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->emp_name; ?></td>
        </tr>
        <tr>
            <td><strong>الرقم الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->emp_code_fk; ?></td>
            <td><strong>المسمى الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->job_title; ?></td>
            <td><strong>الأدارة </strong></td>
            <td><strong>:</strong></td>
            <td><?= $row->edara_n;?></td>

        </tr>
        <tr>
            <td><strong>  القسم </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->qsm_n; ?></td>
            <td><strong>قيمه السلفه </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->qemt_solaf; ?></td>
            <td><strong> تاريخ بدايه الخصم</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->khsm_form_date_m; ?></td>
        </tr>
        <tr>
            <td><strong> طريقه سداد السلفه </strong></td>
            <td><strong>:</strong></td>
            <td><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تقسم مره واحده علي الراتب';}
                    elseif($row->sadad_solfa==3){echo 'تقسم شهريا علي الراتب';}
                    ?>
            
            
            </td>
            <td><strong> تاريخ اخر سلفه</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->previous_request_date_m; ?></td>
            <td><strong>سبب السلفه</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->solaf_reason; ?></td>

        </tr>
        </tbody>
    </table>
    <?php }
    } ?>

                </div>
               
            </div>
         














        </div>
    </div>


    <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-6">
            <p class=" text-center" style="margin-bottom: 0;">
                <small> (بواسطة: <?php echo $rows[0]->emp_name;?> )</small>
            </p>

        </div>
        <div class="col-xs-2">
        </div>
        <div class="col-xs-4">

            <p class=" text-center" style="margin-bottom: 0;">

                <small>تاريخ الطباعة : <?php
                    $str=strtotime(date("Y-m-d"));
                    echo date("Y-m-d",$str);?></small>
            </p>
        </div>


    </div>


</section>



<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>

<script>
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/add_solaf";
    }, 1000);
</script>
