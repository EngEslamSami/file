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
<?php $array_paid_typy=array('','نقدي','تحويل بنكي','شيك');?>
 </span><br>
            <?php   if(isset($records)&&$records!=null):?>

                <table  class="table table-striped table-bordered" style="width:100%">
                    <tr class="info">
                        <th class="text-center">المسلسل </th>
                        <th class="text-center">رقم السند</th>
                        <th class="text-center">تاريخ تسجيل السند</th>
                        <th class="text-center">طريقة الدفع</th>
                        <th class="text-center">الإجمالي</th>
                        <th>التفاضيل</th>
                        <th class="text-center">الإجراء </th>
                    </tr>
                    <?php $x=1; foreach($records as $row ):?>
                        <tr class="">
                            <td><?php echo $x++;?></td>
                            <td><?php echo $row->vouch_num; ?> </td>
                            <td><?php echo date("Y-m-d",$row->date); ?> </td>
                            <td><?php echo $array_paid_typy[$row->vouch_type] ?> </td>
                            <td><?php echo $row->sum?> جنية</td>
                            <td> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?= $row->vouch_num ?>"><i class="fa fa-list"></i> التفاصيل </button></td> <!--osama-->
                            <td> <a href="<?php echo base_url('admin/Finance_accounting/edit_sand_sarf').'/'.$row->vouch_num.'/'.$row->vouch_type?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i> </a>

                                <a type="button" class="" data-toggle="modal" data-target="#d<?= $row->vouch_num ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <!--osama-->
                               
                            </td>
                        </tr>

                        <!--osama-->
                        <!------------------------------- delete Model -------------->
                        <div class="modal fade" id="d<?= $row->vouch_num ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">حذف السند</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" position: relative; top: -22px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h6> هل انت متاكد من عملية الحذف؟</h6>

                                    </div>
                                    <div class="modal-footer">
                                        <form action="<?php echo base_url('admin/Finance_accounting/sand_sarf_delete').'/'. $row->vouch_num ?>">
                                            <button type="submit" class="btn btn-primary" >تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!------------------------------- end delete Model -------------->

                        <!--osama-->

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


<?php   if(isset($records)&&$records!=null){ ?>
    <?php  foreach($records as $row ){ ?>
        <!------------------------------- detalils  Model -------------->
        <div class="modal fade" id="myModal<?= $row->vouch_num ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width:70%;">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">تفاصيل السند</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group col-sm-12 col-xs-12 no-padding">
                            <div class=" col-sm-6 col-xs-6">
                                <label class="label label-green  half">رقم السند</label>
                                <input class="form-control half" type="text" value="<?= $row->vouch_num ?>" disabled >
                            </div>
                            <div class=" col-sm-6 col-xs-6 ">
                                <label class="label label-green  half">تاريخ السند </label>
                                <input class="form-control half" type="text" value="<?=  date('Y-m-d', $row->receipt_date) ?>" disabled >
                            </div>
                        </div>

                        <?php if(!empty($row->details)){ ?>
                            <table class="table table-striped table-bordered">
                                <thead><tr>
                                    <th >م</th>
                                    <th >مدين</th>
                                    <th >دائن</th>
                                    <th >اسم الحساب</th>

                                </tr></thead>
                                <tbody>
                                <?php  $serial = 0;
                                foreach($row->details as $record):
                                    $serial++; ?>
                                    <tr>
                                        <td><?php echo $serial ?></td>
                                        <td><?php echo $record->value;?></td>
                                        <td>--</td>
                                        <td><?php echo $record->account_name;?></td>
                                    </tr>
                                <?php endforeach ;?>
                                </tbody>
                                <tfooter>
                                    <th><?php echo ++$serial ?></th>
                                    <th>--</th>
                                    <th><?= $row->sum ?></th>
                                    <th><?= $row->box_name ?></th>
                                </tfooter>
                            </table>
                        <?php }?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!------------------------------- end detalils  Model -------------->
    <?php } ?>
<?php } ?>


 

              
              
              

  