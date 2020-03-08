<style>
.table-td-white tbody td{
    color:#fff;
}
</style>
<div class="col-sm-12 no-padding col-md-12 col-xs-12  " >

        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>

            </div>

            <?php

            if(isset($row) && !empty($row)) {



                $ohda_type_fk = $row->ohda_type_fk;
                $hesab_name = $row->hesab_name;
                $rkm_hesab = $row->rkm_hesab;
//finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting
                echo form_open_multipart('finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting/update_view/'.$row->id);

            }
            else {

                $ohda_type_fk = "";
                $hesab_name = " ";
                $rkm_hesab = "";

                echo form_open_multipart('finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting');
                //return;
            }

            ?>

            <div class="panel-body">
                <div class="form-group col-sm-4 padding-4">
                    
                    <label class="label text-center">نوع العهده</label>
                  
                      <div class="radio-content">
                         <input type="radio" id="mostadem-radio" onchange="check_insert(1);" name="ohda_type_fk" <?php if($ohda_type_fk==1) echo 'checked';?> data-validation="required"   value="1">
                        <label class="radio-label"  for="mostadem-radio"> مستديمه </label>
                    </div>
                    
                    <div class="radio-content">
                         <input type="radio" id="moqta-radio" onchange="check_insert(2);" name="ohda_type_fk" <?php if($ohda_type_fk==2) echo 'checked';?>  data-validation="required"     value="2">
                    
                          <label class="radio-label" for="moqta-radio"> مؤقته </label>
                    </div>
                    
                     <div class="radio-content">
                          <input type="radio"  id="pramij-radio" onchange="check_insert(3);" name="ohda_type_fk" <?php if($ohda_type_fk==3) echo 'checked';?>  data-validation="required"    value="3">
                        <label class="radio-label" for="pramij-radio">عهد البرامج والانشطه </label>
                      </div>
                </div>

                <div class="form-group col-sm-5 padding-4">
                    <label class="label">اسم الحساب </label>
                    <input type="text" value="<?=$hesab_name?>"  class="form-control testButton " name="hesab_name" id="hesab_name" data-validation="required" aria-required="true" readonly="" onclick="$(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')" onkeyup="getVouchQbdAccountName($(this).val());">

                </div>
                <div class="form-group col-sm-2 padding-4">
                    <label class="label"> رقم الحساب </label>
                    <input type="text" class="form-control" placeholder="" id="rkm_hesab" data-validation="required" name="rkm_hesab" value="<?=$rkm_hesab?>">
                </div>
                

                <div class="form-group col-sm-1 padding-4">
                    <button type="submit" id="add" name="add" class="btn btn-success btn-labeled" value="اضافه" style="margin-top: 26px;"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span> اضافه</button>
                </div>


                <?php

                if(isset($records)&&!empty($records)){




                    ?>

                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg">
                            <th>مسلسل</th>
                            <th>نوع العهده </th>
                            <th> اسم الحساب </th>

                            <th> كود الحساب </th>


                            <th>الاجراء</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->ohda_type_name;?></td>
                                <td><?php echo $row->hesab_name;?></td>
                                <td><?php echo $row->rkm_hesab;?></td>



                                <td>



                                    <a href="<?php echo base_url();?>finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting/update_view/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a  href="<?php echo base_url();?>finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting/delete_rec/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                                </td>


                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>

            </div>
            </div>
    </div>





<!-------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered example table-td-white" role="table">
                    <thead>
                    <tr class="info">
                        <th width="2%">#</th>
                        <th class="text-left">رقم الحساب</th>
                        <th class="text-left">إسم الحساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree!=null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count=1)
                    {
                        $types = array(1=>'رئيسي',2=>'فرعي');
                        $nature = array('','مدين','دائن');
                        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
                        //  $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
                        $colorArray = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');

                        foreach ($tree as $record) {
                            $onclick = "alert('ليس حساب فرعي');";
                            if ($record->hesab_no3 == 2) {
                                $onclick = "$('#rkm_hesab'+$('#rkm_hesab').val()).val(".$record->code."); 
                                 
                                
                               
                                 $('#hesab_name'+$('#hesab_name').val()).val('".$record->name."');
                                 $('#myModal').modal('hide');";                            }
                            ?>
                            <tr style="background-color: <?=$colorArray[$record->level]?>; cursor: pointer;color:#fff"
                                onclick="get_hesab_name('<?=$record->name?>','<?=$record->code?>',<?=$record->hesab_no3?>)">
                                <td><?=$count++?></td>
                                <td><?=$record->code?></td>
                                <td><?=$record->name?></td>
                            </tr>
                            <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTable($record->subs, $count++);
                            }
                        }
                        return $count;
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>




<script>

    function get_hesab_name(val1,val2,num)
    {
        //alert(val1);
        if(num==2){
            $('#rkm_hesab').val(val2);
            $('#hesab_name').val(val1);
            $('#myModal').modal('hide');

        }else{
            alert("ليس  حساب فرعي");
        }



    }

</script>



<script>
     function check_insert(valu) {
     //   alert(valu);
         $.ajax({
             type: 'post',
             url: "<?php echo base_url();?>finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting/check_db",
             data: {
                 valu: valu,
             },
             success: function(d) {
               // alert(d);
                 if(d>0)
                 {
                     alert("تمت اضافه هذه العهده من قبل");
                     $('#add').hide();
                 }else{
                     $('#add').show();
                 }


             }

         });
    }


</script>