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
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">المستحق</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php $a=0;
                        foreach ($records[0]->all as $row){ $a++;?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td> <?php echo date('Y-m-d',$row->date); ?></td>
                            <td> <?php echo $programs[$row->program_id_fk]->monthly_value?></td>
                        </tr>
                        <?php   }  ?>
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


