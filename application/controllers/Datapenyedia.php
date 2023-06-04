<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapenyedia extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datapenyedia/M_datapenyedia');
		$this->load->helper('download');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/index');
		$this->load->view('template/footer');
		$this->load->view('datapenyedia/ajax');
	}

	public function identitas_perusahaan()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/identitas/index');
		$this->load->view('template/footer');
	}

	public function izin_usaha()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$data['row_vendor']  = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$data['get_row_nib']  = $this->M_datapenyedia->get_row_nib($id_vendor);
		$this->load->view('template/header');
		// $this->load->view('template/sidebar');
		$this->load->view('datapenyedia/izin_usaha/index', $data);
		$this->load->view('template/footer');
		$this->load->view('js_file_on_session/index');
	}

	public function get_row_global_vendor($id_url_vendor)
	{
		$token = $this->input->post('secret_token');
		$row_vendor = $this->M_datapenyedia->get_row_vendor_by_id_url_vendor($id_url_vendor);
		$id_vendor = $row_vendor['id_vendor'];
		$row_nib = $this->M_datapenyedia->get_row_nib($id_vendor);
		if ($token == $row_vendor['token_scure_vendor']) {
			$response = [
				'row_vendor' => $row_vendor,
				'row_nib' => $row_nib,
			];
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function add_izin_usaha()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_nib = $this->M_datapenyedia->get_row_nib($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$nomor_surat = $this->input->post('nomor_surat');
		$kualifikasi_izin = $this->input->post('kualifikasi_izin');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup');
		$tgl_berlaku_nib = $this->input->post('tgl_berlaku_nib');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/NIB-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/NIB-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/NIB-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_nib' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku_nib' => $tgl_berlaku_nib,
				'sts_token_dokumen' => 1,
			];
			if (!$row_nib) {
				$this->M_datapenyedia->tambah_nib($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_nib($upload, $where);
			}


			$response = [
				'row_nib' => $this->M_datapenyedia->get_row_nib($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_nib' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'tgl_berlaku_nib' => $tgl_berlaku_nib,
			];
			if (!$row_nib) {
				$this->M_datapenyedia->tambah_nib($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_nib($upload, $where);
			}

			$response = [
				'row_nib' => $this->M_datapenyedia->get_row_nib($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_nib($id_url)
	{
		$type = $this->input->post('type');

		$get_row_enkrip = $this->M_datapenyedia->get_row_nib_url($id_url);
		$secret_token = $this->input->post('secret_token');
		$chiper = "AES-128-ECB";
		$secret = $get_row_enkrip['token_dokumen'];
		if ($type == 'dekrip') {
			$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen' => $encryption_string,
			];
		} else {
			$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen' => $encryption_string,
			];
		}

		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$where = [
			'id_url' => $id_url
		];

		if ($secret_token == $row_vendor['token_scure_vendor']) {
			$response = [
				'message' => 'success'
			];
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
		}
		$this->M_datapenyedia->update_enkrip($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download($id_url)
	{
		$get_row_enkrip = $this->M_datapenyedia->get_row_nib_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/NIB-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}

	public function akta_pendirian()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/akta_pendirian/index');
		$this->load->view('template/footer');
	}

	public function manajerial()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/manajerial/index');
		$this->load->view('template/footer');
	}

	public function sdm()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/sdm/index');
		$this->load->view('template/footer');
	}

	public function pengalaman()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/pengalaman/index');
		$this->load->view('template/footer');
	}

	public function pajak()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datapenyedia/pajak/index');
		$this->load->view('template/footer');
	}
}
