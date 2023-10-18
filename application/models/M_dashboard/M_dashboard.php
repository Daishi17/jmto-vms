<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{

    public function get_row_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor.kualifikasi_usaha = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_kualifikasi_izin($value)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_usaha');
        $this->db->where('id_jenis_usaha', $value);
        $query = $this->db->get();
        return $query->row_array();
    }

    function cek_vendor_tervalidasi_siup($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_siup($id_vendor)
    {
        $this->db->select('sts_kbli_siup');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->where('sts_kbli_siup', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_nib($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_nib($id_vendor)
    {
        $this->db->select('sts_kbli_nib');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->where('sts_kbli_nib', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_sbu($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_sbu($id_vendor)
    {
        $this->db->select('sts_kbli_sbu');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->where('sts_kbli_sbu', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tervalidasi_siujk($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_siujk($id_vendor)
    {
        $this->db->select('sts_kbli_siujk');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->where('sts_kbli_siujk', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_akta_pendirian($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_akta_perubahan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_pemilik($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_pengurus($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_pengalaman($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tervalidasi_sppkp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_npwp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_spt($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_neraca_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    // tidak valid
    function cek_vendor_tdk_valid_siup($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_siup($id_vendor)
    {
        $this->db->select('sts_kbli_siup');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->where('sts_kbli_siup', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_nib($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_nib($id_vendor)
    {
        $this->db->select('sts_kbli_nib');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->where('sts_kbli_nib', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_sbu($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_sbu($id_vendor)
    {
        $this->db->select('sts_kbli_sbu');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->where('sts_kbli_sbu', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tdk_valid_siujk($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_siujk($id_vendor)
    {
        $this->db->select('sts_kbli_siujk');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->where('sts_kbli_siujk', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_akta_pendirian($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_akta_perubahan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_pemilik($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_pengurus($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_pengalaman($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tdk_valid_sppkp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_npwp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_spt($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_neraca_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_notifikasi($id_vendor)
    {
        $this->db->select_sum('notifikasi');
        $this->db->from('monitoring_dokumen');
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function count_notifikasi_izin($id_vendor)
    {
        $this->db->select_sum('notifikasi');
        $this->db->from('monitoring_dokumen');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where_in('jenis_dokumen', ['SIUP', 'SIUP-KBLI', 'NIB', 'NIB-KBLI', 'SBU', 'KODE-SBU', 'SIUJK', 'SIUJK-KBLI']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function count_notifikasi_akta($id_vendor)
    {
        $this->db->select_sum('notifikasi');
        $this->db->from('monitoring_dokumen');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where_in('jenis_dokumen', ['AKTA-PENDIRIAN', 'AKTA-PERUBAHAN']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function count_notifikasi_manajerial($id_vendor)
    {
        $this->db->select_sum('notifikasi');
        $this->db->from('monitoring_dokumen');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where_in('jenis_dokumen', ['PEMILIK', 'PENGURUS']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function count_notifikasi_pengalaman($id_vendor)
    {
        $this->db->select_sum('notifikasi');
        $this->db->from('monitoring_dokumen');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where_in('jenis_dokumen', ['PENGALAMAN']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function count_notifikasi_pajak($id_vendor)
    {
        $this->db->select_sum('notifikasi');
        $this->db->from('monitoring_dokumen');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where_in('jenis_dokumen', ['NPWP', 'SPT', 'SPPKP', 'NERACA-KEUANGAN', 'LAPORAN-KEUANGAN']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('tbl_vendor_siup.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_siup_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('tbl_vendor_nib.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_nib_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('tbl_vendor_sbu.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_result_sbu_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_sbu', 'tbl_vendor_kbli_sbu.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_row_skdp($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_skdp');
        $this->db->where('tbl_vendor_skdp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_skdp_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_skdp');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_skdp.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_vendor_kbli_skdp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('tbl_vendor_siujk.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_siujk_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_row_akta_pendirian($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('tbl_vendor_akta_pendirian.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_row_akta_perubahan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('tbl_vendor_akta_perubahan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pemilik_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_pemilik_manajerial($id_vendor)
    {
        $this->db->select('nik, sts_validasi, nama_validator, tgl_periksa');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_pengurus_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_result_pengurus_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_pengalaman($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_pengalaman($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_sppkp($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('tbl_vendor_sppkp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_npwp($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('tbl_vendor_npwp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_neraca($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_neraca($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_row_lainnya($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_izin_lain');
        $this->db->where('tbl_vendor_izin_lain.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }
}
