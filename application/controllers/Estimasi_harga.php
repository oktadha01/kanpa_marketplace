<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estimasi_harga extends CI_Controller
{
    public $load;
	public $m_estimasi_hrg;
	public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_estimasi_hrg');
    }

    function index()
    {

        $data['_title'] = 'Kanzu Group Indonesia';
        $data['_script'] = 'estimasi_hrg/estimasi_hrg_js';
        $data['_view'] = 'estimasi_hrg/estimasi_hrg';
        // $data['data_foto_slide'] = $this->m_estimasi_hrg->m_data_fotoslide();
        $data['data_perum'] = $this->m_estimasi_hrg->m_data_perum();
        $this->load->view('layout/index', $data);
    }

    function filter_price()
    {
        $satuan_hrg = $this->input->post('satuan-hrg');
        $price_min = $this->input->post('price-min');
        $price_max = $this->input->post('price-max');
        $data['data_perum'] = $this->m_estimasi_hrg->m_filter_price($price_min, $price_max, $satuan_hrg);
        $data['_view'] = 'estimasi_hrg/data_estimasi_hrg';
        $this->load->view('estimasi_hrg/data_estimasi_hrg', $data);
    }
}