<?php if($type_sarf == 4){?>
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">بحسب </label>
        <select name="method_type_according_to" onchange="get_according_to(this.value);" class="form-control half class_according_to"  aria-required="true" tabindex="-1" aria-hidden="true">
            <?php $method_type=array("1"=>"فئة الأسرة","2"=>"الحالة الدراسية","3"=>"العمر")?>
            <option value="">إختر</option>
            <?php $x=1; foreach ($method_type as $key=>$value){  ?>
                <option value="<?=$key?>" ><?=$value?></option>
            <?php } ?>
        </select>
    </div>
    <div id="option_according_to"></div>

<?php }?>


<?php if($member_type == 1){?>
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">رقم ملف الاسرة  </label>
        <input type="number" id="mother_id"   onkeyup="check_faminly(this.value);" class="form-control half input-style" placeholder="ادخل البيانات " >
        <span id="span_file" style="color: red;"></span>
    </div>
  
<?php }elseif($member_type == 2){?>
    <div class="form-group col-md-2 col-sm-4 padding-4">
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
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">المبلغ  </label>
        <input type="number" id="due_to_family"  name="" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>

<?php }elseif($type_sarf == 2){?>
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">مبلغ  الفرد  </label>
        <input type="number" id="due_to_member"  name="" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>

<?php }elseif($type_sarf == 3){?>
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">مبلغ   الأرامل </label>
        <input type="number" id="due_to_widow"   name="value_armal"  value="0"  class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
    <div class="form-group  col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">مبلغ  اليتيم </label>
        <input type="number" id="due_to_orphan"  name="value_yatem"  value="0"  class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">مبلغ  المستفيد  </label>
        <input type="number" id="due_to_beneficiary"  name="value_mostafed" value="0"  class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
<?php }elseif($type_sarf == 4){?>
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label label-green  half">المبلغ  </label>
        <input type="number"   name="money_according_to" id="money_according_to" class="form-control half input-style class_according_to" placeholder="ادخل البيانات " >
    </div>
   

<?php }?>


<?php if($member_type == 1){?>
  <div class="form-group col-md-2 col-sm-4 padding-4">
       <!-- <button type="button" class="btn btn-warning" onclick="get_data();" id="searcher_but">
            <span><i class="fa fa-search" aria-hidden="true"></i></span> بحث </button>-->
            
            <button type="button"  class="btn btn-labeled btn-warning " onclick="get_data();" id="searcher_but" style="margin-top: 25px;">
                <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث      </button>
    </div>
<?php }elseif($member_type == 2){?>
<div class=" col-md-2 col-sm-4 padding-4">
        <!--<button type="button" class="btn btn-info " onclick="get_data();" id="searcher_but">
            <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span> إضافة أسرة</button>-->
            
        <button type="button"  class="btn btn-labeled btn-success " onclick="get_data();" id="searcher_but" style="margin-top: 25px;">
                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة أسرة      </button>
    </div>
<?php }elseif($member_type == 3){ ?>
 <div class="form-group col-md-2 col-sm-4 padding-4">
       <!-- <button type="button" class="btn btn-warning" onclick="get_data();" id="searcher_but">
            <span><i class="fa fa-search" aria-hidden="true"></i></span> بحث </button>-->
            
        <button type="button"  class="btn btn-labeled btn-warning " onclick="get_data();" id="searcher_but" style="margin-top: 25px;">
              <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث      </button>
    </div>
<?php }?>





