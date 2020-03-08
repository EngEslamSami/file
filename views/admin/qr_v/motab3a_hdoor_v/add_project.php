<div class="col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
        <div class="col-md-12">
        
        <?php if(isset($one_row) && !empty($one_row))
        {
          $name=$one_row->name;
          $base_url=$one_row->base_url;
          $code=$one_row->code;
          $action="qr_c/QrController/update_project/".$one_row->id ;
          $require="";  
        }else{
            $name='';
          $base_url='';
          $code='';
          $action="qr_c/QrController/add_project" ; 
           $require="required";    
        }
        ?>
        <form action="<?php  echo base_url().$action;?>" method="post" enctype="multipart/form-data">
             <div class="col-sm-3 padding-4">
              <h6 class="label_title_1 ">اسم المشروع </h6>
              <input name="name" id="name" value="<?php echo $name ;?>"  data-validation="required" class="form-control"/>
              </div>
             <div class="col-sm-3 padding-4">
              <h6 class="label_title_1 ">اللينك الاساسي  </h6>
              <input type="text" name="base_url" id="base_url" value="<?php echo $base_url ;?>"  data-validation="required" class="form-control"/>
              </div>
              
                <div class="col-sm-3 padding-4">
              <h6 class="label_title_1 "> الكود  </h6>
              <input type="text" name="code" id="code"  <?php if(isset($one_row) && !empty($one_row)){ echo  'readonly';} ?>   value="<?php echo $code ;?>"   data-validation="required" class="form-control"/>
              </div>
                <div class="col-sm-3 padding-4">
              <h6 class="label_title_1 "> اللوجو  </h6>
              <input  type="file" name="logo" id="logo"  data-validation="<?php echo $require ?>"     class="form-control"/>
              </div>
              <div class="col-md-12">
                 <div class="form-group padding-2 col-md-2 col-xs-12">
                <label class="label">لون التطبيق  </label>
                <input data-validation="required" type="color" style="width: 100%" id="head" name="color"
                       value="<?php if(isset($one_row)){ echo $one_row->color;}else{ echo '#e66465';} ?>" />
            </div>
              </div>
              
                  <div class="col-xs-12" style="margin-top: 10px;">

            <button type="submit"  name="add" class="btn btn-success  btn-labeled btn-next" value="ADD">
                <span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ 
            </button>
        </div>
        </form>
        
        
        <?php 
        
        if(isset($records) && !empty($records))
        {?>
        
            <table class="example table table-responsive table-bordered">

                <thead>
                <tr>
                    <th>م</th>
                    <th>  اسم الجمعيه</th>
                     <th>   الكود</th>
                    <th>  اللينك</th>
                    <th> اللوجو </th>
                      <th> لون التطبيق </th>
                    <th>  الاجراء</th>
                 
                </tr>
                </thead>
                <tbody id="result_body">
                <?php
                if(isset($records)&& !empty($records)){
                    $x=1;

                    foreach ($records as $row){?>



                <tr>
                    <td><?php echo $x ;?></td>

                    <td><?php echo $row->name ;?></td>
                     <td><?php echo $row->code ;?></td>
                    <td><?php echo $row->base_url ;?></td>
                    <td>
                    <img src="<?php echo $row->logo ;?>" width="60px" height="50px">
                    <td>  <input data-validation="required" disabled="" type="color" style="width: 30%" id="head" name=""
                       value="<?php if(isset($row)){ echo $row->color;}else{ echo '#e66465';} ?>" /></td>
                    
                    </td>
                          <td>
                                            <a href="#" onclick='swal({
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

                                                window.location="<?php echo base_url(); ?>qr_c/QrController/update_project/<?php echo $row->id; ?>";
                                                });'>
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                            <a href="#" onclick='swal({
                                                title: "تنبيه",
                                                text: "هل تريد الحذف ",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: false
                                                },
                                                function(){
                                                swal("تم الحذف!", "", "success");
                                                window.location="<?php echo base_url(); ?>qr_c/QrController/delete_project/<?php echo $row->id; ?>";
                                                });'>
                                                <i class="fa fa-trash"> </i></a>
                                        </td>
                   

                </tr>

                <?php  $x++ ;  } } ?>
                </tbody>
                </table>
        
        <?php } ?>
        </div>
          </div>
            </div>
        
        