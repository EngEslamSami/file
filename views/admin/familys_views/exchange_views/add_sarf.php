
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php if(! empty($result)){?>
                <?php echo form_open_multipart('family_controllers/Exchange/update_sarf/'.$result['sarf_num']);?>
            <?php }else{?>
                <?php echo form_open_multipart('family_controllers/Exchange/add_sarf');?>
            <?php }?>

            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم طلب الصرف</label>
                    <input type="text" class="form-control half" name="sarf_num" value="<?php if(! empty($result)){ echo $result['sarf_num']; }else{ echo$last_id;} ?>" readonly>
                </div>
    <?php
    $hijriMonths = array("","محرم", "صفر", "ربيع الأول", "ربيع الآخر", "جمادى الأول", "جمادى الأخر",
        "رجب", "شعبان", "رمضان", "شوال", "ذو القعدة", "ذو الحجة"); ?>
            <!--    <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الشهر</label>
                    <select  name="mon_hij" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"    data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                        <?php for($a=1;$a<sizeof($hijriMonths);$a++){?>
                            <option value="<?php echo $a;?>" <?php  if(! empty($result)){ if($result['mon_hij']==$a){ echo'selected';}} ?>><?php echo $hijriMonths[$a];?></option>
                        <?php  }  ?>
                    </select>
                </div>  -->
                
           <!--     
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">السنة</label>
                    <input type="text" data-validation="required" name="year_hij" class="form-control half" value="<?php  if(!empty($result['year_hij'])){ echo $result['year_hij'];}else{ echo $current_year;} ?>">
           
                </div> -->
                
                 <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">تاريخ الصرف  </label>
                       <input type="date" name="cashing_date" value="<?php if(isset($result)){ echo date("Y-m-d",$result["cashing_date"]) ;}?>" class="form-control half input-style" placeholder="/ ---/--- /--" data-validation="required" />
                    </div>
                    
                     <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">تاريخ الاستحقاق </label>
                        <input type="date" name="due_date" value="<?php if(isset($result)){ echo date("Y-m-d",$result["due_date"]) ;}?>" class="form-control half input-style" placeholder="/ ---/--- /--" data-validation="required" />
                    </div>
                    
            </div>
            
            
            <div class="col-sm-12 col-xs-12">
                  
                <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الاجمالى  </label>
                        <input type="text" name="" id="total" value="" class="form-control half input-style"  readonly="" />
                    </div>    
                     
            </div>
            
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-12 col-xs-12">
                <?php if(!empty($sarf)){?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                       <!-- <th><input type="checkbox" name=""  onclick="check(this,'select_all')"></th>
                      -->  
                        <th> م <input type="checkbox" name=""  onclick="check(this,'select_all')" /></th>
                      <th> المستفيد</th>
                        <th>القيمة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($sarf as $record){ 
                        if(!empty($inserted) ){  if(empty($details)){if(in_array($record->id,$inserted)){ // continue;
                        } } }?>
                  <tr>
                  <td> <input  type="checkbox" class="select_all" name="mother_national_if_fk[<?php echo $record->id;?>]" <?php   if(!empty($details)){if(in_array($record->id,$details)){ echo'checked';} }?> value="<?php echo $record->value;?>" id="square" onclick="checkAll()"></td>
                    <td><?php echo $record->name;?></td>
                    <td><?php echo $record->value;?></td>
                  </tr>
                    <?php } ?>
                    <!--<tr>
                        <td colspan="2">الإجمالي</td>
                        <td id="total"></td>
                    </tr>-->
                    </tbody>
                </table>
                <?php } ?>
            </div>
            </div>

        </div>
        <!------------------------------------>
        <div class="col-xs-12 col-lg-pull-5">
            <input type="submit"   id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ"/>
        </div>
        <?php  echo form_close()?>
        <br/>
        <br/>

        <?php if(isset($table) && $table!=null):?>
            <table class="table table-bordered" style="width:100%">
                <thead>
                <th style="text-align: center">م</th>
                <th style="text-align: center">رقم الصرف</th>
                <th style="text-align: center">التفاصيل</th>
                <th style="text-align: center">الإجراء</th>
                </thead>
                <tbody>
                <?php $a=1;
                foreach($table as $records): ?>
                    <tr>
                        <td style="text-align: center"><?php echo $a;?></td>
                        <td style="text-align: center"><?php echo $records->sarf_num; ?> </td>
                        <td style="text-align: center">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalv<?php echo $records->id; ?>">التفاصيل</button>
                        </td>
                        <td style="text-align: center">
                            <a href="<?php echo base_url().'family_controllers/Exchange/update_sarf/'.$records->sarf_num?>"><i class="fa fa-pencil " aria-hidden="true"></i></a>
                            <a href="<?php  echo base_url()?>family_controllers/Exchange/delete_sarf/<?php   echo $records->sarf_num ;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"  ><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a href="<?php echo base_url().'family_controllers/Exchange/exportBankCheat/'.$records->sarf_num?>"><i class="fa fa-download " aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php  $a++; endforeach ?>
                </tbody>
            </table>


        <?php $a=1;
        foreach($table as $records): ?>
            <div class="modal fade" id="myModalv<?php echo $records->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                        </div>
                        <div class="modal-body">
                        <?php  if(!empty($records->details)){?>
                            <table class="table table-responsive table-bordered tab-pane" width="50%">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th>المستفيد</th>
                                    <th>القيمة</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $total=0; $s=1;foreach ($records->details as $record){?>
                                <tr>
                                    <td><?php echo $s;?></td>
                                    <td><?php echo $record->name;?></td>
                                    <td><?php echo $record->value;?></td>
                                </tr>
                                <?php $total+=$record->value ;$s++;} ?>
								<tr>
									<td colspan="2">الإجمالي</td>
									<td id=""><?=$total?></td>
								</tr>
                                </tbody>

                            </table>
                            <?php  } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php  $a++; endforeach ?>
        <?php endif?>
    </div>
</div>


<script>

    function checkAll() {
        var cbs = document.getElementsByClassName('select_all');
        var total =0;
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {

                if( cbs[i].checked){
                    total += parseInt(cbs[i].value);
                }
            }
        }

        $('#total').val(total);
    }


    function check(bx,class_name) {
        var cbs = document.getElementsByClassName(class_name);
        var total =0;
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {
                if(cbs[i].checked = bx.checked){

                    total += parseInt(cbs[i].value);

                }else{
                    total =0;
                }


            }
        }

        $('#total').val(total);
    }



</script>
<!--
<script>

	var table= $('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
        'pageLength',
		'copy', 
        'csv', 
        'excelHtml5',
        {
          extend: "pdfHtml5",
          orientation: 'landscape'
      }, 
      
      {
        extend: 'print',
        exportOptions: { columns: ':visible'},
        orientation: 'landscape'
    },
    'colvis'
    ],
    colReorder: true
} );

</script>

-->