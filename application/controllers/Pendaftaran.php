<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['layak' => 0])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function form()
    {
        $data['title'] = 'Formulir Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('ktp', 'KTP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat tanggal lahir', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kec', 'kecamatan', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('prov', 'prov', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/form', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'ktp' => $this->input->post('ktp'),
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
                'kec' => $this->input->post('kec'),
                'kota' => $this->input->post('kota'),
                'prov' => $this->input->post('prov'),
                'layak' => 0,
                'alasan' => "",
                'status' => "tidak aktif",
            ];
            $this->db->insert('tb_daftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('pendaftaran');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['id' => $id])->result_array();

        $this->form_validation->set_rules('ktp', 'KTP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat tanggal lahir', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kec', 'kecamatan', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('prov', 'prov', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'ktp' => $this->input->post('ktp'),
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
                'kec' => $this->input->post('kec'),
                'kota' => $this->input->post('kota'),
                'prov' => $this->input->post('prov'),
                'layak' => 0
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_daftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('pendaftaran');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pendaftaran');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_daftar');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pendaftaran');
        }
    }

    public function survei($id)
    {

        $data['title'] = 'Form Survei';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['id' => $id])->result_array();

        $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/survei', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'alasan' => $this->input->post('alasan'),
                'layak' => 0
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_daftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('pendaftaran');
        }
    }

    public function calon_pelanggan()
    {
        $data['title'] = 'Data Calon Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['layak' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/calon', $data);
        $this->load->view('templates/footer');
    }


    public function pelanggan()
    {
        $data['title'] = 'Data Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get_where('tb_daftar', ['layak' => 2])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_calon($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pendaftaran/calon_pelanggan');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_daftar');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pendaftaran/calon_pelanggan');
        }
    }
}
