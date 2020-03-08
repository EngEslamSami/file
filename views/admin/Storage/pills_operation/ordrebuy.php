<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/css/bootstrap-rtl.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 

<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
    <fieldset>
   <legend></legend>
   <form action="<?php echo base_url();?>" method="post">
       <div class="col-md-4">
                    <div class="form-group">
                      <label class="label label-green  half">تاريخ اليوم</label>
                      <input type="date" id="date" class="form-control half input-style date_melady"value="<?php if(isset($date2)){ echo $date2; }?>"<?php if(isset($date2)){?> disabled="" <?php }?> placeholder=""/>
                    </div>
                </div>
       <div class="col-md-4">
                    <div class="form-group">
                      <label class="label label-green  half">رقم الفاتوره</label>
                      <input type="number" id="numpill" class="form-control half input-style" <?php if(isset($pill)){?> disabled="" <?php }?> value="<?php if(isset($pill)){ echo $pill; }?>"/>
                    </div>
                </div>
        <div class="col-md-4">
                    <div class="form-group">
                      <label class="label label-green  half">الصنف </label>
                      <select name="pay_way" required="" class="form-control half" id="product">
                          <option value='0' style="display:none" selected> اختر الصنف</option>
                         <?php 
                         if(isset($items)){
                             foreach($items as $item){
                         
                         
                         ?>
                          <option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
                          <?php
                         }
                         }
                         ?>
                          
                      </select>
                    </div>
                </div>
       <div class="col-md-4">
                    <div class="form-group">
                     <label class="label label-green  half">العميل</label>
                      
                          <input type="text" name=""class="form-control half" id="branch">
                    </div>
       </div>
       <div class="col-md-4">
                    <div class="form-group">
                     <label class="label label-green  half"> وحده الصرف</label>
                      
                          <input type="text" name=""class="form-control half" id="unit">
                    </div>
       </div>
           <div class="col-md-4">
                    <div class="form-group">
                     <label class="label label-green  half">الكميه المتاحه</label>
                      <input type="number" id="amount" class="form-control  half"/>
                    </div>
               <input type="hidden" id="num2" class="form-control"/>
                </div>
               <div class="col-md-4">
                    <div class="form-group">
                      <label class="label label-green  half">وحده صرف المنتج</label>
                      <input type="number" step="" pre="2" id="price" class="form-control half" readonly=""/>
                    </div>
                </div>
       <div class="col-md-4" style="display: none;">
                   
                </div>
       <input type="hidden" value="" id="total1"/>
       <div class="col-md-4">
                    <div class="form-group">
                       <label class="label label-green  half">الكميه المصروفه</label>
                       <input type="number" step="any" id="product_amount" class="form-control half" value=""/>
                      
                    </div>
                </div>
       <div class="alert alert-danger noamount" style="display:none;">
           <h1>انتبه ! الكميه المصروفه اكبر من الكميه المتاحه </h1>
</div>
     
       <input type="hidden" name="" id="product_name">
       <div class="col-md-9" style="padding-top: 50px;">
           
       </div>
       
       <div class="col-md-3" style="padding-top: 50px;">
            
                    <div class="form-group">
                        <input type="button" id="addmorePOIbutton" value="حفظ مؤقت" class="btn btn-instagram" onclick="insRow()"/>
                    </div>
           <div id="div1" style="color: red;"></div>
            
                </div>  
        
   </form>
    </fieldset>
</div>
</div>
</div>
<div class="col-md-9">
    <div class="col-md-12">
    
    
    <div class="alert alert-success save_fatora" style="display: none;">
  <strong>نجاح!</strong> تم حفظ الفاتوره
</div>
<div class="alert alert-danger  emptybasket" style="display: none;">
  <strong>نجاح!</strong> تم حذف الفاتوره
