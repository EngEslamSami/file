<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">التصنيفات</h3>
                <div class="pull-left">

                </div>
            </div>
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> النوع:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <select name="father_status" onchange="get_sub($(this).val())" class="no-padding form-control" data-show-subtext="" data-live-search="true" required>
                            <option value="0">اختر</option>
                            <?php
                            foreach($main as $row){
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                            <?php } ?>

                        </select>

                    </div>
                </div>
            </div>

            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> التصنيفات:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <select name="father_status" class="no-padding form-control tree" data-show-subtext="" data-live-search="true" required>
                            <option value="0">اختر</option>

                        </select>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<script>
    function get_sub(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/donors/Donor/get_branch_tree",
            data:{valu:valu},
            success:function(d) {

           $('.tree').html(d);


            }






        });
    }

</script>