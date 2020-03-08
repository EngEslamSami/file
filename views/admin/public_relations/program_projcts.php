

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['program_projects'] = 'active';
          //  $this->load->view('admin/public_relations/main_tabs',$data); ?>
            <?php   if(isset($result) && $result !=null){
                echo form_open_multipart('Public_relations/UpdateProgramProjcts/'.$result['id']);
                $out['title']=$result['title'];
                $out['content']=$result['content'];
                $out['project_type']=$result['project_type'];
                $out['project_donare_value']=$result['project_donare_value'];
                $out['date']=date("Y-m-d",$result['date']);
                $out['input']='  <button name="edit" value="edit" type="submit" class="btn btn-primary">تعديل</button>';
                   if($result['project_type'] == 1){
                       $out['style']='';
                   }elseif($result['project_type'] == 2){
                       $out['style']='display:none;';
                   }
                $out['required']='';
            }else{
                echo form_open_multipart('Public_relations/ProgramProjcts');
                $out['title']="";
                $out['content']="";
                $out['project_donare_value']='';
                $out['project_type']="0";
                $out['date']="";
                $out['style']='display:none;';
                $out['required']='required="required"';
                $out['input']='<button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>';
            }//endif ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">

                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4 ">  تاريخ المشروع  </h4>
                            </div>
                            <div class="col-xs-6 r-input ">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" value="<?php echo $out['date']?>" name="date" placeholder="شهر / يوم / سنة " required="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">عنوان المشروع </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4" name="title" value="<?php echo $out['title']?>"  required="" />
                            </div>


                        </div>
                    </div>


                    <div class="col-xs-12 " >
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> هل يقبل التبرع </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="project_type" id="project_type" class="form-control" onchange="check();" required="">
                                  <?php $array_yes_no=array("إختر","نعم"," لا");?>
                                    <?php foreach ($array_yes_no as $key=>$value):
                                        $selected ="";  if ($key == $out["project_type"]){ $selected ="selected='selected'";}  ?>
                                    <option value="<?php echo $key?>" <?php echo $selected ?>><?php echo $value ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12 " id="project_donare_value" style="<?php echo $out['style']?>">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  قيمة التبرع  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">

                                    <input type="number" id=""  name="project_donare_value" min="0"  value="<?php echo $out['project_donare_value']?>" class="r-inner-h4" placeholder=" قيمة التبرع"   />


                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-xs-12 ">



                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4 ">  تفاصيل المشروع  </h4>
                            </div>
                            <div class="col-xs-6 r-input ">
                                <div class="docs-datepicker">
                                    <textarea id="content"  name="content" class="r-textarea" ><?php  echo $out['content']; ?></textarea>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  صور المشروع  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">

                                    <input type="number" id="photo_num"  name="photo_num" min="1" max="5" onkeyup="return lood($('#photo_num').val());" class="r-inner-h4" placeholder="أقصى عدد 5" <?php echo $out['required']?>  />


                                </div>
                            </div>
                            <div class="col-xs-12" id="optionearea1">
                                <?php if(isset($images) && $images!=null): ?>

                                    <table   id="no-more-tables" class="table table-bordered" role="table"   >
                                        <thead>      <tr>  <th class="text-right">م</th>
                                            <th class="text-right">الصورة </th>
                                            <th class="text-right"> الاجراء</th>
                                        </tr>  </thead>
                                        <tbody>
                                        <?php    $i=1;   foreach($images as $one_image): ?>
                                            <tr>
                                                <td> <?php echo $i++?></td>
                                                <td><img src="<?php echo base_url()."uploads/images/".$one_image->img?>" width="50px" height="50px" /></td>
                                                <td>  <a  href="<?php  echo base_url().'Public_relations/delete_photo/'.$one_image->id."/update_news/".$result['id']?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs ">
                                                        <i class="fa fa-trash"></i> حذف</a>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>  </table>




                                <?php endif;?>
                            </div>
                        </div>

                </div>


                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <?php  echo $out['input']; ?>

                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">

                    </div>
                </div>

            </div>

            <!---table------>
            <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">

                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">عنوان الشروع</th>
                                    <th class="text-center">تاريخ المشروع</th>
                                    <th class="text-center">الحالى </th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">


                                <?php
                                $a=1;
                                foreach ($records as $record ):
                                    if ($record->suspend == 0){
                                        $class_case="danger";
                                        $case='غير نشط';
                                        $value_set=1;
                                    } elseif ($record->suspend == 1){
                                        $class_case="success";
                                        $case=' نشط';
                                        $value_set=0;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><?php echo $record->title?></td>
                                        <td><?php echo date("Y-m-d",$record->date);?></td>
                                        <td>
                                            <a href="<?php echo base_url().'Public_relations/SuspendProgramProjcts/'.$record->id.'/'.$value_set;?>">
                                              <button type="button" class="btn btn-<?php echo $class_case?>"><?php echo  $case?></button>
                                            </a>
                                        </td>
                                        <td> <a href="<?php echo base_url().'Public_relations/DeleteProgramProjcts/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url().'Public_relations/UpdateProgramProjcts/'.$record->id?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                    </tr>
                                    <?php
                                    $a++;
                                endforeach;  ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php  endif;  ?>
            <!---table------>
        </div>
    </div>
</div>





<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Public_relations/load',
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
            $("#optionearea1").html('');
        }
    }
</script>

    <script>
        function check() {
            var type =$('#project_type').val();
            if(type == 0){
                $('#project_donare_value').hide();
            }else if(type == 1){
                $('#project_donare_value').show();
            }else if(type == 2) {
                $('#project_donare_value').hide();
            }
        }
    </script>