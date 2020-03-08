<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<!---form------>
<span id="message">
<?php
if(isset($_SESSION['message']))
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
<?php $member_type = array('إختر','دائم','غير دائم','رجل اعمال','عضوية نسائية');

 ?>
</span>
 <div class="col-xs-12">
 <?php if(isset($results)):?>
 <?php echo form_open_multipart('Directors/Directors/update_magls/'.$results['id'],array('class'=>"",'role'=>"form" )); ?>

                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-sm-12 col-xs-12" >
                            <div class="form-group col-sm-3 col-xs-12" style="padding-left: 30px;">
                                <label class="label label-green  half">اختر كود المجلس  </label>
                                <select name="council_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                    <option value="">-اختر-</option>
                                    <?php foreach ($magls as $mag): ?>
                                        <?php
                                        $selected='';
                                        if($results['council_id_fk']== $mag->id){
                                            $selected='selected';
                                        }
                                        ?>
                                        <option value="<?php echo $mag->id ?>" <?php echo $selected ?> ><?php echo $mag->id ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12" >
                                <label class="label label-green  half"> رقم العضو <strong></strong> </label>
                                <input type="text" class="form-control half input-style" value="<?php echo $results['member_code']?>" name="member_code" readonly=""/>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12" >
                                <label class="label label-green  half">إسم العضو </label>
                                <input type="text" class="form-control half input-style " name="member_name" value="<?php echo $results['member_name'] ?>" data-validation="required">

                            </div>
                        </div>



                        <div class="col-sm-12 col-xs-12" >
                            <div class="form-group col-sm-4 col-xs-12" style="padding-left: 30px;">
                                <label class="label label-green  half">اختر نوع العضوية  </label>
                                <select name="member_type_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="">-إختر-</option>
                                    <?php
                                    for( $x=0;$x<sizeof($member_type) ;$x++){


                                        $selected3='';
                                        if($results['member_type_id_fk']== $x){
                                            $selected3='selected';
                                        }
                                        ?>
                                        <option value="<?php echo $x; ?>" <?= $selected3;?> ><?php echo $member_type[$x]; ?> </option>
                                    <?php } ?>


                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label label-green  half">اختر وظيفة العضو  </label>
                                <select name="job_title_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                    <option value=""> - اختر - </option>
                                    <?php foreach ($job_title as $job): ?>
                                        <?php
                                        $selected2='';
                                        if($results['job_title_id_fk']== $job->id){
                                            $selected2='selected';
                                        }?>

                                        <option value="<?php echo $job->id ?>" <?php echo $selected2 ?> ><?php echo $job->name ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label label-green  half"> رقم الهوية <strong></strong> </label>
                                <input type="text" id="num1" onkeyup="chek_length('num1')" onkeypress="validate_number(event)" class="form-control half input-style" value="<?= $results['member_national_num']?>" name="member_national_num"/>
                                <span id="num1_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="form-group col-sm-4 col-xs-12">
                                <?php if(!empty($results['member_birth_date'])){ $gregorian_date=explode('/',$results['member_birth_date']);} ?>
                                <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                                <input class="textbox form-control" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
                                <input class="textbox form-control" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
                                <input class="textbox4 form-control" type="text" name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <?php if(!empty($results['member_birth_date_hijri'])){ $hijri_date=explode('/',$results['member_birth_date_hijri']);} ?>
                                <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                                <input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                <input class="textbox form-control" type="text" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                                <input class="textbox2 form-control half " type="text" name="age" id="myage" size="60" id="wd" readonly  
                                  value="<?php  if(!empty($results['member_birth_date'])){ echo ($current_h_year -$results['member_birth_date_hijri_year']); }?>"/>
                                <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
                                <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
                            </div>

                        </div>
                        <div class="col-sm-12 col-xs-12" >
                            <div class="form-group col-sm-4 col-xs-12" style="padding-left: 30px;">
                                <label class="label label-green  half"> رقم الجوال <strong></strong> </label>
                                <input type="text"id="mob1" onkeyup="chek_length('mob1')" onkeypress="validate_number(event)" class="form-control half input-style" value="<?= $results['member_phone']?>" name="member_phone"/>
                                <span id="mob1_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label label-green  half"> تاريخ التعيين<strong></strong> </label>
                                <input type="date" class="form-control half input-style" value="<?php echo date('Y-m-d',$results['appointment_date']) ?>" name="appointment_date" placeholder="شهر / يوم / سنة " data-validation="required" >
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label label-green  half"> تاريخ الانتهاء<strong></strong> </label>
                                <input type="date" class="form-control  half input-style" value="<?php echo date('Y-m-d',$results['expired_date']) ?>" name="expired_date" placeholder="شهر / يوم / سنة " data-validation="required" >
                            </div>
                        </div>



                       
                        </div>
                          <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="update" value="تعديل" />
                        </div>
                          <div class="col-xs-7"></div>
                    </div>

                </div>
            <?php echo form_close()?>
            <?php else: ?>
            <?php echo form_open_multipart('Directors/Directors/add_magls',array('class'=>"",'role'=>"form" ))?>
        <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">
                <div class="col-sm-12 col-xs-12" >
                    <div class="form-group col-sm-3 col-xs-12" style="padding-left: 30px;">
                        <label class="label label-green  half">اختر كود المجلس  </label>
                        <select name="council_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <option value="">-اختر-</option>
                            <?php foreach ($magls as $mag): ?>

                                <option value="<?php echo $mag->id ?>"  ><?php echo $mag->id ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-xs-12" >
                        <label class="label label-green  half"> رقم العضو <strong></strong> </label>
                        <input type="text" class="form-control half input-style" value="<?php echo ($last_member+1)?>" name="member_code" readonly=""/>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12" >
                        <label class="label label-green  half">إسم العضو </label>
                        <input type="text" class="form-control half input-style " name="member_name" value="" data-validation="required">

                    </div>
                </div>



                <div class="col-sm-12 col-xs-12" >
                    <div class="form-group col-sm-4 col-xs-12" style="padding-left: 30px;">
                        <label class="label label-green  half">اختر نوع العضوية  </label>
                        <select name="member_type_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                            <option value="">-إختر-</option>
                            <?php
                            for( $x=0;$x<sizeof($member_type) ;$x++){



                                ?>
                                <option value="<?php echo $x; ?>" ><?php echo $member_type[$x]; ?> </option>
                            <?php } ?>


                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label label-green  half">منصب العضو  </label>
                        <select name="job_title_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <option value=""> - اختر - </option>
                            <?php foreach ($job_title as $job): ?>


                                <option value="<?php echo $job->id ?>" ><?php echo $job->name ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label label-green  half"> رقم الهوية <strong></strong> </label>
                        <input type="text"  id="num" onkeyup="chek_length('num')"  onkeypress="validate_number(event)" class="form-control half input-style" value="" name="member_national_num"/>
                        <span id="num_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group col-sm-4 col-xs-12">
                        <?php if(!empty($member_birth_date)){ $gregorian_date=explode('/',$member_birth_date);} ?>
                        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                        <input class="textbox form-control" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
                        <input class="textbox form-control" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
                        <input class="textbox4 form-control" type="text" name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <?php if(!empty($member_birth_date_hijri)){ $hijri_date=explode('/',$member_birth_date_hijri);} ?>
                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                        <input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                        <input class="textbox form-control" type="text" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                        <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                        <input class="textbox2 form-control half " type="text" name="age" id="myage" size="60" id="wd" readonly  value="<?php  if(!empty($member_birth_date)){ echo (date('Y-m-d')-$member_birth_date); }?>"/>
                        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
                        <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
                    </div>

                </div>

                <div class="col-sm-12 col-xs-12" >
                    <div class="form-group col-sm-4 col-xs-12" style="padding-left: 30px;">
                        <label class="label label-green  half"> رقم الجوال <strong></strong> </label>
                        <input type="text" id="mob"  onkeypress="validate_number(event)" class="form-control half input-style" value=""  onkeyup="chek_length('mob')"name="member_phone"/>
                        <span id="mob_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label label-green  half"> تاريخ التعيين<strong></strong> </label>
                        <input type="date" class="form-control half input-style" value="" name="appointment_date" placeholder="شهر / يوم / سنة " data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label label-green  half"> تاريخ الانتهاء<strong></strong> </label>
                        <input type="date" class="form-control  half input-style" value="" name="expired_date" placeholder="شهر / يوم / سنة " data-validation="required" >
                    </div>
                </div>




            </div>
            <div class="col-xs-4"></div>
            <div class="col-xs-3">
                <input type="submit" class="btn center-block r-manage-btn2 " id=""  name="add" value="حفظ" />
            </div>
            <div class="col-xs-7"></div>
        </div>



 <?php endif; ?>

