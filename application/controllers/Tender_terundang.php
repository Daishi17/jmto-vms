<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Tender_terundang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datapenyedia/M_datapenyedia');
        $this->load->model('M_jenis_usaha/M_jenis_usaha');
        $this->load->model('Wilayah/Wilayah_model');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_monitoring/M_monitoring');
        $this->load->model('M_tender/M_tender');
        $this->load->helper('download');
        $id_vendor = $this->session->userdata('id_vendor');
        if (!$id_vendor) {
            redirect('auth');
        }
    }

    function index()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['notifikasi_izin'] = $this->M_dashboard->count_notifikasi_izin($id_vendor);
        $data['notifikasi_akta'] = $this->M_dashboard->count_notifikasi_akta($id_vendor);
        $data['notifikasi_manajerial'] = $this->M_dashboard->count_notifikasi_manajerial($id_vendor);
        $data['notifikasi_pengalaman'] = $this->M_dashboard->count_notifikasi_pengalaman($id_vendor);
        $data['notifikasi_pajak'] = $this->M_dashboard->count_notifikasi_pajak($id_vendor);
        $update_notif = ['notifikasi' => 0];
        $where = ['id_vendor' => $id_vendor];

        $this->M_monitoring->update_notif($where, $update_notif);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('tender_terundang/index');
        $this->load->view('template_menu/new_footer');
        $this->load->view('tender_terundang/file_public');
    }

    public function get_data_tender()
    {
        $id_vendor = $this->session->userdata('id_vendor');

        // $nib = $this->M_tender->get_nib_vendor($id_vendor);
        // $siup = $this->M_tender->get_siup_vendor($id_vendor);
        // $sbu = $this->M_tender->get_sbu_vendor($id_vendor);
        // $siujk = $this->M_tender->get_siujk_vendor($id_vendor);
        // $skdp = $this->M_tender->get_skdp_vendor($id_vendor);

        // $syarat_izin = $this->M_tender->get_syarat_izin($nib, $siup, $sbu, $siujk, $skdp);
        $resultss = $this->M_tender->gettable();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {

            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_rup;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data(),
            "recordsFiltered" => $this->M_tender->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
