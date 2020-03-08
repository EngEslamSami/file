<?php if($type_sarf == 4){?>
    <div class="form-group col-sm-2 padding-4">
   
        <label class="label   ">بحسب </label>
        
        <select name="method_type_according_to" onchange="get_according_to(this.value);" class="form-control  class_according_to"  aria-required="true" tabindex="-1" aria-hidden="true">
            <?php $method_type=array("1"=>"فئة الأسرة","2"=>"الحالة الدراسية","3"=>"العمر",'4'=>'الإيجار')?>
            <option value="">إختر</option>
            <?php $x=1; foreach ($method_type as $key=>$value){  ?>
                <option value="<?=$key?>" ><?=$value?></option>
            <?php } ?>
        </select>
  
    </div>
    <div id="option_according_to" ></div>

<?php }?>


<?php if($member_type == 1){?>
    <div class="form-group col-sm-2 padding-4">
 
        <label class="label ">رقم ملف الاسرة  </label>
        
        <input type="number" id="mother_id"   onkeyup="check_faminly(this.value);" class="form-control  " placeholder="ادخل البيانات " >
        <span id="span_file" style="color: red;"></span>
        
    </div>
  
<?php }elseif($member_type == 2){?>
    <div class="form-group col-sm-2 padding-4">
        
        <label class="label">رقم ملف الاسرة    </label>
      
      
        <input type="number" id="mother_id" onkeyup="check_faminly(this.value);" class="form-control  " placeholder="ادخل البيانات " >
          <!--   <div class="input-group-addon"><i class="fa fa-user-plus" onclick="" aria-hidden="true" title="أضف أسرة"></i></div> -->
     
        <span id="span_file" style="color: red;"></span>
    </div>
    
<?php }elseif($member_type == 3){ ?>
   
<?php }?>




<?php if($type_sarf == 1){?>
    <div class="form-group col-sm-2 padding-4">
        
            <label class="label">المبلغ  </label>
           
            <input type="number" id="due_to_family"  name="" class="form-control" placeholder="ادخل البيانات " >
       
    </div>

<?php }elseif($type_sarf == 2){?>
    <div class="form-group col-sm-2 padding-4">
  
        <label class="label ">مبلغ  الفرد  </label>
        
        <input type="number" id="due_to_member"  name="" class="form-control" placeholder="ادخل البيانات " >
   
    </div>

<?php }elseif($type_sarf == 3){?>
    <div class="form-group col-sm-2 padding-4">

        <label class="label ">مبلغ   الأرامل </label>
       
        <input type="number" id="due_to_widow"  name="value_armal" value="0"  class="form-control " placeholder="ادخل البيانات " >

    </div>
    <div class="form-group col-sm-2 padding-4">
 
        <label class="label ">مبلغ  اليتيم </label>
        
        <input type="number" id="due_to_orphan"  name="value_yatem" value="0"  class="form-control " placeholder="ادخل البيانات " >
  
    </div>
    <div class="form-group col-sm-2 padding-4">

        <label class="label">مبلغ  المستفيد  </label>
      
        <input type="number" id="due_to_beneficiary"  name="value_mostafed" value="0"  class="form-control " placeholder="ادخل البيانات " >
   
    </div>
<?php }elseif($type_sarf == 4){?>
    <div class="form-group col-sm-2 padding-4">
    
        <label class="label">المبلغ  </label>
        
        <input type="number"   name="money_according_to" id="money_according_to" class="form-control class_according_to" placeholder="ادخل البيانات " >
   
    </div>
   

<?php }?>


<?php if($member_type == 1){?>
  <div class="form-group col-sm-2 padding-4">
        <button type="button" class="btn btn-warning btn-labeled" onclick="get_data();" id="searcher_but" style="margin-top: 27px;">
            <span class="btn-label"><i class="fa fa-search" aria-hidden="true"></i></span> بحث </button>
    </div>
<?php }elseif($member_type == 2){?>
<!--<div class="col-xs-2 padding-4">
        <button type="button" class="btn btn-info btn-labeled" onclick="get_data();" id="searcher_but" style="margin-top: 27px;">
            <span class="btn-label"><i class="fa fa-list" aria-hidden="true"></i></span> عرض بيانات الأسرة</button>
    </div>-->
    <div class="col-xs-2 padding-4">
        <button type="button" class="btn btn-success btn-labeled" onclick="get_data();" id="searcher_but" style="margin-top: 27px;">
            <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i></span> اضافة الاسرة</button>
    </div>
<?php }elseif($member_type == 3){ ?>
 <div class="form-group col-sm-2 padding-4">
      
            <button type="button" onclick="get_data()" class="btn btn-labeled btn-warning "  id="searcher_but" style="margin-top: 27px;">
                    <span class="btn-label"><i class="fa fa-search" aria-hidden="true"></i></span>بحث
                </button>
    </div>
<?php }?>


<?php if($type_sarf == 4){?>
<div id="view_according_to" style="display: none">

    <div class=" col-md-4 padding-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>قيمة الايجار</th>
                <th>قيمة الايجار من اللائحه</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td id="house_rent"></td>
                <td id="setting_rent"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php } ?>


