
        <?php if($_POST['valu'] == '0'){ ?>

            <input type="text" class="form-control bottom-input" name="person_name" id="person_name" data-validation="required">


           <?php }else{ ?>
                <select name="emp_id_fk" id="emp_id_fk"   data-validation="required"
                onchange="get_side_bar($(this).val())"   class="form-control bottom-input" aria-required="true">
                <option value="">اختر</option>
                <?php
                if(isset($emps)&&!empty($emps)){
                    foreach ($emps as $row){?>
                        <option value="<?php echo $row->id;?>"><?php echo $row->employee;?> </option>

                <?php }  }  ?>
                </select>

          <?php } ?>
