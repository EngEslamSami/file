<style type="text/css">
    .padd {padding: 0 15px !important;}
    .no-padding {padding: 0;}
</style>
<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>إضافة جزاءات</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="details-resorce">
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data r-inner-details">
                        <?php if(isset($result) && $result!=null):?>
                            <?php echo form_open_multipart('Administrative_affairs/edit_penalty/'.$result[0]->id)?>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> تاريخ اليوم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" id="day_date" name="day_date" placeholder="تاريخ اليوم" value="<?php  if(!empty($result[0]->day_date)){echo $result[0]->day_date;}?>"  class="form-control date_melady" data-validation="required" >

                                        </div>
                                    </div>
                                </div>
                                </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإدارة </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <select name="main_depart" id="main_depart" disabled >
                                        <option><?php if(!empty($get_data2[$result[0]->emp_id]))echo $depart_name[$get_data2[$result[0]->emp_id][0]->administration][0]->name;?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الجزاء </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="penalty_type" id="penalty_type" onchange="checkduration(this.value)" data-validation="required">
                                        <?php if(isset($penalties) && $penalties != null){
                                        foreach ($penalties as $penalty) { 
                                            $select = '';
                                            if($result[0]->penalty_type == $penalty->id){
                                                $select = 'selected';
                                            } ?>
                                            <option value="<?=$penalty->id?>"  <?=$select?>><?=$penalty->title?></option>
                                    <?php }
                                    } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> عدد أيام الغياب </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <input type="number" class="val"  id="num_of_absent_day" name="num_of_absent_day"   value="<?php echo $result[0]->num_of_absent_day;?>" onkeyup="getDiscountValue(this.value);"  <?php if( $result[0]->penalty_type==6 || $result[0]->penalty_type==8){?> disabled <?php }?>>
                                </div>
                            </div>
                            <div class="col-xs-12" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القيمة </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <input type="number" class="val" name="value" id="value" value="<?php echo $result[0]->value;?>"  <?php if( $result[0]->penalty_type==6 ){?> disabled <?php }?>>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> التفاصيل </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <textarea name="content" id="content" data-validation="required"  class="r-textarea"><? echo $result[0]->content; ?> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> تاريخ الجزاء </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" id="penalty_date" name="penalty_date" placeholder="تاريخ الجزاء"  value="<?php  if(!empty($result[0]->penalty_date)){echo $result[0]->penalty_date;}?>"  class="form-control date_melady" data-validation="required" >
                                        </div>
                                    </div>

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
                                            <option value="<?php  echo $record->emp_code;?>" <?echo $dis;?>><?php  echo $record->employee;?></option>
                                        <?php  endforeach;  endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القسم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="sub_depart" disabled>
                                        <option><?php if(!empty($get_data2[$result[0]->emp_id]))echo$depart_name[$get_data2[$result[0]->emp_id][0]->department][0]->name;?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> عدد الساعات </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <input type="number" class="val" name="num_of_lateness_hour" id="num_of_lateness_hour"  value="<?php echo $result[0]->num_of_lateness_hour; ?>"   <?php if( $result[0]->penalty_type==7 || $result[0]->penalty_type==8){?> disabled="disabled" <?php }?>>
                                </div>
                            </div>
                            <div class="col-xs-12" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الإنذار </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <select name="warning_type" id="warning_type"   <?php if( $result[0]->penalty_type==6 || $result[0]->penalty_type==7){?>disabled <?php }?>>
                                        <option value="">إختر</option>
                                        <?php $arr=array('','إنذار أول','إنذار ثاني');
                                        for($a=1;$a<sizeof($arr);$a++){
                                            $select ='';

                                            if($result[0]->warning_type == $a ){
                                                $select='selected';

                                            }
                                            ?>
                                            <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $arr[$a];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-sm-12 padd">
                                <button type="submit" name="edit" value="تعديل" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                            </div>
                        </div>
                <?php else:?>
                <?php echo form_open_multipart('Administrative_affairs/add_penalty/')?>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data no-padding">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> تاريخ اليوم </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" id="day_date" name="day_date" placeholder="تاريخ اليوم" class="form-control date_melady" data-validation="required" >

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> الإدارة </h4>
                            </div>
                            <div class="col-xs-6 r-input" id="optionearea3">
                            <?php if($_SESSION['role_id_fk'] ==2){?>
                                <input type="text"  name="main_depart" readonly value="<?php if (!empty($depart_name[$get_data['administration']][0]->name)):
                                          echo $depart_name[$get_data['administration']][0]->name;
                                endif;?>">
                            <? }else{?>
                                    <input type="text" name="main_depart">
                            <?}?>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> نوع الجزاء </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="penalty_type" id="penalty_type" onchange="checkduration(this.value)" data-validation="required">
                                    <option value="">إختر</option>
                                    <?php if(isset($penalties) && $penalties != null){
                                        foreach ($penalties as $penalty) { ?>
                                            <option value="<?=$penalty->id?>" ><?=$penalty->title?></option>
                                    <?php }
                                    } ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-xs-12" >
                            <div class="col-xs-6">
                                <h4 class="r-h4"> عدد أيام الغياب </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <input type="number" class="val"  id="num_of_absent_day" name="num_of_absent_day"   onkeyup="getDiscountValue(this.value);" disabled>
                            </div>
                        </div>
                        <div class="col-xs-12" >
                            <div class="col-xs-6">
                                <h4 class="r-h4"> القيمة </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <input type="number" class="val" name="value" id="value" disabled>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> التفاصيل </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <textarea name="content" id="content" class="r-textarea" data-validation="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data no-padding">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> تاريخ الجزاء </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" id="penalty_date" name="penalty_date" placeholder="تاريخ الجزاء"  class="form-control date_melady" data-validation="required" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  إسم الموظف </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <?php if($_SESSION['role_id_fk'] ==2):?>
                                    <input type="text" name="emp_id" value="<?php echo $get_data['employee'];?>">
                                    <?else:?>
                                    <select name="emp_id" id="emp_id" onchange="getTermsAndCredits(this.value);" data-validation="required" aria-required="true">
                                        <option value=""> - اختر - </option>
                                        <?php if (!empty($employs)):?>
                                          <?php  foreach ($employs as $record):?>
                                            <option value="<?php  echo $record->id;?>"><?php  echo $record->employee;?></option>
                                            <?php  endforeach;?>
                                        <?php endif;?>
                                    <?php endif;?>
                                </select>
                                <div id="optionearea3"></div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> القسم </h4>
                            </div>
                            <div class="col-xs-6 r-input" id="optionearea4">
                            <?php if($_SESSION['role_id_fk'] ==2):?>
                                <input type="text"  name="sub_depart"  readonly value="<?php if (!empty($depart_name[$get_data['department']][0]->name)): echo $depart_name[$get_data['department']][0]->name; endif;?>">
                                <?else:?>
                                    <input type="text" name="sub_depart">
                                <?endif;?>
                            </div>
                        </div>
                        <div class="col-xs-12" >
                            <div class="col-xs-6">
                                <h4 class="r-h4"> عدد الساعات </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <input type="number" class="val" name="num_of_lateness_hour" id="num_of_lateness_hour" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-xs-12" >
                            <div class="col-xs-6">
                                <h4 class="r-h4"> نوع الإنذار </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <select name="warning_type" id="warning_type" disabled>
                                    <option value="">إختر</option>
                                    <?php $arr=array('','إنذار أول','إنذار ثاني');
                                    for($a=1;$a<sizeof($arr);$a++){
                                    ?>
                                        <option value="<?php echo $a;?>"><?php echo $arr[$a];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                        <div class="col-sm-12 padd">
                            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>
                    </div>
                            <?php echo form_close()?>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->uri->segment(3) == ""){ ?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول البيانات</h4>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                    <?php if (!empty($records)){?>

        
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>تاريخ اليوم</th>
                                    <th>إسم الموظف</th>
                                    <th>الإدارة</th>
                                    <th>القسم</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $count=1; foreach($records as $row):?>
                                <tr>
                                    <td><?php echo $count++?></td>
                                    <td><?php echo date('Y-m-d',$row->date);?></td>
                                    <td><?php echo$get_data2[$row->emp_id][0]->employee;?></td>
                                    <td><?php if(!empty($get_data2[$row->emp_id]))echo $depart_name[$get_data2[$row->emp_id][0]->administration][0]->name;?></td>
                                    <td><?php if(!empty($get_data2[$row->emp_id]))echo$depart_name[$get_data2[$row->emp_id][0]->department][0]->name;?></td>
                                    <td> <a href="<?php echo base_url().'Administrative_affairs/edit_penalty/'.$row->id?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i></a>

                                        <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_penalty/".$row->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>

                                            <?php if($_SESSION['role_id_fk'] == 1 ||$_SESSION['role_id_fk'] == 0):?>
                                                <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $row->id;?>"> الإعتماد </button>
                                            <?php endif;?>
                                        </td>
                                    </tr>

                                    <!--start-->
                                    <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                 <h4 class="modal-title">   الإعتماد</h4>
                                             </div>
                                             <br /><br />
                                             <?php echo form_open_multipart('Administrative_affairs/suspend_penalty/'.$row->id)?>
                                             <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-4" style="font-size: 16px;">السبب</div>
                                                    <div class="col-sm-8">
                                                        <textarea name="reason" style="height: 100px;" id="reason" cols="60"
                                                        rows="10"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6" style="font-size: 16px;"><input type="submit" name="accept" value="موافقة" class="btn btn-success btn-xs " /></div>
                                                    <div class="col-sm-6" style="font-size: 16px;">  <input type="submit" name="ref" value="رفض" class="btn btn-danger btn-xs " /></div>
                                                </div>

                                                <br /><br />
                                                <?php echo form_close()?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn manage-close-pop" data-dismiss="modal">إغلاق</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <!--end-->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
          
                <?php }
                else {
                    echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<? } ?>

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
                <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
            </div>
        </div>
    </div>
</div>

<script>

    function getTermsAndCredits(value) {
        search(value);
        go(value);
    }

    function search(valu)
    {
        if(valu)
        {
            var dataString = 'valu=' + valu;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea3').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea3').html('');
            return false;
        }

    }

</script>

<script>
    function go(valuu)
    {
        if(valuu)
        {
            var dataString = 'valuu=' + valuu;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea4').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea4').html('');
            return false;
        }

    }

