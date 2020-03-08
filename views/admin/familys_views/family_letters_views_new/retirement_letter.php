
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


                    <table class="table table-bordered table-devices">
                        <thead>
                        <tr>
                            <th class="gray_background">اختر</th>
                            <th class="gray_background">الإسم</th>
                            <th class="gray_background"> رقم السجل المدني للأسرة</th>
                            <th class="gray_background">رقم الحفيظة</th>
                            <th class="gray_background">مكان الإصدار</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" name="option_select[]" <?php  if(!empty($result)){ if( in_array($mother->mother_national_num_fk,$result)){ echo'checked';} } ?> value="<?php echo $mother->mother_national_num_fk;?>-1" </td>

                            <td><?php echo $mother->full_name;?> (الأم)</td>
                            <td> <?php echo $mother->mother_national_num_fk;?></td>
                            <td> <?php echo $mother->mother_national_num_fk;?></td>
                            <td> <?php echo $mother->dest_card;?></td>

                        </tr>
                        <tr>
                            <td><input type="checkbox"name="option_select[]" <?php  if(!empty($result)){ if( in_array($father->f_national_id,$result)){ echo'checked';} }?>  value="<?php echo $father->f_national_id;?>-2" </td>

                            <td><?php echo $father->full_name;?>(الأب)</td>
                            <td> <?php echo $father->mother_national_num_fk;?></td>
                            <td> <?php echo $father->f_national_id;?></td>
                            <td> <?php echo $father->dest_card;?></td>

                        </tr>
                        <?php if(isset($f_members)&&!empty($f_members)){
                            foreach($f_members as $row){  ?>
                                <tr>
                                    <td><input type="checkbox" name="option_select[]"  <?php  if(!empty($result)){  if( in_array($row->member_card_num,$result)){ echo'checked';} }?>  value="<?php echo $row->member_card_num;?>-3" </td>

                                    <td><?php echo $row->member_full_name;?> (الأبناء)</td>
                                    <td> <?php echo $row->member_card_num;?></td>
                                    <td> <?php echo $row->member_card_num;?></td>
                                    <td> <?php echo $row->dest_card;?></td>
                                </tr>


                            <?php } } ?>




                        </tbody>
                    </table>


                    <input type="submit" value="حفظ" name="submit" class="btn btn-add">
                    <br>

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















