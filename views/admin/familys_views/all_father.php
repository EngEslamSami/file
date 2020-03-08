<style>
.inner-heading {
    background-color: #9ed6f3;
    padding: 10px;
}
.pop-text{
    background-color: #009688;
    color: #fff;
    padding: 7px;
    font-size: 14px;
    margin-bottom: 3px;
    margin-top: 3px;
}
.pop-text1{
    background-color:#eee;
     padding: 7px;
      font-size: 14px;
      margin-bottom: 3px;
       margin-top: 3px;
}
.pop-title-text{
    margin-top: 4px;
    margin-bottom: 4px;
    padding: 6px;
    background-color: #9ed6f3;
}
.span-validation{
    color: rgb(255, 0, 0);
    font-size: 12px;
    position: absolute;
    bottom: -10px;
    right: 50%;
}
.astric{
    color: red;
    font-size: 25px;
    position: absolute;
}
.help-block.form-error{
    color: #a94442  !important;
    font-size: 15px !important;
    position: absolute !important;
    bottom: -23px !important ;
    right: 50% !important ;
}
</style>

<div class="col-xs-12 fadeInUp wow" >

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
               <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center"> الاسم الأول</th>
                                            <th class="text-center">إسم الأب </th>
                                            <th class="text-center">إسم الجد</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php echo $record->f_first_name; ?></td>
<td><?php echo $record->f_father_name; ?></td>
<td><?php echo $record->f_grandfather_name; ?></td>
<td> <a href="<?php echo base_url('family_controllers/Family/update_fathers').'/'.$record->id?>"> 
<i class="fa fa-pencil " aria-hidden="true"></i> </a> 
<a href="<?php echo  base_url('amily_controllers/Family/delete_basic').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
<i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
    </tr>
    <?php
  
endforeach;  ?>
<?php endif; ?>
</tbody>
</table>    
   
</div>
</div>
</div>  
          
</div>
</div>
</div>