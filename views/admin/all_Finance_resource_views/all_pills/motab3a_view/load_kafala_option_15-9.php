

    <div class="form-group">
        <input type="hidden" id="row_id" value="<?= $kafala->id ?>">
        <?php
        $arr_kafala = array('1'=>'جديد','2'=>'تجديد كفالة','3'=>'لا يحتاج لربط','4'=>'مساهمة في الكفالة');
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


