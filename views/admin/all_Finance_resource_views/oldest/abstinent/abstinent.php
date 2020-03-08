<style>
.r-pop-up {
    padding: 0;
}

.r-pop-up img {
    width: 93%;
    height: 150px;
}

.r-pop-up .chip {
    margin-top: 20px;
}

.r-pop-up .chip iframe {
    width: 96%;
    height: 180px;
}

.r-pop-up .closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 8%;
}

.r-pop-up .closebtn:hover {
    color: #000;
}
.modal1{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.r-sss{
    width: 100px;
    height: auto;
    background-color: #0c1e56;
    color: #fff;

}
.r-sss:hover{
    color: #0c1e56;
    background-color: #fff;
}
</style>
<div class="col-xs-12" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php //echo $title?> </h3>
            </div>
            <div class="panel-body">
            <?php
            $data['$program_to_7'] = 'active'; 
          //  $this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('all_Finance_resource/Program_setting/add_abstinent/'.$id.'')?>
                    <div class="col-xs-12">
                     <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">الاسم:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" placeholder="إسم المتعفف" value="<?php if(isset($result)) echo $result['name'] ?>" class="r-inner-h4 " name="name" id="name" data-validation="required">
                            </div>
                            
                          <div class="col-xs-3">
                                <h4 class="r-h4">التليفون:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="number" placeholder="التليفون"  step="any"value="<?php if(isset($result)) echo $result['tele'] ?>" class="r-inner-h4 " name="tele" id="tele"  data-validation="required">
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                             <div class="col-xs-3">
                                <h4 class="r-h4">الحالة:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" placeholder="الحالة" value="<?php if(isset($result)) echo $result['status'] ?>" class="r-inner-h4 " name="status" id="status"  data-validation="required">
                            </div>
                            
                             <div class="col-xs-3">
                                <h4 class="r-h4">العنوان:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" placeholder="العنوان" value="<?php if(isset($result)) echo $result['address'] ?>" class="r-inner-h4 " name="address" id="address"  data-validation="required">
                            </div>
                            
                        </div>
                     
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right" />
                            </div>
                            
                        </div>
                            
                        
                    </div>
                    <?php echo form_close()?>
                </div>
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم المتعفف</th>
                                        <th class="text-center">التليفون</th>
                                        <th class="text-center">الحالة</th>
                                        <th class="text-center">الحالة المتعفف</th>
                                        <th>التفاصيل</th>
                                        <th class="text-center">التحكم</th>
                                        <th class="text-center">الأعتماد</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $x = 1;
                                foreach($table as $record){
                                   
                                    echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->name.'</td>
                                            <td>'.$record->tele.'</td>
                                            <td>'.$record->status.'</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-"></i></span> التفاصيل </button>
                                            </td>
                                            <td>
                                            <a href="'.base_url().'all_Finance_resource/Program_setting/add_abstinent/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="'.base_url().'all_Finance_resource/Program_setting/delete_abstinent/'.$record->id.'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td> ';
                                            if($record->approved == 0){
                                                $approved ='<a href="'.base_url().'all_Finance_resource/Program_setting/approved_abstinent/'.$record->id.'" class="btn btn-success btn-xs "> قبول</a>
                                                
                                                <a href="'.base_url().'all_Finance_resource/Program_setting/refuse_abstinent/'.$record->id.'" class="btn btn-danger btn-xs "> رفض</a>
                                                
                                                ';
                                                $approved_type ='لم يتم اتخاذ القرار بعد';
                                            }elseif($record->approved == 1){
                                               $approved ='<a href="'.base_url().'all_Finance_resource/Program_setting/refuse_abstinent/'.$record->id.'" class="btn btn-danger btn-xs "> رفض</a>';  
                                               $approved_type ='تم القبول';
                                            }elseif($record->approved == 2){
                                                 $approved ='<a href="'.base_url().'all_Finance_resource/Program_setting/approved_abstinent/'.$record->id.'" class="btn btn-success btn-xs "> قبول</a>';
                                                 $approved_type ='تم الرفض';
                                            }
                                            echo'
                                            <td>'.$approved_type.'</td>
                                            <td>'.$approved.'
                                            </td>
                                          </tr>';
                                          
                                    echo '<div class="modal1 fade bs-example-modal-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel"> تفاصيل  ('.$record->name.')</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">إسم المتعفف:</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="">'.$record->name.'</h6>
                                                            </div>
                                                            
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">التليفون</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="">'.$record->tele.'</h6>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">الحالة</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="">'.$record->status.'</h6>
                                                            </div>
                                                            
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">العنوان</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="">'.$record->address.'</h6>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default store-btn1 r-sss" data-dismiss="modal">إغلاق</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>