
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <br/>
            <br/>
            <?php 
            
            
            if(isset($sarfs)&& $sarfs!=null):?>
       
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">رقم الصرف</th>
                                <th class="text-center">اسم بند المساعدة </th>
                                <th class="text-center">عن شهر</th>
                                <th class="text-center">اجمالي المبلغ</th>
                                <th class="text-center">الاجراءات</th>
                                <th class="text-center">التحميل</th>
                                <th class="text-center">الاجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $x=1;
                            foreach ($sarfs as $record ):?>
                            <?php $months = array("1" => "يناير","2" => "فبراير","3" => "مارس","4" => "أبريل","5" => "مايو",
                                "6" => "يونيو","7" => "يوليو","8" => "أغسطس","9" => "سبتمبر","10" => "أكتوبر",
                                "11" => "نوفمبر","12" => "ديسمبر"); ?>
                                <tr>
                                    <td><?php echo $x++ ?></td>
                                    <td><?php echo $record->sarf_num; ?></td>
                                    <td><?php echo $record->band_name; ?></td>
                                    <td><?php echo $months[$record->mon_melady]; ?></td>
                                    <td><?php echo $record->total; ?></td>

                                    <td>
                                        <?php if($record->approved == 1){
                                            $class ="success";
                                            $value =0;
                                            $titlee ="معتمد";
                                        } elseif($record->approved == 2) {
                                            $class ="danger";
                                            $value =1;
                                            $titlee ="غير معتمد";
                                        }?>


                                     
                                           <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?= $record->id?>">
                                           إعتماد</a>
                                            <!--
                                           <a class="btn btn-warning btn-xs" href="<?php echo  base_url('family_controllers/Exchange/updateSarfToNunAproved').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من العملية ؟');" >
                                              غير معتمد</a> 
                                     
                                           <button type="button" class="btn btn-sm btn-<?=$class?>"><?=$titlee?></button> -->
                                   
                                     <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalv<?php echo $record->id; ?>">التفاصيل</button>
                                    </td>
                                    <td> <a href="<?php echo base_url().'family_controllers/Exchange/exportBankCheat/'.$record->sarf_num?>">
                                    <i class="fa fa-download " aria-hidden="true"></i></a>
                                    </td>
                                    <td> <!-- <a href="">
                                            <i class="fa fa-pencil " aria-hidden="true"></i> </a> -->
                                        <a href="<?php echo  base_url('family_controllers/Exchange/deleteFilsSarf').'/'.$record->sarf_num ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                <?php endforeach;  ?>
                           
                            </tbody>
                        </table>


  <?php $a=1;
  

  
   foreach($sarfs as $records): ?>
            <div class="modal fade" id="myModalv<?php echo $records->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog " role="document" style="width: 95%;">
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
                                    <th>رقم الملف </th>
                                     <th class="text-center">اسم العائلة</th>
                                    <th>اسم مسؤل الحساب البنكى </th>
                                    <th>رقم الهوية</th>
                                    <th class="text-center">رقم الحساب البنكي </th>
                                      <th class="text-center">إسم البنك </th>
                                      <th class="text-center">رمز البنك </th>
                                    
                                    
                                    <th class="text-center">المبلغ </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                
                           /*      echo '<pre>';
            print_r($records->details);
            echo '<pre>';*/
                                
                                 $total=0; $s=1;foreach ($records->details as $record){?>
                                <tr>
                                    <td><?php echo $s;?></td>
                                    <td><?php echo $record->mother_national_if_fk;?></td>
                                     <td><?php echo $record->name;?></td>
                                    <td><?php echo $record->bank_account_name;?></td>
                                    <td><?php echo $record->bank_account_card_id;?></td>
                                    <td><?php echo $record->bank_account_num;?></td>
                                     <td><?php echo $record->title;?></td>
                                      <td><?php echo $record->bank_code;?></td>
                                   
                                      <td><?php echo $record->value;?></td>
                                </tr>
                                <?php $total+=$record->value ;$s++;} ?>
								<tr>
									<td colspan="6">الإجمالي</td>
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
            
            
             <?php endif; ?>
        </div>
    </div>
</div>



<?php if(isset($sarfs)&& $sarfs!=null):?>
<?php foreach ($sarfs as $record ):?>
        <div class="modal fade" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
        <div class="modal-content">
            <form action="<?php echo base_url('family_controllers/Exchange/updateSarfToAproved').'/'.$record->id ?>" method="post" class="has-validation-callback">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">اعتماد الصرف</h4>
            </div>

            <div class="modal-body">
                <div class="row" style="padding: 20px">

                    <div class=" col-sm-12 col-xs-12">
                    
                      <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">تاريخ الإستحقاق (تاريح الإرسال) </label>
                            <input type="date" name="due_date" value="<?php if($record->due_date !=0){ echo date("Y-m-d",$record->due_date);}?>" class="form-control half input-style" placeholder="/ ---/--- /--" data-validation="required">
                        </div>
                    
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">تاريخ الصرف  </label>
                            <input type="date" name="cashing_date" value="<?php if($record->cashing_date !=0){ echo date("Y-m-d",$record->cashing_date);}?>" class="form-control half input-style" placeholder="/ ---/--- /--" data-validation="required">
                        </div>
                      
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="make_approve" value="add" class="btn btn-success">حفظ</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>

            </form>
        </div>
    </div>
</div>
<?php endforeach;  ?>

<?php endif; ?>
