   
</div><!--row-->
</div><!--content-->


</div><!--content-wrapper-->

<footer class="main-footer col-xs-12">
  <strong> جميع الحقوق &copy; محفوظة لدى شركة <a href="#">الأثير تك لتكنولوجيا المعلومات © <?php echo date("Y",time())?></a>.</strong> 
</footer>

</div><!--wrapper-->



<!--
	  <a type="button" class="btn btn-rocket" data-toggle="modal" data-target="#rocket-panel">
        <i class="fa fa-rocket" aria-hidden="true"></i>
    </a>


<div class="modal fade" id="rocket-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
            <input type="text" class="form-control" id="filter" name="filter" class="filter" placeholder="بحــــــــــــــــث" style="height: 50px;margin-bottom: 10px;text-align: center;font-size: 18px;"/>
                <div class="rocket-links col-xs-12 no-padding ">
                    <?php
                    if(isset($this->rapid_query)&&!empty($this->rapid_query)){
                        foreach ($this->rapid_query as $row){

                    ?>
                    <div class="block-link col-lg20 col-md-3 col-sm-4 col-xs-12 text-center padding-4">
                        <div class="rapid">
                        <a href="<?php echo base_url();?><?php echo $row->page_link;?>">
                            <?php if(isset($row->page_image)&&!empty($row->page_image)){?>
                            <img src="<?php echo base_url()?>uploads/pages_images/thumbs/<?php echo $row->page_image;?>">
                                <?php } else{ ?>
                                <img src="<?php echo base_url()?>asisst/admin_asset/img/logo.png">

                            <?php } ?>
                        <h5><?php echo $row->page_title;?></h5>
                        </a>
                        </div>
                </div>
                    <?php } }?>

            </div>
            <div class="modal-footer" style="padding: 5px;display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
             </div>
        </div>
    </div>
</div>
	</div>
   
-->


 <style>

</style>
      
      
<a type="button" class="btn btn-rocket" data-toggle="modal" data-target="#rocket-panel">
    <i class="fa fa-rocket" aria-hidden="true"></i>
</a>



<div class="modal fade" id="rocket-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  " role="document" style="width:75%">
        <div class="modal-content" style="display: inline-block;min-width: 310px;min-height:500px;">
            <div class="modal-body">
            
            
            
              <!--  <input type="text" class="form-control" id="filter" name="filter" class="filter" placeholder="بحــــــــــــــــث" style="height: 50px;margin-bottom: 10px;text-align: center;font-size: 18px;"/> -->
                <div class="rocket-links col-xs-12 no-padding ">
                    <div id="accordion_search_bar_container">
                          <input type="search" 
                             id="accordion_search_bar" class="form-control"
                             placeholder="Search"/>
                      </div>
                     <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     
                      
  
                    <?php if(isset($this->rapid_query)&&!empty($this->rapid_query)){
                        $x=1;
                        $y= 0;
                        foreach ($this->rapid_query as $row){ $y+=0.2;
                       ?>
        
                         
                              <div id="panel_container<?php echo $x;?>" class="panel panel-default wow fadeInRight" data-wow-delay="<?php echo $y ?>s" data-wow-duration="<?php echo $y ?>s" >
                                <div class="panel-heading" role="tab" id="heading<?= $x?>">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                                    
                                      <i class="<?=$row->page_icon_code?>"></i> <?=$row->page_title?>  <i class="more-less glyphicon glyphicon-plus"></i>
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapse<?php echo $x;?>" class="panel-collapse collapse <?php // echo $in; ?>" role="tabpanel" aria-labelledby="heading<?=$x?>">
                                     <div class="panel-body">
                                     
                                          <div class="sater">
                                                <?php get_li($row->sub);?>
                                          </div>
        
                                     </div>
                                </div>
                              </div>
                          
        
                    
                    <?php 
                    
                     $x++;
                    } }  ?>
                    </div>
                </div>
                    
                    
                    
                    
                    
                    
                    <?php
                   function get_li($arr)
                    {
                        if(!empty($arr)) {
                            $y= 0;
                            $z= 0;
                            foreach ($arr as $row) { $y+=0.3;$z+=0.1; ?>
                             <div class="col-sm-3 padding-4 wow fadeInRight" data-wow-delay="<?php echo $z ?>s" data-wow-duration="<?php echo $y ?>s" >
                                 <div class="etar">
                                     <a  href="<?php echo base_url().$row->page_link;?>"> <i class="fa fa-home"></i> <?php echo $row->page_title ;?> </a>
                                  </div>
                              </div>
                    <?php
                                if(!empty($row->sub)) {
                                    get_li($row->sub);
                                }
                            }
                        }
                     }
                    ?>
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>





<!----------------------------------------------------->



<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-ui.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-select.min.js"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/datepicker.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/owl.carousel.min.js"></script>

<!-- lobipanel
<script src="<?php echo base_url()?>asisst/admin_asset/js/lobipanel.min.js" type="text/javascript"></script>
-->
<script src="<?php echo base_url()?>asisst/admin_asset/js/menu.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>



<script id="rendered-js">
      


  var searchTerm, panelContainerId;
  $('#accordion_search_bar').on('change keyup', function () {
    searchTerm = $(this).val();
   
    $('#accordion .panel').each(function () {
      panelContainerId = '#' + $(this).attr('id');
      
    //   alert(panelContainerId);

      // Makes search to be case insesitive 
      $.extend($.expr[':'], {
        'contains': function (elem, i, match, array) {
          return (elem.textContent || elem.innerText || '').toLowerCase().
          indexOf((match[3] || "").toLowerCase()) >= 0;
        } });


      // END Makes search to be case insesitive

      // Show and Hide Triggers
      $(panelContainerId + ':not(:contains(' + searchTerm + '))').hide(); //Hide the rows that done contain the search query.
      $(panelContainerId + ':contains(' + searchTerm + ')').show(); //Show the rows that do!
     
     // $(panelContainerId + ':contains(' + searchTerm + ')' + ' .collapse').collapse();
      

    });
  });


   
</script>


<script type="text/javascript">
new WOW().init();
   $(document).ready(function () {
  $("#respMenu").aceResponsiveMenu({
      resizeWidth: '768', // Set the same in Media query       
      animationSpeed: 'medium', //slow, medium, fast
      accoridonExpAll: false //Expands all the accordion menu on click
    });
});

