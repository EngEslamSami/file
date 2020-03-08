<?php      if($form_type == 1){
    
    echo '<pre>';
    print_r($member_data);
    echo '<pre>';
    ?>





          
<?php }elseif($form_type == 2){?>

            <!----------------------- table----------->

            <?php if(isset($member_data) && $member_data!=null): ?>
                     <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                   
                    <header>
                        <tr>
                        <th>#</th>
                            <th>م </th>
                            <th>الإسم</th>
                            <th> إسم الام</th>
                            <th>رقم الهوية</th>
                            <th>الجنس </th>
                            <th>العمر</th>
                            <th>المرحلة</th>
                            <th>الصف</th>
                          
                
                        </tr>
                    </header>
                    <tbody>

                    <?php  $x=0; foreach($member_data as $row):
                    $x++;
                    ?>
                        <tr>
                         <td><input type="checkbox" name="members[]" value="<?php echo $row->id ?>" /></td>
                       
                            <td><?php echo $x;?></td>
                            <td><?php echo $row->member_full_name;  ?></td>
                            <td><?php echo $row->mother_name; ?></td>
                            <td><?php echo $row->member_card_num; ?></td>
                            <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                            <td>
                                <?php $age='';
                                if($row->member_birth_date_year !='' && $row->member_birth_date_year !=0){
                                    $age=date('Y-m-d')-$row->member_birth_date_year;
                                }

                                echo $age." عام";
                                ?>
                            </td>
                
                            <td><?php if(!empty($row->stage_name)){echo $row->stage_name;}  ?></td>
                            <td><?php if(!empty($row->class_name)){echo $row->class_name; } ?></td>
                
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif;  ?>


            <!------------------------table---------->

<?php }elseif($form_type == 3){?>





<?php }elseif($form_type == 4){?>






<?php }?>







