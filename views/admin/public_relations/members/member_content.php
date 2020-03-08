<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php
            
            if($this->uri->segment(4)){
             echo form_open_multipart('Public_relation/update_type_content/'.$this->uri->segment(4).'');
            }else{
                 echo form_open_multipart('Public_relation/add_type_content');
            }
                     ?>
                <div class="col-md-12">
                    
               <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع العضويه</label>
                <select class="form-control half type" id="member" data-validation="required" aria-required="true"   tabindex="-1" aria-hidden="true" id="product" name="main_type">
                    <option value="">اختر </option>
                    <?php
                     if(isset($types)&&!empty($types)){
                    foreach($types  as $row){
                    ?>
                    <option value="<?php echo $row->id;?>"<?php if(isset($all->form_id)&&$row->id==$all->form_id){?> selected="" <?php } ?>><?php echo $row->title;?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
            </div>
                    
            <div class="form-group col-sm-8">
                <label class="label label-green  half"  style="width: 25%!important;">التفاصيل</label>
                <textarea class="form-control  input-style  half" style="width: 75%!important;" data-validation="required" name="content"></textarea> 
            </div>
           
            <div class="form-group col-sm-4">
                
                   <input type="submit"name="add" value="اضافه" class="btn-success form-control">
               
            </div>
               
                
               
           
           
            </form>
     </div>
<!-- update Modal1 -->
<?php
 if(isset($records)&&!empty($records)){
    
    
    ?>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>نوع العضويه</th>
                   
                    <th>المحتوي</th>
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                   
            <?php
            $x = 0;
            foreach($records as $row){$x++; ?>
        
                <tr>
                <td><?php echo $x;?></td>
                <td><?php echo $row->name;?> </td>
                 <td><?php echo word_limiter($row->content,10);?> </td>
                
                    <td data-title="التحكم" class="text-center">
                        
                                            <a  href="<?php echo base_url();?>Public_relation/delete_content/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                    </td>
                    </tr>
                <?php }  ?>

           
                </tbody>
            </table>
            <?php
            }
            ?>
     
     
     
        </div>
        
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script>
$('#member').change(function(){
    var member=$(this).val();
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>public_relation/check_id",
        data:{member:member},
        success:function(d){

         if(d >0){
           alert("موجود من قبل  ");
             location.reload();
         }else{

         }


        }

    });
})

    </script>

