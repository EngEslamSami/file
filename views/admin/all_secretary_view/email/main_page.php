<div class="col-xs-12 no-padding">
    <div class="col-md-2 padding-4">
        <?php //main_page

            $this->load->view('admin/all_secretary_view/email/main_tabs');

        ?>
    </div>
    <div class="col-md-10 padding-4" id="page_content">

    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function () {
        <?php if(isset($notifi) && !empty($notifi)){
        if (($notifi == 1)){
        ?>
        get_my_emails('page_content', 'my_emails');
        <?php }elseif (($notifi == 2)) { ?>
        get_my_emails('page_content', 'my_sent_emails');
        <?php }
        }else{ ?>
        get_emails('page_content');
        <?php }?>
    });
    /*$(document).ready(function () {
        console.warn('notifiii ');

       <?php if(isset($notifi)&&!empty($notifi)&&($notifi==1))
        {?>
            console.warn('notifiii  if <?=$notifi?>');
            
            get_my_emails('page_content','my_emails');  
            <?php }
        else
        {?>
            console.warn('else  ');
            
        get_emails('page_content');
        <?php }?>
    });*/
</script>


<script>

    function get_my_emails(div_id,method) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/email/Emails/"+method,
            beforeSend: function () {
                $('#'+div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#'+div_id).html(d);
                // $('.selectpicker').selectpicker("refresh");
                // reset_file_input('file');
            }
        });
    }

</script>
