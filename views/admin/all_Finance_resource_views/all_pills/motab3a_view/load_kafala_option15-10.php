<?php
/*
echo '<pre>';
print_r($kafala);*/
if (isset($kafala )&& !empty($kafala)){
    $arr_kafala = array('1'=>'جديد','2'=>'تجديد كفالة','3'=>'لا يحتاج لربط','4'=>'مساهمة في الكفالة');
    $title ='';
    ?>
    <?php
    if (isset($motb3a) && !empty($motb3a)){
        $title = '    <h5  >الاجراء المتخذ : </h5>';
        ?>


<div class="col-md-6" >
    <h5>اجراء الموظف : </h5>
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم الايصال  </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $kafala->pill_num ?></td>
        </tr>
        <tr>
            <td style="width: 135px;"><strong>اسم المحصل</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $kafala->publisher_name ?></td>
        </tr>
        <tr>
            <td style="width: 150px;"><strong> الإجراء المتخذ </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $kafala->motb3a_option_n ?></td>
        </tr>

        </tbody>
    </table>

</div>
        <?php
    }
    ?>
<div class="col-md-6">
    <?php
    echo $title;
    ?>

    <div class="form-group">
        <input type="hidden" id="row_id" value="<?= $kafala->id ?>">
        <input type="hidden" id="pill_num_fk" value="<?= $kafala->pill_num ?>">
        <input type="hidden" id="user_id_fk" value="<?= $kafala->person_id_fk ?>">
        <input type="hidden" id="user_name" value="<?= $kafala->person_name ?>">
        <?php

        foreach ($arr_kafala as $key=>$value){
            ?>
            <div class="radio-content" style="display: block">
                <input type="radio" id="type_sarf<?= $key?>" name="motb3a_option_fk"  class="sarf_types" value="<?= $key?>"
                    <?php
                    if ( isset($kafala) && $kafala->motb3a_option_fk == $key){
                        echo 'checked';
                    }
                    ?>
                >
                <label for="type_sarf<?= $key?>" class="radio-label"> <?= $value?></label>

            </div>
            <?php
        }

        ?>



    </div>
</div>

    <?php
}
?>