<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nenu berhasil ditambahkan</div>');
            redirect('menu');
        }
    }

    public function editmenu()
    {
        $this->form_validation->set_rules('user_menu', 'Menu', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->session->set_flashdata('error', "Menu Gagal Di Edit");
            redirect('menu');
        } else {
            $data = array(
                'menu' => $this->input->post('menu')
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('menu');
        }
    }
    public function delete_menu($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('menu');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('user_menu');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SubMenu berhasil ditambahkan</div>');
            redirect('menu/submenu');
        }
    }

    public function editsubmenu()
    {
        $this->form_validation->set_rules('title', 'Title');
        $this->form_validation->set_rules('menu_id', 'Menu');
        $this->form_validation->set_rules('url', 'URL');
        $this->form_validation->set_rules('icon', 'icon');

        if ($this->form_validation->run() ==  false) {
            $this->session->set_flashdata('error', "SubMenu Gagal Di Edit");
            redirect('menu/submenu');
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon')
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('menu/submenu');
        }
    }

    public function delete_submenu($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('menu/submenu');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('user_sub_menu');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('menu/submenu');
        }
    }
}
