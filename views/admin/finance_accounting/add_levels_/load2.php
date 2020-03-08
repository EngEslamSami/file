<?php if($_POST['rased']==2):?>
<div class="col-xs-12 inner-side r-data">
	<div class="col-xs-6">
        <h4 class="r-h4">حساب مدين</h4>
    </div>
	<div class="col-xs-6 r-input">
        <input type="number" class="r-inner-h4" id="last_value_madeen" name="last_value_madeen" required />
    </div>
</div>

<div class="col-xs-12 inner-side r-data">
	<div class="col-xs-6">
        <h4 class="r-h4">حساب دائن</h4>
    </div>
	<div class="col-xs-6 r-input">
        <input type="number" class="r-inner-h4" id="last_value_dayen" name="last_value_dayen" required />
    </div>
</div>

<!--div class="col-xs-12 inner-side r-data">
	<div class="col-xs-6">
        <h4 class="r-h4"> رصيد الحساب</h4>
    </div>
	<div class="col-xs-6 r-input">
        <input type="number" class="r-inner-h4" readonly id="last_value" name="last_value" />
    </div>
</div-->            
<?php else:
endif?>