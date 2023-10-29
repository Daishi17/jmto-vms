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

        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $this->M_monitoring->update_notif($where, $update_notif);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('tender_terundang/index', $data);
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
            $row[] = $rs->tahun_rup;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_departemen;
            $row[] = $rs->nama_jenis_pengadaan;
            $row[] = 'Rp. ' . number_format($rs->total_hps_rup, 2, ",", ".");;
            if ($rs->batas_pendaftaran_tender) {
                $row[] = '<span class="badge bg-primary text-white">Pengumuman Tender
                </span>';
            } else {
                $row[] = '<span class="badge bg-primary text-white">Pengumuman Tender
                </span>';
            }
            $row[] = '<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white"  onClick="by_id_rup(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>';
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

    public function detail_paket($id_rup)
    {
        $data_rup = $this->M_tender->get_row_rup($id_rup);
        $jadwal = $this->M_tender->get_jadwal($id_rup);
        $row_syarat_administrasi_rup = $this->M_tender->get_syarat_izin_usaha_tender($data_rup['id_rup']);
        $cek_ikut =  $this->M_tender->cek_mengikuti($data_rup['id_rup']);
        $response = [
            'row_rup' => $data_rup,
            'jadwal' => $jadwal,
            'row_syarat_administrasi_rup' => $row_syarat_administrasi_rup,
            'cek_ikut' => $cek_ikut
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function ikuti_paket()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_rup = $this->input->post('id_rup');
        $data_rup = $this->M_tender->get_rup_byid($id_rup);

        if (!is_dir('file_paket/' . $data_rup['nama_rup'] . '/' . $nama_usaha)) {
            mkdir('file_paket/' . $data_rup['nama_rup'] . '/' . $nama_usaha, 0777, TRUE);
        }


        $data = [
            'id_vendor' => $id_vendor,
            'id_rup' => $id_rup,
            'sts_mengikuti_paket' => 1
        ];
        $this->M_tender->insert_mengikuti($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
