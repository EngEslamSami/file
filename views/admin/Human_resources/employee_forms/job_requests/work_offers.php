

<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;  ?></h3>
        </div>
        <?php       if(isset($records) &&!empty($records)){ ?>
            <table id="" class=" example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th class="text-center">م</th>
                    <th class="text-center">رقم الطلب</th>
                    <th class="text-center">إسم المتقدم</th>
                    <th class="text-center">هوية رقم</th>
                    <th class="text-center">الوظيفه المتقدم اليها</th>
                    <th class="text-center">تاريخ المقابلة</th>
                    <th class="text-center">درجه المقابلة</th>
                    <th class="text-center"> الاجراء</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $a=1;
                if(isset($records)&&!empty($records)) {
                    foreach ($records as $record) {
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><? echo $record->id; ?></td>
                            <td><? echo $record->name; ?></td>
                            <td><? echo $record->national_num; ?></td>
                            <td><?php if(isset($record->job_title[0]->job_title) && !empty($record->job_title[0]->job_title)){
                                    echo $record->job_title[0]->job_title; }  ?></td>
                            <td><?php $date = 'لم يحدد بعد';
                                $class ='danger';
                                if(isset($record->interview_date)  && !empty($record->interview_date)){
                                    $date = $record->interview_date;
                                    $class ='success';
                                } echo "<span class=' label label-".$class." '>$date</span>"; ?>
                                   </td>
                                   <td>
                                   <? echo $record->total_degree; ?>
                                   </td>
                                   <td>
                                   <!-- <a href="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/offer_work/<?php echo $record->id;?>"target="_blank"><button class="btn btn-add" >عرض عمل </button></a> -->
                                 
                                   <a href="<?php echo base_url();?>human_resources/employee_forms/ta3en/Temporary_employment_qrars/add_temporary_employment_from_work_qrars/<?php echo $record->id;?>"target="_blank"><button class="btn btn-add" > تعيين مؤقت </button></a>
                                   </td>
                        </tr>
                        <label class="bg-danger"></label>
                        <?php
                        $a++;
                    }
                } else {?>
                    <td colspan="6"><div style="color: red; font-size: large;">لا توجد طلبات للتوظيف</div></td>
                <?php  }  ?>
                </tbody>
            </table>
        <?php }else{
             ?>
            
<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>عذرا !</strong> لا يوجد طلبات محدد لها مقابلات شخصية 
     </div>

            
        <?php }  ?>
    </div>
</div>


