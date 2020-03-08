<style>
    .double-border{
        border: 4px double #000;
    }
    .double-border tr td,.double-border tr th{
        border: 4px double #000 !important;
    }
</style>
<?php
$value =0;
if (isset($records) && !empty($records) && isset($totla_sabeq) && !empty($totla_sabeq)){



for ($z = 0; $z < sizeof($records); $z++) {

    if ($z == 0) {
        $sabeq =0;
        if ($type == 2) {
            $sabeq = $totla_sabeq[1] - $totla_sabeq[0];
            $value = ($sabeq + $records[0]->dayen - $records[0]->maden);
        } elseif ($type == 1) {
            $sabeq = $totla_sabeq[0] - $totla_sabeq[1];
            $value = ($sabeq + $records[0]->maden - $records[0]->dayen);

        }
    } elseif ($z > 0) {
        if ($type == 2) {
            $value = $value + ($records[$z]->dayen - $records[$z]->maden);
        } elseif ($type == 1) {
            $value = $value + ($records[$z]->maden - $records[$z]->dayen);
        }
    }
} }

?>

<div id="printdiv" >

<div class="col-xs-12">
    <h4>    مذكرة التسوية لحساب البنك في <?php if (isset($bank_date) && !empty($bank_date)){
          $bank_date = explode('-', $bank_date)[2] . '-' . explode('-', $bank_date)[1] . '-' . explode('-', $bank_date)[0];

            echo  $bank_date .' '.'م';
    }?></h4>

   <!-- <div class="pull-right hidden-print">
        <button style="margin-left: 2px;" class="btn btn-success " onclick="return printDivFun('printdiv');"
        ><span class="fa fa-print"></span> طباعة</button>
    </div> -->
    <div class="pull-right hidden-print">
<!--        <button type="submit" name="add" id="add" value="add" style="margin-left: 2px;" class="btn btn-success "-->
<!--        ><span class="fa fa-floppy-o"></span> حفظ</button>-->
<!--   -->
        <input type="hidden"  name="add" value="add"  >
        <button type="button" onclick="check_total()"  class="btn btn-labeled btn-success " name="add" value="add" id="add"   style="margin-left: 2px;">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>


    </div>

    <table id="" class="table double-border  table-bordered table-striped table-hover">
        <thead>
        <tr class="">

            <th style="text-align: center !important;"> البيـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــان


            </th>
            <th colspan="6" style="text-align: center !important;"> هـ   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      ريال

            </th>

        </tr>
        </thead>
        <tbody>
        <tr >
            <td>
                رصيد الجمعية حسب كشف  <?php
                if (isset($bank_name) && !empty($bank_name)){
                    echo 'ب'. $bank_name;
                }
                if (isset($account_name) && !empty($account_name)){
                    echo '-'.' '.$account_name ;
                }
                ?>

            </td>
            <td>
                <?php
              //  $final_rased = number_format($value,2);
                $final_rased = $value;
                ?>
                <input type="text" name="rased_gam3ia"  class="form-control hidden-print" id="final_rased" value="0" onkeyup="get_total();">
                <p class="visible-print" id="p-final_rased" style="display:none;">0</p>

            </td>


        </tr>
        <tr>
            <td>يضاف شيكات مقاصة لحساب الجمعية ولم تظهر بكشف البنك حتى تاريخه
            </td>
            <td>
                <input type="text" name="sheek_makasa" class="form-control hidden-print" value="0" id="add1" onkeyup="get_total();">
                <p class="visible-print" id="p-add1" style="display:none;">0</p>

            </td>
        </tr>
        <tr>
            <td>يضاف فرق موازنة نقاط بيع لم تظهر بكشف حساب البنك
            </td>
            <td>
                <input type="text" name="farq_mowazna" class="form-control hidden-print" value="0" id="add2" onkeyup="get_total();">

                <p class="visible-print" id="p-add2" style="display:none;">0</p>
            </td>
        </tr>
        <tr>
            <td>يخصم شيكات سحبها الغير لصالح الجمعية واضافها البنك ولم تقيد
            </td>
            <td>
                <input type="text" name="sheek_sahb" class="form-control hidden-print" value="0" id="sub1" onkeyup="get_total();">
                <p class="visible-print" id="p-sub1" style="display:none;">0</p>
            </td>
        </tr>
        <tr>
            <td>يخصم شيكات سلمت ولم تصرف وسجلت بالجمعية
            </td>
            <td>
                <input type="text" name="sheek_solmat" class="form-control hidden-print" value="0" id="sub2" onkeyup="get_total();">
                <p class="visible-print" id="p-sub2" style="display:none;">0</p>

            </td>

        </tr>
        <tr>
            <td>الرصيد وهو مطابق لرصيد حساب البنك بدفاتر الجمعية
            </td>
            <td>


                <input type="text" class="form-control hidden-print" readonly id="total" value="<?= $final_rased ?>">
                <p class="visible-print" id="p-total" style="display:none;"><?= $final_rased ?></p>
            </td>
        </tr>


        </tbody>
    </table>
    <!--

    <div class=" col-xs-12">


        <div class="col-xs-4 text-center">
            <label> المحاسب </label><br><br><p  style="font-size:22px"></p>
            </div>
        <div class="col-xs-4 text-center">
            <label> مدير الشئون المالية </label><br><br><p  style="font-size:22px"></p>
            </div>
        <div class="col-xs-4 text-center">

            <label>مدير عام الجمعية </label><br><br>

           </div>
        <br><br>

       </div>
    -->

</div>
</div>
<script>
    function get_total() {

        var add1 = parseFloat($('#add1').val());
        var add2 = parseFloat($('#add2').val());
        var sub1 = parseFloat($('#sub1').val());
        var sub2 = parseFloat($('#sub2').val());
      //  final_rased = $('#final_rased').val().replace(",","");
        var final_rased = parseFloat($('#final_rased').val());

      //  alert(final_rased) ;
       if (isNaN(add1)) {
           add1 = 0;
        }
        if (isNaN(add2)) {
            add2 = 0;
        }
        if (isNaN(sub1)) {
            sub1 = 0;
        }
        if (isNaN(sub2)) {
            sub2 = 0;
        }
        if (isNaN(final_rased)) {
            final_rased = 0;
        }

        $('#p-add1').text(add1);
        $('#p-add2').text(add2);
        $('#p-sub1').text(sub1);
        $('#p-sub2').text(sub2);
        $('#p-final_rased').text(final_rased);

        var total = final_rased + add1 + add2 - ( sub1 + sub2 )  ;
       // total = total.toLocaleString();
        total = parseFloat(total);
        $('#p-total').text(total);
        $('#total').val(total) ;



    }
</script>
<script>
    function check_total() {
        var prog_total_rased = $('#prog_total_rased').val();
        var total = $('#total').val();
        if (prog_total_rased != total ) {


            swal({
                title: "من فضلك الرصيد غير مطابق لرصيد الحساب ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        } else {
          //  $('#add').removeAttr("disabled");
            $('#myform').submit();
        }


    }
</script>



<script language="javascript" type="text/javascript">
    function printDivFun() {
        //Get the HTML of div
        var divElements = document.getElementById('printdiv').innerHTML;
        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title ></title></head><body>" +
            divElements + "</body>";

        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>