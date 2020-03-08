<?php
if(!empty($records)){?>
    <span class="label-danger "> هذا الرقم مسجل من قبل إختر رقم صحيح !</span>
<script>
    document.getElementById("button").type = "button";
</script>
<?php }else{?>

    <span class=" label-success ">هذا الرقم غير مسجل من قبل</span>
    <script>
        document.getElementById("button").type = "submit";
    </script>
 <?php }  ?>