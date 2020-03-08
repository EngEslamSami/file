<section class="contact-us">
    <div class="container-fluid">
        <div class="xs-heading row xs-mb-60">
            
        </div>
        

        <div class="col-sm-6 padding-30 white_background">
          <div class="col-md-12 alert alert_sucess">
<?php if($this->session->flashdata('message')) { ?>

            	<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>

                <?php } ?>
               <?php echo form_open_multipart('Web/Abstinent')?>
               <div class="form-group">
                    <label class="right main-label col-xs-4 no-padding" >اسم المتعفف</label>
                    <input type="text" name="name" class="form-control col-xs-6 no-padding" data-validation="required" >
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-4 no-padding" >رقم الجوال</label>
                    <input type="number" name="tele" class="form-control col-xs-6 no-padding" data-validation="required" >
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-4 no-padding" >الحاله</label>
                    <input type="text" name="status" class="form-control col-xs-6 no-padding" data-validation="required" >
                </div>
                <div class="form-group">
                    <label class="right main-label col-xs-4 no-padding" >العنوان  </label>
                    <input type="text" name="address" class="form-control col-xs-6 no-padding" data-validation="required" >
                </div>
                
                
                </div>
            <div class="form-group text-center">
                <div class="padding-30">
                  
                    <input  type="submit" name="send" value="اضافه" class="btn btn-default tbra"/>
                </div>
            </div>
             <?php echo form_close()?>
        </div>
        

    </div>
</section>





