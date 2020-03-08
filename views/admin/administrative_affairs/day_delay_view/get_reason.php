
<style>
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: 50% !important;
    }
</style>
<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"></h3>
    </div>
    <div class="panel-body">
        <!--add-->


            <h6 class="text-center inner-heading">  </h6>

            <div class="form-group col-sm-5 col-xs-12">
                <label class="label label-green  half">اختر الموظف</label>
                <select name="emp_id"  id="emp_id" class="half selectpicker"  data-live-search="true" >
                    <option> - اختر - </option>
                    <?php foreach ($employees as $record):
                        $select ='';
                        if(isset($emp_data['id']) && $emp_data['id'] !=''){
                            if($emp_data['id'] ==$record->id){
                                $select ='selected';
                            }
                        }
                        ?>
                        <option value="<? echo $record->id; ?>" <?php echo $select;?>><?php echo $record->employee;?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-sm-2 col-xs-12">
                <button type="button" class="btn btn-warning  button" onclick="return sent($('#emp_id').val());"><i class="fa fa-search"></i>  </button>
            </div>

        </div>
    <div id="area">

    </div>
    </div>


<script>
    function sent(id)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Administrative_affairs/get_day_delay",
            data:{id:id},
            success:function(d){

$('#area').html(d);


            }

        });
    }
    </script
