
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >


<style type="text/css">
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
    p.empty_label {
        margin: 6px 0 0px 0px;
    }
    p.right_p{
        text-align: right;
    }
    input[type=radio], input[type=checkbox] {
        height: auto;
        width: auto;
    }
</style>



	<style type="text/css" >
	.print_forma{
		border:1px solid ;
		padding: 15px;
	}
	.print_forma table th{
		text-align: right;
		font-size: 12px;
	}
	.print_forma table tr th{
		vertical-align: middle;	
	}
	.body_forma{
		margin-top: 40px;
	}
	.no-padding{
		padding: 0;
	}
	.heading{
		font-weight: bold;
		text-decoration: underline;
	}
	.print_forma hr{
		border-top: 1px solid #000;
		margin-top: 7px;
		margin-bottom: 7px;
	}

	.myinput.large{
		height:22px;
		width: 22px;
	}

	.myinput.large[type="checkbox"]:before{
		width: 20px;
		height: 20px;
	}
	.myinput.large[type="checkbox"]:after{
		top: -20px;
		width: 16px;
		height: 16px;
	}
	.checkbox-statement span{
		margin-right: 3px;
		position: absolute;
		margin-top: 5px;
	}
	.header p{
		margin: 0;
	}
	.header img{
		height: 90px;
	}
	.no-border{
		border:0 !important;
	}
	.table-devices tr td{
		min-height: 20px
	}
	.gray_background{
		background-color: #eee;

	}
	.no-margin{
		margin: 0;
	}

	
	@media print {
		.gray_background{
			background-color: #eee;

		}
		body {
			-webkit-print-color-adjust: exact;
		}
		.print-format th {
			background-color: //your color
		}
	}
