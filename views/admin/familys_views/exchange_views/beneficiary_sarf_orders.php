<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <div class="col-sm-12 col-xs-12"><br>
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half">المستفيد</label>
                    <select class="form-control half selectpicker" id="beneficiary_id" data-show-subtext="true" data-live-search="true"  >
                        <option value="">إختر</option>
                        <?php if(!empty($all_beneficiary)){ foreach ($all_beneficiary as $record){?>
                        <option value="<?php echo $record->file_num; ?>"><?php echo$record->name; ?></option>
                        <?php } }?>
                    </select>
                </div>
                <div class="form-group col-sm-2 col-xs-12">
                    <button type="button" class="btn btn-warning  button" id="button" type="button"  onclick="ajaxSearch()" value="search" ><i class="fa fa-search"></i>  </button>
                </div>
                <div id="result"></div>
            </div>
        </div>

    </div>
</div>



<script type="text/javascript">
    function ajaxSearch() {
        $('#result').html('');
        if ($('#beneficiary_id').val() != '') {
            var dataString = 'beneficiary_id=' + $('#beneficiary_id').val();
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Exchange/Beneficiary_sarf_orders',
                data:dataString,
                cache:false,
                dataType:'html',
                success: function(html){
                    $('#result').html(html);
                }
            });
        }else{
            alert(" الرجاء التأكد من إختيار المستفيد  !!");
        }
    }
</script>

