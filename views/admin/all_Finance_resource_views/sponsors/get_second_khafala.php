
<?php if(!empty($row_kafala)){

    $kafala_period = array(
        '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
        '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => 'سنة',

    );
    $alert_type_arr =array('إختر','يوم','أسبوع','أسبوعين','شهر');
    $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');

    ?>
    <ul class="list-unstyled striped-ul" >
        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6>  اسم الكافل الثاني :</h6>

            </div>
            <div class="col-xs-8">
                <h6><?php echo $row_kafala->name;?></h6>
            </div>

        </li>

        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6>  تاريخ بدايه الكفاله :</h6>

            </div>


            <div class="col-xs-8">
                <h6><?php echo date('Y-m-d',$row_kafala->first_date_from);?></h6>
            </div>

        </li>
        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6>  تاريخ انتهاء الكفاله :</h6>

            </div>


            <div class="col-xs-8">
                <h6><?php echo date('Y-m-d',$row_kafala->first_date_to);?></h6>
            </div>

        </li>
        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6> المبلغ :</h6>

            </div>


            <div class="col-xs-8">
                <h6><?php echo $row_kafala->first_value;?></h6>
            </div>

        </li>

        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6> تنبيه الانتهاء :</h6>

            </div>


            <div class="col-xs-8">
                <h6><?php echo $alert_type_arr[$row_kafala->alert_type]; ?></h6>
            </div>

        </li>
        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6>  مده الكفاله :</h6>

            </div>


            <div class="col-xs-8">
                <h6><?php  if($row_kafala->kafala_period>0){echo $kafala_period[$row_kafala->kafala_period];  } ?></h6>
            </div>

        </li>
        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6>  حاله الكفاله :</h6>

            </div>


            <div class="col-xs-8">
                <h6><?php echo $row_kafala->halt; ?></h6>
            </div>

        </li>
        <li class="col-xs-12">
            <div class=" col-xs-4">
                <h6>  طريقه التوريد  :</h6>

            </div>


            <div class="col-xs-8">
                <h6><?php echo $pay_method_arr[$row_kafala->pay_method]; ?></h6>
            </div>

        </li>



    </ul>
<?php } else { ?>
    <div class="alert alert-danger">لايوجد كافل اخر</div>
<?php } ?>

                                        