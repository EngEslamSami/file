<?php


class Prisoners extends CI_Model
{



    public function insert($file){
        $file_in=0;
        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){
            $file_in= $file;
        }
        $data['nazeel_code']=$this->input->post('nazeel_code');
        $data['no3_sgen']=$this->input->post('no3_sgen');
        $data['nazeel_name']=$this->input->post('nazeel_name');
        $data['date_birth']=strtotime($this->input->post('date_birth'));
        $data['nazeel_job']=$this->input->post('nazeel_job');
        $data['dakhl']=$this->input->post('dakhl');
        $data['dakhl_masdr']=$this->input->post('dakhl_masdr');
        $data['enfaq']=$this->input->post('enfaq');
        $data['another_resources']=$this->input->post('another_resources');
        $data['naseeb_frd']=$this->input->post('naseeb_frd');
        $data['sgl_mdny']=$this->input->post('sgl_mdny');
        $data['sgl_date']=strtotime($this->input->post('sgl_date'));
        $data['sgl_source']=$this->input->post('sgl_source');
        $data['deposit_date'] =strtotime($this->input->post('deposit_date'));
        $data['case_type']=$this->input->post('case_type');
        $data['prisoner_phone']=$this->input->post('prisoner_phone');
        $data['eda3_date']=strtotime($this->input->post('eda3_date'));
        $data['efrag_date']=strtotime($this->input->post('efrag_date'));
        $data['zawga']=$this->input->post('zawga');
        $data['ebn']=$this->input->post('ebn');
        $data['bent']=$this->input->post('bent');
        $data['osra_mnzl']=$this->input->post('osra_mnzl');
        $data['mnzl_egar']=$this->input->post('mnzl_egar');
        $data['address']=$this->input->post('address');
        $data['skn_phone']=$this->input->post('skn_phone');
        $data['omda_name']=$this->input->post('omda_name');
        $data['omda_number']=$this->input->post('omda_number');
        $data['img']=$file_in;
        if($_POST['zawga_option']) {
            for ($a = 1; $a <= $_POST['zawga_option']; $a++) {
                $zawg[]=$this->input->post('zawgat'.$a);
            }
            $data['zawgat']=serialize($zawg);

        }
        if($_POST['ebn_option']) {
            for ($b = 1; $b <= $_POST['ebn_option']; $b++) {
                $abn[]=$this->input->post('bnen'.$b);
            }
            $data['bnen']=serialize($abn);

        }
        if($_POST['bent_option']) {
            for ($c = 1; $c <= $_POST['bent_option']; $c++) {
                $bnt[]=$this->input->post('bnat'.$c);
            }
            $data['bnat']=serialize($bnt);
        }
        $this->db->insert('prisoners',$data);
    }
    public function select_last(){
        $this->db->select('id');
        $this->db->from('prisoners');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data;
        }
        return 0;
    }
    public function select(){
        $this->db->select('*');
        $this->db->from('prisoners');
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function select_case(){
        $this->db->select('*');
        $this->db->from('cases');
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_by_id($id){
        $query=$this->db->get_where('prisoners',array('id'=>$id));
        return $query->row_array();
    }


    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('prisoners');
    }
    public function delete_zawg($id,$index){
        $h = $this->db->get_where('prisoners', array('id'=>$id));
        $row = $h->row_array();

        $unserial = unserialize($row['zawgat']);
        unset($unserial[$index]);
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update['zawgat']=$unserial;
        $this->db->where('id', $id);
        if($this->db->update('prisoners',$update)) {
            return true;
        }
    }

    public function delete_bnen($id,$index){
        $h = $this->db->get_where('prisoners', array('id'=>$id));
        $row = $h->row_array();

        $unserial = unserialize($row['bnen']);
        unset($unserial[$index]);
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update['bnen']=$unserial;
        $this->db->where('id', $id);
        if($this->db->update('prisoners',$update)) {
            return true;
        }
    }
    public function delete_bnat($id,$index){
        $h = $this->db->get_where('prisoners', array('id'=>$id));
        $row = $h->row_array();

        $unserial = unserialize($row['bnat']);
        unset($unserial[$index]);
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update['bnat']=$unserial;
        $this->db->where('id', $id);
        if($this->db->update('prisoners',$update)) {
            return true;
        }
    }

    public function update($id,$file){



        $h = $this->db->get_where('prisoners', array('id'=>$id));
        $row = $h->row_array();

        $data['nazeel_code']=$this->input->post('nazeel_code');
        $data['no3_sgen']=$this->input->post('no3_sgen');
        $data['nazeel_name']=$this->input->post('nazeel_name');
        $data['date_birth']=strtotime($this->input->post('date_birth'));
        $data['nazeel_job']=$this->input->post('nazeel_job');
        $data['dakhl']=$this->input->post('dakhl');
        $data['dakhl_masdr']=$this->input->post('dakhl_masdr');
        $data['enfaq']=$this->input->post('enfaq');
        $data['another_resources']=$this->input->post('another_resources');
        $data['naseeb_frd']=$this->input->post('naseeb_frd');
        $data['sgl_mdny']=$this->input->post('sgl_mdny');
        $data['sgl_date']=strtotime($this->input->post('sgl_date'));
        $data['sgl_source']=$this->input->post('sgl_source');
        $data['deposit_date'] =strtotime($this->input->post('deposit_date'));
        $data['case_type']=$this->input->post('case_type');
        $data['prisoner_phone']=$this->input->post('prisoner_phone');
        $data['eda3_date']=strtotime($this->input->post('eda3_date'));
        $data['efrag_date']=strtotime($this->input->post('efrag_date'));

        if($this->input->post('zawga')==0) {
            $data['zawga'] = $this->input->post('zawga');
            $data['zawgat']=null;
        }else{
            $data['zawga'] = $this->input->post('zawga');
            if($row['zawgat'] == null) {
                if($_POST['zawga_option']) {
                    for ($a = 1; $a <= $_POST['zawga_option']; $a++) {
                        $zawg[]=$this->input->post('zawgat'.$a);
                    }
                    $data['zawgat']=serialize($zawg);

                }
            }else{
                if ($_POST['zawga_option']) {
                    $za = unserialize($row['zawgat']);
                    for ($a = 1; $a <= $_POST['zawga_option']; $a++) {
                        $za[] = $this->input->post('zawgat' . $a);
                    }
                    $g = array_merge($za);
                    $data['zawgat'] = serialize($g);
                }
            }


        }


        if($this->input->post('ebn')==0) {
            $data['ebn'] = $this->input->post('ebn');
            $data['bnen']=null;
        }else{
            $data['ebn'] = $this->input->post('ebn');

            if($row['bnen']==null){
                if($_POST['ebn_option']) {
                    for ($b = 1; $b <= $_POST['ebn_option']; $b++) {
                        $abn[]=$this->input->post('bnen'.$b);
                    }
                    $data['bnen']=serialize($abn);

                }
            }else{
                if ($_POST['ebn_option']) {
                    $abn = unserialize($row['bnen']);
                    for ($b = 1; $b <= $_POST['ebn_option']; $b++) {
                        $abn[] = $this->input->post('bnen' . $b);
                    }
                    $b = array_merge($abn);
                    $data['bnen'] = serialize($b);
                }
            }
        }
        if($this->input->post('bent')==0) {
            $data['bent'] = $this->input->post('bent');
            $data['bnat']=null;

        }else{
            $data['bent'] = $this->input->post('bent');

            if($row['bnen']==null) {
                if($_POST['bent_option']) {
                    for ($c = 1; $c <= $_POST['bent_option']; $c++) {
                        $bnt[]=$this->input->post('bnat'.$c);
                    }
                    $data['bnat']=serialize($bnt);
                }
            }else {
                if ($_POST['bent_option']) {
                    $bnt = unserialize($row['bnat']);
                    for ($c = 1; $c <= $_POST['bent_option']; $c++) {
                        $bnt[] = $this->input->post('bnat' . $c);
                    }
                    $b = array_merge($bnt);
                    $data['bnat'] = serialize($b);
                }
            }
        }
        $data['osra_mnzl']=$this->input->post('osra_mnzl');
        $data['mnzl_egar']=$this->input->post('mnzl_egar');
        $data['address']=$this->input->post('address');
        $data['skn_phone']=$this->input->post('skn_phone');
        $data['omda_name']=$this->input->post('omda_name');
        $data['omda_number']=$this->input->post('omda_number');
        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){
            $data['img']=  $file;
        }
        $this->db->where('id', $id);
        if ($this->db->update('prisoners', $data)) {
            return true;
        } else {
            return false;
        }
    }





    public function insert_papers($file,$file2,$id){
        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){
            $image1= $file;
            $data['awra2']=$image1;
        }

        if(isset($file2) && !empty($file2) &&   $file2!=null && $file2!=''){
            $image2= $file2;
            $data['mo2bla']=$image2;
        }
        $data['confirm']=1;
        $data['rkm_mlf']=$this->input->post('rkm_mlf');
        $this->db->where('id', $id);
        $this->db->update('prisoners', $data);
    }
}