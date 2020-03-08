<style type="text/css">
    .padd {padding: 0 3px !important;}
    .no-padding {padding: 0;}
    .no-margin {margin: 0;}
    h4 {margin-top: 0;}
</style>

<?php 
$script = 'onchange=\'return getActivities($(this).val(), '.json_encode($programs).')\'';
$script2 = 'onchange=\'return getdates($(this).val(), '.json_encode($programs).')\'';?>

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
        </div>

        <div class="panel-body">
			<div class="form-group col-sm-12 col-xs-12 no-padding">
			    <div class="form-group col-sm-4 col-xs-12 padd">
			      	<label class="label label-green half"> إسم البرنامج</label>
			      	<select class="form-control half" name="programs" id="programs" <?=$script?> data-validation="required">
                        <option value="">إختر</option>
                        <?php 
                        if (isset($programs) && $programs != null) {
                            foreach ($programs as $value) {
                        ?>
                        <option value="<?=$value->id?>"><?=$value->name?></option>
                        <?
                            }
                        }
                        ?>
                    </select>
			    </div>

                <div class="form-group col-sm-4 col-xs-12 padd">
                    <label class="label label-green half"> إسم النشاط</label>
                    <select class="form-control half" name="activities" id="activities" <?=$script2?> data-validation="required">
                        <option value="">إختر</option>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12 padd">
                    <label class="label label-green half"> فترات النشاط</label>
                    <select name="prog_date" id="prog_date" class="form-control half" data-validation="required">
                        <option value="">إختر</option>
                    </select>
                </div>

                <div class="col-md-12 padd">
                    <button type="button" name="report" class="btn btn-warning col-md-12" onclick="return ajaxSearch();"><i class="fa fa-search"></i> بحث</button>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="result"></div>

<script type="text/javascript">
    function getActivities(val,prog) {
        var select = document.getElementById('activities');
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        for (var i = 0; i < prog.length; i++) {
            var obj = prog[i];
            if(obj.id == val){
                var activities = obj.Activities;
                for (var x = 0; x < activities.length; x++) {
                    select.options[select.options.length] = new Option(activities[x].name, activities[x].id);
                }
            }
        }
    }

    function getdates(val,prog) {
        var select = document.getElementById('prog_date');
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        for (var i = 0; i < prog.length; i++) {
            var obj = prog[i];
            if(obj.id == $('#programs').val()){
                var activities = obj.Activities;
                for (var x = 0; x < activities.length; x++) {
                    var obj2 = activities[x];
                    if(obj2.id == val){
                        var dates = obj2.start;
                        for (var z = 0; z < dates.length; z++) {
                            select.options[select.options.length] = new Option(dates[z].from_date+'--'+dates[z].to_date, dates[z].id);
                        }
                    }
                }
            }
        }
    }

    function removeOptions(selectbox)
    {
        for(var i = selectbox.options.length - 1 ; i >= 0 ; i--) {
            selectbox.remove(i);
        }
    }
    
    function ajaxSearch() {
        var id = $('#prog_date').val();
        if (id) {
            var dataString = 'id=' + id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/activites_orders/ActivitesOrders/get_programs',
                data:dataString,
                cache:false,
                success: function(result){
                    $('#result').html(result);
                }
            });
        }
    }
</script>