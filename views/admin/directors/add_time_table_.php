<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<!---form------>
<span id="message">
<?php
if(isset($_SESSION['message']))
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
<?php $member_type = array('إختر','دائم','غير دائم','رجل اعمال','عضوية نسائية');

 ?>
</span>
<div class="col-xs-12">
 <?php if(isset($select_all)):?>

            <?php
            
       //     print_r($select_all);
               if(!empty($select_members)):
                $arr =array();
                  foreach( $select_members as $member):
                  $arr[]= $member->members_nums;
                  endforeach;
                   endif;
                echo form_open_multipart('Directors/Directors/edit_time_table/'.$select_all[0]->id)?>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                        
                        <?php
                        /*
                        echo $select_all[0]->session_date;
                        echo '<pre>';
                        print_r($select_all);
                        echo '<pre>';*/
                        ?>
                        
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الجلسة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                    <input type="date" class="form-control" name="session_date" 
                                     value="<? echo date('Y-m-d',$select_all[0]->session_date);?>" placeholder="شهر / يوم / سنة " data-validation="required" >
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <h4 class="r-h4">الأعضاء </h4>
                                    </div>
                                    <div class="col-xs-9 r-input">
                                        <?php if (!empty($members)){
                                            $d=1;
                                            for ($a=0;$a<sizeof($members);$a++):
                                                $checked='';
                                                if(!empty($arr)):
                                                if(in_array($members[$a]->id, $arr)){
                                                $checked ='checked';
                                                }
                                                    endif;
                                                ?>
                                                <input type="checkbox" name="member<? echo $d; ?>"
                                                 value="<? echo $members[$a]->id;  ?>" <? echo $checked; ?>>
                                                    <? echo $members[$a]->member_name;  ?><br>
                                                <?php $d++;endfor;
                                                 }else{ ?>
        <div class="alert alert-danger" role="alert">
       عذرا لا يوجد اعضاء مضافين
</div>
                                                    
                                                 <?php }
                                                
                                                
                                                ?>
                                                                                                
                                    </div>
                                    <input type="hidden" name="max" value="<? echo sizeof($members); ?>"/>
                                </div>

                              <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> إضافة بنود </h4>
                                    </div>
                                    <div class="col-xs-2 r-input">
                                        <input type="number" id="band_num"  name="band_num" min="1" max="10"
                                           onkeyup="return lood_edit($('#band_num').val());" class="form-control text-right"  />
                                    </div>
                                </div>
                                
                            </div>                   
         <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
         <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر كود المجلس  </label>
         <select name="council_id_fk"  class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value=""> - اختر - </option>
          <?php if(!empty($magls)):
                foreach ($magls as $record):
                 $select='';
                 if($select_all[0]->council_id_fk == $record->id){
                 $select='selected';
                 }
                ?>                
               <option value="<?php echo $record->id; ?>" <?php echo $select;?> ><?php echo $record->id;?></option>
               <?php endforeach; endif;?>
               </select>
                       </div>
                            </div>
                        </div>
                               <div  class="col-xs-12" id="optionearea2"></div> 
                                 <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="edit" value="تعديل" />
                        </div>
                        <div class="col-xs-7"></div>
                       


