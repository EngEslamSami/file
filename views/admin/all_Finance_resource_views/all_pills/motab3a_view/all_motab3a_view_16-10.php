<style>
.btn-add  {
    border-radius: 11px !important;
}
.modal.in .modal-dialog {
    margin-top: 70px !important;
}
</style>
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
     
        <div class="panel-body" style="min-height: 300px;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#warda" aria-controls="reservation_orders" role="tab" data-toggle="tab">
                <i class="fa fa-clock-o" style=""></i>

                 إيصالات قيد المراجعة </a></li>
                <li role="presentation" class=""><a href="#sadra" aria-controls="tab_m" role="tab" data-toggle="tab">
                <i class="fa fa-check-square-o" style=""></i>
                 إيصالات تمت المراجعة </a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade  in active" id="warda">
                    <?php
                    if (isset($all_pills_warda) && !empty($all_pills_warda)){
                              $pay_method_arr =array(1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                        $x=1;
                        ?>
                    <table id="" class=" example display table table-bordered  table-striped  responsive nowrap" cellspacing="0" width="100%">

                        <thead>
                        <tr class="blacktd">
                            <th style="text-align: center !important;">م</th>
                            <th style="text-align: center !important;">رقم الإيصال</th>
                            <th style="text-align: center !important;">التاريخ</th>
                            <th style="text-align: center !important;">نوع الإيصال</th>
                            <th style="text-align: center !important;">طريقة التوريد</th>
                            <th style="text-align: center !important;">المبلغ </th>
                            <th style="text-align: center !important;">الإسم </th>
                            <th style="text-align: center !important;">البند </th>
                            <!--  <th style="text-align: center !important;">صورة المرفق </th> -->

                            <th style="text-align: center !important;">الإجراء </th>
                            <th style="text-align: center !important;">المحصل </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($all_pills_warda as $row){
                            ?>
                            <tr>
                                <td><?=$x++?></td>
                                <td><?=$row->pill_num?></td>
                                <td><?=$row->pill_date?></td>
                                <td><?=$row->pill_type_title?></td>
                                <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                                <td><?=$row->value?></td>
                                <td><?=$row->person_name?></td>
                                <td><?=$row->band_title?></td>
                                <td>
                                    <a type="button" class="btn btn-add btn-xs" data-toggle="modal" style="padding: 1px 5px;" title="التفاصيل"
                                       onclick="GetTable(<?php echo$row->id;?>)" data-target="#myModal"><i class="fa fa-list-alt" aria-hidden="true"></i></i>
                                    </a>

                                    <a  href='<?php echo base_url().'all_Finance_resource/all_pills/AllPills/PrintPill/'.$row->id ?>' target='_blank'><i class='fa fa-print' aria - hidden ='true'></i></a>


                                    <a href="<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/addPills/<?php echo $row->id; ?>">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/all_pills/AllPills/DeletePill/" . $row->pill_num ?>');"
                                       data-toggle="modal" data-target="#modal-delete"
                                       title="حذف"> <i class="fa fa-trash"
                                                       aria-hidden="true"></i> </a>
                                    <a title="عرض المرفق"  href="#" data-toggle="modal" data-target="#myModal_attach2<?php echo$row->id;?>"  > <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>

                                    <a type="button" id="kafala_title<?= $row->id?>" class="btn btn-primary btn-xs" data-toggle="modal" style="padding: 1px 5px;"
                                       data-target="#kafalaModal"
                                        onclick="load_kafala(<?= $row->id?>)">
                                        <i class="fa fa-calendar-check-o" style=""></i>

                                        <?= $row->motb3a_option_n?>
                                    </a>

                                </td>
                                <td>
                                <span style="font-size: 12px; color: white !important; font-weight: normal;background-color: #c57400;    width: 150px;"
                                      class="badge badge-add"><?php echo $row->publisher_name;  ?></span>
                                </td>

                            </tr>
                        <?php

                        }
                        ?>
                        </tbody>

                    </table>
                    <?php

                    } else{
                        ?>
                        <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                    <?php
                    }
                    ?>

                </div>


                <div role="tabpanel" class="tab-pane fade " id="sadra">
                    <?php
                    if (isset($all_pills_sadra) && !empty($all_pills_sadra)){
                        $pay_method_arr =array(1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                        $x=1;
                        ?>
                        <table id="" class=" example display table table-bordered  table-striped  responsive nowrap" cellspacing="0" width="100%">

                            <thead>
                            <tr class="blacktd">
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
                            <tbody>
                            <?php
                            foreach ($all_pills_sadra as $row){
                                if(isset($row->motb3a_option_n) and $row->motb3a_option_n != null){
                                    $motb3a_option_n = $row->motb3a_option_n;
                                }else{
                                    $motb3a_option_n ='غير محدد';
                                }
                                
                                ?>
                                <tr>
                                    <td><?=$x++?></td>
                                    <td><?=$row->pill_num?></td>
                                    <td><?=$row->pill_date?></td>
                                    <td><?=$row->pill_type_title?></td>
                                    <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                                    <td><?=$row->value?></td>
                                    <td><?=$row->person_name?></td>
                                    <td><?=$row->band_title?></td>
                                    <td>
                                        <a type="button" class="btn btn-add btn-xs" data-toggle="modal" style="padding: 1px 5px;" title="التفاصيل"
                                           onclick="GetTable(<?php echo$row->id;?>)" data-target="#myModal"><i class="fa fa-list-alt" aria-hidden="true"></i></i>
                                        </a>

                                        <a  href='<?php echo base_url().'all_Finance_resource/all_pills/AllPills/PrintPill/'.$row->id ?>' target='_blank'><i class='fa fa-print' aria - hidden ='true'></i></a>


                                        <a href="<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/addPills/<?php echo $row->id; ?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/all_pills/AllPills/DeletePill/" . $row->pill_num ?>');"
                                           data-toggle="modal" data-target="#modal-delete"
                                           title="حذف"> <i class="fa fa-trash"
                                                           aria-hidden="true"></i> </a>
                                        <a title="عرض المرفق"  href="#" data-toggle="modal" data-target="#myModal_attach2<?php echo$row->id;?>"  > <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>

                                        <a type="button" id="kafala_title<?= $row->id?>" class="btn btn-primary btn-xs" data-toggle="modal" style="padding: 1px 5px;"
                                           data-target="#kafalaModal" onclick="load_kafala(<?= $row->id?>)"><i class="fa fa-list-alt" aria-hidden="true"></i></i>
                                            <?=$motb3a_option_n?>
                                        </a>

                                    </td>
                                    <td>
                                <span style="font-size: 12px; color: white !important; font-weight: normal;background-color: #c57400;    width: 150px;"
                                      class="badge badge-add"><?php echo $row->publisher_name;  ?></span>
                                    </td>

                                </tr>
                                <?php

                            }
                            ?>
                            </tbody>

                        </table>
                        <?php

                    } else{
                        ?>
                        <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                        <?php
                    }
                    ?>

                </div>
            </div>

                </div>

    </div>

    </div>

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
<?php
if (isset($all_pills_warda) && !empty($all_pills_warda)   ){
    ?>
    <?php
$x=0;
foreach($all_pills_warda as $row){
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


<?php   }  }?>
<div class="modal fade" id="kafalaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 style="color: white !important;" class="modal-title" id="myModalLabel">
                <i class="fa fa-info-circle" aria-hidden="true"></i>

                متابعة الكفالة</h4>
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
        var motb3a = 'motb3a';

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/load_kafala_option",
            data: {row_id:row_id,motb3a:motb3a},
            success: function (d) {
                $('#kafala_option').html(d);

            }

        });

    }
