<?php
        $this->db->select('id_setting ,title_setting');
        $this->db->from('family_setting');
        $this->db->where('form_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            echo '<option>اختر المدينة </option>';
            foreach ($query->result() as $record) {
                echo '<option value="' . $record->id_setting . '">' . $record->title_setting . '</option>';

            }
        }else{
            echo '<option>لا توجد مدن مسجلة  </option>';
        }
?>