</script>
<script>
if (!RegExp.escape) {
    RegExp.escape = function (value) {
        return value.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
    };
}

var $medias = $('.block-link'),
    $h4s = $medias.find('h5');
$('#filter').keyup(function () {
    var filter = this.value,
        regex;
    if (filter) {
        regex = new RegExp(RegExp.escape(this.value), 'i')
        var $found = $h4s.filter(function () {
            return regex.test($(this).text())
        }).closest('.block-link').show();
        $medias.not($found).hide()
    } else {
        $medias.show();
    }
});
</script>
<script>
/*
$(function(){
			$('[role=dialog]')
			.on('show.bs.modal', function(e) {
				$(this)
				.find('[role=document]')
				.removeClass()
				.addClass('modal-dialog ' + $(e.relatedTarget).data('ui-class'))
			})
		});
        */
</script>

<script>
function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);




/**************/

 
  var searchTerm, panelContainerId;
  // Create a new contains that is case insensitive
  $.expr[":"].containsCaseInsensitive = function (n, i, m) {
    return (
      jQuery(n).
      text().
      toUpperCase().
      indexOf(m[3].toUpperCase()) >= 0);

  };

  $("#accordion_search_bar").on("change keyup paste click", function () {
    searchTerm = $(this).val();
    $("#accordion > .panel").each(function () {
      panelContainerId = "#" + $(this).attr("id");
      $(
      panelContainerId + ":not(:containsCaseInsensitive(" + searchTerm + "))").
      hide();
      $(
      panelContainerId + ":containsCaseInsensitive(" + searchTerm + ")").
      show();
    });
  });



  
  
</script>



<script src="<?php echo base_url()?>asisst/admin_asset/js/js.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/dashboard.js"></script>
<!---------------------------   required validation  -------------------------------->
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>
<!---------------------------   required validation  -------------------------------->
<script>
$(".panel-bd").find(".panel-heading").append("<span class='upChevron clickable'><i class='glyphicon glyphicon-chevron-up'></i></span>  ");
$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	}
})

</script>

<!--------------------------------------------- calander -------------------------------------------------------------->
<?php if(isset($footer_calender)){ ?>

    <script src="<?=base_url()?>asisst/admin_asset/plugins/calendar/js/jquery-ui.custom.min.js"></script>
    <script src="<?=base_url()?>asisst/admin_asset/plugins/calendar/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?=base_url()?>asisst/admin_asset/plugins/calendar/js/moment.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>asisst/admin_asset/plugins/calendar/js/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>asisst/admin_asset/plugins/calendar/js/bootbox.js"></script>
    <?php  $this->load->view($footer_calender); ?>
<?php } ?>
<!--------------------------------------------- calander -------------------------------------------------------------->





<!-- datatables-->
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.flash.min.js"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/jszip.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/buttons.colVis.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.colReorder.min.js"></script>
<!--
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.responsive.min.js" id="responsive-dt"></script> 
-->

<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/plugin.js"></script>


<!-- Change themes-->
<script src="<?php echo base_url()?>asisst/admin_asset/js/themeschange.js"></script>

<!-------------------------------------------------------------------------------------------->







<script type="text/javascript">
    $("#mother_national_num").bind('input', function(e) {
      $(e.target).keyup();
    });
</script>


<script>
    $(document).ready(function(){
        $('#all').on('click',function(){
            var inputs = $(".tt");
            var error = $(".form-error");
            if(this.checked){
                $('.cc').each(function(){
                    this.checked = true;
                });
                for(var i = 0; i < inputs.length; i++){
                    $(inputs[i]).attr("readonly", false);
                    $(inputs[i]).attr("data-validation", "required");
                }
            }else{
                $('.cc').each(function(){
                    this.checked = false;
                });
                for(var i = 0; i < inputs.length; i++){
                    $(inputs[i]).attr("readonly", "readonly");
                    $(inputs[i]).val("");
                    $(inputs[i]).attr("data-validation", "");
                }
                for(var i = 0; i < error.length; i++){
                    $(error[i]).html("");
                }
            }
        });

        $('.cc').on('click',function(){
            if($('.cc:checked').length == $('.cc').length){
                $('#all').prop('checked',true);
            }else{
                $('#all').prop('checked',false);
            }
        });
    });
</script>
<!-------------------------------------------------------------------------------------------->

<script src="<?php echo base_url()?>asisst/admin_asset/plugins/tree-view/tree-view.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$('.selectpicker').selectpicker("refresh");
</script>


<script src="<?php echo base_url()?>asisst/admin_asset/datepicker/js/jquery.calendars.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/datepicker/js/jquery.calendars.ummalqura.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/datepicker/js/jquery.calendars.ummalqura-ar.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/datepicker/js/bootstrap-calendars.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function () {


       $('#datetimepicker1').datetimepicker({
        format: 'DD/MM/YYYY'
          });
       
       $('.date_melady').datetimepicker({
        format: 'DD/MM/YYYY'
          });
          
       $('#popupDatepicker').datetimepicker({
        locale: {calender: 'ummalqura', lang: 'ar'}
    });
       $('#popupDatepicker2').datetimepicker({
        locale: {calender: 'ummalqura', lang: 'ar'}
    });
       $('#inlineDatepicker').datetimepicker({
        locale: {calender: 'ummalqura', lang: 'ar'}
    });
    // Umm ALqura Calendar
    $('.docs-date').datetimepicker({
        locale: {calender: 'ummalqura', lang: 'ar'},
        format: 'DD/MM/YYYY'

    });
});
</script>
<!--
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/datepicker/js/jquery.calendars.lang.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>asisst/admin_asset/datepicker/js/jquery.plugin.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/admin_asset/datepicker/js/jquery.calendars.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/admin_asset/datepicker/js/jquery.calendars.plus.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/admin_asset/datepicker/js/jquery.calendars.picker.js" ></script>

<script src="<?php echo base_url();?>asisst/admin_asset/datepicker/js/jquery.calendars.ummalqura.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/datepicker/js/jquery.calendars.ummalqura.min.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/datepicker/js/jquery.calendars.ummalqura-ar.js"></script>

