<?php 
            
            if(isset($result)&&!empty($result)){?>
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$title?> </h3>
            </div>
        <div class="panel-body">
           
                <table class="table example table-bordered table-striped table-hover">

                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>   رقم الوارد</th>
                    <th>  نوع الوارد</th>
                    <th> تاريخ التسجيل</th>
                    <th> وقت التسجيل</th>
                    <!-- <th>جهه الاختصاص</th>  -->
                     <th> جهه الارسال</th> 
                     <th>  عنوان الموضوع</th>
                     <th> طريقه الاستلام</th>
                     <th> الاولويه</th>
                 
                    <th >الاجراء</th>
                   
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->rkm;?></td>
                        <td><?php if( $row->wared_type==1){echo 'داخلي';}
                        else if($row->wared_type==2){echo 'خارجي';};?></td>
                        <td><?php echo $row->tsgeel_date;?></td>
                        <td><?php echo $row->tsgeel_time;?></td>
                      <!-- <td><?php echo $row->geha_ekhtsas_name;?></td>  -->
                      <td><?php echo $row->geha_morsla_name;?></td> 
                      <td><?php echo $row->title;?></td>
                      <td><?php echo $row->tarekt_estlam_name;?></td>
                      
                    
                       <td><?php 
                       if($row->awlawya==1){echo 'هام';}elseif($row->awlawya==2){echo ' عادي  ';}elseif($row->awlawya==0){echo 'هام جدا  ';}  ?>
                    
                    
                    </td>
                        <td>
                
                     
                                      



                <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/compelete_details/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
                   
                   
                    <li> <a  onclick="get_print('<?php echo  $row->title?>','<?php echo  $row->date_ar?>' ,'<?php echo  $row->rkm?>','<?=$row->morfq_num?>');"
                                        data-toggle="modal" data-target="#myModal_print" ><i class="fa fa-print" aria-hidden="true"></i>طباعه الباركود</a></li>

                                       
                 
                <li>    <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/update/' .$row->id  ?>";
        });'>
    <i class="fa fa-pencil"> </i>تعديل</a></li>

                               <li>  <a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/delete/' . $row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i>حذف</a></i>


                                    <li>
                                    <a    aria-hidden="true"
                                               data-toggle="modal" 
                                               data-target="#myModal_reason_end<?= $row->id?>"><i class="fa fa-archive"> </i>انهاء للمعامله</a></li>
                                              


                  




                  </ul>
                </div> 
             






                <a onclick="get_details(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i></a>






























    
                        </td>
                    </tr>



                    <div class="modal fade" id="myModal_reason_end<?= $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> انهاء المعامله </h4>
            </div>
            <div class="modal-body" style="
    height: 171px;
">
        
            <div class="form-group col-sm-12">    
            <div class="form-group col-md-4 col-sm-6 padding-4" 
                     >
                    <label class="label  "> سبب انهاء المعامله </label>
                    <input type="text" name="reason_name" id="reason_name" value=""
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:80%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#myModal_end').modal('show'); get_reason_end();"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                      
                           <input type="hidden" id="reason_id_fk" name="reason_id_fk" value=""/>
                                                
                    <button type="button" data-toggle="modal" data-target="#myModal_end" 
                    onclick="get_reason_end();"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-md-4 col-sm-6 padding-4">
                         <label class="label">المستلم منه </label>
                        
                         <input type="text" class="form-control"
                        type="text" 
                                   name="from_user_n" id="from_user_n"  
                                

                                   value="">
                            
                     </div>

                <div class="form-group col-md-4 col-sm-6 padding-4">
                         <label class="label">المسلم </label>
                        
                         <input type="text" class="form-control"
                         placeholder=" حدد الموظف م" type="text" style="width: 78%;float: right;"
                                   name="to_user_n" id="to_user_n"  
                                   readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "

                                 

                                   value="">
                                   <input type="hidden" id="to_user_id" name="to_user_id" value=""/>
                            

                            <button type="button"
                                    onclick="$('#tahwelModal').modal('show');"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>
                     </div>



                     

                     <div class="form-group col-md-4 col-sm-6 padding-4">
                         <label class="label">التاريخ </label>
                        
                         <input type="date" class="form-control"
                        type="text" 
                                   name="date_end" id="date_end"  
                                

                                   value="<?=date('Y-m-d');?>">
                            
                     </div>

                     <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                         <label class="label">رقم القيد الخارجي </label>
                        
                         <input type="number" class="form-control"
                        type="text" 
                                   name="num_end" id="num_end"  
                                

                                   value="">
                            
                     </div> -->


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <button type="button"
                                class="btn btn-labeled btn-success "  onclick="add_reason(<?= $row->id?>)"
                               >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
            </div>
        </div>
    </div>
