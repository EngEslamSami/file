<div class="col-sm-12">

    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">تفاصيل الاسر</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">رقم الملف</th>
                            <th class="text-center">إسم رب الأسرة</th>
                            <th class="text-center">مسؤول الحساب البنكي</th>
                            <th class="text-center">هوية رقم</th>
                            <th class="text-center">عدد الأفراد</th>
                            <th class="text-center">أرملة</th>
                            <th class="text-center">يتيم</th>
                            <th class="text-center">مستفيد</th>
                            <th class="text-center">إجمالى</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                        <?php $total = 0;
                        $all_afrad = 0;
                        $all_aramel = 0;
                        $all_aytam = 0;
                        $all_ble3en = 0;
                        $x = 0;
                        foreach ($sarf_details as $row) {
                            $x++;

                            $total += $row->value;


                            $all_afrad += ($row->mother_num + $row->young_num + $row->adult_num);
                            $all_aramel += $row->mother_num;
                            $all_aytam += $row->young_num;
                            $all_ble3en += $row->adult_num;


                            ?>
                            <tr>

                                <td><?= $x; ?></td>
                                <td><?= $row->file_num ?></td>
                                <td><?= $row->father_full_name ?></td>
                                <td><?= $row->bank_responsible_name ?></td>
                                <td><?= $row->bank_responsible_national_num ?></td>

                                <td><?= ($row->mother_num + $row->young_num + $row->adult_num) ?></td>
                                <td><?= $row->mother_num ?></td>
                                <td><?= $row->young_num ?></td>
                                <td><?= $row->adult_num ?></td>
                                <td><?= $row->value ?></td>


                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="5"> الاجمالى</td>

                            <td><?= $all_afrad ?></td>
                            <td><?= $all_aramel ?></td>
                            <td><?= $all_aytam ?></td>
                            <td><?= $all_ble3en ?></td>

                            <td><?= $total ?></td>
                        </tr>


                        <?php /* ?>
                  
                    <?php  $total =0;
                    $all_afrad =0;
                    $all_aramel=0;
                    $all_down_child=0;
                    $all_up_child=0;
                    $x=1;
                    $xxx =0;
                     foreach ($sarf_details as $row){
                        $total += $row->value?>
                        <tr>
                            <td><?=$x++;?></td>
                            <td><?=$row->file_num_basic?></td>
                            <td><?=$row->father_full_name?></td>
                            <td><?=$row->person_name?></td>
                            <td><?=$row->bank_account_num?></td>
                             <td><?=$row->bank_name?></td>
                            <td><?=($row->mother_num_in+$row->down_child+$row->up_child)?></td>
                            <td><?=$row->mother_num_in?></td>
                            <td><?=$row->down_child?></td>
                            <td><?=$row->up_child?></td>
                            <td><?=$row->value?></td>
                        </tr>
                    <?php 
                    
                    $xxx += $row->down_child;
                   $all_afrad +=  $row->mother_num_in+$row->down_child+$row->up_child;
                   $all_aramel +=  $row->mother_num_in;
                   $all_down_child +=  $row->down_child;
                   $all_up_child +=$row->up_child;
                    
                     }?>
                    <tr>
                        <td colspan="6"> الاجمالى 
                       
                        </td>
            
                        <td><?php echo $all_afrad; ?></td>
                        <td><?php echo $all_aramel; ?></td>
                        <td><?php echo $all_down_child; ?></td>
                        <td><?php echo $all_up_child; ?></td>
                        <td><?=$total?></td>
                    </tr>
                   <?php */ ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">المرفقات</a>
                </h4>
            </div>

            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">المرفق</th>
                            <th class="text-center"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="body_attach">
                        <?php if (isset($gals_attachments) && !empty($gals_attachments)) { ?>
                            <tr>
                                <td class="text-left">محضر الجلسة</td>
                                <td>
                                    <?php
                                    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                                    $ext = pathinfo($gals_attachments, PATHINFO_EXTENSION);
                                    if (in_array($ext, $image)) {
                                        ?>

                                        <a target="_blank"
                                           href="<?= base_url() . "family_controllers/LagnaSetting/my_read_file/" . $gals_attachments ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <?php
                                    } else if (in_array($ext, $file)) {
                                        ?>
                                        <a target="_blank"
                                           href="<?= base_url() . "family_controllers/LagnaSetting/my_read_file/" . $gals_attachments ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <?php
                                    }
                                    ?>
                                    <a target="_blank"
                                       href="<?= base_url() . "family_controllers/LagnaSetting/my_download/" . $gals_attachments ?>">
                                        <i class="fa fa-download" title="تحميل"></i> </a>

                                </td>
                            </tr>

                            <?php
                        } ?>

                        <?php if (isset($sarf_attachments) && !empty($sarf_attachments)) {
                            foreach ($sarf_attachments as $row) { ?>
                                <tr>
                                    <td><?= $row->attachment_title ?></td>
                                    <td>
                                        <?php
                                        $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                                        $ext = pathinfo($row->attachment, PATHINFO_EXTENSION);
                                        if (in_array($ext, $image)) {
                                            ?>
                                            <a target="_blank"
                                               href="<?= base_url() . "FamilyCashing/read_file/" . $row->attachment.'/'.$ext ?>">
                                                <i class="fa fa-eye fa-2x" title=" قراءة"></i> </a>
                                            <?php
                                        } else if (in_array($ext, $file)) {
                                            ?>
                                            <a target="_blank"
                                               href="<?= base_url() . "FamilyCashing/read_file/" . $row->attachment.'/'.$ext  ?>">
                                                <i class="fa fa-eye fa-2x" title=" قراءة"></i> </a>
                                            <?php
                                        }
                                        ?>
                                        <a href="<?= base_url() . "FamilyCashing/download_sarf/" . $row->attachment ?>">
                                            <i class="fa fa-download" title="تحميل"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>