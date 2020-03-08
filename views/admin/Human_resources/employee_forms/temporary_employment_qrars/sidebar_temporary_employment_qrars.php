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
    <div  class=" panel panel-bd lobipanel-noaction  ">
        <div class="panel-heading">
            <h3 class="panel-title">البيانات الأساسية</h3>
        </div>
        
        <?php     // if(!empty($personal_data)){ ?>
        
        <div class="panel-body">
            <div class="col-md-12 no-padding">
                <div class="user-widget list-group">
                    <div class="list-group-item heading">
                        <?php 
                        
                        
                        /*
                        echo '<pre>';
                        print_r($personal_data[0]);
                        echo '<pre>';*/
                        $user_img="";
                        if(!empty($personal_data)){
                            $user_img=  $personal_data[0]->personal_photo ;
                        }?>
                        <img style="width: 100px;" id="blah" class="media-object center-block" src="<?=base_url()?>/uploads/images/<?php echo $user_img ?>"
                             onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">
                        <div class="clearfix"></div>
                    </div>
                    <table class="table-bordered table table-pro" style="table-layout: fixed;">
                    <tbody>
                    <tr>
                    <th> <strong class="text-danger "> إسم الموظف  </strong> </th>
                    <td><?php if(!empty($personal_data)){  echo $personal_data[0]->employee;}?></td>
                    </tr>
                    
                    
                     <tr>
                    <th><strong class="text-danger ">الإدارة </strong></th>
                    <td><?php if(!empty($personal_data)){ echo  $personal_data[0]->admin_name;}?></td>
                    </tr>
                    
                     <tr>
                    <th><strong class="text-danger ">القسم</strong></th>
                    <td><?php if(!empty($personal_data)){ echo $personal_data[0]->depart_name;}?></td>
                    </tr>
                    
                     <tr>
                    <th><strong class="text-danger ">المسمى الوظيفى   </strong></th>
                    <td> <?php if(!empty($personal_data)){ echo  $personal_data[0]->degree_name;}?></td>
                    </tr>
                    
                     <tr>
                    <th><strong class="text-danger ">المدير المباشر  </strong></th>
                    <td><?php if(!empty($personal_data)){ echo  $personal_data[0]->manger_name;}?></td>
                    </tr>
                    
                    </tbody>
                    
                    </table>
                    <!--

                    <a href="#" class="list-group-item">
                        <p class="list-group-item-text "><strong class="text-danger "> الاسم بالكامل  :</strong>
                        <?php if(!empty($personal_data)){  echo $personal_data[0]->employee;}?>
                        
                        </p>

                    </a>
                    <a href="#" class="list-group-item">
                        <p class="list-group-item-text"><strong class="text-danger ">الإدارة :&nbsp &nbsp</strong> <?php if(!empty($personal_data)){ echo  $personal_data[0]->admin_name;}?></p>
                    </a>
                    <a href="#" class="list-group-item">
                        <p class="list-group-item-text"><strong class="text-danger ">القسم  :&nbsp &nbsp</strong> <?php if(!empty($personal_data)){ echo $personal_data[0]->depart_name;}?></p>
                    </a>
                    <a href="#" class="list-group-item">
                        <p class="list-group-item-text"><strong class="text-danger ">المسمى الوظيفى   :&nbsp &nbsp</strong> <?php if(!empty($personal_data)){ echo  $personal_data[0]->degree_name;}?></p>
                    </a>
                    <a href="#" class="list-group-item">
                        <p class="list-group-item-text"><strong class="text-danger ">المدير المباشر   :&nbsp &nbsp</strong> <?php if(!empty($personal_data)){ echo  $personal_data[0]->manger_name;}?></p>
                    </a>
                    -->
                </div>
            </div>

        </div>
        
        <?php //}else{  } 
        ?>
        
    </div>
</div>