</style>
<div id = "printdiv" >


    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p> الجمعية الخيرية لرعاية الأيتام بالمنطقة الشرقية (بناء) </p>
            <p> الجمعية الخيرية لرعاية الأيتام بالمنطقة الشرقية (بناء)</p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بالمنطقة الشرقية (بناء)</p>
            <p> الجمعية الخيرية لرعاية الأيتام بالمنطقة الشرقية (بناء)</p>
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>طباعة اقامة نشاط </strong></h5><br>
    </div>
  
  
  
    <?php if(isset($records) && !empty($records) && $records!=null){?>
    <?php foreach( $records as $row){?>
   	<section class="main-body">
		<div class="container-fluid">
			<div class="print_forma no-border col-xs-12 no-padding">
				<div class="personality">


					<div class="col-xs-12">
						<table class="table table-bordered table-devices no-margin">
							<tbody>
								<tr>
									<th class="gray_background" style="width: 30%">إسم البرنامج</th>
									<td> <?php echo $row->program ?> </td>
								</tr>
								<tr>
									<th class="gray_background" style="width: 30%">إسم النشاط </th>
                                       <td><?php echo $row->activity ?> </td>
								</tr>
                                	<tr>
									<th class="gray_background" style="width: 30%">عدد المستهدفين </th>
                                       <td><?php  echo $row->num ?> </td>
								</tr>
							</tbody>
						</table>
						<div class="clearfix"></div>

						<div class="col-xs-6 no-padding">
							<br>
							<table class="table table-bordered table-devices no-margin">
								<thead>
									<th class="gray_background">أهداف البرنامج</th>
								</thead>
								<tbody>
									<tr>
										<td>
											<?php  echo $row->prog_goals ?>
										</td>
									</tr>


								</tbody>
							</table>
						
						</div>

						<div class="clearfix"></div>

						<!-- **************************************  -->
						<div class="col-xs-12 no-padding">
							<br>
							<table class="table table-bordered table-devices no-margin">
								<tbody>
									<tr>
										<th class="gray_background" style="width: 30%">مدة البرنامج بالأيام</th>
										<td>
                                        <?php 
                                            $dif = strtotime($row->to_date) - strtotime($row->from_date);
                                         echo round($dif / (60 * 60 * 24)); 
                                       ?>
                                        
                                         </td>

										<th class="gray_background" style="">الفترة </th>
										<td> من</td>
										<td style="width: 20%" > <?php  echo $row->from_date ?></td>

										<td> إلى</td>
										<td style="width: 20%"> <?php  echo $row->to_date ?></td>
										
									</tr>

								</tbody>
							</table>
					
						</div>

						<div class="clearfix"></div>


						<!-- **************************************  -->

						<!-- **************************************  -->
					<!--	<div class="col-xs-12 no-padding">
							<br>
							<table class="table table-bordered table-devices no-margin">
								<tbody>
									<tr>
										<th class="gray_background" style="width: 20%">فئة المستفيدين</th>
										<td> </td>

										<th class="gray_background" style="width: 20%">عدد المستهدفين</th>										
										<td> <?php  echo $row->num ?></td>
										
										
									</tr>

								</tbody>
							</table>
						
						</div> -->

						<div class="clearfix"></div>


						<!-- **************************************  -->



						<div class="col-xs-6 no-padding">
							<br>
							<table class="table table-bordered table-devices no-margin">
								<thead>
									<th class="gray_background">فقرات البرنامج</th>
								</thead>
								<tbody>
									<tr>
										<td>
											<ol>
                                    	<?php if(!empty($row->items)){
                                    	      foreach ($row->items as $sub_item){ ?>
												    <li><?=$sub_item->title?></li>
											<?php 	}?>
                                            <?php 	}?>
											</ol>
										</td>
									</tr>


								</tbody>
							</table>
							
						</div>
						<div class="col-xs-6 ">
							<br>
							<table class="table table-bordered table-devices no-margin">
								<thead>
									<th class="gray_background" colspan="2">فريق العمل</th>
								</thead>
								<tbody>
                                	<?php if(!empty($row->members)){
                                    	  $x=1;    foreach ($row->members as $sub_members){ ?>
									<tr>
										<td><?=$x?></td>
										<td><?=$sub_members->name?></td>
									</tr>
                                  	<?php $x++;	}?>
                                   <?php 	}?>
								</tbody>
							</table>
						
						</div>

						<div class="clearfix"></div>


						<!-- **************************************  -->
						<div class="col-xs-12 no-padding">
							<br>
							<table class="table table-bordered table-devices no-margin">
								<thead>
									<th class="gray_background" colspan="4">التكاليف المالية للبرنامج</th>
								</thead>
								<thead>
									<th class="gray_background">م</th>
									<th class="gray_background">البند</th>
									<th class="gray_background">التكلفة التقديرية</th>
									<th class="gray_background">الإيضاحات</th>
								</thead>
								<tbody>
										<?php if(!empty($row->finance)){
                                    	 $total_cost=0; $x=1;    foreach ($row->finance as $sub_finance){ ?>
									<tr>
										<td><?=$x?></td>
										<td><?=$sub_finance->title?></td>
                                        <td><?=$sub_finance->cost?></td>
										<td><?=$sub_finance->notes?></td>
									</tr>
                                  	<?php $x++;	$total_cost+=$sub_finance->cost; }?>
                                   <?php 	}?>

								</tbody>
								<tfoot>
									<th colspan="2">الإجمالى</th>
									<th><?=$total_cost?></th>
									<th></th>
								</tfoot>
							</table>
						
						</div>

						<div class="clearfix"></div>

						<!-- **************************************  -->

						<div class="col-xs-12">
							<div class="col-xs-6 text-center">
								<p>مسئولة البرامج</p>
								<p>........</p>
							</div>
							<div class="col-xs-6 text-center">
								<p>مديرة القسم</p>
								<p>........</p>
							</div>
						</div>
						



					</div>



				</div>

<?php }?>
<?php }?>







			</div>
		</div>
	</section>





</div>

<script >
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.close();
    }, 0);
</script >


