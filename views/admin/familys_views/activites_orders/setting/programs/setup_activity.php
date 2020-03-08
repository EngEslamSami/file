<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
                <?php if(isset($results)):?>
                    <?php echo form_open_multipart('family_controllers/activites_orders/Settings/update_setup_activity/'.$results->id,array('class'=>"",'role'=>"form" ))?>
                    <div class="details-resorce">
                        <div class="col-sm-12 ">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">البرنامج </label>
                                <select name="prog_id_fk" id="prog_id_fk" class="selectpicker form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" style="display: none;" onchange="get_activiy($('#prog_id_fk').val())">
                                    <option value="">إختر</option>
                                    <?php if(!empty($programs)):

                                        foreach ($programs as $program){
                                            $selected = ''; if($results->prog_id_fk == $program->id ){
                                            $selected = 'selected';
                                            }
                                         ?>
                                            <option <?= $selected ?> value="<? echo $program->id;?>"><? echo $program->name;?></option>
                                        <?php } endif;?>

                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">النشاط </label>

                                <select name="activity_id_fk" id="activity" class=" form-control half" data-show-subtext="true" data-live-search="true"  data-validation="required" >
                                    <?php  if(isset($actives) && !empty($actives) && $actives!=null){
                                        echo '<option value="" >اختار </option>';
                                        foreach($actives as $activity){
                                            $selected = ''; if($results->active_id_fk == $activity->id ){
                                                $selected = 'selected';
                                            }
                                            echo '<option '. $selected.'   value="'. $activity->id .'"  >'. $activity->name .'</option>';
                                        }
                                    }else{
                                        echo '<option disabled value="" >لا يوحد بيانات مضافة </option>';
                                    }?>

                                </select>

                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half"> مكان التنفيذ</label>
                                <select name="place_id_fk" id="place_id_fk" class="selectpicker form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" style="display: none;">
                                    <option value="">إختر</option>
                                    <?php if(!empty($places)):
                                        foreach ($places as $place):
                                            $selected = ''; if($results->place_id_fk == $place->id ){
                                            $selected = 'selected';
                                        } ?>
                                            <option <?= $selected ?> value="<? echo $place->id;?>"><? echo $place->title;?></option>
                                        <?php  endforeach; endif;?>
                                </select>

                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">عدد المستهدف  </label>
                                <input type="text" value="<?= $results->num ?>" class="form-control half " id="num" name="num">

                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">من تاريخ </label>
                                <input type="date" value="<?= $results->from_date ?>" class="form-control  half input-style " id="from_date" name="from_date">

                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">إلي تاريخ </label>
                                <input type="date" value="<?= $results->to_date ?>" class="form-control  half input-style " id="to_date" name="to_date">

                            </div>


        <div class="form-group col-sm-10 col-xs-12">
            <label class="label label-green  half">  أهداف البرنامج </label>
 <textarea id="prog_goals"  name="prog_goals" class="form-control half r-textarea" ><?php  echo $results->prog_goals; ?></textarea>
        
    </div>



                        </div>
                        <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="form-group col-sm-12 col-xs-12">
                                <button type="submit" name="update" value="حفظ" class="btn btn-purple w-md m-b-5 pull-right"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php echo form_open_multipart('family_controllers/activites_orders/Settings/add_setup_activity',array('class'=>"",'role'=>"form" ))?>
                    <div class="details-resorce">
                        <div class="col-sm-12 ">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">البرنامج </label>
                                <select name="prog_id_fk" id="prog_id_fk" class="selectpicker form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" style="display: none;" onchange="get_activiy($('#prog_id_fk').val())">
                                    <option value="">إختر</option>
                                    <?php if(!empty($programs)):
                                        foreach ($programs as $program):?>
                                            <option value="<? echo $program->id;?>"><? echo $program->name;?></option>
                                        <?php  endforeach; endif;?>

                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">النشاط </label>
                                <select name="activity_id_fk" disabled id="activity" class=" form-control half" data-show-subtext="true" data-live-search="true"  data-validation="required" >
                                    <option value="">إختر</option>
                                </select>

                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half"> مكان التنفيذ</label>
                                <select name="place_id_fk" id="place_id_fk" class="selectpicker form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" style="display: none;">
                                    <option value="">إختر</option>
                                    <?php if(!empty($places)):
                                        foreach ($places as $place):?>
                                            <option value="<? echo $place->id;?>"><? echo $place->title;?></option>
                                        <?php  endforeach; endif;?>
                                </select>

                                </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">عدد المستهدف  </label>
                                <input type="text" class="form-control half " id="num" name="num" data-validation="required"  >

                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">من تاريخ </label>
                                <input type="date" class="form-control  half input-style " id="from_date" name="from_date" data-validation="required" >

                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">إلي تاريخ </label>
                                <input type="date" class="form-control  half input-style " id="to_date" name="to_date" data-validation="required" >

                            </div>



        <div class="form-group col-sm-10 col-xs-12">
            <label class="label label-green  half">  أهداف البرنامج </label>
          <textarea id="content"  name="prog_goals" class=" form-control half r-textarea" ></textarea>
        
    </div>




                        </div>
                        <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="form-group col-sm-12 col-xs-12">
                                <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5 pull-right"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); endif; ?>

            </div>

        </div>
