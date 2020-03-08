
<?php if($total_value != 0){?>


    <?php
    if(isset($pill_id) && !empty($pill_id) && $pill_id!=null){
        foreach ($pill_id as $key=>$x) {
            echo '<input type="hidden" name="pill_ids[]" value="' . $x . '" />';
        }
    }
    ?>




    <div class="form-group col-sm-4">
        <label class="label label-green  half">رقم القيد </label>
        <input type="text" name="qued_num" id="qued_num"   value="<?=$qued_num?>" class="form-control half input-style" readonly="" />
        <input type="hidden" name="paid_type" value="<?=$paid_type?>">
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

<?php }else {
    echo '  <div class="alert alert-danger">
                             <strong>يجب إختيار سند واحد على الاقل!</strong> .
                         </div> ';
}?>
<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>
<script>

    $('.some_class').datetimepicker();
    $('.some_class_2').datepicker();

</script>



<script>
    function get_calcolate(class_name,span_name) {
        var cbs = document.getElementsByClassName(class_name);
        var fatora_cost = 0;
        for (var i = 0; i < cbs.length; i++) {
            fatora_cost += parseFloat(cbs[i].value);
        }
        if (fatora_cost !=  <?=$total_value?> ) {
            $("."+span_name).html("خطأ فى الارقام الحسابية"); //submit_button
            $("#submit_button").addClass("disabled");
        }else {
            $("."+span_name).html("");
            $("#submit_button").removeClass("disabled");
        }
    }

</script>