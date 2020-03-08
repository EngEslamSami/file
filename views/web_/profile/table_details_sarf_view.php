<?php if ((isset($details_array)) && (!empty($details_array))) {
    $cat_arr = array('', 'ارملة', 'يتيم', 'مستفيد بالغ');
    $val_arr = array('', $details_array['sarf']->value_armal,
        $details_array['sarf']->value_yatem,
        $details_array['sarf']->value_mostafed); ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>اسم المستفيد</th>
            <th>التصنيف</th>
            <th>المبلغ المصروف له</th>
        </tr>
        </thead>
        <tbody>
        <?php if ((!empty($details_array['mother']))) {
            ?>
            <tr>
                <td><?= $details_array['mother']->mother_name ?></td>
                <td><?= $cat_arr[1] ?></td>
                <td><?= $val_arr[1] ?></td>
            </tr>
        <?php
        }?>
        <?php if ((!empty($details_array['member']))) {

            foreach ($details_array['member'] as $member) {
                ?>
                <tr>
                    <td><?= $member->member_full_name ?></td>
                    <td><?= $cat_arr[$member->categoriey_member] ?></td>
                    <td><?= $val_arr[$member->categoriey_member] ?></td>
                </tr>
            <?php }
        } ?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="2" class="text-center">الإجمالي</th>
            <th class="text-center" ><?=$details_array['sarf']->value?>  </th>
        </tr>
        </tfoot>
    </table>
<?php } ?>