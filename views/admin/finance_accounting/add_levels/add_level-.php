


<div class="col-sm-11 col-xs-12">

    <!--  -->
    <div class="details-resorce col-xs-12 r-inner-details">
        <?php if(isset($result)):?>
            <!-----------------------------     EDIT  -------------------------------------------------------------->
            <?php echo form_open_multipart('admin/finance_accounting/update_levels/'.$result['id'],array('class'=>'form-horizontal'))?>
            <div class="col-md-6 r-sanad-col-md">
                <div class="col-xs-12 ">
                    <div class="col-xs-12 inner-side r-data" id="optionearea4">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  المستوي الحسابي الأعلى </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="from_id" id="from_id"  class="selectpicker form-control" data-show-subtext="true" data-live-search="true" onchange="get_code2($('#from_id').val(),'<?php echo $this->uri->segment(3)?>')" required>
                                <option data-subtext="" value="nothing"> قم باختيار الحساب الرئيسى</option>
                                <option data-subtext=""  value="frist" <?php if($result['level']==1){ echo 'selected';}?>> المستوى الأول </option>
                                <?php foreach($all  as $record=>$value):?>
                                    <?php if($all[$record]->code == $result['code']){continue;}?>
                                    <?php $selected='';if($result['from_id'] == $all[$record]->id ){$selected ='selected';}?>
                                    <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                                    <option data-subtext="" value="<?php echo $all[$record]->code?>" <?php echo $selected?> >
                                        <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <?php if($result['level'] == 1 || $result['level'] == "1"){?>
                        <?php $array_types=array(' قم بإختيار نوع الحساب ','أصول','خصوم','مصروفات','إرادات');?>
                        <div class="col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">نوع الحساب</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="types" id="types" class="form-control" >
                                    <?php for($x=0;$x<count($array_types);$x++):
                                        $selected_type=''; if($result['type'] == $x){$selected_type='selected';}?>
                                        <option value="<?php echo $x;?>" <?php  echo $selected_type;?>><?php echo $array_types[$x];?></option>
                                    <?php  endfor;?>
                                </select>
                            </div>
                        </div>
                    <?php }?>
                    <div class="col-xs-12 inner-side r-data" id="optionearea1">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> كود الحساب</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" id="code"  name="code" class="r-inner-h4"  value="<?php echo $result['code']?>" readonly="readonly"/>
                        </div>
                        <input type="hidden" name="level" value="<?php echo $result['level'];?>" />
                        <input type="hidden" name="from_id" value="<?php echo $result['from_id'];?>" />
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إسم الحساب </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" id="name" name="name" class="r-inner-h4" value="<?php echo $result['name']?>" />
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> له حساب فرعي  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="branch" id="branch" class="form-control"  onchange="get_rased2($('#branch').val(),'update_levels')">
                                <option value="34">  له حساب فرعي  </option>
                                <option value="1" <?php if($result['last_value']=='0'){echo 'selected';}?>>نعم</option>
                                <option value="2" <?php if($result['last_value']!='0'){echo 'selected';}?>>لا</option>
                            </select>
                        </div>
                    </div>
                    <div id="optionearea2">
                        <?php if($result['last_value']!='0'):?>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">حساب مدين</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" id="last_value_madeen" name="last_value_madeen" value="<?php echo $result['last_value_madeen']?>" required />
                                </div>
                            </div>

                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">حساب دائن</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" id="last_value_dayen" name="last_value_dayen" value="<?php echo $result['last_value_dayen']?>" required />
                                </div>
                            </div>

                            <!--div class="col-xs-12 inner-side r-data">
                <div class="col-xs-6">
                    <h4 class="r-h4"> رصيد الحساب</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" class="r-inner-h4 " id="last_value"  name="last_value" value="<?php echo $result['last_value']?>" readonly />
                    
            </div>
          </div-->

                        <?php endif;?>
                    </div>

                    <div class="col-xs-4 r-input"></div>
                    <div class="col-xs-6 r-input">
                        <input type="submit" class="btn center-block r-manage-btn" value="تعديل" name="update_code"/>
                    </div>
                    <div class="col-xs-2 r-input"></div>


                </div>
            </div>
            <?php echo form_close()?>
            <!-----------------------------     EDIT  -------------------------------------------------------------->
        <?php else: ?>
            <!-------------------------------    ADD    -------------------------------------------------------------->
            <?php echo form_open_multipart('admin/finance_accounting/add_level',array('class'=>"form-horizontal",'role'=>"form" ))?>
            <div class="col-md-6 r-sanad-col-md">
                <div class="col-xs-12 ">
                    <div class="col-xs-12 inner-side r-data" id="optionearea4">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  المستوي الحسابي الأعلى </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="from_id" id="from_id" onchange="get_code($('#from_id').val(),'add_level')"  class="selectpicker form-control" data-show-subtext="true" data-live-search="true" required>
                                <option data-subtext="" value="nothing"> قم باختيار الحساب الرئيسى</option>
                                <option data-subtext=""  value="frist"> المستوى الأول </option>
                                <?php foreach($all  as $record=>$value):?>
                                    <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                                    <option data-subtext="" value="<?php echo $all[$record]->code?>">
                                        <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <!-- -->
                    <div  id="optionearea1">

                    </div>
                    <!-- -->

                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إسم الحساب </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" id="name" name="name" class="r-inner-h4 "  value="" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> له حساب فرعي  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="branch" id="branch" class="form-control"  onchange="get_rased($('#branch').val(),'<?php echo $this->uri->segment(3)?>')"  required>
                                <option value="34">  له حساب فرعي  </option>
                                <option value="1">نعم</option>
                                <option value="2">لا</option>
                            </select>
                        </div>
                    </div>
                    <div id="optionearea2"></div>

                    <div class="col-xs-4 r-input"></div>
                    <div class="col-xs-6 r-input">
                        <input type="submit" class="btn center-block r-manage-btn" value="إضافة حساب" name="add_code"/>
                    </div>
                    <div class="col-xs-2 r-input"></div>
                </div>
            </div>
            <?php echo form_close()?>
            <!-------------------------------    ADD    -------------------------------------------------------------->
        <?php endif; ?>
        <?php // var_dump($this->uri->segment(3));?>
        <!---------------------------------------------------------------------------------------------------------------->
        <div class="col-md-6 r-sanad-col-md  r-show-sanad-data">
            <div class="col-xs-12 r-inner-details r-inner-details-bord">
                <div class="col-xs-12 r-sanads">
                    <ul id="menu-group-1" class="nav">
                        <!---- 1 -->
                        <?php  $i=1; foreach($levels as $level ):?>
                            <li class="parent parent-bottom">
                                <a class="" href="#">
                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#item-<?php echo $i?>" class="sign">
                             <i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="lbl"><?php echo $level->name?> </span>
                                </a>



                               

                                <ul class="collapse" id="item-<?php echo $i?>">
                                    <?php  if(sizeof($level->sub) >0):
                                        $leve_1=1; foreach($level->sub as $level_one): ?>
                                        <!--- 2    -->
                                        <li class="parent active">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-<?php echo $leve_1?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <span class="lbl"> <?php echo $level_one->name?> </span>
                                            <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$level_one->id?>">
                                                <button class="btn btn-primary sanad-btn pull-right" title="تعديل بيانات الحساب ">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                            </a>
                                            <button class="btn btn-success sanad-btn pull-right"  title="إضافة حساب فرعى "
                                                    onclick="get_select('<?php echo $level_one->name?>');get_code('<?php echo $level_one->code?>','<?php echo $this->uri->segment(3)?>');">
                                                <i class="fa fa-plus" aria-hidden="true"></i></button>
                                            <!------------------- 15 -------------------------->
                                            <?php if(sizeof($level_one->sub) ==0){ ?>
                                                <a href="<?php echo base_url()."admin/finance_accounting/DeleteLevel/".$level_one->code?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                    <button class="btn btn-danger sanad-btn pull-right" title="حذف الحساب  ">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </a>
                                            <?php }?>
                                            <!------------------- 15 -------------------------->
                                       
                                            <ul class="collapse" id="sub-item-<?php echo $leve_1?>">

                                                <?php  if(sizeof($level_one->sub) >0):
                                                    $leve_2=1; foreach($level_one->sub as $level_two): ?>
                                                    <!--- 3 -->
                                                    <li class="parent active">
                                                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-<?php echo $leve_2?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        <span class="lbl"><?php echo $level_two->name?></span>
                                                        <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$level_two->id?>">
                                                            <button class="btn btn-primary sanad-btn pull-right" title="تعديل بيانات الحساب ">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                        </a>
                                                        <button class="btn btn-success sanad-btn pull-right" title="إضافة حساب فرعى "
                                                                onclick="get_select('<?php echo $level_two->name?>');get_code('<?php echo $level_two->code?>','<?php echo $this->uri->segment(3)?>');">
                                                            <i class="fa fa-plus" aria-hidden="true"></i></button>
                                                        <!------------------- 15 -------------------------->
                                                        <?php if(sizeof($level_two->sub) ==0){ ?>
                                                            <a href="<?php echo base_url()."admin/finance_accounting/DeleteLevel/".$level_two->code?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                <button class="btn btn-danger sanad-btn pull-right" title="حذف الحساب  ">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                            </a>
                                                        <?php }?>
                                                        <!------------------- 15 -------------------------->


                                                    </li>
                                                    <li>
                                                        <ul class="collapse" id="sub-<?php echo $leve_2?>">

                                                            <?php  if(sizeof($level_two->sub) >0):
                                                                $leve_3=1; foreach($level_two->sub as $leve_three): ?>
                                                                <!---- 4 ------>
                                                                <li class="parent active">
                                                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#subitem-<?php echo $leve_3?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                                    <span class="lbl"> <?php echo $leve_three->name?> </span>
                                                                    <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$leve_three->id?>" >
                                                                        <button class="btn btn-primary sanad-btn pull-right" title="تعديل بيانات الحساب ">
                                                                            <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                                    </a>
                                                                    <button class="btn btn-success sanad-btn pull-right" title="إضافة حساب فرعى "
                                                                            onclick="get_select('<?php echo $leve_three->name?>');get_code('<?php echo $leve_three->code?>','<?php echo $this->uri->segment(3)?>');">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i></button>
                                                                    <!------------------- 15 -------------------------->
                                                                    <?php if(sizeof($leve_three->sub) ==0){ ?>
                                                                        <a href="<?php echo base_url()."admin/finance_accounting/DeleteLevel/".$leve_three->code?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                            <button class="btn btn-danger sanad-btn pull-right" title="حذف الحساب  ">
                                                                                <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                                        </a>
                                                                    <?php }?>
                                                                    <!------------------- 15 -------------------------->
                                                                </li>
                                                                <li>
                                                                    <ul class="collapse" id="subitem-<?php echo $leve_3?>">
                                                                        <?php  if(sizeof($leve_three->sub) >0):
                                                                            $leve_4=1; foreach($leve_three->sub as $leve_four): ?>
                                                                            <!-- 5 ------>
                                                                            <li class="parent active">
                                                                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#s-item-<?php echo $leve_4?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                                                <span class="lbl"><?php echo $leve_four->name?> </span>
                                                                                <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$leve_four->id?>" >
                                                                                    <button class="btn btn-primary sanad-btn pull-right" title="تعديل بيانات الحساب ">
                                                                                        <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                                                </a>

                                                                            </li>
                                                                            <?php $leve_4++;  endforeach;endif; ?>
                                                                        <!-- 5 ------>
                                                                    </ul>
                                                                </li>
                                                                <?php $leve_3++;  endforeach;endif; ?>
                                                            <!---- 4 ------>
                                                        </ul>
                                                    </li>
                                                    <?php $leve_2++;  endforeach;endif; ?>
                                                <!--- 3 -->
                                            </ul>
                                        </li>
                                        <?php $leve_1++;  endforeach;endif; ?>
                                    <!--- 2 -->
                                </ul>
                            </li>
                            <?php  $i++; endforeach?>
                        <!---- 1 -->
                    </ul>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------------------------------------------------------------->
    </div>
    <!----------------------->
