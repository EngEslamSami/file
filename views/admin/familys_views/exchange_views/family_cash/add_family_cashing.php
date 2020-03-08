<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
           <!-------------------------------------------------------------------------------------->
            <?php echo form_open_multipart("family_controllers/Exchange/DoCashingFamily")?>
            <div class="col-xs-12">
                  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم طلب الصرف</label>
                    <input type="text" class="form-control half" name="sarf_num" value="<?php echo $last_id;?>" readonly=""/>
                </div>
                
                       <div class="form-group col-sm-4">
                    <label class="label label-green  half">بند المساعدة </label>
                    <select name="bnod_help_id_fk" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر</option>
                        <?php $x=1; foreach ($bnod_help as $row){?>
                            <option value="<?=$row->id?>"><?=$row->title?></option>
                        <?php $x++;} ?>
                    </select>
                </div>
                
                
                 <?php $months = array("1" => "يناير","2" => "فبراير","3" => "مارس","4" => "أبريل","5" => "مايو",
                                       "6" => "يونيو","7" => "يوليو","8" => "أغسطس","9" => "سبتمبر","10" => "أكتوبر",
                                       "11" => "نوفمبر","12" => "ديسمبر"); ?>
              <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عن شهر</label>
                    <select  name="mon_melady" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"    data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                        <?php foreach($months as $key =>$value){?>
                            <option value="<?php echo $key;?>" ><?php  echo $value; ?></option>
                        <?php  }  ?>
                    </select>
                </div>  
         

            </div>
            <div class="col-xs-12">
                <div class="form-group col-sm-8">
                    <label class="label label-green  half" style="width: 25% !important;">فئة المستفيدين  </label>
                    <input  type="radio"  tabindex="11"   id="member_type" name="member_type" onclick="get_data_show();" class="member_types"  value="1" data-validation="required"   />
                    <label for="square-radio-1">كل الأسر</label>

                    <input  type="radio" tabindex="11"  id="member_type"  name="member_type" onclick="get_data_show();" class="member_types" value="2"  data-validation="required" />
                    <label for="square-radio-1">مقطوع لكل أسرة </label>

                    <input  type="radio" tabindex="11"  id="member_type"  name="member_type" onclick="get_data_show();" class="member_types"  value="3" data-validation="required"   />
                    <label for="square-radio-1">مقطوع كل الأسر </label>

                    <input  type="radio" tabindex="11"  id="member_type"  name="member_type" onclick="get_data_show();" class="member_types"  value="4"  data-validation="required" />
                    <label for="square-radio-1">مخصص لكل فرد   </label>
                </div>

                      <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إجمالي </label>
                    <input type="text" id="total" name="total" class="form-control half" name="sarf_num" value="0" readonly=""/>
                </div>
            </div>

            <div  id="option"></div>
           
            <div class="col-xs-12">
                <button type="submit" class="btn btn-purple w-md m-b-5" name="ADD" value="ADD">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
            </div>
            <?php  echo form_close()?>

            <!-------------------------------------------------------------------------------------->
        </div>
    </div>
</div>

<script>
  function get_data_show(){   // total_count
        var member_type=0;
         $("#total").val("");
        //-----------------------------------------------
        var cbs_member = document.getElementsByClassName("member_types");
        for(var i=0; i < cbs_member.length; i++) {
            if(cbs_member[i].type == 'radio') {
                if(cbs_member[i].checked == true){
                    member_type =cbs_member[i].value;
                }
            }// end if check
        } // end for
        //-----------------------------------------------
        if( member_type != 0  ) {
            var dataString = "member_type="+member_type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Exchange/LoadPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#option").html(html);
                    if(member_type == 1){
                        $("#total").val($("#total_count").val());
                    }
                }
            });
            return false;
        }else{
            $("#option").html("");
        }
    
  }
  
</script>

<script>
  function option_table(opriun_id){
   var dataString= 0;
   $("#total").val("");
   //--------------------
    if( opriun_id == 3  ) {
           var cashing =$("#cashing").val();
           if(cashing !=0){
            dataString = "opriun_id="+opriun_id +"&cashing="+cashing;
           }
    }
    //-------------------
    if( opriun_id == 4  ) {
       var armal        =$("#armal").val();
       var mostafed     =$("#mostafed").val();
       var yatem     =$("#yatem").val();
           dataString = "opriun_id="+opriun_id +"&armal="+armal+"&yatem="+yatem+"&mostafed="+mostafed;
    }
    //-----------------------------------------------
    if(dataString !=0){
      //  alert(dataString);
      //$("#option_span").text(dataString);
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Exchange/LoadPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#option_table").html(html);
                     $("#total").val($("#total_count").val());
                }
            });
            return false;
      }      
      //-----------------------------------------------  
  } 
</script>
<script>
    function  get_some_family(){
       var dataString= 0;
       var cashing =$("#cashing").val();
       var count_family =$("#count_family").val();   
       var file_num =$("#file_num").val(); 
       if(cashing !=0 && file_num != 0 ){
        dataString = "opriun_id=2" +"&cashing="+cashing+"&count_family="+count_family+"&file_num="+file_num;
       }
           //-----------------------------------------------
    if(dataString !=0){
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Exchange/LoadPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                  
                    if(count_family ==1){
                         $("#option_table").html(html);
                          $('#count_family').val("2");
                    }else{
                          $("#id_example").append(html);  //  first_row
                       // $("#first_row").after(html);
                    }
                    $('#file_num').val("");
                    $('#cashing').val("");
                     //-----------------------------------
                         var cbs = document.getElementsByClassName("one_count");
                         total_values = 0 ;
                        for(var i=0; i < cbs.length; i++) {
                              total_values +=  parseFloat(cbs[i].value) ;
                        }
                        $('#total').val(total_values);
                        $('#total_values').text(total_values);
                    //-----------------------------------
                }
            });
            return false;
      }      
      //-----------------------------------------------  
    }
</script>

<script>

  function check_faminly(){
     var file_num =$("#file_num").val(); 
      dataString = "file_num_check="+file_num;
     
      if(file_num !=0){
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Exchange/LoadPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){   
                    if (html == 0) {
                            $("#span_file").html("الاسرة غير نشطة ");
                        } else if (html == 1 ) {
                            $("#span_file").html("");
                        }else if (html == 2 ) {
                            $("#span_file").html("الرقم غير صحيح");
                        }
                }
            });
            return false;
      }      
  }


</script>
<script>

   function remove_row(row_id){
    	$(row_id).parents('tr').remove();
        //-----------------------------------
         var cbs = document.getElementsByClassName("one_count");
         total_values = 0 ;
            for(var i=0; i < cbs.length; i++) {
                  total_values +=  parseFloat(cbs[i].value) ;
            }
        $('#total').val(total_values);
        $('#total_values').text(total_values);
        //-----------------------------------
   }
  

</script>


