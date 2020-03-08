
<?php if (isset($replays) && !empty($replays)) {  foreach ($replays as $item) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">


      <span class="bg-green badge avatar-text">
       <i class="fa fa-paper-plane" aria-hidden="true"></i>
      المرسل  </span>
            <?php echo $item->emp_name; ?>
            <span class="bg-green badge avatar-text" style="float: left">
      <i class="fa fa-calendar" aria-hidden="true"></i>

                <?php echo date('Y-m-d', strtotime($item->time_replay)); ?>    </span>
            <span class="bg-green badge avatar-text" style="float: left">

<i class="fa fa-clock-o" aria-hidden="true"></i>

                <?php echo date('g:i a', strtotime($item->time_replay)); ?>     </span>
        </div>
        <div class="panel-body">
            <div class="inbox-avatar">


                <img src="<?php if (isset($item->emp_photo) && $item->emp_photo != null) {
                    echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $item->emp_photo;
                } else {
                    echo base_url() . 'asisst/admin_asset/img/avatar5.png';
                }
                ?>"
                     class="border-green hidden-xs hidden-sm" alt="">
                <div class="inbox-avatar-text">
                    <div class="avatar-name"></div>
                    <div>
                        <small><span class="bg-green badge avatar-text"></span>
                            <span><span style="color: black;">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                            <?php echo $item->comment ?>
</span></span>
                        </small>
                    </div>
                </div>

            </div>

        </div>
    </div>

<?php }}
?>