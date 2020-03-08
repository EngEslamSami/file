<?php
if (isset($lagna_member) && !empty($lagna_member)) { ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم العضو</th>
            <th scope="col">الوظيفه داخل اللجنه</th>
            <th scope="col">الوظيفه الأساسيه</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $types = array(0 => "عضو خارجي", 1 => "مجلس الاداره", 2 => "الجمعيه العموميه", 3 => "الموظفين");
        if (isset($lagna_member) && !empty($lagna_member)) {
            $x = 1;
            foreach ($lagna_member as $row) {
                ?>
                <tr>
                    <th scope="row"><input type="checkbox" member_name="<?php echo $row->member_name; ?>"
                                           member_type="<?php echo $row->type; ?>"
                                           member_id="<?php echo $row->member_id; ?>" class="member"></th>
                    <td><?php echo $row->member_name; ?></td>
                    <td><?php echo $row->member_job; ?></td>
                    <td><?php echo $types[$row->type]; ?></td>
                </tr>
                <?php
                $x++;
            }
        }
        ?>
        </tbody>
    </table>
    <?php
}else {
    ?>

    <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء ف اللجنه  </div>
    <?php
}
?>
