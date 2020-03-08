

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">


    <?php echo form_open_multipart('all_secretary/Secretary/search_details')?>
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">
<div class="col-xs-12">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data r-live">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  نوع الصادر /الوارد   </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select class="selectpicker" data-show-subtext="true" name="search_type" id="search_type" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="0"> - اختر - </option>
                                    <option  value="3" > الصادر /الوارد </option>
                                    <option  value="1"> الصادر </option>
                                    <option  value="2"> الوارد </option>
                                  

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data r-live">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  الجهة    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select class="selectpicker" data-show-subtext="true" name="search_organizations" id="search_organizations" data-live-search="true" data-validation="required" aria-required="true">
                                    <option  value="0">-اختر-</option>

                                    <?php foreach ($organizations as $record): ?>
                                        <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                                    <?php endforeach; ?>
                                   
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data r-live">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  درجة الأهمية    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select class="selectpicker" data-show-subtext="true" name="importance_type" id="importance_type" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="0"> - اختر - </option>
                                    <option> سري </option>
                                    <option> سري للغاية </option>
                                    <option> عاجل </option>
                                    <option> اخري </option>
                               
                                </select>
                            </div>
                        </div>
                    </div>
                </div>   
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">   
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data r-live">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  نوع المعاملة    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select class="selectpicker" data-show-subtext="true" name="transactions_type" id="transactions_type" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="0"> - اختر - </option>

                                    <?php foreach ($transactions as $record): ?>
                                        <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data r-live">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  طريقة الاستلام/التسليم    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select class="selectpicker" data-show-subtext="true" name="method_recived_type" id="method_recived_type" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="0"> - اختر - </option>
                                    <option> باليد </option>
                                    <option> البريد الاكتروني </option>
                                    <option> اخري </option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> ابدأ من:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text"  class="form-control date_melady" id="date_from" name="date_from" placeholder="شهر / يوم / سنة " data-validation="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الى :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control date_melady" id="date_to" name="date_to" placeholder="شهر / يوم / سنة " data-validation="required">
                                </div>
                            </div>
                        </div>
                    </div>

</div>

                    <div class="col-xs-4 " style="margin-right: 400px"><input type="submit"  onclick="
                                startDate = ($('#date_from').val());
                                endDate = ($('#date_to').val());
                                return results(
                                $('#date_from').val(),$('#date_to').val(),
                                $('#search_type').val(),
                                $('#search_organizations').val(),
                                $('#importance_type').val(),
                                $('#transactions_type').val(),
                                $('#method_recived_type').val())" name="add" value="عرض" class="btn btn-primary"  />
                    </div>

              
            </div>

        </div>

        <?php echo form_close()?>


    </div>

    <div id="results" class="col-xs-12"></div>


</div>


<script>
    function results(date_from,date_to,search_type,search_organizations,importance_type,transactions_type,method_recived_type){
        if(date_from==""||date_to==""||search_type==""||search_organizations==""||importance_type==""||transactions_type==""||method_recived_type==""){
            alert("من فضلك ! املا كافه الحقول");
            location.reload();
            return;

        }

        var dataString='date_from='+ date_from + '&date_to=' + date_to   
                         +'&search_type=' + search_type  +'&search_organizations=' + search_organizations
                         +'&importance_type=' + importance_type +'&transactions_type=' + transactions_type
                         +'&method_recived_type=' + method_recived_type;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/Secretary/search_details',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#results').html(html);
            }
        });
        return false;
    }
</script>
