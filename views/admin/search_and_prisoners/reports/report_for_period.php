
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
</div>

<div class="panel-body">
    <div class="col-sm-12">
        <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green  half">منذ فترة</label>
            <input type="text" class="form-control   half docs-date" name="date_from"  id="date_from" placeholder="شهر/يوم/سنة " required>
        </div>
        <div class="form-group col-sm-4 col-xs-12">
            <label class="label label-green  half">إلي فترة </label>
            <input type="text" class="form-control  half docs-date" name="date_to"  id="date_to" placeholder="شهر/يوم/سنة " required>
        </div>
        <div class="form-group col-sm-4 col-xs-12">
            <button type="button" onClick="search()" class="btn btn-warning  button" id="submit" type="submit" value="Submit" ><i class="fa fa-search"></i>  </button>
        </div>
    </div>
    <!------------------------------------>
    <div id="optionearea1"></div>
</div>
</div>
</div>

<script>
    function search(){
        var num1=   $('#date_from').val();
        var num2=   $('#date_to').val();
        if( num1 != '' && num2 != '' ){
            var dataString = 'form_date=' + num1 + '&to_date=' + num2 ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Search_and_prisoners/matab3a_fatra',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
    }
</script>
