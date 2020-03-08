<style xmlns="http://www.w3.org/1999/html">

    .loader-img {
        margin: 0 auto;
        width: 60px;
        height: 50px;
        text-align: center;
        font-size: 10px;
        /* position: absolute;
        position: relative;
         top: 50%;
         left: 50%;
         -webkit-transform: translateY(-50%) translateX(-50%);*/

    }

    .loader-img > div {
        height: 100%;
        width: 8px;
        display: inline-block;
        float: left;
        margin-left: 2px;
        -webkit-animation: delay 0.8s infinite ease-in-out;
        animation: delay 0.8s infinite ease-in-out;
    }

    .loader-img .bar1 {
        background-color: #754fa0;
    }

    .loader-img .bar2 {
        background-color: #09b7bf;
        -webkit-animation-delay: -0.7s;
        animation-delay: -0.7s;
    }

    .loader-img .bar3 {
        background-color: #90d36b;
        -webkit-animation-delay: -0.6s;
        animation-delay: -0.6s;
    }

    .loader-img .bar4 {
        background-color: #f2d40d;
        -webkit-animation-delay: -0.5s;
        animation-delay: -0.5s;
    }

    .loader-img .bar5 {
        background-color: #fcb12b;
        -webkit-animation-delay: -0.4s;
        animation-delay: -0.4s;
    }

    .loader-img .bar6 {
        background-color: #ed1b72;
        -webkit-animation-delay: -0.3s;
        animation-delay: -0.3s;
    }

</style>

<?php if(isset($one_row) && !empty($one_row))
{
  $ar_title= $one_row->ar_title ;
  $en_title= $one_row->en_title ;
    $type= $one_row->type ;
    $from_id_fk= $one_row->from_id_fk ;
    $action=base_url().'all_secretary/archeive/Archieve/update_archeive/'.base64_encode($one_row->id);
}else{
    $ar_title='';
    $en_title='';
    $type= '' ;
    $from_id_fk='';
    $action='#';
}

?>




<div class="col-xs-12">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ; ?></h3>
        </div>
        <div class="panel-body ">
            <form action="" method="post"/>
            <div class="col-md-9 padding-4">
            <div class="col-md-6">
                <label class="">اسم المجلد عربي </label>
                    <input type="text" name="ar_title" id="ar_title"
                           class="form-control"
                           data-validation="required"
                           value="<?php echo $ar_title  ; ?>">
                <span class="ar_title" style="display:none; color: red;"> هذا الحقل مطلوب</span>

                </div>
            <div class="col-md-6">
                <label class="">اسم المجلد انجليزي </label>
                <input type="text" name="en_title" id="en_title"
                       class="form-control"
                       data-validation="required"
                       value="<?php echo $en_title  ; ?>">
                <span class="en_title" style="display:none; color: red;"> هذا الحقل مطلوب</span>

            </div>


            <div class="col-md-6" style="padding-top: 30px;">
            <div class="radio-content">
                <input type="radio" id="type_sarf1" <?php if($type==0) echo 'checked' ; ?> onchange="make_dis($(this).val());" name="sarf_type"  class="sarf_types" value="0">
                <label for="type_sarf1" class="radio-label"> رئيسي</label>
            </div>

            <div class="radio-content">
                <input type="radio" id="type_sarf2"  <?php if($type==1) echo 'checked' ; ?>  onchange="make_dis($(this).val());" name="sarf_type"   class="sarf_types" value="1">
                <label for="type_sarf2" class="radio-label">فرعي </label>
            </div>
            </div>

            <div class="col-md-6">
                <label class="radio-content">متفرع من  </label>
                <select class="form-control" <?php if($type!=1) echo 'disabled' ; ?> name="from_id_fk" id="from_id_fk">
                    <option value=""> اختر </option>
                    <?php if(isset($folders)&&!empty($folders)){
                        $x=0;
                        $from_id_fk=0;
                        foreach ($folders as $row){
                            $x++;

                            ?>
                            <option value="<?php echo $row->id ; ?>" <?php if($row->id==$from_id_fk){echo 'selected';}?> ><?php echo  $row->en_title;?></option>
                            <?php  get_array2($row->sub,'&nbsp &nbsp',$from_id_fk);?>
                        <?php } } ?>

                </select>
                <span class="from_id_fk" style="display:none; color: red;"> هذا الحقل مطلوب</span>
                </div>

     <div class="col-md-9 text-center" style="padding-top: 20px;">

         <button <?php if(isset($one_row) && !empty($one_row)){?> type="submit" <?php } else{?> type="button"  onclick="save_data();"  <?php } ?>  style="font-size: 17px !important;" class="btn btn-labeled btn-success " name="save" value="save">
             <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
             حفظ
         </button>
