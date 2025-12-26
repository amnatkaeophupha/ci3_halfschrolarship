<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model
{
    public function get_provinces()
    {
        $this->db->order_by('province_name_th', 'ASC');
        return $this->db->get('provinces')->result();
    }

    public function get_amphoe_by_province($province_code)
    {
        $this->db->where('province_code', $province_code);
        $this->db->order_by('amphoe_name_th', 'ASC');
        return $this->db->get('amphoe')->result();
    }

    public function get_district_by_amphoe($amphoe_code)
    {
        $this->db->where('amphoe_code', $amphoe_code);
        $this->db->order_by('district_name_th', 'ASC');
        return $this->db->get('district')->result();
    }
}
