<!-- <?php
echo '<pre>';
print_r($kafala); ?> -->

<?php

if (isset($kafala )&& !empty($kafala)){
    $arr_kafala = array('1'=>'جديد','2'=>'تجديد كفالة','3'=>'لا يحتاج لربط','4'=>'مساهمة في الكفالة','5'=>'جديد واضافة');
    $arr_filed = array(1 =>'nnew',2=>'tagded_kafala',3=>'no_rabt',4=>'mosahma_kafala',5=>'new_add');

    $title ='';
    ?>
    <!-- <pre>
<?php  //print_r($arr_kafala); ?>
    </pre> -->
    <?php
     $motb3a_option_n='';
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
            <?php if(!empty($kafala->motb3a_kafala)){
              $motb3a_option_n='';
              foreach ($arr_filed as $key => $value) {
                if ($kafala->motb3a_kafala->$value == 1) {
                  $motb3a_option_n=$motb3a_option_n .$arr_kafala[$key].'-';
                }
              }
              // echo "$arr_filed[2]". $kafala->motb3a_kafala->$arr_filed[2];
              if ($kafala->motb3a_kafala->tagded_kafala == 1 ) {
                if ($kafala->person_type==1 ) {
                  $url= base_url().'all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$kafala->person_id_fk;
                }else {
                  $url=base_url().'all_Finance_resource/sponsors/Sponsor/xyz';
                }
            }
           }?>

            <td><?= $motb3a_option_n ?>
                 <?php if (isset($url) &&(!empty($url))) {
                    ?>
                <a target="_blank" href="<?=$url?>" class=" btn btn-warning btn-xs"> الذهاب لبيانات الكفالة</a>
                <?php } ?>

            </td>
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
          // echo " arr_filed :$arr_filed[$key]";
          $filed=$arr_filed[$key] ;
            ?>
            <div class="check-style" style="display: block">
                <input type="checkbox" id="type_sarf<?= $key?>" name="motb3a_option_fk[]"  class="sarf_types" value="<?= $key?>"
                    <?php
                    if (isset($kafala->motb3a_kafala) && (!empty($kafala->motb3a_kafala))&&
                         $kafala->motb3a_kafala->$filed == 1){
                        echo 'checked';
                    }
                    ?>  >
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
