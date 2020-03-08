
<style>
td{
    text-align: center !important;
}
td input{
    text-align: center !important;
}
</style>

<?php
$type=$this->uri->segment(5); 


?>

<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
 <a href="<?php echo base_url() ?>admin/Finance_accounting/all_sand_sarf" class="btn btn-success">الرجوع للسندات </a>

   <form action="<?php echo base_url();?>" method="post">
   
 
  
   
    <div class="col-xs-4 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  رقم السند  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                   <input type="number" id="numpill" class="form-control" readonly="readonly" value="<?php echo $this->uri->segment(4);?>"/>
                                </div>
                            </div>
     <div class="col-xs-4 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ السند  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                     <input type="text" id="date" class=" r-inner-h4" readonly="readonly"value="<?php echo date("Y/m/d",$all_vouchers[0]->receipt_date);?>"/>
                                     
                            </div>
     </div>
                
      
        <div class="col-xs-4 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">حساب الدائن </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                      <select name="pay_way" required="" class="form-control" id="maden">
                     <option value="0">اختر</option>
                                <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                       <?php
                       foreach($accout_groups as $row)
                       {
                        ?>
                        <option value="<?php echo $row->code;?>" <?php if(!empty($disabls['dis'.$row->id])){echo  $disabls['dis'.$row->id];}?> ><?php echo $row->name;?></option>
                        <?php
                       }
                       ?>
                      </select>
                      <small style="color: red; display: none;" id="maden_require">هذا الحقل مطلوب</small>
                    </div>
                    </div>
                
       
           <div class="col-xs-4 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القيمه </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                      <input type="number" step="any" id="product_amount"  value="" class="form-control"/>
                      <small id="value_require" style="color: red; display: none;;">هذا الحقل مطلوب</small>
                    </div>
              
                </div>
                <div class="col-xs-4 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  البيان </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" id="bayan_qabd"  name=""   value="" class="r-inner-h4"  />
                                    <small id="bayan_require" style="color: red; display: none;;">هذا الحقل مطلوب</small>
                                </div>
                            </div>
                             <div class="col-xs-4 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> طرق الدفع </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select  id="vouch_type" disabled="disabled" name="vouch_type" >
                                        <option value=""> - اختر - </option>
                                        <option value="1"<?php if($all_vouchers[0]->vouch_type==1){?> selected="selected" <?php } ?>"> نقدي </option>
                                        <option value="2"<?php if($all_vouchers[0]->vouch_type==2){?> selected="selected" <?php } ?>> تحويل بنكي</option>
                                        <option value="3"<?php if($all_vouchers[0]->vouch_type==3){?> selected="selected" <?php } ?>> شيك </option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-xs-4 inner-side r-data" <?php if($type==1){?>style="display: block";<?php }else{?> style="display: none" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  إسم الصندوق </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name=""  id="box_name" disabled="true">
                                     

                                        <?php if(isset($boxs) && $boxs !=null):
                                        foreach($boxs as $one_box): ?>
                                     <option value="<?php echo $one_box->code?>"<?php if($all_vouchers[0]->dayen==$one_box->code) {   ?> selected="selected"<?php }?> >  <?php echo $one_box->name?></option>
                                        <?php endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                             <div class="col-xs-4 inner-side r-data" <?php if($type==2||$type==3){?>style="display: block";<?php }else{?> style="display: none" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إختيار إسم البنك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="bank_name"  id="bank_name" disabled="true" >
                                        <option value=""> - اختر - </option>
                                        
                                       <?php if(isset($banks) && $banks !=null):
                                        foreach($banks as $one_bank): ?>
                                        <option value="<?php echo $one_bank->code?>"<?php if($all_vouchers[0]->dayen==$one_bank->code) {   ?> selected="selected"<?php }?>>  <?php echo $one_bank->name?></option>
                                        <?php endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                           
                             <div class="col-xs-4 inner-side r-data"<?php if($type==2||$type==3){?>style="display: block";<?php }else{?> style="display: none" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الشيك</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" readonly="readonly"  name="check_num" id="check_num"class="r-inner-h4 "value="<?php echo $all_vouchers[0]->sheek_num;?>" />
                                </div>
                            </div>
                            <div class="col-xs-4 inner-side r-data" <?php if($type==2){?>style="display: block";<?php }else{?> style="display: none" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ الايداع  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="text" name="recive_date" readonly="readonly" id="recive_date" class="form-control"value="<?php if($all_vouchers[0]->date_received!=0) echo date("Y/m/d",$all_vouchers[0]->date_received); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 inner-side r-data"<?php if($type==3){?>style="display: block";<?php }else{?> style="display: none" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ الاستحقاق  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-groupp">
                                            <input type="text" name="" readonly="readonly"  id="recive_date_other" class="form-control"value="<?php  if($all_vouchers[0]->date_received_other!=0) echo date("Y/m/d",$all_vouchers[0]->date_received_other);?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-12">
                              </div>
                            <div class="col-md-2" style="float: left;">
                            <div class="form-group">
                        <input type="button" id="addmorePOIbutton" value="حفظ مؤقت" class="btn btn-warning" onclick="insRow()"/>
                    </div>
                    </div>
              
                </div>
       <div class="col-md-3" style="display: none;">
                   
                </div>
       <input type="hidden" value="" id="total1"/>
       <div class="col-md-3">
                    <div class="form-group" style="display: none;>
                      <label class="control-label">الكميه المصروفه</label>
                      <input type="text" id="product_amountpp" class="form-control" value=""/>
                      
                    </div>
                </div>
       
     
       <input type="hidden" name="" id="product_name">
       <div class="col-md-3" style="padding-top: 50px;">
            
                    
           <div id="div1" style="color: red;"></div>
            
                </div>  
        
   </form>
    </fieldset>


<div class="col-md-12">
    <div class="col-md-12">
    
    
    <div class="alert alert-success save_fatora" style="display: none;">
  <strong>نجاح!</strong> تم حذف التعديلات
</div>
<div class="alert alert-danger  emptybasket" style="display: none;">
  <strong>نجاح!</strong> تم حذف التعديلات
</div>
       <div id="POItablediv">
  
           <table id="POITable" border="1" style="display: block;" >
    <tr>
      <td class="text-center" style="width: 10% !important;">مسلسل</td>
      <td class="text-center" style="width: 20% !important;"> حساب الدائن</td>
      <td class="text-center" style="width: 20% !important;">القيمه</td>
      
      <td class="text-center" style="width: 20% !important;">البيان</td>
      <td class="text-center" style="width: 20% !important;">رقم السند</td>
        <td style="border: 0 !important;"><input  type="hidden"   value=""/></td>
         <td  style="border: 0 !important;"><input  type="hidden"  value=""/></td>
      <td  class="text-center" style="width: 10% !important;">الاجراء</td>
    </tr>
     <?php
     $xz=1;
     foreach($all_vouchers as $row){
        
           ?>
    <tr id="<?php echo $row->id;?>" class="norow<?php echo $row->id;?> dbrow" style="display: ;">
    
      <td><?php echo $xz;?></td>
      <td><input  type="text" value="<?php echo $row->account_name;?>" id="branch_name" class=""/></td>
       <td><input  type="text" id="amount" class="" value="<?php echo $row->value;?>"/></td>
      <td><input  type="text" id="product_name"  value="<?php echo $row->details;?>"class="product_name"/></td>
     
     
     <td><input  type="text" id="bayan" class="total" value="<?php echo $row->vouch_num;?>"/></td>
      <td  style="border: 0 !important;"><input  type="hidden" id="hid_id"  value=""/></td>
     <td  style="border: 0 !important;"><input  type="hidden" id="hid_branch"  value=""/></td>
     
     <td><input type="button" id="d<?php echo $row->id;?>" value="حذف"  onclick="deleteRow_db(this,<?php echo $row->id;?>)" /></td>
    
    </tr>
    <!-- modal -->
    
<!--     modal-->
    <?php 
    $xz++;
    
    } ?>
    
    
    
    <tr id="row2" class="norow" style="display:none;">
      <td>0</td>
      <td><input  type="text" id="branch_name" class=""/></td>
       <td><input  type="text" id="amount" class="" value="0"/></td>
      <td><input  type="text" id="product_name" class="product_name"/></td>
     
     
     <td><input  type="text" id="bayan" class="total" value="0"/></td>
      <td><input  type="hidden" id="hid_id"  value=""/></td>
      <td><input  type="hidden" id="hid_branch"  value=""/></td>
      <td><input type="button" id="delPOIbutton" value="حذف" onclick="deleteRow(this)" /></td>
    
    </tr>
  </table>
           <input type="hidden" name="" id="all_cost" value=""/>    
   </div>
</div>
    <div class="final2" style="padding-top: 100px; display: none;">
        
         <div class="row">
         <div class="col-sm-4">
         </div>
          <div class="col-sm-4" style="margin-top: 15px;;">
           <button id="final_save" class="btn btn-success pull-left">حفظ السند  </button>
       
       <input type="hidden" value="<?php echo count($all_vouchers);?>" id="voucher">
        <div id="info" style="color: red;"></div>
         <button class="btn btn-danger basket pull-right">الغاء التعديلات </button>
          <div class="col-sm-4">
         </div>
        
        </div>
       </div>
    </div>
    </div>

</div>
</div>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    
    $('.basket').click(function(){
     $('.norow').remove();
      // $('#row2').show();
      $('#POITable').hide();
      $('.emptybasket').show();
      $('.emptybasket').fadeOut(3000);
      $(this).hide();
      location.reload();
    })
    </script>



  <script>
      function deleteRow(row) {
  var i = row.parentNode.parentNode.rowIndex;
 if(i>1){
  document.getElementById('POITable').deleteRow(i);
}else{
    alert("لايمكن حذفه");
}
var x = document.getElementById('POITable');
  

  var len = x.rows.length;
  if(len==2){
  window.location.href = "<?php echo base_url();?>admin/finance_accounting/all_sand_qabd";
  }
      }
  function deleteRow_db(row,id) {
  
  var i = row.parentNode.parentNode.rowIndex;
 
  document.getElementById('POITable').deleteRow(i);

var x = document.getElementById('POITable');
  $.ajax({
        type:'post',
       url:"",
      data:{id:id},
      success:function(d){
          
     var len = x.rows.length;
  if(len==2){
    alert("تم حذف السند يالكامل");
     window.location.href = "<?php echo base_url();?>admin/finance_accounting/all_sand_qabd";
  }
  }
    
   }); 

 
      }
  

function insRow() {
  if($('#product_amount').val()==''&& $('#bayan_qabd').val()==''&& $('#maden').val()==0){
    $('#value_require').show();
    $('#bayan_require').show();
     $('#maden_require').show();
    return;
 }else{
    $('#value_require').hide(); 
    $('#bayan_require').hide();
    $('#maden_require').hide();
 }
   if($('#maden').val()==0){
    $('#maden_require').show();
    return;
 }else{
    $('#maden_require').hide(); 
 }
   
   if($('#product_amount').val()==''){
    $('#value_require').show();
    return;
 }else{
    $('#value_require').hide(); 
 }
 if($('#bayan_qabd').val()==''){
    $('#bayan_require').show();
    return;
 }else{
    $('#bayan_require').hide(); 
 }
  
  $("#POITable").css("display", "block");
  $(".final2").css("display", "block");
  var x = document.getElementById('POITable');
  var lx=x.rows.length;
  
  var new_row = x.rows[1].cloneNode(true);

  var len = x.rows.length;
  new_row.cells[0].innerHTML = len-1;
  var m ;
  var t=0;
  var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
  inp1.id +=len;

  var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
  inp2.id += len;
  
  var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
  inp3.id += len;
  var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
  inp4.id += len;
  var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
  inp5.id += len;
  var inp6 = new_row.cells[6].getElementsByTagName('input')[0];
  inp6.id += len;
  
  
  x.appendChild(new_row);
  
new_row.id += len;
$('#row2').hide();
$('#row2'+len).show();


 
}


  
  
  </script>
  <script>
  $('#addmorePOIbutton').click(function(){
    if($('#product_amount').val()==''){
    $('#value_require').show();
    return;
 }else{
    $('#value_require').hide(); 
 }
 if($('#bayan_qabd').val()==''){
    $('#bayan_require').show();
    return;
 }else{
    $('#bayan_require').hide(); 
 }
 
   
   
   
  var x = document.getElementById('POITable');
  var new_row = x.rows[1].cloneNode(true);
  var len = x.rows.length;
  var x=len-1;
  
 if(len>2){
   
    
    
  
    
  $('#branch_name'+x).val($("#maden option:selected" ).text());
  
  
  
 $('#hid_branch'+x).val($('#maden').val());
 
$('#hid_id'+x).val($('#product').val());
$('#product_name'+x).val($("#bayan_qabd").val());
 $('#amount'+x).val($('#product_amount').val());
 var n=$('#product').val()
 $('#amount'+x).addClass("myClass"+n);
 $('#maden').val('0');
 $('#bayan_qabd').val('');
 $('#product_amount').val('');
 //$('#amount'+x).attr('class','h'+n);
 //$('#total'+x).val($('#price').val()*$('#product_amount').val());
 $('#bayan'+x).val($('#numpill').val()); 
 return;
 }else{
 
 $('#hid_id'+x).val($('#product').val());
$('#product_name'+x).val($("#bayan_qabd").val());
$('#hid_branch'+x).val($('#maden').val());


var first=$('#hid_id'+x).val();
var branch1=$('#hid_branch'+x).val();
 var amount1=parseInt($('#product_amount').val());
 var total1=parseInt($('#total1').val());
 
 var y;
 for (y=2; y<x; y++){
  var branch2=$('#hid_branch'+y).val();
    var second=$('#hid_id'+y).val();
   var amount2=parseInt($('#amount'+y).val());
   var total2=parseInt($('#total'+y).val());
   var total_total=total1+total2;
   var total_amount=amount2+amount1;
    if(first==second && branch1==branch2){
    $('#branch_name'+y).val($("#maden option:selected" ).text());    
     $('#hid_branch'+y).val();  
    
    $('#amount'+y).val(total_amount);
    var n=$('#product').val()
    $('#amount'+x).addClass("myClass"+n);
  
    $('#total'+y).val(total_total);
    $('#row2'+x).remove();
      //alert(total_amount) ; 
    } else{
        $('#hid_branch'+x).val();
        
        $('#amount'+x).val($('#product_amount').val());
        var n=$('#product').val()
        $('#amount'+x).addClass("myClass"+n);
        $('#branch_name'+x).val($("#maden option:selected" ).text());
      
        $('#total'+x).val($('#total1').val());
    }
 }
  

 
 }
 
 $('#product').val('0');
 $('#price').val('');
 $('#amount').val('');
 $('#numpill').attr('disabled', 'disabled');
 $('#branch').attr('disabled', 'disabled');
 $('#date').attr('disabled', 'disabled');
 $('#amount').val('');
 
 var cbs = document.getElementsByClassName("total");
        var fatora_cost=0;
        for(var i=0; i < cbs.length; i++) {
            fatora_cost +=parseFloat(cbs[i].value);
        }
        $('#all_cost').val(fatora_cost);
 

  })     
 </script>
 <script type="text/javascript">
     
  $('#final_save').click(function(){
     
         
  var x = document.getElementById('POITable');
  var new_row = x.rows[1].cloneNode(true);
  var len = x.rows.length;
 var i;
 var x;
 var y;
 var z;
 var data_name=[];
 
 var data_amount=[];

  var data_bayan=[];
  var cbs = $('#voucher').val();
  
        
for (i = cbs; i < len; i++) { 
    if($('#hid_branch'+i).val()>0){
   data_name.push($('#hid_branch'+i).val());
   }
 }
 
 
for (x = cbs; x < len; x++) { 
    if($('#amount'+x).val()>0){
   data_amount.push($('#amount'+x).val());
   }
 }

 for (z =cbs; z < len; z++) { 
   
     
  data_bayan.push($('#product_name'+z).val());
   
     
   
 }
  





   
  // var data_name = JSON.stringify(data_name);
  // var data_amount = JSON.stringify(data_amount);
  // var data_bayan = JSON.stringify(data_bayan);
 var date_sand =$('#date').val();
  
  var receipt_date =$('#recive_date').val();
   var receipt_date_other =$('#recive_date_other').val();
   
  var vouch_num=$('#numpill').val();
  var vouch_type=$('#vouch_type').val();
  
  var box_name=$('#box_name').val();
  
    var bank_name=$('#bank_name').val();
    var check_num=$('#check_num').val();
  
  
   $.ajax({
        type:'post',
       url:"<?php echo base_url();?>admin/Finance_accounting/edit_sanad_item",
      data:{data_name:data_name,data_amount:data_amount,data_bayan:data_bayan,vouch_num:vouch_num,receipt_date:receipt_date,receipt_date_other:receipt_date_other,vouch_type:vouch_type,box_name:box_name,bank_name:bank_name,check_num:check_num,date_sand:date_sand},
      success:function(d){
          
    alert(d);
    location.reload();
  }
    
   }); 
   
     });
     
     
     
     </script>
     
     
     <script type="text/javascript">
         $('.btn-delete2').click(function(){
         var pill= $('#numpill').val();
         var id= $(this).attr('row_id');
          var amount=  $(this).attr('amount');
         $.ajax({
        type:'post',
          url:"<?php echo base_url();?>Gymcontrol/edit_pill",
         data:{pill:pill,id:id,amount:amount},
      success:function(d){
          
   alert("تم الحذف بنجاح");
      location.reload();  
    }
    
   }); 
             
         });
    </script>