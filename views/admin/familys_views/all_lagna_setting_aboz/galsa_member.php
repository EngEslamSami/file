<style type="text/css">
    .pdd{margin: 0;padding: 0}
    
    .isDisabled {
    color: currentColor;
    cursor: not-allowed;
    opacity: 0.5;
    text-decoration: none;
}
</style>
<?php
if($this->uri->segment(4) == ""){
    echo form_open_multipart('family_controllers/LagnaSetting/add_selected_member');
}
else {
    echo form_open_multipart('family_controllers/LagnaSetting/editLagna/'.$this->uri->segment(4));
    $lagna = $session_members[0];
}
?>
<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-3">
                <label class="label label-green half">إسم اللجنة</label>
                <input type="text" name="name" value="<?=$all_lagna['lagna_name']?>" class="form-control half input-style" data-validation="required" readonly>
            </div>
            <div class="form-group col-sm-2">
                <label class="label label-green half">كود اللجنه</label>
                <input type="text" id="lagna_number" class="form-control half input-style" placeholder="كود اللجنه" data-validation="required" readonly="readonly" name="lagna_number" value="<?=$all_lagna['id_lagna']?>">
            </div>
            <div class="form-group col-sm-3 pdd">
                <div class="form-group col-sm-12 pdd">
                    <div class="form-group col-sm-6 pdd">
                        <label class="label label-green half">رقم الجلسة</label>
                  
                  <!--      <input type="text" value="<?php if(isset($lagna)) echo $lagna->session_number; else echo ($session_num+1); ?>" id="session_number" name="session_number" readonly="readonly" class="form-control half input-style" placeholder="رقم الجلسة" data-validation="required">
                  -->
<input type="text" value="<?php if(isset($lagna)) echo $lagna->session_number; else echo ($session_num+1); ?>" id="session_number" name="session_number" <?php if($session_num != 0){ ?> readonly="readonly" <? } ?> class="form-control half input-style" placeholder="رقم الجلسة" data-validation="required">

                  
                    </div>
                    <div class="form-group col-sm-6 pdd">
                        <label class="label label-green half">عام</label>
                        <input type="text" name="year" value="<?php if(isset($lagna)) echo $lagna->year; ?>" class="form-control half input-style" placeholder="عام" data-validation="required">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green half">تاريخ الجلسة </label>
                <input type="date" id="lagna_date" class="form-control half input-style " name="date" data-validation="required" placeholder="تاريخ الجلسة " value="<?php if(isset($lagna)) echo date("Y-m-d",$lagna->date); ?>" >
            </div>
            <div class="form-group col-sm-12">
                <?php if (isset($lagna_member) && !empty($lagna_member)) { ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">إسم العضو</th>
                            <th scope="col">المنصب الإداري</th>
                            <th scope="col">الفئة</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $types = array(0 => "عضو متطوع", 1 => "عضو مجلس الاداره", 2 => "عضو الجمعيه العموميه", 3 => "أعضاء الموظفين");
                    foreach ($lagna_member as $row) {
                        $checked = '';
                        if(isset($lagna)) {
                            foreach ($lagna->members as $value) {
                                if($row->member_id == $value->member_id) {
                                    $checked = 'checked';
                                }
                            }
                        }
                        ?>
                        <tr> 
                            <td>
                                <input type="checkbox" name="member_id[]"          value="<?=$row->member_id?>" class="Radiotype"  data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($lagna_member)?>" <?=$checked?>/>
                                <input type="hidden"   name="member_name[]"        value="<?=$row->member_name?>"/>
                                <input type="hidden"   name="member_lagna_id_fk[]" value="<?=$row->id?>"/>
                                <input type="hidden"   name="member_type[]"        value="<?=$row->type?>"/>
                            </td>
                            <td><?php echo $row->member_name; ?></td>
                            <td><?php echo $row->member_job; ?></td>
                            <td><?php echo $types[$row->type]; ?></td>
                        </tr>
                    <?php } ?> 
                    </tbody>
                </table>
                <?php
            }else {
                ?>

                <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء باللجنة   </div>
                <?php
            }
            ?>
            </div>
             <?php if (isset($lagna_member) && !empty($lagna_member)) { ?>
            <div class="form-group col-sm-3">
                <button type="submit" name="add" value="add" class="btn btn-sm btn-purple status"><i class="fa fa-floppy-o"></i> حفظ</button>
            </div>
                <?php }?>
        </div>
    </div>
