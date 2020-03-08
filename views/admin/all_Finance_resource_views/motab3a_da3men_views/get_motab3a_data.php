

<?php if(!empty($records)){ ?>
<div class="col-md-12 no-padding" >
    <div class="col-md-3">
        <label for="">تاريخ اليوم</label>
        <input type="text" class="form-control" readonly value="<?php  echo $records->day_date_ar;?>" name="day_date_ar" id="day_date_ar"   >
    </div>
    <div class="col-md-3">
        <label for="">وقت الإتصال</label>
        <input type="time"  class="form-control"  readonly value="<?php echo $records->waqt_etsal;?>" name="waqt_etsal" id="waqt_etsal"  placeholder="">
    </div>
    <div class="col-md-3">
        <label for="">نتيجة الإتصال</label>
        <input type="text" class="form-control"    value="<?php echo $records->natega_etsal;?>" name="natega_etsal" id="natega_etsal"  >
    </div>
    <div class="col-md-3">
        <label for="">إنطباعه عن الجمعية</label>
        <input type="text"  class="form-control"    value="<?php echo $records->entba3_for_gam3ia;?>" name="entba3_for_gam3ia" id="entba3_for_gam3ia"  >
    </div>


    <div class="col-md-4">
        <label for="">رأيه بالخدمة المقدمة له من الجمعية</label>
        <input type="text"  class="form-control"   data-validation="required"  name="opinion_khedma" id="opinion_khedma" value="<?php echo $records->opinion_khedma;?>"  >
    </div>
    <div class="col-md-3">
        <label for="">تقييم الموظف</label>
        <input class="rating"    type="hidden" class="hidden" value="<?php echo $records->emp_taqeem_fk;?>" name="emp_taqeem_fk" >
        <!--<div class="simple-rating star-rating">
            <i class="fa fa-star" data-rating="1"></i>
            <i class="fa fa-star" data-rating="2"></i>
            <i class="fa fa-star" data-rating="3"></i>
            <i class="fa fa-star" data-rating="4"></i>
            <i class="fa fa-star" data-rating="5"></i>
        </div>->

    </div>
    <div class="col-md-4">
        <label for="">ملاحظات</label>
        <input type="text"  class="form-control"     name="notes" id="notes" value="<?php echo $records->notes;?>">
    </div>

</div>
    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/simple-rating.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.rating').rating();
        });

    </script>

<?php } ?>