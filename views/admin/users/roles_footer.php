
</div><!--row-->
</div><!--content-->


</div><!--content-wrapper-->

<footer class="main-footer col-xs-12">
    <strong> جميع الحقوق &copy; محفوظة لدى شركة <a href="#">الأثير تك لتكنولوجيا المعلومات © <?php echo date("Y",time())?></a>.</strong>
</footer>

</div><!--wrapper-->



<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>


<script>
    $(function() {

        $('input[type="checkbox"]').change(checkboxChanged);

        function checkboxChanged() {
            var $this = $(this),
                checked = $this.prop("checked"),
                container = $this.parent(),
                siblings = container.siblings();

            container.find('input[type="checkbox"]')
                .prop({
                    indeterminate: false,
                    checked: checked
                })
                .siblings('label')
                .removeClass('custom-checked custom-unchecked custom-indeterminate')
                .addClass(checked ? 'custom-checked' : 'custom-unchecked');

            checkSiblings(container, checked);
        }

        function checkSiblings($el, checked) {
            var parent = $el.parent().parent(),
                all = true,
                indeterminate = false;

            $el.siblings().each(function() {
                return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
            });

            if (all && checked) {
                parent.children('input[type="checkbox"]')
                    .prop({
                        indeterminate: false,
                        checked: checked
                    })
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass(checked ? 'custom-checked' : 'custom-unchecked');

                checkSiblings(parent, checked);
            } else if (all && !checked) {
                indeterminate = parent.find('input[type="checkbox"]:checked').length > 0;

                parent.children('input[type="checkbox"]')
                    .prop("checked", checked)
                    .prop("indeterminate", indeterminate)
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass(indeterminate ? 'custom-indeterminate' : (checked ? 'custom-checked' : 'custom-unchecked'));

                checkSiblings(parent, checked);
            } else {
                $el.parents("li").children('input[type="checkbox"]')
                    .prop({
                        indeterminate:false ,
                        checked: true
                    })
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass('custom-indeterminate');
            }
        }
    });

</script>



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


        $('#datetimepicker1').datetimepicker();
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
    window.onresize = autoResizeDiv;
    autoResizeDiv();
</script>



</body>

</html>