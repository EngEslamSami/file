<!-- bootstrap-year-calendar  -->
<link rel="stylesheet"
      href="<?php echo base_url() ?>asisst/admin_asset/bootstrap-year-calendar/css/bootstrap-year-calendar.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
<style>

    /*.calendar-context-menu {*/
        /*z-index: 9999;*/
        /*direction: ltr;*/
    /*}*/

    .content {
        width: -webkit-fill-available;


    }
    .type_class{
        float: left;
        width: 40%;
    }

</style>

<!-- Modal -->
<button style="display: none" type="button" id="btnModal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#detailsModal">Open Modal</button>

<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->




<!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/admin_asset/js/jquery-1.10.1.min.js"></script>-->
<!--<script src="--><?php //echo base_url() ?><!--asisst/admin_asset/js/jquery-ui.js" type="text/javascript"></script>-->
<!-- bootstrap-year-calendar  -->


<script type="text/javascript"
        src="<?php echo base_url() ?>asisst/admin_asset/bootstrap-year-calendar/js/bootstrap-year-calendar.min.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script>

    function showDetails(event) {
       $("#btnModal").trigger("click");

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/notes/Notes/load_details",
            data: {row_id:event.id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }


    function update_event(event) {

        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/notes/Notes/get_event_by_id",
            type: "Post",
            dataType: "html",
            data: {id:event.id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title);
                $('#qsm').val(obj.qsm);
                $('#tasnef').val(obj.tasnef);
                $('#details').val(obj.details);
                $('#date').val(obj.date);
                $('#row_id').val(obj.id);
                if(obj.type == 1) {
                    $("input[name='type']")[0].checked = true;
                } else if(obj.type == 2){
                    $("input[name='type']")[1].checked = true;
                }
                else if(obj.type == 3){
                    $("input[name='type']")[2].checked = true;
                }
                else if(obj.type == 4){
                    $("input[name='type']")[3].checked = true;
                }


            }

        });
    }

    function deleteEvent(event) {
       
        swal({
                title: "هل انت متاكد من الحذف ؟",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false
            },
            function(){

                window.location="<?php echo base_url().'all_secretary/archive/notes/Notes/delete_event/'?>"+event.id;
            });
        $('#calendar').data('calendar').setDataSource(dataSource);
    }

    $(function () {
        var currentYear = new Date().getFullYear();

        $('#calendar').calendar({
            enableContextMenu: true,
            enableRangeSelection: true,
            contextMenuItems: [
                {
                    text: 'تفاصيل ',
                    click: showDetails
                },
                {
                    text: 'تعديل ',
                    click: update_event
                },
                {
                    text: 'حذف',
                    click: deleteEvent
                }
            ],
            mouseOnDay: function (e) {
                if (e.events.length > 0) {
                    var content = '';

                    for (var i in e.events) {
                        content += '<div class="event-tooltip-content">'
                            + '<div class="event-name" style="color:' + e.events[i].color + '">  النوع: <label class="label type_class" style="color: '+ e.events[i].color +'"> ' + e.events[i].type + ' </label></div>'
                            + '</div>';
                    }
                  /*  for (var i in e.events) {
                        content += '<div class="event-tooltip-content">'
                            + '<div class="event-name" style="color:' + e.events[i].color + '">  النوع: <label class="label" style="color: black"> ' + e.events[i].type + ' </label></div>'
                            + '</div>';
                    }
                    */

                    $(e.element).popover({
                        trigger: 'manual',
                        container: 'body',
                        html: true,
                        content : content

                     //   content: " النوع: " + type_n + "\n" + " القسم : " + nn +  "\n" + " التصنيف : " +nn + "\n" + "التفاصيل : " + nn,

                    });

                    $(e.element).popover('show');
                }
            },
            mouseOutDay: function (e) {
                if (e.events.length > 0) {
                    $(e.element).popover('hide');
                }
            },
            dayContextMenu: function (e) {
                $(e.element).popover('hide');
            },

            <?php if (isset($notes) && (!empty($notes))){ ?>
            dataSource: [
                <?php $x = 0 ; $type_n=''; foreach ($notes as $note){
                    $date_ss= strtotime($note->date);
                $year = date('Y', $date_ss);
                $month = date('m', $date_ss);
                $day = date('d', $date_ss);
                if ($note->type==1){
                    $type_n = 'ملاحظة';
                    $color = '#ffc751';
                } elseif ($note->type==2){
                    $type_n = 'موعد';
                    $color = '#50ab20';
                }
                elseif ($note->type==3){
                    $type_n = 'حدث';
                    $color = '#E5343D';
                }
                elseif ($note->type==4){
                    $type_n = 'مهمة';
                    $color = '#3a87ad';
                }
                ?>
                {
                    id: <?=$note->id?>,
                    name: '<?= $type_n?>',
                    type: '<?= $type_n?>',
                    qsm: '<?=$note->qsm?>',
                    tasnef: '<?=$note->tasnef?>',
                    color: '<?=$color?>',
                    startDate: new Date(<?=$year?>, <?=$month - 1?>, <?=$day?>),
                    endDate: new Date(<?=$year?>, <?=$month - 1?>, <?=$day?>)
                },
                <?php $x++; } ?>

            ],
            <?php } ?>
        });

        /* $('#save-event').click(function () {
             saveEvent();
         });*/
    });
</script>
<!-- bootstrap-year-calendar  -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>

