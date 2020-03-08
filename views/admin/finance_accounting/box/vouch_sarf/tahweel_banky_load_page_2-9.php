


<div class="col-md-12 no-padding" >

        <div class="col-md-3 col-sm-6 padding-4">
            <h6 class="red-color_"> البنك </h6>
                <select name="sheek_bank_id" id="bank_id_fk_eda3" class="form-control   bank_id_fk empty"
                        onchange="GetByArray(this.value,'getAccount','eda3');
                $('.eda3_bank_span').html(  $('#bank_id_fk_eda3 option:selected').text());

                                  " aria-required="true" >
                    <option value="">إختر</option>
                    <?php if(!empty($all_banks)){  foreach($all_banks as $bank){ ?>
                        <option value="<?php echo$bank->bank_id_fk; ?>"

                            <?php if(!empty($bank_id_fk)){ if($bank_id_fk ==$bank->bank_id_fk){
                                echo'selected';
                            }}?>
                        ><?=$bank->title?></option>
                    <?php } } ?>
                </select>
        </div>

        <div class="col-md-2 col-sm-6 padding-4">

                <h6 class="red-color_">وصف الحساب</h6>
                <select name="bank_account_id_fk" id="bank_account_id_eda3" class="form-control   branch_id_fk empty"
                        onchange="GetByArray(this.value,'getAccountNum','eda3')"     aria-required="true" >
                    <option value="">إختر الحساب</option>
                    <?php if(!empty($bank_accounts_arr)){  foreach($bank_accounts_arr as $row){ ?>
                        <option value="<?php echo$row->account_id_fk; ?>"

                            <?php if(!empty($bank_account_id_fk)){ if($bank_account_id_fk ==$row->account_id_fk){
                                echo'selected';
                            }}?>><?=$row->AccountName?></option>
                    <?php } } ?>

                </select>

        </div>

        <div class="col-md-4 col-sm-6 padding-4">



                <h6 class="red-color_"> رقم الحساب    </h6>



                <select name="bank_account_num" id="bank_account_num_eda3" onchange="GetByArray(this.value,'GetAccountCode','eda3');"  class="form-control   accoun_num_id_fk empty "
                        aria-required="true" >
                    <option value="">رقم الحساب</option>
                    <?php if(!empty($eda3_data)){  foreach($eda3_data as $row){ ?>
                        <option value="<?php echo$row->account_num; ?>"
                            <?php if(!empty($bank_account_num)){ if($bank_account_num ==$row->account_num){
                                echo'selected';
                            }}?>
                        ><?=$row->account_num?></option>
                    <?php } } ?>

                </select>



        </div>

        <div class="col-md-3 col-sm-6 padding-4">

                <h6 class="red-color_"> كود الحساب   </h6>

                <select name="sheek_rqm_hesab" id="bank_account_code_eda3"
                        class="form-control   empty"
                        aria-required="true" >
                    <option value="">إختر </option>

                    <?php if(!empty($eda3_data)){  foreach($eda3_data as $row){ ?>
                        <option value="<?php echo$row->rqm_hesab; ?>"

                            <?php if(!empty($bank_account_code)){ if($bank_account_code ==$row->rqm_hesab){
                                echo'selected';
                            } } ?>
                        ><?=$row->rqm_hesab?></option>
                    <?php } } ?>>

                </select>



        </div>

</div>