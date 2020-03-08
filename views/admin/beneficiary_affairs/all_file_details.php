<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12">
<?php if(isset($records)&& $records!=null && !empty($records)){?>
    <?php $father_status = array('حي','متوفي'); ?>

        <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>

                <th  class="text-center">رقم الملف </th>
                <th  class="text-center">إسم الحالة (الام) </th>
                <th  class="text-center">حالة الاب </th>
                <th  class="text-center">رقم الهوية</th>
                <th  class="text-center">رأى الباحث</th>
                <th width="35%" class="text-center">التفاصيل </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($records as $record):?>
                <tr>

                    <td ><span class="badge"><?php echo  $record->id?></span></td>
                    <td ><?php echo $record->name?> </td>
                    <td ><?php echo $father_status[$record->father_status]?> </td>
                    <td ><?php echo $record->card_id?> </td>
                    <td >
                        <a href="<?php echo base_url().'BeneficiaryAffairs/researcher_opinion/'.$record->id?>">
                            <i class="fa fa-sticky-note-o" aria-hidden="true" title="إضافة رأى الباحث"></i></a>

                    </td>
                    <td >
                        <a href="<?php echo base_url().'BeneficiaryAffairs/FileDetails/'.$record->id?>">
                            <i class="fa fa-search-plus " aria-hidden="true"></i></a>

                    </td>
                </tr>
            <?php endforeach ;?>
            </tbody>
        </table>

<?php }else{
     echo '<div class="alert alert-danger">
              <strong>لا يوجد !</strong> ملفات متاحة .
           </div>';
}?>
        </div>




    </div>
</div>

