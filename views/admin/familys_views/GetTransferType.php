<style>
    .specific_style {
        background-color: #658e1a !important;
        color: white;
    }
    .span-style {
        padding: 10px;
        background-color: #658e1a;
        color: white;
    }
</style>

<!----------------------- table----------->
<?php if(isset($member_data) && $member_data!=null){ ?>
    <table class="table table-bordered" style="width:100%">
        <header>
            <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>رقم الهوية</th>
                <th>الصلة</th>
                <th>الجنس</th>
                <th>تاريخ الميلاد هجري</th>
                <th>العمر</th>
                <th>التصنيف</th>
                <th>طبيعة الفرد</th>
                <th>حالة الفرد</th>
            </tr>
        </header>
        <tbody>
        <?php

        if(isset($mothers_data) && $mothers_data!=null){ ?>
            <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo $mothers_data[0]->mother_national_num_fk; ?>"></td>
                <td><a href="#"><?php echo $mothers_data[0]->
                        full_name;   ?></a></td>
                <td><?php echo $mothers_data[0]->mother_national_num_fk; ?></td>
                <td><?php echo $mothers_data[0]->relation_name; ?> </td>
                <td><?php if($mothers_data[0]->m_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                <td><?php echo $mothers_data[0]->m_birth_date_hijri; ?> </td>
                <td>
                    <?php $age='';
                    if(isset($mothers_data[0]->m_birth_date_year) && !empty($mothers_data[0]->m_birth_date_year)
                        && isset($current_year) && !empty($current_year)){
                        $age =  $current_year  -    $mothers_data[0]->m_birth_date_hijri_year;
                    }
                    echo $age." عام";
                    ?>
                </td>
                <td>
                    <?php
                    if($mothers_data[0]->categoriey_m == 1){
                        $categoriey_m_name =  'أرملة ';
                    }elseif($mothers_data[0]->categoriey_m == 2){
                        $categoriey_m_name =  'يتيم ';
                    }elseif($mothers_data[0]->categoriey_m == 3){
                        $categoriey_m_name =  'مستفيد بالغ  ';
                    }else{
                        $categoriey_m_name =  'غير محدد  ';
                    }
                    echo $categoriey_m_name;
                    ?>
                </td>
                <td><?=$mothers_data[0]->person_type_name?></td>
                <?php
                if(isset($persons_status)&&!empty($persons_status)) {
                    $button_class ="info";
                    $button_title = "حالة الفرد " ;
                    $button_style = " " ;
                    foreach ($persons_status as $record) {
                        if($record->id == $mothers_data[0]->halt_elmostafid_m){
                            $button_title = $record->title ;
                            $button_style = "background-color:".$record->color ;
                        }
                    }
                }
                ?>
                <td style="<?php echo $button_style;?>; color: black;"><?php echo $button_title;?>
                </td>

            </tr>

        <?php }?>
        <?php

        $x=2; foreach($member_data as $row){ ?>
            <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo $row->id;  ?>"></td>
                <td><?php echo $row->member_full_name;  ?></td>
                <td><?php echo $row->member_card_num; ?></td>
                <td><?php echo $row->relation_name;  ?></td>
                <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                <td><?php echo $row->member_birth_date_hijri; ?></td>
                <td>
                    <?php $age='';
                    if( isset($row->member_birth_date_year) && !empty($row->member_birth_date_year) &&
                        isset($current_year) && !empty($current_year)   ){
                        $age =  $current_year  -    $row->member_birth_date_hijri_year;
                    }
                    echo $age." عام";
                    ?>
                </td>
                <td><?php
                    if($row->categoriey_member == 1){
                        $categoriey_member =  'أرملة ';
                    }elseif($row->categoriey_member == 2){
                        $categoriey_member =  'يتيم ';
                    }elseif($row->categoriey_member == 3){
                        $categoriey_member =  'مستفيد بالغ ';
                    }else{
                        $categoriey_member =  'غير محدد  ';
                    }
                    echo $categoriey_member;
                    ?>
                </td>
                <?php
                if(!empty($job)){
                    $job_titles_arr =array();
                    foreach ($job as $record){
                        $job_titles_arr[$record->id_setting] = $record->title_setting;
                    }
                    if(isset($job_titles_arr[$row->member_job]))
                    { echo $job_titles_arr[$row->member_job];
                    }else{
                        echo "لا يعمل ";
                    }
                }?>
                <td> <?=$row->member_person_type_name?> </td>
                <?php
                if(isset($persons_status)&&!empty($persons_status)) {
                    $button_class ="info";
                    $button_title = "حالة الفرد " ;
                    $button_style = " " ;
                    foreach ($persons_status as $record) {
                        if($record->id == $row->persons_status){
                            $button_title = $record->title ;
                            $button_style = "background-color:".$record->color ;
                        }
                    }
                }
                ?>
                <td  style="<?php echo$button_style; ?>;  color: black;">
                    <?php echo $button_title;?>
                </td>


            </tr>

            <?php $x++; } ?>
        </tbody>
    </table>


<?php } ?>
<!------------------------table---------->