<script>
    $(function() {
       var calendar = $.calendars.instance('ummalqura','ar');
       $('#popupDatepicker').calendarsPicker({calendar: calendar});
       $('#popupDatepicker2').calendarsPicker({calendar: calendar});
       $('#inlineDatepicker').calendarsPicker({calendar: calendar, onSelect: showDate});


   });
</script>
-->





<script src="<?php echo base_url()?>asisst/admin_asset/js/js.js"></script>


<script src="<?php echo base_url()?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>




<script>
  $.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;

    this.closest(".files").change(function (evt) {
        var output = [];

        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var file = evt.target.files[i];
            var fileId = sectionIdentifier + fileIdCounter;

            filesToUpload.push({
                id: fileId,
                file: file
            });

            var removeLink = "<img src='" + URL.createObjectURL(file) + "' style='width:100%;'/><span class=\"removeFile closebtn\" style='cursor: pointer' data-fileid=\"" + fileId + "\"><h6>x</h6></span>";

            output.push('<li class="ui-state-default" data-order=0 data-id="' + file.lastModified + '">'+ removeLink+'</li> ');
        };

        $(this).children(".fileList")
        .append(output.join(""));

        //reset the input to null - nice little chrome bug!
        evt.target.value = null;
    });

    $(this).on("click", ".removeFile", function (e) {
        e.preventDefault();

        var fileId = $(this).parent().children("span").data("fileid");

        // loop through the files array and check if the name of that file matches FileName
        // and get the index of the match
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id === fileId)
                filesToUpload.splice(i, 1);
        }
        
        $(this).parent().remove();
    });

    this.clear = function () {
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                filesToUpload.splice(i, 1);
        }

        $(this).children(".fileList").empty();
    }

    return this;
};

(function () {
    var filesToUpload = [];

    var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");

    $("#uploadBtn").click(function (e) {

        e.preventDefault();

        var dataString = new FormData();

        for (var i = 0, len = filesToUpload.length; i < len; i++) {
            dataString.append("files[]", filesToUpload[i].file);
        }

        //for sending texteara data
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        
        var other_data = $('form').serializeArray();
        
        $.each(other_data,function(key,input){
            dataString.append(input.name,input.value);
        });
        
        $.ajax({
            url: '<?php echo base_url() ?>' + $("#page_name").val() + '/inbox/'+$("#page_type").val()+'/'+$("#page_id").val(),
            data: dataString,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                //location.reload();
                window.location = "<?php echo base_url() ?>" + $("#page_name").val() + "/inbox/new/0";
                console.log("hi");
                console.log(data);
                files1Uploader.clear();
                $("#email_to").val('').selectpicker('refresh');;
                $('#title').val('');
                CKEDITOR.instances[instance].setData('');
                $('#images').val('');
            },
            error: function (data) {
                console.log("shit");
                console.log(data);
                //alert("ERROR - " + data.responseText);
            }
        });
    });
})()


</script>


<script>
    $(document).ready(function(){
        $('#all').on('click',function(){
            if(this.checked){
                $('.cc').each(function(){
                    this.checked = true;
                    document.getElementById('delet').style.display = "inline";
                });
            }else{
             $('.cc').each(function(){
                this.checked = false;
                document.getElementById('delet').style.display = "none";
            });
         }
     });

        $('.cc').on('click',function(){
            if($('.cc:checked').length == $('.cc').length){
                $('#all').prop('checked',true);
            }else{
                $('#all').prop('checked',false);
            }
            if($('.cc:checked').length != 0)
                document.getElementById('delet').style.display = "inline";
            else{
                if($('.cc:checked').length == 0)
                    document.getElementById('delet').style.display = "none";
            }
        });
    });
</script>





<!--Purchases-->

<script type="text/javascript">
    $('.pricePurchases').keyup(function () {
        var sum_big = parseFloat($("#all_cost_buy").val()) /  parseFloat($("#amount_buy").val()) ;
        $('#one_buy_cost').val(sum_big);
    });
</script>

<script type="text/javascript">
    $("#barcodePurchases").on('input',function() {
        if($('#barcodePurchases').val()){
            var dataString = 'barcode=' + $('#barcodePurchases').val();
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Storage/Purchases/Get_item',
                data:dataString,
                cache:false,
                success: function(result){
                    var obj = JSON.parse(result);
                    console.log(obj);
                    if(obj != ''){
                        $("#product_code").val(obj[0].id);
                        $("#product_code").selectpicker('refresh');
                        $('#product_name').val($("#product_code").find("option:selected").text());
                        $('#unit_id_fk').val($("#product_code").find("option:selected").attr("unitid"));
                        $('#unit_name').val($("#product_code").find("option:selected").attr("unitname"));
                        $('#barcodePurchases').val('');
                    }
                    else {
                        $("#product_code").val('');
                        $("#product_code").selectpicker('refresh');
                        $('#barcodePurchases').val('');
                        $('#unit_name').val('');
                    }
                }
            });
        }
        return false;
    });  
</script>

<script type="text/javascript">
    function check_validation() {
        var require = false;
        $(".condimentForm").each(function(){
            if($(this).attr('class') != 'btn-group bootstrap-select form-control condimentForm'){
                if(!$(this).val()){
                    require = true;
                }
            }
        });
        if(require == true){
            alert('يوجد بعض الحقول التي يجب عليك ملئها');
        }
        else{
            $('#fatora_date').removeAttr('disabled');
            $('#supplier_code').removeAttr('disabled');
            $('#paid_type').removeAttr('disabled');
            $('#box_name').removeAttr('disabled');
            var dataString = $("#formPurchases").serialize();
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Storage/Purchases/PurchasesSession',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#result").html(html);
                }
            });
        }
        return false;
    }
</script>

<script type="text/javascript">
    $("select#product_code").change(function(){
        $('#product_name').val($(this).find("option:selected").text());
        $('#unit_id_fk').val($(this).find("option:selected").attr("unitid"));
        $('#unit_name').val($(this).find("option:selected").attr("unitname"));
    });
</script>

<script type="text/javascript">
    $("#result").on('click', 'span.off', function(e) {
        e.preventDefault(); 
        var pcode = $(this).attr("data-code"); 
        var comment = $(this).parent();
        var commentContainer = comment.parent();
        commentContainer.fadeOut(); 
        var remove_code = 'remove_code=' + pcode;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Storage/Purchases/PurchasesSession',
            data:remove_code,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#result').html(html);
            }
        });
        e.preventDefault();
    });    
