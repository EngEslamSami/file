<div class="col-sm-11 col-xs-12">
    <div class="details-resorce">

        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <!-- <div class="panel-heading"> -->
             <div class="panel-heading">

                <!-- </div> -->
                </div>
                <div class="panel-body">
                    <div class="tab-content">


                        <div class="tab-pane fade in active"  id="tab1default">
                            <?php if(isset($all_penalty) && $all_penalty!=null && !empty($all_penalty) ){?>
                                <form id="form_cach">
                                    <table id="no-more-tables" class="table table-bordered" role="table">
                                        <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox" name=""  onclick="checkAll(this,'all_penalty')">
                                            </th>
                                            <th class="">إسم الموظف</th>
                                            <th class="">قيمة الجزاء</th>
                                            <th class="">الشهر  </th>
                                            <th class="">السنة </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php     $count=1; foreach ($all_penalty as $row){
                                            $total_value=0;
                                            $all=0;
                                            foreach ($row->all_money as $value)
                                            {
                                                $total_value +=$value->value;
                                            }

                                           $all +=$total_value;
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="select-all[]" value="<?php echo $all."-".$row->id;  ?>" class="all_penalty"></td>
                                                <td><?php echo $row->emp_name['employee'];  ?></td>
                                                <td><?php echo $total_value;?></td>
                                                <td><?php echo date('m',$row->date_s); ?></td>
                                                <td><?php echo date('Y',$row->date_s); ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-11">
                                        <input type="hidden" name="ADD" value="1" />
                                        <button type="button" onclick="deport('form_cach','option_cach');" style="width:10% !important;" class="btn-success"> تحويل </button>
                                    </div>
                                </form>
                                <div class="" id="option_cach"></div>
                           <?php }else{?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>لا يوجد !</strong> جزاءات للترحيل .
                                </div>
                            <?php } ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<script>
    function deport(name_form,div_name){
        var name_div =  "#"+div_name;
        var form_name =  "#"+name_form;
        var dataString = $(form_name).serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Finance_resource/DeportPenaltyMoney',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $(name_div).html(html);
            }
        });
        return false;
    }
    //---------------------------------------------------------------------------------
    function checkAll(bx,class_name) {
        var cbs = document.getElementsByClassName(class_name);
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
</script>