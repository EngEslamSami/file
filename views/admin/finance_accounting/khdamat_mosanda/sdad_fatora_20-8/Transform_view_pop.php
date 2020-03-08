<div class="">

    <div class="col-sm-9">
        <input type="hidden" name="rkm" value="<?= $rkm ?>"/>
        <div class="col-sm-12">
            <div class="col-sm-6">
                <label style="float: right; width: 25%!important;" class="label  ">
                    المسمى الوظيفي </label>
                <select name="" class="form-control  "
                        onchange="get_emp(this.value);"
                        data-validation="required"
                        aria-required="true" data-show-subtext="true" data-live-search="true">
                    <option value="">اختر</option>
                    <?php if (isset($gehat) && !empty($gehat)) {
                        foreach ($gehat as $gehat_row) {
                            $selected = "";
                            if ($gehat_row->id == $sadad_fatora->to_geha_id_fk) {
                                $selected = 'selected';
                            } ?>
                            <option value="<?= $gehat_row->id ?>" <?= $selected ?> >
                                <?= $gehat_row->title ?></option>
                        <?php }
                    } ?>
                </select>

            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6">

                <label style="float: right; width: 25%!important;" class="label  ">
                    الموظف </label>
                <select name="user_to" id="user_to"
                        onchange="pass_emp_date(this);"
                        class="form-control  "
                        data-validation="required" aria-required="true" data-show-subtext="true"
                        data-live-search="true">
                    <?php if (isset($emp_gehat) && !empty($emp_gehat)) { ?>
                        <option value="">اختر</option>
                        <?php foreach ($emp_gehat as $row_user) {
                            ?>
                            <option data-img="<?= $row_user->person_img ?>"
                                    data-job="<?= $row_user->job_title_n ?>"
                                    value="<?= $row_user->person_id ?>">
                                <?= $row_user->person_private_name ?></option>
                        <?php }
                    } else {
                        if (isset($depart_id)) {
                            echo '<option value="">لا يوجد مستخدمين   </option>';
                        }
                    }
                    ?>
                </select>
                <input type="hidden" name="user_to_name" id="user_to_name" value=""/>

            </div>
        </div>

    </div>
    <div class="col-sm-3">

        <table class="table table-bordered" style="">
            <thead>
            <tr>
                <td colspan="2">
                    <img src="<?= base_url() . "asisst/fav/apple-icon-120x120.png" ?>"
                         id="person_photo"
                         class=" center-block img-responsive"
                         onerror="this.src='<?= base_url() . "asisst/fav/apple-icon-120x120.png" ?>'"
                         width="150" height="150"/></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="background-color: #eee;width: 25%; ">الاسم</td>
                <td id="name-emp"></td>
            </tr>
            <tr>
                <td style="background-color: #eee;width: 25%;">المسمى الوظيفي</td>
                <td id="jon-title"></td>
            </tr>
            </tbody>
        </table>

    </div>

</div>
<script>
    function pass_emp_date(this_value) {   //data-img
        var name = $('option:selected', this_value).text();
        var image = $('option:selected', this_value).attr("data-img");
        var job = $('option:selected', this_value).attr("data-job");
        var pass = "<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/"?>";

        $("#name-emp").text(name);
        $("#user_to_name").val(name);
        $("#jon-title").text(job);
        $("#person_photo").attr("src", pass + image);

    }

    function get_emp(id_depart) {
        // alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_emp',
                data: {id_depart: id_depart},
                cache: false,
                success: function (res) {

                    var rows = JSON.parse(res);
                    rows = rows.emp_gehat;
                    if (rows.length > 0) {
                        var options = '<option>- اختر -</option>';
                        for (let i = 0; i < rows.length; i++) {
                            options += ' <option data-img="' + rows[i].person_img + '"\n' +
                                '                                    data-job="' + rows[i].job_title_n + '"\n' +
                                '                                    value="' + rows[i].person_id + '">\n' +
                                '                                ' + rows[i].person_private_name + '</option>';

                        }
                    }
                    $("#user_to").html(options);
                    // $("#user_to").selectpicker("refresh");
                }
            });
        }
    }


</script>