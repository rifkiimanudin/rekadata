<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function getPelanggan()
    {
        $query = "SELECT tb_pelanggan.id, tb_daftar.nama, tb_paket.nama_paket, tb_paket.harga, tb_pelanggan.tanggal, tb_daftar.status
            FROM tb_pelanggan 
           INNER JOIN tb_paket 
           ON tb_paket.id = tb_pelanggan.id_paket
           INNER JOIN tb_daftar 
           ON tb_daftar.id = tb_pelanggan.id_daftar";
        return $this->db->query($query)->result_array();
    }

    public function getPelangganbyid($id)
    {
        $query = "SELECT tb_pelanggan.id, tb_daftar.nama, tb_paket.nama_paket, tb_paket.harga, tb_pelanggan.tanggal, tb_daftar.status
            FROM tb_pelanggan 
           INNER JOIN tb_paket 
           ON tb_paket.id = tb_pelanggan.id_paket
           INNER JOIN tb_daftar 
           ON tb_daftar.id = tb_pelanggan.id_daftar
           WHERE tb_pelanggan.id = $id";
        return $this->db->query($query)->result_array();
    }

    public function getTransaksi($id)
    {
        $query = "SELECT `tb_transaksi`.`id`, `tb_transaksi`.`harga`, `tb_daftar`.`nama`, `tb_paket`.`nama_paket`, `tb_transaksi`.`tanggal`, `tb_daftar`.`alamat`, `tb_daftar`.`kec`, `tb_daftar`.`kota`, `tb_daftar`.`prov`, `tb_daftar`.`email`, `tb_daftar`.`telp` 
        FROM `tb_transaksi` 
        LEFT JOIN `tb_pelanggan` ON `tb_transaksi`.`id_pelanggan` = `tb_pelanggan`.`id` 
        LEFT JOIN `tb_daftar` ON `tb_pelanggan`.`id_daftar` = `tb_daftar`.`id` 
        LEFT JOIN `tb_paket` ON `tb_pelanggan`.`id_paket` = `tb_paket`.id 
        WHERE tb_transaksi.id = $id";
        return $this->db->query($query)->result_array();
    }

    public function getStatus()
    {
        $query = "SELECT tb_daftar.id, tb_daftar.nama, tb_paket.nama_paket, tb_paket.harga, tb_pelanggan.tanggal, tb_daftar.status 
        FROM tb_pelanggan 
        INNER JOIN tb_paket 
        ON tb_paket.id = tb_pelanggan.id_paket 
        INNER JOIN tb_daftar 
        ON tb_daftar.id = tb_pelanggan.id_daftar 
        WHERE tb_daftar.id = tb_pelanggan.id_daftar
        ";
        return $this->db->query($query)->result_array();
    }
}
