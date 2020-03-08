<style>
   
  	/**************************/
	/* 27-1-2019 */
	label.label-green {
	    height: auto;
    line-height: unset;
    font-size: 14px !important;
    font-weight: 600 !important;
    text-align: right !important;
    margin-bottom: 0;
    background-color: transparent;
    color: #002542;
    border: none;
    padding-bottom: 0;
    font-weight: bold;
    float: right;
    display: block;
    width: 100%;
	}
	.half {
		width: 100% !important;
		float: right !important;
	}
	.input-style {
		border-radius: 0px;
		border-right: 1px solid #eee;
	}
	.form-group {
		margin-bottom: 0px;
	}
	.bootstrap-select>.btn {
		width: 100%;
		padding-right: 5px;
	}
	.bootstrap-select.btn-group .dropdown-toggle .caret {
		right: auto !important; 
		left: 4px;
	}
	.bootstrap-select.btn-group .dropdown-toggle .filter-option {
		font-size: 15px;
	}
/*	.form-control{
		font-size: 15px;
		color: #000;
		border-radius: 4px;
		border: 2px solid #b6d089 !important;
	}*/
	.form-control:focus {
		border: 2px solid #b6d089;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: 2px 2px 2px 1px #beffc3;
	}
	.has-success .form-control {
		border: 2px solid #b6d089;

		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	}
	.has-success  .form-control:focus {
		border: 2px solid #b6d089;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: 2px 2px 2px 1px #beffc3;
	}
	.nav-tabs>li>a {
		color: #222;
		font-weight: 500;
		background-color: #e6e6e6;
		font-size: 15px;
	}
	.tab-content {
		margin-top: 15px;
	}  
    
    td { 
    border-color: #999 !important;
}

   tbody td { 
    background-color: #fff ;
}  
</style>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(!empty($result)){ ?>
            <form action="<?php echo base_url();?>family_controllers/Family_letter/update_Insurance_letter/<?php echo $path_method; ?>" method="post">


                <?php }else{ ?>

                <form action="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter/<?php echo $this->uri->segment(4)."/".$this->uri->segment(5); ?>" method="post">

                    <?php } ?>



                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> رقم الخطاب </label>
                        <input type="text" name="letter_num"
                               data-validation="required" readonly="readonly" class="form-control col-xs-3 " style="width:23%;text-align: center"
                               value="<?php if(!empty($result)){ echo $this->uri->segment(5); }else{ echo $last_id;} ?>" />
                        <span style="float: right;margin:10px 3px 0px 3px">/</span>
                        <input type="text" name=""
                               data-validation="required" readonly="readonly" class="form-control col-xs-3 " style="width: 23%;text-align: center"
                               value="<?php if(!empty($result)){echo $this->uri->segment(6);}else{ echo $this->uri->segment(5);}?>" />
                               <input type="hidden" name="letter_type_data" value="2" />
                    </div>
     <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half" > إختر الفرد  </label>
                      <select class="form-control half"  id="member_id"  <?php if(!empty($result)){}else{ echo 'data-validation="required"';}?>  aria-required="true" tabindex="-1" aria-hidden="true">
                        
                       <option value="">إختر</option>
                          <!----   ---------------------- ------------>
                        <?php   if(!empty($father) && isset($father)){
                             if(isset($result) && !empty($result) ){ 
                                    if(! in_array($father->f_national_id,$result)){ ?>
                            <option value="2-<?php echo $father->f_national_id;?>"><?php echo $father->full_name;?>(الأب)</option>  
                             <?php } }else{?>
                            <option value="2-<?php echo $father->f_national_id;?>"><?php echo $father->full_name;?>(الأب)</option>  
                              <?php }?>
                          <?php }?>
                       <!----   ---------------------- ------------>
                        <?php  if(isset($mother) && !empty($mother)){?>
                            <?php  if(isset($result) && !empty($result)){ 
                                   if(!in_array($mother->mother_national_card_new,$result)){  ?>
                            <option value="1-<?php echo $mother->mother_national_card_new;?>"><?php echo $mother->full_name;?> (الأم)</option>      
                            <?php } }else{ ?>
                            <option value="1-<?php echo $mother->mother_national_card_new;?>"><?php echo $mother->full_name;?> (الأم)</option>      
                            <?php }?>
                        <?php }?>
                     
                        <!----   ---------------------- ------------>
                        <?php if(isset($f_members)&&!empty($f_members) ){
                               foreach($f_members as $row){ 
                                 if(isset($result) && !empty($result)){  if( in_array($row->member_card_num,$result)){ continue;} } ?>
                        <option value="3-<?php echo $row->member_card_num;?>"><?php echo $row->member_full_name;?> (الأبناء)</option>
                        <?php }}?>
                        <?php if(isset($wakel)&&!empty($wakel) ){
                                foreach($wakel as $row){
                                    if(isset($result) && !empty($result)){  if( in_array($row->w_national_id,$result)){ continue;} } ?>
                                    <option value="4-<?php echo $row->w_national_id;?>"><?php echo $row->w_name;?> (الوكلاء)</option>
                                <?php }}?>

                        <!----   ---------------------- ------------>
                      
                      </select>
               </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php  if(isset($result) && !empty($result)){?>
                    <input type="hidden" id="count_table" value="2" />
                    <?php }else{?>
                    <input type="hidden" id="count_table" value="1" />
                    <?php }?>
                    <button type="button"  onclick="ger_row();" class="btn btn-labeled btn-success "  value="إضافة" style="margin-top: 25px;">
                        <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة       </button>
                    
                    
                    
                </div>
                
                   <div class="form-group col-xs-12" id="data_option"></div>



            <?php  if(isset($result) && !empty($result)){?>
                <table  class="table table-bordered table-devices">
                    <thead>
                    <tr>
                        <th class="gray_background">الإسم</th>
                        <th class="gray_background"> رقم السجل المدني للأسرة</th>
                        <th class="gray_background">رقم الحفيظة</th>
                        <th class="gray_background">مكان الإصدار</th>
                    </tr>
                    </thead>
                    <tbody id="body_row">
                    <?php  if(isset($mother) && !empty($mother)){
                    if( in_array($mother->mother_national_card_new,$result)){?>
                    <tr>
                        <td><input type="hidden" name="option_select[]"  value="<?php echo $mother->mother_national_card_new;?>-1"/> 
                             <?php echo $mother->full_name;?> (الأم)</td>
                        <td> <?php echo $mother->mother_national_card_new;?></td>
                        <td> <?php echo $mother->mother_national_card_new;?></td>
                        <td> <?php echo $mother->dest_card;?></td>
                    </tr>
                    <?php }?>
                     <?php }?>
                    <?php   if(isset($father) && !empty($father)){
                     if( in_array($father->f_national_id,$result)){  ?>
                    <tr>
                        <td><input type="hidden"  name="option_select[]"   value="<?php echo $father->f_national_id;?>-2" /> 
                            <?php echo $father->full_name;?>(الأب)</td>
                        <td> <?php echo $father->mother_national_num_fk;?></td>
                        <td> <?php echo $father->f_national_id;?></td>
                        <td> <?php echo $father->dest_card;?></td>
                    </tr>
                     <?php }?>
                      <?php }?>
                    <?php if(isset($f_members)&&!empty($f_members)){
                        foreach($f_members as $row){  ?>
                           <?php   if( in_array($row->member_card_num,$result)){ ?>
                            <tr>
                                <td><input type="hidden"   name="option_select[]"    value="<?php echo $row->member_card_num;?>-3" />
                                    <?php echo $row->member_full_name;?> (الأبناء)</td>
                                <td> <?php echo $row->member_card_num;?></td>
                                <td> <?php echo $row->member_card_num;?></td>
                                <td> <?php echo $row->dest_card;?></td>
                            </tr>
                            <?php } ?>
                        <?php } } ?>
                        <?php if(isset($wakel)&&!empty($wakel)){
                                foreach($wakel as $row){  ?>
                                    <?php   if( in_array($row->w_national_id,$result)){ ?>
                                        <tr>
                                            <td><input type="hidden"   name="option_select[]"    value="<?php echo $row->w_national_id;?>-4" />
                                                <?php echo $row->w_name;?> (الوكيل)</td>
                                            <td> <?php echo $row->w_national_id;?></td>
                                            <td> <?php echo $row->w_national_id;?></td>
                                            <td> <?php echo $row->dest_card;?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } } ?>
                    </tbody>
                </table>
                <?php }?>
                 <div class="form-group col-xs-12 text-center">
                <button type="submit" id="saveBtn" class="btn btn-labeled btn-success " name="submit" value="حفظ" <?php if(isset($result)){}else{ echo 'disabled=""';}?>>
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ       </button>
                </div>
                
                
                </form>



                <?php
                if(isset($letters)&&!empty($letters)){

                    ?>

                    <table id="example"  class="table table-bordered table-devices">
                        <thead>
                        <tr class="info">
                            <th class="">رقم الخطاب </th>
                            <th class="">التاريخ</th>
                            <th class="">الإجراء</th>
                            <th class="">إرفاق صورة</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php  foreach($letters as $row){ 
                           $link= $this->uri->segment(4)."/".$this->uri->segment(5); 

                            $title='';
                            if(empty($row->file)) { 

                                $title ='إرفاق صورة';
                            }else{

                                $title ='عرض الصورة';

                            }
                            ?>
                            <tr >
                           <!--     <td><?php echo $row->letter_num;?> / <?php echo$this->uri->segment(5);?> </td>-->
                           
                            <td><?php echo $row->letter_num;?> / <?php echo $row->num;?> </td>
                                <td> <?php echo $row->date_in_letter;?></td>
                                <td>


                                    <a style="line-height: 1.5;font-size: 16px; background-color: #009688;color: #fff; padding: 5px 7px; margin-left: 3px"  href="<?php echo base_url().'family_controllers/Family_letter/update_Insurance_letter/'.$row->mother_national_num_fk.'/'.$row->letter_num.'/'.$this->uri->segment(5)?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i> تعديل </a>

                                    <a style="line-height: 1.5;font-size: 16px; background-color: #ff0000;color: #fff; padding: 5px 7px; margin-left: 3px"  data-toggle="modal" data-target="#modal-delete<?php echo $row->letter_num;?>" ><i class="fa fa-trash"></i>حذف </a>
                                    <a  style="line-height: 1.5;font-size: 16px; background-color: #b30dae;color: #fff; padding: 5px 7px; margin-left: 3px"  target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/print_letter/<?php echo $basic_family->mother_national_num;?>/<?php echo $row->letter_type;?>/<?php echo $row->letter_num;?>/Insurance_letter"><i class="fa fa-print" aria - hidden = "true" ></i >طباعة</a>




                                </td>
<td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalfile<?php echo $row->letter_num;?>"  style="font-size: 16px;"> 

<?php echo 'إرفاق خطاب تأمينات (الأم)';?></button>

                                </td>



                            </tr>

                            <div class="modal" id="modal-delete<?php echo $row->letter_num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p id="text">هل أنت متأكد من الحذف؟</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                            <a id="" href="<?php echo base_url().'family_controllers/Family_letter/delete_Insurance_letter/'.$row->letter_num.'/'.$link?>"> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <!--   <div class="modal fade" id="myModalfile<?php echo $row->letter_num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document" style="width: 80%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo$title;?></h4>
                                        </div>
                                        <?php echo form_open_multipart('family_controllers/Family_letter/Letter_file_upload/'.$row->letter_num.'/'.$row->letter_num);?>
                                        <div class="modal-body">





                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half"> ارفاق الصوره الاولي </label>
                                                <input type="file" name="file"  onchange="make_dir();"  class="form-control half file">
                                                <?php
                                                if(!empty($row->file)){
                                                    ?>
                                                    <img src="<?php echo base_url('uploads/images/'.$row->file.''); ?>" onchange="make_dir();" height="200px" width="200px" alt="">
                                                <?php } ?>

                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half"> ارفاق الصوره الثانيه </label>
                                                <input type="file" name="file2"   onchange="make_dir();" class="form-control half file">
                                                <?php
                                                if(!empty($row->file2)){
                                                    ?>
                                                    <img src="<?php echo base_url('uploads/images/'.$row->file2.''); ?>" height="200px" width="200px" alt="">
                                                <?php } ?>

                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half"> ارفاق الصوره الثالته </label>
                                                <input type="file" name="file3" onchange="make_dir();"   class="form-control half file">
                                                <?php
                                                if(!empty($row->file3)){
                                                    ?>
                                                    <img src="<?php echo base_url('uploads/images/'.$row->file3.''); ?>" height="200px" width="200px" alt="">
                                                <?php } ?>

                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" name="link" value="Insurance_letter">
                                            <input type="hidden" name="mother_num" value="<?php echo $row->mother_national_num_fk;?>">
                                            <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>

                                                <button type="submit" disabled="disabled" name="add" value="add" class="btn btn-success upload">رفع</button>

                                        </div>
                                        <?php echo form_close()?>
                                    </div>
                                </div>
                            </div>
-->
                        <?php   } ?>
                        </tbody>
                    </table>
                    
                    
                    <?php foreach ($letters as $row) { ?>

                        <div class="modal fade" id="myModalfile<?php echo $row->letter_num; ?>" tabindex="-1"
                             role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"><?php echo $title; ?></h4>
                                    </div>
                                    <?php echo form_open_multipart('family_controllers/Family_letter/Letter_file_upload/' . $row->letter_num . '/' . $row->letter_num);

                                    ?>
                                    <div class="modal-body">

                                        <div class=" col-sm-12 col-xs-12 ">

                                            <button type="button" class="fa fa-plus  btn "
                                                    onclick="show_input()"
                                            ></button>


                                        </div>


                                        <div class=" col-sm-12 col-xs-12 ">

                                            <table id="mytable" style="display: none"
                                                   class="table table-bordered table-devices">
                                                <thead>

                                                <tr class="info">
                                                    <th> اسم المرفق</th>
                                                    <th> اختر الصورة</th>
                                                    <th> اجراء</th>
                                                </tr>
                                                </thead>
                                                <tbody id="table_input">


                                                </tbody>
                                            </table>
                                        </div>

                                        <?php if ((!empty($row->file1)) or (!empty($row->file2)) or (!empty($row->file3))) {

                                            ?>
                                            <div class=" col-sm-12 col-xs-12 ">


                                                <table class="table table-bordered table-devices">
                                                    <thead>

                                                    <tr class="info">
                                                        <th> م</th>
                                                        <th> اسم المرفق</th>
                                                        <th> عرض الصورة</th>
                                                        <th> اجراء</th>


                                                    </tr>
                                                    </thead>
                                                    <tbody id="data_table">

                                                    <?php
                                                    $x = 0;
                                                    if ((!empty($row->name1)) && (!empty($row->file1))) {

                                                        ?>
                                                        <tr id="r1">
                                                            <td><?= ++$x; ?></td>
                                                            <td><?= $row->name1 ?></td>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/images/' . $row->file1 . ''); ?>"
                                                                     height="100px" width="100px" alt=""></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>family_controllers/Family_letter/delet_img/<?php echo $row->letter_num . '/1/' . $link . '/Insurance_letter' ?>"
                                                                   style="line-height: 1.5; background-color: #ff0000;color: #fff; padding: 3px 2px; margin-left: 3px"
                                                                   onclick="return confirm('هل انت متأكد من الحذف')">
                                                                    <i class="fa fa-trash"></i></a>
                                                                <button id="b1" type="button" class="fa fa-pencil  btn "
                                                                        onclick="update_input(this.value)"
                                                                        value="1"></button>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    if ((!empty($row->name2)) && (!empty($row->file2))) {

                                                        ?>
                                                        <tr id="r2">
                                                            <td><?= ++$x; ?></td>
                                                            <td><?= $row->name2 ?></td>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/images/' . $row->file2 . ''); ?>"
                                                                     height="100px" width="100px" alt=""></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>family_controllers/Family_letter/delet_img/<?php echo $row->letter_num . '/2/' . $link . '/Insurance_letter' ?>"
                                                                   style="line-height: 1.5; background-color: #ff0000;color: #fff; padding: 3px 2px; margin-left: 3px"
                                                                   onclick="return confirm('هل انت متأكد من الحذف')">
                                                                    <i class="fa fa-trash"></i></a>

                                                                <button id="b2" type="button" class="fa fa-pencil  btn "
                                                                        onclick="update_input(this.value)"
                                                                        value="2"></button>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    if ((!empty($row->name3)) && (!empty($row->file3))) {

                                                        ?>
                                                        <tr id="r3">
                                                            <td><?= ++$x; ?></td>
                                                            <td><?= $row->name3 ?></td>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/images/' . $row->file3 . ''); ?>"
                                                                     height="100px" width="100px" alt=""></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>family_controllers/Family_letter/delet_img/<?php echo $row->letter_num . '/3/' . $link . '/Insurance_letter'  ?>"
                                                                   style="line-height: 1.5; background-color: #ff0000;color: #fff; padding: 3px 2px; margin-left: 3px"
                                                                   onclick="return confirm('هل انت متأكد من الحذف')">
                                                                    <i class="fa fa-trash"></i></a>
                                                                <button id="b3" type="button" class="fa fa-pencil  btn "
                                                                        onclick="update_input(this.value)"
                                                                        value="3"></button>

                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>


                                                    </tbody>


                                                </table>


                                            </div>

                                        <?php } ?>

                                    </div>

                                    <div class="modal-footer">
                                        <input type="hidden" name="link" value="Insurance_letter">
                                        <input type="hidden" name="le" value="" id="le">
                                        <input type="hidden" name="mother_num"
                                               value="<?php echo $row->mother_national_num_fk; ?>">
                                        <button type="button" class="btn btn-danger" style="float: left"
                                                data-dismiss="modal">إغلاق
                                        </button>

                                        <button id="addd" type="submit" disabled="disabled" name="add" value="add"
                                                class="btn btn-success upload">رفع
                                        </button>

                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>


                    <?php } ?>


                    
                    
                <?php   } ?>




        </div>



    </div>


</div>

<script>
    function make_dir()
    {
        $('.upload').attr('disabled',false);
    }



</script>





<script>

                


  function ger_row(){
    
        var data_member=$('#member_id').val();
        var count_table=$('#count_table').val();
        var res = data_member.split("-");
         var member_type=res[0];
         var member_num=res[1];
          if(data_member  != '') {
            var dataString = 'member_type=' + member_type +"&member_num="+member_num +"&count_table="+count_table;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family_letter/Get_Persons',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                     // $("#test_option").html(html);  //test_option
                    if(count_table == 1 ){
                        $("#data_option").html(html);
                    } else {
                        $("#body_row").append(html);
                    }
                     count_table = parseFloat(count_table ) + 1;
                     $('#count_table').val(count_table);
                     $('#saveBtn').removeAttr("disabled");
                }
            });
            return false;
        }
  }
</script>



<script>

    function show_input() {
        //  alert("vale"+val);
        //  console.log("value" + val + " n " + n);


        var x = document.getElementById('table_input');
        var d = document.getElementById('data_table');


        var length = x.rows.length + 1;

        var length2 = 0;
        if (d) {
            length2 = d.rows.length;
        }

        //var length2 = d.rows.length;


        console.log("len " + length);
        console.log("len2 " + length2);
        if (length2 == 2) {
            if (!$('#b1').val()) {
                console.log("b1" + $('#b1').val());
                $('#le').val(1);

                var dataString = "len=1";
            }
            else if (!$('#b2').val()) {
                console.log("b2" + $('#b2').val());
                $('#le').val(2);

                var dataString = "len=2";
            }
            else if (!$('#b3').val()) {
                console.log("b3" + $('#b3').val());
                $('#le').val(3);

                var dataString = "len=3";
            }
        }

        else if (length2 == 1) {

            if ($('#b1').val()) {
                console.log("b1" + $('#b1').val());
                $('#le').val(length + 1);

                var dataString = "len=" + (length + 1);
            }
            else if ($('#b2').val()) {
                console.log("b2" + $('#b2').val());
                if (length == 1) {
                    $('#le').val(length);

                    var dataString = "len=" + (length);
                } else {
                    $('#le').val(length + 1);

                    var dataString = "len=" + (length + 1);
                }
            }
            else if ($('#b3').val()) {
                console.log("b3" + $('#b3').val());
                $('#le').val(length);

                var dataString = "len=" + (length);
            }

        }

        else if (length2 < 1) {
            $('#le').val(length);

            var dataString = "len=" + length;
        }


        if ((length) <= (3 - length2)) {

            $("#mytable").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_letter/add_row',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#table_input").append(html);
                    //$('#addd').show();
                    // get_new_option(2);
                }
            });

        }


        /*   // if (val == 1) {
           //
           //     var input1 = document.getElementById('input1' + n);
           //     console.log(" input get " + input1);
           //     input1.style.visibility = "visible";
           //
           // } else if (val == 2) {
           //     var input2 = document.getElementById('input2' + n);
           //     console.log(" input get " + input2);
           //     input2.style.visibility = "visible";
           //
           // } else if (val == 3) {
           //     var input3 = document.getElementById('input3' + n);
           //     console.log(" input get " + input3);
           //     input3.style.visibility = "visible";
           //
           // }
           // else {
           //
           //
           // }*/

    }

    function update_input(vai_update) {
        //  alert("vale"+val);
        //  console.log("value" + val + " n " + n);
        var x = document.getElementById('table_input');
        var d = document.getElementById('data_table');

        console.log(" len in update" + x.rows.length);
        for (var i = 1; i <= 3; i++) {
            remove_roww(i);

        }


        var length = x.rows.length + 1;
        var length2 = d.rows.length;

        console.log("len " + length);
        console.log("len2 " + length2);

        if (vai_update) {
            console.log("vai_update " + vai_update);
            $('#le').val(vai_update);

            var dataString = "len=" + vai_update;

       //     document.getElementById('r' + vai_update).style.backgroundColor = "#aaa";

for (var i = 1; i <= length2; i++) {

    document.getElementById('r' + i).style.backgroundColor = "";

}

document.getElementById('r' + vai_update).style.backgroundColor = "#adc7c5";
        }
        if ((length) <= (1)) {

            $("#mytable").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_letter/add_row',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#table_input").append(html);
                    //$('#addd').show();
                    // get_new_option(2);
                }
            });

        }


    }

    function remove_roww(len) {

        $('#' + len).remove();
        console.log("removw" + len)
        var x = document.getElementById('table_input');
        var length = x.rows.length + 1;
        if (length <= 1) {
            $("#mytable").hide();


        }
    }

</script>









