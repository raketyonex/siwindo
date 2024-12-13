<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('login');
        }
    }

    public function index()
    {
        $data['wisata'] = $this->Wisata_Model->get_all_wisata();
        $this->load->view('admin/dashboard', $data);
    }    

    public function tambah_wisata()
    {
        if ($this->input->post()) {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'gambar' => $this->input->post('gambar')
            ];
            $this->Wisata_Model->tambah_wisata($data);
            redirect('admin');
        } else {
            $this->load->view('admin/tambah_wisata');
        }
    }

    public function edit_wisata($id)
    {
        if ($this->input->post()) {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'gambar' => $this->input->post('gambar')
            ];
            $this->Wisata_Model->edit_wisata($id, $data);
            redirect('admin');
        } else {
            $data['wisata'] = $this->Wisata_Model->get_wisata_by_id($id);
            $this->load->view('admin/edit_wisata', $data);
        }
    }

    public function hapus_wisata($id)
    {
        $this->Wisata_Model->hapus_wisata($id);
        redirect('admin');
    }

    public function data_tiket()
    {
        $this->db->select('pesanan.id, pesanan.nama_pemesan, pesanan.jumlah_tiket, pesanan.status, pesanan.total_harga, pesanan.tanggal_pemesanan, wisata.nama as nama_wisata');
        $this->db->from('pesanan');
        $this->db->join('wisata', 'wisata.id = pesanan.wisata_id');
        $this->db->order_by('pesanan.tanggal_pemesanan', 'DESC');

        $data['pesanan'] = $this->db->get()->result();

        $this->load->view('admin/data_tiket', $data);
    }

    public function hapus_pesanan($id)
    {
        $pesanan = $this->Pesanan_Model->get_pesanan_by_id($id);
        if ($pesanan) {
            $this->Pesanan_Model->hapus_pesanan($id);
            $this->session->set_flashdata('success', 'Pesanan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Pesanan tidak ditemukan');
        }
        redirect('admin/data_tiket');
    }

    public function selesaikan_pesanan($id)
    {
        $pesanan = $this->Pesanan_Model->get_pesanan_by_id($id);
        if ($pesanan) {
            $this->Pesanan_Model->selesaikan_pesanan($id);
            $this->session->set_flashdata('success', 'Pesanan berhasil diselesaikan');
        } else {
            $this->session->set_flashdata('error', 'Pesanan tidak ditemukan');
        }
        redirect('admin/data_tiket');
    }
    public function laporan_buku_pdf()
{
    // Load Library Dompdf
    $this->load->library('Dompdf_gen');
    
    // Ambil data pesanan
    $data['pesanan'] = $this->Pesanan_Model->getPdf();

    // Load tampilan untuk dicetak
    $html = $this->load->view('admin/cetak_pdf_pesanan', $data, TRUE); // TRUE untuk mengembalikan output sebagai string

    // Atur ukuran kertas dan orientasi
    $paper_size = 'A4'; // Ukuran kertas
    $orientation = 'landscape'; // Orientasi: portrait atau landscape

    // Inisialisasi Dompdf
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();

    // Nama file PDF
    $filename = 'Data_Pesanan_' . date('YmdHis') . '.pdf';

    // Output file ke browser
    $this->dompdf->stream($filename, array("Attachment" => true)); // Attachment true untuk memaksa unduh
}

}
?>