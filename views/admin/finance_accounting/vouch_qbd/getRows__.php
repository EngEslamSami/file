<tr id="<?=$_POST['length']?>">
    <td>
        <input type="number" class="form-control accountValue" step="any" name="value[]" data-validation="required" aria-required="true" onkeyup="getSum();">
    </td>
    <td>
        <input type="number" class="form-control" step="any" name="account_num[]" id="account_num<?=$_POST['length']?>" data-validation="required" aria-required="true" readonly="">
    </td>
    <td>
        <select name="account[]" id="account<?=$_POST['length']?>" class="form-control" data-live-search="true" data-validation="required" onchange="$('#account_num'+<?=$_POST['length']?>).val($(this).find('option:selected').attr('value'))"> >
            <option account-name="" value="">إختر</option>
            <?php
            if(isset($tree) && $tree != null) {
                buildTree($tree);
            }
            ?>
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="note[]" data-validation="required" aria-required="true">
    </td>
    <td>        
        <a href="#" onclick="$('#<?=$_POST['length']?>').remove();getSum();"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </td>
</tr>

<?php 
function buildTree($tree,$x = 0) { 
        foreach ($tree as $record) { 
        $space = '';
        for ($i=0; $i < $x; $i++) { 
            $space .= '&nbsp;&nbsp;';
        }
        if (isset($record->subs)) {
            $x++;
?>
            <optgroup label="<?=$space.$record->name?>">
        <?php
            buildTree($record->subs,$x);
        }
        else {
            if($record->hesab_no3 == 1) {
        ?>
            <optgroup label="<?=$space.$record->name?>"></optgroup>
        <?php
            }
            else {
        ?>
                <option value="<?=$record->code?>"><?=$space.$record->name?></option>
        <?php
            }
        }
    }  
}
?>