<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: new Date(),
                defaultView: 'month',
                editable: true,
                //  events:'data.php',
                selectable:true,
                selectHelper:true,

                selectable: true,
                selectHelper: true,

                eventSources: [
                    {
                        events:  function(start, end, timezone, callback) {

                            $.ajax({
                                type: 'post',
                                url: '<?=base_url()?>all_secretary/archive/notes/Notes/get_events',
                                dataType: 'json',
                                data: {
                                    start: start.unix(),
                                    end: end.unix()

                                },
                                success: function(msg) {
                                    var events = msg.events;
                                    callback(events);

                                }
                            });
                        },
                    },
                ]
                ,
                eventRender: function(event, element) {
                    
                  
        

                    var type_n= '';

                    var num = event.type;
                    if(event.type == 1) {
                        type_n = 'ملاحظة';
                    } else if(event.type == 2){
                        type_n = 'موعد';
                    }
                    else if(event.type == 3){
                        type_n = 'حدث';
                    }
                    else if(event.type == 4){
                        type_n = 'مهمة';
                    }

                    element.find('.fc-title').append(type_n);
                    
                    
                      element.popover({
                        title: type_n,
                        content: " النوع: " + type_n + "\n" + " القسم : " + event.qsm +  "\n" + " التصنيف : " + event.tasnef + "\n" + "التفاصيل : " + event.details,
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body'
                    });
                    
                    
                  
                    element.find('.fc-title').addClass(event.className );
                    element.find('.fc-title').addClass(event.className );
                },
                // eventClick: function(event, element) {
                //
                //     event.qsm = "qsm";
                //
                //     $('#calendar').fullCalendar('updateEvent', event);
                //
                // },
                eventClick:function(event, element)
                {
                   // var start = moment(start).format('YYYY-MM-DD HH:mm:ss');
                   // var end = moment(end).format('YYYY-MM-DD HH:mm:ss');
                   // sessionStorage.setItem('start_date', start);
                  //  sessionStorage.setItem('end_date', end);
                    $('#qsm').val(event.qsm);
                    $('#date').val(event.date);
                  //  $('#type').val(event.type);
                    $('#tasnef').val(event.tasnef);
                    $('#details').val(event.details);
                    $('#row_id').val(event.id);
                    if(event.type == 1) {
                        $("input[name='type']")[0].checked = true;
                    } else if(event.type == 2){
                        $("input[name='type']")[1].checked = true;
                    }
                    else if(event.type == 3){
                        $("input[name='type']")[2].checked = true;
                    }
                    else if(event.type == 4){
                        $("input[name='type']")[3].checked = true;
                    }
                    $('#btnsave').html(' <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>'+'تعديل');
                    $('#btnsave').removeClass('btn-success');
                    $('#btnsave').addClass('btn-warning');

                    $('#btn_delete').show();
                    $('#btn_delete').click(function () {
                        var id = $('#row_id').val();
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url()?>all_secretary/archive/notes/Notes/delete_event',
                            data: {id:id},
                            dataType: 'html',
                            cache: false,
                            success: function (html) {
                                $('#calendar').fullCalendar('refetchEvents');
                              //  alert(html);
                                swal({
                                    title: " تم الحذف بنجاح",
                                    confirmButtonText: "تم"
                                });




                            }
                        });
                    });
                    //$('#myModal').on('hidden', function (e) {
                    //    // do something...
                    //    $('#row_id').val('');
                    //    $('#qsm').val('');
                    //    // $('#date').val(<?//= date('Y-m-d')?>//);
                    //    $('#date').val('<?//= date('Y-m-d')?>//');
                    //    $('#tasnef').val('');
                    //    $('#details').val('');
                    //    $("input:radio").attr("checked", false);
                    //    $('#btn_delete').hide();
                    //    $('#btnsave').html(' <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>'+'حفظ');
                    //    $('#btnsave').removeClass('btn-warning');
                    //    $('#btnsave').addClass('btn-success');
                    //});

                    $('.btnn_close').click(function () {
                        $('#row_id').val('');
                        $('#qsm').val('');
                       // $('#date').val(<?= date('Y-m-d')?>);
                        $('#date').val('<?= date('Y-m-d')?>');
                        $('#tasnef').val('');
                        $('#details').val('');
                        $("input:radio").attr("checked", false);
                        $('#btn_delete').hide();
                        $('#btnsave').html(' <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>'+'حفظ');
                        $('#btnsave').removeClass('btn-warning');
                        $('#btnsave').addClass('btn-success');
                    });

                    // $('#btnsave').removeClass('btn-success');
                    // $('#btnsave').addClass('btn-warning');



                    // var type;
                    // $(':radio[name="type"]').change(function() {
                    //     type= event.type;
                    // });
                    // $("input[name='type']").val(type);


                   // var type = $("input[name='type']:checked").val();
                    $("#btnModal").trigger("click");
                },
                eventResize:function(event)
                {
                   // var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                   // var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var id =  $('#row_id').val();
                    var type =   $("input[name='type']").val();
                    var date =  $('#date').val();
                    var qsm =  $('#qsm').val();
                    var tasnef =  $('#tasnef').val();
                    var details =  $('#details').val();
                   // var date = event.date;
                   // var qsm = event.qsm;
                   // var tasnef = event.tasnef;
                  //  var details = event.details;
                   // var id = event.id;
                   // $("#btnsave").click(function(){
                    //$('#calendar').fullCalendar('updateEvent', event);
                        $.ajax({

                            url:" <?php echo base_url();?>all_secretary/archive/notes/Notes/update_events",
                            type:"POST",
                            data:{type:type,id:id,date:date,qsm:qsm,tasnef:tasnef,details:details},
                            success:function(){
                                calendar.fullCalendar('refetchEvents');
                              //  alert('Event Update');
                            }
                        })
                  //  },

                },

                eventDrop:function(event)
                {
                   // var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                   // var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                   //  var type = event.type;
                   //  var date = event.date;
                   //  var qsm = event.qsm;
                   //  var tasnef = event.tasnef;
                   //  var details = event.details;
                   //  var id = event.id;
                    var id =  $('#row_id').val();
                    var type =  $('#type').val();
                    var date =  $('#date').val();
                    var qsm =  $('#qsm').val();
                    var tasnef =  $('#tasnef').val();
                    var details =  $('#details').val();

                    $.ajax({
                        url:" <?php echo base_url();?>all_secretary/archive/notes/Notes/update_events",
                        type:"POST",
                        data:{type:type,id:id,date:date,qsm:qsm,tasnef:tasnef,details:details},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                        }
                    });
                },




                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(date) { // this function is called when something is dropped
                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    var $extraEventClass = $(this).attr('data-class');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = false;
                    if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                }
                ,

                select: function(start, end, allDay)
                {
                    var start = moment(start).format('YYYY-MM-DD HH:mm:ss');
                    var end = moment(end).format('YYYY-MM-DD HH:mm:ss');
                    sessionStorage.setItem('start_date', start);
                    sessionStorage.setItem('end_date', end);
                    $("#btnModal").trigger("click");
                },

            });
            $("#btnsave").click(function(){
                var type = $("input[name='type']:checked").val();
                var date = $('#date').val();
                var qsm = $('#qsm').val();
                var tasnef = $('#tasnef').val();
                var details = $('#details').val();
                var id = $('#row_id').val();
                if(type && qsm && tasnef)
                {
                    $.ajax({
                        url:"<?php echo base_url();?>all_secretary/archive/notes/Notes/insert_notes",
                        type:"POST",
                        data:{id:id,type:type,date:date,qsm:qsm,tasnef:tasnef,details:details,start:sessionStorage.getItem('start_date'),end:sessionStorage.getItem('end_date')},
                        success:function(data)
                        {
                            $('#myModal').modal('hide');
                            $('#date').val('<?= date('Y-m-d')?>');
                            $('#qsm').val('');
                            $('#tasnef').val('');
                            $('#details').val('');
                            $("input:radio").attr("checked", false);
                            sessionStorage.setItem('start_date', "");
                            sessionStorage.setItem('end_date', "");
                            // window.location.reload();\
                            $('#calendar').fullCalendar('refetchEvents');

                            if (id!=''){
                                swal({
                                    title: " تم التعديل بنجاح",
                                    confirmButtonText: "تم"
                                });
                            } else{
                                swal({
                                    title: " تم الاضافة بنجاح",
                                    confirmButtonText: "تم"
                                });
                            }


                        }
                    })
                } else{
                    swal({
                        title: "من فضلك ادخل الحقول الناقصه ! ",
                        type: "warning",
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "تم"
                    });
                }
            });


        });
    </script>