</script>






<!--ahmed-->
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>
<script>
$( document ).ready(function() {
    checkAll();
});

</script>




<script src="<?php echo base_url()?>asisst/admin_asset/js/hijri_converter.js"></script>



<script language="javascript" type="text/javascript"> function moveOnMax(field, nextFieldID) { if (field.value.length >= field.maxLength) { nextFieldID.focus(); } } </script>


<!------------------------------------------------>
<!-- ChartJs JavaScript -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/chartJs/Chart.min.js" type="text/javascript"></script>

<!-- Counter js -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/counterup/waypoints.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/counterup/jquery.counterup.min.js" type="text/javascript"></script>


<script src="<?=base_url().'asisst/admin_asset/'?>js/cheque.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>js/jscolor.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>js/jQuery.print.js"></script>





<script type="text/javascript">
         //counter
         $('.count-number').counterUp({
           delay: 15,
           time: 3000
       });          
   </script>











   <script type="text/javascript">

       // single bar chart imports
       var ctx = document.getElementById("singelBarChart");
       var myChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
               datasets: [
               {
                   label: "إيرادات هذا الأسبوع",
                   data: [40, 55, 75, 81, 56, 55, 40],
                   borderColor: "rgba(0, 150, 136, 0.8)",
                   width: "1",
                   borderWidth: "0",
                   backgroundColor: "rgba(0, 150, 136, 0.8)"
               }
               ]
           },
           options: {
               scales: {
                   yAxes: [{
                       ticks: {
                           beginAtZero: true
                       }
                   }]
               }
           }
       });



       // single bar chart exportss
       var ctx = document.getElementById("singelBarChart_export");
       var myChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
               datasets: [
               {
                   label: "إيرادات هذا الأسبوع",
                   data: [40, 55, 75, 81, 56, 55, 40],
                   borderColor: "rgba(51, 51, 51, 0.55)",
                   width: "1",
                   borderWidth: "0",
                   backgroundColor: "rgba(51, 51, 51, 0.55)"
               }
               ]
           },
           options: {
               scales: {
                   yAxes: [{
                       ticks: {
                           beginAtZero: true
                       }
                   }]
               }
           }
       });



       
   </script>



   <script type="text/javascript">
                   //bar chart
                   var ctx = document.getElementById("barChart");
                   var myChart = new Chart(ctx, {
                       type: 'bar',
                       data: {
                        labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر","أكتوبر", "نوفمبر", "ديسمبر"],
                           datasets: [
                           {
                               label: "إيرادات الجمعية",
                               data: [650, 590, 800, 2130, 1213, 1503, 40, 2000, 1500, 265, 500, 150],
                               borderColor: "rgba(0, 150, 136, 0.8)",
                               width: "1",
                               borderWidth: "0",
                               backgroundColor: "rgba(0, 150, 136, 0.8)"
                           },
                           {
                               label: "مصروفات الأيتام",
                               data: [1280, 480, 4000, 1090, 520, 1227, 900, 4120, 2300, 5832, 1900, 860],
                               borderColor: "rgba(51, 51, 51, 0.55)",
                               width: "1",
                               borderWidth: "0",
                               backgroundColor: "rgba(51, 51, 51, 0.55)"
                           }
                           ]
                       },
                       options: {
                           scales: {
                               yAxes: [{
                                   ticks: {
                                       beginAtZero: true
                                   }
                               }]
                           }
                       }
                   });

               </script>



<!------------------------------------------------>



<script type="text/javascript">
    $("input[name=hesab_no3]").click(function(){
        if ($(this).val() == 1) {
            $('#code').removeAttr('readonly');
        }
        else {
            $('#code').attr('readonly','readonly');
        }
    });
</script>


<script type="text/javascript">
  
      $('#MyFormDalil').submit(function() {
        if ($('#code').val()) {
            var dataString = 'code=' + $('#code').val() + '&id=' + $('#id').val();
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/checkValidate',
                data:dataString,
                cache:false,
                success: function(result){
                    var obj = JSON.parse(result);
                    console.log(obj);
                    if (obj != null) {
                        alert("تم إستخدام هذا الكود من قبل");
                        return false;
                    }
                }
            });
        }
    });
</script>
<script type="text/javascript">
   /* $('#MyFormDalil').submit(function() {
        if ($('#code').val()) {
            var dataString = 'code=' + $('#code').val();
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>guide/Guide/checkValidate',
                data:dataString,
                cache:false,
                success: function(result){
                    var obj = JSON.parse(result)
                    if (obj[0] != null) {
                        alert("تم إستخدام هذا الكود من قبل");
                    }
                    else {
                        this.submit();
                    }
                }
            });
        }
        return false;
});*/
</script>







