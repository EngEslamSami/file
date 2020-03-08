
<div class="col-sm-12 no-padding " >

<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">  الارشيف الالكتروني  </h3>
     </div>
    <div class="panel-body" >

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">
    <div class="latest_notification">
    
      <!-- Nav tabs -->
      <!-- <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">    <button onclick="GetDiv('myDiv')" > الوارد</button></li>
      <li role="presentation" class="active">     <button onclick="GetDiv_sader('myDiv_sader')" > الصادر</button></li>
       
         
      </ul> -->

      <!-- <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dash_tab1" onclick="GetDiv('myDiv')" aria-controls="home" role="dash_tab1" data-toggle="tab"><i class="fa fa-bell-o"></i> الوارد</a></li>
      
        <li role="presentation"><a href="#dash_tab3" onclick="GetDiv_sader('myDiv_sader')" aria-controls="dash_tab3" role="tab" data-toggle="tab"><i class="fa fa-retweet"></i> الصادر  </a></li>

         
      </ul> -->
      <div class="col-xs-12">


      <div class="col-md-2  col-sm-4 padding-4">
                        <label class="label ">النوع</label>
                        <select  name=""  data-validation="required" id="type"
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(2=>'وارد',1 => 'صادر');
                            foreach ($arr as $key => $value) {
                              
                                ?>
                                <option
                                        value="<?php echo $key; ?>" > <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                  </div>


                  <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">من تاريخ</label>
                      <input type="date" class="form-control" placeholder="" value="<?= date('Y-m-d'); ?>" id="from_date" name="from_date"  data-validation="required" />
                    </div>

                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">الي تاريخ</label>
                      <input type="date" class="form-control" placeholder="" value="<?= date('Y-m-d'); ?>" id="to_date" name="to_date"  data-validation="required" />
                    </div>



                    <div class="col-md-2 col-sm-4 padding-4">
                        <label class="label "> ردا علي معامله سابقه</label>
                        <select  name="reply_moamla" id="reply_moamla"
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arrx = array(1 => 'نعم', 0 => 'لا');
                            foreach ($arrx as $key => $value) {
                         
                                ?>
                                <option
                                        value="<?php echo $key; ?>" > <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                     </div>

                     <div class="form-group padding-4 col-md-2 col-xs-12">
                        <label class="label ">  نوع الخطاب</label>
                        <select  name="no3_khtab" id="no3_khtab"  
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                           // $arr = (1 => 'نعم', 0 => 'لا');
                            foreach ($no3_khtab_n as $key) {
                                 ?>
                                <option  style="color:<?php echo $key->color;?>" 
                                        value="<?php echo $key->id; ?>"> <?php echo $key->title; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                    </div>

                    <div class="form-group padding-4 col-md-2 col-xs-12">
                        <label class="label "> عنوان الموضوع</label>
                        <select  name="title_name" id="title_name"  
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                           // $arr = (1 => 'نعم', 0 => 'لا');
                            foreach ($title_name as $key) {
                                 ?>
                                <option  style="color:<?php echo $key->color;?>" 
                                        value="<?php echo $key->id; ?>"> <?php echo $key->title; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                    </div>

                     
                    

                    <div class="form-group padding-4 col-md-2 col-xs-12">
                        <label class="label "> 
                        /الارسال طريقه الاستلام</label>
                        <select  name="tarekt_estlam_name" id="tarekt_estlam_name"  
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                           // $arr = (1 => 'نعم', 0 => 'لا');
                            foreach ($tarekt_estlam_name as $key) {
                                 ?>
                                <option  style="color:<?php echo $key->color;?>" 
                                        value="<?php echo $key->id; ?>"> <?php echo $key->title; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                    </div>


                    <div class="form-group padding-4 col-md-2 col-xs-12">
                        <label class="label "> درجه السريه</label>
                        <select  name="is_secret" id="is_secret"  
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                           // $arr = (1 => 'نعم', 0 => 'لا');
                            foreach ($arry as $key) {
                                 ?>
                                <option  style="color:<?php echo $key->color;?>" 
                                        value="<?php echo $key->id; ?>"> <?php echo $key->title; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                    </div>
                   
                    <div class="form-group padding-4 col-md-2 col-xs-12">
                        <label class="label ">الاولويه</label>
                        <select  name="awlawya"  id="awlawya"  data-validation="required" 
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arrawlawya = array(2=>'عادي',1 => 'هام', 0 => ' هام جدا');
                            foreach ($arrawlawya as $key => $value) {
                               
                                ?>
                                <option
                                        value="<?php echo $key; ?>"> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
            </div>

            <div class="form-group padding-4 col-md-1 col-xs-12">
                    <label class="label ">     يحتاج متابعة</label>
                    <select  type="text" name="need_follow" id="need_follow"
                             class="form-control  ">
                        <?php
                             $arr_follow = array('1'=>'نعم','2'=>'لا');
                        foreach ($arr_follow as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                              
                            ><?= $value?></option>
                            <?php
                        }
                        ?>

                    </select>

                </div>

                     

                    <div class="col-md-2 col-sm-4 padding-4">
      <button type="button" class="btn btn-labeled btn-inverse " onclick="get_type()" data-toggle="modal" style="margin-top: 26px;">
         <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
     </button> 
                
                
                  
     </div>
                </div>
     <br>
     <br>
     <br>
      <!-- Tab panes -->
   
        <div id="myDiv">
      
    
   </div>
        
        
  
        
        </div>
      
        

        
        





        
    
    </div>
</div>
</div>
    
    </div>
</div>

<div class="modal fade" id="myModal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 class="modal-title">نموذج الطباعة </h4>
      </div>
      <div class="modal-body col-sm-12">
       <div class="col-sm-12">
                <div id="div_print" ></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
        <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
      </div>
    </div>

  </div>
</div>
<script>
    function get_print(id ,date,num){
       var print_id=id;
      var date_export=date;
      var num_post =num ;
        var dataString = 'id=' + print_id + '&type=' + 2 +  "&num="+num_post+"&date="+date_export ;
       $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/PrintCode',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>
<script>
 function get_type(){
    var type=$('#type').val();
    console.log(type);
    if(type==1)
    {
       
        GetDiv_sader('myDiv');
    }
    else if(type==2)
    {
        
        GetDiv('myDiv');
    }
    else{

        swal({
                      title: "برجاء اختيار النوع!",


      }
      );
    }
   
   
   
    }
</script>
<script>
function GetDiv(div) {

var from_date=$('#from_date').val();
var to_date=$('#to_date').val();
if($('#reply_moamla').val()!='')
{
var reply_moamla=$('#reply_moamla').val();
}else
{
    var reply_moamla=0;

}
if($('#no3_khtab').val()!='')
{
var no3_khtab=$('#no3_khtab').val();
}else
{
    var no3_khtab=0;

}
if($('#title_name').val()!='')
{
var title_name=$('#title_name').val();
}else
{
    var title_name=0;

}
if($('#tarekt_estlam_name').val()!='')
{
var tarekt_estlam_name=$('#tarekt_estlam_name').val();
}else
{
    var tarekt_estlam_name=0;

}
if($('#is_secret').val()!='')
{
var is_secret=$('#is_secret').val();
}else
{
    var is_secret=0;

}
if($('#awlawya').val()!='')
{
var awlawya=$('#awlawya').val();
}else
{
    var awlawya=0;

}
if($('#need_follow').val()!='')
{
var need_follow=$('#need_follow').val();
}else
{
    var need_follow=0;

}
console.log(type);
html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
    '<thead><tr class="greentd"><th style="width: 50px;"> رقم الوارد </th><th style="width: 170px;" >تاريخ الاستلام </th>' +
    '<th style="width: 50px;">  جهه الاختصاص </th><th style="width: 50px;">   جهه الارسال </th>'+
   ' <th style="width: 50px;"> عنوان الموضوع</th><th style="width: 50px;">  طريقه الاستلام </th><th style="width: 170px;" > الاولويه </th><th style="width: 170px;" > الاجراء </th></tr></thead><table><div id="dataMember"></div></div>';
$("#" + div).html(html);
$('#js_table_members').show();
var oTable_usergroup = $('#js_table_members').DataTable({
    dom: 'Bfrtip',
    
    "ajax": '<?php echo base_url(); ?>all_secretary/archive/main/Main/getConnection/'+from_date+'/'+to_date+'/'+reply_moamla+'/'+no3_khtab+'/'+title_name+'/'+tarekt_estlam_name+'/'+is_secret+'/'+awlawya+'/'+need_follow,

    aoColumns: [
     
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true}

    ],

    buttons: [
        'pageLength',
        'copy',
        'excelHtml5',
        {
            extend: "pdfHtml5",
            orientation: 'landscape'
        },
        {
            extend: 'print',
            exportOptions: {columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
    ],

    colReorder: true,
    destroy: true

});
}
</script>
<script>
function GetDiv_sader(div) {

    var from_date=$('#from_date').val();
var to_date=$('#to_date').val();
if($('#reply_moamla').val()!='')
{
var reply_moamla=$('#reply_moamla').val();
}else
{
    var reply_moamla=0;

}
if($('#no3_khtab').val()!='')
{
var no3_khtab=$('#no3_khtab').val();
}else
{
    var no3_khtab=0;

}
if($('#title_name').val()!='')
{
var title_name=$('#title_name').val();
}else
{
    var title_name=0;

}
if($('#tarekt_estlam_name').val()!='')
{
var tarekt_estlam_name=$('#tarekt_estlam_name').val();
}else
{
    var tarekt_estlam_name=0;

}
if($('#is_secret').val()!='')
{
var is_secret=$('#is_secret').val();
}else
{
    var is_secret=0;

}
if($('#awlawya').val()!='')
{
var awlawya=$('#awlawya').val();
}else
{
    var awlawya=0;

}
if($('#need_follow').val()!='')
{
var need_follow=$('#need_follow').val();
}else
{
    var need_follow=0;

}



// var awlawya=$('#awlawya').val();
// var need_follow=$('#need_follow').val();
html = '<div class="col-md-12 no-padding"><table id="js_table_members_sader" class="table table-striped table-bordered dt-responsive nowrap " >' +
    '<thead><tr class="greentd"><th style="width: 50px;"> رقم الصادر </th><th style="width: 170px;" >تاريخ الاستلام </th>' +
    '<th style="width: 50px;">  جهه الاختصاص </th><th style="width: 50px;">   جهه الارسال </th>'+
   ' <th style="width: 50px;"> عنوان الموضوع</th><th style="width: 50px;">  طريقه الاستلام </th><th style="width: 170px;" > الاولويه </th><th style="width: 170px;" > الاجراء </th></tr></thead><table><div id="dataMember"></div></div>';
$("#" + div).html(html);
$('#js_table_members_sader').show();
var oTable_usergroup = $('#js_table_members_sader').DataTable({
    dom: 'Bfrtip',
    //"ajax": '<?php echo base_url(); ?>all_secretary/archive/main/Main/getConnection_sader/'+from_date+'/'+to_date,
    "ajax": '<?php echo base_url(); ?>all_secretary/archive/main/Main/getConnection_sader/'+from_date+'/'+to_date+'/'+reply_moamla+'/'+no3_khtab+'/'+title_name+'/'+tarekt_estlam_name+'/'+is_secret+'/'+awlawya+'/'+need_follow,
    aoColumns: [
     
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true},
        {"bSortable": true}

    ],

    buttons: [
        'pageLength',
        'copy',
        'excelHtml5',
        {
            extend: "pdfHtml5",
            orientation: 'landscape'
        },
        {
            extend: 'print',
            exportOptions: {columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
    ],

    colReorder: true,
    destroy: true

});
}
</script>