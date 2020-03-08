
        <tr>
            <input type="hidden" name="out_members_type[<?php echo $_POST['lenth'];?>]" value="4">
            <td><?php echo $_POST['lenth'];?></td>
            <td> <input  type="text" class="member form-control"  data-validation="required"
                         name="out_members_id[<?php echo $_POST['lenth'];?>]" id="member_out<?php echo $_POST['lenth'];?>"
                         onfocusout="show_data($(this).val());"> </td>
            <td><input type="radio" data-validation="required" name="out_members_job[<?php echo $_POST['lenth'];?>]"
                       class="mains" onclick="checkMyStateMain(this.value,'other_members<?php echo$_POST['lenth'];?>'),
                    checkMyStateMainTable(1,$('#lagna_num_show').val())""  id="other_members<?php echo$_POST['lenth'];?>" value="رئيس اللجنة">
                <label for="square-radio-1"  c style="margin-left: 10px;">رئيس اللجنة</label>

                <input type="radio"  data-validation="required" name="out_members_job[<?php echo $_POST['lenth'];?>]"
                       id="subother_members<?php echo$_POST['lenth'];?>"
                       onclick="checkMyStateSub(this.value,'subother_members<?php echo$_POST['lenth'];?>'),
                           checkMyStateSubTable(2,$('#lagna_num_show').val())"  class="subs" value="نائب ">
                <label for="square-radio-1"   style="margin-left: 10px;">نائب</label>
                <input type="radio" data-validation="required"  name="out_members_job[<?php echo $_POST['lenth'];?>]"
                        value="عضو ">
                <label for="square-radio-1"  style="margin-left: 10px;">عضو</label></td>
        </tr>

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
            url:"<?php echo base_url();?>family_controllers/LagnaMembers/add_member_out",
            data:{members:members,job_array:job_array,num:num,lgna_name:lgna_name,lgna_num:lgna_num},
            success:function(d){

                alert(d);
                $('.type_job4').prop('checked', false);
                $('.member').val('');



            }

        });
    })


</script>


<script>

    function checkMyStateMain(valuxz,myid) {

        var main_ids=[];
        $(".mains:radio:checked").each(function () {
            main_ids.push($(this).val());
        })
        // alert(member_ids);
        if( valuxz !=''){
            if(main_ids.length >1){
                alert('تم إختيار رئيس اللجنة');
                $('#' + myid).removeAttr('checked');
                //$('#myid' + myid).prop("checked", false);
            }

            /*if(valuxz === 'رئيس اللجنة'){
             alert('تم إختيار رئيس اللجنة');
             $("#" + myid).removeClass("main");
             $("#mainlabel" + myid).removeClass("main");
             $('.main').hide();

             }*/


        }
    }

</script>

<script>

    function checkMyStateSub(valuxz,myid) {



        var sub_ids=[];
        $(".subs:radio:checked").each(function () {
            sub_ids.push($(this).val());
        })

        // alert(member_ids);
        if( valuxz !=''){
            if(sub_ids.length >1){
                alert('تم إختيار  نائب رئيس اللجنة');
                $('#' + myid).removeAttr('checked');
                //$('#myid' + myid).prop("checked", false);
            }



            /*        if( valuxz !=''){

             if(valuxz === 'نائب'){
             alert('تم إختيار نائب رئيس اللجنة');
             $("#sub" + myid).removeClass("sub");
             $("#sublabel" + myid).removeClass("sub");
             $('.sub').hide();

             }*/


        }
    }

</script>