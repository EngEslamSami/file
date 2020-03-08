<style>
    label.label {
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

    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
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


    .my_style {

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }

    .radio input[type=radio],
    .radio-inline input[type=radio],
    .checkbox input[type=checkbox],
    .checkbox-inline input[type=checkbox],
    input[type=radio], input[type=checkbox] {
        position: absolute;
        margin-top: 4px \9;
        margin-right: -28px;
        width: 23px;
        height: 23px;
        margin-left: 5px;
    }

</style>

<div class="col-sm-12 no-padding ">
    <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                    <?php
                    function recorrer_niveles(&$array, $nivel, &$parent, &$original)
                    {
                        $nivel++;
                        if (isset($array) and $array != null) {
                            foreach ($array as $key => $item) {
                                //  $cantidad = $array[$key]["num"];
                                $cantidad = 0;
                                $array[$key]["Total_maden"] = $cantidad;
                                $array[$key]["Total_dayen"] = $cantidad;
                               $cuenta =0;
                                  if(isset($parent) and $parent != null){
                                $cuenta = count($parent);
                                }
                                for ($i = $nivel; $i < $cuenta; $i++) {
                                    unset($parent[$i]);
                                } // for
                                sum_original($original, $parent, $array[$key]["all_maden"], $array[$key]["all_dayen"]);
                                $parent[$nivel] = $array[$key]["code"];
                                recorrer_niveles($array[$key]["children"], $nivel, $parent, $original);
                            } // foreach
                        }
                    } // function

                    function sum_original(&$original, $parent, $cantidad, $cantidad2)
                    {
                        if (!is_array($parent)) return 0;

                        if (isset($original) and $original != null) {
                            foreach ($original as $key => $value) {
                                if (isset($original[$key]["code"]) && in_array($original[$key]["code"], $parent)) {
                                    $original[$key]["Total_maden"] += $cantidad;
                                    $original[$key]["Total_dayen"] += $cantidad2;


                                } // if
                                sum_original($original[$key]["children"], $parent, $cantidad, $cantidad2);
                            } // foreach
                        }

                    } // function


                    /*****************************************************************/
                    $parent = null;
                    recorrer_niveles($records, -1, $parent, $records);

                      /*echo "<pre>";
                      print_r($records);
                      echo "</pre>";
                      die;*/
                    ?>


                    <table id="example" class="table table-bordered res" role="table">
                    <thead>
                    <tr class="info">
                        <th width="2%">#</th>
                        <th class="text-left">رقم الحساب</th>
                        <th class="text-left">إسم الحساب</th>
                        <th class="text-left">المدين</th>
                        <th class="text-left">الدائن</th>
                        <th class="text-left">الرصيد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($records) && $records!=null) {
                        buildTreeTable($records);
                    }
                    function buildTreeTable($tree, $count=1)
                    {
                        $s =0;
                        $value =0;
                        foreach ($tree as $record) {


                            if (empty($record['children'])) {
                                $dayen =$record['all_dayen'];
                                $maden =$record['all_maden'];

                            }else{

                                $dayen =$record['Total_dayen'];
                                $maden =$record['Total_maden'];

                            }



                            if ($s == 0) {
                                if($record['type'] ==2){
                                    $value =($dayen - $maden);

                                }elseif ($record['type'] ==1){
                                    $value =($maden - $dayen);
                                }

                            }elseif($s >0) {

                                if($record['type'] ==2){
                                    $value = $value + ($dayen - $maden);
                                }elseif ($record['type'] ==1){
                                    $value = $value + ($maden - $dayen);
                                }
                            }

                            ?>
                            <tr>
                                <td><?=$count++?></td>
                                <td><?=$record['code']?></td>
                                <td><?=$record['name']?></td>
                                <td class="countable1"><?=$maden?></td>
                                <td class="countable2"><?=$dayen?></td>
                                <td class="countable3"><?=$value?></td>
                            </tr>
                            <?php
                            if (isset($record['children'])) {
                                $count = buildTreeTable($record['children'], $count++);
                            }
                            $s++;}
                        return $count;
                    }
                    ?>

                    </tbody>
                        <tfoot>
                        <tr>
                            <td  style="text-align: center" colspan="3">الإجمالي</td>
                            <td class="result1">0</td>
                            <td class="result2">0</td>
                            <td class="result3"></td>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>


    </div>
</div>


<!------ modals --------------------------------------------->




<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>


<script>

    var cls1 = $(".res").find("td.countable1");
    var cls2 = $(".res").find("td.countable2");
    var cls3 = $(".res").find("td.countable3");



    var sum1 = 0;
    var sum2 = 0;
    var sum3 = 0;

    for (var i = 0; i < cls1.length; i++){
        if(cls1[i].className == "countable1"){
            sum1 += isNaN(cls1[i].innerHTML) ? 0 : parseInt(cls1[i].innerHTML);
        }

    }

    for (var i = 0; i < cls2.length; i++){
        if(cls2[i].className == "countable2"){
            sum2 += isNaN(cls2[i].innerHTML) ? 0 : parseInt(cls2[i].innerHTML);
        }
    }
    for (var i = 0; i < cls3.length; i++){
        if(cls3[i].className == "countable3"){
            sum3 += isNaN(cls3[i].innerHTML) ? 0 : parseInt(cls3[i].innerHTML);
        }
    }



    $(".result1").text(sum1);
    $(".result2").text(sum2);
    $(".result3").text();





</script>
