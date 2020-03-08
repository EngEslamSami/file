<style type="text/css">
    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        height: 34px !important;
        border-radius: 4px !important;
        margin: 0 !important;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }

    .btn-label {
        left: 12px;
    }


    .list::-webkit-calendar-picker-indicator {
        display: none;
    }

    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }

    input[type=date]::-webkit-clear-button {
        display: none;
        -webkit-appearance: none;
    }


    .fa-plus.sspan {
        background-color: #5b69bc;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }


    td .fa-trash {
        border-radius: 7px !important;
    }

    .fa-plus.sspan {

        border-radius: 7px !important;
        font-size: 15px !important;
    }


    .radio label, .checkbox label {

        font-size: 17px !important;
        font-weight: bold !important;

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


    .btn-group .dropdown-menu > li > a {
        color: #0f0f0f;
        font-weight: 600;
        padding: 5px 5px;
    }

    .btn-group .dropdown-menu {
        left: 0;
        right: auto;
    }


    td input[type=radio] {
        height: 20px;
        width: 20px;
    }


</style>

<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($result) && !empty($result)) {
                $geha_name = $result->geha_name;
                $subscriber_name = $result->subscriber_name;
                $subscription_number = $result->subscription_number;
                $mrakz_tklfa_id_fk = $result->mrakz_tklfa_id_fk;
                $rkm_hesab = $result->rkm_hesab;
                $hesab_name = $result->hesab_name;
                $alert_time = $result->alert_time;
                $subscription_type = $result->subscription_type;
                $button1 = 'display:none';
                $button2 = '';
                $form_action = 'finance_accounting/add_fatora/Add_fatora/update/'.$result->id;
            } else {
                $geha_name = '';
                $subscriber_name = '';
                $subscription_number = '';
                $mrakz_tklfa_id_fk = '';
                $rkm_hesab = '';
                $hesab_name = '';
                $alert_time = '';
                $subscription_type = '';
                $button2 = 'display:none';
                $button1 = '';
                $form_action = 'finance_accounting/add_fatora/Add_fatora/insert';
            }
            ?>

            <div class="col-sm-12 form-group">
                <?php if(!empty($records)){ ?>
                    <table id="" class="table table-bordered example" role="table">
                        <thead>
                        <tr class="info">
                            <th width="2%">#</th>
                            <th class="text-left">رقم المشترك/رقم الحساب</th>
                            <th class="text-left">تاريخ الخدمة</th>
                            <th class="text-left">إسم الجهة</th>
                            <th class="text-left">إسم المشترك</th>
                            <th class="text-left"> مركز التكلفة</th>
                            <th class="text-left">رقم الحساب</th>
                            <th class="text-left">إسم الحساب</th>
                            <th class="text-left">حالة السداد</th>
                            <th class="text-left">طريقة السداد</th>
                            <th class="text-left">إسم الحساب</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $value) {

                            ?>
                            <tr>
                                <td><input type="checkbox" name="selected" id="selected"></td>
                                <td><?php echo $value->subscription_number ?></td>
                                <td><?php echo $value->date_ar ?></td>
                                <td><?php echo $value->geha_name ?></td>
                                <td><?php echo $value->subscriber_name ?></td>
                                <td><?php echo $value->mrakz_tklfa_title ?></td>
                                <td><?php echo $value->rkm_hesab ?></td>
                                <td><?php echo $value->hesab_name ?></td>
                                <td>حالة السداد</td>
                                <td>طريقة السداد</td>
                                <td>إسم الحساب</td>
                            </tr>
                            <?php
                        }

                        ?>
                        </tbody>
                    </table>
                <?php } ?>

            </div>

        </div>


    </div>


</div>


