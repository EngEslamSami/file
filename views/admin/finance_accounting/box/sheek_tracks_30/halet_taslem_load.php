<?php echo form_open_multipart('finance_accounting/box/sheek_tracks/Sheek_tracks/change_taslem_sheek');?>

<div class="modal-body">
    <div class=" col-xs-12 text-center top_radio">
        <?php if(!empty($taslem_settings)){  foreach ($taslem_settings as $rows){ ?>
            <div class="col-sm-6">
                <div class="radio">
                    <label>
                        <input type="radio" name="taslem_sheek"
                               value="<?php echo$rows->id.'-'.$rows->title; ?>">
                        <?php echo $rows->title?> <br>
                    </label>
                </div>
            </div>
        <?php } } ?>

    </div>
    <div class=" col-xs-12">

        <textarea name="reason" class="form-control" style="height: 100px;box-shadow: 2px 2px 8px;"></textarea>
        <br>

    </div>
    <div class=" col-xs-12">
  <?php if(!empty($tracks)) {?>
        <table class="table table-hover table-bordered table-blue">
            <thead>
            <th>م</th>
            <th>رقم السند</th>
            <th>رقم الشيك</th>
            <th> إسم البنك </th>
            <th>الإجراء</th>
            <th>القائم بالإجراء</th>
            </thead>
            <tbody>
            <?php  $count=1; foreach ($tracks as $record){ ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $record->rkm_sanad?></td>
                    <td><?php echo $record->sheek_num?></td>
                    <td><?php echo $record->bank_name?></td>
                    <td><?php echo $record->action_name?></td>
                    <td><?php echo $record->publisher_name?></td>
                </tr>


                <?php $count ++; }  ?>
            </tbody>
        </table>


   <?php } ?>
    </div>


</div>
<div class="modal-footer" style="display: inline-block;width: 100%">
    <input type="hidden" name="rkm_sanad" value="<?php echo $records->rqm_sanad_id_fk?>">
    <input type="hidden" name="sheek_num" value="<?php echo $records->sheek_num?>">
    <input type="hidden" name="bank_name" value="<?php echo $records->bank_name?>">
    <input type="hidden" name="id" value="<?php echo $records->id?>">
    <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
    <button type="submit"  name="save" style="padding: 6px 12px;margin-bottom: 0;"  value="save" style="float: left" class="btn btn-success" >حفظ</button>
</div>
<?php echo form_close()?>


