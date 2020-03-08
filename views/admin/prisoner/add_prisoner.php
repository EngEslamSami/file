<?php if(isset($result_id) && !empty($result_id) && $result_id!=null ):
    $out['form']='Prisoner/update_prisoner/'.$result_id['id'];
    $out['nazeel_code']=$result_id["nazeel_code"];
    $out['no3_sgen']=$result_id["no3_sgen"];
    $out['nazeel_name']=$result_id["nazeel_name"];
    $out['date_birth']=date('Y-m-d',$result_id["date_birth"]);
    $out['nazeel_job']=$result_id["nazeel_job"];
    $out['dakhl']=$result_id["dakhl"];
    $out['dakhl_masdr']=$result_id["dakhl_masdr"];
    $out['enfaq']=$result_id["enfaq"];
    $out['another_resources']=$result_id["another_resources"];
    $out['naseeb_frd']=$result_id["naseeb_frd"];
    $out['sgl_mdny']=$result_id["sgl_mdny"];
    $out['sgl_date']=date('Y-m-d',$result_id["sgl_date"]);
    $out['sgl_source']=$result_id["sgl_source"];
    $out['deposit_date'] =date('Y-m-d',$result_id["deposit_date"]);
    $out['case_type']=$result_id["case_type"];
    $out['prisoner_phone']=$result_id["prisoner_phone"];
    $out['eda3_date']=date('Y-m-d',$result_id["eda3_date"]);
    $out['efrag_date']=date('Y-m-d',$result_id["efrag_date"]);
    $out['zawga']=$result_id["zawga"];
    $out['ebn']=$result_id["ebn"];
    $out['bent']=$result_id["bent"];
    $out['osra_mnzl']=$result_id["osra_mnzl"];
    $out['mnzl_egar']=$result_id["mnzl_egar"];
    $out['address']=$result_id["address"];
    $out['skn_phone']=$result_id["skn_phone"];
    $out['omda_name']=$result_id["omda_name"];
    $out['omda_number']=$result_id["omda_number"];
    $out['img']=$result_id["img"];
    $out['input']='update';
    $out['input_title']='تعديل ';
else:
    $out['form']='Prisoner/add_prisoner';
    $out['nazeel_code']=$prisoner_last+1;
    $out['no3_sgen']='';
    $out['nazeel_name']='';
    $out['date_birth']='';
    $out['nazeel_job']='';
    $out['dakhl']='';
    $out['dakhl_masdr']='';
    $out['enfaq']='';
    $out['another_resources']='';
    $out['naseeb_frd']='';
    $out['sgl_mdny']='';
    $out['sgl_date']='';
    $out['sgl_source']='';
    $out['deposit_date'] = '';
    $out['case_type']='';
    $out['prisoner_phone']='';
    $out['eda3_date']='';
    $out['efrag_date']='';
    $out['zawga']='';
    $out['ebn']='';
    $out['bent']='';
    $out['osra_mnzl']='';
    $out['mnzl_egar']='';
    $out['address']='';
    $out['skn_phone']='';
    $out['omda_name']='';
    $out['omda_number']='';
    $out['img']='';
    $out['input']='add';
    $out['input_title']='حفظ ';
