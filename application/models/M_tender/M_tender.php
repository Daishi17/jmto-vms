
<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class M_tender extends CI_Model
{

    var $order =  array('tbl_rup.id_rup', 'tbl_rup.nama_rup', 'tbl_rup.tahun_rup', 'tbl_departemen.nama_departemen', 'tbl_jenis_pengadaan.nama_jenis_pengadaan', 'tbl_rup.total_hps_rup', 'tbl_rup.batas_pendaftaran_tender', 'tbl_rup.id_rup');

    // get nib
    private function _get_data_query()
    {
        // session vendor
        $id_vendor = $this->session->userdata('id_vendor');

        // get izin usaha
        $nib_vendor = $this->get_nib_vendor($id_vendor);
        $nib_vendor_kbli = $this->get_nib_vendor_kbli($id_vendor);

        $siup_vendor = $this->get_siup_vendor($id_vendor);
        $siup_vendor_kbli = $this->get_siup_vendor_kbli($id_vendor);

        $siujk_vendor = $this->get_siujk_vendor($id_vendor);
        $siujk_vendor_kbli = $this->get_siujk_vendor_kbli($id_vendor);

        $skdp_vendor = $this->get_skdp_vendor($id_vendor);
        $skdp_vendor_kbli = $this->get_skdp_vendor_kbli($id_vendor);

        $sbu_vendor = $this->get_sbu_vendor($id_vendor);
        $sbu_vendor_kode = $this->get_sbu_vendor_kode($id_vendor);

        // get teknis
        $spt_vendor = $this->get_spt_vendor($id_vendor);
        $keuangan = $this->get_keuangan_vendor($id_vendor);
        $keuangan_audit = $this->get_keuangan_audit_vendor($id_vendor);

        $neraca = $this->get_neraca_vendor($id_vendor);
        $neraca_mulai = $this->get_neraca_vendor_mulai($id_vendor);
        $neraca_selesai = $this->get_neraca_vendor_selesai($id_vendor);


        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        if ($nib_vendor) {
            if ($nib_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $nib_vendor_kbli);
                if ($nib_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_nib', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_nib >=', $nib_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_nib >=', $nib_vendor['tgl_berlaku']);
                }
            }
        }

        if ($siup_vendor) {
            if ($siup_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siup_vendor_kbli);
                if ($siup_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_siup', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_siup >=', $siup_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_siup >=', $siup_vendor['tgl_berlaku']);
                }
            }
        }

        if ($siujk_vendor) {
            if ($siujk_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siujk_vendor_kbli);
                if ($siujk_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_siujk', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_siujk >=', $siujk_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_siujk >=', $siujk_vendor['tgl_berlaku']);
                }
            }
        }

        if ($skdp_vendor) {
            if ($skdp_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $skdp_vendor_kbli);
                if ($skdp_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_skdp', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_skdp >=', $skdp_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_skdp >=', $skdp_vendor['tgl_berlaku']);
                }
            }
        }

        if ($sbu_vendor) {
            if ($sbu_vendor_kode) {
                $this->db->where_in('tbl_syratat_sbu_tender.id_sbu',  $sbu_vendor_kode);
                if ($sbu_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_sbu', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_sbu >=', $sbu_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_sbu >=', $sbu_vendor['tgl_berlaku']);
                }
            }
        }

        if ($spt_vendor) {
            $this->db->where('tbl_izin_teknis_rup.tahun_lapor_spt <=', $spt_vendor['tahun_lapor']);
        }

        if ($keuangan) {
            $this->db->where('tbl_izin_teknis_rup.tahun_awal_laporan_keuangan <=', $spt_vendor['tahun_lapor']);
            $this->db->where('tbl_izin_teknis_rup.tahun_akhir_laporan_keuangan >=', $spt_vendor['tahun_lapor']);

            $this->db->where_in('tbl_izin_teknis_rup.sts_audit_laporan_keuangan',  $keuangan_audit);
        }

        if ($neraca) {
            $this->db->where('tbl_izin_teknis_rup.tahun_awal_neraca_keuangan <=', $neraca_selesai['sls']);
            $this->db->where('tbl_izin_teknis_rup.tahun_akhir_neraca_keuangan >=', $neraca_mulai['mulai']);
        }
        $this->db->group_by('tbl_rup.id_rup');
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
        $id_vendor = $this->session->userdata('id_vendor');

        // get izin usaha
        $nib_vendor = $this->get_nib_vendor($id_vendor);
        $nib_vendor_kbli = $this->get_nib_vendor_kbli($id_vendor);

        $siup_vendor = $this->get_siup_vendor($id_vendor);
        $siup_vendor_kbli = $this->get_siup_vendor_kbli($id_vendor);

        $siujk_vendor = $this->get_siujk_vendor($id_vendor);
        $siujk_vendor_kbli = $this->get_siujk_vendor_kbli($id_vendor);

        $skdp_vendor = $this->get_skdp_vendor($id_vendor);
        $skdp_vendor_kbli = $this->get_skdp_vendor_kbli($id_vendor);

        $sbu_vendor = $this->get_sbu_vendor($id_vendor);
        $sbu_vendor_kode = $this->get_sbu_vendor_kode($id_vendor);

        // get teknis
        $spt_vendor = $this->get_spt_vendor($id_vendor);
        $keuangan = $this->get_keuangan_vendor($id_vendor);
        $keuangan_audit = $this->get_keuangan_audit_vendor($id_vendor);

        $neraca = $this->get_neraca_vendor($id_vendor);
        $neraca_mulai = $this->get_neraca_vendor_mulai($id_vendor);
        $neraca_selesai = $this->get_neraca_vendor_selesai($id_vendor);


        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_izin_rup', 'tbl_rup.id_rup = tbl_izin_rup.id_rup', 'left');
        $this->db->join('tbl_izin_teknis_rup', 'tbl_rup.id_rup = tbl_izin_teknis_rup.id_rup', 'left');
        $this->db->join('tbl_syratat_kbli_tender', 'tbl_rup.id_rup = tbl_syratat_kbli_tender.id_rup', 'left');
        $this->db->join('tbl_syratat_sbu_tender', 'tbl_rup.id_rup = tbl_syratat_sbu_tender.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        if ($nib_vendor) {
            if ($nib_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $nib_vendor_kbli);
                if ($nib_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_nib', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_nib >=', $nib_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_nib >=', $nib_vendor['tgl_berlaku']);
                }
            }
        }

        if ($siup_vendor) {
            if ($siup_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siup_vendor_kbli);
                if ($siup_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_siup', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_siup >=', $siup_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_siup >=', $siup_vendor['tgl_berlaku']);
                }
            }
        }

        if ($siujk_vendor) {
            if ($siujk_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $siujk_vendor_kbli);
                if ($siujk_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_siujk', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_siujk >=', $siujk_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_siujk >=', $siujk_vendor['tgl_berlaku']);
                }
            }
        }

        if ($skdp_vendor) {
            if ($skdp_vendor_kbli) {
                $this->db->where_in('tbl_syratat_kbli_tender.id_kbli',  $skdp_vendor_kbli);
                if ($skdp_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_skdp', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_skdp >=', $skdp_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_skdp >=', $skdp_vendor['tgl_berlaku']);
                }
            }
        }

        if ($sbu_vendor) {
            if ($sbu_vendor_kode) {
                $this->db->where_in('tbl_syratat_sbu_tender.id_sbu',  $sbu_vendor_kode);
                if ($sbu_vendor['sts_seumur_hidup'] == 2) {
                    $this->db->where('tbl_izin_rup.sts_masa_berlaku_sbu', 2);
                    // $this->db->or_where('tbl_izin_rup.tgl_berlaku_sbu >=', $sbu_vendor['tgl_berlaku']);
                } else {
                    $this->db->where('tbl_izin_rup.tgl_berlaku_sbu >=', $sbu_vendor['tgl_berlaku']);
                }
            }
        }

        if ($spt_vendor) {
            $this->db->where('tbl_izin_teknis_rup.tahun_lapor_spt <=', $spt_vendor['tahun_lapor']);
        }

        if ($keuangan) {
            $this->db->where('tbl_izin_teknis_rup.tahun_awal_laporan_keuangan <=', $spt_vendor['tahun_lapor']);
            $this->db->where('tbl_izin_teknis_rup.tahun_akhir_laporan_keuangan >=', $spt_vendor['tahun_lapor']);

            $this->db->where_in('tbl_izin_teknis_rup.sts_audit_laporan_keuangan',  $keuangan_audit);
        }

        if ($neraca) {
            $this->db->where('tbl_izin_teknis_rup.tahun_awal_neraca_keuangan <=', $neraca_selesai['sls']);
            $this->db->where('tbl_izin_teknis_rup.tahun_akhir_neraca_keuangan >=', $neraca_mulai['mulai']);
        }
        $this->db->group_by('tbl_rup.id_rup');
        $this->db->get();
        return $this->db->count_all_results();
    }

    // validasi nib
    private function get_nib_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    private function get_nib_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_nib.id_kbli');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_nib', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
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

    private function get_siup_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_siup.id_kbli');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_siup', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
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

    private function get_sbu_vendor_kode($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_sbu.id_sbu');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_sbu', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_sbu'];
        }
        return $data;
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

    private function get_siujk_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_siujk.id_kbli');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_siujk', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
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

    private function get_skdp_vendor_kbli($id_vendor)
    {
        $this->db->select('tbl_vendor_kbli_skdp.id_kbli');
        $this->db->from('tbl_vendor_kbli_skdp');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_kbli_skdp', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['id_kbli'];
        }
        return $data;
    }
    // 


    private function get_spt_vendor($id_vendor)
    {
        $this->db->select_max('tahun_lapor');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }

    private function get_keuangan_vendor($id_vendor)
    {
        $this->db->select_max('tahun_lapor');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }

    private function get_keuangan_audit_vendor($id_vendor)
    {
        $this->db->select('jenis_audit');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->result_array();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = $value['jenis_audit'];
        }
        return $data;
    }

    private function get_neraca_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    private function get_neraca_vendor_mulai($id_vendor)
    {
        $this->db->select_min('tahun_mulai', 'mulai');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }


    private function get_neraca_vendor_selesai($id_vendor)
    {
        $this->db->select_max('tahun_selesai', 'sls');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('sts_validasi', 1);
        $query = $this->db->get()->row_array();
        return $query;
    }
}
