<style>
    .lobipanel-noaction {
        margin-bottom: 25px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }
    .list-group-item{
            padding: 10px 8px;
    }
   .table-pro th{
    width: 117px;
}
</style>

<div class="col-sm-3 no-padding">
   
       
        
                <div class="user-widget list-group">
                    <div class="list-group-item heading">
                        <?php 
                        /*
                        echo '<pre>';
                        print_r($personal_data[0]);
                        echo '<pre>';*/
                        $user_img="";


                        if(isset($car)){
                            $user_img= $car->b_car_img  ;
                        }?>
                        <img style="width: 100px;" id="blah" class="media-object center-block" src="<?=base_url()?>/uploads/images/<?php echo $user_img ?>"
                             onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">
                        <div class="clearfix"></div>
                    </div>
                    <table class="table-bordered table table-pro" style="table-layout: fixed;">
                    <tbody>
                    <tr>
                    <th> <strong class="text-danger "> كود السياره  </strong> </th>
                    <td><?php if(isset($car)){  echo $car->b_car_code;}?></td>
                    </tr>
                    
                    
                     <tr>
                    <th><strong class="text-danger ">طراز السيارة </strong></th>
                    <td><?php if(isset($car)){ echo  $car->traz;}?></td>
                    </tr>
                    
                     <tr>
                    <th><strong class="text-danger ">الماركة</strong></th>
                    <td><?php if(isset($car)){ echo $car->marka;}?></td>
                    </tr>
                    
                     <tr>
                    <th><strong class="text-danger ">سنة الموديل    </strong></th>
                    <td> <?php if(isset($car)){ echo  $car->b_car_model_year;}?></td>
                    </tr>
                    
                     <tr>
                    <th><strong class="text-danger "> رقم اللوحة </strong></th>
                    <td><?php if(isset($car)){ echo  $car->b_fi_car_board_num; ?> /  <?php echo  $car->b_se_car_board_num; }?></td>
                    </tr>
                    
                    </tbody>
                    
                    </table>

                </div>
          
    

</div>