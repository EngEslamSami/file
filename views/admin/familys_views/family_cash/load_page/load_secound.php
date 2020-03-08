<div class="col-sm-12 col-md-12 col-xs-12">
    <table id="" class="display table table-bordered   responsive nowrap dataTable no-footer dtr-inline"  >
        <thead>
        <tr class="info">
            <th style="">مسلسل</th>
            <th style="">دائن </th>
            <th style=""> مدين </th>
            <th style="">إسم الحساب</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=1 ;for($x=1;$x<=$madeen_num;$x++){ ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td style="text-align: center;">   ---    </td>
                <td><input type="number" step="any"  name="madeen_value[]" class="form-control cl_madeen" onkeyup="get_calcolate(<?=$qued_value?>,'cl_madeen','span_madeen');"  data-validation="required"/>
                    <span class="span_madeen" style="color: red"></span>
                </td>
                <td>
                    <select name="madeen_acoount_name[]"     class="selectpicker form-control "  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" >
                        <option   value=""  >قم باختيار الحساب </option>
                        <?php foreach($all_accounts  as $record=>$value):?>
                            <option   value="<?php echo $all_accounts[$record]->code?>" style="text-align: right"    <?php if(!empty($disabls['dis'.$record])){echo  $disabls['dis'.$record];}?>>
                                <?php echo $all_accounts[$record]->name ?></option>
                        <?php endforeach;?>
                </td>
            </tr>
        <?php }?>
        <?php for($y=1;$y<=$dayen_num;$y++){ ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td><input type="number"  step="any"    name="dayen_value[]" class="form-control cl_dayen" onkeyup="get_calcolate(<?=$qued_value?>,'cl_dayen','span_dayen');"  data-validation="required"/>
                    <span class="span_dayen" style="color: red"></span>
                </td>
                <td style="text-align: center;">  ---   </td>
                <td>
                    <select name="dayen_acoount_name[]"   class="selectpicker form-control "  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option  value=""  >قم باختيار الحساب </option>
                        <?php foreach($all_accounts  as $record=>$value):?>
                            <option   value="<?php echo $all_accounts[$record]->code?>"   <?php if(!empty($disabls['dis'.$record])){echo  $disabls['dis'.$record];}?> >
                                <?php echo $all_accounts[$record]->name ?></option>
                        <?php endforeach;?>
                </td>
            </tr>
        <?php }?>
        <tr>
            <td> الإجمالى  </td>
            <td> <input type="number"  value="<?=$qued_value?>" id="total_dayen" class="form-control "  readonly="readonly" /> </td>
            <td> <input type="number"  value="<?=$qued_value?>" id="total_madeen"   class="form-control "  readonly="readonly" /></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
<div id="option3"></div>