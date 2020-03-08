
<div class="col-xs-12 " data-wow-delay="0.2s">
    <div class="panel panel-bd lobidisable">
        <div class="panel-heading">
            <h3 class="panel-title">رسوم العضويه</h3>
        </div>
        <div class="panel-body">

<span id="message">
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</span>

<?php echo form_open_multipart('assembley_members/New_member_pill/new_member_pills'); ?>
<div class="col-sm-12">
                <div class="form-group col-sm-12 col-xs-12">
                    <label class="label label-green  half">الأعضاء </label>
                     <select name="student_code" id="student_code" class="selectpicker form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" onchange="return ajaxSearch($(this).val());" >
                            <option value="">--قم باختيار اسم العضو--</option>
                            <?php 
                            if (isset($sutdent) && $sutdent != null){
                                foreach ($sutdent as $sutdents) {
                            ?>
                            <option value="<?=$sutdents->id?>"><?=$sutdents->name?></option>
                            <?php      
                                }
                            }
                            ?>
                        </select>
                </div>
                
            </div>
            
        <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> تاريخ اليوم </label>
                   <input type="date" id="date" value="<?=date("Y-m-d")?>" name="date" class="form-control half" data-validation="required" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم العضو</label>
                      <input type="text" id="name" name="name" class="form-control dt text-left half" readonly />
                        <input type="hidden" id="classrooms_id_fk" name="classrooms_id_fk"  class="form-control dt text-right" readonly />
                        <input type="hidden" id="sub_stages_id_fk" name="sub_stages_id_fk" class="form-control dt text-right" readonly />
                   
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إجمالي المديونية</label>
                    <input type="text" id="total" name="total" class="form-control dt text-right half" readonly />
                </div>
                 <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إجمالي المدفوع</label>
                   <input type="number" id="paid" name="paid" class="form-control dt text-right half " onkeyup="$('#remain').val(($('#total').val()-$(this).val()));" required />
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إجمالي المتبقي</label>
                   <input type="text" id="remain" name="remain" class="form-control dt text-right half" readonly />
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                   
                   <input type="submit" name="add" id="add" value="حفظ" class="btn btn-primary" onclick="if($('#student_code').val() == '') {alert('برجاء قم بإختيار إسم المورد أولا'); return false;} if($('#remain').val() < 0){alert('لا يمكن أن يكون إجمالي المدفوع أكبر من إجمالي المديونية ..!'); return false;}" >
                </div>
                
            </div>   
            
            
<div  id="area">

 
</div>
<?php echo form_close(); ?>


</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    function ajaxSearch(member_id)
    {
        var inputs = $('.dt');
        for (var i = inputs.length - 1; i >= 0; i--) {
            inputs[i].value = '';
        }
        $('#area').html('');
        document.getElementById('add').removeAttribute("disabled");
        if(student_code){
            var dataString = 'member_id=' + member_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>assembley_members/New_member_pill/get_student_other',
                data:dataString,
                cache:false,
                success: function(ajax_data){
                   // var data = JSON.parse(ajax_data);
                   // console.log(data);
                   
                   var x=$("#student_code option:selected" ).text();
                   
                   
                    $('#name').val(x);
                      $('#total').val(ajax_data);
                    
                    
                   
                  
                //var total = parseFloat(data.current_all_fees) + parseFloat(data.current_all_fees) - parseFloat(data.paid);
                   var total = parseFloat(data.current_all_fees)- parseFloat(data.paid_pills);
                    $('#total').val(total);
                    $('#remain').val(total);
                    if(total <= 0){
                        document.getElementById('add').setAttribute("disabled","true");
                    }
                } 
            });
          $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>assembley_members/New_member_pill/get_member_remain',
                data:dataString,
                cache:false,
                success: function(d){
                    
                    //var data = JSON.parse(ajax_data);
                   // console.log(data);
                   if(d==0)
                   {
                    alert("تم سداد مديونيه هذا العضو ");
                    $('#remain').val(d);
                    document.getElementById('paid').setAttribute("disabled","true");
                    location.reload();
                   }else{
                    
                   //document.getElementById('paid').setAttribute("disabled","false");
                  $('#remain').val(d);
                  $('#paid').keyup(function(){
                   $('#remain').val(d-$('#paid').val());
                   if($('#remain').val()<0){
                    alert("المبلغ المدفوع اكبر من المتبقي");
                    $('#remain').val(d);
                    $('#paid').val("0");
                   }
                  })
                  
                   }
                   
                    
                     return;
                   
                  
                
                } 
            });
          
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>assembley_members/New_member_pill/getTable",
                data: dataString,
                dataType: 'html',
                cache:false,
                success: function (html) {
                    
            $('#area').html(html);
                }
            });
        }
    }
</script>