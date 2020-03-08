    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<div class="col-xs-12">

                <!---table------>
                <?php if(!empty($all_council_dates)):?>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  اختر التاريخ </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="session_date"  id="session_date" onchange="return sent($('#session_date').val());">
                                <option> - اختر - </option>

                                    <?php foreach ($all_council_dates as $record):?>
                                        <option value="<? echo $record->session_date; ?>"><?php echo date('m-d-Y',$record->session_date);?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <?php  endif;?>
              <div id="optionearea2">  </div>
    </div>  
    </div>  
    </div> 
               <script>
                function sent(valu)
                {
                    if(valu)
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
                        $('#optionearea2').html('');
                        return false;
                    }

                }
            </script>       