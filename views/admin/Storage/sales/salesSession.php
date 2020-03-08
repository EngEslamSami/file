<?php
$session_id=$_SESSION['user_id'];

################# remove item ################
if(isset($_POST["remove_code"]) && isset($_SESSION["sales_add".$session_id]))
{
  $product_code   = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

  if(isset($_SESSION["sales_add".$session_id][$product_code]))
  {
    unset($_SESSION["sales_add".$session_id][$product_code]);
  }
}

else
{
  if(isset($_POST["fatora_date"]) && $_POST["fatora_date"] != null) {
    foreach($_POST as $key => $value){
      $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
    }

    $new_product['fatora_date']       = $_POST["fatora_date"];
    $new_product['client_code']     = $_POST["client_code"];
    $new_product['paid_type']         = $_POST["paid_type"];
    if($_POST["paid_type"] == 1){
      $new_product['box_name']        = $_POST["box_name"];
    }
    $new_product['product_code']      = $_POST["product_code"];
    $new_product['unit_id_fk']        = $_POST["unit_id_fk"];
    $new_product['one_sanf_price']    = $_POST["one_sanf_price"];
    $new_product['sale_amount']       = $_POST["sale_amount"];
    $new_product['total_sanf_cost']   = $_POST["total_sanf_cost"];
    $new_product['product_name']      = $_POST["product_name"];

    if(isset($_SESSION["sales_add".$session_id])){  //if session var already exist
      if(isset($_SESSION["sales_add".$session_id][$new_product['product_code']])) //check item exist in products array{
        unset($_SESSION["sales_add".$session_id][$new_product['product_code']]); //unset old item
    }    
      
    $_SESSION["sales_add".$session_id][$new_product['product_code']] = $new_product;  //update products with new item ar/ray

  echo  "<script>
          $('#product_code2').val('').selectpicker('refresh');
          $('#sale_amount').val('');
          $('#one_sanf_price').val('');
          $('#total_sanf_cost').val('');
          $('#unit_name').val('');

          $('#fatora_date').attr('disabled',true);
          $('#client_code').attr('disabled',true);
          $('#paid_type').attr('disabled',true);
          $('#box_name').attr('disabled',true);
         </script>";
  }
  else{
  echo  "<script>
          $('#product_code2').val('').selectpicker('refresh');
          $('#sale_amount').val('');
          $('#one_sanf_price').val('');
          $('#total_sanf_cost').val('');
          $('#unit_name').val('');
          $('#fatora_date').val('');
          $('#client_code').val('').selectpicker('refresh');
          $('#paid_type').val('');
          $('#box_name').val('');
          $('#box_name').attr('disabled',true);
         </script>";
  }
}

################## list products in cart ###################
//if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1){
if(isset($_SESSION["sales_add".$session_id]) && count($_SESSION["sales_add".$session_id]) > 0){ //if we have session variable
  $mode = current($_SESSION["sales_add".$session_id]);
  $Total_fatora = 0;
  $table = '<div class="col-sm-12 col-md-12 col-xs-12">
              <div class="col-md-12 fadeInUp wow">
                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <h4>تفاصيل فاتورة الشراء</h4>
                    </div>
                  </div>
                <div class="panel-body">
                <table id="colored-bgg" class="table table-bordered success">
                 <thead>
                  <tr>
                   <th>م</th> 
                   <th>اسم الصنف</th> 
                   <th>سعر بيع الوحدة</th> 
                   <th>الكمية المباعة</th> 
                   <th>إجمالي سعر البيع</th> 
                   <th>الأجراء</th>
                  </tr>
                </thead>
              <tbody>';
    
  for($x = 0 ; $x < count($_SESSION["sales_add".$session_id]) ; $x++){
    $code = $mode['product_code'];
    $table .='<tr>
                <td scope="row">'.($x+1).'</td>
                <td>'.$mode['product_name'].'</td>
                <td>'.$mode['one_sanf_price'].'</td>  
                <td>'.$mode['sale_amount'].'</td> 
                <td>'.$mode['total_sanf_cost'].'</td> 
                <td> 
                  <span class="off" data-code='.$code.'><i class="fa fa-trash"></i></span>
                </td>
              </tr> ';

    $Total_fatora += $mode['total_sanf_cost'] ;
    $mode = next($_SESSION["sales_add".$session_id]);
  }

  $mode = reset($_SESSION["sales_add".$session_id]);
  $discount = 0;
  $fatora_cost_after_discount = $Total_fatora;
  $paid = 0;
  $remain = $Total_fatora;
  $byan = '';

  if(isset($mode['fatora_cost_before_discount'])) {
    $discount = $mode['discount'];
    $fatora_cost_after_discount = $Total_fatora - $discount;
    $paid = $mode['paid'];
    $remain = $fatora_cost_after_discount - $paid;
    $byan = $mode['byan'];
  }

  if(isset($_POST['fatora_cost_before_discount'])) {
    $discount = $_POST['discount'];
    $fatora_cost_after_discount = $Total_fatora - $discount;
    $paid = $_POST['paid'];
    $remain = $fatora_cost_after_discount - $paid;
    $byan = $_POST['byan'];
  }

  $table .= '</tbody></table>
            <form method="post" action="">
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label"> قيمة الفاتورة</label>
                <input type="text" readonly class="form-control" id="fatora_cost_before_discount" name="fatora_cost_before_discount" value="'.$Total_fatora.'" placeholder="قيمة الفاتورة">
              </div>
            </div>  
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label"> قيمة الخصم</label>
               <input type="number" name="discount" id="discount" min="0" max="'.$Total_fatora.'" class="form-control" placeholder="قيمة الخصم" onkeyup="cla();" value="'.$discount.'" required="required">
              </div>
            </div> 
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label"> قيمة الفاتورة النهائية</label>
                <input type="text" readonly id="fatora_cost_after_discount" class="form-control" name="fatora_cost_after_discount" value="'.$fatora_cost_after_discount.'" placeholder="قيمة الفاتورة النهائية" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label"> المدفوع</label>
                <input type="text" id="paid" class="form-control" name="paid" placeholder="المدفوع" onkeyup="cla();" required="required" value="'.$paid.'" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label"> الباقي</label>
                <input type="text" id="remain" readonly class="form-control" name="remain" placeholder="الباقي" value="'.$remain.'" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label"> البيان</label>
                <input type="text" id="byan" class="form-control" name="byan" placeholder="البيان" value="'.$byan.'" required="required" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add"><i class="fa fa-floppy-o"></i> حفظ الفاتورة</button>
              </div>
            </div>';

  $table .='
          </form>
          </div></div></div></div>';
  echo $table;           
}
?>