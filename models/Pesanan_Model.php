<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_Model extends CI_Model
{
    // admin: Mengambil semua pesanan (untuk admin yang mengelola pesanan)
    public function get_all_pesanan($user_id)
    {
        $this->db->select('pesanan.id, pesanan.nama_pemesan, pesanan.tanggal_pemesanan, users.username, wisata.nama, pesanan.jumlah_tiket, pesanan.status, pesanan.total_harga');
        $this->db->from('pesanan');
        $this->db->join('users', 'pesanan.user_id = users.id');
        $this->db->join('wisata', 'pesanan.wisata_id = wisata.id');
        $this->db->where('pesanan.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // admin: Memperbarui status pesanan (misalnya untuk menyelesaikan pesanan)
    public function update_status_pesanan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pesanan', $data);
    }

    // admin: Menyelesaikan pesanan
    public function selesaikan_pesanan($id)
    {
        $this->db->where('id', $id);
        $this->db->update('pesanan', ['status' => 'selesai']);
    }

    // admin: Menghitung total harga tiket pesanan berdasarkan ID pesanan
    public function get_total_harga($pesanan_id) {
        $this->db->select('pesanan.jumlah_tiket, wisata.harga');
        $this->db->from('pesanan');
        $this->db->join('wisata', 'pesanan.wisata_id = wisata.id');
        $this->db->where('pesanan.id', $pesanan_id);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($result) {
            return $result['jumlah_tiket'] * $result['harga'];
        }
        return 0;
    }

    // user&admin: Mengambil pesanan berdasarkan ID, baik untuk admin maupun user
    public function get_pesanan_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pesanan');
        return $query->row_array();
    }

    // user&admin: Menghapus pesanan (admin bisa hapus semua pesanan, user hanya pesanan mereka)
    public function hapus_pesanan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pesanan');
    }

    // user&admin: Mengambil wisata berdasarkan ID untuk melihat detail
    public function get_wisata_by_id($wisata_id)
    {
        $this->db->where('id', $wisata_id);
        $query = $this->db->get('wisata');
        return $query->row_array();
    }  

    // user: Menyimpan pesanan tiket baru
    public function save_pesanan($data) {
        return $this->db->insert('pesanan', $data);
    }
}