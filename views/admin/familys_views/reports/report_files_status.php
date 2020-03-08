<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>

        <div class="panel-body">
            <?php

            $suspend = array(
                '1'=> 'مقبول',
                '2'=> 'مرفوض',
                '4'=> 'معتمد'
            );

            ?>
            <form id="files_status">

            <div class="col-sm-12 col-xs-12">

                <div class="form-group col-sm-4 col-xs-12 padd">
                    <label class="label label-green half"> حالات الملفات</label>
                    <select class="form-control half selectpicker no-margin" data-live-search="true" name="suspend_num" id="mother_national_num_fk" data-validation="required" onchange="">
                        <option value="">إختر</option>
                        <?php

                            foreach ($suspend as $key => $status) {
                                ?>
                                <option value="<?=$key?>">
                                    <?=$status?></option>
                                <?
                            }

                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padd">
                    <label class="label label-green half"> من تاريخ</label>
                    <input type="text" class="form-control date_melady half"  placeholder="شهر/يوم/سنة "  name="date_from" value="" id="date_suspend"   />
                </div>
                <div class="form-group col-sm-4 col-xs-12 padd">
                    <label class="label label-green half"> الي تاريخ</label>
                    <input type="text" class="form-control date_melady half" placeholder="شهر/يوم/سنة " name="date_to" value="" id="date_suspend"   />
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12 padd">
                <button type="button" class="btn btn-warning  button" onclick="get_status();"><i class="fa fa-search"></i> بحث </button>
                </div>
            </div>

            </form>
        </div>


    </div>
</div>


<div id="files_status_info">
    
</div>


<script>


    function get_status()
    {
   
        var postData = $('#files_status').serialize();



        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Family_report/report_files_status_search",
            data:postData,
            success:function(html){
                var arr1 = postData.split('&');
                //alert(arr1);
                for (i = 0; i < arr1.length; i++) {
                    var arr2 = arr1[i].split('=');

                    if(arr2[1] == ''){
                        alert('Please full up all field');
                        return;
                    }

                }

                    $('#files_status_info').html(html);


            }

        });

    }
</script>