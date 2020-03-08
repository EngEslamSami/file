<?php $arr_select_lable = array(1=>'مقدم الطلب ',
2=>'مدير مباشر ',
3=>'الموظف المختص',
4=>'مدير الشئون الماليةو الإدارية',
5=>' مدير التنفيذي'); ?>
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
            <?php if($valu!=3){?>
            <th>الطلب الان عند</th>
            <?php } ?>


            <th>الاجراء</th>


        </tr>
        </thead>
        <tbody>
        <?php if(isset($records)&& !empty($records)){
            $y = 0;
            foreach ($records as $row){
                $y++;
            ?>
                <tr id="row<?php echo $row->id;?>" class="granteed">

                    <td><?php echo $y ;?></td>

                    <td><?php echo $row->ezn_rkm;?></td>
                    <td><?php echo $row->ezn_date_ar;?></td>
                    <td><?php echo $row->from_hour;?></td>
                    <td><?php echo $row->to_hour;?></td>

                    <td><?php echo $row->total_hours;?></td>
                <?php if($valu!=3){?>
                    <td>
                       <?php
                       if($row->level==1){
                           echo 'المدير المباشر';
                       }elseif($row->level==2)
                       {
                           echo 'موظف الشئون الاداريه';

                       }
                       elseif($row->level==3)
                       {
                           echo 'مدير الشئون الاداريه';
                       }
                       elseif($row->level==4)
                       {
                           echo 'المدير العام';
                       }
                       elseif($row->level==5)
                       {
                           echo 'مقدم الطلب';
                       }
?>

                    </td>
                    <?php } ?>
                    <td>
                        <a class="btn btn-primary btn-xs" onclick="load_ezn_details(<?php echo $row->id;?>);" data-target="#detailsezn" data-toggle="modal">
                            <i class="fa fa-list"></i></a>

                    <?php if($valu==1 && $row->level==0&& $row->suspend!=4 ){?>
                        <button class="btn btn-primary btn-xs" data-target="" data-toggle="modal"  onclick="send_order_to_manager(<?php echo $row->id;?>);"> تحويل المدير المباشر</button>
                        <?php

                      }if($row->level>0 && $valu==3 ){ ?>
                        <a class="btn btn-primary btn-xs" onclick="load_ezn_details_steps(<?php echo $row->id;?>);" data-target="#detailsezn_steps" data-toggle="modal">
                            <i class="fa fa-list"></i></a>

                            <button class="btn btn-success btn-xs" data-target="#detailsModal2" data-toggle="modal" onclick="show_modal(<?php echo $row->level;?>,<?php echo $row->id;?>);"> الاجراء </button>

                        <?php  } ?>
                    <?php if($row->suspend==2 ){?>

                        <button type="button" class="btn  btn-danger "  >
                            تم رفض الطلب
                        </button>


                    <?php }   ?>
                <?php
                if($row->suspend==4 ){?>

                <button type="button" class="btn  btn-success " >
                    تم قبول الطلب
                </button>


            <?php }   ?>
                <?php
                if($row->suspend==5 ){?>

                <button type="button" class="btn  btn-danger " >
                  تم رفض الطلب
                </button>


            <?php }   ?>
                <?php
                if($valu==2 ){?>

                <button type="button" class="btn  btn-success" onclick="ezn_follow(<?php echo $row->ezn_rkm;?>,<?php echo $row->id;?>);" data-target="#ezn_follow" data-toggle="modal">
                    <span class="btn-label"></span>متابعه الاذن
                </button>


            <?php }   ?>
                    </td>


                </tr>

        <?php  } }  ?>
        </tbody>

    </table>

<?php } else { ?>
<div class="alert alert-danger">عفوا !... لايوجد نتائج</div>
<?php } ?>

<!-- detailsModal -->



<div class="modal fade" id="detailsModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#detailsModal2').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="detailsModal2_header" style="text-align: center;" >
                  <?php if (key_exists($row->level+1 , $arr_select_lable)) {
                  echo $arr_select_lable[$row->level+1];
                }else {
                  echo "تحويل الطلب";
                } ?></h4>
            </div>
            <div  class="modal-body" style="padding: 10px 0" id="result2">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">


                <button type="button" onclick="make_suspend();" class="btn btn-labeled btn-success " name="" value="" id="" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>


                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsModal2').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>

<!-- detailsModal    detailsezn -->
<div class="modal fade" id="detailsezn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#detailsezn').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;" >  </h4>
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

<div class="modal fade" id="detailsezn_steps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#detailsezn_steps').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;" >  </h4>
            </div>
            <div  class="modal-body" style="padding: 10px 0" id="details_steps">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">



                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsezn_steps').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-------------------------------------------end---------------->
<!----------------------------------------start _ezn_follow-------------------------------------->
<div class="modal fade" id="ezn_follow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#ezn_follow').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;" > متابعه الاذن</h4>
            </div>
            <div  class="modal-body" style="padding: 10px 0" id="follow">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">



                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#ezn_follow').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>
<!----------------------------------------end_ezn_follow-------------------------------------->

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
    function show_modal(valu,val_id)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_modal",
            data:{level:valu,val_id:val_id},
            success:function(d){


                $('#result2').html(d);



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
<script>
    function load_ezn_details_steps(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_modal_details_steps",
            data:{valu:valu},
            success:function(d){

                $('#details_steps').html(d);



            }

        });
    }

</script>


<script>
    function ezn_follow(valu,id) {
       // alert(valu);  get_ezn_follow
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_ezn_follow",
            data:{valu:valu,id:id},
            success:function(d){

                $('#follow').html(d);



            }

        });

    }

</script>