endif?>
<div class="col-sm-12  ">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?></h3>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart($out['form'])?>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">كود النزيل</label>
                    <input type="text" name="nazeel_code" readonly value="<?php echo $out['nazeel_code']?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">إسم النزيل</label>
                    <input type="text" name="nazeel_name" value="<?php echo $out['nazeel_name']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">رقم السجل</label>
                    <input type="number"  id="edValue" onKeyUp="edValueKeyPress()" name="sgl_mdny" value="<?php echo $out['sgl_mdny']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
               <div id="show_option"></div>
                </div>
                <div id="mahmoud"></div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">نوع السجين</label>
                    <select  name="no3_sgen"  class="choose-date  form-control half"  data-validation="required"   data-show-subtext="true" >
                        <?php if(isset($result_id) && !empty($result_id) && $result_id!=null){?>
                            <?php if($out['no3_sgen']==1){ ?>
                            <option value="0"> سجين  قديم   </option>
                            <option value="1" selected> سجين جديد   </option>
                                <?php }elseif($out['no3_sgen']== 0){?>
                                <option value="0" selected> سجين  قديم   </option>
                                <option value="1" > سجين جديد   </option>
                              <?php }}else{ ?>
                            <option value=""> إختر   </option>
                            <option value="0"> سجين  قديم   </option>
                            <option value="1"> سجين جديد   </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">تاريخ الميلاد</label>
                 <!--   <input type="text" name="date_birth" value="<?php /*echo $out['date_birth']; */?>"  class="form-control half some_class input-style" placeholder="أدخل البيانات" data-validation="required">
                 -->   <input type="text"  name="date_birth" value="<?php echo $out['date_birth']; ?>" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">المهنة</label>
                    <input type="text" name="nazeel_job" value="<?php echo $out['nazeel_job']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">الجنسية</label>
                    <select  name="nationality"  class="choose-date  form-control half"  data-validation="required"   data-show-subtext="true" >
                        <?php if(isset($result_id) && !empty($result_id) && $result_id!=null){?>
                        <?php if($out['nationality']==1){ ?>
                                <option value="0" > سعودي   </option>
                                <option value="1" selected> مقيم   </option>
                        <?php }elseif($out['nationality']==0){ ?>
                                <option value="0" selected> سعودي   </option>
                                <option value="1"> مقيم   </option>
                        <?php }}else{ ?>
                            <option value=""> إختر   </option>
                            <option value="0"> سعودي   </option>
                            <option value="1"> مقيم   </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">الدخل</label>
                    <input type="number" name="dakhl" value="<?php echo $out['dakhl']; ?>"  class="form-control  input-style col-sm-6" style="width: 40%" placeholder="أدخل البيانات" data-validation="required">
                    <label class="label label-green  pull-left ">ريال</label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">مصدر الدخل</label>
                    <input type="text" name="dakhl_masdr" value="<?php echo $out['dakhl_masdr']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">جهة الإنفاق</label>
                    <input type="text" name="enfaq" value="<?php echo $out['enfaq']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">مصادر أخري</label>
                    <input type="text" name="another_resources" value="<?php echo $out['another_resources']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">نصيب الفرد</label>
                    <input type="number" name="naseeb_frd" value="<?php echo $out['naseeb_frd']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">تاريخ السجل</label>
                <!--    <input type="text" name="sgl_date" value="<?php /*echo $out['sgl_date']; */?>"  class="form-control half some_class input-style" placeholder="أدخل البيانات" data-validation="required">
                -->    <input type="text"  name="sgl_date" value="<?php echo $out['sgl_date']; ?>" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">

                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">مصدر السجل</label>
                    <input type="text" name="sgl_source" value="<?php echo $out['sgl_source']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">تاريخ التسجيل</label>
                   <!-- <input type="text" name="deposit_date" value="<?php /*echo $out['deposit_date']; */?>"  class="form-control half some_class input-style" placeholder="أدخل البيانات" data-validation="required">
                   --> <input type="text"  name="deposit_date" value="<?php echo $out['deposit_date']; ?>" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">
                </div>
                <div  class="form-group col-sm-6" >
                    <label class="label label-green  half">نوع القضية</label>
                    <select  name="case_type"   class="choose-date form-control half"   data-validation="required"    data-show-subtext="true" >
                        <option value=""> إختر   </option>
                        <?php
                        if(isset($cases) && !empty($cases) && $cases!=null):
                            foreach ($cases as $re) :
                                $select=""; if(isset($result_id) ){if($re->id == $out['case_type']){$select='selected="selected"';}}
                                ?>
                                <option  value="<?php echo $re->id?>" <?php echo  $select?>> <?php echo $re->name?></option>
                            <?php endforeach;
                        endif;
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">جوال السجين</label>
                    <input type="number" name="prisoner_phone" value="<?php echo $out['prisoner_phone']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">تاريخ إيداعه بالسجن</label>
                    <input type="text"  name="eda3_date" value="<?php echo $out['eda3_date']; ?>" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">
              <!--      <input type="text" name="eda3_date" value="<?php /*echo $out['eda3_date']; */?>"  class="form-control some_class half input-style" placeholder="أدخل البيانات" data-validation="required">
              -->  </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">تاريخ الإفراج</label>
                    <input type="text"  name="efrag_date" value="<?php echo $out['efrag_date']; ?>" class="form-control   half docs-date"  placeholder="يوم/ شهر/سنة " required="">
<!--
                    <input type="text" name="efrag_date" value="<?php /*echo $out['efrag_date']; */?>"  class="form-control some_class half input-style" placeholder="أدخل البيانات" data-validation="required">
              -->  </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">الزوجة</label>
                    <select  name="zawga"  id="zawga" class="choose-date  form-control half" onclick="zawgaaa()"  data-validation="required"   data-show-subtext="true" >
                        <?php if(isset($result_id) && !empty($result_id) && $result_id!=null){?>
                            <?php if($out['zawga']==1){ ?>
                                <option value="0" > لا يوجد   </option>
                                <option value="1" selected> يوجد   </option>
                            <?php }elseif($out['zawga']==0){ ?>
                                <option value="0" selected> لا يوجد   </option>
                                <option value="1"> يوجد   </option>
                            <?php }}else{ ?>
                            <option value=""> إختر   </option>
                            <option value="0"> لا يوجد   </option>
                            <option value="1"> يوجد   </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-6" id="zawga_div"  <?php if($out['zawga']!=1){ ?> style="display: none" <?php } ?>>
                    <label class="label label-green  half">عدد الزوجات</label>
                    <input type="number" id="zawga_option"  name="zawga_option" <?php if(isset($result_id) && !empty($result_id) && $result_id!=null) { ?>  <?php } ?>min="1" max="4" onkeyup="return lood($('#zawga_option').val(),'#optionearea2','zawga_option');" class="form-control half input-style" placeholder="   أقصى عدد 4" >
                </div>
                <div  id="optionearea2"></div>
                <?php if(isset($result_id['zawgat']) && !empty($result_id['zawgat']) && $result_id['zawgat']!=null) { ?>
                <div class="form-group col-sm-6" id="zawga_div_edit">
                    <?php
                    $zawget = unserialize($result_id['zawgat']);
                    if ($zawget) {
                        echo '<table  class=" display table table-bordered   responsive nowrap" cellspacing="0" "  >
                      <thead>';
                        for ($x = 0; $x < count($zawget); $x++) {
                            if (count($zawget) > 1) {
                                $td = '<td style="padding-top: 10%px;">
                               <a  href="' . base_url() . 'Prisoner/delete_zawg/' . $result_id['id'] . '/' . $x . '"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                            } else
                                $td = '';
                            $zowg = $zawget[$x];
                            echo '<tr class="">
                          <td class="text-center">
      <input  name="" value="'.$zowg.'"  class="form-control half input-style" placeholder="" data-validation="required" readonly>
                  
                          </td>
                          ' . $td . '
                          </tr>';
                        }
                        echo '</thead></table>';
                    }
                ?>
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">البنين</label>
                    <select  name="ebn"  id="ebn" class="choose-date  form-control half" onclick="ebnnn()"  data-validation="required"   data-show-subtext="true" >
                        <?php if(isset($result_id) && !empty($result_id) && $result_id!=null){?>
                            <?php if($out['ebn']==1){ ?>
                                <option value="0" > لا يوجد   </option>
                                <option value="1" selected> يوجد   </option>
                            <?php }elseif($out['ebn']==0){ ?>
                                <option value="0" selected> لا يوجد   </option>
                                <option value="1"> يوجد   </option>
                            <?php }}else{ ?>
                            <option value=""> إختر   </option>
                            <option value="0"> لا يوجد   </option>
                            <option value="1"> يوجد   </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-6" id="ebn_div"  <?php if($out['ebn']!=1){ ?> style="display: none" <?php } ?>>
                    <label class="label label-green  half">عدد البنين</label>
                    <input type="number" id="ebn_option"  name="ebn_option" min="1" max="4" onkeyup="return lood_ebn($('#ebn_option').val(),'#optionearea3','ebn_option');" class="form-control half input-style" placeholder="   أقصى عدد 4" >
                </div>
                <div  id="optionearea3"></div>
                <?php if(isset($result_id['bnen']) && !empty($result_id['bnen']) && $result_id['bnen']!=null) { ?>
                <div class="form-group col-sm-6" id="ebn_div_edit">
                    <?php
                    $benen = unserialize($result_id['bnen']);
                    if ($benen) {
                        echo '<table class=" display table table-bordered   responsive nowrap" cellspacing="0"  >
                      <thead>';
                        for ($x = 0; $x < count($benen); $x++) {
                            if (count($benen) > 1) {
                                $td = '<td style="padding-top: 10%px;">
                               <a  href="' . base_url() . 'Prisoner/delete_bnen/' . $result_id['id'] . '/' . $x . '"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                            } else
                                $td = '';
                            $been = $benen[$x];
                            echo '<tr class="">
                          <td class="text-center">
      <input  name="" value="'.$been.'"  class="form-control half input-style" placeholder="" data-validation="required" readonly>
                  
                          </td>
                          ' . $td . '
                          </tr>';
                        }
                        echo '</thead></table>';
                    }
                    ?>
                    </div>
                <?php } ?>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">البنات</label>
                    <select  name="bent" id="bent"  class="choose-date  form-control half"  onclick="benttt()" data-validation="required"   data-show-subtext="true" >
                        <?php if(isset($result_id) && !empty($result_id) && $result_id!=null){?>
                            <?php if($out['bent']==1){ ?>
                                <option value="0" > لا يوجد   </option>
                                <option value="1" selected> يوجد   </option>
                            <?php }elseif($out['bent']==0){ ?>
                                <option value="0" selected> لا يوجد   </option>
                                <option value="1"> يوجد   </option>
                            <?php }}else{ ?>
                            <option value=""> إختر   </option>
                            <option value="0"> لا يوجد   </option>
                            <option value="1"> يوجد   </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-6" id="bent_div"  <?php if($out['bent']!=1){ ?> style="display: none" <?php } ?>>
                    <label class="label label-green  half">عدد البنات</label>
                    <input type="number" id="bent_option"  name="bent_option" min="1" max="4" onkeyup="return lood_bent($('#bent_option').val(),'#optionearea4','bent_option');" class="form-control half input-style" placeholder="   أقصى عدد 4" >
                </div>
                <div  id="optionearea4"></div>
                <?php if(isset($result_id['bnat']) && !empty($result_id['bnat']) && $result_id['bnat']!=null) { ?>
                    <div class="form-group col-sm-6" id="bent_div_edit">
                        <?php
                        $bentat = unserialize($result_id['bnat']);
                        if ($bentat) {
                            echo '<table class=" display table table-bordered   responsive nowrap" cellspacing="0"  >
                      <thead>';
                            for ($x = 0; $x < count($bentat); $x++) {
                                if (count($bentat) > 1) {
                                    $td = '<td style="padding-top: 10%px;">
                               <a  href="' . base_url() . 'Prisoner/delete_bnat/' . $result_id['id'] . '/' . $x . '"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                                } else
                                    $td = '';
                                $benty = $bentat[$x];
                                echo '<tr class="">
                          <td class="text-center">
      <input  name="" value="'.$benty.'"  class="form-control half input-style" placeholder="" data-validation="required" readonly>
                  
                          </td>
                          ' . $td . '
                          </tr>';
                            }
                            echo '</thead></table>';
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">منزل الأسرة</label>
                    <select  name="osra_mnzl" id="osra_mnzl" onclick="asd()"  class="choose-date  form-control half"  data-validation="required"   data-show-subtext="true" >
                        <?php if(isset($result_id) && !empty($result_id) && $result_id!=null){?>
                            <?php if($out['osra_mnzl']==1){ ?>
                                <option value="1" selected> فيلا   </option>
                                <option value="2"> بيت شعبي   </option>
                                <option value="3"> شقة   </option>
                                <option value="4"> ملك   </option>
                                <option value="5"> مستأجر   </option>
                            <?php }elseif($out['osra_mnzl']==2){ ?>
                                <option value="1"> فيلا   </option>
                                <option value="2" selected> بيت شعبي   </option>
                                <option value="3"> شقة   </option>
                                <option value="4"> ملك   </option>
                                <option value="5"> مستأجر   </option>
                            <?php }elseif($out['osra_mnzl']==3){ ?>
                                <option value="1"> فيلا   </option>
                                <option value="2"> بيت شعبي   </option>
                                <option value="3" selected> شقة   </option>
                                <option value="4"> ملك   </option>
                                <option value="5"> مستأجر   </option>
                            <?php }elseif($out['osra_mnzl']==4){ ?>
                                <option value="1"> فيلا   </option>
                                <option value="2"> بيت شعبي   </option>
                                <option value="3"> شقة   </option>
                                <option value="4" selected> ملك   </option>
                                <option value="5"> مستأجر   </option>
                            <?php }elseif($out['osra_mnzl']==5){ ?>
                                <option value="1"> فيلا   </option>
                                <option value="2"> بيت شعبي   </option>
                                <option value="3"> شقة   </option>
                                <option value="4"> ملك   </option>
                                <option value="5" selected> مستأجر   </option>
                            <?php }}else{ ?>
                            <option value=""> إختر   </option>
                            <option value="1"> فيلا   </option>
                            <option value="2"> بيت شعبي   </option>
                            <option value="3"> شقة   </option>
                            <option value="4"> ملك   </option>
                            <option value="5"> مستأجر   </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-6" id="mnzl_egar" <?php if($out['osra_mnzl']!=5){ ?> style="display: none" <?php } ?>>
                    <label class="label label-green  half">قيمة الإيجار</label>
                    <input type="number" name="mnzl_egar"  value="<?php echo $out['mnzl_egar']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" >
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">عنوان سكن الأسرة</label>
                    <input type="text" name="address" value="<?php echo $out['address']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">هاتف السكن</label>
                    <input type="number" name="skn_phone" value="<?php echo $out['skn_phone']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">العمدة</label>
                    <input type="text" name="omda_name" value="<?php echo $out['omda_name']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">جوال العمدة</label>
                    <input type="number" name="omda_number" value="<?php echo $out['omda_number']; ?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
            </div>
            <div class="col-sm-12">
                        <div class="form-group col-sm-6 col-xs-12">
                            <label class="label label-green  half"> صورة المستخدم   </label>
                            <input type="file" name="img" class="form-control half input-style" placeholder="أدخل البيانات" />
                            <?php if(isset($out['img']) && !empty($out['img']) && $out['img']!=null ): ?>
                                <span  id="" class="help-block text-danger">لعدم تغير الصورة لاتختار شيء</span>
                            <?php endif; ?>
                        </div>
                        <?php if(isset($out['img']) && !empty($out['img']) && $out['img']!=null ): ?>
                            <div class="form-group col-sm-6 col-xs-12">
                                <img src="<?php echo base_url()."uploads/images/".$out['img']?>" class="img-circle" alt="User Image" width="50" height="50"/>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-12">
                        <button   id="button" type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-purple w-md m-b-5">
                            <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
                    </div>
                    <?php echo form_close()?>
                    <?php if(isset($per_table ) && $per_table!=null && !empty($per_table)):?>
                        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم السجين</th>
                                <th>التحكم</th>
                            </tr>
                            </thead>
                            <?php $x = 0; foreach($per_table as $record):?>
                                <tr>
                                    <td data-title="#"></td>
                                    <td data-title="العنوان"> <?php echo $record->nazeel_name?> </td>
                                         <td data-title="التحكم" class="text-center">
                                        <a href="<?php echo base_url().'Prisoner/update_prisoner/'.$record->id?>">
                                            <button type="button" class="btn btn-add btn-xs" title="تعديل ">
                                                <i class="fa fa-pencil"></i></button></a>
                                            <a href="<?php echo base_url().'Prisoner/delete_main_stages/'.$record->id?>">
                                                <button type="button" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"> </i> </button>
                                            </a>
                                        <?php     if($record->confirm ==1){  ?>
                                         <?php    }else{  ?>
                                            <a href="<?php echo base_url().'Prisoner/prisoner_papers/'.$record->id?>">
                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-success">أوراق ثبوتية</button>
                                            </a>
                                            <?php  }  ?>
                                    </td>
                                </tr>
                            <?php endforeach ;?>
                        </table>
                    <?php endif;?>
                </div>
            </div>
        </div>
<script>
    function asd() {
        var osra_mnzl =$("#osra_mnzl").val();
        if(osra_mnzl ==5){
            $('#mnzl_egar').show();
        }else{
                $('#mnzl_egar').hide();
            }
        }
</script>
<script>
    function zawgaaa() {
        var zawga =$("#zawga").val();
        if(zawga ==1){
            $('#zawga_div').show();
            $('#zawga_div_edit').show();
        }else{
            $('#zawga_div').hide();
            $('#zawga_div_edit').hide();
        }
    }
</script>
<script>
    function ebnnn() {
        var zawga =$("#ebn").val();
        if(zawga ==1){
            $('#ebn_div').show();
            $('#ebn_div_edit').show();
        }else{
            $('#ebn_div').hide();
            $('#ebn_div_edit').hide();
        }
    }
</script>
<script>
    function benttt() {
        var zawga =$("#bent").val();
        if(zawga ==1){
            $('#bent_div').show();
            $('#bent_div_edit').show();
        }else{
            $('#bent_div').hide();
            $('#bent_div_edit').hide();
        }
    }
</script>
<script>
    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0)
        {
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Prisoner/add_prisoner',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });
            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }
</script>
<script>
    function lood_ebn(ebn_num,div,page){
        var cleer = '#' + page;
        if(ebn_num != 0)
        {
            var id = ebn_num;
            var dataString = 'ebn_num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Prisoner/add_prisoner',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });
            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }
</script>
<script>
    function lood_bent(bent_num,div,page){
        var cleer = '#' + page;
        if(bent_num != 0)
        {
            var id = bent_num;
            var dataString = 'bent_num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Prisoner/add_prisoner',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });
            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }
</script>



<script>
    function edValueKeyPress()
    {
        var edValue = document.getElementById("edValue");
        var s = edValue.value;
        var dataString =  'search=' + s;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/Prisoner/add_prisoner',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#show_option').html(html);
            }
        });

    }



</script>