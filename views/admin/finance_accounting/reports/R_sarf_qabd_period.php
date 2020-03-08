

<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>تقرير سندات خلال فترة</h4>
            </div>
        </div>

        <div class="panel-body">
    <?php echo form_open_multipart('admin/finance_accounting/add_receipt_report',array('id' => 'myform' ))?>

     <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green half"> تاريخ من</label>
        <input type="text" class="some_class_2 form-control half input-style" id="date_from" name="date_from" >
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green half"> تاريخ إلي</label>
        <input type="text" class="some_class_2 form-control half input-style" id="date_to" name="date_to" >
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green half"> نوع السند</label>
        <select name="sanad_type" id="sanad_type" class="form-control half input-style">
            <option value="">إختر نوع السند</option>
            <option value="1">سند صرف</option>
            <option value="2">سند قبض</option>
        </select>
    </div>
<input type="hidden"  class="btn btn-success" name="action" value="add_receipt_report" />
    <div class="col-xs-2">
        <button type="button" onclick="
            startDate = ($('#date_from').val());
                        endDate = ($('#date_to').val());
                        if (startDate > endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
                        return false;}
                        else{


      return results($('#date_from').val(),$('#date_to').val(),
      $('#sanad_type').val()

      )};"  class="btn btn-warning  button" id="submit" type="submit" value="Submit" ><i class="fa fa-search"></i>  </button>
    </div>

 
    <?php echo form_close()?>
    
    <div id="results"></div>
</div>
</div>
</div>

<script>
    function results(date_from,date_to,sanad_type){

        var dataString='date_from='+ date_from + '&date_to=' + date_to   +'&sanad_type=' + sanad_type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/finance_accounting/add_receipt_report',
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
