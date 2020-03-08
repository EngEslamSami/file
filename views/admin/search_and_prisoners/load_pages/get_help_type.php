<?php if($this->input->post("help_id_fk") ==1){?>

    <div class="form-group col-sm-6 col-xs-12">
        <label class="label label-green  half">التاريخ التطوري و الاجتماعي </label>
      <!--  <input type="text" name="date_dev" class="form-control half input-style" data-validation="required" placeholder="التاريخ التطوري و الاجتماعي">
      -->  <input type="text"  name="date_dev" value="" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">

    </div>
    <div class="form-group col-sm-6 col-xs-12">
        <label class="label label-green  half">التشخيص </label>
        <input type="text" name="diagnosis" class="form-control half input-style" data-validation="required" placeholder="التشخيص">
    </div>
    <div class="form-group col-sm-6 col-xs-12">
        <label class="label label-green  half">الحالة السكنية </label>
        <textarea  name="sakn" class="form-control half" rows="3" data-validation="required" ></textarea>
    </div>
    <div class="form-group col-sm-6 col-xs-12">
        <label class="label label-green  half">وصف الحالة العامة للمنزل </label>
        <textarea  name="home" class="form-control half" rows="3" data-validation="required" ></textarea>
    </div>
    <div class="form-group col-sm-6 col-xs-12">
        <label class="label label-green  half">رأي الباحث </label>
        <textarea  name="research" class="form-control half" rows="3"  data-validation="required"></textarea>
    </div>
    <div class="form-group col-sm-6 col-xs-12">
        <label class="label label-green  half"> نوع المساعدة النقدية </label>
        <select name="tbro3_type" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
            <?php $arr =array('قم باختيار نوع المساعدة النقدية','مقطوعة نقدية','سداد جزء من الإيجار','مساعدة شيكات من الامانة العامة','سداد دين للدائن','مساعدات اخري');
            for($a=0;$a<count($arr);$a++){ ?>
            <option value="<?php echo $a;?>"><?php echo $arr[$a];?></option>
            <?php } ?>
        </select>
    </div>

<?php

    $all=0;
    if(!empty($interview)){
    foreach($interview as $row){
        $all +=$row->asnaf;
    }
    }

    $all2=0;
    if(!empty($tbro3)){
    foreach($tbro3 as $row2){}
    {
        $all2+=$row2->asnaf;
    }
    }

    $all3=0;
    if(!empty($sarf_orders)){
    foreach($sarf_orders as $row3){
        $all3 +=$row3->name_id;
    }
    }


    $total =$all2-$all-$all3; ?>

    <div class="form-group col-sm-6 col-xs-12 ">
        <label class="label label-green  half">قيمة المساعدة </label>
       <div class="form-group col-sm-6 col-xs-12 no-padding" >
           <input type="text" style="width:60%"    name="date_dev" class=" form-control col-xs-8" value="اجمالي التبرعات<?php echo$total;?>" readonly>
           <input type="number"   style="width:30%"  name="money_first" class=" form-control col-xs-4" >
           <label class="">ريال </label>
        </div>
    </div>







 <?php }elseif($this->input->post("help_id_fk") ==2){ ?>


    <?php if(!empty($asnaf)){?>

        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half">التاريخ التطوري و الاجتماعي </label>
            <input type="text"  name="date_dev" value="" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half">التشخيص </label>
            <input type="text" name="diagnosis"  data-validation="required" class="form-control half input-style" placeholder="التشخيص">
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half">الحالة السكنية </label>
            <textarea  name="sakn" class="form-control half" rows="3" data-validation="required"></textarea>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half">وصف الحالة العامة للمنزل </label>
            <textarea  name="home" class="form-control half" rows="3" data-validation="required"></textarea>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half">رأي الباحث </label>
            <textarea  name="research" class="form-control half" rows="3" data-validation="required"></textarea>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label class="label label-green  half"> نوع المساعدة العينية </label>
            <select name="tbro3_type" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                <?php $arr =array('قم باختيار نوع المساعدة العينية','ادوات كهربائية','مواد غذائية','اخري');
                for($a=0;$a<count($arr);$a++){ ?>
                    <option value="<?php echo $a;?>"><?php echo $arr[$a];?></option>
                <?php } ?>
            </select>
        </div>

<!----------------------------------------->

        <table  class="table table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th>
                    <input type="checkbox" name=""  onclick="checkAll(this,'all_asnaf')">
                </th>
                <th>الأاصناف</th>
                <th>الكمية الموجودة</th>
                <th> الكمية المطلوبة</th>
            </tr>
            </thead>
            <tbody>
            <?php $s=0; foreach ($asnaf as $record): $s++;?>
                <tr>
                    <td>
                        <input type="checkbox" name="select-all[]" value="<?php echo /*$all."-".$row->id;*/ $record->id; ?>" class="all_asnaf">
                    </td>
                    <td><?php echo $record->p_name?> </td>
                    <td>11</td>
                    <td><input type="number" name="amount<?php echo $s;?>" value="" class="form-control " >
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>


<?php
  }else{?>
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="" style="color: black" data-dismiss="alert" aria-label="close">
                    <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                <strong> لاتوجد  أصناف !</strong> .
            </div>
        </div>

<?php  }  } ?>



