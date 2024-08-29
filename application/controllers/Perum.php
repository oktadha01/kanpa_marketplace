<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perum extends CI_Controller
{
    public $load;
    public $m_perum;
    public $upload;
    public $image_lib;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_perum');
    }

    function index()
    {

        $data['_title'] = 'Data Perumahan';
        $data['_script'] = 'perum/perum_js';
        $data['_view'] = 'perum/perum';
        $this->load->view('layout/index', $data);
    }
    function data_perum()
    {
        $data['data_perum'] = $this->m_perum->m_data_perum();
        $data['_view'] = 'perum/data_perum';
        $this->load->view('perum/data_perum', $data);
    }
    function simpan_perum()
    {
        $config['upload_path'] = "./upload/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("logo")) {
            $data = array('upload_data' => $this->upload->data());
            $nm_perum = $this->input->post('nm-perum');
            $kode_perum = $this->input->post('kode-perum');
            $alamat = $this->input->post('alamat');
            $url_map = $this->input->post('url-map');
            $map = $this->input->post('map');
            $deskripsi = $this->input->post('deskripsi');
            $meta_deskripsi = $this->input->post('meta-deskripsi');
            $video = $this->input->post('video');
            $logo = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();

            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_perum->m_simpan_perum($nm_perum, $kode_perum, $alamat, $map,  $url_map, $deskripsi, $meta_deskripsi, $logo, $video);
            echo json_encode($insert);
        }
        exit;
    }
    function edit_perum()
    {
        $action_change_logo = $this->input->post('ubah-logo');
        if ($action_change_logo == 'change-logo') {

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("logo")) {
                $data = array('upload_data' => $this->upload->data());
                $id_perum = $this->input->post('id-perum');
                $nm_perum = $this->input->post('nm-perum');
                $kode_perum = $this->input->post('kode-perum');

                $alamat = $this->input->post('alamat');
                $url_map = $this->input->post('url-map');
                $map = $this->input->post('map');
                $deskripsi = $this->input->post('deskripsi');
                $meta_deskripsi = $this->input->post('meta-deskripsi');
                $video = $this->input->post('video');
                $logo = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $update = $this->m_perum->m_edit_logo_perum($id_perum, $nm_perum, $kode_perum, $alamat, $map,  $url_map, $deskripsi, $meta_deskripsi, $logo, $video);
                echo json_encode($update);
            }
            $logo_lama = $this->input->post('logo-lama');
            unlink('./upload/' . $logo_lama);
            exit;
        } else {
            $id_perum = $this->input->post('id-perum');
            $nm_perum = $this->input->post('nm-perum');
            $kode_perum = $this->input->post('kode-perum');
            $alamat = $this->input->post('alamat');
            $url_map = $this->input->post('url-map');
            $map = $this->input->post('map');
            $deskripsi = $this->input->post('deskripsi');
            $meta_deskripsi = $this->input->post('meta-deskripsi');
            $video = $this->input->post('video');
            $update = $this->m_perum->m_edit_perum($id_perum, $nm_perum, $kode_perum, $alamat, $map,  $url_map, $deskripsi, $meta_deskripsi, $video);
            echo json_encode($update);
        }
    }
    function status_data_perum()
    {
        $id_perum = $this->input->post('id-perum');
        $status_perum = $this->input->post('status-perum');
        $update = $this->m_perum->m_status_perum($id_perum, $status_perum);
        echo json_encode($update);
    }
    function move_columns(){
        $id_perum = $this->input->post('id-perum');
        $order_perum = $this->input->post('order-perum');
        $update = $this->m_perum->m_move_columns($id_perum, $order_perum);
        echo json_encode($update);

    }
    function resizeImage($filename)
    {
        $source_path = 'upload/' . $filename;
        $target_path = 'upload/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '50%',
            'width' => 'auto',
            'height' => '140',
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        return 1;
    }
}
