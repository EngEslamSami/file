
<?php if($member_type == 1){?>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">رقم ملف الاسرة  </label>
        <input type="number" id="mother_id"   onkeyup="check_faminly(this.value);get_data();" class="form-control half input-style" placeholder="ادخل البيانات " >
        <span id="span_file" style="color: red;"></span>
    </div>
  
<?php }elseif($member_type == 2){?>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">رقم ملف الاسرة    </label>
        <div class="half" style="position: relative;display: table;border-collapse: separate;">
        <input type="number" id="mother_id" onkeyup="check_faminly(this.value);" class="form-control  input-style" placeholder="ادخل البيانات " >
          <!--   <div class="input-group-addon"><i class="fa fa-user-plus" onclick="" aria-hidden="true" title="أضف أسرة"></i></div> -->
        </div>
        <span id="span_file" style="color: red;"></span>
    </div>
    
<?php }elseif($member_type == 3){ ?>
   
<?php }?>




<?php if($type_sarf == 1){?>
    <div class="form-group col-sm-6">
        <label class="label label-green  half">المبلغ  </label>
        <input type="number" id="due_to_family"  name="" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>

<?php }elseif($type_sarf == 2){?>
    <div class="form-group col-sm-6">
        <label class="label label-green  half">مبلغ  الفرد  </label>
        <input type="number" id="due_to_member"  name="" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>

<?php }elseif($type_sarf == 3){?>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">مبلغ   الأرامل </label>
        <input type="number" id="due_to_widow"  name="" value="0" onkeyup="" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">مبلغ  اليتيم </label>
        <input type="number" id="due_to_orphan"  name="" value="0" onkeyup="" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">مبلغ  المستفيد  </label>
        <input type="number" id="due_to_beneficiary"  name="" value="0" onkeyup="" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>

<?php }?>


<?php if($member_type == 1){?>
  <div class="form-group col-sm-2">
        <button type="button" class="btn btn-warning" onclick="get_data();">
            <span><i class="fa fa-search" aria-hidden="true"></i></span> بحث </button>
    </div>
<?php }elseif($member_type == 2){?>
<div class="col-xs-2">
        <button type="button" class="btn btn-info " onclick="get_data();">
            <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span> إضافة أسرة</button>
    </div>
<?php }elseif($member_type == 3){ ?>
 <div class="form-group col-sm-2">
        <button type="button" class="btn btn-warning" onclick="get_data();">
            <span><i class="fa fa-search" aria-hidden="true"></i></span> بحث </button>
    </div>
<?php }?>





