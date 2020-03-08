<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">تفاصيل الكافل </a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> تفاصيل الكفالات </a></li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home"><?php
        if (isset($kafels) && !empty($kafels)) {
            ?>
            
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    <tr class="closed_green">
                        <td>اسم الكافل الثاني</td>
                        <td><?php echo $kafels->k_name;?></td>
                    </tr>
                    <tr>
                        <td>رقم جوال الكافل</td>
                        <td><?php echo $kafels->k_mob;?></td>
                    </tr>
                    <tr class="closed_green">
                        <td>فئه الكافل</td>
                        <td><?php echo $kafels->fe2a_title['title'];?></td>
                    </tr>
                    <tr>
                    <?php $k_message_method_arr =array('إختر','ارغب في استلام البريدعن طريق البريد الالكتروني ','ارغب في استلام البريد عن طريق صندوق البريد ','لا ارغب في استلام البريد');
                        ;?>
                        <td>وسيله التواصل</td>
                        <td><?php if(!empty($kafels->k_email))echo $kafels->k_email; else echo $kafels->k_barid_box ; ?></td>
                    </tr>
                    <tr class="closed_green">
                        <td>وقت التواصل</td>
                        <td><?php echo $kafels->right_time_from ;?> :  <?php echo $kafels->right_time_to ;?></td>
                    </tr>
                    <tr>
                        <td>حاله الكافل</td>
                        <td><?php echo $kafels->kafel_status['title'];?></td>
                    </tr>
                    <tr class="closed_green">
                        <td>السبب</td>
                        <td><?php echo $kafels->k_notes;?></td>
                    </tr>
                 
                </tbody>
            </table>
            
        <?php } else{ ?>



            <div class="alert alert-danger">عفوا !... لا توجد كفالات لهذا الكفيل</div>


        <?php } ?></div>
    <div role="tabpanel" class="tab-pane" id="profile"><?php
        if (isset($records) && !empty($records)) {
            ?>
            <table class="table table-bordered" style="margin-top:4px">
                <tr class="closed_green">

                    <td class="text-center" style="width: 5%"> م</td>
                    <td class="text-center" style="width: 20%"> إسم الكافل</td>

                    <td class="text-center" style="width: 20%"> اسم المستفيد بالكفاله</td>
                    <td class="text-center" style="width: 20%"> نوع الكفاله</td>
                    <td class="text-center" style="width: 20%"> مقدار الكفاله</td>
                    <td class="text-center" style="width: 20%"> تاريخ بدايه الكفاله</td>

                    <td class="text-center" style="width: 20%"> تاريخ نهايه الكفاله</td>
                    
                    <td class="text-center" style="width: 20%">مده الكفاله</td>
                    <td class="text-center" style="width: 20%">تبيه الانتهاء</td>
                    <td class="text-center" style="width: 20%">حاله الكفاله</td>
                    <td class="text-center" style="width: 20%"> طريقه التوريد</td>


                </tr>

                <?php

						$kafala_period = array(
                            '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
                            '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => 'سنة',

                        );
                $alert_type_arr =array('إختر','يوم','أسبوع','أسبوعين','شهر');
                $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');

                if (isset($records) && !empty($records)) {
                    $x = 1;
                    foreach ($records as $record) {

                        ?>
                        <tr class="">
                            <td><?php echo $x; ?>  </td>
                            <td><?php echo $record->kafel_name; ?></td>
                            <td><?php echo $record->person_name; ?></td>
                            <td><?php echo $record->kafala_name; ?></td>
                            <td><?php echo $record->first_value; ?></td>
                            <td><?php echo $record->first_date_from_ar; ?></td>
                            <td><?php echo $record->first_date_to_ar; ?></td>

                            <td><?php if(isset($record->kafala_period)&&!empty($record->kafala_period)){ echo $kafala_period[$record->kafala_period]; } ?></td>
                            <td><?php echo $alert_type_arr[$record->alert_type]; ?></td>
                            <td><?php echo $record->halt; ?></td>
                            <td><?php echo $pay_method_arr[$record->pay_method]; ?></td>


                        </tr>
                        <?php

                        $x++;
                    }
                } ?>
            </table>
        <?php } else { ?>
            <div class="alert alert-danger">عفوا !... لا توجد كفالات لهذا الكفيل</div>


        <?php } ?>

    </div>
</div>

