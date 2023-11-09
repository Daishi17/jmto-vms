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
        $data['ba_tender'] = $this->M_tender->get_ba_tender($id_rup);

        // panggil private url
        $data['url_dok_pengadaan'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'DOKUMEN_PENGADAAN/';
        $data['url_dok_prakualifikasi'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'DOKUMEN_PRAKUALIFIKASI/';
        $data['url_dok_syarat_tambahan'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'SYARAT_TAMBAHAN/';

        $data['url_dok_pengumuman_pra'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'HASIL_PRAKUALIFIKASI/';
        $data['url_dok_undangan_pembuktian'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'HASIL_PRAKUALIFIKASI/';

        $data['url_dok_ba_tender'] = 'http://localhost/jmto-eproc/file_paket/' . $nama_rup . '/' . 'BERITA_ACARA_PENGADAAN/';

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
        $data['jadwal_aanwizing'] = $this->M_tender->jadwal_aanwizing($data['rup']['id_rup']);
        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/aanwijzing');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax_chat', $data);
    }

    public function ngeload_chatnya($id_rup)
    {
        $data = $this->M_tender->getPesan($id_rup);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function kirim_pesanya($id_rup)
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $id_rup = $this->input->post('id_rup');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {

            $fileData2 = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_rup' => $id_rup,
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }


    // sanggahan prakualifikasi
    public function sanggahan_prakualifikasi($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/sanggahan_prakualifikasi', $data);
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function get_sanggahan_pra()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');
        $row_sanggahan_pra = $this->M_tender->get_row_vendor_sanggahan($id_rup, $id_vendor);
        $output = [
            'row_sanggahan_pra' => $row_sanggahan_pra,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_sanggahan_pra()
    {
        // post
        $id_rup = $this->input->post('id_rup');
        $ket_sanggah_pra = $this->input->post('ket_sanggah_pra');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SANGGAHAN_PRAKUALIFIKASI')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SANGGAHAN_PRAKUALIFIKASI', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'SANGGAHAN_PRAKUALIFIKASI';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sanggah_pra')) {
            $fileData = $this->upload->data();
            $upload = [
                'ket_sanggah_pra' => $ket_sanggah_pra,
                'file_sanggah_pra' => $fileData['file_name']
            ];

            $where = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor,
            ];
            $this->M_tender->update_mengikuti($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_sanggahan_pra()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        // get value vendor dan paket untuk genrate file
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        $upload = [
            'ket_sanggah_pra' => '',
            'file_sanggah_pra' => ''
        ];

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
        ];
        $this->M_tender->update_mengikuti($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end sanggahan prakualifikasi


    // sanggahan akhir
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

    public function get_sanggahan_akhir()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');
        $row_sanggahan_akhir = $this->M_tender->get_row_vendor_sanggahan($id_rup, $id_vendor);
        $output = [
            'row_sanggahan_akhir' => $row_sanggahan_akhir,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_sanggahan_akhir()
    {
        // post
        $id_rup = $this->input->post('id_rup');
        $ket_sanggah_akhir = $this->input->post('ket_sanggah_akhir');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' . $nama_usaha . '/' . 'SANGGAHAN_AKHIR')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' . $nama_usaha . '/' . 'SANGGAHAN_AKHIR', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' . $nama_usaha . '/' . 'SANGGAHAN_AKHIR';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sanggah_akhir')) {
            $fileData = $this->upload->data();
            $upload = [
                'ket_sanggah_akhir' => $ket_sanggah_akhir,
                'file_sanggah_akhir' => $fileData['file_name']
            ];

            $where = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor,
            ];
            $this->M_tender->update_mengikuti($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_sanggahan_akhir()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        // get value vendor dan paket untuk genrate file
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        $upload = [
            'ket_sanggah_akhir' => '',
            'file_sanggah_akhir' => ''
        ];

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
        ];
        $this->M_tender->update_mengikuti($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end sanggahan akhir

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

    public function buka_penawaran($id_url_rup)
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        // query tendering
        $data['count_tender_umum'] =  $this->M_tender->count_all_data();
        $data['rup'] = $this->M_tender->get_row_rup($id_url_rup);
        $data['jadwal_aanwizing'] = $this->M_tender->jadwal_aanwizing($data['rup']['id_rup']);
        $data['data2'] = $this->M_tender->getDataById($data['rup']['id_rup']);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/buka_penawaran');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax_buka_penawaran', $data);
    }

    public function upload_penawaran_1()
    {
        $id_vendor = $this->input->post('id_vendor');
        $nama_dokumen_pengadaan_vendor = $this->input->post('nama_dokumen_pengadaan_vendor');
        $tkdn_dokumen_pengadaan = $this->input->post('tkdn_dokumen_pengadaan');
        $persentase_tkdn_dokumen_pengadaan = $this->input->post('persentase_tkdn_dokumen_pengadaan');
        $id_url_rup = $this->input->post('id_url_rup');
        $id_rup = $this->input->post('id_rup');
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $type_post = $this->input->post('type_post');
        if ($type_post == 'tambah') {
            if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I')) {
                mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I', 0777, TRUE);
            }
            $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I';
            $config['allowed_types'] = 'pdf|xlsx|xls';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_dokumen_pengadaan_vendor')) {
                $fileData = $this->upload->data();

                $upload = [
                    'id_rup' => $id_rup,
                    'id_url_rup' => $id_url_rup,
                    'id_vendor' => $id_vendor,
                    'nama_dokumen_pengadaan_vendor' => $nama_dokumen_pengadaan_vendor,
                    'tkdn_dokumen_pengadaan' => $tkdn_dokumen_pengadaan,
                    'persentase_tkdn_dokumen_pengadaan' => $persentase_tkdn_dokumen_pengadaan,
                    'file_dokumen_pengadaan_vendor' => $fileData['file_name']
                ];

                $this->M_tender->insert_dok_pengadaan_file_I($upload);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
            }
        } else {
            $id_dokumen_pengadaan_vendor = $this->input->post('id_dokumen_pengadaan_vendor');
            if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I')) {
                mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I', 0777, TRUE);
            }
            $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I';
            $config['allowed_types'] = 'pdf|xlsx|xls';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_dokumen_pengadaan_vendor')) {
                $fileData = $this->upload->data();
                $where = [
                    'id_dokumen_pengadaan_vendor' => $id_dokumen_pengadaan_vendor
                ];
                $upload = [
                    'id_rup' => $id_rup,
                    'id_url_rup' => $id_url_rup,
                    'id_vendor' => $id_vendor,
                    'nama_dokumen_pengadaan_vendor' => $nama_dokumen_pengadaan_vendor,
                    'tkdn_dokumen_pengadaan' => $tkdn_dokumen_pengadaan,
                    'persentase_tkdn_dokumen_pengadaan' => $persentase_tkdn_dokumen_pengadaan,
                    'file_dokumen_pengadaan_vendor' => $fileData['file_name']
                ];

                $this->M_tender->update_dok_pengadaan_file_I($upload, $where);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        }
    }


    public function upload_penawaran_2()
    {
        $id_vendor = $this->input->post('id_vendor');
        $nilai_penawaran_vendor = $this->input->post('nilai_penawaran_vendor');
        $id_rup = $this->input->post('id_rup');
        $nama_rup = $this->M_tender->get_rup_byid($id_rup);
        $nama_usaha = $this->session->userdata('nama_usaha');
        if (!is_dir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II')) {
            mkdir('file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dok_penawaran_harga')) {
            $fileData = $this->upload->data();
            $where = [
                'id_rup' => $id_rup,
                'id_vendor' => $id_vendor
            ];
            $upload = [
                'nilai_penawaran_vendor' => $nilai_penawaran_vendor,
                'dok_penawaran_harga' => $fileData['file_name']
            ];

            $this->M_tender->update_dok_pengadaan_file_II($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function get_table_dok_penawaran_file_I()
    {
        $id_vendor = $this->input->post('id_vendor');
        $id_url_rup = $this->input->post('id_url_rup');
        $resultss = $this->M_tender->gettable_dok_penawaran_I($id_vendor, $id_url_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_dokumen_pengadaan_vendor;
            $row[] = $rs->tkdn_dokumen_pengadaan;
            $row[] = $rs->persentase_tkdn_dokumen_pengadaan;
            $row[] =  '<a target="_blank" href="' . base_url('tender_diikuti/download_dokumen_pengadaan_vendor/') . $rs->id_dokumen_pengadaan_vendor . '" class="btn btn-info btn-sm shadow-lg text-white" <i class="fa fa-download" aria-hidden="true"></i> Download File</a>';
            $row[] = '<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white"  onClick="by_id_dok_penawran_file_I(' . "'" . $rs->id_dokumen_pengadaan_vendor  . "','edit'" . ')"><i class="fa fa-info-circle" aria-hidden="true"></i> Edit</a><a href="javascript:;" class="btn btn-danger btn-sm shadow-lg text-white"  onClick="by_id_dok_penawran_file_I(' . "'" . $rs->id_dokumen_pengadaan_vendor  . "','hapus'" . ')"><i class="fa fa-trash" aria-hidden="true"></i> hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data_dok_penawaran_I($id_vendor, $id_url_rup),
            "recordsFiltered" => $this->M_tender->count_filtered_data_dok_penawaran_I($id_vendor, $id_url_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_table_dok_penawaran_file_II()
    {
        $id_vendor = $this->input->post('id_vendor');
        $id_rup = $this->input->post('id_rup');
        $resultss = $this->M_tender->gettable_dok_penawaran_II($id_vendor, $id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = "Rp " . number_format($rs->nilai_penawaran_vendor, 2, ',', '.');
            $row[] = '<a target="_blank" href="' . base_url('tender_diikuti/download_dokumen_penawaran_vendor/') . $rs->id_vendor_mengikuti_paket . '" class="btn btn-info btn-sm shadow-lg text-white" <i class="fa fa-download" aria-hidden="true"></i> Download File</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_tender->count_all_data_dok_penawaran_II($id_vendor, $id_rup),
            "recordsFiltered" => $this->M_tender->count_filtered_data_dok_penawaran_II($id_vendor, $id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function get_by_id_dokumen_pengadaan_vendor()
    {
        $id_dokumen_pengadaan_vendor = $this->input->post('id_dokumen_pengadaan_vendor');
        $data_row_dokumen_pengadaan_vendor = $this->M_tender->row_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor);
        $output = [
            'row_dokumen_pengadaan_vendor' => $data_row_dokumen_pengadaan_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function hapus_dokumen_pengadaan_vendor()
    {
        $id_dokumen_pengadaan_vendor = $this->input->post('id_dokumen_pengadaan_vendor');
        $this->M_tender->delete_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function download_dokumen_pengadaan_vendor($id_dokumen_pengadaan_vendor)
    {
        $root  = $this->M_tender->row_dok_pengadaan_file_I($id_dokumen_pengadaan_vendor);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $file_url = 'file_paket/' . $root['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_I' . '/'  . $root['file_dokumen_pengadaan_vendor'];
        $url  = $file_url;
        redirect($url);
    }

    public function download_dokumen_penawaran_vendor($id_vendor_mengikuti_paket)
    {
        $root  = $this->M_tender->get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket);
        $nama_usaha = $this->session->userdata('nama_usaha');
        $file_url = 'file_paket/' . $root['nama_rup'] . '/' .  $nama_usaha . '/' . 'DOKUMEN_PENGADAAN_FILE_II' . '/'  . $root['dok_penawaran_harga'];
        $url  = $file_url;
        redirect($url);
    }
}
