
<?php if(!empty($row_kafala)){?>
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



    </ul>
<?php } else { ?>
    <div class="alert alert-danger">لايوجد كافل اخر</div>
<?php } ?>

                                        