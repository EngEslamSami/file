


<div class="col-sm-12  no-padding" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">

<?php
if(isset($records) &&!empty($records) && $records !=null) {
?>
<table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="visible-md visible-lg info">
        <th>مسلسل</th>
        <th>رقم الجلسه</th>
        <th>تاريخ الجلسه</th>
        <th>الأعضاء </th>
        <th>حاله الجلسه</th>
        <th>الاعتمادات</th>
        <th>الذهاب للجلسة</th> 
    </tr>

    </thead>
    <tbody>
    <?php
    /*
   echo '<pre>';
    print_r($records);
    */
    
    $options=array(1=>'معتمد',2=>'معتمدمع التحفظ',3=>'معتذر');
    $x=1;
    if(isset($records) &&!empty($records)) {
        foreach ($records as $row) {
                $suspend = "جلسة منتهية ";
                $btn = 'background-color: #e8a50d; color: white;';
            if($row->finished == 1){
                $suspend = "جلسة منتهية ";
                $btn = 'background-color: #e8a50d; color: white;';
            }elseif($row->finished == 0){
                   if($row->suspend == 1){
                         $suspend = "جلسة نشطة";
                         $btn = 'background-color: #3c990b; color: white;';
                    }elseif($row->suspend == 0){
                         $suspend = "جلسة غير نشطة";
                         $btn = 'background-color: #e5343d; color: white;'; 
                    }
            }?>
            <tr>
                <td><?php echo $x; ?></td>
              <!--  <td><?php echo $row->year;?>/<?php echo $row->session_number;?></td> -->
              <td><?php echo $row->glsa_rkm_full;?></td>
                <td><?php echo date('Y-m-d',$row->date) ; ?></td>
                <td>   
                     <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal-member<?=$row->session_number?>">
                     <span class="fa fa-users"></span> أعضاء الجلسة</button>
                </td>
                <td style="<?=$btn?>"><?=$suspend?></td>
                <td>
                    <button type="button" onclick="get_sessin_data('<?php echo $row->session_number; ?>','<?php echo $row->year; ?>');" 
                       class="btn btn-sm btn-add" data-toggle="modal" data-target="#myModal">
                    <span class="fa fa-list"></span>إعتمادات اللجنة</button>
                    
            <!---------------------------------------------------->
            
            
           <?php   if(isset($row->type[0]->type) and $row->type[0]->type != null){
            
            
              if ($row->type[0]->type == 2) {
                                        ?>
                                        <button data-toggle="modal"
                                                data-target="#modal-manager<?=$row->session_number ?>"
                                                onclick="get_details('<?=$row->session_number ?>');"
                                                class="btn btn-xs btn-add">
                                            توجيه المدير العام
                                        </button>
                                        <?php
                                    }
                                     }  
                                     ?>
<!--jjjjjjjj-->
                    
                    
                    
                    
                      <!------------------------------------------------->
        
          <?php if(empty($row->session_attachment) || $row->session_attachment == "0"){ ?>
       <button class="btn btn-sm btn-info"  data-toggle="modal" data-target="#myModal-att-<?=$row->session_number?>" > إرفاق المحضر </button> 
          <?php 
          
        
      if(isset($row->type[0]->type) and $row->type[0]->type != null){
        
        if($row->type[0]->bnod_help_fk == 4 and $row->type[0]->type == 2 ){
            ?>
            
            <a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/PrintSarfType_egar/'.$row->type[0]->surf_num.'/0'.'/'.$row->session_number) ?>" 
title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
<i class="fa fa-print" aria-hidden="true"></i> </a>
            
        <?php   }elseif($row->type[0]->bnod_help_fk != 4  and $row->type[0]->type == 2 ){ ?>
        <a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/PrintSarfType_mali/'.$row->type[0]->surf_num.'/0'.'/'.$row->session_number) ?>" 
title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
<i class="fa fa-print" aria-hidden="true"></i> </a>
            
       <?php    }else{?>
        
            <a target="_blank" href="<?php echo base_url('family_controllers/LagnaSetting/print_mahader_lagna').'/'.$row->session_number ?>" 
            title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
            <i class="fa fa-print" aria-hidden="true"></i> </a>
        
     <?php    }
        
       }else{ ?>
        
            <a target="_blank" href="<?php echo base_url('family_controllers/LagnaSetting/print_mahader_lagna').'/'.$row->session_number ?>" 
            title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
            <i class="fa fa-print" aria-hidden="true"></i> </a>
        
      <?php  } 
          
          
          
          

          
        
          
      /* if($row->id >= 66){ 
         
            ?>
            
  
              <?php if ($row->session_number == 43 ){?>
                                   <a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/Printsarftype_new/5').'/'.$row->session_number ?>" 
              title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
            <i class="fa fa-print" aria-hidden="true"></i> </a>
            
             
           <?php  }elseif($row->session_number == 44){ ?>
            
<a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/PrintSarfType/6/0') ?>" 
title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
<i class="fa fa-print" aria-hidden="true"></i> </a>
            
           <?php }elseif($row->session_number == 46){ ?> 
            
<a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/PrintSarfType/7/0') ?>" 
title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
<i class="fa fa-print" aria-hidden="true"></i> </a>
            
           <?php }elseif($row->session_number == 48){ ?> 
            
<a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/PrintSarfType/8/0') ?>" 
title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
<i class="fa fa-print" aria-hidden="true"></i> </a>
            
           <?php }elseif($row->session_number == 50){ ?> 
            
<a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/PrintSarfType/9/0') ?>" 
title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
<i class="fa fa-print" aria-hidden="true"></i> </a>
            
           <?php }elseif($row->session_number >= 51 and $row->type[0]->bnod_help_fk== 4 ){ ?> 
            
<a target="_blank" href="<?php echo base_url('family_controllers/FamilyCashing/PrintSarfType/'.$row->type[0]->surf_num.'/0') ?>" 
title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
<i class="fa fa-print" aria-hidden="true"></i> </a>
            
           <?php }else{ ?> 
           
                        <a target="_blank" href="<?php echo base_url('family_controllers/LagnaSetting/print_mahader_lagna').'/'.$row->session_number ?>" 
              title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
            <i class="fa fa-print" aria-hidden="true"></i> </a>
           
            <?php }
            
             ?>
            
            
            
        <?php  }else{ ?>
           <a target="_blank" href="<?php echo base_url('family_controllers/LagnaSetting/print_session_decision').'/'.$row->session_number ?>" 
              title="طباعه" class="<?php if($row->finished==0){ echo 'isDisabled' ; }?>"> 
            <i class="fa fa-print" aria-hidden="true"></i> </a>
         
    <?php    }
    */
  
           ?>
          
          
          
            
       <?php  }else{?>
    
               	<a target="_blank" href="<?=base_url()."family_controllers/LagnaSetting/my_download/".$row->session_attachment?>">
                    <i class="fa fa-download" title="تحميل"></i> </a>
        		<a target="_blank" href="<?=base_url()."family_controllers/LagnaSetting/my_read_file/".$row->session_attachment?>">
                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                 <a  href="<?=base_url()."family_controllers/LagnaSetting/DeleteLagnaAttach/".$row->session_number?>"
                       onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
					<i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>    
       <?php  }?>
       <!------------------------------------------------->
       


       
       
       
       
                </td>
                
       <td>
         <?php
         
                 $finished = "الجلسة تم إنتهائها "; 
                 $btn_finish = 'danger';
                    if($row->finished == 0){
                       $finished = "نشط";
                       $btn_finish = 'success';
                    }
          if($row->finished == 0){?>
                 <a target="_blank" href="<?=base_url()."family_controllers/LagnaSetting/GetLagnaDesicion/".$row->session_number?>">
                 <button type="button" class="btn btn-sm btn-warning" ><span class="fa fa-reply-all"></span> الذهاب للجلسة</button>
                  </a>
                 <?php }else{?>
                 <span class="label label-<?=$btn_finish?>"><?=$finished?></span>

               
              <?php } ?>
       
       </td>
                
                
            </tr>
            <?php
            $x++;
        }
    }
    ?>
    </tbody>
</table>
<?php } else{?>

    <div class="alert alert-danger">لا توجد جلسات لهذا المستخدم</div>


<?php }?>
       </div>
   </div>
