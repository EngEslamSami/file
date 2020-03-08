<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($safms2ol)) { ?>
                            <table id="examplesafms2ol" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <!--<th width="2%">#</th>-->
                                    <th class="text-center">  صفه المسؤول  </th>
                                    <th class="text-center">  الاجراء</th>
                     
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($safms2ol as $value) {
                                    ?>
                                    <tr>
                                        <td style="cursor: pointer" data-title="<?= $value->id ?>" onclick="getTitle_safms2ol('<?php echo $value->title; ?>','<?php echo $value->id; ?>')" >
                                            <?= $value->title ?>
                                        </td>
                                        <td>
                                        <a href="#" onclick="delete_safms2ol(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_safms2ol(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


                        <?php } else { ?>

                            <div class="alert alert-danger">لاتوجد بيانات !!</div>
                        <?php } ?>



<script>
    $('#examplesafms2ol').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );

</script>

<script>
    function getTitle_safms2ol(value,id) {

        $('#safms2ol_fk').val(id);
        $('#safms2ol_name').val(value);

        $('#Modal_safms2ol').modal('hide');
    }
</script>


<script>

    function add_safms2ol(value) {

        $('#div_update_safms2ol').hide();
        $('#div_add_safms2ol').show();
        //  alert(value);


        if (value != 0 && value != '' ) {
            var dataString = 'safms2ol=' + value ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/add_safms2ol',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                    //  $('#reason').val(' ');
                    $('#safms2ol').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحفظ!",


                        }
                    );
                    get_details_safms2ol();

                }
            });
        }

    }


</script>
<script>
    function update_safms2ol(id) {
        var id = id;
        $('#safms2ol_input').show();
        $('#div_add_safms2ol').hide();
        $('#div_update_safms2ol').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/getById_safms2ol",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#safms2ol').val(obj.title);

            }

        });

        $('#update_safms2ol').on('click', function () {
            var safms2ol = $('#safms2ol').val();


            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/update_safms2ol",
                type: "Post",
                dataType: "html",
                data: {safms2ol:safms2ol,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#safms2ol').val('');
                    $('#div_update_safms2ol').hide();
                    $('#div_add_safms2ol').show();
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_details_safms2ol();

                }

            });

        });

    }


</script>
<script>


    function delete_safms2ol(id) {

        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/delete_safms2ol',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#safms2ol').val('');
                    // $('#Modal_esdar').modal('hide');

                    swal({
                            title: "تم الحذف!",

                        }
                    );
                    get_details_safms2ol();

                }
            });
        }

    }
</script>

