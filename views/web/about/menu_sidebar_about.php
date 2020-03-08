<div class="menu_sidebar">
    <ul class="list-unstyled">
        <?php if ((isset($this->pages_data)) && (!empty($this->pages_data))) {
            foreach ($this->pages_data as $page) {
                if ($id_page == $page->id) {
                    $class = 'active';
                } else {
                    $class = '';
                }
                ?>
                <li class="<?= $class ?>"><a
                        href="<?= base_url() . 'Web/about_us/' . base64_encode($page->id) ?>"><i class="fa fa-file-o"></i> <?= $page->page_title ?> </a>
                </li>

                <?php
            }
        } ?>
        <li class="<?php  if ($id_page =='managment_members' )echo  'active';else echo ''; ?>"><a href="<?= base_url() . 'Web/managment_members' ?>"><i class="fa fa-users"></i>  أعضاء مجلس الإدارة</a></li>
        <li class="<?php  if ($id_page =='omamia_members' )echo  'active';else echo ''; ?>"><a href="<?= base_url() . 'Web/omamia_members' ?>"><i class="fa fa-users"></i>  أعضاء الجمعية العمومية</a></li>
        <li class="<?php  if ($id_page =='managment_general' )echo  'active';else echo ''; ?>"><a href="<?= base_url() . 'Web/managment_general' ?>"><i class="fa fa-users"></i>  الإدارة التنفيذية</a></li>
        <li class="<?php  if ($id_page == 'StructureModel')echo  'active';else echo ''; ?>"><a href="<?= base_url() . 'Web/structure' ?>"><i class="fa fa-cubes"></i>  الهيكل التنظيمي العام</a></li>
    </ul>
</div>