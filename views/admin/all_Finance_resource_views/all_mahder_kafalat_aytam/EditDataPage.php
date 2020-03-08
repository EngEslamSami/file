<style>
.label{
    font-size: 15px !important;
}
</style>


 <?php /*
 echo "<pre>";
 print_r($_POST);
 echo "</pre>";
 die;*/
 ?>
                <div id="">
                    <?php if(!empty($_POST['mostafed_id'])){ ?>
                    <input type="hidden" name="mostafed_id" id="mostafed_id" value="<?php echo $_POST['mostafed_id']; ?>">
                    <?php } ?>
                    <?php if(!empty($_POST['categoriey'])){ ?>
                    <input type="hidden" name="person_type" id="person_type" value="<?php echo $_POST['categoriey']; ?>">
                    <?php } ?>
                    <div class="col-md-12">
                        <div class="form-group col-md-6 col-sm-6 padding-4">
                            <label class="label ">نوع الكفالة

                        <?php


                        if(!empty($_POST['categoriey'])){ $categoriey = $_POST['categoriey']; }
                        if(isset($kfalat_types)&&!empty($kfalat_types)) {
                            foreach($kfalat_types as $value){
                                ?>
                                <input  type="radio" name="kafala_type_fk" id="kafala_type_fk" style="margin-right: 15px"  value="<?=$value->id ?>"

                                    <?php  if(!empty($categoriey)){  if($categoriey ==2){
                                    if($value->id ==3 || $value->id ==4){
                                        echo'disabled';
                                    } }elseif ($categoriey ==3){
                                        if($value->id ==3 ){

                                            echo' checked disabled';
                                    }
                                    }elseif ($categoriey ==1){
                                        if($value->id ==4 ){
                                            echo' checked disabled';
                                    }
                                    }  }?>
                                        data-validation="required">
                                <label

                                        <?php   if(!empty($categoriey)){ if($categoriey ==2){
                                    if($value->id ==1 || $value->id ==2){
                                            ?>
                                                style="color: red !important;"
                                    <?php } }elseif ($categoriey ==3){if($value->id ==3 ){
                                        echo 'style="color: red !important;"';
                                        }
                                        }elseif ($categoriey ==1){  if($value->id ==4 ){
                                            echo 'style="color: red !important;"';
                                        } } }?>



                                        for="square-radio-1"><?=$value->title?></label>
                                <?php

                                if(!empty($categoriey)){
                                if ($categoriey ==3){
                                    if($value->id ==3 ){?>
                                        <input type="hidden" name="kafala_type_fk" id="kafala_type_fk" value="3">
                                        <?php
                                    }
                                }elseif ($categoriey ==1){
                                    if($value->id ==4 ){?>
                                        <input type="hidden" name="kafala_type_fk" id="kafala_type_fk" value="4">

                                    <?php } } }?>
                                <?php
                            }
                        }
                        ?></label>

                        </div>
                        <div class="form-group col-md-5  col-sm-6 padding-4">
                            <label class="label ">الكافل </label>
                            <input   autocomplete="off" style="width:85%; float: right;" type="text" name="kafel_name" id="kafel_name" class="form-control  list inputclass"
                                     value=" " data-validation-has-keyup-event="true"   />
                            <input type="hidden" name="kafel_id" id="kafel_id">

                            <button type="button"  onclick="GetDiv(1)"  data-toggle="modal"    class="btn btn-success btn-next" style="float: right;">
                                <i class="fa fa-plus"></i>  </button>
                        </div>
                    </div>

                    <div id="FormData"></div>

</div>


