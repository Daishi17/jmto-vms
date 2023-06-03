<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenyedia extends CI_Controller {

	// public function __constructor()
	// {
	// 	$this->load->library('AES');
	// }

	public function index()
	{
		$this->load->view('template/header');
        $this->load->view('template/sidebar');
		$this->load->view('datapenyedia/index');
        $this->load->view('template/footer');
        $this->load->view('datapenyedia/ajax');
	}

    public function izin_usaha()
	{
		$this->load->view('template/header');
        $this->load->view('template/sidebar');
		$this->load->view('datapenyedia/izin_usaha/index');
        $this->load->view('template/footer');
        $this->load->view('datapenyedia/izin_usaha/ajax');
	}

    public function add_izin_usaha()
    {
        echo 'baa';
    }
}