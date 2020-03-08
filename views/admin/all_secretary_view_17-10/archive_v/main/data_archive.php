
<div class="col-sm-12 no-padding " >

<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">  الارشيف الالكتروني  </h3>
     </div>
    <div class="panel-body" >

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">
    <div class="latest_notification">
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dash_tab1" aria-controls="home" role="dash_tab1" data-toggle="tab"><i class="fa fa-bell-o"></i> الوارد</a></li>
      
        <li role="presentation"><a href="#dash_tab3" aria-controls="dash_tab3" role="tab" data-toggle="tab"><i class="fa fa-retweet"></i> الصادر  </a></li>

         
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dash_tab1">
        
    
            <?php 
            
            if(isset($all_wared_end)&&!empty($all_wared_end)){?>
            
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>   رقم الوارد</th>
              
                    <th> تاريخ الاستلام</th>
                    <th>جهه الاختصاص</th> 
                     <th>الجهه المرسله</th> 
                     <th>  عنوان الموضوع</th>
                     <th> طريقه الاستلام</th>
                     <th> الاولويه</th>
                 
                    <th>الاجراء</th>
                   
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($all_wared_end as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->rkm;?></td>
                        <td><?php echo $row->estlam_date;?></td>
                      <td><?php echo $row->geha_ekhtsas_name;?></td> 
                      <td><?php echo $row->geha_morsla_name;?></td> 
                      <td><?php echo $row->title;?></td>
                      <td><?php echo $row->tarekt_estlam_name;?></td>
                      
                    
                       <td><?php 
                       if($row->awlawya==1){echo 'هام';}elseif($row->awlawya==2){echo ' عادي  ';}elseif($row->awlawya==0){echo 'هام جدا  ';}  ?>
                    
                    
                    </td>
                        <td>
                        <button 
                                data-toggle="modal" data-target="#myModal_print"   
                                
                                onclick="get_print('<?php echo  $row->title?>','<?php echo  $row->date_ar?>' ,'<?php echo  $row->rkm?>');" 
                                class="btn btn-success">طباعه الباركود</button>




                        <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/compelete_details/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> اطلاع علي البيانات</a></li>
                   
                  </ul>
                </div> 
                <div id="span_reason">  
                </div>    
  
                        </td>
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
        
        
        
        
        
        </div>
      
        <div role="tabpanel" class="tab-pane" id="dash_tab3">
            


        <table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr class="visible-md visible-lg">
                        <th>م</th>
                        <th>   رقم الصادر</th>
                        <th>تاريخ الارسال</th>
                        <th>جهة الاختصاص</th>
                        <th>الجهة المرسل اليها</th>
                        <th>عنوان الموضوع</th>
                        <th>طريقة الارسال</th>
                      
                        <th>الاولويه</th>
                      
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_sader_end as $row){
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><?= $row->sader_rkm?></td>
                            <td><?php if (!empty($row->ersal_date)) {
                                echo  $row->ersal_date;
                                } else{
                                echo 'غير محدد' ;
                                }
                               ?></td>
                            <td><?php if (!empty($row->geha_ekhtsas_n)) {
                                    echo  $row->geha_ekhtsas_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                                 <td><?php if (!empty($row->geha_morsel_n)) {
                                    echo  $row->geha_morsel_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->mawdo3_name)) {
                                    echo  $row->mawdo3_name;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->tarekt_ersal_n)) {
                                    echo  $row->tarekt_ersal_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                           
                          
                            <td><?php if (!empty($row->awlawia_n)) {
                                    echo  $row->awlawia_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td>
                                <!-- <a  class="btn btn-xs btn-warning" style="padding:1px 5px;" href="<?= base_url().'all_secretary/archive/sader/Add_sader/add_deal/'.$row->id?>">
                                    <i class="fa fa-list "></i>
                                    استكمال البيانات
                                </a> -->

                                <button 
                                data-toggle="modal" data-target="#myModal_print"   
                                
                                onclick="get_print('<?php echo  $row->mawdo3_name?>','<?php echo  $row->date_ar?>' ,'<?php echo  $row->sader_rkm?>');" 
                                class="btn btn-success">طباعه الباركود</button>
                                <!-- <button onclick="get_print(<?php echo  $row->id?>,'<?php echo  $row->date_ar?>' ,<?php echo  $row->sader_rkm?>,<?php echo  $row->morfaq_num?>);"
                                        data-toggle="modal" data-target="#barcodeModal"   class="btn btn-success">طباعه الباركود</button> -->
                                <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/sader/Add_sader/add_deal/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>  اطلاع علي البيانات</a></li>
                   
                  </ul>
                </div> 
                                
                

                               


                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

        
        





        </div>
       
        
      </div>
    
    </div>
</div>
</div>
    
    </div>
</div>

<div class="modal fade" id="myModal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 class="modal-title">نموذج الطباعة </h4>
      </div>
      <div class="modal-body col-sm-12">
       <div class="col-sm-12">
                <div id="div_print" ></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
        <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
      </div>
    </div>

  </div>
</div>
<script>
    function get_print(id ,date,num){
       var print_id=id;
      var date_export=date;
      var num_post =num ;
        var dataString = 'id=' + print_id + '&type=' + 2 +  "&num="+num_post+"&date="+date_export ;
       $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/PrintCode',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>