


<style type="text/css">
.padd {padding: 0 15px !important;}
.no-padding {padding: 0;}
h4 {margin-top: 0;}
</style>
<?php 
$type = array(1=>'عامل',2=>'منتسب');
$sponsor_type = array(1=>'كفالة مادية',2=>'كفالة مادية مع برنامج',3=>'كفالة أخرى');
$pay_method = array(1=>'نقدي',2=>'شبكة',3=>'حوالة بنكية',4=>'استقطاع',5=>'بنك',6=>'شيك');
$gender_type = array(1=>'ذكر',2=>'أنثى');
$job_type = array(1=>'موظف حكومي',2=>'موظف قطاع خاص',3=>'أعمال حرة',4=>'لا يعمل');
$identity_type =array(1=>'الهوية الوطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر');
$id = $this->uri->segment(4);
$disabled = 'disabled';
$readonly = 'readonly';
$disabled2 = 'disabled';
$readonly2 = 'readonly';
$required2 = '';
$readonly3 = 'readonly';
$required3 = '';
$required = '';
if($id == '') {
echo form_open_multipart('assembley_members/member/add');
}
else {
echo form_open_multipart('assembley_members/member/update/'.$id.'');


}
?>

<div class="col-sm-12 col-md-12 col-xs-12">
<br>
<div class="top-line"></div>
<div class="col-md-12 fadeInUp wow">
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
<div class="panel-heading">
<div class="panel-title">
<h4><?=$title?></h4>
</div>
</div>
<div class="panel-body">
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">
<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
    
    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> رقم العضويه </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="num" placeholder="" readonly="" id="num" value="<?php if(isset($sponsor)) echo $sponsor['membership_num'] ; else echo $id2+1;  ?>" class="form-control" data-validation="required">
        </div>
    </div>
    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4">تاريح العضويه</h4>
        </div>
        <div class="col-xs-6 r-input">
            <div class="docs-datepicker">
                <div class="input-group">
                    <input type="text" id="register_date"class="date_melady"  name="register_date" placeholder="ناريخ تسجيل العضو" value="<?php if(isset($sponsor)) {echo $sponsor['membership_date'] ;} ?>" class="form-control" data-validation="required" >
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4">نوع العضويه</h4>
        </div>
        <div class="col-xs-6 r-input" style="margin-top: 10px">
            <?php 
            foreach ($type as  $key=>$value) { 
                $check = '';
                if(isset($sponsor) && $sponsor['membership_type'] == $key){
                    $check = 'checked';
                }
            ?>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="type" data-validation="required" onclick="getRadioType($(this).val())" value="<?=$key?>" <?=$check?>> <?=$value?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
        </div>
    </div>
   

   
</div>

<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
 <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> الإسم </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="name" placeholder="الإسم" id="name" value="<?php if(isset($sponsor)) echo $sponsor['name'] ?>" class="form-control" data-validation="required">
        </div>
    </div>
 <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> الهانف </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="nymber" name="phone" placeholder="" id="phone" value="<?php if(isset($sponsor)) echo $sponsor['mob'] ?>" class="form-control" data-validation="required">
        </div>
    </div>
     <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> البريد الإلكتروني</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="email" name="email" placeholder="البريد الإلكتروني" id="email" value="<?php if(isset($sponsor)) echo $sponsor['email'] ?>" class="form-control" autocomplete="false">
        </div>
    </div>
     

    
</div>

<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
<div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> التحصص </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="specialize" placeholder="" id="specialize" value="<?php if(isset($sponsor)) echo $sponsor['specialist'] ?>" class="form-control" data-validation="required">
        </div>
    </div>
     <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> المهنه </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="job" placeholder="" id="job" value="<?php if(isset($sponsor)) echo $sponsor['job'] ?>" class="form-control" data-validation="required">
        </div>
    </div>
    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> العنوان </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="member_adress" placeholder="" id="member_adress" value="<?php if(isset($sponsor)) echo $sponsor['adress'] ?>" class="form-control" data-validation="required">
        </div>
    </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
     <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4">تاريح ميلاد العضو</h4>
        </div>
        <div class="col-xs-6 r-input">
            <div class="docs-datepicker">
                <div class="input-group">
                    <input type="text" id="member_date" class="date_melady" name="member_date" placeholder="ميلاد العضو" value="<?php if(isset($sponsor)) {echo $sponsor['date_birth'] ;} ?>" class="form-control " data-validation="required" >
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> المؤهلات العلميه</h4>
        </div>
        <div class="col-xs-6 r-input" style="margin-top: 10px">
            <?php 
            foreach ($degrees as  $x) { 
                $check = '';
                if(isset($sponsor) && $sponsor['scientific_qualification_id_fk'] == $x->id){
                    $check = 'checked';
                }
            ?>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="degree" data-validation="required" onclick="getRadioType($(this).val())" value="<?=$x->id?>" <?=$check?>> <?=$x->title?>
                
            <?php } ?>
        </div>
        
    </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
     <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> هانف العمل </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="number" name="work_number" placeholder="" id="work_number" value="<?php if(isset($sponsor)) echo $sponsor['work_mob'] ?>" class="form-control" data-validation="required">
        </div>
    </div>

    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4"> عتوان العمل </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="work_adress" placeholder="" id="adress" value="<?php if(isset($sponsor)) echo $sponsor['work_adress'] ?>" class="form-control" data-validation="required">
        </div>
    </div>

    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4">  جهه العمل </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="work_place" placeholder="" id="work_place" value="<?php if(isset($sponsor)) echo $sponsor['work_place'] ?>" class="form-control" data-validation="required">
        </div>
    </div>


    
</div>







<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
<div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4">صندوق بريد</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="number" name="mailbox" placeholder="  " id="box" value="<?php if(isset($sponsor)) echo $sponsor['mail_box'] ?>" class="form-control" data-validation="required">
        </div>
    </div>
    <div class="col-md-4 padd">
        <div class="col-xs-6">
            <h4 class="r-h4">رسوم العضويه</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="money" placeholder=" " id="" value="<?php if(isset($sponsor)) echo $sponsor['membership_value'] ?>" class="form-control" autocomplete="false">
        </div>
    </div>

    
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">

   
    
    <div class="form-group col-sm-4">
<label class="label label-green  half">صوره الهويه</label>
<input type="file" class="form-control half input-style" id="img" name="img" value=" <?php if(isset($sponsor)){echo $sponsor['img'];}?>" class="form-control" onchange="readURL(this);" >
</div>
<div class="form-group col-sm-4">
</div>
<div class="col-md-4" style="padding-right: 0">
<div class="form-group">
<div id="post_img" class="imgContent" style="min-height: 30px;">
<img id="blah"  width="250px" height="250px"src="<?php if(isset($sponsor)){ echo base_url().'uploads/images/'.$sponsor['img'];}else{
    echo'http://via.placeholder.com/350x150';
} ?>" alt="الصورة العرض" class="img-rounded">
</div>
</div>
</div>
</div>



