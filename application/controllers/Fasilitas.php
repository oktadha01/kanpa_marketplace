<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public $load;
    public $m_fasilitas;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_fasilitas');
    }

    function index()
    {

        $data['_title'] = 'Data Fasilitas Perumahan';
        $data['_script'] = 'fasilitas/fasilitas_js';
        $data['_view'] = 'fasilitas/fasilitas';
        $data['data_perum'] = $this->m_fasilitas->m_data_perum();
        $this->load->view('layout/index', $data);
    }
    function data_fasilitas_perum()
    {
        $id_fasilitas_perum = $this->input->post('id-fasilitas-perum');
        $data['data_fasilitas'] = $this->m_fasilitas->m_data_fasilitas_perum($id_fasilitas_perum);
        $data['_view'] = 'fasilitas/data_fasilitas';
        $this->load->view('fasilitas/data_fasilitas', $data);
    }
    function add_data_fasilitas()
    {
        $id_fasilitas_perum = $this->input->post('id-fasilitas-perum');
        $nm_fasilitas = $this->input->post('nm-fasilitas');
        $insert = $this->m_fasilitas->m_add_data_fasilitas($nm_fasilitas, $id_fasilitas_perum);
        echo json_encode($insert);
    }
    function edit_data_fasilitas()
    {
        $id_fasilitas = $this->input->post('id-fasilitas');
        $nm_fasilitas = $this->input->post('nm-fasilitas');
        $update = $this->m_fasilitas->m_edit_data_fasilitas($nm_fasilitas, $id_fasilitas);
        echo json_encode($update);
    }
    function delete_data_fasilitas()
    {

        $id_fasilitas = $this->input->post('id-fasilitas');
        $delete = $this->m_fasilitas->m_delete_data_fasilitas($id_fasilitas);
        echo json_encode($delete);
    }
}
