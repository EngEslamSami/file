<?php



if($_POST['valu']==0 ){ ?>

    <select name="mostafed_edara_id" id=""
            class="form-control bottom-input selectpicker"
            data-show-subtext="true" data-live-search="true"
            data-validation="required" aria-required="true">
        <option value="">إختر</option>
        <?php
        if (!empty($admin)):
            foreach ($admin as $record):
                ?>
                <option
                    value="<? echo $record->id; ?>" ><? echo $record->name; ?></option>
                <?php
            endforeach;
        endif;
        ?>
    </select>


<?php }elseif($_POST['valu']==1){ ?>


        <select name="mostafed_direction_id" id="destination" style="width: 80%;float: right"
                class="form-control bottom-input selectpicker"
                data-show-subtext="true" data-live-search="true"
                data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php
            if (!empty($ghat)):
                foreach ($ghat as $record):
                    ?>
                    <option
                        value="<? echo $record->id_setting; ?>" ><? echo $record->title_setting; ?></option>
                    <?php
                endforeach;
            endif;
            ?>
        </select>
   <button type="button"  id="button_append" class="btn btn-info btn-sm" title="إضافة جهه أخرى" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button>




    <?php
}
?>




<!------------------------------------------------------------------------------------------------------------>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog "  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافه جهه انتداب</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="col-xs-7 col-xs-offset-2">
                        <div class="form-group">
                            <h6>اسم الجهه:<span class=""></span></h6>
                            <input type="text" id="destin" name="dest" class="form-control" style="width: 80%;float: right">
                            <button type="button" id="save" onclick="add_option($('#destin').val());" class="btn btn-danger"  style="float: left" data-dismiss="modal">حفظ</button>

                        </div>
                        <div class="clearfix"></div>
                        <br>
                    </div>

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width:100%;">
                <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<!------------------------------------------------------------------------------------------------------------------------------>

<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>


<script>
    function add_option(valu)
    {

        var id='<?php echo $last_id +1;?>';

        var x=$('#destination').val();
        $('#destination').append('<option value='+id+' selected>'+valu+'</option>');
        $('.selectpicker').selectpicker('refresh');
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/add_option",
            data:{valu:valu},
            success:function(d) {
                document.getElementById("button_append").setAttribute("disabled", "disabled");
            }

        });
    }


</script>
