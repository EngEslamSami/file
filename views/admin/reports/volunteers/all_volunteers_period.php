<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <h6 class="text-center inner-heading">  </h6>
            <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half">من تاريخ</label>
                <input type="text" class="form-control date_melady half" name="date_from"  id="date_from" placeholder="شهر/يوم/سنة " >
            </div>
            <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half">حتى تاريخ</label>
                <input type="text" class="form-control date_melady half" name="date_to"  id="date_to" placeholder="شهر/يوم/سنة " >
            </div>
            <div class="form-group col-sm-2 col-xs-12">
                <button type="button" class="btn btn-warning  button" onclick="return lood();"><i class="fa fa-search"></i>  </button>
            </div>


            <div id="optionearea1"></div>
        </div>
    </div>
</div>

<script>
    function lood(){
        var date_from=   $('#date_from').val();
        var date_to=   $('#date_to').val();
        if( date_from != '' && date_to != '' ){
            var dataString = 'date_from=' + date_from + '&date_to=' + date_to ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>All_reports/all_volunteers_period',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
        }

    }
</script>
