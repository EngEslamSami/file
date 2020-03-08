<style type="text/css">

	.table-blue thead th {
    background-color: #428bca;
    color: #f5f5f5;
}
.btn-pxs{
	padding: 2px 5px;
}
.cs-label {
    font-size: 14px;
    font-weight: normal;
}
.top_radio input[type=radio] {
    height: 24px;
    width: 24px;
    line-height: 0px;
    vertical-align: middle;
    margin-right: -33px;
    top: -5px;

}
.top_radio .radio,.top_radio .radio {
    vertical-align: middle;
    font-size:16px;

    padding: 10px;
    border-bottom: 2px solid #eee;
    border-radius: 8px;
    text-align: right;

}
.radio input[type="radio"] {
    opacity: 1;
}
span{
    font-size: 12px !important;
    font-weight:normal !important;
}
.th_bgcolor{
    background-color: #c39610 !imoprtant;
}

</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $title?></h3>
	</div>
	<div class="panel-body">

    <?php


    ?>

		<div>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="<?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'in_cheque'){
				        echo active;
				    }
				}else{?>  active <?php } ?>"><a href="#in_cheque" aria-controls="in_cheque" role="tab" data-toggle="tab">
               <i style="color: #00a070 !important;"  class="fa fa-files-o" aria-hidden="true"></i>

                الشيكات الواردة</a></li>
				<li role="presentation" class="<?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'out_cheque'){?>
				         active
				  <?php  }
				}?>"><a href="#out_cheque" aria-controls="out_cheque" role="tab" data-toggle="tab">
                <i style="color: #d89629 !important;"  class="fa fa-paper-plane-o" aria-hidden="true"></i>


                الشيكات الصادرة</a></li>
                
                
                	<li role="presentation" class="<?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'canceled_cheque'){?>
				         active
				  <?php  }
				}?>"><a href="#canceled_cheque" aria-controls="canceled_cheque" role="tab" data-toggle="tab">
                   <i style="color: red !important;" class="fa fa-window-close-o" aria-hidden="true"></i>


                الشيكات الملغية</a></li>

			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade <?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'in_cheque'){
				        echo in; echo active;
				    }
				}else{?> in active<?php } ?>" id="in_cheque">

                    <?php

                 /*   echo('<pre>');
                    print_r($sheeks_qabd);   */

                   //    echo('<pre>');


                //    print_r($all_banks_accounts);



                     if(!empty($sheeks_qabd)){ ?>
					<table class="table table-hover table-bordered table-striped table-blue example">
						<thead>
                           <tr class="blacktd">
    							<th  >م</th>
    							<th >نوع السند</th>
    							<th >رقم السند</th>
    							<th >تاريخ السند</th>
    							<th >الإسم</th>
    							<th >رقم الشيك</th>
    							<th >البنك</th>
    							<th >رقم الحساب</th>
    							<th >تاريخ الشيك</th>
    							<th >المبلغ</th>
    							<th >التفاصيل</th>
    							<th >تواجد الشيك</th>
    							<th >حالة الشيك</th>
    							<th >نوع الشيك</th>
                            </tr>
						</thead>
						<tbody>
                        <?php  $count=1; foreach ($sheeks_qabd as $row){



                    $all_bnaks = (array_keys($all_banks_accounts));
                    if( in_array($row->bank_id_fk ,$all_bnaks ) )
                    {
                        $sheek_type =  "عادي ";
                         $sheek_type_class = 'success';
                    }else{
                       $sheek_type =  "مقاصة ";
                       $sheek_type_class = 'danger';
                    }


                         ?>
       <?php
                            //sheek_type_color
                            /*if(isset($row->sheek_type)&&!empty($row->sheek_type)){
                                $sheek_type=$row->sheek_type_name;
                                $sheek_type_color=$row->sheek_type_color;
                            }else{
                                $sheek_type="لم يتم  إختيار الحالة";
                                $sheek_type_color="#E5343D";

                            } */

                            if(isset($row->sheek_status)&&!empty($row->sheek_status)){
                                $sheek_status=$row->sheek_status_name;
                                $sheek_status_color=$row->sheek_status_color;
                                 $sheek_status_class = 'success';

                            }else{
                                $sheek_status=" لم يتم التحصيل";
                                $sheek_status_color="#E5343D";
                                $sheek_status_class = 'primary';


                            }

                            if(isset($row->twaged_sheek)&&!empty($row->twaged_sheek)){
                                $twaged_sheek=$row->twaged_sheek_name;
                                $twaged_sheek_color=$row->twaged_sheek_color;
                                $twaged_sheek_class='warning';

                            }else{
                                $twaged_sheek=" في الخزينة";
                                $twaged_sheek_color="#E5343D";
                                $twaged_sheek_class="success";

                            }
                            ?>


							<tr>
                                <td><?php echo$count;?></td>
								<td>قبض شيك</td>
                                <td><?php echo$row->rqm_sanad_fk?></td>
                                <td><?php if(!empty($row->details->date_sanad_ar)){ echo $row->details->date_sanad_ar; }?></td>
                                <td><?php if(!empty($row->pill_details->person_name)){ echo $row->pill_details->person_name; } ?></td>
                                <td><?php echo $row->sheek_num?></td>
                                <td><?php echo $row->bank_name?></td>
								<td><?php if(!empty($row->pill_details->bank_account_num)){  echo $row->pill_details->bank_account_num; }?></td>
                                <td><?php echo $row->sheek_date_ar?></td>
                                <td><?php   echo $row->sheek_vlaue  ; ?></td>
                                <td><button type="button"  class="btn btn-info btn-xs" onclick="Get_details(<?php echo$row->rqm_sanad_fk;?>,<?php echo $row->sheek_num;?>,'qabd')" data-toggle="modal"  data-target="#myModalbyan"><i class="fa fa-list"></i></button></td>
                                <td>

                                    <!--
                                    <button type="button" data-text="" style="background-color: <?=$twaged_sheek_color?>" class="btn btn-info btn-xs" ><?php echo$twaged_sheek?></button>
                                        -->
                               <span class="label label-<?=$twaged_sheek_class?>"><?php echo $twaged_sheek; ?></span>



                                    </td>
                                <td>
                                     <!--
                                  <button type="button" data-text="" style="background-color: <?=$sheek_status_color?>"   class="btn btn-info btn-xs" ><?php echo $sheek_status?>
                                  </button>
                                  -->
                                <span class="label label-<?=$sheek_status_class?>"><?php echo $sheek_status; ?></span>

                                    </td>
                                <td>
                                    <!--
                                    <button type="button" data-text="" style="background-color: <?=$sheek_type_color?>"   class="btn btn-info btn-xs" > <?php echo $sheek_type?></button>
                                        -->


                                  <span class="label label-<?=$sheek_type_class?>" style="width:50px;display: inline-block;"><?php echo $sheek_type; ?></span>
                                    </td>

							</tr>

                            <?php $count ++; } ?>

						</tbody>
					</table>


                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات واردة!</div>
                    <?php  } ?>

                    <!---------------------------الشيكات المحصلة----------------------------->
                    <div class="col-xs-12 text-center">
                        <button type="button" style="margin-top:10px;margin-bottom: 10px;    background-color: #09704e;"  class="btn btn-success btn-labeled btn-next"  data-toggle="collapse" href="#mohsala1" aria-expanded="false" aria-controls="mohsala1"><span class="btn-label"><i class="fa fa-arrow-down" aria-hidden="true"></i></span> الشيكات المحصلة </button>

                    </div>
                    <?php


                     if(!empty($sheeks_qabd_approved)){ ?>
                     <div class="collapse" id="mohsala1">

                        <table class="table table-hover table-bordered table-striped table-blue example">
                            <thead  >
                            <tr class="blacktd">
                                <th  >م</th>
                                <th  >نوع السند</th>
                                <th  >رقم السند</th>
                                <th >تاريخ السند</th>
                                <th >الإسم</th>
                                <th >رقم الشيك</th>
                                <th >البنك</th>
                                <th >رقم الحساب</th>
                                <th >تاريخ الشيك</th>
                                <th >المبلغ</th>
                                <th >التفاصيل</th>
                                <th >تواجد الشيك</th>
                                <th >حالة الشيك</th>
                                <th >نوع الشيك</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $count=1; foreach ($sheeks_qabd_approved as $row){ ?>




                                <?php
                                //sheek_type_color

                 $all_bnaks = (array_keys($all_banks_accounts));
                    if( in_array($row->bank_id_fk ,$all_bnaks ) )
                    {
                        $sheek_type =  "عادي ";
                         $sheek_type_class = 'success';
                    }else{
                       $sheek_type =  "مقاصة ";
                       $sheek_type_class = 'danger';
                    }

              /* if(isset($row->sheek_type)&&!empty($row->sheek_type)){
                                    $sheek_type=$row->sheek_type_name;
                                    $sheek_type_color=$row->sheek_type_color;
                                        $sheek_type_class = 'danger';
                                }else{
                                    $sheek_type="عادى او مقاصة";
                                    $sheek_type_color="#E5343D";
                                     $sheek_type_class = 'success';

                                }*/


                                if(isset($row->sheek_status)&&!empty($row->sheek_status)){
                                    $sheek_status=$row->sheek_status_name;
                                    $sheek_status_color=$row->sheek_status_color;
                                     $sheek_status_class = 'success';

                                }else{
                                    $sheek_status=" لم يتم التحصيل";
                                    $sheek_status_color="#E5343D";
                                    $sheek_status_class = 'primary';

                                }

                                if(isset($row->twaged_sheek)&&!empty($row->twaged_sheek)){
                                    $twaged_sheek=$row->twaged_sheek_name;
                                    $twaged_sheek_color=$row->twaged_sheek_color;
                                    $twaged_sheek_class ='success';

                                }else{
                                    $twaged_sheek=" في الخزينة";
                                    $twaged_sheek_color="#E5343D";
                                    $twaged_sheek_class ='success';

                                }
                                ?>


                                <tr>
<td><?php echo$count;?></td>
<td>قبض شيك</td>
<td><?php echo$row->rqm_sanad_fk?></td>
<td><?php if(!empty($row->details->date_sanad_ar)){ echo $row->details->date_sanad_ar; }?></td>
<td><?php if(!empty($row->pill_details->person_name)){ echo $row->pill_details->person_name; } ?></td>
<td><?php echo $row->sheek_num?></td>
<td><?php echo $row->bank_name?></td>
<td><?php if(!empty($row->pill_details->bank_account_num)){  echo $row->pill_details->bank_account_num; }?></td>
<td><?php echo $row->sheek_date_ar?></td>
     <td><?php   echo $row->sheek_vlaue  ; ?></td>
<td><button type="button"  class="btn btn-info btn-xs" onclick="Get_details(<?php echo$row->rqm_sanad_fk;?>,<?php echo $row->sheek_num;?>,'qabd')" data-toggle="modal"  data-target="#myModalbyan"><i class="fa fa-list"></i></button></td>


    <!--
   <td><button type="button"  style="background-color: <?=$twaged_sheek_color?>" class="btn btn-success btn-xs" ><?php echo$twaged_sheek?></button></td>
   <td><button type="button"  style="background-color: <?=$sheek_status_color?>"   class="btn btn-success btn-xs" ><?php echo$sheek_status?></button></td>
   <td><button type="button"  style="background-color: <?=$sheek_type_color?>"   class="btn btn-success btn-xs" > <?php echo $sheek_type?></button></td>
    -->
<td>
<span class="label label-<?=$twaged_sheek_class?>"><?php echo $twaged_sheek; ?></span>
</td>
<td>
<span class="label label-<?=$sheek_status_class?>"><?php echo $sheek_status; ?></span>
</td>
<td>
<span class="label label-<?=$sheek_type_class?>" style="width:50px;display: inline-block;"><?php echo $sheek_type; ?></span>
</td>



                                </tr>

                                <?php $count ++; } ?>

                            </tbody>
                        </table>
                        </div>


                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات محصلة !</div>
                    <?php  } ?>


                    <!------------------------------الشيكات المحصلة-------------------------->
				</div>
				<div role="tabpanel" class="tab-pane fade <?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'out_cheque'){?>
				         in
				        active
				  <?php  }
				}?>" id="out_cheque">


                <?php
                /*echo('<pre>');
                print_r($sheeks_sarf);   */

                ?>


                    <?php if(!empty($sheeks_sarf)){ ?>
                        <table id="" class="table table-hover table-bordered table-striped table-blue example">
                            <thead >
                            <tr class="blacktd">
                                <th>م</th>
                                <th>نوع السند</th>
                                <th>رقم السند</th>
                                <th>تاريخ السند</th>
                                <th>إسم المستفيد</th>
                                <th>رقم الشيك</th>
                                <th>البنك</th>
                                <!--<th>رقم الحساب</th>-->
                                <th>تاريخ إصدار الشيك</th>
                                <th>المبلغ</th>
                                <th>التفاصيل</th>
                                <th>حالة التسليم</th>
                                <th>حالة الشيك</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $count=1; foreach ($sheeks_sarf as $row){
                                if($row->pay_method == 1){
                                   $pay_method_name = ' نقدي';
                                }elseif($row->pay_method == 2){
                                    $pay_method_name = '  شيك من الصندوق';
                                }elseif($row->pay_method == 3){
                                     $pay_method_name = '  شيك من البنك';
                                }elseif($row->pay_method == 4){
                                     $pay_method_name = '  معاملات بنكية'; 
                                }

                                if(!empty($row->taslem_date)){
                                    $taslem_date =date('Y-m-d',$row->taslem_date);
                                }else {
                                 $taslem_date ='غير محدد';
                                }

                                if(!empty($row->sarf_date)){
                                 $sarf_date =date('Y-m-d',$row->sarf_date);
                                }else {
                                 $sarf_date ='غير محدد';
                                }
                                ?>
                            <tr>
                                <td><?php echo $count?></td>
                                <td>
                                <?php echo $pay_method_name; ?>
                                </td>
                                <td><?php echo $row->rqm_sanad_id_fk?></td>
                                <td><?php echo $row->details->date_sanad_ar?></td>
                                <td><?php echo $row->details->person_name?></td>
                                <td><?php echo $row->sheek_num?></td>
                                <td><?php echo $row->bank_name?></td>
                                <!--<td><?php if(!empty($row->bank_code)){ echo$row->bank_code;}?></td>-->

                                <td><?php echo $row->sheek_date_ar?></td>
                                <td><?php echo $row->details->total_value?></td>
                                <td><button type="button"  class="btn btn-info btn-xs"  onclick="Get_details(<?php echo$row->rqm_sanad_id_fk;?>, <?php echo $row->sheek_num;?>,'sarf')" data-toggle="modal" data-target="#myModalbyan"><i class="fa fa-list"></i></button></td>
                                <td><?php if($row->taslem_sheek == 0){ ?>
                                <button class="btn btn-danger btn-pxs" style="width: 84px;"  onclick="change_taslem(<?php echo$row->id;?>,1)"  >لم يتم التسليم </button> <?php }else{  ?>
                                  <button class="btn btn-success  btn-pxs" style="background-color: #50ab20;width: 84px;"  onclick="change_taslem(<?php echo$row->id;?>,0)" onmouseover="$(this).text('<?php echo $taslem_date;?>')" onmouseout="$(this).text('تم التسليم')"  >تم التسليم </button>
                                <?php } ?>
                                </td>
                                <td>

                                    <?php if($row->taslem_sheek > 0){ ?>
                                        <?php if($row->sheek_status == 0){ ?>
                                        <button    onclick="change_halet_sheek(<?php echo$row->id;?>,1)" class="btn btn-danger btn-pxs" >لم يتم الصرف</button><?php }else{ ?>

                                            <button class="btn btn-success  btn-pxs" style="background-color: #50ab20;" onclick="change_halet_sheek(<?php echo$row->id;?>,0)">تم الصرف </button>
                                        <?php } ?>

                                    <?php }else{?>

                                        <button     class="btn btn-danger btn-pxs" >لم يتم الصرف</button>

                                    <?php } ?>




                                </td>
                            </tr>


                                <?php $count ++; }  ?>
                            </tbody>
                        </table>
                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات صادرة!</div>
                  <?php  } ?>


                <div class="col-xs-12 text-center">

                    <button type="button" style="margin-top:10px;margin-bottom: 10px;    background-color: #09704e;"  class="btn btn-success btn-labeled btn-next"  data-toggle="collapse" href="#mohsala2" aria-expanded="false" aria-controls="mohsala2"><span class="btn-label"><i class="fa fa-arrow-down" aria-hidden="true"></i></span> الشيكات المنصرفة </button>

                 </div>
                    <?php if(!empty($sheeks_sarf_approved)){ ?>
                    <div class="collapse" id="mohsala2">

                        <table id="" class="table table-hover table-bordered table-striped table-blue example">
                            <thead>
                            <tr class="blacktd">
                                <th>م</th>
                                <th>نوع السند</th>
                                <th>رقم السند</th>
                                <th>تاريخ السند</th>
                                <th>إسم المستفيد</th>
                                <th>رقم الشيك</th>
                                <th>البنك</th>
                                <!-- <th>رقم الحساب</th> -->
                                <th>تاريخ إصدار الشيك</th>
                                <th>المبلغ</th>
                                <th>التفاصيل</th>
                                <th>حالة التسليم</th>
                                <th>حالة الشيك</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $count=1; foreach ($sheeks_sarf_approved as $row){

                                  if($row->pay_method == 1){
                                   $pay_method_name = ' نقدي';
                                }elseif($row->pay_method == 2){
                                    $pay_method_name = '  شيك من الصندوق';
                                }elseif($row->pay_method == 3){
                                     $pay_method_name = '  شيك من البنك';
                                }elseif($row->pay_method == 4){
                                     $pay_method_name = '  معاملات بنكية'; 
                                }



                                if(!empty($row->taslem_date)){
                                 $taslem_date =date('Y-m-d',$row->taslem_date);
                                }else {
                                 $taslem_date ='غير محدد';
                                }

                                if(!empty($row->sarf_date)){
                                 $sarf_date =date('Y-m-d',$row->sarf_date);
                                }else {
                                 $sarf_date ='غير محدد';
                                }
                                ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <td><?php echo $pay_method_name; ?></td>
                                    <td><?php echo $row->rqm_sanad_id_fk?></td>
                                    <td><?php echo $row->details->date_sanad_ar?></td>
                                    <td><?php echo $row->details->person_name?></td>
                                    <td><?php echo $row->sheek_num?></td>
                                    <td><?php echo $row->bank_name?></td>
                                    <!-- <td><?php if(!empty($row->bank_code)){ echo$row->bank_code;}?></td> -->

                                    <td><?php echo $row->sheek_date_ar?></td>
                                    <td><?php echo $row->details->total_value?></td>
                                    <td><button type="button"  class="btn btn-info btn-xs"  onclick="Get_details(<?php echo$row->rqm_sanad_id_fk;?>, <?php echo $row->sheek_num;?>,'sarf')" data-toggle="modal" data-target="#myModalbyan"><i class="fa fa-list"></i></button></td>
                                    <td><?php if($row->taslem_sheek == 0){ ?>
                                            <button class="btn btn-danger btn-pxs" style="width: 84px;"  onclick="change_taslem(<?php echo$row->id;?>,1)"  >لم يتم التسليم </button> <?php }else{  ?>
                                            <button class="btn btn-success  btn-pxs" style="background-color: #50ab20;width: 84px;"  onclick="change_taslem(<?php echo$row->id;?>,0)" onclick="change_taslem(<?php echo$row->id;?>,0)" onmouseover="$(this).text('<?php echo $taslem_date;?>')" onmouseout="$(this).text('تم التسليم')"  >تم التسليم </button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($row->taslem_sheek > 0){ ?>
                                            <?php if($row->sheek_status == 0){ ?>
                                            <button    onclick="change_halet_sheek(<?php echo$row->id;?>,1)" class="btn btn-danger btn-pxs" >لم يتم الصرف</button><?php }else{ ?>

                                                <button class="btn btn-success  btn-pxs"  style="background-color: #50ab20;" onclick="change_halet_sheek(<?php echo$row->id;?>,0)"  onmouseover="$(this).text('<?php echo $sarf_date;?>')" onmouseout="$(this).text('تم الصرف')" >تم الصرف </button>
                                            <?php } ?>

                                        <?php }else{?>

                                            <button     class="btn btn-danger btn-pxs" >لم يتم الصرف</button>

                                        <?php } ?>


                                    </td>
                                </tr>


                                <?php $count ++; }  ?>
                            </tbody>
                        </table>
                        </div>
                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات  محصلة!</div>
                    <?php  } ?>




                </div>


<!------------------------------------------------------------------>
				<div role="tabpanel" class="tab-pane fade <?php if(!empty($_GET['type'])){
				    if($_GET['type'] ===  'canceled_cheque'){?>
				         in
				        active
				  <?php  }
				}?>" id="canceled_cheque">