<div class="col-md-12">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab0default" data-toggle="tab">المجلس الحالى</a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">المجالس الاخرى</a></li>    
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
<?php if(isset($on_magls)&&$on_magls!=null):?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">كود العضوية</th>
            <th class="text-center">أسم العضو </th>
            <th class="text-center">تاريخ التعيين</th>
            <th class="text-center">تاريخ الانتهاء </th>
            <th class="text-center">الاجراء</th>
            <th class="text-center">الحالة</th>
        </tr>
    </thead>
    <tbody class="text-center">
    <?php $a=1; foreach ($on_magls as $key=>$value):
    foreach ($value as $record):
    if($record->expired_date < time()){
        $state='danger';
        $title='عضوية منتهية';
    }elseif($record->expired_date > time()){
        $state='primary';
        $title='عضوية سارية';   
     
    }?>
        
        <tr>
            <td><?php echo $a ?></td>
            <td><?php echo $record->member_code ?></td>
            <td><?php echo $record->member_name ?></td>
            <td><?php echo $record->appointment_date_ar ?></td>
            <td><?php echo $record->expired_date_ar ?></td>
            <td><a href="<?php echo base_url().'Directors/Directors/update_magls/'.$record->id?>">
                  <i class="fa fa-pencil " aria-hidden="true"></i> </a>
              
                <a href="<?php echo base_url().'Directors/Directors/delete_magls/'.$record->id?>"
                 onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                  <i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
            <td>
              <button type="button" class="btn btn-sm btn-<?php echo $state?>"> <?php echo $title?></button>
          </td>
        </tr>

        <?php $a++;  endforeach; endforeach; ?>
  
    </tbody>
