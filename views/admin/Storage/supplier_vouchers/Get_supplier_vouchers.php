<?php if(isset($all_vouchers) && $all_vouchers != null){ ?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>سندات المورد</h4>
                </div>
            </div>
            <div class="panel-body"> 
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th width="20%" class="text-right">التاريخ</th>
                            <th width="20%" class="text-right">قيمة المدفوع</th>
                            <th width="20%" class="text-right">من إجمالي</th>
                            <th width="20%" class="text-right">متبقي</th>
                            <th width="20%" class="text-right">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        foreach ($all_vouchers as $voucher) {
                            if($x == 1){
                                $Link = '  
                                        <a href="'. base_url().'Storage/Supplier_vouchers/printSupplierVouchers/'.$voucher->id.'"><i class="fa fa-print"></i> </a>

                                        <a onclick="return send('.$voucher->id.')" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
                                         ';
                            }else{
                                $Link = '<button class="btn btn-sm btn-primary">لا يمكنك التعديل والحذف علي السند</button>';
                            }
                        ?>
                        <tr>
                            <td><?=($x++)?></td>
                            <td><?=date("Y-m-d",$voucher->date)?></td>
                            <td><?=$voucher->paid?></td>
                            <td><?=$voucher->total?></td>
                            <td><?=$voucher->remain?></td>
                            <td><?=$Link?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
            </div>
            <div class="modal-body">
                <p id="text">هل أنت متأكد من الحذف؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script type="text/javascript">
    function send(argument) {
        $('#adele').attr("href","<?=base_url().'Storage/Supplier_vouchers/deleteSuppliers/'?>"+argument);
    }
</script>