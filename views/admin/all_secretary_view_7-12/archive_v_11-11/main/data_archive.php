
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

      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dash_tab1" onclick="GetDiv('myDiv')" aria-controls="home" role="dash_tab1" data-toggle="tab"><i class="fa fa-bell-o"></i> الوارد</a></li>
      
        <li role="presentation"><a href="#dash_tab3" onclick="GetDiv_sader('myDiv_sader')" aria-controls="dash_tab3" role="tab" data-toggle="tab"><i class="fa fa-retweet"></i> الصادر  </a></li>

         
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dash_tab1">
        <div id="myDiv">
        <?php if (isset($all_wared_end) && !empty($all_wared_end) ) {
           $data_load["all_wared_end"]= $all_wared_end;
    
         
        
     $this->load->view('admin/all_secretary_view/archive_v/main/all_archive_wared', $data_load);
         } ?> 
    
   </div>
        
        
        
        
        </div>
      
        <div role="tabpanel" class="tab-pane" id="dash_tab3">
        <div id="myDiv_sader">
        <?php if (isset($all_sader_end) && !empty($all_sader_end) ) {
        $data_load["all_sader_end"]= $all_sader_end;
     
         
        
    $this->load->view('admin/all_secretary_view/archive_v/main/all_archive_sader', $data_load);
     } ?> 

</div>

        
        





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
function GetDiv(div) {

html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
    '<thead><tr class="greentd"><th style="width: 50px;"> رقم الوارد </th><th style="width: 170px;" >تاريخ الاستلام </th>' +
    '<th style="width: 50px;">  جهه الاختصاص </th><th style="width: 50px;">   جهه الارسال </th>'+
   ' <th style="width: 50px;"> عنوان الموضوع</th><th style="width: 50px;">  طريقه الاستلام </th><th style="width: 170px;" > الاولويه </th><th style="width: 170px;" > الاجراء </th></tr></thead><table><div id="dataMember"></div></div>';
$("#" + div).html(html);
$('#js_table_members').show();
var oTable_usergroup = $('#js_table_members').DataTable({
    dom: 'Bfrtip',
    "ajax": '<?php echo base_url(); ?>all_secretary/archive/main/Main/getConnection',

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

html = '<div class="col-md-12 no-padding"><table id="js_table_members_sader" class="table table-striped table-bordered dt-responsive nowrap " >' +
    '<thead><tr class="greentd"><th style="width: 50px;"> رقم الصادر </th><th style="width: 170px;" >تاريخ الاستلام </th>' +
    '<th style="width: 50px;">  جهه الاختصاص </th><th style="width: 50px;">   جهه الارسال </th>'+
   ' <th style="width: 50px;"> عنوان الموضوع</th><th style="width: 50px;">  طريقه الاستلام </th><th style="width: 170px;" > الاولويه </th><th style="width: 170px;" > الاجراء </th></tr></thead><table><div id="dataMember"></div></div>';
$("#" + div).html(html);
$('#js_table_members_sader').show();
var oTable_usergroup = $('#js_table_members_sader').DataTable({
    dom: 'Bfrtip',
    "ajax": '<?php echo base_url(); ?>all_secretary/archive/main/Main/getConnection_sader',

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