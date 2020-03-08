<div class="col-sm-12 col-md-12 col-xs-12 ">

    <?php if(!isset($panel)){?>
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
            </div>
        <div class="panel-body">
            <?php } ?>

<button class="btn btn-warning" style="width: 100px;"  onclick="get_orders(1);">طلباتي</button>
            <button class="btn btn-primary" style="width: 100px;" onclick="get_orders(2);">متابعاتي</button>
            <button class="btn btn-success" style="width: 100px;" onclick="get_orders(3);">الوارد</button>
            </br></br>

            <div id="res">
                <?php

                if(isset($records)&&!empty($records)){

                    ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">


                            <th>م</th>

                            <th> رقم الاذن</th>
                            <th> تاريخ الاذن</th>
                            <th> الفتره من </th>
                            <th> الفتره الي </th>


                            <th>عدد الساعات </th>


                            <th>الاجراء</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($records)&& !empty($records)){
                            $z=0;
                            foreach ($records as $row){
                                $z++;

                                ?>
                                <tr id="row<?php echo $row->id;?>">

                                    <td><?php echo $z ;?></td>

                                    <td><?php echo $row->ezn_rkm;?></td>
                                    <td><?php echo $row->ezn_date_ar;?></td>
                                    <td><?php echo $row->from_hour;?></td>
                                    <td><?php echo $row->to_hour;?></td>

                                    <td><?php echo $row->total_hours;?></td>
                                    <td>


                                     <button class="btn btn-primary"
                                             onclick="load_ezn_details(<?php echo $row->id;?>);"
                                             data-target="#detailsezn" data-toggle="modal">   <i class="fa fa-list"></i></button>


                                    <?php if($valu==1 && $row->level==0&& $row->suspend!=4 ){?>
                                            <button class="btn btn-primary" data-target="" data-toggle="modal"  onclick="send_order_to_manager(<?php echo $row->id;?>);"> تحويل المدير المباشر</button>
                                            <?php

                                        }if($row->level>1 && $valu==3 && $row->suspend!=4 && $row->suspend==1){ ?>
                                            <button class="btn btn-primary" data-target="#detailsModal" data-toggle="modal" onclick="send_order_to_employee(<?php echo $row->id;?>); show_modal(<?php echo $row->level;?>,<?php echo $row->id;?>);"> الاجراء </button>

                                        <?php  } ?>
                                        <?php if($row->suspend==2 ){?>

                                            <button type="button" class="btn btn-labeled btn-danger " data-target="#detailsModal" data-toggle="modal" onclick="send_order_to_employee(<?php echo $row->id;?>); show_modal(<?php echo $row->level;?>,<?php echo $row->id;?>);">
                                                تم رفض الطلب
                                            </button>


                                        <?php }   ?>
                                        <?php
                                        if($row->suspend==4 ){?>
                                            <button type="button" class="btn btn-labeled btn-success ">
                                                تم قبول الطلب
                                            </button>


                                        <?php }   ?>
                                    </td>


                                </tr>

                                <?php   } }  ?>
                        </tbody>

                    </table>

                <?php } else { ?>
                    <div class="alert alert-danger">عفوا !... لايوجد نتائج</div>
                <?php } ?>

            </div>

            <?php if(!isset($panel)){ ?>
        </div>
        </div>

<?php } ?>
</div>

<div class="modal fade" id="detailsezn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#detailsezn').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;" > تفاصيل الاذن</h4>
            </div>
            <div  class="modal-body" style="padding: 10px 0" id="details">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">



                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsezn').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>
<script>
    function get_orders(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_orders",
            data:{valu:valu},
            success:function(d){
                //alert(d);
                $('#res').html(d);

            }

        });
    }


</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>

    function send_order_to_manager(valu)
    {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/changer_level",
            data:{valu:valu},
            success:function(d){
                //$('#load_form').html(d);
                Swal.fire(
                    'بنجاح!',
                    'تم تحويل الطلب الي المدير المباشر',

                )
                $('#row'+valu).remove();





            }

        });
    }
</script>

<script>
    function send_order_to_employee(valu)
    {
//
    }



</script>

<script>
    function show_modal(valu,val_id)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_modal",
            data:{level:valu,val_id:val_id},
            success:function(d){

                $('#result').html(d);



            }

        });
    }

</script>
<script>
    function load_ezn_details(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_modal_details",
            data:{valu:valu},
            success:function(d){


                $('#details').html(d);



            }

        });
    }

</script>