</script>
<script>
// application\views\admin\all_Finance_resource_views\all_pills\addPills_data.php
        function update_kafala_option(row_id) {

        var motb3a_option_fk= $("input[name='motb3a_option_fk']:checked").val();
        var pill_num_fk = $('#pill_num_fk').val();
        var user_id_fk = $('#user_id_fk').val();
        var user_name = $('#user_name').val();

        if (typeof(motb3a_option_fk) != "undefined"){

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/update_kafala_option",
            data: {row_id:row_id,motb3a_option_fk:motb3a_option_fk,pill_num_fk:pill_num_fk,user_id_fk:user_id_fk,user_name:user_name},
            success: function (d) {
               // consol.log(d);
              //  return;

                var obj = JSON.parse(d);

                $('#kafala_title'+row_id).html('<i class="fa fa-list"></i>'+' '+obj.motb3a_option_n);

                $('#kafalaModal').modal('hide');
                if( motb3a_option_fk ==2 ){
                    swal({
                            title: "هل تريد الذهاب  لبيانات الكفالة ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-warning",
                            confirmButtonText: "نعم",
                            cancelButtonText: "لا",
                            closeOnConfirm: false
                        },
                        function(){
                            if (obj.person_type==1 ) {
                              window.location="<?php echo base_url().'all_Finance_resource/sponsors/Sponsor/addKfala_data/'?>"+obj.person_id_fk;

                            }else {
                              window.location="<?php echo base_url().'all_Finance_resource/sponsors/Sponsor/xyz'?>";

                            }
                        });

                }




            }

        });
        } else {
            alert('من فضلك حدد الاختيار اولا !') ;
        }

    }

</script>
<script>
/*
    function update_kafala_option(row_id) {

        var motb3a_option_fk= $("input[name='motb3a_option_fk']:checked").val();
        var pill_num_fk = $('#pill_num_fk').val();
        var user_id_fk = $('#user_id_fk').val();
        var user_name = $('#user_name').val();
        var motb3a = 'motb3a';

        if (typeof(motb3a_option_fk) != "undefined"){

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/update_kafala_option",
                data: {motb3a:motb3a,row_id:row_id,motb3a_option_fk:motb3a_option_fk,pill_num_fk:pill_num_fk,user_id_fk:user_id_fk,user_name:user_name},
                success: function (d) {
                    // consol.log(d);
                    //  return;

                    var obj = JSON.parse(d);

                    $('#kafala_title'+row_id).html('<i class="fa fa-list-alt" aria-hidden="true"></i></i>'+' '+obj.motb3a_option_n);

                    $('#kafalaModal').modal('hide');
                    if(obj.person_type==1 && motb3a_option_fk ==2 ){
                        swal({
                                title: "هل تريد الذهاب  لبيانات الكفالة ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-warning",
                                confirmButtonText: "نعم",
                                cancelButtonText: "لا",
                                closeOnConfirm: false
                            },
                            function(){

                                window.location="<?php echo base_url().'all_Finance_resource/sponsors/Sponsor/addKfala_data/'?>"+obj.person_id_fk;
                            });

                    }




                }

            });
        } else {
            alert('من فضلك حدد الاختيار اولا !') ;
        }

    }
    */
</script>