<?php if(!empty($reco) && isset($reco) && $reco!=null ):?>

<?php if(!empty($orphans) && isset($orphans) && $orphans!=null ):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">عدد الايتام</th>
                        <th class="text-center">الأجمالي</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php  foreach ($orphans as $record ):?>
                        <tr>

                            <td>

                                <?php
                                $sum=0;
                                foreach ($orp as $rec ) {
                                    $count=count($rec);
                                    $sum += $count;
                                }
                                echo $sum;
                                ?>

                            </td>
                            <td>
                                <?php echo $record->ptotal ?>
                            </td>
                        </tr>
                    <?php  endforeach;  ?>
                    </tbody>
                </table>
            </div>

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">اسم اليتيم</th>
                        <th class="text-center">الاجمالي</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php $a=1; foreach ($reco as $record ):?>
                        <tr>
                            <td><?php echo $a; ?></td>
                            <td>
                                <?php
                                if($record->orphans_id_fk){
                                    $this->db->select('*');
                                    $this->db->from('f_members');
                                    $this->db->where('id',$record->orphans_id_fk);
                                    $query2 = $this->db->get();
                                    $dataa2= $query2->row_array();

                                    echo $dataa2['member_name'] ;
                                }else{

                                }
                                ?>
                            </td>
                            <td> <?php echo $record->ptotal ?></td>

                        </tr>
                        <?php  $a++; endforeach;  ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php else :?>
    <div class="col-lg-12 alert alert-danger" >
        لا يوجد
    </div>

<?php endif;?>
<?php else :?>
    <div class="col-lg-12 alert alert-danger" >
        لا يوجد
    </div>

<?php endif;?>
