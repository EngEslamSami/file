<div class="print_forma  col-xs-12 no-padding">
    <div class="piece-box">
        <div class="piece-heading">

            <div class="col-xs-5 ">
                <input type="hidden" id="row_id" value="<?= $get_requset->id?>">
                <h5> <?php echo $get_requset->job_title  ;?></h5>
            </div>
            <div class="col-xs-3">
                <h5>العدد(<?php echo $get_requset->num_for_job ;?>)</h5>
            </div>
        </div>
        <div class="piece-body">
            <div class="col-xs-2">
                <h6>نوع الوظيفة</h6>
            </div>
            <div class="col-xs-3">
                <h6>
                    <?= $get_requset->type_name?>

                </h6>
            </div>
        </div>
        <div class="piece-footer">
            <div class="col-xs-3">
                <h6>طبيعة العمل بالوظيفة</h6>
            </div>

            <div class="col-xs-5">
                <h6>
                   <?= $get_requset->nature_name?>
                </h6>
            </div>

        </div>
    </div>

    <div class="piece-box" style="margin-bottom: 0">
        <div class="piece-heading">
            <div class="col-xs-12">
                <h5>أسباب ومبررات الإحتياج</h5>
            </div>
        </div>
        <div class="piece-body">
            <div class="col-xs-12  ">
                <?php if(!empty($get_requset->reasons)){
                    $xx=1;
                    foreach ($get_requset->reasons as $value){?>



                        <h6><?php echo $xx;?>-<?php echo $value->details;?></h6>

                        <?php $xx++; }
                } else{?>
                    <h6>لا توجد اسباب</h6>

                <?php  }?>
            </div>

        </div>
    </div>

    <div class="piece-box" >
        <div class="piece-heading">
            <div class="col-xs-12">
                <h5>متطلبات للعمل بالوظيفة</h5>

            </div>
        </div>
        <div class="piece-body">
            <div class="col-xs-12  ">
                <?php if(!empty($get_requset->requests)){
                    $xx=1;
                    foreach ($get_requset->requests as $value){?>



                        <h6><?php echo $xx;?>-<?php echo $value->details;?></h6>

                        <?php $xx++; }
                } else{?>
                    <h6>لا توجد متطلبات وظيفه</h6>

                <?php  }?>
            </div>

        </div>
        <div class="piece-footer">

        </div>
    </div>

</div>