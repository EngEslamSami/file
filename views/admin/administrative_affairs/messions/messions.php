<style>
    .r-cont {
        width: 95%;
    }

    .r-stores {
        margin-bottom: 60px;
        background: linear-gradient(to bottom, #eee 0%, #fff 100%);
        border-radius: 10px;
    }

    .r-stores img {
        padding-top: 15px;
        width: 46%;
        height: auto;
    }

    .r-stores h3 {
        font-size: 18px;
        color: #0c1e56;
        padding-bottom: 15px;
        margin-top: 15px;
    }

    .r-stores a {
        text-decoration: none;
        outline: none;
    }

    .store-btn {
        width: auto;
        outline: none;
    }

    .store-btn1 {
        width: 59px;
        height: 35px;
        background-color: #123456;
        color: #fff;
        outline: none;
    }

    .store-btn1:hover {
        background-color: #123456;
        color: #123456;
    }

    @media (max-width:768px) {
        .r-stores tr {
            display: table-row !important;
        }
    }

    @media (max-width:400px) {
        .r-cont {
            padding: 0;
        }
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

    .padd {padding: 0 15px !important;}
    .no-padding {padding: 0;}
</style>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>بيانات المهمة</h4>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <?php
                        if(isset($result))
                            $id = $result['id'];
                         else
                            $id = 0;
                        echo form_open_multipart('Administrative_affairs/mession_add/'.$id.'')
                        ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-sm-6 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> تاريخ اليوم </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="date" class="r-inner-h4 " 
                                            value="<?php if(isset($result['date']))
                                                  echo date('Y-m-d',$result['date']) ?>" name="date" placeholder="تاريخ اليوم" data-validation="required" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 padd">
                                    <div class="col-sm-6">
                                    <h4 class="r-h4"> إسم الموظف </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <select name="emp_id" id="emp_id" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="required">
                                        <option value="">--قم بإختيار الموظف--</option>
                                        <?php
                                        if(isset($employs) && $employs != null)
                                            foreach($employs as $employ){
                                                $select = '';
                                                if(isset($result['emp_id']) && $result['emp_id'] == $employ->id)
                                                    $select = 'selected';
                                                echo '<option value="'.$employ->id.'" '.$select.'>'.$employ->employee.'</option>';
                                            }
                                        ?>
                                    </select>
                                    <?php
                                    if(isset($employs) && $employs != null)
                                        foreach($employs as $employ)
                                            echo '<input type="hidden" name="dep_id'.$employ->id.'" value="'.$employ->department.'" />';
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-sm-6 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> تاريخ المهمة من </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="date" class="r-inner-h4 "
                                             value="<?php if(isset($result['date_from'])) 
                                             echo date('Y-m-d',$result['date_from']) ?>" 
                                             placeholder="تاريخ المهمة من" name="date_from" 
                                                 id="date_from" data-validation="required" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> تاريخ المهمة إلى </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="date" placeholder="تاريخ المهمة إلى" 
                                            class="r-inner-h4 "
                                             value="<?php if(isset($result['date_to'])) 
                                             echo date('Y-m-d',$result['date_to']) ?>" 
                                             name="date_to" id="date_to" data-validation="required" />
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-sm-6 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> خط السير </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <input type="text" placeholder="خط السير" class="r-inner-h4 " value="<?php if(isset($result['path'])) echo $result['path'] ?>" name="path" data-validation="required" />
                                </div>
                            </div>
                            
                            <div class="col-sm-6 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> الغرض من المهمة </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <input type="text" placeholder="الغرض من المهمة" class="r-inner-h4 " value="<?php if(isset($result['purpos'])) echo $result['purpos'] ?>" name="purpos" data-validation="required" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-sm-6 padd">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> نوع المهمة </h4>
                                </div>
                                <div class="col-sm-6 r-input">
                                    <select name="type_id_fk" id="type_id_fk" class="no-padding form-control" data-validation="required">
                                        <option value="">--قم بالإختيار--</option>
                                        <?php
                                        if(isset($missions) && $missions != null)
                                            foreach($missions as $mission){
                                                $select = '';
                                                if(isset($result['type_id_fk']) && $result['type_id_fk'] == $mission->id)
                                                    $select = 'selected';
                                                echo '<option value="'.$mission->id.'" '.$select.'>'.$mission->title.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                            <div class="col-sm-12 padd">
                                <button type="submit" name="add" onclick="return chk();" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                            </div>
                        </div>
                        <?php echo form_close()?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($id == 0){ ?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول المهمات</h4>
                </div>
            </div>
            
            <div class="panel-body">
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">إسم الموظف</th>
                                        <th class="text-center">عدد أيام المهمة</th>
                                        <th class="text-center">حالة المهمة</th>
                                        <th class="text-center">التفاصيل</th>
                                        <th class="text-center">الإجراء</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $x = 1;
                                foreach($table as $record){
                                    $status = 'منتهية';
                                    $datediff = $record->date_to - $record->date_from;
                                    $dayes =  floor($datediff / (60 * 60 * 24)) + 1;
                                    if($record->date_to >= strtotime(date("Y/m/d")) && $record->date_from <= strtotime(date("Y/m/d")))
                                        $status = 'جارية';
                                    if($record->date_from > strtotime(date("Y/m/d")))
                                        $status = 'لم تبدأ بعد';
                                    echo'
                                        <tr>
                                        <td>'.($x++).'</td>
                                        <td>'.$record->employee.'</td>
                                        <td>'.$dayes.'</td>
                                        <td>'.$status.'</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><i class="fa fa-list btn-info"></i> التفاصيل</button>
                                        </td>
                                        <td>
                                            <a href="'.base_url().'Administrative_affairs/mession_add/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a onclick="$(\'#adele\').attr(\'href\', \''.base_url().'Administrative_affairs/mession_delete/'.$record->id.'\');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                        </td>
                                        </tr>
                                        ';
                                        
                                    echo'
                                        <div class="modal1 fade bs-example-modal-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close store-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"> تفاصيل خط السير للموظف ('.$record->employee.')</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">نوع المهمة:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$record->title.'</label>
                                                            </div>
                                                            
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">حالة المهمة:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$status.'</label>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">تاريخ المهمة من:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.date("Y-m-d",$record->date_from).'</label>
                                                            </div>
                                                            
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">تاريخ المهمة إلى:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.date("Y-m-d",$record->date_to).'</label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">خط السير:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$record->path.'</label>
                                                            </div>
                                                            
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">الغرض من المهمة:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$record->purpos.'</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button " class="btn btn-default  store-btn1" data-dismiss="modal">إغلاق</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                                ?>   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
                <?php 
                }
                else {
                    echo'<div class="alert alert-danger">لا توجد بيانات</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script>
function chk(){
    if($('#date_to').val() < $('#date_from').val()){
        alert('لا يجب أن يكون تاريخ نهاية المهمة قبل تاريخ بدايتها');
        return false;
    }
}
</script>