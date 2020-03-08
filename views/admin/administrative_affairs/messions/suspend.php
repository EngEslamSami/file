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

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>بيانات المهمات</h4>
                </div>
            </div>
            
            <div class="panel-body">
                <?php 
              /*  echo '<pre>';
                print_r($_SESSION);
                 echo '<pre>';*/
                if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class=" in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">إسم الموظف</th>
                                        <th class="text-center">عدد أيام المأمورية</th>
                                        <!--<th class="text-center">حالة المأمورية من رئيس القسم</th>-->
                                        <th class="text-center">حالة المأمورية   </th>
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
                                              <ul class="dropdown-menu" style="top: 30px; left: 0px;  min-width: 100px;">
                                                <li class="alert-danger" >
                                                <a href="'.base_url().'/Messions/action/'.$record->id.'/0">إلغاء الإعتماد</a>
                                                </li>
                                                <li class="alert-success">
                                                <a href="#" data-target=".bs-example-modall-lg'.$record->id.'" data-toggle="modal">موافقة</a>
                                                </li>
                                                <li class="alert-warning" >
                                                <a href="#" data-target=".bs-example-modal2-lg'.$record->id.'" data-toggle="modal">رفض</a>
                                                </li>
                                              </ul>
            <div class="modal1 fade bs-example-modall-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form method="post" action="action" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">أدخل السبب الموافقة</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="reason" data-validation="required" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success store-btn1">حفظ</button>
                            <input type="hidden" name="id" value="'.$record->id.'" />
                            <input type="hidden" name="sus" value="1" />
                            <button type="button" class="btn btn-default store-btn1" data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="modal1 fade bs-example-modal2-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form method="post" action="action" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">أدخل السبب الرفض</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="reason" data-validation="required" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success store-btn1">حفظ</button>
                            <input type="hidden" name="id" value="'.$record->id.'" />
                            <input type="hidden" name="sus" value="2" />
                            <button type="button" class="btn btn-default store-btn1" data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
                                            </div>';
                                    }
                                //   if($record->suspend == 0 && $_SESSION['role_id_fk'] == 1){
                                    
                                  // }
                                     //   continue;
                                  //  if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
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
                                              <button class="btn btn-primary btn-xs " dropdown-toggle" type="button" data-toggle="dropdown"> الإجراء
                                              <span class="caret"></span></button>
                                              <ul class="dropdown-menu" style="top: 30px; left: 0px;  min-width: 100px;">
                                                <li class="alert-danger" >
                                                <a href="'.base_url().'/Messions/action/'.$record->id.'/0">إلغاء الإعتماد</a>
                                                </li>
                                                <li class="alert-success">
                                                <a href="#" data-target=".bs-example-modall-lg'.$record->id.'" data-toggle="modal">موافقة</a>
                                                </li>
                                                <li class="alert-warning" >
                                                <a href="#" data-target=".bs-example-modal2-lg'.$record->id.'" data-toggle="modal">رفض</a>
                                                </li>
                                              </ul>
            <div class="modal1 fade bs-example-modall-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form method="post" action="action" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">أدخل السبب الموافقة</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="reason" data-validation="required" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success store-btn1">حفظ</button>
                            <input type="hidden" name="id" value="'.$record->id.'" />
                            <input type="hidden" name="sus" value="1" />
                            <button type="button" class="btn btn-default store-btn1" data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="modal1 fade bs-example-modal2-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form method="post" action="action" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">أدخل السبب الرفض</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="reason" data-validation="required" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success store-btn1">حفظ</button>
                            <input type="hidden" name="id" value="'.$record->id.'" />
                            <input type="hidden" name="sus" value="2" />
                            <button type="button" class="btn btn-default store-btn1" data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
                                            </div>';
                                 //   }
                                  /*  if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
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
                                    }*/
                                    $datediff = $record->date_to - $record->date_from;
                                    $dayes =  floor($datediff / (60 * 60 * 24)) + 1;
                                    
                                    
                                    //---------------------------------------------------------------------
                                    
                                    
                                    echo'
                                        <tr>
                                        <td>'.($x++).'</td>
                                        <td>'.$record->employee.'</td>
                                        <td>'.$dayes.'</td>
                                        <!--<td>'.$status1.'</td>-->
                                        <td>'.$status.'</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
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

                                                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">إعتماد رئيس القسم:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$status1.'</label>
                                                            </div>

                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">السبب:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$record->reason.'</label>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">إعتماد المدير العام:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$status.'</label>
                                                            </div>

                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">السبب:</h4>
                                                            </div>
                                                            
                                                            <div class="col-xs-3 r-input">
                                                                <label style="padding-top:6px">'.$record->reason_head.'</label>
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
                            <?php
                            if(isset($x) && $x == 1)
                                echo '<div class="alert alert-danger"><h3>توجد مأموريات معلقة عند رئيس القسم لم يعتمدها بعد</h3></div>';
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                }else
                    echo '<div class="alert alert-danger"><h3>لا توجد مأموريات</h3></div>';
                ?>
            </div>
        </div>
    </div>
</div>