<div class="col-xs-9 padding-4">

    <input type="hidden" id="contract_id" value="<?= $get_all->id ?>">
    <input type="hidden" id="mostager" value="<?= $get_all->contract_rkm ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم العقد </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->contract_rkm)&& !empty($get_all->contract_rkm)){echo  $get_all->contract_rkm;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 135px;"><strong>  اسم العقار</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->aqr_n)&& !empty($get_all->aqr_n)){echo  $get_all->aqr_n;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong> نوع الوحدة </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->whda_type_n)&& !empty($get_all->whda_type_n)){echo  $get_all->whda_type_n;}else{echo 'غير محدد';}  ?></td>

        </tr>
        <tr>
            <td><strong>  قيمة الايجار </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->egar_value)&& !empty($get_all->egar_value)){echo  $get_all->egar_value . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>
            <td ><strong> بداية الايجار</strong></td>
            <td ><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->egar_start_date_m ) && !empty($get_all->egar_start_date_h)){
                    $egar_start_date_m = explode('/', $get_all->egar_start_date_m)[2] . '/' . explode('/', $get_all->egar_start_date_m)[0] . '/' . explode('/', $get_all->egar_start_date_m)[1];
                    $egar_start_date_h= explode('/', $get_all->egar_start_date_h)[2] . '/' . explode('/', $get_all->egar_start_date_h)[1] . '/' . explode('/', $get_all->egar_start_date_h)[0];
                echo $egar_start_date_m .' '.'م'.' '.'↔'.' '.$egar_start_date_h .' '.'هـ' ;
                  }
                else{ echo 'غير محدد';}
                ?>
            </td>
            <td style="width: 150px;"><strong>  نهاية الايجار</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->egar_end_date_m ) && !empty($get_all->egar_end_date_h)){
                    $egar_end_date_m = explode('/', $get_all->egar_end_date_m)[2] . '/' . explode('/', $get_all->egar_end_date_m)[0] . '/' . explode('/', $get_all->egar_end_date_m)[1];
                    $egar_end_date_h= explode('/', $get_all->egar_end_date_h)[2] . '/' . explode('/', $get_all->egar_end_date_h)[1] . '/' . explode('/', $get_all->egar_end_date_h)[0];
                    echo $egar_end_date_m .' '.'م'.' '.'↔'.' '.$egar_end_date_h .' '.'هـ' ;
                }
                else{ echo 'غير محدد';}
                ?>
            </td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>   المدة </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->period)&& !empty($get_all->period)){echo  $get_all->period . ' ' .'شهر';;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 135px;"><strong>  عدد الأقساط</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->aqsat_num)&& !empty($get_all->aqsat_num)){echo  $get_all->aqsat_num;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong>
                    قيمة القسط </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->qst_value)&& !empty($get_all->qst_value)){echo  $get_all->qst_value . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>

        </tr>
        <tr>

            <td style="width: 150px;"><strong>
                    التأمين </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->tamen)&& !empty($get_all->tamen)){echo  $get_all->tamen . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>
            <td style="width: 105px;">
                <strong>
                    التذكير قبل </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->tzker)&& !empty($get_all->tzker)){echo  $get_all->tzker . ' ' .'شهر';}else{echo 'غير محدد';}  ?></td>


        </tr>


        </tbody>
    </table>


</div>
<?php
if (isset($get_all->mostager) && !empty($get_all->mostager)){
    ?>
    <div class="col-xs-3 padding-4">
        <?php
        if (isset($get_all->mostager->img) && !empty($get_all->mostager->img)){
            ?>
            <img src="<?= base_url()."uploads/aqr/thumbs/" . $get_all->mostager->img ?>" width="100%" height="" alt="">

            <?php
        }
        ?>
        <table class="table " style="table-layout: fixed">
            <tbody>
            <tr>
                <td style="width: 105px;">
                    <strong>  رقم المستأجر </strong>
                </td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($get_all->mostager->rkm)&& !empty($get_all->mostager->rkm)){echo $get_all->mostager->rkm;}else{echo 'غير محدد';}  ?></td>

            </tr>
            <tr>
                <td style="width: 135px;"><strong> اسم المستأجر</strong></td>
                <td style="width: 10px;"><strong>:</strong></td>
                <td><?php if (isset($get_all->mostager->aname)&& !empty($get_all->mostager->aname)){echo $get_all->mostager->aname;}else{echo 'غير محدد';}  ?></td>

            </tr>
            </tbody>
        </table>

    </div>
<?php
}
?>
<div class="col-xs-12">

<?php
if (isset($get_all->qst_details) && !empty($get_all->qst_details)){
    $x=1;
    $paid =0;
    $unpaid=0;
    ?>
    <h5 style="display: inline-block ;    margin-left: 100px" >بيانات الأقساط</h5>
    <h5 style="display: inline-block;    margin-left: 100px">  القيمة الاجمالية : <span>
            <?php
            if (!empty( $get_all->egar_value)){
                echo  $get_all->egar_value . ' ' .'ريال';
            } else{
                echo 'غير محدد' ;
            }
            ?>
        </span> </h5>
    <?php
    foreach ($get_all->qst_details as $qst){
    if ($qst->paid==1){
    $paid +=$qst->qst_value;
    } elseif ($qst->paid ==0){
    $unpaid += $qst->qst_value;
    } }
    ?>
    <h5 style="display: inline-block;    margin-left: 100px">  المسدد : <span><?= $paid . ' ' .'ريال'?></span> </h5>
    <h5 style="display: inline-block;    margin-left: 100px">  المتبقي : <span><?= $unpaid . ' ' .'ريال'?></span> </h5>

    <table  class="table example table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">
            <th>م</th>
            <th> رقم القسط</th>
            <th> قيمة القسط  </th>
            <th>  تسديد  </th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($get_all->qst_details as $qst){

            ?>
            <tr>
                <td><?= $x++?></td>
                <td><?= $qst->qst_rkm?></td>
                <td><?= $qst->qst_value . ' ' .'ريال'?></td>

                <td id="qst_status">
                    <input type="hidden" id="contract_rkm" name="contract_rkm" value="">
                    <input type="hidden" id="qst_rkm" name="qst_rkm" value="">
                    <?php
                    if ($qst->paid==1){
                        echo 'تم';
                    } else{
                        ?>
                        <button type="button" class="btn btn-success" onclick=" update_qst(<?= $qst->contract_rkm?>,<?= $qst->qst_rkm?>)">تسديد</button>

                        <?php
                    }
                    ?>

                </td>

            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>


    <?php

}
?>
</div>

<script>
    function update_qst(c_rkm,q_rkm) {
        $('#contract_rkm').val(c_rkm);
        $('#qst_rkm').val(q_rkm);
        var contract_rkm = $('#contract_rkm').val();
        var qst_rkm = $('#qst_rkm').val();
        var mostager_rkm = $('#mostager').val();
      //  alert(contract_rkm +',' +qst_rkm);
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>aqr/contracts/Contracts/add_qst",
                data: {contract_rkm:contract_rkm,qst_rkm:qst_rkm},
                success: function () {

                window.location="<?= base_url()."aqr/contracts/Contracts/add_aqr_Pills/" ?>" + mostager_rkm;

                }
            });

    }
</script>




