<style>
/*********** upload malti img ****/

.block {
    background-color: rgba(255, 255, 255, 0.5);
    margin: 0 auto;
    margin-bottom: 30px;
    text-align: center;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

label.button {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background-color: #c72530;
    border: 1px solid #eee;
    color: #fff;
    padding: 7px 15px;
    margin: 5px 0;
    display: inline-block;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}

label.button:hover {
    color: #c72530;
    background-color: #fff;
    border: 1px solid #ccc;
    cursor: pointer;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}

input#images {
    display: none;
}

#multiple-file-preview {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}

#files1 {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}

#sortable {
    list-style-type: none;
    margin: 0;
    padding: 0;
    min-height: 110px;
}

#sortable li {
    margin: 3px 3px 3px 0;
    float: left;
    width: 100px;
    height: 104px;
    text-align: center;
    position: relative;
    background-color: #FFFFFF;
}

#sortable li,
#sortable li img {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

#sortable img {
    height: 104px;
}

.closebtn {   
    color: #c72530;
    font-weight: bold;
    position: absolute;
    right: -1px;
    border-radius: 4px;
    padding: 0px 5px 0px 5px;
    background-color: #fff;
}
.closebtn h6{
    font-size: 20px;
    margin: 0;
    
}

.r-img-message h2 {
    padding-top: 4px;
}

.r-img-message img {
    width: 100%;
    height: 75px;
    border-radius: 5px;
    margin-top: 20px;
    margin-bottom: 20px;
}

</style> 
<?php 

 

    
    

echo form_open_multipart('md/web/Meetings_gam3ia_omomia/add_images/'. $mymeeting->id);

?>

<div class="col-md-12 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i>  <?=$title?> </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">
       
                    <div class="col-xs-12 padding-4">
                    <div class="form-group">
                  <label class="label" for="input-24">  عنوان الصوره</label>
                  <input type="text" name="title" id="title" class="form-control"/>

                  </div>
                                    <!-- <input type="file" id="images" name="files1" multiple="multiple" /> -->
                                    <div class="form-group">
                  

                                    <label class="label" for="input-24"> رفع الوسائط</label>
<div class="file-loading">
    <input id="input-24" name="img[]" type="file" multiple data-validation="required">
</div>


                                 
                                    </div>
                                    </div>
                            <div class="col-xs-2">
                                <button type="submit" style="height: 35px;width: 78px;" id="add" value="add"  name="add" class="btn btn-success m-t-20"><i class="fa fa-floppy-o"></i> حفظ</button>
                            </div>
                </div>
             </div>   
         </div>
         </form>
     </div>



<?php  if (isset($my_images) && !empty($my_images)) {?>
<div class="col-md-12 no-padding">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i>  <?= $title?> </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                             <th>  عنوان الصوره</th> 
                     
                       
                          

                            <th class="text-center">الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a = 1;

                      
                            foreach ($my_images as $record) {
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                  <td><?php echo $record->title; ?></td> 
                                   
                                    <td>
                                    <a href="<?=base_url()."md/web/Meetings_gam3ia_omomia/download_image/".$record->file?>" download>
        <i class="fa fa-download " aria-hidden="true"></i> </a>
                                    
                                    
        <a data-toggle="modal" data-target="#myModal-view_photo-<?= $record->id ?>">
                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                <!-- modal view -->
                                <div class="modal fade" id="myModal-view_photo-<?= $record->id ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                                            </div>
                                            <div class="modal-body">
                                           
                                           
                                            <img src="<?= base_url().'uploads/md/web/images' .'/'. $record->file?>"
                                                             width="100%" alt="">
                                           
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                   
                                      

                           
    <a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'md/web/Meetings_gam3ia_omomia/delete_images/' . $record->id .'/'. $mymeeting->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>


                                        



                                    </td>

                                </tr>
                                <?php
                                $a++;
                            }
                        } ?>
                           
                        </tbody>
                    </table>






  </div>
  </div>
  </div>  



<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>


<script>
$(document).ready(function() {
    var url1 = '',
        url2 = '';
    $("#input-24").fileinput({
        initialPreview: [],
        initialPreviewAsData: true,
        initialPreviewConfig: [
           
        ],
        deleteUrl: "",
        overwriteInitial: false,
        maxFileSize: 2000,
        initialCaption: " اختر ملف"
    });
});
</script>

