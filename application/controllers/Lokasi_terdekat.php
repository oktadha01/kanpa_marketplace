<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_terdekat extends CI_Controller
{
    public $load;
    public $m_lokasi_terdekat;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_lokasi_terdekat');
    }
    
    function index()
    {
        $data['_title'] = 'Data Lokasi Terdekat';
        $data['_script'] = 'lokasiterdekat/lokasi_terdekat_js';
        $data['_view'] = 'lokasiterdekat/lokasi_terdekat';
        $data['data_perum'] = $this->m_lokasi_terdekat->m_data_perum();
        $this->load->view('layout/index', $data);
    }
    function data_lokasi_terdekat_perum()
    {
        $id_lokasi_terdekat_perum = $this->input->post('id-lokasi-terdekat-perum');
        $data['data_lokasi_terdekat'] = $this->m_lokasi_terdekat->m_data_lokasi_terdekat_perum($id_lokasi_terdekat_perum);
        $data['_view'] = 'lokasiterdekat/data_lokasi_terdekat';
        $this->load->view('lokasiterdekat/data_lokasi_terdekat', $data);
    }
    function add_data_lokasi_terdekat()
    {
        $id_lokasi_terdekat_perum = $this->input->post('id-lokasi-terdekat-perum');
        $nm_lokasi_terdekat = $this->input->post('nm-lokasi-terdekat');
        $jarak_lokasi_terdekat = $this->input->post('jarak-lokasi-terdekat');
        $insert = $this->m_lokasi_terdekat->m_add_data_lokasi_terdekat($id_lokasi_terdekat_perum, $nm_lokasi_terdekat, $jarak_lokasi_terdekat);
        echo json_encode($insert);
    }
    function edit_data_lokasi_terdekat()
    {
        $id_lokasi_terdekat = $this->input->post('id-lokasi-terdekat');
        $nm_lokasi_terdekat = $this->input->post('nm-lokasi-terdekat');
        $jarak_lokasi_terdekat = $this->input->post('jarak-lokasi-terdekat');
        $update = $this->m_lokasi_terdekat->m_edit_data_lokasi_terdekat($id_lokasi_terdekat, $nm_lokasi_terdekat, $jarak_lokasi_terdekat);
        echo json_encode($update);
    }
    function delete_data_lokasi_terdekat()
    {

        $id_lokasi_terdekat = $this->input->post('id-lokasi-terdekat');
        $delete = $this->m_lokasi_terdekat->m_delete_data_lokasi_terdekat($id_lokasi_terdekat);
        echo json_encode($delete);
    }
}
