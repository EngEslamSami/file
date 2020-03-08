
    <div class="form-group col-sm-4">
        <label class="label ">رقم القيد </label>
        <input type="text" name="qued_num" id="qued_num"   value="1" class="form-control " readonly="" />
     
    </div>

    <div class="form-group col-sm-4">
        <label class="label ">القيمة </label>
        <input type="number" id="value"  name="value" value="<?=$total_value?>"  class="form-control " readonly="" />
    </div>
    
    <div class="form-group col-sm-4">
        <label class="label ">تاريخ القيد</label>
        <input type="date" id="qued_date" name="qued_date" class=" form-control " />
    </div>

    <div class="form-group col-sm-4">
        <label class="label ">البيان</label>
        <input type="text" name="qued_byan"  class="form-control "  />
    </div>

    <div class="form-group col-sm-4">
        <label class="label "> عدد حسابات المدين </label>
        <input type="number" id="madeen_num" class="form-control " onkeyup="get_account();" />
    </div>
    <div class="form-group col-sm-4">
        <label class="label ">عدد حسابات الدائن </label>
        <input type="number" id="dayen_num"  class="form-control " onkeyup="get_account();" />
    </div>

    <div class="col-sm-12" id="option_1"></div>

