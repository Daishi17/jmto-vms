<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tender_diikuti extends CI_Controller
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
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/index');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function tender_umum()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/index');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function informasi_tender()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/informasi_tender_umum');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function aanwijzing()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/aanwijzing');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function sanggahan_prakualifikasi()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/sanggahan_prakualifikasi');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }


    public function sanggahan_akhir()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/sanggahan_akhir');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }

    public function negosiasi()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);

        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('info_tender/negosiasi');
        $this->load->view('template_menu/new_footer');
        $this->load->view('info_tender/ajax');
    }
}
