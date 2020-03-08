
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
            <?php                       echo form_open_multipart('public_relation/index/'.$id.'')?>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إسم مجال التبرع:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" value="<?php if(isset($result)) echo $result['main_field_name'] ?>" class="r-inner-h4 " name="main_field_name" id="main_field_name" data-validation="<?php echo $validation;?>">
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
                            <th class="text-center">إسم المجال</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach($table as $record){
                            echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->main_field_name.'</td>
                                            <td>
                                            <a href="'.base_url().'public_relation/index/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="'.base_url().'public_relation/delete_main/'.$record->id.'/index" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
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

