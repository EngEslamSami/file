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
		      	<label class="label label-green half"> إسم الأم</label>
		      	<select class="form-control half selectpicker no-margin" data-live-search="true" name="mother_national_num_fk" id="mother_national_num_fk" data-validation="required" onchange="">
                    <option value="">إختر</option>
                    <?php 
                    if (isset($mothers) && $mothers != null) {
                        foreach ($mothers as $value) {
                    ?>
                    <option value="<?=$value->mother_national_num_fk?>">
                        <?=$value->full_name?></option>
                    <?
                        }
                    }
                    ?>
                </select>
		    </div>

            <div class="form-group col-sm-2 col-xs-12 padd">
                <button type="button" name="report" class="btn btn-warning col-md-12" onclick="return ajaxSearch();"><i class="fa fa-search"></i> بحث</button>
            </div>
        </div>
    </div>
</div>

<div id="result"></div>

<script type="text/javascript">
    function ajaxSearch() {
        $('#result').html('');
        if ($('#mother_national_num_fk').val()) {
            var dataString = 'mother_national_id_fk=' + $('#mother_national_num_fk').val();
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family_report/getMotherData',
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