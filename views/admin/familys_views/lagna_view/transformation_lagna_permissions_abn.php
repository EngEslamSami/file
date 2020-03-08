
<style>
    td .btn-danger i,td .btn-success i{
        color: #fff;
    }
</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#coming" data-toggle="tab">بنود إضافة اللجنة الواردة</a></li>
                <li><a href="#accepted" data-toggle="tab">بنود إضافة اللجنة الموافق عليها</a></li>
                <li><a href="#refused" data-toggle="tab">بنود إضافة اللجنة المرفوضة</a></li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="coming">
                    <div class="panel-body">
                        <br>
                  <?php if(!empty($coming)){ ?>
                  <table id = "" class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                       <thead>
                                           <tr>
                                               <th class="text-center"> م</th >
                                               <th class="text-center"> رقم الأسرة</th >
                                               <th class="text-center">نوع العملية</th >
                                               <th class="text-center"> التفاصيل</th >
                                               <th class="text-center"> الإجراء</th >
                                           </tr>
                                       </thead>
                                      <tbody>
                                      <?php $x=1;foreach($coming as $record){?>
                                      <tr>
                                          <td class="text-center"><?php echo $x;?></td>
                                          <td class="text-center"><?php echo $record->mother_national_num;?></td>
                                          <td class="text-center"><?php echo $record->title;?></td>
                                          <td class="text-center">
                                              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalc<?php echo $x;?>">التفاصيل</button>
                                              <div class="modal fade" id="myModalc<?php echo $x;?>" tabindex="-1" role="dialog"
                                                   aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span></button>
                                                              <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                              ...
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" style="float: left" class="btn btn-danger"
                                                                      data-dismiss="modal">إغلاق
                                                              </button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="text-center">
                                              <button type="button" class="btn btn-success  btn-xs " onclick="getApproved(1,<?php echo $record->id;?>)"><i class="glyphicon glyphicon-ok"></i></button>
                                              <button type="button" class="btn btn-danger  btn-xs " onclick="getApproved(2,<?php echo $record->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                          </td>
                                      </tr>
                                      <?php $x++;} ?>
                                </tbody>
                     </table>
                  <?php }else{?>
                      <div class="col-lg-12 alert alert-danger" > لا يوجد بيانات لعرضها</div>
                        <?php }?>
                    </div>
                </div>
                <div class="tab-pane fade" id="accepted">
                    <div class="panel-body">
                        <br>
                        <?php if(!empty($accepted)){?>
                            <table id = "" class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                <thead>
                                <tr>
                                    <th class="text-center"> م</th >
                                    <th class="text-center"> رقم الأسرة</th >
                                    <th class="text-center">نوع العملية</th >
                                    <th class="text-center"> التفاصيل</th >
                                    <th class="text-center"> الإجراء</th >
                                </tr>
                                </thead>
                                <tbody>
                                <?php $x=1;foreach($accepted as $record){?>
                                <tr>
                                    <td class="text-center"><?php echo $x;?></td>
                                    <td class="text-center"><?php echo $record->mother_national_num;?></td>
                                    <td class="text-center"><?php echo $record->title;?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#myModala<?php echo $x;?>">التفاصيل
                                        </button>
                                        <div class="modal fade" id="myModala<?php echo $x;?>" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" style="float: left" class="btn btn-danger"
                                                                data-dismiss="modal">إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger  btn-xs " onclick="getApproved(2,<?php echo $record->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                        <button type="button" class="btn btn-warning  btn-xs " onclick="getApproved('0',<?php echo $record->id;?>)"><i class="glyphicon glyphicon-repeat"></i></button>
                                    </td>
                                </tr>
                                    <?php $x++;} ?>
                                </tbody>
                            </table>
                                <?php  }else{?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بيانات لعرضها</div>
                        <?php }?>
                    </div>
                </div>
                <div class="tab-pane fade" id="refused">
                    <div class="panel-body">
                        <br>
                        <?php if(!empty($refused)){?>
                            <table id = "" class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                <thead>
                                <tr>
                                    <th class="text-center"> م</th >
                                    <th class="text-center"> رقم الأسرة</th >
                                    <th class="text-center">نوع العملية</th >
                                    <th class="text-center"> التفاصيل</th >
                                    <th class="text-center"> الإجراء</th >
                                </tr>
                                </thead>
                                <tbody>
                                <?php $x=1;foreach($refused as $record){?>
                                <tr>
                                    <td class="text-center"><?php echo $x;?></td>
                                    <td class="text-center"><?php echo $record->mother_national_num;?></td>
                                    <td class="text-center"><?php echo $record->title;?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                data-target="#myModalr<?php echo $x;?>">التفاصيل
                                        </button>
                                        <div class="modal fade" id="myModalr<?php echo $x;?>" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        ...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" style="float: left" class="btn btn-danger"
                                                                data-dismiss="modal">إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success  btn-xs " onclick="getApproved(1,<?php echo $record->id;?>)" ><i class="glyphicon glyphicon-ok"></i></button>
                                        <button type="button" class="btn btn-warning  btn-xs " onclick="getApproved('0',<?php echo $record->id;?>)"><i class="glyphicon glyphicon-repeat"></i></button>
                                    </td>
                                </tr>
                                    <?php $x++;} ?>
                                </tbody>
                            </table>
                                <?php  }else{?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بيانات لعرضها</div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<script>
    function getApproved(process,id) {
        if (process &&  id ) {
            var dataString = 'process=' + process +'&id=' + id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Transformation_lagna/transformation_lagna_approved',
                data:dataString,
                cache:false,
                success: function(json_data){
                    alert(' تم تعديل البيانات بنجاح !!');
                    location.reload();
                }
            });
            return false;
        }

    }

</script>