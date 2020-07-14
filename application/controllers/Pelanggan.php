<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelanggan();
        $data['daftarkan'] = $this->db->get_where('tb_daftar', ['layak' => 1])->result_array();
        $data['paketkan'] = $this->db->get('tb_paket')->result_array();;


        $this->form_validation->set_rules('id_daftar', 'Daftar', 'required');
        $this->form_validation->set_rules('id_paket', 'Paket', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelanggan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_daftar' => $this->input->post('id_daftar'),
                'id_paket' => $this->input->post('id_paket'),
                'tanggal' => date('Y-m-d'),
            ];
            $this->db->insert('tb_pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pelanggan Telah di daftarkan</div>');
            redirect('pelanggan');
        }
    }


    public function edit()
    {
        $data['title'] = 'Edit Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelanggan();

        $this->form_validation->set_rules('id_paket', 'Paket', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal');

        if ($this->form_validation->run() ==  false) {
            $this->session->set_flashdata('error', "Data Gagal Di Edit");
            redirect('pelanggan');
        } else {
            $data = [
                'id_paket' => $this->input->post('id_paket'),
                'tanggal' => date('Y-m-d'),
            ];

            $this->db->where('id', $_POST['id']);
            $this->db->update('tb_pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Edit!</div>');
            redirect('pelanggan');
        }
    }


    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pelanggan');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_pelanggan');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pelanggan');
        }
    }
}
