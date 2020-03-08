



<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->

    <?php if(isset($result)):?>

        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('Public_relation/update_album/'.$result['id'])?>

      

        

            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اسم الألبوم:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            
                                    <input type="text" class="r-inner-h4" value="<?php echo $result['title'] ?>" name="title" data-validation="required">

                               
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الصور:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                           
                                    <input type="number" class="r-inner-h4" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());"  placeholder="   عدد الصور" >

                                
                        </div>
                    </div>


                    <div id="optionearea1"></div>
                    <?php

                    $photo=unserialize($result['img']);
                    if($photo){
                        echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                        for($x = 0 ; $x < count($photo) ; $x++){
                            if(count($photo) > 1)
                            {
                                $td = '<td style="padding-top: 10%;">
                               <a  href="'.base_url().'Public_relation/delete_photo_album/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                            }
                            else
                                $td = '';

                            $img = base_url('uploads/images').'/'.$photo[$x];
                            echo '<tr class="">
                          <td class="text-center">
                          <img src="'.$img.'" height="200px" width="200px">
                          </td>
                          '.$td.'
                          </tr>';
                        }
                        echo '</thead></table>';
                    }
                    ?>
                </div>


                <div class="col-xs-12 r-inner-btn">

                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">

                        <input type="submit"  name="update_album" value="تعديل" class="btn btn-primary" >

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>

                </div>

            </div>







   

        <!-- </form>-->



        <!-- </form>-->

        <?php echo form_close()?>

    <?php else: ?>

        <?php echo form_open_multipart('Public_relation/add_album')?>
     
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اسم الألبوم:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                           
                                    <input type="text" class="r-inner-h4" name="title"  data-validation="required" />

                               
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الصور:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            
                                    <input type="number" class="r-inner-h4" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());"  placeholder="   عدد الصور" data-validation="required" />

                                
                        </div>
                    </div>

            
            <div id="optionearea1"></div>

  </div>


                <div class="col-xs-12 r-inner-btn">

                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">

                        <input type="submit"  name="add_album" value="حفظ" class="btn btn-primary" >

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>

                </div>

</div>
 

        <!-- </form>-->

        <?php echo form_close()?>

    <?php endif?>





<?php if(isset($records)&&$records!=null):?>


    <div class="col-xs-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

        <thead>

        <tr>

            <th width="2%">#</th>
            <th  class="text-center">اسم الألبوم</th>

            <th  class="text-center">الصور</th>


            <th width="30%" class="text-center">التحكم</th>
            

        </tr>

        </thead>
        <tbody>
        <?php $serial = 0; ?>
        <?php foreach($records as $record):?>
        <?php 
            $serial++; 
    $photo=unserialize($record->img);
     $img='';
     
    for($x=0;$x<count($photo);$x++){
       
        $img = base_url('uploads/images').'/'.$photo[$x];
 
    }
         
        ?>
            <tr>
                <td data-title="#" class="text-center"> <span class="badge"><?php echo $serial?></span></td>
                <td data-title="#" class="text-center"><?php echo $record->title?></td>

                <td data-title="صورة الإعلان" style=" padding-right: 150px;">

                <div id="myCarouse<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">
                 
    <?php
    $photo=unserialize($record->img);
    for($x=0;$x<count($photo);$x++){
        if($x==0){
            $active='active';
        }else{
            $active='';
        }
        $img = base_url('uploads/images').'/'.$photo[$x];
    echo '
      <div class="item '.$active.'" >
        <img src="'.$img.'" alt="صور المكتبة" style="width:100px;height:100px;">
      </div>';
    }
    ?>
    
    </div>
    <a class="left carousel-control" href="#myCarouse<?php echo $record->id?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarouse<?php echo $record->id?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
                </td>
              
                <td data-title="التحكم" class="text-center">
                   
                    <!--<i class="fa fa-list" data-toggle="modal" data-target="#myModal<?php /*echo $record->id*/?>"></i>-->
                    <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"></i>

                    <a href="<?php echo base_url().'Public_relation/update_album/'.$record->id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'Public_relation/delete_album/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i>

                </td>
                
       
              

            </tr>
                        <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">مكتبة الصور</h4>
      </div>
      <br />
      


       
      <div class="modal-body">
      <div class="col-sm-2" style="font-size: 16px;">الصور</div>
      <div class="col-sm-10">
        <div class="row">
         <div id="myCarousel<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">
                 
    <?php
    $photo=unserialize($record->img);
    for($x=0;$x<count($photo);$x++){
        if($x==0){
            $active='active';
        }else{
            $active='';
        }
        $img = base_url('uploads/images').'/'.$photo[$x];
    echo '
      <div class="item '.$active.'">
        <img src="'.$img.'" alt="صور المكتبة">
      </div>';
    }
    ?>
    
    </div>
    <a class="left carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
  
  <br/><br /> 
        </div>
        
 
         <div class="col-md-3" style="font-size: 16px;"></div>
        <div class="col-md-9"></div>
        <br /><br />

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
  

        <?php endforeach ;?>

        </tbody>

    </table>
</div>
   

<?php endif;?>

        </div>
    </div>
</div>







<script>
 function lood(num){
    if(num>0)
    {
        var id = num;
        var dataString = 'num=' + id ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/Public_relation/add_album',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea1").html(html);
            } 
        });
    
        return false; 
        } 
        else{
            $("#optionearea1").html('');
        }
 }
</script>

<style>
          .carousel-inner > .item > img,
          .carousel-inner > .item > a > img {
              width: 70%;
              margin: auto;
          }
  </style>
