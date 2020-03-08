<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php if ((isset($orders)) && (!empty($orders))) { ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>رقم الطلب</th>
                        <th>رقم ملف</th>
                        <th>رقم الأم</th>
                        <th>اسم الأم</th>
                        <th>نوع الخدمة</th>
                        <th> تاريخ طلب الخدمة </th>
                        <th>تفاصيل الطلب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $key => $order) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $order->id ?></td>
                            <td><?= $order->family_num ?></td>
                            <td><?= $order->mother_national_num_fk ?></td>
                            <td><?= $order->full_name ?></td>
                            <td><?= $order->name_ser ?></td>
                            <td><?= $order->family_order_date_ar ?></td>
                            <td>
                                <a  class="btn " data-toggle="modal" data-target="#modal-sm-data" onclick="get_details_order('<?=$order->id?>')">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                ?>
                <di>
                    <h3>لا توجد طالبات </h3>
                </di>
                <?php
            } ?>
        </div>
    </div>
</div>
<div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document" style="width:80%;">
        <div class="modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">تفاصيل طلب الخدمة </h3>
            </div>
            <div class="modal-body ">
                <div id="option_details">

                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>

    </div>

</div>
<script>
    function get_details_order(order_id) {
        console.log(" order id =" + order_id);

        var request = $.ajax({
            url: "<?php echo base_url() . 'family_controllers/Family_order_web/get_details_order'?>",
            type: "POST",
            data: {order_id: order_id},
        });
        request.done(function (msg) {
            $('#option_details').html(msg);
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
</script>