<?php if($this->uri->segment(5) == ""){ ?>
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="col-md-12 fadeInUp wow">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>بيانات إقامة الانشطه</h4>
                    </div>
                </div>

                <div class="panel-body">
                    <?php if(isset($records)&&$records!=null){?>
                        <div class="col-xs-12 r-secret-table">
                            <div class="panel-body">
                                <div class="fade in active">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-center"> م </th>
                                            <th class="text-center">اسم البرنامج </th>
                                            <th class="text-center"> اسم النشاط </th>
                                            <th class="text-center"> المكان </th>
                                            <th class="text-center"> الاجراء </th>
                                             <th class="text-center">   اضافات اخري </th>
                                             <th class="text-center"> الطباعه </th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">

                                        <?php
                                        $a=1;
                                        foreach ($records as $record ){ ?>
                                        <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td> <?php echo $record->program; ?></td>
                                            <td><?php echo $record->activity; ?></td>
                                            <td><?php echo $record->place; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('family_controllers/activites_orders/Settings/update_setup_activity').'/'.$record->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                <span> </span>
                                                <a onclick="$('#adele').attr('href', '<?=base_url()."family_controllers/activites_orders/Settings/delete_setup_activity/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td>
                                            
<td>
<button data-toggle="modal"
         data-target="#modal-members<?php echo $record->id;?>"
         class="btn btn-sm btn-info"><i
        class="fa fa-list btn-info"></i>فريق العمل
</button>

<!--
<button data-toggle="modal"
         data-target="#modal-items<?php echo $record->id;?>"
         class="btn btn-sm btn-info"><i
        class="fa fa-list btn-info"></i>فقرات البرنامج 
</button>
-->

<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModals<?php echo$record->id; ?>">بنود مالية</button>
<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModald<?php echo$record->id; ?>">فقرات البرنامج</button>



</td>
 <td><a class="btn btn-sm btn-default" target="_blank" href="<?php echo base_url();?>family_controllers/activites_orders/Settings/print_setup_activity/<?php echo $record->id;?>">  <i class="fa fa-print" hidden="true"></i> طباعة </a></td>
                                                                                       
                                            
                                            
                                            
                                            
                                            
                                        </tr>

                                            <?php $a++;
                                            } ?>
                                        </tbody>
                                    </table>
                                    
<!------------------------ فريق العمل -----------------------> 
  <?php if(isset($records)&&$records!=null){?> 
   <?php foreach ($records as $record ){ ?>
<div class="modal fade" id="modal-members<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:100%;">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
                <div style="color:red;">فريق العمل</div>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            </button>
        </div>
<div class="modal-body row">
<form action="<?php echo base_url(); ?>family_controllers/activites_orders/Settings/add_members_prog" method="post">
   
    <div class="col-xs-12 ">
    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
    <div class="col-xs-12 ">
    <div class="col-xs-6">
    <h4 class="r-h4 "> عدد الأعضاء  </h4>
    </div>
    <div class="col-xs-6 r-input ">
    <input type="number" id="memb_num"  name="memb_num" min="1" max="5" onkeyup="return lood($(this).val() ,'<?php echo $record->id; ?>');" 
    class="r-inner-h4" placeholder="أقصى عدد 5"  />
    </div>
    </div>
    
    </div>
    </div>
   
    <div class="col-xs-12" id="optionearea-<?php echo $record->id; ?>">
    </div>
    <?php if(!empty($record->members)){?>

                            <table class="table table-bordered table-responsive" id="tab_logic">
                                <thead>
                                <th>م</th>
                                <th style="text-align: center">الاسم </th>
                                </thead>
                                <tbody>
                                <?php    $i=1; foreach($record->members as $band){?>
                                    <tr >
                                        <td><?=$i ?></td>
                                        <td><?php echo $band->name;?></td>
                                    </tr>

                                <?php   $i++;}?>
                                </tbody>

                            </table>

                        <?php } ?>
    
    <input type="hidden" name="activity_id_fk" value="<?php echo $record->id; ?>"  />
   

  </div>
        <div class="modal-footer">
          <div class="col-xs-12 ">
             
             <button type="submit" class="btn btn-info" >حفظ</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
           </div>   
        </div>
</form>
                                        </div>
                                    </div>
                                </div>                                  
  <?php  } ?>   
    <?php  } ?>                                
<!------------------------------------------------>    



                                
<!------------------------ فقرات البرنامج  ----------------------->  

<!------------------------------------------------بنود مالية----------------------------------------->
<?php $a=1;foreach ($records as $record ){ ?>
    <div class="modal fade" id="myModals<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">البنود المالية</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 ">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">العدد </label>
                            <input type='text' id="band_num"  class="form-control half" 
                            data-validation="required" onkeypress='validate_number(event)' 
                              onkeyup="getBand($(this).val(),<?php echo $record->id; ?>);" value="0"/>
                        </div>
                        <div id="band_maly-<?php echo $record->id; ?>"></div>
                        <?php if(!empty($record->band_maly)){?>

                            <table class="table table-bordered table-responsive" id="tab_logic">
                                <thead>
                                <th>م</th>
                                <th style="text-align: center">إسم البند</th>
                                <th style="text-align: center">التكلفة</th>
                                <th style="text-align: center">ملاحظات</th>
                                <th style="text-align: center">الإجراء</th>
                                </thead>
                                <tbody>
                                <?php    $i=1; foreach($record->band_maly as $band){?>
                                    <tr >
                                        <td><?=$i ?></td>
                                        <td><?php echo $band->title;?></td>
                                        <td><?php echo $band->cost;?></td>
                                        <td><?php echo $band->notes;?></td>
                                        <td>
                                            <a onclick="$('#mybutton').attr('href', '<?=base_url()."family_controllers/activites_orders/Settings/delete_band_maly/".$band->id?>');" data-toggle="modal" data-target="#modal-deletes" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                        </td>
                                    </tr>

                                    <div class="modal" id="modal-deletes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
                                                    <a id="mybutton" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php   $i++;}?>
                                </tbody>

                            </table>

                        <?php } ?>
                      </div>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
 <?php $a++; } ?>
                                <!------------------------------------------------بنود مالية----------------------------------------->
                                <!------------------------------------------------بنود أخري----------------------------------------->
                                <?php $a=1;foreach ($records as $record ){ ?>
                                    <div class="modal fade" id="myModald<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document" style="width: 70%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">فقرات البرنامج</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12 ">
                                                        <div class="form-group col-sm-4 col-xs-12">
                                                            <label class="label label-green  half">العدد </label>
                                                            <input type='text' id="band_okhra"  class="form-control half" data-validation="required" onkeypress='validate_number(event)' onkeyup="getBandOkhra($(this).val(),<?php echo $record->id; ?>);" value="0"/>
                                                        </div>
                                                        <div id="band_okhra_option-<?php echo $record->id; ?>"></div>
                                                        <?php if(!empty($record->band_okhra)){?>

                                                            <table class="table table-bordered table-responsive" id="tab_logic">
                                                                <thead>
                                                                <th>م</th>
                                                                <th style="text-align: center">إسم البند</th>
                                                                <th style="text-align: center">من</th>
                                                                <th style="text-align: center">إلي</th>
                                                                <th style="text-align: center">ملاحظات</th>
                                                                <th style="text-align: center">الإجراء</th>
                                                                </thead>
                                                                <tbody>
                                                                <?php    $i=1; foreach($record->band_okhra as $band){?>
                                                                    <tr >
                                                                        <td><?=$i ?></td>
                                                                        <td><?php echo $band->title;?></td>
                                                                        <td><?php echo $band->from_t;?></td>
                                                                        <td><?php echo $band->to_t;?></td>
                                                                        <td><?php echo $band->note;?></td>
                                                                        <td>
                                                                            <a onclick="$('#mybutton2').attr('href', '<?=base_url()."family_controllers/activites_orders/Settings/delete_band_okhra/".$band->id?>');" data-toggle="modal" data-target="#modal-deletesd" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                                        </td>
                                                                    </tr>

                                                                    <div class="modal" id="modal-deletesd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
                                                                                    <a id="mybutton2" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php   $i++;}?>
                                                                </tbody>

                                                            </table>

                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="display: inline-block;width: 100%">
                                                    <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $a++; } ?>
                                <!------------------------------------------------بنود أخري----------------------------------------->
                                      
                                    
<!------------------------------------------------>        




                                    
                                </div>
                            </div>
                        </div>
                    <?php }
                    else{ echo'<div class="alert alert-danger">لا توجد بيانات</div>';}
                    ?>
                </div>
            </div>
        </div>
    </div>

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
                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                </div>
            </div>
        </div>
    </div>
<?php }
?>
    </div>
</div>





<script>
    function get_activiy(activiy_id){

        if(activiy_id>0 && activiy_id != '')
        {

            var id = activiy_id;
            var dataString = 'activity_id=' + id ;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/activites_orders/Settings/get_actives',
                data:dataString,
                success: function(html){

                    $('#activity').removeAttr('disabled');
                  $("#activity").html(html);
                }
            });
            return false;
        }else if(activiy_id<=0) {
            document.getElementById('activity').getAttribute('disabled');
        }
    }
