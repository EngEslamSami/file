<?php if(isset($mother )  ||  isset($member ) ){?>


    <?php $y=1;
    if(isset($mother )  && !empty($mother) &&  $mother !=null){
    foreach ($mother as $mother_row){
        if(!empty($person_in)){ if(in_array($mother_row->mother_national_num_fk,$person_in)){ continue ; }}
     $y++;  }}
    if(isset($member )  && !empty($member) &&  $member !=null){
    foreach ($member as $member_row){
        if(!empty($person_in)){ if(in_array($member_row->id,$person_in)){ continue ; }}
        $y++;}}
    ?>
    <?php if($y == 1){
        echo '<div class="alert alert-warning alert-dismissable">
                <a href="#" class="" style="color: black"  data-dismiss="alert" aria-label="close">
                    <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                <strong> تمت الاضافة مسبقا الى المشروع   !</strong> .
            </div>';
    }else{
    ?>


<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="text-center">م</th>
        <th class="text-center">#</th>
        <th class="text-center">الأسم </th>
    </tr>
    </thead>
    <tbody class="text-center">

<?php $x=1;
     if(isset($mother )  && !empty($mother) &&  $mother !=null){
       foreach ($mother as $mother_row){
           if(!empty($person_in)){ if(in_array($mother_row->mother_national_num_fk,$person_in)){ continue ; }}
           ?>
       <tr>
         <td><?=$x++?></td>
         <td><input name="person[]"  value="<?=$mother_row->mother_national_num_fk."-0"?>" tabindex="9" type="checkbox"  data-validation="required"></td>
         <td><?=$mother_row->full_name?> </td>
       </tr>
       <?php }?>
<?php }?>

<?php
if(isset($member )  && !empty($member) &&  $member !=null){
    foreach ($member as $member_row){
if(!empty($person_in)){ if(in_array($member_row->id,$person_in)){ continue ; }}
?>
    <tr>
        <td><?=$x++?></td>
        <td><input name="person[]"  value="<?=$member_row->id."-1"?>"  tabindex="9" type="checkbox"  data-validation="required"></td>
        <td><?=$member_row->member_full_name?> </td>
    <tr>
    <?php }?>
<?php }?>

    </tbody>
</table>

<?php } //  end else if($y == 1) ?>

<?php }else{
    echo '<div class="alert alert-warning alert-dismissable">
                <a href="#" class="" style="color: black"  data-dismiss="alert" aria-label="close">
                    <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                <strong> لا يوجد نتائج مطابقة  !</strong> .
            </div>';
}?>
