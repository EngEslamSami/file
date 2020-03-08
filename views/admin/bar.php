<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 2/1/2018
 * Time: 10:23 AM
 */




?>





<form id="form" method="post">
    <br>
    <label for="barcode">العدد من</label>
    <input type="text" name="barcodefrom" id="barcodefrom" placeholder="من" autofocus style="width:300px;height:30px;">
    <label for="barcode">الى</label>
    <input type="text" name="barcodeto" id="barcodeto" placeholder="الى:" autofocus style="width:300px;height:30px;">
</form>
<br /><br />
<div style='float: left'>
    <input name="b_print" type="button" class="ipt"   onClick="printdiv('div_print');" value=" طباعة " style="width:70px;height:50px">
</div>
<br><br><br><br>
<div id="div_print" >

</div>


<script>
   alert($("#barcodefrom").val());
</script>


<!--<script language="javascript">
    function printdiv(printpage) {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
</script>-->

