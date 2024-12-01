<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_Model extends CI_Model
{
    public function get_all_wisata()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_wisata_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('wisata');
        return $query->row_array();
    }

    public function tambah_wisata($data)
    {
        $this->db->insert('wisata', $data);
        return $this->db->insert_id();
    }

    public function edit_wisata($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('wisata', $data);
    }

    public function hapus_wisata($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('wisata');
    }
}