</div>
   
   <?php if(isset($records) &&!empty($records)) {
        foreach ($records as $record) { ?> 
    <div class="modal" id="myModal-member<?=$record->session_number?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">أعضاء الجلسة</h4>
                                </div>
                     
                                <div class="modal-body">
                                
                                <div class="form-group col-sm-12 col-xs-12">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="greentd">
                                                    <th>م</th>
                                                    <th>إسم العضو</th>
                                                    <th>المنصب الإداري</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if (isset($record->members) && !empty($record->members)){
                                                $z = 1;
                                                foreach ($record->members as $member) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $z++ ?></td>
                                                    <td><?php echo $member->member_name ?></td>
                                                    <td></td>
                                                </tr>
                                              <?php              
                                                }
                                            }
                                            ?>
                                                            
                                              </tbody> 
                                        </table>
                                    </div>
                                    
                                    
                               
                                </div>
                                <div class="modal-footer" style="border-top: 0;">
                                    <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="fa fa-remove"></i></span>إغلاق</button>
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
        <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="fa fa-remove"></i></span>إغلاق</button>
        </div>
    </div>

  </div>
</div>
<!--------------------------------------------------------------------------------->



        <!--jjjjjj  183-->
        <div class="modal fade " id="modal-manager<?= $record->session_number ?>" tabindex="-1"
             role="dialog">
            <div class="modal-dialog  modal-sm " role="document" style="width:30%;">
                <div class="modal-content ">
                    <div class="modal-header "> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">توجيه المدير العام</h3>
                    </div>
                    <div class="modal-body ">
                        <?php  echo form_open_multipart("family_controllers/LagnaSetting/manager_check/" . $record->type[0]->surf_num); ?>
                        <!--                                            <label> --><?//= $row->type[0]->surf_num ?><!--</label>-->
                        <?php if ((isset($all_sarf)) && (!empty($all_sarf))) {
                            foreach ($all_sarf as $sarf) {
                                if ($record->type[0]->surf_num == $sarf->sarf_num) {

                                    ?>
                                   <div class="radio-content">
                                    <input type="radio" id="manager-radio1"
                                           name="manger_check_name" <?php  if ($sarf->manger_check_name == 1) {
                                        echo 'checked';
                                    }
                                    ?> value="1">
                                    <label class="radio-label" for="manager-radio1">لامانع</label>
                                    
                                    
                                    </div>
                                    
                                    
                                    </br>
                                     <div class="radio-content" style="width: 100%;">
                                    <input type="radio" id="manager-radio2"
                                           name="manger_check_name" <?php if ($sarf->manger_check_name == 2) {
                                        echo 'checked';
                                    }
                                    ?> value="2">
                                     <label class="radio-label" for="manager-radio2">
                                    <input type="text" name="manager_text" class="form-control" style="width: 85%;    float: left;" placeholder="اكتب هنا"
                                           value="<?php  if ($sarf->manger_check_name != 2 || $sarf->manger_check_name != 1) {
                                               echo $sarf->manger_check_name;
                                           }
                                           ?>">
                                           </label>
                                           
                                    </div>

                                    <div class=" col-md-12 no-padding">
                                        <label class="">اذكر السبب</label>

                                        <textarea name="manager_reason"
                                                  class="form-control"> <?php echo $sarf->manager_reason;
                                            ?></textarea>
                                            

                                    </div>
                                    <div class="clearfix"></div><br />

                                    <?php

                                }

                            }

                        } ?>

                    </div>
                    <div class="modal-footer " style="display: inline-block; width: 100%;">
                        <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="fa fa-remove"></i></span>إغلاق</button>
       
                        <button type="submit" class="btn btn-success btn-labeled pull-left" data-dismiss="">
                          <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>  حفظ
                        </button>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>

        </div>
        <!-- hggggg-->





<!------------------------------------------------------------------------------------->
   <?php }  } ?> 
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                <strong id="result_head"></strong>
                </h4>
            </div>
           <div class="modal-body">
                 <div id="result_model"></div>
            </div>
            <div class="modal-footer" style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="fa fa-remove"></i></span>إغلاق</button>
       
            </div>
        </div>
    </div>
</div> 

    
    
<script>
    function get_member_decision(member_id,lagna_id,session_id,valu){
        var option =$(".check"+session_id+':radio:checked').val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/make_member_decision",
            data:{member_id:member_id,lagna_id:lagna_id,session_id:session_id,valu:valu},
            success:function(d){
               alert("تم اتخاذ القرار");
            }
        });
    }
</script>

<script>
    function get_sessin_data(session_num ,session_year){
        var dataString =  "session_num=" + session_num;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/LagnaSetting/ShowMemberSession',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
              $("#result_head").html('محضر اجتماع لجنة الرعاية الإجتماعية رقم ('+session_year+'/'+session_num+') ');  
              $("#result_model").html(html);
            }
        });
    }
</script>

