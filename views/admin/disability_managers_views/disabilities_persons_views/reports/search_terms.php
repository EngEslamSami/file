<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
        
<div class="col-xs-12">
 <!---table------>
              
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  بنود البحث </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <?php 
                 /** Social Array ***/
            $search_terms = array('- اختر - ','طلبات المستفيدين الواردة','طلبات المستفيدين الموافق عليها','طلبات المستفيدين المرفوضة','طلبات المستفيدين التي تم اعتمادها');
            
            	 ?> 
                            <select name="medical_devices"  id="medical_devices"  class="selectpicker form-control  devices"  data-show-subtext="true" data-live-search="true" data-validation="required">
                                 <?php for ($x=0; $x < sizeof($search_terms); $x++){ ?>
                                        <option value="<?php echo $x; ?>"><?php echo $search_terms[$x];?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                
      <div class="col-sm-1">
        <input type="button" value="ابحث" class="btn btn-primary get" />
       </div>
      
    </div> 
      <div class="col-xs-12" id="optionearea2">  </div>   
    </div> 
    </div> 
   </div> 
    
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    
    $('.get').click(function(){
       
        var id=$('.devices').val();
        if(id != 0){
            var dataString = 'type=' + id;
        $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>disability_managers/Disability_manage/search_terms",
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
     