<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <?php
            if (isset($get_taswia) && !empty($get_taswia)){
                echo form_open_multipart('finance_accounting/taswia/Taswia/update_taswia/'.$get_taswia->id,array('id'=>'myform'));

                $bank_id = $get_taswia->bank_id;
                $bank_name = $get_taswia->bank_name;
                $hesab_id = $get_taswia->hesab_id;
                $hesab_name = $get_taswia->hesab_name;
                $taswia_date = $get_taswia->taswia_date_ar;
                $prog_total_rased = $get_taswia->prog_total_rased;
                $rased_gam3ia = $get_taswia->rased_gam3ia;
                $sheek_makasa = $get_taswia->sheek_makasa;
                $farq_mowazna = $get_taswia->farq_mowazna;
                $sheek_sahb = $get_taswia->sheek_sahb;
                $sheek_solmat = $get_taswia->sheek_solmat;

            } else{

                $bank_id = '';
                $hesab_id = '';
                $hesab_name = '';
                $taswia_date = date('Y-m-d');
                $prog_total_rased = '';
                $rased_gam3ia ='';
                $sheek_makasa = '';
                $farq_mowazna = '';
                $sheek_sahb = '';
                $sheek_solmat = '';

            }
            ?>
            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label">اسم البنك </label>
                <select name="bank_id" class="form-control" id="chooseBank" onchange='getAccounts(<?=json_encode($banks)?>, $(this).val());get_rased();change_name(); chooseBank(this);'>
                    <option value="">اختر</option>
                    <?php
                    if (isset($banks) && $banks != null) {
                        foreach ($banks as $value) {

                            ?>
                            <option value="<?=$value->id?>"
                                <?php
                                if ($bank_id==$value->id){
                                    echo 'selected' ;
                                }

                                ?>
                            ><?=$value->title?></option>
                            <?php
                        }
                    }
                    ?>
                </select>


            </div>

            <div class="form-group col-md-3 col-sm-5 col-xs-12 padding-4">
                <label class="label">اسم الحساب </label>
                <select name="hesab_id" id="code_account_id" class="form-control" onchange="get_rased();change_name();" data-validation="required">
                    <option value="">اختر</option>
                    <option value="<?= $hesab_id ?>" selected><?= $hesab_name ?></option>

                </select>


            </div>
            <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                <label class="label"> الفتره </label>
                <input type="date" name="taswia_date" id="bank_date" onchange="get_rased();" value="<?= $taswia_date?>" class="form-control">


            </div>
            <div class="form-group col-md-2 col-sm-5 col-xs-12 padding-4">
                <label class="label"> رصيد الحساب </label>
                <input type="text"  name="prog_total_rased" id="prog_total_rased"  value="<?= $prog_total_rased ?>" class="form-control" readonly>

            </div>
<!--            <div class="col-md-2 form-group ">-->
<!--                <button type="button" onclick="search_result()" style="margin-top:27px;"  class="btn btn-labeled btn-success "  >-->
<!--                    <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث-->
<!--                </button>-->
<!--            </div>-->

            <div class="clearfix"></div><br>

            <div class="col-xs-12" id="">

                <table id="" class="table double-border  table-bordered table-striped table-hover">
                    <thead>
                    <tr class="">

                        <th style="text-align: center !important;"> البيـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــان


                        </th>
                        <th colspan="6" style="text-align: center !important;"> هـ   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      ريال

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td id="gam3ia_text">
                            رصيد الجمعية حسب كشف  <?php
                           // if ( !empty($get_all->bank_name)){
                                echo 'ب'. $bank_name;
                           // }
                         //  if ( !empty($get_all->hesab_name)){
                                echo '-'.' '.$hesab_name ;
                           // }
                            ?>

                        </td>
                        <td>
                            <input type="text" name="rased_gam3ia"  class="form-control hidden-print" id="final_rased" value="<?= $rased_gam3ia ?>" onkeyup="get_total();">

                        </td>


                    </tr>
                    <tr>
                        <td>يضاف شيكات مقاصة لحساب الجمعية ولم تظهر بكشف البنك حتى تاريخه
                        </td>
                        <td>
                            <input type="text" name="sheek_makasa" class="form-control hidden-print" value="<?= $sheek_makasa ?>" id="add1" onkeyup="get_total();">

                        </td>
                    </tr>
                    <tr>
                        <td>يضاف فرق موازنة نقاط بيع لم تظهر بكشف حساب البنك
                        </td>
                        <td>

                            <input type="text" name="farq_mowazna" class="form-control hidden-print" value="<?= $farq_mowazna ?>" id="add2" onkeyup="get_total();">

                        </td>
                    </tr>
                    <tr>
                        <td>يخصم شيكات سحبها الغير لصالح الجمعية واضافها البنك ولم تقيد
                        </td>
                        <td>

                            <input type="text" name="sheek_sahb" class="form-control hidden-print" value="<?= $sheek_sahb ?>" id="sub1" onkeyup="get_total();">

                        </td>
                    </tr>
                    <tr>
                        <td>يخصم شيكات سلمت ولم تصرف وسجلت بالجمعية
                        </td>
                        <td>

                            <input type="text" name="sheek_solmat" class="form-control hidden-print" value="<?= $sheek_solmat?>" id="sub2" onkeyup="get_total();">


                        </td>

                    </tr>
                    <tr>
                        <td>الرصيد وهو مطابق لرصيد حساب البنك بدفاتر الجمعية
                        </td>
                        <td>
                            <input type="text" class="form-control hidden-print" readonly id="total" value="<?= $prog_total_rased ?>">
                            <div class="pull-right ">

                                <input type="hidden"  name="add" value="add"  >
                                <button type="button" onclick="check_total()"  class="btn btn-labeled btn-warning " name="add" value="add" id="add"   style="margin-left: 2px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                </button>


                            </div>
                        </td>
                    </tr>


                    </tbody>
                </table>


            </div>
            <?php
            echo form_close();
            ?>

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
       // var text = 'رصيد الجمعية حسب كشف ب' ;
      //  $('#gam3ia_text').text(text+);

    }

    function removeOptions(selectbox) {
        for(var i = selectbox.options.length - 1 ; i >= 0 ; i--) {
            selectbox.remove(i);
        }
    }
