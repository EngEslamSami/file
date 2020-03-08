
<div class="form-group col-sm-12">
    <div class="col-sm-6">
        <label class="label label-green  half">الاسم </label>
        <input type="text" value="<?=$result["p_name"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
    </div>
    <div class="col-sm-6">
        <label class="label label-green  half">رقم السجل المدنى </label>
        <input type="text" value="<?=$result["p_national_num"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
    </div>
</div>
<div class="form-group col-sm-12">
    <div class="col-sm-6">
        <label class="label label-green  half">تاريخ الميلاد  </label>
        <input type="text" value="<?=$result["p_date_birth"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
    </div>
    <div class="col-sm-6">
        <label class="label label-green  half">رقم الجوال </label>
        <input type="text" value="<?=$result["p_mob"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات">
    </div>
</div>
<div class="form-group col-sm-12">
    <div class="col-sm-6">
        <label class="label label-green  half">فئة الاعاقة </label>
        <input type="text" value="<?=$result["disability_title"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
    </div>
    <div class="col-sm-6">
        <label class="label label-green  half">رقم المستفيد </label>
        <input type="text" value="<?=$result["p_num"]?>" readonly="" class="form-control half input-style" placeholder="أدخل البيانات" >
    </div>
</div>


<div class="form-group col-sm-12">
    <table class="table table-bordered ">
        <thead>
        <tr>
            <th>إسم الجهاز</th>
            <th>العدد</th>
            <th><i class="fa fa-plus-square" aria-hidden="true" onclick="add_row();"></i></th>
        </tr>
        </thead>
        <tbody id="add_device">
        <tr>
            <td> <select name="divice[]" class="form-control"  data-validation="required">
                    <option value=""> أختر </option>
                    <?php if(isset($all_device) && !empty($all_device) && $all_device!=null){
                        foreach ($all_device as $row_device){ ?>
                            <option value="<?=$row_device->id?>"> <?=$row_device->title?></option>
                        <?php  }
                    }else{
                        echo '<option value=""> لا يوجد أجهزة </option>';
                    }?>
                </select>
            </td>
            <td> <input type="number" name="numbers[]" class="form-control"    data-validation="required">  </td>
            <td>
            </td>
        </tr>
        </tbody>
    </table>

</div>

<script>
    function add_row() {
        var dataString = "get_row="+ "1";
       
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>disability_managers/DeviceOrders/PageLoad',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                
                $("#add_device").append(html);
            }
        });
    }
   
</script>