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
if(isset($mehwar)&&!empty($mehwar))
{

$mahwer_name=$mehwar->mahwer_name;
$mahwer_krar=$mehwar->mahwer_krar;

    echo form_open_multipart('md/web/Meetings_gam3ia_omomia/update_mehwar/'. $mehwar->id);
}
else
{
 

    $mahwer_name="";
    $mahwer_krar="";  
    

echo form_open_multipart('md/web/Meetings_gam3ia_omomia/add_mehwar/'. $mymeeting->id);
}

?>

<div class="col-md-12 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> <?=$title ?> </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">
       
                    <div class="col-xs-12 padding-4">
                    <div class="form-group col-xs-6">
                  <label class="label" for="input-24">   اسم المحور</label>
                  <input type="text" name="mahwer_name" id="" value="<?=$mahwer_name ?>" class="form-control" data-validation="required"/>

                  </div>
                  <div class="form-group col-xs-6">
                  <label class="label" for="input-24">    القرار</label>
                  <input type="text" name="mahwer_krar" id="" value="<?=$mahwer_krar ?>" class="form-control" data-validation="required"/>

                  </div>
                                 
                                    
                                   
                            <div class="col-xs-4">
                                <button type="submit" style="height: 35px;width: 78px;" id="add" value="add"  name="add" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> حفظ</button>
                            </div>
                            </div>
                </div>
             </div>   
         </div>
         </form>
     </div>



<?php  if (isset($my_mehwar) && !empty($my_mehwar)) {?>
<div class="col-md-12 no-padding">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> <?=$title ?> </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">رقم المحور</th>
                             <th>   اسم المحور</th> 
                             <th>    القرار</th> 
                       
                          

                            <th class="text-center">الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a = 1;

                      
                            foreach ($my_mehwar as $record) {
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                  <td><?php echo $record->mahwer_name; ?></td> 
                                  <td><?php echo $record->mahwer_krar; ?></td>
                                    <td>
                              
                                    
                                    
                                
                                   
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
        window.location="<?= base_url() . 'md/web/Meetings_gam3ia_omomia/update_mehwar/' . $record->id ?>";
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
        setTimeout(function(){window.location="<?= base_url() . 'md/web/Meetings_gam3ia_omomia/delete_mehwar/'  . $record->id .'/'. $mymeeting->id ?>";}, 500);
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





