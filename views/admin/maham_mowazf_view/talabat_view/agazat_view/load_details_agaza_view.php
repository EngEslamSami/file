<!--load_details_agaza_view-->

<?php
if (isset($item) && !empty($item)) {
    ?>
    <table class="table table-bordered" style="table-layout: fixed">
        <thead>
        <tr class="info">
            <th colspan="4" class="bordered-bottom">تفاصيل الاجازه</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th class="gray-background">نوع الاجازه:</th>
            <td width="15%"><?php echo $item->name; ?></td>
            <th class="gray-background">تاريخ بدايه الاجازه:</th>
            <th width="20%"><?php echo $item->agaza_from_date_m; ?></th>

        </tr>
        <tr>
            <th class="gray-background">تاريخ نهايه الاجازه:</th>
            <td><?php echo $item->agaza_to_date_m; ?></td>
            <th class="gray-background">عددايام الاجازه:</th>
            <td><?php echo $item->num_days; ?></td>

        </tr>

        <tr>
            <th class="gray-background">تاريخ مباشره العمل:</th>
            <td><?php echo $item->mobashret_amal_date_m; ?></td>
            <th class="gray-background">الموظف البديل:</th>
            <td><?= ($item->emp_badel_n != null) ? $item->emp_badel_n : 'لم يحدد'; ?></td>

        </tr>
        <tr>
            <th class="gray-background">العنوان اثناء الاجازه:</th>
            <td><?php echo $item->address_since_agaza; ?></td>
            <th class="gray-background">االجوال اثناء الاجازه:</th>
            <td><?php echo $item->emp_jwal; ?></td>


        </tr>
        </tbody>
    </table>
<?php } ?>
