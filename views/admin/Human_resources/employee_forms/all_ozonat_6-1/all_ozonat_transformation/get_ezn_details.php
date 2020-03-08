<?php
if($row->no3_ezn==1)
{
    $ezn="استئذان شخصي";
}else if($row->no3_ezn==2){
    $ezn="استئذان للعمل";
}else{
    $ezn="غير محدد";
} ?>
<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="3" class="info">نوع الاستئذان:<?=$ezn ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>الموظف:-<?php echo $row->emp  ;?></td>
            <td>الاداره :<?php echo $row->adminstration  ;?></td>
            <td>القسم:<?php echo $row->departs  ;?></td>

        </tr>
        <tr>
            <td>تاريخ الاذن:- <?php echo date("d-m-Y",$row->ezn_date)   ;?></td>
            <td>الفتره:- <?php  echo  $row->fatra_n  ;?> </td>
            <td>  وقت البدايه:- <?php echo $row->from_hour  ;?></td>


        </tr>
        <td> وقت النهايه:- <?php echo $row->from_hour  ;?> </td>
        <td>    المده:-<?php echo $row->total_hours  ;?></td>
        </tr>
        <tr>
            <td colspan="3">السبب:-<?php echo $row->reason;?></td>
        </tr>

        </tbody>

    </table>
</div>