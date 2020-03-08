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
if(isset($mymeeting)&&!empty($mymeeting))
{
    $galsa_rkm=$mymeeting->galsa_rkm;
    $galsa_date=$mymeeting->galsa_date;
    $details=$mymeeting->details;
    $galsa_place=$mymeeting->galsa_place;
    $galsa_time=$mymeeting->galsa_time;
    
    echo form_open_multipart('md/web/Meetings_gam3ia_omomia/update/'. $this->uri->segment(5));
}
else
{
 
    $galsa_rkm='';
    $galsa_date=date('Y-m-d');
    $details='';
    $galsa_time='';
    $galsa_place='';
    
 
echo form_open_multipart('md/web/Meetings_gam3ia_omomia/add_metting');
}

?>

<div class="col-md-12 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i>  <?= $title?> </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">
                    <div class="col-sm-9 padding-4">

                    <div class="form-group col-xs-2 padding-4">
                         <label class="label">رقم الجلسه</label>
                         <input type="text" name="galsa_rkm" class="form-control" value="<?=$galsa_rkm ?>" data-validation="required"/>
                         </div>

                         <div class="form-group col-xs-2 padding-4">
                         <label class="label">تاريخ الجلسه</label>
                         <input type="date" name="galsa_date" class="form-control" value="<?=$galsa_date ?>"  />
                         </div>
                         <div class="form-group col-xs-3 padding-4">
                         <label class="label">مكان الانعقاد</label>
                         <input type="text" name="galsa_place" class="form-control" value="<?=$galsa_place ?>" data-validation="required" />
                         </div>
                         <div class="form-group col-xs-2 padding-4">
                         <label class="label"> الوقت</label>
                         <input type="time" name="galsa_time" class="form-control" value="<?=$galsa_time ?>" data-validation="required"/>
                         </div>

                       <div class="form-group col-xs-3 no-padding">
                         <label class="label">الاعضاء</label>
                        
                         <input type="text" class="form-control" 
                         placeholder=" حدد العضو" type="text" style="width:80%;float: right;"
                                   name="to_user_n" id="to_user_n"  
                                   readonly="readonly" 
                                   onclick="$('#tahwelModal').modal('show'); "

                                 

                                   value="">
                                   <!-- <?php  
                       if(isset($galsa_member)&&!empty($galsa_member)){
                      foreach($galsa_member as $row){?>
<input type='hidden' id="id<?=$row->id?>"  name='to_user_fk[]' value="<?=$row->id?>"/>
<input type='hidden'  data-validation='required' id="n<?=$row->id?>" name='to_user_fk_name[]' value="<?=$row->mem_name ?>"/>

                      <?php }}?> -->
                        
                            <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                            <input type="hidden" name="tawel_id" id="tawel_id" value="">

                            <button type="button"
                                    onclick="$('#tahwelModal').modal('show');"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>
                       </div>
                       
                      
                       
                       
                       
                       
                       
                       
                       
                       
                       <div class="form-group col-xs-8 no-padding">
                         <label class="label">التفاصيل</label>
                         <input class="form-control" placeholder="" type="text" value="<?=$details ?>" data-validation="required"
                          name="details"  />
                         
                       </div>
                      
      <!--<div class="form-group col-xs-4 padding-4">
                    <label class="label" style="width: 100%"> رفع المحضر </label>
                    <input id="person_img" onchange="readURL(this);" name="img" style="padding: 0;"
                           class="form-control " type="file" >
                           <?php if(isset($mymeeting->file)&&!empty($mymeeting->file)){
                               ?>
                                 <a target="_blank" href="<?=base_url()."md/web/Meetings_gam3ia_omomia/read_file/".$mymeeting->file.'/'.$mymeeting->id?>">
            <i class="fa fa-eye" title=" قراءة"></i> </a>
            <a href="<?=base_url()."md/web/Meetings_gam3ia_omomia/download_file/".$mymeeting->file.'/'.$mymeeting->id?>" download>
        <i class="fa fa-download " aria-hidden="true"></i> </a>

                         <?php  }?>
                </div>-->
                <div class="form-group col-xs-4 padding-4">
                    <label class="label" style="width: 100%"> رفع المحضر </label>
                    <input id="person_img" onchange="readURL(this);" name="img" style="padding: 0;"
                           class="form-control " type="file"  data-validation="required">
                           <?php if(isset($mymeeting->file)&&!empty($mymeeting->file)){
                               ?>
                               <!-- 2-12-om -->
                                <a target="_blank" href="<?=base_url()."md/web/Meetings_gam3ia_omomia/read_file/".$mymeeting->id?>">
                                <i class="fa fa-eye" title=" قراءة"></i> </a>
                                <a href="<?=base_url()."md/web/Meetings_gam3ia_omomia/download_file/".$mymeeting->id?>" download>
                                <i class="fa fa-download " aria-hidden="true"></i> </a>

                         <?php  }?>
                </div>

                    </div>
                    <div class="col-sm-3 padding-4">
                    <h5>قائمة الاعضاء</h5>
                    <?php if(empty($galsa_member)){?>
                      
                       <div class="alert alert-danger"  id="text111" style="display:none; color: #BD000A; display:block;"
                       >
                     
                      يمكنك إختيار أكثر من عضو  <br /> 
                      
                       </div>
                       <?php }?>
                       <div  class="recived-names">
                     
                      
                         <ol >
                      <?php  
                       if(isset($galsa_member)&&!empty($galsa_member)){
                        $x=1;
                      foreach($galsa_member as $row){?>
                         <li id="<?=$x?>">  <?= $row->mem_name ?></li>
                           
                           
                         <?php     $x++; }}else{ ?>
                     
                            
                        
                       
                           
                         <?php }?>
                         </ol>
                       </div>
                    </div>
                    
                    
                    <!-- <div class="col-xs-12 padding-4">
                                   
                                 
                                    <div class="form-group">
                  

                                    <label class="label" for="input-24"> رفع المحضر</label>
