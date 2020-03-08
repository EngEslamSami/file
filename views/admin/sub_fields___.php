
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
                <?php    echo form_open_multipart('public_relation/sub_fields/'.$id.'')?>
                 <div class="col-xs-12">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> إسم المجال الرئيسي:  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="main_field_id" id="main_field_id" class="no-padding form-control"
                                        data-show-subtext="true" data-live-search="true"  data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>">
                                    <option value="">--قم بإختيار مجال التبرع--</option>
                                    <?php
                                    if(isset($main) && $main != null)
                                        foreach($main as $record){
                                            if(isset($result['main_field_id']) && $result['main_field_id'] == $record->id)
                                                $select = 'selected';
                                            else
                                                $select = '';
                                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->main_field_name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> صورة المقطع:  </h4>
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


                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> عن المجال الفرعي: </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <textarea class="r-textarea" name="about" id="about" style="margin-top: 0px; margin-bottom: 0px; height: 48px;"  data-validation="<?php   echo$validation;?>"><?php if(isset($result)) echo $result['about'] ?></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> إسم المجال الفرعي:  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" value="<?php if(isset($result)) echo $result['sub_field_name'] ?>" class="r-inner-h4 " name="sub_field_name" id="sub_field_name"  data-validation="<?php echo$validation;?>">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> تفاصيل المقطع: </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <textarea class="r-textarea" name="details"  style="margin-top: 0px; margin-bottom: 0px; height: 48px;" id="details" data-validation="<?php echo$validation;?>"><?php if(isset($result)) echo $result['details'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> مقطع إرشادي:  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <textarea class="r-textarea" name="details2" style="margin-top: 0px; margin-bottom: 0px; height: 48px;" id="details2" data-validation="<?php echo$validation;?>"><?php if(isset($result)) echo $result['details2'] ?></textarea>
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
                            <th class="text-center">المجال الرئيسي</th>
                            <th class="text-center">المجال الفرعي</th>
                            <th class="text-center">التفاصيل</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($x = 0 ; $x < count($table) ; $x++){
                            echo '<tr>
                                            <td rowspan="'.count($table[key($table)]).'">'.($x+1).'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.$main[key($table)]->main_field_name.'</td>';
                            for($z = 0 ; $z < count($table[key($table)]) ; $z++){
                                echo   '<td>'.$table[key($table)][$z]->sub_field_name.'</td>
                                                <td>
                                                <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target=".firstModal'.$table[key($table)][$z]->id .'"></i>
                                                </td>
                                                <td>
                                                <a href="'.base_url().'public_relation/sub_fields/'.$table[key($table)][$z]->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
    
                                                <a  href="'.base_url().'public_relation/delete_main/'.$table[key($table)][$z]->id.'/sub_fields" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                </td>
                                              </tr>';
                                echo'<div class=" modal fade firstModal'.$table[key($table)][$z]->id.'" tabindex="-1" id="firstModal'.$table[key($table)][$z]->id.'" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="width: 55% !important;height: 100% ;max-width: none;">
                                                <div class="modal-dialog modal-md modal-dialog-manage">
                                                    <h6 class="pop-manage-h4"> جميع التفاصيل المتعلقة بمجال التبرع لـ <span class="pop-manage-span"> '.$table[key($table)][$z]->sub_field_name.' </span></h6>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> الصورة : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <img src="'.base_url().'uploads/images/'.$table[key($table)][$z]->img.'" width="100%" style="height:250px;">
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> عن المجال الفرعي : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <h4>'.$table[key($table)][$z]->about.'</h4>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> تفاصيل المقطع : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <h4>'.$table[key($table)][$z]->details.'</h4>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> مقطع إرشادي : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <h4>'.$table[key($table)][$z]->details2.'</h4>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer ">
                                                        <button type="button" class="btn manage-close-pop" data-dismiss="modal">اغلاق</button>
                                                    </div>
                                                </div>
                                            </div>';
                            }
                            next($table);
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
















<!------------------------------------------------------------->

