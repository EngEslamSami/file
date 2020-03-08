
    <div class="form-group col-sm-4">
        <label class="label label-green  half">رقم القيد </label>
        <input type="text" name="qued_num" id="qued_num"   value="1" class="form-control half input-style" readonly="" />
     
    </div>

    <div class="form-group col-sm-4">
        <label class="label label-green  half">القيمة </label>
        <input type="number" id="value"  name="value" value="<?=$total_value?>"  class="form-control half input-style" readonly="" />
    </div>
    
    <div class="form-group col-sm-4">
        <label class="label label-green  half">تاريخ القيد</label>
        <input type="date" id="qued_date" name="qued_date" class=" form-control half input-style" />
    </div>

    <div class="form-group col-sm-4">
        <label class="label label-green  half">البيان</label>
        <input type="text" name="qued_byan"  class="form-control half input-style"  />
    </div>

    <div class="form-group col-sm-4">
        <label class="label label-green  half"> عدد حسابات المدين </label>
        <input type="number" id="madeen_num" class="form-control half input-style" onkeyup="get_account();" />
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">عدد حسابات الدائن </label>
        <input type="number" id="dayen_num"  class="form-control half input-style" onkeyup="get_account();" />
    </div>

    <div class="col-sm-12" id="option_1"></div>

