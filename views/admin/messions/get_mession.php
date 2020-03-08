<div class="col-xs-12 r-inner-details">
    <div class="panel-body">
        <div class="fade in active">
<?php if(isset($table) && $table != null){ ?>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">إسم الموظف</th>
                        <th class="text-center">عدد أيام المأمورية</th>
                        <th class="text-center">حالة المأمورية</th>
                        <th class="text-center">التفاصيل</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                   
                <?php
                $x = 1;
                foreach($table as $record){
                    $status = 'منتهية';
                    $datediff = $record->date_to - $record->date_from;
                    $dayes =  floor($datediff / (60 * 60 * 24)) + 1;
                    if($record->date_to >= strtotime(date("Y/m/d")))
                        $status = 'جارية';
                    echo'
                        <tr>
                        <td>'.($x++).'</td>
                        <td>'.$record->employee.'</td>
                        <td>'.$dayes.'</td>
                        <td>'.$status.'</td>
                        <td>
                            <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
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
                                                <h4 class="r-h4">التاريخ:</h4>
                                            </div>
                                            
                                            <div class="col-xs-3 r-input">
                                                <label style="padding-top:6px">'.date("Y-m-d",$record->date).'</label>
                                            </div>
                                            
                                            <div class="col-xs-3">
                                                <h4 class="r-h4">حالة المأمورية:</h4>
                                            </div>
                                            
                                            <div class="col-xs-3 r-input">
                                                <label style="padding-top:6px">'.$status.'</label>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                
                                            <div class="col-xs-3">
                                                <h4 class="r-h4">تاريخ المأمورية من:</h4>
                                            </div>
                                            
                                            <div class="col-xs-3 r-input">
                                                <label style="padding-top:6px">'.date("Y-m-d",$record->date_from).'</label>
                                            </div>
                                            
                                            <div class="col-xs-3">
                                                <h4 class="r-h4">تاريخ المأمورية إلى:</h4>
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
                                                <h4 class="r-h4">الغرض من المأمورية:</h4>
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
<?php }
else
    echo '<div class="alert alert-danger">لا توجد مأموريات</div>';
 ?>
        </div>
    </div>
</div>