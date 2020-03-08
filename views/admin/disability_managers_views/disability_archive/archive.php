<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12">
<?php if(isset($records)&& $records!=null && !empty($records)){?>
        <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
           <tr>
                <th class="text-center">م</th>
                <th class="text-center">رقم المستفيد</th>
                <th class="text-center">إسم المستفيد</th>
                <th class="text-center">نوع الاعاقة</th>
                <th class="text-center">السجل المدني</th>
                <th class="text-center">تفاصيل  </th>
            </tr>
            </thead>
            <tbody>
            <?php $x=1;  foreach($records as $record):?>
                <tr>

                    <td ><span class="badge"><?php echo  $x++?></span></td>
                    <td ><?php echo $record->p_num?> </td>
                    <td ><?php echo $record->p_name?> </td>
                    <td ><?php echo $record->disability_title?> </td>
                    <td ><?php echo $record->p_national_num?> </td>
                    <td >
                        <a href="<?php echo base_url().'disability_managers/DisabilityArchive/Details/'.$record->id?>">
                            <i class="fa fa-search-plus " aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ;?>
            </tbody>
        </table>

<?php }else{
     echo '<div class="alert alert-danger">
              <strong>لا يوجد !</strong> مستفيدين متاحين  .
           </div>';
}?>
        </div>




    </div>
</div>

