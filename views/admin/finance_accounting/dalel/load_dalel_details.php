
<?php

$types = array(1=>'رئيسي',2=>'فرعي');
$nature = array('إختر','مدين','دائن');
$follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
        
?>
<div class="col-xs-12 no-padding">
    <table class="table">
        <tbody>
        <tr>
            <td style="width: 105px;"><strong> رقم الحساب </strong></td>
            <td><?php if (isset($result->code)){ echo $result->code ;} ?></td>
            
            <td style="width: 135px;"><strong>اسم الحساب  </strong></td>
            <td><?php if (isset($result->name)){ echo $result->name ;} ?></td>
        </tr>
        
        <tr>
            <td style="width: 135px;"><strong>نوع الحساب  </strong></td>
            <td><?php if (isset($result->hesab_no3)){ echo $types[$result->hesab_no3] ;} ?></td>
            <td colspan="2"></td>
        </tr>
        
        <tr>
            <td style="width: 150px;"><strong>طبيعه الحساب </strong></td>
            <td><?php if (isset($result->hesab_tabe3a)){ echo $nature[$result->hesab_tabe3a];}?></td>
            <td colspan="2"></td>
        </tr>
        
        <tr>
            <td  style="width: 200px " > <strong> تبويب الحساب</strong></td>
            <td><?php if (isset($result->hesab_report)){ echo $follow[$result->hesab_report];}?></td>
            <td colspan="2"></td>
        </tr>
        
        
        </tbody>
    </table>