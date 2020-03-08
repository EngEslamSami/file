
<?php
 if (isset($get_all->morfaq) && !empty($get_all->morfaq)){
     ?>
     
     <table class="table  table-bordered table-striped table-hover">
         <thead>
         <tr class="greentd">


             <th> المرفق</th>
             <th> الإجراء</th>


         </tr>
         </thead>
         <tbody >
         <?php
         $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
         $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
         $ext = pathinfo($get_all->morfaq, PATHINFO_EXTENSION);

             ?>
             <tr>

                 <td>
                     <?php
                     if (in_array($ext,$image)){
                         ?>
                         <a data-toggle="modal" data-target="#myModal-view" onclick="get_image('<?= $get_all->morfaq ?>')">
                             <i class="fa fa-eye" title=" قراءة"></i> </a>

                         <?php
                     } elseif (in_array($ext,$file)){

                         ?>
                         <a target="_blank" href="<?=base_url()."finance_accounting/taswia/Taswia/read_file/".$get_all->morfaq ?>">
                             <i class="fa fa-eye" title=" قراءة"></i> </a>


                         <?php
                     }
                     ?>
                 </td>
                 <td>
                     <a href="#" onclick="delete_attach(<?= $get_all->id ?>);"><i class="fa fa-trash"></i></a>

                 </td>





             </tr>

         </tbody>
     </table>
<?php
 } else{
     ?>
     <div class="col-sm-12 no-padding form-group">

         <div id="morfaq_input">
            
             <div class="col-sm-3  col-md-4 padding-2 ">
                 <label class="label   "> المرفق  </label>
                 <input type="file" name="file_attached" id="file_attached" data-validation="required"
                        value=""
                        class="form-control ">

             </div>
             <div class="col-sm-3  col-md-3 padding-4" id="div_add_morfq" style="display: block;">
                 <button type="button" onclick="upload_img(<?= $get_all->id ?>)"
                         style="    margin-top: 27px;"
                         class="btn btn-labeled btn-success" name="save" value="save">
                     <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                 </button>
             </div>
            
         </div>

     </div>
<?php
 }
 ?>
<script>
    function get_image(url) {
        var path = "<?= base_url().'uploads/images/finance_accounting/taswia/'?>"+url;
        $('#image').attr('src',path);


    }
</script>
<script>

    function  upload_img(id)
    {

        var files = $('#file_attached').prop('files')[0];
        var form_data = new FormData();
        form_data.append('files', files);
        form_data.append('id', id);
      //  alert(files);
        //console.log(files);
       // return;
      if ($('#file_attached').val() !=''){
             $.ajax({
                 url:"<?php echo base_url(); ?>finance_accounting/taswia/Taswia/upload_morfaq", //base_url() return http://localhost/tutorial/codeigniter/
                 method:"POST",
                 data:form_data,
                 contentType:false,
                 cache:false,
                 processData:false,

                 success:function(data)
                 {
                     $('#myDiv_morfq').html(data);

                 }
             });
        }
        else{
             swal({
                 title: "من فضلك تأكد من الحقول الناقصه ! ",
                 type: "warning",
                 confirmButtonClass: "btn-warning",
                 confirmButtonText: "تم"
             });
         }






    }


</script>
<script>
    function delete_attach(id) {

        swal({
                title: "هل أنت متأكد من الحذف ؟",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false
            },
            function(){

                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url()?>finance_accounting/taswia/Taswia/delete_attach',
                    data: {id:id},
                    dataType: 'html',
                    cache: false,
                    success: function (html) {

                        $('#myDiv_morfq').html(html);
                        swal({
                            title: "تم الحذف بنجاح",
                            confirmButtonText: "تم"
                        });
                    }
                });
            });


    }
</script>
