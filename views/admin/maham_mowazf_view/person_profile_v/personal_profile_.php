<style type="text/css">
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    .user-profile {
        background-color: #fff;
        padding-bottom: 10px;
    }

    .user-profile .align-center, .user-profile .center {
        text-align: center !important;
    }

    .user-profile .btn.btn-app {
        display: inline-block;
        width: 100px;
        font-size: 18px;
        font-weight: 400;
        color: #FFF;
        text-align: center;
        text-shadow: 0 -1px -1px rgba(0, 0, 0, .2) !important;
        border: none;
        border-radius: 12px;
        line-height: 1.7;
        position: relative;
        margin: 2px;
        padding: 12px 0 8px;
    }

    .user-profile .btn.btn-app.btn-sm {
        width: 100px;
        font-size: 16px;
        border-radius: 10px;
        line-height: 1.5;
    }

    .user-profile .btn.btn-app.btn-light, .btn.btn-app.btn-yellow {
        -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, .08) inset !important;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, .08) inset !important;
    }

    .btn.btn-app.btn-light, .btn.btn-app.btn-light.disabled:hover, .btn.btn-app.btn-light.no-hover:hover {
        background: repeat-x #ededed !important;
        background-image: linear-gradient(tobottom, #F4F4F40, #E6E6E6100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff4f4f4', endColorstr='#ffe6e6e6', GradientType=0) !important;
    }

    .btn-app.btn-grey, .btn-app.btn-grey.disabled:hover, .btn-app.btn-grey.no-hover:hover {
        background: repeat-x #797979 !important;
        background-image: linear-gradient(tobottom, #8989890, #696969100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff898989', endColorstr='#ff696969', GradientType=0) !important;
    }

    .btn.btn-app.btn-yellow, .btn.btn-app.btn-yellow.disabled:hover, .btn.btn-app.btn-yellow.no-hover:hover {
        background: repeat-x #fee088 !important;
        background-image: linear-gradient(tobottom, #FFE8A50, #FCD76A100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffe8a5', endColorstr='#fffcd76a', GradientType=0) !important;
    }

    .btn-app.btn-pink, .btn-app.btn-pink.disabled:hover, .btn-app.btn-pink.no-hover:hover {
        background: repeat-x #d54c7e !important;
        background-image: linear-gradient(tobottom, #DB5E8C0, #CE3970100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffdb5e8c', endColorstr='#ffce3970', GradientType=0) !important;
    }

    .btn-app.btn-success, .btn-app.btn-success.disabled:hover, .btn-app.btn-success.no-hover:hover {
        background: repeat-x #85b558 !important;
        background-image: linear-gradient(tobottom, #8EBF600, #7DAA50100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff8ebf60', endColorstr='#ff7daa50', GradientType=0) !important;
    }

    .btn-yellow, .btn.btn-app.btn-yellow {
        color: #963 !important;
        text-shadow: 0 -1px 0 rgba(255, 255, 255, .4) !important;
    }

    .btn.btn-app.btn-light {
        color: #5A5A5A !important;
        text-shadow: 0 1px 1px #EEE !important;
    }

    .user-profile .bigger-170 {
        font-size: 100% !important;
    }

    .user-profile .blue {
        color: #478FCA !important;
    }

    .user-profile .line-height-1 {
        line-height: 1 !important;
    }

    .user-profile .smaller-90 {
        font-size: 90% !important;
    }

    .user-profile .light-green {
        color: #3fff00;
    }


    /*********/
    .space-12, [class*=vspace-12] {
        max-height: 1px;
        min-height: 1px;
        overflow: hidden;
        margin: 12px 0 11px;
    }

    .space-20, [class*=vspace-20] {
        max-height: 1px;
        min-height: 1px;
        overflow: hidden;
        margin: 20px 0 19px;
    }

    .profile-user-info-striped {
        border: 1px solid #DCEBF7;
    }

    .profile-user-info {
        display: table;
        width: calc(100% - 24px);
        width: 100%;
    }

    tr.detail-row.open, .profile-info-row {
        display: table-row;
    }

    .profile-info-name {
        text-align: right;
        font-weight: 400;
        color: #667E99;
        background-color: transparent;
        width: 110px;
        vertical-align: middle;
        padding: 6px 10px 6px 4px;
    }

    .profile-user-info-striped .profile-info-name {
        color: #336199;
        background-color: #EDF3F4;
        border-top: 1px solid #F7FBFF;
    }

    .accordion-style2.panel-group .panel .panel-body, .accordion-style2.panel-group .collapse.in > .panel-body, .accordion-style2.panel-group .panel-body, .profile-info-row:first-child .profile-info-name, .profile-info-row:first-child .profile-info-value, div.dataTables_scrollBody tbody tr:first-child td, div.dataTables_scrollBody tbody tr:first-child th {
        border-top: none;
    }

    .profile-info-name, .profile-info-value {
        display: table-cell;
        border-top: 1px dotted #D5E4F1;
    }

    .profile-user-info-striped .profile-info-value {
        border-top: 1px dotted #DCEBF7;
        padding-left: 12px;
    }

    .profile-info-value {
        padding: 6px 4px 6px 6px;
    }

    .editable-click {
        border-bottom: 1px dashed #BBB;
        cursor: pointer;
        font-weight: 400;
    }

    /***********/
    .no-border, .accordion-style2.panel-group .panel, .widget-box.transparent, .widget-box.light-border[class*=widget-color-]:not(.fullscreen), .widget-box.no-border, .widget-main .tab-content, .widget-body .wysiwyg-editor {
        border-width: 0;
    }

    .user-profile .widget-box {
        box-shadow: none;
        border: 1px solid #CCC;
        margin: 3px 0;
        padding: 0;
    }

    .user-profile .widget-box.transparent > .widget-header-small {
        padding-left: 1px;
    }

    .user-profile .widget-box.transparent > .widget-header {
        background: 0 0;
        border-bottom: 1px solid #DCE8F1;
        color: #292929;
        padding-left: 3px;
        /* border-width: 0; */
    }

    .user-profile .widget-header-small {
        min-height: 31px;
        padding-left: 10px;
    }

    .user-profile .widget-header {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        position: relative;
        min-height: 38px;
        background: repeat-x #f7f7f7;
        background-image: linear-gradient(tobottom, #FFF0, #EEE100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffeeeeee', GradientType=0);
        color: #669FC7;
        border-bottom: 1px solid #DDD;
        padding-right: 12px;
    }

    .user-profile .widget-header:after, .widget-header:before {
        content: "";
        display: table;
        line-height: 0;
    }

    .user-profile .widget-header:after {
        clear: right;
    }

    .user-profile .widget-header > .widget-title {
        line-height: 36px;
        display: inline;
        margin: 0;
        padding: 0;
    }

    .user-profile h4.smaller {
        font-size: 17px;
    }

    .user-profile .widget-header-small > .widget-title {
        line-height: 30px;
        color: #336199;
    }

    .user-profile .widget-header > .widget-title > .ace-icon {
        margin-right: 5px;
        font-weight: 400;
        display: inline-block;
    }

    .ace-icon, .user-profile td.center, .user-profile th.center, .widget-toolbox.center {
        text-align: center;
    }

    .user-profile .orange {
        color: #FF892A !important;
    }

    .user-profile .widget-header-small > .widget-toolbar {
        line-height: 29px;
    }

    .user-profile .widget-toolbar {
        display: inline-block;
        line-height: 37px;
        float: left;
        position: relative;
        padding: 0 10px;
    }

    .user-profile .widget-toolbar:before {
        display: inline-block;
        content: "";
        position: absolute;
        top: 3px;
        bottom: 3px;
        right: -1px;
        border: 1px solid #D9D9D9;
        border-width: 0 1px 0 0;
    }

    .action-buttons a {
        display: inline-block;
        opacity: .85;
        -webkit-transition: all .1s;
        -o-transition: all .1s;
        transition: all .1s;
        margin: 0 3px;
    }

    .widget-box > .widget-header > .widget-toolbar > .widget-menu > [data-action=reload], .widget-box > .widget-header > .widget-toolbar > [data-action=reload], .widget-color-dark > .widget-header > .widget-toolbar > .widget-menu > [data-action=reload], .widget-color-dark > .widget-header > .widget-toolbar > [data-action=reload] {
        color: #ACD392;
        margin-right: 0;
    }

    .user-profile .widget-toolbar > .widget-menu > a, .user-profile .widget-toolbar > a {
        font-size: 14px;
        display: inline-block;
        line-height: 24px;
        margin: 0 1px;
        padding: 0;
    }

    .user-profile .pink {
        color: #C6699F !important;
    }

    .widget-box.transparent > .widget-body {
        background-color: transparent;
        border-width: 0;
    }

    .tab-content.no-border.padding-8, .widget-main.padding-8, .widget-toolbox.padding-8, .EditTable, .ui-jqdialog-content td.EditButton {
        padding: 8px;
    }

    .ace-scroll, .scroll-content, .nav-scroll.ace-scroll, .nav-scroll.ace-scroll .scroll-content {
        overflow: hidden;
    }

    .scroll-track.scroll-active {
        -webkit-transition: width .25s ease .75s, opacity .25s ease .75s;
        -o-transition: width .25s ease .75s, opacity .25s ease .75s;
        transition: width .25s ease .75s, opacity .25s ease .75s;
    }

    .scroll-track {
        position: absolute;
        top: auto;
        bottom: auto;
        left: 0;
        height: auto;
        background-color: #E7E7E7;
        z-index: 99;
        width: 0;
        opacity: 0;
    }

    .scroll-bar {
        position: absolute;
        top: 0;
        left: 0;
        width: inherit;
        background: #bbd4e5;
    }

    .scroll-content, .itemdiv.memberdiv > .body > .time {
        position: static;
    }

    .profile-activity:first-child {
        border-top: 1px dotted transparent;
    }

    .profile-activity {
        border-bottom: 1px dotted #D0D8E0;
        position: relative;
        border-left: 1px dotted #FFF;
        border-right: 1px dotted #FFF;
        padding: 10px 4px;
    }

    .profile-activity img {
        border: 2px solid #C9D6E5;
        border-radius: 100%;
        max-width: 40px;
        margin-left: 10px;
        margin-right: 0;
        box-shadow: none;
    }

    .profile-activity a.user {
        font-weight: 700;
        color: #09704e;
        font-size: 16px;
    }

    .profile-activity .time {
        display: block;
        margin-top: 4px;
        color: #777;
        font-size: 12px;
    }

    .bigger-110 {
        font-size: 110% !important;
    }

    .profile-activity .tools {
        position: absolute;
        left: 12px;
        bottom: 8px;
        display: none;
    }

    .hr-double {
        height: 3px;
        border-top: 1px solid #E3E3E3;
        border-bottom: 1px solid #E3E3E3;
        border-top-color: rgba(0, 0, 0, .11);
        border-bottom-color: rgba(0, 0, 0, .11);
    }

    .hr-2, .hr2 {
        margin: 2px 0;
    }

    .space-6, [class*=vspace-6] {
        max-height: 1px;
        min-height: 1px;
        overflow: hidden;
        margin: 6px 0 5px;
    }

    .btn-white.btn-primary.active, .btn-white.btn-primary:active, .btn-white.btn-primary:focus, .btn-white.btn-primary:hover, .open > .btn-white.btn-primary.active.dropdown-toggle, .open > .btn-white.btn-primary.dropdown-toggle {
        background-color: #eaf2f8 !important;
        color: #537c9f !important;
        border-color: #8aafce;
    }

    .orange2 {
        color: #FEB902 !important;
    }

    .bigger-150 {
        font-size: 150% !important;
    }

    .profile-picture {
        position: relative;
        border: 1px solid #CCC;
        background-color: #FFF;
        display: inline-block;
        width: 100%;
        max-width: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, .15);
        padding: 4px;
    }

    .profile-picture img {
        margin: auto;
    }

    img.editable-click {
        border: 1px dotted #BBB;
    }

    .editable-click {
        border-bottom: 1px dashed #BBB;
        cursor: pointer;
        font-weight: 400;
    }

    .editable-empty, .editable-empty:focus, .editable-empty:hover {
        font-style: italic;
        color: #D14;
        text-decoration: none;
    }

    .space-4, [class*=vspace-4] {
        max-height: 1px;
        min-height: 1px;
        overflow: hidden;
        margin: 4px 0 3px;
    }

    .label-xlg.arrowed, .label-xlg.arrowed-in {
        margin-left: 7px;
    }

    .badge-info, .badge.badge-info, .label-info, .label.label-info {
        background-color: #3A87AD;
    }

    .label-xlg {
        font-size: 14px;
        line-height: 1.3;
        height: 28px;
        padding: .3em .7em .4em;
    }

    .label.arrowed-in-right {
        position: relative;
    }

    .label.arrowed-in:before, .label.arrowed:before {
        display: inline-block;
        content: "";
        position: absolute;
        top: 0;
        z-index: 0;
        border: 1px solid transparent;
        border-right-color: #ABBAC3;
    }

    .label.arrowed-in-right:after, .label.arrowed-right:after {
        display: inline-block;
        content: "";
        position: absolute;
        top: 0;
        z-index: 0;
        border: 1px solid transparent;
        border-left-color: #ABBAC3;
    }

    .label-info.arrowed-in:before {
        border-color: #3A87AD #3A87AD #3A87AD transparent;
    }

    .label-info.arrowed-in-right:after {
        border-color: #3A87AD transparent #3A87AD #3A87AD;
    }

    .label-xlg.arrowed-in:before {
        left: -7px;
        border-width: 14px 7px;
    }

    .label-xlg.arrowed-in-right:after {
        right: -7px;
        border-width: 14px 7px;
    }

    .user-profile .inline {
        display: inline-block !important;
    }

    .white {
        color: #FFF !important;
    }

    .profile-contact-links {
        border: 1px solid #E0E2E5;
        background-color: #F8FAFC;
        padding: 4px 2px 5px;
    }

    .align-left {
        text-align: left !important;
    }

    .align-right {
        text-align: right !important;
    }

    .user-profile .btn.btn-link {
        background: 0 0 !important;
        color: #08C !important;
        line-height: 20px !important;
        padding: 4px 12px !important;
    }

    .profile-feed {
        height: 400px;
        overflow-y: scroll;
    }

    .hr-dotted, .hr.dotted {
        border-style: dotted;
    }

    .hr-12, .hr12 {
        margin: 12px 0;
    }

    .user-profile .hr {
        display: block;
        height: 0;
        overflow: hidden;
        font-size: 0;
        border-top: 1px solid #E3E3E3;
        border-top-color: rgba(0, 0, 0, .11);
        border-width: 1px 0 0;
        margin: 12px 0;
    }

    .user-profile .grid2:first-child, .user-profile .grid3:first-child, .user-profile .grid4:first-child {
        border-left: none;
    }

    .user-profile .grid2 {
        width: 48%;
    }

    .user-profile .grid2, .user-profile .grid3, .user-profile .grid4 {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: block;
        float: left;
        border-left: 1px solid #E3E3E3;
        margin: 0 1%;
        padding: 0 2%;
    }

    .bigger-175 {
        font-size: 175% !important;
    }

    .profile-picture:hover .changeImg {
        display: block;
    }

    input[type=file].changeImg {
        display: none;
        cursor: pointer;
        width: 150px;
        height: 34px;
        overflow: hidden;
        margin: auto;
        position: absolute;
        top: 41%;
        right: 20%;
    }

    input[type=file].changeImg:before {
        width: 150px;
        height: 32px;
        font-size: 16px;
        line-height: 32px;
        content: 'تغيير الصورة';
        display: inline-block;
        background: white;
        border: 1px solid #000;
        padding: 0 10px;
        text-align: center;
    }

    input[type=file].changeImg::-webkit-file-upload-button {
        visibility: hidden;
    }

    .float-left {
        float: left;
    }

    .user-profile .sidebar-shortcuts {
        overflow: hidden;
        position: relative;
        border-bottom: 1px solid #eee;
        padding: 5px 8px;
        background-color: #ffffff;
        margin-bottom: 10px;
        /* box-shadow: 2px 2px 2px #fcb632; */
        text-align: center;
    }

    .user-profile .sidebar-shortcuts-large {
        /*	line-height: 37px;*/
    }

    .user-profile .sidebar-shortcuts-large > .btn {
        text-align: center;
        width: auto;
        line-height: 30px;
        padding: 0 10px;
        /*border-width: 4px;*/
    }

    .sidebar-shortcuts-large > .btn i {
        margin-left: 7px;
        font-weight: 500 !important
    }

    .user-profile .sidebar-shortcuts-large > .btn:hover,
    .user-profile .sidebar-shortcuts-large > .btn:focus {
        color: #000 !important;
    }
</style>
<?php $currentURL = $this->input->get('my_tab');
?>

<div id="user-profile-1" class="user-profile row" onload="get_tab()">

    <div class="col-xs-12">
        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

                <ul class="nav nav-tabs" role="tablist" id="myTabs">

                    <li role="presentation" class="active">
                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"
                           style="background-color: #85b558;color: #fff;"
                           title="ملف الموظف بالجمعية">
                            <i class="ace-icon fa fa-file-o faa-horizontal animated"></i>
                            ملف الموظف بالجمعية
                        </a>
                    </li>
   <!--                 <li role="presentation">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab"
                           style="background-color: #85b558;color: #fff;"
                           title="ملف الموظف">
                            <i class="ace-icon fa fa-file-o faa-horizontal animated"></i>
                            ملف الموظف
                        </a>
                    </li>
-->
                    <li role="presentation">
                        <a href="#agaza_order" aria-controls="agaza_order" role="tab" data-toggle="tab"
                           style="background-color: #0088b1;color: #fff;" title="طلب أجازة">
                            <i class="ace-icon fa fa-address-card-o faa-vertical animated"></i> طلب أجازة
                        </a>
                    </li>
<!--
                    <button class="btn btn-default" style="background-color: #da9300;color: #fff;" title="الأذونات">
                        <i class="ace-icon fa fa-id-badge faa-shake animated"></i> الأذونات
                    </button>

                    <button class="btn btn-default" style="background-color: #E5343D;color: #fff;"
                            title="المهمات الموظيفية">
                        <i class="ace-icon fa fa-cogs faa-passing animated"></i> المهامات الموظيفية
                    </button>
                    <button class="btn btn-default" style="background-color: #d54c7e;color: #fff;"
                            title="الساعات الإضافية">
                        <i class="ace-icon fa fa-clock-o faa-burst animated"></i> الساعات الإضافية
                    </button>
                    <button class="btn btn-default" style="background-color: #a971a4;color: #fff;"
                            title="ملاحظات شخصية">
                        <i class="ace-icon fa fa-list faa-falling animated"></i> ملاحظات شخصية
                    </button>
                    -->
                </ul>
            </div>


        </div>
    </div>
    <div class="col-xs-12 col-sm-10">

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane <?php if (($currentURL == 'profile') || (empty($currentURL))) {
                echo 'active';
            } ?>" id="profile">
              <!--  <div class="center">
			<span class="btn btn-app btn-sm btn-light no-hover">
				<span class="line-height-1 bigger-170 blue"> 21 يوم </span>

				<br/>
				<span class="line-height-1 smaller-90"> رصيد إجازاتى </span>
			</span>

                    <span class="btn btn-app btn-sm btn-yellow no-hover">
				<span class="line-height-1 bigger-170"> 3 ساعة </span>

				<br/>
				<span class="line-height-1 smaller-90"> رصيد أذونات </span>
			</span>

                    <span class="btn btn-app btn-sm btn-pink no-hover">
				<span class="line-height-1 bigger-170"> 4 </span>

				<br/>
				<span class="line-height-1 smaller-90"> مهامات </span>
			</span>

                    <span class="btn btn-app btn-sm btn-grey no-hover">
				<span class="line-height-1 bigger-170"> 5000 ريال </span>

				<br/>
				<span class="line-height-1 smaller-90"> الراتب </span>
			</span>

                    <span class="btn btn-app btn-sm btn-success no-hover">
				<span class="line-height-1 bigger-170"> 4900 ريال </span>

				<br/>
				<span class="line-height-1 smaller-90"> المستحق </span>
			</span>

                    <span class="btn btn-app btn-sm btn-primary no-hover">
				<span class="line-height-1 bigger-170"> 100 ريال </span>

				<br/>
				<span class="line-height-1 smaller-90"> الخصم </span>
			</span>
                </div>
-->
                <div class="space-12"></div>

                <div class="profile-user-info profile-user-info-striped">
                    <?php if ($_SESSION['role_id_fk'] == 3) {
                        ?>
                        <div class="profile-info-row">

                            <div class="profile-info-name"> كود الوظيفي</div>

                            <div class="profile-info-value">
                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                    <span class="editable" id="username"><?= $person_data->emp_code ?></span>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                    } ?>
                    <div class="profile-info-row">

                        <div class="profile-info-name"> الإسم</div>

                        <div class="profile-info-value">
                            <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->name ?></span>
                            <?php } ?>
                        </div>
                    </div>

                    <?php if ($_SESSION['role_id_fk'] == 3) {
                        ?>
                        <div class="profile-info-row">

                            <div class="profile-info-name"> رقم الجوال</div>

                            <div class="profile-info-value">
                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                    <span class="editable" id="username"><?= $person_data->phone ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="profile-info-row">

                            <div class="profile-info-name"> رقم الهوية</div>

                            <div class="profile-info-value">
                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                    <span class="editable" id="username"><?= $person_data->card_num ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="profile-info-row">

                            <div class="profile-info-name"> المسمي الوظيفي</div>

                            <div class="profile-info-value">
                                <?php if (isset($person_data) && (!empty($person_data))) { ?>
                                    <span class="editable" id="username"><?= $person_data->job ?></span>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                    } ?>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> الإدارة</div>
                        <?php if (isset($person_data) && (!empty($person_data))) { ?>

                            <div class="profile-info-value">
                                <span class="editable"><?= $person_data->edara ?></span>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($_SESSION['role_id_fk'] == 3) {
                        ?>
                        <div class="profile-info-row">

                            <div class="profile-info-name"> القسم</div>

                            <div class="profile-info-value">
                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                    <span class="editable" id="username"><?= $person_data->department ?></span>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                    } ?>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> الدور على النظام</div>

                        <div class="profile-info-value">
                            <?php $rol_arr = array(1 => 'مدير على نظام', 2 => 'عضو مجلس ادارة', 3 => 'موظف علي النظام', 4 => 'عضو جمعية عمومية ', 5 => 'متطوع على نظام ') ?>

                            <span class="editable" id="country"><?= $rol_arr[$_SESSION['role_id_fk']] ?></span>
                        </div>
                    </div>

                </div>

                <div class="space-20"></div>

            </div>
            <div role="tabpanel" class="tab-pane  <?php if ($currentURL == 'agaza_order') {
                echo 'active';
            } ?>" id="agaza_order"></div>
            <div role="tabpanel" class="tab-pane" id="home">...</div>

        </div>


    </div>

    <div class="col-xs-12 col-sm-2 no-padding">
        <div>
			<span class="profile-picture">
				<img id="profile-img-tag" class="editable img-responsive" alt="Alex's Avatar"
                     style="width: 275px;height: 250px;"
                     src="<?php echo base_url() . "uploads/images/profie/thumbs/" . $person_data->user_photo; ?>"
                     onerror="this.src='<?php echo base_url() . "asisst/fav/apple-icon-120x120.png" ?>'"
                />
				<input class="changeImg" type="file" accept="image/*" onchange="loadFile(event) ;">


			</span>

            <div class="space-4"></div>

            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <i class="ace-icon fa fa-circle light-green"></i>
                        <?php if (isset($person_data) && (!empty($person_data))) { ?>
                            <span class="white"><?= $person_data->name ?></span>
                        <?php } ?>
                    </a>

                    <ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
                        <li class="dropdown-header"> تغيير الحالة</li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-circle green"></i>

                                <span class="green">Available</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-circle red"></i>

                                <span class="red">Busy</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-circle grey"></i>

                                <span class="grey">Invisible</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="space-6"></div>

        <div class="profile-contact-info">
            <div class="profile-contact-links align-right">
                <a class="btn btn-link" data-toggle="modal"
                   data-target="#modal-data">
                    <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
                    تعديل بيانات حسابى
                </a>

              <!--  <a href="#" class="btn btn-link">
                    <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                    إرسال رسالة
                </a>

                <a href="#" class="btn btn-link">
                    <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                    
                    www.alexdoe.com
                </a>-->
            </div>

            <div class="space-6"></div>

            <?php
            if ($_SESSION['role_id_fk'] == 3){
            if (isset($person_data) && (!empty($person_data))) { ?>

            <div class="profile-social-links align-center">

                <?php if (isset($person_data) && (!empty($person_data->snap_chat))) { ?>

                    <a href="<?= $person_data->snap_chat ?>" class="tooltip-info" title=""
                       data-original-title="Visit my Facebook">
                        <i class="middle ace-icon fa fa-snapchat-square fa-2x blue"></i>
                    </a>
                <?php } ?>
                <?php if (isset($person_data) && (!empty($person_data->twiter))) { ?>

                    <a href="<?= $person_data->twiter ?>" class="tooltip-info" title=""
                       data-original-title="Visit my Twitter">
                        <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
                    </a>
                <?php } ?>

            </div>
        </div>
        <?php }
        } ?>
<!--
        <div class="hr hr12 dotted"></div>

        <div class="clearfix">
            <div class="grid2">
                <span class="bigger-175 blue">25</span>

                <br/>
                نشاط من الآخرين
            </div>

            <div class="grid2">
                <span class="bigger-175 blue">12</span>

                <br/>
                نشاط لك
            </div>
        </div>

        <div class="hr hr16 dotted"></div>
        -->
    </div>


</div>
<div class="modal fade " id="modal-data" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document">
        <div class="modal-content ">
            <div class="modal-header ">

                <h1 class="modal-title">تعديل البيانات الشخصية </h1>
            </div>
            <div class="modal-body row">
                <?php echo form_open_multipart("person_profile/Personal_profile/update_users/" . $person_data->user_id); ?>
                <!--------------------------------------------------------------->

                <div class="col-sm-12 col-xs-12">

                    <div class="col-sm-10 col-xs-12">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">إسم المستخدم </label>
                            <input type="text" class="form-control   " id="user_name"
                                   name="user_name" data-validation="required"
                                   value="<?= $person_data->user_name ?>">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">رقم الجوال </label>
                            <input type="number" class="form-control    " name="user_phone"
                                   placeholder=" رقم الجوال" value="<?= $person_data->user_phone ?>"
                                   data-validation="required">
                        </div>

                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">رقم الهوية </label>
                            <input type="number" name="id_number" id="id_number" data-validation="required"
                                   value="<?= $person_data->user_id_number ?>"
                                   class="form-control  " placeholder=" رقم الهوية"/>
                        </div>

                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label "> كلمة المرور <strong></strong> </label>
                            <input type="password" id="user_pass" class="form-control  "
                                   name="user_pass"
                                   onkeyup="return valid('validate1','user_pass','button_update');"
                                   autocomplete="off" placeholder=" كلمه المرور "/>
                            <span id="validate1" class="span-validation"></span>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">تاكيد كلمة المرور <strong></strong> </label>
                            <input type="password" id="user_pass_validate" class="form-control  "
                                   placeholder="تأكيد كلمة المرور"
                                   onkeyup="return valid2('validate','user_pass_validate','button_update','user_pass');"/>
                            <span id="validate" class="span-validation"> </span>
                        </div>
                    </div>

                    <div class="col-sm-2 col-xs-12">
                        <?php if (file_exists("uploads/images/" . $person_data->user_photo)) { ?>
                            <div class="form-group">
                                <img style="width: 100px;" class="media-object img-circle"
                                     src="<?php echo base_url() . "uploads/images/profie/" . $person_data->user_photo; ?>"
                                     accesskey=""
                                     onerror="this.src='<?php echo base_url() . "asisst/fav/apple-icon-120x120.png" ?>'">
                            </div>
                        <?php } ?>

                        <input type="file" name="user_photo" class="form-control "/>
                        <small class="small" style="bottom:-13px;">
                            <?php if (file_exists("uploads/images/profie/" . $person_data->user_photo)) { ?>
                            <?php } else { ?>
                                برجاء إرفاق صورة
                            <?php } ?>
                        </small>
                    </div>
                </div>


                <!--------------------------------------------------------------->
            </div>

            <div class="modal-footer ">
                <input type="hidden" name="role_id_fk" value="1">
                <button type="submit" name="ADD" value="ADD" id="button_update"
                        class="btn btn-labeled btn-success "
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
                <?php echo form_close() ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>-->

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('profile-img-tag');
        output.src = URL.createObjectURL(event.target.files[0]);
        console.log('file :' + output.src);
        console.log('file :' + event.target.files[0].name);
        upload_img(event.target.files[0]);

    };
</script>

<script>

    function upload_img(obj) {


        var files = obj;
        var error = '';
        var form_data = new FormData();
        // for(var count = 0; count<files.length; count++)
        // {
        var name = files.name;


        var extension = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            error += "Invalid   Image File"
        } else {
            form_data.append("files", files);
            form_data.append("id", '<?=$person_data->user_id?>');
        }
        // }
        if (error == '') {

            $.ajax({
                url: "<?php echo base_url(); ?>person_profile/Personal_profile/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#images').html('<img src="<?php echo base_url();?>asisst/web_asisst/img/material-loader.gif">');
                },
                success: function (data) {
                    // alert(data);

                    //$('#images').show();
                    $('#images').html(data);


                }
            })

        }


    }


</script>

<script>
    function valid(div1, div2, button) {
        if ($("#" + div2).val().length < 4) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور اكثر من اربع حروف';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 4 && $("#user_pass").val().length < 10) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور ضعيفة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 10) {
            document.getElementById(div1).style.color = '#00FF00';
            document.getElementById(div1).innerHTML = 'كلمة المرور قوية';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
    }

    function valid2(div2, div3, button, input) {
        if ($("#" + input).val() == $("#" + div3).val()) {
            document.getElementById(div2).style.color = '#00FF00';
            document.getElementById(div2).innerHTML = 'كلمة المرور متطابقة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById(div2).style.color = '#F00';
            document.getElementById(div2).innerHTML = 'كلمة المرور غير متطابقة';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
    }

</script>


<script>
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };
    $(window).load(function () {
        var pathname = window.location.href;
        var tab = getUrlParameter('my_tab');
        if (tab) {

            if (tab === 'agaza_order') {

                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url();?>maham_mowazf/talabat/agazat/Vacation/add_vacation",
                    data: {from_profile: 1},
                    success: function (d) {
                        $('#agaza_order').html(d);
                        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                            e.target // newly activated tab
                            e.relatedTarget // previous active tab
                        });
                        console.log('profile agaza ');
                    }
                });
            }

        }
    });

</script>

<script>
    $('#myTabs a[href="#agaza_order"]').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/agazat/Vacation/add_vacation",
            data: {from_profile: 1},
            success: function (d) {
                $('#agaza_order').html(d);
                $(this).tab('show');
                console.log('profile agaza ');
            }
        });
    });
    $('#myTabs a[href="#profile"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#myTabs a[href="#home"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    function edite_agaza(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/edit_vacation",
            data: {id: id},
            success: function (d) {
                $('#agaza_order').html(d);
                $(this).tab('show');
                console.log('profile agaza ');
            }
        });
    }
</script>
