<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public $load;
    public $m_kategori;
    public $uri;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    function perumahan()
    {
        $kategori = $this->uri->segment(3);

        $data['_title'] = 'Kanzu Group Indonesia';
        $data['_script'] = 'kategori_perum/kategori_perum_js';
        $data['_view'] = 'kategori_perum/kategori_perum';
        // $data['data_foto_slide'] = $this->m_kategori->m_data_fotoslide();
        $data['data_perum'] = $this->m_kategori->m_data_perum($kategori);
        $data['data_tipe'] = $this->m_kategori->m_data_tipe();
        $this->load->view('layout/index', $data);
    }
}
