

<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($records)){ ?>


                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">رقم الملف </th>
                    <th class="text-center">اسم العائلة </th>
                    <th class="text-center">إسم مسئول الحساب البنكي</th>
                    <th class="text-center">رقم الهوية  </th>
                    <th class="text-center">إسم البنك</th>
                    <th class="text-center">رقم الحساب </th>
                    <th class="text-center">عدد الافراد </th>
                    <th class="text-center">أرملة </th>
                    <th class="text-center">يتيم </th>
                    <th class="text-center">مستفيد </th>


                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $x=1;
                $total_armal=0;
                $total_yatem=0;
                $total_mostafed=0;
                $total_all=0;
                $total_value=0;
                foreach ($records as $record ){

                $total_all = $record->ff_yatem + $record->ff_armal;

                ?>
                <tr>
                    <td><?php echo $x++ ?></td>
                    <td><?php echo $record->file_num; ?></td>
                    <td><?php if(!empty($record->father_name)){echo $record->father_name;}else{echo "غير مضاف";} ?></td>
                    <td><?php if(!empty($record->bank_details)){ echo(isset($record->bank_details->person_name))? $record->bank_details->person_name:'غير مضاف'; }else{ echo "لا يوجد حساب لهذه الأسرة";}  ?></td>
                    <td><?php echo (!empty($record->bank_details))? $record->bank_details->person_national_card : "لا يوجد حساب لهذه الأسرة"; ?></td>
                    <td><?php echo (!empty($record->bank_details))? $record->bank_details->bank_name : "لا يوجد حساب لهذه الأسرة"; ?></td>
                    <td><?php echo (!empty($record->bank_details))?$record->bank_details->bank_account_num : "لا يوجد حساب لهذه الأسرة"; ?></td>
                    <td><?php  echo $total_all; ?></td>
                    <td><?php echo $record->ff_armal; ?></td>
                    <td><?php echo $record->ff_yatem; ?></td>
                    <td><?php echo $record->up_child;?></td>
                </tr>
            <?php } ?>


                </tbody>
            </table>
            <?php }  ?>

        </div>

    </div>
</div>
</div>

