<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title;?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($all) && !empty($all)) {
                $geha_id=$all->id;
              } else {
                $geha_id='';
              }
            ?>
            <div class="col-md-12">

            <div class="form-group col-sm-4">
                <label class="label ">إسم جهه الاختصاص</label>
                <input type="text" class="form-control" placeholder="" data-validation="required" name="name" id="name">
                <input type="hidden"  id="id">
            </div>

<!--             <div class="col-md-12">-->

                <div class="form-group col-md-4 padding-4">

                    <div class="col-sm-3  col-md-2 padding-4" id="div_add_geha_ektsas" style="display: block;">
                                <button type="button" onclick="add_geha_ektsas(<?=$geha_id?>)"
                                        style="    margin-top: 27px;"
                                        class="btn btn-labeled btn-success" name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                    </div>

                    <div class="col-sm-3  col-md-3 padding-4" id="div_update_geha_ektsas" style="display: none;">
                        <button type="button"
                                class="btn btn-labeled btn-success " name="save" value="save" id="update_geha_ektsas">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                        </button>
                    </div>

                </div>
<!--              </div>-->
            </form>
        </div>
    </div>
</div>
<!-- update Modal1 -->
<div id="myDiv_geha_ektsas">
 <!--<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">جهات الاختصاص </h3>
            </div>
        <div class="panel-body">
            <?php 
            
            if(isset($result)&&!empty($result)){?>
            
            <table id="geha_ektsas" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>اسم جهه الاختصاص </th>
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->name;?></td>

                        <td>
                            <a onclick="update_geha_ektsas(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                            <a  onclick="delete_geha_ektsas(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)"   ><i class="fa fa-trash" aria-hidden="true"></i> </a>
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
</div>-->
</div>

<script>
  
  function add_geha_ektsas(id) {

     $('#div_update_geha_ektsas').hide();
     $('#div_add_geha_ektsas').show();
      //  alert(value);

     var name=$("#name").val();
     var geha=id;

      if (name != 0 && name != '') {
          var dataString = 'name=' + name+'&geha='+ id ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/add_gehat_ektsas',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                $('#name').val('');
                  swal({
                      title: "تم الحفظ بنجاح!",
                  });
                  get_details_geha_ektsas(geha);

              }
          });
      }
      else
      {
        swal({ title: "برجاء ادخال البيانات!", });
      }

  }


</script>
<script>
    function get_details_geha_ektsas(geha) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{geha:geha},
            url: "<?php echo base_url();?>all_secretary/archive/gehat/Gehat/load_gehat_ektsas",
            
            beforeSend: function () {
                $('#myDiv_geha_ektsas').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha_ektsas').html(d);

            }

        });
    }
</script>
<script>
/*
$('#geha_ektsas').DataTable( {
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
*/
</script>

<script>
    function update_geha_ektsas(id,geha) {
        var id = id;
        $('#div_add_geha_ektsas').hide();
        $('#div_update_geha_ektsas').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/getById_gehat_ektsas",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
                $('#name').val(obj.name);
                $('#id').val(obj.id);
            }

        });

        $('#update_geha_ektsas').on('click', function () {
          var id=$("#id").val();
            var name=$("#name").val();


         
     var dataString = 'id=' + id+'&name=' + name;
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/update_gehat_ektsas",
                type: "Post",
                dataType: "html",
                data: dataString,
                success: function (html) {
                    //  alert('hh');
                    $('#name').val('');

                    $('#div_update_geha_ektsas').hide();
                    $('#div_add_geha_ektsas').show();
                    swal({
                        title: "تم التعديل بنجاح!",
                    });

                    get_details_geha_ektsas(geha);

                }
            });
        });

    }

  
</script>
<script>
        function delete_geha_ektsas(id,geha) {
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/delete_gehat_ektsas',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                swal({
                    title: "تم الحذف بنجاح!",
                });
                get_details_geha_ektsas(geha);

                }
            });
        }

    }
</script>



