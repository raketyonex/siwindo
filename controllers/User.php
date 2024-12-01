<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user') {
            redirect('login');
        }
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['pesanan'] = $this->Pesanan_Model->get_all_pesanan($user_id);

        if (empty($data['pesanan'])) {
            $data['pesanan'] = null;
        }

        $this->load->view('user/home', $data);
    }

    public function get_wisata_by_id($wisata_id)
    {
        $wisata = $this->Pesanan_Model->get_wisata_by_id($wisata_id);

        if ($wisata) {
            echo json_encode($wisata);
        } else {
            echo json_encode(['error' => 'Wisata tidak ditemukan']);
        }
    }

    public function pesan_tiket($wisata_id)
    {
        $data['wisata'] = $this->Pesanan_Model->get_wisata_by_id($wisata_id);
        
        $this->load->view('user/pesan_tiket', $data);
    }

    public function simpan_pesanan()
    {
        $user_id = $this->session->userdata('user_id');
        $wisata_id = $this->input->post('wisata_id');
        $jumlah_tiket = $this->input->post('jumlah_tiket');
        $nama_pemesan = $this->input->post('nama_pemesan');
        
        $wisata = $this->Pesanan_Model->get_wisata_by_id($wisata_id);

        $total_harga = $wisata['harga'] * $jumlah_tiket;

        $data = [
            'user_id' => $user_id,
            'wisata_id' => $wisata_id,
            'jumlah_tiket' => $jumlah_tiket,
            'total_harga' => $total_harga,
            'nama_pemesan' => $nama_pemesan,
            'status' => 'pending',
            'tanggal_pemesanan' => date('Y-m-d H:i:s')
        ];
        
        $this->Pesanan_Model->save_pesanan($data);
        
        redirect('user');
    }

    public function batal_pesanan($id)
    {
        $this->Pesanan_Model->hapus_pesanan($id);
    
        redirect('user');
    }

    public function cetak_tiket($id)
    {
        $pesanan = $this->Pesanan_Model->get_pesanan_by_id($id);
        
        if ($pesanan) {
            $wisata = $this->Pesanan_Model->get_wisata_by_id($pesanan['wisata_id']);
            $pesanan['nama_wisata'] = $wisata['nama'];
            $pesanan['harga'] = $wisata['harga'];

            $data['pesanan'] = $pesanan;
            $this->load->view('user/cetak_tiket', $data);
        } else {
            show_error("Pesanan tidak ditemukan.");
        }
    }
}
?>