<script type="text/javascript">
   /* function addRow(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var length = x.rows.length + 1;
        var dataString ='length=' + length;
            $.ajax({
                type:'post',
                url: '<?=base_url()?>finance_accounting/vouch_qbd/Vouch_qbd/addRow',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#resultTable").append(html);
                }
            });
    }*/
    
    /*	function addRow(){
        var id = parseFloat($("#resultTable tr:last").attr('id'))+1;
        var html = `<tr id="`+id+`">\
                        <td>\
                            <input type="text" onkeypress="return validate_number(event);" class="form-control accountValue" step="any" name="value[]" data-validation="required" aria-required="true" onkeyup="getSum();">\
                        </td>\
                        <td>\
                            <input type="text" class="form-control testButton" name="account_num[]" id="account_num`+id+`" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(`+id+`); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')" onkeyup="getAccountName($(this).val(),`+id+`);">\
                        </td>\
                        <td>\
                            <input type="text" class="form-control" name="account[]" id="account`+id+`" data-validation="required" aria-required="true" readonly="" >\
                        </td>\
                        <td>\
                            <input type="text" class="form-control" name="note[]" data-validation="required" aria-required="true">\
                        </td>\
                        <td id="TD`+id+`">\
                            <a href="#" onclick="addRow(); $(this).remove(); $('#deleteRow`+id+`').show();"><i class="fa fa-plus sspan"></i></a>\
                            <a class="pull-right" id="deleteRow`+id+`" href="#" onclick="addPlusButton(`+id+`); getSum();"> <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>\
                        </td>\
                    </tr>`;
        $("#resultTable").append(html);
    }*/
    
     /*   	function addRow(){
        var id = parseFloat($("#resultTable tr:last").attr('id'))+1;
        var html = `<tr id="`+id+`">\
                        <td>\
                            <input type="text" onkeypress="return validate_number(event);" class="form-control accountValue" step="any" name="value[]" data-validation="required" aria-required="true" onkeyup="getSum();">\
                        </td>\
                        <td>\
                            <input type="text" class="form-control testButton" name="rqm_hesab[]" id="account_num`+id+`" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(`+id+`); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')" onkeyup="getAccountName($(this).val(),`+id+`);">\
                        </td>\
                        <td>\
                            <input type="text" class="form-control" name="name_hesab[]" id="account`+id+`" data-validation="required" aria-required="true" readonly="" >\
                        </td>\
                        <td>\
                            <input type="text" class="form-control" name="byan[]"  aria-required="true">\
                        </td>\
                        <td id="TD`+id+`">\
                            <a href="#" onclick="addRow(); $(this).remove(); $('#deleteRow`+id+`').show();"><i class="fa fa-plus sspan"></i></a>\
                            <a class="pull-right" id="deleteRow`+id+`" href="#" onclick="addPlusButton(`+id+`); getSum();"> <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>\
                        </td>\
                    </tr>`;
        $("#resultTable").append(html);
    }
    
    */
    
    /*
    function addPlusButton(id) {
        if (parseFloat($("#resultTable tr:last").attr('id')) == id) {
            $('#'+id).remove();
            var last = $("#resultTable tr:last").attr('id');
            $('#TD'+$("#resultTable tr:last").attr('id')).append(`<a href="#" onclick="addRow(); $(this).remove(); $('#deleteRow`+last+`').show();"><i class="fa fa-plus sspan"></i></a>`);
        }
        else {
            $('#'+id).remove();
        }
    }*/
    
    
    /*	function getSum() {
        var total = 0;
        $(".accountValue").each(function() {
            if ($(this).val()) {
                total += parseFloat($(this).val());
            }
        });
        $('.total').val(total);
        var split = total.toString().split('.');
        $('.rial').html(split[0]);
        $('.halalah').html(split[1]);
   
        var arabicNumber = '';
        for (var i = 0; i <= split.length - 1; i++) {
            var dataString ='number=' + split[i];
            $.ajax({
                type:'post',
                url: '<?=base_url()?>finance_accounting/vouch_qbd/Vouch_qbd/getValueArabic',
                data:dataString,
                cache:false,
                success: function(result){
                    arabicNumber += result;
                    if (i > 1) {
                        $("#valueArabic").val(arabicNumber+' هلله فقط لا غير');
                        $(".viewArabicValue").html(arabicNumber+' هلله فقط لا غير');
                    }
                    else {
                        $("#valueArabic").val(arabicNumber+' ريال فقط لا غير.');
                        $(".viewArabicValue").html(arabicNumber+' ريال فقط لا غير.');
                    }
                    arabicNumber += ' و';
                }
            });
        }
        
        var x = document.getElementById('resultTable');
        if(x.rows.length == 1) {
            $('#deleteRow'+$("#resultTable tr:last").attr('id')+'').css({display:'none'});
        } 
    }*/
	
     	function getSum() {
        var total = 0;
        $(".accountValue").each(function() {
            if ($(this).val()) {
                total += parseFloat($(this).val());
            }
        });
        $('.total').val(total);
        var split = total.toString().split('.');
        $('.rial').html(split[0]);
        $('.halalah').html(split[1]);
      
        var arabicNumber = '';
        for (var i = 0; i <= split.length - 1; i++) {
            var dataString ='number=' + split[i];
            $.ajax({
                type:'post',
                url: '<?=base_url()?>finance_accounting/box/vouch_qbd/Vouch_qbd/getValueArabic',
                data:dataString,
                cache:false,
                success: function(result){
                    arabicNumber += 'مبلغا وقدره : '+result;
                    if (i > 1) {
                        $("#valueArabic").val(arabicNumber+' هلله فقط لا غير');
                        $(".viewArabicValue").html(arabicNumber+' هلله فقط لا غير');
                    }
                    else {
                        $("#valueArabic").val(arabicNumber+' ريال فقط لا غير.');
                        $(".viewArabicValue").html(arabicNumber+' ريال فقط لا غير.');
                    }
                    arabicNumber += ' و ';
                }
            });
        }
        
        var x = document.getElementById('resultTable');
        if(x.rows.length == 1) {
            $('#deleteRow'+$("#resultTable tr:last").attr('id')+'').css({display:'none'});
        } 
       }
    
        function addRow() {
        var id = parseFloat($("#resultTable tr:last").attr('id')) + 1;
        var len = $('#resultTable tr').length;

        var html = `<tr id="` + id + `">\
    <td>\
        <input type="text" onkeypress="return validate_number(event);" class="form-control accountValue" step="any" id="value` + (len + 1) + `" name="value[]" data-validation="required" aria-required="true" onkeyup="getSum(); $('#view-count-value` + id + `').html($(this).val());" onfocusout="check_val_sheek(this,` + (len + 1) + `)" >\
    </td>\
    <td>\
        <input type="text" class="form-control testButton" name="rqm_hesab[]" id="account_num` + id + `" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(` + id + `); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')" onkeyup="getAccountName($(this).val(),` + id + `);">\
    </td>\
    <td>\
        <input type="text" class="form-control" name="name_hesab[]" id="account` + id + `" data-validation="required" aria-required="true" readonly="" >\
    </td>\
    <td>\
        <input type="text" class="form-control" name="byan[]" data-validation="required" aria-required="true">\
    </td>\
    <td id="TD` + id + `">\
        <a href="#" onclick="addRow(); get_select_sheeks('sheek_num[]'); $(this).remove(); $('#deleteRow` + id + `').show();"><i class="fa fa-plus sspan"></i></a>\
        <a class="pull-right" id="deleteRow` + id + `" href="#" onclick="addPlusButton(` + id + `); getSum();"> <i class="fa fa-trash" aria-hidden="true"></i>
        </a>\
    </td>\
</tr>`;
        $("#resultTable").append(html);

        var pay_method = $('#pay_method_value').val();


        if (pay_method == 2) {
            var len = $('#resultTable tr').length;
            var dataString = 'id=' + len;

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/vouch_sarf/vouch_sarf/get_pay_method_page',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#sandok_sheek_div").append(html);
                }
            });

        }

        var viewTable = `<tr id="view` + id + `">\
    <td id="view-count-num` + id + `"></td>\
    <td id="view-count-name` + id + `"></td>\
    <td id="view-count-value` + id + `"></td>\
</tr>`;
        $('#sarfViewTable').append(viewTable);
    }
