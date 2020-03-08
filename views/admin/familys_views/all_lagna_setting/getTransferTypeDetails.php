<div class="form-group col-sm-3 col-xs-12">
    <label class=" pull-left">طبيعة المحور </label>
    <select class="form-control " data-validation="required"
            aria-required="true" tabindex="-1" aria-hidden="true" name="type" id="main_type_id">
        <?php if($_POST['transfer_type'] ==1){ ?>
            <option value="1" >الأسر </option>

        <?php }elseif ($_POST['transfer_type'] ==2){?>
            <option value="2" >الأفراد </option>
        <?php }?>

    </select>
</div>

<div class="form-group col-sm-3 col-xs-12 " >
    <label class="pull-left">التوصية </label>

    <select class="form-control condition" name="">
        <option value="0">اختر</option>
        <?php if (isset($procedures_option_lagna) && $procedures_option_lagna != null && !empty($procedures_option_lagna)){
            foreach ($procedures_option_lagna as $row){ ?>
                <option
                    value="<?php echo $row->id; ?>"
<?php if (!empty($Transformation_lagna_data->procedure_id_fk)) {
   if ($Transformation_lagna_data->procedure_id_fk == $row->id) {
      echo "selected";
   }
}   ?>
                    ><?php echo $row->title; ?></option>
            <?php }
        } ?>
    </select>
</div>

<!-------------------------------------->

<div class="form-group col-sm-3 col-xs-12 " >
    <label class="pull-left">سبب الإجراء </label>
    <select class="form-control txt2 " name="" id="option_lagna_desiton">

        <?php if(!empty($all_procedures)){ ?>
            <option value="">إختر </option>

            <?php foreach ( $all_procedures  as $row){ ?>
                <option value="<?=$row->id?>"

<?php if (!empty($Transformation_lagna_data->reason_id_fk)) {
 if ($Transformation_lagna_data->reason_id_fk ==$row->id) {
 echo "selected";
 }
} ?>
                  ><?=$row->title?></option>
            <?php } }else{ ?>

        <?php } ?>
    </select>
</div>
<div class="form-group col-sm-4 col-xs-12" style="margin-top: 25px;">
 <input type="hidden" name="procedure_id_fk" id="procedure_id_fk" value="<?php echo $Transformation_lagna_data->procedure_id_fk;?>">
    <input type="hidden" name="mother_national_num" id="mother_national_num" value="<?php echo $Transformation_lagna_data->mother_national_num;?>">
    <input type="hidden" id="session_num_fk" name="session_num_fk" value="<?=$Transformation_lagna_data->session_num_fk?>">
    <button type="button" class="btn btn-success accept pull-left" value="1" row="<?=$_POST['transformationId']?>"  onclick="change_aproved($(this).val(),$(this).attr('row'));">الموافقه </button>
    <button type="button" class="btn btn-danger notaccept pull-left" value="2"  row="<?=$_POST['transformationId']?>"   onclick="change_aproved($(this).val(),$(this).attr('row'));">الرفض</button>
</div>


<script>
    function change_aproved(value,row) {
        var procedure_id_fk =$('#procedure_id_fk').val();
       // var mother_national_num =$('#mother_national_num').val();

        //
        var reason_text="0"; //$('.txt').val();
        var glsa_num=$('#glsa_num').val();  // main_type_id
        var main_type_id=$('#main_type_id').val();
        /* if(reason == 0 || reason == "0"){
             alert("تأكد من إدخال جميع البيانات ");
             return ;
         }*/
        var mother_national_num ='';
        var procedure_id_fk =$('#procedure_id_fk').val();
      //  var mother_national_num =$('#mother_national_num').val();
        /*******************************/
        var halet_file=[];
        var procedure=[];
        var ids=[];
       /* $(".halet_file").each(function(){ halet_file.push($(this).val()); });
        $(".procedure").each(function(){ procedure.push($(this).val()); });
        $(".ids").each(function(){ ids.push($(this).val()); });*/
        var session_num_fk =$('#session_num_fk').val();


        /*******************************/

        if( main_type_id==2){

            var dataString = {value:value,row:row,glsa_num:glsa_num,reason_text:reason_text,main_type_id:main_type_id,
                halet_file:halet_file,procedure:procedure,ids:ids,session_num_fk:session_num_fk,procedure_id_fk:procedure_id_fk,mother_national_num:mother_national_num};
        }else {
            var reason=$('.txt2').val();
            var condition=$('.condition').val();

            if(reason == 0 || reason == "0"){
                alert("تأكد من إدخال جميع البيانات ");
                return ;
            }

            var dataString = {value:value,row:row,reason:reason,glsa_num:glsa_num,condition:condition,reason_text:reason_text,main_type_id:main_type_id,
                halet_file:halet_file,procedure:procedure,ids:ids,session_num_fk:session_num_fk,procedure_id_fk:procedure_id_fk,mother_national_num:mother_national_num};
        }

//alert(dataString);

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/change_aproved",
            data:dataString,
            success:function(d){
                alert(d);
                location.reload();
            }
        });

    }
</script>