</div>


                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            </div>
        
        </div>
    </div>




            <?php
            }
            ?>
            <div class="modal fade" id="myModal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 class="modal-title">نموذج الطباعة </h4>
      </div>
      <div class="modal-body col-sm-12">
       <div class="col-sm-12">
                <div id="div_print" ></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >إغلاق</button>
        <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="myModal_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> انهاء المعامله :
               
                </h4>
            </div>

            <div class="modal-body">
            <div id="reason_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input6').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافه سبب انهاء المعامله
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input6" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">سبب انهاء المعامله </label>
                                    <input type="text" name="reason_setting" id="reason_setting" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_reason_setting" style="display: block;">
                                    <button type="button" onclick="add_reason_setting($('#reason_setting').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_reason_setting" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_reason_setting">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
            </div>



              <div id="end">
               </div>
        
             </div>
       </div>
   </div>
</div>
</div>
<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel_emp()">
                    <label for="esnad1" class="radio-label"> موظف</label>
                </div>
                <!-- <div class="radio-content">
                    <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="2" onclick="load_tahwel()">
                    <label for="esnad2" class="radio-label"> قسم</label>
                </div> -->
                </div>

                <div class="col-xs-12" id="tawel_result" style="display: none;">



                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_print(id ,date,num,morfaq_num){
       var print_id=id;
      var date_export=date;
      var num_post =num ;
      var morfaq_num=morfaq_num;
        var dataString = 'id=' + print_id + '&type=' + 2 +  "&num="+num_post+"&date="+date_export +'&morfaq_num='+morfaq_num ;
       $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/PrintCode',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>
<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);

            }

        });
    }
</script>
<script>
  
  function add_reason(id) {

    

var id=id;
    var value=$('#reason_id_fk').val();
    var name=$('#reason_name').val();
    var to_user_n=$('#to_user_n').val();
    var to_user_id=$('#to_user_id').val();
    var from_user_n=$('#from_user_n').val();
    var date_end=$('#date_end').val();
    var num_end=$('#num_end').val();


      if (value != 0 && value != '' && name != 0 && name != '' && to_user_n != 0 && to_user_n != '' && from_user_n != 0 && from_user_n && num_end != 0 && num_end  ) {
         
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_end',
              data: {id:id,value:value,name:name,to_user_n:to_user_n,to_user_id:to_user_id,from_user_n:from_user_n,date_end:date_end,num_end:num_end},
              dataType: 'html',
              cache: false,
              success: function (html) {

                $('#myModal_end').modal('hide');
          
                  swal({
                      title: "تم انهاء المعامله بنجاح!",


      }
      );
      window.location.reload();
// $('#update_reason').hide();
// $('#span_reason').append("<span class='label label-success' style='min-width: 140px;''>تم انهاءالمعامله </span>");
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",


      }
      );
    

      }

  }


</script>
<script>
    function getTitle_reason(id,value) {


        $('#reason_id_fk').val(id);
        $('#reason_name').val(value);
        $('#myModal_end').modal('hide');

  
    }
</script>

<script>
    function get_reason_end() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_reason",
           
            beforeSend: function () {
                $('#end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#end').html(d);

            }

        });
    }
</script>

<script>
  
  function add_reason_setting(value) {

      $('#div_update_reason_setting').hide();
      $('#div_add_reason_setting').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'reason_setting=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_setting',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#reason_setting').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تمت الاضافه بنجاح!",


      }
      );
      get_reason_end();

              }
          });
      }

  }


</script>
<script>
    function update_reason_setting(id) {
        var id = id;
        $('#geha_input6').show();
        $('#div_add_reason_setting').hide();
        $('#div_update_reason_setting').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_reason_setting",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);

                $('#reason_setting').val(obj.title);


            }

        });

        $('#update_reason_setting').on('click', function () {
            var reason_setting = $('#reason_setting').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_reason_setting",
                type: "Post",
                dataType: "html",
                data: {reason_setting: reason_setting,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason_setting').val('');
                    $('#div_update_reason_setting').hide();
                    $('#div_add_reason_setting').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_reason_end();    

                }

            });

        });

    }

  
</script>
<script>
  
    
  function delete_reason_setting(id) {
  //  confirm('?? ??? ????? ?? ????? ????? ?');
       var r = confirm('هل انت متاكد من الحذف ?');
  if (r == true) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
              //   alert(html);
              $('#reason_setting').val('');
             // $('#Modal_esdar').modal('hide');
            
              swal({
                  title: "تم الحذف!",


  }
  );
  get_reason_end();

          }
      });
  }

}
</script>
<script>
    function load_tahwel_emp() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel_emp' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id,name) {
       
        var checkBox = document.getElementById("myCheck"+id);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';

   
 //$('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");
   

    

        $('#to_user_id').val(id);
        $('#to_user_n').val(name);
        $('#tahwelModal').modal('hide');


    
    }
</script>