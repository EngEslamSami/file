
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
            <form method="post" id="form" action="<?= base_url() ?><?php echo (isset($record))? 'family_controllers/Setting/update_family_letter_setting/'.$record->id : 'family_controllers/Setting/family_letter_setting'; ?>">
                <div class="form-group col-sm-12 col-xs-12 no-padding">

                    <div class=" col-sm-4 col-xs-6 padd">
                        <label class="label label-green  half">إسم الجهة </label>
                        <input type="text" name="title" class="form-control half input-style" value="<?php if(isset($record->title)){ echo $record->title;}else{ echo '';} ?>" placeholder="عنوان الجهة" data-validation="required">

                    </div>
                    <div class=" col-sm-4 col-xs-6 padd">
                        <label class="label label-green  half">رقم الجوال </label>
                        <input type="number"   name="mob" class="form-control half input-style" value="<?php if(isset($record->mob)){ echo $record->mob;}else{ echo '';} ?>" placeholder="رقم الجوال" data-validation="required">

                    </div>
                    <div class=" col-sm-4 col-xs-6 padd">
                        <label class="label label-green  half">العنوان </label>
                        <input type="text" name="address" class="form-control half input-style" value="<?php if(isset($record->address)){ echo $record->address;}else{ echo '';} ?>" placeholder="العنوان" data-validation="required">

                    </div>

                </div>





                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <div class="form-group col-sm-3 col-xs-12 padd">
                        <input type="submit" name="add_setting" class="" value="حفظ">
                    </div>
                </div>

            </form>

            <?php if (isset($all) && !empty($all) && $all!=null){?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd">
                        <th >#</th>
                        <th >الاسم </th>
                        <th >رقم الجوال </th>
                        <th >العنوان </th>
                        <th >الإجراء </th>
                    </tr>
                    </thead>
                    <?php $x=1; foreach ($all as $record=>$value){?>
                        <tr>
                            <td ><?=$x++?></td>
                            <td ><?=$all[$record]->title ?></td>
                            <td ><?=$all[$record]->mob ?></td>
                            <td ><?=$all[$record]->address ?></td>
                            <td >
                                <a href="<?php echo base_url().'family_controllers/Setting/update_family_letter_setting/'.$all[$record]->id ?>" title="تعديل">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                <span> </span>
                                <a href="<?=base_url()."family_controllers/Setting/delete_family_letter_setting/".$all[$record]->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                </table>


            <?php  }?>
        </div>


    </div>
</div>
