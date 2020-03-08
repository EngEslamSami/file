
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >

<style type="text/css">

    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }

    .checkbox-statement span{
        margin-right: 3px;
        position: absolute;
        margin-top: 5px;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 90px;
    }
    .no-border{
        border:0 !important;
    }
    .table-devices tr td{
        width: 30%;
        min-height: 20px
    }
    .gray_background{
        background-color: #eee;

    }
    table.th-no-border th,
    table.th-no-border td
    {
        border-top: 0 !important;
    }


    .piece-heading {
        background-color: #428bca;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .main-header img{
        height: 100px;
    }
    @media print{
        #rightlogo{
            width: 450px;
        }
    }

</style>

<div id = "printdiv" >
    <div class="main-header">
        <div class="col-xs-6">
            <img src="<?php echo base_url();?>asisst/admin_asset/print/right-header.jpg" id="rightlogo">
        </div>
        <div class="col-xs-6">
                <h5 class="text-center">المملكة العربية السعودية </h5>
                <h5 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h5>
                <h5 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h5>

        </div>
    </div>
    <div class="clearfix">

    </div><br>

    <div class="piece-box no-border ">
        <div class="piece-heading">
            <div class="col-xs-4">
                <h5>رقم الطلب : <?php echo $record->id; ?></h5>
            </div>
            <div class="col-xs-5 ">

            </div>
            <div class="col-xs-3">
                <h5>التاريخ : <?=date('Y-m-d')?></h5>
            </div>
        </div>
    </div>

    <div class="clearfix">

    </div><br>

    <table id="" class="table table-striped table-bordered" >
        <thead>
        <tr>
            <th class="piece-heading">بيانات الاسرة</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>اسم الاسرة / <?php echo $record->father_name; ?></td>
        </tr>
        <tr>
            <td>السجل المدني /   <?php echo $record->mother_national_num; ?></td>
        </tr>


        </tbody>
    </table>
    <br>
    <br>
    <?php if(isset($main_attach_files) && !empty($main_attach_files) ){?>
        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr style="background-color: #00aced">
                <td>م</td>
                <td>نوع الطلب</td>
                <td>حالة الطلب</td>
                <td>ملاحظات</td>
            </tr>
            </thead>
            <tbody>
            <?php $status = array('غير نشط','نشط'); $y=1;
           
                foreach ($main_attach_files as $file_row) {
                    if (isset($record->required_files[$file_row->id_setting])) {
                    if ($record->required_files[$file_row->id_setting]->doc_id_fk != $file_row->id_setting) {
                        continue;
                    }



                ?>

                <tr>
                    <td><?= $y ?>
                    </td>
                    <td><?=$file_row->title_setting?></td>
                    <td>


                            <?php foreach ($status as $key=>$value){ ?>

                                    <?php
                                    if(isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])){
                                        if( $record->required_files[$file_row->id_setting]->doc_status_fk ==$key){
                                            echo $value;
                                        }}
                                    ?>

                            <?php } ?>


                    </td>
                    <td>
                        <?php
                        if(isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])){

                            echo $record->required_files[$file_row->id_setting]->doc_notes;
                        }
                        ?>

                    </td>
                </tr>
            <?php }
                $y++;
                } ?>
            </tbody>
        </table>
        <br>
        <br>
    <?php }  ?>


    <table id="" class="table table-striped table-bordered" >
        <thead>
        <tr style="background-color: #428bca;">

            <th >الموظف / الموظفة</th>
            <th ></th>
            <th >الجوال</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>المستلم </td>
            <td>التوقيع </td>
            <td>تاريخ الإستلام&nbsp; &nbsp; &nbsp; &nbsp;  / &nbsp; &nbsp; &nbsp;&nbsp;  /    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                &nbsp;</td>
        </tr>



        </tbody>
    </table>

    </div>


<script >
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('family_controllers/Family/AddNewRegister') ?>";
    }, 5000);
</script >