
<!--
<style>
.r-pop-up {
    padding: 0;
}

.r-pop-up img {
    width: 93%;
    height: 150px;
}

.r-pop-up .chip {
    margin-top: 20px;
}

.r-pop-up .chip iframe {
    width: 96%;
    height: 180px;
}

.r-pop-up .closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 8%;
}

.r-pop-up .closebtn:hover {
    color: #000;
}
.modal1{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.r-sss{
    width: 100px;
    height: auto;
    background-color: #0c1e56;
    color: #fff;

}
.r-sss:hover{
    color: #0c1e56;
    background-color: #fff;
}

        ul {
            list-style: none;
            padding-right: 20px;
        }
        
        .treeview li>input {
            height: 16px;
            width: 16px;
        }
/****************** other page in message ********
*************************************************/

.r-message-right h3 a {
    color: #fff;
    text-decoration: none;
}

.r-message-right h4 a {
    color: #575757;
    text-decoration: none;
}

.r-message-left-1 h6 {
    margin: 3px 0 0;
    color: #000;
}

.r-message-left-1 .r-check-message {
    display: inline-block;
    font-size: 16px;
    height: 15px;
    padding-right: 15px;
}

.r-xs-padding {
    padding: 0;
}

.r-message-left-1 p {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 14px;
    margin-bottom: 0;
}

.r-message-left-1 p a {
    text-decoration: none;
    color: #333;
}

.r-message-inbox {
    padding-top: 13px;
    padding-bottom: 13px;
}

.r-main-message {
    color: #ffc400
}

.r-message-inbox:nth-child(odd) {
    background-color: #eee;
}

.r-message-inbox:nth-child(even) {
    background-color: #fff;
}

.r-delet-mes {
    border-bottom: 2px solid #eee;
}

.r-delet-mes1 {
    border: 1px solid #eee;
    font-size: 20px;
    padding: 7px;
}

.r-delet-mes1 a {
    color: #575757;
}
 
.text-warning{
    color: #575757;
}

.checkbox input[type="checkbox"] {
    cursor: pointer;
    margin-right: 3px;
    position: absolute;
}

.fa-style {
    font-size: 120%;
    margin-top: 12px;
}

.fa-star {
    cursor: pointer;
}

.fa-paperclip {
    color: black;
}

.table {
    border-top:0px !important;
    border-left:0px !important;
    border-right:0px !important;
    border-bottom:0px !important;
}
.table td {
    border: 10px ;
}
.fixed-table-container {
    border:0px !important;
}

.table .max-texts {
    text-align: right;
    padding-top: 16px;
    font-size: 16px;
    font-weight: 600;
}

.message-delet-btn {
    background-color: transparent;
    width: 100%;
}
.n-btn{
    background-color: #fff;
    border: none;
}
.nashwa2{
    position: absolute;
    top: 26px;
    right: 30px;
}
.r-check{
    height: 51px;
}
.r-check #all{
    margin-top: 12px;
}

.r-drop h3 {
    font-size: 15px;
    margin-top: 5px;
}

.r-drop h4 {
    font-size: 15px;
    font-weight: bold;
    margin-top: 5px;
}

.dropdown-menu {
    padding: 0;
}

.dropdown-toggle {
    border: 1px solid #ddd;
    padding: 0 5px;
}
</style> -->
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php
            $data['program_to_6'] = 'active';
         
            $month_end = strtotime('last day of this month', time());
            $days_ago = date('Y-m-d', strtotime('-5 days', $month_end));
         
            ?>
            <?php  echo form_open_multipart('all_Finance_resource/KafelPayment/payment_kafel') ?>
            <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-3">
                    <h4 class="r-h4">الصافي بعد صرف الإشتراكات</h4>
                </div>
                <div class="col-xs-3 r-input">
                    <?php
                    if(isset($payment) && $payment !=null){
                        $final_value=0;
                        for($x=0 ;$x<count($payment);$x++){
                            $final_value += $payment[$x]->value + $payment[$x]->value_added;
                        }
                    }else{
                        $final_value=0;
                    }
                    if(isset($payment_today) && $payment_today !=null){
                        $final_value_1=0;
                        for($x1=0 ;$x1<count($payment_today);$x1++){
                            $final_value_1 += $payment_today[$x1]->value ;
                        }
                    }else{
                        $final_value_1=0;
                    }
                    $total_output=$final_value +$final_value_1;
                    $total_output+=$count_add_donations;
                    $total_output=$total_output - $count_payment;
                    ?>
                    <input  type="text" id="paymet_total" value="<?php echo $total_output ;?>" disabled="disabled"/>
                </div>
            </div>
           <?php  if (isset($all_payments) && !empty($all_payments) && $all_payments !=null  ) {?>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    
                    <tr>
                        <th class="text-center"> <input type="checkbox" onclick="checkAll(this,'asd3')" ></th>
                        <th class="text-center"> إسم اليتيم</th>
                        <th class="text-center"> إسم البرنامج</th>
                        <th class="text-center">إسم الكفيل </th>
                        <th class="text-center">القيمة </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <!-------------------------------------------->
                    <?php  foreach ($all_payments as $row) {?>
                        <?php  $chick_in=$row->member_id.'-'.$row->program_id_fk;
                        if(!empty($payments_in) && isset($payments_in)){
                           if( in_array($chick_in,$payments_in)){ continue;}
                         } ?>
                    <tr>

                        <?php $post_value =$row->program_value['individual_value'].'-'.$row->member_id.'-';
                        $post_value .=$row->program_id_fk.'-'.$row->program_value['account_settings_id_fk'] ?>
                        <td>
                            <input type="checkbox" name="values[]" value="<?php echo $post_value?>" class="asd3"></td>
                        <td><?php echo $row->orphan_name ?></td>
                        <td><?php echo $row->program_name ?></td>
                        <td><?php echo $row->donar_name ?></td>
                        <td><?php echo $row->program_value['individual_value'] ?></td>
                    </tr>
                    <?php    }?>
                    <!-------------------------------------------->
                    </tbody>
                </table>
                <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                        <input type="submit" onclick="return check_box()" id="button" role="button" name="add" value="إصرف" class="btn pull-right" />
                    </div>
                </div>
           <?php    }  ?>
            <?php echo form_close()?>
     
     
     
     
        </div>
    </div>
</div>

<script>


function checkAll(bx,class_name) {
    var cbs = document.getElementsByClassName(class_name);
    for(var i=0; i < cbs.length; i++) {
        if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
        }
      
    }
}
</script>
<script>
function check_box(){
  var atLeastOneIsChecked = false;
  $('input:checkbox').each(function () {
    if ($(this).is(':checked')) {
      atLeastOneIsChecked = true;
    }
  });
  if(atLeastOneIsChecked != true){
        alert("إختر على الأقل يتيم واحد");
        return false;
  }
  
  
  var array = [];
      var cbs = document.getElementsByClassName('asd3');
    for(var i=0; i < cbs.length; i++) {
      if(cbs[i].checked){
           var mystr = cbs[i].value;
           var myarr = mystr.split("-");
           array[i]=parseInt(myarr[0]);
          
             
            
      }
   
      }
  var sum = array.reduce(function(a, b) { return a + b; }, 0);
  var elem = document.getElementById('paymet_total').value;
  if(sum > elem){
  alert("عفوا المجموع اكبر من القيمة الاشتراكات");
    return false;  
}else{
    return true;  
}

 
     return false;
};
</script>