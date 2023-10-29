<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tender_diikuti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $id_vendor = $this->session->userdata('id_vendor');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_jenis_usaha/M_jenis_usaha');
        $this->load->model('Wilayah/Wilayah_model');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_monitoring/M_monitoring');
        $this->load->model('M_tender/M_tender');
        if (!$id_vendor) {
            redirect('auth');
        }
    }

    public function index()
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

        $data['count_tender_umum'] =  $this->M_tender->count_all_data();

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('tender_diikuti/index', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('tender_diikuti/file_public');
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
        $resultss = $this->M_tender->gettable_diikuti();
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
            "recordsTotal" => $this->M_tender->count_all_data_diikuti(),
            "recordsFiltered" => $this->M_tender->count_filtered_data_diikuti(),
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

    public function informasi_tender($id_url_rup)
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

        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);

        // id_rup non url
        $id_rup = $data['rup']['id_rup'];
        $nama_rup = $data['rup']['nama_rup'];
        $data['peserta'] = $this->M_tender->peserta($id_rup);
        $data['dok_prakualifikasi'] = $this->M_tender->dok_prakualifikasi($id_rup);
        $data['dok_pengadaan'] = $this->M_tender->dok_pengadaan($id_rup);
        $data['dok_syarat_tambahan'] = $this->M_tender->get_syarat_tambahan($id_rup);

        // panggil private url
        $data['url_dok_pengadaan'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'DOKUMEN_PENGADAAN/';
        $data['url_dok_prakualifikasi'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'DOKUMEN_PRAKUALIFIKASI/';
        $data['url_dok_syarat_tambahan'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'SYARAT_TAMBAHAN/';

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/informasi_tender_umum', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function upload_syarat_tambahan()
    {

        // post
        $id_rup = $this->input->post('id_rup');
        $nama_persyaratan_tambahan = $this->input->post('nama_persyaratan_tambahan');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_syarat_tambahan')) {
            $fileData = $this->upload->data();
            $upload = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor,
                'nama_syarat_tambahan' => $nama_persyaratan_tambahan,
                'file_syarat_tambahan' => $fileData['file_name']
            ];
            $this->M_tender->insert_syarat_tambahan($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_syarat_tambahan()
    {
        $id_vendor_syarat_tambahan = $this->input->post('id_vendor_syarat_tambahan');
        $this->M_tender->delete_syarat_tambahan($id_vendor_syarat_tambahan);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function get_syarat_tambahan()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');

        $data = $this->M_tender->get_syarat_tambahan_vendor($id_rup, $id_vendor);
        $response = [
            'syarat_tambahan' => $data,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function download_syarat_tambahan($id_vendor_syarat_tambahan)
    {
        $row_syarat  = $this->M_tender->row_syarat_tambahan($id_vendor_syarat_tambahan);
        $nama_usaha = $this->session->userdata('nama_usaha');

        $file_url = 'file_paket/' . $row_syarat['nama_rup'] . '/' .  $nama_usaha . '/' . 'SYARAT_TAMBAHAN' . '/'  . $row_syarat['file_syarat_tambahan'];
        $url  = $file_url;
        redirect($url);
    }

    public function aanwijzing($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);


        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/aanwijzing');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function sanggahan_prakualifikasi($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);


        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/sanggahan_prakualifikasi');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }


    public function sanggahan_akhir($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/sanggahan_akhir');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function negosiasi($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/negosiasi');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }
}