</div>
       <div id="POItablediv">
  
           <table id="POITable" border="1" style="display: none;" >
    <tr>
      <td>مسلسل</td>
     
      <td>اسم الصف</td>
      <td>العميل</td>
      <td>الكميه</td>
      <td>السعر</td>
      <td>الاجراء</td>
    </tr>
    <tr id="row2" class="norow">
      <td>0</td>
      
      <td><input size=25 type="text" id="product_name" class="product_name"/></td>
      <td><input size=25 type="text" id="branch_name" class=""/></td>
     
      <td><input size=25 type="text" id="amount" class="" value="0"/></td>
      <td><input size=25 type="text" id="total" class="total" value="0"/></td>
      <td><input size=25 type="hidden" id="hid_id"  value=""/></td>
      <td><input size=25 type="hidden" id="hid_branch"  value=""/></td>
      <td><input type="button" id="delPOIbutton" value="حذف" onclick="deleteRow(this)" /></td>
    
    </tr>
  </table>
           <input type="hidden" name="" id="all_cost" value=""/>    
   </div>
</div>
    <div class="final2" style="padding-top: 100px; display: none;">
        
         <div class="row">
             <div class="col-md-3">
       <input type="button" id="final_save" class="btn btn-success" value="حفظ نهاءئ" />
             </div>
       
        <div id="info" style="color: red; padding-right: 20px; "></div>
        <div style="padding-right:1000px;">
         <button class="btn btn-danger basket">حذف الفاتوره</button>
        </div>
       </div>
    </div>
    </div>
<?php
    if (isset($pill_items)){
            ?>
             
  <table class=" table table-bordered">
    <thead>
      <tr>
        <th>المسلسل</th>
       
        <th>اسم الصنف</th>
         <th>الكميه المستهلكه</th>
         <th>الفرع المستهلك للكميه</th>
        <th>سعر  بالوحده</th>
        <th> الاجراء</th>
        
        
      </tr>
    </thead>
    <tbody>
        <?php
            
         $x=1;
      foreach ($pill_items as $item2){
          ?>
      
        
       
            
         <tr>
          <td><?php echo $x;?></td>
           <td><?php echo$item2->name;?></td>
           <td><?php echo$item2->amount;?></td>
           <td><?php echo$item2->title;?></td>
           <td><?php echo$item2->one_buy_cost;?></td>
           <td><button class="btn  btn-warning btn-delete2" row_id="<?php echo $item2->id;?>" amount="<?php echo $item2->amount;?>">حذف</button></td>
           
       
        </tr>
        <?php
        $x++;
      
        }
        ?>
    </tbody>

  </table>
    <?php
    }
    ?>

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
        
        
   </script>
<script type="text/javascript">
  $('#product').change(function(){
     
      
   var sanf= $('#product').val();
   $('#product_amount').val(''); 
   $('#product_name').val($('#product').val());
   
   
 $.ajax({
        type:'post',
       url:"<?php echo base_url();?>Storage/Item/getamount",
      data:{sanf:sanf},
      success:function(d){
          
          
          
       
  $('#num2').val(d);
 
     
       
 
     var lenth= $('.myClass'+sanf).length;
       if(lenth==0){
       $('#amount').val(d); 
        }else{
        var myclass=$('.myClass'+sanf).val();
       $('#amount').val(d-myclass);
            
        }
       
        
      
     
    
    
    }
    
   }); 
   $.ajax({
        type:'post',
       url:"<?php echo base_url();?>Storage/Item/get_price",
      data:{sanf:sanf},
      success:function(d){
        
$('#price').val(d);

        
    }
    
   }); 
   $.ajax({
        type:'post',
       url:"<?php echo base_url();?>Storage/Item/unit",
      data:{sanf:sanf},
      success:function(d){
        
$('#unit').val(d);
//$('#hid_branch').val(d);
//alert(d);
        
    }
    
   }); 
      
  }) ; 
    
    


