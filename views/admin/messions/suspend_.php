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
</style>

<div class="col-sm-11 col-xs-12">
    <?php if(isset($table) && $table != null){ ?>
    <div class="col-xs-12 r-inner-details">
        <div class="panel-body">
            <div class=" in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">إسم الموظف</th>
                            <th class="text-center">عدد أيام المأمورية</th>
                            <th class="text-center">حالة المأمورية من رئيس القسم</th>
                            <th class="text-center">حالة المأمورية من المدير العام</th>
                            <th class="text-center">التفاصيل</th>
                            <th class="text-center">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       
                    <?php
                    $x = 1;
                    foreach($table as $record){
                        $div = '-';
                        if($record->suspend != 0 && $_SESSION['role_id_fk'] == 1){
                            $status = 'لم تعتمد بعد';
                            $status1 = 'لم تعتمد بعد';
                            if($record->suspend_head == 1)
                                $status = 'تم الإعتماد بالموافقة';
                            if($record->suspend_head == 2)
                                $status = 'تم الإعتماد بالرفض';
                            if($record->suspend == 1)
                                $status1 = 'تم الإعتماد بالموافقة';
                            if($record->suspend == 2)
                                $status1 = 'تم الإعتماد بالرفض';
                            $div = '<div class="dropdown" >
                                  <button class="btn btn-primary btn-xs col-lg-12" dropdown-toggle" type="button" data-toggle="dropdown"> الإجراء
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu" style="top: 30px;     left: 0px;  min-width: 100px;">
                                    <li class="alert-danger" ><a href="'.base_url().'/Messions/action/'.$record->id.'/0">إلغاء الإعتماد</a></li>
                                    <li class="alert-success"><a href="'.base_url().'/Messions/action/'.$record->id.'/1">موافقة</a></li>
                                    <li class="alert-warning" ><a href="'.base_url().'/Messions/action/'.$record->id.'/2">رفض</a></li>
                                  </ul>
                                </div>';
                        }
                        if($record->suspend == 0 && $_SESSION['role_id_fk'] == 1)
                            continue;
                        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
                            $status = 'لم تعتمد بعد';
                            $status1 = 'لم تعتمد بعد';
                            if($record->suspend_head == 1)
                                $status = 'تم الإعتماد بالموافقة';
                            if($record->suspend_head == 2)
                                $status = 'تم الإعتماد بالرفض';
                            if($record->suspend == 1)
                                $status1 = 'تم الإعتماد بالموافقة';
                            if($record->suspend == 2)
                                $status1 = 'تم الإعتماد بالرفض';
                            if($record->suspend_head == 0)
                            $div = '<div class="dropdown" >
                                  <button class="btn btn-primary btn-xs col-lg-12" dropdown-toggle" type="button" data-toggle="dropdown"> الإجراء
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu" style="top: 30px;     left: 0px;  min-width: 100px;">
                                    <li class="alert-danger" ><a href="'.base_url().'/Messions/action/'.$record->id.'/0">إلغاء الإعتماد</a></li>
                                    <li class="alert-success"><a href="'.base_url().'/Messions/action/'.$record->id.'/1">موافقة</a></li>
                                    <li class="alert-warning" ><a href="'.base_url().'/Messions/action/'.$record->id.'/2">رفض</a></li>
                                  </ul>
                                </div>';
                        }
                        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
                            $status = 'لم تعتمد بعد';
                            $status1 = 'لم تعتمد بعد';
                            if($record->suspend_head == 1)
                                $status = 'تم الإعتماد بالموافقة';
                            if($record->suspend_head == 2)
                                $status = 'تم الإعتماد بالرفض';
                            if($record->suspend == 1)
                                $status1 = 'تم الإعتماد بالموافقة';
                            if($record->suspend == 2)
                                $status1 = 'تم الإعتماد بالرفض';
                        }
                        $datediff = $record->date_to - $record->date_from;
                        $dayes =  floor($datediff / (60 * 60 * 24)) + 1;
                        
                        echo'
                            <tr>
                            <td>'.($x++).'</td>
                            <td>'.$record->employee.'</td>
                            <td>'.$dayes.'</td>
                            <td>'.$status1.'</td>
                            <td>'.$status.'</td>
                            <td>
                                <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
                            </td>
                            <td>'.$div.'</td>
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
            </div>
        </div>
    </div>
    <?php } ?>
</div>