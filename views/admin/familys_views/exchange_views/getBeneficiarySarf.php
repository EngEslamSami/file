
<?php if(!empty($BeneficiaryDetails) && !empty($records)){?>
<a href = "<?php echo base_url('family_controllers/Exchange/Beneficiary_sarf_orders_print/'.$_POST['beneficiary_id']).'' ?>" target = "_blank" > <button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button></a >
<?php } ?>

<?php if(!empty($BeneficiaryDetails)){  $arr_type =array('','نشط','غير نشط');?>
    <table class="table table-bordered table-devices">
        <tbody>
        <tr>
            <th class="info">رقم الملف</th>
            <td><?php echo $BeneficiaryDetails['file_num'];?></td>
            <th class="info">اسم العائلة</th>
            <td><?php echo $BeneficiaryDetails['name'];?></td>
        </tr>
        <tr>
            <th class="info">رقم الهوية</th>
            <td><?php echo $BeneficiaryDetails['national_card_id'];?></td>
            <th class="info">عدد الأرامل</th>
            <td><?php echo $BeneficiaryDetails['armal'];?></td>
        </tr>
        <tr>
            <th class="info">عدد الأيتام</th>
            <td><?php echo $BeneficiaryDetails['yatem'];?></td>
            <th class="info">عدد المستفيدين</th>
            <td><?php echo $BeneficiaryDetails['mostafed'];?></td>
        </tr>
        <tr>
            <th class="info">عدد أفراد الاسرة</th>
            <td><?php echo $BeneficiaryDetails['mostafed'] + $BeneficiaryDetails['yatem'] + $BeneficiaryDetails['armal'];?></td>
            <th class="info">المبلغ</th>
            <td><?php echo $BeneficiaryDetails['value'];?></td>
        </tr>
        <tr>
            <th class="info">الحالة</th>
            <td><?php echo $arr_type[$BeneficiaryDetails['approved']];?></td>
            <th class="info">إسم صاحب الحساب البنكي</th>
            <td><?php echo $BeneficiaryDetails['bank_account_name'];?></td>
        </tr>
        <tr>
            <th class="info">رقم هوية صاحب الحساب البنكي</th>
            <td><?php   echo $BeneficiaryDetails['bank_account_card_id'];?></td>
            <th class="info">رقم الحساب</th>
            <td><?php  echo $BeneficiaryDetails['bank_account_num'];?></td>
        </tr>
        <tr>
            <th class="info">إسم البنك</th>
            <td><?php  if($bank_details[$BeneficiaryDetails['bank_id_fk']]){echo $bank_details[$BeneficiaryDetails['bank_id_fk']];}  ?></td>
        </tr>
        </tbody>
    </table>
<?php } ?>


<?php if(!empty($records)){ ?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الصرف</th>
            <th class="text-center">تاريخ الصرف</th>
            <th class="text-center">بند المساعدة</th>
            <th class="text-center">المبلغ المصروف</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $total=0;
        $a=1; foreach ($records as $record ){
            $total +=$record->value;
            ?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $record->sarf_num_fk;?></td>
                <td><?php  if(!empty($record->details)){ echo date('Y-m-d',$record->details->cashing_date); } ?></td>
                <td><?php if(!empty($record->details)){echo $record->details->band_name; }?></td>
                <td> <?php echo $record->value ?></td>
            </tr>
            <?php  $a++; } ?>
        <tr>
            <td colspan="4"> الإجمالي</td>
            <td><?php echo $total;?></td>
        </tr>
        </tbody>
    </table>


<?php }else{ ?>


<div class="alert alert-danger col-sm-12">لا توجد مصروفات خاص بهذ المستفيد !!</div>

<?php } ?>

