
<div class="col-xs-12 no-padding">
      
			<div class="col-xs-12 form-group">
				<label class="label ">تعديل</label>
				<textarea class="form-control" rows="3" name="tazkra_comment_update" id="tazkra_comment_update"  data-validation="required" ><?=$get_tazkra->comment;?></textarea>
			</div>
			
			<div class="col-md-6 form-group">

			</div>
			<div class="col-md-3 form-group">
                <button class="btn btn-success btn-labeled" type="button" name="add" value="add" onclick="update_comment(<?= $get_tazkra->id?>,<?= $get_tazkra->wared_id_fk ?>)"
                ><span class="btn-label"><i class="fa fa-reply"></i></span>تعديل</button>
			
                
            
            </div>
		</div>
       
			<script>
    function update_comment(id,ticket)
    {

    var comment=$('#tazkra_comment_update').val();
 
    console.log(id);
    if(id !='')
{
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_secretary/archive/wared/Add_wared/update_comment",
              type: "POST",
            data:{id:id,comment:comment},
            success:function(d){
				$('#detailsModal').modal('hide');
                swal({
    title: " تمت التعديل بنجاح ",
	text:" ",
    type: "success",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
get_details_travel_typee(ticket);
            }

        });
       } else{

     //   $('#result').html('برجاء اختيار الموظف');
        swal({
    title: "حدث خطا! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});



        }
    }
</script>