<table class="table table-bordered" id="tab_logic" >
    <thead>
    <th>م</th>
    <th>اسم العضو</th>
    <th> الوظيفه</th>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<$num;$i++){
        ?>

        <tr>
            <td><?php echo $i+1;?></td>
            <td><input type="text" class="member" id="member_out<?php echo $i;?>" onfocusout="show_data($(this).val());"></td>
            <td><input type="radio" name="<?php echo $i;?>" class="type_job4"  value="عضو عادي">عضو عادي
                <input type="radio" name="<?php echo $i;?>"  class="type_job4"  value="رئيس لجنه"> رئيس لجنه</td>

        </tr>
        <?php
    }
    ?>

    </tbody>
</table>



<div class="col-xs-12">

    <button type="button" id="save_out" name="" value="<?php echo $num;?>"
            class="btn btn-purple w-md m-b-5 add_lgna">
        <span><i class="fa fa-disk-o" ></i></span> حفظ
    </button>
</div>
<script>
    function show_data(value)
    {
        $list=$('.results');
        if(value!=='') {
            var allData = value;

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        }
        else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function() {
                $(this).remove();
            });
        }

    }
</script>

<script>
    $('#save_out').click(function(){
        var members=[];
        var job_array=[];
        var num=$(this).val();
        var i;
        for(i=0;i<num;i++){
            var name=$('#member_out'+i).val();
            if (name==''){
                alert("من فضلك املا كل الحقول");
                return;
            }
            members.push(name);

        }
        $(".type_job4:radio:checked").each(function () {
            job_array.push($(this).val());
        })
        if(members.length!==job_array.length)
        {
            alert("من فضلك ادخل لكل موظف وظيفته");
            return;
        }
        var lgna_name=$('#lgna_name').val();
        var lgna_num=$('#lgna_num').val();
        if(lgna_name==''||lgna_num==''){
            alert("من فضلك ادخل اسم اللجنه ورقم اللجنه");
            return;
        }
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/add_member_out",
            data:{members:members,job_array:job_array,num:num,lgna_name:lgna_name,lgna_num:lgna_num},
            success:function(d){

                alert(d);
                $('.type_job4').prop('checked', false);
                $('.member').val('');



            }

        });
    })


</script>