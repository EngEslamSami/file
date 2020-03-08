<div class="col-sm-12">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">إسم العائلة  </th>
            <th class="text-center">رقم الهوية </th>
            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php  $x=1; foreach ($sarf_details as $row){?>
        <tr>
            <td><?=$x++;?></td>
            <td><?=$row->file_num?></td>
            <td><?=$row->mother_name?></td>
            <td><?=$row->mother_national_num_fk?></td>
            <td><?=$row->all_num?></td>
            <td><?=$row->mother_num?></td>
            <td><?=$row->young_num?></td>
            <td><?=$row->adult_num?></td>
            <td><?=$row->value?></td>
        </tr>
        <?php  }?>
        </tbody>
        </table>
</div>