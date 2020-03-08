<?php if(isset($result_id) && !empty($result_id) && $result_id!=null ):
    $out['form']='admin/Secretary/UpdateSubPart/'.$result_id['id'];
    $out['form_id']=$result_id["form_id"];
    $out['name']=$result_id["name"];
    $out['input']='UPDTATE';
    $out['input_title']='تعديل ';
else:
    $out['form']='admin/Secretary/AddSubPart';
    $out['form_id']="";
    $out['name']="";
    $out['input']='INSERT';
    $out['input_title']='حفظ ';
endif?>


<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open_multipart($out['form'])?>
            <div class="form-group col-sm-12">
                <div class=" col-sm-6">
                    <label class="label label-green  half">المعاملة الرئيسية </label>
                    <select  name="form_id" class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                        <option value=""> - اختر - </option>

                        <?php foreach ($transactions as $record):
                            $select=""; if($record->id == $out['form_id']){ $select="selected";} ?>
                            <option value="<?php echo $record->id ?>" <?=$select?>><?php echo $record->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6">
                        <label class="label label-green  half">إسم  الفرعية </label>
                        <input type="text" name="name" value="<?=$out['name']?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success ">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>

            </div>
            <?php echo form_close()?>
            <?php if(isset($records)&&$records!=null):?>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center"> م </th>
                    <th class="text-center">  اسم المعاملة  </th>
                    <th class="text-center">  المعاملة الرئيسية  </th>
                    <th class="text-center">  الاجراء  </th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php  foreach ($records as $row): ?>
                <tr>
                    <td class="text-center"> م </td>
                    <td class="text-center"><?=$row->name?> </td>
                    <td class="text-center"><?=$row->main?></td>
                    <td class="text-center">
                        <a href="<?php echo base_url('').'admin/Secretary/DeleteSubPart/'.$row->id ?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span> <a href="<?php echo base_url('').'admin/Secretary/UpdateSubPart/'.$row->id ?>" >
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>

                    </td>
                </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>



        </div>
    </div>
</div>