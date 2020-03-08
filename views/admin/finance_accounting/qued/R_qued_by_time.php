

<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?> </h3>
        </div>
        <div class="panel-body">
        
    <div class="col-md-3 col-lg-3 col-sm-3  col-xs-12">
        <div class="form-group">
            <label class="control-label"> من تاريخ : </label>
            <input type="date"  name="date_from" id="date_from" class="form-control text-right" required="" placeholder=" من تاريخ " />
        </div>
    </div>

    <div class="col-md-3  col-lg-3 col-sm-3  col-xs-12">
        <div class="form-group">
            <label class="control-label"> الى تاريخ : </label>
            <input type="date"  name="date_to" id="date_to" class="form-control text-right" required="" placeholder=" الى تاريخ  " />
        </div>
    </div>

    <div class="col-md-2  col-lg-2 col-sm-2  col-xs-12" >
    <br />
        <button type="button" onclick="results_search();" class="btn btn-success"> بحث </button>
    </div>
</div>


</div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="result" ></div>
<script>
    function results_search(){
       var  startDate = $("#date_from").val();
        var  endDate = $("#date_to").val();
         if(startDate != "" && endDate != "" &&  startDate!=0 &&  endDate != 0   ){
            if (startDate > endDate){
                alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
                return false;
            }else {
                var dataString = "date_from="+startDate +"&date_to="+endDate;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>admin/finance_accounting/ReprtQuedByTime',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $("#result").html(html);
                    }
                });
                return false;
            } //end else
        }// end main if 
    }
</script>