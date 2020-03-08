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
            <h3 class="panel-title">بيانات المتبرع</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12 no-padding">
                <div class="user-widget list-group">
                    <div class="list-group-item heading">
                        <?php 

                        $user_img="";
                        if(isset($result)){
                            $user_img= $result->person_img ;
                        }?>
                        <img style="width: 100px;" id="blah" class="media-object center-block" src="<?=base_url()?>/uploads/images/<?php echo $user_img ?>"
                             onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">
                        <div class="clearfix"></div>
                    </div>
                    <table class="table-bordered table table-pro" style="table-layout: fixed;">
                    <tbody>
                    
                    <tr>
                    <th><strong class="text-danger ">رقم المتبرع </strong></th>
                    <td><?php if(isset($result)){ echo  $result->d_num;}?></td>
                    </tr>
                    
                    <tr>
                    <th> <strong class="text-danger "> إسم المتبرع  </strong> </th>
                    <td><?php if(isset($result)){  echo $result->d_name;}?></td>
                    </tr>
                    
                     
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>