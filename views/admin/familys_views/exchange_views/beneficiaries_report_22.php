
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green half">النوع</label>
                <select name ="gender" id="gender" class="form-control half input-style">
                    <option value="">--اختر--</option>
                    <option value="1">ذكر</option>
                    <option value="2">انثي</option>
                    <option value="3">الكل</option>

                </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green half">الفئة</label>
                <select name ="category" id="category" class="form-control half input-style">
                    <option value="">--اختر--</option>
                    <?php
                    if (isset($category) && $category != null ){
                        foreach ($category as $cat){
                            ?>
                            <option value="<?= $cat->id?>"> <?= $cat->title?></option>
                            <?php
                        }
                    }
                    ?>


                </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green half">حالة الملف</label>
                <select name ="file_status" id="file_status" class="form-control half input-style">
                    <option value="">--اختر--</option>
                    <?php
                    if (isset($file_status) && $file_status != null ){
                        foreach ($file_status as $file){
                            ?>
                            <option value="<?= $file->id?>"> <?= $file->title?></option>
                            <?php
                        }
                    }
                    ?>


                </select>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
                <input type="button" name="search"  class="btn btn-purple search w-md m-b-5" value="بحث">

            </div>

        </div>

    </div>
</div>
<br/>
<br/>
<div id="result">
</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    $('.search').click(function(){
        alert('sssss');
        var gender =$('#gender').val();
        var category =$('#category').val();
        var file_status =$('#file_status').val();
        // if($('#gender').val()=='')
        // {
        //    alert("من فضلك حدد نوع الجنس");
        //    return;
        // }
        if($('#file_status').val()=='')
        {
            alert("من فضلك اختر حاله الملف");
            return;
        }
        if($('#category').val()=='')
        {
            alert("من فضلك اختر الفئه");
            return;
        }


            var dataString = 'gender=' + gender + '&category=' + category + '&file_status=' + file_status ;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>family_controllers/Exchange/search",
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $('#result').html(html);
                }
            });



    });
</script>