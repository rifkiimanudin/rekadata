<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Paket Be Net';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['paket'] = $this->db->get('tb_paket')->result_array();

        $this->form_validation->set_rules('nama_paket', 'nama_paket', 'required');
        $this->form_validation->set_rules('kecepatan', 'kecepatan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('paket/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_paket' => $this->input->post('nama_paket'),
                'kecepatan' => $this->input->post('kecepatan'),
                'harga' => $this->input->post('harga')

            ];
            $this->db->insert('tb_paket', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Paket Berhasil Ditambahkan!</div>');
            redirect('paket');
        }
    }

    public function edit_pkt()
    {
        $this->form_validation->set_rules('nama_paket', 'nama_paket', 'required');
        $this->form_validation->set_rules('kecepatan', 'kecepatan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Gagal Di Edit");
            redirect('paket');
        } else {
            $data = array(
                'nama_paket' => $this->input->post('nama_paket'),
                'kecepatan' => $this->input->post('kecepatan'),
                'harga' => $this->input->post('harga')
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tb_paket', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('paket');
        }
    }
    public function delete_pkt($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('paket');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_paket');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('paket');
        }
    }
}