<div class="form-group col-sm-12 col-xs-12">
    <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" onclick="return checkLength();"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php 
echo form_close();
?>
<!-- update Modal1 -->
<?php 

if(isset($mains)&&!empty($mains)){




?>
<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
<div class="top-line"></div><!--message of delete will be showen here-->
<div class="panel panel-bd lobidrag" style="padding-top: 0;">
<div class="panel-heading" style="">

</div>
<div class="panel-body">


<table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr class="visible-md visible-lg">
<th>مسلسل</th>
<th>اسم العضو</th>
<th>رقم العضويه</th>
<th> تاريخ العضويه</th>
<th>التفاصيل</th>
<th>الاجراء</th>
</tr>

</thead>
<tbody>
<?php 
$x=1;
foreach($mains as $row){?>
<tr>
<td><?php echo $x;?></td>
<td><?php echo $row->name;?></td>
<td><?php echo $row->membership_num;?></td>
  <td><?php echo $row->membership_date;?></td>
  <td >
                    <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $row->id  ?>" > عرض</button>

                    <div class="modal fade "  id="myModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" id="printablediv<?php echo $row->id ?>" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">  </h4>
                                </div>
                                <div class="modal-body">
                            <div id="modal-table-1"  class="center-block">

                                            <div class="col-xs-12">
                                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                   <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> اسم العضؤ  </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->name;  ?></h4>
                                                                                </div>
                                                                            </div>
                                                                             <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> رقم العضويه </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->membership_num;  ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> تاريخ العضويه </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->membership_date;  ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> التليفون </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->mob;  ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            
                                                    
                                                    
                                                    
                                                </div>
                                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">عنوان العضو</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->adress;  ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">وظيفه العضو</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->job;  ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">نوع العضو</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $type[$row->membership_type]  ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">البريد الالكتروني</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->email; ?></h4>
                                                                                </div>
                                                                            </div>
                                                </div>
                                                 <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                 <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> التخصص</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->specialist; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                           
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> مكان العمل</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->work_adress; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">تاريخ ميلاد العضو</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->date_birth; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table" style="float: left;">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">صوره بطاقه الهويه</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                   <div class="col-md-4" style="padding-right: 0">
<div class="form-group">
<div id="post_img" class="imgContent" style="min-height: 30px;">
<img id="blah"  width="250px" height="250px"src="<?php if(isset($row->img)){ echo base_url().'uploads/images/'.$row->img;}else{
    echo base_url().'uploads/images/$row->img';
} ?>" alt="الصورة العرض" class="img-rounded">
</div>
</div>
</div>
                                                                                </div>
                                                                            </div>
                                                 </div>
                                                 <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                 <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> هاتف العمل</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->work_mob; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> صندوق البريد</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->mail_box; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> رسوم العضويه</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->membership_value; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                             <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> جهه العمل</h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $row->work_place; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            
                                                 </div>
                                                
                                                
                                                
                                          
                                            </div>
                                            
                                                  


                            </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" style="float: left;" class="btn btn-success" data-dismiss="modal">إغلاق</button>
                                </div>






                            </div>
                        </div>
                    </div>
                   

                </td>
<td>
    
               <a href="<?php echo base_url();?>assembley_members/Member/print_data/<?php echo $row->id;?>"><i class="fa fa-print" aria-hidden="true"></i> </a>

   
                    <a href="<?php echo base_url();?>assembley_members/Member/update/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                    <a  href="<?php echo base_url();?>assembley_members/Member/delete/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                    

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





<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#blah').attr('src', e.target.result)
};
reader.readAsDataURL(input.files[0]);
}
}
</script>

<script>
$('#example').DataTable( {
		
		dom: 'Bfrtip',
		buttons: [
		'copy', 
        'csv', 
        'excelHtml5',
        'pdfHtml5', 
        {
                extend: 'print',
                exportOptions: { columns: ':visible'}
        },
            'colvis'
		],
    colReorder: true






	}
    );
</script>
