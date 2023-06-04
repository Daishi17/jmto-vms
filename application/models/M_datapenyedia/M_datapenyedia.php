<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datapenyedia extends CI_Model
{

    public function insert_vendor($data)
    {
        $this->db->insert('tbl_vendor', $data);
        return $this->db->affected_rows();
    }

    public function insert_trx_jenis_usaha($data)
    {
        $this->db->insert_batch('trx_jenis_usaha_vendor', $data);
        return $this->db->affected_rows();
    }

    public function get_result_vendor()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('tbl_vendor.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_nib($data)
    {
        $this->db->insert('tbl_vendor_nib', $data);
        return $this->db->affected_rows();
    }


    public function udpate_enkrip($where, $data)
    {
        $this->db->update('tbl_vendor_nib', $data, $where);
        return $this->db->affected_rows();
    }

    public function udpate_dekrip($where, $data)
    {
        $this->db->update('tbl_vendor_nib', $data, $where);
        return $this->db->affected_rows();
    }
    public function get_row_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('tbl_vendor_nib.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }
}
