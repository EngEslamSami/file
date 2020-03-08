<?php if ((isset($orders)) && (!empty($orders))) {
    $input_show_name = array('', 'العدد', 'المبلغ', 'رقم الفاتورة', 'رقم جهاز', 'السن', '');
    ?>
    <table class="table table-bordered ">
        <thead>
        <tr>
            <th>طلب رقم</th>
            <th>نوع الخدمة</th>
            <th>فئة الخدمة</th>
            <th>وصف فئة الخدمة</th>
            <th>بيان الخدمة</th>
<!--            echo $input_show_name[$input->input_id].':'.$input->value.'<br>'-->
            <?php if((isset($orders[0]->inputs))&&(!empty($orders[0]->inputs))){
                foreach ($orders[0]->inputs as $input){
                   ?>
                    <th> <?php echo $input_show_name[$input->input_id]?></th>
                    <?php
                }
            } ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order) {?>
        <tr>
            <td><?=$order->family_num_order_fk?></td>
            <td><?=$order->name_ser?></td>
            <td><?=$order->cat_name?></td>
            <td><?=$order->description?></td>
            <td><?=$order->note?></td>
            <?php if((isset($order->inputs))&&(!empty($order->inputs))){
                foreach ($order->inputs as $input){
                    ?>
                    <td> <?=$input->value?></td>
                    <?php
                }
            } ?>
        </tr>
        <?php }?>
        </tbody>
    </table>
<?php }else{?>
    <div ><h3>لا توجد تفاصيل </h3></div>
<?php }?>