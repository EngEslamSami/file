                       
            <style>

    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }

    .form-group {
        margin-bottom: 0px !important;
    }

    .modal-header {
        padding: 5px 15px;
    }

    table .form-control {
        padding: 0px 0px;
        /* height: 26px; */
        font-size: 14px;
    }


    .bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*=col-] {
        width: 100%;
    }


    #check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }

    .check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }


    .check_large2 {
        width: 18px;
        height: 18px;
    }

    .check_large {
        width: 18px;
        height: 18px;
    }

    label.checktitle {
        margin-top: -24px;
        display: block;
        margin-right: 24px;
    }


    .table-pd,
    .table-pd > tbody > tr > td,
    .table-pd > tbody > tr > th,
    .table-pd > tfoot > tr > td,
    .table-pd > tfoot > tr > th,
    .table-pd > thead > tr > td,
    .table-pd > thead > tr > th {
        border: 1px solid #ddd;
        padding: 2px 8px;

    }

    .table > thead > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tfoot > tr > td {
        font-size: 18px;
        font-weight: bold;
    }

    .table > tbody > tr > th,
    .table > tbody > tr > td {

        font-size: 16px;

    }


    @media (min-width: 768px) {
        .modal-dialog {

            margin: 10% auto;
        }

        .col_md_15 {
            width: 15%;
            float: right;
        }

        .col_md_20 {
            width: 20%;
            float: right;
        }

        .col_md_25 {
            width: 25%;
            float: right;
        }

        .col_md_30 {
            width: 30%;
            float: right;
        }

        .col_md_32 {
            width: 32%;
            float: right;
        }

        .col_md_35 {
            width: 35%;
            float: right;
        }

        .col_md_40 {
            width: 40%;
            float: right;
        }

        .col_md_45 {
            width: 45%;
            float: right;
        }

        .col_md_50 {
            width: 50%;
            float: right;
        }

        .col_md_55 {
            width: 55%;
            float: right;
        }

        .col_md_60 {
            width: 60%;
            float: right;
        }

        .col_md_65 {
            width: 65%;
            float: right;
        }

        .col_md_68 {
            width: 68%;
            float: right;
        }

        .col_md_70 {
            width: 70%;
            float: right;
        }

        .col_md_75 {
            width: 75%;
            float: right;
        }

        .col_md_80 {
            width: 80%;
            float: right;
        }

        .col_md_85 {
            width: 85%;
            float: right;
        }

        .col_md_90 {
            width: 90%;
            float: right;
        }

        .col_md_95 {
            width: 95%;
            float: right;
        }

        .col_md_100 {
            width: 100%;
            float: right;
        }
    }

    .modal-body {
        position: relative;
        padding: 5px 15px;
    }

    .modal-footer {
        padding: 5px 15px;
    }

    .fixed-table {
        table-layout: fixed;
    }

    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
        float: right;
        display: block;
        width: 100%;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }

    /*	.form-control{
            font-size: 15px;
            color: #000;
            border-radius: 4px;
            border: 2px solid #b6d089 !important;
        }*/
    .form-control {
        font-size: 14px;
    }

    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .tab-content {
       /* margin-top: 15px; */
    }

    .btn-group .dropdown-menu > li > a {
        color: #0f0f0f;
        font-weight: 600;
        padding: 5px 5px;
    }

    .btn-group .dropdown-menu {
        left: 0;
        right: auto;
    }


</style>           
                        <div class="col-xs-12 ">
                            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

                                <div class="panel-body">
                                    <?php if(isset($family_sarf) && !empty($family_sarf) ){?>
                                        <table class=" example display table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="greentd">
                                                <th>م</th>
                                                <th>رقم الصرف</th>
                                                <th>اسم بند المساعدة</th>
                                                <th>بتاريخ</th>
                                                <th>قيمة المساعدة</th>
                                                <th>خلال شهر </th>

                                            </tr>

                                            </thead>
                                            <tbody>
                                            <?php
                                            $x=1 ;
                                            $total = 0;
                                             foreach($family_sarf as $row ){
                                                 $total += $row->value;
                                                 ?>
                                                <tr>
                                                    <td><?=$x++;?></td>
                                                    <td><?= $row->sarf_num_fk?></td>
                                                    <td><?php
                                                        if (!empty($row->band_name->title)){
                                                            echo $row->band_name->title;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }
                                                        ?></td>
                                                    <td><?php if (!empty($row->sarf->sarf_date_ar)){
                                                            echo $row->sarf->sarf_date_ar;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }?></td>
                                                    <td><?php
                                                        if (!empty($row->value)){
                                                            echo $row->value;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($row->sarf_month)){
                                                            echo $row->sarf_month;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                            <!--
                                            <tfoot>
                                              <th colspan="4" style="text-align: center">الاجمالي</th>
                                              <th colspan="2"style="text-align: center" ><?= $total?></th>
                                            </tfoot>
-->


                                        </table>
                                    <?php } else{
                                        ?>
                                        <div class="alert alert-danger">عفوا... لا يوجد بيانات !</div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>