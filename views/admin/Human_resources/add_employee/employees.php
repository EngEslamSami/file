<!------ table -------->

<?php

if(isset($customer_js)&&!empty($customer_js))

{ ?> 

    

    <div class="col-xs-12 no-padding">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

            <div class="panel-heading">

                <h3 class="panel-title">بيانات الموظفين</h3>

            </div>

            <div class="panel-body">

                <div class="col-md-12 no-padding">



                <table id="js_table_customer" 

   

   class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">

                        <thead>

                        <tr class="info">

                            <th class="text-center">م</th>

                            <th>كود الموظف</th>

                            <th class="text-center">إسم الموظف</th>

                            <th>رقم الجول</th>

                            <th>رقم الهوية</th>

                            <th>الجنسية</th>

                            <th>الحالة</th>



                            <th class="text-center">الاجراءات</th>

                        </tr>

                        </thead>

                            

                    </table>



                </div>

            </div>

        </div>

    </div>

<?php } ?>

<!----- end table ------>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php



   

echo $customer_js;

 

    

?>   
<script>

function print_employee_details(row_id) {

    var request = $.ajax({

        // print_resrv -- print_contract

        url: "<?=base_url() . 'human_resources/Human_resources/print_employee_details'?>",

        type: "POST",

        data: {row_id: row_id},

    });

    request.done(function (msg) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');

        WinPrint.document.write(msg);

        WinPrint.document.close();

        WinPrint.focus();

        /*  WinPrint.print();

        WinPrint.close();*/

    });

    request.fail(function (jqXHR, textStatus) {

        console.log("Request failed: " + textStatus);

    });

}





</script> 



<script>

function print_card(row_id) {

    var request = $.ajax({

        // print_resrv -- print_contract

        url: "<?=base_url() . 'human_resources/Human_resources/print_card'?>",

        type: "POST",

        data: {row_id: row_id},

    });

    request.done(function (msg) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');

        WinPrint.document.write(msg);

        WinPrint.document.close();

        WinPrint.focus();

        /*  WinPrint.print();

        WinPrint.close();*/

    });

    request.fail(function (jqXHR, textStatus) {

        console.log("Request failed: " + textStatus);

    });

}





</script> 