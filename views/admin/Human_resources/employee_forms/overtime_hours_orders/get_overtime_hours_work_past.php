
<?php
$class = '';
if ($_POST['table_max'] % 2 == 0) {
    $class = 'open_green';
}
?>

<tr class="<?=$class?>" id="tr<?=$_POST['table_max']?>">
    <td><input type="date" name="date[]" id="date" data-validation="required"></td>
    <td><input type="time"   data-validation="required" name="from_time[]"   id="from_time<?php echo$_POST['table_max'];?>"
               onchange="count(<?=$_POST['table_max']?>)"></td>
    <td><input type="time"  data-validation="required"  name="to_time[]" id="to_time<?php echo$_POST['table_max'];?>"
               onchange="count(<?=$_POST['table_max']?>)" ></td>
    <td><input type="text"    class="num_hours" name="num_hours[]" id="num_hours<?php echo$_POST['table_max'];?>" readonly style="width: 107px">
        <input type="hidden"    class="minutes" name="" id="minutes<?php echo$_POST['table_max'];?>" readonly style="width: 107px">
    </td>
    <td><select name="bdal_type[]" id="bdal_type" class="form-control bottom-input""  data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>
            <?php for ($a=0;$a<sizeof($bdal_type_arr);$a++){ ?>
                <option value="<?=$a?>"><?=$bdal_type_arr[$a]?></option>
            <?php } ?>
        </select></td>
    <td><textarea name="work_assigned_arr[]" style="margin: 0px; width: 193px; height: 69px;"  cols="30" data-validation="required" rows="10"></textarea></td>
    <td>

        <a href="#"
           onclick=" RemoveMe('tr<?=$_POST['table_max']?>' );"><i class="fa fa-trash"
                                                                         aria-hidden="true"></i> </a>
    </td>
</tr>







<script>

    function count(valu) {

        var from_time=$("#from_time" + valu).val();
        var to_time=$("#to_time" + valu).val();

        var dataString = 'from_time=' + from_time  +'&to_time=' + to_time;
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Overtime_hours_orders/GetNum_hours",
            data:dataString,
            cache:false,
            success: function(json_data){

                var JSONObject = JSON.parse(json_data);

                console.log(JSONObject);

                $('#num_hours' + valu).val(JSONObject['hours']+ ':' + JSONObject['minutes']);
                $('#minutes' + valu).val(JSONObject['minutes2']);
                CheckTime();

            }
        });


    }
</script>

<script>
    function CheckTime() {
        var valu =<?php echo $_POST['table_max']?>;
  var hours =$('#max_hours').val();
        total =0;
        $(".minutes").each(function(){
            total +=  parseInt($(this).val());

        });
      var TotalHours =(parseInt(total) / 60);

       if(TotalHours > hours){
            $("#from_time" + valu).val('');
           $("#to_time" + valu).val('');
           $("#num_hours" + valu).val('');
            alert('أقصي عدد ساعات' + hours);
        }


    }
</script>


<script>
    function RemoveMe(valu) {
        $('#' + valu).remove();
    }
    
</script>