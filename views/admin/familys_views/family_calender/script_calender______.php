<script type="text/javascript">
    jQuery(function($) {
        $('#external-events div.external-event').each(function() {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
        /* initialize the calendar */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
            //isRTL: true,
            //firstDay: 1,// >> change first day of week
            buttonHtml: {
                prev: '<i class="ace-icon fa fa-chevron-left"></i>',
                next: '<i class="ace-icon fa fa-chevron-right"></i>'
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            eventSources: [
                {
                    events:  function(start, end, timezone, callback) {
                        $.ajax({
                            type: 'post',
                            url: '<?=base_url()?>family_controllers/FamilyCalender/get_events/<?=$this->uri->segment(4)?>',
                            dataType: 'json',
                            data: {
                                // our hypothetical feed requires UNIX timestamps
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
            eventDrop: function(event, delta){
                $.ajax({
                    url: '<?=base_url()?>family_controllers/FamilyCalender/update_events',
                    data: 'start='+(event.start).format()+'&end='+(event.end).format()+'&id='+event.id,
                    type: "POST",
                    success: function(json) {
                        $('#'+event.id).remove();
                        record = JSON.parse(json);
                        render = record.events[0];
                        $('.dataTables_empty').remove();
                        var num = render.order_num;
                        if(render.file_num != 0) {
                            num = render.file_num;
                        }
                        var status = ['لم تبدأ','لم تتم','تم تغيير الموعد','إنتهت'];
                        var span = ['danger','warning','info','success'];
                        $('#examplee tr:last').after('<tr id="'+render.id+'">\
                            <td>'+render.count+'</td>\
                            <td>'+num+'</td>\
                            <td>'+render.father_name+'</td>\
                            <td>'+render.start+'</td>\
                            <td>'+render.title+'</td>\
                            <td><span class="label label-sm label-'+span[render.visit_status]+'">'+status[render.visit_status]+'</span></td>\
                            </tr>');
                    }
                });
            },
            eventResize: function(event, delta, revertFunc) {
                $.ajax({
                    url: '<?=base_url()?>family_controllers/FamilyCalender/update_events',
                    data: 'start='+(event.start).format()+'&end='+(event.end).format()+'&id='+event.id,
                    type: "POST",
                    success: function(json) {
                    }
                });
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                bootbox.confirm("<form id='infos' method='post' action='<?=base_url()?>family_controllers/FamilyCalender/add_events'>\
                    <div class='row'>\
                        <div class='form-group col-sm-6'>\
                            <label class='label label-green half'>نوع البحث  <strong class='astric'>*</strong> </label>\
                            <select id='visit_search_type' name='visit_search_type' class='form-control confirmForm half input-style' data-validation='required'>\
                                <option value=''>إختر</option>\
                                <?php
                                if(isset($types) && $types != null) {
                                    foreach($types as $type) { ?>
                                    <option value='<?=$type->id_setting?>'><?=$type->title_setting?></option>\
                                <?php }
                                }
                                ?>
                            </select>\
                        </div>\
                        <div class='form-group col-sm-6'>\
                            <label class='label label-green half'>الغرض من الزيارة  <strong class='astric'>*</strong> </label>\
                            <select id='visit_purpose_fk' name='visit_purpose_fk' class='form-control confirmForm half input-style' data-validation='required'>\
                                <option value=''>إختر</option>\
                                <?php
                                if(isset($purpose) && $purpose != null) {
                                    foreach($purpose as $type) { ?>
                                    <option value='<?=$type->id_setting?>'><?=$type->title_setting?></option>\
                                <?php }
                                }
                                ?>
                            </select>\
                        </div>\
                        <div class='form-group col-sm-6'>\
                            <label class='label label-green half'>الباحث<strong class='astric'>*</strong> </label>\
                            <select name='researcher_id_fk' id='researcher_id_fk' class='form-control confirmForm half input-style' data-validation='required'>\
                                <option value=''>إختر</option>\
                                <?php
                                if(isset($emps) && $emps != null) {
                                    foreach($emps as $emp) { 
                                        $select = '';
                                        if($selectedEmp == $emp->id) {
                                            $select = 'selected';
                                        }
                                ?>
                                    <option value='<?=$emp->id?>' <?=$select?>><?=$emp->employee?></option>\
                                <?php }
                                }
                                ?>
                            </select>\
                        </div>\
                        <div class='form-group col-sm-12'>\
                            <label class='label label-green half' style='width: 23.5% !important;'>ملاحظات<strong class='astric'>*</strong> </label>\
                            <input id='manager_notes' name='manager_notes' type='text' style='width: 76.5% !important;' class='form-control confirmForm half input-style' data-validation='required'>\
                        </div>\
                    </div>\
                    <input type='hidden' name='start_time' value='"+start.format()+"' >\
                    <input type='hidden' name='end_time' value='"+end.format()+"' >\
                    <input type='hidden' id='mother_national_num_fk' name='mother_national_num_fk' value='<?=$this->uri->segment(4)?>' >\
                    </form>", function(result) {
                        if(result){   
                            var require = false;
                            $(".confirmForm").each(function(){
                                if(!$(this).val()){
                                    require = true;
                                }
                            });
                            if(require == true){
                                alert('توجد بعض الحقول يجب ملئها .. لم يتم الحفظ !!');
                            }
                            else {         
                                $.ajax({
                                    url: '<?=base_url()?>family_controllers/FamilyCalender/add_events',
                                    data: 'start_time='+start.format()+'&end_time='+end.format()+'&mother_national_num_fk='+$('#mother_national_num_fk').val()+'&manager_notes='+$('#manager_notes').val()+'&researcher_id_fk='+$('#researcher_id_fk').val()+'&visit_purpose_fk='+$('#visit_purpose_fk').val()+'&visit_search_type='+$('#visit_search_type').val(),
                                    type: "POST",
                                    success: function(json) {
                                        record = JSON.parse(json);
                                        render = record.events[0];
                                        $('.dataTables_empty').remove();
                                        var num = render.order_num;
                                        if(render.file_num != 0) {
                                            num = render.file_num;
                                        }
                                        var status = ['لم تبدأ','لم تتم','تم تغيير الموعد','إنتهت'];
                                        var span = ['danger','warning','info','success'];
                                        $('#examplee tr:last').after('<tr id="'+render.id+'">\
                                            <td>'+render.count+'</td>\
                                            <td>'+num+'</td>\
                                            <td>'+render.father_name+'</td>\
                                            <td>'+render.start+'</td>\
                                            <td>'+render.title+'</td>\
                                            <td><span class="label label-sm label-'+span[render.visit_status]+'">'+status[render.visit_status]+'</span></td>\
                                            </tr>');
                                        console.log(render);
                                        calendar.fullCalendar('renderEvent',
                                            {
                                                id : render.id,
                                                title: render.title,
                                                start: render.start,
                                                end: render.end,
                                                notes : render.notes,
                                                researcher_id_fk : render.researcher_id_fk,
                                                visit_search_type : render.visit_search_type,
                                                visit_purpose_fk : render.visit_purpose_fk,
                                                allDay: allDay,
                                                className: render.className
                                            },
                                            //true // make the event "stick"
                                        );
                                    }
                                });
                            }
                        }
                });
              //  calendar.fullCalendar('unselect');
            }
            ,
            eventClick: function(calEvent, jsEvent, view) {
                //display a modal
                var modal =
"<div class='modal fade'>\
    <div class='modal-dialog'>\
        <div class='modal-content'>\
            <div class='modal-header'><button type='button' class='bootbox-close-button close' data-dismiss='modal' aria-hidden='true'>×</button><h4 class='modal-title'>تفاصيل الزيارة:</h4>\
            </div>\
            <form id='' method='post'>\
                <div class='modal-body row'>\
                    <div class='col-sm-12 '><br>\
                        <div class='form-group col-sm-6'>\
                            <label class='label label-green half'>نوع البحث  <strong class='astric'>*</strong> </label>\
                            <select id='type' name='visit_search_type' class='form-control confirmForm"+calEvent._id+" half input-style' data-validation='required'>\
                                <option value=''>إختر</option>\
                                <?php
                                if(isset($types) && $types != null) {
                                    foreach($types as $type) { 
                                ?>
                                    <option value='<?=$type->id_setting?>'><?=$type->title_setting?></option>\
                                <?php }
                                }
                                ?>
                            </select>\
                        </div>\
                        <div class='form-group col-sm-6'>\
                            <label class='label label-green half'>الغرض من الزيارة  <strong class='astric'>*</strong> </label>\
                            <select id='purpose' name='visit_purpose_fk' class='form-control confirmForm"+calEvent._id+" half input-style' data-validation='required'>\
                                <option value=''>إختر</option>\
                                <?php
                                if(isset($purpose) && $purpose != null) {
                                    foreach($purpose as $type) { ?>
                                    <option value='<?=$type->id_setting?>'><?=$type->title_setting?></option>\
                                <?php }
                                }
                                ?>
                            </select>\
                        </div>\
                        <div class='form-group col-sm-6'>\
                            <label class='label label-green half'>الباحث<strong class='astric'>*</strong> </label>\
                            <select name='researcher_id_fk' id='researcher' class='form-control confirmForm"+calEvent._id+" half input-style' data-validation='required'>\
                                <option value=''>إختر</option>\
                                <?php
                                if(isset($emps) && $emps != null) {
                                    foreach($emps as $emp) { 
                                        $select = '';
                                        if($selectedEmp == $emp->id) {
                                            $select = 'selected';
                                        }
                                ?>
                                    <option value='<?=$emp->id?>' <?=$select?>><?=$emp->employee?></option>\
                                <?php }
                                }
                                ?>
                            </select>\
                        </div>\
                        <div class='form-group col-sm-12'>\
                            <label class='label label-green half' style='width: 23.5% !important;'>ملاحظات<strong class='astric'>*</strong> </label>\
                            <input id='notes' name='manager_notes' type='text' style='width: 76.5% !important;' class='form-control confirmForm"+calEvent._id+" half input-style' data-validation='required'>\
                        </div>\
                    </div>\
                </div>\
				<div class='modal-footer'>\
                    <button type='submit' value='a' class='btn btn-sm btn-success'><i class='ace-icon fa fa-check'></i> حفظ التعديل</button>\
					<button type='button' value='a' class='btn btn-sm btn-danger' data-action='delete'><i class='ace-icon fa fa-trash-o'></i> حذف الحدث</button>\
					<button type='button' value='a' class='btn btn-sm' data-dismiss='modal'><i class='ace-icon fa fa-times'></i> إلغاء</button>\
				</div>\
            </form>\
        </div>\
    </div>\
</div>";
                var modal = $(modal).appendTo('body');
                modal.find('#type').val(calEvent.visit_search_type);
                modal.find('#researcher').val(calEvent.researcher_id_fk);
                modal.find('#purpose').val(calEvent.visit_purpose_fk);
                modal.find('#notes').val(calEvent.notes);
                modal.find('form').on('submit', function(ev){
                    ev.preventDefault();
                    var require = false;
                    $(".confirmForm"+calEvent._id).each(function(){
                        if(!$(this).val()){
                            require = true;
                        }
                    });
                    if(require == true){
                        alert('توجد بعض الحقول يجب ملئها .. لم يتم الحفظ !!');
                    }
                    else {
                        calEvent.visit_search_type = $(this).find("#type").val();
                        calEvent.researcher_id_fk = $(this).find("#researcher").val();
                        calEvent.visit_purpose_fk = $(this).find("#purpose").val();
                        calEvent.notes = $(this).find("#notes").val();
                        calendar.fullCalendar('updateEvent', calEvent);
                        modal.modal("hide");
                        $.ajax({
                            url: '<?=base_url()?>family_controllers/FamilyCalender/updateTitle',
                            data: 'manager_notes='+calEvent.notes + '&id=' + calEvent._id + '&visit_search_type=' + calEvent.visit_search_type + '&visit_purpose_fk=' + calEvent.visit_purpose_fk + '&researcher_id_fk=' + calEvent.researcher_id_fk,
                            type: "POST",
                            success: function(json) {
                            }
                        });
                    }
                });
                modal.find('button[data-action=delete]').on('click', function() {
                    $.ajax({
                        url: '<?=base_url()?>family_controllers/FamilyCalender/delete_events',
                        data: 'id=' + calEvent._id,
                        type: "POST",
                        success: function(json) {
                            $('#'+calEvent._id).remove();
                        }
                    });
                    calendar.fullCalendar('removeEvents' , function(ev){
                        return (ev._id == calEvent._id);
                    })
                    modal.modal("hide");
                });
                modal.modal('show').on('hidden', function(){
                    modal.remove();
                });
            }
        });
    })
</script>