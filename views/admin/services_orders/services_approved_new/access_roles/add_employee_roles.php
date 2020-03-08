
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
            <td>    <a href="" data-toggle="modal" data-target="#modal-sm-<?=$record->emp_code;?>">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
        </tr>
        <?php endforeach;  ?>
    </tbody>
</table>
        </div>

        <?php foreach ($all_employees as $record ):?>
        <div class="modal fade" id="modal-sm-<?=$record->emp_code;?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title">صلاحيات الموظف </h1>
                    </div>
                    <?php $arr_process=array("1"=>"قبول","2"=>"تحويل","3"=>"رفض");?>
                    <div class="modal-body row">
                        <?php echo form_open_multipart("services_orders/AccessRoles/AddEmployeeRoles/".$record->emp_code)?>
                        <?php if(isset($record->per) && !empty($record->per)  && $record->per !=null){?>
                        <div class="col-sm-12">
                            <input type="hidden" name="operation" value="UPDATE" />
                           <?php foreach ($arr_process as $one_per=>$value){
                              $checked="";if (in_array($one_per,$record->per)){$checked="checked";}  ?>
                            <input type="checkbox" name="roles[]" value="<?=$one_per?>" <?=$checked?>> <?=$value?><br>
                           <?php }?>
                        </div>
                        <?php }else{?>
                            <input type="hidden" name="operation" value="INSERT" />
                            <?php foreach ($arr_process as $one_per=>$value){?>
                                <input type="checkbox" name="roles[]" value="<?=$one_per?>" > <?=$value?><br>
                            <?php }?>
                        <?php }?>
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

