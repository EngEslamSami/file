<div class="col-xs-10 padding-4">
 <?php
    if (isset($rows) && !empty($rows)) {
        $x = 1;

        foreach ($rows as $row) { ?>

                            
      



<table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>رقم الطلب: </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->t_rkm; ?></td>
            <td style="width: 135px;"><strong> تاريخ الطلب</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->t_rkm_date_m; ?></td>
            <td style="width: 150px;"><strong>اسم الموظف</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $row->emp_name; ?></td>
        </tr>
        <tr>
            <td><strong>الرقم الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->emp_code_fk; ?></td>
            <td><strong>المسمى الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->job_title; ?></td>
            <td><strong>الأدارة </strong></td>
            <td><strong>:</strong></td>
            <td><?= $row->edara_n;?></td>

        </tr>
        <tr>
            <td><strong>  القسم </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->qsm_n; ?></td>
            <td><strong>قيمه السلفه </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->qemt_solaf; ?></td>
            <td><strong> تاريخ بدايه الخصم</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->khsm_form_date_m; ?></td>
        </tr>
        <tr>
            <td><strong> طريقه سداد السلفه </strong></td>
            <td><strong>:</strong></td>
            <td><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                    elseif($row->sadad_solfa==3){echo 'تخصم شهريا علي الراتب';}
                    ?>
            
            
            </td>
            <td><strong> تاريخ اخر سلفه</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->previous_request_date_m; ?></td>
            <td><strong>سبب السلفه</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $row->solaf_reason; ?></td>

        </tr>
        </tbody>
    </table>
    <?php }
    } ?>



</div>

<div class="col-xs-2 padding-4" width="100%">

<?php
            /*
            echo '<pre>';
            print_r($personal_data);*/
            if (isset($personal_data) && !empty($personal_data)) {?>
                <div class="col-md-2 no-padding" style="width:100%">
                <div class="user-profile">
        <span class="profile-picture">
            <img id="profile-img-tag" class="editable img-responsive" alt="Alex's Avatar"
                 src="<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png"/>
            <!-- <input class="changeImg" type="file" accept="image/*" onchange="loadFile(event)"> -->


        </span>

                    <div class="space-4"></div>

                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                        <div class="inline position-relative">
                            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                <i class="ace-icon fa fa-circle light-green"></i>
                                &nbsp;
                                <span class="white"> <?php if (isset($personal_data)) {
                                            echo $personal_data[0]->employee;
                                        } ?>     </span>
                            </a>
                            
                            <ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
                                <li class="dropdown-header"> تغيير الحالة</li>
                
                                <li>
                
                                    <table class="table-bordered table table-details" style="table-layout: fixed;">
                                        <tbody>
                                        <tr>
                
                                            <td><strong class="text-danger "> إسم الموظف : </strong>
                                                <?php if (isset($personal_data)) {
                                            echo $personal_data[0]->employee;
                                        } ?>                        </td>
                                        </tr>
                
                
                                        <tr>
                
                                            <td><strong class="text-danger ">الإدارة:</strong><?php if (isset($personal_data)) {
                                            echo $personal_data[0]->admin_name;
                                        } ?></td>
                                        </tr>
                
                                        <tr>
                
                                            <td><strong class="text-danger ">القسم:</strong><?php if (isset($personal_data)) {
                                            echo $personal_data[0]->depart_name;
                                        } ?>                           </td>
                                        </tr>
                
                                        <tr>
                
                
                                            <td><strong class="text-danger ">المسمى الوظيفى: </strong><?php if (isset($personal_data)) {
                                            echo $personal_data[0]->degree_name;
                                        } ?>                           </td>
                                        </tr>
                
                                        <tr>
                
                
                                            <td><strong class="text-danger ">المدير المباشر: </strong><?php if (isset($personal_data)) {
                                            echo $personal_data[0]->manger_name;
                                        } ?>                       </td>
                                        </tr>
                
                                        </tbody>
                
                                    </table>
                                </li>
                
                            </ul>


                        </div>
                    </div>


                </div>


            </div>  <?php } ?>

</div>