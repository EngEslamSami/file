<div class="col-md-11">
<?php if(isset($all_cach) && $all_cach!=null && !empty($all_cach) ){?>
    <form id="form_cach">
        <table id="no-more-tables" class="table table-bordered" role="table">
            <thead>
            <tr>
                <th class="">
                    <input type="checkbox" name=""  onclick="checkAll(this,'all_cach')">
                </th>
                <th class="">إسم اليتيم</th>
                <th class="">عدد البرامج المشترك بها </th>
                <th class="">الشهر  </th>
                <th class="">السنة </th>
                <th class="">الإجمالى  </th>
            </tr>
            </thead>
            <tbody>
            <?php  $count=1; foreach ($all_cach as $row){
                $total_value=$row->total;
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="select-all[]" value="<?php  echo $total_value."-".$row->id; ?>" class="all_cach"></td>
                    <td><?php echo $row->orphans_name;  ?></td>
                    <td><?php echo sizeof(unserialize($row->programs)) ; ?></td>
                    <td><?php echo $row->month; ?></td>
                    <td><?php echo $row->year; ?></td>
                    <td><?php echo $row->total; ?></td>
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
        <strong>لا يوجد !</strong> اشتراكات مصروفة  .
    </div>
<?php } ?>

</div>
<script>
    function deport(name_form,div_name){
        var name_div =  "#"+div_name;
        var form_name =  "#"+name_form;
        var dataString = $(form_name).serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Finance_resource/DeportPayment',
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