</div>
<?php 
echo form_close(); 
if($this->uri->segment(4) == "") {
?>

<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">فائمة بالجلسات</h3>
        </div>
        <div class="panel-body">
        <?php if(isset($session_members)&&!empty($session_members)) { ?>
            <table id="" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr class="info">
                        <th>مسلسل</th>
                        <th>رقم الجلسة</th>
                        <th>تاريخ  الجلسة</th>
                        <th>حالة الجلسة</th>
                        <th>الأعضاء </th>
                        <th>الاجراء</th>
                        <th>الذهاب للجلسة </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $x=1;
                foreach($session_members as $record){
                   $suspend = "غير نشط "; 
                   $btn = 'btn btn-sm btn-danger';
                    if($record->suspend == 1){
                       $suspend = "نشط";
                       $btn = 'btn btn-sm btn-success';
                    } 
                ?>
                    <tr>
                        <td><?=$x++?></td>
                        <td><?=$record->year.'/'.$record->session_number?></td>
                        <td><?=date("Y-m-d",$record->date)?></td>
                        <td>
                        <?php if($record->finished == 1){?>
                             <button class="btn btn-sm btn-danger"> تم إنهاء الجلسة </button>
                       <?php  }else{?>
                            <button id="suspend<?=$record->session_number?>" onclick="suspend('<?=$record->session_number?>');" suspend="<?=$record->suspend?>" class="<?=$btn?>"><?=$suspend?></button>
                         <?php  }?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$record->session_number?>"><span class="fa fa-list"></span> التفاصيل</button>
                        </td>
    <td>
         <?php if($record->finished == 0){?>
        <a href="<?php echo base_url('family_controllers/LagnaSetting/editLagna').'/'.$record->session_number ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
         
        <a onclick="$('#adele').attr('href', '<?=base_url()."family_controllers/LagnaSetting/deleteLagna/".$record->session_number?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>  
         <?php }else{?>
          <button class="btn btn-sm btn-danger"> تم إنهاء الجلسة </button>
          
        
          
          <?php  }?>
    </td>
<td >  
<?php if($record->finished == 1){?>
     <button class="btn btn-sm btn-danger"> تم إنهاء الجلسة 
       </button>
      <!------------------------------------------------->
        
          <?php if(empty($record->session_attachment) || $record->session_attachment == "0"){?>
       <button class="btn btn-sm btn-info"  data-toggle="modal" data-target="#myModal-att-<?=$record->session_number?>" > إرفاق المحضر </button> 
            <a target="_blank" href="<?php echo base_url('family_controllers/LagnaSetting/print_session_decision').'/'.$record->session_number ?>" 
              title="طباعه" class="<?php if($record->finished==0){ echo 'isDisabled' ; }?>"> 
            <i class="fa fa-print" aria-hidden="true"></i> </a>
       <?php  }else{?>
    
               	<a target="_blank" href="<?=base_url()."family_controllers/LagnaSetting/my_download/".$record->session_attachment?>">
                    <i class="fa fa-download" title="تحميل"></i> </a>
        		<a target="_blank" href="<?=base_url()."family_controllers/LagnaSetting/my_read_file/".$record->session_attachment?>">
                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                 <a  href="<?=base_url()."family_controllers/LagnaSetting/DeleteLagnaAttach/".$record->session_number?>"
                       onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
					<i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>    
       <?php  }?>
       <!------------------------------------------------->
        <?php  }else{?>
                <?php if($record->suspend == 1){?>
                 <a target="_blank" href="<?=base_url()."family_controllers/LagnaSetting/GetLagnaDesicion/".$record->session_number?>">
                 <button type="button" class="btn btn-sm btn-warning" ><span class="fa fa-reply-all"></span> الذهاب للجلسة</button>
                  </a>
                 <?php }else{?>
                 <button class="<?=$btn?>"><?=$suspend?> </button>
              <?php }?>
        <?php }?>          
</td>
                      </tr>
                    
                <?php } ?>
                </tbody>
            </table>
            <?php 
            } 
            else {
                echo "<div class='alert alert-danger'>لا توجد بيانات</div>";
            }
            ?>
        </div>
    </div>
</div>

 <?php   foreach($session_members as $record){?>
 
 <div class="modal" id="myModal<?=$record->session_number?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">تفاصيل الأعضاء</h4>
                                </div>
                                <br>
                                <div class="modal-body form-group col-sm-12 col-xs-12">
                                <?php
                                if (isset($record->members) && !empty($record->members)){
                                    $z = 1;
                                    foreach ($record->members as $member) {
                                        
                                        echo $z++." - ".$member->member_name.'<br><br>';
                                    }
                                }
                                ?>
                                </div>
                                <div class="modal-footer" style="border-top: 0;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
 <!-------------------------------------------------------------------------------------->
<div id="myModal-att-<?=$record->session_number?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">إرفق الملف </h4>
      </div>
      <div class="modal-body">
       <?php  echo form_open_multipart('family_controllers/LagnaSetting/AddLagnaAttach/'.$record->session_number) ?>
        <div class="form-group col-sm-12">
           <div class="col-sm-9">
                <label class="label label-green half">المرفق</label>
                <input type="file" name="session_attachment" class="form-control half input-style" data-validation="required" />
                <span style="color: red;">برجاء إرفاق ملف pdf</span>
            </div>
            <div class=" col-sm-3">
                <button type="submit" name="ADD" value="ADD" class="btn btn-sm btn-purple status">
                <i class="fa fa-floppy-o"></i> حفظ</button>
            </div>
         </div>    
           <?php echo form_close()?>
      </div>
      <div class="modal-footer" style="display: inline-block; width: 100%;">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>

  </div>
</div>
 <?php }?>

<?php } ?>





<script type="text/javascript">
    function suspend(valu)
    {
       
        var sus = $('#suspend'+valu).attr('suspend');
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/suspendLangna",
            data:{session_number:valu,suspend:sus},
            success:function(d){
                if(sus == 1) {
                    $('#suspend'+valu).html('غير نشط');
                    $('#suspend'+valu).attr('class','btn btn-sm btn-danger');
                }
                else {
                    $('#suspend'+valu).html('نشط');
                    $('#suspend'+valu).attr('class','btn btn-sm btn-success');
                }
                $('#suspend'+valu).attr('suspend',d);
                location.reload();
            }
            
        });

    }
</script>