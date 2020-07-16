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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function status()
    {
        $data['title'] = 'Edit Status';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getStatus();

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
            $this->db->update('tb_daftar', $data);
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

        $data['transaksi'] = $this->db->get_where('tb_transaksi', ['id' => $id])->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('harga', 'Harga');
        $this->form_validation->set_rules('keterangan', 'Status');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembayaran/detail', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pelanggan' => $id,
                'tanggal' => date('Y-m-d'),
                'harga' => $this->input->post('harga'),
                'keterangan' => 'lunas',
            ];
            $this->db->insert('tb_transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil</div>');
            redirect('pembayaran');
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

    public function kwitansi($id)
    {

        $this->load->model('Pelanggan_model', 'transaksi');

        $data['transaksi'] = $this->transaksi->getTransaksi($id);

        $this->load->view('pembayaran/kwitansi', $data);
    }
}
