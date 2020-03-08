<?php if(isset($result_id) && !empty($result_id) && $result_id!=null ):
    $out['form']='family_controllers/LagnaSetting/UpdateCommittee/'.$result_id['id_lagna'];
    $out['lagna_code']=$result_id["lagna_code"];
    $out['lagna_name']=$result_id["lagna_name"];
    $out['input']='UPDTATE';
    $out['input_title']='تعديل ';
    $out['span']='لعدم تغير الصورة لاتختار شيء ';
    $out['required']='';
else:
    $out['form']='family_controllers/LagnaSetting/AddCommittee';
    $out['lagna_code']=$last_code+1;
    $out['lagna_name']="";
    $out['input']='INSERT';
    $out['input_title']='حفظ ';
    $out['span']=' ';
    $out['required']='data-validation="required"';
endif?>
<div class="col-sm-12" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open_multipart($out['form'])?>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="label label-green  half">كود اللجنة</label>
                    <input type="number" name="lagna_code" value="<?=$out["lagna_code"]?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" readonly="">
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">إسم اللجنة</label>
                    <input type="text" name="lagna_name" value="<?=$out["lagna_name"]?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>

            <div class="col-xs-12">
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success ">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
            </div>
            <?php echo form_close()?>



            <?php if(isset($data_tables ) && $data_tables!=null && !empty($data_tables)):?>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>كود اللجنة</th>
                        <th>إسم اللجنة</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <?php $x = 1; foreach($data_tables as $row):?>
                        <tr>
                            <td ><?=$x++?></td>
                            <td > <?php echo $row->lagna_code?> </td>
                            <td ><?php echo $row->lagna_name?></td>
                            <td data-title="التحكم" class="text-center">
                                <a  href="<?php echo base_url().'family_controllers/LagnaSetting/UpdateCommittee/'.$row->id_lagna?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    <a onclick="return confirm('هل انت متأكد من عملية الحذف ؟');"  href="<?php echo base_url().'family_controllers/LagnaSetting/DeleteCommittee/'.$row->id_lagna?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                            </td>
                        </tr>
                    <?php endforeach ;?>

                </table>
            <?php endif;?>
        </div>
    </div>
</div>