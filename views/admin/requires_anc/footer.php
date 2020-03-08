   
</div><!--row-->
</div><!--content-->


</div><!--content-wrapper-->

<footer class="main-footer col-xs-12">
  <strong> جميع الحقوق &copy; محفوظة لدى شركة <a href="#">الأثير تك لتكنولوجيا المعلومات © <?php echo date("Y",time())?></a>.</strong> 
</footer>

</div><!--wrapper-->



<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-ui.min.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-select.min.js"></script>

<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/datepicker.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/owl.carousel.min.js"></script>

<!-- lobipanel-->
<script src="<?php echo base_url()?>asisst/admin_asset/js/lobipanel.min.js" type="text/javascript"></script>

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
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/tables/plugin.js"></script>


<!-- Change themes-->
<script src="<?php echo base_url()?>asisst/admin_asset/js/themeschange.js"></script>

<!-------------------------------------------------------------------------------------------->

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
<script src="<?php echo base_url()?>asisst/admin_asset/ckeditor/js/sample.js"></script>
<script>
    initSample();
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
<script >

  function autoResizeDiv()
  {
      //document.getElementById('content').style.height = window.innerHeight +'px';
      var heightOfContent = window.innerHeight-76 ;

      var heightOfContentHeader = $(".content-header").height();
      var divHeightFooter = $(".main-footer").height();
      var divHeightHeader = $(".main-header").height();




      var newheight=heightOfContent - heightOfContentHeader - divHeightFooter - divHeightHeader  +'px';

      $('.content').css("height", newheight);

  }
  function autoResizeDivMobile()
  {
      //document.getElementById('content').style.height = window.innerHeight +'px';
      var heightOfContent = window.innerHeight ;
      $('.content').css("height", "auto");

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

<script language=Javascript>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>
<script language="javascript" type="text/javascript"> function moveOnMax(field, nextFieldID) { if (field.value.length >= field.maxLength) { nextFieldID.focus(); } } </script>


<!------------------------------------------------>
<!-- ChartJs JavaScript -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/chartJs/Chart.min.js" type="text/javascript"></script>

<!-- Counter js -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/counterup/waypoints.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/counterup/jquery.counterup.min.js" type="text/javascript"></script>

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


</body>

</html>