</div>
            </div>
            </form>
            <div class="col-md-3 padding-4 tree2">
              <div style="overflow: auto;height: 350px">
                <ul id="tree1">
                    <?php if(isset($folders)&&!empty($folders)){

                    foreach ($folders as $row){?>

                      <li><?php echo $row->en_title;?><div class="pull-right">

                          </div>

                    <?php get_li($row->sub);  ?>

                      </li>


                    <?php } } ?>


                </ul>
              </div>

            </div>



        </div>


        <?php
        function get_li($arr)
        {

                        if(isset($arr)&&!empty($arr)){?>
                            <ul>
                                <?php foreach ($arr as $row){?>
                                    <li><?php echo $row->en_title;?><div class="pull-right">
                                              </div>


                                        <?php get_li($row->sub);  ?>


                                    </li>

                                <?php } ?>

                            </ul>
                        <?php }
        }
        ?>


        <?php
        function get_array2($arr,$l,$from_id_fk)
        {
            foreach ($arr as $key => $value) {?>

                <option value="<?php echo $value->id;?>" <?php if($value->id==$from_id_fk) echo 'selected' ; ?>><?php echo '&nbsp &nbsp &nbsp &nbsp'. $value->en_title;?></option>
                <?php
                get_array2($value->sub,'&nbsp &nbsp &nbsp &nbsp',$from_id_fk);
            }

        }
        ?>
        <div id="res">
        <?php if (isset($records) && !empty($records)) { ?>
            <div class="col-xs-12">
                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $title ?> </h3>
                    </div>
                    <div class="panel-body">
                        <?php if (isset($records) && (!empty($records))) { ?>
                            <table class="example table table-responsive table-bordered">

                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th> اسم المجلد</th>
                                    <th> التصنيف الرئيسي</th>
                                    <th>  المسار</th>
                                    <th> الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x=1;
                                foreach ($records as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?= $row->en_title ?></td>
                                        <td>
                                            <?php
                                            if(isset($row->main_folder_name)&& !empty($row->main_folder_name)){
                                                echo $row->main_folder_name;
                                            }else{
                                                echo "تصنيف رئيسي";
                                            }
                                            ?>

                                        </td>
                                        <td><?= $row->path ?></td>

                                        <td>
                                            <!--
                                            <a href="<?= base_url() . 'main_data/Aktam/download_file/' . $row->id ?>"
                                               download="">
                                                <i class="fa fa-download" title="تحميل"></i> </a>
                                                -->

                                            <!-- <a onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                window.location="<?= base_url() . 'all_secretary/archeive/Archieve/update_archeive/' . base64_encode($row->id) ?>";
                                                });'>
                                                <i class="fa fa-pencil"> </i> </a> -->
                                            <?php if($row->type!=0){?>

                                            <a onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: " الملف رئيسي ويوجد به ملفات داخليه اذا قمت بالحذف ستحذف جميع الملفات الداخليه",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                window.location="<?= base_url() . 'all_secretary/archive/folders/Folder/delete_folder/' . base64_encode($row->id) ?>";
                                                });'>
                                                <i class="fa fa-trash"> </i> </a>
                                            <?php } else{ ?>
                                                <a onclick='swal({
                                                    title: "هل انت متأكد من الحذف ؟",
                                                    text: " الملف رئيسي ويوجد به ملفات داخليه اذا قمت بالحذف ستحذف جميع الملفات الداخليه",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-warning",
                                                    confirmButtonText: "حذف",
                                                    cancelButtonText: "إلغاء",
                                                    closeOnConfirm: true
                                                    },
                                                    function(){
                                                    window.location="<?= base_url() . 'all_secretary/archive/folders/Folder/delete_folder/' . base64_encode($row->id) ?>";
                                                    });'>
                                                    <i class="fa fa-trash"> </i> </a>

                                            <?php } ?>

                                        </td>

                                    </tr>
                                    <?php
                                    $x++;
                                } ?>

                                </tbody>
                            </table>
                        <?php } else {
                            ?>
                            <div class="alert-danger col-md-12 text-center ">

                                <h4> لا توجد بيانات ......</h4>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>

            </div>
            </div>


<script>

    function save_data()
    {



        var ar_title=$('#ar_title').val();
        var en_title=$('#en_title').val();
        var from_id_fk=$('#from_id_fk').val();
       var from_name= $( "#from_id_fk option:selected" ).text();
        var from = $("input[name='sarf_type']:checked").val();
        if(ar_title=='')
        {
           $('.ar_title').show();
            return;
        }
        if(en_title=='')
        {
            $('.en_title').show();
            return;
        }
        if(from==1)
        {
            if(from_id_fk=='')
            {
                $('.from_id_fk').show();
                return;
            }
        }


        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/folders/Folder/create_folder",
            data: {ar_title:ar_title,en_title:en_title,
                from_id_fk:from_id_fk,from:from,from_name:from_name,type:from},
            beforeSend: function () {
                $('#res').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },


            success: function (d) {

               //alert(d);
                $('#res').html(d);
                $('input').val('');
                $('select').val('');
            }

        });
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/folders/Folder/make_tree",
            data: {},
            beforeSend: function () {
                $('.tree').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },


            success: function (d) {

                //alert(d);
               $('.tree2').html(d);
            }

        });
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/folders/Folder/fill_select",
            data: {},


            success: function (d) {
                $('#from_id_fk').html(d);
                $('#from_id_fk').attr('disabled',true);
        
               $('#type_sarf1').val(0);
                 $('#type_sarf2').val(1);
            }

        });
    }
</script>

<script>

   /* function make_dis(v)
    {
  
        var valu = $("input[name='sarf_type']:checked").val();
       // alert(valu);
      if(valu==1)
      {
  $('#from_id_fk').attr('disabled',false);
      }else{
          $('#from_id_fk').attr('disabled',true);
        //  $('#from_id_fk').val('');
      }
    }*/

   function make_dis(v) {

        var valu = $("input[name='sarf_type']:checked").val();
        // alert(valu);
        if (valu == 1) {
            $('#from_id_fk').removeAttr('disabled');
        } else {
            $('#from_id_fk').attr('disabled', 'disabled');
            //  $('#from_id_fk').val('');
        }
    }
</script>