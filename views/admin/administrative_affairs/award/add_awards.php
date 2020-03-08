<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>بيانات المكافأة</h4>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="col-xs-12 r-inner-details">
                    <?php if(isset($result) && $result!=null):?>
                      <?php echo form_open_multipart('Administrative_affairs/edit_awards/'.$result[0]->id)?>
                      <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> تاريخ اليوم  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                               
                                        <input type="text" class="form-control date_melady" name="date" value="<? echo date('d/m/Y', $result[0]->date); ?>" placeholder="شهر / يوم / سنة ">
                                
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> التفاصيل </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                               <textarea  name="details" id="content"  class="form-control"><? echo $result[0]->details; ?> </textarea>
                           </div>
                       </div>

                       <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اضافة نموذج الندب </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <input type="file"  name="img">
                        </div>
                    </div>

                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> نوع المكأفأة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="type" id="type"  onchange="return getType($(this));" >
                                <option value="">--إختر--</option>
                                <?php if(isset($rewards) && $rewards != null){
                                foreach ($rewards as $reward) {
                                    $select = '';
                                    if($result[0]->type == $reward->id){
                                        $select = 'selected';
                                    }
                                 ?>
                                    <option value="<?=$reward->id?>" cash="<?=$reward->cash?>" <?=$select?>><?=$reward->title?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  إسم الموظف </h4>
                        </div>
                        <div class="col-xs-6 r-input">

                            <select name="emp_id" id="emp_id" disabled >
                                <option> - اختر - </option>
                                <?php if (!empty($employs)):?>
                                    <?php  foreach ($employs as $record):
                                    $dis ='';
                                    if($result[0]->emp_id == $record->id){
                                        $dis ='selected';

                                    }?>
                                    <option value="<?php  echo $record->id;?>" <?echo $dis;?>><?php  echo $record->employee;?></option>
                                <?php  endforeach;?>
                            <?php endif;?>
                        </select>

                    </div>
                </div>

                <?php if($result[0]->value >0 ){?>

                <div class="col-xs-12" id="value"  >
                    <div class="col-xs-6">
                        <h4 class="r-h4"> قيمة المكافأة </h4>
                    </div>
                    <div class="col-xs-6 r-input" >
                        <input type="number" id="valNum" name="value" value="<? echo $result[0]->value;?>" >
                    </div>
                </div>
                <? }else{?>
                <div class="col-xs-12" id="value" style="display: none;" >
                    <div class="col-xs-6">
                        <h4 class="r-h4"> قيمة المكافأة </h4>
                    </div>
                    <div class="col-xs-6 r-input" >
                        <input type="number"  name="value" id="valNum" >
                    </div>
                </div>
                <? } ?>
            </div>

            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">

                <div class="form-group col-sm-12 col-xs-12">
                    <button type="submit" name="edit" value="تعديل" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>

            </div>


        <?php else:?>
            <?php echo form_open_multipart('Administrative_affairs/add_awards/')?>

            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تاريخ اليوم  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                       
                                <input type="text" class="form-control date_melady" name="date" placeholder="شهر / يوم / سنة " data-validation="required">
                        
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> التفاصيل </h4>
                    </div>
                    <div class="col-xs-6 r-input" >
                        <textarea name="details" id="details" data-validation="required" class="form-control"></textarea>
                    </div>
                </div>
<!--
                <div class="col-xs-12" >
                    <div class="col-xs-6">
                        <h4 class="r-h4"> اضافة نموذج الندب </h4>
                    </div>
                    <div class="col-xs-6 r-input" >
                        <input type="file" data-validation="required" name="img">
                    </div>
                </div>
-->
            </div>
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع المكأفأة </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <select name="type" id="type" data-validation="required" onchange="return getType($(this));" >
                            <option value="">--إختر--</option>
                            <?php if(isset($rewards) && $rewards != null){
                            foreach ($rewards as  $reward) { ?>
                                <option value="<?=$reward->id?>" cash="<?=$reward->cash?>"><?=$reward->title?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">  إسم الموظف </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <?php if($_SESSION['role_id_fk'] ==2):?>
                            <input type="text" name="emp_id" value="<?php echo $get_data['employee'];?>" data-validation="required">
                            <?else:?>
                                <select name="emp_id" id="emp_id" data-validation="required">
                                    <option value=""> - اختر - </option>
                                    <?php if (!empty($employs)):?>
                                      <?php  foreach ($employs as $record):?>
                                        <option value="<?php  echo $record->id;?>"><?php  echo $record->employee;?></option>
                                    <?php  endforeach;?>
                                <?php endif;?>
                            <?php endif;?>
                        </select>

                    </div>

                </div>

                <div class="col-xs-12" id="value" style="display: none">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> القيمة </h4>
                    </div>
                    <div class="col-xs-6 r-input" >
                        <input type="number" id="valNum" name="value">
                    </div>
                </div>
            </div>

            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                <div class="form-group col-sm-12 col-xs-12">
                    <button type="submit" name="add" value="إضافة" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> إضافة </button>
                </div>
            </div>

            <?php echo form_close()?>
        <?php endif?>
    </div>
</div>
</div>
</div>
</div>


<?php if (!empty($records)):?>

    <div class="col-sm-12 col-md-12 col-xs-12">
        <br>
        <div class="top-line"></div>
        <div class="col-md-12 fadeInUp wow">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>تفاصيل الإدارة</h4>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-xs-12 r-inner-details">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>تاريخ اليوم</th>
                                    <th>إسم الموظف</th>
                                    <th>الإدارة</th>
                                    <th>القسم</th>
                                    <th>قيمة المكافأة </th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count=1; foreach($records as $row):?>
                                <tr>
                                    <td><?php echo $count++?></td>
                                    <td><?php echo date('Y-m-d',$row->date);?></td>
                                    <td><?php echo$get_data2[$row->emp_id][0]->employee;?></td>
                                    <td><?php if(!empty($get_data2[$row->emp_id]))echo $depart_name[$get_data2[$row->emp_id][0]->administration][0]->name;?></td>
                                    <td><?php if(!empty($get_data2[$row->emp_id]))echo$depart_name[$get_data2[$row->emp_id][0]->department][0]->name;?></td>

                                    <td><?php echo $row->value ?></td>
                                    <td> <a href="<?php echo base_url().'Administrative_affairs/edit_awards/'.$row->id?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i></a>

                                        <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_awards/".$row->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> 

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif;?>

<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                </div>
                <div class="modal-body">
                    <p id="text">هل أنت متأكد من الحذف؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
                </div>
            </div>
        </div>
    </div>

<script>
   function getType(sele) {
        var cash = sele.find('option:selected').attr('cash');
        if(cash == 1){
           $('#value').show();
           $('#valNum').val(0)
       }else{
           $('#value').hide();
           $('#valNum').val(0)
       }


   }
</script>

