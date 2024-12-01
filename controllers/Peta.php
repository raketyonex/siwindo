<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller
{
    public function index()
    {
        $wisata = $this->Wisata_Model->get_all_wisata();
        $data = [
            'wisata' => $wisata
        ];

        $this->load->view('peta', $data);
    }
}