<style>

.one {
    border-style: solid;
    border-width: 1px;
    padding: 15px;
}

</style>
<?php 

//echo 'type= ' . $type .'<br/>';
if($type ==1){
 echo'
    
    <div  class="DivPrint col-xs-12"  id="printableArea">
    <div class="DivPrint_p one">
        <h4>لجنة رعاية السجناء بحائل</h4>
         <p align="center" style="
        text-align: right;" id="barcodeval">
        رقم الصادر :  '.$arabic_num.'<br/>
          تاريخ الصادر :' . $date.'<br/>
           المشفوعات :' . $attached_num.'<br/></p>
           <img src="'.base_url().'barcodes/barcode.php?text='.$id.'" alt="'.$id.'" height="30" style="width: 290px;" />
           <div>

    </div>
  </div>
    ';
}elseif($type ==2){
    
     echo'
  
    <div  class="DivPrint col-xs-12"  id="printableArea">
    <div class="DivPrint_p one">
        <h4>لجنة رعاية السجناء بحائل</h4>
         <p align="center" style="
        text-align: right;" id="barcodeval">
        رقم الوارد :  '.$arabic_num.'<br/>
          تاريخ الوارد :' . $date.'<br/>
           المشفوعات :' . $attached_num.'<br/></p>
           <img src="'.base_url().'barcodes/barcode.php?text='.$id.'" alt="'.$id.'" height="30" style="width: 290px;" />
           <div>

    </div>
  </div>
    ';
    
}
?>
<div class="col-xs-12"  >
 <input type="button"  onclick="printdiv('printableArea');"  class="submit_button print_button" value="طباعة "/>
</div>
    <style>
    
          @media print{
            .DivPrint_p{
                border:10px solid !important;
                 padding: 5px 2% !important;
               
                }
   

.DivPrint_p img {
    width: 1150px !important;
    height: 92px
    }
    .DivPrint_p p {
        text-align: center;
        margin-top: 2px;
    }
        #barcodeval{
        font-size: 35px;
            margin-top: 6px;
      
    }
    
    .DivPrint_p h4 {
 font-size: 40px ;
 text-align: center;
    }
    .print_button{
        display:none;
        }
     
    }
        </style>
<script>
function printdiv(printpage)
{
var headstr = "<html><head><style> @media print {.barcodeDiv { position: absolute;top: -5px;width: 100%;padding: 0px 2%;margin: 0px;border: 10px solid;}.barcodeDiv img {width: 1150px;height: 92px}.barcodeDiv p {text-align: center;margin-top: 2px;}#barcodeval{font-size: 35px;margin-top: 6px;}.barcodeDiv h4 {font-size: 40px ;text-align: center;}}</style><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}


</script>

<?php  // $this->load->view('admin/requires/footer');?>
