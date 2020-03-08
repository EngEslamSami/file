<?php

    // echo '<pre>';
    // print_r($items);
    if (isset($items) && !empty($items)) {

        ?>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <table id="example" class=" display table table-bordered  " cellspacing="0" width="100%">
            <thead>
                <tr class="greentd">
                    <th style="width: 25px;">م</th>
                    <th style="width: 60px;">رقم الطلب</th>
                    <th style="width: 85px;">تاريخ الطلب</th>
                    <th style="width: 200px;">إسم الموظف</th>
                    <th style="width: 75px;">قيمة السلفة</th>
                    <th style="width: 140px;">طريقة سداد السلفة</th>
                    <th style="width: 75px;">عدد الاقساط</th>
                    <th style="width: 75px;">قيمة القسط</th>
                    <th style="width: 75px;"> بداية الخصم</th>
                    <th> الاجراء</th>
                    <!-- <th> حالة الطلب </th> -->
                    <th>حاله الطلب</th>
                    <th>الطلب الان عند </th>

                </tr>

            </thead>
            <tbody>

                <?php

                    if (isset($items) && !empty($items)) {
                        $x = 1;

                        foreach ($items as $row) {

                            if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                                $link_update = 'edit_solaf(' . $row->id . ')';
                                $link_delete = 1;
                            } else {
                                $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/solaf/Solaf/edit_solaf/' . $row->id . '";';
                                $link_delete = 0;
                            }


                            if($row->suspend == 0){
                                $halet_eltalab = 'جاري ';
                                $halet_eltalab_class = 'warning';
                                }elseif($row->suspend == 1){
                                 $halet_eltalab = 'تم قبول الطلب من '.$row->current_from_user_name;
                                $halet_eltalab_class = 'success';
                                }elseif($row->suspend == 2){
                                    $halet_eltalab = 'تم رفض الطلب  من '.$row->current_from_user_name;
                                    $halet_eltalab_class = 'danger';
                                }elseif($row->suspend == 4){
                                   $halet_eltalab = 'تم اعتماد الطلب بالموافقة  من '.$row->current_from_user_name;
                                   $halet_eltalab_class = 'success';
                                }elseif($row->suspend == 5){
                                   $halet_eltalab = 'تم اعتماد الطلب بالرفض  من '.$row->current_from_user_name;
                                   $halet_eltalab_class = 'danger';
                                }else{
                                     $halet_eltalab = 'غير محدد ';
                                   $halet_eltalab_class = 'danger';
                                }
                            // echo '<pre>'; print_r($row->t_rkm);
                            ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->t_rkm; ?></td>
                    <td><?php echo $row->t_rkm_date_m; ?></td>
                    <td><?php echo $row->emp_name; ?></td>
                    <td><?php echo $row->qemt_solaf; ?></td>
                    <td><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                    elseif($row->sadad_solfa==3){echo 'تخصم شهريا علي الراتب';}
                    ?></td>
                    <td><?php echo $row->qst_num; ?></td>
                    <td><?php echo $row->qemt_qst ?></td>

                    <td><?php echo $row->khsm_form_date_m; ?></td>

                    <td>

                        <a href="#modal_details" data-toggle="modal" onclick="get_solfa_details(<?php echo $row->t_rkm;?>)"> <i class="btn fa fa-list"></i></a>

                        <a onclick="print_order(<?php echo $row->t_rkm;?>)" title="طباعه"><i class="fa fa-print"></i></a>


                      
                        <!-- <div id="option_td<?= $row->id?>" style="display:<?=$trans_diapled?>"> -->




                            
                        <!-- </div> -->
                        <!-- new -->
                        



                    </td>

                    <!-- <td>
                        <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                            <?php echo $halet_eltalab;  ?>
                        </span>
                    </td> -->
                    <td>
                            <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                            <?php echo $halet_eltalab;  ?>
                             </span>
                            </td>
                            <td>
                              <span style="background-color: #0eacbb !important; border: 2px solid #0eacbb !important;">
                            <?php if (!empty($row->current_to_user_name)) {
                                echo $row->current_to_user_name;
                            }else {
                                echo $row->current_from_user_name;
                            }  ?>
                            </span>
                            </td>

                </tr>
                <?php
                            $x++;
                        }
                    }
                    ?>

            </tbody>
        </table>
    </div>
</div>

<?php } ?>
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل السلفه</h4>
            </div>
            <div class="modal-body" id="details"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">


                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_solfa_details(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_solaf_details",
            data: {
                rkm: valu
            },
            success: function(d) {


                $('#details').html(d);


            }

        });
    }
</script>
<script>
    function print_order(row_id) {


        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url().'human_resources/employee_forms/solaf/Solaf/get_solfa_print'?>",
            type: "POST",
            data: {
                rkm: row_id
            },
        });
        request.done(function(msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
             WinPrint.close();*/
        });
        request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>