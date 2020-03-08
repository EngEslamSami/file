<div class="col-sm-11 col-xs-12">
<?php  echo form_open_multipart('admin/finance_accounting/R_accounts_group_details_period',array('class'=>"form-horizontal",'role'=>"form", 'id' => 'myform' ))?>

<div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ من </label>
                <input type="date" id="date_from"  name="date_from"    class="form-control text-right" placeholder=" تاريخ من" />
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ إلي </label>
                <input type="date" id="date_to"  name="date_to"    class="form-control text-right" placeholder=" تاريخ الي" />
            </div>
        </div>


    <div class="col-md-3">
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
            </div>


</div>

  

    <?php echo form_close()?>
    <div id="results"></div>
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