/*	function addRow(){
        var id = parseFloat($("#resultTable tr:last").attr('id'))+1;
        var html = `<tr id="`+id+`">\
                        <td>\
                            <input type="text" onkeypress="return validate_number(event);" class="form-control accountValue" step="any" name="value[]" data-validation="required" aria-required="true" onkeyup="getSum(); $('#view-count-value`+id+`').html($(this).val());">\
                        </td>\
                        <td>\
                            <input type="text" class="form-control testButton" name="rqm_hesab[]" id="account_num`+id+`" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(`+id+`); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')" onkeyup="getAccountName($(this).val(),`+id+`);">\
                        </td>\
                        <td>\
                            <input type="text" class="form-control" name="name_hesab[]" id="account`+id+`" data-validation="required" aria-required="true" readonly="" >\
                        </td>\
                        <td>\
                            <input type="text" class="form-control" name="byan[]" data-validation="required" aria-required="true">\
                        </td>\
                        <td id="TD`+id+`">\
                            <a href="#" onclick="addRow(); $(this).remove(); $('#deleteRow`+id+`').show();"><i class="fa fa-plus sspan"></i></a>\
                            <a class="pull-right" id="deleteRow`+id+`" href="#" onclick="addPlusButton(`+id+`); getSum();"> <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>\
                        </td>\
                    </tr>`;
        $("#resultTable").append(html);
        
        var pay_method =$('#pay_method_value').val();



        if(pay_method ==2){

            var dataString = 'id=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/box/vouch_sarf/vouch_sarf/get_pay_method_page',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                     $("#sandok_sheek_div").append(html);
                }
            });

        }

        var viewTable = `<tr id="view`+id+`">\
                            <td id="view-count-num`+id+`"></td>\
                            <td id="view-count-name`+id+`"></td>\
                            <td id="view-count-value`+id+`"></td>\
                        </tr>`;
        $('#sarfViewTable').append(viewTable);
    }
    */
    function addPlusButton(id) {
        if (parseFloat($("#resultTable tr:last").attr('id')) == id) {
            $('#'+id).remove();
            $('#trcheque'+id).remove();
            var last = $("#resultTable tr:last").attr('id');
            $('#TD'+$("#resultTable tr:last").attr('id')).append(`<a href="#" onclick="addRow(); $(this).remove(); $('#deleteRow`+last+`').show();"><i class="fa fa-plus sspan"></i></a>`);
        }
        else {
            $('#'+id).remove();
            $('#trcheque'+id).remove();
        }
        $('#view'+id).remove();
    }
    $("input[name=pay_method_sarf]").click(function() {
    var val = $(this).val();
    if ($(this).val() == 2) {
        $('.divBank').show();
        $("#sheek_num1").attr('data-validation','required');

        $('.bank_dd').hide();

        $('.hesab_bo').show();

    }

    if ($(this).val() == 1) {
        $('.divBank').hide();

        $('.bank_dd').hide();

        $('.hesab_bo').show();

    }
    if ($(this).val() == 3) {
        $('.divBank').hide();
        $('.bank_dd').show();

        $('.hesab_bo').hide();

    }


     if($(this).val() != 3) {
         var postdata = 'hesab=' + val;
         $.ajax({
             type: 'post',
             url: '<?php echo base_url() ?>finance_accounting/box/vouch_sarf/Vouch_sarf/get_hesab_data',
             data: postdata,
             cache: false,
             success: function (json_data) {
                 if (json_data) {
                     var JSONObject = JSON.parse(json_data);
                     $('#rqm_hesab').val(JSONObject['rqm_hesab']);
                     $("#name_hesab").val(JSONObject['name_hesab']);
                 }
             }
         });
     }
});
    
    /*
    $("input[name=pay_method_sarf]").click(function() {
   
        if ($(this).val() == 2 ) {
            $('.sheek_sandoq').hide();
            $('.divBank').show();
             $('.sandoq_hesab').show();
            $('.bank').removeAttr('disabled');
            $('.bank').attr('data-validation','required');
        } else if ($(this).val() == 3 ) {
           
            $('.sheek_sandoq').show();
            $('.divBank').hide();
            $('.sandoq_hesab').hide();
            $('.bank').removeAttr('data-validation');
            $('.bank').attr('disabled','disabled'); 
            
        }
        else {
             $('.sandoq_hesab').show();
             $('.divBank').hide();
              $('.sheek_sandoq').hide();
            $('.bank').removeAttr('data-validation');
            $('.bank').attr('disabled','disabled');
        }
        $('#rqm_hesab').val($(this).attr('data-rqamHesab'));
        $('#name_hesab').val($(this).attr('data-hesabName'));
        $('.sanad-title').html('سند صرف '+$(this).attr('data-name'));
    });	
    */
