<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Email_send
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_datapenyedia/M_datapenyedia');
    }

    public function sen_row_email($type, $data)
    {
        if ($type == 'send_one_vendor') {
            $type = $this->ci->M_datapenyedia->get_row_vendor($data['id_vendor']);
        } else if ($type == 'registrasi') {
            $email = $data['email'];
            $base_url = base_url('registrasi/identitas');
        } else {
        }
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'afikriz@gmail.com',
            'smtp_pass' => 'Fm13082124#',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->ci->load->library('email', $config);
        $this->ci->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->ci->email->from('eproc@jmtm.co.id', 'JMTM');

        // Email penerima

        $this->ci->email->to($email); // Ganti dengan email tujuan

        // Subject email
        $this->ci->email->subject('E-PROCUREMENT JMTO :  REGISTRASI');

        // Isi email
        $this->ci->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pendaftaran Selanjutnya ");

        $this->ci->email->send();
    }
}
