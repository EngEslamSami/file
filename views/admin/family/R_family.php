<div class="col-sm-11 col-xs-12">

    <div class="col-xs-12 r-profile-setting">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class="fa fa-bell" aria-hidden="true"></i><span>  </span> الأسر </a>
            </li>

        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane r-not active" id="home">

                <div class="col-xs-12 ">
                    <?php //var_dump($_SESSION['dep_job_id_fk']); die;?>
                    <!--------------------------------------------------------------------------------------------------------->
                    <?php if(isset($all_records) && $all_records!=null):?>
                        <div class="col-xs-12 r-inner-details">
                            <table style="width:100%">
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">الاسم</th>
                                    <th class="text-center">رقم الطلب </th>
                                    <th class="text-center">رقم الهوية</th>
                                    <th class="text-center">عرض</th>
                                    <th class="text-center last-th">حاله الاسرة </th>
                                </tr>  <!-- Y-m-d H:i:s -->
                                <?php $count=1; foreach($all_records as $row):?>
                                    <tr>
                                        <td><?php echo $count++?></td>
                                        <td><?php echo $get_name[$row->mother_national_num_fk]->m_first_name." ".$get_name[$row->mother_national_num_fk]->m_father_name." ".$get_name[$row->mother_national_num_fk]->m_grandfather_name." ".$get_name[$row->mother_national_num_fk]->m_family_name ?></td>
                                        <td><?php echo $row->id;?></td>
                                        <td><?php echo $row->mother_national_num_fk?></td>
                                        <td><a href="<?php echo base_url().'Family/family_details/'.$row->mother_national_num_fk ?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                                        <td>
                                            <?php if(isset($last_state[$row->mother_national_num_fk]) && $last_state[$row->mother_national_num_fk]!=null):
                                                $process=$last_state[$row->mother_national_num_fk]->process;
                                                $file_in=$last_state[$row->mother_national_num_fk]->family_file_to;
                                                if($process ==1){
                                                    echo ' قبول الملف عند'.$jobs_name[$file_in]->name;
                                                }elseif($process ==2){
                                                    echo 'رفض الملف عند'.$jobs_name[$file_in]->name;
                                                }elseif($process ==3){
                                                    echo 'للإطلاع عند'.$jobs_name[$file_in]->name;
                                                }elseif($process ==4){
                                                    echo 'اعتماد الملف عند'.$jobs_name[$file_in]->name;
                                                }?>
                                            <?php   else: echo "لم يتم إتخاذ أى إجراء"; endif;?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </table>

                        </div>

                    <?php endif?>

                    <!--------------------------------------------------------------------------------------------------------->

                </div>
            </div>

        </div>
    </div>

</div>