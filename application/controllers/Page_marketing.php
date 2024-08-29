<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_marketing extends CI_Controller
{
    public $load;
    public $m_berita;
    public $upload;
    public $image_lib;
    public $input;
    public $db;

    function __construct()
    {
        parent::__construct();
        // $this->load->model('m_page_marketing');
    }

    function index()
    {

        $data['_title'] = 'Nama Marketing';
        $data['_script'] = 'page_marketing/page_marketing_js';
        $data['_view'] = 'page_marketing/page_marketing';
        $this->load->view('layout/index', $data);
    }
}
