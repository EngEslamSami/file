<?php  $this->load->view('web/profile/mother_data')  ; ?>
<style>
    .title-top{
        padding: 8px;
        background-color: #1e65a2;
        color: #fff;
        border-radius: 5px;
        font-size: 15px;
    }
    .validation_radio span{

    }

</style>

<div class="tab-content col-md-10">
    <?php if(isset($all_links['financial']) && $all_links['financial']!=null){
        print_r($all_links['financial']);
        return;
        foreach($all_links['financial'] as  $key=>$value){
            $result[$key]=$all_links['financial'][$key];
        }
    }else{
    }
    $arr_yes_no=array('','نعم','لا');
    ?>
    <?php if(isset($all_records)&&!empty($all_records)){ ?>

        <div class="text-center  mother_form">

            <table width="50%">
                <tr>
                    <td> <h5> لتعديل بيانات الماليه</h5></td>
                    <td class="text-center">  <button class="btn" id="link_mother" onclick="hide_money_form();" style="color: #11525d;background-color: #a5dcec;">اضغط هنا  </button>
                    </td>
                </tr>
            </table>
        </div>



    <?php } ?>
    <div class="panel-body money_form"<?php if(isset($all_records)&&!empty($all_records)){?> style="display: none;" <?php } ?>>
        <?php echo form_open_multipart("Mother_data/money/".$this->uri->segment(3))?>


            <div class="form-group col-sm-5 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> رقم السجل المدني للأم  </label>
                <input type="number" class="form-control half input-style" value="<?php if(!empty($mothers_data[0]->mother_national_num_fk)){ echo$mothers_data[0]->mother_national_num_fk;}else{ echo $this->uri->segment(3);}?>" readonly="readonly" />
            </div>
            <div class="form-group col-sm-6 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> إسم الأم  </label>
                <input type="text" class="form-control half input-style" value="<?php  if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;}else { echo "لم يتم اضافته";}?>" readonly="readonly" />
            </div>



            <div class="col-sm-6 col-xs-12">
                <h5 class="title-top"> مصادر الدخل</h5>
                <?php
                $affect_arr=array('لا تؤثر','تؤثر');
                if(!empty($income_sources)){   for($a=0; $a<sizeof($income_sources);$a++){?>
                    <div class="col-xs-12 validation_radio"  style="margin-bottom: 15px; padding: 0">
                   <div class="col-xs-6" style="padding-left: 0">
                        <label class="label label-green main-label " style="padding: 3px 35px;"><?php echo$income_sources[$a]->title_setting?></label>
                        <input type="hidden" name="finance_income_type_id_income<?php echo $a;?>" value="<?php echo$income_sources[$a]->id_setting; ?>">
                        <input type="text" name="value_income<?php echo $a;?>"  data-validation="required" value="<?php
                        if(!empty($all_records[$income_sources[$a]->id_setting])){ echo $all_records[$income_sources[$a]->id_setting]->value;}
                        ?>" onkeypress="validate_number(event);" class="form-control" style="  width: 43%;display: inline-block;" >
                       </div>

                        <?php for ($d=0;$d<sizeof($affect_arr);$d++){
                            $check ='';
                            if(isset($all_records[$income_sources[$a]->id_setting])  && $all_records[$income_sources[$a]->id_setting]!=''){
                                if(  $d == $all_records[$income_sources[$a]->id_setting]->affect){
                                    $check ='checked';
                                }
                            }
                            ?>

                        <div class="col-xs-3" style="padding: 0">
                        <input type="radio" name="affect_income<?php echo $a;?>"   data-validation="required"  <?php echo $check;?> value="<?php echo $d;?>" style="">
                            <label for=""><?php echo $affect_arr[$d];?></label>

                        </div>
                        <?php } ?>
                    </div>
                <?php } } ?>

            </div>

            <div class="col-sm-6 col-xs-12">
                <h5 class="title-top">  الالتزامات المستهدفة</h5>
                <?php

                if(!empty($monthly_duties)){   for($s=0; $s<sizeof($monthly_duties);$s++){?>
                    <div class="col-xs-12"  style="margin-bottom: 15px; padding: 0">
                        <div class="col-xs-6" style="padding-left: 0">
                        <label class="label label-green main-label " style="padding: 3px 35px;"><?php echo $monthly_duties[$s]->title_setting?></label>
                        <input type="hidden" name="finance_income_type_id_duty<?php echo $s;?>" value="<?php echo$monthly_duties[$s]->id_setting; ?>">
                        <input type="text"  name="value_duty<?php echo $s;?>"   data-validation="required"  value="<?php
                        if(!empty($all_records[$monthly_duties[$s]->id_setting])){ echo $all_records[$monthly_duties[$s]->id_setting]->value;}
                        ?>" onkeypress="validate_number(event);" class="form-control" style=" width: 43%;display: inline-block;" >
                        </div>
                        <?php for ($d=0;$d<sizeof($affect_arr);$d++){
                            $check ='';
                            if(isset($all_records[$monthly_duties[$s]->id_setting])  && $all_records[$monthly_duties[$s]->id_setting]!=''){
                                if(  $d == $all_records[$monthly_duties[$s]->id_setting]->affect){
                                    $check ='checked';
                                }
                            }
                            ?>
                        <div class="col-xs-3" style="padding: 0">
                            <input type="radio" name="affect_duty<?php echo $s;?>"   data-validation="required"   <?php echo $check;?> value="<?php echo $d;?>" style="">
                            <label for=""><?php echo $affect_arr[$d];?></label>
                        </div>
                        <?php } ?>
                    </div>
                <?php } } ?>

            </div>


        <!------------------------------------>
        <div class="form-group col-xs-12">
            <?php  if(isset($all_records) && $all_records!=null):
                $input_name1='update';
            else:  $input_name1='add'; endif; ?>
            <input type="hidden" name="income_max" value="<?php echo sizeof($income_sources);?>">
            <input type="hidden" name="duty_max" value="<?php echo sizeof($monthly_duties);?>">
            <button type="submit" class="btn btn-default btn-sm btn-save mt-10" name="<?php echo $input_name1?>"  value="<?php echo $input_name1?>" >حفظ الأن</button>

        </div>
        <?php  echo form_close()?>
        <br/>
        <br/>


    </div>
</div><!-- end of container -->
</section>

<script>
    document.getElementById("loan").onchange = function () {

        if (this.value == '1')
            document.getElementById("loan-cost").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("loan-cost").setAttribute("disabled", "disabled");
            $("#loan-cost").val("")
        }
    };

</script>
<script>
    function hide_money_form() {

        $('.mother_form').hide();
        $('.money_form').show();



    }




</script>