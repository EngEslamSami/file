

<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($records)){ ?>
                <?php $arr_type =array('غير نشط',' نشط');?>
                <a href = "<?php echo base_url('family_controllers/Exchange/Exchange_report_print').'' ?>" target = "_blank" > <button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button></a >

                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">رقم الملف </th>
                    <th class="text-center">إسم مسئول الحساب البنكي</th>
                        <th class="text-center">رقم الهوية  </th>
                    <th class="text-center">إسم البنك</th>
                    <th class="text-center">رقم الحساب </th>
                    <th class="text-center">أرملة </th>
                    <th class="text-center">يتيم </th>
                    <th class="text-center">مستفيد </th>
                    <th class="text-center">عدد الافراد </th>
                    <th class="text-center">إجمالى المبلغ</th>
                    <th class="text-center">الحالة</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $x=1;
                $total_armal=0;
                $total_yatem=0;
                $total_mostafed=0;
                $total_all=0;
                $total_value=0;
                foreach ($records as $record ){
                $total_armal +=$record->armal;
                $total_yatem +=$record->yatem;
                $total_mostafed +=$record->mostafed;
                $total_all +=$record->mostafed + $record->yatem + $record->armal;
                $total_value += $record->value;
                ?>
                <tr>
                    <td><?php echo $x++ ?></td>
                    <td><?php echo $record->file_num; ?></td>
                    <td><?php echo $record->bank_account_name; ?></td>
                    <td><?php echo $record->bank_account_card_id; ?></td>
                    <td><?php echo $record->bank_name; ?></td>
                    <td><?php echo $record->bank_account_num; ?></td>
                    <td><?php echo $record->armal; ?></td>
                    <td><?php echo $record->yatem; ?></td>
                    <td><?php echo $record->mostafed; ?></td>
                    <td><?php echo $record->mostafed+$record->armal+$record->yatem; ?></td>
                    <td><?php echo $record->value; ?></td>
                    <td><?php if(!empty($arr_type[$record->approved])){ echo $arr_type[$record->approved];} ?></td>
                     <?php } ?>
                <tr>
                  <td colspan="6"> الإجمالي</td>
                  <td><?=$total_armal?></td>
                  <td><?=$total_yatem?></td>
                  <td><?=$total_mostafed?></td>
                  <td><?=$total_all?></td>
                  <td><?=$total_value?></td>
                  <td></td>
                </tr>
                </tbody>
            </table>
            <?php }  ?>

        </div>

    </div>
</div>
</div>

