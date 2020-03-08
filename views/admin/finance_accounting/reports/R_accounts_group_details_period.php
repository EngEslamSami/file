<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>تقرير كل الحسابات تفصيلي خلال فترة</h4>
            </div>
        </div>

        <div class="panel-body">
<?php  echo form_open_multipart('admin/finance_accounting/R_accounts_group_details_period')?>

<div class="form-group col-sm-5 col-xs-12">
        <label class="label label-green half"> تاريخ من</label>
        <input type="text" class="some_class_2 form-control half input-style" id="date_from" name="date_from" >
    </div>

    <div class="form-group col-sm-5 col-xs-12">
        <label class="label label-green half"> تاريخ إلي</label>
        <input type="text" class="some_class_2 form-control half input-style" id="date_to" name="date_to" >
    </div>

<div class="col-xs-2">
        <button type="button" onclick="
            startDate = ($('#date_from').val());
                        endDate = ($('#date_to').val());
                        if (startDate > endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
                        return false;}
                        else{


      return results($('#date_from').val(),$('#date_to').val()

      )};"  class="btn btn-warning  button" id="submit" type="submit" value="Submit" ><i class="fa fa-search"></i>  </button>
    </div>


    <!--div class="col-md-3">
        <div class="form-group">
            <label for="inputUser" class="control-label">البحث</label>


          
            <input type="hidden"  class="btn btn-success" name="action" value="add_receipt_report" />
            <input type="submit"  onclick="
            startDate = ($('#date_from').val());
                        endDate = ($('#date_to').val());
                        if (startDate > endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
                        return false;}
                        else{


      return results($('#date_from').val(),$('#date_to').val()

      )};" name="add" value="عرض" class="btn btn-primary"  >




            </div>
            </div-->
<div id="results"></div>
</div>
</div>
</div>



  

    <?php echo form_close()?>
    
</div>

<script>
    function results(date_from,date_to){
        $('#results').html('');
        var dataString='date_from='+ date_from + '&date_to=' + date_to;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/finance_accounting/R_accounts_group_details_period',
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
