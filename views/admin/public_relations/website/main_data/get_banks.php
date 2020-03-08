

    <tr>
        <td>
        <select name="banks_id[]" id="main_bank_id_fk"
                class="form-control bottom-input call"
                onchange="get_banck_code($(this).val())" >
            <option value="">اسم البنك </option>
            <?php
            if(!empty($banks)){
                foreach ($banks as $bank){  $select=''; if(isset($result)){if($result["bank_id_fk"] == $bank->id){$select='selected'; }}?>
                    <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>"
                        <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                <?php }
            }
            ?>
        </select>
        </td>


        <td>

                <input type="text" class="form-control bottom-input call1"
                       name="banks[]" readonly="readonly"   id="om_bank_code"  placeholder="الرمز"/>
        </td>
        <td>

            <input type="text" class="form-control bottom-input tpe" maxlength="24"
                   name="banks_account[]" onfocusout="chek_length_load(this,$(this).val(),24)" id="banks_account"  placeholder="رقم الحساب"  data-validation="required" />
        </td>


        <td><a href="#" onclick="remove_load(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        <?php if($this->input->post('url') == 'update_main_data'){ ?>
            <td> <?php
                    $class ="danger";
                    $value =1;
                    $title ="غير نشط";
                ?>
                <a href='<?=base_url()."public_relations/website/main_data/Main_data/update_bank_status/".$item->bank_id_fk ?>' <?= $value?>>
                    <button type="button" class="btn btn-sm btn-<?=$class?>"><?=$title?></button>
                </a></td>
        <?php }else {
            echo "";
        } ?>

</tr>


    <script>
        function get_banck_code(valu)
        {
//            var valu=valu.split("-");
//            $('#om_bank_code').val(valu[1]);
            var cbs = document.getElementsByClassName('call');
            var cbs1 = document.getElementsByClassName('call1');
            for(var i=0; i < cbs.length; i++) {

                valu  = cbs[i].value ;
               valu=valu.split("-");
                cbs1[i].value =valu[1];

            }
        }
        function remove_load(name) {
            $(name).parents('tr').remove();
        }

    </script>
    <script>

        function chek_length_load(th,value,lenth)
        {

            if(value.length >= lenth){

                document.getElementById("add").removeAttribute("disabled", "disabled");
                var inchek_out= value.substring(0,lenth);
                th.value = inchek_out;
            }
            else if(value.length < lenth){

            alert('عدد الارقام يجب ان يكون اكبر من '+lenth);

                  document.getElementById("add").setAttribute("disabled", "disabled");

            }
        }

    </script>


