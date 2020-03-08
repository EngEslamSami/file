


<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>


<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تقرير كفالات عام</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-12">



                <?php
                if(!empty($records) || !empty($records)){?>

                    <table    class=" display table table-bordered   responsive nowrap"
                              cellspacing="0" width="100%">
                        <thead>
                        <tr class="text-center">
                            <th>م</th>
                            <th>رقم الملف</th>
                            <th>اسم المستفيد</th>
                            <th>العمر</th>
                            <th>حالة المستفيد</th>
                            <th>نوع الكفالة</th>
                            <th>اسم الكافل</th>
                            <th>حالة الكافل</th>
                            <th>بدايه الكفالة</th>
                            <th>نهايه الكفالة</th>
                            <th>متبقي كام يوم</th>
                            <th>حالة الكفالة</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php $x=1;

                        $kfalat_types =array('1'=>'شاملة','2'=>'نصف كفالة','3'=>'كفالة مستفيد','4'=>'كفالة أرامل');
                        foreach ($records as $row){?>
                            <tr>
                                <td><?=$x?></td>
                                <td><?php echo $row['file_num'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['age'];?></td>
                                <td></td>
                                <td><?php if(!empty($kfalat_types[$row['kafala_type_fk']])){  echo$kfalat_types[$row['kafala_type_fk']]; }?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $row['first_date_from_ar'];?></td>
                                <td><?php echo $row['first_date_to_ar'];?></td>
                                <td></td>
                                <td></td>
                            </tr>


                        <?php  $x++;} ?>

                        </tbody>
                    </table>

                <?php } else{?>
                    <div class="alert alert-danger">عفوا لاتوجد نتائج</div>
                <?php } ?>



            </div>
        </div>
    </div>
</div>


















