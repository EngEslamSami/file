
<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?></h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($all_council_dates)):?>
            <h6 class="text-center inner-heading">  </h6>
            <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half">اختر التاريخ</label>
                <select name="session_date"  id="session_date" class="half" >
                    <option> - اختر - </option>
                    <?php foreach ($all_council_dates as $record):?>
                        <option value="<? echo $record->id; ?>"><?php echo $record->session_date_ar ;?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-sm-2 col-xs-12">
                <button type="button" class="btn btn-warning  button" onclick="return sent($('#session_date').val());"><i class="fa fa-search"></i>  </button>
            </div>

            <?php  endif;?>
            <div id="optionearea2"></div>
        </div>
    </div>
</div>

   <script>
    function sent(valu)
    {
        if(valu !='' && valu !=0)
        {
            var dataString = 'valu=' + valu;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>Directors/Directors/reports',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            alert('من فضلك إختر تاريخ صحيح !!');
            $('#optionearea2').html('');
            return false;
        }

    }
</script>