<?php if(isset($records) && !empty($records) && $records !=null ){?>
    <div class=" col-xs-12 ">
    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-left">كود الحساب</th>
            <th  class="text-left">إسم الحساب</th>
            <th  class="text-left">مدين قبل</th>
            <th  class="text-left">دائن قبل</th>
            <th  class="text-left">الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count1 = 1;
        function drow($data, $count, $class, $sum_madeen=0, $sum_dayen=0){
            $total_madeen = 0;
            $total_dayen = 0;
            $count1 = $count;
            for($z = 0 ; $z < count($data) ; $z++){
                $button ='<a href="'.base_url().'admin/finance_accounting/update_levels/'.$data[$z]['id'].'">
                              <button class="btn btn-default " style="width: 30px;" title="تعديل بيانات الحساب ">
                              <i class="fa fa-pencil" aria-hidden="true"></i></button>
                             </a>';
                if(isset($data[$z]['children'])){
                    $class = 'btn-success';
                    $count = drow($data[$z]['children'], $count1, 'btn-info',$sum_madeen,$sum_dayen);
                    $sum_madeen = $data[$z]['madeen']+$count[1];
                    $sum_dayen = $data[$z]['dayen']+$count[2];
                    $count1 = $count[0];
                }
                else{
                    $sum_madeen = $data[$z]['madeen'];
                    $sum_dayen = $data[$z]['dayen'];
                    $button .='<a href="'.base_url().'admin/finance_accounting/DeleteLevel/'.$data[$z]['id'].'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');">
                                <button class="btn btn-default  " style="width: 30px;" title="حذف الحساب  ">
                                <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                               </a>';
                }
                echo '<tr class="'.$class.'">
                      <td>'.($count1++).'</td>
                      <td>'.$data[$z]['code'].'</td>
                      <td>'.$data[$z]['name'].'</td>
                      <td>'.sprintf("%.2f",$sum_madeen).'</td>
                      <td>'.sprintf("%.2f",$sum_dayen).'</td>
                      <td>'.$button.'</td>
                     
                      </tr>';
                $total_madeen += $sum_madeen;
                $total_dayen += $sum_dayen;
            }
            return array($count1,$total_madeen,$total_dayen);
        }
        for($x = 0 ; $x < count($records) ; $x++){
            $button ='<a href="'.base_url().'admin/finance_accounting/update_levels/'.$records[$x]['id'].'">
                              <button class="btn btn-default " style="width: 30px;" title="تعديل بيانات الحساب ">
                              <i class="fa fa-pencil" aria-hidden="true"></i></button>
                             </a>';
            if(isset($records[$x]['children'])){
                $count = drow($records[$x]['children'], $count1, 'btn-success');
                $sum_madeen = $count[1];
                $sum_dayen = $count[2];
                $count1 = $count[0];
            }
            else{
                $sum_madeen = $records[$x]['madeen'];
                $sum_dayen = $records[$x]['dayen'];
                $button .='<a href="'.base_url().'admin/finance_accounting/DeleteLevel/'.$records[$x]['id'].'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');">
                                <button class="btn btn-default " style="width: 30px;" title="حذف الحساب  ">
                                <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                               </a>';
            }
            echo '<tr class="btn-warning">
                  <td>'.($count1++).'</td>
                  <td>'.$records[$x]['code'].'</td>
                  <td>'.$records[$x]['name'].'</td>
                  <td>'.sprintf("%.2f",$sum_madeen).'</td>
                  <td>'.sprintf("%.2f",$sum_dayen).'</td>
                  <td>'.$button.'</td>
                  </tr>';
        }
        ?>
        </tbody>
    </table>
    </div>
<?php }?>
    <!----------------------->
    
</div>
<script>
    function get_code(code_post ,controller){

        if(code_post != 'nothing'){
            var dataString = 'code_post='+ code_post ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
        }

    }
</script>
<script>
    function get_code2(code_post ,controller){

        if(code_post != 'nothing'){
            var dataString = 'code_post='+ code_post ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller+'/'+<?php  echo $this->uri->segment(4)?>,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
        }

    }
</script>

<script>
    function get_rased(rased,controller){

        var dataString = 'rased='+ rased ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea2").html(html);
            }
        });
    }
</script>
<script>
    function get_rased2(rased,controller){

        var dataString = 'rased='+ rased ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller+'/'+<?php  echo $this->uri->segment(4)?>,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea2").html(html);
            }
        });
    }
</script>

<script>
    function get_select(name_post){


        var dataString = "name_post="+ name_post;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/Finance_accounting/select_code',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea4").html(html);
            }
        });

    }
</script>      
   