 <div class="col-xs-12" >
<?php if($member_type == 2){?>

     <div class="form-group col-sm-4">
<!-- onkeyup="check_faminly();" -->
        <label class="label label-green  half">رقم الملف   </label>
        <div class="half" style="position: relative;display: table;border-collapse: separate;">
        <input type="number" id="file_num" onkeyup="check_faminly();"  class="form-control  input-style" placeholder="ادخل البيانات " >
           <!--  <div class="input-group-addon">
             <i class="fa fa-user-plus" onclick="get_some_family();" aria-hidden="true" title="أضف أسرة"></i>
             </div>-->
        </div>
          <span id="span_file" style="color: red;"></span>  
    </div>

    <div class="form-group col-sm-4">
        <label class="label label-green  half">المبلغ  </label>
        <input type="number" id="cashing"   onkeyup="" class="form-control half input-style" placeholder="ادخل البيانات " >
        <input type="hidden" id="count_family" value="1" />
    </div>

    <div class="form-group col-sm-4">
     <button type="button" onclick="get_some_family();" class="btn btn-purple w-md m-b-5" >
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> أضف الملف</button>
    </div>
<?php }elseif($member_type == 3){?>

  <div class="form-group col-sm-6">
        <label class="label label-green  half">المبلغ  </label>
        <input type="number" id="cashing"   onkeyup="option_table(3);" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>



<?php }elseif($member_type == 4){?>
   
        <div class="form-group col-sm-4">
        <label class="label label-green  half">أرمل  </label>
        <input type="number" id="armal" value="0"  onkeyup="option_table(4);" onclick="option_table(4);" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
    
    
      <div class="form-group col-sm-4">
        <label class="label label-green  half">يتيم   </label>
        <input type="number" id="yatem" value="0"  onkeyup="option_table(4);" onclick="option_table(4);" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
    
    
      <div class="form-group col-sm-4">
        <label class="label label-green  half">مستفيد   </label>
        <input type="number" id="mostafed" value="0"  onkeyup="option_table(4);" onclick="option_table(4);" class="form-control half input-style" placeholder="ادخل البيانات " >
    </div>
<?php }?>
</div>

 <div class="col-xs-12" id="option_table"></div>
