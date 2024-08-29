<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{
    public $load;
    public $m_produk;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        // $this->load->model('m_produk');
    }
    function review()
    {
        $data['_title'] = 'Di Jual Rumah Murah';
        $data['_url'] = base_url('Perumahan');
        $data['_script'] = 'video/video_js';
        $data['_view'] = 'video/video';
        $this->load->view('layout/index', $data);
    }
}
