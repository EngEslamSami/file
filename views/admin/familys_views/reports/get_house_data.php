
<?php
if(!empty($all_records) && isset($all_records) && $all_records!=null ):
    $gender_arr=array('','ذكر','أنثى');
    ?>
    <div class="col-xs-12">
        <div class="panel-body">
            <div class="fade in active">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label>عدد المستفيدين بالدار</label>
                        <input type="text" readonly style="width: 60px; text-align: center;   border: 1px solid #ccc; border-radius: 4px;" value="<?php echo sizeof($all_records);?>">
                        <label>مستفيد</label>
                    </div>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">إسم المستفيد</th>
                        <th class="text-center">رقم الهوية</th>
                        <th class="text-center">النوع</th>
                        <th class="text-center">العمر</th>
                        <th class="text-center">حالة المستفيد</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $a=1;
                    foreach ($all_records as $record ):?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><?echo $record->member_full_name; ?></td>
                            <td><?echo $record->member_card_num; ?></td>
                            <td><? if(!empty($gender_arr[$record->member_gender])){ echo $gender_arr[$record->member_gender]; } ?></td>
                            <td><?   if(!empty($record->member_birth_date_year) >0){  echo date('Y-m-d')-$record->member_birth_date_year;}else{echo 0;} ?></td>
                            <td><? if(!empty($person_type[$record->member_person_type])){ echo $person_type[$record->member_person_type]; } ?></td>
                        </tr>
                        <?php
                        $a++;
                    endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else :?>
    <div class="col-lg-12 alert alert-danger" >
        لا يوجد بيانات لعرضها
    </div>

<?php endif;?>


