<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label">اسم البنك </label>
                <select name="bank_id" class="form-control" id="chooseBank" onchange='getAccounts(<?=json_encode($banks)?>, $(this).val()); chooseBank(this);'>
                    <option value="">اختر</option>
                    <?php
                    if (isset($banks) && $banks != null) {
                        foreach ($banks as $value) {

                            ?>
                            <option value="<?=$value->id?>"><?=$value->title?></option>
                            <?php
                        }
                    }
                    ?>
                </select>


            </div>

            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label">اسم الحساب </label>
                <select name="code_account_id" id="code_account_id" class="form-control" data-validation="required">
                    <option value="">اختر</option>

                </select>


            </div>
            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label"> في تاريخ </label>
                <input type="date" name="bank_date" id="bank_date" value="<?= date('Y-m-d')?>" class="form-control">


            </div>
            <div class="col-md-3 form-group ">
                <button type="button" onclick="search_result()" style="margin-top:27px;"  class="btn btn-labeled btn-success "  >
                    <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                </button>
            </div>

            <div class="clearfix"></div><br>

            <div class="col-xs-12" id="result_output">

            </div>

        </div>
    </div>

</div>

<script>
    function getAccounts(banks,id) {
        var select = document.getElementById('code_account_id');
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        for (var x = 0; x < banks.length; x++) {
            var opt = document.createElement('option');
            if(banks[x].id == id){
                var accounts = banks[x].accounts;
                for (var z = 0; z < accounts.length; z++) {
                    $("#code_account_id").append($("<option></option>")
                        .attr("value",accounts[z].account_id_fk)
                        .text(accounts[z].title));
                }
                break;
            }
        }
    }

    function removeOptions(selectbox) {
        for(var i = selectbox.options.length - 1 ; i >= 0 ; i--) {
            selectbox.remove(i);
        }
    }
</script>

<script>
    function search_result() {
        var  bank_id = $('#chooseBank').val();
        var  account_id = $('#code_account_id').val();
        var  bank_date = $('#bank_date').val();
      //  alert(bank_date);
        if (bank_id !='' && account_id !=''){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>finance_accounting/taswia/Taswia/search_result",
                data: { bank_id:bank_id,account_id:account_id,bank_date:bank_date},
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    $('#result_output').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {

                    $('#result_output').html(html);
                }
            });

        }  else {
            swal({
                title: "من فضلك تأكد من  الاختيارات المتاحه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }






    }
</script>