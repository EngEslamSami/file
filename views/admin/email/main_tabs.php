<style>
/************** message *************/

.r-message-right {
    padding: 0 5px 0 4px;
    border-left: 1px solid #999;
    /* border: 1px solid #eee; */
    background-color: #fff;
    /* box-shadow: 2px 1px 2px 2px #d6d3d3; */
}
.r-message-right h3 {
    padding: 10px;
    background-color: #c72530;
    color: #fff;
    font-weight: bold;
    font-size: 15px;
    border-radius: 7px;
}

.r-message-right h4 {
    font-size: 15px;
    margin-top: 30px;
    margin-bottom: 40px;
    font-weight: bold;
}

.r-message-right h4 .r-numb {
    color: #fff;
    padding: 5px 6px;
    background-color: #34b55e;
    margin-top: -4px;
    /*float: left;*/
    border-radius: 5px;
}

.r-message-right .r-ms-icon {
    font-size: 16px;
    padding-left: 5px;
}

.r-message-left h3 {
    font-size: 16px;
    font-weight: bold;
    padding-bottom: 20px;
}

.r-message-left input {
    padding: 10px;
    margin-bottom: 0px;
    height: auto;
    font-size: 16px;
}

.r-add-mes {
    padding-left: 10px;
}
.nashwa{
    color:rgb(87, 87, 87); 
}
.nashwa:link{
    text-decoration: none;
}
.nashwa:visited {
    color: rgb(87, 87, 87);
}
.nashwa:hover {
    color: rgb(87, 87, 87);
}
input, select, textarea{
    border: 1px solid #ccc;
}
</style>

<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title;?></h3>
    </div>
    <div class="panel-body">

                        <div class="col-md-2 r-message-right" id="right_content_message">
                            <br />
                            <a class="btn btn-danger m-b-20 p-10  waves-effect waves-light" style="width: 85%" href="<?php echo base_url()?>Emails/inbox/new/0">
                                إنشاء 
                            </a>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails/inbox_table/emails_to_me' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-envelope-square" aria-hidden="true"  style="color:#0044cc  "></i></span> البريد الوارد
                                <?php if(isset($this->email_count[0]))if($this->email_count[0]->to_me > 0){ ?> <span class="r-numb badge badge-success ml-auto">  <?php echo $this->email_count[0]->to_me ?>  </span> <?php } ?>
                                </a>
                            </h4>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails/inbox_table/emails_sent' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-paper-plane" aria-hidden="true" style="color:#00CC00  "></i></span> البريد المرسل
                                </a>
                            </h4>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails/inbox_table/deleted' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-trash" aria-hidden="true" style="color: #ff0000"></i></span> المحذوفات
                                <?php if(isset($this->email_count[0]))if($this->email_count[0]->deleted > 0){ ?><span class="r-numb badge badge-success ml-auto">  <?php echo $this->email_count[0]->deleted ?>  </span> <?php } ?>
                                </a> 
                            </h4>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails/inbox_table/starred' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-star" style="color: #ffbc34;" aria-hidden="true"></i></span> البريد المفضل 
                                <?php if(isset($this->email_count[0]))if($this->email_count[0]->starred > 0){ ?><span class="r-numb badge badge-success ml-auto">  <?php echo $this->email_count[0]->starred ?>  </span> <?php } ?>
                                </a> 
                            </h4>
                        </div>