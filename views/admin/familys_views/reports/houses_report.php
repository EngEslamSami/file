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
            <div class="form-group col-sm-4 col-xs-12 padd">
                <label class="label label-green half"> إسم الدار</label>
                <select class="form-control half selectpicker no-margin" data-live-search="true" name="house_id" id="house_id" >
                    <option value="">إختر</option>
                    <?php
                    if (isset($women_houses) && $women_houses != null) {
                        foreach ($women_houses as $value) { ?>
                            <option value="<?php  echo $value->id_setting;?>" ><?php  echo $value->title_setting;?></option>
                        <?php } } ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padd">
                <label class="label label-green half"> الحالة</label>
                <select class="form-control half selectpicker no-margin" data-live-search="true" name="type" id="type" >
                    <option value="">إختر</option>
                    <option value="all">الكل</option>
                    <?php foreach($person_type as $k=>$v) {?>
                        <option value="<?=$k?>">
                            <?=$v?></option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group col-sm-2 col-xs-12 padd">
                <button type="button" name="report" class="btn btn-warning " onclick="return ajaxSearch();"><i class="fa fa-search"></i> </button>
            </div>
            <div  class="col-xs-12" id="result"></div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function ajaxSearch() {
        $('#result').html('');
        var house_id =$('#house_id').val();
        var type =$('#type').val();

        if (house_id && type) {
            var dataString = 'house_id=' + house_id +'&type=' + type;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family_report/houses_report',
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