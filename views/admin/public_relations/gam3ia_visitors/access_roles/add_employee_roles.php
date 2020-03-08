
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12">
   <?php if(isset($all_employees) && $all_employees !=null && !empty($all_employees)){?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="text-center">كود الموظف </th>
        <th class="text-center">إسم الموظف</th>
        <th class="text-center">الاجراء</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <?php foreach ($all_employees as $record ):?>
        <tr>
            <td><? echo $record->emp_code;?></td>
            <td><? echo $record->employee;?></td>
            <td>    <a href="" data-toggle="modal" data-target="#modal-sm-<?=$record->id;?>">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
        </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
        </div>

        <?php foreach ($all_employees as $record ):?>
        <div class="modal fade" id="modal-sm-<?=$record->id;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title">صلاحيات الموظف </h1>
                    </div>
                    <?php $arr_process=array("1"=>"تعديل","2"=>"حذف");?>
                    <div class="modal-body row">
                        <?php echo form_open_multipart("public_relations/gam3ia_visitor/AccessRoles/AddEmployeeRoles/".$record->id)?>
                        <div class="col-sm-12">
                        <?php if(isset($record->per) && !empty($record->per)  && $record->per !=null){?>
                            <input type="hidden" name="operation" value="UPDATE" />
                        <?php }else{?>
                            <input type="hidden" name="operation" value="INSERT" />
                        <?php }?>
<!--                           --><?php //foreach ($arr_process as $one_per=>$value){
//                              $checked="";if(isset($record->per) && !empty($record->per)  && $record->per !=null){  if (in_array($one_per,$record->per)){$checked="checked";} } ?>
                            <input type="checkbox" name="roles_edit" value="1" <?php if(isset($record->per->edit) &&($record->per->edit == 1)){echo 'checked';}?>> تعديل<br>
                            <input type="checkbox" name="roles_delet" value="2" <?php if(isset($record->per->delet) &&($record->per->delet == 1)){echo 'checked';}?> > حذف <br>
<!--                           --><?php //}?>
                        </div>


                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        <button type="submit"  class="btn btn-warning">حفظ</button>
                        <?php  echo form_close()?>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <?php endforeach;  ?>
<?}else{
     echo '<div class="alert alert-info">
               <strong>لا يوجد موظفين مضافين بالإدارة !</strong> .
           </div>';
}?>


    </div>
</div>

