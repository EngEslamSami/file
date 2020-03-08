

<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php ?>
            <?php   if(isset($result) && $result !=null):
                echo form_open_multipart('Public_relation/update_membership_settings/'.$result['id']);
                $out['title']=$result['title'];
                $out['content']=$result['content'];
                $out['required']='';
                $out['input']='  <button name="edit" value="edit" type="submit" class="btn btn-primary">تعديل</button>';
            else:
                echo form_open_multipart('Public_relation/add_membership_settings');
                $out['title']="";
                $out['content']="";
                $out['required']='data-validation="required"';
                $out['input']='<button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>';
            endif; ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  العنوان </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <input type="text" class="form-control " value="<?php echo $out['title']?>" name="title"<?php echo $out['required'];?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-xs-12 " style="margin-bottom: 10px;">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 "> التفاصيل </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <textarea id="content"  name="content" class="r-textarea" <?php echo $out['required'];?>><?php  echo $out['content']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <?php  echo $out['input']; ?>

                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">

                    </div>
                </div>

            </div>

            <!---table------>
            <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">

                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">التفاصيل</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">


                                <?php
                                $a=1;
                                foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><?php echo $record->title?></td>
                                        <td><?php echo $record->content;?></td>
                                        <td> <a href="<?php  echo base_url().'Public_relation/delete_membership_settings/'.$record->id."/opinions/add_opinion"?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url().'Public_relation/update_membership_settings/'.$record->id?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                    </tr>
                                    <?php
                                    $a++;
                                endforeach;  ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php  endif;  ?>
            <!---table------>
        </div>
    </div>
</div>

   
        
          


