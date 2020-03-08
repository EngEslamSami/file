
<style>
h2.subtitle {
font-size: 20px;
    color: #96c73e;
    font-weight: bold;
    border-right: 9px solid #ffb61e;
    padding-right: 8px;
    line-height: 40px;
}

.omomia-table.table>thead>tr>th, .omomia-table.table>thead>tr>td {
    border-bottom-width: 2px;
    background-color: #ffb61e;
    color: #000;
    text-align: center;
    border-radius: 13px;
}
.omomia-table.table{
border-collapse:separate; 
border-spacing:0.8em;
 }
.omomia-table.table>tbody>tr{
    margin-bottom: 10px;
}
.omomia-table.table>tbody>tr>th, .omomia-table.table>tbody>tr>td {
    border-bottom-width: 2px;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
}
.box-title {
    position: relative;
    background-color: #216b5e;
    color: #fff;
    text-align: center;
    border-radius: 13px;
    padding: 10px 7px;
    font-size: 18px;
    display: inline-block;
    min-width: 300px;
    z-index: 1;
}
.content_page{
    position: relative;
}
.content_page:after {
    position: absolute;
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    border: 3px dotted #999;
    position: absolute;
    top: 40px;
    z-index: 0;
}
.omomia-table.table>tbody>tr>td a{
    color: #fff;
}
.inner-omomia {
    position: relative;
    z-index: 1;
}
.tdicon i{
    font-size: 20px;
}
.omomia-table.table>tbody>tr>td a .badge{
    color: #000;
    background-color: #ffb61e; 
}
.dataTables_wrapper{
    z-index: 1;
}
.dataTables_wrapper .dataTables_filter {
 
    padding-right: 10px;
}
#addSearchInputs{
    display: none;
}
.dataTables_wrapper .dataTables_filter input{
    width: 200px;
}
</style>


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/news'?>">المركز الإعلامى</a></li>
            <li class="active">الأنظمة و اللوائح</li>
        </ol>
    </div>
</section> 

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" id="firstDiv">
            <h4 class="sidebar_title"> المركز الإعلامى </h4>
            <div class="menu_sidebar">
                <ul class="list-unstyled" >
                    <li ><a href="<?=base_url().'Web/news'?>"> أخبار الجمعية </a></li>
                    <li><a href="<?=base_url().'Web/gallery'?>"> مكتبة الصور</a></li>
                    <li><a href="<?=base_url().'Web/videos'?>"> مكتبة الفيديوهات</a></li>
                    <li><a href="#"> الجمعية فى الصحافة</a></li>
                    <li><a href="<?=base_url().'Web/reports'?>"> التقارير</a></li>
                    <li><a href="<?=base_url().'Web/system'?>"> الأنظمة و اللوائح</a></li>
                    <li><a href="<?=base_url().'Web/plans'?>"> الخطة التشغيلية</a></li>
                    <li class="active"><a href="<?=base_url().'Web/mhader_magles'?>"> إجتماعات الجمعية العمومية</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="inner-omomia">
                   <div class="text-center">
                    <h2 class="box-title"> محاضر إجتماعات الجمعية العمومية</h2>
                  </div>
                    <table class="table   table-striped omomia-table"  id="myTable">
                      <thead>
                        <tr>
                          <th style="width: 160px;">رقم الجلسة</th>
                          <th style="width: 160px;">تاريخ الجلسة</th>
                          <th colspan="2">ملف مرفق</th>
                          <th style="width: 140px;">إجراء</th>
                        </tr>
                      </thead>
                      <tbody>
                         <tr>
                           <td class="droid">5468</td>
                           <td class="droid">20/10/2019 م</td>
                           <td><a href="#" class="tdicon"><i class="fa fa-file-pdf-o"></i> اطلاع <span class="badge droid"> عدد مرات المشاهدة 2653 </span></a> </td>
                           <td><a class="tdicon" href="#" download><i class="fa fa-download"></i> تحميل  <span class="badge droid"> عدد مرات التحميل 2565</span></a></td>
                           <td><a href="<?= base_url() .'Web/mhader_magles_page'?>" class="tdicon" ><i class="fa fa-eye"></i> مشاهدة المحضر</a></td>
                         </tr>
                      </tbody>
                      
                      </table>
                    </div>
            </div>
        </div>
    </div>
</section>


 