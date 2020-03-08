<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <?php
            $view['date']='';
            $view['interview_id'] ='';
            $view['prisoner_id'] ='';
            $view['help_id'] ='';
            $view['emp_id'] ='';
            $view['date_dev'] ='';
            $view['diagnosis'] ='';
            $view['sakn'] ='';
            $view['home']  ='';
            $view['research']  ='';
            $view['tbro3_type']  ='';
            $view['money_first']  ='';
            $view['data-validation']  ='';
            $view['aria-required']  ='';
            $view['form']  ='';
        if(!empty($result)){
            $view['date']= date("Y-m-d",$result['date']);
            $view['interview_id'] =$result['interview_id'];
            $view['prisoner_id'] =$result['prisoner_id'];
            $view['help_id'] =$result['help_id'];
            $view['emp_id'] =$result['emp_id'];
            $view['date_dev'] =$result['date_dev'];
            $view['diagnosis'] =$result['diagnosis'];
            $view['sakn']  =$result['sakn'];
            $view['home']  =$result['home'];
            $view['research']  =$result['research'];
            $view['tbro3_type']  =$result['tbro3_type'];
            $view['money_first']  =$result['asnaf'];
            $view['data-validation']  ='required';
            $view['aria-required']  ='true';
            $view['form']  ='Update_interview/'.$result['id'];
        }else{
            $view['date'] =date("Y-m-d");
            $view['interview_id'] =$last_id +1;
            $view['prisoner_id'] ='';
            $view['help_id'] ='';
            $view['emp_id'] ='';
            $view['date_dev'] ='';
            $view['diagnosis'] ='';
            $view['sakn'] ='';
            $view['home']  ='';
            $view['research']  ='';
            $view['money_first']  ='';
            $view['data-validation']  ='';
            $view['aria-required']  ='';
            $view['form']  ='Add_interview';
        }?>


        <div class="panel-body">
            <?php echo form_open_multipart("Search_and_prisoners/".$view['form'],array('id'=>'forma'))?>

            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">تاريخ المقابلة</label>
                    <input type="text"   disabled name="date" class=" docs-date form-control half input-style" value="<?php echo   $view['date'];?>" placeholder="/ ---/--- /--" required="" >

                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">رقم المقابلة </label>
                    <input type="text"  readonly name="interview_id" class="form-control half input-style"  value="<?php echo  $view['interview_id'];?>" >
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half"> إسم السجين </label>
                    <select name="prisoner_id" class="form-control half selectpicker" data-validation="<?php echo  $view['data-validation'];?>" aria-required="<?php echo $view['aria-required'];?>" tabindex="-1" aria-hidden="true" data-show-subtext="true" data-live-search="true">
                        <option value="">قم باختيار إسم السجين </option>
                        <?php if(!empty($prisoners)){ foreach($prisoners as $record){  $select=''; if(!empty($view['prisoner_id'])){  if($record->id ==$view['prisoner_id']){ $select='selected';} }?>
                        <option value="<?php echo $record->id;?>" <?php echo $select;?>><?php echo $record->nazeel_name;?></option>
                        <?php } }?>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half"> نوعية المساعدة </label>
                    <select name="help_id" class="form-control half" data-validation="<?php echo  $view['data-validation'];?>"  onChange="load(this.value)" aria-required="<?php echo $view['aria-required'];?>" tabindex="-1" aria-hidden="true">
                       <?php $help_arr =array('قم باختيار نوعية المساعدة','مساعدة نقدية','مساعدة عينية');  for($a=0;$a<sizeof($help_arr);$a++){ $select=''; if(!empty($view['help_id'])){  if($a == $view['help_id']){$select='selected';}}?>
                        <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $help_arr[$a];?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12" id="help_option">

                <!-------------------edit--------->

                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">التاريخ التطوري و الاجتماعي </label>
                  <!--  <input type="text" name="date_dev" class="form-control half input-style" placeholder="التاريخ التطوري و الاجتماعي" value="<?php /*echo $view['date_dev'];*/?>">
                  -->  <input type="text"  name="date_dev" value="<?php echo $view['date_dev']; ?>" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">

                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">التشخيص </label>
                    <input type="text" name="diagnosis" class="form-control half input-style" placeholder="التشخيص" value="<?php echo  $view['diagnosis'];?>">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">الحالة السكنية </label>
                    <textarea  name="sakn" class="form-control half" rows="3" ><?php echo $view['sakn'];?></textarea>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">وصف الحالة العامة للمنزل </label>
                    <textarea  name="home" class="form-control half" rows="3" ><?php echo $view['home'];?></textarea>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">رأي الباحث </label>
                    <textarea  name="research" class="form-control half" rows="3" ><?php echo $view['research'];?></textarea>
                </div>

                    <?php if($view['help_id'] ==1){?>

                        <div class="form-group col-sm-6 col-xs-12">
                            <label class="label label-green  half"> نوع المساعدة النقدية </label>
                            <select name="tbro3_type" class="form-control half" data-validation="<?php echo  $view['data-validation'];?>" aria-required="<?php echo $view['aria-required'];?>" tabindex="-1" aria-hidden="true">
                                <?php $arr =array('قم باختيار نوع المساعدة النقدية','مقطوعة نقدية','سداد جزء من الإيجار','مساعدة شيكات من الامانة العامة','سداد دين للدائن','مساعدات اخري');
                                for($a=0;$a<count($arr);$a++){  $select=''; if(!empty($view['tbro3_type'])){ if($view['tbro3_type'] == $a ){$select='selected'; }} ?>
                                    <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $arr[$a];?></option>
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
                                <input type="number"   style="width:30%"  name="money_first" class=" form-control col-xs-4"  value="<?php echo  $view['money_first'];?>">
                                <label class="">ريال </label>
                            </div>
                        </div>

                    <?php }elseif($view['help_id'] ==2){?>

                        <div class="form-group col-sm-6 col-xs-12">
                            <label class="label label-green  half"> نوع المساعدة العينية </label>
                            <select name="tbro3_type" class="form-control half" data-validation="<?php echo  $view['data-validation'];?>" aria-required="<?php echo $view['aria-required'];?>" tabindex="-1" aria-hidden="true">
                                <?php $arr =array('قم باختيار نوع المساعدة العينية','ادوات كهربائية','مواد غذائية','اخري');
                                for($a=0;$a<count($arr);$a++){  $select=''; if(!empty($view['tbro3_type'])){ if($view['tbro3_type'] == $a ){$select='selected'; }} ?>
                                    <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $arr[$a];?></option>
                                <?php } ?>
                            </select>
                        </div>


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
                            <?php $s=0; foreach ($asnaf as $record): $s++;    $values =unserialize($view['money_first']);
                                    $check ='';
                                if (array_key_exists($record->id, $values)) {
                                    $check ='checked';
                                }
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="select-all[]" value="<?php echo $record->id; ?>"  <?php echo $check;?> class="all_asnaf">
                                    </td>
                                    <td><?php echo $record->p_name?> </td>
                                    <td>11</td>
                                    <td><input type="number" name="amount<?php echo $s;?>" value="<?php if(!empty($values[$record->id])){echo $values[$record->id];}?>" class="form-control " >
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>

                    <?php }?>
                <!-------------------edit--------->
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half"> إسم الباحث </label>
                    <select name="emp_id" class="form-control half" data-validation="<?php echo  $view['data-validation'];?>" aria-required="<?php echo $view['aria-required'];?>" tabindex="-1" aria-hidden="true">
                        <option value="">قم باختيار إسم الباحث </option>
                        <?php if(!empty($employees)): foreach($employees as $record): if(!empty($view['emp_id'])){ $select=''; if($record->emp_code ==$view['emp_id']){ $select='selected';} }?>
                        <option value="<?php echo $record->emp_code;?>" <?php echo $select;?>> <?php echo $record->employee;?>  </option>
                        <?php endforeach; endif;?>
                    </select>
                </div>
            </div>
            <!------------------------------------>

            <div class="col-xs-12 col-xs-pull-5">
              <?  if(!empty($result)){?>
                  <button type="submit" name="update_interview" value="update_interview" onclick="deport2('forma','option_cach');" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> إضافة</button>

                <?php }else{?>
                  <button type="submit" name="add_interview" value="add_interview" onclick="deport('forma','option_cach');" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> إضافة</button>

              <?php }?>
            </div>
            <?php  echo form_close()?>
            <div id="option_cach"></div>
        </div>
    </div>
</div>

<script>
    function load(help_id) {
        if(help_id >0 && help_id  != '') {
            var dataString = 'help_id_fk=' + help_id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Search_and_prisoners/Add_interview',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#help_option").html(html);
                }
            });
            return false;
        }

    }

</script>



<script>
    function deport(name_form,div_name){
        var name_div =  "#"+div_name;
        var form_name =  "#"+name_form;
        var dataString = $(form_name).serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Search_and_prisoners/Add_interview',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $(name_div).html(html);
            }
        });
        return false;
    }

    function deport2(name_form,div_name){
        var name_div =  "#"+div_name;
        var form_name =  "#"+name_form;
        var dataString = $(form_name).serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Search_and_prisoners/Update_interview',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $(name_div).html(html);
            }
        });
        return false;
    }
    //---------------------------------------------------------------------------------
    function checkAll(bx,class_name) {
        var cbs = document.getElementsByClassName(class_name);
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
</script>
