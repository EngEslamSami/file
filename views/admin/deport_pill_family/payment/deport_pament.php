<div class="col-sm-12" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">

            <!-- Nav tabs -->
            <?php if(isset($pay_1) && !empty($pay_1) && $pay_1 !=null){?>
                <table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><input type="checkbox"   onclick="checkAll(this,'pay_1')"></th>
                        <th>إسم اليتيم</th>
                        <th>إسم البرنامج</th>
                        <th>	الشهر</th>
                        <th>السنة</th>
                        <th>الإجمالى</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1; foreach ($pay_1 as $row){?>
                        <tr>
                            <td><?=$x++;?></td>
                            <td><input type="checkbox" name="pill[]" value="<?php echo $row->id."-".$row->total ?>" class="pay_1"> </td>
                            <td><?php echo $row->orphans_name;?></td>
                            <td><?=$row->program_name?></td>
                            <td><?=$row->month?></td>
                            <td><?=$row->year?></td>
                            <td><?=$row->total?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            <?php }else{
                echo '<div class="alert alert-warning">
                                      <strong> لايوحد قيود للترحيل!</strong> .
                                     </div>';
            }?>


            <input type="hidden" name="ADD" value="1" class="pay_1" />
            <input type="hidden" name="paid_type" value="1" class="pay_1" />
            <button type="button" onclick="deport('pay_1');" data-toggle="modal" data-target="#modal-lg" class="add btn btn-purple w-md m-b-5">  ترحيل  </button>

            <!-- Tab panels -->

        </div>
    </div>
</div>



<div class="modal fade modal-primary" id="modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">ترحيل السندات </h1>
            </div>
            <?php echo  form_open_multipart('DeportPillForFamily/DeportQuedPayment') ?>
            <div class="modal-body col-sm-12" >

                <div id="option">

                    <div class="alert alert-danger">
                        <strong>يجب إختيار سند واحد على الاقل!</strong> .
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق </button>
                <button  type="submit" id="submit_button"   name="DEPORT" value="DEPORT" class="btn btn-success disabled">ترحيل </button>
            </div>
            <?php echo form_close();?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

    function deport(name_form){
        var form_name =  "."+name_form;
        var dataString = $(form_name).serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>DeportPillForFamily/DeportPayment',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option").html(html);
            }
        });
        return false;
    }
    //===================================================
    function checkAll(bx,class_name) {
        var cbs = document.getElementsByClassName(class_name);
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
    //====================================================
    function get_account(){
        var madeen_num =  $("#madeen_num").val();
        var dayen_num = $("#dayen_num").val();
        var v_value = $("#value").val();

        if (madeen_num != 0 && madeen_num !="" && dayen_num != 0 && dayen_num !="" ){

            var dataString = "dayen_num="+dayen_num+"&madeen_num="+madeen_num +"&value="+v_value;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>DeportPillForFamily/DeportPayment',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#option_1").html(html);
                }
            });
            return false;
        }else{
            return false;
        }

    }
    //====================================================
</script>

