

<!--
<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li class="active"><a href="#">اتصل بنا</a></li>
        </ol>
    </div>
</section>-->

<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="background-white content_page">
            <div class="well well-sm">إتصل بنا</div>
            <?php
            echo form_open('Web/contact');
            ?>

                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>الإسم ثلاثى *</label>
                    <input type="text" name="name" class="form-control" placeholder="" data-validation="required">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>البريد الإلكتروني *</label>
                    <input type="email" name="email" class="form-control" placeholder="" data-validation="required">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>رقم الجوال *</label>
                    <input type="number" name="phone" class="form-control" placeholder="" data-validation="required">
                </div>
                <div class="form-group col-xs-12">
                    <label>العنوان *</label>
                    <input type="text" name="address" class="form-control" placeholder="" data-validation="required">
                </div>
                <div class="form-group col-xs-12">
                    <label>الرسالة *</label>
                    <textarea  name="message" class="form-control" placeholder="" style="height: 150px" data-validation="required"></textarea>
                </div>
                <div class="form-group col-xs-12">
                   <!-- <button class="btn btn-success mtop-10" href="#"> أرسل </button> -->
                    <input type="submit" class="btn btn-success mtop-10" name="ADD" value="أرسل">
                </div>
            <?php
            echo form_close();
            ?>

        </div>
    </div>
</section>