<!---------- bnoood  ----------------------------->
    <?php if(isset($all_items) && $all_items!=null){ ?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم البند</th>
                        <th class="text-center">إسم البند </th>
                        <th class="text-center">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $a=1;
                        
                       
foreach ($all_items as $record ) { ?>
    <tr>
        <td><?php echo $a ?></td>
        <td><?php echo $record->item_num; ?></td>
        <td><?php echo $record->item_title; ?></td>
        <td> <a href="<?php echo base_url('Directors/Directors/delete_item_bnood').'/'.$record->id.'/'.$select_all[0]->council_id_fk.'/'.$record->session_id_fk  ?>"
            onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
         <i class="fa fa-trash" aria-hidden="true">
         </i>
          </a>
        <a href="<?php echo base_url('Directors/Directors/edit_item').'/'.$record->id .'/'.$select_all[0]->council_id_fk.'/'.$record->session_id_fk ?>"> 
         <i class="fa fa-pencil " aria-hidden="true" > </i></a> 
         </td>
    </tr>

    <?php
    $a++;
}  ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php 
}else{
?>
<div class="alert-danger">
<h4>عفوا لا توجد بنود فى هذة الجلسه يرجي  إضافة بنود للجلسة عن طريق التعديل</h4>
</div>
<?php
}
?>
<!--------------------------------------->

                    </div>

                    <!---table------>
                    
                </div>

             <?php echo form_close()?>
             <?php else: ?>
             <?php echo form_open_multipart('Directors/Directors/add_time_table')?>

            <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الجلسة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                    <input type="date" class="form-control " name="session_date" placeholder="شهر / يوم / سنة " data-validation="required" >
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <h4 class="r-h4">الأعضاء </h4>
                                    </div>
                                    <div class="col-xs-9 r-input">
                                        <?php if (!empty($members)){
                                            $d=1;
                                            for ($a=0;$a<sizeof($members);$a++):
                                                ?>
                                                <input type="checkbox" name="member<? echo$d; ?>" value="<? echo $members[$a]->id;  ?>"><?php  echo $members[$a]->member_name;  ?><br>
                                        <?php $d++;endfor; }else{?>
                                        
                                                <div class="alert alert-danger" role="alert">
       عذرا لا يوجد اعضاء مضافين
</div>
        
                                        <?php }  ?>
                                    </div>
                                    <input type="hidden" name="max" value="<? echo sizeof($members); ?>" />
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">البنود </h4>
                                    </div>
                                    <div class="col-xs-2 r-input">
                                        <input type="number" id="band_num"  name="band_num" min="1" max="20" onkeyup="return lood($('#band_num').val());" class="form-control text-right"  data-validation="required" >
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                               
                                
         <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر كود المجلس  </label>
         <select name="council_id_fk"  class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value=""> - اختر - </option>
          <?php if(!empty($magls)):
                foreach ($magls as $record):?>
               <option value="<?php echo $record->id; ?>"><?php echo $record->id;?></option>
               <?php endforeach; endif;?>
               </select>
                         </div>
                        </div>
                        </div>
                        <div  class="col-xs-12" id="optionearea1"></div>
                        <div class="col-xs-4"></div>
                        
                        <?php if ( !empty($members) and !empty($magls )) { ?>
                         <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="add" value="حفظ" />
                        </div> 
                        
                        <?php }else{?>
                        <div class="col-xs-4">
<div class="alert alert-danger" role="alert">
عذرا  تاكد من اضافة مجلس واعضاء 
</div>   </div> 
                        <?php } ?>
                       
                        <div class="col-xs-7"></div>
                        <?php echo form_close()?>

                    </div>

                <!---table------>
                <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">تاريخ الجلسة</th>
                                            <th class="text-center">بنود الجلسة </th>
                                            <th class="text-center">الحضور</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php echo date('d-m-Y',$record->session_date) ?></td>
<td><a href="<?php echo base_url().'Directors/Directors/items_decisions/'.$record->id?>">
<button type="button" class="btn  btn-info btn-sm"><i class="fa fa-list"></i> إجراءات البنود </button></a></td>
<td>
<!----------------------------------------------------------------->
<button type="button" class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>




<div class="modal" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title"> التوقيعات : </h4>
					             	</div>
				                    <div class="modal-body">
                                    <div class="row">
                                    <table class="table table-striped table-bordered dt-responsive nowrap" style="margin-right: 18px;width: 97%;">
                            <thead>
                            <tr>
                                <th style="color:#0c72ca; ">م</th>
                                <th style="color:#0c72ca; ">إسم العضو</th>
                                <th style="color:#0c72ca; ">المسمي الوظيفي</th>
                            </tr>
                            </thead>
                            <tbody>
                         <?php if(!empty($all_members[$record->id])):
                             $a=1;
                             foreach ($all_members[$record->id] as $row):
                            ?>
                         <tr>
                            
                        <td><?php  echo $a ;?></td>
                        <td> <?php echo $get_job_title[$row->members_nums]->member_name?></td>
                        <td> <?php echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->name?></td>
                       </tr>
                        <?php  $a++;  endforeach; endif;?>
                        </tbody>
                        </table>  
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
</div>
</div>
</div>
</div>







<!----------------------------------------------------------------->
</td>
<td> <a href="<?php echo base_url('Directors/Directors/edit_time_table').'/'.$record->id?>"> 
<i class="fa fa-pencil " aria-hidden="true"></i> </a> 
 <a href="<?php echo  base_url('Directors/Directors/delete_time_table').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
  <i class="fa fa-trash" aria-hidden="true"></i></a>
  </td>
    </tr>
    <?php
  
endforeach;  ?>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
</div>
          

            </div>


            </div>
            </div>
            </div>
            
            
            <?php endif; ?>
            <script>
                function lood(num){
                    if(num>0 && num != '')
                    {
                        var id = num;
                        var dataString = 'band_num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>Directors/Directors/add_time_table',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $("#optionearea1").html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $("#vid_num").val('');
                        $("#optionearea1").html('');
                    }
                }
                
                function lood_edit(num){
                    if(num>0 && num != '')
                    {
                        var id = num;
                        var dataString = 'band_num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>Directors/Directors/band_num',
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
                        $("#vid_num").val('');
                        $("#optionearea2").html('');
                    }
                }
                
                
                
                
                
                
            </script>