</script>
<script>
    function checkduration(sele) {
        if(sele == 6){
            document.getElementById("num_of_lateness_hour").value=0;
            document.getElementById("value").value=0;
            document.getElementById("warning_type").value=0;
            document.getElementById("num_of_lateness_hour").removeAttribute("disabled", "disabled");
            document.getElementById("value").setAttribute("disabled", "disabled");

        }
        if(sele == 7){
            document.getElementById("num_of_lateness_hour").setAttribute("disabled", "disabled");
            document.getElementById("num_of_absent_day").removeAttribute("disabled", "disabled");
            document.getElementById("value").removeAttribute("disabled", "disabled");
            document.getElementById("value").value=0;
            document.getElementById("warning_type").value=0;
        }
        if(sele == 8){
            document.getElementById("warning_type").removeAttribute("disabled", "disabled");
            document.getElementById("value").removeAttribute("disabled", "disabled");
            document.getElementById("value").removeAttribute("readonly","readonly");

            document.getElementById("value").value=0;
        }
    }
    
    
    function getDiscountValue(days) {
         var emp_code =$('#emp_id').val();
        if (days >0 && emp_code!='') {
            var dataString = 'days=' + days +'&emp_code=' + emp_code;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/getPenaltyValue',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    document.getElementById("value").setAttribute("readonly","readonly");
                    $('#value').val(JSONObject);
                }
            });
            return false;


        }

    }
</script>