</head>
<body>
<div class="container">
    <div id='calendar'></div>
    <button style="display: none" type="button" id="btnModal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="width: 80%" >
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btnn_close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة حدث او ملاحظه</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group col-md-4 col-sm-2 col-xs-12 padding-4">
                                <input type="hidden" id="row_id" value="">
                                <label class="label">   النوع  </label>

                                <div class="radio-content">
                                    <input type="radio"    id="type_sarf1" name="type"  class="sarf_types" value="1">
                                    <label for="type_sarf1"  class="radio-label  " style="color: #ffc751;">ملاحظة </label>
                                </div>

                                <div class="radio-content">
                                    <input type="radio"  id="type_sarf2" name="type"   class="sarf_types" value="2">
                                    <label for="type_sarf2" class="radio-label" style="color: #50ab20;">موعد </label>
                                </div>

                                <div class="radio-content">
                                    <input type="radio"   id="type_sarf3" name="type" class="sarf_types" value="3">
                                    <label for="type_sarf3" class="radio-label" style="color: #E5343D;">  حدث</label>
                                </div>

                                <div class="radio-content">
                                    <input type="radio"   id="type_sarf4" name="type"  class="sarf_types" value="4">
                                    <label for="type_sarf4" class="radio-label" style="color: #3a87ad">مهمة</label>

                                </div>

                            </div>
                            <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                                <label class="label">   التاريخ  </label>
                                <input type="date"   id="date" name="date" value="<?= date('Y-m-d')?>" class="form-control">

                            </div>
                            <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                <label class="label">   القسم  </label>
                                <input type="text"  id="qsm" name="qsm" value="" class="form-control">

                            </div>
                            <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                <label class="label">   التصنيف  </label>
                                <input type="text"  id="tasnef" name="tasnef" value="" class="form-control">

                            </div>
                            <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                                <label class="label">   التفاصيل  </label>
                                <textarea name="details" class="form-control" id="details"></textarea>


                            </div>
                            <div class="  text-center col-md-3">

                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%;">
                    <button type="button" id="btnsave"   class="btn btn-labeled btn-success "  style="float: right;"  >
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                    <button type="button" id="btn_delete" style="display: none;float: right;" class="btn btn-labeled btn-danger " data-dismiss="modal" >
                        <span class="btn-label"><i class="fa fa-trash"></i></span>حذف
                    </button>
                    <button type="button" id="btn_close" class="btn btnn_close btn-labeled btn-danger " data-dismiss="modal">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    // function f() {
    //
    // }
</script>
</html>