<div class="file-loading">
    <input id="input-24" name="img[]" type="file" multiple>
</div>
</div>
                                    </div> -->
<!-- input -->



                                    <!-- <input  onchange="readURL(this);" name="img" style="padding: 0;" class="form-control"
                           type="file" multiple="multiple"> -->
                                 
                                   
                            <div class="col-xs-2">
                            <button type="submit" id="add" name="add" 
                             class="btn btn-purple btn-info" disabled
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                    </button>
                                <!-- <button type="submit" style="height: 35px;width: 78px;" id="add"  name="add" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> حفظ</button> -->
                            </div>
                </div>
             </div>   
         </div>
         </form>
     </div>


   <?php  if (isset($my_meeting) && !empty($my_meeting)) {?>
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
                            <th> رقم الجلسه</th>
                            <th class="text-center"> تاريخ الجلسه</th>
                            <th> تحميل المحضر</th>
                            <th> عرض المحضر</th>
                            <th>الاعضاء</th>
                          

                            <th class="text-center">الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a = 1;

                      
                            foreach ($my_meeting as $record) {
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo $record->galsa_rkm; ?></td>
                                    <td><?php echo $record->galsa_date; ?></td>
                                    <td>
       <!--<a href="<?=base_url()."md/web/Meetings_gam3ia_omomia/download_file/".$record->ffile.'/'.$record->id?>" download>
        <i class="fa fa-download " aria-hidden="true"></i> </a>-->
                                            <a href="<?=base_url()."md/web/Meetings_gam3ia_omomia/download_file/".$record->id?>" download>
        <i class="fa fa-download " aria-hidden="true"></i> </a>
                                    
                                    </td>
                                    <td>
          <!--<a target="_blank" href="<?=base_url()."md/web/Meetings_gam3ia_omomia/read_file/".$record->ffile.'/'.$record->id?>">
            <i class="fa fa-eye" title=" قراءة"></i> </a>-->
                                                <a target="_blank" href="<?=base_url()."md/web/Meetings_gam3ia_omomia/read_file/".$record->id?>">
            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    
                                    </td>
                                    <td> <button type="button" class="btn btn-sm btn-add" data-toggle="modal"
                                            onclick="det_datiles(<?= $record->id?>)"
                                            data-target="#myModal"><span class="fa fa-list"></span>
                                        التفاصيل
                                    </button></td>
                               
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">اضافه</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>md/web/Meetings_gam3ia_omomia/add_mahwer/<?php echo $record->id; ?>">
                                                         اضافه المحاور </a></li>
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>md/web/Meetings_gam3ia_omomia/add_images/<?=$record->id?>">
                                                        ألبوم الصور </a></li>
                                               
                                                
                                            </ul>
                                        </div>

                                      

                                                    <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'md/web/Meetings_gam3ia_omomia/update_metting/' . $record->id ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
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
        setTimeout(function(){window.location="<?= base_url() . 'md/web/Meetings_gam3ia_omomia/delete/' . $record->id ?>";}, 500);
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
<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel()">
                    <label for="esnad1" class="radio-label"> اعضاء الجمعيه العموميه</label>
                </div>
              
                </div>

                <div class="col-xs-12" id="tawel_result" style="display: none;">



                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل الأعضاء</h4>
            </div>
            <br>
            <div class="modal-body form-group col-sm-12 col-xs-12">
                <div id="members_data"></div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>md/web/Meetings_gam3ia_omomia/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#tawel_result").html(html);
            }
        });
    }
</script>

<script>
    function GettahwelName(id, name,type) {
       
        var checkBox = document.getElementById("myCheck"+id+type);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
  if (checkBox.checked == true){
    $('.btn-purple').removeAttr('disabled');
    $('#text111').hide();
    
   $("ol").append("<li id='"+id+"'>"+name+"</li>");
 $('#to_user_n').append("<input type='hidden' id='id"+id+"'  name='to_user_fk[]' data-validation='required' value='"+id+"'/>"+
 "<input type='hidden'  data-validation='required' id='n"+id+"' name='to_user_fk_name[]' value='"+name+"'/><input type='hidden'  data-validation='required' id='type"+id+"' name='type[]' value='"+type+"'/>");
    //$('#to_user_fk').val(id);
   //  $('#to_user_n').append(name);
   
  } else {
    $("#"+id).remove();
    $("#id"+id).remove();
    $("#n"+id).remove();
    $("#type"+id).remove();
    if(checkBox=='')
    {
    $('#text111').show();}
  
  }

      //  $('#to_user_id').val(id);
        //$('#to_user_n').val(name);
       // $('#tahwelModal').modal('hide');


    }
</script>





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

<script>

    function det_datiles(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/web/Meetings_gam3ia_omomia/det_datiles'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#members_data').html(d);


            }
        });
    }
</script>