<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{

    public function jadwal_pra_umum_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Download Dokumen Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pra_umum_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Upload Dokumen Prakualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_4($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembuktian Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pra_umum_5($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Evaluasi Dokumen Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_6($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penetapan Hasil Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_7($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Hasil Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_8($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Masa Sanggah Kualifikasi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_9($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Download Dokumen Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_10($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Aanwijzing (Tanya Jawab)');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_11($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Upload Dokumen Penawaran');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_12($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembukaan dan Evaluasi Penawaran File I : Administrasi dan Teknis');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_13($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Presentasi Dan Evaluasi Dokumen Teknis');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_14($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pemberitahuan/Pengumuman Peringkat Teknis');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_15($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pembukaan dan Evaluasi Penawaran File II : Harga');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_16($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Upload Berita Acara Hasil Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_17($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penetapan Pemenang');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_18($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Pengumuman Pemenang');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_19($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Masa Sanggah Hasil Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_20($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Surat Penunjukkan Penyedia Barang/Jasa');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pra_umum_21($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('nama_jadwal_rup', 'Penandatanganan Kontrak');
        $query = $this->db->get();
        return $query->row_array();
    }
}
