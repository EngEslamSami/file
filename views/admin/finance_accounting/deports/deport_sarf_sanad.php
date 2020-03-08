<div class="col-xs-12 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['catch_addtion'.$_SESSION["user_id"]]); ?>
 </span>
 <?php $array_paid_typy=array('','نقدي','تحويل بنكي','شيك');?>

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab" data-toggle="tab">  ترحيل سند </a></li>
                <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab"> إلغاء ترحيل سند </a></li>
                <li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab">  جميع السندات المرحلة  </a></li>
            </ul>
            <div class="tab-content">






                <div role="tabpanel" class="tab-pane fade in active" id="one">
                    <div class="col-xs-12 r-inner-details r-inner-details-sanad">
                        <br>
                        <?php   if(isset($vouchers)&&$vouchers!=null):?>

                            <table  class="table table-striped table-bordered" style="width:100%">

                                <tr>
                                    <th class="text-center">المسلسل </th>
                                    <th class="text-center">رقم السند</th>
                                    <th class="text-center">تاريخ تسجيل السند</th>
                                    <th class="text-center">نوع السند</th>
                                    <th class="text-center">الإجمالي</th>
                                    <th class="text-center"><?php echo $account_name;?></th>
                                    <th class="text-center">الإجراء </th>
                                    <th class="text-center">التفاصيل </th>
                                </tr>



                                <?php $x=1; foreach($vouchers as $row ):?>


                                    <tr class="">
                                        <td><?php echo $x++;?></td>
                                        <td><?php echo $row->vouch_num; ?> </td>
                                        <td><?php echo date("Y-m-d",$row->date); ?> </td>
                                        <td><?php echo $array_paid_typy[$row->vouch_type] ?> </td>
                                        <td><?php echo $row->sum?> ريال</td>
                                        <td>
                                                <?php if($process == 3){
                                                    echo  $account_group[$row->dayen]->name;
                                                }elseif($process == 4){
                                                    echo $account_group[$row->maden]->name;
                                                }?></td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/Finance_accounting/deports_vouchers_sarf/'.$row->vouch_num.'/1/'.$process."/".$controller?>">
                                                <input class="btn btn-sm  btn-success"  type="submit" value="ترحيل السند" />
                                            </a>     </td>
                                        <td><button type="button" class="btn btn-sm btn-info "
                                                    data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>">

                                                <span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td>
                                    </tr>







                                <?php endforeach;?>


                            </table>

                        <?php else:?>
                            <div class="alert alert-danger" role="alert">
                                <strong>عذرا...!</strong> لا توجد هناك سندات
                            </div>
                        <?php endif; ?>
                    </div>
                </div>





                <!-------- end one    ----------------->






                <div role="tabpanel" class="tab-pane fade in" id="two">
                    <div class="col-xs-12 r-inner-details r-inner-details-sanad">
                        <br>
                        <?php   if(isset($all_vouchers)&&$all_vouchers!=null):?>
                            <table class="table table-striped table-bordered" style="width:100%">
                                <tr>
                                    <th class="text-center">المسلسل </th>
                                    <th class="text-center">رقم السند</th>
                                    <th class="text-center">تاريخ تسجيل السند</th>
                                    <th class="text-center">نوع السند</th>
                                    <th class="text-center">الإجمالي</th>
                                    <th class="text-center"><?php echo $account_name;?></th>
                                    <th class="text-center">الإجراء </th>
                                    <th class="text-center">التفاصيل </th>
                                </tr>

                                <?php $x=1; foreach($all_vouchers as $row ):?>
                                    <tr class="">
                                        <td><?php echo $x++;?></td>
                                        <td><?php echo $row->vouch_num; ?> </td>
                                        <td><?php echo date("Y-m-d",$row->date); ?> </td>
                                        <td><?php echo $array_paid_typy[$row->vouch_type] ?> </td>
                                        <td><?php echo $row->sum?> جنية</td>
                                        <td>
                                                <?php if($process == 3){
                                                    echo  $account_group[$row->dayen]->name;
                                                }elseif($process == 4){
                                                    echo $account_group[$row->maden]->name;
                                                }?></td>
                                        <td>   <a href="<?php echo base_url().'admin/Finance_accounting/deports_vouchers_sarf/'.$row->vouch_num.'/0/'.$process."/".$controller?>">
                                                <input class="btn btn-sm  btn-danger"  type="" value="إلغاء ترحيل السند" />
                                            </a>
                                        </td>
                                        <td><button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num; ?>"><span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td>
                                    </tr>
                                <?php endforeach;?>





                            </table>

                        <?php else:?>
                            <div class="alert alert-danger" role="alert">
                                <strong>عذرا...!</strong> لا توجد هناك سندات
                            </div>
                        <?php endif; ?>



                    </div>
                </div>




                <!-------------- end two ------------------------------>









                <div role="tabpanel" class="tab-pane fade in" id="three">
                    <div class="col-xs-12 r-inner-details r-inner-details-sanad">
                        <br>
                        <?php   if(isset($all_vouchers)&&$all_vouchers!=null):?>
                            <table  class="table table-striped table-bordered" style="width:100%">
                                <tr>
                                    <th class="text-center">المسلسل </th>
                                    <th class="text-center">رقم السند</th>
                                    <th class="text-center">تاريخ تسجيل السند</th>
                                    <th class="text-center">نوع السند</th>
                                    <th class="text-center">الإجمالي</th>
                                    <th class="text-center"><?php echo $account_name;?></th>
                                    <th class="text-center">الإجراء </th>
                                    <th class="text-center">التفاصيل </th>
                                </tr>


                                <?php $x=1; foreach($all_vouchers as $row ):?>
                                    <tr class="">
                                        <td><?php echo $x++;?></td>
                                        <td><?php echo $row->vouch_num; ?> </td>
                                        <td><?php echo date("Y-m-d",$row->date); ?> </td>
                                        <td><?php echo $array_paid_typy[$row->vouch_type] ?> </td>
                                        <td><?php echo $row->sum?> جنية</td>
                                        <td>
                                                <?php if($process == 3){
                                                    echo  $account_group[$row->dayen]->name;
                                                }elseif($process == 4){
                                                    echo $account_group[$row->maden]->name;
                                                }?></td>
                                        <td>   <a href="<?php echo base_url().'admin/Finance_accounting/deports_vouchers_sarf/'.$row->vouch_num.'/0/'.$process."/".$controller?>">
                                                <input class="btn btn-sm  btn-danger"  type="" value="إلغاء ترحيل السند" />
                                            </a>
                                        </td>
                                        <td><button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num; ?>"><span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td>
                                    </tr>
                                <?php endforeach;?>


                            </table>



                        <?php else:?>
                            <div class="alert alert-danger" role="alert">
                                <strong>عذرا...!</strong> لا توجد هناك سندات
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
 

              
              
              
<?php include($details_page.'.php');?>
  