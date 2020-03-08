<div class="col-sm-12" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php

            if($this->uri->segment(4)){
                echo form_open_multipart('family_controllers/Setting/update_file_status/'.$this->uri->segment(4).'');

                $type=$row->type;
                $title=$row->title;
            }else{
                echo form_open_multipart('family_controllers/Setting/members_file_status');
                $type='';
                $title='';
            }
            ?>
            <?php
            $arr=array(1=>' الملفات',2=>' الأفراد');
            ?>
            <div class="col-md-12">


                <div class="form-group col-sm-4">
                    <label class="label label-green  half">اختيار النوع</label>
                    <select class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" name="type">
                        <option value="" >اختر </option>
                      <?php

                      foreach($arr as $key=>$value){?>
                     <option value="<?php echo $key;?>"<?php if($key==$type){echo 'selected'; } ?>><?php echo $value;?></option>

                      <?php } ?>

                    </select>
                </div>

                <div class="form-group col-sm-6">

                    <label class="label label-green  col-xs-3" >السبب</label>


                    <textarea class="form-control  col-xs-9" name="reason" data-validation="required" style="width: 75%" > <?php echo strip_tags($title) ;?></textarea>

                </div>
                <div class="form-group col-sm-2">
                    <div class="form-group col-sm-6">
                        <input type="submit"name="add" value="اضافه" class="btn-success form-control">
                    </div>
                </div>
            </div>




            </form>

            </br></br></br></br></br></br>

            <?php

            if(isset($records)&&!empty($records)){



                $arr=array(1=>' الملفات',2=>' الأفراد');
                ?>


                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="visible-md visible-lg info">
                        <th>مسلسل</th>
                        <th>النوع</th>
                        <th>الاسباب </th>

                        <th>الاجراء</th>
                    </tr>

                    </thead>
                    <tbody>

                    <?php
                    $x = 0;
                    foreach($records as $record){
                    $x++; ?>
                        <tr>
                        <td rowspan="<?php echo sizeof($record->branch);?>"><?php echo $x;?></td>
                        <td rowspan="<?php echo sizeof($record->branch);?>"><?php echo $arr[$record->type];?> </td>
                        <?php  if(!empty($record->branch)){ foreach ($record->branch as $row){?>
                            <td> <?php  echo word_limiter($row->title,10) ; ?></td>
                            <td data-title="التحكم" class="text-center">
                                <a href="<?php echo base_url();?>/family_controllers/Setting/update_file_status/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                <a  href="<?php echo base_url();?>family_controllers/Setting/delete_file_status/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                            </td>
                            </tr>
                        <?php }  } }?>



                    </tbody>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>