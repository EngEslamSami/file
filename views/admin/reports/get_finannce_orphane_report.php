<!----------------------------------------------------->




<?php if(!empty($records) && isset($records) && $records!=null ):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                    <tbody class="text-center">
                    <?php  foreach ($recs as $record ):?>
                        <tr>
                            <th class="text-center">اسم اليتيم</th>
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
                            <th class="text-center">الاجمالي</th>
                            <td> <?php echo $record->ptotal ?></td>

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
                        <th class="text-center">تاريخ اليوم</th>
                        <th class="text-center">المستحقة</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php  $a=1; foreach ($records as $record ):?>
                        <tr>
                            <td> <?php echo  $a ?></td>
                            <td> <?php echo  date('Y-m-d',$record->date); ?></td>
                            <td> <?php echo $record->total ?></td>
                            
                        </tr>
                        <?php $a++; endforeach;  ?>
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


