<div class="">
        <button type="button"  class="add btn btn-purple  w-md m-b-5" onclick="window.location.href='<?php echo base_url()."Search_and_prisoners/Add_interview"?>'">
            <i class="fa fa-plus"></i> مقابلة جديدة  </button>
    </div>
    <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?php echo $title?></h4>
            </div>
        </div>
        <div class="panel-body">
        <?php if (isset($records) && !empty($records) && $records !=null ){?>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th>#</th>
                    <th>إسم السجين</th>
                    <th>نوع التبرع</th>
                    <th>الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($records as $record){?>
                <tr>
                    <?php $help_arr =array(1=>'مساعدة نقدية',2=>'مساعدة عينية');?>
                    <td></td>
                    <td><?php  echo  $record->nazeel_name?></td>
                    <td><?php  echo  $help_arr[$record->help_id]?></td>
                    <td>
                        <button type="button" class="btn btn-add btn-xs" onclick="window.location.href='<?php echo base_url()."Search_and_prisoners/Update_interview/".$record->id."/"?>'">
                            <i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-trash-o"></i> </button>
                    </td>
                </tr>

                    <div class="modal " id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> حذف</h4>
                                </div>
                                <div class="modal-body">
                                    <p>هل أنت متأكد من حذف هذه العناصر؟</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                    <a href="<?php echo base_url().'Search_and_prisoners/delete_interview/'.$record->id?>"> <button type="button" class="btn btn-danger remove" id="Delete-Record">حذف</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php }?>
                </tbody>
            </table>
        <?php }else{
            echo '<div class=" col-sm-12 alert alert-info alert-dismissable">
                    <a href="#" class="" style="color: black"  data-dismiss="alert" aria-label="close">
                        <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                    <strong> لا يوجد مقابلات للسجناء  !</strong> .
                </div>';
        }
        ?>
        </div>
    </div>


