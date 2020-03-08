
<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
            <?php if(isset($result)):
                $id = $result['id'];
                $validation ='';
                $aria='';
            else:
                $id = 0;
                $validation ='required';
                $aria='true';
            endif; ?>
            <?php    echo form_open_multipart('public_relation/donate_with_us/'.$id.'')?>
            <div class="col-xs-12">

                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">الصورة:  </h4>
                        </div>
                        <div class="col-xs-5 r-input">
                            <input type="file" class="r-inner-h4 " name="img" id="img" data-validation="<?php   echo$validation;?>" />

                        </div>
                        <?php   if(isset($result)){?>
                            <i class="fa fa-picture-o fa-2x" aria-hidden="true" data-toggle="modal" data-target="#exampleModal<?php echo $result['id']; ?>"></i>
                            <div class="modal fade" id="exampleModal<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">الصورة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo base_url('uploads/images/'.$result['img'].''); ?>" height="400px" width="400px">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">التفاصيل: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <textarea class="r-textarea" name="details"  style="margin-top: 0px; margin-bottom: 0px; height: 48px;" id="details" data-validation="<?php echo$validation;?>"><?php if(isset($result)) echo $result['details'] ?></textarea>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right" />
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
            </div>
            <?php echo form_close()?>
            <?php if(isset($table) && $table != null):?>
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th class="text-center">الصورة</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach($table as $record){
                            echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td><img src="'.base_url().'uploads/images/'.$record->img.'" height="100px" width="100px" /></td>
                                            <td>
                                            <a href="'.base_url().'public_relation/donate_with_us/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="'.base_url().'public_relation/delete_donate_with_us/'.$record->id.'/donate_with_us" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td>
                                          </tr>';
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            <?php endif;?>



            <!-- close panel-body-->
        </div>
    </div>
</div>


<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 70%;
        margin: auto;
    }
</style>















