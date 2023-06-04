<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datapenyedia/M_datapenyedia');
		$this->load->model('M_jenis_usaha/M_jenis_usaha');
		$this->load->library(array('form_validation', 'recaptcha'));
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_vendor.email]', ['required' => 'Email Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required|is_unique[tbl_vendor.npwp]', ['required' => 'NPWP Wajib Diisi!', 'is_unique' => 'NPWP Sudah Terdaftar']);
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					$data = [
						'email' => form_error('email'),
						'npwp' => form_error('npwp'),
					];
					$data['widget'] = $this->recaptcha->getWidget();
					$data['script'] = $this->recaptcha->getScriptTag();
					$this->session->set_flashdata('email_salah', $data['email']);
					$this->session->set_flashdata('npwp_salah', $data['npwp']);
					$data['title'] = 'REGISTARSI';
					$this->load->view('template/header_registrasi');
					$this->load->view('template/sidebar_registrasi');
					$this->load->view('datapenyedia/registrasi/index', $data);
					$this->load->view('template/footer');
					$this->load->view('js_file_out_session/index');
				} else {
					$data['widget'] = $this->recaptcha->getWidget();
					$data['script'] = $this->recaptcha->getScriptTag();
					$email = $this->input->post('email');
					$npwp = $this->input->post('npwp');
					$this->session->set_userdata('email', $email);
					$this->session->set_userdata('npwp', $npwp);
					$this->session->set_flashdata('success', 'Email : ' . $email . ' Terdaftar Silakan Check Email Anda Untuk Mengetahui Link Untuk Mengisi Identitas Vendor Dan Pastikan Masih 1 Perangkat (Terkadang Email Masuk Ke Spam!!)');
					$this->load->view('template/header_registrasi');
					$this->load->view('template/sidebar_registrasi');
					$this->load->view('datapenyedia/registrasi/index', $data);
					$this->load->view('template/footer');
					$this->load->view('js_file_out_session/index');
					// START EMAIL SEND TYPE
					$type_send_email = 'registrasi';
					$data_send_email = [
						'email' => $email
					];
					$this->email_send->sen_row_email($type_send_email, $data_send_email);
					// END EMAIL SEND TYPE
				}
			}
		}
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$this->load->view('template/header_registrasi');
		$this->load->view('template/sidebar_registrasi');
		$this->load->view('datapenyedia/registrasi/index', $data);
		$this->load->view('template/footer');
		$this->load->view('js_file_out_session/index');
	}

	public function identitas()
	{
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$data['get_jenis_usaha']  = $this->M_jenis_usaha->get_result_jenis_usaha();
		$this->load->view('template/header_registrasi');
		$this->load->view('template/sidebar_registrasi');
		$this->load->view('datapenyedia/identitas/index', $data);
		$this->load->view('template/footer');
		$this->load->view('js_file_out_session/index');
	}

	public function add_identitas()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					redirect('registrasi/identitas');
				} else {
					$nama_usaha = $this->input->post('nama_usaha');
					$bentuk_usaha = $this->input->post('bentuk_usaha');
					$kualifikasi_usaha = $this->input->post('kualifikasi_usaha');
					$npwp = $this->input->post('npwp');
					$email = $this->input->post('email');
					$alamat = $this->input->post('alamat');
					$nama_kelurahan = $this->input->post('nama_kelurahan');
					$kode_pos = $this->input->post('kode_pos');
					$no_telpon = $this->input->post('no_telpon');
					$sts_kantor_cabang = $this->input->post('sts_kantor_cabang');
					$alamat_kantor_cabang = $this->input->post('alamat_kantor_cabang');
					$password = $this->input->post('password');
					$id = $this->uuid->v4();
					$id = str_replace('-', '', $id);
					$jenis_usaha = $this->input->post('jenis_usaha[]');
					$data_vendor = [
						'id_url_vendor' => $id,
						'username' => $nama_usaha,
						'nama_usaha' => $nama_usaha,
						'bentuk_usaha' => $bentuk_usaha,
						'kualifikasi_usaha' => $kualifikasi_usaha,
						'npwp' => $npwp,
						'email' => $email,
						'alamat' => $alamat,
						'kelurahan' => $nama_kelurahan,
						'kode_pos' => $kode_pos,
						'no_telpon' => $no_telpon,
						'sts_kantor_cabang' => $sts_kantor_cabang,
						'alamat_kantor_cabang' => $alamat_kantor_cabang,
						'password' =>  password_hash($password, PASSWORD_DEFAULT),
						'id_jenis_usaha' => implode(",",$jenis_usaha)

					];
					$this->M_datapenyedia->insert_vendor($data_vendor);
					// insert ke trx jenis usaha
					$this->session->set_flashdata('success', 'Regis Berhasil');
					redirect('registrasi/identitas');
				}
			}
		} else {
			redirect('registrasi/identitas');
		}
	}
}
