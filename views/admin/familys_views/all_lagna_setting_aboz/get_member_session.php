

<style type="text/css">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {

        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 3px solid #9bbb59;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border{
        border:0 !important;
    }

    .gray_background{
        background-color: #eee;

    }
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    .under-line{
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3 ,
    .under-line .col-xs-4,
    .under-line .col-xs-6 ,
    .under-line .col-xs-8
    {
        border-left: 1px solid #abc572;
    }
.table-lgna tbody tr:nth-child(2n+1){
    background-color: #e6eed5 ;
}
</style>


<?php
if(isset($records) &&!empty($records)) {
        $indexs=array(1=>'المحور الأول',
                  2=>'المحور الثاني',
                  3=>'المحور الثالث',
                  4=>'المحور الرابع',
                  5=>'المحور الخامس',
                  6=>'المحور السادس');
         $reasons = array(0 => 'رفض', 1 => 'قبول');   
         $options=array(1=>'معتمد',2=>'معتمدمع التحفظ',3=>'معتذر');      
    ?>
    <!--------------------------------------------------------->
   <!-- <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)</p>
            <p>مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463</p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php // echo base_url();?>/asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)</p>
            <p>مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463</p>
        </div>
    </div> -->
    <!-- <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>محضر اجتماع لجنة الرعاية الإجتماعية رقم (<?php echo $row->year;?>/<?php echo $row->session_number;?>) </strong></h5><br>
    </div> -->
    <!--------------------------------------------------------->
    <div class="print_forma no-border col-xs-12 no-padding">
            <div class="personality">
                <h6>الحمد لله وحده وبعد :- </h6>
                <p>فى هذا اليوم الموافق  <?php echo date("Y-m-d",$row->date);?>م وفى تمام الساعة الرابعة والنصف مساءاّ عقدت لجنة الرعاية الإجتماعية إجتماعها رقم (<?php echo $row->year;?>/<?php echo $row->session_number;?>) </p>
                <?php  $x=1; foreach($records as $row){ ?>
                <p><?php echo $x;?>- <?php echo $row->title;?> .</p>
                <?php  $x++ ; }   ?>
            </div>
    </div> 
     <!--------------------------------------------------------->  
     
     
      <?php   $x = 1;
              foreach ($records as $row) {
      ?>
      <div class="piece-box">
       <div class="piece-header bordered-bottom">
        <h6><strong><?php echo $indexs[$x];?> :</strong><?php echo $row->title; ?></h6>
        </div>
                <div class="piece-body">
                    <div class="col-xs-12  under-line   no-padding">
                    
  
    <table class="table table-bordered table-devices">
        <thead>
        <tr>
            <th class="gray_background">م</th>
            <th class="gray_background">رقم الملف</th>
            <th class="gray_background">إسم رب الاسرة</th>
            <th class="gray_background">عدد الأفراد</th>
            <th class="gray_background">أرملة</th>
            <th class="gray_background">يتيم</th>
            <th class="gray_background">مستفيد</th>
          <!--  <th class="gray_background">نتيجه الجلسه</th>-->
            <th class="gray_background">قرار اللجنة </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($row->decision) && !empty($row->decision)) {
            $z = 0;
            $all_member=0;
            $armla=0;
            $yateem=0;
            $mostafid=0;
           
            foreach ($row->decision as $record) {
                $z ++;
                $all_member = $all_member + $record->all_member;
                $armla      = $armla + $record->armla + $record->armla_table_mother;
                $yateem     = $yateem + $record->yateem;
                $mostafid   = $mostafid + $record->mostafid;
                ?>
                <tr>
                    <td><?php echo $z; ?></td>
                    <td><?php echo $record->file_num; ?></td>
                    <td width="30%"><?php echo $record->father;?></td>
                    <td><?php echo $record->all_member; ?></td>
                    <td> <?php echo $record->armla +$record->armla_table_mother ; ?></td>
                    <td><?php echo $record->yateem; ?></td>
                    <td> <?php echo $record->mostafid; ?></td>
                    <!-- <td> <?php echo $reasons [$record->approved_lagna]; ?></td> -->
                    <td> <?php echo $record->reason_title; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
        <tfoot>
        <th class="gray_background" colspan="3">المجموع</th>
        <th><?php echo  $all_member ;?></th>
        <th><?php echo  $armla ;?></th>
        <th><?php echo  $yateem ;?></th>
        <th><?php echo  $mostafid ;?></th>
        <th class="gray_background"></th>
       
        </tfoot>
    </table>
</div>
</div>
</div>
<?php  $x++;} ?>

 <!------------------------------------------------------->
<?php   if (isset($member_galsa) && !empty($member_galsa)){  ?>

<div class="piece-box">
       <div class="piece-header bordered-bottom">
         <h6><strong>أعضاء اللجنة</strong></h6>
        </div>
                <div class="piece-body">
                    <div class="col-xs-12  under-line   no-padding">
                    
           
            <table class="table table-bordered table-lgna">
            <thead>
            <tr>
                <th class="gray_background">م</th>
                <th class="gray_background">الاســم</th>
                <th class="gray_background">الصفة</th>
                <th class="gray_background">التوقيع</th>
            </tr>
            </thead>
            <tbody>
            <?php       $x=1;  foreach ($member_galsa as $member) {  ?>
                <tr class="">
                    <td> <?=$x++?>  </td>
                    <td> <?=$member->member_name?>  </td>
                    <td> <?=$member->galsa_member_job?>  </td>
                    <td style="    text-align: right;  padding-right: 15px;">
                    <?php  $is_disable=""; //  checked=""
                           
                                  if($member->do_action ==0 && $member->session_active == 0){
                                 $is_disable='';
                             }elseif($member->do_action == 0  && $member->session_active == 1){
                                 $is_disable='disabled=""';
                             }elseif($member->do_action == 1  && $member->session_active == 1){
                                 $is_disable='';
                             }elseif($member->do_action == 1  && $member->session_active == 0){
                                 $is_disable='';
                             }
                           $dif=  time() -  $member->finished_date_s ;
                               if($dif >= (3600 * 15)){
                                  $is_disable='disabled=""';
                               } 
                         ?>
                    
                    <?php  foreach ($options as $key => $value) { ?>
                            <input type="radio" class="check<?php echo $member->session_number; ?>" <?=$is_disable?>
                               name="<?php echo $member->member_id; ?>" value="<?= $key ?>"
                               onchange="get_member_decision(<?php echo $member->member_id; ?>,<?php echo $member->lagna_number; ?>,<?php echo $member->session_number; ?>,$(this).val());"
                               <?php if (isset($member->member_decision) && $member->member_decision == $key) {
                                        echo 'checked';} ?>> <?= $value ?>
                        <?php } ?>
                 </td>
              
                </tr>
                <?php  } ?>

        </tbody>
        </table>
</div>
</div>
</div>
         <?php  } ?>
<!------------------------------------------------------->
<?php  }else{
     echo '<div class="alert alert-danger">
             <strong>لا يوجد محاور للجلسة !</strong> .
           </div>';
}?>