</table>
<?php else:?>
<div class="alert alert-danger" >
    لم يتم اضافة اعضاء للمجاس الحالى
          </div>
<?php endif;?>
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
<?php if(isset($off_magls)&&$off_magls!=null):?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  
    <tbody class="text-center">
    <?php $a=1; foreach ($off_magls as $key=>$value):?>
    <tr> <td colspan="2">كود المجلس :</td> 
         <td colspan="1"><?php echo $all_magls[$key]->id?></td>
         <td colspan="2">رقم قرار التعين : </td>  
         <td colspan="2"><?php echo $all_magls[$key]->appointment_decison_number?></td>
    </tr>
      
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">كود العضوية</th>
            <th class="text-center">أسم العضو </th>
            <th class="text-center">تاريخ التعيين</th>
            <th class="text-center">تاريخ الانتهاء </th>
            <th class="text-center">الاجراء</th>
            <th class="text-center">الحالة</th>
        </tr>
   
   <?php foreach ($value as $record): if($record->expired_date < time()){
        $state='danger';
        $title='عضوية منتهية';
    }elseif($record->expired_date > time()){
        $state='primary';
        $title='عضوية سارية';   
    }?>
        <tr>
            <td><?php echo $a ?></td>
            <td><?php echo $record->member_code ?></td>
            <td><?php echo $record->member_name ?></td>
            <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
            <td><?php echo  date('d-m-Y',$record->expired_date) ?></td>
            <td><a href="<?php echo base_url().'Directors/Directors/update_magls/'.$record->id?>">
                  <i class="fa fa-pencil " aria-hidden="true"></i> </a>
              
                <a href="<?php echo base_url().'Directors/Directors/delete_magls/'.$record->id?>">
                  <i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
            <td>
              <button type="button" class="btn btn-<?php echo $state?>"> <?php echo $title?></button>
          </td>
        </tr>

        <?php $a++;  endforeach; endforeach; ?>
  
    </tbody>
</table>
<?php else:?>
<div class="alert alert-danger" >
    لا يوجد اعضاء
          </div>
<?php endif;?>

<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        
<!---  end All ----------------------------------------------------------------------------------------------------->                  
 <?php  //endif; ?>

<script>


    function getAge() {
        var nowYear =(new Date()).getFullYear();
        var myAge = ( nowYear- $('#CYear').val() );
        $('#myage').val(myAge)
    }


    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
          //  document.getElementById("buttons").setAttribute("disabled", "disabled");
        }

        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '';
            $("#"+ inp_id +"_span").val('');
              //document.getElementById("").setAttribute("disabled", "disabled");
              var inchek_out= inchek.substring(0,10);
             $(inchek_id).val(inchek_out);
        }


    }

</script>


<script>

    function getAge() {
        var nowYear =(new Date()).getFullYear();
        var myAge = ( nowYear- $('#CYear').val() );
        $('#myage').val(myAge)
    }


</script>