</script>



<script type="text/javascript">
    function check_validation() {
        var require = false;
        $(".condimentForm").each(function(){
            if($(this).attr('class') != 'btn-group bootstrap-select form-control condimentForm'){
                if(!$(this).val()){
                    require = true;
                }
            }
        });
        if(require == true){
            alert('يوجد بعض الحقول التي يجب عليك ملئها');
        }
        else{
            $('#fatora_date').removeAttr('disabled');
            $('#supplier_code').removeAttr('disabled');
            $('#paid_type').removeAttr('disabled');
            $('#box_name').removeAttr('disabled');
            var dataString = $("#formPurchases").serialize();
            $.ajax({
                type:'post',
                url: 'http://localhost/Bena_F/Storage/Purchases/PurchasesSession',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#result").html(html);
                }
            });
        }
        return false;
    }
</script>



            <script>
                function lood(num ,option_id){
                    if(num>0 && num != '')
                    {
                      
                        var id = num;
                        var dataString = 'num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>family_controllers/activites_orders/Settings/load_members_num',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $("#optionearea-"+option_id).html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $("#optionearea-"+option_id).html('');
                    }
                }
            </script>
            
            <script>
                function lood_item(num){
                    if(num>0 && num != '')
                    {
                        var id = num;
                        var dataString = 'num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>family_controllers/activites_orders/Settings/load_item_num',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $("#optionearea2").html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $("#optionearea2").html('');
                    }
                }
            </script>
            
                        
  <script>
    function getBand(band_num,activity_id) {
        if(band_num>0 && band_num != '')
        {
            var dataString = 'band_num=' + band_num +'&activity_id=' + activity_id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/activites_orders/Settings/add_setup_activity',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){

                    $("#band_maly-"+activity_id).html(html);
                }
            });
            return false;
        }
    }

</script>


<script>
    function getBandOkhra(band_okhra,activity_id) {
        if(band_okhra >0 && band_okhra != '')
        {
            var dataString = 'band_okhra=' + band_okhra +'&activity_id=' + activity_id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/activites_orders/Settings/add_setup_activity',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#band_okhra_option-"+activity_id).html(html);
                }
            });
            return false;
        }
    }

</script>          
            
            
            
            