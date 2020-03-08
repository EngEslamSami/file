<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>جدول البيانات</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-12 col-xs-12 no-padding">
                <table id="example" class="table table-bordered" role="table" style="table-layout: fixed;">
                    <thead>
                    <tr class="info">
                        <th width="2%">#</th>
                        <th class="text-left" style="width: 90px;">رقم الحساب</th>
                        <th class="text-left" style=" width: 200px;">إسم الحساب</th>
                        <th class="text-left">نوع الحساب</th>
                        <th class="text-left">مستوى الحساب</th>
                        <th class="text-left">طبيعة الحساب</th>
                        <th class="text-left">التبويب</th>
                        <th class="text-left"> مدين</th>
                        <th class="text-left"> دائن</th>
                        <th class="text-left">الرصيد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree!=null) {
//                        buildTreeTable($tree);
//                    }
//                    function buildTreeTable($tree, $count=1)
//                    {
                        $types = array(1=>'رئيسي',2=>'فرعي');
                        $nature = array('','مدين','دائن');
                        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
                        //$color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
                        $color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#09b6bb', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');

                        foreach ($tree as $record) {
                            ?>
                            <tr style="background-color: <?=$color[$record->level]?>">
                                <td class="forTd"><?=0?></td>
                                <td class="forTd"><?=$record->code?></td>
                                <td class="forTd"><?=$record->name?></td>
                                <td class="forTd"><?=$types[$record->hesab_no3]?></td>
                                <td class="forTd"><?='المستوى'.$record->level?></td>
                                <td class="forTd"><?=$nature[$record->hesab_tabe3a]?></td>
                                <td class="forTd"><?=$follow[$record->hesab_report]?></td>
                                <td class="forTd">0</td>
                                <td class="forTd">0</td>
                                <td class="forTd">0</td>
                            </tr>
                            <?php
//                            if (isset($record->subs)) {
//                                $count = buildTreeTable($record->subs, $count++);
//                            }
                        }
//                        return $count;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
