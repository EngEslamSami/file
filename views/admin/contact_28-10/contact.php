<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">

<?php if(isset($records)&&$records!=null):?>
    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-right">تاريخ الرسالة </th>
            <th  class="text-right">إسم المرسل </th>
            <th class="text-right">تفاصيل الرسالة</th>
            <th width="20%" class="text-right">التحكم</th>
            
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
        <?php 
            $x++; 
         
        ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title=""><?php echo date('Y-m-d',$record->date)?> </td>
                <td data-title=""><?php echo $record->name?> </td>
                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $record->id?>">تفاصيل</button>
                </td>
                <td data-title="التحكم" class="text-center">
                  
                    <a  href="<?php echo base_url().'dashboard/delete_message/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn  btn-xs   "><i class="fa fa-trash"></i> </a>
                </td>
                
                
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>




    <?php $x = 0; ?>
    <?php foreach($records as $record):?>

        <div id="myModal<?php echo $record->id?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تفاصيل الرسالة</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        
                        <div class="col-sm-4">
                            <h5>اسم المرسل بالكامل:</h5>
                        </div>
                        <div class="col-sm-8">
                            <h5><?php echo $record->name?></h5>
                        </div>
                        
                        
                        </div>
                        
                        <div class="row">
                        
                        <div class="col-sm-4">
                            <h5>ايميل  المرسل:</h5>
                        </div>
                        <div class="col-sm-8">
                            <h5><?php echo $record->email?></h5>
                        </div>
                        
                        
                        </div>
                        
                        <div class="row">
                        
                        <div class="col-sm-4">
                            <h5>رقم الجوال للمرسل:</h5>
                        </div>
                        <div class="col-sm-8">
                            <h5><?php echo $record->phone?></h5>
                        </div>
                        
                        
                        </div>
                        <div class="row">
                        
                        <div class="col-sm-4">
                            <h5>العنوان:</h5>
                        </div>
                        <div class="col-sm-8">
                            <h5><?php echo $record->address?></h5>
                        </div>
                        
                        
                        </div>
                         <div class="row">
                        
                        <div class="col-sm-4">
                            <h5>نص الرسالة:</h5>
                        </div>
                        <div class="col-sm-8">
                            <h5><?php echo $record->message?></h5>
                        </div>
                        
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info "  style="float: left" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


    <?php endforeach ;?>
    <?php else: ?>
    <div class="alert-danger"> <h2>عفوا لا يوجد رسائل واردة </h2></div>
    
<?php endif;?>


 </div>
        
   
                        </div>
                        
                    </div>
