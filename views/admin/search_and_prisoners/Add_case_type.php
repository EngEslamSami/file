
<div class="panel panel-bd lobidrag">
    <div class="panel-heading">
        <div class="panel-title">
            <h3 class="panel-title" style="max-width: calc(100% - 180px);"> أنواع القضايا</h3>
        </div>
    </div>
    <div class="panel-body">
        <?php echo form_open("Search_and_prisoners/Add_case_type",array("role"=>"form"))?>
        <table class="table table-bordered" id="tab_logic">
            <thead>
            <th>م</th>
            <th>نوع القضية</th>
            <th>الإجراءات</th>
            </thead>
            <tbody>
            <?php if(!empty($table)){
                $r=0;
                foreach($table as $record): ?>
                    <tr class="">
                        <td><?php echo ++$r; ?></td>
                        <td> <?php echo $record->name ?></td>
                        <td>
                            <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#modal-update<?php echo $record->id;?>"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete<?php echo $record->id;?>"><i class="fa fa-trash-o"></i> </button>
                        </td>
                    </tr>

                    <div class="modal " id="modal-delete<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
                                    <a href="<?php echo base_url().'Search_and_prisoners/delete_case_type/'.$record->id?>"> <button type="button" class="btn btn-danger remove" id="Delete-Record">حذف</button></a>
                                </div>
                            </div>
                        </div>
                    </div>





                <?php endforeach;
            }else{

            }?>

            </tbody>
        </table>
        <input type="hidden" name="max" id="max">
        <button type="button" id="add_row_cases_type" class="add btn btn-purple  w-md m-b-5"><i class="fa fa-plus"></i> إضافة نوع قضية  </button>
        <button type="submit" name="add" value="add"   class="save btn btn-purple w-md m-b-5 " ><i class="fa fa-floppy-o "></i> حفظ  </button>
        <?php  echo form_close()?>
    </div>
</div>






<?php if(!empty($table)){
    $r=0;
    foreach($table as $records): ?>

        <div class="modal " id="modal-update<?php echo $records->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> تعديل</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-bordered" id="">
                            <thead>
                            <th>م</th>
                            <th>نوع القضية</th>
                            </thead>
                            <tbody>
                            <?php echo form_open_multipart("Search_and_prisoners/Update_case_type/".$records->id)?>

                            <tr class="">
                                <td></td>
                                <td> <input type="text" name="name_edit"  value="<?php echo $records->name ?>"   class="form-control"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
                        <button type="submit" value="update" name="update" class="btn btn-success " >تعديل</button></a>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>

        <?php $r++; endforeach; }?>