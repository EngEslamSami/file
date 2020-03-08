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

        window.location = "<?php echo base_url('Definitions/Disclaimer'); ?>";

    }
</script>
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

/** **/
</style>

<body onload="return printDiv('printdiv')" id="printdiv" >
<section class="print_forma">
		<div class="container-fluid">
			<div class="header">
				<table class="table table-bordered">
					<thead>
						<th style="width:33.3%;" > جميعة بناء</th>
						<th style="width:33.3%;">إخلاء طرف موظف  </th>
						<th style="width:33.3%;"><img src="<?=base_url().'asisst/admin_asset/img'?>/print_logo.png" width="185" height="160"></th>
					</thead>
				</table>
			</div>
			<div class="body_forma">
				<div class="form-group col-xs-6">
					<p><strong>    بيانات الموظف / ة :</strong> <?php echo $all_emp[$records['employees_id_fk']] ?>   </p>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>الاســـــــــــــــم</td>
						<td>السجل المدني</td>
						<td>المسمى الوظيفي</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $all_emp[$records['employees_id_fk']] ?></td>
						<td><?=$records['national_num'] ?></td>
						<td><?php echo $department_jobs[$employees['department']]; ?></td>
					</tr>
				</tbody>
			</table>

			<div class="form-group col-xs-12">
					<p><strong>  الإفادة بأي متعلقات لدى المذكورة  : </strong>     </p>
					<p><strong>1-	الشؤون الادارية</strong></p>
					<p>هل يوجد متعلقات  ؟  <span>
                     <?php
                     $ch ='';
                      if($records['adminstrative_status'] == 1){
                        $ch ='checked="checked"';
                     }
                     
                     
                         $ch2 ='';
                      if($records['adminstrative_status'] == 2){
                        $ch2 ='checked="checked"';
                     }
                      ?>
                    <input type="checkbox" <?=$ch;?> name=""> نعم 
                    </span> <span>
                    <input type="checkbox" <?=$ch2;?> name=""> لا
                    </span>
                      ( نوع المتعلقات إن وجدت) <?=$records['adminstrative_type'];?></p>
				</div>

				<div class="form-group col-xs-6">
					<p><strong> مسئولة القسم  :  </strong><?=$records['adminstrative_manage'];?> </p>
				</div>
				<div class="form-group col-xs-6">
					<p><strong> التوقيع :  </strong> .....................    </p>

				</div>



				<div class="form-group col-xs-12">
					<p><strong> 2-	الشؤون المالية</strong></p>
					<p>هل يوجد متعلقات  ؟  <span>
                    <?php
                     $ch3 ='';
                      if($records['finance_status'] == 1){
                        $ch3 ='checked="checked"';
                     }
                     
                     
                         $ch4 ='';
                      if($records['finance_status'] == 2){
                        $ch4 ='checked="checked"';
                     }
                      ?>
                    
                     <input type="checkbox" <?=$ch3;?> name=""> نعم </span>
                     <span>
                     <input type="checkbox" <?=$ch4;?>  name=""> لا   </span> 
                     ( نوع المتعلقات إن وجدت) <?=$records['finance_type'];?></p>
				</div>

				<div class="form-group col-xs-6">
					<p><strong> مسئولة القسم  :  </strong> <?=$records['finance_manage'];?>  </p>
				</div>
				<div class="form-group col-xs-6">
					<p><strong> التوقيع :  </strong> .....................    </p>

				</div>


                <p>بناءً على ما سبق يتم إخلاء طرف المذكورة الموضح بياناتها أعلاه من <strong> تاريخ   12 /  2 /    14هـ </strong> و ليس عليها أي التزامات تجاه الجمعية .</p>

                <p class="text-center"><br> والله الموفق</p>


				

				<div class="form-group col-xs-12">
					<p><br><strong> مدير الجمعية </strong> </p>

				</div>

                <p class="text-center"><br> <?=$records['manage'];?></p>


			</div>
		</div>
	</section>