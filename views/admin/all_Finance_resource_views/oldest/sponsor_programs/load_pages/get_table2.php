
<?php
$val = $_POST['valu'];
if(!empty($val)) {
    ?>

    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">نوع الدفع: </h4>
            </div>
            <div class="col-xs-6 r-input">
                <?php   $pay_method = array('إختر', 'نقدي', 'شيك', 'حوالة بنكية', 'استقطاع', 'بنك', 'شبكة'); ?>
                <select name="pay_method_id_fk" id="pay_method_id_fk" onchange="return change();" disabled="disabled">

                    <?php
                    for ($a = 0; $a < sizeof($pay_method); $a++):
                        if ($a == $donors[$val]->pay_method) {
                            $selected = 'selected="selected"';


                            echo $pay_method[$a];

                        } else {
                            $selected = '';
                        } ?>
                        <option <?php echo $selected; ?>
                            value="<?php echo $a; ?>"><?php echo $pay_method[$a]; ?></option>
                        <?php
                    endfor;
                    ?>
                </select>
                <input type="hidden" name="pay_method_id_fk" value="<?php echo $donors[$val]->pay_method; ?>"/>
            </div>
        </div>
    </div>
    <?php if ($donors[$val]->pay_method == 1) { ?>

        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">إختار الصندوق:</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="box_type" class="form-control" data-validation="required" aria-required="true">
                        <option value="">إختر</option>
                        <option value="1">صندوق رجالي</option>
                        <option value="2">صندوق نسائي</option>
                    </select>
                </div>
            </div>
        </div>

    <?php } elseif ($donors[$val]->pay_method == 6) { ?>

        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">إختار الشبكة:</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="network" class="form-control" data-validation="required" aria-required="true">
                        <option value="">إختر</option>
                        <option value="1">شبكة رجالي</option>
                        <option value="2">شبكة نسائي</option>
                    </select>
                </div>
            </div>
        </div>


    <?php } else { ?>


        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">إختار البنك:</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="bank_id" class="form-control" disabled="disabled">
                        <?php
                        foreach ($banks as $bank):
                            if ($bank->id == $donors[$val]->bank_id_fk) {
                                $selected_ = 'selected="selected"';
                            } else {
                                $selected_ = '';
                            } ?>
                            <option <?php echo $selected_; ?>
                                value="<?php echo $bank->id; ?>"><?php echo $bank->bank_name; ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                    <input type="hidden" name="bank_id" value="<?php echo $donors[$val]->bank_id_fk; ?>"/>
                </div>
            </div>
        </div>

        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">رقم الحساب:</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" class="r-inner-h4" name="acc_number"
                           value="<?php echo $donors[$val]->account_number; ?>" readonly="readonly">
                    <input type="hidden" name="acc_number" value="<?php echo $donors[$val]->account_number; ?>"/>
                </div>
            </div>
        </div>
        <?php if ($donors[$val]->pay_method == 5) { ?>

            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">تاريخ الإستحقاق:</h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="text" class="form-control date_melady" id="worth_date" name="worth_date"
                               data-validation="required" placeholder="شهر / يوم / سنة ">
                    </div>
                </div>
            </div>

            <?php
        }
    }
    $day_date = date('Y-m-d');
    // echo $day_date;
    $donor_end_date = date('Y-m-d',$donors[$val]->date_to);

    if($donor_end_date < $day_date){
        echo'    <br />
<br />
        <div class="col-xs-12 alert alert-danger" >الكفالة منتهية</div>';?>
       <script>
            $("#button").attr("class", "hidden");
        </script>
   <?php }else{
        echo'    <br />
<br />
        <div class="col-xs-12 alert alert-success" >الكفالة غير منتهية</div>';
    }
    ?>

<?php  $final_result =0;
if(isset($table[$val]))  {
    ?>
    <br />
    <br />

    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="text-center">م</th>
        <th class="text-center">إسم البرنامج</th>
        <th class="text-center">قيمة البرنامج</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <!-- dina 21/11 -->
    <input type="hidden" name="max" value="<?php echo count($table[$val]);?>" />
    <!-- dina end -->
    <?php
    $x=0;

    $value = 0;


    for($z = 0 ; $z < count($table[$val]) ; $z++){
        $value += $programs[$table[$val][$z]->program_id_fk]->monthly_value;

        echo ' 
                                        
                                         <td>'.($x+1).'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->program_name.'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->monthly_value.'</td>';
        $final_result +=$programs[$table[$val][$z]->program_id_fk]->monthly_value;

        ?>
        <!-- dina 21/11 -->
        <input type="hidden" name="program_id_fk<?php echo $z;?>" value="<?php echo $programs[$table[$val][$z]->program_id_fk]->id;?>" />
        <input type="hidden" name="account_settings_id_fk<?php echo $z;?>" value="<?php echo $programs[$table[$val][$z]->program_id_fk]->account_settings_id_fk;?>" />
        <input type="hidden" name="value<?php echo $z;?>" value="<?php echo $programs[$table[$val][$z]->program_id_fk]->monthly_value;?>" />

        <!-- end -->
        <?php

        echo'</tr>
                                         ';
        $x++;
    }

    echo'<tr>
                                       <td colspan="2">
                                       الإجمالي
                                       </td>
                                       <td>
                                       '.$final_result.'
                                       </td>
                                       </tr>';
}else{
    echo('
                                        <br />
                                        <br />
                                         <div class="col-xs-12 alert alert-danger" >هذا الكفيل غير مشترك ببرامج </div>
                                        ');
}
    ?>


    </tbody>
    </table>

    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">قيمة مشاركة الكفالة:</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" value="<?php echo $final_result ;?>" min="0" id="" class="form-control" data-validation="required" readonly="readonly" placeholder="قيمة مشاركة الكفالة "/>

            </div>
        </div>
    </div>

<?php }else{ ?>
    <br />
    <br />
    <div class="col-xs-12 alert alert-danger" >لا توجد  نتائج</div>
<?php } ?>

