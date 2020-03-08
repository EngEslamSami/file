<?php 
$id = $this->uri->segment(3);
$val = $id = $this->uri->segment(4);
if($id == ""){
  $address = 'إضافة رأي اللجنة ';
}
else{
  $address = 'تعديل رأي اللجنة';
}
echo form_open_multipart('Dashboard/commite/'.$id); 
$help = array(1=>"نقدي",2=>"عيني");
?>

      <button type="button"  class=" btn btn-success  w-md m-b-5 " style="float: left;" onclick="window.location.href = '<?=base_url()?>Dashboard/confirm_recive';"><i class="fa fa-reply"></i> رجوع  </button>
      
      <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="top-line"></div>
        <?php if((isset($counciladmin) && $counciladmin != null) || (isset($member) && $member != null)){ ?>
        <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
            <div class="panel-title">
              <h4><?=$address?></h4>
            </div>
          </div>
          <div class="panel-body">
      <div class="col-sm-12">
            <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">رقم المقابلة</label> 
              <input type="text" name="id" class="form-control half input-style" value="<?=$interviews[0]->id?>" readonly>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">اسم النزيل </label>
              <input type="text" name="date" class="form-control half input-style" value="<?=$interviews[0]->nazeel_name?>" readonly>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">رقم السجل </label>
              <input type="text" name="date" class="form-control half input-style" value="<?=$interviews[0]->sgl_mdny?>" readonly>
            </div>
      </div>
      <div class="col-sm-12">
            <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">اسم الباحث</label>
              <input type="text" name="date" class="form-control half input-style" value="<?=$interviews[0]->employee?>" readonly>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">نوعية المساعدة</label>
              <input type="text" name="date" class="form-control half input-style" value="<?=$help[$interviews[0]->help_id]?>" readonly>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
            <?php if($interviews[0]->help_id == 1) { ?>
              <label class="label label-green  half">قيمة المساعدة </label> 
              <input type="text" id="value-ar" class="form-control half input-style" value="<?=$interviews[0]->asnaf?>" readonly>
            <?php }else{ $amount= unserialize($interviews[0]->asnaf); ?>
              <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr class="info">
                    <th>الصنف</th>
                    <th>الكمية</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($asnaf as $sanf) { ?>
                    <tr><?=$sanf->name?></tr>
                    <tr><?=$amount[$sanf->id]?></tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php } ?>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr class="info">
                    <th><input type="checkbox" name="all" id="all"></th>
                    <th>العضو</th>
                    <th>الوظيفة</th>
                    <th>رأي العضو</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if($val!='add'){
                    $mem = explode("#", $interviews[0]->lgna);
                    foreach ($mem as $op) {
                      if($op == "") {
                        continue;
                      }
                      $text = explode("-", $op);
                      $array[$text[0]] = $text;
                    }
                  }

                  foreach ($member as $value) { 
                    $check = "";
                    $input = "";
                    $readonly = "readonly";
                    if(isset($array[$value->id])){
                      $check = "checked";
                      $input = $array[$value->id][1];
                      $readonly = "";
                    }
                  ?>
                  <tr>
                    <td><input type="checkbox" onclick="return enable($(this).val());" name="memberid[]" id="chec<?=$value->id?>" value="<?=$value->id?>" class="cc" <?=$check?> ></td>
                    <td><?=$value->membername?></td>
                    <td><?=$value->jobname?></td>
                    <td><input type="text" class="form-control tt" id="membertext<?=$value->id?>" name="membertext<?=$value->id?>" value="<?=$input?>" data-validation="" <?=$readonly?> ></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label class="label label-green  half">تاريخ توقيع رئيس اللجنة </label>
              <input type="text" name="date" class="some_class_2 form-control half input-style" value="<?php if($val!='add') echo date("Y/m/d",$interviews[0]->tare5tawke3ra2eslgna)?>" data-validation="required">
            </div>
      </div>
            <div class="form-group col-sm-6 col-xs-12">
              <button type="submit" onclick="return checc();" name="save" value="save" class="btn btn-purple w-md m-b-5"><i class="fa fa-floppy-o"></i> حفظ  </button>
            </div>
          </div>
        </div>

      <?php }else{
        echo '<div class="alert alert-danger">عليك التاكد اولا من وجود  المجلس</div>';
      } ?>
      </div>

<?php 
echo form_close(); 
?>

<script>
  function checc(){
    var checked=false;
    var elements = document.getElementsByName("memberid[]");
    for(var i=0; i < elements.length; i++){
      if(elements[i].checked) {
        checked = true;
      }
    }
    if (!checked) {
      alert('يجب على الأقل إختيار عضو واحد');
    }
    return checked;  
  }
</script>

<script type="text/javascript">
  function enable(val){
    if($("#chec"+val).is(":checked") == true){
      $("#membertext"+val).attr("readonly", false); 
      $("#membertext"+val).attr("data-validation", "required"); 
    }
    else{
      $("#membertext"+val).val("");
      $("#membertext"+val).attr("readonly", "readonly"); 
      $("#membertext"+val).attr("data-validation", ""); 
    }
  }
</script>