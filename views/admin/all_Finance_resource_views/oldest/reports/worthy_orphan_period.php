      <div class="col-xs-12" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title?> </h3>
            </div>
            <div class="panel-body">
<!-- open panel-body-->
 <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                                  
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data ">                     
                    <div class="col-xs-12 ">
                    <div class="col-xs-6">
                    <h4 class="r-h4 ">من فترة</h4>
                    </div>
                    <div class="col-xs-6 r-input ">
                    <div class="">
                    <div class="">
                    <input type="date" class="form-control " name="date_from"  id="date_from" placeholder="شهر/يوم/سنة " data-validation="required">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>       
                            
                            
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data ">                     
                    <div class="col-xs-12 ">
                    <div class="col-xs-6">
                    <h4 class="r-h4 ">إلي فترة</h4>
                    </div>
                    <div class="col-xs-6 r-input ">
                    <div class="">
                    <div class="">
                    <input type="date" class="form-control " name="date_to"  id="date_to" placeholder="شهر/يوم/سنة " data-validation="required">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                     
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data ">                     
                    <div class="col-xs-12 ">
                    <div class="col-xs-6">
                    <h4 class="r-h4 ">اليتيم</h4>
                    </div>
                    <div class="col-xs-6 r-input ">
                    <div class="">
                    <div class="">
                        <select name="id" id="id" class="selectpicker no-padding form-control choose-date form-control"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                        <option value="">إختر</option>
                        <option value="all">الكل</option>
                        <?php if(isset($members) && !empty($members) && $members!=null):
                        foreach($members as $row){
                        ?>
                        <?php foreach($row->sub_mem as $one_member){
                        
                        ?>
                        <option value="<?php echo $one_member->id?>"><?php echo $one_member->member_full_name?></option>
                        <?php }?>
                        </optgroup>
                        <?php }
                        endif?>
                        </select>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                     <div class="col-xs-12" >
                     <input type="submit" role="button" name="add" value=" بحث " onclick="return lood();" class="center-block" />
                        </div>

                    </div>
                </div>
                <div id="optionearea1"></div>
            </div>
        </div>
    </div>
</div>
<script>
    function lood(){
        var num1=   $('#date_from').val();
        var num2=   $('#date_to').val();
        var id=   $('#id').val();
        if( num1 != '' && num2 != '' && id != ''){
            var dataString = 'date_from=' + num1 + '&date_to=' + num2 + '&id=' + id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/reports/Reports/worthy_orphan_period',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
    }
</script>