/*
    $("input[name=pay_method_sarf]").click(function() {
        if ($(this).val() == 2 || $(this).val() == 3) {
            $('.divBank').show();
            $('.bank').removeAttr('disabled');
            $('.bank').attr('data-validation','required');
        }
        else {
            $('.divBank').hide();
            $('.bank').removeAttr('data-validation');
            $('.bank').attr('disabled','disabled');
        }
        $('#rqm_hesab').val($(this).attr('data-rqamHesab'));
        $('#name_hesab').val($(this).attr('data-hesabName'));
        $('.sanad-title').html('سند صرف '+$(this).attr('data-name'));
    });*/

    $('#fromVouchSarf').on('change keyup paste blur click', ':input[name=person_name]', function(e) {
        $('.data-person-name').html($('#person_name').val());
    });

    $('#fromVouchSarf').on('change keyup paste blur click', ':input[name=about]', function(e) {
        $('.Sarf-about').html($('#about').val());
    });

    $('#myModalInfo').on('hidden.bs.modal', function () {
        $('.data-person-name').html($('#person_name').val());
    });

    


   $("input[name=pay_method]").click(function() {
       var val = $(this).val();
       if ($(this).val() == 2) {
           $('.divBank').show();
           $('.bank').removeAttr('disabled');
           $('.bank').attr('data-validation','required');
           var number=document.getElementById("all_S").value;  
            
             $('#rased').val(number);
       }
       else  if ($(this).val() == 1) {
           $('.divBank').hide();
           $('.bank').removeAttr('data-validation');
           $('.bank').attr('disabled','disabled');
            var number=document.getElementById("all_N").value;  
            
             $('#rased').val(number);
          //  alert(number);


       } 


       var postdata = 'hesab='+ val ;
       $.ajax({
           type:'post',
           url: '<?php echo base_url() ?>finance_accounting/box/vouch_qbd/Vouch_qbd/get_hesab_data',
           data:postdata,
           cache:false,
           success: function(json_data){
           
               if(json_data) {

                   var JSONObject = JSON.parse(json_data);
                   $('#box_rqm_hesab_id').val(JSONObject['rqm_hesab']);
                   $("#box_name_id").val(JSONObject['name_hesab']);
                   $('#all_q').val(JSONObject['rqm_hesab']);
                   
               }
           }
       });
   });    
    
    /*  $("input[name=pay_method]").click(function() {
        if ($(this).val() == 2) {
            $('.divBank').show();
            $('.bank').removeAttr('disabled');
            $('.bank').attr('data-validation','required');
        }
        else {
            $('.divBank').hide();
            $('.bank').removeAttr('data-validation');
            $('.bank').attr('disabled','disabled');
        }
        
          var postdata = 'hesab='+ val ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>finance_accounting/box/vouch_qbd/Vouch_qbd/get_hesab_data',
            data:postdata,
            cache:false,
            success: function(json_data){
                if(json_data) {

                    var JSONObject = JSON.parse(json_data);
                    $('#box_rqm_hesab_id').val(JSONObject['rqm_hesab']);
                    $("#box_name_id").val(JSONObject['name_hesab']);
                }
            }
        });
        
        
        
        
    }); */   
/*
    $("input[name=type]").click(function() {
        if ($(this).val() == 2) {
            $('.divBank').show();
            $('.bank').removeAttr('disabled');
            $('.bank').attr('data-validation','required');
        }
        else {
            $('.divBank').hide();
            $('.bank').removeAttr('data-validation');
            $('.bank').attr('disabled','disabled');
        }
    });*/

  /*  function getSum() {
        var total = 0;
        $(".accountValue").each(function() {
            if ($(this).val()) {
                total += parseFloat($(this).val());
            }
        });
        $('.total').val(total);
    }*/
    
    /*
    	function getSum() {
        var total = 0;
        $(".accountValue").each(function() {
            if ($(this).val()) {
                total += parseFloat($(this).val());
            }
        });
        $('.total').val(total);
        var split = total.toString().split('.');
        var arabicNumber = '';
        for (var i = 0; i <= split.length - 1; i++) {
            var dataString ='number=' + split[i];
            $.ajax({
                type:'post',
                url: '<?=base_url()?>finance_accounting/vouch_qbd/Vouch_qbd/getValueArabic',
                data:dataString,
                cache:false,
                success: function(result){
                    arabicNumber += result;
                    if (i > 1) {
                        $("#valueArabic").val(arabicNumber+' هلله فقط لا غير');
                    }
                    else {
                        $("#valueArabic").val(arabicNumber+' ريال فقط لا غير.');
                    }
                    arabicNumber += ' و';
                }
            });
        }
        
         var x = document.getElementById('resultTable');
        if(x.rows.length == 1) {
            $('#deleteRow'+$("#resultTable tr:last").attr('id')+'').css({display:'none'});
        }
        
        
    }
	*/
	$("input[name=searchType]").click(function() {
        if ($(this).val() == 2) {
            $('.divDate').show();
            $('.dateSearch').removeAttr('disabled');
            $('.dateSearch').attr('data-validation','required');
        }
        else {
            $('.divDate').hide();
            $('.dateSearch').removeAttr('data-validation');
            $('.dateSearch').attr('disabled','disabled');
        }
    });
    
    
</script>


<script language=Javascript>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>



<script type="text/javascript">
    /*function getAccountName(code,id) {
        var dataString ='code=' + code;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>finance_accounting/vouch_qbd/Vouch_qbd/getAccountName',
            data:dataString,
            cache:false,
            success: function(result){
                $('#account'+id).val(result);
            }
        });
    }*/
    	function getAccountName(code,id) {
        var dataString ='code=' + code;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>finance_accounting/box/vouch_qbd/Vouch_qbd/getAccountName',
            data:dataString,
            cache:false,
            success: function(result){
                $('#account'+id).val(result);
            }
        });
    }
    
</script>
<!------------------------------------------------------>
<!--
<script >
    $(function() {
        $('.print-link').on('click', function() {
            //Print ele4 with custom options
            $("#cheque").print({
                //Use Global styles
                globalStyles : true,
                //Add link with attrbute media=print
                mediaPrint : true,
                //Custom stylesheet
                stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                //Print in a hidden iframe
                iframe : true,
                //Don't print this
                noPrintSelector : ".avoid-this"
            });
        });
    });
</script>
-->
<script type="text/javascript">
  /*  function chooseBank(sel)
    {
        if (sel.value==1) {
            $("#chick-width").val(16);
            $("#chick-height").val(9);
            setWidHigh();
        }
        else if (sel.value==2){
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        }
        else if (sel.value==3){
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        }

    }
*/

