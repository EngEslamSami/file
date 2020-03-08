<?php

//var_dump($all);
//var_dump($_SESSION);
?>
<style>


</style>
<!-- Flash Message -->
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>


<div class="col-sm-12 col-md-12 col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?>  </h4>
            </div>
        </div>

        <div class="panel-body">
            <form method="post" id="form" action="<?= base_url() ?><?php echo (isset($record))? 'family_controllers/Setting/update_files_status_setting/'.$record->id : 'family_controllers/Setting/files_status_setting'; ?>">
                <div class="form-group col-sm-12 col-xs-12 no-padding">

                    <div class=" col-sm-6 col-xs-6 padd">
                        <label class="label label-green  half">اسم الحالة </label>
                        <input type="text" name="status_name" class="form-control half input-style" value="<?php if(isset($record->title)){ echo $record->title;}else{ echo '';} ?>" placeholder="اسم الحالة" data-validation="required">


                    </div>


                    <div class="col-sm-2 col-xs-2 padd">
                        <label class="label label-green  half">لون الحالة </label>
                        <input type="color" id="head" name="color"
                               value="<?php if(isset($record)){ echo $record->color;}else{ echo '#e66465';} ?>" />
                    </div>

                </div>









                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <div class="form-group col-sm-3 col-xs-12 padd">
                        <input type="submit" name="add_status" class="" value="حفظ">
                    </div>
                </div>

            </form>

            <?php if (isset($all) && !empty($all) && $all!=null){?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th >#</th>
                        <th >الاسم </th>

                        <th >الإجراء </th>
                    </tr>
                    </thead>
                    <?php $x=1; foreach ($all as $record=>$value){?>
                        <tr>
                            <td ><?=$x++?></td>
                            <td ><?=$all[$record]->title ?></td>


                            <td >
                                <a href="<?php echo base_url().'family_controllers/Setting/update_files_status_setting/'.$all[$record]->id ?>" title="تعديل">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                <span> </span>
                                <a href="<?=base_url()."family_controllers/Setting/delete_files_status_setting/".$all[$record]->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                </table>


            <?php  }?>
        </div>


    </div>
</div>
  