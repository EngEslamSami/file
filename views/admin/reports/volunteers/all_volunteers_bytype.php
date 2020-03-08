<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-5 col-xs-12">
                <label class="label label-green  half">حالة المتطوع</label>
                <select name="type" class="form-control  half" id="type">
                    <?php
                    $arr =array('إختر','جاري','موافق عليها','تم رفضها');
                    for($d=0;$d<sizeof($arr);$d++){?>
                        <option value="<?php echo $d;?>"><?php echo $arr[$d];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-sm-2 col-xs-12">
                <button type="button" class="btn btn-warning  button" onclick="return lood();" ><i class="fa fa-search"></i>  </button>
            </div>
            <div id="optionearea1"></div>
        </div>

    </div>
</div>

<script>
    function lood(){
        var type=   $('#type').val();
        if( type != '' ){
            var dataString = 'type=' + type ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>All_reports/all_volunteers_bytype',
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
