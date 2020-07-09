<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelanggan();
        $data['daftarkan'] = $this->db->get('tb_daftar')->result_array();
        $data['paketkan'] = $this->db->get('tb_paket')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function status($id)
    {
        $data['title'] = 'Edit Status';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelangganbyid($id);

        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembayaran/status', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'status' => $this->input->post('status'),
            ];
            $this->db->where('id', $_POST['id']);
            $this->db->update('tb_pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Status Berhasil</div>');
            redirect('pembayaran');
        }
    }

    public function detail($id)
    {

        $data['title'] = 'Data Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelangganbyid($id);

        $data['transaksi'] = $this->db->get_where('tb_transaksi', ['id_pelanggan' => $id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/detail', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi()
    {

        $data['title'] = 'Data Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelangganbyid();

        $this->form_validation->set_rules('tanggal', 'Tanggal');
        $this->form_validation->set_rules('harga', 'Harga');
        $this->form_validation->set_rules('status', 'Status');

        if ($this->form_validation->run() ==  false) {
        } else {
            $data = [
                'id_pelanggan' => $_POST['id'],
                'tanggal' => date('d / M / y'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->insert('tb_transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil</div>');
            redirect('pembayaran/detail');
        }
    }
    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pembayaran/detail');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_transaksi');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pembayaran/detail');
        }
    }
}
