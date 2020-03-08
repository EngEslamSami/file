<div class="container-fluid">
    <div class="print_forma  no-border    col-xs-12 allpad-12">
        <div class="col-xs-12">
            <div class="personality">

                <div class="col-xs-1"></div>
                <div class="col-xs-7 ahwal_style">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php if(!empty($titles[$result['start_laqb']])){ echo $titles[$result['start_laqb']]['title_setting'] .'/'; } ?><?php echo $result['geha_name'];?>  </h4>
                </div>
                <div class="col-xs-3">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php if(!empty($greetings[$result['end_laqb']])){ echo $greetings[$result['end_laqb']]['title_setting']; } ?> </h4>
                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <br>

                    <h5 style="font-weight: normal !important;"><?php echo $result['header_name'];?></h5>
                </div>



                <div class="col-xs-12 no-padding">

                    <div class="form-group col-sm-12 col-xs-12">
                        <h4><?php echo $result['namozg_head'];?></h4>

                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">إسم رب الأسرة</th>
                                <th class="text-center">السجل المدني</th>
                                <th class="text-center">رقم الملف</th>
                                <th class="text-center">عدد أفراد الأسرة</th>
                                   <?php if (isset($result['responsable_name']) && (!empty($result['responsable_name']))) { ?>
                                <th class="text-center"> إسم المسئول</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><?php echo $result['father_name']?></td>
                                <td class="text-center"><?php echo $result['father_national_num']?></td>
                                <td class="text-center"><?php echo $result['file_num']?></td>
                               <!-- <td class="text-center"><?php echo $family_members_num;?></td>-->
                                  <td class="text-center"><?php echo $result['no_afrad']?></td>
                                     <?php if (isset($result['responsable_name']) && (!empty($result['responsable_name']))) { ?>
                                  <td class="text-center"><?php echo $result['responsable_name']?></td>
                                  <?php } ?>
                                  
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--                    31-1-om start-->

                    <?php if ($result['namozeg_type_fk'] == 6) {
                        if (!empty($result['sons'])) {
                            $member_gender_arr = array(1 => 'انثى', 2 => 'ذكر');
                            ?>
                            <div class="form-group col-sm-12 col-xs-12">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr class="greentd">

                                        <th class="text-center">إسم المستفيد</th>
                                        <th class="text-center">السجل المدني</th>
                                        <th class="text-center"> الجنس</th>
                                        <th class="text-center">الصلة</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($result['sons'] as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row->member_full_name ?></td>
                                            <td class="text-center"><?php echo $row->member_card_num ?></td>
                                            <td class="text-center"><?php
                                                if (key_exists($row->member_gender, $member_gender_arr)) {
                                                    echo $member_gender_arr[$row->member_gender];
                                                } ?></td>
                                            <td class="text-center"><?php echo $row->member_relationship_title ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }
                    } ?>
                    <!--                    31-1-om end-->

                    <div class="form-group col-sm-12 col-xs-12">
                        <h4><?php echo$result['namozg_footer'];?></h4>

                    </div>


                </div>
            </div>

            <div class="special col-xs-12 ">


                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center ">

                </div>
                <br><br>

            </div>
        </div>



    </div>
</div>