</script>
<script type="text/javascript">
  $('#product_amount').keyup(function(){
       var n=$('#product_name').val();
      if($(this).val()==''){
       var act_amount2= $('#num2').val();
       if($('.myClass'+n).length==0){
        
       var act_amount= $('#num2').val();
       $('#amount').val(act_amount);
      }else{
      
       var act_amount= $('#num2').val();
       var remain=$('.myClass'+n).val();
       $('#amount').val(act_amount-remain);
      }
      return;
  }
      
  var total=$(this).val()*$('#price').val();
  $('#total1').val(total);
 // $('#amount').val($('#amount').val()*$('product_amount').val());
 var amount=parseInt($('#product_amount').val());

var all=parseInt($('#amount').val());

  var act_val= $('#amount').val(all-amount);

   

   if($('#amount').val()<0){
     $('.noamount').show();
      $('#addmorePOIbutton').hide();
      //$('#amount').val('0');
      var n=$('#product_name').val();
      
      if($('.myClass'+n).length==0){
         $('#product_amount').val('');
       var act_amount= $('#num2').val();
       $('#amount').val(act_amount);
      }else{
       $('#product_amount').val(''); 
       var act_amount= $('#num2').val();
       var remain=$('.myClass'+n).val();
       $('#amount').val(act_amount-remain);
      }
     //var remain=$('.myClass'+n).val();
    // var act_amount= $('#num2').val();
    //  $('#amount').val(act_amount-remain);
       //alert(act_amount);
     
      
      
   //var n= $("input[value=name]" ).first().val();
   //alert(0);
      
      //$('#product').val('0');
     // var act_val= $('#amount').val(amount+all); 
   }else{
       $('.noamount').hide();
      $('#addmorePOIbutton').show();
      //location.reload();
   }

     })
    
 </script>


  <script>
      function deleteRow(row) {
  var i = row.parentNode.parentNode.rowIndex;
 if(i==1){
  document.getElementById('POITable').deleteRow(i);
}else{
    alert("تم حذف السله");
    location.reload();
}
      }


function insRow() {
  console.log('hi');
   
   if($('#total1').val()==0 ||$('#product').val()==0||$('#date').val()==0){
       $('#div1').html("من  فضلك ضع الكميه والسعرواسم المنتج والتاريخ  ");
       return;
    }
  
  
  $("#POITable").css("display", "block");
  $(".final2").css("display", "block");
  var x = document.getElementById('POITable');
  
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
 
   
   
   
  var x = document.getElementById('POITable');
  var new_row = x.rows[1].cloneNode(true);
  var len = x.rows.length;
  var x=len-1;
 if(len==3){
  $('#branch_name'+x).val($("#branch").val());
 $('#hid_branch'+x).val($('#branch').val());
$('#hid_id'+x).val($('#product').val());
$('#product_name'+x).val($("#product option:selected" ).text());
 $('#amount'+x).val($('#product_amount').val());
 var n=$('#product').val()
 $('#amount'+x).addClass("myClass"+n);
 //$('#amount'+x).attr('class','h'+n);
 //$('#total'+x).val($('#price').val()*$('#product_amount').val());
 $('#total'+x).val($('#total1').val()); 
 }else{
 
 $('#hid_id'+x).val($('#product').val());
$('#product_name'+x).val($("#product option:selected" ).text());
$('#hid_branch'+x).val($('#branch').val());

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
    $('#branch_name'+x).val($("#branch").val());    
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
       $('#branch_name'+x).val($("#branch").val());
      
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
 var data_total=[];
  var data_branch=[];
for (i = 2; i < len; i++) { 
   data_name.push($('#hid_id'+i).val());
 }
 

for (x = 2; x < len; x++) { 
   data_amount.push($('#amount'+x).val());
 }

 for (z = 2; z < len; z++) { 
   data_branch.push($('#hid_branch'+z).val());
 }

//alert(data_branch);


for (y = 2; y < len; y++) { 
   data_total.push($('#total'+y).val());
   }

   var data_total = JSON.stringify(data_total);
   var data_name = JSON.stringify(data_name);
   var data_amount = JSON.stringify(data_amount);
   var data_branch = JSON.stringify(data_branch);
 
  
   var all_cost=$('#all_cost').val();
  var date2=$('#date').val();
  var act_amount=$('#num2').val();
  var numpill=$('#numpill').val();
 
  
 
   $.ajax({
        type:'post',
       url:"<?php echo base_url();?>Storage/Item/save_pill",
      data:{data_total:data_total,data_name:data_name,data_amount:data_amount,data_branch:data_branch,all_cost:all_cost,date2:date2,act_amount:act_amount,numpill:numpill},
      success:function(d){
          
          
    if(d=="insert"){
       //$('.save_fatora').show();
      //location.reload();
      setTimeout(function(){
     $('.save_fatora').show(function() {
         window.location.reload();
         /* or window.location = window.location.href; */
     });
}, 1000);
      }else{
          alert("لم يتم الحفظ هناك خطا ف ادخال البيانات");
      }
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