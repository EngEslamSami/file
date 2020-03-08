

<style type="text/css">
    label.label{
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
</style>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
         <!--   <div class="panel-body"> -->
          <div class="panel-body" style="height: 500px;overflow-y: scroll;">
                <form id="myform">
                    <div class="col-md-12 no-padding">

                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ">  الفترة من </label>
                            <input type="date" name="from_date" id="from_date" class="form-control  bottom-input">
                        </div>


                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ">  الفترة إلي </label>
                            <input type="date" name="to_date" id="to_date" class="form-control  bottom-input">
                        </div>

                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label ">  المستلم </label>
                            <select name="recived" id="recived" class="form-control   bottom-input  " >
                                <option value="">إختر</option>
                               <option value="1"> اسامه </option>
                                <option value="2"> احمد  </option>
                                <option value="3"> محمد  </option>
                            </select>

                        </div>



                        <div class="form-group col-md-2  col-sm-6 padding-4">
                            <label class="label ">طبيعه السند</label>
                            <select id="place_supply" name="place_supply" onchange="fill_select($(this).val())" class="form-control input_style_2 inputclass bottom-input">
                                <option value="">إختر</option>
                                <option value="1"> سند قبض</option>
                                <option value="2"> سند صرف</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label l">  نوع السند </label>
                            <select id="type_sand" name="type_sand" class="form-control input_style_2 inputclass bottom-input" onchange="GEtF2a(this.value,'tabro3');">
                                <option value="">إختر  </option>
                                <?php if(!empty($esal_type)){  foreach ($esal_type as $row){ ?>
                                    <option value="<?=$row->from_id?>"><?=$row->title?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 ">


                            <button type="button" class="btn btn-labeled btn-success" name="add" style="margin-top: 20px;"   onclick="SearchTable()">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>بحث
                            </button>
                        </div>

                    </div>



                </form>
            </div>
        </div>





    </div>



    <div class="col-sm-12 ">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">نتيجة البحث</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12 no-padding result">
                    <div class="alert alert-info" style="color: #0bc4a2;"> الرجاء ادخال بيانات البحث والبحث لاظهار النتيجة</div>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
    function fill_select(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>finance_accounting/box/reports/Report/make_select",
            data:{valu:valu},
            success:function(d){

                //alert(d);
                $('#type_sand').html(d);




            }

        });
    }


</script>

<script>
    function SearchTable()
    {

        var from = $('#from_date').val();
        var to = $('#to_date').val();
        var place_supply = $('#place_supply').val();
        var type_sand = $('#type_sand').val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>finance_accounting/box/reports/Report/get_result",
            data:{from:from,to:to,place_supply:place_supply,type_sand:type_sand},
            success:function(d){

                $('.result').html(d);



            }

        });
    }


</script>
