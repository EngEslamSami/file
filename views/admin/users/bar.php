<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 2/1/2018
 * Time: 10:23 AM
 */




?>


<!--<div class="details-resorce">

    <div class="col-xs-12 r-inner-details">
        <div class="col-xs-12">
            <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-sm-4">
                        <h4 class="r-h4"> نوع السيارة </h4>
                    </div>
                    <div class="col-sm-8 r-input">
                        <input type="text" class="r-inner-h4 " name="name" id="name"  value="45" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xs-4 " style="margin-right: 400px">
            <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
        </div>

    </div>-->


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
    document.getElementById("barcodefrom").onkeyup = function () {
        document.getElementById("barcodeto").onkeyup = function () {
            var dataSer=$("#form").serialize();
            $.ajax({
                url:'<?php echo base_url()."Family/returnprint"?>',
                type:'POST',
                data:dataSer,
                beforeSend:function(){
                    $("#div_print").html('<img src="images/294.GIF"/><br/>');
                },
                success:function(data){
                  //  alert(data);
                    $("#div_print").html(data);
                }
            });
        }
        return false;
    }

    document.getElementById("barcodeto").onkeyup = function () {
        document.getElementById("barcodefrom").onkeyup = function () {
            var dataSer=$("#form").serialize();
            $.ajax({
                url:'<?php echo base_url()."Family/returnprint"?>',
                type:'POST',
                data:dataSer,
                beforeSend:function(){
                    $("#div_print").html('<img src="images/294.GIF"/><br/>');
                },
                success:function(data){
                  //  alert(data);
                    $("#div_print").html(data);
                }
            });

        }
        return false;
    }


</script>


<script language="javascript">
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
</script>

