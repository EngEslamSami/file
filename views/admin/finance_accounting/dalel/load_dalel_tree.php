
<h5 class="no-margin">شجرة دليل الحسابات</h5>
<div class="panel-body" style="height: 212px; overflow-y: scroll;">
    <div class="col-sm-12 col-xs-12 no-padding">
        <?php
        function buildTree($tree,$from_id)
        {
            //$color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');

            $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');


            ?>
            <ul id="tree3">
                <?php foreach ($tree as $record) { ?>
                    <li>
                        <a href="<?= base_url() . 'finance_accounting/dalel/Dalel/editAccount/' . $record->id ?>">
                                <span class="dalel-num" style="background-color: <?= $color[$record->level] ?>">
                                      <?= $record->code ?></span> <?= ' - ' . $record->name ?></a>
                        <div class="pull-right">
                            <?php if ($record->parent != 0) { ?>
                                <a onclick="$('#adele').attr('href', '<?= base_url() . "finance_accounting/dalel/Dalel/deleteAccount/" . $record->id ?>');"
                                   data-toggle="modal" data-target="#modal-delete" title="حذف"><i
                                        class="fa fa-trash"></i></a>
                            <?php } ?>
                            <a href="#" title="إضافة"
                               onclick="$('#parent<?=$from_id ?>').val(<?= $record->id ?>).selectpicker('refresh');
                                   getCode();
                                   $('#parent_name<?=$from_id ?>').val('<?= $record->code . '--' . $record->name ?>');
                                   $('#parent_code<?=$from_id ?>').val('<?= $record->code ?>');
                                   $('#ttype<?=$from_id ?>').val('<?= $record->ttype ?>');
                                   "><i
                                    class="fa fa-plus-square"></i></a>

                            <a data-toggle="modal" data-target="#editAccounDalel"
                               onclick="editAccounDalel(<?= $record->id ?>)"
                               title="تعديل الحساب"><i class="fa fa-pencil-square"></i></a>
                        </div>
                        <?php
                        if (isset($record->subs)) {
                            buildTree($record->subs,$from_id);
                        }
                        ?>
                    </li>
                <?php } ?>
            </ul>
            <?php
        }

        if (isset($tree) && $tree != null) {
            buildTree($tree,$from_id);
        }
        ?>
    </div>
</div>

