<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function pendaftaran()
    {
        $data['title'] = 'Verifikasi Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['layak' => 0])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('verifikasi/pendaftaran', $data);
        $this->load->view('templates/footer');
    }

    public function pemesanan()
    {
        $data['title'] = 'Verifikasi Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['layak' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('verifikasi/pemesanan', $data);
        $this->load->view('templates/footer');
    }

    public function verifikasi_df($id)
    {
        $data['title'] = 'verifikasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['id' => $id])->result_array();

        $this->db->set('layak', 1);
        $this->db->where('id', $id);
        $this->db->update('tb_daftar');
        redirect('verifikasi/pendaftaran');
    }

    public function verifikasi_pm($id)
    {
        $data['title'] = 'verifikasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['id' => $id])->result_array();

        $this->db->set('layak', 2);
        $this->db->set('status', "aktif");
        $this->db->where('id', $id);
        $this->db->update('tb_daftar');
        redirect('verifikasi/pemesanan');
    }
}
