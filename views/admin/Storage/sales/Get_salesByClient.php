<?php if(isset($all_fatora) && $all_fatora !=null){?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>فواتير المورد</h4>
                </div>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>رقم الفاتورة</th>
                            <th>تاريخ الفاتورة</th>
                            <th>نوع الفاتورة</th>
                            <th>الإجمالي قبل الخصم</th>
                            <th> الإجمالي بعد الخصم</th>
                            <th> المدفوع</th>
                            <th> الباقى</th>
                            <th>عرض التفاصيل </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                    foreach ($all_fatora as $row){
                        if($row->paid_type == 1){
                            $type='<span class="label label-sm label-success">نقدي</span>';
                        }
                        elseif($row->paid_type == 2){
                            $type= '<span class="label label-sm label-primary">آجل</span>';
                        }
                    ?>
                        <tr>
                            <td><?=$row->id?></td>
                            <td><?=date("Y-m-d",$row->fatora_date)?></td>
                            <td><?=$type?></td>
                            <td><?=$row->fatora_cost_before_discount?></td>
                            <td><?=$row->fatora_cost_after_discount?></td>
                            <td><?=$row->paid?></td>
                            <td><?=$row->remain?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myModal<?=$row->id?>"><span class="glyphicon glyphicon-list"></span> تفاصيل الفاتورة</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($all_fatora as $one_fatora){ ?>
<div class="modal fade" id="myModal<?=$one_fatora->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:95%">
        <div class="modal-content col-xs-12">
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">تفاصيل الفاتورة رقم (<?=$one_fatora->id?>) </h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12">
                    <div class="col-sm-2">
                        <h5>تاريخ الفاتورة :</h5>
                    </div>
                    <div class="col-sm-4 text-left">
                        <h5><?=date("Y-m-d",$one_fatora->fatora_date)?></h5>
                    </div>

                    <div class="col-sm-2">
                        <h5>إسم العميل:</h5>
                    </div>
                    <div class="col-sm-4 text-left">
                        <h5><?=$one_fatora->clients_code_name?></h5>
                    </div>
                </div>
                <div class="col-sm-12" >
                    <div class="col-sm-2">
                        <h5>نوع الفاتورة:</h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><?php if($one_fatora->paid_type == 1){echo "نقدي ";}elseif($one_fatora->paid_type == 2){echo "آجل ";}?>
                        </h5>
                    </div>
                
                    <div class="col-sm-2">
                        <h5>إسم الصندوق :</h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><?=$one_fatora->dayen_name?></h5>
                    </div>
                </div>
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>إسم الصنف</th>
                                <th>الوحدة</th>
                                <th>سعر بيع الوحدة</th>
                                <th>الكمية المباعة</th>
                                <th>إجمالي سعر البيع</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $total=0; 
                        foreach ($one_fatora->sub as $pur_row){
                        ?>
                            <tr>
                                <td><?=$pur_row->item_name?></td>
                                <td><?=$pur_row->unit_name?></td>
                                <td><?=$pur_row->one_sanf_price?></td>
                                <td><?=$pur_row->sale_amount?></td>
                                <td><?=$pur_row->total_sanf_cost?></td>
                            </tr>
                        <?php 
                            $total +=$pur_row->total_sanf_cost; 
                        }
                        ?>
                            <tr>
                                <td colspan="4">قيمة الفاتورة</td>
                                <td><?=$total?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer col-xs-12">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<?php 
    } 
}else{
    echo '<div class="alert alert-danger alert-dismissable">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>لا يوجد!</strong> فواتير مشتريات .
           </div>';
}
?>