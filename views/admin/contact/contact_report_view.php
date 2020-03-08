<style>
td p{
    margin-bottom: 0;
}
.circle-icon {
    background-color: #0f8a00;
    color: #fff;
    border-radius: 50%;
    padding: 7px;
}
</style>
<div class="col-sm-12  no-padding" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> </h3>
        </div>
        <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">
    <div class="latest_notification">
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dash_tab1" aria-controls="home" role="dash_tab1" data-toggle="tab"><i class="fa fa-bell-o"></i> رسائل جديدة</a></li>
        <li role="presentation"><a href="#dash_tab2" aria-controls="dash_tab2" role="tab" data-toggle="tab"><i class="fa fa-thumb-tack"></i>  رسائل تم اتخاذ اجراء عليها </a></li>
        
       
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dash_tab1">
        
           <?php
            if(isset($result) && $result != null ){
                $x = 1;


            ?>
            <table id="example" class="table table-bordered" role="table">
                <thead >
                <tr class="blacktd">
                <th>م</th>
                <th>تاريخ الإرسال</th>
                <th>وقت الإرسال</th>
                <th>الاسم</th>
                
                <th>البريد الالكتروني</th>
                <th>رقم الجوال</th>
                <th>العنوان</th>
                <th>تفاصيل الرسالة</th>
                <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $row){
                    if ($row->seen ==1){
                        $span = "<span class=\"label  
                         \" style=\"
                         color:black ; background-color:#00ff00;font-size: 14px;  \">مقروءة
                      </span>";
                    }
                    elseif ($row->seen ==0){
                        $span = "<span  class=\"label  seen$row->id
                         \" style=\"
                         color:black ; background-color:#ff0000;font-size: 14px;  \">غير مقروءة
                      </span>";
                    }


                ?>
                <tr>
                <td><?= $x++?></td>
                <td><?php echo date("Y-m-d ",$row->send_time); ?></td>
              
                <td><?php echo $time = date("h:i A T",$row->send_time); ?></td>
                 <td><?= $row->name?></td>
                <td><?= $row->email?></td>
                <td><?= $row->phone?></td>
                <td><?= $row->address?></td>
                <td><button onclick="seen(<?=$row->id?>)" type="button" class="btn btn-info btn-xs"
                            data-toggle="modal" data-target="#myModal<?php echo $row->id?>">تفاصيل</button>
                            <button onclick="seen(<?=$row->id?>)" type="button" class="btn btn-info btn-xs"
                            data-toggle="modal" data-target="#myModal_action<?php echo $row->id?>">اجراءات</button>
                <td>
                    <a  href="<?php echo base_url().'admin/reports/Contact_us/DeleteContacts/'.$row->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn  btn-xs   "><i class="fa fa-trash"></i> </a>
                    <a onclick="print_card(<?= $row->id ?>)" title="طباعه"><i
                                            class="fa fa-print"></i></a>
<?= $span?>
                </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        
        
        </div>
        
       
        <?php foreach($result as $record){?>

                    <div id="myModal<?php echo $record->id?>" class="modal fade" role="dialog">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center">تفاصيل الرسالة</h4>
                            </div>
                            <div class="modal-body">


                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                       <td style="width: 150px;"><p style="font-weight:bold;"> <i class="fa fa-sort-numeric-desc circle-icon" ></i>
                                                رساله رقم  
                                			</p></td>
                                       <td><p style="font-weight: bold;font-size: 30px;">
                                				  <?php  
                                                if(isset( $record->id)&&!empty($record->id))
                                                {
                                               echo $record->id; }?>
                                			</p></td>
                                    </tr>
                                     <tr>
                                       <td>	<p><i class="fa fa-envelope-o circle-icon" ></i>   البريد الالكتروني</p></td>
                                       <td><a href="mailto:E-Services@rdcci.org.sa">
                                				    <label style="color:#0072c6; font-weight:bold;">
                                                    <?php
                                                    if(isset( $record->email)&&!empty($record->email))
                                                {
                                              
                                                 echo $record->email;
                                                
                                                }?>
                                                    </label>
                                			    </a></td>
                                    </tr>
                                     
                                    <tr>
                                        <td>
                                            <label style="font-weight:bold;"><i class="fa fa-address-book-o circle-icon"></i> الاسم
                                            
                                            </label>
                                        </td>
                                        <td>
                                            <label style="font-weight:bold;">
                                            <?php
                                                    if(isset( $record->name)&&!empty($record->name))
                                                {
                                           
                                                 echo $record->name;
                                              
                                                
                                                }?>
                                            </label>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <label style="font-weight:bold;"><i class="fa fa-phone circle-icon" ></i> هاتف
                                            
                                            </label>
                                        </td>
                                        <td>
                                            <label style="font-weight:bold;">
                                            <?php
                                                    if(isset( $record->phone)&&!empty($record->phone))
                                                {
                                           
                                                 echo $record->phone;
                                              
                                                
                                                }?>
                                            </label>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <label style="font-weight:bold;"><i class="fa fa-map-marker circle-icon" ></i> العنوان</label>
                                        </td>
                                        <td>
                                            <label style="font-weight:bold;">
                                            <?php  
                                                if(isset( $record->address)&&!empty($record->address))
                                                {
                                               echo $record->address; }?>
                                            
                                            
                                            </label>
                                        </td>
                                    </tr>
                                    
                                	<tr>
                                		<td  style="font-weight: bold;"><span><i class="fa fa-comment-o circle-icon" ></i> الرساله  :</span> 
                                		 
                                		</td>
                                        <td>
                                         <?php  
                                                if(isset( $record->message)&&!empty($record->message))
                                                {
                                               echo $record->message; }?>
                                        </td>
                                	</tr>
                                </tbody>
                                </table>



                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-danger btn-labeled"  data-dismiss="modal"><span class="btn-label"><i class="fa fa-times"></i></span>اغلاق</button>
                            </div>
                        </div>

                    </div>
                </div>
<!-- action -->
<div id="myModal_action<?php echo $record->id?>" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="    width: 80%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">اجراء الرسالة</h4>
                            </div>
                            <div class="modal-body">


                                <div class="row">

                                <table class="table table-striped table-hover">
    <tbody>
    <tr>
        <td colspan="2">
			<p style="font-weight:bold;">
                رساله رقم  
			</p>
			<p style="font-weight: bold;font-size: 30px;">
				  <?php  
                if(isset( $record->id)&&!empty($record->id))
                {
               echo $record->id; }?>
			</p>			
			<p>
البريد الالكتروني
                <a href="mailto:E-Services@rdcci.org.sa">
				    <label style="color:#0072c6; font-weight:bold;">
                    <?php
                    if(isset( $record->email)&&!empty($record->email))
                {
              
                 echo $record->email;
                
                }?>
                    </label>
			    </a>
			</p>			
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight:bold;">الاسم
            
            </label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php
                    if(isset( $record->name)&&!empty($record->name))
                {
           
                 echo $record->name;
              
                
                }?>
            </label>
        </td>
    </tr>
    
    <tr>
        <td>
            <label style="font-weight:bold;">هاتف
            
            </label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php
                    if(isset( $record->phone)&&!empty($record->phone))
                {
           
                 echo $record->phone;
              
                
                }?>
            </label>
        </td>
    </tr>
    
    <tr>
        <td>
            <label style="font-weight:bold;">العنوان</label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php  
                if(isset( $record->address)&&!empty($record->address))
                {
               echo $record->address; }?>
            
            
            </label>
        </td>
    </tr>
    
	<tr>
		<td colspan="2" style="font-weight: bold;padding: 36px;background-color: lightgray;"><span style="color:red;">الرساله  :</span> 
		  <?php  
                if(isset( $record->message)&&!empty($record->message))
                {
               echo $record->message; }?>
		</td>
	</tr>

    <tr>
		<td  colspan="2" ><span style="color:red;">الاجراء علي الرساله  :</span> 
		<?php
      
            echo form_open('admin/reports/Contact_us/contact_action/'. $record->id);
            ?>
<input type="radio" name="radio_end" data-title=""
                                                   id="radio_end" value="1"
                                               >
                                                   
                                     
                                              
                                             <label style="font-weight:bold;">            تم المتابعه
                                             </label>
                                       <input type="radio" name="radio_end" data-title=""
                                                   id="radio_end" value="2"
                                               >
                                                   
                                        
                                               <label style="font-weight:bold;">    تم التواصل
                                       </label>
                                        <input type="radio" name="radio_end" data-title=""
                                                   id="radio_end" value="3"
                                               >
                                                   
                                      
                                               <label style="font-weight:bold;">     لم يتم التواصل
                                       </label>
     
     <br />                                 
<label style="font-weight:bold;">  ملاحظات</label>
<input type="text" name="notes" class="form-control" /> 

		</td>
	</tr>
</tbody>
</table>



                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-labeled btn-success " style="float: right;"  >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                        <?php
            echo form_close();
            ?>
                                 <button type="button" class="btn  btn-danger btn-labeled"  data-dismiss="modal"><span class="btn-label"><i class="fa fa-times"></i></span>اغلاق</button>
                            
                            </div>
                            
                        </div>

                    </div>
                </div>
                <?php
            }}else{
                ?>
                <div class="alert-danger alert">عفوا...! لا يوجد بيانات متاحة</div>
            <?php
            }
            ?>
            <!-- action model -->
            


            <div role="tabpanel" class="tab-pane" id="dash_tab2">
            
            <?php
            
            // print_r( $data);
            if(isset($data) && $data != null ){
                $x = 1;


            ?>
            <table id="" class=" example table table-bordered" role="table">
                <thead>
                <tr>
                <th>م</th>
                <th>تاريخ الإرسال</th>
                <th>وقت الإرسال</th>
                
                <th>الاسم</th>
                <th>البريد الالكتروني</th>
                <th>رقم الجوال</th>
                <th>العنوان</th>
             
             
                <th>الاجراء المتخذ</th>
                <th> القائم بالاجراء</th>
                <th>تفاصيل الرسالة</th>
                <th>خيارات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data as $row){
                    if ($row->seen ==1){
                        $span = "<span class=\"label label-pill
                         \" style=\"
                         color:black ; background-color:#00ff00;font-size: 14px;  \">مقروءة
                      </span>";
                    }
                    elseif ($row->seen ==0){
                        $span = "<span  class=\"label label-pill seen$row->id
                         \" style=\"
                         color:black ; background-color:#ff0000;font-size: 14px;  \">غير مقروءة
                      </span>";
                    }


                ?>
                <tr>
                <td><?= $x++?></td>
<td><?php echo date("Y-m-d ",$row->send_time); ?></td>
<td><?php echo $time = date("h:i A T",$row->send_time); ?></td>
                <td><?= $row->name?></td>
                <td><?= $row->email?></td>
                <td><?= $row->phone?></td>
                <td><?= $row->address?></td>
                <td><?= $row->action_name?></td>
                <td><?= $row->action_publisher_name?></td>
                <td><button onclick="seen(<?=$row->id?>)" type="button" class="btn btn-info btn-xs"
                            data-toggle="modal" data-target="#myModal<?php echo $row->id?>">تفاصيل</button>
                        
                <td>
                    <a  href="<?php echo base_url().'admin/reports/Contact_us/DeleteContacts/'.$row->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn  btn-xs   "><i class="fa fa-trash"></i> </a>
                    <a onclick="print_card(<?= $row->id ?>)" title="طباعه"><i
                                            class="fa fa-print"></i></a>

                </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        
            </div>
            <?php foreach($data as $row){?>

<div id="myModal<?php echo $row->id?>" class="modal fade" role="dialog">
<div class="modal-dialog" style="    width: 80%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">تفاصيل الرسالة</h4>
        </div>
        <div class="modal-body">

            <table class="table table-striped table-hover">
                  <tbody>
                    <tr>
                        <td><p style="font-weight:bold;">رساله رقم </p></td>
                        <td><p style="font-weight: bold;font-size: 30px;">
                        <?php  
                        if(isset( $row->id)&&!empty($row->id))
                        {
                        echo $row->id; }?>
                        </p></td>
                    </tr>
                    <tr>
                        <td> <p>  البريد الالكتروني</p></td>
                        <td><a href="mailto:E-Services@rdcci.org.sa">
                    <label style="color:#0072c6; font-weight:bold;">
                    <?php
                    if(isset( $row->email)&&!empty($row->email))
                    {
                    
                    echo $row->email;
                    
                    }?>
                    </label>
                    </a></td>
                    </tr>
                    
                    <tr>
                        <td>
                        <label style="font-weight:bold;">الاسم
                        
                        </label>
                        </td>
                        <td>
                        <label style="font-weight:bold;">
                        <?php
                        if(isset( $row->name)&&!empty($row->name))
                        {
                        
                        echo $row->name;
                        
                        
                        }?>
                        </label>
                        </td>
                    </tr>
                    
                    <tr>
                    <td>
                        <label style="font-weight:bold;">هاتف
                        
                        </label>
                        </td>
                        <td>
                        <label style="font-weight:bold;">
                        <?php
                        if(isset( $row->phone)&&!empty($row->phone))
                        {
                        
                        echo $row->phone;
                        
                        
                        }?>
                        </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                        <label style="font-weight:bold;">العنوان</label>
                        </td>
                        <td>
                        <label style="font-weight:bold;">
                        <?php  
                        if(isset( $row->address)&&!empty($row->address))
                        {
                        echo $row->address; }?>
                        
                        
                        </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" style="font-weight: bold;padding: 36px;background-color: lightgray;"><span style="color:red;">الرساله  :</span> 
                        <?php  
                        if(isset( $row->message)&&!empty($row->message))
                        {
                        echo $row->message; }?>
                        </td>
                    </tr>
                    </tbody>
                </table>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-danger btn-labeled"  data-dismiss="modal"><span class="btn-label"><i class="fa fa-times"></i></span>اغلاق</button>
        </div>
    </div>

</div>
</div>
<?php
            }}else{
                ?>
                <div class="alert-danger alert">عفوا...! لا يوجد بيانات متاحة</div>
            <?php
            }
            ?>












      </div>
    
    </div>
</div>
        </div>
    </div>
</div>


<script>
    function seen(id) {
       var id = id;
       var dataString ='id='+id;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/reports/Contact_us/update_message',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
               $('.seen'+id).css({"background-color": "#00ff00", "font-size": "14px"});
               $('.seen'+id).text('مقروءة');

            }
        });

    }
</script>
<script>
    function print_card(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'admin/reports/Contact_us/print_card'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


</script> 