<?php
/*
echo '<pre>';
print_r($canceled_sheeks_sarf);*/
 ?>
               <?php if(!empty($canceled_sheeks_sarf)){ ?>
                        <table id="" class="table table-hover table-bordered table-striped table-blue example">
                            <thead >
                            <tr class="blacktd">
                                <th>م</th>
                                <th>نوع السند</th>
                                <th>رقم السند</th>
                                <th>تاريخ السند</th>
                                <th>إسم المستفيد</th>
                                <th>رقم الشيك</th>
                                <th>البنك</th>
                                <!--<th>رقم الحساب</th>-->
                                <th>تاريخ إصدار الشيك</th>
                                <th>المبلغ</th>
                                <th>التفاصيل</th>
                          
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $count=1; 
                            foreach ($canceled_sheeks_sarf as $rowcanceled){
                                if($rowcanceled->pay_method == 1){
                                   $pay_method_name = ' نقدي';
                                }elseif($rowcanceled->pay_method == 2){
                                    $pay_method_name = '  شيك من الصندوق';
                                }elseif($rowcanceled->pay_method == 3){
                                     $pay_method_name = '  شيك من البنك';
                                }elseif($rowcanceled->pay_method == 4){
                                     $pay_method_name = '  معاملات بنكية'; 
                                }

                                if(!empty($rowcanceled->taslem_date)){
                                    $taslem_date =date('Y-m-d',$rowcanceled->taslem_date);
                                }else {
                                 $taslem_date ='غير محدد';
                                }

                                if(!empty($rowcanceled->sarf_date)){
                                 $sarf_date =date('Y-m-d',$rowcanceled->sarf_date);
                                }else {
                                 $sarf_date ='غير محدد';
                                }
                                ?>
                            <tr>
                                <td><?php echo $count?></td>
                                <td>
                                <?php echo $pay_method_name; ?>
                                </td>
                                <td><?php echo $rowcanceled->rqm_sanad_id_fk?></td>
                                <td><?php echo $rowcanceled->details->date_sanad_ar?></td>
                                <td><?php echo $rowcanceled->details->person_name?></td>
                                <td><?php echo $rowcanceled->sheek_num?></td>
                                <td><?php echo $rowcanceled->bank_name?></td>
                                <!--<td><?php if(!empty($rowcanceled->bank_code)){ $rowcanceled->bank_code;}?></td>-->

                                <td><?php echo $rowcanceled->sheek_date_ar?></td>
                                <td><?php echo $rowcanceled->details->total_value?></td>
                                <td><button type="button"  class="btn btn-info btn-xs"  onclick="Get_details(<?php echo $rowcanceled->rqm_sanad_id_fk;?>, <?php echo $rowcanceled->sheek_num;?>,'sarf')" data-toggle="modal" data-target="#myModalbyan"><i class="fa fa-list"></i></button></td>
                              
                             
                            </tr>


                                <?php $count ++; }  ?>
                            </tbody>
                        </table>
                    <?php }else{ ?>

                        <div class="col-sm-12 btn btn-danger">لاتوجد شيكات صادرة!</div>
                  <?php  } ?>
 
 
 
 


                </div>

