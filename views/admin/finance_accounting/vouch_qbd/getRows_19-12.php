<tr id="<?=$_POST['length']?>">
    <td>
        <input type="text" onkeypress="return validate_number(event);" class="form-control accountValue" step="any" name="value[]" data-validation="required" aria-required="true" onkeyup="getSum();">
    </td>
    <td>
        <input type="text" class="form-control" name="account_num[]" id="account_num<?=$_POST['length']?>" data-validation="required" aria-required="true" readonly="" data-toggle="modal" data-target="#myModal" onclick="$('#modalID').val(<?=$_POST['length']?>)" style="cursor:pointer;">
    </td>
    <td>
        <input type="text" class="form-control" name="account[]" id="account<?=$_POST['length']?>" data-validation="required" aria-required="true" readonly="" >
    </td>
    <td>
        <input type="text" class="form-control" name="note[]" data-validation="required" aria-required="true">
    </td>
    <td>        
        <a href="#" 
        onclick="
            $('#<?=$_POST['length']?>').remove(); 
            getSum();
            var x = document.getElementById('resultTable');
            if(x.rows.length == 0) {
                $('#mytable').hide();
            }"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </td>
</tr>