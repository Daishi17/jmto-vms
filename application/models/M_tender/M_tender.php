
<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class M_tender extends CI_Model
{

    var $order =  array('id_rup', 'nama_rup');

    // get nib
    private function _get_data_query()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $query_rup_nib = $this->get_rup_cek_syarat_nib();
        $query_rup_siup = $this->get_rup_cek_syarat_siup();
        $query_rup_sbu = $this->get_rup_cek_syarat_sbu();
        $query_rup_siujk = $this->get_rup_cek_syarat_siujk();
        $query_rup_skdp = $this->get_rup_cek_syarat_skdp();

        $nib_vendor = $this->get_nib_vendor($id_vendor);
        $siup_vendor = $this->get_siup_vendor($id_vendor);
        $siujk_vendor = $this->get_siujk_vendor($id_vendor);
        $sbu_vendor = $this->get_sbu_vendor($id_vendor);
        $skdp_vendor = $this->get_skdp_vendor($id_vendor);

        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_syarat_tender', 'tbl_rup.id_rup = tbl_syarat_tender.id_rup');
        if ($query_rup_nib) {
            foreach ($query_rup_nib as $key => $value) {
                $this->db->where('tbl_syarat_tender.nama_persyaratan', $value['nama_persyaratan']);
                $this->db->where('tbl_syarat_tender.sts_masa_berlaku', $value['sts_masa_berlaku']);
            }
        } else if ($query_rup_siup) {
            foreach ($query_rup_siup as $key => $value) {
                $this->db->where('tbl_syarat_tender.nama_persyaratan', $value['nama_persyaratan']);
                $this->db->where('tbl_syarat_tender.sts_masa_berlaku', $value['sts_masa_berlaku']);
            }
        } else if ($query_rup_sbu) {
            foreach ($query_rup_sbu as $key => $value) {
                $this->db->where('tbl_syarat_tender.nama_persyaratan', $value['nama_persyaratan']);
                $this->db->where('tbl_syarat_tender.sts_masa_berlaku', $value['sts_masa_berlaku']);
            }
        } else if ($query_rup_siujk) {
            foreach ($query_rup_siujk as $key => $value) {
                $this->db->where('tbl_syarat_tender.nama_persyaratan', $value['nama_persyaratan']);
                $this->db->where('tbl_syarat_tender.sts_masa_berlaku', $value['sts_masa_berlaku']);
            }
        } else if ($query_rup_skdp) {
            foreach ($query_rup_skdp as $key => $value) {
                $this->db->where('tbl_syarat_tender.nama_persyaratan', $value['nama_persyaratan']);
                $this->db->where('tbl_syarat_tender.sts_masa_berlaku', $value['sts_masa_berlaku']);
            }
        }


        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable() //nam[ilin data pake ini
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data()
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        return $this->db->count_all_results();
    }

    // validasi nib
    private function get_nib_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->join('tbl_syarat_tender', 'tbl_vendor_nib.sts_seumur_hidup = tbl_syarat_tender.sts_masa_berlaku', 'left');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    // validasi siup
    private function get_siup_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    // validasi sbu
    private function get_sbu_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    // validasi siujk
    private function get_siujk_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    // validasi skdp
    private function get_skdp_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_skdp');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }


    private function get_rup_cek_syarat_nib()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_syarat_tender', 'tbl_rup.id_rup = tbl_syarat_tender.id_rup');
        $this->db->where('nama_persyaratan', 'NIB');
        $this->db->where('sts_checked', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_rup_cek_syarat_siup()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_syarat_tender', 'tbl_rup.id_rup = tbl_syarat_tender.id_rup');
        $this->db->where('nama_persyaratan', 'SIUP');
        $this->db->where('sts_checked', 1);
        $query = $this->db->get();
        return $query->row_array();
    }


    private function get_rup_cek_syarat_sbu()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_syarat_tender', 'tbl_rup.id_rup = tbl_syarat_tender.id_rup');
        $this->db->where('nama_persyaratan', 'SBU');
        $this->db->where('sts_checked', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_rup_cek_syarat_siujk()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_syarat_tender', 'tbl_rup.id_rup = tbl_syarat_tender.id_rup');
        $this->db->where('nama_persyaratan', 'SIUJK');
        $this->db->where('sts_checked', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_rup_cek_syarat_skdp()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_syarat_tender', 'tbl_rup.id_rup = tbl_syarat_tender.id_rup');
        $this->db->where('nama_persyaratan', 'SKDP');
        $this->db->where('sts_checked', 1);
        $query = $this->db->get();
        return $query->row_array();
    }
}