<!------------------------------------------------------------------>





			</div>

		</div>

	</div>

</div>





<!------------------------------------------------modals----------------------------------------------->

<div class="modal fade" id="myModalbyan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">البيان</h4>
            </div>
            <div class="modal-body" id="details">

            </div>
            <div class="modal-footer">
                <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalhalet_taslem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الإجراء</h4>
            </div>
            <div id="halet_taslem">
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="myModalhalet_sheek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الإجراء</h4>
            </div>
            <div id="halet_sheek"></div>

        </div>
    </div>
</div>


<!------------------------------------------------modals----------------------------------------------->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<!--<button>Try me!</button>-->

<script>
$('button').on('click', () => {

    saveCase(true);
})

  function saveCase(check) {
      if (check) {
          swal({
              text: "You can save the case by selecting or creating new patient.",
              showConfirmButton:true,
              showCancelButton: true,
              confirmButtonText: 'Ok',
              cancelButtonText: 'Cancel',
              focusConfirm:true
          }).then(result => {
            if (result.value){
              swal("Ok clicked");
            }
            else if(result.dismiss === swal.DismissReason.cancel){
               swal('Cancelled');
            }
          });
      }
      else
      {
          swal("Please select atleast one symptom to save case.");
      }
    }

</script>




<script>





    function change_taslem(id,valu) {

        if ( id > 0 ) {
            if(valu ==0) {
                var dataValues = 'id=' + id;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/getTaslemDate',
                    data: dataValues,
                    cache: false,
                    success: function (json_data) {
                        var JSONObject = JSON.parse(json_data);
                        //console.log(JSONObject);
                        $('#mydate').val(JSONObject);
                    }
                });
            }

            Swal.fire({
                title:   'تاريخ التسليم',
                html: '<input type="date"   name="mydate" id="mydate" value="">',
                showCancelButton: false,
                confirmButtonText: 'حفظ',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                   // alert($('#mydate').val());

                   var date=$('#mydate').val();

                   if(date !=''){
                    var dataString = 'id=' + id +'&approved='+ valu +'&date='+ date;
                       alert(dataString);
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/change_taslem_sheek',
                        data: dataString,
                        cache: false,
                        success: function (json_data) {
                            var JSONObject = JSON.parse(json_data);

                          //  console.log(JSONObject);

                            window.location.href ="<?php echo base_url();?>finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque";


                        }
                    });
                       if(valu ==0){
                           window.location.href ="<?php echo base_url();?>finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque";

                       }
                   }else {
                       alert(' من فضلك إختر التاريخ !!');
                   }

                }
            });





        }

    }

    function change_halet_sheek(id,valu) {

        if ( id > 0 ) {
            if(valu ==0) {


            var dataValues = 'id=' + id ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/getSarfmDate',
                data: dataValues,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    $('#mydate2').val(JSONObject);
                }
            });
            }
            Swal.fire({
                title:   'تاريخ الصرف',
                html: '<input type="date"   name="mydate" id="mydate2" value="">',
                showCancelButton: false,
                confirmButtonText: 'حفظ',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.value) {
                    // alert($('#mydate').val());

                    var date=$('#mydate2').val();

                    if(date !=''){
                        var dataString = 'id=' + id +'&approved='+ valu +'&date='+ date;
                      //  alert(dataString);
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/change_halet_sheek',
                            data: dataString,
                            cache: false,
                            success: function (json_data) {
                                var JSONObject = JSON.parse(json_data);
                                //console.log(JSONObject);
                                window.location.href ="<?php echo base_url();?>finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque";


                            }
                        });


                        if(valu ==0){
                            window.location.href ="<?php echo base_url();?>finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque";

                        }
                    }else {
                        alert(' من فضلك إختر التاريخ !!');
                    }
                }
            });

        }

    }


    function Get_details(valu,sheek_num,type) {

        var dataString = 'id=' + valu  + '&sheek_num='+ sheek_num +'&type='+ type;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>finance_accounting/box/sheek_tracks/Sheek_tracks/load_details',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
              $("#details").html(html);
                //$("#test").html(html);
            }
        });


    }



</script>



<script>
    function add_halet_cheque(rqm_sand,row_id,sheek_num,bank_name,type)
    {

        if(type==1) {
            var option = $("input[name='sheeks_one']:checked").val();
        }
        if(type==2) {
            var option = $("input[name='sheeks_two']:checked").val();
        }
        if(type==3) {
            var option = $("input[name='sheeks_three']:checked").val();
        }

        if(option)
        {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>finance_accounting/box/sheek_tracks/Sheek_tracks/update_exit_cheque",
                data: {
                    row_id: row_id,
                    rqm_sand: rqm_sand,
                    option: option,
                    sheek_num:sheek_num,
                    bank_name:bank_name,
                    type:type

                },
                success: function (d) {

                    //alert(d);
                    // return;
                    if(type==1) {
                        alert("تم تغيير حاله تواجد الشيك بنجاح");
                    }
                    if(type==2) {
                        alert("تم تغيير حاله الشيك بنجاح");
                    }
                    if(type==3) {
                        alert("تم تغيير نوع الشيك  بنجاح");
                    }
                    location.reload();
                }

            });


        }else{
            alert("من فضلك اختر النوع ");
        }

    }

</script>
