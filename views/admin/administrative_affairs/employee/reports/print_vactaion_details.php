<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">

    <style>
    body {
        font-family: 'Cairo', sans-serif;
    }

    .r-table {
        margin-bottom: 15px;
    }

    .r-table th {
        width: 20%;
        background-color: #333;
        color: #fff;
        border: 1px solid #333;
        padding: 7px 0;
        font-size: 13px;
    }

    .r-table td {
        border: 1px solid #333;
        padding: 10px 0;
    }

</style>
    </head>
<body>



<div id="printdiv"  >

<header class="col-xs-12">
        <div class="col-xs-4" style="padding: 0">
            <h6 class="text-center">المملكة العربية السعودية</h6>
            <h6 class="text-center"> (نراحم) الجمعية الخيرية لرعاية المعاقين بحائل</h6>
            <h6 class="text-center"> مسجل برقم <span> ( 605 ) </span></h6>
            <h6 class="text-center">تحت إشراف وزارة الشؤون الاجتماعية</h6>

        </div>
        <div class="col-xs-4">
            <img src="<?= base_url().'asisst/fav/asisstfavms-icon-70x70.png'  ?>" alt="" class="center-block" width="100%">
        </div>
        <div class="col-xs-4">
            <h6 class="text-center" style="margin-top: 50px;">تاريخ اليوم (<?= date('Y/m/d') ?>)</h6>
        </div>
    </header>
<?php $days=0;    if(isset($employee->vacations) && !empty($employee->vacations) && $employee->vacations !=null ){


foreach ($employee->vacations as $vacation) {
                $x = 1;
            $days += $vacation->get_vacation->days_num;
    $x++; }
    }
?>
    <div class="col-xs-12" style="margin-top: 25px; margin-bottom: 25px">
        <div class="container">
            <div class="col-xs-12">
                <div class="col-xs-12" style="padding: 0; margin-bottom: 25px;">
                    <h4 class="text-center">بيان بأجازات وأذونات موظف </h4>
                    <hr style="width: 30%; border-color: #000;">
                    <h4 class="text-center" style="margin-bottom: 30px"> خلال شهر <span>( <?= date('n') ?> )</span> عام <span> ( <?= date('Y') ?> )</span> </h4>
                    <div class="col-xs-6">
                        <table class="r-table" style="width:100%">
                            <tr>
                                <td class="text-center" style="width: 50%">إسم الموظف </td>
                                <td class="text-center" style="width: 50%"> <?= $employee->employee ?> </td>
                            </tr>
                            <tr>
                                <td class="text-center"> إسم الاداره</td>
                                <td class="text-center"><?= $employee->depart_name ?>  </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-6">
                        <table class="r-table" style="width:100%">
                            <tr>
                                <td class="text-center" style="width: 50%">عدد ايام الاجازات</td>
                                <td class="text-center" style="width: 50%">  <?= $days ?> </td>
                            </tr>
                            <tr>
                                <td class="text-center">عدد الاذونات</td>
                                <td class="text-center"> <?= count($employee->permits) ?> </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <?php if(isset($employee->permits) && !empty($employee->permits) && $employee->permits !=null ){ ?>
                <div class="col-xs-12" style="margin-bottom: 25px;">
                    <h5> 1- بيان الاذونات</h5>
                    <hr style="width: 12%; border-color: #000; margin-top: 5px; display: inline-block;">
                    <table class="r-table" style="width:100%">
                        <tr>
                            <td class="text-center">م</td>
                            <td class="text-center">رقم الطلب</td>
                            <td class="text-center">تاريخ الاذن</td>
                            <td class="text-center">وقت الخروج</td>
                            <td class="text-center">مدة الاستأذان</td>
                            <td class="text-center">وقت الرجوع</td>
                        </tr>
                        <?php $x=1; 
                        foreach ($employee->permits as $permit){ ?>
                        <tr>
                            <td class="text-center"> <?= $x ?>  </td>
                            <td class="text-center"> <?= $permit->id ?> </td>
                            <td class="text-center"> <?= date('Y/m/d', $permit->permit_date) ?> </td>
                            <td class="text-center"> <?= $permit->time_out ?> </td>
                            <td class="text-center"><?= $permit->ozon_time ?> ساعات </td>
                            <td class="text-center"><?= $permit->time_return ?>  </td>
                        </tr>
                         <?php $x++; }  ?>
                    </table>
                </div>
                <?php } ?>
                <?php if(isset($employee->vacations) && !empty($employee->vacations) && $employee->vacations !=null ){ ?>    
                <div class="col-xs-12" style="margin-bottom: 25px;">
                    <h5>2- بيان الاجازات</h5>
                    <hr style="width: 12%; border-color: #000; margin-top: 5px; display: inline-block;">
                    <table class="r-table" style="width:100%">
                        <tr>
                            <td class="text-center">م</td>
                            <td class="text-center">تاريخ الطلب</td>
                            <td class="text-center">نوع الاجازه</td>
                            <td class="text-center">عدد ايام الاجازه </td>
                            <td class="text-center">بدايه الاجازه</td>
                            <td class="text-center">نهاية الاجازه</td>
                        </tr>
                        <?php  $x=1; foreach ($employee->vacations as $vacation){ ?>
                        <tr>
                            <td class="text-center"> <?= $x ?>  </td>
                            <td class="text-center"> <?= $vacation->vacation_date ?> </td>
                            <td class="text-center"> <?= $vacation->get_vacation->title ?> </td>
                            <td class="text-center"> <?= $vacation->get_vacation->days_num ?> </td>
                            <td class="text-center"><?= $vacation->from_date ?> </td>
                            <td class="text-center"><?= $vacation->to_date ?></td>
                        </tr>
                            <?php $x++; } ?>
                    </table>
                </div>
                  <?php } ?>
                <div class="col-xs-12" style="margin-top: 25px">
                    <div class="col-xs-4">
                        <h5 class="text-center">المدير العام </h5>
                        <h5 class="text-center"> ........... </h5>
                    </div>
                    <div class="col-xs-4">
                        <h5 class="text-center">المدير التنفيذي </h5>
                        <h5 class="text-center"> ........... </h5>
                    </div>
                    <div class="col-xs-4">
                        <h5 class="text-center">المدير المالي </h5>
                        <h5 class="text-center"> ........... </h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/bootstrap-arabic.min.js "></script>
    <script src="js/jquery-1.10.1.min.js "></script>
</div>

<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    setTimeout(function () {location.replace("<?php echo base_url('Administrative_affairs/EmployeeVacationsReport')?>");}, 5000);
</script>