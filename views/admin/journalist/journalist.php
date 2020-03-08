<div class="details-resorce col-xs-11 r-inner-details"  >
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
    <?php if(isset($result)):?>
        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('dashboard/update_journalist/'.$result['id'])?>
       
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ الخبر:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="text" class="form-control docs-date" value="<?php echo $result['date']; ?>" name="news_date" placeholder="شهر / يوم / سنة ">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> عنوان الخبر:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" value="<?php echo $result['title']; ?>" name="news_name" >
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> عدد الصور:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());"  placeholder="   عدد الصور" >
                        </div>
                    </div>
                    <div id="optionearea1"></div>
                    <?php
                    $photo=unserialize($result['image']);
                    if($photo){
                        echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>';
                        for($x = 0 ; $x < count($photo) ; $x++){
                            if(count($photo) > 1)
                            {
                                $td = '<td style="padding-top: 10%;">
                               <a  href="'.base_url().'dashboard/delete_photo_/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                            }
                            else
                                $td = '';
                            $img = base_url('uploads/images').'/'.$photo[$x];
                            echo '<tr class="">
                          <td class="text-center">
                          <img src="'.$img.'" height="100px" width="100px">
                          </td>
                          '.$td.'
                          </tr>';
                        }
                        echo '</thead></table>';
                    }
                    ?>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> محتوي الخبر: </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <textarea name="details" id="details"  class="form-control"><?php echo $result['content']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> المصدر:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4"  value="<?php echo $result['newspaper_name']; ?>" id="newspaper_name" name="newspaper_name" >
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> لوجو المصدر: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <img src="<?php echo base_url('uploads/images/'.$result['logo'].''); ?>" height="50px" width="50px">
                            <input type="file" id="logo" name="logo"  class="form-control text-right"/>
                            <span class="help-block">اذا اردت تعديل اللوجو اضف  </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit" name="update" value="حفظ" class="btn btn-primary" >
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
            </div>
      
        <!-- </form>-->
        <!-- </form>-->
        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('dashboard/add_journalist')?>
     
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ الخبر:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="text" class="form-control docs-date" name="news_date" placeholder="شهر / يوم / سنة ">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> عنوان الخبر:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="news_name" >
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> عدد الصور:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());"  placeholder="   عدد الصور" required>
                        </div>
                    </div>
            <div id="optionearea1"></div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> محتوي الخبر: </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <textarea name="details" id="details"  class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> المصدر:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" id="newspaper_name" name="newspaper_name" >
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> لوجو المصدر: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="file" id="logo" name="logo"  class="form-control text-right"/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit"  name="add_news" value="حفظ" class="btn btn-primary" >
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
</div>
      
        <!-- </form>-->
        <?php echo form_close()?>
    <?php endif?>
</div>
<div class="col-md-11  col-sm-11 col-xs-11 inner-side r-data">
<?php if(isset($records)&&$records!=null):?>
    <div class="col-xs-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">عنوان الخبر</th>
            <th  class="text-center">المصدر</th>
            <th class="text-center">تاريخ الخبر</th>
            <th  class="text-center">التحكم</th>
            <th  class="text-center">حالة الخبر</th>
            <th  class="text-center">تم النشر بواسطة</th>
        </tr>
        </thead>
        <tbody>
        <?php $serial = 0; ?>
        <?php foreach($records as $record):?>
        <?php 
            $serial++; 
            if($record->suspend == 1)
            {
                $class = 'success';
                $title = 'نشط';
            }
            else
            {
                $class = 'danger';
                $title = 'غير نشط';
            }
        ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                <td ><?php echo $record->title?></td>
                <td ><?php echo $record->newspaper_name?></td>
                <td ><?php echo $record->date?></td>
                <td data-title="التحكم" class="text-center">
                      <i class="fa fa-list" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"></i>

              
                    <a href="<?php echo base_url().'dashboard/update_journalist/'.$record->id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'dashboard/delete_journalist/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
                <td data-title="" class="text-center">
                    <a href="<?php echo base_url().'dashboard/suspend_journalist/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs"><?php echo $title ?> </a>
                </td>
                <td ><?php echo
                   //$user[$record->publisher] ;                
                 $user[($serial-1)]['user_name'] ?></td>
            </tr>
            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">أخبار الجمعية</h4>
      </div>
      <br />
        <div class="col-sm-3" style="font-size: 16px;">تاريخ الخبر</div>
          <div class="col-sm-9"  style="font-size: 16px;">
            <?php echo $record->date?>
          </div>
      <br /><br />
        <div class="col-sm-3" style="font-size: 16px;">عنوان الخبر</div>
          <div class="col-sm-9"  style="font-size: 16px;">
            <?php echo $record->title?> 
          </div>
       <br /><br />
      <div class="modal-body">
      <div class="col-sm-2" style="font-size: 16px;">صور الخبر</div>
      <div class="col-sm-10">
        <div class="row">
         <div id="myCarousel<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">';
    <?php
    $photo=unserialize($record->image);
    for($x=0;$x<count($photo);$x++){
        if($x==0){
            $active='active';
        }else{
            $active='';
        }
        $img = base_url('uploads/images').'/'.$photo[$x];
    echo '
      <div class="item '.$active.'">
        <img src="'.$img.'" alt="صور الخبر">
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
        <br />
         <div class="col-md-3" style="font-size: 16px;"></div>
        <div class="col-md-9"></div>
        <br /><br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;">تفاصيل الخبر</div>
          <div class="col-sm-8">
            <?php echo $record->content?> 
          </div>
        </div>
        <br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;">المصدر</div>
          <div class="col-sm-8">
            <?php echo $record->newspaper_name?> 
          </div>
        </div>
        <br />
        <div class="row">
        <div class="col-sm-4" style="font-size: 16px;">لوجو المصدر</div>
          <div class="col-sm-8">
            <img src="<?php echo base_url('uploads/images/'.$record->logo.''); ?>" height="200px" width="200px">
          </div>
        </div>
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
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>
    </div>
<?php endif;?>
    </div>
<script>
 function lood(num){
    if(num>0 && num != '')
    {
        var id = num;
        var dataString = 'num=' + id ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_journalist',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea1").html(html);
            } 
        });
        return false; 
        }
        else
        {
            $("#photo_num").val('');
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