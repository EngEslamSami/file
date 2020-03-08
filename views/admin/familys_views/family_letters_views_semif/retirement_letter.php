
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(!empty($result)){ ?>
            <form action="<?php echo base_url();?>family_controllers/Family_letter/update_Retirement_letter/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>/3" method="post">


                <?php }else{ ?>

                <form action="<?php echo base_url();?>family_controllers/Family_letter/Retirement_letter/<?php echo $this->uri->segment(4); ?>/3" method="post">

                    <?php } ?>



                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> رقم الخطاب </label>
                        <input type="text" name="letter_num"
                               data-validation="required" readonly="readonly" class="form-control half input-style"
                               value="<?php if(!empty($result)){ echo $this->uri->segment(5); }else{ echo $last_id;} ?>" />
                    </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> إختر الفرد  </label>
                      <select class="form-control half" id="member_id" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        
                        <option value="">إختر</option>
                        <!----   ---------------------- ------------>
                        <?php  if(isset($result) && !empty($result)){ 
                               if(!in_array($mother->mother_national_num_fk,$result)){  ?>
                        <option value="1-<?php echo $mother->mother_national_num_fk;?>"><?php echo $mother->full_name;?> (الأم)</option>      
                        <?php } }else{ ?>
                        <option value="1-<?php echo $mother->mother_national_num_fk;?>"><?php echo $mother->full_name;?> (الأم)</option>      
                        <?php }?>
                       
                        <!----   ---------------------- ------------>
                        <?php  if(isset($result) && !empty($result)){ 
                                if(! in_array($father->f_national_id,$result)){ ?>
                        <option value="2-<?php echo $father->f_national_id;?>"><?php echo $father->full_name;?>(الأب)</option>  
                         <?php } }else{?>
                        <option value="2-<?php echo $father->f_national_id;?>"><?php echo $father->full_name;?>(الأب)</option>  
                          <?php }?>
                        <!----   ---------------------- ------------>
                        <?php if(isset($f_members)&&!empty($f_members)){
                               foreach($f_members as $row){ 
                                 if(isset($result) && !empty($result)){  if( in_array($row->member_card_num,$result)){ continue;} } ?>
                        <option value="3-<?php echo $row->member_card_num;?>"><?php echo $row->member_full_name;?> (الأبناء)</option>
                        <?php }}?>
                        <!----   ---------------------- ------------>
                      
                      </select>
               </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php  if(isset($result) && !empty($result)){?>
                    <input type="hidden" id="count_table" value="2" />
                    <?php }else{?>
                    <input type="hidden" id="count_table" value="1" />
                    <?php }?>
                    <input type="button" value="إضافة"  onclick="ger_row();" class="btn btn-add" />
                </div>
                
                   <div class="form-group col-xs-12" id="data_option"></div>



 <?php  if(isset($result) && !empty($result)){?>
                <table  class="table table-bordered table-devices">
                    <thead>
                    <tr>
                        <th class="gray_background">الإسم</th>
                        <th class="gray_background"> رقم السجل المدني للأسرة</th>
                        <th class="gray_background">رقم الحفيظة</th>
                        <th class="gray_background">مكان الإصدار</th>
                    </tr>
                    </thead>
                    <tbody id="body_row">
                    <?php if( in_array($mother->mother_national_num_fk,$result)){?>
                    <tr>
                        <td><input type="hidden" name="option_select[]"  value="<?php echo $mother->mother_national_num_fk;?>-1"/> 
                             <?php echo $mother->full_name;?> (الأم)</td>
                        <td> <?php echo $mother->mother_national_num_fk;?></td>
                        <td> <?php echo $mother->mother_national_num_fk;?></td>
                        <td> <?php echo $mother->dest_card;?></td>
                    </tr>
                    <?php }?>
                    <?php   if( in_array($father->f_national_id,$result)){  ?>
                    <tr>
                        <td><input type="hidden"  name="option_select[]"   value="<?php echo $father->f_national_id;?>-2" /> 
                            <?php echo $father->full_name;?>(الأب)</td>
                        <td> <?php echo $father->mother_national_num_fk;?></td>
                        <td> <?php echo $father->f_national_id;?></td>
                        <td> <?php echo $father->dest_card;?></td>
                    </tr>
                     <?php }?>
                    <?php if(isset($f_members)&&!empty($f_members)){
                        foreach($f_members as $row){  ?>
                           <?php   if( in_array($row->member_card_num,$result)){ ?>
                            <tr>
                                <td><input type="hidden"   name="option_select[]"    value="<?php echo $row->member_card_num;?>-3" />
                                    <?php echo $row->member_full_name;?> (الأبناء)</td>
                                <td> <?php echo $row->member_card_num;?></td>
                                <td> <?php echo $row->member_card_num;?></td>
                                <td> <?php echo $row->dest_card;?></td>
                            </tr>
                            <?php } ?>
                        <?php } } ?>
                    </tbody>
                </table>
                <?php }?>
                 <div class="form-group col-xs-12">
                <input type="submit" value="حفظ" <?php if(isset($result)){}else{ echo 'disabled=""';}?>  name="submit" class="btn btn-add">
                </div>

                </form>



                <?php
                if(isset($letters)&&!empty($letters)){

                    ?>

                    <table  id="example"  class="table table-bordered table-devices">
                        <thead>
                        <tr class="info">
                            <th class="">رقم الخطاب </th>
                            <th class="">التاريخ</th>
                            <th class="">الإجراء</th>
                            <th class="">إرفاق صورة</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php  foreach($letters as $row){  $link= $this->uri->segment(4); ?>
                            <tr >
                                <td><?php echo $row->letter_num;?></td>
                                <td> <?php echo $row->date_in_letter;?></td>
                                <td>
                                    <a href="<?php echo base_url().'family_controllers/Family_letter/update_Retirement_letter/'.$row->mother_national_num_fk.'/'.$row->letter_num.'/3'?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                                    <a    data-toggle="modal" data-target="#modal-delete<?php echo $row->letter_num;?>" ><i class="fa fa-trash"></i></a>

                                    <a  target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/print_letter/<?php echo $mother->mother_national_num_fk;?>/<?php echo $row->letter_type;?>/<?php echo $row->letter_num;?>/Retirement_letter"><i class="fa fa-print" aria - hidden = "true" ></i ></a>
                                </td>
                                <td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalfile<?php echo $row->letter_num;?>">  <?php echo$title;?></button>
                                </td>



                            </tr>

                            <div class="modal" id="modal-delete<?php echo $row->letter_num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
                                            <a id="" href="<?php echo base_url().'family_controllers/Family_letter/delete_Retirement_letter/'.$row->letter_num.'/'.$link?>"> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="myModalfile<?php echo $row->letter_num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo$title;?></h4>
                                        </div>
                                        <?php echo form_open_multipart('family_controllers/Family_letter/Letter_file_upload/'.$row->letter_num);?>
                                        <div class="modal-body">
                                            <?php if(!empty($row->file)){ ?>
                                                <img src="<?php echo base_url('uploads/images/'.$row->file.''); ?>" height="400px" width="400px">
                                                <br><br>
                                            <?php } ?>
                                            <?php if(empty($row->file)){ ?>
                                            <input type="file" name="file"  >
                                            <?php } ?>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" name="link" value="Retirement_letter">
                                            <input type="hidden" name="mother_num" value="<?php echo $row->mother_national_num_fk;?>">
                                            <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>
                                            <?php if(empty($row->file)){ ?>
                                            <button type="submit" name="add" value="add" class="btn btn-success">رفع</button>
                                            <?php } ?>
                                        </div>
                                        <?php echo form_close()?>
                                    </div>
                                </div>
                            </div>

                        <?php   } ?>
                        </tbody>
                    </table>
                <?php   } ?>




        </div>



    </div>


</div>

<script>

  function ger_row(){
        var data_member=$('#member_id').val();
        var count_table=$('#count_table').val();
        var res = data_member.split("-");
         var member_type=res[0];
         var member_num=res[1];
          if(data_member  != '') {
            var dataString = 'member_type=' + member_type +"&member_num="+member_num +"&count_table="+count_table;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family_letter/Get_Persons',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                     // $("#test_option").html(html);  //test_option
                    if(count_table == 1 ){
                        $("#data_option").html(html);
                    } else {
                        $("#body_row").append(html);
                    }
                     count_table = parseFloat(count_table ) + 1;
                     $('#count_table').val(count_table);
                     $('input[type="submit"]').removeAttr("disabled");
                }
            });
            return false;
        }
  }
</script>














