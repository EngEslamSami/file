<div class="col-xs-12 " data-wow-delay="0.2s">
    <div class="panel panel-bd lobidisable">
        <div class="panel-heading">
            <h3 class="panel-title">رسوم العضويه</h3>
        </div>
        <div class="panel-body">
        <div class="col-sm-6">
                <div class="form-group col-sm-12 col-xs-12">
                    <label class="label label-green  half">العضو </label>
                     <select name="" id="member" class="selectpicker form-control half member"  data-show-subtext="true" data-live-search="true" data-validation="required" >
                            <option value="">--قم بإختيار إسم العضو --</option>
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
        
         <div class="col-sm-1">
        <input type="button" value="ابحث" class="btn btn-primary search" />
       </div>
        </div>
        <div id="area">
       
        </div>
        </div>
        
        </div>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    
    $('.search').click(function(){
       
        var id=$('.member').val();
         var dataString = 'student_code=' + id;
        $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>disability_managers/New_member_pill/get_debt_report",
                data: dataString,
                dataType: 'html',
                cache:false,
                success: function (html) {
                   
            $('#area').html(html);
                }
            });
        });
        </script>