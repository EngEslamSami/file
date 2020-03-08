




<?php
/*
echo ' FROM = '. $from .'<BR/>';


echo date("Y-m-d",1530738000);
echo ' to = '. $to .'<BR/>';
*/



if(isset($mothers) &&!empty($mothers)){
foreach ($mothers as $mother){



?>


<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> اٍسم الام : <?= $mother->mather_name ?></h3>
        </div>

        <div class="panel-body">
            <?php //var_dump($mother->childs); ?>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">اسم المستفيد </th>
                    <th class="text-center">النوع</th>
                    <th class="text-center">رقم الهوية للام</th>
                    <th class="text-center">العمر</th>
                    <th class="text-center">حاله المستفيد</th>
                </tr>
                </thead>
                <tbody class="text-center">

               <?php   $ben_num = 0; if(isset($mother->childs) &&!empty($mother->childs)){ $x = 1; foreach ($mother->childs as $child){
                   $num_total= count($mother->childs);

                   $benef =  "غير محدد نوع الاستفاده";
                   $age = (date('Y')-$child->member_birth_date_year);
                   if($child->member_gender == 0){
                       if(($age <= $mother->age->to_age_male) && ($age >= $mother->age->from_age_male)){
                           $benef =  "مستفيد";
                           $ben_num++;
                       }else{
                           $benef =  "غير مستفيد";


                       }

                   }elseif($child->member_gender == 1){
                       if(($age <= $mother->age->to_age_female)  && ($age >= $mother->age->from_age_female)){
                           $benef =  "مستفيد";
                           $ben_num++;
                       }else{
                           $benef =  "غير مستفيد";

                       }
                   }

                   ?>
                    <tr>
                        <td><?= $x ?></td>
                        <td><?= $child->member_full_name ?></td>
                        <td><?php echo ($child->member_gender == 0)? "ذكر" :'انثي'; ?></td>
                        <td><?= $mother->mother_national_num ?></td>
                        <td><?= $age ?></td>
                        <td><?= $benef ?></td>
                    </tr>
                <?php $x++;   }  ?>
               <div class="col-sm-12 col-xs-12">
                   <div class="form-group col-sm-4 col-xs-12 padd">
                       <label class="label label-green half"> عدد المستفيدين</label>
                       <input type="text" class="form-control  half" style="background-color: #0dd396"  value="<?= $ben_num ?>" disabled >
                   </div>

              
                       <div class="form-group col-sm-4 col-xs-12 padd">
                           <label class="label label-green half"> عدد الغير المستفيدين</label>
                           <input type="text" class="form-control  half" style="background-color: #0dd396"  value="<?= ($num_total-$ben_num) ?>" disabled >
                       </div>
                   </div>

               <?php }else { ?>
                   <tr>
                       <td colspan="6" style="color: red">  لاتوجد بيانات هذة الاسره</td>
                   </tr>
                <?php   } ?>
                </tbody>
                </table>
        </div>


    </div>
</div>

<?php } }else {
    ?>
    <div class="alert alert-danger col-md-12 ">عفوا لاتوجد بيانات</div>
    <?php
}
?>
