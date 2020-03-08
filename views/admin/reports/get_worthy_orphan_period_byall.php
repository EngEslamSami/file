<!----------------------------------------------------->

<?php



if(!empty($records) && isset($records) && $records!=null ):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">إسم اليتيم</th>
                        <th class="text-center">المستحق</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php $a=1;foreach ($records as $record ):
                        $value=0;
                        foreach ($record->all as $row){
                            $value += $programs[$row->program_id_fk]->monthly_value;
                        }
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td> <?php echo$record->members_name['member_name']; ?></td>
                            <td> <?php echo $value?></td>
                        </tr>
                        <?php $a++;endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else :?>
    <div class="col-lg-12 alert alert-danger" >
        لا توجد مستحقات
    </div>

<?php endif;?>


