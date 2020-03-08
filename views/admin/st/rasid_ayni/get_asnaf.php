
<tr id="<?=$_POST['length']?>">
    <td><?=$_POST['length']?></td>


    <td>
        <input type="hidden" name="modalID" id="modalID">
        <input type="text" class="form-control testButton inputclass" name="sanf_code[]"
               id="sanf_code<?= $_POST['length'] ?>"
               readonly=""
               onclick="$('#modalID').val(<?= $_POST['length'] ?>); $(this).removeAttr('readonly');"
               ondblclick="$(this).attr('readonly','readonly'); $('#asnafModal').modal('show');"
               style="cursor:pointer;" autocomplete="off"
               onkeypress="return isNumberKey(event);"
               onblur="$(this).attr('readonly','readonly')"
               value="">

    </td>
    <td>
        <input type="text" class="form-control inputclass" name="sanf_coade_br[]"
               data-validation="required"
               aria-required="true" readonly=""
               id="sanf_coade_br<?= $_POST['length'] ?>"
               style="width: 100% !important;"
               value=""
        >
    </td>
    <td>
        <input type="text" class="form-control inputclass" name="sanf_name[]"
               data-validation="required"
               aria-required="true" readonly=""
               id="sanf_name<?= $_POST['length'] ?>"
               style="width: 100% !important;"
               value=""
        >
    </td>
    <td>
        <input type="text" class="form-control inputclass" name="sanf_whda[]"
               data-validation="required"
               aria-required="true" readonly=""
               id="sanf_whda<?= $_POST['length'] ?>"
               style="width: 100% !important;"
               value=""
        >
    </td>
    <td>
        <input type="text" class="form-control inputclass" name="sanf_one_price[]"
               data-validation="required"
               aria-required="true" readonly=""
               id="sanf_one_price<?= $_POST['length'] ?>"
               style="width: 100% !important;"
               value=""

        >
    </td>
    <td>
        <input type="text" name="sanf_rased[]"  value="" id="sanf_rased<?= $_POST['length'] ?>"
               class="form-control "
               >
    </td>
    <td>
        <input type="text" name="sanf_amount[]" id="sanf_amount<?= $_POST['length'] ?>"  value=""
               class="form-control "
               onkeypress="validate_number(event);"
               onkeyup="get_egmali(<?= $_POST['length'] ?>)">

    </td>
    <td>
        <input type="text" name="all_egmali[]" id="all_egmali<?= $_POST['length'] ?>"  value=""
               class="form-control calc"
              readonly>
    </td>
    <td>
        <input type="date" name="sanf_salahia_date[]" id="sanf_salahia_date<?= $_POST['length'] ?>"  value=""
               class="form-control "
               disabled>
    </td>

    <td>
        <input type="text" name="lot[]" id="lot<?= $_POST['length'] ?>"  value=""
               class="form-control "
               >
    </td>

    <td>
        <input type="text" name="rased_hali[]" id="rased_hali<?= $_POST['length'] ?>"  value=""
               class="form-control "
               onkeypress="validate_number(event);"
              >
    </td>

    <td>
        <a href="#" onclick="deleteRow(<?=$_POST['length']?>)">
            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>


    </td>
</tr>

<script>
    function deleteRow(id){
        $("#" + id).remove();
        get_egmali();
    }
</script>
