<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapenyedia extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datapenyedia/M_datapenyedia');
	}

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
		$id_vendor = '1';
		$data['get_row_nib']  = $this->M_datapenyedia->get_row_nib($id_vendor);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/izin_usaha/index',$data);
		$this->load->view('template/footer');
		$this->load->view('js_file_on_session/index');
	}

	public function add_izin_usaha()
	{
		$id_vendor = '1';
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$nomor_surat = $this->input->post('nomor_surat');
		$kualifikasi_izin = $this->input->post('kualifikasi_izin');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup');
		$password_dokumen = '1234';

		$config['upload_path'] = './danang_vendor/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => 1,
				'no_urut_nib' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'sts_token_dokumen' => 1,
			];
			$this->M_datapenyedia->tambah_nib($upload);
			$response = [
				'row_nib' => $this->M_datapenyedia->get_row_nib($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}
}
