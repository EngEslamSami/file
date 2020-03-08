
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?> </h3>
        </div>
        <div class="panel-body">

<div class="col-sm-12 col-xs-12">
 <div class="details-resorce">
 
 
    <div class="col-xs-12 r-inner-details">
    
     <div class="col-xs-12">
     <form id="form" method="post">
                <div class="col-md-5  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <h4 class="r-h4"> من  </h4>
                        </div>
                        <div class="col-xs-4 r-input">              
                            <input type="text" name="barcodefrom" id="barcodefrom" placeholder="من" autofocus   class="r-inner-h4 " />                         
                        </div>
                    </div>
                </div>
                <div class="col-md-5  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-4 r-half">
                            <h4 class="r-h4">  الى   </h4>
                        </div>
                        <div class="col-xs-4 r-half1 r-input">
                           <input type="text"  name="barcodeto" id="barcodeto" placeholder=" الى " autofocus   class="r-inner-h4 " />
                        </div>
                    </div>
                </div>
                 <div class="col-xs-2 r-half1 r-input">
             <input name="b_print" type="button" class="ipt"   onClick="printdiv('div_print');" value=" طباعة " >
         </div>
     </form>


     </div>
                </div>
            </div>
    </div>
 <br />   <br />   <br />   <br />   <br />   <br />
 <div id="div_print" >
</div>
        </div>
    </div>
</div>



<script>
    document.getElementById("barcodefrom").onkeyup = function () {
        document.getElementById("barcodeto").onkeyup = function () {
            var dataSer=$("#form").serialize();
           
            $.ajax({
                url:'<?php echo base_url()."admin/Secretary/PrintBarcode"?>',
                type:'POST',
                data:dataSer,
                beforeSend:function(){
                    $("#div_print").html('<img src="<?php echo base_url()."barcodes/"?>294.GIF"/><br/>');
                },
                success:function(data){
               
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
                url:'<?php echo base_url()."admin/Secretary/PrintBarcode"?>',
                type:'POST',
                data:dataSer,
                beforeSend:function(){
                    $("#div_print").html('<img src="load_page/294.GIF"/><br/>');
                },
                success:function(data){
                 
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


