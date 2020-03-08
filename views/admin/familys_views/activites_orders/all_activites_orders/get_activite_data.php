<div class="form-group col-sm-4">
    <label class="label label-green  half">تاريخ البداية </label>
    <input type="text"  name="from_date"  value="<?=$activite_data[0]->from_date?>"  class="form-control half input-style"  readonly="">
</div>
<div class="form-group col-sm-4">
    <label class="label label-green  half">تاريخ النهاية </label>
    <input type="text"  value="<?=$activite_data[0]->to_date?>" name="to_date"  class="form-control half input-style" readonly="">
</div>
<div class="form-group col-sm-4">
    <label class="label label-green  half">مكان التنفيذ</label>
    <input type="text"   value="<?=$activite_data[0]->title?>" class="form-control half input-style"  readonly="">
    <input type="hidden" value="<?=$activite_data[0]->place_id_fk?>" name="place_id_fk"  />
    <input type="hidden" value="<?=$activite_data[0]->active_id_fk?>"  id="activity_id_fk" name="activity_id_fk"  />
    <input type="hidden" value="<?=$activite_data[0]->id?>" id="start_activ_id_fk" name="start_activ_id_fk"  />
</div>