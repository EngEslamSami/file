    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<div class="col-xs-12">

                <!---table------>
                <?php if(!empty($all_council_dates)):?>
                <!--
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  اختر التاريخ </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="session_date"  id="session_date" onchange="return sent($('#session_date').val());">
                                <option> - اختر - </option>

                                    <?php foreach ($all_council_dates as $record):?>
                                        <option value="<? echo $record->session_date; ?>"><?php echo $record->session_date_ar;?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>-->

                <?php  endif; if(isset($records)):?>
                <div class="col-xs-12" >
                        <div class="panel-body">
                            <div class="fade in active" id="optionearea2">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">تاريخ الجلسة</th>
                                            <th class="text-center">بنود الجلسة/القرارات </th>
                                            <th class="text-center">الأعضاء</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php if(isset($records)&&$records!=null):?>

                                    <?php
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
                                            <td><?php echo $x++; ?></td>
                                            <td><?php echo $record->session_date_ar ?></td>
                                            <td>
<button type="button" class="btn  btn-sm center-block  btn-info button" data-toggle="modal" data-target="#myModal_z<?php echo $record->id  ?>" > عرض</button>
                                    <div class="modal" id="myModal_z<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                    <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title"> بنود الجلسات واالقرارات: </h4>
					             	</div>
				                    <div class="modal-body">
                                    <div class="row">
                                    <?php echo form_open_multipart('admin/Directors/follow_up/')?>
                                    <div class="col-xs-12">
                                    <?php if (!empty($decisions[$record->id])): ?>
                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                    <thead><tr>
                                    <th style="color:#0c72ca; ">رقم البند</th>
                                    <th style="color:#0c72ca; ">نص البند</th>
                                    <th style="color:#0c72ca; ">القرار</th>
                                    <th style="color:#0c72ca; ">حالة القرار</th>
                                    </tr></thead>
                                    <tbody>
                                    <?php if (!empty($decisions[$record->id])):
                                    foreach ($decisions[$record->id] as $row):
                                    $condition='';
                                    if($row->motab3a ==0){
                                    $condition='جاري';
                                    }elseif ($row->motab3a ==1){
                                    $condition='تم التنفيذ';
                                    }elseif ($row->motab3a ==2){
                                    $condition='لم يتم التنفيذ';
                                    }
                                    ?>
                                    <tr>
                                    <td><?echo$row->item_num;?></td>
                                    <td><?echo$row->item_title;?></td>
                                    <td><?echo$row->decision_title;?></td>
                                    <td><?echo$condition;?></td>
                                    </tr>
                                    <?php  endforeach;endif;?>
                                    <?php echo form_close()?>
                                    </table>
                                    <?php else: ?>
                                    <h4> لا توجد بنود الجلسات واالقرارات  </h4>
                                    <?php endif; ?>
                                    </div>
                                                          
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </td>
<td>
<!----------------------------------------------------------------->
<button type="button" class="btn btn-sm center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>
                                    <div class="modal" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                    <div class="modal-dialog modal-lg " role="document">
								    <div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title">الأعضاء: </h4>
					             	</div>
				                    <div class="modal-body">
                                    <div class="row">
                                    <?php echo form_open_multipart('admin/Directors/follow_up/')?>
                                    <div class="col-xs-12">
                                     <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                    <h4 class="r-table-text text-left"> التوقيعات : </h4>
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
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
</td>
<td>
<button type="button" class="btn center-block btn-sm  btn-success button" data-toggle="modal" data-target="#myModal_<?php echo $record->id  ?>" > اضافة إجراء</button>
                                    <div class="modal" id="myModal_<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                    <div style="width: 90%;" class="modal-dialog " role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">الإجراء: </h4>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
                                    <div class="col-xs-12">
                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer" style="width:100%;" >
                                    <thead>
                                    <tr>
                                    <th style="color:#0c72ca; ">رقم البند</th>
                                    <th style="color:#0c72ca; ">نص البند</th>
                                    <th style="color:#0c72ca; ">القرار</th>
                                    <th style="color:#0c72ca; ">حالة القرار</th>
                                    <th style="color:#0c72ca; ">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($decisions[$record->id])):
                                    foreach ($decisions[$record->id] as $row):
                                    $condition='';
                                    if($row->motab3a ==0){
                                    $condition='جاري';
                                    }elseif ($row->motab3a ==1){
                                    $condition='تم التنفيذ';
                                    }elseif ($row->motab3a ==2){
                                    $condition='لم يتم التنفيذ';
                                    }
                                    ?>
                                    <tr>
                                    <td><?php echo $row->item_num;?></td>
                                    <td style="max-width:300px;"><?php echo $row->item_title; ?></td>
                                    <td><?php echo $row->decision_title; ?></td>
                                    <td><?php echo $condition;?></td>
                                    <td>
                                    <a href="<?php echo base_url()."Directors/Directors/update_motab3a_state/".$row->id."/0" ?>">
                                    <button type="button"  class="btn btn-sm btn-success ">جاري  </button> </a>
                                    
                                    <a href="<?php echo base_url()."Directors/Directors/update_motab3a_state/".$row->id."/1" ?>">
                                    <button type="button"  class="btn btn-sm btn-warning ">تم التنفيذ  </button> </a>
                                    
                                    <a href="<?php echo base_url()."Directors/Directors/update_motab3a_state/".$row->id."/2" ?>">
                                    <button type="button"  class="btn btn-sm btn-danger ">لم يتم التنفيذ  </button> </a>
                                    </td>
                                    </tr>
                                    <?php  endforeach;endif;?>
                                    </table>
                                    </div>                          
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    </div>
                                    </div>
</div>
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
                <?php endif; ?>

            </div>
            </div>
            </div>
        <!------------------------------------------------------------------------------>
            <script>
                function sent(valu)
                {
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>Directors/Directors/follow_up',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea2').html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea2').html('');
                        return false;
                    }

                }
            </script>