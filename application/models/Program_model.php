<?php
class Program_model extends CI_Model {

    public function get_faculty()
    {
        return $this->db->get('faculty')->result();
    }

	
    public function get_program_by_faculty($fac_id)
    {
        return $this->db->where('fac_id', $fac_id)->get('program')->result();
		
    }
}
