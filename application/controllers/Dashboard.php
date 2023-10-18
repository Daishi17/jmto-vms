<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $id_vendor = $this->session->userdata('id_vendor');
        $this->load->model('M_dashboard/M_dashboard');
        if (!$id_vendor) {
            redirect('auth');
        }
    }

    public function index()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['row_vendor'] = $this->M_dashboard->get_row_vendor($id_vendor);
        $data['kualifikasi'] = str_split($data['row_vendor']['id_jenis_usaha']);


        // izin usaha
        $cek_siup = $this->M_dashboard->cek_vendor_tervalidasi_siup($id_vendor);
        $cek_kbli_siup = $this->M_dashboard->cek_vendor_tervalidasi_kbli_siup($id_vendor);
        $cek_nib = $this->M_dashboard->cek_vendor_tervalidasi_nib($id_vendor);
        $cek_kbli_nib = $this->M_dashboard->cek_vendor_tervalidasi_kbli_nib($id_vendor);
        $cek_sbu = $this->M_dashboard->cek_vendor_tervalidasi_sbu($id_vendor);
        $cek_kbli_sbu = $this->M_dashboard->cek_vendor_tervalidasi_kbli_sbu($id_vendor);
        $cek_siujk = $this->M_dashboard->cek_vendor_tervalidasi_siujk($id_vendor);
        $cek_kbli_siujk = $this->M_dashboard->cek_vendor_tervalidasi_kbli_siujk($id_vendor);

        // akta
        $cek_akta_pendirian = $this->M_dashboard->cek_vendor_tervalidasi_akta_pendirian($id_vendor);
        $cek_akta_perubahan = $this->M_dashboard->cek_vendor_tervalidasi_akta_perubahan($id_vendor);
        // end akta

        // manajerial
        $cek_pemilik = $this->M_dashboard->cek_vendor_tervalidasi_pemilik($id_vendor);
        $cek_pengurus = $this->M_dashboard->cek_vendor_tervalidasi_pengurus($id_vendor);
        // end manajerial

        // pengalaman
        $cek_pengalaman = $this->M_dashboard->cek_vendor_tervalidasi_pengalaman($id_vendor);
        // end pengalaman

        // pajak
        $cek_sppkp = $this->M_dashboard->cek_vendor_tervalidasi_sppkp($id_vendor);
        $cek_npwp = $this->M_dashboard->cek_vendor_tervalidasi_npwp($id_vendor);
        $cek_spt = $this->M_dashboard->cek_vendor_tervalidasi_spt($id_vendor);
        $cek_neraca_keuangan = $this->M_dashboard->cek_vendor_tervalidasi_neraca_keuangan($id_vendor);
        $cek_keuangan = $this->M_dashboard->cek_vendor_tervalidasi_keuangan($id_vendor);
        // end pajak


        // tidak valid
        $cek_tdk_valid_siup = $this->M_dashboard->cek_vendor_tdk_valid_siup($id_vendor);
        $cek_tdk_valid_kbli_siup = $this->M_dashboard->cek_vendor_tdk_valid_kbli_siup($id_vendor);
        $cek_tdk_valid_nib = $this->M_dashboard->cek_vendor_tdk_valid_nib($id_vendor);
        $cek_tdk_valid_kbli_nib = $this->M_dashboard->cek_vendor_tdk_valid_kbli_nib($id_vendor);
        $cek_tdk_valid_sbu = $this->M_dashboard->cek_vendor_tdk_valid_sbu($id_vendor);
        $cek_tdk_valid_kbli_sbu = $this->M_dashboard->cek_vendor_tdk_valid_kbli_sbu($id_vendor);
        $cek_tdk_valid_siujk = $this->M_dashboard->cek_vendor_tdk_valid_siujk($id_vendor);
        $cek_tdk_valid_kbli_siujk = $this->M_dashboard->cek_vendor_tdk_valid_kbli_siujk($id_vendor);

        // akta
        $cek_tdk_valid_akta_pendirian = $this->M_dashboard->cek_vendor_tdk_valid_akta_pendirian($id_vendor);
        $cek_tdk_valid_akta_perubahan = $this->M_dashboard->cek_vendor_tdk_valid_akta_perubahan($id_vendor);
        // end akta

        // manajerial
        $cek_tdk_valid_pemilik = $this->M_dashboard->cek_vendor_tdk_valid_pemilik($id_vendor);
        $cek_tdk_valid_pengurus = $this->M_dashboard->cek_vendor_tdk_valid_pengurus($id_vendor);
        // end manajerial

        // pengalaman
        $cek_tdk_valid_pengalaman = $this->M_dashboard->cek_vendor_tdk_valid_pengalaman($id_vendor);
        // end pengalaman

        // pajak
        $cek_tdk_valid_sppkp = $this->M_dashboard->cek_vendor_tdk_valid_sppkp($id_vendor);
        $cek_tdk_valid_npwp = $this->M_dashboard->cek_vendor_tdk_valid_npwp($id_vendor);
        $cek_tdk_valid_spt = $this->M_dashboard->cek_vendor_tdk_valid_spt($id_vendor);
        $cek_tdk_valid_neraca_keuangan = $this->M_dashboard->cek_vendor_tdk_valid_neraca_keuangan($id_vendor);
        $cek_tdk_valid_keuangan = $this->M_dashboard->cek_vendor_tdk_valid_keuangan($id_vendor);
        // end pajak
        // end tidak valid
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['count_tdk_validate'] =  $cek_tdk_valid_siup + $cek_tdk_valid_kbli_siup + $cek_tdk_valid_nib + $cek_tdk_valid_kbli_nib + $cek_tdk_valid_sbu + $cek_tdk_valid_kbli_sbu + $cek_tdk_valid_siujk + $cek_tdk_valid_kbli_siujk + $cek_tdk_valid_akta_pendirian + $cek_tdk_valid_akta_perubahan + $cek_tdk_valid_pemilik + $cek_tdk_valid_pengurus + $cek_tdk_valid_pengalaman + $cek_tdk_valid_sppkp + $cek_tdk_valid_npwp + $cek_tdk_valid_spt + $cek_tdk_valid_neraca_keuangan + $cek_tdk_valid_keuangan;
        $data['count_validate'] = $cek_siup + $cek_kbli_siup + $cek_nib + $cek_kbli_nib + $cek_sbu + $cek_kbli_sbu + $cek_siujk + $cek_kbli_siujk + $cek_akta_pendirian + $cek_akta_perubahan + $cek_pemilik + $cek_pengurus + $cek_pengalaman + $cek_sppkp + $cek_npwp + $cek_spt + $cek_neraca_keuangan + $cek_keuangan;


        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('dashboard/file_public');
        // angga
        // $this->load->view('dashboard/ajax');
    }


    function get_dokumen_vendor($id_vendor)
    {
        // $id_vendor = $this->M_dashboard->get_row_vendor($id_vendor);
        $row_siup = $this->M_dashboard->get_row_siup($id_vendor);
        $kbli_siup = $this->M_dashboard->get_result_siup_kbli($id_vendor);

        $row_nib = $this->M_dashboard->get_row_nib($id_vendor);
        $kbli_nib = $this->M_dashboard->get_result_nib_kbli($id_vendor);

        $row_sbu = $this->M_dashboard->get_row_sbu($id_vendor);
        $kbli_sbu = $this->M_dashboard->get_result_sbu_kbli($id_vendor);

        $row_siujk = $this->M_dashboard->get_row_siujk($id_vendor);
        $kbli_siujk = $this->M_dashboard->get_result_siujk_kbli($id_vendor);
        $kbli_skdp = $this->M_dashboard->get_result_skdp_kbli($id_vendor);
        $row_akta_pendirian = $this->M_dashboard->get_row_akta_pendirian($id_vendor);
        $row_akta_perubahan = $this->M_dashboard->get_row_akta_perubahan($id_vendor);

        $get_row_pemilik_manajerial = $this->M_dashboard->get_row_pemilik_manajerial($id_vendor);
        $get_result_pemilik_manajerial = $this->M_dashboard->get_result_pemilik_manajerial($id_vendor);

        $get_row_pengurus_manajerial = $this->M_dashboard->get_row_pengurus_manajerial($id_vendor);
        $get_result_pengurus_manajerial = $this->M_dashboard->get_result_pengurus_manajerial($id_vendor);

        $row_pengalaman = $this->M_dashboard->get_row_pengalaman($id_vendor);
        $result_pengalaman = $this->M_dashboard->get_result_pengalaman($id_vendor);

        $row_sppkp = $this->M_dashboard->get_row_sppkp($id_vendor);
        $row_npwp = $this->M_dashboard->get_row_npwp($id_vendor);

        $row_spt = $this->M_dashboard->get_row_spt($id_vendor);
        $result_spt = $this->M_dashboard->get_result_spt($id_vendor);

        $row_neraca = $this->M_dashboard->get_row_neraca($id_vendor);
        $result_neraca = $this->M_dashboard->get_result_neraca($id_vendor);

        $row_keuangan = $this->M_dashboard->get_row_keuangan($id_vendor);
        $result_keuangan = $this->M_dashboard->get_result_keuangan($id_vendor);

        $row_skdp = $this->M_dashboard->get_row_skdp($id_vendor);
        $row_lainnya = $this->M_dashboard->get_row_lainnya($id_vendor);
        $response = [
            'row_siup' => $row_siup,
            'row_nib' => $row_nib,
            'row_sbu' => $row_sbu,
            'row_siujk' => $row_siujk,
            'row_akta_pendirian' => $row_akta_pendirian,
            'row_akta_perubahan' => $row_akta_perubahan,
            'row_pemilik_manajerial' => $get_row_pemilik_manajerial,
            'row_pengurus_manajerial' => $get_row_pengurus_manajerial,
            'row_pengalaman' => $row_pengalaman,
            'row_sppkp' => $row_sppkp,
            'row_npwp' => $row_npwp,
            'row_spt' => $row_spt,
            'row_neraca' => $row_neraca,
            'row_keuangan' => $row_keuangan,
            'kbli_siup' => $kbli_siup,
            'kbli_nib' => $kbli_nib,
            'kbli_sbu' => $kbli_sbu,
            'kbli_siujk' => $kbli_siujk,
            'kbli_skdp' => $kbli_skdp,
            'pemilik' => $get_result_pemilik_manajerial,
            'pengurus' => $get_result_pengurus_manajerial,
            'pengalaman' => $result_pengalaman,
            'spt' => $result_spt,
            'keuangan' => $result_keuangan,
            'neraca' => $result_neraca,
            'row_skdp' => $row_skdp,
            'row_lainnya' => $row_lainnya
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
