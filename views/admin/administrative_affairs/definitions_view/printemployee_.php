<!DOCTYPE html>
<html lang="en">
    <head> 
   <link href="<?php echo base_url();?>asisst/layout/bootstrap-arabic.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/screen.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/strap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/strap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/strap-toggle.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/bootstrap-formhelpers.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/checkBo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/layout.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/content.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/style_admin.css" rel="stylesheet" type="text/css">

    <style>
        .no-padding {
            padding-right: 0px;
        }
        .r-connect {
            background-color: #fff;
            padding: 5px 0;
            border: 1px solid #555;
            border-radius: 15px;
           /*margin-bottom: 20px;*/
        }
        .header_ul {
            text-align: right;
        }
        .header_ul li {
            padding: 10px;
            border: 1px solid #eee;
        }
        .r-form-padding {
            padding: 0;
        }
        .r-connect hr {
            border-top: 2px solid #333 !important;
        }
        .r-title-form-second {
            border: 1px solid #333;
            border-radius: 25px;
            padding: 7px 28px;
            line-height: 23px;
        }
        .border_box {
            padding: 10px;
            border: 1px solid #eee;
        }
    </style>
    </head>
<style type="text/css">

	.print_forma table th{
		text-align: center;
	}
	.print_forma table tr th{
		vertical-align: middle;	
	}
	.body_forma{
		margin-top: 40px;
	}
</style>
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

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        window.location = "<?php echo base_url('Definitions/Definition_employee'); ?>";

    }
</script>

<body onload="return printDiv('printdiv')" id="printdiv">
<section class="print_forma">
		<div class="container-fluid">
			<h5 class="text-center"> <strong>تعريف موظفة</strong></h5><br><br>

			<h5 class="text-center"> <strong>السادة/ </strong> أعضاء مجلس الإدارة   </h5>
			<p  class="text-center">حفظكم الله</p><br><br><br><br>




			<p  class="text-center">السلام عليكم ورحمة الله وبركاته ...</p><br>

			<p class="lead">نفيدكم بأن / <?php echo $all_emp[$records['employees_id_fk']] ?>  سجل مدني رقـم (   <?=$records['national_num'] ?>  ) , تعمل في جمعية الملك عبدالعزيز الخيرية النسائية (عون) بالقصيم – بريدة , بوظيفة  <?php echo $department_jobs[$employees['department']]; ?>          
                    منذ تاريخ هـ<?=$records['work_date'] ?>   وتتقاضى راتب شهري قدره ( <?=$records['salary']?> ) ريال , وأعطى لها هـذا بناءً على طلبها لتقديمـه لكم و ليس على الجمعية أدنى مسؤولية تجاه المذكورة . <br><br></p>


			<h5  class="text-center">ولكم خالص تحياتنا ...</h5><br><br>

			<h5  class="text-center"><strong>مديرة الجمعية</strong>  </h5>
			<h5  class="text-center"><strong>تغريد صالح الدواس</strong> </h5>

		</div>
	</section>
    </body>
    </html>