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
</style>
<?php if(isset($result) && $result!=null){
           $form= form_open_multipart("person_controllers/Person/update_basic/".$result->id);
          $person_national_num=$result->person_national_num;
          $user_name=$result->user_name;
          $person_mob=$result->person_mob;
          $validation ='';
          $button ='تعديل ';
           $register_place=$result->register_place;
     }else{
          $form= form_open_multipart("person_controllers/Person/Add_Register");
          $person_national_num="";
          $user_name='';
          $person_mob='';
          $validation ='data-validation="required"';
          $button ='حفظ';
          $register_place='';
     }
?>
<div class="col-xs-12  " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(isset($records)&&$records!=null){?>

                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                             <th class="text-center">إسم الأم </th>
                                            <th class="text-center">رقم السجل المدني للام</th>
                                          
                                            <th class="text-center">رقم الجوال</th>
                                         <th class="text-center">التراجع عن الحذف</th>  
                                      
                                              <th class="text-center">تفاصيل</th>
                                           
                                                <th class="text-center">طباعه الملف</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php
if($record->mother_name != ''){ echo $record->mother_name; }else{ 
    echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل بيانات الأم</button>'; } 
?></td>
<td><?php echo $record->mother_national_num; ?></td>

<td><?php echo $record->mother_mob; ?></td>
<td> 
<!-- 
<a href="<?php echo base_url('family_controllers/Family/update_basic').'/'.$record->id?>"> 
<i class="fa fa-pencil " aria-hidden="true"></i> </a> 
-->
<a href="<?php echo  base_url('family_controllers/Family/update_delete_basic').'/'.$record->mother_national_num ?>" 
onclick="return confirm('هل انت متأكد من عملية التراجع عن الحذف  ؟');" >
<i class="fa fa-trash" aria-hidden="true"></i></a>
</td>

     
     <td>
   <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">تفاصيل</a>
      
     </td>
     
     

     
     
     
   <td><a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" > <i class="fa fa-print" aria - hidden = "true" ></i > </a>

</td>
     
    </tr>






    <?php
  
endforeach;

  ?>
<?php }else{
        echo '
	<div class="alert alert-danger" role="alert">
 لا يوجد ملفات
</div>';
	
    
} ?>
</tbody>
</table>    
   
</div>
</div>
</div>      
</div>
</div>
</div>