function chooseBank(sel)
    {
        if (sel.value==1) {
            $("#chick-width").val(16);
            $("#chick-height").val(9);
            setWidHigh();
        }
        else if (sel.value==10){
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        }
        else if (sel.value==19){
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        }

    }
	
    function setWidHigh() {
        var chickwidth =$("#chick-width").val();
        var chickheight =$("#chick-height").val();

        $("#cheque").css("width",chickwidth+"cm");
        $("#cheque").css("height",chickheight+"cm");

        if (chickwidth<=20) {
            $(".elbelad").css("width",chickwidth+"cm"); 
        }
        else{
            $(".elbelad").css("width",20.4+"cm");
        }
    }

    function changeWidth(value) {
        $("#cheque").css("width",value+"cm");

        if (value<=20) {
            $(".elbelad").css("width",value+"cm");  
        }
    }

    function changeHeight(value) {
        $("#cheque").css("height",value+"cm");
    }
</script>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#cheque").css('background','url('+e.target.result+')');
                $("#cheque").attr("data-src",e.target.result)
                imgData = e.target.result;
                localStorage.setItem("imgData", imgData);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileupload").change(function(){
        readURL(this);
    });
</script>

<?php if (isset($recordSheek) && $recordSheek != null) { ?>       
    <script type="text/javascript">
        $("#cheque").css('background','url(<?=base_url()."uploads/images/sheek/".$recordSheek["img"]?>)');
    </script>
<?php 
}
else {
?>
<script type="text/javascript">
    function checkEdits(){
        var dataImage = localStorage.getItem('imgData');
        $("#cheque").css('background','url('+dataImage+')');
        $('#img').val(dataImage);
    }
</script>
<?php } ?>


	
	
	<script type="text/javascript">
    $(".fzincrease").click(function() {
        var fontSize = parseInt($(".line").css("font-size"));
        fontSize = fontSize + 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.line').css({'font-size':fontSize});
    });
    $(".fzdecrease").click(function() {
        var fontSize = parseInt($(".line").css("font-size"));
        fontSize = fontSize - 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.line').css({'font-size':fontSize});
    });
    $(".fzbold").click(function() {
        $('.line').toggleClass("boldWeight");
        if ($('#bold').val() == 0) {
            $('#bold').val(1);
        }
        else {
            $('#bold').val(0);
        }
    });
</script>

<?php if (isset($recordSheek) && $recordSheek != null && $recordSheek['bold'] == 1) { ?>
    <script type="text/javascript">
        $(".fzbold").trigger("click");
        $('#bold').val(<?=$recordSheek['bold']?>);
    </script>
<?php } ?>

<?php if (isset($recordSheek) && $recordSheek != null) { ?>
    <script type="text/javascript">
        $('.line').css({'font-size':`<?=$recordSheek['font']?>`});
        $('.line').css({'color':`#<?=$recordSheek['color']?>`});
    </script>
<?php } ?>

<script type="text/javascript">
    $('#checkbox-Kaab').on('click',function(){
        if(this.checked){
            $('.cc').each(function(){
                this.checked = true;
            });
            $('#type').val(1);
        }else{
            $('.cc').each(function(){
                this.checked = false;
            });
            $('#type').val(2);
        }
    });
    $('.cc').on('click',function(){
        if($('.cc:checked').length == $('.cc').length){
            $('#checkbox-Kaab').prop('checked',true);
        }else{
            $('#checkbox-Kaab').prop('checked',false);
        }
        if ($('.cc:checked').length) {
            $('#type').val(1);
        }
        else {
            $('#type').val(2);
        }
    });
</script>


<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyC4l5QxL27z4w0uuD_5X3g0IRhaUdvb0Q4&?sensor=false&libraries=places'></script>
<script src="<?= base_url() . 'asisst/web_asset/' ?>js/locationpicker.jquery.js"></script>
<script>
    $('#us3').locationpicker({
        mapTypeId: google.maps.MapTypeId.HYBRID,
        location: {
            latitude: 26.37506589156855,
            longitude: 43.97146415710449
        },
        
        radius: 300,
        zoom: 12,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
</script>


   <script>
        function del(valu)
        {
           $('.tr'+valu).remove();
//alert(valu);
        }

    </script>


<script>


    $('.scrollingtable').DataTable({
        dom: 'Bfrtip',
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
                orientation: 'landscape',
                customize: function (win) {
                    $(win.document.body).append("<style> body{  background-color: #fff;} @page{size:landscape}</style>")
                    $(win.document.body)
                        .css('font-size', '14pt')
                        .prepend(
                            '<img src="<?php echo base_url();  ?>/asisst/admin_asset/img/pills/back2.png" style="position:absolute; top:0; left:0;    width: 500px;" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');
                    $(win.document.body).find('thead th:nth-child(1)').css("width", "50px");
                    $(win.document.body).find('thead th:nth-child(6)').css("width", "200px");
                },
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                },
                autoPrint: false,

            },
            'colvis'
        ],
        scrollY: '50vh',
        scrollCollapse: true,
        paging: false,
        info: false,
        colReorder: true
    });


</script>
<script language="javascript">
    function autoResizeDiv()
    {
        var bodyheight = window.innerHeight;
        var header_height = $(".main-header").height();
        var footer_height = $(".main-footer").height();
        var neg = header_height + footer_height + 10;
        
       // alert(neg);
        var fixed_height = bodyheight - neg ;
      //  alert(fixed_height);
      //  $('.content-wrapper').style.height = window.innerHeight +'px';
     // $('.content-wrapper').style.height = bodyheight +'px';
      $(".content-wrapper").css('min-height', fixed_height);
    }
    function autoResizeDivMobile()
    {
        $('.content-wrapper').style.height ='auto';
    }
   
    
    
    
    
     var mq = window.matchMedia( "(min-width: 767px)" );
    
    if(mq.matches) {
        // the width of browser is more then 767px
        
      window.onresize = autoResizeDiv;
      autoResizeDiv();
    } else {
        // the width of browser is less then 767px
        
      window.onresize = autoResizeDivMobile;
      autoResizeDivMobile();
      }
</script>
<script type="text/javascript">
	function requestFullScreen() {

  var el = document.body;

  // Supports most browsers and their versions.
  var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen 
  || el.mozRequestFullScreen || el.msRequestFullScreen;

  if (requestMethod) {

    // Native full screen.
    requestMethod.call(el);

  } else if (typeof window.ActiveXObject !== "undefined") {

    // Older IE.
    var wscript = new ActiveXObject("WScript.Shell");

    if (wscript !== null) {
      wscript.SendKeys("{F11}");
    }
  }
}
</script>
</body>

</html>