</script>
<script>
    function get_rased() {
        var  bank_id = $('#chooseBank').val();
        var  account_id = $('#code_account_id').val();
        var  bank_date = $('#bank_date').val();

        if (bank_id !='' && account_id !=''){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>finance_accounting/taswia/Taswia/get_rased",
                data: { bank_id:bank_id,account_id:account_id,bank_date:bank_date},
                dataType: 'html',
                cache:false,

                success: function (val) {

                    $('#prog_total_rased').val(val);
                    $('#total').val(val);
                    $('#final_rased').val(0);
                    $('#add1').val(0);
                    $('#add2').val(0);
                    $('#sub1').val(0);
                    $('#sub2').val(0);
                }
            });

        } else{
            $('#prog_total_rased').val('');
            $('#total').val('');
        }


    }
</script>
<script>
    function check_total() {
        var prog_total_rased = $('#prog_total_rased').val();
        var total = $('#total').val();
        if (prog_total_rased != total ) {


            swal({
                title: "من فضلك الرصيد غير مطابق لرصيد الحساب ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        } else {
            //  $('#add').removeAttr("disabled");
            $('#myform').submit();
        }


    }
</script>
<script>
    function get_total() {

        var add1 = parseFloat($('#add1').val());
        var add2 = parseFloat($('#add2').val());
        var sub1 = parseFloat($('#sub1').val());
        var sub2 = parseFloat($('#sub2').val());

        var final_rased = parseFloat($('#final_rased').val());

        //  alert(final_rased) ;
        if (isNaN(add1)) {
            add1 = 0;
        }
        if (isNaN(add2)) {
            add2 = 0;
        }
        if (isNaN(sub1)) {
            sub1 = 0;
        }
        if (isNaN(sub2)) {
            sub2 = 0;
        }
        if (isNaN(final_rased)) {
            final_rased = 0;
        }


        var total = final_rased + add1 + add2 - ( sub1 + sub2 )  ;

        total = parseFloat(total);

        $('#total').val(total) ;



    }
</script>
<script>
    function change_name() {
        var  bank_id = $('#chooseBank').val();
        var  account_id = $('#code_account_id').val();
        var  bank_date = $('#bank_date').val();

       if (bank_id !='' && account_id !=''){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>finance_accounting/taswia/Taswia/get_bank_name",
                data: { bank_id:bank_id,account_id:account_id},
                dataType: 'html',
                cache:false,

                success: function (data) {
                    var obj = JSON.parse(data);
                     var bank_name = obj.bank_name;
                     var account_name = obj.account_name;
                    var text = 'رصيد الجمعية حسب كشف ب' + bank_name + ' - ' + account_name ;
                     $('#gam3ia_text').text(text);

                }
            });

        }
        else{
           $('#gam3ia_text').text('رصيد الجمعية حسب كشف');
        }

    }
</script>