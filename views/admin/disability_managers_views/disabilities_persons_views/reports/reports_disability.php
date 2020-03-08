<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
        
<div class="col-xs-12">
 <!---table------>
                <?php if(!empty($types)):?>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  اختر نوع الإعاقة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="disabilities_type"  id="disabilities_type"  class="selectpicker form-control  type"  data-show-subtext="true" data-live-search="true" data-validation="required">
                                <option value=""> - اختر - </option>

                                    <?php foreach ($types as $record):?>
                                        <option value="<? echo $record->id; ?>"><?php echo $record->title;?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                
      <div class="col-sm-1">
        <input type="button" value="ابحث" class="btn btn-primary search" />
       </div>
       <?php  endif;?>
    </div> 
      <div class="col-xs-12" id="optionearea2">  </div>   
    </div> 
    </div> 
   </div> 
    
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    
    $('.search').click(function(){
       
        var id=$('.type').val();
        if(id != ''){
            var dataString = 'type=' + id;
        $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>disability_managers/Disability_manage/reports_disability",
                data: dataString,
                dataType: 'html',
                cache:false,
                success: function (html) {
                   
            $('#optionearea2').html(html);
                }
            });    
        }else{
            
        }
     
        });
        </script>
     