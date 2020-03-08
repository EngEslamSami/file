
    <?php
     echo '<pre>';
                            print_r($all_pills_inbox);


                            if(!empty($all_pills_inbox)){ ?>
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap example">
                                <thead>
                                <tr class="greentd">
                                    <th style="text-align: center !important;">م</th>
                                    <th style="text-align: center !important;">رقم الإيصال</th>
                                    <th style="text-align: center !important;">التاريخ</th>
                                    <th style="text-align: center !important;">نوع الإيصال</th>
                                    <th style="text-align: center !important;">طريقة التوريد</th>
                                    <th style="text-align: center !important;">المبلغ </th>
                                    <th style="text-align: center !important;">الإسم </th>
                                    <th style="text-align: center !important;">البند </th>

                                    <th style="text-align: center !important;">صورة المرفق </th>
                                    <th style="text-align: center !important;">التفاصيل </th>
                                    <th style="text-align: center !important;">الإجراء </th>
                                    <th style="text-align: center !important;">نوع القيد </th>
                                    <th style="text-align: center !important;">رقم القيد </th>
                                    <th>رقم القيد جديد </th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x=0;
                                foreach($all_pills_inbox as $row){
                                    $x++;
                                    if($row->person_type == 1){
                                        if($row->person_type ==1){
                                            $name = $row->MemberDetails['k_name'];
                                        }elseif ($row->person_type ==2){
                                            $name = $row->MemberDetails['d_name'];
                                        }elseif ($row->person_type ==3){
                                            $name =$row->MemberDetails['name'];
                                        }

                                    }elseif($row->person_type == 0){
                                        $name =$row->person_name;
                                    }
                                    ?>
                                    <tr>
                                        <td><?=$x?></td>
                                        <td><?=$row->pill_num?></td>
                                        <td><?=$row->pill_date?></td>
                                        <td><?=$row->pill_type_title?></td>
                                        <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                                        <td><?=$row->value?></td>
                                        <td><?=$row->person_name?></td>
                                        <td><?=$row->band_title?></td>
                                        <td>
                                        <?php if(!empty($row->file)){ ?>
                                        <a data-toggle="modal" type="button" style="cursor: pointer"
                                           data-target="#modal-img" onclick="$('#my_image').attr('src','<?php echo base_url() .'uploads/images/'.$row->file ?>');">
                                                <i class="fa fa-eye"></i>
                                            </a><?php }else{ echo'غير متاحة';} ?></td>
                                        <td>
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" style="padding: 6px 12px;"
                                                onclick="GetTable(<?php echo$row->id;?>)"  data-target="#myModal">التفاصيل
                                    </button>
                                        </td>
        <td>
        <?php if($_SESSION['user_id'] == 14){ ?>

            <a href="<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/addPills/<?php echo $row->id; ?>">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
            <a onclick="$('#adele').attr('href', '<?= base_url() . " all_Finance_resource/all_pills/AllPills/DeletePill/" . $row->id ?>');"
               data-toggle="modal" data-target="#modal-delete"
               title="حذف"> <i class="fa fa-trash"
                               aria-hidden="true"></i> </a>

            <a  href='<?php echo base_url().'all_Finance_resource/all_pills/AllPills/PrintPill/'.$row->id ?>' target='_blank'><i class='fa fa-print' aria - hidden ='true'></i></a>



        <?php }elseif($_SESSION['user_id'] == 69){ ?>
            <a href="<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/addPills/<?php echo $row->id; ?>">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
            <a  href='<?php echo base_url().'all_Finance_resource/all_pills/AllPills/PrintPill/'.$row->id ?>' target='_blank'><i class='fa fa-print' aria - hidden ='true'></i></a>


        <?php }else{ ?>
            <a  href='<?php echo base_url().'all_Finance_resource/all_pills/AllPills/PrintPill/'.$row->id ?>' target='_blank'><i class='fa fa-print' aria - hidden ='true'></i></a>
            <!--
              <span style="background-color: red !important;
                color: white !important;" class="badge badge-danger">لا تملك الصلاحية </span> -->
        <?php } ?>
        </td>

                                        <td><?=$row->qued_type?></td>
                                        <td><?=$row->qued_num?></td>
                                        <td><?=$row->Rakmy?></td>
                                    </tr>
                                <?php   } ?>
                                </tbody>
                                </table>
                            <?php  }  else { ?>
                                <div style="color: red; font-size: large;" class="col-sm-12">لم يتم  إضافة إيصالات !!</div>

                            <?php } ?>

