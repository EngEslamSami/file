<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');
?>
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        
            <div class="panel-body" style="margin-bottom: 0;">

                <div class="col-xs-12 no-padding" id="">
                    <div class="panel-body">
                        <?php if( isset($all_pills)&&!empty($all_pills)){?>
                            <table id="js_table_customer"   class="  table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">

                                <thead>
                                <tr class="rmadytd">
                                    <th style="text-align: center !important;">م</th>
                                    <th style="text-align: center !important;">رقم الإيصال</th>
                                    <th style="text-align: center !important;">التاريخ</th>
                                    <th style="text-align: center !important;">نوع الإيصال</th>
                                    <th style="text-align: center !important;">طريقة التوريد</th>
                                    <th style="text-align: center !important;">المبلغ </th>
                                    <th style="text-align: center !important;">الإسم </th>
                                    <th style="text-align: center !important;">البند </th>

                                    <th style="text-align: center !important;">الإجراء </th>
                                    <th style="text-align: center !important;">المحصل </th>
                                </tr>
                                </thead>

                            </table>

                            <?php $x=0;
                            foreach($all_pills as $row){
                                $x++; ?>

                                <div class="modal fade" id="myModal_attach2<?php echo$row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document" style="width: 50%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <table   class="table table-striped table-bordered fixed-table mytable "
                                                        <?php if(empty($row->attaches)){ ?>  style="display: none; "  <?php } ?> >
                                                        <thead>
                                                        <tr class="info">
                                                            <th  class="text-center" > إسم المرفق</th>
                                                            <th class="text-center" >المرفق</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="attachTable">
                                                        <?php if(!empty($row->attaches)){ ?>
                                                            <?php $a=1;foreach ($row->attaches as $row_img){ ?>
                                                                <tr class="<?=$a?>">
                                                                    <td><input type="input" name="" readonly id="title" value="<?=$row_img->title?>"  class="form-control  " "></td>
                                                                    <td><img id="img_view<?=$a?>" src="<?php  echo base_url().'uploads/images/fr/all_pills/'.$row_img->file_attached?>"  width="150px" height="150px" /></td>
                                                                </tr>
                                                                <?php  $a++; } }  ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                                <button type="button" class="btn btn-success" style="display: inline-block;padding: 6px 12px;" onclick="GetAttachTable()"
                                                        id="saves"  data-dismiss="modal">حفظ</button>
                                                <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">إغلاق</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php   } ?>
                            <!----------------------------------------------------------->




















                        <?php  }  else { ?>
                            <div style="color: red; font-size: large;" class="col-sm-12">لم يتم  إضافة إيصالات !!</div>

                        <?php } ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php
//}
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body" id="optionearea1">

            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<?php $x=0;
foreach($all_pills as $row){
    $x++; ?>

    <div class="modal fade" id="myModal_attach2<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <table   class="table table-striped table-bordered fixed-table mytable "
                            <?php if(empty($row->attaches)){ ?>  style="display: none; "  <?php } ?> >
                            <thead>
                            <tr class="info">
                                <th  class="text-center" > إسم المرفق</th>
                                <th class="text-center" >المرفق</th>
                            </tr>
                            </thead>
                            <tbody class="attachTable">
                            <?php if(!empty($row->attaches)){ ?>
                                <?php $a=1;foreach ($row->attaches as $row_img){ ?>
                                    <tr class="<?=$a?>">
                                        <td><input type="input" name="" readonly id="title" value="<?=$row_img->title?>"  class="form-control  " "></td>
                                        <td><img id="img_view<?=$a?>" src="<?php  echo base_url().'uploads/images/fr/all_pills/'.$row_img->file_attached?>"  width="150px" height="150px" /></td>
                                    </tr>
                                    <?php  $a++; } }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-success" style="display: inline-block;padding: 6px 12px;" onclick="GetAttachTable()"
                            id="saves"  data-dismiss="modal">حفظ</button>
                    <button type="button" class="btn btn-danger"
                            data-dismiss="modal">إغلاق</button>

                </div>
            </div>
        </div>
    </div>


<?php   } ?>
<div class="modal fade" id="kafalaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">متابعة الكفالة</h4>
            </div>

            <div class="modal-body">
                <div class="col-md-12" id="kafala_option">
                </div>
            </div>

            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" onclick="update_kafala_option(document.getElementById('row_id').value)"
                        class="btn btn-labeled btn-success" >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>


                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>


            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>

    function GetTable(valu) {
        if (valu !=0 &&   valu!='') {
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/all_pills/AllPills/GetDetails',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });

        }

    }


</script>
<script>
    function load_kafala(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/load_kafala_option",
            data: {row_id:row_id},
            success: function (d) {
                $('#kafala_option').html(d);

            }

        });

    }
</script>
<script>
    function update_kafala_option(row_id) {

        var motb3a_option_fk= $("input[name='motb3a_option_fk']:checked").val();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/update_kafala_option",
            data: {row_id:row_id,motb3a_option_fk:motb3a_option_fk},
            success: function (d) {

                var obj = JSON.parse(d);

                $('#kafala_title'+row_id).html('<i class="fa fa-list"></i>'+' '+obj.motb3a_option_n);

                $('#kafalaModal').modal('hide');



            }

        });

    }
</script>
<script>
    function delete_attr(num) {
        var url = " <?= base_url() . "all_Finance_resource/all_pills/AllPills/DeletePill/"?>"+num;

        $("#adele").attr("href",url);

    }
</script>
<?php


echo $customer_js;
?>








<?php      $this->load->view('admin/requires/footer'); ?>

