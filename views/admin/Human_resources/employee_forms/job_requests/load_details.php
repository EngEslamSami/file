

<div class="col-xs-12 padding-4">

    <input type="hidden" id="row_id" value="<?= $get_requset->id?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم  الوظيفة </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_requset->id?></td>
            <td style="width: 135px;"><strong> العدد </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $get_requset->num_for_job ;?></td>

        
            <td style="width: 105px;">
                <strong>     نوع الوظيفة </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>  <?= $get_requset->type_name?></td>

            <td style="width: 105px;">
                <strong>     طبيعة العمل بالوظيفة </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>  <?= $get_requset->nature_name?></td>
   
           

        </tr>

        </tbody>
    </table>

    <div class="piece-box" style="margin-bottom: 0">
        <div class="">
            <div class="col-xs-12">
                <strong>أسباب ومبررات الإحتياج</strong>
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
        <div class="">
            <div class="col-xs-12">
                <strong>متطلبات للعمل بالوظيفة</strong>

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