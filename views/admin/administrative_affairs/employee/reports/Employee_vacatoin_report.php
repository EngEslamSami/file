<style type="text/css">
    .padd {padding: 0 3px !important;}
    .no-padding {padding: 0;}
    .no-margin {margin: 0;}
    h4 {margin-top: 0;}
</style>

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
        </div>

        <div class="panel-body">
            <br>
		    <div class="form-group col-sm-6 col-xs-12 padd">
		      	<label class="label label-green half"> إسم الموظف</label>
		      	<select class="form-control half selectpicker no-margin" data-live-search="true" name="employee_id" id="employee_id" data-validation="required" onchange="">
                    <option value="">إختر</option>
                    <?php 
                    if (isset($employees) && $employees != null) {
                        foreach ($employees as $employee) {
                    ?>
                    <option value="<?=$employee->id?>">
                        <?=$employee->employee?></option>
                    <?
                        }
                    }
                    ?>
                </select>
		    </div>

            <div class="form-group col-sm-2 col-xs-12 padd">
                <button type="button" name="report" class="btn btn-warning col-md-12" onclick="return ajaxSearch();"><i class="fa fa-search"></i> بحث</button>
            </div>

            <div id="result" ></div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function ajaxSearch() {
        $('#result').html('');
        if ($('#employee_id').val()) {
            var dataString = 'employee_id=' + $('#employee_id').val();

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/getEmployeeVacations',
                data:dataString,
                cache:false,
                dataType:'html',
                success: function(html){
                 
                    $('#result').html(html);
                }
            });
        }
    }
</script>