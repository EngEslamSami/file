<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title;?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($all) && !empty($all)) {
                $tasnef_id_fk=$all->tasnef_id_fk;
                $tasnef_n=$all->tasnef_n;
               // $geha_type_name=$result->gha_type_fk;
                $name=$all->name;
                $phone=$all->phone;
                $gwal=$all->gwal;
                $fax=$all->fax;
                $email=$all->email;
                $code=$all->code;
                $status=$all->status;
              
              
              } else {
                $tasnef_id_fk='';
                $tasnef_n='';
            
                    $name='';
                    $phone='';
                    $gwal='';
                    $fax='';
                    $email='';
                    $code='';
                    $status='';
                }
            
            if($this->uri->segment(6)){
             echo form_open_multipart('all_secretary/archive/gehat/Gehat/update_main/'.$this->uri->segment(6).'');
            }else{
                 echo form_open_multipart('all_secretary/archive/gehat/Gehat/add');
            }
                     ?>
                <div class="col-md-12">


                <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label"> تصنيف الجهات  </label>
                    <input type="text" name="tasnef_n" id="tasnef_n" value="<?php echo $tasnef_n ?>"
                           class="form-control testButton inputclass"
                          
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_geha_type').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="tasnef_id_fk" id="tasnef_id_fk" value="<?php echo $tasnef_id_fk ?>"
                           class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_geha_type" 
                    onclick="get_details_geha_type()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
            <div class="form-group col-sm-3">
                <label class="label ">إسم الجهه الاساسيه</label>
                <input type="text" class="form-control" placeholder="" data-validation="required" name="name"
                value="<?php echo $name ?>"
                >
            </div>
            <div class="form-group col-sm-3">
                <label class="label ">الهاتف</label>
                <input type="number" name="phone" class="form-control  " placeholder=""  
                value="<?php echo $phone ?>"
                >
            </div>
            <div class="form-group col-sm-3">
                <label class="label ">الجوال</label>
                <input type="number" name="gwal" class="form-control  " placeholder=""  
                value="<?php echo $gwal ?>"
                >
            </div>


                </div>
               
     <div class="col-md-12">
            
            <div class="form-group col-sm-3">
                <label class="label "> الفاكس </label>
                <input type="number" class=" some_class form-control  " name="fax" 
                value="<?php echo $fax ?>"
                >
            </div>
               
            <div class="form-group col-sm-3">
                <label class="label "> البريد الالكتروني</label>
                <input type="email" class=" some_class form-control  " name="email"
                value="<?php echo $email ?>"
                >
            </div>
            <div class="form-group col-sm-3">
                <label class="label ">كود مختصر </label>
                <input type="number" class=" some_class form-control  "  name="code" 
                value="<?php echo $code ?>" 
                >
            </div>
         
            <div class="form-group col-sm-3">
                        <label class="label "> الحاله</label>
                        <select  name="status"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(1 => 'نشط', 0 => 'غير نشط');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($status != '') {
                                    if ($key == $status) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
            </div>
     </div>
     <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">

                        <button type="submit"
                                class="btn btn-labeled btn-success "  name="add" value="اضافه"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
            <!-- <div class="form-group col-sm-6">
                <input type="submit"name="add" value="اضافه" class="btn-success form-control">
            </div> -->
            </form>
        </div>
    </div>
</div>
<!-- update Modal1 -->

<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">الجهات </h3>
            </div>
        <div class="panel-body">
            <?php 
            
            if(isset($result)&&!empty($result)){?>
            
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>اسم الجهه</th>
                    <th>تصنيف الجهه</th>
                    <th>الهاتف</th> 
                     <th>الجوال</th> 
                   
                     <th>البريد الالكتروني</th>
                     <th> الحاله</th>
                 
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->tasnef_n;?></td>
                      <td><?php echo $row->phone;?></td> 
                      <td><?php echo $row->gwal;?></td> 
                        <td><?php echo $row->email;?></td>
                       <td><?php 
                       if($row->status==1){echo 'نشط';}else{echo 'غير نشط  ';} ?>
                    
                    
                    </td>
                        <td>
                            
                            
                           
                                            <a href="<?php echo base_url();?>/all_secretary/archive/gehat/Gehat/update_main/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/archive/gehat/Gehat/delete/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                          
                                            <i onclick="get_details(<?= $row->id ?>)"
                                               class="fa fa-search-plus" aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal"></i>


                                               <a target="_blank" class="btn btn-sm btn-primary" href="<?php echo base_url();?>/all_secretary/archive/gehat/Gehat/add_ms2ol_gehat/<?php echo $row->id;?>">
       <i class="hvr-buzz-out fa fa-plus" aria-hidden="true">
             </i>
      
       اضافه مسئولي الجهات</a>
                                                   
                 
                        </td>
                        
                        
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal_geha_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   مسؤولين الجهه   </h4>
            </div>
            <div class="modal-body">


            
                 

                    <div id="myDiv"><br><br>
                   
                    </div>
      


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/gehat/Gehat/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);

            }

        });
    }
</script>

<script>
    function get_details_geha_type() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/gehat/Gehat/load_geha_type",
            
            beforeSend: function () {
                $('#myDiv').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_geha(value,id) {


        $('#tasnef_id_fk').val(id);
        $('#tasnef_n').val(value);

        $('#Modal_geha_type').modal('hide');
    }
</script>